<?php
// Test 6: With navbar - This might hang if navbar has issues
set_time_limit(10);
ob_start();
require_once __DIR__ . '/includes/init.php';

$page_title = "Test 6 - With Navbar";
?>
<!DOCTYPE html>
<html lang="<?= get_language() ?>">
<head>
    <?php include __DIR__ . '/components/layout/head.php'; ?>
    <style>
        .test-banner { background: #FFB400; color: #000; padding: 20px; text-align: center; font-weight: bold; margin-top: 80px; }
    </style>
</head>
<body>
    <?php
    // Try to include navbar
    echo "<!-- Navbar loading started -->";
    flush();
    include __DIR__ . '/components/layout/navbar.php';
    echo "<!-- Navbar loading finished -->";
    flush();
    ?>

    <div class="test-banner">🧪 TEST 6 - Navbar Loaded Successfully!</div>

    <div class="container" style="padding: 50px 0;">
        <div class="text-center" style="color: #fff;">
            <h1 style="color: #FFB400;">✅ TEST 6 PASSED!</h1>
            <p style="font-size: 1.5rem; color: #00ff88;">Navbar loaded without hanging!</p>

            <div style="margin-top: 30px;">
                <a href="index.php" class="btn btn-primary btn-lg">✅ Ready! Go to Homepage</a>
                <a href="test5.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/components/layout/scripts.php'; ?>
</body>
</html>
<?php ob_end_flush(); ?>
