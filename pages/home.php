<?php
/**
 * HOMEPAGE - SITUNEO DIGITAL
 * Bahasa simpel, fokus manfaat, kategori berdasarkan BISNIS
 */

$pageTitle = 'Mau Bikin Website? Bingung Mulai Dari Mana? - SITUNEO DIGITAL';
$pageDescription = 'Ceritain aja bisnis Anda apa, nanti kita kasih tau website yang cocok + berapa harganya. 232+ layanan digital, mulai 150rb/bulan.';

include __DIR__ . '/../includes/header.php';
?>

<!-- HERO SECTION - BAHASA SIMPEL -->
<section class="hero-section-new" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="hero-content-new" data-aos="fade-right">
                    <div class="hero-badge-new">
                        <i class="bi bi-patch-check-fill me-2"></i>
                        NIB Resmi <?= COMPANY_NIB ?>
                    </div>

                    <h1 class="hero-title-new">
                        Mau Bikin Website?<br>
                        <span class="text-warning">BINGUNG MULAI DARI MANA?</span>
                    </h1>

                    <p class="hero-subtitle-new">
                        Tenang... Ceritain aja bisnis Anda apa,<br>
                        nanti kita kasih tau website yang cocok + berapa harganya!
                    </p>

                    <div class="hero-buttons-new">
                        <a href="/pilih-bisnis" class="btn btn-warning btn-lg px-5">
                            <i class="bi bi-hand-index me-2"></i>
                            PILIH BISNIS SAYA
                        </a>
                        <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Halo%20SITUNEO,%20saya%20mau%20konsultasi"
                           class="btn btn-success btn-lg px-5" target="_blank">
                            <i class="bi bi-whatsapp me-2"></i>
                            LANGSUNG TANYA ADMIN
                        </a>
                    </div>

                    <div class="trust-indicators mt-4">
                        <span class="badge bg-light text-dark me-2 mb-2 p-2">
                            <i class="bi bi-people-fill text-primary me-1"></i> 500+ Client
                        </span>
                        <span class="badge bg-light text-dark me-2 mb-2 p-2">
                            <i class="bi bi-cash-coin text-success me-1"></i> Harga Mulai 150rb
                        </span>
                        <span class="badge bg-light text-dark me-2 mb-2 p-2">
                            <i class="bi bi-clock-fill text-warning me-1"></i> Bisa Selesai 5 Jam
                        </span>
                        <span class="badge bg-light text-dark me-2 mb-2 p-2">
                            <i class="bi bi-shield-check text-info me-1"></i> Garansi 100%
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-5" data-aos="fade-left">
                <div class="hero-illustration">
                    <img src="/assets/images/hero-illustration.svg" alt="Website Development" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- KATEGORI BISNIS - PILIH SESUAI BISNIS ANDA -->
<section class="business-categories py-5">
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
                    'examples' => 'PT, CV, Kontraktor'
                ],
                [
                    'icon' => '💊',
                    'title' => 'Punya Klinik',
                    'desc' => 'Appointment system',
                    'link' => '/solutions/klinik-online',
                    'examples' => 'Dokter, Klinik, Apotek'
                ],
                [
                    'icon' => '🎮',
                    'title' => 'Bisnis Digital',
                    'desc' => 'Autopilot system',
                    'link' => '/solutions/bisnis-digital',
                    'examples' => 'Top-up, Pulsa, Game'
                ],
                [
                    'icon' => '🏠',
                    'title' => 'Property',
                    'desc' => 'Listing & virtual tour',
                    'link' => '/solutions/property',
                    'examples' => 'Rumah, Mobil, Rental'
                ],
                [
                    'icon' => '📚',
                    'title' => 'Sekolah',
                    'desc' => 'E-learning & PPDB',
                    'link' => '/solutions/education',
                    'examples' => 'Sekolah, Bimbel, Kursus'
                ],
                [
                    'icon' => '❓',
                    'title' => 'Lainnya',
                    'desc' => 'Konsultasi gratis',
                    'link' => '/consultation',
                    'examples' => 'Belum tau? Tanya kami'
                ]
            ];

            foreach ($business_types as $index => $type):
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <a href="<?= $type['link'] ?>" class="business-type-card">
                    <div class="business-icon"><?= $type['icon'] ?></div>
                    <h5><?= $type['title'] ?></h5>
                    <p class="text-muted small"><?= $type['desc'] ?></p>
                    <small class="text-primary"><?= $type['examples'] ?></small>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- VALUE PROPOSITION - KENAPA SITUNEO? -->
