<?php
require_once __DIR__ . '/../includes/init.php';

// Redirect if already logged in
if (is_logged_in()) {
    redirect(APP_URL . '/client/dashboard.php');
}

$error = '';
$success = '';

// Handle registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = clean_input($_POST['name'] ?? '');
    $email = clean_input($_POST['email'] ?? '');
    $phone = clean_input($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';
    $role = (int)($_POST['role'] ?? ROLE_CLIENT);
    $terms = isset($_POST['terms']);

    // Validation
    if (empty($name) || empty($email) || empty($phone) || empty($password)) {
        $error = 'Semua field wajib diisi.';
    } elseif (!is_valid_email($email)) {
        $error = 'Format email tidak valid.';
    } elseif (!is_valid_phone($phone)) {
        $error = 'Format nomor HP tidak valid.';
    } elseif (!is_valid_password($password)) {
        $error = 'Password minimal 6 karakter.';
    } elseif ($password !== $password_confirm) {
        $error = 'Konfirmasi password tidak cocok.';
    } elseif (!$terms) {
        $error = 'Anda harus menyetujui syarat dan ketentuan.';
    } elseif (email_exists($email)) {
        $error = 'Email sudah terdaftar.';
    } else {
        // Create user
        $user_data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $password,
            'role' => $role
        ];

        $user_id = create_user($user_data);

        if ($user_id) {
            // Send verification email
            $verification_token = generate_token();
            send_verification_email($email, $verification_token);

            log_activity($user_id, 'register', 'New user registered');

            set_flash('success', 'Pendaftaran berhasil! Silakan cek email Anda untuk verifikasi.');
            redirect('login.php');
        } else {
            $error = 'Terjadi kesalahan. Silakan coba lagi.';
        }
    }
}

$page_title = 'Register - ' . APP_NAME;
?>
<!DOCTYPE html>
<html lang="<?= get_language() ?>">
<head>
    <?php include __DIR__ . '/../components/layout/head.php'; ?>
    <link rel="stylesheet" href="login.php" type="text/css">
</head>
<body>
    <div class="auth-page">
        <div class="auth-card" data-aos="zoom-in" style="max-width: 550px;">
            <div class="auth-logo">
                <h1><?= APP_NAME ?></h1>
                <span class="nib-badge"><i class="bi bi-shield-check"></i> NIB: <?= COMPANY_NIB ?></span>
                <h5 class="mt-3 mb-2">Daftar Akun</h5>
                <p class="text-muted">Buat akun baru Anda</p>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle"></i> <?= e($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= e($_POST['name'] ?? '') ?>" required autofocus>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= e($_POST['email'] ?? '') ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Nomor HP</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="<?= e($_POST['phone'] ?? '') ?>" placeholder="08xxxxxxxxxx" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <small class="text-muted">Minimal 6 karakter</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password_confirm" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Daftar Sebagai</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="role_client" value="<?= ROLE_CLIENT ?>" checked>
                                <label class="form-check-label" for="role_client">
                                    <strong>Client</strong><br>
                                    <small class="text-muted">Saya ingin memesan layanan</small>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="role_partner" value="<?= ROLE_PARTNER ?>">
                                <label class="form-check-label" for="role_partner">
                                    <strong>Partner</strong><br>
                                    <small class="text-muted">Saya ingin menjadi mitra</small>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                    <label class="form-check-label" for="terms">
                        Saya menyetujui <a href="#" target="_blank">Syarat dan Ketentuan</a>
                    </label>
                </div>

                <button type="submit" class="btn btn-login">
                    <i class="bi bi-person-plus"></i> Daftar Sekarang
                </button>
            </form>

            <div class="text-center mt-4">
                <p class="mb-0">Sudah punya akun? <a href="login.php">Login di sini</a></p>
            </div>

            <div class="text-center mt-3">
                <a href="<?= APP_URL ?>" class="btn btn-sm btn-link">
                    <i class="bi bi-house"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/../components/layout/scripts.php'; ?>
</body>
</html>
