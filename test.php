<?php
/**
 * TEST PAGE - Untuk debug masalah BATCH 2
 * Upload file ini ke /public_html/ dan buka di browser
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

?>
<!DOCTYPE html>
<html>
<head>
    <title>SITUNEO - Test Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .test-box {
            background: white;
            padding: 20px;
            margin: 10px 0;
            border-radius: 10px;
            border-left: 4px solid #1E5C99;
        }
        .success {
            border-left-color: #28a745;
        }
        .error {
            border-left-color: #dc3545;
            background: #ffe6e6;
        }
        h1 { color: #1E5C99; }
        h2 { color: #0F3057; font-size: 18px; }
        code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <h1>🔧 SITUNEO DIGITAL - Test Page</h1>
    <p>Halaman ini untuk mengecek apakah semua file sudah benar.</p>

    <!-- Test 1: PHP Version -->
    <div class="test-box success">
        <h2>✅ Test 1: PHP Version</h2>
        <p>PHP Version: <strong><?= PHP_VERSION ?></strong></p>
        <?php if (version_compare(PHP_VERSION, '7.4.0', '>=')): ?>
            <p style="color: green;">✅ PHP version OK (7.4 or higher)</p>
        <?php else: ?>
            <p style="color: red;">❌ PHP version too old. Need 7.4+</p>
        <?php endif; ?>
    </div>

    <!-- Test 2: File Structure -->
    <div class="test-box <?= file_exists('BATCH-1-PUBLIC-PAGES/includes/init.php') ? 'success' : 'error' ?>">
        <h2><?= file_exists('BATCH-1-PUBLIC-PAGES/includes/init.php') ? '✅' : '❌' ?> Test 2: BATCH-1 Files</h2>
        <?php
        $batch1_files = [
            'BATCH-1-PUBLIC-PAGES/includes/init.php',
            'BATCH-1-PUBLIC-PAGES/config/database.php',
            'BATCH-1-PUBLIC-PAGES/config/constants.php',
            'BATCH-1-PUBLIC-PAGES/components/layout/head.php',
            'BATCH-1-PUBLIC-PAGES/components/layout/navbar.php',
            'BATCH-1-PUBLIC-PAGES/components/layout/footer.php'
        ];

        foreach ($batch1_files as $file):
        ?>
            <p><?= file_exists($file) ? '✅' : '❌' ?> <code><?= $file ?></code></p>
        <?php endforeach; ?>
    </div>

    <!-- Test 3: Load BATCH-1 Init -->
    <div class="test-box">
        <h2>Test 3: Load BATCH-1 Init</h2>
        <?php
        try {
            if (file_exists('BATCH-1-PUBLIC-PAGES/includes/init.php')) {
                require_once 'BATCH-1-PUBLIC-PAGES/includes/init.php';
                echo '<p style="color: green;">✅ init.php loaded successfully!</p>';
            } else {
                echo '<p style="color: red;">❌ init.php not found!</p>';
            }
        } catch (Exception $e) {
            echo '<p style="color: red;">❌ Error loading init.php: ' . $e->getMessage() . '</p>';
        }
        ?>
    </div>

    <!-- Test 4: Constants -->
    <div class="test-box <?= defined('APP_NAME') ? 'success' : 'error' ?>">
        <h2><?= defined('APP_NAME') ? '✅' : '❌' ?> Test 4: Constants</h2>
        <?php
        $constants = ['APP_NAME', 'APP_URL', 'COMPANY_NIB', 'COMPANY_WHATSAPP'];
        foreach ($constants as $const):
        ?>
            <p><?= defined($const) ? '✅' : '❌' ?> <strong><?= $const ?>:</strong> <?= defined($const) ? constant($const) : 'NOT DEFINED' ?></p>
        <?php endforeach; ?>
    </div>

    <!-- Test 5: Database -->
    <div class="test-box <?= isset($conn) && $conn->ping() ? 'success' : 'error' ?>">
        <h2><?= isset($conn) && $conn->ping() ? '✅' : '❌' ?> Test 5: Database Connection</h2>
        <?php if (isset($conn) && $conn->ping()): ?>
            <p style="color: green;">✅ Database connected successfully!</p>
            <p><strong>Database:</strong> <?= DB_NAME ?></p>
        <?php else: ?>
            <p style="color: red;">❌ Database connection failed!</p>
            <p>Check your database credentials in <code>BATCH-1-PUBLIC-PAGES/config/database.php</code></p>
        <?php endif; ?>
    </div>

    <!-- Test 6: Functions -->
    <div class="test-box <?= function_exists('format_rupiah') ? 'success' : 'error' ?>">
        <h2><?= function_exists('format_rupiah') ? '✅' : '❌' ?> Test 6: Helper Functions</h2>
        <?php
        $functions = ['format_rupiah', 'clean_input', 'is_valid_email', 'whatsapp_link'];
        foreach ($functions as $func):
        ?>
            <p><?= function_exists($func) ? '✅' : '❌' ?> <code><?= $func ?>()</code></p>
        <?php endforeach; ?>

        <?php if (function_exists('format_rupiah')): ?>
            <p><strong>Test:</strong> format_rupiah(1000000) = <code><?= format_rupiah(1000000) ?></code></p>
        <?php endif; ?>
    </div>

    <!-- Test 7: BATCH-2 Files -->
    <div class="test-box <?= file_exists('BATCH-2-PUBLIC-PAGES/pages/about.php') ? 'success' : 'error' ?>">
        <h2><?= file_exists('BATCH-2-PUBLIC-PAGES/pages/about.php') ? '✅' : '❌' ?> Test 7: BATCH-2 Files</h2>
        <?php
        $batch2_files = [
            'BATCH-2-PUBLIC-PAGES/pages/about.php',
            'BATCH-2-PUBLIC-PAGES/pages/contact.php',
            'BATCH-2-PUBLIC-PAGES/pages/faq.php',
            'BATCH-2-PUBLIC-PAGES/components/breadcrumb.php',
            'BATCH-2-PUBLIC-PAGES/assets/css/pages.css'
        ];

        foreach ($batch2_files as $file):
        ?>
            <p><?= file_exists($file) ? '✅' : '❌' ?> <code><?= $file ?></code></p>
        <?php endforeach; ?>
    </div>

    <div class="test-box success">
        <h2>📝 Test Results Summary</h2>
        <?php
        $all_good =
            version_compare(PHP_VERSION, '7.4.0', '>=') &&
            file_exists('BATCH-1-PUBLIC-PAGES/includes/init.php') &&
            defined('APP_NAME') &&
            isset($conn) && $conn->ping() &&
            function_exists('format_rupiah');
        ?>

        <?php if ($all_good): ?>
            <p style="color: green; font-size: 18px; font-weight: bold;">
                🎉 SEMUA TEST PASSED! Website siap digunakan!
            </p>
            <p>Anda bisa test halaman:</p>
            <ul>
                <li><a href="BATCH-2-PUBLIC-PAGES/pages/about.php" target="_blank">About Page</a></li>
                <li><a href="BATCH-2-PUBLIC-PAGES/pages/contact.php" target="_blank">Contact Page</a></li>
                <li><a href="BATCH-2-PUBLIC-PAGES/pages/faq.php" target="_blank">FAQ Page</a></li>
            </ul>
        <?php else: ?>
            <p style="color: red; font-size: 18px; font-weight: bold;">
                ❌ ADA MASALAH! Lihat hasil test di atas untuk detail.
            </p>
            <p>Screenshot halaman ini dan kirim ke developer!</p>
        <?php endif; ?>
    </div>

    <div style="text-align: center; margin-top: 30px; color: #999;">
        <p>Test Page by SITUNEO DIGITAL</p>
        <p><small>File ini aman untuk dihapus setelah testing selesai</small></p>
    </div>
</body>
</html>
