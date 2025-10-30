<?php
// Test 4: Load init.php (with session) - This might hang!
set_time_limit(10); // 10 second timeout
$start_time = microtime(true);

// Output immediately so we know script started
echo "<!DOCTYPE html><html><head><title>Test 4</title><style>body{font-family:Arial;background:#1A1A2E;color:#fff;padding:50px;text-align:center;}h1{color:#FFB400;}.info{background:rgba(255,255,255,0.1);padding:20px;margin:20px;}</style></head><body>";
echo "<h1>🔄 TEST 4 RUNNING...</h1>";
echo "<div class='info'><p>Loading init.php (this includes session.php)...</p>";
flush(); // Force output to browser

$error = null;
try {
    // Try to load init.php
    ob_start();
    require_once __DIR__ . '/includes/init.php';
    ob_end_clean();

    $total_time = round((microtime(true) - $start_time) * 1000, 2);
    echo "<p style='color:#00ff88;'>✅ SUCCESS! init.php loaded in {$total_time}ms</p>";
    echo "<p>Database: " . (isset($conn) ? "✅ Connected" : "❌ Not connected") . "</p>";
    echo "<p>Session: " . (session_status() === PHP_SESSION_ACTIVE ? "✅ Active" : "❌ Not active") . "</p>";
    echo "<p>APP_NAME: " . (defined('APP_NAME') ? APP_NAME : "NOT DEFINED") . "</p>";

} catch (Exception $e) {
    $error = $e->getMessage();
    echo "<p style='color:#ff4444;'>❌ ERROR: " . htmlspecialchars($error) . "</p>";
}

echo "</div>";
echo "<hr>";
echo "<p><a href='test5.php' style='color:#FFB400;'>Next: Test 5 (Full Page)</a></p>";
echo "<p><a href='test3.php' style='color:#888;'>Back: Test 3</a></p>";
echo "</body></html>";
?>
