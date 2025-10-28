<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Navbar Component
 * ================================================
 * Navbar dengan design premium:
 * - Glassmorphism effect
 * - Network animation background
 * - Gold & Blue colors
 * - Language switcher (ID/EN)
 * - Responsive mobile menu
 * - NIB badge
 */
?>

<!-- Navbar Premium -->
<nav class="navbar navbar-expand-lg navbar-premium fixed-top">
    <div class="container">
        <!-- Logo & Brand -->
        <a class="navbar-brand d-flex align-items-center" href="<?= APP_URL ?>" style="text-decoration: none;">
            <img src="<?= APP_URL ?>/assets/images/logo/logo.png"
                 alt="<?= APP_NAME ?>"
                 width="50"
                 height="50"
                 onerror="this.src='https://ui-avatars.com/api/?name=SITUNEO&size=50&background=FFB400&color=0F3057&bold=true'"
                 style="margin-right: 15px; border-radius: 10px; box-shadow: 0 5px 15px rgba(255,180,0,0.4);">
            <div>
                <span style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.8rem; font-weight: 800; color: var(--gold);">SITUNEO</span>
                <small style="display: block; font-size: 0.7rem; color: var(--text-light); margin-top: -5px;">Digital Harmony</small>
            </div>
        </a>

        <!-- NIB Badge (di sebelah logo, hanya tampil di desktop) -->
        <div class="nib-badge d-none d-lg-block" style="margin-left: 20px;">
            <div class="badge-content" style="background: rgba(255,180,0,0.1); border: 1px solid var(--gold); padding: 8px 15px; border-radius: 20px; animation: pulse-gold 2s infinite;">
                <i class="bi bi-shield-check" style="color: var(--gold); margin-right: 5px;"></i>
                <small style="color: var(--text-light); font-size: 0.75rem;">
                    <strong style="color: var(--gold);">NIB:</strong> <?= COMPANY_NIB ?>
                </small>
            </div>
        </div>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                style="border-color: var(--gold);">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>

        <!-- Menu Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Beranda -->
                <li class="nav-item">
                    <a class="nav-link <?= is_current_page('index') ? 'active' : '' ?>" href="<?= APP_URL ?>">
                        <?= t('nav_home') ?>
                    </a>
                </li>

                <!-- Tentang Kami -->
                <li class="nav-item">
                    <a class="nav-link <?= is_current_page('about') ? 'active' : '' ?>" href="<?= APP_URL ?>/pages/about.php">
                        <?= t('nav_about') ?>
                    </a>
                </li>

                <!-- Layanan (dengan Dropdown 8 Divisi) -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= is_current_page('services') ? 'active' : '' ?>"
                       href="#" role="button" data-bs-toggle="dropdown">
                        <?= t('nav_services') ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/pages/services.php?category=website">
                            <i class="bi bi-globe me-2"></i> Website & Development
                        </a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/pages/services.php?category=marketing">
                            <i class="bi bi-megaphone me-2"></i> Digital Marketing
                        </a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/pages/services.php?category=ai">
                            <i class="bi bi-robot me-2"></i> AI & Automation
                        </a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/pages/services.php?category=branding">
                            <i class="bi bi-palette me-2"></i> Branding & Design
                        </a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/pages/services.php?category=content">
                            <i class="bi bi-file-text me-2"></i> Content & Copywriting
                        </a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/pages/services.php?category=analytics">
                            <i class="bi bi-graph-up me-2"></i> Data & Analytics
                        </a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/pages/services.php?category=infrastructure">
                            <i class="bi bi-server me-2"></i> Infrastructure & Legal
                        </a></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/pages/services.php?category=cx">
                            <i class="bi bi-headset me-2"></i> Customer Experience
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= APP_URL ?>/pages/services.php">
                            <i class="bi bi-grid me-2"></i> <strong>Lihat Semua Layanan</strong>
                        </a></li>
                    </ul>
                </li>

                <!-- Demo/Portfolio -->
                <li class="nav-item">
                    <a class="nav-link <?= is_current_page('portfolio') ? 'active' : '' ?>" href="<?= APP_URL ?>/pages/portfolio.php">
                        <?= t('nav_portfolio') ?>
                    </a>
                </li>

                <!-- Harga Paket -->
                <li class="nav-item">
                    <a class="nav-link <?= is_current_page('pricing') ? 'active' : '' ?>" href="<?= APP_URL ?>/pages/pricing.php">
                        <?= t('nav_pricing') ?>
                    </a>
                </li>

                <!-- Kalkulator Harga -->
                <li class="nav-item">
                    <a class="nav-link <?= is_current_page('calculator') ? 'active' : '' ?>" href="<?= APP_URL ?>/pages/calculator.php">
                        <i class="bi bi-calculator"></i> <?= t('nav_calculator') ?>
                    </a>
                </li>

                <!-- Hubungi -->
                <li class="nav-item">
                    <a class="nav-link <?= is_current_page('contact') ? 'active' : '' ?>" href="<?= APP_URL ?>/pages/contact.php">
                        <?= t('nav_contact') ?>
                    </a>
                </li>

                <!-- Language Switcher (ID/EN) -->
                <li class="nav-item d-none d-lg-block">
                    <div class="lang-switcher d-flex gap-1 ms-2">
                        <a href="?lang=id" class="lang-btn <?= get_language() == 'id' ? 'active' : '' ?>">ID</a>
                        <a href="?lang=en" class="lang-btn <?= get_language() == 'en' ? 'active' : '' ?>">EN</a>
                    </div>
                </li>

                <!-- Login/Register atau Dashboard (kalau sudah login) -->
                <?php if (is_logged_in()): ?>
                    <!-- User sudah login -->
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle fs-5"></i>
                            <span class="d-none d-lg-inline"><?= e(get_user_name()) ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                            <li><a class="dropdown-item" href="<?= is_admin() ? APP_URL . '/admin/index.php' : (is_partner() ? APP_URL . '/partner/index.php' : APP_URL . '/client/index.php') ?>">
                                <i class="bi bi-speedometer2 me-2"></i> Dashboard
                            </a></li>
                            <li><a class="dropdown-item" href="<?= APP_URL ?>/client/profile/view.php">
                                <i class="bi bi-person me-2"></i> Profil Saya
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?= APP_URL ?>/auth/logout.php">
                                <i class="bi bi-box-arrow-right me-2"></i> <?= t('nav_logout') ?>
                            </a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <!-- User belum login -->
                    <li class="nav-item ms-3">
                        <a href="<?= APP_URL ?>/auth/login.php" class="btn btn-outline-warning btn-sm" style="border-radius: 50px; padding: 8px 20px;">
                            <i class="bi bi-box-arrow-in-right"></i> <?= t('nav_login') ?>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Spacer (supaya konten tidak ketutupan navbar) -->
