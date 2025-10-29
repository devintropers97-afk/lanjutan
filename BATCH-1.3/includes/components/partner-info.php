<?php
/**
 * Partner Information Section Component
 * Showcases the partner/freelance commission system
 */
?>

<!-- Partner Information Section -->
<section class="partner-info" id="partner">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left: Partner Benefits -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="partner-content">
                    <div class="section-badge">
                        <i class="bi bi-star-fill"></i>
                        <?= $lang === 'id' ? 'PROGRAM PARTNER' : 'PARTNER PROGRAM' ?>
                    </div>

                    <h2 class="section-title">
                        <?php if ($lang === 'id'): ?>
                            Jadi Partner, Dapatkan Komisi <span class="highlight">Hingga 50%!</span>
                        <?php else: ?>
                            Become a Partner, Get Commission <span class="highlight">Up to 50%!</span>
                        <?php endif; ?>
                    </h2>

                    <p class="section-description">
                        <?php if ($lang === 'id'): ?>
                            Tidak perlu keahlian teknis! Cukup cari klien, kami yang kerjakan proyeknya.
                            Dapatkan komisi dari <strong>Setup Fee + Maintenance Bulanan</strong> selamanya!
                        <?php else: ?>
                            No technical skills needed! Just find clients, we handle the projects.
                            Get commission from <strong>Setup Fee + Monthly Maintenance</strong> forever!
                        <?php endif; ?>
                    </p>

                    <!-- Partner Benefits List -->
                    <div class="partner-benefits">
                        <div class="benefit-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="benefit-icon">
                                <i class="bi bi-cash-stack"></i>
                            </div>
                            <div class="benefit-info">
                                <h4><?= $lang === 'id' ? 'Komisi Hingga 50%' : 'Commission Up to 50%' ?></h4>
                                <p><?= $lang === 'id' ? 'Sistem tier otomatis, makin banyak order makin tinggi komisi!' : 'Auto tier system, more orders means higher commission!' ?></p>
                            </div>
                        </div>

                        <div class="benefit-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="benefit-icon">
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                            <div class="benefit-info">
                                <h4><?= $lang === 'id' ? 'Passive Income Bulanan' : 'Monthly Passive Income' ?></h4>
                                <p><?= $lang === 'id' ? 'Dapat komisi dari maintenance bulanan setiap klien bayar!' : 'Get commission from monthly maintenance every time client pays!' ?></p>
                            </div>
                        </div>

                        <div class="benefit-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="benefit-icon">
                                <i class="bi bi-lightning-charge"></i>
                            </div>
                            <div class="benefit-info">
                                <h4><?= $lang === 'id' ? 'Tanpa Modal & Resiko' : 'No Capital & Risk' ?></h4>
                                <p><?= $lang === 'id' ? 'Gratis daftar, tidak perlu skill teknis, fokus cari klien saja!' : 'Free registration, no technical skills needed, just focus on finding clients!' ?></p>
                            </div>
                        </div>

                        <div class="benefit-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="benefit-icon">
                                <i class="bi bi-wallet2"></i>
                            </div>
                            <div class="benefit-info">
                                <h4><?= $lang === 'id' ? 'Withdraw Cepat' : 'Fast Withdrawal' ?></h4>
                                <p><?= $lang === 'id' ? 'Minimal Rp 50K, proses 2x24 jam ke rekening Anda!' : 'Minimum Rp 50K, processed in 2x24 hours to your account!' ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="partner-cta">
                        <a href="<?= whatsapp_link('Halo! Saya ingin daftar jadi Partner SITUNEO DIGITAL dan dapatkan komisi hingga 50%!') ?>" class="btn btn-primary btn-lg">
                            <i class="bi bi-whatsapp"></i>
                            <?= $lang === 'id' ? 'Daftar Jadi Partner Gratis' : 'Register as Partner Free' ?>
                        </a>
                        <a href="pages/faq.php#partner" class="btn btn-outline btn-lg">
                            <i class="bi bi-question-circle"></i>
                            <?= $lang === 'id' ? 'Pelajari Lebih Lanjut' : 'Learn More' ?>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right: Tier Showcase -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="partner-tiers">
                    <h3 class="tiers-title">
                        <?= $lang === 'id' ? '5 Level Komisi Partner' : '5 Partner Commission Levels' ?>
                    </h3>

                    <!-- Tier Cards -->
                    <div class="tier-card tier-bronze" data-aos="zoom-in" data-aos-delay="100">
                        <div class="tier-header">
                            <div class="tier-icon">🥉</div>
                            <div class="tier-info">
                                <h4><?= $lang === 'id' ? 'Bronze' : 'Bronze' ?></h4>
                                <p class="tier-commission">15%</p>
                            </div>
                        </div>
                        <p class="tier-requirement">
                            <?= $lang === 'id' ? 'Tier awal (default)' : 'Starting tier (default)' ?>
                        </p>
                    </div>

                    <div class="tier-card tier-silver" data-aos="zoom-in" data-aos-delay="200">
                        <div class="tier-header">
                            <div class="tier-icon">🥈</div>
                            <div class="tier-info">
                                <h4><?= $lang === 'id' ? 'Silver' : 'Silver' ?></h4>
                                <p class="tier-commission">25%</p>
                            </div>
                        </div>
                        <p class="tier-requirement">
                            <?= $lang === 'id' ? '6 order + 3 maintenance/bulan' : '6 orders + 3 maintenance/month' ?>
                        </p>
                    </div>

                    <div class="tier-card tier-gold" data-aos="zoom-in" data-aos-delay="300">
                        <div class="tier-header">
                            <div class="tier-icon">🥇</div>
                            <div class="tier-info">
                                <h4><?= $lang === 'id' ? 'Gold' : 'Gold' ?></h4>
                                <p class="tier-commission">35%</p>
                            </div>
                        </div>
                        <p class="tier-requirement">
                            <?= $lang === 'id' ? '16 order + 8 maintenance/bulan' : '16 orders + 8 maintenance/month' ?>
                        </p>
                    </div>

                    <div class="tier-card tier-platinum" data-aos="zoom-in" data-aos-delay="400">
                        <div class="tier-header">
                            <div class="tier-icon">💍</div>
                            <div class="tier-info">
                                <h4><?= $lang === 'id' ? 'Platinum' : 'Platinum' ?></h4>
                                <p class="tier-commission">45%</p>
                            </div>
                        </div>
                        <p class="tier-requirement">
                            <?= $lang === 'id' ? '31 order + 15 maintenance/bulan' : '31 orders + 15 maintenance/month' ?>
                        </p>
                    </div>

                    <div class="tier-card tier-diamond" data-aos="zoom-in" data-aos-delay="500">
                        <div class="tier-header">
                            <div class="tier-icon">💎</div>
                            <div class="tier-info">
                                <h4><?= $lang === 'id' ? 'Diamond' : 'Diamond' ?></h4>
                                <p class="tier-commission">50%</p>
                            </div>
                        </div>
                        <p class="tier-requirement">
                            <?= $lang === 'id' ? '51 order + 25 maintenance/bulan' : '51 orders + 25 maintenance/month' ?>
                        </p>
                    </div>

                    <!-- Example Earnings -->
                    <div class="earnings-example" data-aos="fade-up" data-aos-delay="600">
                        <div class="example-badge">
                            <i class="bi bi-calculator"></i>
                            <?= $lang === 'id' ? 'CONTOH PENGHASILAN' : 'EARNINGS EXAMPLE' ?>
                        </div>
                        <div class="example-content">
                            <p class="example-scenario">
                                <?php if ($lang === 'id'): ?>
                                    <strong>Partner Silver (25%)</strong> berhasil closing:
                                <?php else: ?>
                                    <strong>Silver Partner (25%)</strong> successfully closed:
                                <?php endif; ?>
                            </p>
                            <ul class="example-list">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <?= $lang === 'id' ? '1x Website E-Commerce (Setup 1.5jt + 350K/bulan)' : '1x E-Commerce Website (Setup 1.5M + 350K/month)' ?>
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <strong><?= $lang === 'id' ? 'Komisi Setup: Rp 375.000 (langsung)' : 'Setup Commission: Rp 375,000 (instant)' ?></strong>
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <strong><?= $lang === 'id' ? 'Komisi Bulanan: Rp 87.500/bulan (selamanya!)' : 'Monthly Commission: Rp 87,500/month (forever!)' ?></strong>
                                </li>
                            </ul>
                            <div class="example-total">
                                <span class="total-label"><?= $lang === 'id' ? 'Total 1 Tahun:' : 'Total 1 Year:' ?></span>
                                <span class="total-value">Rp 1.425.000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
