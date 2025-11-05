<?php
/**
 * SOLUTION: WEBSITE TOKO ONLINE
 * Penjelasan super detail dengan bahasa awam
 */

$pageTitle = 'Website Toko Online - Persis Kayak Tokopedia Tapi Khusus Untuk Toko Anda!';
$pageDescription = 'Website toko online lengkap dengan sistem pembayaran, ongkir otomatis, dan notifikasi WhatsApp. Mulai 350rb/bulan.';

include __DIR__ . '/../../includes/header.php';
?>

<!-- Hero Section -->
<section class="solution-hero py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-lg-7">
                <div class="mb-3">
                    <span class="badge bg-warning text-dark">
                        <i class="bi bi-fire me-1"></i> PALING LARIS
                    </span>
                </div>
                <h1 class="display-4 mb-4">🏪 Website Toko Online</h1>
                <h2 class="h3 mb-4">Persis Kayak Tokopedia, Tapi Khusus Untuk Toko Anda!</h2>
                <p class="lead mb-4">
                    Jualan online 24 jam nonstop. Customer belanja sendiri, bayar otomatis,
                    Anda tinggal packing & kirim. <strong>SESIMPEL ITU!</strong>
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="#harga" class="btn btn-warning btn-lg">
                        <i class="bi bi-tag me-2"></i> Lihat Harga
                    </a>
                    <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Halo%20SITUNEO,%20saya%20tertarik%20dengan%20Website%20Toko%20Online"
                       class="btn btn-success btn-lg" target="_blank">
                        <i class="bi bi-whatsapp me-2"></i> Order Sekarang
                    </a>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <div class="solution-illustration">
                    <!-- Placeholder for illustration -->
                    <div style="background: rgba(255,255,255,0.1); padding: 50px; border-radius: 20px;">
                        <i class="bi bi-shop" style="font-size: 10rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gini Lho Cara Kerjanya -->
<section class="how-it-works py-5">
    <div class="container">
        <h2 class="text-center mb-5">💡 Gini Lho Cara Kerjanya...</h2>

        <div class="workflow-visual">
            <div class="workflow-step">
                <div class="step-badge">1</div>
                <div class="step-icon">📱</div>
                <h5>Customer Buka Website Anda</h5>
                <p class="text-muted">Dari HP atau laptop, kapan aja, dimana aja</p>
            </div>
            <div class="arrow">→</div>
            <div class="workflow-step">
                <div class="step-badge">2</div>
                <div class="step-icon">🛒</div>
                <h5>Pilih Barang & Bayar</h5>
                <p class="text-muted">Pilih produk, masuk keranjang, bayar otomatis</p>
            </div>
            <div class="arrow">→</div>
            <div class="workflow-step">
                <div class="step-badge">3</div>
                <div class="step-icon">📲</div>
                <h5>Anda Terima Notif WA</h5>
                <p class="text-muted">"Ada order baru!" Tinggal packing & kirim</p>
            </div>
            <div class="arrow">→</div>
            <div class="workflow-step">
                <div class="step-badge">4</div>
                <div class="step-icon">💰</div>
                <h5>Duit Masuk Rekening</h5>
                <p class="text-muted">Customer senang, Anda untung!</p>
            </div>
        </div>
    </div>
</section>

