<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Database Connection
 * ================================================
 * File ini untuk koneksi ke database MySQL
 * Ganti sesuai dengan setting hosting Anda
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

if (DB_HOST === 'localhost' && DB_USER === 'nrrskfvk_user_situneo_digital') {
    $db_config_errors[] = "⚠️ Anda masih menggunakan database CONFIG DEFAULT!";
}

if (empty(DB_HOST) || empty(DB_USER) || empty(DB_NAME)) {
    $db_config_errors[] = "❌ Database configuration tidak lengkap!";
}

// Kalau ada error konfigurasi, tampilkan pesan bantuan
if (!empty($db_config_errors)) {
    echo "<!DOCTYPE html>
    <html lang='id'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Database Configuration Error - SITUNEO DIGITAL</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
                color: white;
                margin: 0;
                padding: 20px;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .error-container {
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 180, 0, 0.3);
                border-radius: 16px;
                padding: 40px;
                max-width: 700px;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            }
            .error-header {
                display: flex;
                align-items: center;
                gap: 15px;
                margin-bottom: 25px;
                padding-bottom: 20px;
                border-bottom: 2px solid rgba(255, 180, 0, 0.3);
            }
            .error-icon {
                font-size: 48px;
            }
            .error-title {
                font-size: 28px;
                color: #FFB400;
                margin: 0;
                font-weight: 700;
            }
            .error-list {
                background: rgba(255, 68, 68, 0.1);
                border-left: 4px solid #ff4444;
                padding: 20px;
                margin: 20px 0;
                border-radius: 8px;
            }
            .error-list ul {
                margin: 10px 0;
                padding-left: 20px;
            }
            .error-list li {
                margin: 8px 0;
                line-height: 1.6;
            }
            .solution-box {
                background: rgba(76, 175, 80, 0.1);
                border-left: 4px solid #4CAF50;
                padding: 20px;
                margin: 20px 0;
                border-radius: 8px;
            }
            .solution-box h3 {
                color: #4CAF50;
                margin-top: 0;
                font-size: 20px;
            }
            .code-block {
                background: rgba(0, 0, 0, 0.4);
                padding: 15px;
                border-radius: 8px;
                font-family: 'Courier New', monospace;
                font-size: 14px;
                overflow-x: auto;
                margin: 10px 0;
            }
            .step {
                margin: 15px 0;
                padding-left: 30px;
                position: relative;
            }
            .step::before {
                content: '▶';
                position: absolute;
                left: 10px;
                color: #FFB400;
            }
            .help-footer {
                text-align: center;
                margin-top: 30px;
                padding-top: 20px;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                color: rgba(255, 255, 255, 0.6);
            }
            .help-footer a {
                color: #FFB400;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class='error-container'>
            <div class='error-header'>
                <div class='error-icon'>🔧</div>
                <h1 class='error-title'>Database Configuration Error</h1>
            </div>

            <div class='error-list'>
                <h3>❌ Masalah yang terdeteksi:</h3>
                <ul>";

    foreach ($db_config_errors as $error) {
        echo "<li>{$error}</li>";
    }

    echo "      </ul>
            </div>

            <div class='solution-box'>
                <h3>✅ Cara Memperbaiki:</h3>

                <div class='step'>
                    <strong>1. Buka cPanel Anda</strong><br>
                    Login ke cPanel hosting Anda
                </div>

                <div class='step'>
                    <strong>2. Buat Database MySQL</strong><br>
                    • Cari menu \"MySQL Databases\"<br>
                    • Buat database baru (contoh: namauser_situneo)<br>
                    • Buat user baru dengan password<br>
                    • Add user ke database dengan ALL PRIVILEGES
                </div>

                <div class='step'>
                    <strong>3. Edit file config/database.php</strong><br>
                    Ganti nilai berikut:
                    <div class='code-block'>
define('DB_HOST', 'localhost');<br>
define('DB_USER', 'namauser_dbuser'); &larr; Username database Anda<br>
define('DB_PASS', 'password_anda');   &larr; Password database Anda<br>
define('DB_NAME', 'namauser_situneo'); &larr; Nama database Anda
                    </div>
                </div>

                <div class='step'>
                    <strong>4. Import database.sql</strong><br>
                    • Buka phpMyAdmin<br>
                    • Pilih database Anda<br>
                    • Klik tab \"Import\"<br>
                    • Upload file database.sql<br>
                    • Klik \"Go\"
                </div>

                <div class='step'>
                    <strong>5. Refresh halaman ini</strong><br>
                    Setelah langkah 1-4 selesai, refresh halaman ini.
                </div>
            </div>

            <div class='help-footer'>
                <p>💡 Butuh bantuan? Hubungi <a href='mailto:support@situneo.my.id'>support@situneo.my.id</a></p>
                <p>📖 Atau baca <a href='INSTALL.md' target='_blank'>INSTALL.md</a> untuk panduan lengkap</p>
            </div>
        </div>
    </body>
    </html>";
    exit;
}

