<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $pageDescription ?? 'SITUNEO DIGITAL - Solusi Digital Terpercaya untuk Bisnis Anda'; ?>">
    <meta name="keywords" content="<?php echo $pageKeywords ?? 'web development, mobile app, digital marketing, jasa website'; ?>">
    <meta name="author" content="SITUNEO DIGITAL">

    <!-- SEO Meta Tags -->
    <meta property="og:title" content="<?php echo $pageTitle ?? 'SITUNEO DIGITAL'; ?>">
    <meta property="og:description" content="<?php echo $pageDescription ?? 'Bikin Website Profesional Cuma Rp 150rb Perbulan'; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:image" content="<?php echo SITE_URL; ?>/assets/images/og-image.jpg">

    <title><?php echo $pageTitle ?? 'SITUNEO DIGITAL'; ?> - Solusi Digital Terpercaya</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/css/core/variables.css">
    <link rel="stylesheet" href="/assets/css/core/reset.css">
    <link rel="stylesheet" href="/assets/css/core/typography.css">
    <link rel="stylesheet" href="/assets/css/core/layout.css">
    <link rel="stylesheet" href="/assets/css/core/components.css">
    <link rel="stylesheet" href="/assets/css/core/utilities.css">
    <link rel="stylesheet" href="/assets/css/core/animations.css">
    <link rel="stylesheet" href="/assets/css/core/responsive.css">

    <!-- Page-specific CSS -->
    <?php if (isset($pageCSS)): ?>
        <link rel="stylesheet" href="<?php echo $pageCSS; ?>">
    <?php endif; ?>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/custom.css">
</head>
<body>
    <!-- Header -->
    <header class="header" id="header">
        <div class="container">
            <div class="header-content d-flex justify-between align-center">
                <!-- Logo -->
                <div class="header-logo">
                    <a href="/" class="brand-logo">
                        <img src="/assets/images/logo.png" alt="SITUNEO DIGITAL" height="40">
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="header-nav" id="headerNav">
                    <?php include __DIR__ . '/navigation.php'; ?>
                </nav>

                <!-- Header Actions -->
                <div class="header-actions d-flex align-center gap-md">
                    <?php if (isLoggedIn()): ?>
                        <!-- User Menu -->
                        <div class="user-menu">
                            <button class="btn-user" id="userMenuBtn">
                                <img src="<?php echo $_SESSION['user']['avatar'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($_SESSION['user']['name']); ?>" alt="User" class="user-avatar">
                                <span><?php echo $_SESSION['user']['name']; ?></span>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="user-dropdown" id="userDropdown">
                                <a href="/dashboard" class="dropdown-item">
                                    <i class="fas fa-tachometer-alt"></i> Dashboard
                                </a>
                                <?php if ($_SESSION['user']['role'] === 'freelancer'): ?>
                                    <a href="/dashboard/commissions" class="dropdown-item">
                                        <i class="fas fa-money-bill-wave"></i> Komisi Saya
                                    </a>
                                <?php endif; ?>
                                <a href="/dashboard/orders" class="dropdown-item">
                                    <i class="fas fa-shopping-bag"></i> Pesanan Saya
                                </a>
                                <a href="/dashboard/profile" class="dropdown-item">
                                    <i class="fas fa-user"></i> Profil
                                </a>
                                <hr>
                                <a href="/logout" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Keluar
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Auth Buttons -->
                        <a href="/login" class="btn btn-outline-primary">Masuk</a>
                        <a href="/register" class="btn btn-primary">Daftar Gratis</a>
                    <?php endif; ?>

                    <!-- Mobile Menu Toggle -->
                    <button class="mobile-menu-toggle" id="mobileMenuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" id="mobileMenuOverlay">
        <div class="mobile-menu">
            <div class="mobile-menu-header">
                <span class="brand-logo">SITUNEO DIGITAL</span>
                <button class="mobile-menu-close" id="mobileMenuClose">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="mobile-menu-body">
                <?php include __DIR__ . '/navigation.php'; ?>
                <?php if (!isLoggedIn()): ?>
                    <div class="mobile-menu-actions">
                        <a href="/login" class="btn btn-outline-primary w-full mb-2">Masuk</a>
                        <a href="/register" class="btn btn-primary w-full">Daftar Gratis</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
