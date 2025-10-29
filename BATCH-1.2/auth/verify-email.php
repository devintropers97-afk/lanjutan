<?php
require_once __DIR__ . '/../includes/init.php';

$token = $_GET['token'] ?? '';
$error = '';
$success = '';

if (empty($token)) {
    $error = 'Token verifikasi tidak valid.';
} else {
    // TODO: Verify token from database and update user
    $success = 'Email Anda telah berhasil diverifikasi! Silakan login.';
}

$page_title = 'Verifikasi Email - ' . APP_NAME;
?>
<!DOCTYPE html>
<html lang="<?= get_language() ?>">
<head>
    <?php include __DIR__ . '/../components/layout/head.php'; ?>
    <link rel="stylesheet" href="login.php" type="text/css">
</head>
<body>
    <div class="auth-page">
        <div class="auth-card" data-aos="zoom-in" style="text-align: center;">
            <div class="auth-logo">
                <h1><?= APP_NAME ?></h1>
                <h5 class="mt-3 mb-2">Verifikasi Email</h5>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <i class="bi bi-x-circle" style="font-size: 48px;"></i>
                    <p class="mt-3"><?= e($error) ?></p>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="alert alert-success">
                    <i class="bi bi-check-circle" style="font-size: 48px; color: green;"></i>
                    <p class="mt-3"><?= e($success) ?></p>
                </div>
            <?php endif; ?>

            <div class="mt-4">
                <a href="login.php" class="btn btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> Login Sekarang
                </a>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/../components/layout/scripts.php'; ?>
</body>
</html>
