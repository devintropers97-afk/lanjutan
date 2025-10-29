<?php
/**
 * Hero Section Component
 */
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="hero-content">
                    <!-- NIB Badge -->
                    <div class="nib-badge">
                        <i class="bi bi-patch-check-fill"></i>
                        <span>PERUSAHAAN RESMI NIB: <?= COMPANY_NIB ?></span>
                    </div>

                    <h1>
                        <?php if ($lang === 'id'): ?>
                            Bikin Website Profesional <span class="highlight">Mulai dari Rp 150rb/bulan</span>
                        <?php else: ?>
                            Build Professional Website <span class="highlight">Starting from Rp 150k/month</span>
                        <?php endif; ?>
                    </h1>

                    <p class="hero-subtitle">
                        <?php if ($lang === 'id'): ?>
                            <strong>💎 SISTEM SEWA BULANAN</strong> - Bayar Setup Fee Sekali, Maintenance Bulanan Hemat!<br>
                            <strong>🎁 FREE DEMO 24 JAM</strong> - Lihat Dulu Hasilnya, Bayar Kalau Cocok!
                        <?php else: ?>
                            <strong>💎 MONTHLY RENTAL SYSTEM</strong> - One-Time Setup Fee, Affordable Monthly Maintenance!<br>
                            <strong>🎁 FREE 24 HOUR DEMO</strong> - See The Result First, Pay If You Like It!
                        <?php endif; ?>
                    </p>

                    <div class="hero-cta">
                        <a href="<?= whatsapp_link('Halo! Saya mau FREE DEMO 24 JAM untuk website saya!') ?>" class="btn btn-primary btn-lg">
                            <i class="bi bi-whatsapp"></i>
                            <?= $lang === 'id' ? 'Pesan FREE DEMO Sekarang' : 'Order FREE DEMO Now' ?>
                        </a>
                        <a href="pages/portfolio.php" class="btn btn-outline btn-lg">
                            <i class="bi bi-collection"></i>
                            <?= t('portfolio') ?>
                        </a>
                    </div>

                    <!-- Hero Stats -->
                    <div class="hero-stats">
                        <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-number" data-count="500" data-suffix="+">0+</div>
                            <div class="stat-label"><?= $lang === 'id' ? 'Klien Puas' : 'Happy Clients' ?></div>
                        </div>
                        <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="stat-number" data-count="107" data-suffix="">0</div>
                            <div class="stat-label"><?= $lang === 'id' ? 'Layanan' : 'Services' ?></div>
                        </div>
                        <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="stat-number" data-count="8" data-suffix="">0</div>
                            <div class="stat-label"><?= $lang === 'id' ? 'Divisi Lengkap' : 'Complete Divisions' ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop" alt="Hero Image" class="img-fluid rounded-3 shadow-lg">
            </div>
        </div>
    </div>
</section>