<div style="height: 100px;"></div>

<style>
/* Navbar Premium Styles */
.navbar-premium {
    background: rgba(15, 48, 87, 0.95);
    backdrop-filter: blur(20px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    padding: 1rem 0;
    border-bottom: 1px solid rgba(255, 180, 0, 0.2);
    transition: all 0.3s ease;
}

.navbar-premium.scrolled {
    padding: 0.5rem 0;
    background: rgba(15, 48, 87, 0.98);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
}

.nav-link {
    color: var(--white) !important;
    font-weight: 500;
    margin: 0 10px;
    transition: all 0.3s;
    position: relative;
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 50%;
    width: 0;
    height: 2px;
    background: var(--gold);
    transition: all 0.3s;
    transform: translateX(-50%);
}

.nav-link:hover::after,
.nav-link.active::after {
    width: 100%;
}

.nav-link:hover {
    color: var(--gold) !important;
    transform: translateY(-2px);
}

.nav-link.active {
    color: var(--gold) !important;
}

/* Language Switcher */
.lang-switcher {
    display: flex;
    gap: 5px;
}

.lang-btn {
    padding: 5px 12px;
    border-radius: 20px;
    background: rgba(255,180,0,0.1);
    border: 1px solid rgba(255,180,0,0.3);
    color: var(--text-light);
    text-decoration: none;
    font-size: 0.85rem;
    transition: all 0.3s;
}

.lang-btn:hover,
.lang-btn.active {
    background: var(--gradient-gold);
    color: var(--dark-blue);
    border-color: var(--gold);
    font-weight: 700;
}

/* NIB Badge Animation */
@keyframes pulse-gold {
    0%, 100% {
        box-shadow: 0 0 0 0 rgba(255, 180, 0, 0.7);
    }
    50% {
        box-shadow: 0 0 0 10px rgba(255, 180, 0, 0);
    }
}

/* Dropdown Menu Dark */
.dropdown-menu-dark {
    background: rgba(15, 48, 87, 0.98);
    border: 1px solid rgba(255, 180, 0, 0.2);
}

.dropdown-menu-dark .dropdown-item {
    color: var(--text-light);
    transition: all 0.3s;
}

.dropdown-menu-dark .dropdown-item:hover {
    background: rgba(255, 180, 0, 0.2);
    color: var(--gold);
}

/* Mobile Menu */
@media (max-width: 991px) {
    .navbar-collapse {
        background: rgba(15, 48, 87, 0.98);
        padding: 20px;
        margin-top: 20px;
        border-radius: 15px;
        border: 1px solid rgba(255, 180, 0, 0.2);
    }

    .nav-link {
        padding: 10px 0;
    }

    .lang-switcher {
        margin-top: 15px;
        justify-content: center;
    }
}
</style>

<script>
// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar-premium');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});
</script>
