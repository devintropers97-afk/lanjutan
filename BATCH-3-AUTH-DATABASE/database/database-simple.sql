SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- Users table
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 1,
  `status` enum('pending','active','suspended','banned') NOT NULL DEFAULT 'pending',
  `email_verified_at` datetime DEFAULT NULL,
  `phone_verified_at` datetime DEFAULT NULL,
  `referral_code` varchar(20) DEFAULT NULL,
  `referred_by` int(11) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `referral_code` (`referral_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default admin
INSERT INTO `users` (`name`, `email`, `password`, `phone`, `role`, `status`, `email_verified_at`, `referral_code`) VALUES
('Admin SITUNEO', 'admin@situneo.my.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6283173868915', 3, 'active', NOW(), 'ADMIN01');

-- Activity logs
DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Service categories
DROP TABLE IF EXISTS `service_categories`;
CREATE TABLE `service_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert 8 divisions
INSERT INTO `service_categories` (`name`, `slug`, `icon`, `color`, `description`) VALUES
('Website & Pengembangan Sistem', 'website', 'bi-globe', '#1E5C99', 'Website profesional dan sistem custom'),
('Digital Marketing', 'marketing', 'bi-graph-up-arrow', '#0F3057', 'SEO, Ads, dan strategi marketing'),
('Otomasi & AI', 'ai', 'bi-robot', '#FFB400', 'Chatbot AI, CRM, dan automation'),
('Branding & Desain', 'branding', 'bi-palette', '#FFD700', 'Logo, brand identity, dan desain'),
('Konten & Copywriting', 'content', 'bi-file-text', '#1E5C99', 'Artikel SEO dan copywriting'),
('Data & Analytics', 'analytics', 'bi-bar-chart-line', '#0F3057', 'Analytics dan optimasi'),
('Infrastruktur & Legal', 'infrastructure', 'bi-shield-check', '#FFB400', 'Domain, hosting, dan legalitas'),
('Customer Experience', 'customer-experience', 'bi-headset', '#FFD700', 'Support dan customer service');

-- Settings
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`key`, `value`) VALUES
('site_name', 'SITUNEO DIGITAL'),
('min_withdrawal', '50000'),
('commission_bronze', '15'),
('commission_silver', '25'),
('commission_gold', '35'),
('commission_platinum', '45'),
('commission_diamond', '50');

SET FOREIGN_KEY_CHECKS = 1;
