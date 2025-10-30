<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Premium Homepage
 * Website Termahal & Termewah Se-Indonesia
 * NIB: 20250-9261-4570-4515-5453
 * ========================================
 */

session_start();
date_default_timezone_set('Asia/Jakarta');

// ========================================
// CONSTANTS
// ========================================
define('COMPANY_NIB', '20250-9261-4570-4515-5453');
define('COMPANY_NPWP', '99.999.999.9-999.999');
define('COMPANY_NAME', 'SITUNEO DIGITAL');
define('COMPANY_PHONE', '+62 812-3456-7890');
define('COMPANY_WHATSAPP', '+62 812-3456-7890');
define('COMPANY_EMAIL', 'info@situneo.my.id');
define('COMPANY_ADDRESS', 'Jakarta, Indonesia');
define('SITE_TAGLINE', 'Menyelaraskan Ide Menjadi Solusi Digital Modern');

// Social Media
define('SOCIAL_INSTAGRAM', 'https://instagram.com/situneo');
define('SOCIAL_FACEBOOK', 'https://facebook.com/situneo');
define('SOCIAL_TIKTOK', 'https://tiktok.com/@situneo');
define('SOCIAL_LINKEDIN', 'https://linkedin.com/company/situneo');
define('SOCIAL_YOUTUBE', 'https://youtube.com/@situneo');
define('SOCIAL_TWITTER', 'https://twitter.com/situneo');

// ========================================
// HELPER FUNCTIONS
// ========================================
function whatsapp_link($message = 'Halo SITUNEO!') {
    $phone = str_replace(['+', '-', ' '], '', COMPANY_WHATSAPP);
    return 'https://wa.me/' . $phone . '?text=' . urlencode($message);
}

function format_rupiah($number) {
    return 'Rp ' . number_format($number, 0, ',', '.');
}

$lang = $_GET['lang'] ?? $_SESSION['lang'] ?? 'id';
$_SESSION['lang'] = $lang;

// Multi-language content (SIMPLE LANGUAGE)
$text = [
    'id' => [
        'hero_title' => 'Bikin Website Profesional Cuma Rp 350rb/Halaman',
        'hero_tagline' => 'Menyelaraskan Ide Menjadi Solusi Digital Modern',
        'hero_subtitle' => 'FREE DEMO 24 JAM - Lihat Dulu Hasilnya, Bayar Kalau Cocok!',
        'hero_desc' => 'Partner digital terpercaya sejak 2020. Sudah bantu 500+ bisnis sukses online!',
        'hero_feature_1' => 'FREE DEMO 24 Jam - Lihat hasilnya dulu!',
        'hero_feature_2' => 'Harga TERMURAH se-Indonesia, dijamin!',
        'hero_feature_3' => 'Support 24/7 - Fast response < 5 menit',
        'hero_whatsapp_text' => 'Halo! Saya mau FREE DEMO 24 JAM untuk website saya!',
        'hero_cta_demo' => 'Pesan FREE DEMO Sekarang',
        'hero_cta_packages' => 'Lihat Paket Harga',
        'nav_home' => 'Beranda',
        'nav_about' => 'Tentang Kami',
        'nav_services' => 'Layanan',
        'nav_packages' => 'Paket',
        'nav_portfolio' => 'Portfolio',
        'nav_pricing' => 'Harga',
        'nav_contact' => 'Hubungi',
        'nav_calculator' => 'Hitung Harga',
        'nav_login' => 'Masuk',
        'nav_register' => 'Daftar',
        'btn_demo' => 'COBA DEMO GRATIS',
        'btn_calculator' => 'HITUNG BERAPA BIAYANYA',
        'btn_whatsapp' => 'CHAT WHATSAPP SEKARANG',
        'btn_view_all' => 'LIHAT SEMUA',
        'section_about' => 'Kenapa Harus Pilih Kami?',
        'section_services' => 'Layanan Kami (107 Macam!)',
        'section_packages' => 'Paket Hemat Bundling',
        'section_portfolio' => 'Contoh Website Yang Udah Jadi',
        'section_testimonial' => 'Kata Customer Kami',
        'section_faq' => 'Pertanyaan Yang Sering Ditanya',
        'section_contact' => 'Cara Pesan',
    ],
    'en' => [
        'hero_title' => 'Professional Website Only Rp 350k/Page',
        'hero_tagline' => 'Digital Harmony for a Modern World',
        'hero_subtitle' => 'FREE 24H DEMO - See First, Pay If You Like!',
        'hero_desc' => 'Trusted digital partner since 2020. Helped 500+ businesses succeed online!',
        'hero_feature_1' => 'FREE 24H DEMO - See the result first!',
        'hero_feature_2' => 'CHEAPEST price in Indonesia, guaranteed!',
        'hero_feature_3' => '24/7 Support - Fast response < 5 minutes',
        'hero_whatsapp_text' => 'Hello! I want a FREE 24H DEMO for my website!',
        'hero_cta_demo' => 'Order FREE DEMO Now',
        'hero_cta_packages' => 'View Pricing Packages',
        'nav_home' => 'Home',
        'nav_about' => 'About',
        'nav_services' => 'Services',
        'nav_packages' => 'Packages',
        'nav_portfolio' => 'Portfolio',
        'nav_pricing' => 'Pricing',
        'nav_contact' => 'Contact',
        'nav_calculator' => 'Calculator',
        'nav_login' => 'Login',
        'nav_register' => 'Register',
        'btn_demo' => 'TRY FREE DEMO',
        'btn_calculator' => 'CALCULATE PRICE',
        'btn_whatsapp' => 'CHAT WHATSAPP NOW',
        'btn_view_all' => 'VIEW ALL',
        'section_about' => 'Why Choose Us?',
        'section_services' => 'Our Services (107 Types!)',
        'section_packages' => 'Bundle Packages',
        'section_portfolio' => 'Demo Websites',
        'section_testimonial' => 'What Clients Say',
        'section_faq' => 'FAQ',
        'section_contact' => 'How to Order',
    ]
];
$t = $text[$lang];

