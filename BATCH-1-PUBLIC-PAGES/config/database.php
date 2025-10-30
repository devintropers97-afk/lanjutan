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

// Buat koneksi ke database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Cek apakah koneksi berhasil
if ($conn->connect_error) {
    // Kalau gagal, tampilkan error
    die("❌ KONEKSI DATABASE GAGAL: " . $conn->connect_error);
}

// Set charset ke UTF-8 (supaya bisa tampilkan bahasa Indonesia)
$conn->set_charset("utf8mb4");

// Kalau berhasil (opsional, bisa dihapus nanti)
// echo "✅ Koneksi database berhasil!";
?>
