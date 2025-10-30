<?php
/**
 * Portfolio Section Component
 */

// Featured Portfolio Items (12 showcases)
$portfolio_items = [
    [
        'title' => 'Toko Fashion Online',
        'title_en' => 'Fashion Online Store',
        'category' => 'E-Commerce',
        'image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=600&h=400&fit=crop',
        'description' => 'Website toko online fashion dengan fitur lengkap',
        'url' => '#'
    ],
    [
        'title' => 'Restoran Modern',
        'title_en' => 'Modern Restaurant',
        'category' => 'Website',
        'image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&h=400&fit=crop',
        'description' => 'Website restoran dengan sistem reservasi online',
        'url' => '#'
    ],
    [
        'title' => 'Klinik Kesehatan',
        'title_en' => 'Health Clinic',
        'category' => 'Website',
        'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=600&h=400&fit=crop',
        'description' => 'Website klinik dengan booking appointment',
        'url' => '#'
    ],
    [
        'title' => 'Sistem CRM Penjualan',
        'title_en' => 'Sales CRM System',
        'category' => 'SaaS',
        'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop',
        'description' => 'Dashboard CRM untuk manajemen penjualan',
        'url' => '#'
    ],
    [
        'title' => 'Aplikasi Delivery',
        'title_en' => 'Delivery App',
        'category' => 'Mobile App',
        'image' => 'https://images.unsplash.com/photo-1526367790999-0150786686a2?w=600&h=400&fit=crop',
        'description' => 'Mobile app delivery dengan tracking real-time',
        'url' => '#'
    ],
    [
        'title' => 'Brand Identity Kopi',
        'title_en' => 'Coffee Brand Identity',
        'category' => 'Branding',
        'image' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e?w=600&h=400&fit=crop',
        'description' => 'Logo dan brand identity untuk coffee shop',
        'url' => '#'
    ],
    [
        'title' => 'Landing Page Properti',
        'title_en' => 'Property Landing Page',
        'category' => 'Landing Page',
        'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=600&h=400&fit=crop',
        'description' => 'Landing page untuk marketing properti',
        'url' => '#'
    ],
    [
        'title' => 'Dashboard Analytics',
        'title_en' => 'Analytics Dashboard',
        'category' => 'Dashboard',
        'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&h=400&fit=crop',
        'description' => 'Dashboard analytics untuk business intelligence',
        'url' => '#'
    ],
    [
        'title' => 'E-Learning Platform',
        'title_en' => 'E-Learning Platform',
        'category' => 'SaaS',
        'image' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?w=600&h=400&fit=crop',
        'description' => 'Platform pembelajaran online dengan video',
        'url' => '#'
    ],
    [
        'title' => 'Portfolio Fotografer',
        'title_en' => 'Photographer Portfolio',
        'category' => 'Website',
        'image' => 'https://images.unsplash.com/photo-1452587925148-ce544e77e70d?w=600&h=400&fit=crop',
        'description' => 'Website portfolio untuk fotografer profesional',
        'url' => '#'
    ],
    [
        'title' => 'Marketplace Digital',
        'title_en' => 'Digital Marketplace',
        'category' => 'E-Commerce',
        'image' => 'https://images.unsplash.com/photo-1556742502-ec7c0e9f34b1?w=600&h=400&fit=crop',
        'description' => 'Marketplace untuk produk digital',
        'url' => '#'
    ],
    [
        'title' => 'Company Profile',
        'title_en' => 'Company Profile',
        'category' => 'Website',
        'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&h=400&fit=crop',
        'description' => 'Website company profile untuk perusahaan',
        'url' => '#'
    ]
];

// Get unique categories
$categories = array_unique(array_column($portfolio_items, 'category'));
?>