// 8 LAYANAN PALING POPULER
$services = [
    [
        'id' => 1,
        'name' => 'Bikin Website',
        'icon' => 'globe',
        'price_start' => 350000,
        'description' => 'Website profesional yang bisa dibuka di HP, tablet, komputer. Cepat loading dan mudah dicari di Google!',
        'image' => 'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=400&h=300&fit=crop&q=80'
    ],
    [
        'id' => 2,
        'name' => 'Toko Online Lengkap',
        'icon' => 'cart',
        'price_start' => 2000000,
        'description' => 'Jualan online kayak Tokopedia! Ada keranjang belanja, sistem pembayaran otomatis, dan lacak pengiriman.',
        'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=400&h=300&fit=crop&q=80'
    ],
    [
        'id' => 7,
        'name' => 'SEO Biar Muncul di Google',
        'icon' => 'search',
        'price_start' => 1000000,
        'description' => 'Biar website kamu gampang ditemukan di Google. Traffic naik, pembeli makin banyak!',
        'image' => 'https://images.unsplash.com/photo-1571721795195-a2ca2d3370a9?w=400&h=300&fit=crop&q=80'
    ],
    [
        'id' => 11,
        'name' => 'Iklan Google Ads',
        'icon' => 'bullseye',
        'price_start' => 350000,
        'description' => 'Pasang iklan di Google biar langsung muncul paling atas. Customer datang terus!',
        'image' => 'https://images.unsplash.com/photo-1611926653458-09294b3142bf?w=400&h=300&fit=crop&q=80'
    ],
    [
        'id' => 12,
        'name' => 'Iklan Facebook & Instagram',
        'icon' => 'facebook',
        'price_start' => 250000,
        'description' => 'Iklan di FB & IG biar produk kamu dilihat jutaan orang. Target customer yang tepat!',
        'image' => 'https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=400&h=300&fit=crop&q=80'
    ],
    [
        'id' => 15,
        'name' => 'Robot Chat Pintar (AI)',
        'icon' => 'robot',
        'price_start' => 200000,
        'description' => 'Robot yang bales chat otomatis 24 jam nonstop di WhatsApp. Customer puas, kamu santai!',
        'image' => 'https://images.unsplash.com/photo-1531746790731-6c087fecd65a?w=400&h=300&fit=crop&q=80'
    ],
    [
        'id' => 27,
        'name' => 'Dashboard Pantau Bisnis',
        'icon' => 'speedometer2',
        'price_start' => 1500000,
        'description' => 'Dashboard canggih buat pantau penjualan, stok barang, customer. Kayak aplikasi modern!',
        'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=300&fit=crop&q=80'
    ],
    [
        'id' => 28,
        'name' => 'Payment Gateway (Bayar Online)',
        'icon' => 'credit-card',
        'price_start' => 500000,
        'description' => 'Customer bisa bayar pakai transfer bank, OVO, GoPay, QRIS. Otomatis masuk ke rekening!',
        'image' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=300&fit=crop&q=80'
    ],
];

