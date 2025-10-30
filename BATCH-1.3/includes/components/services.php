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
<section id="services" style="padding: 80px 0; background: #f8f9fa;">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title" style="font-size: 2.8rem; font-weight: 900; color: var(--dark-blue); margin-bottom: 15px;">
                <?= $t['section_services'] ?>
            </h2>
            <p class="lead" style="color: var(--text-light); max-width: 700px; margin: 0 auto; font-size: 1.2rem;">
                <?= $lang === 'id' ? '8 Layanan Paling Banyak Dipesan dari 107 Layanan Lengkap' : '8 Most Ordered Services from 107 Complete Services' ?>
            </p>
        </div>

        <!-- Services Grid -->
        <div class="row g-4 mb-5">
            <?php foreach ($popular_services as $index => $service): ?>
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="<?= $index * 50 ?>">
                    <div class="card-premium" style="position: relative; overflow: hidden; height: 100%; transition: all 0.3s ease;">
                        <!-- Service Image with Overlay -->
                        <div style="position: relative; height: 200px; overflow: hidden; border-radius: 20px 20px 0 0; margin: -20px -20px 20px;">
                            <img src="<?= $service['image'] ?>" alt="<?= $service['name'] ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                            <div style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 0%, rgba(15, 48, 87, 0.9) 100%); display: flex; align-items: flex-end; padding: 20px;">
                                <div>
                                    <i class="<?= $service['icon'] ?>" style="font-size: 2rem; color: var(--gold); margin-bottom: 8px; display: block;"></i>
                                </div>
                            </div>

                            <!-- Monthly Badge -->
                            <?php if ($service['has_monthly']): ?>
                                <div style="position: absolute; top: 15px; right: 15px; background: var(--gradient-gold); padding: 6px 14px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; color: var(--dark-blue); box-shadow: 0 4px 15px rgba(255, 180, 0, 0.4);">
                                    <i class="bi bi-calendar-check"></i> BULANAN
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Service Content -->
                        <h4 style="color: var(--dark-blue); font-weight: 700; font-size: 1.1rem; margin-bottom: 12px; min-height: 50px;">
                            <?= $lang === 'en' && isset($service['name_en']) ? $service['name_en'] : $service['name'] ?>
                        </h4>

                        <!-- Pricing -->
                        <div style="background: linear-gradient(135deg, rgba(30, 92, 153, 0.05) 0%, rgba(255, 180, 0, 0.05) 100%); border-radius: 15px; padding: 15px; margin-bottom: 15px;">
                            <?php if (isset($service['monthly_only']) && $service['monthly_only']): ?>
                                <!-- Pure Subscription -->
                                <div style="text-align: center;">
                                    <div style="font-size: 0.85rem; color: var(--text-light); margin-bottom: 5px;">
                                        <i class="bi bi-arrow-repeat"></i> Langganan
                                    </div>
                                    <div style="font-size: 1.5rem; font-weight: 900; color: var(--gold);">
                                        <?= format_rupiah($service['price_monthly']) ?>
                                        <small style="font-size: 0.7rem; font-weight: 600;">/bln</small>
                                    </div>
                                </div>
                            <?php else: ?>
                                <!-- Setup + Monthly -->
                                <?php if ($service['price_setup'] > 0): ?>
                                    <div style="margin-bottom: 8px; padding-bottom: 8px; border-bottom: 1px solid rgba(30, 92, 153, 0.1);">
                                        <div style="font-size: 0.75rem; color: var(--text-light); margin-bottom: 3px;">
                                            <i class="bi bi-tools"></i> Setup Fee
                                        </div>
                                        <div style="font-size: 1.1rem; font-weight: 700; color: var(--dark-blue);">
                                            <?= format_rupiah($service['price_setup']) ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($service['price_monthly'] > 0): ?>
                                    <div style="text-align: center; background: rgba(255, 180, 0, 0.1); padding: 10px; border-radius: 10px;">
                                        <div style="font-size: 0.75rem; color: #FF8C00; font-weight: 600; margin-bottom: 3px;">
                                            <i class="bi bi-arrow-repeat"></i> Sewa/bulan
                                        </div>
                                        <div style="font-size: 1.3rem; font-weight: 900; color: #FF8C00;">
                                            <?= format_rupiah($service['price_monthly']) ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <!-- Order Button -->
                        <a href="<?= whatsapp_link('Halo! Saya tertarik dengan layanan: ' . $service['name']) ?>" class="btn btn-warning w-100" style="border-radius: 15px; font-weight: 700; padding: 12px; display: flex; align-items: center; justify-content: center; gap: 8px; transition: all 0.3s ease;">
                            <i class="bi bi-whatsapp"></i>
                            <span><?= $lang === 'id' ? 'Pesan Sekarang' : 'Order Now' ?></span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- View All Button -->
        <div class="text-center" data-aos="fade-up">
            <a href="pages/services.php" class="btn btn-outline-primary btn-lg" style="border-radius: 50px; padding: 15px 40px; font-weight: 700; border-width: 2px;">
                <i class="bi bi-grid-3x3"></i>
                <?= $lang === 'id' ? 'Lihat Semua 107 Layanan' : 'View All 107 Services' ?>
            </a>
        </div>
    </div>
</section>
