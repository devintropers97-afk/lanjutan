    <!-- Footer -->
    <footer class="footer bg-dark text-white">
        <div class="container">
            <!-- Footer Top -->
            <div class="footer-top py-5">
                <div class="row">
                    <!-- Company Info -->
                    <div class="col-12 col-md-4 mb-4">
                        <h3 class="brand-logo mb-3">SITUNEO DIGITAL</h3>
                        <p class="text-light mb-3">
                            <?php echo COMPANY_TAGLINE; ?>
                        </p>
                        <p class="text-light">
                            <strong><?php echo COMPANY_USP; ?></strong>
                        </p>

                        <!-- Social Media -->
                        <div class="social-links mt-3 d-flex gap-sm">
                            <a href="<?php echo SOCIAL_INSTAGRAM_URL; ?>" target="_blank" class="social-link" aria-label="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="<?php echo SOCIAL_FACEBOOK_URL; ?>" target="_blank" class="social-link" aria-label="Facebook">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="<?php echo SOCIAL_LINKEDIN_URL; ?>" target="_blank" class="social-link" aria-label="LinkedIn">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="<?php echo SOCIAL_TIKTOK_URL; ?>" target="_blank" class="social-link" aria-label="TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-6 col-md-2 mb-4">
                        <h4 class="footer-title">Perusahaan</h4>
                        <ul class="footer-links">
                            <li><a href="/about">Tentang Kami</a></li>
                            <li><a href="/portfolio">Portfolio</a></li>
                            <li><a href="/blog">Blog & Tips</a></li>
                            <li><a href="/contact">Hubungi Kami</a></li>
                        </ul>
                    </div>

                    <!-- Services -->
                    <div class="col-6 col-md-2 mb-4">
                        <h4 class="footer-title">Layanan</h4>
                        <ul class="footer-links">
                            <li><a href="/services?category=website">Website Development</a></li>
                            <li><a href="/services?category=mobile">Mobile App</a></li>
                            <li><a href="/services?category=design">UI/UX Design</a></li>
                            <li><a href="/services?category=marketing">Digital Marketing</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-12 col-md-4 mb-4">
                        <h4 class="footer-title">Kontak Kami</h4>
                        <ul class="footer-contact">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?php echo COMPANY_ADDRESS_FULL; ?></span>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <span><?php echo CONTACT_PHONE; ?></span>
                            </li>
                            <li>
                                <i class="fab fa-whatsapp"></i>
                                <span><?php echo CONTACT_WHATSAPP_FORMATTED; ?></span>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span><?php echo CONTACT_EMAIL_ADMIN; ?></span>
                            </li>
                        </ul>

                        <!-- Business Hours -->
                        <div class="mt-3">
                            <p class="text-light mb-1"><strong>Jam Operasional:</strong></p>
                            <p class="text-sm text-light">
                                Senin - Jumat: <?php echo BUSINESS_HOURS_WEEKDAY; ?><br>
                                Sabtu: <?php echo BUSINESS_HOURS_SATURDAY; ?><br>
                                Minggu: <?php echo BUSINESS_HOURS_SUNDAY; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom py-3">
                <div class="row align-center">
                    <div class="col-12 col-md-6 text-center text-md-left mb-2 mb-md-0">
                        <p class="text-sm text-light mb-0">
                            &copy; <?php echo date('Y'); ?> <?php echo COMPANY_NAME; ?>. All rights reserved.
                        </p>
                        <p class="text-xs text-muted mb-0">
                            NIB: <?php echo COMPANY_NIB; ?>
                        </p>
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-right">
                        <ul class="footer-legal d-flex justify-center justify-md-end gap-md">
                            <li><a href="/privacy-policy" class="text-sm">Kebijakan Privasi</a></li>
                            <li><a href="/terms-conditions" class="text-sm">Syarat & Ketentuan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <?php include __DIR__ . '/../ui/whatsapp-float.php'; ?>

    <!-- Scripts -->
    <script src="/assets/js/main.js"></script>
    <?php if (isset($pageJS)): ?>
        <script src="<?php echo $pageJS; ?>"></script>
    <?php endif; ?>

    <!-- Scroll to Top Button -->
    <button id="scrollTopBtn" class="scroll-top-btn" title="Kembali ke atas">
        <i class="fas fa-chevron-up"></i>
    </button>

</body>
</html>
