<?php
/**
 * KATALOG LAYANAN LENGKAP SITUNEO DIGITAL
 * 232+ Layanan Profesional
 */

// Include database config (optional, for dynamic data later)
// require_once __DIR__ . '/../config/database.php';

$pageTitle = "Katalog Layanan Lengkap - 232+ Layanan Digital";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?> - SITUNEO DIGITAL</title>
    <meta name="description" content="Katalog lengkap 232+ layanan digital SITUNEO: Website, Marketing, AI, Branding, Konten, Analytics, Legal, dan lebih banyak lagi!">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/services-catalog.css">

    <style>
        :root {
            --primary-blue: #1E5C99;
            --dark-blue: #0F3057;
            --gold: #FFB400;
            --bright-gold: #FFD700;
            --white: #ffffff;
            --text-light: #e9ecef;
            --gradient-primary: linear-gradient(135deg, #1E5C99 0%, #0F3057 100%);
            --gradient-gold: linear-gradient(135deg, #FFD700 0%, #FFB400 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark-blue);
            color: var(--white);
            overflow-x: hidden;
        }

        /* Header */
        .catalog-header {
            background: var(--gradient-primary);
            padding: 100px 0 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .catalog-header::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,180,0,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .catalog-title {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 900;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .catalog-subtitle {
            font-size: 1.3rem;
            color: var(--text-light);
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .catalog-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 2rem;
            position: relative;
            z-index: 1;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            color: var(--gold);
            line-height: 1;
        }

        .stat-label {
            font-size: 1rem;
            color: var(--text-light);
            margin-top: 0.5rem;
        }

        /* Search & Filter */
        .search-filter-section {
            background: rgba(30, 92, 153, 0.2);
            padding: 2rem 0;
            border-bottom: 1px solid rgba(255,180,0,0.2);
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(10px);
        }

        .search-box {
            position: relative;
            max-width: 600px;
            margin: 0 auto 1.5rem;
        }

        .search-box input {
            width: 100%;
            padding: 15px 50px 15px 20px;
            border-radius: 50px;
            border: 2px solid var(--gold);
            background: rgba(255,255,255,0.1);
            color: var(--white);
            font-size: 1rem;
        }

        .search-box input::placeholder {
            color: rgba(255,255,255,0.5);
        }

        .search-box i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gold);
            font-size: 1.2rem;
        }

        .filter-tabs {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .filter-tab {
            padding: 10px 25px;
            border-radius: 50px;
            background: rgba(255,180,0,0.1);
            border: 2px solid rgba(255,180,0,0.3);
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .filter-tab:hover, .filter-tab.active {
            background: var(--gradient-gold);
            color: var(--dark-blue);
            border-color: var(--gold);
            transform: translateY(-2px);
        }

        /* Divisi Section */
        .divisi-section {
            padding: 3rem 0;
            border-bottom: 1px solid rgba(255,180,0,0.1);
        }

        .divisi-header {
            background: linear-gradient(135deg, rgba(30, 92, 153, 0.3) 0%, rgba(15, 48, 87, 0.4) 100%);
            border: 2px solid var(--gold);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .divisi-header:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(255,180,0,0.3);
        }

        .divisi-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--gold);
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .divisi-subtitle {
            color: var(--text-light);
            margin: 0.5rem 0 0 0;
            font-size: 1.1rem;
        }

        .divisi-count {
            background: var(--gradient-gold);
            color: var(--dark-blue);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 700;
        }

        /* Service Tables */
        .services-table {
            margin-bottom: 2rem;
        }

        .service-category {
            background: rgba(30, 92, 153, 0.2);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .category-title {
            color: var(--gold);
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: var(--gradient-gold);
            color: var(--dark-blue);
            padding: 15px;
            text-align: left;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        td {
            background: rgba(255,255,255,0.05);
            padding: 15px;
            border-bottom: 1px solid rgba(255,180,0,0.1);
            color: var(--text-light);
        }

        tr:hover td {
            background: rgba(255,180,0,0.1);
        }

        .price-col {
            color: var(--gold);
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-sistem {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-sekali {
            background: #28a745;
            color: white;
        }

        .badge-bulan {
            background: #007bff;
            color: white;
        }

        /* Floating Action Buttons */
        .floating-actions {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 999;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .float-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .float-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.4);
        }

        .btn-whatsapp {
            background: #25D366;
            color: white;
        }

        .btn-download {
            background: var(--gradient-gold);
            color: var(--dark-blue);
        }

        .btn-top {
            background: rgba(255,180,0,0.2);
            border: 2px solid var(--gold);
            color: var(--gold);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .catalog-stats {
                gap: 1.5rem;
            }

            .stat-number {
                font-size: 2rem;
            }

            .filter-tabs {
                gap: 0.5rem;
            }

            .filter-tab {
                padding: 8px 15px;
                font-size: 0.8rem;
            }

            .divisi-title {
                font-size: 1.5rem;
            }

            table {
                font-size: 0.85rem;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="catalog-header">
        <div class="container">
            <h1 class="catalog-title">📚 KATALOG LAYANAN LENGKAP</h1>
            <p class="catalog-subtitle">SITUNEO DIGITAL - Digital Harmony for a Modern World</p>

            <div class="catalog-stats">
                <div class="stat-item">
                    <div class="stat-number">232+</div>
                    <div class="stat-label">Layanan Profesional</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10</div>
                    <div class="stat-label">Divisi Spesialisasi</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">5+</div>
                    <div class="stat-label">Tahun Pengalaman</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Klien Puas</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="search-filter-section">
        <div class="container">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="🔍 Cari layanan... (contoh: website, SEO, chatbot)">
                <i class="bi bi-search"></i>
            </div>

            <div class="filter-tabs">
                <button class="filter-tab active" data-filter="all">Semua Divisi</button>
                <button class="filter-tab" data-filter="divisi-1">Website</button>
                <button class="filter-tab" data-filter="divisi-2">Marketing</button>
                <button class="filter-tab" data-filter="divisi-3">AI & Automation</button>
                <button class="filter-tab" data-filter="divisi-4">Branding</button>
                <button class="filter-tab" data-filter="divisi-5">Konten</button>
                <button class="filter-tab" data-filter="divisi-6">Analytics</button>
                <button class="filter-tab" data-filter="divisi-7">Legal & Infra</button>
                <button class="filter-tab" data-filter="divisi-8">Customer</button>
                <button class="filter-tab" data-filter="divisi-9">Training</button>
                <button class="filter-tab" data-filter="divisi-10">Partnership</button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container" style="padding: 3rem 0;">

        <!-- DIVISI 1: WEBSITE & PENGEMBANGAN SISTEM -->
        <div class="divisi-section" id="divisi-1" data-divisi="divisi-1">
            <div class="divisi-header">
                <h2 class="divisi-title">
                    <span>🌐 DIVISI 1: WEBSITE & PENGEMBANGAN SISTEM</span>
                    <span class="divisi-count">35 Layanan</span>
                </h2>
                <p class="divisi-subtitle">Website profesional, sistem web app, dan solusi digital custom</p>
            </div>

            <!-- Jenis Website -->
            <div class="service-category">
                <h3 class="category-title">
                    <i class="bi bi-globe2"></i>
                    Jenis-Jenis Website (10 Types)
                </h3>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 30%">Jenis Website</th>
                                <th style="width: 15%">Setup</th>
                                <th style="width: 15%">Bulanan</th>
                                <th style="width: 10%">Waktu</th>
                                <th style="width: 25%">Cocok Untuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><strong>Landing Page / Profil Perusahaan</strong><br><small>1 halaman fokus konversi</small></td>
                                <td class="price-col">Rp 350.000<br><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td class="price-col">Rp 150.000<br><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>1-3 hari</td>
                                <td>UMKM, Freelancer, Produk Tunggal</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><strong>Website Multi Halaman</strong><br><small>4-6 halaman profesional</small></td>
                                <td class="price-col">Rp 750.000<br><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td class="price-col">Rp 250.000<br><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>3-7 hari</td>
                                <td>Perusahaan, Agency, Bisnis Jasa</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><strong>Website Toko Online (E-Commerce)</strong><br><small>Katalog + keranjang + payment</small></td>
                                <td class="price-col">Rp 1.500.000<br><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td class="price-col">Rp 350.000<br><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>7-10 hari</td>
                                <td>Online Shop, Retail, Brand Fashion</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><strong>Website Custom / Web App</strong><br><small>CRM, ERP, POS, Portal custom</small></td>
                                <td class="price-col">Rp 2.000.000+<br><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td class="price-col">Rp 500rb-1jt<br><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>2-4 minggu</td>
                                <td>Enterprise, Startup Tech, Korporasi</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><strong>Website Sekolah / Lembaga</strong><br><small>Profil + PPDB + data siswa</small></td>
                                <td class="price-col">Rp 1.200.000<br><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td class="price-col">Rp 400.000<br><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>7-10 hari</td>
                                <td>Sekolah, Madrasah, Kampus, Yayasan</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td><strong>Portfolio / Personal Branding</strong><br><small>Showcase karya profesional</small></td>
                                <td class="price-col">Rp 700.000<br><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td class="price-col">Rp 200.000<br><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>3-5 hari</td>
                                <td>Desainer, Fotografer, Influencer</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td><strong>Website AI & Otomasi</strong><br><small>Chatbot AI + CRM + Analytics</small></td>
                                <td class="price-col">Rp 2.500.000<br><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td class="price-col">Rp 450.000<br><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>10-14 hari</td>
                                <td>Bisnis Digital, Startup Modern</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td><strong>Portal Berita / Majalah Online</strong><br><small>Multi-author + kategori + iklan</small></td>
                                <td class="price-col">Rp 1.800.000<br><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td class="price-col">Rp 400.000<br><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>7-10 hari</td>
                                <td>Media Online, Komunitas, Blog Besar</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td><strong>Website Pemerintahan / Desa Digital</strong><br><small>Pelayanan publik + data desa</small></td>
                                <td class="price-col">Rp 2.000.000<br><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td class="price-col">Rp 500.000<br><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>10-14 hari</td>
                                <td>Desa, Kelurahan, Instansi Pemda</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td><strong>Microsite / Link-in-Bio</strong><br><small>Mini site custom seperti Linktree</small></td>
                                <td class="price-col">Rp 300.000<br><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td class="price-col">Rp 100.000<br><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>1-2 hari</td>
                                <td>Influencer, Creator, Online Shop IG</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Add-On Website -->
            <div class="service-category">
                <h3 class="category-title">
                    <i class="bi bi-puzzle"></i>
                    Add-On Website (20 Items)
                </h3>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 45%">Add-On</th>
                                <th style="width: 20%">Harga</th>
                                <th style="width: 15%">Sistem</th>
                                <th style="width: 15%">Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><strong>Optimasi Kecepatan Website</strong><br><small>Loading 2-3 detik, Google speed 90+</small></td>
                                <td class="price-col">Rp 200.000</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Performa</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><strong>SSL & Firewall Premium</strong><br><small>Anti-malware, brute force protection</small></td>
                                <td class="price-col">Rp 150.000</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Keamanan</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><strong>Backup Otomatis Harian</strong><br><small>Backup data otomatis setiap hari</small></td>
                                <td class="price-col">Rp 150.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>Keamanan</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><strong>SEO Premium Specialist</strong><br><small>Riset keyword, backlink, SEO on/off-page</small></td>
                                <td class="price-col">Rp 600.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>Marketing</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><strong>Google My Business Optimasi</strong><br><small>Muncul di Google Maps + review</small></td>
                                <td class="price-col">Rp 250.000</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Marketing</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td><strong>Laporan Analitik Bulanan</strong><br><small>Laporan visitor, konversi, keyword</small></td>
                                <td class="price-col">Rp 150.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>Analytics</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td><strong>Payment Gateway Integration</strong><br><small>Midtrans, Xendit, Tripay, dll</small></td>
                                <td class="price-col">Rp 250.000</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>E-Commerce</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td><strong>Chatbot AI WhatsApp</strong><br><small>Auto-reply 24/7, AI conversation</small></td>
                                <td class="price-col">Rp 200.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>AI & Automation</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td><strong>Chatbot Website</strong><br><small>Live chat otomatis di website</small></td>
                                <td class="price-col">Rp 200.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>AI & Automation</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td><strong>Dashboard Admin Custom</strong><br><small>Kelola data, laporan, user management</small></td>
                                <td class="price-col">Rp 500.000</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Sistem</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td><strong>CRM System</strong><br><small>Kelola database pelanggan & lead</small></td>
                                <td class="price-col">Rp 400.000</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Sistem</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td><strong>Sistem Membership</strong><br><small>Member login, level akses, point reward</small></td>
                                <td class="price-col">Rp 500.000</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Sistem</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td><strong>Booking/Reservasi Online</strong><br><small>Sistem booking otomatis (salon, hotel)</small></td>
                                <td class="price-col">Rp 600.000</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Sistem</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td><strong>Multi-Language (2 bahasa)</strong><br><small>Website bisa 2 bahasa (ID & EN)</small></td>
                                <td class="price-col">Rp 300.000</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Fitur</td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td><strong>Live Chat Human</strong><br><small>Admin chat langsung dengan pengunjung</small></td>
                                <td class="price-col">Rp 250.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>Customer Service</td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td><strong>Copywriting Landing Page</strong><br><small>Penulisan konten sales yang menjual</small></td>
                                <td class="price-col">Rp 150.000</td>
                                <td><span class="badge-sistem badge-sekali">/halaman</span></td>
                                <td>Konten</td>
                            </tr>
                            <tr>
                                <td>17</td>
                                <td><strong>Artikel SEO (500-700 kata)</strong><br><small>Artikel SEO-friendly untuk blog</small></td>
                                <td class="price-col">Rp 75.000</td>
                                <td><span class="badge-sistem badge-sekali">/artikel</span></td>
                                <td>Konten</td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td><strong>Artikel SEO (1000-1500 kata)</strong><br><small>Artikel panjang SEO premium</small></td>
                                <td class="price-col">Rp 120.000</td>
                                <td><span class="badge-sistem badge-sekali">/artikel</span></td>
                                <td>Konten</td>
                            </tr>
                            <tr>
                                <td>19</td>
                                <td><strong>Foto Produk Profesional</strong><br><small>Sesi foto produk (10-20 foto)</small></td>
                                <td class="price-col">Rp 500.000</td>
                                <td><span class="badge-sistem badge-sekali">/sesi</span></td>
                                <td>Konten Visual</td>
                            </tr>
                            <tr>
                                <td>20</td>
                                <td><strong>Video Promosi 60 detik</strong><br><small>Video reels/promo produk</small></td>
                                <td class="price-col">Rp 500.000</td>
                                <td><span class="badge-sistem badge-sekali">/video</span></td>
                                <td>Konten Visual</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Paket Kombinasi -->
            <div class="service-category">
                <h3 class="category-title">
                    <i class="bi bi-box-seam"></i>
                    Paket Kombinasi Website (5 Paket Hemat)
                </h3>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 25%">Paket</th>
                                <th style="width: 40%">Isi Paket</th>
                                <th style="width: 15%">Setup</th>
                                <th style="width: 15%">Bulanan</th>
                                <th style="width: 5%">Hemat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>🌱 Startup Go Digital</strong><br><small>UMKM Baru</small></td>
                                <td>Landing Page + Domain + SEO + WA Link</td>
                                <td class="price-col">Rp 600.000</td>
                                <td class="price-col">Rp 200.000</td>
                                <td class="price-col">Rp 250rb</td>
                            </tr>
                            <tr>
                                <td><strong>🚀 Bisnis Naik Level</strong><br><small>Bisnis Berkembang</small></td>
                                <td>Website Pro + SEO + Copywriting + Meta Ads</td>
                                <td class="price-col">Rp 1.500.000</td>
                                <td class="price-col">Rp 900.000</td>
                                <td class="price-col">Rp 1,1jt</td>
                            </tr>
                            <tr>
                                <td><strong>🤖 Sistem AI Digital</strong><br><small>Startup Tech</small></td>
                                <td>Website AI + CRM + Chatbot AI + Training</td>
                                <td class="price-col">Rp 3.500.000</td>
                                <td class="price-col">Rp 1.200.000</td>
                                <td class="price-col">Rp 1,95jt</td>
                            </tr>
                            <tr>
                                <td><strong>🛒 E-Commerce Growth</strong><br><small>Toko Online</small></td>
                                <td>Toko Online + Payment + Ads + Maintenance</td>
                                <td class="price-col">Rp 2.500.000</td>
                                <td class="price-col">Rp 900.000</td>
                                <td class="price-col">Rp 1,5jt</td>
                            </tr>
                            <tr>
                                <td><strong>💼 Enterprise Full System</strong><br><small>Korporasi</small></td>
                                <td>Custom Web App + Mobile + API + Training</td>
                                <td class="price-col">Rp 18.000.000+</td>
                                <td class="price-col">Custom</td>
                                <td class="price-col">Rp 7jt+</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- DIVISI 2: DIGITAL MARKETING & TRAFFIC GROWTH -->
        <div class="divisi-section" id="divisi-2" data-divisi="divisi-2">
            <div class="divisi-header">
                <h2 class="divisi-title">
                    <span>🎯 DIVISI 2: DIGITAL MARKETING & TRAFFIC GROWTH</span>
                    <span class="divisi-count">19 Layanan</span>
                </h2>
                <p class="divisi-subtitle">Iklan online, SEO, traffic generation, dan strategi digital marketing</p>
            </div>

            <!-- Layanan Utama -->
            <div class="service-category">
                <h3 class="category-title">
                    <i class="bi bi-megaphone"></i>
                    Layanan Utama (9 Services)
                </h3>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 45%">Layanan</th>
                                <th style="width: 20%">Harga</th>
                                <th style="width: 15%">Sistem</th>
                                <th style="width: 15%">Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><strong>SEO Optimasi (Dasar)</strong><br><small>On-page SEO, meta tags, sitemap, basic optimization</small></td>
                                <td class="price-col">Rp 200.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>SEO</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><strong>SEO Optimasi (Premium)</strong><br><small>Riset keyword, backlink building, competitor analysis, monthly report</small></td>
                                <td class="price-col">Rp 600.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>SEO</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><strong>Google Ads Management</strong><br><small>Search Ads, Display Ads, Remarketing - Full management</small></td>
                                <td class="price-col">Rp 400.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>Paid Ads</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><strong>Meta Ads (Facebook & Instagram)</strong><br><small>FB Ads + IG Ads campaign setup & optimization</small></td>
                                <td class="price-col">Rp 400.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>Paid Ads</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><strong>TikTok Ads Management</strong><br><small>TikTok campaign setup, targeting, optimization</small></td>
                                <td class="price-col">Rp 400.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>Paid Ads</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td><strong>Google My Business (Lokal SEO)</strong><br><small>GMB optimization, review management, local ranking</small></td>
                                <td class="price-col">Rp 250.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>Local SEO</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td><strong>WhatsApp Blast (Broadcast)</strong><br><small>Mass messaging service untuk promosi & notifikasi</small></td>
                                <td class="price-col">Rp 250.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>Direct Marketing</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td><strong>Email Marketing Automation</strong><br><small>Auto email follow-up, newsletter, promo campaign</small></td>
                                <td class="price-col">Rp 200.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>Email Marketing</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td><strong>Retargeting & Remarketing Campaign</strong><br><small>Re-target pengunjung yang belum convert</small></td>
                                <td class="price-col">Rp 300.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>Conversion</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Strategi & Optimasi -->
            <div class="service-category">
                <h3 class="category-title">
                    <i class="bi bi-graph-up-arrow"></i>
                    Strategi & Optimasi Traffic (5 Services)
                </h3>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 45%">Layanan</th>
                                <th style="width: 20%">Harga</th>
                                <th style="width: 15%">Sistem</th>
                                <th style="width: 15%">Target</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10</td>
                                <td><strong>Traffic Growth Plan</strong><br><small>Rencana strategis 3 bulan untuk boost traffic website</small></td>
                                <td class="price-col">Rp 500.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>Growth Strategy</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td><strong>Riset Keyword & Kompetitor</strong><br><small>Analisa keyword volume, difficulty & competitor research</small></td>
                                <td class="price-col">Rp 200.000</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Research</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td><strong>AI Audience Targeting</strong><br><small>AI-powered audience segmentation & targeting</small></td>
                                <td class="price-col">Rp 300.000</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Targeting</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td><strong>Campaign Planning (3 bulan)</strong><br><small>Perencanaan campaign marketing lengkap 3 bulan</small></td>
                                <td class="price-col">Rp 400.000</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Planning</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td><strong>Brand Awareness Campaign</strong><br><small>Campaign khusus untuk build brand awareness</small></td>
                                <td class="price-col">Rp 500.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>Branding</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Konten & Brand Support -->
            <div class="service-category">
                <h3 class="category-title">
                    <i class="bi bi-brush"></i>
                    Konten & Brand Support (5 Services)
                </h3>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 45%">Layanan</th>
                                <th style="width: 20%">Harga</th>
                                <th style="width: 15%">Sistem</th>
                                <th style="width: 15%">Deliverable</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>15</td>
                                <td><strong>Landing Page Copywriting</strong><br><small>Penulisan konten sales page yang persuasif</small></td>
                                <td class="price-col">Rp 150.000</td>
                                <td><span class="badge-sistem badge-sekali">/halaman</span></td>
                                <td>Copy 1 halaman</td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td><strong>Content Creator Package</strong><br><small>Paket lengkap: foto produk, video reels, caption</small></td>
                                <td class="price-col">Rp 500rb-1jt</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>10-20 konten</td>
                            </tr>
                            <tr>
                                <td>17</td>
                                <td><strong>Social Media Management</strong><br><small>Kelola IG, FB, TikTok: posting, engagement, report</small></td>
                                <td class="price-col">Rp 400.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>12-15 post/bulan</td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td><strong>Content Planner (Bulanan)</strong><br><small>Perencanaan konten 1 bulan dengan kalender editorial</small></td>
                                <td class="price-col">Rp 200.000</td>
                                <td><span class="badge-sistem badge-bulan">/bulan</span></td>
                                <td>Content calendar</td>
                            </tr>
                            <tr>
                                <td>19</td>
                                <td><strong>Ads Banner & Design Promo</strong><br><small>Desain banner iklan untuk Google, Meta, TikTok</small></td>
                                <td class="price-col">Rp 100rb-300rb</td>
                                <td><span class="badge-sistem badge-sekali">/set</span></td>
                                <td>5-10 design</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- DIVISI 3: OTOMASI & SISTEM AI -->
        <div class="divisi-section" id="divisi-3" data-divisi="divisi-3">
            <div class="divisi-header">
                <h2 class="divisi-title">
                    <span>🤖 DIVISI 3: OTOMASI & SISTEM AI</span>
                    <span class="divisi-count">21 Layanan</span>
                </h2>
                <p class="divisi-subtitle">Chatbot AI, CRM, otomasi bisnis, dan integrasi sistem cerdas</p>
            </div>

            <!-- Kategori 1: Layanan AI & Chatbot -->
            <div class="service-category">
                <h3 class="category-title">🤖 Layanan AI & Chatbot (4 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Chatbot AI (Basic)</strong><br><small>Chatbot AI dasar dengan respons otomatis untuk FAQ</small></td>
                                <td class="price-col">Rp 300rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Auto reply, FAQ bot</td>
                            </tr>
                            <tr>
                                <td><strong>Chatbot AI (Premium)</strong><br><small>Chatbot AI canggih dengan natural language processing</small></td>
                                <td class="price-col">Rp 600rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>AI learning, smart response</td>
                            </tr>
                            <tr>
                                <td><strong>WhatsApp Blast Otomatis</strong><br><small>Kirim pesan broadcast otomatis ke database customer</small></td>
                                <td class="price-col">Rp 250rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Unlimited messages</td>
                            </tr>
                            <tr>
                                <td><strong>Email Automation System</strong><br><small>Sistem email otomatis untuk follow-up dan promo</small></td>
                                <td class="price-col">Rp 200rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Auto follow-up, drip campaign</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 2: CRM & Business Tools -->
            <div class="service-category">
                <h3 class="category-title">💼 CRM & Business Tools (6 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>CRM System (Basic)</strong><br><small>Sistem manajemen customer relationship dasar</small></td>
                                <td class="price-col">Rp 500rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Contact management, basic pipeline</td>
                            </tr>
                            <tr>
                                <td><strong>CRM System (Custom)</strong><br><small>CRM custom sesuai kebutuhan bisnis Anda</small></td>
                                <td class="price-col">Rp 1jt</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Full customization, advanced features</td>
                            </tr>
                            <tr>
                                <td><strong>AI Business Dashboard</strong><br><small>Dashboard bisnis dengan AI analytics dan insights</small></td>
                                <td class="price-col">Rp 500rb-1jt</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Real-time data, AI predictions</td>
                            </tr>
                            <tr>
                                <td><strong>Website + CRM + Chatbot Integration</strong><br><small>Integrasi lengkap website, CRM, dan chatbot AI</small></td>
                                <td class="price-col">Rp 800rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Full integration package</td>
                            </tr>
                            <tr>
                                <td><strong>Auto Follow-up System</strong><br><small>Sistem follow-up otomatis untuk leads dan customers</small></td>
                                <td class="price-col">Rp 300rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Automated reminders, smart scheduling</td>
                            </tr>
                            <tr>
                                <td><strong>Booking/Appointment Automation</strong><br><small>Sistem booking dan janji temu otomatis</small></td>
                                <td class="price-col">Rp 250rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Online booking, calendar sync</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 3: Add-On & Custom -->
            <div class="service-category">
                <h3 class="category-title">⚙️ Add-On & Custom (6 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>AI Assistant Training</strong><br><small>Training AI assistant sesuai bisnis Anda</small></td>
                                <td class="price-col">Rp 250rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Custom AI knowledge base</td>
                            </tr>
                            <tr>
                                <td><strong>API Integration</strong><br><small>Integrasi API pihak ketiga ke sistem Anda</small></td>
                                <td class="price-col">Rp 300rb-800rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Payment gateway, shipping, etc</td>
                            </tr>
                            <tr>
                                <td><strong>AI Sales Forecasting</strong><br><small>Prediksi penjualan menggunakan AI dan machine learning</small></td>
                                <td class="price-col">Rp 500rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Sales prediction, trend analysis</td>
                            </tr>
                            <tr>
                                <td><strong>Auto Lead Distribution</strong><br><small>Distribusi leads otomatis ke tim sales</small></td>
                                <td class="price-col">Rp 250rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Smart lead routing, team management</td>
                            </tr>
                            <tr>
                                <td><strong>Multi-Agent Chat Dashboard</strong><br><small>Dashboard untuk multiple chat agents dan channels</small></td>
                                <td class="price-col">Rp 300rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>WhatsApp, IG, FB unified</td>
                            </tr>
                            <tr>
                                <td><strong>Security & Data Backup Automation</strong><br><small>Backup otomatis dan security monitoring 24/7</small></td>
                                <td class="price-col">Rp 200rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Daily backup, security alerts</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 4: Paket Kombinasi -->
            <div class="service-category">
                <h3 class="category-title">📦 Paket Kombinasi (5 Paket)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Paket</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Paket Automation Starter</strong><br><small>Chatbot AI + WhatsApp Blast + Email Automation</small></td>
                                <td class="price-col">Rp 700rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Perfect untuk UMKM</td>
                            </tr>
                            <tr>
                                <td><strong>Paket AI Smart Business</strong><br><small>CRM + Chatbot Premium + Dashboard AI + Follow-up System</small></td>
                                <td class="price-col">Rp 1,2jt</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Complete business automation</td>
                            </tr>
                            <tr>
                                <td><strong>Paket Sales Booster</strong><br><small>Auto Follow-up + Lead Distribution + Sales Forecasting</small></td>
                                <td class="price-col">Rp 900rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Boost your sales performance</td>
                            </tr>
                            <tr>
                                <td><strong>Paket E-Commerce Automation</strong><br><small>CRM + WhatsApp Blast + Email + Booking System</small></td>
                                <td class="price-col">Rp 1jt</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>For online shops & e-commerce</td>
                            </tr>
                            <tr>
                                <td><strong>Paket Enterprise Automation</strong><br><small>Full automation package dengan semua fitur premium</small></td>
                                <td class="price-col">Rp 2jt</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Enterprise-grade solution</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- DIVISI 4: BRANDING & DESAIN KREATIF -->
        <div class="divisi-section" id="divisi-4" data-divisi="divisi-4">
            <div class="divisi-header">
                <h2 class="divisi-title">
                    <span>🎨 DIVISI 4: BRANDING & DESAIN KREATIF</span>
                    <span class="divisi-count">23 Layanan</span>
                </h2>
                <p class="divisi-subtitle">Logo, desain grafis, branding, packaging, dan identitas visual bisnis</p>
            </div>

            <!-- Kategori 1: Logo & Identitas Brand -->
            <div class="service-category">
                <h3 class="category-title">🎯 Logo & Identitas Brand (4 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Desain Logo (Basic)</strong><br><small>Desain logo profesional untuk brand Anda</small></td>
                                <td class="price-col">Rp 250rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>3 konsep, unlimited revisi</td>
                            </tr>
                            <tr>
                                <td><strong>Desain Logo (Premium)</strong><br><small>Logo premium dengan brand guidelines lengkap</small></td>
                                <td class="price-col">Rp 500rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>5 konsep, file source lengkap</td>
                            </tr>
                            <tr>
                                <td><strong>Brand Guidelines / Brand Book</strong><br><small>Panduan lengkap penggunaan identitas brand</small></td>
                                <td class="price-col">Rp 600rb-1jt</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Color, typography, logo usage</td>
                            </tr>
                            <tr>
                                <td><strong>Rebranding & Logo Redesign</strong><br><small>Refresh dan modernisasi logo yang sudah ada</small></td>
                                <td class="price-col">Rp 350rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Update logo, maintain identity</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 2: Stationery & Print Design -->
            <div class="service-category">
                <h3 class="category-title">📄 Stationery & Print Design (5 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Business Card, Kop Surat (set)</strong><br><small>Desain kartu nama dan kop surat profesional</small></td>
                                <td class="price-col">Rp 250rb-400rb</td>
                                <td><span class="badge-sistem badge-sekali">/set</span></td>
                                <td>Print-ready files</td>
                            </tr>
                            <tr>
                                <td><strong>Instagram Feed & Story Template</strong><br><small>Template IG Feed & Story untuk konsistensi branding</small></td>
                                <td class="price-col">Rp 300rb-500rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>30 template editable</td>
                            </tr>
                            <tr>
                                <td><strong>Packaging Design (label, box)</strong><br><small>Desain kemasan produk yang menarik dan marketable</small></td>
                                <td class="price-col">Rp 350rb-800rb</td>
                                <td><span class="badge-sistem badge-sekali">/design</span></td>
                                <td>Label, box, pouch design</td>
                            </tr>
                            <tr>
                                <td><strong>Banner, Brosur, Flyer, Poster</strong><br><small>Desain marketing material untuk promosi offline</small></td>
                                <td class="price-col">Rp 150rb-400rb</td>
                                <td><span class="badge-sistem badge-sekali">/design</span></td>
                                <td>Various sizes available</td>
                            </tr>
                            <tr>
                                <td><strong>Company Profile (PDF/Print)</strong><br><small>Desain company profile profesional dan informatif</small></td>
                                <td class="price-col">Rp 500rb-1,2jt</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>8-16 halaman, layout profesional</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 3: Digital & Video -->
            <div class="service-category">
                <h3 class="category-title">🎬 Digital & Video (6 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Video Reel / Promo (15-60 detik)</strong><br><small>Video pendek untuk promosi di social media</small></td>
                                <td class="price-col">Rp 300rb-700rb</td>
                                <td><span class="badge-sistem badge-sekali">/video</span></td>
                                <td>Motion graphics, music, subtitle</td>
                            </tr>
                            <tr>
                                <td><strong>Brand Voice & Copywriting Guide</strong><br><small>Panduan tone of voice dan style komunikasi brand</small></td>
                                <td class="price-col">Rp 200rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Brand personality & messaging</td>
                            </tr>
                            <tr>
                                <td><strong>Product Mockup (3D Preview)</strong><br><small>Mockup 3D produk untuk preview sebelum produksi</small></td>
                                <td class="price-col">Rp 150rb</td>
                                <td><span class="badge-sistem badge-sekali">/mockup</span></td>
                                <td>Realistic 3D rendering</td>
                            </tr>
                            <tr>
                                <td><strong>Mini Photoshoot (5-10 foto)</strong><br><small>Sesi foto produk atau profile profesional</small></td>
                                <td class="price-col">Rp 400rb-800rb</td>
                                <td><span class="badge-sistem badge-sekali">/sesi</span></td>
                                <td>Edited photos, various angles</td>
                            </tr>
                            <tr>
                                <td><strong>Digital Ads Banner (Google, Meta)</strong><br><small>Banner iklan digital untuk platform online</small></td>
                                <td class="price-col">Rp 150rb-300rb</td>
                                <td><span class="badge-sistem badge-sekali">/set</span></td>
                                <td>Multiple sizes for ads</td>
                            </tr>
                            <tr>
                                <td><strong>Merchandise Design (kaos, tote-bag)</strong><br><small>Desain untuk merchandise dan branded items</small></td>
                                <td class="price-col">Rp 250rb-400rb</td>
                                <td><span class="badge-sistem badge-sekali">/design</span></td>
                                <td>Print-ready artwork</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 4: Konsultasi & Analisis -->
            <div class="service-category">
                <h3 class="category-title">💡 Konsultasi & Analisis (3 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Brand Audit & Position Analysis</strong><br><small>Analisis mendalam posisi brand di pasar</small></td>
                                <td class="price-col">Rp 300rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Competitor analysis, positioning</td>
                            </tr>
                            <tr>
                                <td><strong>Branding Consultation (Zoom, 1 jam)</strong><br><small>Konsultasi 1-on-1 dengan branding expert</small></td>
                                <td class="price-col">Rp 150rb</td>
                                <td><span class="badge-sistem badge-sekali">/sesi</span></td>
                                <td>Strategy discussion, Q&A</td>
                            </tr>
                            <tr>
                                <td><strong>Brand Strategy Document</strong><br><small>Dokumen strategi branding lengkap untuk bisnis</small></td>
                                <td class="price-col">Rp 500rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Vision, mission, positioning, roadmap</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 5: Paket Branding -->
            <div class="service-category">
                <h3 class="category-title">📦 Paket Branding (5 Paket)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Paket</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Paket Basic Branding</strong><br><small>Logo + Business Card + 5 IG Template</small></td>
                                <td class="price-col">Rp 400rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Hemat Rp 200rb!</td>
                            </tr>
                            <tr>
                                <td><strong>Kit Brand Profesional</strong><br><small>Logo Premium + Stationery Set + Brand Guidelines</small></td>
                                <td class="price-col">Rp 800rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Complete brand identity kit</td>
                            </tr>
                            <tr>
                                <td><strong>Paket Premium Corporate Identity</strong><br><small>Logo + Guidelines + Company Profile + Marketing Kit</small></td>
                                <td class="price-col">Rp 1,5jt</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Full corporate branding</td>
                            </tr>
                            <tr>
                                <td><strong>Paket Product Branding</strong><br><small>Logo + Packaging Design + Photoshoot + Marketing Material</small></td>
                                <td class="price-col">Rp 1jt</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Perfect untuk product launch</td>
                            </tr>
                            <tr>
                                <td><strong>Paket Rebranding & Brand Refresh</strong><br><small>Logo Redesign + Updated Guidelines + New Marketing Material</small></td>
                                <td class="price-col">Rp 900rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Modernize your brand</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- DIVISI 5: KONTEN & COPYWRITING -->
        <div class="divisi-section" id="divisi-5" data-divisi="divisi-5">
            <div class="divisi-header">
                <h2 class="divisi-title">
                    <span>✍️ DIVISI 5: KONTEN & COPYWRITING</span>
                    <span class="divisi-count">21 Layanan</span>
                </h2>
                <p class="divisi-subtitle">Artikel SEO, copywriting profesional, caption social media, dan content creation</p>
            </div>

            <!-- Kategori 1: Copywriting Layanan -->
            <div class="service-category">
                <h3 class="category-title">📝 Copywriting Layanan (11 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Landing Page Copywriting</strong><br><small>Copywriting persuasif untuk landing page yang konversi tinggi</small></td>
                                <td class="price-col">Rp 150rb</td>
                                <td><span class="badge-sistem badge-sekali">/halaman</span></td>
                                <td>High-converting copy</td>
                            </tr>
                            <tr>
                                <td><strong>Artikel SEO (500-700 kata)</strong><br><small>Artikel SEO-optimized untuk blog atau website</small></td>
                                <td class="price-col">Rp 75rb</td>
                                <td><span class="badge-sistem badge-sekali">/artikel</span></td>
                                <td>SEO-friendly, engaging content</td>
                            </tr>
                            <tr>
                                <td><strong>Artikel SEO (1000-1500 kata)</strong><br><small>Artikel SEO panjang untuk ranking lebih baik</small></td>
                                <td class="price-col">Rp 120rb</td>
                                <td><span class="badge-sistem badge-sekali">/artikel</span></td>
                                <td>Long-form, detailed content</td>
                            </tr>
                            <tr>
                                <td><strong>Social Media Caption</strong><br><small>Caption menarik untuk Instagram, Facebook, TikTok</small></td>
                                <td class="price-col">Rp 10rb</td>
                                <td><span class="badge-sistem badge-sekali">/caption</span></td>
                                <td>Engaging & creative</td>
                            </tr>
                            <tr>
                                <td><strong>Social Media Caption (30 caption/bulan)</strong><br><small>Paket 30 caption untuk konsistensi posting bulanan</small></td>
                                <td class="price-col">Rp 250rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>30 caption siap pakai</td>
                            </tr>
                            <tr>
                                <td><strong>Ads Copywriting (Meta/Google/TikTok)</strong><br><small>Copywriting iklan yang persuasif dan konversi tinggi</small></td>
                                <td class="price-col">Rp 150rb</td>
                                <td><span class="badge-sistem badge-sekali">/campaign</span></td>
                                <td>Multiple variations for A/B test</td>
                            </tr>
                            <tr>
                                <td><strong>Deskripsi Produk E-commerce</strong><br><small>Deskripsi produk yang menjual dan informatif</small></td>
                                <td class="price-col">Rp 15rb</td>
                                <td><span class="badge-sistem badge-sekali">/produk</span></td>
                                <td>Clear, persuasive product copy</td>
                            </tr>
                            <tr>
                                <td><strong>Deskripsi Produk (30 produk/bulan)</strong><br><small>Paket deskripsi untuk 30 produk</small></td>
                                <td class="price-col">Rp 300rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Bulk product descriptions</td>
                            </tr>
                            <tr>
                                <td><strong>Company Profile Writing</strong><br><small>Penulisan company profile yang profesional</small></td>
                                <td class="price-col">Rp 300rb-600rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Professional business story</td>
                            </tr>
                            <tr>
                                <td><strong>Email Promo Copywriting</strong><br><small>Email marketing yang efektif dan engaging</small></td>
                                <td class="price-col">Rp 100rb</td>
                                <td><span class="badge-sistem badge-sekali">/email</span></td>
                                <td>High open rate & conversion</td>
                            </tr>
                            <tr>
                                <td><strong>Email Promo (5 email)</strong><br><small>Paket 5 email untuk campaign lengkap</small></td>
                                <td class="price-col">Rp 250rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Complete email sequence</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 2: Paket Konten -->
            <div class="service-category">
                <h3 class="category-title">📦 Paket Konten (5 Paket)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Paket</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Paket Konten Dasar</strong><br><small>4 Artikel SEO (700 kata) + 10 Caption Social Media</small></td>
                                <td class="price-col">Rp 400rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Perfect untuk UMKM</td>
                            </tr>
                            <tr>
                                <td><strong>Paket Business Growth</strong><br><small>8 Artikel SEO + 20 Caption + 2 Email Promo</small></td>
                                <td class="price-col">Rp 700rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Consistent content strategy</td>
                            </tr>
                            <tr>
                                <td><strong>Paket Full Brand Content</strong><br><small>12 Artikel + 30 Caption + 4 Email + Landing Page Copy</small></td>
                                <td class="price-col">Rp 1,2jt</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Complete content solution</td>
                            </tr>
                            <tr>
                                <td><strong>Paket Premium Content Strategy</strong><br><small>15 Artikel Panjang + 30 Caption + 5 Email + Ads Copy</small></td>
                                <td class="price-col">Rp 1jt</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Premium content package</td>
                            </tr>
                            <tr>
                                <td><strong>Paket E-Commerce Copy</strong><br><small>30 Deskripsi Produk + 20 Caption + 3 Email Promo</small></td>
                                <td class="price-col">Rp 700rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>For online shops & marketplaces</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 3: Add-On -->
            <div class="service-category">
                <h3 class="category-title">⚙️ Add-On (5 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>SEO Keyword Research</strong><br><small>Riset keyword untuk optimasi SEO content</small></td>
                                <td class="price-col">Rp 150rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Target keywords & competitor analysis</td>
                            </tr>
                            <tr>
                                <td><strong>SEO On-Page Optimization (10 artikel)</strong><br><small>Optimasi SEO untuk 10 artikel existing</small></td>
                                <td class="price-col">Rp 100rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Meta tags, headings, internal linking</td>
                            </tr>
                            <tr>
                                <td><strong>Visual Content Design (Canva/IG Feed)</strong><br><small>Desain visual untuk melengkapi content</small></td>
                                <td class="price-col">Rp 250rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Graphics for social media posts</td>
                            </tr>
                            <tr>
                                <td><strong>AI Content Optimization</strong><br><small>Optimasi content menggunakan AI tools</small></td>
                                <td class="price-col">Rp 100rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>AI-powered content enhancement</td>
                            </tr>
                            <tr>
                                <td><strong>Editorial Calendar (3 bulan)</strong><br><small>Perencanaan konten untuk 3 bulan ke depan</small></td>
                                <td class="price-col">Rp 400rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Content strategy & planning</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- DIVISI 6: DATA, ANALITIK & OPTIMASI -->
        <div class="divisi-section" id="divisi-6" data-divisi="divisi-6">
            <div class="divisi-header">
                <h2 class="divisi-title">
                    <span>📊 DIVISI 6: DATA, ANALITIK & OPTIMASI</span>
                    <span class="divisi-count">20 Layanan</span>
                </h2>
                <p class="divisi-subtitle">Analytics, data insights, conversion optimization, dan strategi berbasis data</p>
            </div>

            <!-- Kategori 1: Setup & Reporting -->
            <div class="service-category">
                <h3 class="category-title">📈 Setup & Reporting (6 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Google Analytics 4 Setup & Reporting</strong><br><small>Setup GA4 lengkap dengan custom reporting</small></td>
                                <td class="price-col">Rp 250rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Complete GA4 configuration</td>
                            </tr>
                            <tr>
                                <td><strong>Conversion Tracking (Meta, TikTok, Google)</strong><br><small>Setup pixel tracking untuk semua platform ads</small></td>
                                <td class="price-col">Rp 200rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Multi-platform tracking setup</td>
                            </tr>
                            <tr>
                                <td><strong>Business Insight Dashboard (Data Studio/Power BI)</strong><br><small>Dashboard interaktif untuk monitoring bisnis real-time</small></td>
                                <td class="price-col">Rp 500rb-1jt</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Custom visualization & metrics</td>
                            </tr>
                            <tr>
                                <td><strong>AI Business Analytics (Prediksi & Trend)</strong><br><small>Analisis bisnis menggunakan AI dan predictive analytics</small></td>
                                <td class="price-col">Rp 800rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>AI-powered insights & forecasting</td>
                            </tr>
                            <tr>
                                <td><strong>Performance Audit & Optimization</strong><br><small>Audit menyeluruh performa website dan marketing</small></td>
                                <td class="price-col">Rp 400rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Comprehensive performance review</td>
                            </tr>
                            <tr>
                                <td><strong>A/B Testing & Conversion Optimization</strong><br><small>Testing dan optimasi untuk meningkatkan konversi</small></td>
                                <td class="price-col">Rp 300rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Continuous testing & improvement</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 2: Data-Driven Analytics -->
            <div class="service-category">
                <h3 class="category-title">🔍 Data-Driven Analytics (5 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Customer Behavior Analysis</strong><br><small>Analisis mendalam perilaku dan preferensi customer</small></td>
                                <td class="price-col">Rp 400rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>User behavior patterns & insights</td>
                            </tr>
                            <tr>
                                <td><strong>Sales Funnel Tracking</strong><br><small>Tracking dan analisis sales funnel untuk optimasi</small></td>
                                <td class="price-col">Rp 300rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Funnel visualization & bottleneck analysis</td>
                            </tr>
                            <tr>
                                <td><strong>Heatmap & User Journey Mapping</strong><br><small>Visualisasi interaksi user di website dengan heatmap</small></td>
                                <td class="price-col">Rp 400rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Visual user interaction tracking</td>
                            </tr>
                            <tr>
                                <td><strong>Predictive Analytics</strong><br><small>Prediksi trend dan performa bisnis menggunakan machine learning</small></td>
                                <td class="price-col">Rp 600rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>ML-based forecasting & predictions</td>
                            </tr>
                            <tr>
                                <td><strong>ROI & Cost Efficiency Analysis</strong><br><small>Analisis return on investment dan efisiensi biaya marketing</small></td>
                                <td class="price-col">Rp 250rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>ROI calculation & optimization tips</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 3: Digital Business Optimization -->
            <div class="service-category">
                <h3 class="category-title">🚀 Digital Business Optimization (5 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>SEO Optimization (Lanjutan)</strong><br><small>Optimasi SEO advanced untuk ranking lebih tinggi</small></td>
                                <td class="price-col">Rp 300rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Advanced SEO tactics & monitoring</td>
                            </tr>
                            <tr>
                                <td><strong>Ads Optimization (Meta, Google, TikTok)</strong><br><small>Optimasi campaign ads untuk ROI maksimal</small></td>
                                <td class="price-col">Rp 350rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Continuous ads performance tuning</td>
                            </tr>
                            <tr>
                                <td><strong>Website Conversion Optimization</strong><br><small>Optimasi website untuk meningkatkan conversion rate</small></td>
                                <td class="price-col">Rp 400rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>CRO strategies & implementation</td>
                            </tr>
                            <tr>
                                <td><strong>AI Content Performance Analyzer</strong><br><small>Analisis performa content menggunakan AI</small></td>
                                <td class="price-col">Rp 200rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>AI-driven content insights</td>
                            </tr>
                            <tr>
                                <td><strong>Data-Driven Strategy Plan (3 bulan)</strong><br><small>Perencanaan strategi bisnis berbasis data untuk 3 bulan</small></td>
                                <td class="price-col">Rp 500rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Comprehensive data strategy roadmap</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 4: Paket Kombinasi -->
            <div class="service-category">
                <h3 class="category-title">📦 Paket Kombinasi (4 Paket)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Paket</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Paket Basic Data Tracker</strong><br><small>GA4 Setup + Conversion Tracking + Monthly Report</small></td>
                                <td class="price-col">Rp 500rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Essential tracking & reporting</td>
                            </tr>
                            <tr>
                                <td><strong>Paket Optimization Pro</strong><br><small>A/B Testing + SEO Optimization + Ads Optimization</small></td>
                                <td class="price-col">Rp 900rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Comprehensive optimization package</td>
                            </tr>
                            <tr>
                                <td><strong>Paket AI Business Insight</strong><br><small>AI Analytics + Predictive Analytics + Custom Dashboard</small></td>
                                <td class="price-col">Rp 1,5jt</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>AI-powered business intelligence</td>
                            </tr>
                            <tr>
                                <td><strong>Paket Performance Booster</strong><br><small>Full Optimization + Analytics + Strategy Planning</small></td>
                                <td class="price-col">Rp 1jt</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Complete performance package</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- DIVISI 7: LEGALITAS, DOMAIN & INFRASTRUKTUR -->
        <div class="divisi-section" id="divisi-7" data-divisi="divisi-7">
            <div class="divisi-header">
                <h2 class="divisi-title">
                    <span>🏛️ DIVISI 7: LEGALITAS, DOMAIN & INFRASTRUKTUR</span>
                    <span class="divisi-count">24 Layanan</span>
                </h2>
                <p class="divisi-subtitle">Domain, hosting, security, legalitas bisnis, dan infrastruktur digital</p>
            </div>

            <!-- Kategori 1: Domain & Hosting -->
            <div class="service-category">
                <h3 class="category-title">🌐 Domain & Hosting (8 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Domain Registration (.com/.id/.net)</strong><br><small>Registrasi domain untuk website bisnis Anda</small></td>
                                <td class="price-col">Rp 150rb-300rb</td>
                                <td><span class="badge-sistem badge-bulanan">/tahun</span></td>
                                <td>Various TLD options</td>
                            </tr>
                            <tr>
                                <td><strong>Web Hosting (Shared/Cloud/VPS)</strong><br><small>Hosting website dengan performa optimal</small></td>
                                <td class="price-col">Rp 150rb-500rb</td>
                                <td><span class="badge-sistem badge-bulanan">/tahun</span></td>
                                <td>99.9% uptime guarantee</td>
                            </tr>
                            <tr>
                                <td><strong>SSL Certificate Setup (HTTPS)</strong><br><small>Sertifikat SSL untuk keamanan website</small></td>
                                <td class="price-col">Rp 100rb-250rb</td>
                                <td><span class="badge-sistem badge-bulanan">/tahun</span></td>
                                <td>Secure connection & SEO boost</td>
                            </tr>
                            <tr>
                                <td><strong>Server Management & Optimization</strong><br><small>Manajemen dan optimasi server untuk performa maksimal</small></td>
                                <td class="price-col">Rp 300rb-800rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Speed optimization & monitoring</td>
                            </tr>
                            <tr>
                                <td><strong>Cloud Deployment (AWS/GCP/DO)</strong><br><small>Deploy website ke cloud platform enterprise</small></td>
                                <td class="price-col">Rp 700rb-1,2jt</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Scalable cloud infrastructure</td>
                            </tr>
                            <tr>
                                <td><strong>Data Backup & Recovery System</strong><br><small>Sistem backup otomatis untuk keamanan data</small></td>
                                <td class="price-col">Rp 150rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>Daily automated backup</td>
                            </tr>
                            <tr>
                                <td><strong>Business Email (nama@domain.com)</strong><br><small>Email profesional dengan domain sendiri</small></td>
                                <td class="price-col">Rp 100rb-200rb</td>
                                <td><span class="badge-sistem badge-bulanan">/akun/tahun</span></td>
                                <td>Professional email hosting</td>
                            </tr>
                            <tr>
                                <td><strong>Website Migration</strong><br><small>Pindahkan website dari hosting lama ke hosting baru</small></td>
                                <td class="price-col">Rp 250rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Zero downtime migration</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 2: Security & Protection -->
            <div class="service-category">
                <h3 class="category-title">🔒 Security & Protection (5 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Firewall & Anti-DDoS Setup</strong><br><small>Proteksi website dari serangan DDoS dan hacker</small></td>
                                <td class="price-col">Rp 300rb-600rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Enterprise-grade protection</td>
                            </tr>
                            <tr>
                                <td><strong>Security Monitoring (24 jam)</strong><br><small>Monitoring keamanan website 24/7 real-time</small></td>
                                <td class="price-col">Rp 200rb</td>
                                <td><span class="badge-sistem badge-bulanan">/bulan</span></td>
                                <td>24/7 security alerts</td>
                            </tr>
                            <tr>
                                <td><strong>Malware & Virus Cleaning</strong><br><small>Pembersihan malware dan virus dari website</small></td>
                                <td class="price-col">Rp 250rb-500rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Complete malware removal</td>
                            </tr>
                            <tr>
                                <td><strong>Login & Brute Force Protection</strong><br><small>Proteksi login dari serangan brute force</small></td>
                                <td class="price-col">Rp 150rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Enhanced login security</td>
                            </tr>
                            <tr>
                                <td><strong>Security Audit & Hardening</strong><br><small>Audit keamanan lengkap dan penguatan sistem</small></td>
                                <td class="price-col">Rp 400rb-800rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Comprehensive security assessment</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 3: Legalitas Bisnis Digital -->
            <div class="service-category">
                <h3 class="category-title">⚖️ Legalitas Bisnis Digital (6 Layanan)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Layanan</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>NIB (Nomor Induk Berusaha)</strong><br><small>Pengurusan NIB untuk legalitas bisnis online</small></td>
                                <td class="price-col">Rp 350rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Legal business registration</td>
                            </tr>
                            <tr>
                                <td><strong>Legal Online Business (E-Commerce/Freelancer)</strong><br><small>Konsultasi dan pengurusan legalitas bisnis online</small></td>
                                <td class="price-col">Rp 500rb-1jt</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Complete business legality</td>
                            </tr>
                            <tr>
                                <td><strong>Privacy Policy & Terms Generator</strong><br><small>Generate privacy policy dan terms of service</small></td>
                                <td class="price-col">Rp 150rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>GDPR compliant documents</td>
                            </tr>
                            <tr>
                                <td><strong>Trademark Registration (konsultasi)</strong><br><small>Konsultasi dan pengurusan trademark brand</small></td>
                                <td class="price-col">Rp 1jt-2,5jt</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Brand protection & registration</td>
                            </tr>
                            <tr>
                                <td><strong>Kontrak Kerja Sama / Vendor / Reseller</strong><br><small>Pembuatan kontrak bisnis yang legal dan binding</small></td>
                                <td class="price-col">Rp 300rb-800rb</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Legally binding agreements</td>
                            </tr>
                            <tr>
                                <td><strong>PT / CV / Yayasan Digital Setup</strong><br><small>Pendirian badan usaha PT, CV, atau Yayasan</small></td>
                                <td class="price-col">Rp 1,5jt-3jt</td>
                                <td><span class="badge-sistem badge-sekali">Sekali</span></td>
                                <td>Complete business entity setup</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kategori 4: Paket Domain/Hosting/Security -->
            <div class="service-category">
                <h3 class="category-title">📦 Paket Domain/Hosting/Security (5 Paket)</h3>
                <div class="table-responsive">
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Paket</th>
                                <th style="width: 20%;">Harga</th>
                                <th style="width: 15%;">Sistem</th>
                                <th style="width: 25%;">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Paket Web Starter</strong><br><small>Domain + Hosting Shared + SSL Basic</small></td>
                                <td class="price-col">Rp 350rb</td>
                                <td><span class="badge-sistem badge-bulanan">/tahun</span></td>
                                <td>Perfect untuk startup</td>
                            </tr>
                            <tr>
                                <td><strong>Paket Secure Web</strong><br><small>Domain + Hosting + SSL + Firewall + Backup</small></td>
                                <td class="price-col">Rp 550rb</td>
                                <td><span class="badge-sistem badge-bulanan">/tahun</span></td>
                                <td>Enhanced security package</td>
                            </tr>
                            <tr>
                                <td><strong>Paket Cloud Business</strong><br><small>Domain + Cloud Hosting + SSL Premium + Security Monitoring</small></td>
                                <td class="price-col">Rp 900rb</td>
                                <td><span class="badge-sistem badge-bulanan">/tahun</span></td>
                                <td>Cloud-based infrastructure</td>
                            </tr>
                            <tr>
                                <td><strong>Paket Pro Security</strong><br><small>Firewall + DDoS Protection + Security Monitoring + Backup</small></td>
                                <td class="price-col">Rp 600rb</td>
                                <td><span class="badge-sistem badge-bulanan">/tahun</span></td>
                                <td>Maximum security protection</td>
                            </tr>
                            <tr>
                                <td><strong>Paket Full Infra + Legal</strong><br><small>Domain + Hosting + Security + NIB + Privacy Policy</small></td>
                                <td class="price-col">Rp 1jt-1,5jt</td>
                                <td><span class="badge-sistem badge-bulanan">/tahun</span></td>
                                <td>Complete infrastructure & legality</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Info Box -->
        <div style="background: var(--gradient-primary); border-radius: 20px; padding: 3rem; text-align: center; margin-top: 3rem;">
            <h3 style="color: var(--gold); font-size: 2rem; margin-bottom: 1rem;">💬 Butuh Konsultasi?</h3>
            <p style="font-size: 1.2rem; margin-bottom: 2rem;">Tim kami siap membantu Anda memilih layanan yang tepat untuk bisnis Anda!</p>
            <a href="https://wa.me/6283173868915?text=Halo%20Situneo%2C%20saya%20tertarik%20dengan%20katalog%20layanan%20Anda"
               target="_blank"
               style="background: var(--gradient-gold); color: var(--dark-blue); padding: 15px 40px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 1.1rem; display: inline-block;">
                <i class="bi bi-whatsapp"></i> KONSULTASI GRATIS SEKARANG
            </a>
        </div>

        <!-- Footer Note -->
        <div style="text-align: center; margin-top: 3rem; padding: 2rem; border-top: 1px solid rgba(255,180,0,0.2);">
            <p style="color: var(--text-light); margin-bottom: 1rem;">
                <strong style="color: var(--gold);">SITUNEO DIGITAL</strong> - Digital Harmony for a Modern World
            </p>
            <p style="color: var(--text-light); font-size: 0.9rem;">
                📞 +62 831-7386-8915 | 📧 support@situneo.my.id | 🌐 situneo.my.id<br>
                🏢 NIB: 20250926145704515453 | 📍 Jakarta Timur, Indonesia
            </p>
        </div>

    </div>

    <!-- Floating Actions -->
    <div class="floating-actions">
        <a href="https://wa.me/6283173868915?text=Halo%20Situneo%2C%20saya%20mau%20order%20dari%20katalog%20layanan"
           class="float-btn btn-whatsapp"
           target="_blank"
           title="WhatsApp">
            <i class="bi bi-whatsapp"></i>
        </a>
        <a href="javascript:window.print()"
           class="float-btn btn-download"
           title="Print / Save PDF">
            <i class="bi bi-printer"></i>
        </a>
        <a href="#"
           class="float-btn btn-top"
           onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;"
           title="Back to Top">
            <i class="bi bi-arrow-up"></i>
        </a>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search Function
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const allRows = document.querySelectorAll('tbody tr');

            allRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Filter Tabs
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
                // Add active class to clicked tab
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');
                const allDivisi = document.querySelectorAll('.divisi-section');

                if (filter === 'all') {
                    allDivisi.forEach(div => div.style.display = 'block');
                } else {
                    allDivisi.forEach(div => {
                        if (div.getAttribute('data-divisi') === filter) {
                            div.style.display = 'block';
                        } else {
                            div.style.display = 'none';
                        }
                    });
                }
            });
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>
