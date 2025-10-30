<?php
/**
 * Footer Component
 */
?>

<!-- Footer -->
<footer style="background: linear-gradient(180deg, #0F3057 0%, #1E5C99 100%); color: white; padding: 60px 0 0;">
    <div class="container">
        <div class="row g-4 mb-5">
            <!-- Brand Column -->
            <div class="col-lg-4">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                    <img src="https://situneo.my.id/logo" alt="SITUNEO Logo" style="height: 45px;">
                    <h3 style="font-weight: 900; font-size: 1.8rem; margin: 0; background: var(--gradient-gold); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">SITUNEO</h3>
                </div>
                <p style="color: rgba(255, 255, 255, 0.8); line-height: 1.6; margin-bottom: 20px;">
                    <?= SITE_TAGLINE ?>
                </p>
                <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 15px; padding: 15px; margin-bottom: 20px;">
                    <div style="font-size: 0.85rem; margin-bottom: 8px;">
                        <i class="bi bi-shield-check" style="color: var(--gold);"></i>
                        <strong>NIB:</strong> <?= COMPANY_NIB ?>
                    </div>
                    <div style="font-size: 0.85rem;">
                        <i class="bi bi-file-text" style="color: var(--gold);"></i>
                        <strong>NPWP:</strong> <?= COMPANY_NPWP ?>
                    </div>
                </div>
                <!-- Social Media -->
                <div style="display: flex; gap: 12px;">
                    <a href="<?= SOCIAL_INSTAGRAM ?>" target="_blank" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease;">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="<?= SOCIAL_FACEBOOK ?>" target="_blank" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease;">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="<?= SOCIAL_LINKEDIN ?>" target="_blank" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease;">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="<?= SOCIAL_TIKTOK ?>" target="_blank" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease;">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    <a href="<?= SOCIAL_YOUTUBE ?>" target="_blank" style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease;">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-4">
                <h4 style="font-weight: 700; margin-bottom: 20px; color: var(--gold); font-size: 1.1rem;">
                    <?= $lang === 'id' ? 'Tautan Cepat' : 'Quick Links' ?>
                </h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;">
                        <a href="/" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px;">
                            <i class="bi bi-chevron-right" style="font-size: 0.8rem;"></i>
                            <span><?= $lang === 'id' ? 'Beranda' : 'Home' ?></span>
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="#about" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px;">
                            <i class="bi bi-chevron-right" style="font-size: 0.8rem;"></i>
                            <span><?= $lang === 'id' ? 'Tentang Kami' : 'About Us' ?></span>
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="#services" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px;">
                            <i class="bi bi-chevron-right" style="font-size: 0.8rem;"></i>
                            <span><?= $lang === 'id' ? 'Layanan' : 'Services' ?></span>
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="#portfolio" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px;">
                            <i class="bi bi-chevron-right" style="font-size: 0.8rem;"></i>
                            <span>Portfolio</span>
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="pages/pricing.php" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px;">
                            <i class="bi bi-chevron-right" style="font-size: 0.8rem;"></i>
                            <span><?= $lang === 'id' ? 'Harga' : 'Pricing' ?></span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Services -->
            <div class="col-lg-3 col-md-4">
                <h4 style="font-weight: 700; margin-bottom: 20px; color: var(--gold); font-size: 1.1rem;">
                    <?= $lang === 'id' ? 'Layanan Kami' : 'Our Services' ?>
                </h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;">
                        <a href="pages/services.php" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px;">
                            <i class="bi bi-chevron-right" style="font-size: 0.8rem;"></i>
                            <span>Website & Development</span>
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="pages/services.php" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px;">
                            <i class="bi bi-chevron-right" style="font-size: 0.8rem;"></i>
                            <span>Digital Marketing</span>
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="pages/services.php" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px;">
                            <i class="bi bi-chevron-right" style="font-size: 0.8rem;"></i>
                            <span>AI & Automation</span>
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="pages/services.php" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px;">
                            <i class="bi bi-chevron-right" style="font-size: 0.8rem;"></i>
                            <span>Branding & Creative</span>
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="pages/services.php" style="color: rgba(255, 255, 255, 0.8); text-decoration: none; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px;">
                            <i class="bi bi-chevron-right" style="font-size: 0.8rem;"></i>
                            <span>Content & Copywriting</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-4">
                <h4 style="font-weight: 700; margin-bottom: 20px; color: var(--gold); font-size: 1.1rem;">
                    <?= $lang === 'id' ? 'Hubungi Kami' : 'Contact Us' ?>
                </h4>
                <div style="margin-bottom: 15px;">
                    <a href="<?= whatsapp_link('Halo SITUNEO!') ?>" style="color: rgba(255, 255, 255, 0.9); text-decoration: none; display: flex; align-items: center; gap: 10px; transition: all 0.3s ease;">
                        <i class="bi bi-whatsapp" style="font-size: 1.3rem; color: #25D366;"></i>
                        <span><?= COMPANY_WHATSAPP ?></span>
                    </a>
                </div>
                <div style="margin-bottom: 15px;">
                    <a href="mailto:<?= COMPANY_EMAIL ?>" style="color: rgba(255, 255, 255, 0.9); text-decoration: none; display: flex; align-items: center; gap: 10px; transition: all 0.3s ease;">
                        <i class="bi bi-envelope" style="font-size: 1.2rem; color: var(--gold);"></i>
                        <span><?= COMPANY_EMAIL ?></span>
                    </a>
                </div>
                <div style="color: rgba(255, 255, 255, 0.8); display: flex; align-items: flex-start; gap: 10px; font-size: 0.9rem;">
                    <i class="bi bi-geo-alt-fill" style="font-size: 1.2rem; color: var(--gold); margin-top: 2px;"></i>
                    <span><?= COMPANY_ADDRESS ?></span>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div style="border-top: 1px solid rgba(255, 255, 255, 0.2); padding: 25px 0; text-align: center;">
            <p style="color: rgba(255, 255, 255, 0.8); margin-bottom: 8px; font-size: 0.95rem;">
                &copy; <?= date('Y') ?> <strong style="color: var(--gold);">SITUNEO DIGITAL</strong>. <?= $lang === 'id' ? 'Semua Hak Dilindungi.' : 'All Rights Reserved.' ?>
            </p>
            <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.85rem; margin: 0;">
                <?= $lang === 'id' ? 'Perusahaan Digital Agency Resmi Terdaftar dan Terpercaya' : 'Officially Registered and Trusted Digital Agency Company' ?>
            </p>
        </div>
    </div>
