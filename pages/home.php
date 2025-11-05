<?php
/**
 * HOMEPAGE - SITUNEO DIGITAL
 * Redesigned dengan branding konsisten: Gold + Dark Blue Theme
 */

$pageTitle = 'Mau Bikin Website? Bingung Mulai Dari Mana? - SITUNEO DIGITAL';
$pageDescription = 'Ceritain aja bisnis Anda apa, nanti kita kasih tau website yang cocok + berapa harganya. 232+ layanan digital, mulai 150rb/bulan.';

include __DIR__ . '/../includes/header.php';
?>

<style>
/* ========== BRAND COLORS ========== */
:root {
    --brand-gold: #FFD700;
    --brand-dark-blue: #0F3057;
    --brand-primary-blue: #1E5C99;
}

/* ========== HERO SECTION ========== */
.hero-section-branded {
    background: linear-gradient(135deg, var(--brand-dark-blue) 0%, var(--brand-primary-blue) 100%);
    padding: 120px 0 80px;
    position: relative;
    overflow: hidden;
}

.hero-section-branded::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" fill="%23FFD700" fill-opacity="0.1"/></svg>') no-repeat bottom;
    background-size: 100% 120px;
    opacity: 0.1;
}

.hero-badge {
    background: rgba(255, 215, 0, 0.15);
    border: 2px solid var(--brand-gold);
    color: var(--brand-gold);
    padding: 8px 20px;
    border-radius: 30px;
    display: inline-block;
    font-weight: 700;
    font-size: 0.9rem;
    margin-bottom: 25px;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 900;
    color: white;
    margin-bottom: 25px;
    line-height: 1.2;
}

.hero-title .highlight {
    color: var(--brand-gold);
    text-shadow: 0 0 30px rgba(255, 215, 0, 0.5);
}

.hero-subtitle {
    font-size: 1.3rem;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 40px;
    line-height: 1.8;
}

.hero-buttons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.btn-brand-gold {
    background: linear-gradient(135deg, #FFD700 0%, #FFB400 100%);
    color: var(--brand-dark-blue);
    font-weight: 700;
    padding: 15px 40px;
    border: none;
    border-radius: 12px;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(255, 215, 0, 0.3);
}

.btn-brand-gold:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(255, 215, 0, 0.5);
    color: var(--brand-dark-blue);
}

.btn-brand-outline {
    background: transparent;
    color: var(--brand-gold);
    border: 2px solid var(--brand-gold);
    font-weight: 700;
    padding: 15px 40px;
    border-radius: 12px;
    font-size: 1.1rem;
    transition: all 0.3s ease;
}

.btn-brand-outline:hover {
    background: var(--brand-gold);
    color: var(--brand-dark-blue);
    transform: translateY(-3px);
}

.trust-indicators {
    margin-top: 30px;
}

.trust-badge {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 215, 0, 0.3);
    color: white;
    padding: 10px 20px;
    border-radius: 10px;
    display: inline-block;
    margin-right: 10px;
    margin-bottom: 10px;
    font-size: 0.95rem;
}

.trust-badge i {
    color: var(--brand-gold);
    margin-right: 8px;
}

/* ========== BUSINESS CATEGORIES ========== */
.business-categories {
    background: #0a0a0a;
    padding: 80px 0;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: white;
    margin-bottom: 15px;
}

.section-subtitle {
    color: rgba(255, 255, 255, 0.7);
    font-size: 1.2rem;
    margin-bottom: 50px;
}

.business-card {
    background: linear-gradient(135deg, rgba(15, 48, 87, 0.5) 0%, rgba(30, 92, 153, 0.3) 100%);
    border: 2px solid rgba(255, 215, 0, 0.2);
    border-radius: 20px;
    padding: 35px;
    text-align: center;
    transition: all 0.3s ease;
    height: 100%;
    cursor: pointer;
}

