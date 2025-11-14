<?php
/**
 * SITUNEO DIGITAL - Database Installer
 * Script untuk install semua tabel database
 *
 * CARA PAKAI:
 * 1. Upload semua file ke server
 * 2. Akses: http://domainanda.com/database/install.php
 * 3. Atau jalankan via command line: php database/install.php
 * 4. HAPUS file ini setelah instalasi selesai!
 *
 * @package    SITUNEO_DIGITAL
 * @author     SITUNEO DIGITAL Team
 * @copyright  2025 SITUNEO DIGITAL
 */

// Cegah akses langsung jika sudah installed
if (file_exists(__DIR__ . '/../config/installed.lock')) {
    die('❌ Database sudah ter-install! Hapus file config/installed.lock jika ingin install ulang.');
}

// Load config
require_once __DIR__ . '/../config/database.php';

// Konstanta database
define('DB_HOST', 'localhost');
define('DB_USER', 'nrrskfvk_user_situneo_digital');
define('DB_PASS', 'Devin1922$');
define('DB_NAME', 'nrrskfvk_situneo_digital');

echo "╔════════════════════════════════════════════╗\n";
echo "║   SITUNEO DIGITAL - Database Installer    ║\n";
echo "╚════════════════════════════════════════════╝\n\n";

// Koneksi ke database
echo "🔌 Connecting to database...\n";
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($mysqli->connect_error) {
    die("❌ Connection failed: " . $mysqli->connect_error . "\n");
}

echo "✅ Connected successfully!\n\n";

// Set UTF-8
$mysqli->set_charset("utf8mb4");

// Ambil semua file migration
$migrationDir = __DIR__ . '/migrations';
$migrationFiles = glob($migrationDir . '/*.sql');
sort($migrationFiles); // Urutkan berdasarkan nama file

if (empty($migrationFiles)) {
    die("❌ No migration files found!\n");
}

echo "📁 Found " . count($migrationFiles) . " migration files\n\n";

$success = 0;
$failed = 0;
$errors = [];

// Jalankan setiap migration
foreach ($migrationFiles as $file) {
    $filename = basename($file);
    echo "⚙️  Running: $filename ... ";

    // Baca file SQL
    $sql = file_get_contents($file);

    // Pisahkan query berdasarkan semicolon
    $queries = array_filter(array_map('trim', explode(';', $sql)));

    $fileSuccess = true;
    foreach ($queries as $query) {
        // Skip komentar dan query kosong
        if (empty($query) || substr($query, 0, 2) === '--') {
            continue;
        }

        if (!$mysqli->query($query)) {
            $fileSuccess = false;
            $errors[] = [
                'file' => $filename,
                'error' => $mysqli->error
            ];
            break;
        }
    }

    if ($fileSuccess) {
        echo "✅\n";
        $success++;
    } else {
        echo "❌\n";
        $failed++;
    }
}

echo "\n" . str_repeat("─", 46) . "\n";
echo "📊 Installation Summary:\n";
echo "   ✅ Success: $success files\n";
echo "   ❌ Failed: $failed files\n";
echo str_repeat("─", 46) . "\n\n";

// Tampilkan error jika ada
if (!empty($errors)) {
    echo "❌ Errors:\n";
    foreach ($errors as $error) {
        echo "   • {$error['file']}: {$error['error']}\n";
    }
    echo "\n";
}

// Jika semua berhasil, buat lock file
if ($failed === 0) {
    echo "🎉 Database installed successfully!\n\n";

    // Buat lock file
    $lockFile = __DIR__ . '/../config/installed.lock';
    file_put_contents($lockFile, date('Y-m-d H:i:s'));

    echo "🔒 Created lock file: config/installed.lock\n";
    echo "⚠️  PENTING: Hapus file database/install.php ini untuk keamanan!\n\n";

    echo "📝 Next steps:\n";
    echo "   1. Jalankan seeder: php database/seed.php\n";
    echo "   2. Hapus file: database/install.php\n";
    echo "   3. Hapus file: database/seed.php (setelah seeding)\n\n";
} else {
    echo "❌ Installation failed! Please fix errors and try again.\n\n";
}

// Tutup koneksi
$mysqli->close();

echo "👋 Done!\n";
