<?php
/**
 * Popular Services Section Component
 */

// Load services data
require_once __DIR__ . '/../data/services-data.php';

// Get 8 popular services (one from each division) with COMPLETE pricing
$popular_services = [
    [
        'name' => 'Bikin Website Landing Page',
        'name_en' => 'Landing Page Website',
        'price_setup' => 350000,
        'price_monthly' => 150000,
        'has_monthly' => true,
        'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400&h=300&fit=crop',
        'icon' => 'bi-globe'
    ],
    [
        'name' => 'Toko Online E-Commerce',
        'name_en' => 'E-Commerce Store',
        'price_setup' => 1500000,
        'price_monthly' => 350000,
        'has_monthly' => true,
        'image' => 'https://images.unsplash.com/photo-1472851294608-062f824d29cc?w=400&h=300&fit=crop',
        'icon' => 'bi-cart'
    ],
    [
        'name' => 'SEO Premium (Bulanan)',
        'name_en' => 'Premium SEO (Monthly)',
        'price_setup' => 0,
        'price_monthly' => 600000,
        'has_monthly' => true,
        'monthly_only' => true,
        'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=300&fit=crop',
        'icon' => 'bi-megaphone'
    ],
    [
        'name' => 'Chatbot AI WhatsApp',
        'name_en' => 'WhatsApp AI Chatbot',
        'price_setup' => 1000000,
        'price_monthly' => 500000,
        'has_monthly' => true,
        'image' => 'https://images.unsplash.com/photo-1531746790731-6c087fecd65a?w=400&h=300&fit=crop',
        'icon' => 'bi-robot'
    ],
    [
        'name' => 'Logo & Brand Identity',
        'name_en' => 'Logo & Brand Identity',
        'price_setup' => 500000,
        'price_monthly' => 0,
        'has_monthly' => false,
        'image' => 'https://images.unsplash.com/photo-1626785774573-4b799315345d?w=400&h=300&fit=crop',
        'icon' => 'bi-palette'
    ],
    [
        'name' => 'Content Marketing (30 Caption)',
        'name_en' => 'Content Marketing (30 Captions)',
        'price_setup' => 0,
        'price_monthly' => 250000,
        'has_monthly' => true,
        'monthly_only' => true,
        'image' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?w=400&h=300&fit=crop',
        'icon' => 'bi-pencil'
    ],
    [
        'name' => 'Dashboard Analytics',
        'name_en' => 'Analytics Dashboard',
        'price_setup' => 1500000,
        'price_monthly' => 300000,
        'has_monthly' => true,
        'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=300&fit=crop',
        'icon' => 'bi-graph-up'
    ],
    [
        'name' => 'CRM System Custom',
        'name_en' => 'Custom CRM System',
        'price_setup' => 2500000,
        'price_monthly' => 400000,
        'has_monthly' => true,
        'image' => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=400&h=300&fit=crop',
        'icon' => 'bi-people'
    ]
];
?>

<!-- Popular Services Section -->
<section class="services" id="services">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">
                <?= $lang === 'id' ? 'Layanan Populer Kami' : 'Our Popular Services' ?>
            </h2>
            <p class="section-subtitle">
                <?= $lang === 'id' ? '8 Layanan Paling Banyak Dipesan dari 107 Layanan Lengkap' : '8 Most Ordered Services from 107 Complete Services' ?>
            </p>
        </div>

        <div class="services-grid">
            <?php foreach ($popular_services as $index => $service): ?>
                <div class="service-card" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <?php if ($service['has_monthly']): ?>
                        <span class="service-badge">
                            <i class="bi bi-calendar-check"></i>
                            <?= $lang === 'id' ? 'SEWA BULANAN' : 'MONTHLY RENTAL' ?>
                        </span>
                    <?php endif; ?>

                    <div class="service-icon">
                        <img src="<?= $service['image'] ?>" alt="<?= $service['name'] ?>">
                    </div>
                    <h3><?= $lang === 'en' && isset($service['name_en']) ? $service['name_en'] : $service['name'] ?></h3>
                    <p>
                        <?= $lang === 'id' ? 'Solusi profesional untuk bisnis Anda' : 'Professional solution for your business' ?>
                    </p>

                    <div class="service-price-box">
                        <?php if (isset($service['monthly_only']) && $service['monthly_only']): ?>
                            <!-- Pure Subscription (No Setup) -->
                            <div class="price-item price-highlight">
                                <div class="price-label">
                                    <i class="bi bi-arrow-repeat"></i>
                                    <?= $lang === 'id' ? 'Langganan' : 'Subscription' ?>
                                </div>
                                <div class="price-value"><?= format_rupiah($service['price_monthly']) ?><small>/<?= $lang === 'id' ? 'bulan' : 'month' ?></small></div>
                            </div>
                        <?php else: ?>
                            <!-- Setup + Monthly -->
                            <?php if ($service['price_setup'] > 0): ?>
                                <div class="price-item">
                                    <div class="price-label">
                                        <i class="bi bi-tools"></i>
                                        <?= $lang === 'id' ? 'Setup' : 'Setup' ?>
                                    </div>
                                    <div class="price-value"><?= format_rupiah($service['price_setup']) ?></div>
                                </div>
                            <?php endif; ?>

                            <?php if ($service['price_monthly'] > 0): ?>
                                <div class="price-item price-highlight">
                                    <div class="price-label">
                                        <i class="bi bi-arrow-repeat"></i>
                                        <?= $lang === 'id' ? 'Sewa' : 'Rental' ?>
                                    </div>
                                    <div class="price-value"><?= format_rupiah($service['price_monthly']) ?><small>/<?= $lang === 'id' ? 'bulan' : 'month' ?></small></div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <a href="<?= whatsapp_link('Halo! Saya tertarik dengan layanan: ' . $service['name']) ?>" class="btn btn-primary btn-order" data-service="<?= $service['name'] ?>">
                        <i class="bi bi-whatsapp"></i> <?= t('order_now') ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="pages/services.php" class="btn btn-outline btn-lg">
                <i class="bi bi-grid-3x3"></i>
                <?= $lang === 'id' ? 'Lihat Semua 107 Layanan' : 'View All 107 Services' ?>
            </a>
        </div>
    </div>
</section>
