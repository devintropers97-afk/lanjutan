<?php
/**
 * Hero Section Component
 */
?>

<!-- Hero Section -->
<section id="hero" style="min-height: 100vh; display: flex; align-items: center; padding: 120px 0 80px; position: relative; overflow: hidden;">
    <!-- Circuit Pattern Background -->
    <div class="circuit-pattern"></div>

    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <!-- Left Content -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <!-- NIB Badge with Pulse Animation -->
                <div data-aos="fade-down" data-aos-delay="100">
                    <div class="nib-badge" style="display: inline-flex; align-items: center; gap: 10px; background: linear-gradient(135deg, rgba(30, 92, 153, 0.15), rgba(255, 180, 0, 0.15)); backdrop-filter: blur(10px); border: 2px solid var(--gold); border-radius: 50px; padding: 12px 24px; margin-bottom: 25px; animation: pulse 2s ease-in-out infinite;">
                        <i class="bi bi-patch-check-fill" style="font-size: 1.5rem; color: var(--gold);"></i>
                        <span style="font-weight: 700; color: var(--gold); font-size: 0.9rem;">PERUSAHAAN RESMI NIB: <?= COMPANY_NIB ?></span>
                    </div>
                </div>

                <!-- Hero Title -->
                <h1 data-aos="fade-right" data-aos-delay="200" style="font-size: 3.5rem; font-weight: 900; line-height: 1.2; margin-bottom: 25px; color: var(--dark-blue);">
                    <?= $t['hero_title'] ?>
                </h1>

                <!-- Hero Tagline -->
                <p data-aos="fade-right" data-aos-delay="300" style="font-size: 1.3rem; font-weight: 600; color: var(--primary-blue); margin-bottom: 15px;">
                    <?= $t['hero_tagline'] ?>
                </p>

                <!-- Hero Features -->
                <div data-aos="fade-right" data-aos-delay="400" style="margin-bottom: 35px;">
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                        <div style="width: 28px; height: 28px; background: var(--gradient-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="bi bi-check2" style="color: var(--dark-blue); font-weight: 900; font-size: 1.2rem;"></i>
                        </div>
                        <span style="color: var(--text-light); font-size: 1.1rem; font-weight: 500;"><?= $t['hero_feature_1'] ?></span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                        <div style="width: 28px; height: 28px; background: var(--gradient-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="bi bi-check2" style="color: var(--dark-blue); font-weight: 900; font-size: 1.2rem;"></i>
                        </div>
                        <span style="color: var(--text-light); font-size: 1.1rem; font-weight: 500;"><?= $t['hero_feature_2'] ?></span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 28px; height: 28px; background: var(--gradient-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="bi bi-check2" style="color: var(--dark-blue); font-weight: 900; font-size: 1.2rem;"></i>
                        </div>
                        <span style="color: var(--text-light); font-size: 1.1rem; font-weight: 500;"><?= $t['hero_feature_3'] ?></span>
                    </div>
                </div>

                <!-- Hero CTA Buttons -->
                <div data-aos="fade-right" data-aos-delay="500" style="display: flex; gap: 15px; flex-wrap: wrap; margin-bottom: 40px;">
                    <a href="<?= whatsapp_link($t['hero_whatsapp_text']) ?>" class="btn-cta-primary" style="display: inline-flex; align-items: center; gap: 10px; background: linear-gradient(135deg, #25D366, #128C7E); color: white; padding: 16px 32px; border-radius: 50px; font-weight: 700; font-size: 1.1rem; text-decoration: none; box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4); transition: all 0.3s ease;">
                        <i class="bi bi-whatsapp" style="font-size: 1.5rem;"></i>
                        <span><?= $t['hero_cta_demo'] ?></span>
                    </a>
                    <a href="#packages" class="btn-cta-secondary" style="display: inline-flex; align-items: center; gap: 10px; background: white; color: var(--primary-blue); padding: 16px 32px; border-radius: 50px; font-weight: 700; font-size: 1.1rem; text-decoration: none; border: 2px solid var(--primary-blue); transition: all 0.3s ease;">
                        <i class="bi bi-box-seam"></i>
                        <span><?= $t['hero_cta_packages'] ?></span>
                    </a>
                </div>

                <!-- Trust Badges -->
                <div data-aos="fade-right" data-aos-delay="600" style="display: flex; gap: 20px; flex-wrap: wrap;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <i class="bi bi-shield-check" style="font-size: 1.5rem; color: var(--gold);"></i>
                        <span style="font-size: 0.9rem; color: var(--text-light); font-weight: 600;">100% Aman</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <i class="bi bi-clock-history" style="font-size: 1.5rem; color: var(--gold);"></i>
                        <span style="font-size: 0.9rem; color: var(--text-light); font-weight: 600;">Support 24/7</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <i class="bi bi-star-fill" style="font-size: 1.5rem; color: var(--gold);"></i>
                        <span style="font-size: 0.9rem; color: var(--text-light); font-weight: 600;">Rating 4.9/5</span>
                    </div>
                </div>
            </div>

            <!-- Right Content - Floating Price Cards -->
            <div class="col-lg-6">
                <div style="position: relative; height: 500px;" data-aos="fade-left" data-aos-delay="400">
                    <!-- Main Price Card -->
                    <div class="floating-card" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85)); backdrop-filter: blur(20px); border-radius: 30px; padding: 40px; box-shadow: 0 20px 60px rgba(30, 92, 153, 0.3); border: 2px solid rgba(255, 180, 0, 0.3); width: 320px; animation: float 3s ease-in-out infinite;">
                        <div style="text-align: center;">
                            <div style="background: var(--gradient-gold); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 900; font-size: 1.2rem; margin-bottom: 15px;">HARGA MULAI</div>
                            <div style="font-size: 3.5rem; font-weight: 900; color: var(--dark-blue); line-height: 1; margin-bottom: 10px;">
                                Rp 350rb
                            </div>
                            <div style="font-size: 1.1rem; color: var(--primary-blue); font-weight: 600; margin-bottom: 20px;">/halaman</div>
                            <div style="background: rgba(30, 92, 153, 0.1); padding: 15px; border-radius: 15px; margin-bottom: 20px;">
                                <div style="font-size: 0.9rem; color: var(--text-light); margin-bottom: 8px;">Setup Fee + Sewa Bulanan</div>
                                <div style="font-size: 1.3rem; font-weight: 700; color: var(--gold);">Mulai Rp 150rb/bln</div>
                            </div>
                            <a href="<?= whatsapp_link('Halo! Saya mau tanya harga paket website') ?>" style="display: inline-flex; align-items: center; gap: 8px; background: var(--gradient-gold); color: var(--dark-blue); padding: 12px 24px; border-radius: 25px; font-weight: 700; text-decoration: none; transition: all 0.3s ease;">
                                <i class="bi bi-whatsapp"></i>
                                <span>Tanya Harga</span>
                            </a>
                        </div>
                    </div>

                    <!-- Floating Badge 1 - Top Left -->
                    <div style="position: absolute; top: 20px; left: 20px; background: white; border-radius: 20px; padding: 15px 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.15); animation: float 2s ease-in-out infinite; animation-delay: 0.5s;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <i class="bi bi-gift-fill" style="font-size: 1.8rem; color: var(--gold);"></i>
                            <div>
                                <div style="font-weight: 700; color: var(--dark-blue); font-size: 0.9rem;">FREE DEMO</div>
                                <div style="font-size: 0.75rem; color: var(--text-light);">24 Jam</div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Badge 2 - Top Right -->
                    <div style="position: absolute; top: 80px; right: 20px; background: white; border-radius: 20px; padding: 15px 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.15); animation: float 2.5s ease-in-out infinite; animation-delay: 1s;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <i class="bi bi-people-fill" style="font-size: 1.8rem; color: var(--gold);"></i>
                            <div>
                                <div style="font-weight: 700; color: var(--dark-blue); font-size: 0.9rem;">500+ Client</div>
                                <div style="font-size: 0.75rem; color: var(--text-light);">Puas</div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Badge 3 - Bottom Left -->
                    <div style="position: absolute; bottom: 80px; left: 40px; background: white; border-radius: 20px; padding: 15px 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.15); animation: float 3s ease-in-out infinite; animation-delay: 1.5s;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <i class="bi bi-lightning-charge-fill" style="font-size: 1.8rem; color: var(--gold);"></i>
                            <div>
                                <div style="font-weight: 700; color: var(--dark-blue); font-size: 0.9rem;">Fast Response</div>
                                <div style="font-size: 0.75rem; color: var(--text-light);">< 5 Menit</div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Badge 4 - Bottom Right -->
                    <div style="position: absolute; bottom: 20px; right: 40px; background: white; border-radius: 20px; padding: 15px 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.15); animation: float 2.8s ease-in-out infinite; animation-delay: 2s;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <i class="bi bi-award-fill" style="font-size: 1.8rem; color: var(--gold);"></i>
                            <div>
                                <div style="font-weight: 700; color: var(--dark-blue); font-size: 0.9rem;">Garansi</div>
                                <div style="font-size: 0.75rem; color: var(--text-light);">100%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
