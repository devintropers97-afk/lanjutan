-- ========================================
-- SITUNEO DIGITAL - Testimonials Table
-- Testimoni dari client
-- ========================================

CREATE TABLE IF NOT EXISTS `testimonials` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `order_id` INT(11) UNSIGNED DEFAULT NULL,
    `user_id` INT(11) UNSIGNED DEFAULT NULL,
    `name` VARCHAR(100) NOT NULL,
    `position` VARCHAR(100) DEFAULT NULL,
    `company` VARCHAR(150) DEFAULT NULL,
    `avatar` VARCHAR(255) DEFAULT NULL,
    `rating` TINYINT(1) NOT NULL DEFAULT 5,
    `testimonial` TEXT NOT NULL,
    `is_featured` TINYINT(1) NOT NULL DEFAULT 0,
    `is_approved` TINYINT(1) NOT NULL DEFAULT 0,
    `approved_by` INT(11) UNSIGNED DEFAULT NULL,
    `approved_at` DATETIME DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `order_id` (`order_id`),
    KEY `user_id` (`user_id`),
    KEY `rating` (`rating`),
    KEY `is_featured` (`is_featured`),
    KEY `is_approved` (`is_approved`),
    CONSTRAINT `fk_testimonials_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
    CONSTRAINT `fk_testimonials_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
    CONSTRAINT `fk_testimonials_approved_by` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_testimonials_approved_featured ON testimonials(is_approved, is_featured);
CREATE INDEX idx_testimonials_rating ON testimonials(rating DESC);
