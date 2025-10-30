-- ========================================
-- SITUNEO DIGITAL - Seed Service Categories
-- Kategori layanan default
-- ========================================

INSERT INTO `service_categories` (`name`, `slug`, `description`, `icon`, `color`, `order_position`, `is_active`) VALUES
('Website Development', 'website-development', 'Pembuatan website profesional untuk bisnis Anda', 'fas fa-laptop-code', '#1E5C99', 1, 1),
('Mobile App Development', 'mobile-app-development', 'Aplikasi mobile Android & iOS yang powerful', 'fas fa-mobile-alt', '#FFB400', 2, 1),
('UI/UX Design', 'ui-ux-design', 'Desain antarmuka yang menarik dan user-friendly', 'fas fa-palette', '#1E5C99', 3, 1),
('Digital Marketing', 'digital-marketing', 'Strategi marketing digital untuk pertumbuhan bisnis', 'fas fa-bullhorn', '#FFB400', 4, 1),
('SEO Services', 'seo-services', 'Optimasi website untuk ranking Google yang lebih baik', 'fas fa-search', '#1E5C99', 5, 1),
('Content Writing', 'content-writing', 'Konten berkualitas untuk website dan media sosial', 'fas fa-pen-fancy', '#FFB400', 6, 1),
('IT Consulting', 'it-consulting', 'Konsultasi solusi IT untuk bisnis Anda', 'fas fa-laptop', '#1E5C99', 7, 1),
('Maintenance & Support', 'maintenance-support', 'Maintenance dan support teknis berkelanjutan', 'fas fa-tools', '#FFB400', 8, 1);
