<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Register Page
 * ================================================
 * BATCH 1.3 - Dual Registration: Client / Partner
 * Client = Simple form | Partner = Application form with commission info
 */

// Load configuration
require_once __DIR__ . '/../includes/config/config.php';

// Get registration type from URL parameter
$register_type = $_GET['type'] ?? '';

// Handle registration form
$error = '';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'] ?? '';
    // TODO: Add actual registration logic here
    // This is a placeholder
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
            max-width: 1100px;
            width: 100%;
        }

        .auth-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 700px;
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
            margin-bottom: 20px;
        }

        .auth-left .features {
            text-align: left;
            width: 100%;
            max-width: 350px;
        }

        .auth-left .features li {
            padding: 10px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
        }

        .auth-left .features i {
            color: var(--gold);
            font-size: 18px;
        }

        .auth-right {
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-height: 700px;
            overflow-y: auto;
        }

        .auth-right::-webkit-scrollbar {
            width: 6px;
        }

        .auth-right::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .auth-right::-webkit-scrollbar-thumb {
            background: var(--gold);
            border-radius: 10px;
        }

        .auth-right h3 {
            font-family: var(--font-heading);
            font-size: 26px;
            font-weight: 900;
            color: var(--dark-blue);
            margin-bottom: 8px;
        }

        .auth-right > p {
            color: #666;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .type-selector {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 30px;
        }

        .type-card {
            border: 2px solid rgba(30, 92, 153, 0.2);
            border-radius: 15px;
            padding: 25px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .type-card:hover {
            border-color: var(--gold);
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(255, 180, 0, 0.3);
        }

        .type-card.active {
            border-color: var(--gold);
            background: linear-gradient(135deg, rgba(255, 180, 0, 0.1), rgba(255, 180, 0, 0.05));
        }

        .type-card i {
            font-size: 36px;
            color: var(--primary-blue);
            margin-bottom: 10px;
            display: block;
        }

        .type-card.active i {
            color: var(--gold);
        }

        .type-card h4 {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 5px;
        }

        .type-card p {
            font-size: 12px;
            color: #666;
            margin: 0;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            font-weight: 600;
            color: var(--dark-blue);
            margin-bottom: 6px;
            display: block;
            font-size: 14px;
        }

        .form-control, .form-select {
            border: 2px solid rgba(30, 92, 153, 0.2);
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 14px;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 0.2rem rgba(255, 180, 0, 0.25);
        }

        .password-strength {
            margin-top: 8px;
            height: 4px;
            background: #e0e0e0;
            border-radius: 4px;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            transition: all 0.3s ease;
            width: 0;
        }

        .strength-weak { background: #ff4444; width: 33%; }
        .strength-medium { background: #ffbb33; width: 66%; }
        .strength-strong { background: #00C851; width: 100%; }

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

        .commission-info {
            background: linear-gradient(135deg, rgba(30, 92, 153, 0.1), rgba(255, 180, 0, 0.1));
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .commission-info h5 {
            font-size: 16px;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 15px;
        }

        .tier-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid rgba(30, 92, 153, 0.1);
        }

        .tier-item:last-child {
            border-bottom: none;
        }

        .tier-label {
            font-size: 13px;
            color: #666;
        }

        .tier-value {
            font-weight: 700;
            color: var(--gold);
            font-size: 15px;
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
            font-size: 14px;
        }

        .hidden {
            display: none;
        }

        @media (max-width: 768px) {
            .auth-row {
                grid-template-columns: 1fr;
            }

            .auth-left {
                display: none;
            }

            .type-selector {
                grid-template-columns: 1fr;
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
        <!-- Left Side - Dynamic Content -->
        <div class="auth-left" id="authLeft">
            <div class="logo">
                <img src="https://situneo.my.id/logo" alt="SITUNEO Logo" width="120">
            </div>
            <h2>SITUNEO DIGITAL</h2>
            <p id="leftDescription"><?= $lang === 'id' ? 'Bergabunglah dengan kami! Pilih jenis akun yang sesuai kebutuhan Anda.' : 'Join us! Choose the account type that suits your needs.' ?></p>
            <ul class="features" id="leftFeatures">
                <li><i class="bi bi-check-circle-fill"></i> <?= $lang === 'id' ? 'Registrasi Cepat & Mudah' : 'Fast & Easy Registration' ?></li>
                <li><i class="bi bi-check-circle-fill"></i> <?= $lang === 'id' ? 'Dashboard Profesional' : 'Professional Dashboard' ?></li>
                <li><i class="bi bi-check-circle-fill"></i> <?= $lang === 'id' ? 'Support 24/7' : '24/7 Support' ?></li>
                <li><i class="bi bi-check-circle-fill"></i> <?= $lang === 'id' ? 'Keamanan Terjamin' : 'Guaranteed Security' ?></li>
            </ul>
        </div>

        <!-- Right Side - Registration Form -->
        <div class="auth-right">
            <h3><?= $lang === 'id' ? 'Buat Akun Baru' : 'Create New Account' ?></h3>
            <p><?= $lang === 'id' ? 'Sudah punya akun?' : 'Already have an account?' ?> <a href="login.php" style="color: var(--primary-blue); font-weight: 600;"><?= $lang === 'id' ? 'Login di sini' : 'Login here' ?></a></p>

            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle-fill"></i> <?= $error ?>
                </div>
            <?php endif; ?>

            <!-- Step 1: Type Selection -->
            <div id="typeSelection" class="<?= $register_type ? 'hidden' : '' ?>">
                <div class="type-selector">
                    <div class="type-card" onclick="selectType('client')">
                        <i class="bi bi-person-circle"></i>
                        <h4><?= $lang === 'id' ? 'CLIENT' : 'CLIENT' ?></h4>
                        <p><?= $lang === 'id' ? 'Pesan layanan digital' : 'Order digital services' ?></p>
                    </div>
                    <div class="type-card" onclick="selectType('partner')">
                        <i class="bi bi-briefcase-fill"></i>
                        <h4><?= $lang === 'id' ? 'PARTNER' : 'PARTNER' ?></h4>
                        <p><?= $lang === 'id' ? 'Jadi reseller & dapat komisi' : 'Become reseller & earn commission' ?></p>
                    </div>
                </div>
            </div>

            <!-- Step 2: Client Form -->
            <form id="clientForm" class="hidden" method="POST" action="">
                <input type="hidden" name="type" value="client">

                <div class="form-group">
                    <label><i class="bi bi-person"></i> <?= $lang === 'id' ? 'Nama Lengkap' : 'Full Name' ?> *</label>
                    <input type="text" name="name" class="form-control" placeholder="<?= $lang === 'id' ? 'Masukkan nama lengkap' : 'Enter full name' ?>" required>
                </div>

                <div class="form-group">
                    <label><i class="bi bi-envelope"></i> Email *</label>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                </div>

                <div class="form-group">
                    <label><i class="bi bi-whatsapp"></i> <?= $lang === 'id' ? 'No. WhatsApp' : 'WhatsApp Number' ?> *</label>
                    <input type="tel" name="whatsapp" class="form-control" placeholder="08xx-xxxx-xxxx" required>
                </div>

                <div class="form-group">
                    <label><i class="bi bi-lock"></i> Password *</label>
                    <input type="password" name="password" id="clientPassword" class="form-control" placeholder="Min. 8 karakter" required>
                    <div class="password-strength">
                        <div class="password-strength-bar" id="clientStrengthBar"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label><i class="bi bi-check-circle"></i> <?= $lang === 'id' ? 'Konfirmasi Password' : 'Confirm Password' ?> *</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="<?= $lang === 'id' ? 'Ulangi password' : 'Repeat password' ?>" required>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="clientTerms" required>
                    <label class="form-check-label" for="clientTerms" style="font-size: 13px;">
                        <?= $lang === 'id' ? 'Saya setuju dengan' : 'I agree to the' ?> <a href="#" style="color: var(--primary-blue);"><?= $lang === 'id' ? 'Syarat & Ketentuan' : 'Terms & Conditions' ?></a>
                    </label>
                </div>

                <button type="button" onclick="showTypeSelection()" class="btn btn-outline-secondary w-100 mb-2" style="border-radius: 10px; padding: 10px;">
                    <i class="bi bi-arrow-left"></i> <?= $lang === 'id' ? 'Kembali' : 'Back' ?>
                </button>

                <button type="submit" class="btn-gold">
                    <i class="bi bi-person-plus"></i> <?= $lang === 'id' ? 'Daftar sebagai Client' : 'Register as Client' ?>
                </button>
            </form>

            <!-- Step 3: Partner Form -->
            <form id="partnerForm" class="hidden" method="POST" action="">
                <input type="hidden" name="type" value="partner">

                <!-- Commission Info -->
                <div class="commission-info">
                    <h5><i class="bi bi-trophy"></i> <?= $lang === 'id' ? 'Skema Komisi Partner' : 'Partner Commission Scheme' ?></h5>
                    <div class="tier-item">
                        <span class="tier-label">Tier 1 (0-10 order/bulan)</span>
                        <span class="tier-value">30%</span>
                    </div>
                    <div class="tier-item">
                        <span class="tier-label">Tier 2 (10-25 order/bulan)</span>
                        <span class="tier-value">40%</span>
                    </div>
                    <div class="tier-item">
                        <span class="tier-label">Tier 3 (50+ order/bulan)</span>
                        <span class="tier-value">50%</span>
                    </div>
                    <div class="tier-item">
                        <span class="tier-label">Tier MAX (75+ order/bulan)</span>
                        <span class="tier-value">55% 🔥</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label><i class="bi bi-person"></i> <?= $lang === 'id' ? 'Nama Lengkap' : 'Full Name' ?> *</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label><i class="bi bi-envelope"></i> Email *</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label><i class="bi bi-whatsapp"></i> WhatsApp *</label>
                        <input type="tel" name="whatsapp" class="form-control" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label><i class="bi bi-geo-alt"></i> <?= $lang === 'id' ? 'Kota' : 'City' ?> *</label>
                        <input type="text" name="city" class="form-control" required>
                    </div>

                    <div class="col-12 form-group">
                        <label><i class="bi bi-briefcase"></i> <?= $lang === 'id' ? 'Pengalaman' : 'Experience' ?> *</label>
                        <select name="experience" class="form-select" required>
                            <option value=""><?= $lang === 'id' ? '-- Pilih --' : '-- Select --' ?></option>
                            <option value="none"><?= $lang === 'id' ? 'Belum Ada (Pemula)' : 'None (Beginner)' ?></option>
                            <option value="1-6"><?= $lang === 'id' ? '1-6 bulan' : '1-6 months' ?></option>
                            <option value="6-12"><?= $lang === 'id' ? '6-12 bulan' : '6-12 months' ?></option>
                            <option value="1-2"><?= $lang === 'id' ? '1-2 tahun' : '1-2 years' ?></option>
                            <option value="2+"><?= $lang === 'id' ? '2+ tahun' : '2+ years' ?></option>
                        </select>
                    </div>

                    <div class="col-12 form-group">
                        <label><i class="bi bi-link-45deg"></i> <?= $lang === 'id' ? 'Link Portfolio / Social Media' : 'Portfolio / Social Media Link' ?></label>
                        <input type="url" name="portfolio" class="form-control" placeholder="https://">
                    </div>

                    <div class="col-12 form-group">
                        <label><i class="bi bi-chat-quote"></i> <?= $lang === 'id' ? 'Kenapa ingin jadi Partner?' : 'Why do you want to become a Partner?' ?> *</label>
                        <textarea name="why_join" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="col-md-6 form-group">
                        <label><i class="bi bi-lock"></i> Password *</label>
                        <input type="password" name="password" id="partnerPassword" class="form-control" required>
                        <div class="password-strength">
                            <div class="password-strength-bar" id="partnerStrengthBar"></div>
                        </div>
                    </div>

                    <div class="col-md-6 form-group">
                        <label><i class="bi bi-check-circle"></i> <?= $lang === 'id' ? 'Konfirmasi Password' : 'Confirm Password' ?> *</label>
                        <input type="password" name="confirm_password" class="form-control" required>
                    </div>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="partnerTerms" required>
                    <label class="form-check-label" for="partnerTerms" style="font-size: 13px;">
                        <?= $lang === 'id' ? 'Saya setuju dengan' : 'I agree to the' ?> <a href="#" style="color: var(--primary-blue);"><?= $lang === 'id' ? 'Syarat & Ketentuan Partner' : 'Partner Terms & Conditions' ?></a>
                    </label>
                </div>

                <button type="button" onclick="showTypeSelection()" class="btn btn-outline-secondary w-100 mb-2" style="border-radius: 10px; padding: 10px;">
                    <i class="bi bi-arrow-left"></i> <?= $lang === 'id' ? 'Kembali' : 'Back' ?>
                </button>

                <button type="submit" class="btn-gold">
                    <i class="bi bi-briefcase"></i> <?= $lang === 'id' ? 'Daftar sebagai Partner' : 'Register as Partner' ?>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
// Type selection
function selectType(type) {
    document.getElementById('typeSelection').classList.add('hidden');

    if (type === 'client') {
        document.getElementById('clientForm').classList.remove('hidden');
        updateLeftSide('client');
    } else {
        document.getElementById('partnerForm').classList.remove('hidden');
        updateLeftSide('partner');
    }
}

function showTypeSelection() {
    document.getElementById('typeSelection').classList.remove('hidden');
    document.getElementById('clientForm').classList.add('hidden');
    document.getElementById('partnerForm').classList.add('hidden');
    updateLeftSide('default');
}

// Update left side content based on selection
function updateLeftSide(type) {
    const description = document.getElementById('leftDescription');
    const features = document.getElementById('leftFeatures');

    if (type === 'client') {
        description.innerHTML = '<?= $lang === "id" ? "Daftar sebagai Client untuk memesan layanan digital kami!" : "Register as a Client to order our digital services!" ?>';
        features.innerHTML = `
            <li><i class="bi bi-check-circle-fill"></i> <?= $lang === "id" ? "Akses Dashboard Client" : "Access Client Dashboard" ?></li>
            <li><i class="bi bi-check-circle-fill"></i> <?= $lang === "id" ? "Track Order Real-time" : "Real-time Order Tracking" ?></li>
            <li><i class="bi bi-check-circle-fill"></i> <?= $lang === "id" ? "FREE DEMO 24 Jam" : "24 Hour FREE DEMO" ?></li>
            <li><i class="bi bi-check-circle-fill"></i> <?= $lang === "id" ? "Invoice & Laporan" : "Invoices & Reports" ?></li>
        `;
    } else if (type === 'partner') {
        description.innerHTML = '<?= $lang === "id" ? "Bergabung sebagai Partner dan raih komisi hingga 55%!" : "Join as a Partner and earn up to 55% commission!" ?>';
        features.innerHTML = `
            <li><i class="bi bi-check-circle-fill"></i> <?= $lang === "id" ? "Komisi 30% - 55%" : "30% - 55% Commission" ?></li>
            <li><i class="bi bi-check-circle-fill"></i> <?= $lang === "id" ? "Dashboard Partner Lengkap" : "Complete Partner Dashboard" ?></li>
            <li><i class="bi bi-check-circle-fill"></i> <?= $lang === "id" ? "Training & Support GRATIS" : "FREE Training & Support" ?></li>
            <li><i class="bi bi-check-circle-fill"></i> <?= $lang === "id" ? "Marketing Tools Siap Pakai" : "Ready-to-Use Marketing Tools" ?></li>
        `;
    } else {
        description.innerHTML = '<?= $lang === "id" ? "Bergabunglah dengan kami! Pilih jenis akun yang sesuai kebutuhan Anda." : "Join us! Choose the account type that suits your needs." ?>';
        features.innerHTML = `
            <li><i class="bi bi-check-circle-fill"></i> <?= $lang === "id" ? "Registrasi Cepat & Mudah" : "Fast & Easy Registration" ?></li>
            <li><i class="bi bi-check-circle-fill"></i> <?= $lang === "id" ? "Dashboard Profesional" : "Professional Dashboard" ?></li>
            <li><i class="bi bi-check-circle-fill"></i> <?= $lang === "id" ? "Support 24/7" : "24/7 Support" ?></li>
            <li><i class="bi bi-check-circle-fill"></i> <?= $lang === "id" ? "Keamanan Terjamin" : "Guaranteed Security" ?></li>
        `;
    }
}

// Password strength checker
function checkPasswordStrength(password, barId) {
    const bar = document.getElementById(barId);
    bar.className = 'password-strength-bar';

    if (password.length === 0) {
        bar.style.width = '0';
        return;
    }

    let strength = 0;
    if (password.length >= 8) strength++;
    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
    if (/\d/.test(password)) strength++;
    if (/[^a-zA-Z\d]/.test(password)) strength++;

    if (strength <= 2) {
        bar.classList.add('strength-weak');
    } else if (strength === 3) {
        bar.classList.add('strength-medium');
    } else {
        bar.classList.add('strength-strong');
    }
}

document.getElementById('clientPassword')?.addEventListener('input', function() {
    checkPasswordStrength(this.value, 'clientStrengthBar');
});

document.getElementById('partnerPassword')?.addEventListener('input', function() {
    checkPasswordStrength(this.value, 'partnerStrengthBar');
});

// Auto-select type if provided in URL
<?php if ($register_type === 'partner' || $register_type === 'client'): ?>
    selectType('<?= $register_type ?>');
<?php endif; ?>
</script>

</body>
</html>