<section class="why-us py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Kenapa Memilih SITUNEO?</h2>
            <p class="section-subtitle">Bukan tentang murah, tapi tentang TEPAT</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up">
                <div class="value-card text-center">
                    <div class="value-icon">
                        <i class="bi bi-bullseye fs-1 text-primary"></i>
                    </div>
                    <h4>Solusi Tepat</h4>
                    <p class="text-muted">
                        Analisa kebutuhan Anda dulu, baru rekomendasikan solusi yang pas.
                        Tidak overselling, tidak underpromise.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="value-card text-center">
                    <div class="value-icon">
                        <i class="bi bi-lightning-charge fs-1 text-warning"></i>
                    </div>
                    <h4>Eksekusi Cepat</h4>
                    <p class="text-muted">
                        Tim lengkap siap eksekusi dengan SOP jelas.
                        Website bisa selesai dalam 5 jam - 14 hari tergantung kompleksitas.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="value-card text-center">
                    <div class="value-icon">
                        <i class="bi bi-headset fs-1 text-success"></i>
                    </div>
                    <h4>Support 24/7</h4>
                    <p class="text-muted">
                        Tim support siap 24/7 via WhatsApp.
                        Maintenance rutin, update security, backup otomatis.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="value-card text-center">
                    <div class="value-icon">
                        <i class="bi bi-credit-card fs-1 text-info"></i>
                    </div>
                    <h4>Fleksibel</h4>
                    <p class="text-muted">
                        SEWA untuk coba dulu, BELI untuk permanent,
                        CICILAN untuk project >10jt. Anda yang tentukan!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LAYANAN POPULER -->
<section class="popular-services py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Layanan Paling Laris</h2>
            <p class="section-subtitle">Ini yang paling sering dipesan client kami</p>
        </div>

        <div class="row g-4">
            <?php
            $popular_services = [
                [
                    'name' => 'Website Toko Online',
                    'icon' => 'bi-shop',
                    'desc' => 'Persis kayak Tokopedia, tapi khusus untuk toko Anda',
                    'price_sewa' => '350rb/bulan',
                    'price_beli' => '5 juta',
                    'features' => ['Unlimited produk', 'Payment gateway', 'Ongkir otomatis', 'Laporan penjualan'],
                    'link' => '/solutions/toko-online'
                ],
                [
                    'name' => 'Website Company Profile',
                    'icon' => 'bi-building',
                    'desc' => 'Website profesional yang bikin perusahaan Anda keliatan besar',
                    'price_sewa' => '150rb/bulan',
                    'price_beli' => '2.5 juta',
                    'features' => ['Design modern', 'Portfolio showcase', 'SEO friendly', 'Mobile responsive'],
                    'link' => '/solutions/company-profile'
                ],
                [
                    'name' => 'Website Resto + Order',
                    'icon' => 'bi-cup-hot',
                    'desc' => 'Customer pesan dari rumah, Anda tinggal kirim',
                    'price_sewa' => '250rb/bulan',
                    'price_beli' => '3.5 juta',
                    'features' => ['Menu digital', 'Order system', 'Notif WhatsApp', 'Delivery management'],
                    'link' => '/solutions/resto-online'
                ]
            ];

            foreach ($popular_services as $index => $service):
            ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <div class="service-card-new h-100">
                    <div class="service-header">
                        <div class="service-icon-large">
                            <i class="<?= $service['icon'] ?>"></i>
                        </div>
                        <h4><?= $service['name'] ?></h4>
                        <p class="text-muted"><?= $service['desc'] ?></p>
                    </div>

                    <div class="service-features mb-3">
                        <ul class="list-unstyled">
                            <?php foreach ($service['features'] as $feature): ?>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <?= $feature ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="service-pricing">
                        <div class="price-option mb-2">
                            <small class="text-muted">SEWA:</small>
                            <strong class="text-primary"><?= $service['price_sewa'] ?></strong>
                        </div>
                        <div class="price-option mb-3">
                            <small class="text-muted">BELI:</small>
                            <strong class="text-success"><?= $service['price_beli'] ?></strong>
                        </div>
                    </div>

                    <div class="service-actions">
                        <a href="<?= $service['link'] ?>" class="btn btn-outline-primary btn-sm me-2">
                            Lihat Detail
                        </a>
                        <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Halo%20SITUNEO,%20saya%20tertarik%20dengan%20<?= urlencode($service['name']) ?>"
                           class="btn btn-success btn-sm" target="_blank">
                            <i class="bi bi-whatsapp me-1"></i> Order
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5">
            <a href="/services" class="btn btn-warning btn-lg">
                <i class="bi bi-grid-3x3 me-2"></i>
                Lihat 232+ Layanan Lainnya
            </a>
        </div>
    </div>
