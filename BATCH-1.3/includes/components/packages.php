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
<section id="packages" style="padding: 80px 0; background: linear-gradient(180deg, #f8f9fa 0%, white 50%, #f8f9fa 100%);">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title" style="font-size: 2.8rem; font-weight: 900; color: var(--dark-blue); margin-bottom: 15px;">
                <?= $t['section_packages'] ?>
            </h2>
            <p class="lead" style="color: var(--text-light); max-width: 700px; margin: 0 auto; font-size: 1.2rem;">
                <?= $lang === 'id' ? 'Hemat hingga 30% dengan paket bundling kami!' : 'Save up to 30% with our bundle packages!' ?>
            </p>
        </div>

        <!-- Packages Grid -->
        <div class="row g-4 justify-content-center mb-5">
            <?php foreach ($bundling_packages as $index => $package): ?>
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="<?= $index * 100 ?>">
                    <div class="card-premium" style="position: relative; height: 100%; <?= $package['popular'] ? 'border: 3px solid var(--gold); box-shadow: 0 15px 40px rgba(255, 180, 0, 0.3);' : '' ?>">
                        <!-- Popular Badge -->
                        <?php if ($package['popular']): ?>
                            <div style="position: absolute; top: -15px; left: 50%; transform: translateX(-50%); background: var(--gradient-gold); padding: 8px 24px; border-radius: 25px; font-weight: 900; font-size: 0.85rem; color: var(--dark-blue); box-shadow: 0 8px 25px rgba(255, 180, 0, 0.5); z-index: 1;">
                                <i class="bi bi-star-fill"></i> <?= $lang === 'id' ? 'TERLARIS' : 'BEST SELLER' ?>
                            </div>
                        <?php endif; ?>

                        <!-- Package Header -->
                        <div style="text-align: center; margin-bottom: 25px; <?= $package['popular'] ? 'padding-top: 15px;' : '' ?>">
                            <h3 style="font-size: 1.8rem; font-weight: 900; color: var(--dark-blue); margin-bottom: 8px;">
                                <?= $lang === 'en' ? $package['name_en'] : $package['name'] ?>
                            </h3>
                            <p style="color: var(--text-light); font-size: 0.95rem; margin-bottom: 0;">
                                <?= $lang === 'en' ? $package['tagline_en'] : $package['tagline'] ?>
                            </p>
                        </div>

                        <!-- Pricing -->
                        <div style="background: linear-gradient(135deg, rgba(30, 92, 153, 0.08) 0%, rgba(255, 180, 0, 0.08) 100%); border-radius: 20px; padding: 20px; margin-bottom: 25px;">
                            <!-- Setup Fee -->
                            <div style="text-align: center; margin-bottom: 15px; padding-bottom: 15px; border-bottom: 2px dashed rgba(30, 92, 153, 0.2);">
                                <div style="font-size: 0.85rem; color: var(--text-light); margin-bottom: 5px;">
                                    <i class="bi bi-tools"></i> <?= $lang === 'id' ? 'Setup Fee (Sekali)' : 'Setup Fee (One-time)' ?>
                                </div>
                                <div style="font-size: 1.5rem; font-weight: 900; color: var(--dark-blue);">
                                    <?= format_rupiah($package['setup_fee']) ?>
                                </div>
                            </div>

                            <!-- Monthly Rental -->
                            <div style="text-align: center; background: rgba(255, 180, 0, 0.15); padding: 15px; border-radius: 15px;">
                                <div style="font-size: 0.85rem; color: #FF8C00; font-weight: 600; margin-bottom: 8px;">
                                    <i class="bi bi-arrow-repeat"></i> <?= $lang === 'id' ? 'Sewa Bulanan' : 'Monthly Rental' ?>
                                </div>
                                <div style="font-size: 2rem; font-weight: 900; color: #FF8C00; line-height: 1;">
                                    <?= format_rupiah($package['monthly_price']) ?>
                                    <small style="font-size: 0.6rem; font-weight: 600;">/<?= $lang === 'id' ? 'bln' : 'month' ?></small>
                                </div>
                            </div>
                        </div>

                        <!-- Features List -->
                        <ul style="list-style: none; padding: 0; margin-bottom: 25px;">
                            <?php
                            $features = $lang === 'en' && isset($package['features_en']) ? $package['features_en'] : $package['features'];
                            foreach ($features as $feature):
                            ?>
                                <li style="display: flex; align-items: flex-start; gap: 10px; margin-bottom: 12px; color: var(--text-light); font-size: 0.95rem;">
                                    <i class="bi bi-check-circle-fill" style="color: var(--gold); font-size: 1.2rem; flex-shrink: 0; margin-top: 2px;"></i>
                                    <span><?= $feature ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <!-- Order Button -->
                        <a href="<?= whatsapp_link('Halo! Saya tertarik dengan Paket ' . $package['name']) ?>" class="btn <?= $package['popular'] ? 'btn-warning' : 'btn-outline-primary' ?> w-100" style="border-radius: 15px; font-weight: 700; padding: 14px; display: flex; align-items: center; justify-content: center; gap: 8px; <?= $package['popular'] ? 'box-shadow: 0 8px 25px rgba(255, 180, 0, 0.4);' : '' ?>">
                            <i class="bi bi-whatsapp"></i>
                            <span><?= $lang === 'id' ? 'Pesan Sekarang' : 'Order Now' ?></span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- CTA Bottom -->
        <div class="text-center" data-aos="fade-up">
            <p style="color: var(--text-light); margin-bottom: 20px; font-size: 1.1rem;">
                <i class="bi bi-question-circle"></i>
                <?= $lang === 'id' ? 'Butuh paket custom? Hubungi kami untuk konsultasi gratis!' : 'Need a custom package? Contact us for free consultation!' ?>
            </p>
            <a href="pages/pricing.php" class="btn btn-outline-primary btn-lg" style="border-radius: 50px; padding: 15px 40px; font-weight: 700; border-width: 2px;">
                <i class="bi bi-calculator"></i>
                <?= $lang === 'id' ? 'Lihat Semua Paket & Kalkulator Harga' : 'View All Packages & Price Calculator' ?>
            </a>
        </div>
    </div>
</section>