.business-card:hover {
    transform: translateY(-10px);
    border-color: var(--brand-gold);
    box-shadow: 0 15px 40px rgba(255, 215, 0, 0.3);
}

.business-icon {
    font-size: 4rem;
    margin-bottom: 20px;
    display: block;
}

.business-title {
    color: var(--brand-gold);
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 15px;
}

.business-desc {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1.1rem;
    margin-bottom: 10px;
}

.business-examples {
    color: rgba(255, 215, 0, 0.7);
    font-size: 0.9rem;
    font-style: italic;
}

/* ========== VALUE PROPOSITION ========== */
.value-section {
    background: linear-gradient(135deg, var(--brand-primary-blue) 0%, var(--brand-dark-blue) 100%);
    padding: 80px 0;
}

.value-box {
    background: rgba(255, 255, 255, 0.05);
    border: 2px solid rgba(255, 215, 0, 0.3);
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    height: 100%;
}

.value-box i {
    font-size: 3rem;
    color: var(--brand-gold);
    margin-bottom: 20px;
}

.value-box h4 {
    color: white;
    font-weight: 700;
    margin-bottom: 15px;
}

.value-box p {
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
}

/* ========== TESTIMONIALS ========== */
.testimonials-section {
    background: #0a0a0a;
    padding: 80px 0;
}

.testimonial-card {
    background: linear-gradient(135deg, rgba(15, 48, 87, 0.5) 0%, rgba(30, 92, 153, 0.3) 100%);
    border: 2px solid rgba(255, 215, 0, 0.2);
    border-radius: 20px;
    padding: 35px;
    height: 100%;
}

.testimonial-text {
    color: white;
    font-size: 1.1rem;
    margin-bottom: 25px;
    line-height: 1.8;
    font-style: italic;
}

.testimonial-author {
    border-top: 1px solid rgba(255, 215, 0, 0.3);
    padding-top: 20px;
}

.testimonial-name {
    color: var(--brand-gold);
    font-weight: 700;
    font-size: 1.1rem;
    margin-bottom: 5px;
}

.testimonial-business {
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.95rem;
}

.testimonial-rating {
    color: var(--brand-gold);
    margin-top: 10px;
}

/* ========== FAQ ========== */
.faq-section {
    background: linear-gradient(135deg, var(--brand-dark-blue) 0%, #000000 100%);
    padding: 80px 0;
}

.accordion-item {
    background: rgba(255, 255, 255, 0.05);
    border: 2px solid rgba(255, 215, 0, 0.2);
    margin-bottom: 15px;
    border-radius: 12px;
    overflow: hidden;
}

.accordion-button {
    background: rgba(255, 255, 255, 0.08);
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
    padding: 20px 25px;
}

.accordion-button:not(.collapsed) {
    background: linear-gradient(135deg, #FFD700 0%, #FFB400 100%);
    color: var(--brand-dark-blue);
    box-shadow: none;
}

.accordion-button:focus {
    box-shadow: none;
    border-color: var(--brand-gold);
}

.accordion-body {
    background: rgba(0, 0, 0, 0.3);
    color: rgba(255, 255, 255, 0.9);
    padding: 25px;
    font-size: 1.05rem;
    line-height: 1.8;
}

/* ========== CTA FINAL ========== */
.cta-final {
    background: linear-gradient(135deg, var(--brand-primary-blue) 0%, var(--brand-dark-blue) 100%);
    padding: 80px 0;
    text-align: center;
}

.cta-title {
    font-size: 2.8rem;
    font-weight: 800;
    color: white;
    margin-bottom: 20px;
}

.cta-subtitle {
    font-size: 1.3rem;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 40px;
}

/* ========== RESPONSIVE ========== */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.2rem;
    }

    .hero-subtitle {
        font-size: 1.1rem;
    }

    .hero-buttons {
        flex-direction: column;
    }

    .btn-brand-gold, .btn-brand-outline {
        width: 100%;
        text-align: center;
    }

    .section-title {
        font-size: 2rem;
    }

    .cta-title {
        font-size: 2rem;
    }
}
</style>

