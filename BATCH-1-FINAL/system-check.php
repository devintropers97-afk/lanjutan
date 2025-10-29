<?php
/**
 * ================================================
 * SITUNEO DIGITAL - System Check
 * ================================================
 * File ini untuk mengecek semua requirement sistem
 * Jalankan SEBELUM deploy ke production!
 */

// Disable error display untuk clean output
ini_set('display_errors', 0);
error_reporting(E_ALL);

$checks = [];
$all_passed = true;

// ===================================
// 1. CHECK PHP VERSION
// ===================================
$php_version = phpversion();
$php_required = '7.4.0';
$php_ok = version_compare($php_version, $php_required, '>=');

$checks[] = [
    'category' => 'PHP Environment',
    'name' => 'PHP Version',
    'status' => $php_ok,
    'current' => $php_version,
    'required' => '>= ' . $php_required,
    'message' => $php_ok ? 'PHP version OK' : 'PHP version terlalu lama, upgrade ke PHP 7.4 atau lebih baru'
];

if (!$php_ok) $all_passed = false;

// ===================================
// 2. CHECK PHP EXTENSIONS
// ===================================
$required_extensions = [
    'mysqli' => 'Database connection (MySQL)',
    'session' => 'Session management',
    'json' => 'JSON processing',
    'mbstring' => 'Multi-byte string support',
    'openssl' => 'Secure connections'
];

foreach ($required_extensions as $ext => $description) {
    $loaded = extension_loaded($ext);
    $checks[] = [
        'category' => 'PHP Extensions',
        'name' => $ext,
        'status' => $loaded,
        'current' => $loaded ? 'Loaded' : 'Not loaded',
        'required' => 'Required',
        'message' => $loaded ? "$description OK" : "Extension $ext diperlukan untuk $description"
    ];

    if (!$loaded) $all_passed = false;
}

// ===================================
// 3. CHECK DIRECTORY STRUCTURE
// ===================================
$required_dirs = [
    'config' => 'Configuration files',
    'includes' => 'Core includes',
    'includes/functions' => 'Helper functions',
    'components' => 'Reusable components',
    'components/layout' => 'Layout components',
    'assets' => 'Static assets',
    'assets/css' => 'Stylesheets',
    'assets/js' => 'JavaScript files',
    'assets/img' => 'Images'
];

foreach ($required_dirs as $dir => $description) {
    $exists = is_dir(__DIR__ . '/' . $dir);
    $checks[] = [
        'category' => 'Directory Structure',
        'name' => $dir,
        'status' => $exists,
        'current' => $exists ? 'Exists' : 'Missing',
        'required' => 'Required',
        'message' => $exists ? "$description directory OK" : "Directory $dir diperlukan untuk $description"
    ];

    if (!$exists) $all_passed = false;
}

// ===================================
// 4. CHECK REQUIRED FILES
// ===================================
$required_files = [
    'config/database.php' => 'Database configuration',
    'config/constants.php' => 'System constants',
    'config/session.php' => 'Session configuration',
    'config/language.php' => 'Language system',
    'includes/init.php' => 'Initialization file',
    'includes/functions/auth.php' => 'Authentication functions',
    'includes/functions/format.php' => 'Format functions',
    'components/layout/head.php' => 'HTML head component',
    'components/layout/navbar.php' => 'Navigation bar',
    'components/layout/footer.php' => 'Footer component',
    'assets/css/typography.css' => 'Typography styles',
    'assets/css/responsive.css' => 'Responsive design',
    'database.sql' => 'Database structure'
];

foreach ($required_files as $file => $description) {
    $exists = file_exists(__DIR__ . '/' . $file);
    $readable = $exists && is_readable(__DIR__ . '/' . $file);

    $checks[] = [
        'category' => 'Required Files',
        'name' => $file,
        'status' => $readable,
        'current' => $readable ? 'OK' : ($exists ? 'Not readable' : 'Missing'),
        'required' => 'Required',
        'message' => $readable ? "$description OK" : ($exists ? "File $file ada tapi tidak readable, check permissions" : "File $file diperlukan untuk $description")
    ];

    if (!$readable) $all_passed = false;
}

// ===================================
// 5. CHECK FILE PERMISSIONS
// ===================================
$writable_dirs = [
    '.' => 'Root directory (untuk upload)',
];

foreach ($writable_dirs as $dir => $description) {
    $path = __DIR__ . '/' . $dir;
    $writable = is_writable($path);

    $checks[] = [
        'category' => 'File Permissions',
        'name' => $dir === '.' ? 'Root directory' : $dir,
        'status' => $writable,
        'current' => $writable ? 'Writable' : 'Not writable',
        'required' => 'Should be writable',
        'message' => $writable ? "$description writable" : "$description harus writable untuk $description"
    ];
}

