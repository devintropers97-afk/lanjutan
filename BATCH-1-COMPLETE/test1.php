<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test 1 - Pure HTML</title>
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
    </style>
</head>
<body>
    <h1>✅ TEST 1 PASSED!</h1>
    <p class="success">Pure HTML works - No PHP involved</p>
    <p>Time: <?= date('Y-m-d H:i:s') ?></p>
    <hr>
    <p><a href="test2.php" style="color: #FFB400;">Next: Test 2 (PHP Only)</a></p>
</body>
</html>
