<?php
/**
 * SITUNEO DIGITAL - Solution: Resto Online
 * Website untuk Restoran, Warung Makan, Katering
 */

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/security.php';
require_once __DIR__ . '/../../includes/session.php';
require_once __DIR__ . '/../../includes/functions.php';

$page_title = "Website Resto Online - SITUNEO DIGITAL";
$meta_description = "Website restoran dengan sistem order online. Customer pesan dari rumah, Anda tinggal masak & kirim!";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <meta name="description" content="<?= $meta_description ?>">

    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --gold: #FFD700;
            --gold-dark: #B8860B;
            --dark-bg: #0a0a0a;
            --card-bg: #1a1a1a;
        }

        body {
            background: var(--dark-bg);
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Hero Section */
        .hero-solution {
            background: linear-gradient(135deg, #8B4513 0%, #D2691E 100%);
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-solution::before {
            content: '🍔';
            position: absolute;
            font-size: 300px;
            opacity: 0.1;
            right: -50px;
            top: -50px;
        }

        .hero-solution h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .hero-solution h2 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 30px;
            color: var(--gold);
        }

        .hero-solution .lead {
            font-size: 1.3rem;
            line-height: 1.8;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Workflow Section */
        .workflow-container {
            background: var(--card-bg);
            padding: 60px 0;
        }

        .workflow-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .workflow-step {
            background: rgba(255, 215, 0, 0.05);
            border: 2px solid var(--gold);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            position: relative;
            transition: all 0.3s ease;
        }

        .workflow-step:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(255, 215, 0, 0.3);
        }

        .step-badge {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--gold);
            color: #000;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.2rem;
        }

        .step-icon {
            font-size: 4rem;
            margin: 20px 0;
        }

        .workflow-step h5 {
            color: var(--gold);
            font-weight: 700;
            margin-bottom: 15px;
        }

        /* Comparison Section */
        .comparison-container {
            padding: 60px 0;
            background: linear-gradient(to bottom, var(--dark-bg) 0%, var(--card-bg) 100%);
        }

        .comparison-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 40px;
        }

        .comparison-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 40px;
            border: 3px solid;
        }

        .comparison-card.before {
            border-color: #dc3545;
        }

        .comparison-card.after {
            border-color: #28a745;
            background: rgba(40, 167, 69, 0.1);
        }

        .scenario {
            background: rgba(0, 0, 0, 0.3);
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            font-size: 1.1rem;
            line-height: 2;
        }

        .scenario p {
            margin: 15px 0;
        }

        /* Features Grid */
        .features-section {
            padding: 60px 0;
            background: var(--card-bg);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .feature-box {
            background: rgba(255, 215, 0, 0.05);
            border: 2px solid rgba(255, 215, 0, 0.3);
            border-radius: 15px;
            padding: 30px;
            transition: all 0.3s ease;
        }

        .feature-box:hover {
            border-color: var(--gold);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(255, 215, 0, 0.2);
        }

        .feature-box i {
            font-size: 3rem;
            color: var(--gold);
            margin-bottom: 20px;
        }

        .feature-box h5 {
            color: var(--gold);
            font-weight: 700;
            margin-bottom: 15px;
        }

        /* Success Story */
        .success-story {
            padding: 60px 0;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }

        .story-card {
            background: rgba(255, 215, 0, 0.05);
            border: 3px solid var(--gold);
            border-radius: 20px;
            padding: 40px;
            margin-top: 30px;
        }

        .story-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .story-header h3 {
            font-size: 2rem;
            color: var(--gold);
            margin-bottom: 10px;
        }

        .timeline {
            display: flex;
            gap: 30px;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .timeline-item {
            flex: 1;
            min-width: 250px;
            background: rgba(0, 0, 0, 0.3);
            padding: 25px;
            border-radius: 10px;
            border-left: 5px solid #dc3545;
        }

        .timeline-item.success {
            border-left-color: #28a745;
        }

        .timeline-item h6 {
            color: var(--gold);
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .timeline-item ul {
            list-style: none;
            padding-left: 0;
        }

        .timeline-item ul li {
            padding: 8px 0;
            padding-left: 25px;
            position: relative;
        }

        .timeline-item ul li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--gold);
            font-weight: 700;
        }

        /* Pricing Section */
        .pricing-section {
            padding: 60px 0;
            background: var(--dark-bg);
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 40px;
        }

        .pricing-card {
            background: var(--card-bg);
            border: 3px solid rgba(255, 215, 0, 0.3);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .pricing-card:hover {
            border-color: var(--gold);
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(255, 215, 0, 0.3);
        }

        .pricing-card.recommended {
            border-color: var(--gold);
            background: rgba(255, 215, 0, 0.05);
        }

        .pricing-badge {
            background: var(--gold);
            color: #000;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 20px;
        }

        .pricing-card h3 {
            font-size: 2rem;
            color: var(--gold);
            margin-bottom: 20px;
        }

        .price {
            font-size: 3rem;
            font-weight: 800;
            color: #fff;
            margin: 30px 0;
        }

        .price .currency {
            font-size: 1.5rem;
            vertical-align: top;
        }

        .price .period {
            font-size: 1.2rem;
            color: #888;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin: 30px 0;
            text-align: left;
        }

        .pricing-features li {
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .pricing-features li i {
            color: var(--gold);
            margin-right: 10px;
        }

        /* FAQ Section */
        .faq-section {
            padding: 60px 0;
            background: var(--card-bg);
        }

        .accordion-item {
            background: rgba(255, 215, 0, 0.05);
            border: 2px solid rgba(255, 215, 0, 0.2);
            margin-bottom: 15px;
            border-radius: 10px;
            overflow: hidden;
        }

        .accordion-button {
            background: rgba(255, 215, 0, 0.1);
            color: #fff;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 20px;
        }

        .accordion-button:not(.collapsed) {
            background: var(--gold);
            color: #000;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        .accordion-body {
            background: rgba(0, 0, 0, 0.3);
            color: #ddd;
            padding: 25px;
            font-size: 1.05rem;
            line-height: 1.8;
        }

        /* CTA Section */
        .cta-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #8B4513 0%, #D2691E 100%);
            text-align: center;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        .btn-cta {
            background: var(--gold);
            color: #000;
            padding: 18px 50px;
            font-size: 1.3rem;
            font-weight: 700;
            border: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-cta:hover {
            background: var(--gold-dark);
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(255, 215, 0, 0.5);
        }

        @media (max-width: 768px) {
            .hero-solution h1 {
                font-size: 2rem;
            }

            .hero-solution h2 {
                font-size: 1.4rem;
            }

            .workflow-grid, .comparison-grid, .features-grid, .pricing-grid {
                grid-template-columns: 1fr;
            }

            .timeline {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero-solution">
        <div class="container">
            <h1 class="display-4 mb-4">🍔 Website Resto Online</h1>
            <h2 class="h3 mb-4">Customer Pesan Dari Rumah, Anda Tinggal Masak & Kirim!</h2>
            <p class="lead mb-4">
                Punya warung makan, restoran, atau katering? Sekarang customer bisa pesan online 24 jam!<br>
                Order masuk otomatis, notifikasi ke WhatsApp, <strong>Anda tinggal masak & kirim. SIMPLE!</strong>
            </p>
            <a href="https://wa.me/6281234567890?text=Halo%20Situneo,%20mau%20tanya%20tentang%20Website%20Resto%20Online" class="btn btn-cta" target="_blank">
                <i class="bi bi-whatsapp me-2"></i>
                TANYA LENGKAP VIA WHATSAPP
            </a>
        </div>
    </section>

    <!-- Workflow Section -->
    <section class="workflow-container">
        <div class="container">
            <h2 class="text-center mb-4">
                <span class="text-warning">CARA KERJANYA GAMPANG BANGET!</span>
            </h2>
            <p class="text-center text-muted mb-5">4 langkah aja, customer dari pesan sampai makan:</p>

            <div class="workflow-grid">
                <div class="workflow-step" data-aos="fade-up">
                    <div class="step-badge">1</div>
                    <div class="step-icon">📱</div>
                    <h5>Customer Buka Menu Online</h5>
                    <p class="text-muted">Lihat foto makanan, harga, deskripsi. Langsung lapar liatnya!</p>
                </div>

                <div class="workflow-step" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-badge">2</div>
                    <div class="step-icon">🛒</div>
                    <h5>Pesan & Bayar</h5>
                    <p class="text-muted">Pilih menu, isi data pengiriman, bayar. Selesai!</p>
                </div>

                <div class="workflow-step" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-badge">3</div>
                    <div class="step-icon">💬</div>
                    <h5>Notifikasi Ke WA Anda</h5>
                    <p class="text-muted">Order masuk otomatis ke WhatsApp Anda. Tinggal liat & proses!</p>
                </div>

                <div class="workflow-step" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-badge">4</div>
                    <div class="step-icon">🚗</div>
                    <h5>Masak & Kirim</h5>
                    <p class="text-muted">Anda masak, packing, kirim. Customer terima, makan, puas!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Comparison: Before vs After -->
    <section class="comparison-container">
        <div class="container">
            <h2 class="text-center mb-4">
                <span class="text-warning">BEDANYA SEBELUM & SESUDAH PAKAI WEBSITE</span>
            </h2>
            <p class="text-center text-muted mb-5">Lihat sendiri perbedaannya:</p>

            <div class="comparison-grid">
                <!-- BEFORE -->
                <div class="comparison-card before" data-aos="fade-right">
                    <h3 class="text-danger mb-4">
                        <i class="bi bi-x-circle me-2"></i>
                        DULU (Tanpa Website)
                    </h3>

                    <div class="scenario">
                        <p><strong>08:00</strong> - Customer WA: "Bu, ada ayam goreng?"</p>
                        <p><strong>08:15</strong> - Anda jawab: "Ada kak, 15 ribu"</p>
                        <p><strong>08:30</strong> - Customer: "Pesan 5 ya, antar ke..."</p>
                        <p><strong>08:45</strong> - Anda: "Oke kak tunggu ya"</p>
                        <p><strong>09:00</strong> - Mulai masak</p>
                        <p><strong>10:00</strong> - Customer: "Kok lama?"</p>
                        <p><strong>10:30</strong> - Baru diantar</p>
                        <p><strong>10:45</strong> - Customer: "Lupa pesan sambel 😭"</p>
                    </div>

                    <div class="alert alert-danger mt-3">
                        <strong>😤 RIBET! Telpon/WA berantakan, sering lupa, customer ngomel!</strong>
                    </div>

                    <ul class="list-unstyled mt-4">
                        <li>❌ Telpon terus-terusan (ganggu masak)</li>
                        <li>❌ Catat manual (sering salah/lupa)</li>
                        <li>❌ Customer tanya harga 1-1 (cape banget)</li>
                        <li>❌ Gak ada bukti order tertulis</li>
                        <li>❌ Customer batal tiba-tiba (udah masak)</li>
                    </ul>
                </div>

                <!-- AFTER -->
                <div class="comparison-card after" data-aos="fade-left">
                    <h3 class="text-success mb-4">
                        <i class="bi bi-check-circle me-2"></i>
                        SEKARANG (Pakai Website)
                    </h3>

                    <div class="scenario">
                        <p><strong>08:00</strong> - Customer buka website Anda</p>
                        <p><strong>08:05</strong> - Pilih menu + lihat foto (lapar!)</p>
                        <p><strong>08:07</strong> - Pesan 5 ayam + sambel + es teh</p>
                        <p><strong>08:08</strong> - Bayar online, selesai!</p>
                        <p><strong>08:09</strong> - WA Anda bunyi: "ORDER BARU!"</p>
                        <p><strong>08:10</strong> - Anda lihat detail, langsung masak</p>
                        <p><strong>09:30</strong> - Antar tepat waktu</p>
                        <p><strong>10:00</strong> - Customer kasih review 5 ⭐</p>
                    </div>

                    <div class="alert alert-success mt-3">
                        <strong>🤑 ENAK BANGET! Gak ribet, gak cape, customer puas, duit masuk!</strong>
                    </div>

                    <ul class="list-unstyled mt-4">
                        <li>✅ Order tertulis jelas (gak ada salah paham)</li>
                        <li>✅ Notifikasi otomatis ke WA</li>
                        <li>✅ Customer lihat menu sendiri (gak ganggu)</li>
                        <li>✅ Pembayaran tercatat rapi</li>
                        <li>✅ Customer puas, pesan lagi terus!</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="features-section">
        <div class="container">
            <h2 class="text-center mb-4">
                <span class="text-warning">FITUR YANG ANDA DAPAT</span>
            </h2>
            <p class="text-center text-muted mb-5">Semua ini SUDAH TERMASUK dalam paket:</p>

            <div class="features-grid">
                <?php
                $features = [
                    [
                        'icon' => 'bi-book',
                        'title' => 'Menu Digital',
                        'desc' => 'Katalog menu lengkap dengan FOTO, deskripsi, dan harga. Customer bisa lihat-lihat dulu sebelum pesan.'
                    ],
                    [
                        'icon' => 'bi-cart-check',
                        'title' => 'Sistem Order Online',
                        'desc' => 'Customer pesan sendiri, masuk keranjang, checkout. Seperti di restoran besar, tapi ini PUNYA ANDA!'
                    ],
                    [
                        'icon' => 'bi-whatsapp',
                        'title' => 'Notifikasi WhatsApp',
                        'desc' => 'Setiap ada order baru, langsung notif ke WA Anda. Detail lengkap: pesanan, alamat, total harga.'
                    ],
                    [
                        'icon' => 'bi-credit-card',
                        'title' => 'Payment Gateway',
                        'desc' => 'Customer bayar via transfer bank, e-wallet (GoPay, OVO, DANA). Bukti bayar otomatis tercatat.'
                    ],
                    [
                        'icon' => 'bi-geo-alt',
                        'title' => 'Manajemen Delivery',
                        'desc' => 'Tracking pesanan dari "sedang dimasak" sampai "sudah diantar". Customer bisa cek status sendiri.'
                    ],
                    [
                        'icon' => 'bi-star',
                        'title' => 'Review & Rating',
                        'desc' => 'Customer bisa kasih rating dan review. Makin banyak review bagus, makin laris!'
                    ],
                    [
                        'icon' => 'bi-percent',
                        'title' => 'Promo & Diskon',
                        'desc' => 'Bikin promo "Beli 2 Gratis 1", diskon hari Jumat, voucher loyal customer. Otomatis teraplikasi!'
                    ],
                    [
                        'icon' => 'bi-graph-up',
                        'title' => 'Laporan Penjualan',
                        'desc' => 'Lihat menu apa yang paling laku, jam ramai, total omset. Data lengkap untuk evaluasi bisnis.'
                    ]
                ];

                foreach ($features as $feature): ?>
                    <div class="feature-box" data-aos="zoom-in">
                        <i class="bi <?= $feature['icon'] ?>"></i>
                        <h5><?= $feature['title'] ?></h5>
                        <p class="text-muted mb-0"><?= $feature['desc'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Success Story -->
    <section class="success-story">
        <div class="container">
            <h2 class="text-center mb-4">
                <span class="text-warning">KISAH SUKSES NYATA</span>
            </h2>

            <div class="story-card" data-aos="fade-up">
                <div class="story-header">
                    <h3>Bu Siti - Warteg Berkah</h3>
                    <p class="text-muted">Warteg di Depok, sekarang punya 200+ pelanggan online!</p>
                </div>

                <div class="timeline">
                    <div class="timeline-item">
                        <h6>DULU (Tanpa Website):</h6>
                        <ul class="mb-0">
                            <li>Jualan cuma di warteg fisik</li>
                            <li>20-30 pembeli per hari</li>
                            <li>Omset 2-3 juta/hari</li>
                            <li>Tutup jam 3 sore (kehabisan masakan)</li>
                            <li>Customer komplen: "Kok cepet habis?"</li>
                        </ul>
                    </div>

                    <div class="timeline-item success">
                        <h6>SEKARANG (Pakai Website):</h6>
                        <ul class="mb-0">
                            <li>Jualan online + offline</li>
                            <li>80-100 order per hari (50+ dari online!)</li>
                            <li>Omset 8-10 juta/hari</li>
                            <li>Bisa terima pre-order besok</li>
                            <li>Buka cabang warteg kedua! 🎉</li>
                        </ul>
                    </div>
                </div>

                <blockquote class="mt-4 p-4 border-start border-5 border-warning bg-dark">
                    <p class="mb-2"><em>"Dulu saya pikir website cuma buat restoran mahal. Ternyata warteg kayak saya juga bisa! Sekarang anak-anak kosan komplek sebelah pada pesen online. Omset naik 3x lipat! Alhamdulillah banget..."</em></p>
                    <footer class="text-warning">— Bu Siti, Owner Warteg Berkah</footer>
                </blockquote>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section class="pricing-section">
        <div class="container">
            <h2 class="text-center mb-4">
                <span class="text-warning">HARGA PASTI, TANPA BIAYA TERSEMBUNYI</span>
            </h2>
            <p class="text-center text-muted mb-5">Pilih yang sesuai budget Anda:</p>

            <div class="pricing-grid">
                <!-- Paket Sewa -->
                <div class="pricing-card" data-aos="flip-left">
                    <h3>💰 PAKET SEWA</h3>
                    <p class="text-muted">Bayar tiap bulan, kayak ngontrak</p>

                    <div class="price">
                        <span class="currency">Rp</span>
                        <span class="amount">250.000</span>
                        <span class="period">/bulan</span>
                    </div>

                    <ul class="pricing-features">
                        <li><i class="bi bi-check-circle-fill"></i> Website resto online lengkap</li>
                        <li><i class="bi bi-check-circle-fill"></i> Gratis domain .my.id</li>
                        <li><i class="bi bi-check-circle-fill"></i> Hosting 5GB</li>
                        <li><i class="bi bi-check-circle-fill"></i> Unlimited menu items</li>
                        <li><i class="bi bi-check-circle-fill"></i> Notifikasi WhatsApp</li>
                        <li><i class="bi bi-check-circle-fill"></i> Payment gateway</li>
                        <li><i class="bi bi-check-circle-fill"></i> Support teknis</li>
                        <li><i class="bi bi-check-circle-fill"></i> Update & maintenance</li>
                    </ul>

                    <p class="mt-4 text-warning"><strong>COCOK UNTUK:</strong> Baru mulai, mau coba dulu</p>

                    <a href="https://wa.me/6281234567890?text=Halo%20Situneo,%20mau%20pesan%20Paket%20SEWA%20Website%20Resto" class="btn btn-cta mt-3" target="_blank">
                        PESAN SEKARANG
                    </a>
                </div>

                <!-- Paket Beli -->
                <div class="pricing-card recommended" data-aos="flip-right">
                    <div class="pricing-badge">⭐ PALING HEMAT</div>
                    <h3>🏆 PAKET BELI</h3>
                    <p class="text-muted">Bayar sekali, punya selamanya</p>

                    <div class="price">
                        <span class="currency">Rp</span>
                        <span class="amount">3.500.000</span>
                    </div>

                    <ul class="pricing-features">
                        <li><i class="bi bi-check-circle-fill"></i> Semua fitur paket sewa</li>
                        <li><i class="bi bi-check-circle-fill"></i> Domain GRATIS 1 tahun</li>
                        <li><i class="bi bi-check-circle-fill"></i> Hosting 10GB</li>
                        <li><i class="bi bi-check-circle-fill"></i> Source code MILIK ANDA</li>
                        <li><i class="bi bi-check-circle-fill"></i> Bisa custom sesuka hati</li>
                        <li><i class="bi bi-check-circle-fill"></i> Bisa jual/waralaba ke orang lain</li>
                        <li><i class="bi bi-check-circle-fill"></i> Free support 6 bulan</li>
                        <li><i class="bi bi-check-circle-fill"></i> Training penggunaan</li>
                    </ul>

                    <div class="alert alert-success mt-3">
                        <strong>💡 HEMAT Rp 600.000!</strong><br>
                        Kalau sewa 1 tahun = Rp 3jt. Mending beli langsung!
                    </div>

                    <p class="mt-4 text-warning"><strong>COCOK UNTUK:</strong> Bisnis serius, mau investasi jangka panjang</p>

                    <a href="https://wa.me/6281234567890?text=Halo%20Situneo,%20mau%20pesan%20Paket%20BELI%20Website%20Resto" class="btn btn-cta mt-3" target="_blank">
                        PESAN SEKARANG
                    </a>
                </div>
            </div>

            <p class="text-center text-muted mt-5">
                <i class="bi bi-info-circle me-2"></i>
                <strong>CATATAN:</strong> Harga belum termasuk domain premium (.com, .id) dan biaya payment gateway.
                Untuk detail lengkap, hubungi kami via WhatsApp!
            </p>
        </div>
    </section>

    <!-- FAQ -->
    <section class="faq-section">
        <div class="container">
            <h2 class="text-center mb-4">
                <span class="text-warning">PERTANYAAN YANG SERING DITANYA</span>
            </h2>

            <div class="accordion mt-5" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            <i class="bi bi-question-circle me-3"></i>
                            Apakah customer bisa pesan via aplikasi mobile?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Website yang kami buat <strong>mobile-friendly</strong>, artinya customer bisa buka dari HP dan pengalaman nya kayak pakai aplikasi! Mereka bisa save link website Anda di home screen HP, jadi terlihat seperti aplikasi beneran. Gak perlu repot-repot bikin aplikasi Android/iOS yang mahal (puluhan juta).
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            <i class="bi bi-question-circle me-3"></i>
                            Berapa lama proses pembuatannya?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <strong>3-5 hari kerja</strong> website sudah jadi dan bisa dipakai! Yang kami butuhkan dari Anda:
                            <ul class="mt-3">
                                <li>Daftar menu + harga (Excel/foto saja cukup)</li>
                                <li>Foto makanan (pakai HP juga oke, asal jelas)</li>
                                <li>Nomor WA untuk notifikasi order</li>
                                <li>Logo/nama restoran (kalau ada)</li>
                            </ul>
                            Setelah semua data lengkap, kami langsung kerjakan!
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            <i class="bi bi-question-circle me-3"></i>
                            Kalau mau ganti menu atau harga, gimana caranya?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Ada <strong>dashboard admin</strong> khusus untuk Anda. Dari sana bisa:
                            <ul class="mt-3">
                                <li>Tambah/hapus/edit menu</li>
                                <li>Update harga kapan aja</li>
                                <li>Upload foto baru</li>
                                <li>Bikin promo/diskon</li>
                                <li>Lihat laporan penjualan</li>
                            </ul>
                            Gampang banget, gak perlu ngerti coding! Nanti kami kasih tutorial video step-by-step.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                            <i class="bi bi-question-circle me-3"></i>
                            Biaya payment gateway nya berapa?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Payment gateway (Midtrans, Xendit, dll) biasanya potong <strong>2-3% per transaksi</strong>. Misalnya customer bayar Rp 100.000, yang masuk ke rekening Anda sekitar Rp 97.000-98.000. Ini standar industri ya, semua payment gateway begitu.<br><br>

                            Atau kalau mau <strong>GRATIS</strong>, bisa pakai sistem transfer bank manual. Customer transfer ke rekening Anda, upload bukti bayar, Anda konfirmasi manual. Gak ada potongan, tapi lebih repot dikit.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                            <i class="bi bi-question-circle me-3"></i>
                            Apakah bisa integrasi dengan GrabFood/GoFood?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Website ini <strong>independent</strong> (berdiri sendiri), jadi customer pesan langsung ke Anda tanpa perantara. Keuntungannya:
                            <ul class="mt-3">
                                <li><strong>GAK ADA KOMISI!</strong> GrabFood/GoFood potong 20-30%, ini 0%!</li>
                                <li>Customer data jadi MILIK ANDA (bisa difollow-up untuk repeat order)</li>
                                <li>Bisa atur harga sendiri tanpa batasan platform</li>
                            </ul>

                            Tapi kalau tetap mau jualan di GrabFood/GoFood juga, <strong>BISA BERSAMAAN</strong>! Website ini sebagai channel tambahan untuk customer loyal Anda.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="mb-4">
                Siap Naikin Omset Restoran Anda?
            </h2>
            <p class="lead mb-4">
                Konsultasi GRATIS dulu gak papa! Jelasin bisnis Anda,<br>
                nanti kita bantu carikan solusi terbaik.
            </p>
            <a href="https://wa.me/6281234567890?text=Halo%20Situneo,%20mau%20konsultasi%20tentang%20Website%20Resto%20Online" class="btn btn-cta" target="_blank">
                <i class="bi bi-whatsapp me-2"></i>
                KONSULTASI GRATIS VIA WHATSAPP
            </a>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
