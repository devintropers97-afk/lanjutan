<?php
/**
 * SITUNEO DIGITAL - Homepage
 * Main landing page dengan hero, stats, services, portfolio, testimonials, pricing, blog, FAQs
 */

require_once __DIR__ . '/includes/init.php';

// Page config
$currentPage = 'home';
$pageTitle = 'Beranda';
$pageDescription = 'SITUNEO DIGITAL - Solusi Digital Terpercaya untuk Bisnis Anda. Bikin Website Profesional Cuma Rp 150rb Perbulan.';
$pageKeywords = 'web development, mobile app, digital marketing, jasa website, pembuatan aplikasi';
$pageCSS = '/assets/css/pages/homepage.css';

// Fetch data
$featuredServices = getFeaturedServices(6);
$portfolioItems = $db->fetchAll("SELECT * FROM portfolios WHERE is_published = 1 AND is_featured = 1 ORDER BY order_position ASC LIMIT 6");
$testimonials = $db->fetchAll("SELECT * FROM testimonials WHERE is_approved = 1 AND is_featured = 1 ORDER BY created_at DESC LIMIT 6");
$latestPosts = $db->fetchAll("SELECT bp.*, bc.name as category_name FROM blog_posts bp LEFT JOIN blog_categories bc ON bp.category_id = bc.id WHERE bp.status = 'published' ORDER BY bp.published_at DESC LIMIT 3");
$faqs = $db->fetchAll("SELECT * FROM faqs WHERE is_active = 1 ORDER BY order_position ASC LIMIT 8");

// Include header
include __DIR__ . '/components/layout/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-background"></div>
    <div class="container">
        <div class="hero-content text-center">
            <h1 class="hero-title fade-in">
                Bikin Website Profesional<br>
                <span class="text-gradient">Cuma Rp 150rb Perbulan</span>
            </h1>
            <p class="hero-subtitle fade-in">
                <?php echo COMPANY_USP; ?>
            </p>
            <div class="hero-cta fade-in d-flex justify-center gap-md mt-3">
                <a href="/calculator" class="btn btn-gold btn-lg">
                    <i class="fas fa-calculator"></i> Hitung Harga Sekarang
                </a>
                <a href="<?php echo whatsappUrl('Halo! Saya mau konsultasi FREE dan lihat demo 24 jam website saya!'); ?>" class="btn btn-outline-white btn-lg" target="_blank">
                    <i class="fab fa-whatsapp"></i> Konsultasi Gratis
                </a>
            </div>

            <!-- Trust Badges -->
            <div class="trust-badges mt-4 d-flex justify-center gap-lg flex-wrap">
                <div class="trust-item">
                    <i class="fas fa-check-circle text-gold"></i>
                    <span>FREE Demo 24 Jam</span>
                </div>
                <div class="trust-item">
                    <i class="fas fa-shield-alt text-gold"></i>
                    <span>Garansi Uang Kembali</span>
                </div>
                <div class="trust-item">
                    <i class="fas fa-headset text-gold"></i>
                    <span>Support 24/7</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats section bg-gradient-primary text-white">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item slide-up">
                <div class="stat-number"><?php echo STATS_CLIENTS; ?></div>
                <div class="stat-label">Klien Puas</div>
            </div>
            <div class="stat-item slide-up">
                <div class="stat-number"><?php echo STATS_PROJECTS; ?></div>
                <div class="stat-label">Proyek Selesai</div>
            </div>
            <div class="stat-item slide-up">
                <div class="stat-number"><?php echo STATS_SATISFACTION; ?></div>
                <div class="stat-label">Rating Kepuasan</div>
            </div>
            <div class="stat-item slide-up">
                <div class="stat-number"><?php echo STATS_EXPERIENCE_YEARS; ?></div>
                <div class="stat-label">Tahun Pengalaman</div>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview Section -->
