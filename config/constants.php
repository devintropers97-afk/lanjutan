<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Constants & Company Data
 * All site constants and configuration
 * NIB: 20250-9261-4570-4515-5453
 * ========================================
 */

// ============================================
// COMPANY INFORMATION
// ============================================
define('COMPANY_NAME', 'SITUNEO DIGITAL');
define('COMPANY_TAGLINE', 'Digital Harmony for a Modern World');
define('COMPANY_SLOGAN_ID', 'Bikin Website Profesional Cuma Rp 150rb Perbulan');
define('COMPANY_USP', 'FREE DEMO 24 JAM - Lihat Dulu Hasilnya, Baru Bayar!');

// Legal Information
define('COMPANY_NIB', '20250-9261-4570-4515-5453');
define('COMPANY_NPWP', '90.296.264.6-002.000');
define('COMPANY_DIRECTOR', 'Devin Prasetyo Hermawan');
define('COMPANY_FOUNDED_YEAR', 2020);

// ============================================
// CONTACT INFORMATION
// ============================================
define('CONTACT_EMAIL_ADMIN', 'admin@situneo.my.id');
define('CONTACT_EMAIL_SUPPORT', 'support@situneo.my.id');
define('CONTACT_PHONE', '021-8880-7229');
define('CONTACT_WHATSAPP', '6283173868915');
define('CONTACT_WHATSAPP_FORMATTED', '+62 831-7386-8915');

// Address
define('COMPANY_ADDRESS_STREET', 'Jl. Bekasi Timur IX Dalam No. 27, RT 002/RW 003');
define('COMPANY_ADDRESS_AREA', 'Kel. Rawa Bunga, Kec. Jatinegara');
define('COMPANY_ADDRESS_CITY', 'Jakarta Timur');
define('COMPANY_ADDRESS_PROVINCE', 'DKI Jakarta');
define('COMPANY_ADDRESS_POSTAL', '13450');
define('COMPANY_ADDRESS_FULL', COMPANY_ADDRESS_STREET . ', ' . COMPANY_ADDRESS_AREA . ', ' . COMPANY_ADDRESS_CITY . ' ' . COMPANY_ADDRESS_POSTAL . ', ' . COMPANY_ADDRESS_PROVINCE);

// Google Maps
define('COMPANY_MAPS_LAT', '-6.2388');
define('COMPANY_MAPS_LNG', '106.8753');

// ============================================
// WEBSITE & SOCIAL MEDIA
// ============================================
define('SITE_URL', 'https://situneo.my.id');
define('SITE_NAME', COMPANY_NAME);

// Social Media
define('SOCIAL_INSTAGRAM', '@situneodigital');
define('SOCIAL_FACEBOOK', '@situneodigital');
define('SOCIAL_LINKEDIN', '/company/situneodigital');
define('SOCIAL_TIKTOK', '@situneodigital');

define('SOCIAL_INSTAGRAM_URL', 'https://instagram.com/situneodigital');
define('SOCIAL_FACEBOOK_URL', 'https://facebook.com/situneodigital');
define('SOCIAL_LINKEDIN_URL', 'https://linkedin.com/company/situneodigital');
define('SOCIAL_TIKTOK_URL', 'https://tiktok.com/@situneodigital');

// ============================================
// BUSINESS HOURS
// ============================================
define('BUSINESS_HOURS_WEEKDAY', '09:00 - 18:00 WIB');
define('BUSINESS_HOURS_SATURDAY', '09:00 - 15:00 WIB');
define('BUSINESS_HOURS_SUNDAY', 'Tutup');
define('BUSINESS_RESPONSE_TIME', '< 2 jam (jam kerja)');

// ============================================
// STATISTICS
// ============================================
define('STATS_CLIENTS', '50+');
define('STATS_PROJECTS', '200+');
define('STATS_SATISFACTION', '4.9/5.0');
define('STATS_SATISFACTION_PERCENT', '98%');
define('STATS_REVIEWS', '100+');
define('STATS_EXPERIENCE_YEARS', '5+');

// ============================================
// DESIGN COLORS (Versi 1)
// ============================================
define('COLOR_PRIMARY_BLUE', '#1E5C99');
define('COLOR_DARK_BLUE', '#0F3057');
define('COLOR_GOLD', '#FFB400');
define('COLOR_BRIGHT_GOLD', '#FFD700');
define('COLOR_WHITE', '#FFFFFF');
define('COLOR_TEXT_LIGHT', '#e9ecef');

// Gradients
define('COLOR_GRADIENT_PRIMARY', 'linear-gradient(135deg, #1E5C99 0%, #0F3057 100%)');
define('COLOR_GRADIENT_GOLD', 'linear-gradient(135deg, #FFD700 0%, #FFB400 100%)');

