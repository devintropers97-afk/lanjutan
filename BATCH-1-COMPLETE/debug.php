<?php
/**
 * DEBUG FILE - Untuk troubleshooting homepage
 */

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

echo "<h1>DEBUG MODE - SITUNEO DIGITAL</h1>";
echo "<style>body{font-family:monospace;background:#1a1a2e;color:#fff;padding:20px;}h1{color:#FFB400;}pre{background:#000;padding:15px;border-radius:5px;overflow:auto;}.success{color:#00ff88;}.error{color:#ff4444;}.info{color:#44aaff;}</style>";

echo "<h2>Step 1: PHP Info</h2>";
echo "<pre class='success'>";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Server: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
echo "</pre>";

echo "<h2>Step 2: File Checks</h2>";
echo "<pre>";
$files = [
    'index.php',
    'includes/init.php',
    'config/database.php',
    'config/constants.php',
    'config/session.php',
    'config/language.php'
];

foreach ($files as $file) {
    $path = __DIR__ . '/' . $file;
    if (file_exists($path)) {
        echo "<span class='success'>✅ $file</span> (Size: " . filesize($path) . " bytes)\n";
    } else {
        echo "<span class='error'>❌ $file NOT FOUND!</span>\n";
    }
}
echo "</pre>";

echo "<h2>Step 3: Load Constants</h2>";
echo "<pre>";
try {
    require_once __DIR__ . '/config/database.php';
    echo "<span class='success'>✅ database.php loaded</span>\n";
} catch (Exception $e) {
    echo "<span class='error'>❌ database.php ERROR: " . $e->getMessage() . "</span>\n";
}

try {
    require_once __DIR__ . '/config/constants.php';
    echo "<span class='success'>✅ constants.php loaded</span>\n";
    echo "APP_NAME: " . (defined('APP_NAME') ? APP_NAME : 'NOT DEFINED') . "\n";
    echo "APP_URL: " . (defined('APP_URL') ? APP_URL : 'NOT DEFINED') . "\n";
} catch (Exception $e) {
    echo "<span class='error'>❌ constants.php ERROR: " . $e->getMessage() . "</span>\n";
}
echo "</pre>";

echo "<h2>Step 4: Test Session (WITHOUT init.php)</h2>";
echo "<pre>";
try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        echo "<span class='success'>✅ Session started successfully!</span>\n";
    } else {
        echo "<span class='info'>ℹ️ Session already started</span>\n";
    }
} catch (Exception $e) {
    echo "<span class='error'>❌ Session ERROR: " . $e->getMessage() . "</span>\n";
}
echo "</pre>";

echo "<h2>Step 5: Load Init.php (FULL TEST)</h2>";
echo "<pre>";
try {
    // Reset untuk test ulang
    ob_start();
    require_once __DIR__ . '/includes/init.php';
    ob_end_clean();
    echo "<span class='success'>✅ init.php loaded successfully!</span>\n";

    // Test functions
    echo "\nFunction Tests:\n";
    echo "- e() exists: " . (function_exists('e') ? '✅' : '❌') . "\n";
    echo "- format_rupiah() exists: " . (function_exists('format_rupiah') ? '✅' : '❌') . "\n";
    echo "- is_logged_in() exists: " . (function_exists('is_logged_in') ? '✅' : '❌') . "\n";

    // Test database
    echo "\nDatabase Test:\n";
    if (isset($conn) && $conn instanceof mysqli) {
        if ($conn->ping()) {
            echo "- Connection: <span class='success'>✅ CONNECTED</span>\n";
            echo "- Database: " . DB_NAME . "\n";
        } else {
            echo "- Connection: <span class='error'>❌ FAILED</span>\n";
        }
    } else {
        echo "- Connection: <span class='error'>❌ Not initialized</span>\n";
    }

} catch (Exception $e) {
    echo "<span class='error'>❌ init.php ERROR: " . $e->getMessage() . "</span>\n";
    echo "\nStack Trace:\n" . $e->getTraceAsString() . "\n";
}
echo "</pre>";

echo "<h2>Step 6: Headers Status</h2>";
echo "<pre>";
echo "Headers sent: " . (headers_sent($file, $line) ? "<span class='error'>YES (from $file:$line)</span>" : "<span class='success'>NO</span>") . "\n";
echo "</pre>";

echo "<h2>Conclusion</h2>";
echo "<pre class='info'>";
echo "If all tests above show ✅, then the problem is likely:\n";
echo "1. Whitespace/BOM at the start of index.php\n";
echo "2. Output buffering issue\n";
echo "3. .htaccess configuration\n\n";
echo "Next step: Check index.php directly\n";
echo "Try: <a href='index.php' style='color:#FFB400;'>https://situneo.my.id/index.php</a>\n";
echo "</pre>";

echo "<hr>";
echo "<p style='text-align:center;color:#888;'>Debug file - Delete after troubleshooting</p>";
?>