<!-- HERO SECTION -->
<section class="hero-section-branded" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="hero-content" data-aos="fade-right">
                    <div class="hero-badge">
                        <i class="bi bi-patch-check-fill me-2"></i>
                        NIB Resmi <?= COMPANY_NIB ?>
                    </div>

                    <h1 class="hero-title">
                        Mau Bikin Website?<br>
                        <span class="highlight">BINGUNG MULAI DARI MANA?</span>
                    </h1>

                    <p class="hero-subtitle">
                        Tenang... Ceritain aja bisnis Anda apa,<br>
                        nanti kita kasih tau website yang cocok + berapa harganya!
                    </p>

                    <div class="hero-buttons">
                        <a href="/pilih-bisnis" class="btn btn-brand-gold">
                            <i class="bi bi-hand-index me-2"></i>
                            PILIH BISNIS SAYA
                        </a>
                        <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Halo%20SITUNEO,%20saya%20mau%20konsultasi"
                           class="btn btn-brand-outline" target="_blank">
                            <i class="bi bi-whatsapp me-2"></i>
                            LANGSUNG TANYA ADMIN
                        </a>
                    </div>

                    <div class="trust-indicators">
                        <span class="trust-badge">
                            <i class="bi bi-people-fill"></i> 500+ Client
                        </span>
                        <span class="trust-badge">
                            <i class="bi bi-cash-coin"></i> Mulai 150rb
                        </span>
                        <span class="trust-badge">
                            <i class="bi bi-clock-fill"></i> Selesai 5 Jam
                        </span>
                        <span class="trust-badge">
                            <i class="bi bi-shield-check"></i> Garansi 100%
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-5" data-aos="fade-left">
                <div class="hero-illustration text-center">
                    <i class="bi bi-laptop" style="font-size: 15rem; color: var(--brand-gold); opacity: 0.8;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BUSINESS CATEGORIES -->
<section class="business-categories">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Kita Bisa Bantu Siapa Aja!</h2>
            <p class="section-subtitle">Pilih yang sesuai dengan bisnis Anda</p>
        </div>

        <div class="row g-4">
            <?php
            $business_types = [
                [
                    'icon' => '🏪',
                    'title' => 'Punya Toko',
                    'desc' => 'Jualan online 24 jam',
                    'link' => '/solutions/toko-online',
                    'examples' => 'Fashion, Elektronik, Kosmetik'
                ],
                [
                    'icon' => '🍔',
                    'title' => 'Punya Resto',
                    'desc' => 'Order & delivery system',
                    'link' => '/solutions/resto-online',
                    'examples' => 'Restoran, Cafe, Catering'
                ],
                [
                    'icon' => '🏢',
                    'title' => 'Punya Kantor',
                    'desc' => 'Company profile pro',
                    'link' => '/solutions/company-profile',
                    'examples' => 'Kontraktor, Konsultan, CV'
                ],
                [
                    'icon' => '🏥',
                    'title' => 'Punya Klinik',
                    'desc' => 'Sistem pendaftaran online',
                    'link' => '/solutions/klinik-online',
                    'examples' => 'Klinik, Praktek Dokter, Apotek'
                ],
                [
                    'icon' => '💼',
                    'title' => 'Bisnis Digital',
                    'desc' => 'Platform digital service',
                    'link' => '/services',
                    'examples' => 'Startup, SaaS, Marketplace'
                ],
                [
                    'icon' => '🏡',
                    'title' => 'Jual Property',
                    'desc' => 'Katalog rumah/tanah',
                    'link' => '/services',
                    'examples' => 'Developer, Agen Property'
                ],
                [
                    'icon' => '🎓',
                    'title' => 'Punya Kursus',
                    'desc' => 'E-learning platform',
                    'link' => '/services',
                    'examples' => 'Bimbel, LMS, Training'
                ],
                [
                    'icon' => '🤝',
                    'title' => 'Masih Bingung?',
                    'desc' => 'Konsultasi GRATIS',
                    'link' => 'https://wa.me/' . SITE_WHATSAPP . '?text=Halo%20SITUNEO,%20saya%20mau%20konsultasi',
                    'examples' => 'Chat admin via WhatsApp'
                ]
            ];

            foreach ($business_types as $idx => $type): ?>
                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="<?= $idx * 100 ?>">
                    <a href="<?= $type['link'] ?>" class="text-decoration-none" <?= strpos($type['link'], 'wa.me') !== false ? 'target="_blank"' : '' ?>>
                        <div class="business-card">
                            <span class="business-icon"><?= $type['icon'] ?></span>
                            <h3 class="business-title"><?= $type['title'] ?></h3>
                            <p class="business-desc"><?= $type['desc'] ?></p>
                            <small class="business-examples"><?= $type['examples'] ?></small>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- VALUE PROPOSITION -->