<section class="services-preview section">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Layanan Kami</h2>
            <p class="section-subtitle text-muted">
                Solusi digital lengkap untuk semua kebutuhan bisnis Anda
            </p>
        </div>

        <div class="services-grid">
            <?php foreach ($featuredServices as $service): ?>
                <div class="service-card hover-lift">
                    <div class="service-image">
                        <img src="https://source.unsplash.com/800x600/?<?php echo urlencode($service['name']); ?>,digital,technology"
                             alt="<?php echo htmlspecialchars($service['name']); ?>"
                             loading="lazy">
                    </div>
                    <div class="service-content">
                        <span class="service-category"><?php echo htmlspecialchars($service['category_name']); ?></span>
                        <h3 class="service-title"><?php echo htmlspecialchars($service['name']); ?></h3>
                        <p class="service-description"><?php echo htmlspecialchars($service['short_description']); ?></p>
                        <div class="service-price">
                            <?php if ($service['sale_price']): ?>
                                <span class="price-old"><?php echo formatRupiah($service['base_price']); ?></span>
                                <span class="price-current"><?php echo formatRupiah($service['sale_price']); ?></span>
                            <?php else: ?>
                                <span class="price-current"><?php echo formatRupiah($service['base_price']); ?></span>
                            <?php endif; ?>
                        </div>
                        <a href="/services/<?php echo $service['slug']; ?>" class="btn btn-primary w-full">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-4">
            <a href="/services" class="btn btn-outline-primary btn-lg">
                Lihat Semua Layanan <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Portfolio Showcase -->
<section class="portfolio-showcase section bg-light">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Portfolio Kami</h2>
            <p class="section-subtitle text-muted">
                Lihat hasil karya terbaik kami untuk berbagai client
            </p>
        </div>

        <div class="portfolio-grid">
            <?php foreach ($portfolioItems as $item): ?>
                <div class="portfolio-item hover-scale">
                    <div class="portfolio-image">
                        <img src="https://source.unsplash.com/800x600/?<?php echo urlencode($item['title']); ?>,website,design"
                             alt="<?php echo htmlspecialchars($item['title']); ?>"
                             loading="lazy">
                    </div>
                    <div class="portfolio-overlay">
                        <h3 class="portfolio-title"><?php echo htmlspecialchars($item['title']); ?></h3>
                        <p class="portfolio-category"><?php echo htmlspecialchars($item['client_company'] ?? 'Project'); ?></p>
                        <a href="/portfolio/<?php echo $item['slug']; ?>" class="btn btn-sm btn-gold">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-4">
            <a href="/portfolio" class="btn btn-primary btn-lg">
                Lihat Semua Portfolio <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials section">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Apa Kata Mereka?</h2>
            <p class="section-subtitle text-muted">
                Testimoni dari client yang puas dengan layanan kami
            </p>
        </div>

        <div class="testimonials-grid">
            <?php foreach ($testimonials as $testimonial): ?>
                <div class="testimonial-card">
                    <div class="testimonial-header d-flex align-center gap-md mb-3">
                        <img src="<?php echo $testimonial['avatar'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($testimonial['name']); ?>"
                             alt="<?php echo htmlspecialchars($testimonial['name']); ?>"
                             class="testimonial-avatar">
                        <div>
                            <h4 class="testimonial-name"><?php echo htmlspecialchars($testimonial['name']); ?></h4>
                            <?php if ($testimonial['position']): ?>
                                <p class="testimonial-position text-sm text-muted">
                                    <?php echo htmlspecialchars($testimonial['position']); ?>
                                    <?php if ($testimonial['company']): ?>
                                        di <?php echo htmlspecialchars($testimonial['company']); ?>
                                    <?php endif; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="testimonial-rating mb-2">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <i class="fas fa-star <?php echo $i < $testimonial['rating'] ? 'text-gold' : 'text-muted'; ?>"></i>
                        <?php endfor; ?>
                    </div>
                    <p class="testimonial-text"><?php echo nl2br(htmlspecialchars($testimonial['testimonial'])); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Pricing Preview Section -->
