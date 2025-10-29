<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITUNEO DIGITAL - System Test</title>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #1A1A2E 0%, #0F3057 100%);
            color: #fff;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        h1 {
            color: #FFB400;
            text-align: center;
            margin-bottom: 10px;
            font-size: 2.5rem;
        }
        .subtitle {
            text-align: center;
            color: #aaa;
            margin-bottom: 30px;
        }
        .test-section {
            background: rgba(255, 255, 255, 0.03);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            border-left: 4px solid #FFB400;
        }
        .test-section h2 {
            color: #FFB400;
            margin-top: 0;
            font-size: 1.3rem;
        }
        .test-item {
            padding: 10px;
            margin: 5px 0;
            background: rgba(0,0,0,0.2);
            border-radius: 5px;
            display: flex;
            align-items: center;
        }
        .test-item .icon {
            font-size: 20px;
            margin-right: 10px;
            min-width: 30px;
        }
        .success { color: #00ff88; }
        .error { color: #ff4444; }
        .warning { color: #ffaa00; }
        .info { color: #44aaff; }
        code {
            background: rgba(0,0,0,0.3);
            padding: 2px 6px;
            border-radius: 3px;
            color: #FFD700;
            font-size: 0.9em;
        }
        .summary {
            background: linear-gradient(135deg, rgba(255,180,0,0.1), rgba(30,92,153,0.1));
            border: 2px solid #FFB400;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
            text-align: center;
        }
        .summary h3 {
            color: #FFB400;
            margin-top: 0;
        }
        .big-check {
            font-size: 4rem;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 SITUNEO DIGITAL</h1>
        <p class="subtitle">System Diagnostic Test - BATCH 1 COMPLETE</p>

        <?php
        $errors = 0;
        $warnings = 0;
        $passed = 0;

        // Test 1: PHP Version
        echo '<div class="test-section">';
        echo '<h2>Test 1: PHP Version</h2>';
        if (version_compare(PHP_VERSION, '7.4.0', '>=')) {
            echo '<div class="test-item"><span class="icon success">✅</span> PHP version: <strong>' . PHP_VERSION . '</strong> (OK)</div>';
            $passed++;
        } else {
            echo '<div class="test-item"><span class="icon error">❌</span> PHP version: <strong>' . PHP_VERSION . '</strong> (Minimal 7.4 required!)</div>';
            $errors++;
        }
        echo '</div>';

        // Test 2: File Structure
        echo '<div class="test-section">';
        echo '<h2>Test 2: File Structure</h2>';

        $required_files = [
            'includes/init.php',
            'config/database.php',
            'config/constants.php',
            'config/session.php',
            'config/language.php',
            'components/layout/head.php',
            'components/layout/navbar.php',
            'components/layout/footer.php',
            'components/breadcrumb.php',
            'assets/css/variables.css',
            'assets/js/main.js',
            'auth/login.php',
            'auth/register.php',
            'pages/about.php',
            'pages/contact.php',
            'pages/faq.php',
            'database.sql'
        ];

        foreach ($required_files as $file) {
            if (file_exists(__DIR__ . '/' . $file)) {
                echo '<div class="test-item"><span class="icon success">✅</span> <code>' . $file . '</code></div>';
                $passed++;
            } else {
                echo '<div class="test-item"><span class="icon error">❌</span> <code>' . $file . '</code> NOT FOUND!</div>';
                $errors++;
            }
        }
        echo '</div>';

        // Test 3: Load Init File
        echo '<div class="test-section">';
        echo '<h2>Test 3: Load Init File</h2>';
        try {
            require_once __DIR__ . '/includes/init.php';
            echo '<div class="test-item"><span class="icon success">✅</span> Init file loaded successfully</div>';
            $passed++;
        } catch (Exception $e) {
            echo '<div class="test-item"><span class="icon error">❌</span> Error loading init: ' . $e->getMessage() . '</div>';
            $errors++;
        }
        echo '</div>';

        // Test 4: Constants
        echo '<div class="test-section">';
        echo '<h2>Test 4: System Constants</h2>';
        $constants = ['APP_NAME', 'APP_URL', 'DB_HOST', 'DB_NAME', 'DB_USER', 'COMPANY_NIB', 'COMPANY_WHATSAPP'];
        foreach ($constants as $const) {
            if (defined($const)) {
                $value = constant($const);
                // Mask password
                if (strpos($const, 'PASS') !== false) $value = '••••••••';
                echo '<div class="test-item"><span class="icon success">✅</span> <code>' . $const . '</code> = ' . htmlspecialchars($value) . '</div>';
                $passed++;
            } else {
                echo '<div class="test-item"><span class="icon error">❌</span> <code>' . $const . '</code> NOT DEFINED!</div>';
                $errors++;
            }
        }
        echo '</div>';

        // Test 5: Database Connection
        echo '<div class="test-section">';
        echo '<h2>Test 5: Database Connection</h2>';
        if (isset($conn) && $conn instanceof mysqli) {
            if ($conn->ping()) {
                echo '<div class="test-item"><span class="icon success">✅</span> Database connected! (<code>' . DB_NAME . '</code> @ <code>' . DB_HOST . '</code>)</div>';
                $passed++;

                // Check tables
                $result = $conn->query("SHOW TABLES");
                $table_count = $result->num_rows;
                if ($table_count >= 17) {
                    echo '<div class="test-item"><span class="icon success">✅</span> Database has <strong>' . $table_count . ' tables</strong> (Expected: 17)</div>';
                    $passed++;
                } elseif ($table_count > 0) {
                    echo '<div class="test-item"><span class="icon warning">⚠️</span> Database has <strong>' . $table_count . ' tables</strong> (Expected: 17 - please import database.sql)</div>';
                    $warnings++;
                } else {
                    echo '<div class="test-item"><span class="icon error">❌</span> Database has <strong>0 tables</strong> - Import database.sql NOW!</div>';
                    $errors++;
                }
            } else {
                echo '<div class="test-item"><span class="icon error">❌</span> Database connection failed: ' . $conn->connect_error . '</div>';
                $errors++;
            }
        } else {
            echo '<div class="test-item"><span class="icon error">❌</span> Database connection not initialized</div>';
            $errors++;
        }
        echo '</div>';

        // Test 6: Helper Functions
        echo '<div class="test-section">';
        echo '<h2>Test 6: Helper Functions</h2>';
        $functions = [
            'e' => 'Security (XSS prevention)',
            'clean_input' => 'Security (Input sanitization)',
            'format_rupiah' => 'Format (Currency)',
            'is_logged_in' => 'Auth (Check login)',
            'whatsapp_link' => 'URL (WhatsApp link)'
        ];
        foreach ($functions as $func => $desc) {
            if (function_exists($func)) {
                echo '<div class="test-item"><span class="icon success">✅</span> <code>' . $func . '()</code> - ' . $desc . '</div>';
                $passed++;
            } else {
                echo '<div class="test-item"><span class="icon error">❌</span> <code>' . $func . '()</code> NOT FOUND!</div>';
                $errors++;
            }
        }
        echo '</div>';

        // Test 7: Public Pages Accessibility
        echo '<div class="test-section">';
        echo '<h2>Test 7: Public Pages</h2>';
        $pages = [
            'index.php' => 'Homepage',
            'pages/about.php' => 'About',
            'pages/contact.php' => 'Contact',
            'pages/faq.php' => 'FAQ',
            'auth/login.php' => 'Login',
            'auth/register.php' => 'Register'
        ];
        foreach ($pages as $path => $name) {
            if (file_exists(__DIR__ . '/' . $path)) {
                echo '<div class="test-item"><span class="icon success">✅</span> <strong>' . $name . '</strong> - <code>/' . $path . '</code></div>';
                $passed++;
            } else {
                echo '<div class="test-item"><span class="icon error">❌</span> <strong>' . $name . '</strong> - <code>/' . $path . '</code> NOT FOUND!</div>';
                $errors++;
            }
        }
        echo '</div>';

        // Summary
        $total = $passed + $errors + $warnings;
        $percentage = $total > 0 ? round(($passed / $total) * 100) : 0;

        echo '<div class="summary">';
        if ($errors === 0) {
            echo '<div class="big-check success">✅</div>';
            echo '<h3>ALL TESTS PASSED!</h3>';
            echo '<p>Your SITUNEO DIGITAL installation is <strong>100% ready</strong>!</p>';
            echo '<p style="margin-top: 20px;">✅ <strong>' . $passed . '</strong> tests passed<br>';
            if ($warnings > 0) {
                echo '⚠️ <strong>' . $warnings . '</strong> warnings (minor issues)</p>';
            } else {
                echo '⚠️ <strong>0</strong> warnings</p>';
            }
            echo '<p style="margin-top: 20px; font-size: 1.1rem;"><strong>Next steps:</strong></p>';
            echo '<p>1. Visit <a href="index.php" style="color: #FFB400;">Homepage</a></p>';
            echo '<p>2. Visit <a href="auth/login.php" style="color: #FFB400;">Login Page</a></p>';
            echo '<p>3. Login dengan: <code>admin@situneo.my.id</code> / <code>admin123</code></p>';
        } else {
            echo '<div class="big-check error">❌</div>';
            echo '<h3>ATTENTION REQUIRED!</h3>';
            echo '<p>Found <strong style="color: #ff4444;">' . $errors . ' errors</strong> that need fixing.</p>';
            echo '<p>Passed: <strong class="success">' . $passed . '</strong> | Errors: <strong class="error">' . $errors . '</strong> | Warnings: <strong class="warning">' . $warnings . '</strong></p>';
            echo '<p style="margin-top: 20px;"><strong>Action needed:</strong></p>';
            echo '<p>1. Fix all errors shown above</p>';
            echo '<p>2. Check file structure and permissions</p>';
            echo '<p>3. Verify database credentials in <code>config/database.php</code></p>';
            echo '<p>4. Import <code>database.sql</code> if database is empty</p>';
        }
        echo '</div>';
        ?>

        <div style="margin-top: 30px; text-align: center; color: #888; font-size: 0.9rem;">
            <p>📞 Need help? WhatsApp: <strong>083173868915</strong></p>
            <p>📧 Email: <strong>vins@situneo.my.id</strong></p>
            <p>🏢 NIB: <strong>20250926145704515453</strong></p>
        </div>
    </div>
</body>
</html>
