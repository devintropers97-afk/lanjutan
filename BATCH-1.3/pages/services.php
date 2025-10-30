<?php
/**
 * All Services Page (107 Services)
 */
require_once __DIR__ . '/../includes/config/config.php';
require_once __DIR__ . '/../includes/data/services-data.php';

$page_title = $lang === 'id' ? 'Semua Layanan Digital - SITUNEO' : 'All Digital Services - SITUNEO';
?>

<?php include __DIR__ . '/../includes/components/header.php'; ?>

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%); padding: 80px 0; text-align: center; color: white;">
    <div class="container">
        <h1 style="font-size: 48px; font-weight: 900; margin-bottom: 15px;">
            <?= $lang === 'id' ? '107 Layanan Digital Lengkap' : '107 Complete Digital Services' ?>
        </h1>
        <p style="font-size: 20px;">
            <?= $lang === 'id' ? '8 Divisi • Setup Fee + Sewa Bulanan' : '8 Divisions • Setup Fee + Monthly Rental' ?>
        </p>
    </div>
</section>

<!-- Services Grid -->
<section class="all-services" style="padding: 80px 0; background: #f5f7fa;">
    <div class="container">
        <?php
        // Group services by division
        $divisions = [];
        foreach ($all_services as $service) {
            $div = $service['division'] ?? 'Other';
            if (!isset($divisions[$div])) {
                $divisions[$div] = [];
            }
            $divisions[$div][] = $service;
        }

        // Display each division
        foreach ($divisions as $division_name => $services):
        ?>
            <div class="division-section" style="margin-bottom: 60px;">
                <h2 style="font-size: 32px; font-weight: 700; color: var(--dark-blue); margin-bottom: 30px; border-left: 5px solid var(--gold); padding-left: 20px;">
                    <?= $division_name ?>
                    <span style="font-size: 18px; color: #666; font-weight: 400;">(<?= count($services) ?> layanan)</span>
                </h2>

                <div class="services-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px;">
                    <?php foreach ($services as $service): ?>
                        <div class="service-card" style="background: white; border-radius: 15px; padding: 25px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                            <h3 style="font-size: 18px; font-weight: 700; color: var(--dark-blue); margin-bottom: 15px;">
                                <?= $lang === 'en' && isset($service['name_en']) ? e($service['name_en']) : e($service['name']) ?>
                            </h3>

                            <div class="service-pricing" style="background: linear-gradient(135deg, rgba(30, 92, 153, 0.05) 0%, rgba(255, 180, 0, 0.05) 100%); border-radius: 10px; padding: 15px; margin-bottom: 15px;">
                                <?php if ($service['price_setup'] > 0): ?>
                                    <div style="margin-bottom: 8px;">
                                        <small style="color: #666; font-size: 12px;">Setup:</small>
                                        <strong style="font-size: 16px; color: var(--dark-blue);"><?= format_rupiah($service['price_setup']) ?></strong>
                                    </div>
                                <?php endif; ?>

                                <?php if ($service['price_monthly'] > 0): ?>
                                    <div style="background: rgba(255, 180, 0, 0.1); padding: 8px; border-radius: 8px;">
                                        <small style="color: #FF8C00; font-size: 12px; font-weight: 600;">Sewa/bulan:</small>
                                        <strong style="font-size: 18px; color: #FF8C00;"><?= format_rupiah($service['price_monthly']) ?></strong>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <a href="<?= whatsapp_link('Halo! Saya mau pesan: ' . $service['name']) ?>" class="btn btn-outline" style="width: 100%; text-align: center; padding: 10px;">
                                <i class="bi bi-whatsapp"></i>
                                <?= $lang === 'id' ? 'Pesan' : 'Order' ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php include __DIR__ . '/../includes/components/footer.php'; ?>