// 3 PAKET BUNDLING PALING LAKU
$packages = [
    [
        'id' => 1,
        'name' => 'STARTER',
        'tagline' => 'Buat UMKM & Bisnis Kecil',
        'price_original' => 3500000,
        'price_promo' => 2500000,
        'popular' => 0,
        'features' => [
            'Website 5 halaman',
            'Domain .com gratis 1 tahun',
            'Hosting 1 tahun',
            'SSL (website aman - ada gemboknya)',
            'Desain logo GRATIS',
            '5 artikel SEO biar muncul di Google',
            'Dibantu 1 bulan kalau ada masalah',
            'Bisa dibuka di HP',
            'SEO dasar'
        ]
    ],
    [
        'id' => 2,
        'name' => 'BUSINESS',
        'tagline' => 'Yang Paling Banyak Dipilih!',
        'price_original' => 6000000,
        'price_promo' => 4000000,
        'popular' => 1,
        'features' => [
            'Website 8 halaman',
            'SEO canggih biar top di Google',
            'Siap jadi toko online',
            'Payment gateway (terima bayar online)',
            'Domain .com gratis 2 tahun',
            'Hosting 2 tahun',
            'Logo + brosur GRATIS',
            '10 artikel SEO',
            'Dibantu 3 bulan',
            'Dashboard admin buat kelola website',
            'Live chat langsung di website'
        ]
    ],
    [
        'id' => 3,
        'name' => 'PREMIUM',
        'tagline' => 'Fitur Lengkap Kayak Perusahaan Besar',
        'price_original' => 10000000,
        'price_promo' => 6500000,
        'popular' => 0,
        'features' => [
            'Website 10 halaman',
            'SEO full - dijamin nongol di Google',
            'Bisa 2 bahasa (Indonesia & Inggris)',
            'Dashboard admin super canggih',
            'Domain .com gratis 3 tahun',
            'Hosting 3 tahun',
            'Semua design GRATIS (logo, brosur, banner)',
            '20 artikel SEO',
            'Dibantu 6 bulan',
            'Setup iklan Google Ads',
            'WhatsApp Business API',
            'Email marketing otomatis'
        ]
    ]
];

