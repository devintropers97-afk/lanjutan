<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Security Functions
 * ================================================
 * File ini berisi function untuk keamanan
 */

/**
 * Sanitize input (bersihkan dari karakter berbahaya)
 */
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

/**
 * Escape output untuk tampilan di HTML
 */
function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Generate random token untuk security
 */
function generate_token($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

/**
 * Hash password menggunakan bcrypt
 */
function hash_password($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

/**
 * Verify password
 */
function verify_password($password, $hash) {
    return password_verify($password, $hash);
}

/**
 * Prevent SQL Injection dengan prepared statement
 * (Sudah otomatis aman kalau pakai mysqli prepare)
 */
function prevent_sql_injection($conn, $value) {
    return $conn->real_escape_string($value);
}

/**
 * Prevent XSS Attack
 */
function prevent_xss($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

/**
 * Generate CSRF Token
 */
function generate_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify CSRF Token
 */
function verify_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
?>