<section class="pricing-preview section bg-light">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Harga Terjangkau</h2>
            <p class="section-subtitle text-muted">
                Mulai dari Rp 150rb/bulan untuk website profesional
            </p>
        </div>

        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3 class="pricing-title">Starter</h3>
                    <div class="pricing-price">
                        <span class="price-currency">Rp</span>
                        <span class="price-amount">150rb</span>
                        <span class="price-period">/bulan</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check text-success"></i> 5 Halaman Website</li>
                    <li><i class="fas fa-check text-success"></i> Responsive Design</li>
                    <li><i class="fas fa-check text-success"></i> FREE Domain .com</li>
                    <li><i class="fas fa-check text-success"></i> FREE SSL Certificate</li>
                    <li><i class="fas fa-check text-success"></i> Support Email</li>
                </ul>
                <a href="/pricing" class="btn btn-outline-primary w-full">Pilih Paket</a>
            </div>

            <div class="pricing-card featured">
                <div class="pricing-badge">TERPOPULER</div>
                <div class="pricing-header">
                    <h3 class="pricing-title">Professional</h3>
                    <div class="pricing-price">
                        <span class="price-currency">Rp</span>
                        <span class="price-amount">350rb</span>
                        <span class="price-period">/bulan</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check text-gold"></i> 10 Halaman Website</li>
                    <li><i class="fas fa-check text-gold"></i> Advanced Features</li>
                    <li><i class="fas fa-check text-gold"></i> FREE Domain + Hosting</li>
                    <li><i class="fas fa-check text-gold"></i> FREE SSL + Email</li>
                    <li><i class="fas fa-check text-gold"></i> Priority Support</li>
                    <li><i class="fas fa-check text-gold"></i> SEO Optimization</li>
                </ul>
                <a href="/pricing" class="btn btn-gold w-full">Pilih Paket</a>
            </div>

            <div class="pricing-card">
                <div class="pricing-header">
                    <h3 class="pricing-title">Enterprise</h3>
                    <div class="pricing-price">
                        <span class="price-currency">Rp</span>
                        <span class="price-amount">750rb</span>
                        <span class="price-period">/bulan</span>
                    </div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check text-success"></i> Unlimited Pages</li>
                    <li><i class="fas fa-check text-success"></i> Custom Features</li>
                    <li><i class="fas fa-check text-success"></i> Premium Hosting</li>
                    <li><i class="fas fa-check text-success"></i> Dedicated Support</li>
                    <li><i class="fas fa-check text-success"></i> Analytics & Reports</li>
                    <li><i class="fas fa-check text-success"></i> Marketing Tools</li>
                </ul>
                <a href="/pricing" class="btn btn-outline-primary w-full">Pilih Paket</a>
            </div>
        </div>

        <div class="text-center mt-4">
            <p class="text-muted">Belum yakin? <a href="/calculator" class="text-primary font-weight-bold">Coba Kalkulator Harga</a> untuk estimasi yang lebih detail</p>
        </div>
    </div>
</section>

<!-- Blog Preview Section -->
<?php if (!empty($latestPosts)): ?>
<section class="blog-preview section">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Blog & Tips</h2>
            <p class="section-subtitle text-muted">
                Artikel terbaru seputar digital, bisnis, dan teknologi
            </p>
        </div>

        <div class="blog-grid">
            <?php foreach ($latestPosts as $post): ?>
                <div class="blog-card hover-lift">
                    <div class="blog-image">
                        <img src="https://source.unsplash.com/800x600/?<?php echo urlencode($post['title']); ?>,blog,article"
                             alt="<?php echo htmlspecialchars($post['title']); ?>"
                             loading="lazy">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="far fa-calendar"></i> <?php echo formatDate($post['published_at']); ?></span>
                            <span><i class="far fa-folder"></i> <?php echo htmlspecialchars($post['category_name']); ?></span>
                        </div>
                        <h3 class="blog-title"><?php echo htmlspecialchars($post['title']); ?></h3>
                        <p class="blog-excerpt"><?php echo truncate(strip_tags($post['excerpt'] ?? $post['content']), 120); ?></p>
                        <a href="/blog/<?php echo $post['slug']; ?>" class="btn btn-sm btn-outline-primary">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-4">
            <a href="/blog" class="btn btn-outline-primary btn-lg">
                Lihat Semua Artikel <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- FAQs Section -->
