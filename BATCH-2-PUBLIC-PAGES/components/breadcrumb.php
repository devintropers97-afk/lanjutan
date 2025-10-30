<?php
/**
 * Breadcrumb Component
 * Usage: include('components/breadcrumb.php');
 * Variables: $breadcrumb_items = [['name' => 'Home', 'url' => '/'], ['name' => 'About']];
 */
?>

<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= APP_URL ?>"><i class="bi bi-house-door"></i> <?= t('home') ?></a></li>
                <?php if (!empty($breadcrumb_items)): ?>
                    <?php foreach ($breadcrumb_items as $index => $item): ?>
                        <?php if ($index === count($breadcrumb_items) - 1): ?>
                            <li class="breadcrumb-item active" aria-current="page"><?= e($item['name']) ?></li>
                        <?php else: ?>
                            <li class="breadcrumb-item"><a href="<?= e($item['url']) ?>"><?= e($item['name']) ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ol>
        </nav>
    </div>
</section>

<style>
.breadcrumb-section {
    background: linear-gradient(135deg, rgba(30, 92, 153, 0.05) 0%, rgba(15, 48, 87, 0.1) 100%);
    padding: 20px 0;
    margin-top: 80px;
}

.breadcrumb {
    background: transparent;
    margin: 0;
    padding: 0;
    font-size: 14px;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    color: var(--dark-blue);
    font-size: 18px;
}

.breadcrumb-item a {
    color: var(--primary-blue);
    text-decoration: none;
    transition: all 0.3s ease;
}

.breadcrumb-item a:hover {
    color: var(--gold);
}

.breadcrumb-item.active {
    color: var(--dark-blue);
    font-weight: 600;
}
</style>
