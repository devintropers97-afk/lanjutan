<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Initialization File
 * ================================================
 * File ini WAJIB di-include di setiap page
 * File ini akan load semua config & functions
 *
 * CARA PAKAI:
 * require_once 'includes/init.php';
 */

// Load config files
require_once __DIR__ . '/../config/database.php';     // Database connection
require_once __DIR__ . '/../config/constants.php';    // All constants
require_once __DIR__ . '/../config/session.php';      // Session management
require_once __DIR__ . '/../config/language.php';     // Multi-language

// Load helper functions
require_once __DIR__ . '/functions/auth.php';         // Authentication functions
require_once __DIR__ . '/functions/format.php';       // Format functions (Rupiah, date, dll)
require_once __DIR__ . '/functions/validation.php';   // Validation functions
require_once __DIR__ . '/functions/security.php';     // Security functions
require_once __DIR__ . '/functions/string.php';       // String utilities
require_once __DIR__ . '/functions/url.php';          // URL helpers

// Set timezone
date_default_timezone_set('Asia/Jakarta');

// Initialize session (sudah ada di session.php)
// Tapi kita ensure lagi di sini
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set default language kalau belum ada
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'id'; // Default Bahasa Indonesia
}

// Handle language switch (kalau ada parameter ?lang= di URL)
if (isset($_GET['lang']) && in_array($_GET['lang'], ['id', 'en'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

// Function helper untuk mendapatkan current page name
function get_current_page() {
    return basename($_SERVER['PHP_SELF'], '.php');
}

// Function helper untuk check apakah ini homepage
function is_homepage() {
    $current_page = get_current_page();
    return ($current_page === 'index' || $current_page === '');
}

// Function helper untuk get base URL
function base_url($path = '') {
    $base = rtrim(APP_URL, '/');
    $path = ltrim($path, '/');
    return $base . '/' . $path;
}

// Function helper untuk get asset URL
function asset_url($path = '') {
    return base_url('assets/' . ltrim($path, '/'));
}

// Success message! (opsional, bisa di-comment)
// echo "✅ Init file loaded successfully!";
?>
