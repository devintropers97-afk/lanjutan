<?php
/**
 * SITUNEO DIGITAL - Solution: Company Profile
 * Website profil perusahaan untuk kredibilitas & kepercayaan
 */

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/security.php';
require_once __DIR__ . '/../../includes/session.php';
require_once __DIR__ . '/../../includes/functions.php';

$page_title = "Website Company Profile - SITUNEO DIGITAL";
$meta_description = "Website profil perusahaan profesional. Dari CV kecil jadi keliatan seperti perusahaan besar!";
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
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-solution::before {
            content: '🏢';
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
            line-height: 1.8;
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

        /* Use Cases */
        .use-cases {
            padding: 60px 0;
            background: var(--card-bg);
        }

        .use-case-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .use-case-box {
            background: rgba(255, 215, 0, 0.05);
            border: 2px solid rgba(255, 215, 0, 0.2);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .use-case-box:hover {
            border-color: var(--gold);
            transform: scale(1.05);
        }

        .use-case-box .icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .use-case-box h5 {
            color: var(--gold);
            font-weight: 700;
            margin-bottom: 15px;
        }

        /* FAQ Section */
        .faq-section {
            padding: 60px 0;
            background: var(--dark-bg);
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
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
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

            .comparison-grid, .features-grid, .pricing-grid, .use-case-grid {
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
            <h1 class="display-4 mb-4">🏢 Website Company Profile</h1>
            <h2 class="h3 mb-4">Dari CV Kecil Jadi Keliatan Kayak Perusahaan Multinasional!</h2>
            <p class="lead mb-4">
                Punya usaha tapi belum punya website? Client ragu-ragu karena gak percaya?<br>
                Website company profile bikin bisnis Anda <strong>TERLIHAT PROFESIONAL & TERPERCAYA!</strong>
            </p>
            <a href="https://wa.me/6281234567890?text=Halo%20Situneo,%20mau%20tanya%20tentang%20Website%20Company%20Profile" class="btn btn-cta" target="_blank">
                <i class="bi bi-whatsapp me-2"></i>
                TANYA LENGKAP VIA WHATSAPP
            </a>
        </div>
    </section>

    <!-- Comparison: Before vs After -->
    <section class="comparison-container">
        <div class="container">
            <h2 class="text-center mb-4">
                <span class="text-warning">BEDANYA PUNYA WEBSITE VS GAK PUNYA</span>
            </h2>
            <p class="text-center text-muted mb-5">Real story dari client kami:</p>

            <div class="comparison-grid">
                <!-- BEFORE -->
                <div class="comparison-card before" data-aos="fade-right">
                    <h3 class="text-danger mb-4">
                        <i class="bi bi-x-circle me-2"></i>
                        DULU (Tanpa Website)
                    </h3>

                    <div class="scenario">
                        <p><strong>📧 Email Tender Pemerintah:</strong></p>
                        <p>"Silakan submit proposal + lampirkan website perusahaan untuk verifikasi kredibilitas."</p>
                        <br>
                        <p><strong>😓 Anda:</strong></p>
                        <p>"Kami belum ada website, tapi bisa kirim company profile PDF?"</p>
                        <br>
                        <p><strong>❌ Panitia:</strong></p>
                        <p>"Maaf, persyaratan harus ada website aktif. Terima kasih."</p>
                    </div>

                    <div class="alert alert-danger mt-3">
                        <strong>😤 DITOLAK! Padahal qualified, cuma gara-gara gak ada website!</strong>
                    </div>

                    <ul class="list-unstyled mt-4">
                        <li>❌ Dianggap perusahaan kecil-kecilan</li>
                        <li>❌ Client ragu karena gak bisa cek portfolio online</li>
                        <li>❌ Kalah saing dengan kompetitor yang punya website</li>
                        <li>❌ Sulit dapat tender/project besar</li>
                        <li>❌ Gak bisa promosi online (Google, sosmed)</li>
                    </ul>
                </div>

                <!-- AFTER -->
                <div class="comparison-card after" data-aos="fade-left">
                    <h3 class="text-success mb-4">
                        <i class="bi bi-check-circle me-2"></i>
                        SEKARANG (Pakai Website)
                    </h3>

                    <div class="scenario">
                        <p><strong>📧 Email Tender Pemerintah:</strong></p>
                        <p>"Silakan submit proposal + lampirkan website perusahaan untuk verifikasi kredibilitas."</p>
                        <br>
                        <p><strong>😎 Anda:</strong></p>
                        <p>"Berikut website kami: www.perusahaan-anda.com<br>Lengkap dengan portfolio project yang sudah dikerjakan."</p>
                        <br>
                        <p><strong>✅ Panitia:</strong></p>
                        <p>"Website profesional, portfolio lengkap. Proposal diterima, silakan lanjut presentasi."</p>
                    </div>

                    <div class="alert alert-success mt-3">
                        <strong>🎉 LOLOS! Menang tender Rp 500 juta! Website cuma Rp 2.5 juta!</strong>
                    </div>

                    <ul class="list-unstyled mt-4">
                        <li>✅ Keliatan profesional & kredibel</li>
                        <li>✅ Client bisa cek portfolio & testimoni 24/7</li>
                        <li>✅ Bisa ikut tender pemerintah/swasta</li>
                        <li>✅ Mudah ditemukan di Google</li>
                        <li>✅ Percaya diri promosi ke client besar</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="features-section">
        <div class="container">
            <h2 class="text-center mb-4">
                <span class="text-warning">APA AJA YANG ADA DI WEBSITE COMPANY PROFILE?</span>
            </h2>
            <p class="text-center text-muted mb-5">Semua halaman ini SUDAH TERMASUK dalam paket:</p>

            <div class="features-grid">
                <?php
                $features = [
                    [
                        'icon' => 'bi-house-door',
                        'title' => 'Homepage / Beranda',
                        'desc' => 'Halaman depan dengan intro bisnis Anda. First impression harus WOW!'
                    ],
                    [
                        'icon' => 'bi-info-circle',
                        'title' => 'About Us / Tentang Kami',
                        'desc' => 'Cerita perusahaan, visi misi, nilai-nilai. Biar client kenal Anda lebih dalam.'
                    ],
                    [
                        'icon' => 'bi-briefcase',
                        'title' => 'Services / Layanan',
                        'desc' => 'Daftar jasa/produk yang Anda tawarkan. Dijelasin detail biar client paham.'
                    ],
                    [
                        'icon' => 'bi-images',
                        'title' => 'Portfolio / Project',
                        'desc' => 'Galeri project yang udah dikerjakan. BUKTI nyata Anda berpengalaman!'
                    ],
                    [
                        'icon' => 'bi-people',
                        'title' => 'Our Team / Tim Kami',
                        'desc' => 'Kenalkan tim Anda. Biar client tau siapa orang-orang dibalik perusahaan.'
                    ],
                    [
                        'icon' => 'bi-star',
                        'title' => 'Testimonials / Testimoni',
                        'desc' => 'Review dari client sebelumnya. Social proof bikin calon client lebih yakin!'
                    ],
                    [
                        'icon' => 'bi-newspaper',
                        'title' => 'Blog / Artikel',
                        'desc' => 'Tulis tips & artikel seputar bisnis Anda. Bagus buat SEO Google!'
                    ],
                    [
                        'icon' => 'bi-envelope',
                        'title' => 'Contact Us / Kontak',
                        'desc' => 'Form kontak, alamat, peta Google Maps, nomor telepon. Mudah dihubungi!'
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

    <!-- Use Cases -->
    <section class="use-cases">
        <div class="container">
            <h2 class="text-center mb-4">
                <span class="text-warning">COCOK UNTUK BISNIS APA AJA?</span>
            </h2>
            <p class="text-center text-muted mb-5">Website company profile ini fleksibel, bisa untuk:</p>

            <div class="use-case-grid">
                <?php
                $useCases = [
                    ['icon' => '🏗️', 'title' => 'Kontraktor & Developer', 'desc' => 'Pamer portfolio project perumahan/gedung'],
                    ['icon' => '⚙️', 'title' => 'Jasa Teknik & Konsultan', 'desc' => 'Tunjukkan expertise & sertifikasi'],
                    ['icon' => '🎨', 'title' => 'Advertising & Desain', 'desc' => 'Showcase karya kreatif Anda'],
                    ['icon' => '📦', 'title' => 'Distributor & Supplier', 'desc' => 'Katalog produk & daftar client'],
                    ['icon' => '🚚', 'title' => 'Logistik & Ekspedisi', 'desc' => 'Jaringan pengiriman & layanan'],
                    ['icon' => '💼', 'title' => 'Startup & UMKM', 'desc' => 'Bangun kredibilitas sejak awal'],
                ];

                foreach ($useCases as $useCase): ?>
                    <div class="use-case-box" data-aos="flip-up">
                        <div class="icon"><?= $useCase['icon'] ?></div>
                        <h5><?= $useCase['title'] ?></h5>
                        <p class="text-muted mb-0"><?= $useCase['desc'] ?></p>
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
                    <h3>CV Karya Mandiri - Kontraktor Jogja</h3>
                    <p class="text-muted">Dari tender Rp 50 juta jadi tender Rp 1 miliar!</p>
                </div>

                <div class="timeline">
                    <div class="timeline-item">
                        <h6>DULU (Tanpa Website):</h6>
                        <ul class="mb-0">
                            <li>Cuma nerima project dari kenalan</li>
                            <li>Project paling besar Rp 50 juta</li>
                            <li>Ditolak 5x tender pemerintah</li>
                            <li>Alasan: "Gak ada website perusahaan"</li>
                            <li>Omset mentok Rp 200 juta/tahun</li>
                        </ul>
                    </div>

                    <div class="timeline-item success">
                        <h6>SEKARANG (Pakai Website):</h6>
                        <ul class="mb-0">
                            <li>Website dengan 50+ portfolio project</li>
                            <li>Menang tender Dinsos Jogja Rp 1 M!</li>
                            <li>Rekrut 15 karyawan baru</li>
                            <li>Dapat client dari luar Jogja (Semarang, Solo)</li>
                            <li>Omset naik jadi Rp 3 miliar/tahun! 🚀</li>
                        </ul>
                    </div>
                </div>

                <blockquote class="mt-4 p-4 border-start border-5 border-warning bg-dark">
                    <p class="mb-2"><em>"Awalnya ragu, apa perlu website? Ternyata PERLU BANGET! Sekarang kalo ikut tender, panitia langsung cek website. Portfolio lengkap, testimonial ada, langsung percaya. Alhamdulillah sekarang omset naik 15x lipat..."</em></p>
                    <footer class="text-warning">— Pak Rudi, Owner CV Karya Mandiri</footer>
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
                        <span class="amount">150.000</span>
                        <span class="period">/bulan</span>
                    </div>

                    <ul class="pricing-features">
                        <li><i class="bi bi-check-circle-fill"></i> 5-7 halaman standar (Home, About, Services, Portfolio, Team, Testimonial, Contact)</li>
                        <li><i class="bi bi-check-circle-fill"></i> Responsive design (mobile-friendly)</li>
                        <li><i class="bi bi-check-circle-fill"></i> Gratis domain .my.id</li>
                        <li><i class="bi bi-check-circle-fill"></i> Hosting 3GB</li>
                        <li><i class="bi bi-check-circle-fill"></i> SSL Certificate (HTTPS aman)</li>
                        <li><i class="bi bi-check-circle-fill"></i> Google Maps integration</li>
                        <li><i class="bi bi-check-circle-fill"></i> Contact form + WhatsApp button</li>
                        <li><i class="bi bi-check-circle-fill"></i> Support teknis</li>
                    </ul>

                    <p class="mt-4 text-warning"><strong>COCOK UNTUK:</strong> Baru mulai, budget terbatas</p>

                    <a href="https://wa.me/6281234567890?text=Halo%20Situneo,%20mau%20pesan%20Paket%20SEWA%20Website%20Company%20Profile" class="btn btn-cta mt-3" target="_blank">
                        PESAN SEKARANG
                    </a>
                </div>

                <!-- Paket Beli -->
                <div class="pricing-card recommended" data-aos="flip-right">
                    <div class="pricing-badge">⭐ PALING POPULER</div>
                    <h3>🏆 PAKET BELI</h3>
                    <p class="text-muted">Bayar sekali, punya selamanya</p>

                    <div class="price">
                        <span class="currency">Rp</span>
                        <span class="amount">2.500.000</span>
                    </div>

                    <ul class="pricing-features">
                        <li><i class="bi bi-check-circle-fill"></i> Semua fitur paket sewa</li>
                        <li><i class="bi bi-check-circle-fill"></i> Domain GRATIS 1 tahun (.com/.id)</li>
                        <li><i class="bi bi-check-circle-fill"></i> Hosting 5GB</li>
                        <li><i class="bi bi-check-circle-fill"></i> Source code MILIK ANDA</li>
                        <li><i class="bi bi-check-circle-fill"></i> Unlimited revisi desain</li>
                        <li><i class="bi bi-check-circle-fill"></i> SEO optimization (Google ranking)</li>
                        <li><i class="bi bi-check-circle-fill"></i> Blog system (artikel/berita)</li>
                        <li><i class="bi bi-check-circle-fill"></i> Admin panel (edit konten sendiri)</li>
                        <li><i class="bi bi-check-circle-fill"></i> Free support 6 bulan</li>
                        <li><i class="bi bi-check-circle-fill"></i> Training penggunaan</li>
                    </ul>

                    <div class="alert alert-success mt-3">
                        <strong>💡 HEMAT Rp 300.000!</strong><br>
                        Kalau sewa 1 tahun = Rp 1.8jt. Beli cuma Rp 2.5jt, untung!
                    </div>

                    <p class="mt-4 text-warning"><strong>COCOK UNTUK:</strong> Bisnis serius, butuh kredibilitas tinggi</p>

                    <a href="https://wa.me/6281234567890?text=Halo%20Situneo,%20mau%20pesan%20Paket%20BELI%20Website%20Company%20Profile" class="btn btn-cta mt-3" target="_blank">
                        PESAN SEKARANG
                    </a>
                </div>
            </div>

            <p class="text-center text-muted mt-5">
                <i class="bi bi-info-circle me-2"></i>
                <strong>BONUS:</strong> Free maintenance 1 bulan setelah website live. Butuh tambahan fitur custom? Chat kami untuk quotation!
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
                            Berapa lama proses pembuatannya?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <strong>7-10 hari kerja</strong> website sudah jadi dan online! Yang kami butuhkan dari Anda:
                            <ul class="mt-3">
                                <li>Company profile (sejarah, visi misi, dll)</li>
                                <li>Daftar layanan/produk</li>
                                <li>Portfolio project (foto + deskripsi)</li>
                                <li>Foto tim (karyawan/owner)</li>
                                <li>Logo perusahaan (kalau ada)</li>
                                <li>Konten lain yang mau ditampilkan</li>
                            </ul>
                            Setelah semua data lengkap, kami langsung kerjakan dan update progress setiap hari!
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            <i class="bi bi-question-circle me-3"></i>
                            Apakah bisa edit konten website sendiri nanti?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <strong>BISA!</strong> (khusus paket BELI) Anda dapat <strong>admin panel</strong> untuk edit konten sendiri:
                            <ul class="mt-3">
                                <li>Update teks/deskripsi</li>
                                <li>Upload foto baru</li>
                                <li>Tambah/hapus portfolio</li>
                                <li>Posting artikel blog</li>
                                <li>Edit halaman About Us, Services, dll</li>
                            </ul>
                            Gampang banget, gak perlu ngerti coding! Tinggal klik-klik kayak pakai Microsoft Word.<br><br>

                            Untuk <strong>paket SEWA</strong>, update konten gratis 2x per bulan. Kalau lebih dari 2x, dikenakan biaya Rp 50.000/update.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            <i class="bi bi-question-circle me-3"></i>
                            Apakah website bisa muncul di Google?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <strong>BISA dan PASTI MUNCUL!</strong> Kami sudah include <strong>SEO optimization</strong>:
                            <ul class="mt-3">
                                <li>Submit ke Google Search Console</li>
                                <li>Meta tags optimization</li>
                                <li>Sitemap XML</li>
                                <li>Page speed optimization</li>
                                <li>Mobile-friendly (Google prioritaskan ini!)</li>
                            </ul>

                            Biasanya <strong>1-2 minggu</strong> setelah website online, sudah mulai muncul di Google kalau orang search nama perusahaan Anda.<br><br>

                            Mau ranking lebih tinggi? Kami juga ada layanan <strong>Google Ads</strong> untuk langsung muncul di page 1 (berbayar). Chat kami untuk info lebih lanjut!
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                            <i class="bi bi-question-circle me-3"></i>
                            Kalau domain & hosting habis, gimana?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <strong>Paket SEWA:</strong> Kami yang urus perpanjangan domain & hosting. Anda cuma bayar Rp 150rb/bulan terus, gak ada biaya tambahan.<br><br>

                            <strong>Paket BELI:</strong> Domain & hosting gratis 1 tahun pertama. Setelah itu:
                            <ul class="mt-3">
                                <li>Domain .my.id: Rp 50rb/tahun</li>
                                <li>Domain .com: Rp 150rb/tahun</li>
                                <li>Domain .id: Rp 250rb/tahun</li>
                                <li>Hosting 5GB: Rp 300rb/tahun</li>
                            </ul>

                            Kami akan remind 1 bulan sebelum expired, jadi Anda gak bakal lupa perpanjang!
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                            <i class="bi bi-question-circle me-3"></i>
                            Beda dengan jasa freelancer di marketplace lain?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Bagus Anda tanya! Perbedaannya:

                            <table class="table table-bordered mt-3 text-white">
                                <thead>
                                    <tr>
                                        <th>Aspek</th>
                                        <th class="text-warning">SITUNEO DIGITAL</th>
                                        <th class="text-danger">Freelancer Lain</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Revisi</td>
                                        <td>✅ Unlimited</td>
                                        <td>❌ Max 2-3x</td>
                                    </tr>
                                    <tr>
                                        <td>Support</td>
                                        <td>✅ 6 bulan</td>
                                        <td>❌ Selesai bayar, selesai</td>
                                    </tr>
                                    <tr>
                                        <td>Hosting</td>
                                        <td>✅ Kami siapin</td>
                                        <td>❌ Anda cari sendiri</td>
                                    </tr>
                                    <tr>
                                        <td>Training</td>
                                        <td>✅ Ada</td>
                                        <td>❌ Gak ada</td>
                                    </tr>
                                    <tr>
                                        <td>Garansi</td>
                                        <td>✅ Uang kembali jika tidak sesuai</td>
                                        <td>❌ No warranty</td>
                                    </tr>
                                </tbody>
                            </table>

                            Kami fokus <strong>long-term partnership</strong>, bukan cuma jual putus!
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
                Siap Bikin Bisnis Anda Terlihat Profesional?
            </h2>
            <p class="lead mb-4">
                Konsultasi GRATIS dulu gak papa! Jelasin bisnis Anda,<br>
                nanti kita bantu design website yang sesuai brand Anda.
            </p>
            <a href="https://wa.me/6281234567890?text=Halo%20Situneo,%20mau%20konsultasi%20tentang%20Website%20Company%20Profile" class="btn btn-cta" target="_blank">
                <i class="bi bi-whatsapp me-2"></i>
                KONSULTASI GRATIS VIA WHATSAPP
            </a>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
