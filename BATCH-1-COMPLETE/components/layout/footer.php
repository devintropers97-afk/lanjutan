<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Footer Component
 * ================================================
 * Footer dengan design premium:
 * - Company info
 * - Quick links
 * - Services links
 * - Contact info
 * - Social media
 * - NIB badge
 * - Copyright
 */
?>

<footer style="background: linear-gradient(135deg, #0F3057 0%, #000000 100%); border-top: 2px solid var(--gold); padding: 3rem 0 1rem; margin-top: 5rem;">
    <div class="container">
        <div class="row g-4">
            <!-- Column 1: Brand Info & NIB -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <img src="<?= APP_URL ?>/assets/images/logo/logo.png"
                         alt="<?= APP_NAME ?>"
                         width="60"
                         height="60"
                         onerror="this.src='https://ui-avatars.com/api/?name=SITUNEO&size=60&background=FFB400&color=0F3057&bold=true'"
                         style="border-radius: 15px; margin-right: 15px;">
                    <div>
                        <h4 style="color: var(--gold); margin: 0; font-weight: 800; font-family: 'Plus Jakarta Sans', sans-serif;">SITUNEO DIGITAL</h4>
                        <small style="color: var(--text-light);">Digital Harmony</small>
                    </div>
                </div>

                <p style="color: var(--text-light); line-height: 1.8; margin-bottom: 1rem; font-size: 0.95rem;">
                    Partner digital terpercaya sejak 2020. Sudah bantu <?= STATS_CLIENTS ?> bisnis sukses online dengan harga paling terjangkau!
                </p>

                <!-- NIB Badge -->
                <div class="trust-badges">
                    <div style="background: rgba(255,180,0,0.1); border: 1px solid var(--gold); padding: 10px 20px; border-radius: 10px; display: inline-block; margin-bottom: 1rem;">
                        <i class="bi bi-shield-check" style="color: var(--gold); margin-right: 8px;"></i>
                        <strong style="color: var(--gold);">NIB:</strong>
                        <span style="color: var(--text-light); font-size: 0.9rem;"> <?= COMPANY_NIB ?></span>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="social-links mt-3">
                    <a href="<?= SOCIAL_INSTAGRAM ?>" target="_blank" class="social-icon" title="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="<?= SOCIAL_FACEBOOK ?>" target="_blank" class="social-icon" title="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="<?= SOCIAL_LINKEDIN ?>" target="_blank" class="social-icon" title="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="<?= SOCIAL_TIKTOK ?>" target="_blank" class="social-icon" title="TikTok">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    <a href="<?= whatsapp_link(default_whatsapp_message()) ?>" target="_blank" class="social-icon" title="WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h5 style="color: var(--gold); font-weight: 700; margin-bottom: 1.5rem;">Menu Cepat</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="<?= APP_URL ?>"><i class="bi bi-chevron-right"></i> Beranda</a></li>
                    <li><a href="<?= APP_URL ?>/pages/about.php"><i class="bi bi-chevron-right"></i> Tentang Kami</a></li>
                    <li><a href="<?= APP_URL ?>/pages/services.php"><i class="bi bi-chevron-right"></i> Layanan</a></li>
                    <li><a href="<?= APP_URL ?>/pages/portfolio.php"><i class="bi bi-chevron-right"></i> Demo Website</a></li>
                    <li><a href="<?= APP_URL ?>/pages/pricing.php"><i class="bi bi-chevron-right"></i> Harga Paket</a></li>
                    <li><a href="<?= APP_URL ?>/pages/calculator.php"><i class="bi bi-chevron-right"></i> Kalkulator</a></li>
                    <li><a href="<?= APP_URL ?>/pages/contact.php"><i class="bi bi-chevron-right"></i> Hubungi</a></li>
                </ul>
            </div>

            <!-- Column 3: Popular Services -->
            <div class="col-lg-3 col-md-6">
                <h5 style="color: var(--gold); font-weight: 700; margin-bottom: 1.5rem;">Layanan Populer</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="<?= APP_URL ?>/pages/services.php?category=website"><i class="bi bi-check-circle"></i> Bikin Website</a></li>
                    <li><a href="<?= APP_URL ?>/pages/services.php?category=website"><i class="bi bi-check-circle"></i> Toko Online</a></li>
                    <li><a href="<?= APP_URL ?>/pages/services.php?category=marketing"><i class="bi bi-check-circle"></i> SEO Specialist</a></li>
                    <li><a href="<?= APP_URL ?>/pages/services.php?category=marketing"><i class="bi bi-check-circle"></i> Google Ads</a></li>
                    <li><a href="<?= APP_URL ?>/pages/services.php?category=ai"><i class="bi bi-check-circle"></i> Chatbot AI</a></li>
                    <li><a href="<?= APP_URL ?>/pages/services.php?category=branding"><i class="bi bi-check-circle"></i> Logo Design</a></li>
                    <li><a href="<?= APP_URL ?>/pages/services.php?category=content"><i class="bi bi-check-circle"></i> Content Writing</a></li>
                </ul>
            </div>

            <!-- Column 4: Contact -->
            <div class="col-lg-3 col-md-6">
                <h5 style="color: var(--gold); font-weight: 700; margin-bottom: 1.5rem;">Hubungi Kami</h5>
                <div class="contact-info">
                    <!-- WhatsApp -->
                    <div class="mb-3">
                        <i class="bi bi-whatsapp" style="color: var(--gold); font-size: 1.2rem;"></i>
                        <a href="<?= whatsapp_link(default_whatsapp_message()) ?>" target="_blank" style="color: var(--text-light); text-decoration: none; margin-left: 8px;">
                            +<?= COMPANY_WHATSAPP ?>
                        </a>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <i class="bi bi-envelope" style="color: var(--gold); font-size: 1.2rem;"></i>
                        <a href="mailto:<?= COMPANY_EMAIL ?>" style="color: var(--text-light); text-decoration: none; margin-left: 8px;">
                            <?= COMPANY_EMAIL ?>
                        </a>
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <i class="bi bi-telephone" style="color: var(--gold); font-size: 1.2rem;"></i>
                        <a href="tel:<?= COMPANY_PHONE ?>" style="color: var(--text-light); text-decoration: none; margin-left: 8px;">
                            <?= COMPANY_PHONE ?>
                        </a>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <i class="bi bi-geo-alt" style="color: var(--gold); font-size: 1.2rem;"></i>
                        <span style="color: var(--text-light); margin-left: 8px; font-size: 0.9rem;">
                            Jakarta Timur, Indonesia
                        </span>
                    </div>

                    <!-- Business Hours -->
                    <div class="mb-3">
                        <i class="bi bi-clock" style="color: var(--gold); font-size: 1.2rem;"></i>
                        <span style="color: var(--text-light); margin-left: 8px; font-size: 0.9rem;">
                            <?= BUSINESS_HOURS_WEEKDAY ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <hr style="border-color: rgba(255,180,0,0.2); margin: 2rem 0;">

        <!-- Bottom Footer -->
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <p style="color: var(--text-light); margin: 0; font-size: 0.95rem;">
                    &copy; <?= date('Y') ?> <strong style="color: var(--gold);"><?= APP_NAME ?></strong>. All Rights Reserved.
                </p>
                <p style="color: var(--text-light); margin: 0; font-size: 0.85rem;">
                    <a href="<?= APP_URL ?>/pages/privacy.php" style="color: var(--text-light); text-decoration: none;">Privacy Policy</a> |
                    <a href="<?= APP_URL ?>/pages/terms.php" style="color: var(--text-light); text-decoration: none;">Terms of Service</a>
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p style="color: var(--text-light); margin: 0; font-size: 0.95rem;">
                    Made with <i class="bi bi-heart-fill" style="color: #FF0000;"></i> in Jakarta, Indonesia
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<a href="#" class="back-to-top" id="backToTop" title="Back to Top">
    <i class="bi bi-arrow-up"></i>
