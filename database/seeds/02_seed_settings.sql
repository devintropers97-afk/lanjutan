-- ========================================
-- SITUNEO DIGITAL - Seed Settings
-- Pengaturan sistem default
-- ========================================

INSERT INTO `settings` (`key`, `value`, `type`, `group`, `label`, `description`, `is_public`) VALUES
-- General Settings
('site_name', 'SITUNEO DIGITAL', 'string', 'general', 'Nama Situs', 'Nama website', 1),
('site_tagline', 'Solusi Digital Terpercaya untuk Bisnis Anda', 'string', 'general', 'Tagline', 'Tagline website', 1),
('site_description', 'SITUNEO DIGITAL adalah partner terpercaya untuk semua kebutuhan digital bisnis Anda. Kami menyediakan layanan website development, mobile app, digital marketing, dan solusi IT profesional.', 'text', 'general', 'Deskripsi Situs', 'Deskripsi website untuk SEO', 1),
('site_keywords', 'web development, mobile app, digital marketing, jasa website, pembuatan aplikasi', 'string', 'general', 'Keywords', 'Keywords untuk SEO', 1),
('site_logo', '/assets/images/logo.png', 'string', 'general', 'Logo', 'Path ke logo website', 1),
('site_favicon', '/assets/images/favicon.png', 'string', 'general', 'Favicon', 'Path ke favicon', 1),

-- Contact Settings
('contact_email', 'admin@situneo.my.id', 'string', 'contact', 'Email Kontak', 'Email untuk kontak', 1),
('contact_phone', '6283173868915', 'string', 'contact', 'Nomor Telepon', 'Nomor telepon/WhatsApp', 1),
('contact_address', 'Indonesia', 'text', 'contact', 'Alamat', 'Alamat kantor', 1),

-- Social Media
('social_instagram', 'https://instagram.com/situneo.digital', 'string', 'social', 'Instagram', 'URL Instagram', 1),
('social_facebook', '', 'string', 'social', 'Facebook', 'URL Facebook', 1),
('social_linkedin', '', 'string', 'social', 'LinkedIn', 'URL LinkedIn', 1),
('social_twitter', '', 'string', 'social', 'Twitter/X', 'URL Twitter', 1),

-- System Settings
('maintenance_mode', '0', 'boolean', 'system', 'Mode Maintenance', 'Aktifkan mode maintenance', 0),
('registration_enabled', '1', 'boolean', 'system', 'Registrasi Aktif', 'Izinkan registrasi user baru', 0),
('items_per_page', '12', 'number', 'system', 'Item Per Halaman', 'Jumlah item per halaman', 0),
('max_upload_size', '5242880', 'number', 'system', 'Max Upload Size', 'Ukuran max upload (bytes)', 0),

-- Email Settings
('email_from_name', 'SITUNEO DIGITAL', 'string', 'email', 'Nama Pengirim Email', 'Nama pengirim untuk email', 0),
('email_from_address', 'noreply@situneo.my.id', 'string', 'email', 'Alamat Pengirim Email', 'Email pengirim', 0),

-- Payment Settings
('payment_tax_rate', '0', 'number', 'payment', 'Tax Rate (%)', 'Persentase pajak', 0),
('payment_admin_fee', '0', 'number', 'payment', 'Admin Fee', 'Biaya admin default', 0),
('payment_expiry_hours', '24', 'number', 'payment', 'Expiry Hours', 'Jam kadaluarsa pembayaran', 0),

-- Freelancer Settings
('freelancer_min_withdrawal', '100000', 'number', 'freelancer', 'Minimum Penarikan', 'Minimum penarikan dana (Rp)', 0),
('freelancer_withdrawal_fee', '5000', 'number', 'freelancer', 'Biaya Penarikan', 'Biaya admin penarikan (Rp)', 0),
('commission_release_days', '7', 'number', 'freelancer', 'Release Days', 'Hari sampai komisi bisa ditarik', 0),

-- Tier Settings
('tier_1_name', 'Tier 1', 'string', 'tier', 'Nama Tier 1', 'Nama untuk tier 1', 0),
('tier_1_commission', '30', 'number', 'tier', 'Komisi Tier 1 (%)', 'Persentase komisi tier 1', 0),
('tier_1_min_orders', '0', 'number', 'tier', 'Min Order Tier 1', 'Min order untuk tier 1', 0),

('tier_2_name', 'Tier 2', 'string', 'tier', 'Nama Tier 2', 'Nama untuk tier 2', 0),
('tier_2_commission', '40', 'number', 'tier', 'Komisi Tier 2 (%)', 'Persentase komisi tier 2', 0),
('tier_2_min_orders', '10', 'number', 'tier', 'Min Order Tier 2', 'Min order untuk tier 2', 0),

('tier_3_name', 'Tier 3', 'string', 'tier', 'Nama Tier 3', 'Nama untuk tier 3', 0),
('tier_3_commission', '50', 'number', 'tier', 'Komisi Tier 3 (%)', 'Persentase komisi tier 3', 0),
('tier_3_min_orders', '25', 'number', 'tier', 'Min Order Tier 3', 'Min order untuk tier 3', 0),

('tier_max_name', 'Tier MAX', 'string', 'tier', 'Nama Tier MAX', 'Nama untuk tier max', 0),
('tier_max_commission', '55', 'number', 'tier', 'Komisi Tier MAX (%)', 'Persentase komisi tier max', 0),
('tier_max_min_orders', '50', 'number', 'tier', 'Min Order Tier MAX', 'Min order untuk tier max', 0);
