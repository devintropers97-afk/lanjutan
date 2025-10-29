<?php
require_once __DIR__ . '/../includes/init.php';

$page_title = 'Tentang Kami - ' . APP_NAME;
$page_description = 'PT SITUNEO DIGITAL adalah perusahaan digital agency resmi dengan NIB 20250926145704515453. Kami menyediakan 8 divisi layanan lengkap untuk bisnis digital Anda.';
$breadcrumb_items = [['name' => 'Tentang Kami']];
?>
<!DOCTYPE html>
<html lang="<?= get_language() ?>">
<head>
    <?php include __DIR__ . '/../components/layout/head.php'; ?>
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/pages.css">
</head>
<body>
    <?php include __DIR__ . '/../components/layout/navbar.php'; ?>
    <?php include __DIR__ . '/../components/breadcrumb.php'; ?>
    
    <!-- About Hero -->
    <section class="about-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="display-4 fw-bold mb-4"><?= APP_NAME ?></h1>
                    <p class="lead mb-4">Perusahaan digital agency resmi dengan NIB <strong><?= COMPANY_NIB ?></strong> yang menyediakan 8 divisi layanan lengkap untuk kesuksesan bisnis digital Anda.</p>
                    <div class="d-flex gap-3">
                        <a href="<?= whatsapp_link(default_whatsapp_message()) ?>" class="btn-gold">
                            <i class="bi bi-whatsapp"></i> Hubungi Kami
                        </a>
                        <a href="<?= APP_URL ?>/pages/services.php" class="btn-outline-gold">
                            Lihat Layanan
                        </a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="https://via.placeholder.com/600x400/1E5C99/FFB400?text=About+SITUNEO" alt="About SITUNEO DIGITAL" class="img-fluid rounded" style="box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                </div>
            </div>
        </div>
    </section>

    <!-- Company Info -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4" data-aos="fade-up">
                    <div class="card-premium">
                        <div class="text-center mb-3">
                            <i class="bi bi-shield-check" style="font-size: 48px; color: var(--gold);"></i>
                        </div>
                        <h4>Perusahaan Resmi</h4>
                        <p><strong>NIB:</strong> <?= COMPANY_NIB ?></p>
                        <p><strong>NPWP:</strong> <?= COMPANY_NPWP ?></p>
                        <p><strong>Direktur:</strong> <?= COMPANY_DIRECTOR ?></p>
                    </div>
                </div>
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-premium">
                        <div class="text-center mb-3">
                            <i class="bi bi-award" style="font-size: 48px; color: var(--gold);"></i>
                        </div>
                        <h4>Pengalaman</h4>
                        <p><strong><?= STATS_CLIENTS ?>+</strong> Klien Puas</p>
                        <p><strong><?= STATS_PROJECTS ?>+</strong> Proyek Selesai</p>
                        <p><strong><?= STATS_SATISFACTION ?>%</strong> Kepuasan</p>
                    </div>
                </div>
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-premium">
                        <div class="text-center mb-3">
                            <i class="bi bi-headset" style="font-size: 48px; color: var(--gold);"></i>
                        </div>
                        <h4>Kontak</h4>
                        <p><i class="bi bi-whatsapp"></i> <?= format_phone(COMPANY_WHATSAPP) ?></p>
                        <p><i class="bi bi-envelope"></i> <?= COMPANY_EMAIL ?></p>
                        <p><i class="bi bi-envelope"></i> <?= COMPANY_EMAIL_SUPPORT ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi -->
    <section class="about-section" style="background: rgba(30, 92, 153, 0.05);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4" data-aos="fade-right">
                    <h2 class="mb-4"><i class="bi bi-eye"></i> Visi</h2>
                    <p class="lead">Menjadi digital agency terpercaya nomor 1 di Indonesia yang membantu ribuan bisnis mencapai kesuksesan melalui solusi digital yang inovatif dan terjangkau.</p>
                </div>
                <div class="col-lg-6 mb-4" data-aos="fade-left">
                    <h2 class="mb-4"><i class="bi bi-bullseye"></i> Misi</h2>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-warning"></i> Memberikan layanan digital berkualitas premium dengan harga kompetitif</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-warning"></i> Memberdayakan partner melalui sistem komisi yang adil dan transparan</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-warning"></i> Terus berinovasi mengikuti perkembangan teknologi digital</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-warning"></i> Memberikan support dan edukasi terbaik kepada klien</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 8 Divisions -->
    <section class="about-section">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">8 Divisi Layanan Kami</h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                    <div class="text-center">
                        <div class="division-icon" style="width: 80px; height: 80px; font-size: 36px; margin: 0 auto 15px;">
                            <i class="bi bi-globe"></i>
                        </div>
                        <h5>Website & Development</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="50">
                    <div class="text-center">
                        <div class="division-icon" style="width: 80px; height: 80px; font-size: 36px; margin: 0 auto 15px;">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h5>Digital Marketing</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center">
                        <div class="division-icon" style="width: 80px; height: 80px; font-size: 36px; margin: 0 auto 15px;">
                            <i class="bi bi-robot"></i>
                        </div>
                        <h5>AI & Automation</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="text-center">
                        <div class="division-icon" style="width: 80px; height: 80px; font-size: 36px; margin: 0 auto 15px;">
                            <i class="bi bi-palette"></i>
                        </div>
                        <h5>Branding & Creative</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-center">
                        <div class="division-icon" style="width: 80px; height: 80px; font-size: 36px; margin: 0 auto 15px;">
                            <i class="bi bi-file-text"></i>
                        </div>
                        <h5>Content & Copywriting</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="250">
                    <div class="text-center">
                        <div class="division-icon" style="width: 80px; height: 80px; font-size: 36px; margin: 0 auto 15px;">
                            <i class="bi bi-bar-chart-line"></i>
                        </div>
                        <h5>Data & Analytics</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-center">
                        <div class="division-icon" style="width: 80px; height: 80px; font-size: 36px; margin: 0 auto 15px;">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h5>Infrastructure & Legal</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="350">
                    <div class="text-center">
                        <div class="division-icon" style="width: 80px; height: 80px; font-size: 36px; margin: 0 auto 15px;">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h5>Customer Experience</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-banner" data-aos="zoom-in">
                <h2>Siap Wujudkan Bisnis Digital Anda?</h2>
                <p>Konsultasi GRATIS dengan tim expert kami sekarang!</p>
                <a href="<?= whatsapp_link(default_whatsapp_message()) ?>" class="btn-gold">
                    <i class="bi bi-whatsapp"></i> Hubungi Kami Sekarang
                </a>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/../components/layout/footer.php'; ?>
    <?php include __DIR__ . '/../components/layout/scripts.php'; ?>
</body>
</html>