</a>

<!-- Floating WhatsApp Button -->
<a href="<?= whatsapp_link(default_whatsapp_message()) ?>" target="_blank" class="floating-whatsapp" title="Chat WhatsApp">
    <i class="bi bi-whatsapp"></i>
</a>

<style>
/* Footer Links */
.footer-links li {
    margin-bottom: 0.8rem;
}

.footer-links a {
    color: var(--text-light);
    text-decoration: none;
    transition: all 0.3s;
    display: inline-block;
}

.footer-links a:hover {
    color: var(--gold);
    padding-left: 5px;
}

.footer-links i {
    font-size: 0.8rem;
    margin-right: 5px;
}

/* Social Icons */
.social-links {
    display: flex;
    gap: 10px;
}

.social-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255,180,0,0.1);
    border: 1px solid rgba(255,180,0,0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--gold);
    font-size: 1.2rem;
    transition: all 0.3s;
    text-decoration: none;
}

.social-icon:hover {
    background: var(--gradient-gold);
    color: var(--dark-blue);
    transform: translateY(-3px);
}

/* Back to Top Button */
.back-to-top {
    position: fixed;
    bottom: 100px;
    right: 30px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: var(--gradient-gold);
    color: var(--dark-blue);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    text-decoration: none;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s;
    z-index: 999;
    box-shadow: 0 5px 20px rgba(255,180,0,0.4);
}

.back-to-top.show {
    opacity: 1;
    visibility: visible;
}

.back-to-top:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(255,180,0,0.6);
}

/* Floating WhatsApp Button */
.floating-whatsapp {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: #25D366; /* WhatsApp green */
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    text-decoration: none;
    z-index: 999;
    box-shadow: 0 5px 20px rgba(37, 211, 102, 0.5);
    animation: pulse-whatsapp 2s infinite;
}

.floating-whatsapp:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 30px rgba(37, 211, 102, 0.8);
}

@keyframes pulse-whatsapp {
    0%, 100% {
        box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
    }
    50% {
        box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
    }
}

/* Responsive */
@media (max-width: 768px) {
    .back-to-top {
        right: 20px;
        bottom: 90px;
        width: 45px;
        height: 45px;
    }

    .floating-whatsapp {
        right: 20px;
        bottom: 20px;
        width: 55px;
        height: 55px;
        font-size: 1.8rem;
    }
}
</style>

<script>
// Back to Top Button
const backToTop = document.getElementById('backToTop');

window.addEventListener('scroll', function() {
    if (window.scrollY > 300) {
        backToTop.classList.add('show');
    } else {
        backToTop.classList.remove('show');
    }
});

backToTop.addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});
</script>
