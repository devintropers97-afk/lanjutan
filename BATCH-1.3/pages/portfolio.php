<?php
/**
 * Portfolio Page
 */
require_once __DIR__ . '/../includes/config/config.php';
require_once __DIR__ . '/../includes/data/portfolio-data.php';

$page_title = $lang === 'id' ? 'Portfolio Proyek - SITUNEO' : 'Project Portfolio - SITUNEO';
?>

<?php include __DIR__ . '/../includes/components/header.php'; ?>

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%); padding: 80px 0; text-align: center; color: white;">
    <div class="container">
        <h1 style="font-size: 48px; font-weight: 900; margin-bottom: 15px;">
            <?= $lang === 'id' ? 'Portfolio Kami' : 'Our Portfolio' ?>
        </h1>
        <p style="font-size: 20px;">
            <?= $lang === 'id' ? '500+ Proyek Selesai • 100% Client Puas' : '500+ Completed Projects • 100% Client Satisfaction' ?>
        </p>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="portfolio-section" style="padding: 80px 0; background: #f5f7fa;">
    <div class="container">
        <!-- Filter Buttons -->
        <div class="filter-buttons" style="text-align: center; margin-bottom: 40px;">
            <button class="filter-btn active" data-filter="all" style="background: var(--gold); color: var(--dark-blue); border: none; padding: 10px 25px; border-radius: 25px; margin: 5px; font-weight: 600; cursor: pointer;">
                <?= $lang === 'id' ? 'Semua' : 'All' ?>
            </button>
            <?php
            $categories = array_unique(array_column($portfolio_items, 'category'));
            foreach ($categories as $cat):
            ?>
                <button class="filter-btn" data-filter="<?= $cat ?>" style="background: white; color: var(--dark-blue); border: 2px solid var(--primary-blue); padding: 10px 25px; border-radius: 25px; margin: 5px; font-weight: 600; cursor: pointer;">
                    <?= ucfirst($cat) ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Portfolio Grid -->
        <div class="portfolio-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px;">
            <?php foreach ($portfolio_items as $item): ?>
                <div class="portfolio-card" data-category="<?= $item['category'] ?>" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                    <div class="portfolio-image" style="height: 250px; overflow: hidden; position: relative;">
                        <img src="<?= $item['image'] ?>" alt="<?= $item['title'] ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <div class="portfolio-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(30, 92, 153, 0.9); display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity 0.3s ease;">
                            <a href="<?= $item['url'] ?>" target="_blank" style="background: var(--gold); color: var(--dark-blue); padding: 12px 25px; border-radius: 25px; font-weight: 700; text-decoration: none;">
                                <?= $lang === 'id' ? 'Lihat Project' : 'View Project' ?>
                            </a>
                        </div>
                    </div>
                    <div class="portfolio-content" style="padding: 25px;">
                        <div class="portfolio-category" style="display: inline-block; background: rgba(255, 180, 0, 0.2); color: var(--dark-blue); padding: 5px 15px; border-radius: 15px; font-size: 12px; font-weight: 600; margin-bottom: 10px;">
                            <?= ucfirst($item['category']) ?>
                        </div>
                        <h3 style="font-size: 20px; font-weight: 700; color: var(--dark-blue); margin-bottom: 10px;">
                            <?= $lang === 'en' && isset($item['title_en']) ? e($item['title_en']) : e($item['title']) ?>
                        </h3>
                        <p style="font-size: 14px; color: #666; margin-bottom: 15px;">
                            <?= $lang === 'en' && isset($item['description_en']) ? e($item['description_en']) : e($item['description']) ?>
                        </p>
                        <div class="portfolio-tags" style="display: flex; flex-wrap: wrap; gap: 8px;">
                            <?php foreach ($item['tags'] as $tag): ?>
                                <span style="background: #f0f0f0; padding: 4px 12px; border-radius: 12px; font-size: 11px; color: #666;">
                                    <?= e($tag) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.portfolio-card:hover .portfolio-overlay {
    opacity: 1;
}
.portfolio-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}
.filter-btn:hover {
    background: var(--gold) !important;
    color: var(--dark-blue) !important;
    border-color: var(--gold) !important;
}
</style>

<?php include __DIR__ . '/../includes/components/footer.php'; ?>
