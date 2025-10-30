<?php
require_once __DIR__ . '/../BATCH-1-PUBLIC-PAGES/includes/init.php';

// Redirect if already logged in
if (is_logged_in()) {
    $user_role = get_user_role();
    if ($user_role == ROLE_ADMIN) {
        redirect(APP_URL . '/admin/dashboard.php');
    } elseif ($user_role == ROLE_PARTNER) {
        redirect(APP_URL . '/partner/dashboard.php');
    } else {
        redirect(APP_URL . '/client/dashboard.php');
    }
}

$error = '';
$success = get_flash('success');

// Check for timeout parameter
if (isset($_GET['timeout']) && $_GET['timeout'] == '1') {
    $error = 'Sesi Anda telah berakhir. Silakan login kembali.';
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = clean_input($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    // Validation
    if (empty($email) || empty($password)) {
        $error = 'Email dan password wajib diisi.';
    } elseif (!is_valid_email($email)) {
        $error = 'Format email tidak valid.';
    } else {
        // Attempt login
        $user = login_attempt($email, $password);

        if ($user) {
            // Check if account is active
            if ($user['status'] !== 'active') {
                $error = 'Akun Anda belum aktif atau telah disuspend. Silakan hubungi admin.';
            } else {
                // Login successful
                login_user($user['id'], $remember);
                log_activity($user['id'], 'login', 'User logged in from ' . $_SERVER['REMOTE_ADDR']);

                // Redirect based on role
                if ($user['role'] == ROLE_ADMIN) {
                    redirect(APP_URL . '/admin/dashboard.php');
                } elseif ($user['role'] == ROLE_PARTNER) {
                    redirect(APP_URL . '/partner/dashboard.php');
                } else {
                    redirect(APP_URL . '/client/dashboard.php');
                }
            }
        } else {
            $error = 'Email atau password salah.';
        }
    }
}

$page_title = 'Login - ' . APP_NAME;
$page_description = 'Login ke akun SITUNEO DIGITAL Anda';
?>
<!DOCTYPE html>
<html lang="<?= get_language() ?>">
<head>
    <?php include __DIR__ . '/../BATCH-1-PUBLIC-PAGES/components/layout/head.php'; ?>
    <style>
        .auth-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            padding: 20px;
        }

        .auth-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }

        .auth-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-logo h1 {
            color: var(--dark-blue);
            font-size: 28px;
            font-weight: 900;
            margin-bottom: 5px;
        }

        .auth-logo .nib-badge {
            display: inline-block;
            background: var(--gradient-gold);
            color: var(--dark-blue);
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 11px;
            font-weight: 600;
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-blue);
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid rgba(30, 92, 153, 0.2);
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 0.2rem rgba(255, 180, 0, 0.25);
        }

        .btn-login {
            background: var(--gradient-gold);
            color: var(--dark-blue);
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 700;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 180, 0, 0.4);
        }

        .divider {
            text-align: center;
            margin: 20px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            top: 50%;
            height: 1px;
            background: #ddd;
        }

        .divider span {
            background: white;
            padding: 0 15px;
            position: relative;
            color: #999;
        }

        .alert {
            border-radius: 10px;
            padding: 12px 15px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="auth-page">
        <div class="auth-card" data-aos="zoom-in">
            <div class="auth-logo">
                <h1><?= APP_NAME ?></h1>
                <span class="nib-badge"><i class="bi bi-shield-check"></i> NIB: <?= COMPANY_NIB ?></span>
                <h5 class="mt-3 mb-2">Login</h5>
                <p class="text-muted">Masuk ke akun Anda</p>
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
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= e($_POST['email'] ?? '') ?>" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </button>
            </form>

            <div class="text-center mt-3">
                <a href="forgot-password.php" class="text-decoration-none">Lupa password?</a>
            </div>

            <div class="divider">
                <span>atau</span>
            </div>

            <div class="text-center">
                <p class="mb-2">Belum punya akun?</p>
                <a href="register.php" class="btn btn-outline-primary">
                    <i class="bi bi-person-plus"></i> Daftar Sekarang
                </a>
            </div>

            <div class="text-center mt-4">
                <a href="<?= APP_URL ?>" class="btn btn-sm btn-link">
                    <i class="bi bi-house"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/../BATCH-1-PUBLIC-PAGES/components/layout/scripts.php'; ?>
</body>
</html>
