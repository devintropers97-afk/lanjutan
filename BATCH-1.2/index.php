<?php
/**
 * SITUNEO DIGITAL - Homepage
 * BATCH-1.1 - With Error Resilience
 */

// Prevent timeout on slow servers
set_time_limit(30);

// Start output buffering (prevent "headers already sent" errors)
ob_start();

// Error reporting (show errors during development, hide in production)
error_reporting(E_ALL);
ini_set('display_errors', 1); // Set to 0 for production

// Try to load initialization file
try {
    if (!file_exists(__DIR__ . '/includes/init.php')) {
        throw new Exception('Core initialization file (includes/init.php) not found. Please re-upload all files.');
    }

    require_once __DIR__ . '/includes/init.php';

    // Verify critical constants are defined
    if (!defined('APP_NAME') || !defined('APP_URL')) {
        throw new Exception('Critical constants not defined. Check config/constants.php');
    }

    $page_title = APP_NAME . " - " . APP_TAGLINE;

} catch (Exception $e) {
    // Display user-friendly error page
    ob_end_clean(); // Clear any previous output
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Initialization Error - SITUNEO DIGITAL</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
                color: white;
                margin: 0;
                padding: 20px;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .error-box {
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(10px);
                border: 2px solid rgba(255, 68, 68, 0.5);
                border-radius: 16px;
                padding: 40px;
                max-width: 600px;
                text-align: center;
            }
            .error-icon {
                font-size: 64px;
                margin-bottom: 20px;
            }
            h1 {
                color: #ff4444;
                margin-bottom: 20px;
            }
            .error-message {
                background: rgba(255, 68, 68, 0.1);
                border-radius: 8px;
                padding: 20px;
                margin: 20px 0;
                font-family: monospace;
                text-align: left;
            }
            .btn {
                display: inline-block;
                padding: 12px 30px;
                background: #FFB400;
                color: #1a1a2e;
                text-decoration: none;
                border-radius: 8px;
                margin: 10px 5px;
                font-weight: 600;
            }
        </style>
    </head>
    <body>
        <div class="error-box">
            <div class="error-icon">❌</div>
            <h1>Initialization Error</h1>
            <p>Website gagal dimuat karena ada masalah dengan file core.</p>
            <div class="error-message">
                <?= htmlspecialchars($e->getMessage()) ?>
            </div>
            <p><strong>Solusi:</strong></p>
            <ul style="text-align: left; padding-left: 40px;">
                <li>Pastikan semua file sudah terupload dengan lengkap</li>
                <li>Jalankan <strong>system-check.php</strong> untuk diagnostic</li>
                <li>Baca <strong>INSTALL.md</strong> untuk panduan instalasi</li>
                <li>Check file permissions (should be 644 for files, 755 for folders)</li>
            </ul>
            <a href="system-check.php" class="btn">🔍 Run System Check</a>
            <a href="INSTALL.md" class="btn" style="background: rgba(255,255,255,0.1);">📖 Read Docs</a>
        </div>
    </body>
    </html>
    <?php
    exit;
}
?>
<!DOCTYPE html>
<html lang="<?= get_language() ?>">
<head>
    <?php
    // Safe include for head component
    if (!@include __DIR__ . '/components/layout/head.php') {
        // Fallback minimal head
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>' . htmlspecialchars($page_title ?? 'SITUNEO DIGITAL') . '</title>';
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">';
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">';
        echo '<div style="background:#ff4444;color:white;padding:10px;text-align:center;">⚠️ Component head.php missing - using fallback</div>';
    }
    ?>
