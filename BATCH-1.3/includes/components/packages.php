<?php
/**
 * Bundling Packages Section Component
 */

$bundling_packages = [
    [
        'name' => 'Startup Go Digital',
        'name_en' => 'Startup Go Digital',
        'tagline' => 'Mulai bisnis digital dengan budget terjangkau',
        'tagline_en' => 'Start your digital business affordably',
        'setup_fee' => 350000,
        'monthly_price' => 200000,
        'popular' => false,
        'features' => [
            'Website Landing Page (1 halaman)',
            'Domain .com (1 tahun)',
            'Hosting Basic + SSL',
            'SEO Dasar',
            'WhatsApp Integration',
            'Email Bisnis (1 akun)',
            'Maintenance bulanan',
            'Support via WhatsApp'
        ],
        'features_en' => [
            'Landing Page Website (1 page)',
            'Domain .com (1 year)',
            'Basic Hosting + SSL',
            'Basic SEO',
            'WhatsApp Integration',
            'Business Email (1 account)',
            'Monthly maintenance',
            'WhatsApp support'
        ]
    ],
    [
        'name' => 'Bisnis Naik Level',
        'name_en' => 'Business Level Up',
        'tagline' => 'Paket TERLARIS untuk Bisnis Lokal',
        'tagline_en' => 'BEST SELLER for Local Business',
        'setup_fee' => 750000,
        'monthly_price' => 400000,
        'popular' => true,
        'features' => [
            'Website Multi-Page (4-6 halaman)',
            'Domain + Hosting + SSL',
            'SEO Optimasi (Basic)',
            'Copywriting (5 artikel/bulan)',
            'Meta Ads Management',
            'Email Bisnis (3 akun)',
            'Google Analytics Setup',
            'Laporan Bulanan',
            'Maintenance & Support'
        ],
        'features_en' => [
            'Multi-Page Website (4-6 pages)',
            'Domain + Hosting + SSL',
            'SEO Optimization (Basic)',
            'Copywriting (5 articles/month)',
            'Meta Ads Management',
            'Business Email (3 accounts)',
            'Google Analytics Setup',
            'Monthly Reports',
            'Maintenance & Support'
        ]
    ],
    [
        'name' => 'Pertumbuhan E-Commerce',
        'name_en' => 'E-Commerce Growth',
        'tagline' => 'Lengkap untuk bisnis online shop',
        'tagline_en' => 'Complete for online shop business',
        'setup_fee' => 1500000,
        'monthly_price' => 500000,
        'popular' => true,
        'features' => [
            'Website Toko Online (E-Commerce)',
            'Katalog Produk Unlimited',
            'Payment Gateway Integration',
            'Domain + Cloud Hosting + SSL',
            'SEO E-Commerce',
            'Meta Ads + Google Ads',
            '30 Deskripsi Produk/bulan',
            'Email Bisnis (5 akun)',
            'WhatsApp Blast',
            'Maintenance & Support Priority'
        ],
        'features_en' => [
            'E-Commerce Website',
            'Unlimited Product Catalog',
            'Payment Gateway Integration',
            'Domain + Cloud Hosting + SSL',
            'E-Commerce SEO',
            'Meta Ads + Google Ads',
            '30 Product Descriptions/month',
            'Business Email (5 accounts)',
            'WhatsApp Blast',
            'Priority Maintenance & Support'
        ]
    ]
];
?>

<!-- Bundling Packages Section -->
<section class="packages" id="packages">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">
                <?= $lang === 'id' ? 'Paket Bundling Hemat' : 'Bundle Packages' ?>
            </h2>
            <p class="section-subtitle">
                <?= $lang === 'id' ? 'Hemat hingga 30% dengan paket bundling kami!' : 'Save up to 30% with our bundle packages!' ?>
            </p>
        </div>

        <div class="packages-grid">
            <?php foreach ($bundling_packages as $index => $package): ?>
                <div class="package-card <?= $package['popular'] ? 'popular' : '' ?>" data-aos="zoom-in" data-aos-delay="<?= $index * 100 ?>">
                    <?php if ($package['popular']): ?>
                        <div class="popular-badge">
                            <i class="bi bi-star-fill"></i>
                            <?= $lang === 'id' ? 'TERLARIS' : 'BEST SELLER' ?>
                        </div>
                    <?php endif; ?>

                    <h3 class="package-name"><?= $lang === 'en' ? $package['name_en'] : $package['name'] ?></h3>
                    <p class="package-tagline"><?= $lang === 'en' ? $package['tagline_en'] : $package['tagline'] ?></p>

                    <div class="package-pricing">
                        <div class="pricing-item">
                            <div class="pricing-label">
                                <i class="bi bi-tools"></i>
                                <?= $lang === 'id' ? 'Setup Fee (Sekali)' : 'Setup Fee (One-time)' ?>
                            </div>
                            <div class="pricing-value"><?= format_rupiah($package['setup_fee']) ?></div>
                        </div>
                        <div class="pricing-divider">+</div>
                        <div class="pricing-item pricing-highlight">
                            <div class="pricing-label">
                                <i class="bi bi-arrow-repeat"></i>
                                <?= $lang === 'id' ? 'Sewa Bulanan' : 'Monthly Rental' ?>
                            </div>
                            <div class="pricing-value pricing-monthly">
                                <?= format_rupiah($package['monthly_price']) ?>
                                <small>/<?= $lang === 'id' ? 'bulan' : 'month' ?></small>
                            </div>
                        </div>
                    </div>

                    <ul class="package-features">
                        <?php
                        $features = $lang === 'en' && isset($package['features_en']) ? $package['features_en'] : $package['features'];
                        foreach ($features as $feature):
                        ?>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <?= $feature ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="<?= whatsapp_link('Halo! Saya tertarik dengan Paket ' . $package['name']) ?>" class="btn <?= $package['popular'] ? 'btn-primary' : 'btn-outline' ?> w-100">
                        <i class="bi bi-whatsapp"></i>
                        <?= $lang === 'id' ? 'Pesan Sekarang' : 'Order Now' ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <p class="text-muted">
                <?= $lang === 'id' ? 'Butuh paket custom? Hubungi kami untuk konsultasi gratis!' : 'Need a custom package? Contact us for free consultation!' ?>
            </p>
            <a href="pages/pricing.php" class="btn btn-outline btn-lg">
                <i class="bi bi-calculator"></i>
                <?= $lang === 'id' ? 'Lihat Semua Paket & Kalkulator Harga' : 'View All Packages & Price Calculator' ?>
            </a>
        </div>
    </div>
</section>
