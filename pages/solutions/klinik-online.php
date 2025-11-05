<?php
/**
 * SITUNEO DIGITAL - Solution: Klinik Online
 * Website untuk Klinik, Praktek Dokter, Apotek
 */

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/security.php';
require_once __DIR__ . '/../../includes/session.php';
require_once __DIR__ . '/../../includes/functions.php';

$page_title = "Website Klinik Online - SITUNEO DIGITAL";
$meta_description = "Website klinik dengan sistem pendaftaran online. Pasien daftar dari rumah, gak perlu antri!";
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
            --medical-blue: #0ea5e9;
            --medical-green: #10b981;
        }

        body {
            background: var(--dark-bg);
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Hero Section */
        .hero-solution {
            background: linear-gradient(135deg, #0c4a6e 0%, #0ea5e9 100%);
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-solution::before {
            content: '🏥';
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
            background: rgba(14, 165, 233, 0.1);
            border: 2px solid var(--medical-blue);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            position: relative;
            transition: all 0.3s ease;
        }

        .workflow-step:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(14, 165, 233, 0.3);
        }

        .step-badge {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--medical-blue);
            color: #fff;
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
            color: var(--medical-blue);
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
            border-color: #10b981;
            background: rgba(16, 185, 129, 0.1);
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
            background: rgba(14, 165, 233, 0.1);
            border: 2px solid rgba(14, 165, 233, 0.3);
            border-radius: 15px;
            padding: 30px;
            transition: all 0.3s ease;
        }

        .feature-box:hover {
            border-color: var(--medical-blue);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(14, 165, 233, 0.2);
        }

        .feature-box i {
            font-size: 3rem;
            color: var(--medical-blue);
            margin-bottom: 20px;
        }

        .feature-box h5 {
            color: var(--medical-blue);
            font-weight: 700;
            margin-bottom: 15px;
        }

        /* Success Story */
        .success-story {
            padding: 60px 0;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }

        .story-card {
            background: rgba(14, 165, 233, 0.1);
            border: 3px solid var(--medical-blue);
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
            color: var(--medical-blue);
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
            border-left-color: #10b981;
        }

        .timeline-item h6 {
            color: var(--medical-blue);
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
            color: var(--medical-blue);
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
            border: 3px solid rgba(14, 165, 233, 0.3);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .pricing-card:hover {
            border-color: var(--medical-blue);
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(14, 165, 233, 0.3);
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
            color: var(--medical-blue);
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
            color: var(--medical-blue);
            margin-right: 10px;
        }

        /* FAQ Section */
        .faq-section {
            padding: 60px 0;
            background: var(--card-bg);
        }

        .accordion-item {
            background: rgba(14, 165, 233, 0.1);
            border: 2px solid rgba(14, 165, 233, 0.2);
            margin-bottom: 15px;
            border-radius: 10px;
            overflow: hidden;
        }

        .accordion-button {
            background: rgba(14, 165, 233, 0.15);
            color: #fff;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 20px;
        }

        .accordion-button:not(.collapsed) {
            background: var(--medical-blue);
            color: #fff;
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
            background: linear-gradient(135deg, #0c4a6e 0%, #0ea5e9 100%);
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
            <h1 class="display-4 mb-4">🏥 Website Klinik Online</h1>
            <h2 class="h3 mb-4">Pasien Daftar Dari Rumah, Gak Perlu Antri Panjang!</h2>
            <p class="lead mb-4">
                Punya klinik, praktek dokter, atau apotek? Sekarang pasien bisa daftar online!<br>
                Lihat jadwal dokter, pilih jam, daftar. <strong>SIMPLE & EFISIEN!</strong>
            </p>
            <a href="https://wa.me/6281234567890?text=Halo%20Situneo,%20mau%20tanya%20tentang%20Website%20Klinik%20Online" class="btn btn-cta" target="_blank">
                <i class="bi bi-whatsapp me-2"></i>
                TANYA LENGKAP VIA WHATSAPP
            </a>
        </div>
    </section>

    <!-- Workflow Section -->
    <section class="workflow-container">
        <div class="container">
            <h2 class="text-center mb-4">
                <span class="text-warning">CARA KERJANYA SIMPLE!</span>
            </h2>
            <p class="text-center text-muted mb-5">4 langkah dari daftar sampai ketemu dokter:</p>

            <div class="workflow-grid">
                <div class="workflow-step" data-aos="fade-up">
                    <div class="step-badge">1</div>
                    <div class="step-icon">📱</div>
                    <h5>Pasien Buka Website</h5>
                    <p class="text-muted">Lihat jadwal dokter, poli apa aja, jam praktik. Semuanya jelas!</p>
                </div>

                <div class="workflow-step" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-badge">2</div>
                    <div class="step-icon">📋</div>
                    <h5>Daftar Online</h5>
                    <p class="text-muted">Isi form, pilih dokter, pilih jam. Gak perlu datang cuma buat daftar!</p>
                </div>

                <div class="workflow-step" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-badge">3</div>
                    <div class="step-icon">💬</div>
                    <h5>Dapat Nomor Antrian</h5>
                    <p class="text-muted">Otomatis dapat nomor antrian + estimasi waktu periksa. Via WhatsApp juga!</p>
                </div>

                <div class="workflow-step" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-badge">4</div>
                    <div class="step-icon">👨‍⚕️</div>
                    <h5>Datang & Langsung Periksa</h5>
                    <p class="text-muted">Gak perlu antri lama, langsung periksa sesuai jam yang dipilih!</p>
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
            <p class="text-center text-muted mb-5">Lihat perbedaan nyata:</p>

            <div class="comparison-grid">
                <!-- BEFORE -->
                <div class="comparison-card before" data-aos="fade-right">
                    <h3 class="text-danger mb-4">
                        <i class="bi bi-x-circle me-2"></i>
                        DULU (Tanpa Website)
                    </h3>

                    <div class="scenario">
                        <p><strong>05:00</strong> - Pasien datang, ambil nomor antrian</p>
                        <p><strong>05:15</strong> - Ruang tunggu sudah PENUH</p>
                        <p><strong>06:00</strong> - Resepsionis telepon terus: "Jam berapa dokternya?"</p>
                        <p><strong>07:00</strong> - Dokter baru datang</p>
                        <p><strong>07:30</strong> - Pasien nomer 1 baru dipanggil</p>
                        <p><strong>09:00</strong> - Pasien nomer 10 mulai marah: "Lama banget!"</p>
                        <p><strong>12:00</strong> - Masih antri 20 orang lagi...</p>
                    </div>

                    <div class="alert alert-danger mt-3">
                        <strong>😤 CHAOS! Pasien marah, resepsionis stress, dokter kecapekan!</strong>
                    </div>

                    <ul class="list-unstyled mt-4">
                        <li>❌ Antrian gak teratur, siapa duluan siapa belakangan</li>
                        <li>❌ Pasien nanya-nanya mulu: "Udah nomer berapa?"</li>
                        <li>❌ Resepsionis catat manual (sering lupa)</li>
                        <li>❌ Pasien batal tiba-tiba (waktu terbuang)</li>
                        <li>❌ Ruang tunggu penuh & berisik</li>
                    </ul>
                </div>

                <!-- AFTER -->
                <div class="comparison-card after" data-aos="fade-left">
                    <h3 class="text-success mb-4">
                        <i class="bi bi-check-circle me-2"></i>
                        SEKARANG (Pakai Website)
                    </h3>

                    <div class="scenario">
                        <p><strong>Malam sebelumnya</strong> - Pasien daftar online dari rumah</p>
                        <p><strong>08:45</strong> - Pasien baru datang (15 menit sebelum jadwal)</p>
                        <p><strong>09:00</strong> - Langsung dipanggil sesuai jadwal</p>
                        <p><strong>09:20</strong> - Selesai periksa, langsung pulang</p>
                        <p><strong>09:25</strong> - Pasien berikutnya masuk (tepat waktu!)</p>
                        <br>
                        <p class="text-success"><strong>✅ Gak ada antrian chaos!</strong></p>
                        <p class="text-success"><strong>✅ Semua pasien dapat giliran tepat waktu!</strong></p>
                    </div>

                    <div class="alert alert-success mt-3">
                        <strong>😊 TENANG! Pasien puas, resepsionis santai, dokter fokus periksa!</strong>
                    </div>

                    <ul class="list-unstyled mt-4">
                        <li>✅ Jadwal teratur, gak ada berebutan</li>
                        <li>✅ Pasien tau jadwalnya kapan (via WA)</li>
                        <li>✅ Resepsionis tinggal konfirmasi (data udah ada)</li>
                        <li>✅ Ruang tunggu gak penuh sesak</li>
                        <li>✅ Pasien happy, kasih review 5 ⭐!</li>
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
                        'icon' => 'bi-calendar-check',
                        'title' => 'Pendaftaran Online',
                        'desc' => 'Pasien daftar sendiri via website. Data langsung masuk ke sistem klinik Anda.'
                    ],
                    [
                        'icon' => 'bi-person-badge',
                        'title' => 'Jadwal Dokter',
                        'desc' => 'Tampilkan jadwal praktik dokter per hari. Pasien bisa pilih dokter & jam yang tersedia.'
                    ],
                    [
                        'icon' => 'bi-list-ol',
                        'title' => 'Manajemen Antrian',
                        'desc' => 'Sistem antrian otomatis. Pasien tau nomor antrian & estimasi waktu periksa.'
                    ],
                    [
                        'icon' => 'bi-whatsapp',
                        'title' => 'Notifikasi WhatsApp',
                        'desc' => 'Konfirmasi pendaftaran, reminder H-1, notifikasi giliran - semua via WA!'
                    ],
                    [
                        'icon' => 'bi-file-medical',
                        'title' => 'Rekam Medis Digital',
                        'desc' => 'Simpan riwayat pemeriksaan pasien. Gak perlu cari-cari kartu medis lagi!'
                    ],
                    [
                        'icon' => 'bi-cash-stack',
                        'title' => 'Informasi Biaya',
                        'desc' => 'Daftar biaya konsultasi, tindakan, obat. Pasien tau biaya dari awal.'
                    ],
                    [
                        'icon' => 'bi-geo-alt',
                        'title' => 'Lokasi & Kontak',
                        'desc' => 'Google Maps, nomor telepon, jam operasional. Pasien baru gak bakal nyasar!'
                    ],
                    [
                        'icon' => 'bi-graph-up',
                        'title' => 'Laporan Pasien',
                        'desc' => 'Dashboard admin untuk lihat jumlah pendaftaran, poli terlaris, dll.'
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
                    <h3>Klinik Sehat Keluarga - Bandung</h3>
                    <p class="text-muted">Dari antrian chaos jadi klinik modern & teratur!</p>
                </div>

                <div class="timeline">
                    <div class="timeline-item">
                        <h6>DULU (Tanpa Website):</h6>
                        <ul class="mb-0">
                            <li>Antrian mulai jam 5 pagi (klinik buka jam 8!)</li>
                            <li>Ruang tunggu penuh 50+ orang</li>
                            <li>Resepsionis kelimpungan catat manual</li>
                            <li>Pasien komplain di Google Review: "Lama banget!"</li>
                            <li>Rating Google cuma 3.2 ⭐</li>
                        </ul>
                    </div>

                    <div class="timeline-item success">
                        <h6>SEKARANG (Pakai Website):</h6>
                        <ul class="mb-0">
                            <li>Pasien daftar online, datang sesuai jadwal</li>
                            <li>Ruang tunggu teratur (max 10 orang)</li>
                            <li>Resepsionis santai, tinggal konfirmasi</li>
                            <li>Review berubah: "Klinik modern, gak antri!"</li>
                            <li>Rating naik jadi 4.8 ⭐ - Pasien naik 40%! 🚀</li>
                        </ul>
                    </div>
                </div>

                <blockquote class="mt-4 p-4 border-start border-5 border-warning bg-dark">
                    <p class="mb-2"><em>"Awalnya ragu, apa pasien bisa pakai website? Ternyata BISA! Bahkan yang ibu-ibu usia 50+ juga lancar daftar online. Sekarang klinik kami keliatan lebih profesional & modern. Pasien lebih puas, rating naik, omset ikut naik!"</em></p>
                    <footer class="text-warning">— Dr. Andi, Owner Klinik Sehat Keluarga</footer>
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
                        <span class="amount">300.000</span>
                        <span class="period">/bulan</span>
                    </div>

                    <ul class="pricing-features">
                        <li><i class="bi bi-check-circle-fill"></i> Website pendaftaran online lengkap</li>
                        <li><i class="bi bi-check-circle-fill"></i> Manajemen jadwal dokter</li>
                        <li><i class="bi bi-check-circle-fill"></i> Sistem antrian otomatis</li>
                        <li><i class="bi bi-check-circle-fill"></i> Notifikasi WhatsApp</li>
                        <li><i class="bi bi-check-circle-fill"></i> Rekam medis digital sederhana</li>
                        <li><i class="bi bi-check-circle-fill"></i> Gratis domain .my.id</li>
                        <li><i class="bi bi-check-circle-fill"></i> Hosting 5GB</li>
                        <li><i class="bi bi-check-circle-fill"></i> Support teknis</li>
                    </ul>

                    <p class="mt-4 text-warning"><strong>COCOK UNTUK:</strong> Praktek dokter/bidan, klinik kecil</p>

                    <a href="https://wa.me/6281234567890?text=Halo%20Situneo,%20mau%20pesan%20Paket%20SEWA%20Website%20Klinik" class="btn btn-cta mt-3" target="_blank">
                        PESAN SEKARANG
                    </a>
                </div>

                <!-- Paket Beli -->
                <div class="pricing-card recommended" data-aos="flip-right">
                    <div class="pricing-badge">⭐ PALING LENGKAP</div>
                    <h3>🏆 PAKET BELI</h3>
                    <p class="text-muted">Bayar sekali, punya selamanya</p>

                    <div class="price">
                        <span class="currency">Rp</span>
                        <span class="amount">4.500.000</span>
                    </div>

                    <ul class="pricing-features">
                        <li><i class="bi bi-check-circle-fill"></i> Semua fitur paket sewa</li>
                        <li><i class="bi bi-check-circle-fill"></i> Domain GRATIS 1 tahun (.com/.id)</li>
                        <li><i class="bi bi-check-circle-fill"></i> Hosting 10GB</li>
                        <li><i class="bi bi-check-circle-fill"></i> Source code MILIK ANDA</li>
                        <li><i class="bi bi-check-circle-fill"></i> Rekam medis lengkap + riwayat</li>
                        <li><i class="bi bi-check-circle-fill"></i> Multi-dokter & multi-poli</li>
                        <li><i class="bi bi-check-circle-fill"></i> Laporan & statistik pasien</li>
                        <li><i class="bi bi-check-circle-fill"></i> Admin panel (edit sendiri)</li>
                        <li><i class="bi bi-check-circle-fill"></i> Free support 6 bulan</li>
                        <li><i class="bi bi-check-circle-fill"></i> Training untuk staff</li>
                    </ul>

                    <div class="alert alert-success mt-3">
                        <strong>💡 HEMAT Rp 900.000!</strong><br>
                        Kalau sewa 1 tahun = Rp 3.6jt. Beli cuma Rp 4.5jt, dapat lebih banyak!
                    </div>

                    <p class="mt-4 text-warning"><strong>COCOK UNTUK:</strong> Klinik sedang-besar, rumah sakit kecil</p>

                    <a href="https://wa.me/6281234567890?text=Halo%20Situneo,%20mau%20pesan%20Paket%20BELI%20Website%20Klinik" class="btn btn-cta mt-3" target="_blank">
                        PESAN SEKARANG
                    </a>
                </div>
            </div>

            <p class="text-center text-muted mt-5">
                <i class="bi bi-info-circle me-2"></i>
                <strong>CATATAN:</strong> Harga belum termasuk integrasi dengan alat medis khusus (ECG, lab, dll).
                Untuk kebutuhan custom, hubungi kami via WhatsApp!
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
                            Apakah pasien perlu registrasi/login?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Ada <strong>2 pilihan</strong>:
                            <ol class="mt-3">
                                <li><strong>Registrasi sekali (recommended):</strong> Pasien daftar akun dengan NIK/No. KTP. Data tersimpan, next time tinggal login & daftar lagi. Lebih praktis!</li>
                                <li><strong>Tanpa registrasi:</strong> Pasien bisa langsung daftar isi form. Tapi setiap kali harus isi data dari awal lagi.</li>
                            </ol>

                            Kebanyakan klinik pilih opsi 1 karena lebih efisien dan data pasien tersimpan rapi.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            <i class="bi bi-question-circle me-3"></i>
                            Bagaimana kalau pasien datang langsung tanpa daftar online?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <strong>BISA TETAP DILAYANI!</strong> Sistem ini fleksibel:
                            <ul class="mt-3">
                                <li>Pasien walk-in bisa langsung daftar di resepsionis</li>
                                <li>Resepsionis input data via admin panel</li>
                                <li>Sistem tetap kasih nomor antrian otomatis</li>
                                <li>Jadi pasien online + offline semua terakomodasi</li>
                            </ul>

                            Biasanya setelah 1-2 bulan, 70-80% pasien sudah terbiasa daftar online sendiri!
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            <i class="bi bi-question-circle me-3"></i>
                            Apakah bisa integrasi dengan BPJS?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <strong>Untuk paket standar:</strong> Belum ada integrasi langsung dengan sistem BPJS. Tapi pasien bisa input nomor BPJS di form pendaftaran, dan resepsionis tinggal input ke sistem BPJS seperti biasa.<br><br>

                            <strong>Integrasi BPJS penuh:</strong> Bisa dibuat custom dengan biaya tambahan sekitar Rp 5-8 juta (tergantung kompleksitas). Ini termasuk:
                            <ul class="mt-3">
                                <li>Bridging ke PCare BPJS</li>
                                <li>Sinkronisasi data peserta</li>
                                <li>Klaim otomatis</li>
                            </ul>

                            Chat kami untuk diskusi lebih detail tentang integrasi BPJS!
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                            <i class="bi bi-question-circle me-3"></i>
                            Berapa lama proses pembuatannya?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <strong>10-14 hari kerja</strong> website sudah jadi dan bisa dipakai! Timeline:
                            <ul class="mt-3">
                                <li><strong>Hari 1-2:</strong> Survei kebutuhan, pengumpulan data (jadwal dokter, poli, tarif, dll)</li>
                                <li><strong>Hari 3-8:</strong> Development & design</li>
                                <li><strong>Hari 9-10:</strong> Testing & revisi</li>
                                <li><strong>Hari 11-12:</strong> Training staff (resepsionis, admin)</li>
                                <li><strong>Hari 13-14:</strong> Go live & monitoring</li>
                            </ul>

                            Kami juga kasih <strong>soft launching 1 minggu</strong> (pasien bisa daftar online, tapi sistem lama tetap jalan) biar staff terbiasa dulu.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                            <i class="bi bi-question-circle me-3"></i>
                            Apakah data pasien aman?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <strong>100% AMAN!</strong> Kami sangat serius soal keamanan data kesehatan:
                            <ul class="mt-3">
                                <li>✅ <strong>SSL Certificate (HTTPS):</strong> Data terenkripsi saat transmisi</li>
                                <li>✅ <strong>Database Encryption:</strong> Data sensitif di-encrypt</li>
                                <li>✅ <strong>Role-based Access:</strong> Hanya staff berwenang yang bisa akses</li>
                                <li>✅ <strong>Backup Harian:</strong> Data di-backup setiap hari otomatis</li>
                                <li>✅ <strong>Audit Log:</strong> Semua akses data tercatat (siapa, kapan, apa)</li>
                            </ul>

                            Kami juga bisa tanda tangan <strong>NDA (Non-Disclosure Agreement)</strong> untuk jaminan kerahasiaan data pasien.
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
                Siap Modernisasi Klinik Anda?
            </h2>
            <p class="lead mb-4">
                Konsultasi GRATIS dulu gak papa! Jelasin kebutuhan klinik Anda,<br>
                nanti kita bantu design sistem yang sesuai.
            </p>
            <a href="https://wa.me/6281234567890?text=Halo%20Situneo,%20mau%20konsultasi%20tentang%20Website%20Klinik%20Online" class="btn btn-cta" target="_blank">
                <i class="bi bi-whatsapp me-2"></i>
                KONSULTASI GRATIS VIA WHATSAPP
            </a>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