<section class="value-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Kenapa Pilih SITUNEO?</h2>
            <p class="section-subtitle">Bukan cuma bikin website, tapi solusi digital lengkap!</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="zoom-in">
                <div class="value-box">
                    <i class="bi bi-lightbulb-fill"></i>
                    <h4>Solusi Tepat</h4>
                    <p>Analisa kebutuhan Anda dulu, baru rekomendasikan solusi yang pas. Tidak overselling, tidak underpromise.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="value-box">
                    <i class="bi bi-cash-stack"></i>
                    <h4>Harga Jelas</h4>
                    <p>Harga PASTI, tanpa biaya tersembunyi. Bisa sewa (murah) atau beli (hemat jangka panjang).</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="value-box">
                    <i class="bi bi-rocket-takeoff-fill"></i>
                    <h4>Cepat Jadi</h4>
                    <p>Gak pakai lama! Website sederhana bisa selesai 5 jam. Yang kompleks max 2 minggu sudah live.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="value-box">
                    <i class="bi bi-headset"></i>
                    <h4>Support 24/7</h4>
                    <p>Butuh bantuan? Chat aja via WhatsApp. Tim kami siap bantu kapan aja (response max 15 menit).</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Kata Mereka Yang Sudah Pakai</h2>
            <p class="section-subtitle">Real testimonials, bukan settingan!</p>
        </div>

        <div class="row g-4">
            <?php
            $testimonials = [
                [
                    'name' => 'Pak Budi',
                    'business' => 'Toko Elektronik Jakarta',
                    'text' => 'DULU jualan cuma 5-10 pembeli per hari. SEKARANG punya website, 30-50 order per hari! Omset naik 5x lipat. Worth it banget!',
                    'rating' => 5
                ],
                [
                    'name' => 'Bu Siti',
                    'business' => 'Warteg Berkah Depok',
                    'text' => 'Awalnya ragu, apa warteg butuh website? Ternyata PERLU! Sekarang banyak anak kosan pesen online. Omset naik 3x!',
                    'rating' => 5
                ],
                [
                    'name' => 'Pak Rudi',
                    'business' => 'CV Karya Mandiri Jogja',
                    'text' => 'Website company profile bikin kami menang tender Rp 1 miliar! Panitia langsung percaya lihat portfolio lengkap di website.',
                    'rating' => 5
                ]
            ];

            foreach ($testimonials as $idx => $testi): ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $idx * 100 ?>">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "<?= $testi['text'] ?>"
                        </div>
                        <div class="testimonial-author">
                            <div class="testimonial-name"><?= $testi['name'] ?></div>
                            <div class="testimonial-business"><?= $testi['business'] ?></div>
                            <div class="testimonial-rating">
                                <?php for ($i = 0; $i < $testi['rating']; $i++): ?>
                                    <i class="bi bi-star-fill"></i>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Pertanyaan Yang Sering Ditanya</h2>
            <p class="section-subtitle">Cari jawaban disini dulu, gak ketemu baru tanya admin</p>
        </div>

        <div class="accordion" id="faqAccordion">
            <div class="accordion-item" data-aos="fade-up">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        <i class="bi bi-question-circle me-3"></i>
                        Berapa harga bikin website?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <strong>Tergantung jenis website!</strong> Landing page simpel mulai <strong>Rp 150rb/bulan</strong> (sewa) atau <strong>Rp 2 juta</strong> (beli putus). Toko online mulai <strong>Rp 350rb/bulan</strong> atau <strong>Rp 5 juta</strong> (beli). Klik "Pilih Bisnis Saya" di atas untuk lihat harga lengkap!
                    </div>
                </div>
            </div>

            <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        <i class="bi bi-question-circle me-3"></i>
                        Bedanya sewa vs beli apa?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <strong>SEWA:</strong> Bayar tiap bulan (kayak ngontrak). Domain, hosting, maintenance kami yang urus. Cocok buat yang baru mulai.<br><br>
                        <strong>BELI:</strong> Bayar sekali, punya selamanya. Source code jadi milik Anda. Bisa edit/jual ke orang lain. Hemat jangka panjang!
                    </div>
                </div>
            </div>

            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        <i class="bi bi-question-circle me-3"></i>
                        Berapa lama prosesnya?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <strong>Tergantung kompleksitas:</strong><br>
                        • Landing page simpel: <strong>5-24 jam</strong><br>
                        • Company profile: <strong>7-10 hari kerja</strong><br>
                        • Toko online: <strong>3-5 hari kerja</strong><br>
                        • Custom kompleks: <strong>2-4 minggu</strong><br><br>
                        Setelah data lengkap, langsung kami kerjakan dan update progress setiap hari!
                    </div>
                </div>
            </div>

            <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                        <i class="bi bi-question-circle me-3"></i>
                        Apa jaminan website gak error?
                    </button>
                </h2>
                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <strong>GARANSI 100% uang kembali</strong> kalau:<br>
                        • Website tidak sesuai hasil demo yang disepakati<br>
                        • Banyak bug/error yang tidak bisa diperbaiki<br>
                        • Kami tidak deliver tepat waktu (tanpa alasan jelas)<br><br>
                        Plus <strong>FREE support 6 bulan</strong> untuk paket BELI. Kalau ada error, kami perbaiki gratis!
                    </div>
                </div>
            </div>

            <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                        <i class="bi bi-question-circle me-3"></i>
                        Saya gak ngerti teknis, bisa dibantu?
                    </button>
                </h2>
                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <strong>BISA BANGET!</strong> Makanya kami pakai bahasa yang simpel. Anda cukup:<br>
                        • Jelasin bisnis Anda apa<br>
                        • Kasih tau mau fitur apa<br>
                        • Kami yang translate ke bahasa teknis!<br><br>
                        Nanti kami kasih <strong>training video step-by-step</strong> cara pakai website. Gampang kok, kayak pakai Instagram!
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA FINAL -->
<section class="cta-final">
    <div class="container">
        <div data-aos="zoom-in">
            <h2 class="cta-title">Siap Mulai?</h2>
            <p class="cta-subtitle">
                Konsultasi GRATIS dulu gak papa! Jelasin bisnis Anda,<br>
                nanti kita bantu carikan solusi yang pas.
            </p>
            <a href="/pilih-bisnis" class="btn btn-brand-gold btn-lg me-3 mb-3">
                <i class="bi bi-hand-index me-2"></i>
                PILIH BISNIS SAYA
            </a>
            <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Halo%20SITUNEO,%20saya%20mau%20konsultasi"
               class="btn btn-brand-outline btn-lg mb-3" target="_blank">
                <i class="bi bi-whatsapp me-2"></i>
                CHAT WHATSAPP
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
