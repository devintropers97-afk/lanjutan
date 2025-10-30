<?php
require_once __DIR__ . '/../includes/init.php';

if (is_logged_in()) {
    redirect(APP_URL . '/client/dashboard.php');
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = clean_input($_POST['email'] ?? '');

    if (empty($email)) {
        $error = 'Email wajib diisi.';
    } elseif (!is_valid_email($email)) {
        $error = 'Format email tidak valid.';
    } elseif (!email_exists($email)) {
        $error = 'Email tidak terdaftar.';
    } else {
        // Generate reset token
        $token = generate_token();
        
        // TODO: Save token to database and send email
        
        $success = 'Link reset password telah dikirim ke email Anda. Silakan cek inbox/spam.';
    }
}

$page_title = 'Lupa Password - ' . APP_NAME;
?>
<!DOCTYPE html>
<html lang="<?= get_language() ?>">
<head>
    <?php include __DIR__ . '/../components/layout/head.php'; ?>
    <link rel="stylesheet" href="login.php" type="text/css">
</head>
<body>
    <div class="auth-page">
        <div class="auth-card" data-aos="zoom-in">
            <div class="auth-logo">
                <h1><?= APP_NAME ?></h1>
                <h5 class="mt-3 mb-2">Lupa Password?</h5>
                <p class="text-muted">Masukkan email Anda untuk reset password</p>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle"></i> <?= e($error) ?>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="alert alert-success">
                    <i class="bi bi-check-circle"></i> <?= e($success) ?>
                </div>
            <?php else: ?>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= e($_POST['email'] ?? '') ?>" required autofocus>
                    </div>

                    <button type="submit" class="btn btn-login">
                        <i class="bi bi-envelope"></i> Kirim Link Reset
                    </button>
                </form>
            <?php endif; ?>

            <div class="text-center mt-4">
                <a href="login.php" class="btn btn-sm btn-link">
                    <i class="bi bi-arrow-left"></i> Kembali ke Login
                </a>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/../components/layout/scripts.php'; ?>
</body>
</html>
