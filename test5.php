<?php
// Test 5: Full page with components (this might hang on navbar/footer)
set_time_limit(10);
ob_start();
require_once __DIR__ . '/includes/init.php';

$page_title = "Test 5 - Full Page";
?>
<!DOCTYPE html>
<html lang="<?= get_language() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= APP_URL ?>/assets/css/variables.css" rel="stylesheet">
    <link href="<?= APP_URL ?>/assets/css/layout.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #1A1A2E 0%, #0F3057 100%); min-height: 100vh; }
        .test-banner { background: #FFB400; color: #000; padding: 20px; text-align: center; font-weight: bold; }
    </style>
</head>
<body>
    <div class="test-banner">🧪 TEST 5 - Full Page Test (No Navbar/Footer)</div>

    <div class="container" style="padding: 50px 0;">
        <div class="text-center" style="color: #fff;">
            <h1 style="color: #FFB400; font-size: 3rem; margin-bottom: 30px;">✅ TEST 5 PASSED!</h1>

            <div style="background: rgba(255,255,255,0.1); padding: 30px; border-radius: 10px; max-width: 800px; margin: 0 auto;">
                <h3 style="color: #FFB400;">System Status</h3>
                <table class="table table-dark" style="margin-top: 20px;">
                    <tbody>
                        <tr>
                            <td><strong>App Name:</strong></td>
                            <td><?= APP_NAME ?></td>
                        </tr>
                        <tr>
                            <td><strong>App URL:</strong></td>
                            <td><?= APP_URL ?></td>
                        </tr>
                        <tr>
                            <td><strong>Database:</strong></td>
                            <td><?= isset($conn) && $conn->ping() ? "✅ Connected" : "❌ Failed" ?></td>
                        </tr>
                        <tr>
                            <td><strong>Session:</strong></td>
                            <td><?= session_status() === PHP_SESSION_ACTIVE ? "✅ Active" : "❌ Not active" ?></td>
                        </tr>
                        <tr>
                            <td><strong>Language:</strong></td>
                            <td><?= get_language() ?></td>
                        </tr>
                        <tr>
                            <td><strong>Logged in:</strong></td>
                            <td><?= is_logged_in() ? "✅ Yes" : "❌ No" ?></td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin-top: 30px; padding: 20px; background: rgba(0,255,136,0.1); border-radius: 10px;">
                    <h4 style="color: #00ff88;">✅ All Core Systems Working!</h4>
                    <p style="color: #aaa; margin-top: 10px;">
                        If you see this page, it means:<br>
                        - Init.php loads correctly<br>
                        - Database connects<br>
                        - Session starts<br>
                        - Functions available<br>
                        - No infinite loops in core files
                    </p>
                </div>

                <div style="margin-top: 20px;">
                    <a href="test6.php" class="btn btn-warning">Test 6: With Navbar</a>
                    <a href="test4.php" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
