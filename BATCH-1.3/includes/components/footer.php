<?php
/**
 * Footer Component
 */
?>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <!-- Brand -->
            <div class="footer-brand">
                <h3>SITUNEO DIGITAL</h3>
                <p><?= SITE_TAGLINE ?></p>
                <p style="font-size: 14px; margin-top: 15px;">
                    <strong>NIB:</strong> <?= COMPANY_NIB ?><br>
                    <strong>NPWP:</strong> <?= COMPANY_NPWP ?>
                </p>
            </div>

            <!-- Quick Links -->
            <div class="footer-links">
                <h4><?= $lang === 'id' ? 'Tautan Cepat' : 'Quick Links' ?></h4>
                <ul>
                    <li><a href="index.php"><?= t('home') ?></a></li>
                    <li><a href="pages/about.php"><?= t('about') ?></a></li>
                    <li><a href="pages/services.php"><?= t('services') ?></a></li>
                    <li><a href="pages/portfolio.php"><?= t('portfolio') ?></a></li>
                    <li><a href="pages/pricing.php"><?= t('pricing') ?></a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="footer-links">
                <h4><?= $lang === 'id' ? 'Layanan Kami' : 'Our Services' ?></h4>
                <ul>
                    <li><a href="pages/services.php">Website & Development</a></li>
                    <li><a href="pages/services.php">Digital Marketing</a></li>
                    <li><a href="pages/services.php">AI & Automation</a></li>
                    <li><a href="pages/services.php">Branding & Creative</a></li>
                    <li><a href="pages/services.php">Content & Copywriting</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="footer-contact">
                <h4><?= t('contact_us') ?></h4>
                <p>
                    <i class="bi bi-whatsapp"></i>
                    <a href="<?= whatsapp_link('Halo SITUNEO!') ?>"><?= SITE_PHONE ?></a>
                </p>
                <p>
                    <i class="bi bi-envelope"></i>
                    <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a>
                </p>
                <p>
                    <i class="bi bi-envelope"></i>
                    <a href="mailto:support@situneo.my.id">support@situneo.my.id</a>
                </p>

                <!-- Social Media -->
                <div class="social-links">
                    <a href="<?= SOCIAL_INSTAGRAM ?>" target="_blank" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="<?= SOCIAL_FACEBOOK ?>" target="_blank" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="<?= SOCIAL_LINKEDIN ?>" target="_blank" aria-label="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="<?= SOCIAL_TWITTER ?>" target="_blank" aria-label="Twitter">
                        <i class="bi bi-twitter"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> SITUNEO DIGITAL. All Rights Reserved.</p>
            <p style="font-size: 12px; margin-top: 10px;">
                <?= $lang === 'id' ? 'Perusahaan Digital Agency Resmi Terdaftar' : 'Officially Registered Digital Agency Company' ?>
            </p>
        </div>
    </div>
</footer>

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
