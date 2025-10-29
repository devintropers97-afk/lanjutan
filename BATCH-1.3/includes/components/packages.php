<?php
/**
 * Bundling Packages Section Component
 */

$bundling_packages = [
    [
        'name' => 'STARTER',
        'name_en' => 'STARTER',
        'tagline' => 'Cocok untuk UMKM & Freelancer',
        'tagline_en' => 'Perfect for SMEs & Freelancers',
        'price_original' => 3500000,
        'price_promo' => 2500000,
        'popular' => false,
        'features' => [
            'Website Landing Page (1 halaman)',
            'Domain .com (1 tahun)',
            'Hosting + SSL',
            'SEO Dasar',
            'WhatsApp Integration',
            'Maintenance 3 bulan',
            'FREE Revisi 2x'
        ],
        'features_en' => [
            'Landing Page Website (1 page)',
            'Domain .com (1 year)',
            'Hosting + SSL',
            'Basic SEO',
            'WhatsApp Integration',
            '3 months maintenance',
            'FREE 2x Revision'
        ]
    ],
    [
        'name' => 'BUSINESS',
        'name_en' => 'BUSINESS',
        'tagline' => 'Paket Paling Laku untuk Bisnis Lokal',
        'tagline_en' => 'Best Seller for Local Business',
        'price_original' => 6000000,
        'price_promo' => 4000000,
        'popular' => true,
        'features' => [
            'Website Multi-Page (4-6 halaman)',
            'Domain + Hosting Premium + SSL',
            'SEO Optimasi',
            'Meta Ads Management (1 bulan)',
            'Email Bisnis (3 akun)',
            'Google Analytics Setup',
            'Maintenance 6 bulan',
            'FREE Revisi 3x'
        ],
        'features_en' => [
            'Multi-Page Website (4-6 pages)',
            'Premium Domain + Hosting + SSL',
            'SEO Optimization',
            'Meta Ads Management (1 month)',
            'Business Email (3 accounts)',
            'Google Analytics Setup',
            '6 months maintenance',
            'FREE 3x Revision'
        ]
    ],
    [
        'name' => 'PREMIUM',
        'name_en' => 'PREMIUM',
        'tagline' => 'Solusi Lengkap E-Commerce & Automation',
        'tagline_en' => 'Complete E-Commerce & Automation Solution',
        'price_original' => 9500000,
        'price_promo' => 6500000,
        'popular' => false,
        'features' => [
            'E-Commerce Website Lengkap',
            'Payment Gateway Integration',
            'Domain + Cloud Hosting + SSL',
            'SEO E-Commerce',
            'Meta Ads + Google Ads (2 bulan)',
            'Chatbot AI Basic',
            'Email Bisnis (5 akun)',
            'WhatsApp Blast',
            'Maintenance 12 bulan',
            'FREE Revisi Unlimited'
        ],
        'features_en' => [
            'Complete E-Commerce Website',
            'Payment Gateway Integration',
            'Domain + Cloud Hosting + SSL',
            'E-Commerce SEO',
            'Meta Ads + Google Ads (2 months)',
            'Basic AI Chatbot',
            'Business Email (5 accounts)',
            'WhatsApp Blast',
            '12 months maintenance',
            'FREE Unlimited Revision'
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
                    <h3 class="package-name"><?= $lang === 'en' ? $package['name_en'] : $package['name'] ?></h3>
                    <p class="text-muted"><?= $lang === 'en' ? $package['tagline_en'] : $package['tagline'] ?></p>

                    <div class="package-price">
                        <div class="price-original"><?= format_rupiah($package['price_original']) ?></div>
                        <div class="price-promo"><?= format_rupiah($package['price_promo']) ?></div>
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