// 12 PORTFOLIO DEMO
$portfolios = [
    ['id' => 1, 'title' => 'Toko Baju Online', 'category' => 'Toko Online', 'description' => 'Website toko fashion lengkap dengan keranjang belanja & pembayaran otomatis', 'image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=600&h=400&fit=crop&q=80'],
    ['id' => 36, 'title' => 'Service AC Panggilan', 'category' => 'Jasa Service', 'description' => 'Website service AC dengan booking online & emergency call 24 jam', 'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=600&h=400&fit=crop&q=80'],
    ['id' => 10, 'title' => 'Konsultan Bisnis', 'category' => 'Jasa Profesional', 'description' => 'Website konsultan dengan sistem booking konsultasi online', 'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&h=400&fit=crop&q=80'],
    ['id' => 15, 'title' => 'Klinik Dokter', 'category' => 'Kesehatan', 'description' => 'Website klinik dengan booking dokter online & jadwal praktek', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=600&h=400&fit=crop&q=80'],
    ['id' => 19, 'title' => 'Kursus Online', 'category' => 'Pendidikan', 'description' => 'Platform kursus dengan video, quiz, dan sertifikat digital', 'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600&h=400&fit=crop&q=80'],
    ['id' => 7, 'title' => 'Restoran & Cafe', 'category' => 'Makanan', 'description' => 'Website restoran dengan menu digital & booking meja', 'image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&h=400&fit=crop&q=80'],
    ['id' => 32, 'title' => 'Laundry Kiloan', 'category' => 'Jasa Service', 'description' => 'Website laundry dengan order online & pick up gratis', 'image' => 'https://images.unsplash.com/photo-1582735689369-4fe89db7114c?w=600&h=400&fit=crop&q=80'],
    ['id' => 22, 'title' => 'Jual Beli Rumah', 'category' => 'Properti', 'description' => 'Portal properti dengan virtual tour 360° & kalkulator KPR', 'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=600&h=400&fit=crop&q=80'],
    ['id' => 45, 'title' => 'Cuci Mobil Premium', 'category' => 'Otomotif', 'description' => 'Website car wash dengan booking slot waktu & membership', 'image' => 'https://images.unsplash.com/photo-1520340356584-f9917d1eea6f?w=600&h=400&fit=crop&q=80'],
    ['id' => 47, 'title' => 'Service Laptop & HP', 'category' => 'Service Teknis', 'description' => 'Website service gadget dengan home service & garansi', 'image' => 'https://images.unsplash.com/photo-1556656793-08538906a9f8?w=600&h=400&fit=crop&q=80'],
    ['id' => 24, 'title' => 'Hotel & Booking', 'category' => 'Hotel', 'description' => 'Website hotel dengan booking kamar online & cek ketersediaan', 'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=600&h=400&fit=crop&q=80'],
    ['id' => 2, 'title' => 'Company Profile IT', 'category' => 'Perusahaan', 'description' => 'Website perusahaan dengan portfolio project & contact form', 'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop&q=80'],
];

// 4 TESTIMONI CUSTOMER
$testimonials = [
    ['full_name' => 'Budi Santoso', 'order_number' => 'ORD-2024-001', 'rating' => 5, 'review' => 'Harga Rp 350rb/halaman ini MURAH BANGET! Website toko online saya jadi keren, penjualan naik 3x lipat. Tim nya fast response banget!'],
    ['full_name' => 'Sarah Wijaya', 'order_number' => 'ORD-2024-078', 'rating' => 5, 'review' => 'FREE DEMO 24 jam ini jujur membantu banget. Saya bisa liat dulu hasilnya sebelum bayar. Hasilnya? PUAS BANGET! Sekarang jualan online makin lancar.'],
    ['full_name' => 'Dr. Ahmad Fauzi', 'order_number' => 'ORD-2024-125', 'rating' => 5, 'review' => 'Website klinik saya sekarang ada booking online. Pasien tinggal klik aja, gak usah telpon lagi. Praktis dan modern!'],
    ['full_name' => 'Rina Kusuma', 'order_number' => 'ORD-2024-203', 'rating' => 5, 'review' => 'Menu digital restoran saya dibikinin Situneo. Customer bilang keren! Order lewat website juga nambah banyak. Makasih Situneo!']
];
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITUNEO DIGITAL - Website Rp 350rb/Halaman | FREE DEMO 24 JAM | NIB Resmi</title>
    <meta name="description" content="Bikin website cuma Rp 350rb/halaman! FREE DEMO 24 JAM - Lihat dulu hasilnya, bayar kalau cocok. NIB Resmi. 500+ customer puas!">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="https://situneo.my.id/logo">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loader-logo">
            <img src="https://situneo.my.id/logo" alt="Situneo Logo">
        </div>
        <div class="loader-text text-center">
            <h3 style="color: var(--gold); font-family: 'Plus Jakarta Sans', sans-serif;">SITUNEO DIGITAL</h3>
            <p style="color: var(--text-light);">Menyelaraskan Ide Menjadi Solusi Digital Modern</p>
            <div class="mt-3">
                <div class="spinner-border text-warning" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Network Background -->
    <div class="network-bg" id="networkBg"></div>

    <!-- Circuit Pattern -->
    <div class="circuit-pattern"></div>

    <!-- Navbar -->
    <?php include __DIR__ . '/includes/components/header.php'; ?>

    <!-- Hero Section -->
    <?php include __DIR__ . '/includes/components/hero.php'; ?>

    <!-- Stats Counter Section -->
    <?php include __DIR__ . '/includes/components/stats.php'; ?>

    <!-- Services Section -->
    <?php include __DIR__ . '/includes/components/services.php'; ?>

    <!-- Packages Section -->
    <?php include __DIR__ . '/includes/components/packages.php'; ?>

    <!-- Portfolio Section -->
    <?php include __DIR__ . '/includes/components/portfolio.php'; ?>

    <!-- Partner Info Section -->
    <?php include __DIR__ . '/includes/components/partner-info.php'; ?>

    <!-- Testimonials Section -->
    <?php include __DIR__ . '/includes/components/testimonials.php'; ?>

    <!-- FAQ Section -->
    <?php include __DIR__ . '/includes/components/faq.php'; ?>

    <!-- Contact Section -->
    <?php include __DIR__ . '/includes/components/contact.php'; ?>

    <!-- Footer -->
    <?php include __DIR__ . '/includes/components/footer.php'; ?>

    <!-- Back to Top Button -->
    <button id="backToTop">
        <i class="bi bi-arrow-up" style="font-size: 1.5rem;"></i>
    </button>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6283173868915?text=Halo%20Situneo,%20saya%20mau%20bikin%20website"
       class="floating-wa"
       target="_blank">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Order Notification (LEFT BOTTOM) -->
    <div id="orderNotification" class="order-notification">
        <div style="display: flex; align-items: center; gap: 15px;">
            <div style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden; border: 2px solid var(--gold); flex-shrink: 0;">
                <img id="notifAvatar" src="" alt="Customer" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div style="flex: 1; min-width: 0;">
                <h6 style="color: var(--gold); margin: 0; font-weight: 700; font-size: 0.95rem;" id="notifName">Budi Santoso</h6>
                <p style="color: var(--text-light); margin: 0; font-size: 0.85rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" id="notifOrder">Baru pesan Website...</p>
                <small style="color: rgba(255,255,255,0.6); font-size: 0.75rem;" id="notifTime">2 menit yang lalu</small>
            </div>
            <button onclick="closeNotification()" style="background: transparent; border: none; color: var(--text-light); cursor: pointer; padding: 5px; flex-shrink: 0;">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>

    <!-- Demo Modal (AUTO POPUP AFTER 10 SECONDS) -->
    <div class="modal fade" id="demoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="background: linear-gradient(135deg, #0F3057 0%, #1E5C99 100%); border: 3px solid var(--gold); border-radius: 20px; overflow: hidden;">
                <div class="modal-header border-0" style="background: var(--gradient-gold); padding: 1.5rem;">
                    <h3 class="modal-title" style="color: var(--dark-blue); font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 900; font-size: 1.8rem;">
                        <i class="bi bi-gift-fill"></i> FREE DEMO 24 JAM!
                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" style="filter: brightness(0);"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="text-center mb-4">
                        <div style="background: rgba(255,0,0,0.2); border: 2px dashed var(--gold); padding: 20px; border-radius: 15px; margin-bottom: 1.5rem;">
                            <h4 style="color: var(--gold); font-weight: 800; margin-bottom: 1rem;">
                                🔥 PROMO SPESIAL! 🔥
                            </h4>
                            <p style="color: var(--white); font-size: 1.2rem; margin: 0;">
                                Lihat hasil website kamu dalam <strong style="color: var(--gold);">24 JAM GRATIS!</strong><br>
                                Bayar cuma kalau kamu puas aja!
                            </p>
                        </div>
                    </div>

                    <div class="d-grid gap-3">
                        <a href="auth/register.php" class="btn-gold btn-lg" style="font-size: 1.1rem;">
                            <i class="bi bi-person-plus"></i> DAFTAR & REQUEST DEMO SEKARANG
                        </a>

                        <a href="calculator.php" class="btn btn-outline-warning btn-lg"
                           style="border-radius: 50px; padding: 15px; font-weight: 700; border-width: 2px;">
                            <i class="bi bi-calculator"></i> HITUNG DULU BERAPA BIAYANYA
                        </a>

                        <a href="https://wa.me/6283173868915?text=Halo, saya mau request FREE DEMO 24 Jam dong"
                           class="btn btn-success btn-lg"
                           style="border-radius: 50px; padding: 15px; font-weight: 700;"
                           target="_blank">
                            <i class="bi bi-whatsapp"></i> CHAT LANGSUNG LEWAT WHATSAPP
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
