<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Configuration
 * ================================================
 * BATCH 1.3 - Commercial Design Edition
 */

// Site Information
define('SITE_NAME', 'SITUNEO DIGITAL');
define('SITE_TAGLINE', 'Solusi Digital Profesional');
define('SITE_URL', 'https://situneo.my.id');
define('SITE_EMAIL', 'vins@situneo.my.id');
define('SITE_PHONE', '083173868915');
define('SITE_WHATSAPP', '6283173868915');

// Company Information
define('COMPANY_NIB', '20250926145704515453');
define('COMPANY_NPWP', '90.296.264.6-002.000');
define('COMPANY_ADDRESS', 'Indonesia');

// Social Media
define('SOCIAL_INSTAGRAM', 'https://instagram.com/situneo.digital');
define('SOCIAL_FACEBOOK', 'https://facebook.com/situneo.digital');
define('SOCIAL_LINKEDIN', 'https://linkedin.com/company/situneo-digital');
define('SOCIAL_TWITTER', 'https://twitter.com/situneo_digital');

// Design System
define('COLOR_GOLD', '#FFB400');
define('COLOR_BLUE', '#1E5C99');
define('COLOR_DARK_BLUE', '#0F3057');

// Language
$lang = $_GET['lang'] ?? $_SESSION['lang'] ?? 'id';
$_SESSION['lang'] = $lang;

// Helper Functions
function t($key, $lang = null) {
    global $lang;
    $lang = $lang ?? $_SESSION['lang'] ?? 'id';

    $translations = [
        'id' => [
            'home' => 'Beranda',
            'about' => 'Tentang',
            'services' => 'Layanan',
            'portfolio' => 'Portfolio',
            'pricing' => 'Harga',
            'contact' => 'Kontak',
            'faq' => 'FAQ',
            'login' => 'Masuk',
            'register' => 'Daftar',
            'order_now' => 'Pesan Sekarang',
            'learn_more' => 'Pelajari Lebih',
            'view_all' => 'Lihat Semua',
            'contact_us' => 'Hubungi Kami',
            'lang' => 'id'
        ],
        'en' => [
            'home' => 'Home',
            'about' => 'About',
            'services' => 'Services',
            'portfolio' => 'Portfolio',
            'pricing' => 'Pricing',
            'contact' => 'Contact',
            'faq' => 'FAQ',
            'login' => 'Login',
            'register' => 'Register',
            'order_now' => 'Order Now',
            'learn_more' => 'Learn More',
            'view_all' => 'View All',
            'contact_us' => 'Contact Us',
            'lang' => 'en'
        ]
    ];

    return $translations[$lang][$key] ?? $key;
}

function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function format_rupiah($number) {
    return 'Rp ' . number_format($number, 0, ',', '.');
}

function whatsapp_link($message) {
    return 'https://wa.me/' . SITE_WHATSAPP . '?text=' . urlencode($message);
}

function excerpt($text, $length = 100) {
    if (strlen($text) <= $length) return $text;
    return substr($text, 0, $length) . '...';
}

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