<!-- Portfolio Section -->
<section id="portfolio" style="padding: 80px 0; background: white;">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title" style="font-size: 2.8rem; font-weight: 900; color: var(--dark-blue); margin-bottom: 15px;">
                <?= $t['section_portfolio'] ?>
            </h2>
            <p class="lead" style="color: var(--text-light); max-width: 700px; margin: 0 auto; font-size: 1.2rem;">
                <?= $lang === 'id' ? 'Karya terbaik kami untuk berbagai industri' : 'Our best works for various industries' ?>
            </p>
        </div>

        <!-- Portfolio Filter -->
        <div class="text-center mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="btn-group" role="group">
                <button class="btn btn-outline-primary portfolio-filter active" data-filter="all" style="border-radius: 25px 0 0 25px; padding: 10px 24px; font-weight: 600;">
                    <?= $lang === 'id' ? 'Semua' : 'All' ?>
                </button>
                <?php foreach ($categories as $category): ?>
                    <button class="btn btn-outline-primary portfolio-filter" data-filter="<?= strtolower(str_replace(' ', '-', $category)) ?>" style="padding: 10px 24px; font-weight: 600;">
                        <?= $category ?>
                    </button>
                <?php endforeach; ?>
                <button class="btn btn-outline-primary portfolio-filter" data-filter="website" style="border-radius: 0 25px 25px 0; padding: 10px 24px; font-weight: 600;">
                </button>
            </div>
        </div>

        <!-- Portfolio Grid -->
        <div class="row g-4 mb-5">
            <?php foreach ($portfolio_items as $index => $item): ?>
                <div class="col-lg-4 col-md-6 portfolio-item" data-category="<?= strtolower(str_replace(' ', '-', $item['category'])) ?>" data-aos="zoom-in" data-aos-delay="<?= ($index % 3) * 100 ?>">
                    <div style="position: relative; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; height: 300px; cursor: pointer;" class="portfolio-card">
                        <!-- Image -->
                        <img src="<?= $item['image'] ?>" alt="<?= $item['title'] ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">

                        <!-- Overlay -->
                        <div style="position: absolute; inset: 0; background: linear-gradient(180deg, transparent 0%, rgba(15, 48, 87, 0.95) 70%); opacity: 0; transition: opacity 0.3s ease; display: flex; flex-direction: column; justify-content: flex-end; padding: 25px;" class="portfolio-overlay">
                            <!-- Category Badge -->
                            <div style="position: absolute; top: 20px; right: 20px; background: var(--gradient-gold); padding: 6px 14px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; color: var(--dark-blue);">
                                <?= $item['category'] ?>
                            </div>

                            <!-- Content -->
                            <div>
                                <h4 style="color: white; font-weight: 700; font-size: 1.3rem; margin-bottom: 8px;">
                                    <?= $lang === 'en' && isset($item['title_en']) ? $item['title_en'] : $item['title'] ?>
                                </h4>
                                <p style="color: rgba(255, 255, 255, 0.9); font-size: 0.9rem; margin-bottom: 15px;">
                                    <?= $item['description'] ?>
                                </p>
                                <a href="<?= $item['url'] ?>" style="display: inline-flex; align-items: center; gap: 8px; color: var(--gold); font-weight: 600; text-decoration: none; transition: gap 0.3s ease;">
                                    <span><?= $lang === 'id' ? 'Lihat Detail' : 'View Details' ?></span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- View All Button -->
        <div class="text-center" data-aos="fade-up">
            <a href="pages/portfolio.php" class="btn btn-outline-primary btn-lg" style="border-radius: 50px; padding: 15px 40px; font-weight: 700; border-width: 2px;">
                <i class="bi bi-collection"></i>
                <?= $lang === 'id' ? 'Lihat Semua Portfolio' : 'View All Portfolio' ?>
            </a>
        </div>
    </div>
</section>

<style>
/* Portfolio Card Hover Effects */
.portfolio-card:hover img {
    transform: scale(1.1);
}

.portfolio-card:hover .portfolio-overlay {
    opacity: 1;
}

.portfolio-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.portfolio-filter.active {
    background: var(--primary-blue);
    color: white;
    border-color: var(--primary-blue);
}

.portfolio-filter:hover {
    background: var(--primary-blue);
    color: white;
    border-color: var(--primary-blue);
}
</style>

<script>
// Portfolio Filter
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.portfolio-filter');
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');

            portfolioItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 10);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
});
</script>
