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

<!-- Navbar -->
<nav class="navbar">
    <div class="container">
        <a href="index.php" class="navbar-brand">
            <img src="https://situneo.my.id/logo" alt="SITUNEO Logo">
            <span>SITUNEO</span>
        </a>

        <ul class="navbar-menu">
            <li><a href="index.php"><?= t('home') ?></a></li>
            <li><a href="pages/about.php"><?= t('about') ?></a></li>
            <li><a href="pages/services.php"><?= t('services') ?></a></li>
            <li><a href="pages/portfolio.php"><?= t('portfolio') ?></a></li>
            <li><a href="pages/pricing.php"><?= t('pricing') ?></a></li>
            <li><a href="pages/contact.php"><?= t('contact') ?></a></li>
            <li><a href="pages/faq.php"><?= t('FAQ') ?></a></li>
        </ul>

        <div class="navbar-cta">
            <a href="auth/login.php" class="btn btn-outline"><?= t('login') ?></a>
            <a href="auth/register.php" class="btn btn-primary"><?= t('register') ?></a>

            <!-- Language Switcher -->
            <div class="lang-switch">
                <button class="lang-btn <?= $lang === 'id' ? 'active' : '' ?>" data-lang="id">ID</button>
                <button class="lang-btn <?= $lang === 'en' ? 'active' : '' ?>" data-lang="en">EN</button>
            </div>
        </div>

        <!-- Mobile Menu Toggle -->
        <button class="btn d-lg-none" id="mobileMenuToggle">
            <i class="bi bi-list"></i>
        </button>
    </div>
</nav>
