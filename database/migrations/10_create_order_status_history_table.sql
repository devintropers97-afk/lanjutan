-- ========================================
-- SITUNEO DIGITAL - Order Status History Table
-- History perubahan status order
-- ========================================

CREATE TABLE IF NOT EXISTS `order_status_history` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `order_id` INT(11) UNSIGNED NOT NULL,
    `old_status` VARCHAR(50) DEFAULT NULL,
    `new_status` VARCHAR(50) NOT NULL,
    `notes` TEXT DEFAULT NULL,
    `changed_by` INT(11) UNSIGNED DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `order_id` (`order_id`),
    KEY `changed_by` (`changed_by`),
    KEY `created_at` (`created_at`),
    CONSTRAINT `fk_order_status_history_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
    CONSTRAINT `fk_order_status_history_user` FOREIGN KEY (`changed_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_order_status_history_order_created ON order_status_history(order_id, created_at DESC);
