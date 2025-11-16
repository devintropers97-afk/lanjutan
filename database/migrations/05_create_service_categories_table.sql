-- ========================================
-- SITUNEO DIGITAL - Service Categories Table
-- Kategori layanan (Website Development, Mobile App, dll)
-- ========================================

CREATE TABLE IF NOT EXISTS `service_categories` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `slug` VARCHAR(100) NOT NULL,
    `description` TEXT DEFAULT NULL,
    `icon` VARCHAR(100) DEFAULT NULL,
    `color` VARCHAR(7) DEFAULT '#1E5C99',
    `order_position` INT(11) NOT NULL DEFAULT 0,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `slug` (`slug`),
    KEY `is_active` (`is_active`),
    KEY `order_position` (`order_position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_service_categories_active_order ON service_categories(is_active, order_position);
