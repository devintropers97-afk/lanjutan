<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Main Initializer
 * Load all configuration and functions
 * ========================================
 */

// Prevent direct access
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

// Load configuration files
require_once BASE_PATH . '/config/constants.php';
require_once BASE_PATH . '/config/database.php';
require_once BASE_PATH . '/config/settings.php';
require_once BASE_PATH . '/config/routes.php';
require_once BASE_PATH . '/config/email.php';
require_once BASE_PATH . '/config/payment.php';
require_once BASE_PATH . '/config/session.php';
require_once BASE_PATH . '/config/security.php';

// Load helper functions
require_once __DIR__ . '/helpers.php';

// Load utility functions
require_once __DIR__ . '/functions/auth.php';
require_once __DIR__ . '/functions/string.php';
require_once __DIR__ . '/functions/validation.php';
require_once __DIR__ . '/functions/format.php';
require_once __DIR__ . '/functions/security.php';
require_once __DIR__ . '/functions/email.php';
require_once __DIR__ . '/functions/file.php';
require_once __DIR__ . '/functions/notification.php';

// Set error handling
set_error_handler('handleError');
set_exception_handler('handleException');
register_shutdown_function('handleShutdown');

/**
 * Custom error handler
 */
function handleError($errno, $errstr, $errfile, $errline) {
    if (!(error_reporting() & $errno)) {
        return false;
    }

    $error = "[" . date('Y-m-d H:i:s') . "] ";
    $error .= "Error [$errno]: $errstr in $errfile on line $errline\n";

    // Log error
    logError($error);

    // Display error in debug mode
    if (DEBUG_MODE) {
        echo "<div style='background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px; margin: 10px; border-radius: 5px;'>";
        echo "<strong>Error:</strong> $errstr<br>";
        echo "<strong>File:</strong> $errfile<br>";
        echo "<strong>Line:</strong> $errline";
        echo "</div>";
    }

    return true;
}

/**
 * Custom exception handler
 */
function handleException($exception) {
    $error = "[" . date('Y-m-d H:i:s') . "] ";
    $error .= "Exception: " . $exception->getMessage() . "\n";
    $error .= "File: " . $exception->getFile() . "\n";
    $error .= "Line: " . $exception->getLine() . "\n";

    // Log exception
    logError($error);

    // Display exception in debug mode
    if (DEBUG_MODE) {
        echo "<div style='background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px; margin: 10px; border-radius: 5px;'>";
        echo "<strong>Exception:</strong> " . $exception->getMessage() . "<br>";
        echo "<strong>File:</strong> " . $exception->getFile() . "<br>";
        echo "<strong>Line:</strong> " . $exception->getLine();
        echo "</div>";
    } else {
        echo "An error occurred. Please try again later.";
    }
}

/**
 * Shutdown handler for fatal errors
 */
function handleShutdown() {
    $error = error_get_last();

    if ($error && in_array($error['type'], [E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_PARSE])) {
        $errorMsg = "[" . date('Y-m-d H:i:s') . "] ";
        $errorMsg .= "Fatal Error [{$error['type']}]: {$error['message']} ";
        $errorMsg .= "in {$error['file']} on line {$error['line']}\n";

        logError($errorMsg);
    }
}

/**
 * Log error to file
 */
function logError($message) {
    $logFile = BASE_PATH . '/logs/error_' . date('Y-m-d') . '.log';
    $logDir = dirname($logFile);

    // Create logs directory if not exists
    if (!is_dir($logDir)) {
        mkdir($logDir, 0755, true);
    }

    // Append error to log file
    file_put_contents($logFile, $message, FILE_APPEND);
}

// Check maintenance mode
if (isMaintenanceMode() && !isAdmin()) {
    // Show maintenance page
    http_response_code(503);
    include BASE_PATH . '/maintenance.php';
    exit;
}

// Auto-close database connection on script end
register_shutdown_function(function() {
    global $db;
    if ($db) {
        $db->close();
    }
});
?>