// ===================================
// KONEKSI DATABASE
// ===================================
try {
    // Buat koneksi ke database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Cek apakah koneksi berhasil
    if ($conn->connect_error) {
        throw new Exception($conn->connect_error);
    }

    // Set charset ke UTF-8 (supaya bisa tampilkan bahasa Indonesia)
    $conn->set_charset("utf8mb4");

} catch (Exception $e) {
    // Tampilkan error dengan helpful message
    echo "<!DOCTYPE html>
    <html lang='id'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Database Connection Error - SITUNEO DIGITAL</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
                color: white;
                margin: 0;
                padding: 20px;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .error-container {
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 68, 68, 0.5);
                border-radius: 16px;
                padding: 40px;
                max-width: 700px;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            }
            .error-header {
                display: flex;
                align-items: center;
                gap: 15px;
                margin-bottom: 25px;
                padding-bottom: 20px;
                border-bottom: 2px solid rgba(255, 68, 68, 0.5);
            }
            .error-icon {
                font-size: 48px;
            }
            .error-title {
                font-size: 28px;
                color: #ff4444;
                margin: 0;
                font-weight: 700;
            }
            .error-message {
                background: rgba(255, 68, 68, 0.1);
                border: 1px solid rgba(255, 68, 68, 0.3);
                padding: 20px;
                border-radius: 8px;
                margin: 20px 0;
                font-family: 'Courier New', monospace;
                font-size: 14px;
            }
            .solution-list {
                background: rgba(255, 180, 0, 0.1);
                border-left: 4px solid #FFB400;
                padding: 20px;
                margin: 20px 0;
                border-radius: 8px;
            }
            .solution-list h3 {
                color: #FFB400;
                margin-top: 0;
            }
            .solution-list ul {
                margin: 10px 0;
                padding-left: 20px;
            }
            .solution-list li {
                margin: 10px 0;
                line-height: 1.6;
            }
            .help-footer {
                text-align: center;
                margin-top: 30px;
                padding-top: 20px;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                color: rgba(255, 255, 255, 0.6);
            }
            .help-footer a {
                color: #FFB400;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class='error-container'>
            <div class='error-header'>
                <div class='error-icon'>❌</div>
                <h1 class='error-title'>Koneksi Database Gagal</h1>
            </div>

            <div class='error-message'>
                <strong>Error Message:</strong><br>
                {$e->getMessage()}
            </div>

            <div class='solution-list'>
                <h3>🔧 Kemungkinan Penyebab & Solusi:</h3>
                <ul>
                    <li><strong>Username atau password salah</strong><br>
                        → Periksa DB_USER dan DB_PASS di config/database.php</li>

                    <li><strong>Database belum dibuat</strong><br>
                        → Buat database di cPanel → MySQL Databases</li>

                    <li><strong>User belum di-assign ke database</strong><br>
                        → Di cPanel, add user ke database dengan ALL PRIVILEGES</li>

                    <li><strong>Database name salah</strong><br>
                        → Periksa DB_NAME di config/database.php harus sama dengan nama di cPanel</li>

                    <li><strong>MySQL server down</strong><br>
                        → Hubungi hosting provider Anda</li>
                </ul>
            </div>

            <div class='help-footer'>
                <p>💡 Butuh bantuan? Hubungi <a href='mailto:support@situneo.my.id'>support@situneo.my.id</a></p>
                <p>📖 Atau baca <a href='INSTALL.md' target='_blank'>INSTALL.md</a> untuk panduan lengkap</p>
            </div>
        </div>
    </body>
    </html>";
    exit;
}

// Kalau berhasil (opsional, bisa dihapus nanti)
// echo "✅ Koneksi database berhasil!";
?>
