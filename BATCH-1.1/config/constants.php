<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Constants Configuration
 * ================================================
 * File ini berisi semua konstanta (data tetap) website
 * Edit file ini untuk ubah informasi perusahaan
 */

// ============================================
// 🏢 INFORMASI PERUSAHAAN
// ============================================
define('APP_NAME', 'SITUNEO DIGITAL');
define('APP_TAGLINE', 'Digital Harmony for a Modern World');
define('APP_URL', 'https://situneo.my.id');
define('APP_DESCRIPTION', 'Solusi digital terlengkap untuk mengembangkan bisnis Anda di era modern');

// ============================================
// 📞 KONTAK INFORMASI
// ============================================
define('COMPANY_EMAIL', 'vins@situneo.my.id');
define('SUPPORT_EMAIL', 'support@situneo.my.id');
define('COMPANY_PHONE', '021-8880-7229');
define('COMPANY_WHATSAPP', '6283173868915');  // Format: 628xxx (tanpa +)
define('COMPANY_ADDRESS', 'Jl. Bekasi Timur IX Dalam No. 27, RT 002/RW 003, Kel. Rawa Bunga, Kec. Jatinegara, Jakarta Timur 13450, DKI Jakarta');

// ============================================
// 🏛️ LEGAL & BUSINESS
// ============================================
define('COMPANY_NIB', '20250926145704515453');
define('COMPANY_NPWP', '90.296.264.6-002.000');
define('COMPANY_DIRECTOR', 'Devin Prasetyo Hermawan');
define('COMPANY_FOUNDED', '2020');

// ============================================
// 🌐 SOCIAL MEDIA
// ============================================
define('SOCIAL_INSTAGRAM', 'https://instagram.com/situneodigital');
define('SOCIAL_FACEBOOK', 'https://facebook.com/situneodigital');
define('SOCIAL_LINKEDIN', 'https://linkedin.com/company/situneodigital');
define('SOCIAL_TIKTOK', 'https://tiktok.com/@situneodigital');

// ============================================
// 💳 BANK INFORMATION
// ============================================
define('BANK_BCA_NUMBER', '2750424018');
define('BANK_BCA_NAME', 'Devin Prasetyo Hermawan');
define('BANK_MANDIRI_NUMBER', ''); // Kosong dulu
define('BANK_BNI_NUMBER', '');     // Kosong dulu

// ============================================
// 🎨 DESIGN COLORS (Untuk CSS)
// ============================================
define('COLOR_PRIMARY_BLUE', '#1E5C99');
define('COLOR_DARK_BLUE', '#0F3057');
define('COLOR_GOLD', '#FFB400');
define('COLOR_BRIGHT_GOLD', '#FFD700');
define('COLOR_WHITE', '#ffffff');

// ============================================
// 👥 USER ROLES (Level Akses)
// ============================================
define('ROLE_CLIENT', 1);      // Client biasa
define('ROLE_PARTNER', 2);     // Partner/Freelance
define('ROLE_ADMIN', 3);       // Admin (level tertinggi)

// ============================================
// 💰 PARTNER TIERS (Level Komisi)
// ============================================
define('TIER_BRONZE', 'bronze');       // 15%
define('TIER_SILVER', 'silver');       // 25%
define('TIER_GOLD', 'gold');           // 35%
define('TIER_PLATINUM', 'platinum');   // 45%
define('TIER_DIAMOND', 'diamond');     // 50%

// Komisi per tier
define('COMMISSION_BRONZE', 15);
define('COMMISSION_SILVER', 25);
define('COMMISSION_GOLD', 35);
define('COMMISSION_PLATINUM', 45);
define('COMMISSION_DIAMOND', 50);

// Syarat upgrade tier (total orders)
define('TIER_SILVER_REQUIREMENT', 6);
define('TIER_GOLD_REQUIREMENT', 16);
define('TIER_PLATINUM_REQUIREMENT', 31);
define('TIER_DIAMOND_REQUIREMENT', 51);

// Maintenance orders per bulan
define('TIER_SILVER_MAINTENANCE', 3);
define('TIER_GOLD_MAINTENANCE', 8);
define('TIER_PLATINUM_MAINTENANCE', 15);
define('TIER_DIAMOND_MAINTENANCE', 25);

// ============================================
// 💸 WITHDRAWAL SETTINGS
// ============================================
define('MIN_WITHDRAWAL', 50000);  // Minimum Rp 50.000

// ============================================
// 📋 ORDER STATUS
// ============================================
define('ORDER_PENDING', 'pending');
define('ORDER_WAITING_PAYMENT', 'waiting_payment');
define('ORDER_PAID', 'paid');
define('ORDER_IN_PROGRESS', 'in_progress');
define('ORDER_TESTING', 'testing');
define('ORDER_COMPLETED', 'completed');
define('ORDER_CANCELLED', 'cancelled');

// ============================================
// 💳 PAYMENT STATUS
// ============================================
define('PAYMENT_PENDING', 'pending');
define('PAYMENT_APPROVED', 'approved');
define('PAYMENT_REJECTED', 'rejected');

// ============================================
// 🔐 SECURITY SETTINGS
// ============================================
define('MIN_PASSWORD_LENGTH', 6);
define('SESSION_TIMEOUT', 7200); // 2 jam (dalam detik)

// ============================================
// 📧 EMAIL SETTINGS
// ============================================
define('FROM_EMAIL', COMPANY_EMAIL);
define('FROM_NAME', APP_NAME);

// ============================================
// 📁 UPLOAD SETTINGS
// ============================================
define('UPLOAD_MAX_SIZE', 5242880);  // 5MB (dalam bytes)
define('ALLOWED_IMAGE_TYPES', ['image/jpeg', 'image/jpg', 'image/png', 'image/gif']);
define('ALLOWED_DOCUMENT_TYPES', ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']);

// ============================================
// 📊 STATISTICS (Bisa diupdate nanti)
// ============================================
define('STATS_CLIENTS', '500+');
define('STATS_PROJECTS', '1200+');
define('STATS_SATISFACTION', '4.9/5.0');
define('STATS_EXPERIENCE', '5+');
define('STATS_REVIEWS', '450+');

// ============================================
// 🕐 BUSINESS HOURS
// ============================================
define('BUSINESS_HOURS_WEEKDAY', 'Senin-Jumat: 09:00 - 18:00 WIB');
define('BUSINESS_HOURS_SATURDAY', 'Sabtu: 09:00 - 15:00 WIB');
define('BUSINESS_HOURS_SUNDAY', 'Minggu: Tutup');
define('RESPONSE_TIME', '< 2 jam');

// ============================================
// 🌍 TIMEZONE
// ============================================
date_default_timezone_set('Asia/Jakarta');

// ============================================
// 🔧 DEBUG MODE (Set FALSE saat production!)
// ============================================
define('DEBUG_MODE', true);  // Ubah jadi FALSE kalau sudah live

if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}
?>
