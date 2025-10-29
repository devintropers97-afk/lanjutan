<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Register Page
 * ================================================
 * BATCH 1.3 - Split Layout with Password Strength
 */

// Load configuration
require_once __DIR__ . '/../includes/config/config.php';

// Handle registration form
$error = '';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $whatsapp = $_POST['whatsapp'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // TODO: Add actual registration logic here
    // This is a placeholder
    if (empty($name) || empty($email) || empty($password)) {
        $error = $lang === 'id' ? 'Semua field harus diisi!' : 'All fields are required!';
    } elseif ($password !== $confirm_password) {
        $error = $lang === 'id' ? 'Password dan konfirmasi password tidak cocok!' : 'Password and confirm password do not match!';
    }
}

$page_title = 'Register - SITUNEO DIGITAL';
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
            min-height: 650px;
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

        .password-strength {
            margin-top: 10px;
            display: none;
        }

        .password-strength.active {
            display: block;
        }

        .strength-bar {
            height: 5px;
            background: #ddd;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 5px;
        }

        .strength-bar-fill {
            height: 100%;
            transition: all 0.3s ease;
            width: 0%;
        }

        .strength-weak .strength-bar-fill {
            width: 33%;
            background: #DC3545;
        }

        .strength-medium .strength-bar-fill {
            width: 66%;
            background: #FFC107;
        }

        .strength-strong .strength-bar-fill {
            width: 100%;
            background: #28A745;
        }

        .strength-text {
            font-size: 12px;
            font-weight: 600;
        }

        .strength-weak .strength-text {
            color: #DC3545;
        }

        .strength-medium .strength-text {
            color: #FFC107;
        }

        .strength-strong .strength-text {
            color: #28A745;
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
            margin: 20px 0;
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
            <p><?= $lang === 'id' ? 'Daftar sekarang dan dapatkan akses ke 107+ layanan digital profesional!' : 'Register now and get access to 107+ professional digital services!' ?></p>
            <ul class="features">
                <li><i class="bi bi-check-circle-fill"></i> <?= $lang === 'id' ? 'Akses 107 Layanan' : 'Access 107 Services' ?></li>
                <li><i class="bi bi-check-circle-fill"></i> <?= $lang === 'id' ? 'Dashboard Personal' : 'Personal Dashboard' ?></li>
                <li><i class="bi bi-check-circle-fill"></i> <?= $lang === 'id' ? 'Tracking Real-time' : 'Real-time Tracking' ?></li>
                <li><i class="bi bi-check-circle-fill"></i> <?= $lang === 'id' ? 'Support Prioritas' : 'Priority Support' ?></li>
            </ul>
        </div>

        <!-- Right Side - Register Form -->
        <div class="auth-right">
            <h3><?= $lang === 'id' ? 'Buat Akun Baru' : 'Create New Account' ?></h3>
            <p><?= $lang === 'id' ? 'Sudah punya akun?' : 'Already have an account?' ?> <a href="login.php" class="text-link"><?= t('login') ?></a></p>

            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle-fill"></i> <?= $error ?>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill"></i> <?= $success ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="" id="registerForm">
                <div class="form-group">
                    <label><?= $lang === 'id' ? 'Nama Lengkap' : 'Full Name' ?></label>
                    <input type="text" name="name" class="form-control" placeholder="<?= $lang === 'id' ? 'Nama lengkap Anda' : 'Your full name' ?>" required>
                </div>

                <div class="form-group">
                    <label><?= $lang === 'id' ? 'Alamat Email' : 'Email Address' ?></label>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                </div>

                <div class="form-group">
                    <label><?= $lang === 'id' ? 'Nomor WhatsApp' : 'WhatsApp Number' ?></label>
                    <input type="tel" name="whatsapp" class="form-control" placeholder="08XXXXXXXXXX" required>
                </div>

                <div class="form-group">
                    <label><?= $lang === 'id' ? 'Password' : 'Password' ?></label>
                    <div class="password-toggle">
                        <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                        <i class="bi bi-eye toggle-icon" id="togglePassword"></i>
                    </div>
                    <div class="password-strength" id="passwordStrength">
                        <div class="strength-bar">
                            <div class="strength-bar-fill"></div>
                        </div>
                        <div class="strength-text">
                            <?= $lang === 'id' ? 'Kekuatan password: Lemah' : 'Password strength: Weak' ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label><?= $lang === 'id' ? 'Konfirmasi Password' : 'Confirm Password' ?></label>
                    <div class="password-toggle">
                        <input type="password" name="confirm_password" id="confirmPassword" class="form-control" placeholder="••••••••" required>
                        <i class="bi bi-eye toggle-icon" id="toggleConfirmPassword"></i>
                    </div>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="terms" required>
                    <label class="form-check-label" for="terms">
                        <?= $lang === 'id' ? 'Saya setuju dengan' : 'I agree to the' ?>
                        <a href="#" class="text-link"><?= $lang === 'id' ? 'Syarat & Ketentuan' : 'Terms & Conditions' ?></a>
                    </label>
                </div>

                <button type="submit" class="btn-gold">
                    <i class="bi bi-person-plus"></i> <?= $lang === 'id' ? 'Daftar Sekarang' : 'Register Now' ?>
                </button>
            </form>

            <div class="divider">
                <span><?= $lang === 'id' ? 'atau daftar dengan' : 'or register with' ?></span>
            </div>

            <div class="social-login">
                <button class="btn-social btn-google" onclick="alert('Google register akan segera tersedia!')">
                    <i class="bi bi-google"></i> Google
                </button>
                <button class="btn-social btn-facebook" onclick="alert('Facebook register akan segera tersedia!')">
                    <i class="bi bi-facebook"></i> Facebook
                </button>
            </div>
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

document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
    const confirmPassword = document.getElementById('confirmPassword');
    const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmPassword.setAttribute('type', type);
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
});

