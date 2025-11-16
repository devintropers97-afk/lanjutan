<?php
/**
 * SITUNEO DIGITAL - Database Seeder
 * Script untuk mengisi data awal ke database
 *
 * CARA PAKAI:
 * 1. Pastikan database sudah ter-install (jalankan install.php dulu)
 * 2. Akses: http://domainanda.com/database/seed.php
 * 3. Atau jalankan via command line: php database/seed.php
 * 4. HAPUS file ini setelah seeding selesai!
 *
 * @package    SITUNEO_DIGITAL
 * @author     SITUNEO DIGITAL Team
 * @copyright  2025 SITUNEO DIGITAL
 */

// Cegah seeding ulang
if (file_exists(__DIR__ . '/../config/seeded.lock')) {
    die('❌ Database sudah ter-seed! Hapus file config/seeded.lock jika ingin seed ulang.');
}

// Load config
require_once __DIR__ . '/../config/database.php';

// Konstanta database
define('DB_HOST', 'localhost');
define('DB_USER', 'nrrskfvk_user_situneo_digital');
define('DB_PASS', 'Devin1922$');
define('DB_NAME', 'nrrskfvk_situneo_digital');

echo "╔════════════════════════════════════════════╗\n";
echo "║   SITUNEO DIGITAL - Database Seeder       ║\n";
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

// Ambil semua file seed
$seedDir = __DIR__ . '/seeds';
$seedFiles = glob($seedDir . '/*.sql');
sort($seedFiles); // Urutkan berdasarkan nama file

if (empty($seedFiles)) {
    die("❌ No seed files found!\n");
}

echo "🌱 Found " . count($seedFiles) . " seed files\n\n";

$success = 0;
$failed = 0;
$errors = [];

// Jalankan setiap seed
foreach ($seedFiles as $file) {
    $filename = basename($file);
    echo "🌱 Seeding: $filename ... ";

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
echo "📊 Seeding Summary:\n";
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
    echo "🎉 Database seeded successfully!\n\n";

    // Buat lock file
    $lockFile = __DIR__ . '/../config/seeded.lock';
    file_put_contents($lockFile, date('Y-m-d H:i:s'));

    echo "🔒 Created lock file: config/seeded.lock\n";
    echo "⚠️  PENTING: Hapus file database/seed.php ini untuk keamanan!\n\n";

    echo "✅ Setup Complete! Anda bisa login dengan:\n";
    echo "   📧 Email: admin@situneo.my.id\n";
    echo "   🔑 Password: admin123\n";
    echo "   ⚠️  Segera ganti password setelah login!\n\n";

    echo "📝 Security checklist:\n";
    echo "   □ Hapus file: database/install.php\n";
    echo "   □ Hapus file: database/seed.php\n";
    echo "   □ Ganti password admin default\n";
    echo "   □ Update file config/database.php dengan credentials yang aman\n\n";
} else {
    echo "❌ Seeding failed! Please fix errors and try again.\n\n";
}

// Tutup koneksi
$mysqli->close();

echo "👋 Done!\n";
