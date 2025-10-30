<?php
/**
 * Pricing Packages Page
 */
require_once __DIR__ . '/../includes/config/config.php';
require_once __DIR__ . '/../includes/data/pricing-data.php';

$page_title = $lang === 'id' ? 'Paket Harga - SITUNEO' : 'Pricing Packages - SITUNEO';
?>

<?php include __DIR__ . '/../includes/components/header.php'; ?>

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%); padding: 80px 0; text-align: center; color: white;">
    <div class="container">
        <h1 style="font-size: 48px; font-weight: 900; margin-bottom: 15px;">
            <?= $lang === 'id' ? 'Paket Harga Lengkap' : 'Complete Pricing Packages' ?>
        </h1>
        <p style="font-size: 20px;">
            <?= $lang === 'id' ? 'Setup Fee + Sewa Bulanan • Transparant & Hemat' : 'Setup Fee + Monthly Rental • Transparent & Affordable' ?>
        </p>
    </div>
</section>

<!-- Pricing Packages -->
<section class="pricing-section" style="padding: 80px 0; background: #f5f7fa;">
    <div class="container">
        <?php
        // Group packages by category
        $categories = array_unique(array_column($pricing_packages, 'category'));

        foreach ($categories as $category):
            $packages_in_category = array_filter($pricing_packages, function($pkg) use ($category) {
                return $pkg['category'] === $category;
            });

            if (empty($packages_in_category)) continue;

            $first_pkg = reset($packages_in_category);
        ?>
            <div class="category-section" style="margin-bottom: 60px;">
                <div class="category-header" style="text-align: center; margin-bottom: 40px;">
                    <h2 style="font-size: 36px; font-weight: 900; color: var(--dark-blue); margin-bottom: 10px;">
                        <?= $lang === 'en' ? $first_pkg['category_name_en'] : $first_pkg['category_name'] ?>
                    </h2>
                </div>

                <div class="pricing-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
                    <?php foreach ($packages_in_category as $package): ?>
                        <div class="pricing-card <?= $package['popular'] ? 'popular' : '' ?>" style="background: white; border-radius: 20px; padding: 40px; text-align: center; position: relative; border: 3px solid <?= $package['popular'] ? 'var(--gold)' : 'rgba(30, 92, 153, 0.2)' ?>; <?= $package['popular'] ? 'transform: scale(1.05); box-shadow: 0 10px 30px rgba(255, 180, 0, 0.3);' : '' ?>">

                            <?php if ($package['popular']): ?>
                                <div style="position: absolute; top: -15px; left: 50%; transform: translateX(-50%); background: var(--gold); color: var(--dark-blue); padding: 8px 20px; border-radius: 25px; font-size: 12px; font-weight: 700;">
                                    ⭐ <?= $lang === 'id' ? 'TERLARIS' : 'BEST SELLER' ?>
                                </div>
                            <?php endif; ?>

                            <h3 style="font-size: 28px; font-weight: 900; color: var(--dark-blue); margin-bottom: 10px;">
                                <?= $lang === 'en' ? e($package['name_en']) : e($package['name']) ?>
                            </h3>

                            <p style="color: #666; font-size: 14px; margin-bottom: 25px; min-height: 40px;">
                                <?= $lang === 'en' ? e($package['tagline_en']) : e($package['tagline']) ?>
                            </p>

                            <div style="background: linear-gradient(135deg, rgba(30, 92, 153, 0.05) 0%, rgba(255, 180, 0, 0.05) 100%); border-radius: 15px; padding: 25px; margin-bottom: 25px;">
                                <div style="margin-bottom: 15px;">
                                    <small style="color: #666; font-size: 13px; display: block; margin-bottom: 5px;">
                                        <i class="bi bi-tools"></i> Setup Fee (Sekali)
                                    </small>
                                    <strong style="font-size: 28px; font-weight: 900; color: var(--dark-blue);">
                                        <?= format_rupiah($package['setup_fee']) ?>
                                    </strong>
                                </div>
                                <div style="text-align: center; font-size: 20px; font-weight: 700; color: var(--primary-blue); margin: 10px 0;">+</div>
                                <div style="background: rgba(255, 180, 0, 0.15); border-radius: 12px; padding: 15px; border: 2px dashed rgba(255, 180, 0, 0.4);">
                                    <small style="color: #FF8C00; font-size: 13px; display: block; margin-bottom: 5px; font-weight: 600;">
                                        <i class="bi bi-arrow-repeat"></i> Sewa Bulanan
                                    </small>
                                    <strong style="font-size: 32px; font-weight: 900; color: #FF8C00;">
                                        <?= format_rupiah($package['price']) ?><small style="font-size: 16px;">/bulan</small>
                                    </strong>
                                </div>
                            </div>

                            <div style="text-align: left; margin-bottom: 25px;">
                                <ul style="list-style: none; padding: 0;">
                                    <?php
                                    $features = $lang === 'en' && isset($package['features_en']) ? $package['features_en'] : $package['features'];
                                    foreach ($features as $feature):
                                    ?>
                                        <li style="padding: 12px 0; border-bottom: 1px solid rgba(0,0,0,0.1);">
                                            <i class="bi bi-check-circle-fill" style="color: var(--gold); margin-right: 10px;"></i>
                                            <?= e($feature) ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <a href="<?= whatsapp_link('Halo! Saya tertarik dengan paket: ' . $package['name']) ?>" class="btn <?= $package['popular'] ? 'btn-primary' : 'btn-outline' ?>" style="width: 100%; padding: 15px; font-size: 16px;">
                                <i class="bi bi-whatsapp"></i>
                                <?= $lang === 'id' ? 'Pesan Sekarang' : 'Order Now' ?>
                            </a>

                            <p style="font-size: 12px; color: #999; margin-top: 15px;">
                                <i class="bi bi-info-circle"></i>
                                <?= $lang === 'id' ? 'Cocok untuk: ' : 'Best for: ' ?>
                                <?= $lang === 'en' && isset($package['best_for_en']) ? e($package['best_for_en']) : e($package['best_for']) ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section" style="background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%); padding: 80px 0; text-align: center; color: white;">
    <div class="container">
        <h2 style="font-size: 42px; font-weight: 900; margin-bottom: 20px;">
            <?= $lang === 'id' ? 'Butuh Paket Custom?' : 'Need Custom Package?' ?>
        </h2>
        <p style="font-size: 20px; margin-bottom: 30px;">
            <?= $lang === 'id' ? 'Konsultasi gratis dengan tim kami untuk paket sesuai kebutuhan Anda!' : 'Free consultation with our team for packages tailored to your needs!' ?>
        </p>
        <a href="<?= whatsapp_link('Halo! Saya mau konsultasi untuk paket custom') ?>" class="btn" style="background: var(--gold); color: var(--dark-blue); padding: 15px 40px; font-size: 18px; font-weight: 700; border-radius: 30px; text-decoration: none; display: inline-block;">
            <i class="bi bi-whatsapp"></i>
            <?= $lang === 'id' ? 'Konsultasi Gratis' : 'Free Consultation' ?>
        </a>
    </div>
</section>

<?php include __DIR__ . '/../includes/components/footer.php'; ?>
