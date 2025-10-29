<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Login Page
 * ================================================
 * BATCH 1.3 - Split Layout with Glassmorphism
 */

// Load configuration
require_once __DIR__ . '/../includes/config/config.php';

// Handle login form
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // TODO: Add actual authentication logic here
    // This is a placeholder
    if (empty($email) || empty($password)) {
        $error = $lang === 'id' ? 'Email dan password harus diisi!' : 'Email and password are required!';
    }
}

$page_title = 'Login - SITUNEO DIGITAL';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom Styles -->
    <style>
        :root {
            --gold: #FFB400;
            --primary-blue: #1E5C99;
            --dark-blue: #0F3057;
            --font-heading: 'Plus Jakarta Sans', sans-serif;
            --font-body: 'Inter', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-body);
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .auth-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
        }

        .auth-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 600px;
        }

        .auth-left {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            color: white;
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .auth-left .logo {
            margin-bottom: 30px;
        }

        .auth-left .logo img {
            filter: brightness(0) invert(1);
        }

        .auth-left h2 {
            font-family: var(--font-heading);
            font-size: 32px;
            font-weight: 900;
            margin-bottom: 15px;
            color: white;
        }

        .auth-left p {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .auth-left .features {
            text-align: left;
            width: 100%;
            max-width: 300px;
        }

        .auth-left .features li {
            padding: 10px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .auth-left .features i {
            color: var(--gold);
            font-size: 20px;
        }

        .auth-right {
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .auth-right h3 {
            font-family: var(--font-heading);
            font-size: 28px;
            font-weight: 900;
            color: var(--dark-blue);
            margin-bottom: 10px;
        }

        .auth-right p {
            color: #666;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            color: var(--dark-blue);
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border: 2px solid rgba(30, 92, 153, 0.2);
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 15px;
        }

        .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 0.2rem rgba(255, 180, 0, 0.25);
        }

        .password-toggle {
            position: relative;
        }

        .password-toggle input {
            padding-right: 45px;
        }

        .password-toggle .toggle-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
        }

        .form-check-input:checked {
            background-color: var(--gold);
            border-color: var(--gold);
        }

        .btn-gold {
            background: linear-gradient(135deg, #FFB400 0%, #FFA000 100%);
            color: var(--dark-blue);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 700;
            font-size: 16px;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(255, 180, 0, 0.4);
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 40%;
            height: 1px;
            background: #ddd;
        }

        .divider::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            width: 40%;
            height: 1px;
            background: #ddd;
        }

        .social-login {
            display: flex;
            gap: 15px;
        }

        .btn-social {
            flex: 1;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 10px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-weight: 600;
        }

        .btn-social:hover {
            border-color: var(--primary-blue);
            background: rgba(30, 92, 153, 0.05);
        }

        .btn-google { color: #DB4437; }
        .btn-facebook { color: #4267B2; }

        .text-link {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
        }

        .text-link:hover {
            color: var(--gold);
        }

        .back-home {
            position: fixed;
            top: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.9);
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            color: var(--dark-blue);
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .back-home:hover {
            background: white;
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 10px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .auth-row {
                grid-template-columns: 1fr;
            }

            .auth-left {
                display: none;
            }
        }
    </style>
</head>
<body>

<!-- Back to Home -->
<a href="../index.php" class="back-home">
    <i class="bi bi-arrow-left"></i> <?= $lang === 'id' ? 'Kembali ke Beranda' : 'Back to Home' ?>
</a>

<!-- Auth Container -->
<div class="auth-container">
    <div class="auth-row">
        <!-- Left Side - Brand Info -->
        <div class="auth-left">
            <div class="logo">
                <img src="https://situneo.my.id/logo" alt="SITUNEO Logo" width="120">
            </div>
            <h2>SITUNEO DIGITAL</h2>
            <p><?= $lang === 'id' ? 'Selamat datang kembali! Login untuk akses dashboard Anda.' : 'Welcome back! Login to access your dashboard.' ?></p>
            <ul class="features">
                <li><i class="bi bi-check-circle-fill"></i> <?= $lang === 'id' ? 'Kelola Project Anda' : 'Manage Your Projects' ?></li>
                <li><i class="bi bi-check-circle-fill"></i> <?= $lang === 'id' ? 'Track Order Status' : 'Track Order Status' ?></li>
                <li><i class="bi bi-check-circle-fill"></i> <?= $lang === 'id' ? 'Lihat Invoice & Laporan' : 'View Invoices & Reports' ?></li>
                <li><i class="bi bi-check-circle-fill"></i> <?= $lang === 'id' ? 'Support 24/7' : '24/7 Support' ?></li>
            </ul>
        </div>

        <!-- Right Side - Login Form -->
        <div class="auth-right">
            <h3><?= $lang === 'id' ? 'Masuk ke Akun' : 'Login to Account' ?></h3>
            <p><?= $lang === 'id' ? 'Belum punya akun?' : 'Don\'t have an account?' ?> <a href="register.php" class="text-link"><?= t('register') ?></a></p>

            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle-fill"></i> <?= $error ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label><?= $lang === 'id' ? 'Alamat Email' : 'Email Address' ?></label>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                </div>

                <div class="form-group">
                    <label><?= $lang === 'id' ? 'Password' : 'Password' ?></label>
                    <div class="password-toggle">
                        <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                        <i class="bi bi-eye toggle-icon" id="togglePassword"></i>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember">
                        <label class="form-check-label" for="remember">
                            <?= $lang === 'id' ? 'Ingat saya' : 'Remember me' ?>
                        </label>
                    </div>
                    <a href="#" class="text-link"><?= $lang === 'id' ? 'Lupa password?' : 'Forgot password?' ?></a>
                </div>

                <button type="submit" class="btn-gold">
                    <i class="bi bi-box-arrow-in-right"></i> <?= $lang === 'id' ? 'Masuk' : 'Login' ?>
                </button>
            </form>

            <div class="divider">
                <span><?= $lang === 'id' ? 'atau' : 'or' ?></span>
            </div>

            <div class="social-login">
                <button class="btn-social btn-google" onclick="alert('Google login akan segera tersedia!')">
                    <i class="bi bi-google"></i> Google
                </button>
                <button class="btn-social btn-facebook" onclick="alert('Facebook login akan segera tersedia!')">
                    <i class="bi bi-facebook"></i> Facebook
                </button>
            </div>

            <p class="text-center mt-4" style="font-size: 14px; color: #999;">
                <?= $lang === 'id' ? 'Dengan login, Anda setuju dengan' : 'By logging in, you agree to our' ?>
                <a href="#" class="text-link"><?= $lang === 'id' ? 'Syarat & Ketentuan' : 'Terms & Conditions' ?></a>
            </p>
        </div>
    </div>
</div>

<script>
// Toggle Password Visibility
document.getElementById('togglePassword').addEventListener('click', function() {
    const password = document.getElementById('password');
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
});
</script>

</body>
</html>