<!-- Before vs After Comparison -->
<section class="comparison py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Lihat Bedanya!</h2>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="comparison-card before">
                    <h3 class="text-danger mb-4">
                        <i class="bi bi-x-circle me-2"></i>
                        DULU (Tanpa Website)
                    </h3>
                    <div class="scenario">
                        <p>➡️ Customer WA: "Ada barang A?"</p>
                        <p>← Anda jawab manual satu-satu</p>
                        <p>➡️ Customer: "Warnanya apa aja?"</p>
                        <p>← Anda foto-fotoin lagi</p>
                        <p>➡️ Customer: "Ongkirnya berapa?"</p>
                        <p>← Anda cek JNE manual</p>
                        <p>➡️ Customer: "Mikir dulu ya..."</p>
                        <div class="alert alert-danger mt-3">
                            <strong>😤 CAPE TAPI GAK JADI BELI!</strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="comparison-card after">
                    <h3 class="text-success mb-4">
                        <i class="bi bi-check-circle me-2"></i>
                        SEKARANG (Pakai Website)
                    </h3>
                    <div class="scenario">
                        <p>✅ Customer buka website</p>
                        <p>✅ Lihat semua produk + foto</p>
                        <p>✅ Pilih warna & ukuran sendiri</p>
                        <p>✅ Ongkir dihitung otomatis</p>
                        <p>✅ Bayar langsung</p>
                        <p>✅ Anda terima notif: "ORDER MASUK!"</p>
                        <div class="alert alert-success mt-3">
                            <strong>🤑 GAK CAPE, DUIT MASUK TERUS!</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Yang Anda Dapat -->
