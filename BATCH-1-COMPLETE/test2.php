<?php
// Test 2: PHP execution without any includes
$start_time = microtime(true);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test 2 - PHP Only</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1A1A2E 0%, #0F3057 100%);
            color: #fff;
            padding: 50px;
            text-align: center;
        }
        h1 { color: #FFB400; font-size: 3rem; }
        .success { color: #00ff88; font-size: 1.5rem; }
        .info { background: rgba(255,255,255,0.1); padding: 20px; border-radius: 10px; margin: 20px auto; max-width: 600px; }
    </style>
</head>
<body>
    <h1>✅ TEST 2 PASSED!</h1>
    <p class="success">PHP execution works - No includes involved</p>

    <div class="info">
        <p><strong>PHP Version:</strong> <?= PHP_VERSION ?></p>
        <p><strong>Server:</strong> <?= $_SERVER['SERVER_SOFTWARE'] ?></p>
        <p><strong>Time:</strong> <?= date('Y-m-d H:i:s') ?></p>
        <p><strong>Execution time:</strong> <?= round((microtime(true) - $start_time) * 1000, 2) ?> ms</p>
        <p><strong>Memory usage:</strong> <?= round(memory_get_usage() / 1024 / 1024, 2) ?> MB</p>
    </div>

    <hr>
    <p><a href="test3.php" style="color: #FFB400;">Next: Test 3 (Config Files)</a></p>
    <p><a href="test1.php" style="color: #888;">Back: Test 1</a></p>
</body>
</html>
