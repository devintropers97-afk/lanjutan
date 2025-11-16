-- ========================================
-- SITUNEO DIGITAL - Services Table
-- Daftar layanan yang ditawarkan
-- ========================================

CREATE TABLE IF NOT EXISTS `services` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `category_id` INT(11) UNSIGNED NOT NULL,
    `name` VARCHAR(150) NOT NULL,
    `slug` VARCHAR(150) NOT NULL,
    `short_description` VARCHAR(255) DEFAULT NULL,
    `description` TEXT DEFAULT NULL,
    `features` TEXT DEFAULT NULL,
    `base_price` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    `sale_price` DECIMAL(15,2) DEFAULT NULL,
    `duration_days` INT(11) NOT NULL DEFAULT 7,
    `revisions` INT(11) NOT NULL DEFAULT 2,
    `image` VARCHAR(255) DEFAULT NULL,
    `gallery` TEXT DEFAULT NULL,
    `is_featured` TINYINT(1) NOT NULL DEFAULT 0,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `order_position` INT(11) NOT NULL DEFAULT 0,
    `views_count` INT(11) NOT NULL DEFAULT 0,
    `orders_count` INT(11) NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `slug` (`slug`),
    KEY `category_id` (`category_id`),
    KEY `is_featured` (`is_featured`),
    KEY `is_active` (`is_active`),
    KEY `order_position` (`order_position`),
    CONSTRAINT `fk_services_category` FOREIGN KEY (`category_id`) REFERENCES `service_categories` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_services_category_active ON services(category_id, is_active);
CREATE INDEX idx_services_featured ON services(is_featured, is_active, order_position);