<section class="features py-5">
    <div class="container">
        <h2 class="text-center mb-5">Yang Anda Dapat:</h2>

        <div class="row g-4">
            <?php
            $features = [
                [
                    'icon' => 'bi-cart-check',
                    'title' => 'Keranjang Belanja',
                    'desc' => 'Customer bisa pilih banyak barang sekaligus'
                ],
                [
                    'icon' => 'bi-credit-card',
                    'title' => 'Payment Otomatis',
                    'desc' => 'Transfer, QRIS, E-wallet, COD'
                ],
                [
                    'icon' => 'bi-truck',
                    'title' => 'Ongkir Otomatis',
                    'desc' => 'JNE, JNT, SiCepat, Anteraja, dll'
                ],
                [
                    'icon' => 'bi-whatsapp',
                    'title' => 'Notif WA',
                    'desc' => 'Tiap ada order, langsung masuk WA'
                ],
                [
                    'icon' => 'bi-graph-up',
                    'title' => 'Laporan Penjualan',
                    'desc' => 'Tau untung-rugi tiap hari'
                ],
                [
                    'icon' => 'bi-percent',
                    'title' => 'Kode Promo',
                    'desc' => 'Bikin diskon untuk menarik pembeli'
                ],
                [
                    'icon' => 'bi-star',
                    'title' => 'Review Produk',
                    'desc' => 'Customer bisa kasih rating & review'
                ],
                [
                    'icon' => 'bi-phone',
                    'title' => 'Mobile Friendly',
                    'desc' => 'Bagus di HP, tablet, laptop'
                ]
            ];

            foreach ($features as $feature):
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="feature-box text-center">
                    <div class="feature-icon">
                        <i class="<?= $feature['icon'] ?>"></i>
                    </div>
                    <h5><?= $feature['title'] ?></h5>
                    <p class="text-muted small"><?= $feature['desc'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Success Story -->
<section class="success-story py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Cerita Sukses Client Kami</h2>

        <div class="story-card">
            <div class="row">
                <div class="col-md-4">
                    <div class="story-profile">
                        <div class="profile-avatar">
                            <i class="bi bi-person-circle" style="font-size: 4rem;"></i>
                        </div>
                        <div>
                            <h4>Pak Budi</h4>
                            <p class="text-muted mb-0">Toko Elektronik Jakarta</p>
                            <div class="rating">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="timeline">
                        <div class="timeline-item">
                            <h6>DULU:</h6>
                            <ul class="mb-0">
                                <li>Jualan cuma di toko fisik</li>
                                <li>5-10 pembeli per hari</li>
                                <li>Omset 5 juta/bulan</li>
                            </ul>
                        </div>
                        <div class="timeline-item success">
                            <h6>SEKARANG:</h6>
                            <ul class="mb-0">
                                <li>Jualan online + offline</li>
                                <li>30-50 order per hari</li>
                                <li>Omset 25 juta/bulan</li>
                            </ul>
                        </div>
                    </div>
                    <blockquote class="blockquote mt-3">
                        <p class="mb-0">"Gila! Gak nyangka website bisa naikin omset 5x lipat!
                        Yang paling enak, orderan masuk pas lagi tidur.
                        Bangun-bangun tinggal packing!"</p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing py-5" id="harga">
    <div class="container">
        <h2 class="text-center mb-5">Pilih Yang Mana?</h2>

        <div class="row g-4 justify-content-center">
            <!-- Paket Sewa -->
            <div class="col-lg-5">
                <div class="pricing-card h-100">
                    <div class="pricing-header">
                        <h3>SEWA BULANAN</h3>
                        <div class="price">
                            <span class="currency">Rp</span>
                            <span class="amount">350.000</span>
                            <span class="period">/bulan</span>
                        </div>
                        <p class="text-muted">Bayar tiap bulan, kayak ngontrak</p>
                    </div>

                    <div class="pricing-body">
                        <div class="cocok-untuk mb-4">
                            <h6>Cocok untuk:</h6>
                            <ul>
                                <li>Yang mau coba dulu</li>
                                <li>Budget terbatas</li>
                                <li>Bisnis baru mulai</li>
                            </ul>
                        </div>

                        <div class="includes mb-4">
                            <h6>Sudah termasuk:</h6>
                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill text-success"></i> Domain .com (1 tahun)</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Hosting unlimited</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Setup lengkap</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Training 2 jam</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Support 24/7</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Update & maintenance</li>
                            </ul>
                        </div>
                    </div>

                    <div class="pricing-footer">
                        <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Halo%20SITUNEO,%20saya%20mau%20SEWA%20Website%20Toko%20Online"
                           class="btn btn-primary btn-lg w-100" target="_blank">
                            <i class="bi bi-whatsapp me-2"></i> SEWA SEKARANG
                        </a>
                    </div>
                </div>
            </div>

            <!-- Paket Beli -->
            <div class="col-lg-5">
                <div class="pricing-card featured h-100">
                    <div class="badge-popular">PALING HEMAT</div>
                    <div class="pricing-header">
                        <h3>BELI LANGSUNG</h3>
                        <div class="price">
                            <span class="currency">Rp</span>
                            <span class="amount">5.000.000</span>
                        </div>
                        <p class="text-muted">Bayar sekali, punya selamanya</p>
                    </div>

                    <div class="pricing-body">
                        <div class="cocok-untuk mb-4">
                            <h6>Cocok untuk:</h6>
                            <ul>
                                <li>Bisnis sudah jalan</li>
                                <li>Investasi jangka panjang</li>
                                <li>Gak mau bayar bulanan</li>
                            </ul>
                        </div>

                        <div class="includes mb-4">
                            <h6>Sudah termasuk:</h6>
                            <ul class="feature-list">
                                <li><i class="bi bi-check-circle-fill text-success"></i> Semua fitur di atas</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Source code lengkap</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Bisa custom sesuka hati</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Free maintenance 3 bulan</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Free update 1 tahun</li>
                                <li><i class="bi bi-check-circle-fill text-success"></i> Garansi bug 6 bulan</li>
                            </ul>
                        </div>
                    </div>

                    <div class="pricing-footer">
                        <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Halo%20SITUNEO,%20saya%20mau%20BELI%20Website%20Toko%20Online"
                           class="btn btn-warning btn-lg w-100" target="_blank">
                            <i class="bi bi-whatsapp me-2"></i> BELI SEKARANG
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <div class="alert alert-info d-inline-block">
                <i class="bi bi-shield-check me-2"></i>
                Garansi uang kembali 7 hari kalau gak puas
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Yang Sering Ditanya</h2>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <?php
                    $faqs = [
                        [
                            'q' => 'Saya gaptek, bisa gak ya?',
                            'a' => '<strong>BISA BANGET!</strong> Kita design supaya gampang, semudah pakai Facebook. Plus kita training sampai bisa, ada video tutorial, dan support WA 24 jam kalau bingung. Client kita ada yang umur 60 tahun aja bisa kok!'
                        ],
                        [
                            'q' => 'Kalau barang saya ribuan item?',
                            'a' => 'Gak masalah! Website kita UNLIMITED produk. Mau 10 atau 10.000 produk sama aja. Ada fitur import Excel juga, jadi gak perlu input satu-satu. Upload foto bisa sekaligus banyak (bulk upload).'
                        ],
                        [
                            'q' => 'Payment-nya gimana? Ribet gak?',
                            'a' => 'Gampang! Customer bisa bayar via:<br>• Transfer bank (BCA, Mandiri, BNI, BRI)<br>• E-wallet (GoPay, OVO, Dana, ShopeePay)<br>• QRIS (scan aja)<br>• COD (bayar di tempat)<br><br>Semua otomatis, Anda tinggal cek ada transferan masuk.'
                        ]
                    ];

                    foreach ($faqs as $index => $faq):
                    ?>
                    <div class="accordion-item">
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

<!-- Final CTA -->
<section class="final-cta py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container text-center text-white">
        <h2 class="mb-4">Tunggu Apa Lagi?</h2>
        <p class="lead mb-4">
            Setiap hari Anda delay = kompetitor makin jauh!<br>
            Mulai sekarang, 5 jam lagi website Anda sudah online!
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Halo%20SITUNEO,%20saya%20mau%20ORDER%20Website%20Toko%20Online"
               class="btn btn-warning btn-lg" target="_blank">
                <i class="bi bi-whatsapp me-2"></i> ORDER VIA WHATSAPP
            </a>
            <a href="/services" class="btn btn-outline-light btn-lg">
                LIHAT DEMO DULU
            </a>
        </div>
        <p class="mt-4 mb-0">
            <small>
                <i class="bi bi-shield-check me-1"></i>
                100% Aman | Garansi Uang Kembali | Support Seumur Hidup
            </small>
        </p>
    </div>
</section>

<style>
/* Solution Page Styling */
.workflow-visual {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.workflow-step {
    flex: 0 0 auto;
    text-align: center;
    max-width: 200px;
}

.step-badge {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 10px;
    font-size: 1.5rem;
    font-weight: bold;
}

.step-icon {
    font-size: 3rem;
    margin-bottom: 10px;
}

.arrow {
    font-size: 2rem;
    color: #ccc;
}

.comparison-card {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    height: 100%;
}

.comparison-card.before {
    border-left: 5px solid #dc3545;
}

.comparison-card.after {
    border-left: 5px solid #28a745;
}

.feature-box {
    background: white;
    padding: 30px 20px;
    border-radius: 15px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.05);
    transition: all 0.3s;
}

.feature-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.feature-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    font-size: 2rem;
    color: white;
}

.story-card {
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.1);
}

.timeline-item {
    padding: 20px;
    margin-bottom: 15px;
    border-radius: 10px;
    background: #f8f9fa;
}

.timeline-item.success {
    background: #d4edda;
    border-left: 4px solid #28a745;
}

.pricing-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.1);
    overflow: hidden;
    position: relative;
}

.pricing-card.featured {
    border: 3px solid #ffc107;
}

.badge-popular {
    position: absolute;
    top: 20px;
    right: -40px;
    background: #ffc107;
    color: #000;
    padding: 5px 50px;
    transform: rotate(45deg);
    font-weight: bold;
    font-size: 12px;
}

.pricing-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 30px;
    text-align: center;
}

.price {
    font-size: 3rem;
    font-weight: bold;
    margin: 20px 0;
}

.price .currency,
.price .period {
    font-size: 1rem;
    font-weight: normal;
}

.pricing-body,
.pricing-footer {
    padding: 30px;
}

.feature-list {
    list-style: none;
    padding: 0;
}

.feature-list li {
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
}

/* Responsive */
@media (max-width: 768px) {
    .workflow-visual {
        flex-direction: column;
    }

    .arrow {
        transform: rotate(90deg);
    }
}
</style>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
