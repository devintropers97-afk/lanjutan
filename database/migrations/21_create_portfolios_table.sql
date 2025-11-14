-- ========================================
-- SITUNEO DIGITAL - Portfolios Table
-- Portfolio project SITUNEO
-- ========================================

CREATE TABLE IF NOT EXISTS `portfolios` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `category_id` INT(11) UNSIGNED DEFAULT NULL,
    `title` VARCHAR(150) NOT NULL,
    `slug` VARCHAR(150) NOT NULL,
    `client_name` VARCHAR(100) DEFAULT NULL,
    `client_company` VARCHAR(150) DEFAULT NULL,
    `description` TEXT DEFAULT NULL,
    `features` TEXT DEFAULT NULL,
    `technologies` TEXT DEFAULT NULL,
    `image` VARCHAR(255) DEFAULT NULL,
    `gallery` TEXT DEFAULT NULL,
    `url` VARCHAR(255) DEFAULT NULL,
    `completed_at` DATE DEFAULT NULL,
    `is_featured` TINYINT(1) NOT NULL DEFAULT 0,
    `is_published` TINYINT(1) NOT NULL DEFAULT 1,
    `views_count` INT(11) NOT NULL DEFAULT 0,
    `order_position` INT(11) NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `slug` (`slug`),
    KEY `category_id` (`category_id`),
    KEY `is_featured` (`is_featured`),
    KEY `is_published` (`is_published`),
    CONSTRAINT `fk_portfolios_category` FOREIGN KEY (`category_id`) REFERENCES `service_categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_portfolios_published_featured ON portfolios(is_published, is_featured, order_position);
