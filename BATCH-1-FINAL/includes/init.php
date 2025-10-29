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

// ===================================
// ERROR HANDLING SETUP
// ===================================
// Custom error handler untuk tangkap semua PHP errors
function situneo_error_handler($errno, $errstr, $errfile, $errline) {
    $error_types = [
        E_ERROR => 'ERROR',
        E_WARNING => 'WARNING',
        E_NOTICE => 'NOTICE',
        E_USER_ERROR => 'USER ERROR',
        E_USER_WARNING => 'USER WARNING',
        E_USER_NOTICE => 'USER NOTICE'
    ];

    $type = $error_types[$errno] ?? 'UNKNOWN';
    $message = "<div style='background:#ff4444;color:white;padding:20px;margin:10px;border-radius:8px;font-family:monospace;'>
        <h3 style='margin:0 0 10px 0;'>⚠️ PHP {$type}</h3>
        <p style='margin:5px 0;'><strong>Message:</strong> {$errstr}</p>
        <p style='margin:5px 0;'><strong>File:</strong> {$errfile}</p>
        <p style='margin:5px 0;'><strong>Line:</strong> {$errline}</p>
        <hr style='margin:10px 0;border:none;border-top:1px solid rgba(255,255,255,0.3);'>
        <small>💡 Check your PHP error log or contact support@situneo.my.id</small>
    </div>";

    echo $message;

    // Jangan stop execution untuk warnings/notices
    if ($errno !== E_WARNING && $errno !== E_NOTICE) {
        exit(1);
    }

    return true;
}

// Set custom error handler
set_error_handler('situneo_error_handler');

// Exception handler untuk uncaught exceptions
function situneo_exception_handler($exception) {
    echo "<div style='background:#ff4444;color:white;padding:20px;margin:10px;border-radius:8px;font-family:monospace;'>
        <h3 style='margin:0 0 10px 0;'>⚠️ FATAL ERROR</h3>
        <p style='margin:5px 0;'><strong>Exception:</strong> " . get_class($exception) . "</p>
        <p style='margin:5px 0;'><strong>Message:</strong> " . $exception->getMessage() . "</p>
        <p style='margin:5px 0;'><strong>File:</strong> " . $exception->getFile() . "</p>
        <p style='margin:5px 0;'><strong>Line:</strong> " . $exception->getLine() . "</p>
        <hr style='margin:10px 0;border:none;border-top:1px solid rgba(255,255,255,0.3);'>
        <small>💡 Check your configuration files or contact support@situneo.my.id</small>
    </div>";
    exit(1);
}

set_exception_handler('situneo_exception_handler');

// ===================================
// HELPER FUNCTION: Safe Require
// ===================================
function situneo_safe_require($file, $description = '') {
    if (!file_exists($file)) {
        $desc = $description ? " ($description)" : '';
        echo "<div style='background:#ff4444;color:white;padding:20px;margin:10px;border-radius:8px;font-family:monospace;'>
            <h3 style='margin:0 0 10px 0;'>❌ MISSING FILE</h3>
            <p style='margin:5px 0;'><strong>File:</strong> {$file}{$desc}</p>
            <p style='margin:5px 0;'><strong>Solution:</strong></p>
            <ul style='margin:5px 0;padding-left:20px;'>
                <li>Make sure all files are uploaded correctly</li>
                <li>Check file permissions (should be 644)</li>
                <li>Re-upload BATCH-1-FINAL.zip and extract again</li>
            </ul>
            <hr style='margin:10px 0;border:none;border-top:1px solid rgba(255,255,255,0.3);'>
            <small>💡 Need help? Contact support@situneo.my.id</small>
        </div>";
        exit(1);
    }

    require_once $file;
    return true;
}

// ===================================
// LOAD CONFIG FILES
// ===================================
situneo_safe_require(__DIR__ . '/../config/database.php', 'Database Configuration');
situneo_safe_require(__DIR__ . '/../config/constants.php', 'System Constants');
situneo_safe_require(__DIR__ . '/../config/session.php', 'Session Management');
situneo_safe_require(__DIR__ . '/../config/language.php', 'Language System');

// ===================================
// LOAD HELPER FUNCTIONS
// ===================================
situneo_safe_require(__DIR__ . '/functions/auth.php', 'Authentication Functions');
situneo_safe_require(__DIR__ . '/functions/format.php', 'Format Functions');
situneo_safe_require(__DIR__ . '/functions/validation.php', 'Validation Functions');
situneo_safe_require(__DIR__ . '/functions/security.php', 'Security Functions');
situneo_safe_require(__DIR__ . '/functions/string.php', 'String Utilities');
situneo_safe_require(__DIR__ . '/functions/url.php', 'URL Helpers');

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

// ===================================
// SAFE INCLUDE - Prevent Blank Pages
// ===================================
/**
 * Safely include a component file
 * Kalau file tidak ada, tampilkan warning tapi jangan crash
 *
 * @param string $file Path to file (relative to project root)
 * @param string $description Optional description for error message
 * @return bool True if included, false if not found
 */
function safe_include($file, $description = '') {
    // Support relative paths from caller
    if (strpos($file, '/') !== 0) {
        // Relative path, resolve from document root
        $file = $_SERVER['DOCUMENT_ROOT'] . '/' . ltrim($file, './');
    }

    if (!file_exists($file)) {
        $desc = $description ? " ($description)" : '';
        echo "
        <div style='background:rgba(255,180,0,0.2);border-left:4px solid #FFB400;padding:15px;margin:10px 0;color:#1a1a2e;border-radius:4px;'>
            <strong style='color:#FF8C00;'>⚠️ Component Missing:</strong> {$file}{$desc}
            <br><small style='color:#666;'>The page will continue loading, but this component will be skipped.</small>
        </div>";
        return false;
    }

    if (!is_readable($file)) {
        $desc = $description ? " ($description)" : '';
        echo "
        <div style='background:rgba(255,68,68,0.2);border-left:4px solid #ff4444;padding:15px;margin:10px 0;color:#1a1a2e;border-radius:4px;'>
            <strong style='color:#ff4444;'>❌ Component Not Readable:</strong> {$file}{$desc}
            <br><small style='color:#666;'>Check file permissions (should be 644).</small>
        </div>";
        return false;
    }

    include $file;
    return true;
}

/**
 * Safely include a component - absolute path version
 * For including components relative to current directory
 *
 * @param string $file Relative path from current file
 * @param string $description Optional description
 * @return bool
 */
function safe_include_relative($file, $description = '') {
    // Get caller directory
    $backtrace = debug_backtrace();
    $caller_dir = dirname($backtrace[0]['file']);
    $full_path = $caller_dir . '/' . $file;

    return safe_include($full_path, $description);
}

// Success message! (opsional, bisa di-comment)
// echo "✅ Init file loaded successfully!";
?>