// ===================================
// 6. CHECK DATABASE CONFIG
// ===================================
// BATCH-1.2-FINAL FIX: Don't check for specific username strings!
// Instead, check if constants are DEFINED and NOT EMPTY
// This prevents false positives when user legitimately has same username
if (file_exists(__DIR__ . '/config/database.php')) {
    $db_content = file_get_contents(__DIR__ . '/config/database.php');

    // Check if DB constants are defined and not empty
    $has_host = (strpos($db_content, "define('DB_HOST'") !== false &&
                 strpos($db_content, "define('DB_HOST', '')") === false &&
                 strpos($db_content, 'define("DB_HOST", "")') === false);

    $has_user = (strpos($db_content, "define('DB_USER'") !== false &&
                 strpos($db_content, "define('DB_USER', '')") === false &&
                 strpos($db_content, 'define("DB_USER", "")') === false);

    $has_name = (strpos($db_content, "define('DB_NAME'") !== false &&
                 strpos($db_content, "define('DB_NAME', '')") === false &&
                 strpos($db_content, 'define("DB_NAME", "")') === false);

    $has_config = $has_host && $has_user && $has_name;

    $checks[] = [
        'category' => 'Database Configuration',
        'name' => 'Database credentials',
        'status' => $has_config,
        'current' => $has_config ? 'Configured' : 'Missing or empty',
        'required' => 'DB_HOST, DB_USER, DB_NAME must be set and not empty',
        'message' => $has_config ? 'Database configuration OK - constants are defined and not empty' : 'Database configuration tidak lengkap - ada constants yang kosong atau tidak terdefinisi'
    ];

    if (!$has_config) $all_passed = false;
}

// ===================================
// 7. TRY DATABASE CONNECTION
// ===================================
try {
    if (file_exists(__DIR__ . '/config/database.php')) {
        // Suppress output dari database.php
        ob_start();
        include_once __DIR__ . '/config/database.php';
        ob_end_clean();

        if (isset($conn) && $conn instanceof mysqli) {
            if ($conn->connect_error) {
                throw new Exception($conn->connect_error);
            }

            // Test query
            $result = $conn->query("SELECT 1");
            $db_connected = ($result !== false);

            $checks[] = [
                'category' => 'Database Connection',
                'name' => 'MySQL Connection',
                'status' => $db_connected,
                'current' => $db_connected ? 'Connected' : 'Failed',
                'required' => 'Required',
                'message' => $db_connected ? 'Database connection berhasil' : 'Database connection gagal'
            ];

            if (!$db_connected) $all_passed = false;
        } else {
            $checks[] = [
                'category' => 'Database Connection',
                'name' => 'MySQL Connection',
                'status' => false,
                'current' => 'Not initialized',
                'required' => 'Required',
                'message' => 'Database connection tidak terinisialisasi'
            ];
            $all_passed = false;
        }
    }
} catch (Exception $e) {
    $checks[] = [
        'category' => 'Database Connection',
        'name' => 'MySQL Connection',
        'status' => false,
        'current' => 'Error: ' . $e->getMessage(),
        'required' => 'Required',
        'message' => 'Database connection error: ' . $e->getMessage()
    ];
    $all_passed = false;
}

