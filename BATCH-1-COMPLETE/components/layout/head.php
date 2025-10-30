<?php
/**
 * ================================================
 * SITUNEO DIGITAL - HTML Head Component
 * ================================================
 * File ini berisi <head> HTML dengan:
 * - Meta tags (SEO)
 * - Favicon
 * - Fonts
 * - CSS includes
 *
 * CARA PAKAI:
 * <?php
 * $page_title = "Beranda";
 * $page_description = "Deskripsi halaman";
 * include 'components/layout/head.php';
 * ?>
 */

// Set default values kalau tidak diset
if (!isset($page_title)) {
    $page_title = APP_NAME . " - " . APP_TAGLINE;
}

if (!isset($page_description)) {
    $page_description = APP_DESCRIPTION;
}

if (!isset($page_keywords)) {
    $page_keywords = "website profesional, digital marketing, SEO, toko online, jasa website, web development, SITUNEO DIGITAL";
}

if (!isset($page_image)) {
    $page_image = APP_URL . "/assets/images/logo/og-image.jpg";
}
?>
<!DOCTYPE html>
<html lang="<?= get_language() ?>">
<head>
    <!-- Meta Tags Dasar -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title & Description (SEO) -->
    <title><?= e($page_title) ?></title>
    <meta name="description" content="<?= e($page_description) ?>">
    <meta name="keywords" content="<?= e($page_keywords) ?>">
    <meta name="author" content="<?= APP_NAME ?>">
    <meta name="robots" content="index, follow">

    <!-- Canonical URL (SEO) -->
    <link rel="canonical" href="<?= current_url() ?>">

    <!-- Open Graph / Facebook (untuk share di Facebook) -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:title" content="<?= e($page_title) ?>">
    <meta property="og:description" content="<?= e($page_description) ?>">
    <meta property="og:image" content="<?= $page_image ?>">
    <meta property="og:site_name" content="<?= APP_NAME ?>">

    <!-- Twitter Card (untuk share di Twitter) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?= current_url() ?>">
    <meta name="twitter:title" content="<?= e($page_title) ?>">
    <meta name="twitter:description" content="<?= e($page_description) ?>">
    <meta name="twitter:image" content="<?= $page_image ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= APP_URL ?>/assets/images/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= APP_URL ?>/assets/images/logo/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= APP_URL ?>/assets/images/logo/apple-touch-icon.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- AOS (Animate On Scroll) -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/variables.css">
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/typography.css">
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/layout.css">
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/components.css">
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/animations.css">
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/responsive.css">

    <!-- Page Specific CSS (kalau ada) -->
    <?php if (isset($page_css)): ?>
        <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/pages/<?= $page_css ?>">
    <?php endif; ?>

    <!-- Google Analytics (kalau ada) -->
    <?php if (defined('GOOGLE_ANALYTICS_ID') && !empty(GOOGLE_ANALYTICS_ID)): ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= GOOGLE_ANALYTICS_ID ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?= GOOGLE_ANALYTICS_ID ?>');
    </script>
    <?php endif; ?>
</head>
<body>
    <!-- Network Background (animated) -->
    <div class="network-bg" id="networkBg"></div>

    <!-- Circuit Pattern -->
    <div class="circuit-pattern"></div>