// ============================================
// TYPOGRAPHY
// ============================================
define('FONT_PRIMARY', 'Plus Jakarta Sans');
define('FONT_SECONDARY', 'Inter');
define('FONT_WEIGHTS', '300,400,500,600,700,800,900');

// ============================================
// BANK INFORMATION
// ============================================
define('BANK_BCA_NUMBER', '2750424018');
define('BANK_BCA_NAME', 'Devin Prasetyo Hermawan');
define('BANK_BCA_FULL', 'BCA: ' . BANK_BCA_NUMBER . ' A/N ' . BANK_BCA_NAME);

define('PAYMENT_QRIS', true);
define('PAYMENT_MANUAL_APPROVAL', true);

// ============================================
// FREELANCE TIER SYSTEM
// ============================================
// Tier 1: 0-10 orders/month = 30%
define('TIER_1_NAME', 'Tier 1 - Starter');
define('TIER_1_MIN_ORDERS', 0);
define('TIER_1_MAX_ORDERS', 10);
define('TIER_1_COMMISSION', 30);

// Tier 2: 10-25 orders/month = 40%
define('TIER_2_NAME', 'Tier 2 - Professional');
define('TIER_2_MIN_ORDERS', 10);
define('TIER_2_MAX_ORDERS', 25);
define('TIER_2_COMMISSION', 40);

// Tier 3: 25-50 orders/month = 50%
define('TIER_3_NAME', 'Tier 3 - Expert');
define('TIER_3_MIN_ORDERS', 25);
define('TIER_3_MAX_ORDERS', 50);
define('TIER_3_COMMISSION', 50);

// Tier MAX: 75+ orders/month = 55%
define('TIER_MAX_NAME', 'Tier MAX - Elite');
define('TIER_MAX_MIN_ORDERS', 75);
define('TIER_MAX_COMMISSION', 55);

// Withdrawal settings
define('WITHDRAWAL_MIN_AMOUNT', 50000); // Minimum Rp 50K

// ============================================
// SYSTEM SETTINGS
// ============================================
define('TIMEZONE', 'Asia/Jakarta');
define('LOCALE', 'id_ID');
define('CURRENCY', 'IDR');
define('CURRENCY_SYMBOL', 'Rp');

// Session
define('SESSION_NAME', 'SITUNEO_SESSION');
define('SESSION_LIFETIME', 86400); // 24 hours

// Pagination
define('ITEMS_PER_PAGE', 12);
define('PAGINATION_RANGE', 5);

// File Upload
define('UPLOAD_MAX_SIZE', 5242880); // 5MB
define('UPLOAD_ALLOWED_IMAGES', ['jpg', 'jpeg', 'png', 'gif', 'webp']);
define('UPLOAD_ALLOWED_DOCUMENTS', ['pdf', 'doc', 'docx', 'xls', 'xlsx']);

// ============================================
// DEFAULT MESSAGES
// ============================================
define('MSG_SUCCESS_SAVE', 'Data berhasil disimpan!');
define('MSG_SUCCESS_UPDATE', 'Data berhasil diupdate!');
define('MSG_SUCCESS_DELETE', 'Data berhasil dihapus!');
define('MSG_ERROR_SAVE', 'Gagal menyimpan data!');
define('MSG_ERROR_UPDATE', 'Gagal mengupdate data!');
define('MSG_ERROR_DELETE', 'Gagal menghapus data!');
define('MSG_ERROR_PERMISSION', 'Anda tidak memiliki akses!');
define('MSG_ERROR_LOGIN', 'Email atau password salah!');
define('MSG_ERROR_FORM', 'Mohon lengkapi semua field!');

// ============================================
// VERSION & DEBUG
// ============================================
define('SITE_VERSION', '1.0.0');
define('DEBUG_MODE', true); // Set to false in production
define('ERROR_REPORTING', DEBUG_MODE ? E_ALL : 0);

// ============================================
// PATHS
// ============================================
define('BASE_PATH', dirname(__DIR__));
define('CONFIG_PATH', BASE_PATH . '/config');
define('INCLUDES_PATH', BASE_PATH . '/includes');
define('UPLOADS_PATH', BASE_PATH . '/uploads');
define('ASSETS_PATH', BASE_PATH . '/assets');

// Set timezone
date_default_timezone_set(TIMEZONE);

// Error reporting
error_reporting(ERROR_REPORTING);
if (DEBUG_MODE) {
    ini_set('display_errors', 1);
} else {
    ini_set('display_errors', 0);
}
?>
