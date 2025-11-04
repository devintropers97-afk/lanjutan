</div>
<!-- End Main Wrapper -->

<!-- Footer -->
<footer class="footer-premium">
    <div class="footer-top">
        <div class="container">
            <div class="row g-4">
                <!-- Company Info -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <img src="<?= ASSETS_URL ?>/images/logo-white.png" alt="SITUNEO" class="footer-logo mb-3" height="50">
                        <p class="footer-tagline mb-3"><?= SITE_TAGLINE ?></p>
                        <p class="footer-desc mb-4">
                            Agency digital terpercaya sejak 2020. Sudah membantu 500+ bisnis sukses online dengan website profesional dan marketing digital.
                        </p>

                        <!-- Social Media -->
                        <div class="footer-social">
                            <a href="<?= SOCIAL_INSTAGRAM ?>" target="_blank" class="social-link">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="<?= SOCIAL_FACEBOOK ?>" target="_blank" class="social-link">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="<?= SOCIAL_LINKEDIN ?>" target="_blank" class="social-link">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="<?= SOCIAL_TIKTOK ?>" target="_blank" class="social-link">
                                <i class="bi bi-tiktok"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <h5 class="footer-widget-title">Navigasi</h5>
                        <ul class="footer-menu">
                            <li><a href="/"><i class="bi bi-chevron-right me-2"></i>Beranda</a></li>
                            <li><a href="/about"><i class="bi bi-chevron-right me-2"></i>Tentang Kami</a></li>
                            <li><a href="/services"><i class="bi bi-chevron-right me-2"></i>Layanan</a></li>
                            <li><a href="/portfolio"><i class="bi bi-chevron-right me-2"></i>Portfolio</a></li>
                            <li><a href="/pricing"><i class="bi bi-chevron-right me-2"></i>Harga</a></li>
                            <li><a href="/contact"><i class="bi bi-chevron-right me-2"></i>Kontak</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Services -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h5 class="footer-widget-title">Layanan Populer</h5>
                        <ul class="footer-menu">
                            <li><a href="/services#website"><i class="bi bi-chevron-right me-2"></i>Jasa Website</a></li>
                            <li><a href="/services#ecommerce"><i class="bi bi-chevron-right me-2"></i>Toko Online</a></li>
                            <li><a href="/services#seo"><i class="bi bi-chevron-right me-2"></i>SEO & Google Ads</a></li>
                            <li><a href="/services#branding"><i class="bi bi-chevron-right me-2"></i>Branding & Desain</a></li>
                            <li><a href="/services#ai"><i class="bi bi-chevron-right me-2"></i>Chatbot AI</a></li>
                            <li><a href="/services#digital-marketing"><i class="bi bi-chevron-right me-2"></i>Digital Marketing</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h5 class="footer-widget-title">Hubungi Kami</h5>
                        <div class="footer-contact">
                            <div class="contact-item mb-3">
                                <i class="bi bi-geo-alt-fill text-gold me-2"></i>
                                <span><?= COMPANY_ADDRESS ?></span>
                            </div>
                            <div class="contact-item mb-3">
                                <i class="bi bi-envelope-fill text-gold me-2"></i>
                                <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a>
                            </div>
                            <div class="contact-item mb-3">
                                <i class="bi bi-telephone-fill text-gold me-2"></i>
                                <a href="tel:<?= SITE_PHONE ?>"><?= SITE_PHONE ?></a>
                            </div>
                            <div class="contact-item mb-3">
                                <i class="bi bi-whatsapp text-gold me-2"></i>
                                <a href="https://wa.me/<?= SITE_WHATSAPP ?>" target="_blank">WhatsApp 24/7</a>
                            </div>
                        </div>

                        <!-- Business Hours -->
                        <div class="mt-4">
                            <h6 class="text-gold mb-2">Jam Operasional</h6>
                            <p class="small mb-1">Senin - Jumat: 09:00 - 18:00</p>
                            <p class="small mb-1">Sabtu: 09:00 - 15:00</p>
                            <p class="small mb-0">Minggu: Tutup</p>
                            <p class="small text-gold mt-2"><i class="bi bi-whatsapp me-1"></i>WhatsApp Support 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">
                        &copy; <?= date('Y') ?> <strong><?= COMPANY_NAME ?></strong>. All Rights Reserved.
                    </p>
                    <p class="small mb-0 mt-1">
                        NIB: <?= COMPANY_NIB ?> | NPWP: <?= COMPANY_NPWP ?>
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                    <ul class="footer-bottom-links">
                        <li><a href="/privacy-policy">Privacy Policy</a></li>
                        <li><a href="/terms-of-service">Terms of Service</a></li>
                        <li><a href="/sitemap">Sitemap</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<!-- Custom Scripts -->
<script src="<?= ASSETS_URL ?>/js/main.js"></script>
<script src="<?= ASSETS_URL ?>/js/network-bg.js"></script>
<script src="<?= ASSETS_URL ?>/js/loading-screen.js"></script>
<script src="<?= ASSETS_URL ?>/js/animations.js"></script>
<script src="<?= ASSETS_URL ?>/js/order-notification.js"></script>
<script src="<?= ASSETS_URL ?>/js/language-switcher.js"></script>

<?php if (isset($customJS)): ?>
<script src="<?= ASSETS_URL ?>/js/<?= $customJS ?>"></script>
<?php endif; ?>

<script>
// Initialize AOS
AOS.init({
    duration: 1000,
    once: true,
    offset: 100
});

// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('mainNavbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Back to top button
window.addEventListener('scroll', function() {
    const backToTop = document.getElementById('backToTop');
    if (window.scrollY > 300) {
        backToTop.style.display = 'flex';
    } else {
        backToTop.style.display = 'none';
    }
});

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Close order notification
function closeOrderNotification() {
    document.getElementById('orderNotification').classList.remove('show');
}
</script>

</body>
</html>