</section>

<!-- PROSES KERJA SIMPLE -->
<section class="how-it-works py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Gampang Kok Prosesnya!</h2>
            <p class="section-subtitle">Cuma 5 langkah, website Anda sudah online</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="process-steps">
                    <?php
                    $steps = [
                        ['icon' => 'bi-chat-dots', 'title' => 'Cerita Kebutuhan', 'desc' => 'Chat/call dengan kami, ceritain bisnis Anda'],
                        ['icon' => 'bi-laptop', 'title' => 'Lihat Demo', 'desc' => 'Kami tunjukin contoh yang mirip'],
                        ['icon' => 'bi-handshake', 'title' => 'Deal Harga', 'desc' => 'Setuju fitur & harga, mulai kerja'],
                        ['icon' => 'bi-tools', 'title' => 'Kami Kerjakan', 'desc' => '5 jam - 14 hari tergantung kompleksitas'],
                        ['icon' => 'bi-rocket-takeoff', 'title' => 'Website Online!', 'desc' => 'Bayar setelah puas, website langsung aktif']
                    ];

                    foreach ($steps as $index => $step):
                    ?>
                    <div class="process-step" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                        <div class="step-number"><?= $index + 1 ?></div>
                        <div class="step-content">
                            <div class="step-icon">
                                <i class="<?= $step['icon'] ?>"></i>
                            </div>
                            <h5><?= $step['title'] ?></h5>
                            <p class="text-muted"><?= $step['desc'] ?></p>
                        </div>
                        <?php if ($index < count($steps) - 1): ?>
                        <div class="step-arrow">
                            <i class="bi bi-arrow-right"></i>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONI -->
