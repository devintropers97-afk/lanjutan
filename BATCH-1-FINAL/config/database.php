<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Database Connection
 * ================================================
 * File ini untuk koneksi ke database MySQL
 * Ganti sesuai dengan setting hosting Anda
 *
 * BATCH-1.2 FIX:
 * - NO HTML OUTPUT! (prevents "headers already sent" error)
 * - Throw exceptions instead of echo HTML
 * - Let error handler in init.php display errors
 */

// Konfigurasi Database (GANTI SESUAI CPANEL ANDA!)
define('DB_HOST', 'localhost');                      // Biasanya localhost
define('DB_USER', 'nrrskfvk_user_situneo_digital'); // Username database
define('DB_PASS', 'Devin1922$');                     // Password database
define('DB_NAME', 'nrrskfvk_situneo_digital');      // Nama database

// ===================================
// VALIDASI KONFIGURASI DATABASE
// ===================================
$db_config_errors = [];

// Check untuk default config (tapi skip check kalau memang itu config yang bener)
// Cuma warn kalau SEMUA values masih default
if (DB_HOST === 'localhost' &&
    DB_USER === 'nrrskfvk_user_situneo_digital' &&
    DB_PASS === 'Devin1922$' &&
    DB_NAME === 'nrrskfvk_situneo_digital') {
    $db_config_errors[] = "⚠️ Anda masih menggunakan database CONFIG DEFAULT! Edit config/database.php dengan credential Anda.";
}

// Check untuk empty values
if (empty(DB_HOST) || empty(DB_USER) || empty(DB_NAME)) {
    $db_config_errors[] = "❌ Database configuration tidak lengkap! DB_HOST, DB_USER, dan DB_NAME harus diisi.";
}

// Kalau ada error konfigurasi, THROW EXCEPTION (jangan echo HTML!)
if (!empty($db_config_errors)) {
    $error_message = implode("\n", $db_config_errors);
    $error_message .= "\n\n";
    $error_message .= "📖 CARA MEMPERBAIKI:\n";
    $error_message .= "1. Buka cPanel → MySQL Databases\n";
    $error_message .= "2. Buat database baru\n";
    $error_message .= "3. Buat user dengan password\n";
    $error_message .= "4. Add user ke database (ALL PRIVILEGES)\n";
    $error_message .= "5. Edit config/database.php dengan credential Anda\n";
    $error_message .= "6. Import database.sql ke database Anda\n";
    $error_message .= "\n";
    $error_message .= "📞 Need help? Run system-check.php atau baca INSTALL.md";

    throw new Exception("DATABASE CONFIG ERROR\n\n" . $error_message);
}

// ===================================
// KONEKSI DATABASE
// ===================================
try {
    // Suppress mysqli errors (kita handle sendiri)
    mysqli_report(MYSQLI_REPORT_OFF);

    // Buat koneksi ke database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Cek apakah koneksi berhasil
    if ($conn->connect_error) {
        throw new Exception($conn->connect_error);
    }

    // Set charset ke UTF-8 (supaya bisa tampilkan bahasa Indonesia)
    $conn->set_charset("utf8mb4");

    // BATCH-1.2 FIX: Make $conn available globally
    $GLOBALS['conn'] = $conn;

} catch (Exception $e) {
    // THROW EXCEPTION dengan helpful message (jangan echo HTML!)
    $error_message = "KONEKSI DATABASE GAGAL!\n\n";
    $error_message .= "Error: " . $e->getMessage() . "\n\n";
    $error_message .= "🔧 KEMUNGKINAN PENYEBAB & SOLUSI:\n\n";
    $error_message .= "1. USERNAME/PASSWORD SALAH\n";
    $error_message .= "   → Check DB_USER dan DB_PASS di config/database.php\n";
    $error_message .= "   → Pastikan match dengan username/password di cPanel\n\n";
    $error_message .= "2. DATABASE BELUM DIBUAT\n";
    $error_message .= "   → Buat database di cPanel → MySQL Databases\n\n";
    $error_message .= "3. USER BELUM DI-ASSIGN KE DATABASE\n";
    $error_message .= "   → Di cPanel → MySQL Databases\n";
    $error_message .= "   → \"Add User To Database\"\n";
    $error_message .= "   → Select user + database\n";
    $error_message .= "   → Grant ALL PRIVILEGES\n\n";
    $error_message .= "4. DATABASE NAME SALAH\n";
    $error_message .= "   → Check DB_NAME di config/database.php\n";
    $error_message .= "   → Harus SAMA PERSIS dengan nama di cPanel\n";
    $error_message .= "   → Format biasanya: username_database\n\n";
    $error_message .= "5. MYSQL SERVER DOWN\n";
    $error_message .= "   → Hubungi hosting provider Anda\n\n";
    $error_message .= "📞 Need help? Run system-check.php atau hubungi support@situneo.my.id";

    throw new Exception($error_message);
}

// Kalau berhasil (opsional untuk debugging, bisa di-comment)
// echo "✅ Koneksi database berhasil!";
?>