<?php if (!empty($faqs)): ?>
<section class="faqs section bg-light">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">Pertanyaan Umum</h2>
            <p class="section-subtitle text-muted">
                Jawaban untuk pertanyaan yang sering ditanyakan
            </p>
        </div>

        <div class="faqs-container">
            <?php foreach ($faqs as $index => $faq): ?>
                <div class="faq-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        <span><?php echo htmlspecialchars($faq['question']); ?></span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer" style="<?php echo $index === 0 ? 'display: block;' : ''; ?>">
                        <p><?php echo nl2br(htmlspecialchars($faq['answer'])); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-4">
            <p class="text-muted">Punya pertanyaan lain? <a href="/contact" class="text-primary font-weight-bold">Hubungi kami</a> sekarang!</p>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Section -->
<section class="cta-section bg-gradient-gold text-white">
    <div class="container text-center">
        <h2 class="cta-title mb-3">Siap Wujudkan Website Impian Anda?</h2>
        <p class="cta-subtitle mb-4">
            Dapatkan FREE Demo 24 Jam dan konsultasi gratis dengan expert kami!
        </p>
        <div class="cta-buttons d-flex justify-center gap-md flex-wrap">
            <a href="/calculator" class="btn btn-white btn-lg">
                <i class="fas fa-calculator"></i> Hitung Harga Sekarang
            </a>
            <a href="<?php echo whatsappUrl('Halo! Saya tertarik dengan layanan SITUNEO DIGITAL dan ingin konsultasi gratis!'); ?>" class="btn btn-outline-white btn-lg" target="_blank">
                <i class="fab fa-whatsapp"></i> Chat via WhatsApp
            </a>
        </div>
    </div>
</section>

<script>
// FAQ Toggle
function toggleFaq(btn) {
    const item = btn.parentElement;
    const answer = item.querySelector('.faq-answer');
    const isActive = item.classList.contains('active');

    // Close all
    document.querySelectorAll('.faq-item').forEach(el => {
        el.classList.remove('active');
        el.querySelector('.faq-answer').style.display = 'none';
    });

    // Toggle current
    if (!isActive) {
        item.classList.add('active');
        answer.style.display = 'block';
    }
}

// Scroll animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

document.querySelectorAll('.slide-up, .fade-in, .hover-lift, .hover-scale').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'all 0.6s ease-out';
    observer.observe(el);
});

// User menu dropdown
document.getElementById('userMenuBtn')?.addEventListener('click', function() {
    document.getElementById('userDropdown').classList.toggle('show');
});

// Mobile menu
document.getElementById('mobileMenuToggle')?.addEventListener('click', function() {
    document.getElementById('mobileMenuOverlay').classList.add('active');
    document.body.style.overflow = 'hidden';
});

document.getElementById('mobileMenuClose')?.addEventListener('click', function() {
    document.getElementById('mobileMenuOverlay').classList.remove('active');
    document.body.style.overflow = '';
});

// Scroll to top
const scrollTopBtn = document.getElementById('scrollTopBtn');
window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
        scrollTopBtn.style.display = 'flex';
    } else {
        scrollTopBtn.style.display = 'none';
    }
});

scrollTopBtn?.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});
</script>

<?php include __DIR__ . '/components/layout/footer.php'; ?>
