<?php
// Test 3: Load config files one by one
$start_time = microtime(true);
$tests = [];

// Test 1: database.php
$step_start = microtime(true);
try {
    require_once __DIR__ . '/config/database.php';
    $tests[] = ['name' => 'database.php', 'status' => 'OK', 'time' => round((microtime(true) - $step_start) * 1000, 2)];
} catch (Exception $e) {
    $tests[] = ['name' => 'database.php', 'status' => 'ERROR: ' . $e->getMessage(), 'time' => 0];
}

// Test 2: constants.php
$step_start = microtime(true);
try {
    require_once __DIR__ . '/config/constants.php';
    $tests[] = ['name' => 'constants.php', 'status' => 'OK', 'time' => round((microtime(true) - $step_start) * 1000, 2)];
} catch (Exception $e) {
    $tests[] = ['name' => 'constants.php', 'status' => 'ERROR: ' . $e->getMessage(), 'time' => 0];
}

// Test 3: session.php (THIS MIGHT HANG!)
$step_start = microtime(true);
try {
    // Don't include session.php yet, just check if file exists
    if (file_exists(__DIR__ . '/config/session.php')) {
        $tests[] = ['name' => 'session.php', 'status' => 'EXISTS (not loaded yet)', 'time' => round((microtime(true) - $step_start) * 1000, 2)];
    } else {
        $tests[] = ['name' => 'session.php', 'status' => 'NOT FOUND', 'time' => 0];
    }
} catch (Exception $e) {
    $tests[] = ['name' => 'session.php', 'status' => 'ERROR: ' . $e->getMessage(), 'time' => 0];
}

// Test 4: language.php
$step_start = microtime(true);
try {
    if (file_exists(__DIR__ . '/config/language.php')) {
        $tests[] = ['name' => 'language.php', 'status' => 'EXISTS (not loaded yet)', 'time' => round((microtime(true) - $step_start) * 1000, 2)];
    } else {
        $tests[] = ['name' => 'language.php', 'status' => 'NOT FOUND', 'time' => 0];
    }
} catch (Exception $e) {
    $tests[] = ['name' => 'language.php', 'status' => 'ERROR: ' . $e->getMessage(), 'time' => 0];
}

$total_time = round((microtime(true) - $start_time) * 1000, 2);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test 3 - Config Files</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1A1A2E 0%, #0F3057 100%);
            color: #fff;
            padding: 50px;
            text-align: center;
        }
        h1 { color: #FFB400; font-size: 2.5rem; }
        .success { color: #00ff88; }
        .error { color: #ff4444; }
        .info { background: rgba(255,255,255,0.1); padding: 20px; border-radius: 10px; margin: 20px auto; max-width: 800px; text-align: left; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid rgba(255,255,255,0.1); }
        th { color: #FFB400; }
    </style>
</head>
<body>
    <h1>✅ TEST 3 PASSED!</h1>
    <p class="success">Config files loading test</p>

    <div class="info">
        <table>
            <thead>
                <tr>
                    <th>File</th>
                    <th>Status</th>
                    <th>Time (ms)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tests as $test): ?>
                <tr>
                    <td><?= $test['name'] ?></td>
                    <td class="<?= strpos($test['status'], 'ERROR') !== false ? 'error' : 'success' ?>">
                        <?= $test['status'] ?>
                    </td>
                    <td><?= $test['time'] ?> ms</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p style="margin-top: 20px;"><strong>Total execution time:</strong> <?= $total_time ?> ms</p>
    </div>

    <hr>
    <p><a href="test4.php" style="color: #FFB400;">Next: Test 4 (With Session)</a></p>
    <p><a href="test2.php" style="color: #888;">Back: Test 2</a></p>
</body>
</html>
