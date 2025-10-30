<?php
/**
 * Header Component - Navbar
 */
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SITUNEO DIGITAL - Solusi Digital Profesional untuk Bisnis Anda. Website, Digital Marketing, AI & Automation, dan lebih banyak lagi!">
    <meta name="keywords" content="jasa website, digital marketing, toko online, SEO, branding, AI automation">
    <title><?= $page_title ?? 'SITUNEO DIGITAL - Solusi Digital Profesional' ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- Favicon -->
    <link rel="icon" href="https://situneo.my.id/logo" type="image/png">
</head>
<body>

<!-- Loading Screen -->
<div class="loading-screen" id="loadingScreen">
    <div class="loader-logo">
        <img src="https://situneo.my.id/logo" alt="SITUNEO Logo">
    </div>
</div>

<!-- Network Canvas Background -->
<canvas id="network-canvas"></canvas>

<!-- Navbar with Glassmorphism -->
<nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
    <div class="container">
        <!-- Brand Logo -->
        <a href="/" class="navbar-brand d-flex align-items-center">
            <img src="https://situneo.my.id/logo" alt="SITUNEO Logo" style="height: 40px; margin-right: 10px;">
            <span style="font-weight: 900; font-size: 1.4rem; background: var(--gradient-gold); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">SITUNEO</span>
        </a>

        <!-- Mobile Menu Toggle -->
        <button class="navbar-toggler border-0" type="button" id="mobileMenuToggle" aria-label="Toggle navigation">
            <i class="bi bi-list" style="font-size: 1.8rem; color: var(--gold);"></i>
        </button>

        <!-- Navbar Menu -->
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/">
                        <i class="bi bi-house-door"></i> <?= $t['nav_home'] ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">
                        <i class="bi bi-info-circle"></i> <?= $t['nav_about'] ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">
                        <i class="bi bi-grid"></i> <?= $t['nav_services'] ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#packages">
                        <i class="bi bi-box-seam"></i> <?= $t['nav_packages'] ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#portfolio">
                        <i class="bi bi-easel"></i> <?= $t['nav_portfolio'] ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/pricing.php">
                        <i class="bi bi-tag"></i> <?= $t['nav_pricing'] ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#faq">
                        <i class="bi bi-question-circle"></i> FAQ
                    </a>
                </li>
            </ul>

            <!-- Right Side - CTA & Language -->
            <div class="d-flex align-items-center gap-3">
                <!-- Language Switcher -->
                <div class="btn-group" role="group">
                    <a href="?lang=id" class="btn btn-sm <?= $lang === 'id' ? 'btn-warning' : 'btn-outline-warning' ?>" style="border-radius: 20px 0 0 20px; font-weight: 600;">ID</a>
                    <a href="?lang=en" class="btn btn-sm <?= $lang === 'en' ? 'btn-warning' : 'btn-outline-warning' ?>" style="border-radius: 0 20px 20px 0; font-weight: 600;">EN</a>
                </div>

                <!-- Login Button -->
                <a href="auth/login.php" class="btn btn-outline-warning btn-sm d-none d-lg-inline-block" style="border-radius: 20px; padding: 8px 20px; font-weight: 600;">
                    <i class="bi bi-box-arrow-in-right"></i> <?= $t['nav_login'] ?>
                </a>

                <!-- Register Button -->
                <a href="auth/register.php" class="btn btn-warning btn-sm d-none d-lg-inline-block" style="border-radius: 20px; padding: 8px 20px; font-weight: 700; box-shadow: 0 4px 15px rgba(255, 180, 0, 0.4);">
                    <i class="bi bi-person-plus"></i> <?= $t['nav_register'] ?>
                </a>
            </div>
        </div>
    </div>
</nav>
