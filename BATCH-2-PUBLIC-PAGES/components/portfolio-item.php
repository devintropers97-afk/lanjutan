<?php
/**
 * Portfolio Item Component
 * Usage: include('components/portfolio-item.php');
 * Variables: $portfolio = array with portfolio data
 */
?>

<div class="portfolio-item" data-category="<?= $portfolio['category'] ?>" data-aos="fade-up">
    <div class="portfolio-image">
        <img src="https://via.placeholder.com/400x300/1E5C99/FFB400?text=<?= urlencode($portfolio['title']) ?>" alt="<?= e($portfolio['title']) ?>" loading="lazy">
        <div class="portfolio-overlay">
            <div class="portfolio-info">
                <span class="portfolio-type"><?= t('lang') == 'en' ? e($portfolio['type_en']) : e($portfolio['type']) ?></span>
                <h4><?= e($portfolio['title']) ?></h4>
                <p><?= excerpt(t('lang') == 'en' ? $portfolio['description_en'] : $portfolio['description'], 100) ?></p>
                <div class="portfolio-tech">
                    <?php foreach ($portfolio['technologies'] as $tech): ?>
                        <span class="badge"><?= e($tech) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-content">
        <div class="portfolio-category">
            <i class="bi bi-folder"></i> <?= e($portfolio['category_name']) ?>
        </div>
        <h5 class="portfolio-title"><?= e($portfolio['title']) ?></h5>
        <div class="portfolio-year">
            <i class="bi bi-calendar"></i> <?= $portfolio['year'] ?>
        </div>
    </div>
</div>

<style>
.portfolio-item {
    margin-bottom: 30px;
    display: none; /* Hidden by default, shown by JS filter */
}

.portfolio-item.active {
    display: block;
}

.portfolio-image {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    aspect-ratio: 4/3;
}

.portfolio-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.portfolio-item:hover .portfolio-image img {
    transform: scale(1.1);
}

.portfolio-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(15, 48, 87, 0.95) 0%, rgba(30, 92, 153, 0.95) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    padding: 20px;
}

.portfolio-item:hover .portfolio-overlay {
    opacity: 1;
}

.portfolio-info {
    color: white;
    text-align: center;
}

.portfolio-type {
    background: var(--gradient-gold);
    color: var(--dark-blue);
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 10px;
}

.portfolio-info h4 {
    font-size: 20px;
    margin-bottom: 10px;
}

.portfolio-info p {
    font-size: 14px;
    margin-bottom: 15px;
    opacity: 0.9;
}

.portfolio-tech {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    justify-content: center;
}

.portfolio-tech .badge {
    background: rgba(255, 180, 0, 0.2);
    border: 1px solid var(--gold);
    color: var(--gold);
    font-size: 11px;
    padding: 3px 10px;
}

.portfolio-content {
    padding: 15px 0;
}

.portfolio-category {
    color: var(--primary-blue);
    font-size: 14px;
    margin-bottom: 5px;
}

.portfolio-title {
    font-size: 18px;
    font-weight: 600;
    color: var(--dark-blue);
    margin-bottom: 5px;
}

.portfolio-year {
    color: #999;
    font-size: 13px;
}
</style>
