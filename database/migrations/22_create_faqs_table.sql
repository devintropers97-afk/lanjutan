-- ========================================
-- SITUNEO DIGITAL - FAQs Table
-- Frequently Asked Questions
-- ========================================

CREATE TABLE IF NOT EXISTS `faqs` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `category` VARCHAR(50) NOT NULL DEFAULT 'general',
    `question` TEXT NOT NULL,
    `answer` TEXT NOT NULL,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `order_position` INT(11) NOT NULL DEFAULT 0,
    `views_count` INT(11) NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `category` (`category`),
    KEY `is_active` (`is_active`),
    KEY `order_position` (`order_position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_faqs_active_order ON faqs(is_active, order_position);
CREATE INDEX idx_faqs_category_active ON faqs(category, is_active);