// Password Strength Checker
document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const strengthElement = document.getElementById('passwordStrength');
    const strengthText = strengthElement.querySelector('.strength-text');

    if (password.length === 0) {
        strengthElement.classList.remove('active');
        return;
    }

    strengthElement.classList.add('active');

    let strength = 0;

    // Check length
    if (password.length >= 8) strength++;

    // Check lowercase
    if (password.match(/[a-z]+/)) strength++;

    // Check uppercase
    if (password.match(/[A-Z]+/)) strength++;

    // Check numbers
    if (password.match(/[0-9]+/)) strength++;

    // Check special characters
    if (password.match(/[$@#&!]+/)) strength++;

    // Remove all strength classes
    strengthElement.classList.remove('strength-weak', 'strength-medium', 'strength-strong');

    if (strength <= 2) {
        strengthElement.classList.add('strength-weak');
        strengthText.textContent = '<?= $lang === "id" ? "Kekuatan password: Lemah" : "Password strength: Weak" ?>';
    } else if (strength <= 4) {
        strengthElement.classList.add('strength-medium');
        strengthText.textContent = '<?= $lang === "id" ? "Kekuatan password: Sedang" : "Password strength: Medium" ?>';
    } else {
        strengthElement.classList.add('strength-strong');
        strengthText.textContent = '<?= $lang === "id" ? "Kekuatan password: Kuat" : "Password strength: Strong" ?>';
    }
});

// Form validation
document.getElementById('registerForm').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (password !== confirmPassword) {
        e.preventDefault();
        alert('<?= $lang === "id" ? "Password dan konfirmasi password tidak cocok!" : "Password and confirm password do not match!" ?>');
        return false;
    }

    if (password.length < 8) {
        e.preventDefault();
        alert('<?= $lang === "id" ? "Password minimal 8 karakter!" : "Password must be at least 8 characters!" ?>');
        return false;
    }
});
</script>

</body>
</html>
