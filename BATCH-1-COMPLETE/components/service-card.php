<?php
/**
 * Service Card Component
 * Usage: include('components/service-card.php');
 * Variables: $service = array with service data
 */
?>

<div class="service-card" data-aos="fade-up">
    <div class="service-card-icon">
        <i class="bi <?= $service['icon'] ?>"></i>
    </div>
    <h3 class="service-card-title"><?= t('lang') == 'en' && isset($service['name_en']) ? e($service['name_en']) : e($service['name']) ?></h3>
    <p class="service-card-description"><?= t('lang') == 'en' && isset($service['description_en']) ? e($service['description_en']) : e($service['description']) ?></p>
    <div class="service-card-price">
        <?php if ($service['price_setup'] > 0): ?>
            <div class="price-setup">
                <small><?= t('setup_fee') ?></small>
                <strong><?= format_rupiah($service['price_setup']) ?></strong>
            </div>
        <?php endif; ?>
        <?php if ($service['price_monthly'] > 0): ?>
            <div class="price-monthly">
                <small><?= t('monthly_fee') ?></small>
                <strong><?= format_rupiah($service['price_monthly']) ?>/<?= t('month') ?></strong>
            </div>
        <?php endif; ?>
    </div>
    <a href="<?= whatsapp_link('Halo, saya tertarik dengan layanan: ' . $service['name']) ?>" class="btn-service">
        <i class="bi bi-whatsapp"></i> <?= t('order_now') ?>
    </a>
</div>

<style>
.service-card {
    background: linear-gradient(135deg, rgba(30, 92, 153, 0.05) 0%, rgba(15, 48, 87, 0.1) 100%);
    border: 2px solid rgba(255, 180, 0, 0.2);
    border-radius: 20px;
    padding: 30px;
    text-align: center;
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.service-card:hover {
    transform: translateY(-10px);
    border-color: var(--gold);
    box-shadow: 0 10px 30px rgba(255, 180, 0, 0.3);
}

.service-card-icon {
    width: 80px;
    height: 80px;
    background: var(--gradient-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 36px;
    color: var(--dark-blue);
}

.service-card-title {
    font-size: 20px;
    font-weight: 700;
    color: var(--dark-blue);
    margin-bottom: 15px;
    min-height: 48px;
}

.service-card-description {
    color: #666;
    margin-bottom: 20px;
    flex-grow: 1;
}

.service-card-price {
    background: white;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
}

.service-card-price strong {
    color: var(--dark-blue);
    font-size: 20px;
}

.btn-service {
    background: var(--gradient-gold);
    color: var(--dark-blue);
    padding: 12px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    display: inline-block;
    transition: all 0.3s ease;
}

.btn-service:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(255, 180, 0, 0.4);
}
</style>