// ===================================
// OUTPUT HTML REPORT
// ===================================
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Check - SITUNEO DIGITAL</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: white;
            padding: 40px 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 2px solid rgba(255, 180, 0, 0.3);
        }

        .header h1 {
            font-size: 42px;
            color: #FFB400;
            margin-bottom: 10px;
        }

        .header .subtitle {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.7);
        }

        .status-badge {
            display: inline-block;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 20px;
            font-weight: 700;
            margin: 20px 0;
        }

        .status-badge.success {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            box-shadow: 0 8px 20px rgba(76, 175, 80, 0.3);
        }

        .status-badge.failed {
            background: linear-gradient(135deg, #ff4444, #cc0000);
            box-shadow: 0 8px 20px rgba(255, 68, 68, 0.3);
        }

        .category {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .category-title {
            font-size: 24px;
            color: #FFB400;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(255, 180, 0, 0.2);
        }

        .check-item {
            display: flex;
            align-items: center;
            padding: 15px;
            margin: 10px 0;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            border-left: 4px solid transparent;
        }

        .check-item.passed {
            border-left-color: #4CAF50;
        }

        .check-item.failed {
            border-left-color: #ff4444;
            background: rgba(255, 68, 68, 0.1);
        }

        .check-icon {
            font-size: 28px;
            margin-right: 20px;
            min-width: 40px;
        }

        .check-details {
            flex: 1;
        }

        .check-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .check-info {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
        }

        .check-message {
            margin-top: 5px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        .check-status {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .check-status.passed {
            background: rgba(76, 175, 80, 0.2);
            color: #4CAF50;
        }

        .check-status.failed {
            background: rgba(255, 68, 68, 0.2);
            color: #ff4444;
        }

        .summary {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 30px;
            margin-top: 40px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .summary h2 {
            color: #FFB400;
            margin-bottom: 20px;
        }

        .summary-stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin: 20px 0;
        }

        .stat {
            text-align: center;
        }

        .stat-number {
            font-size: 48px;
            font-weight: 700;
            line-height: 1;
        }

        .stat-number.passed {
            color: #4CAF50;
        }

        .stat-number.failed {
            color: #ff4444;
        }

        .stat-label {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 5px;
        }

        .action-buttons {
            margin-top: 30px;
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #FFB400, #FF8C00);
            color: #1a1a2e;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 180, 0, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 32px;
            }

            .check-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .check-icon {
                margin-bottom: 10px;
            }

            .summary-stats {
                flex-direction: column;
                gap: 20px;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔍 System Check</h1>
            <p class="subtitle">SITUNEO DIGITAL - Pre-deployment System Check</p>

            <?php if ($all_passed): ?>
                <div class="status-badge success">
                    ✅ ALL CHECKS PASSED!
                </div>
            <?php else: ?>
                <div class="status-badge failed">
                    ❌ SOME CHECKS FAILED
                </div>
            <?php endif; ?>
        </div>

        <?php
        // Group checks by category
        $grouped_checks = [];
        foreach ($checks as $check) {
            $grouped_checks[$check['category']][] = $check;
        }

        // Display each category
        foreach ($grouped_checks as $category => $category_checks):
        ?>
            <div class="category">
                <div class="category-title">
                    <?= htmlspecialchars($category) ?>
                </div>

                <?php foreach ($category_checks as $check): ?>
                    <div class="check-item <?= $check['status'] ? 'passed' : 'failed' ?>">
                        <div class="check-icon">
                            <?= $check['status'] ? '✅' : '❌' ?>
                        </div>
                        <div class="check-details">
                            <div class="check-name">
                                <?= htmlspecialchars($check['name']) ?>
                            </div>
                            <div class="check-info">
                                <strong>Current:</strong> <?= htmlspecialchars($check['current']) ?> |
                                <strong>Required:</strong> <?= htmlspecialchars($check['required']) ?>
                            </div>
                            <div class="check-message">
                                <?= htmlspecialchars($check['message']) ?>
                            </div>
                        </div>
                        <div class="check-status <?= $check['status'] ? 'passed' : 'failed' ?>">
                            <?= $check['status'] ? 'PASSED' : 'FAILED' ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <div class="summary">
            <h2>📊 Summary</h2>

            <div class="summary-stats">
                <div class="stat">
                    <div class="stat-number passed">
                        <?= count(array_filter($checks, function($c) { return $c['status']; })) ?>
                    </div>
                    <div class="stat-label">Passed</div>
                </div>
                <div class="stat">
                    <div class="stat-number failed">
                        <?= count(array_filter($checks, function($c) { return !$c['status']; })) ?>
                    </div>
                    <div class="stat-label">Failed</div>
                </div>
                <div class="stat">
                    <div class="stat-number">
                        <?= count($checks) ?>
                    </div>
                    <div class="stat-label">Total Checks</div>
                </div>
            </div>

            <?php if ($all_passed): ?>
                <p style="margin: 20px 0; font-size: 18px; color: #4CAF50;">
                    🎉 Sistem Anda SIAP untuk production!
                </p>
                <div class="action-buttons">
                    <a href="index.php" class="btn btn-primary">🚀 Launch Website</a>
                    <a href="INSTALL.md" class="btn btn-secondary">📖 Read Docs</a>
                </div>
            <?php else: ?>
                <p style="margin: 20px 0; font-size: 18px; color: #ff4444;">
                    ⚠️ Perbaiki error di atas sebelum deploy ke production!
                </p>
                <div class="action-buttons">
                    <a href="INSTALL.md" class="btn btn-primary">📖 Read Installation Guide</a>
                    <a href="system-check.php" class="btn btn-secondary">🔄 Re-check</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="footer">
            <p>SITUNEO DIGITAL v1.1 | System Check Tool</p>
            <p>Butuh bantuan? Hubungi <a href="mailto:support@situneo.my.id" style="color: #FFB400;">support@situneo.my.id</a></p>
        </div>
    </div>
</body>
</html>
