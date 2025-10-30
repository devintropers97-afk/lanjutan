<?php
/**
 * Homepage WITHOUT session (temporary fix)
 */
ob_start();

// Load config WITHOUT session
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/config/constants.php';
require_once __DIR__ . '/config/language.php';

// Load functions
require_once __DIR__ . '/includes/functions/security.php';
require_once __DIR__ . '/includes/functions/format.php';
require_once __DIR__ . '/includes/functions/string.php';
require_once __DIR__ . '/includes/functions/url.php';
require_once __DIR__ . '/includes/functions/validation.php';

// Fake auth functions (no session)
function is_logged_in() { return false; }
function get_user_id() { return null; }
function get_user_role() { return null; }

$page_title = APP_NAME . " - " . APP_TAGLINE;
$page_description = "Solusi digital terlengkap untuk mengembangkan bisnis Anda.";
$page_keywords = "jasa website, toko online, SEO, digital marketing";

include __DIR__ . '/components/layout/head.php';
include __DIR__ . '/components/layout/navbar.php';
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
                    <img src="<?= APP_URL ?>/assets/images/hero-illustration.svg"
                         alt="Digital Services"
                         onerror="this.src='https://via.placeholder.com/600x400/1E5C99/FFB400?text=SITUNEO+DIGITAL'"
                         style="max-width: 100%; filter: drop-shadow(0 10px 30px rgba(255,180,0,0.3));">
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
                    <p style="color: var(--text-light); margin-bottom: 1.5rem;">
                        Landing page, toko online, company profile, custom web app
                    </p>
                    <span class="badge-gold">Mulai Rp 350K</span>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card-service">
                    <div style="font-size: 3rem; color: var(--gold); margin-bottom: 1rem;">
                        <i class="bi bi-megaphone"></i>
                    </div>
                    <h4 style="color: var(--gold); margin-bottom: 1rem;">Digital Marketing</h4>
                    <p style="color: var(--text-light); margin-bottom: 1.5rem;">
                        SEO, Google Ads, Facebook Ads, social media management
                    </p>
                    <span class="badge-gold">Mulai Rp 200K/bln</span>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="card-service">
                    <div style="font-size: 3rem; color: var(--gold); margin-bottom: 1rem;">
                        <i class="bi bi-robot"></i>
                    </div>
                    <h4 style="color: var(--gold); margin-bottom: 1rem;">AI & Automation</h4>
                    <p style="color: var(--text-light); margin-bottom: 1.5rem;">
                        Chatbot AI, CRM, WhatsApp blast, email automation
                    </p>
                    <span class="badge-gold">Mulai Rp 250K/bln</span>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="card-service">
                    <div style="font-size: 3rem; color: var(--gold); margin-bottom: 1rem;">
                        <i class="bi bi-palette"></i>
                    </div>
                    <h4 style="color: var(--gold); margin-bottom: 1rem;">Branding & Design</h4>
                    <p style="color: var(--text-light); margin-bottom: 1.5rem;">
                        Logo, brand guidelines, packaging, social media design
                    </p>
                    <span class="badge-gold">Mulai Rp 250K</span>
                </div>
            </div>
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="<?= APP_URL ?>/pages/services.php" class="btn-gold">
                <?= t('services_view_all') ?> <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- CTA Banner -->
<section style="background: var(--gradient-primary); padding: 4rem 0;">
    <div class="container">
        <div class="row align-items-center" data-aos="fade-up">
            <div class="col-lg-8 text-center text-lg-start mb-3 mb-lg-0">
                <h2 style="color: var(--gold); font-weight: 800; margin-bottom: 1rem; font-size: 2rem;">
                    <?= t('cta_title') ?>
                </h2>
                <p style="color: var(--text-light); font-size: 1.1rem; margin: 0;">
                    <?= t('cta_subtitle') ?>
                </p>
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
include __DIR__ . '/components/layout/footer.php';
include __DIR__ . '/components/layout/scripts.php';
ob_end_flush();
?>