</head>
<body>
    <?php
    // Safe include for navbar
    if (!@include __DIR__ . '/components/layout/navbar.php') {
        echo '<div style="background:#FFB400;color:#1a1a2e;padding:15px;text-align:center;font-weight:600;">⚠️ Navigation component missing</div>';
    }
    ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="hero-title"><?= t('hero_title') ?></h1>
                    <p class="hero-subtitle"><?= t('hero_subtitle') ?></p>
                    <div class="hero-buttons d-flex flex-wrap gap-3">
                        <a href="<?= whatsapp_link(default_whatsapp_message()) ?>" class="btn-gold" target="_blank">
                            <i class="bi bi-whatsapp me-2"></i> <?= t('btn_get_started') ?>
                        </a>
                        <a href="<?= APP_URL ?>/pages/portfolio.php" class="btn-outline-gold">
                            <i class="bi bi-collection me-2"></i> <?= t('btn_view_demo') ?>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="text-center">
                        <img src="<?= APP_URL ?>/assets/images/hero-illustration.svg" alt="Digital Services" onerror="this.src='https://via.placeholder.com/600x400/1E5C99/FFB400?text=SITUNEO+DIGITAL'" style="max-width: 100%; filter: drop-shadow(0 10px 30px rgba(255,180,0,0.3));">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section style="background: linear-gradient(135deg, rgba(30, 92, 153, 0.2) 0%, rgba(15, 48, 87, 0.3) 100%); padding: 60px 0;">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
                        <div class="stat-number"><?= STATS_CLIENTS ?></div>
                        <div class="stat-label"><?= t('stats_clients') ?></div>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="bi bi-briefcase-fill"></i></div>
                        <div class="stat-number"><?= STATS_PROJECTS ?></div>
                        <div class="stat-label"><?= t('stats_projects') ?></div>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="bi bi-star-fill"></i></div>
                        <div class="stat-number"><?= STATS_SATISFACTION ?></div>
                        <div class="stat-label"><?= t('stats_satisfaction') ?></div>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="bi bi-clock-fill"></i></div>
                        <div class="stat-number"><?= STATS_EXPERIENCE ?> Tahun</div>
                        <div class="stat-label"><?= t('stats_experience') ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Preview Section -->
    <section>
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title"><?= t('services_title') ?></h2>
                <p class="section-subtitle"><?= t('services_subtitle') ?></p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-service">
                        <div style="font-size: 3rem; color: var(--gold); margin-bottom: 1rem;">
                            <i class="bi bi-globe"></i>
                        </div>
                        <h4 style="color: var(--gold); margin-bottom: 1rem;">Website & Development</h4>
                        <p style="color: var(--text-light); margin-bottom: 1.5rem;">Landing page, toko online, company profile, custom web app</p>
                        <span class="badge-gold">Mulai Rp 350K</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-service">
                        <div style="font-size: 3rem; color: var(--gold); margin-bottom: 1rem;">
                            <i class="bi bi-megaphone"></i>
                        </div>
                        <h4 style="color: var(--gold); margin-bottom: 1rem;">Digital Marketing</h4>
                        <p style="color: var(--text-light); margin-bottom: 1.5rem;">SEO, Google Ads, Facebook Ads, social media management</p>
                        <span class="badge-gold">Mulai Rp 200K/bln</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-service">
                        <div style="font-size: 3rem; color: var(--gold); margin-bottom: 1rem;">
                            <i class="bi bi-robot"></i>
                        </div>
                        <h4 style="color: var(--gold); margin-bottom: 1rem;">AI & Automation</h4>
                        <p style="color: var(--text-light); margin-bottom: 1.5rem;">Chatbot AI, CRM, WhatsApp blast, email automation</p>
                        <span class="badge-gold">Mulai Rp 250K/bln</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-service">
                        <div style="font-size: 3rem; color: var(--gold); margin-bottom: 1rem;">
                            <i class="bi bi-palette"></i>
                        </div>
                        <h4 style="color: var(--gold); margin-bottom: 1rem;">Branding & Design</h4>
                        <p style="color: var(--text-light); margin-bottom: 1.5rem;">Logo, brand guidelines, packaging, social media design</p>
                        <span class="badge-gold">Mulai Rp 250K</span>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5" data-aos="fade-up">
                <a href="<?= APP_URL ?>/pages/services.php" class="btn-gold"><?= t('services_view_all') ?> <i class="bi bi-arrow-right ms-2"></i></a>
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section style="background: var(--gradient-primary); padding: 4rem 0;">
        <div class="container">
            <div class="row align-items-center" data-aos="fade-up">
                <div class="col-lg-8 text-center text-lg-start mb-3 mb-lg-0">
                    <h2 style="color: var(--gold); font-weight: 800; margin-bottom: 1rem; font-size: 2rem;"><?= t('cta_title') ?></h2>
                    <p style="color: var(--text-light); font-size: 1.1rem; margin: 0;"><?= t('cta_subtitle') ?></p>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <a href="<?= whatsapp_link(default_whatsapp_message()) ?>" class="btn-gold" target="_blank">
                        <i class="bi bi-whatsapp me-2"></i> <?= t('cta_button') ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php
    // Safe include for footer
    if (!@include __DIR__ . '/components/layout/footer.php') {
        echo '<footer style="background:#1a1a2e;color:white;padding:20px;text-align:center;border-top:2px solid #FFB400;">';
        echo '<p>&copy; ' . date('Y') . ' SITUNEO DIGITAL - All Rights Reserved</p>';
        echo '<small style="color:#ff4444;">⚠️ Footer component missing</small>';
        echo '</footer>';
    }
    ?>

    <?php
    // Safe include for scripts
    if (!@include __DIR__ . '/components/layout/scripts.php') {
        // Fallback essential scripts
        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>';
        echo '<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>';
        echo '<script>if(typeof AOS !== "undefined") AOS.init();</script>';
        echo '<div style="position:fixed;bottom:10px;right:10px;background:#ff4444;color:white;padding:10px;border-radius:8px;font-size:12px;z-index:9999;">⚠️ Scripts component missing - using fallback</div>';
    }
    ?>
</body>
</html>
<?php ob_end_flush(); ?>