<section class="testimonials py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Kata Mereka Yang Sudah Pakai</h2>
            <p class="section-subtitle">Bukan janji muluk, ini testimoni real</p>
        </div>

        <div class="row g-4">
            <?php
            $testimonials = [
                [
                    'name' => 'Pak Budi',
                    'business' => 'Toko Elektronik Jakarta',
                    'text' => 'DULU jualan cuma 5-10 pembeli per hari. SEKARANG punya website, 30-50 order per hari! Omset naik 5x lipat. Yang paling enak, order masuk pas lagi tidur. Bangun-bangun tinggal packing!',
                    'rating' => 5
                ],
                [
                    'name' => 'Bu Siti',
                    'business' => 'Warteg Berkah Bekasi',
                    'text' => 'Awalnya ragu, warteg kok pake website. Eh ternyata banyak yang order online! Ibu-ibu komplek pada order untuk lunch suami di kantor. Sekarang online lebih laris dari offline! Omset dari 1.5 juta jadi 8 juta per bulan!',
                    'rating' => 5
                ],
                [
                    'name' => 'PT Maju Jaya',
                    'business' => 'Kontraktor Surabaya',
                    'text' => 'Tender/lelak jadi gampang karena ada portfolio online. Client juga lebih percaya. Website profesional = perusahaan serius. Worth it banget investasinya!',
                    'rating' => 5
                ]
            ];

            foreach ($testimonials as $index => $testi):
            ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <div class="testimonial-card">
                    <div class="rating mb-3">
                        <?php for ($i = 0; $i < $testi['rating']; $i++): ?>
                        <i class="bi bi-star-fill text-warning"></i>
                        <?php endfor; ?>
                    </div>
                    <p class="testimonial-text">"<?= $testi['text'] ?>"</p>
                    <div class="testimonial-author">
                        <strong><?= $testi['name'] ?></strong><br>
                        <small class="text-muted"><?= $testi['business'] ?></small>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Pertanyaan Yang Sering Ditanya</h2>
            <p class="section-subtitle">Mungkin Anda juga mau tanya ini</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <?php
                    $faqs = [
                        [
                            'q' => 'Bedanya sewa dan beli apa?',
                            'a' => '<strong>SEWA:</strong> Bayar bulanan, cocok untuk yang mau coba dulu atau budget terbatas. Bisa stop kapan saja kalau tidak cocok.<br><br><strong>BELI:</strong> Bayar sekali, website jadi milik Anda selamanya. Lebih hemat untuk jangka panjang.'
                        ],
                        [
                            'q' => 'Berapa lama website jadi?',
                            'a' => 'Tergantung kompleksitas:<br>• Website simple (5 halaman): <strong>5 jam - 1 hari</strong><br>• Website standard (10 halaman): <strong>3-7 hari</strong><br>• Toko online: <strong>7-14 hari</strong><br>• Custom system: <strong>14-60 hari</strong>'
                        ],
                        [
                            'q' => 'Saya gaptek, bisa gak ya?',
                            'a' => '<strong>BISA BANGET!</strong> Kita design supaya gampang, semudah pakai Facebook. Plus kita training sampai bisa, ada video tutorial, dan support WA 24 jam kalau bingung. Client kita ada yang umur 60 tahun aja bisa kok!'
                        ],
                        [
                            'q' => 'Apakah ada garansi?',
                            'a' => 'Ya, kami berikan:<br>• Garansi bug fixing <strong>3 bulan</strong><br>• Garansi kepuasan <strong>7 hari</strong> (uang kembali jika tidak puas)<br>• Support teknis selama berlangganan<br>• Free minor revision selama <strong>1 bulan</strong>'
                        ],
                        [
                            'q' => 'Bisa ketemu langsung?',
                            'a' => 'Bisa! Untuk project di atas 10 juta kami siap visit ke lokasi Anda (Jabodetabek). Atau Anda bisa datang ke office kami di <strong>Jakarta Timur</strong>.'
                        ]
                    ];

                    foreach ($faqs as $index => $faq):
                    ?>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                        <h3 class="accordion-header">
                            <button class="accordion-button <?= $index > 0 ? 'collapsed' : '' ?>"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faq<?= $index ?>">
                                <?= $faq['q'] ?>
                            </button>
                        </h3>
                        <div id="faq<?= $index ?>"
                             class="accordion-collapse collapse <?= $index == 0 ? 'show' : '' ?>"
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?= $faq['a'] ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA FINAL -->
<section class="final-cta py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <h2 class="text-white mb-3">Tunggu Apa Lagi?</h2>
                <p class="text-white-50 mb-4">
                    Setiap hari Anda delay = kompetitor makin jauh!<br>
                    Mulai sekarang, 5 jam lagi website Anda sudah bisa online!
                </p>
            </div>
            <div class="col-lg-4 text-lg-end" data-aos="fade-left">
                <a href="/pilih-bisnis" class="btn btn-warning btn-lg mb-2 w-100">
                    <i class="bi bi-hand-index me-2"></i>
                    PILIH BISNIS SAYA
                </a>
                <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Halo%20SITUNEO,%20saya%20mau%20konsultasi"
                   class="btn btn-success btn-lg w-100" target="_blank">
                    <i class="bi bi-whatsapp me-2"></i>
                    KONSULTASI GRATIS
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* HERO SECTION STYLING */
.hero-section-new {
    padding: 100px 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.hero-badge-new {
    display: inline-block;
    background: rgba(255,255,255,0.2);
    padding: 8px 20px;
    border-radius: 50px;
    font-size: 0.9rem;
    margin-bottom: 20px;
}

.hero-title-new {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 20px;
    line-height: 1.2;
}

.hero-subtitle-new {
    font-size: 1.3rem;
    margin-bottom: 30px;
    opacity: 0.9;
}

.hero-buttons-new {
    display: flex;
    gap: 15px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.trust-indicators .badge {
    font-size: 0.9rem;
    font-weight: 500;
}

/* BUSINESS CATEGORIES */
.business-type-card {
    display: block;
    background: white;
    padding: 30px 20px;
    border-radius: 15px;
    text-align: center;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    height: 100%;
}

.business-type-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    color: inherit;
}

.business-icon {
    font-size: 48px;
    margin-bottom: 15px;
    display: block;
}

/* VALUE CARDS */
.value-card {
    padding: 30px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    height: 100%;
}

.value-icon {
    margin-bottom: 20px;
}

/* SERVICE CARDS */
.service-card-new {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: all 0.3s;
}

.service-card-new:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.service-icon-large {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 2rem;
    color: white;
}

/* PROCESS STEPS */
.process-steps {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.process-step {
    text-align: center;
    flex: 1;
}

.step-number {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    font-size: 1.5rem;
    font-weight: bold;
}

.step-icon {
    font-size: 2rem;
    color: #667eea;
    margin-bottom: 10px;
}

.step-arrow {
    font-size: 2rem;
    color: #ccc;
}

/* TESTIMONIAL CARDS */
.testimonial-card {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    height: 100%;
}

.testimonial-text {
    font-style: italic;
    margin-bottom: 20px;
    color: #555;
}

/* FINAL CTA */
.final-cta {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .hero-title-new {
        font-size: 2rem;
    }

    .hero-buttons-new {
        flex-direction: column;
    }

    .hero-buttons-new .btn {
        width: 100%;
    }

    .process-steps {
        flex-direction: column;
    }

    .step-arrow {
        transform: rotate(90deg);
        margin: 10px 0;
    }
}
</style>

<?php include __DIR__ . '/../includes/footer.php'; ?>