</footer>

<!-- Floating Widgets -->
<!-- WhatsApp Float Button -->
<a href="<?= whatsapp_link('Halo! Saya ingin konsultasi') ?>" id="whatsappFloat" style="position: fixed; bottom: 30px; right: 30px; width: 60px; height: 60px; background: linear-gradient(135deg, #25D366, #128C7E); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 25px rgba(37, 211, 102, 0.5); z-index: 998; text-decoration: none; animation: pulse 2s ease-in-out infinite;">
    <i class="bi bi-whatsapp" style="font-size: 2rem; color: white;"></i>
</a>

<!-- Back to Top Button -->
<button id="backToTop" style="position: fixed; bottom: 105px; right: 30px; width: 50px; height: 50px; background: var(--gradient-gold); border: none; border-radius: 50%; display: none; align-items: center; justify-content: center; box-shadow: 0 8px 25px rgba(255, 180, 0, 0.4); cursor: pointer; z-index: 998; transition: all 0.3s ease;">
    <i class="bi bi-arrow-up" style="font-size: 1.5rem; color: var(--dark-blue); font-weight: 900;"></i>
</button>

<!-- Order Notification -->
<div id="orderNotification" class="order-notification">
    <div class="order-icon">
        <i class="bi bi-cart-check-fill"></i>
    </div>
    <div class="order-info">
        <h4>Loading...</h4>
        <p>Loading...</p>
    </div>
</div>

<!-- Demo Modal -->
<div class="modal fade" id="demoModal" tabindex="-1" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header" style="background: var(--gradient-gold); border: none;">
                <h5 class="modal-title" id="demoModalLabel" style="color: var(--dark-blue); font-weight: 900;">
                    <?= $lang === 'id' ? '🎉 FREE DEMO 24 JAM!' : '🎉 FREE 24 HOUR DEMO!' ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 30px;">
                <h4 style="color: var(--dark-blue); margin-bottom: 15px;">
                    <?= $lang === 'id' ? 'Lihat Dulu, Bayar Kalau Cocok!' : 'See First, Pay If You Like!' ?>
                </h4>
                <p>
                    <?= $lang === 'id' ? 'Kami berikan demo website Anda selama 24 jam GRATIS. Kalau cocok, baru bayar. Kalau tidak cocok, tidak ada biaya sama sekali!' : 'We provide a FREE 24-hour demo of your website. If you like it, then pay. If you don\'t like it, there\'s no cost at all!' ?>
                </p>
                <ul style="list-style: none; padding: 0; margin: 20px 0;">
                    <li style="padding: 8px 0;"><i class="bi bi-check-circle-fill" style="color: var(--gold); margin-right: 10px;"></i> <?= $lang === 'id' ? '100% GRATIS Demo 24 Jam' : '100% FREE 24 Hour Demo' ?></li>
                    <li style="padding: 8px 0;"><i class="bi bi-check-circle-fill" style="color: var(--gold); margin-right: 10px;"></i> <?= $lang === 'id' ? 'Tidak Ada Biaya Tersembunyi' : 'No Hidden Costs' ?></li>
                    <li style="padding: 8px 0;"><i class="bi bi-check-circle-fill" style="color: var(--gold); margin-right: 10px;"></i> <?= $lang === 'id' ? 'Bayar Hanya Jika Cocok' : 'Pay Only If You Like' ?></li>
                </ul>
                <a href="<?= whatsapp_link('Halo! Saya mau FREE DEMO 24 JAM untuk website saya!') ?>" class="btn btn-primary w-100 btn-lg">
                    <i class="bi bi-whatsapp"></i>
                    <?= $lang === 'id' ? 'Ya, Saya Mau FREE DEMO!' : 'Yes, I Want FREE DEMO!' ?>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS Animation JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>

</body>
</html>
