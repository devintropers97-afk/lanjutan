-- ========================================
-- SITUNEO DIGITAL - Commissions Table
-- Komisi untuk freelancer dari order
-- ========================================

CREATE TABLE IF NOT EXISTS `commissions` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `freelancer_id` INT(11) UNSIGNED NOT NULL,
    `order_id` INT(11) UNSIGNED NOT NULL,
    `order_amount` DECIMAL(15,2) NOT NULL,
    `commission_rate` DECIMAL(5,2) NOT NULL,
    `commission_amount` DECIMAL(15,2) NOT NULL,
    `tier` VARCHAR(50) NOT NULL,
    `status` ENUM('pending', 'available', 'withdrawn', 'cancelled') NOT NULL DEFAULT 'pending',
    `available_at` DATETIME DEFAULT NULL,
    `withdrawn_at` DATETIME DEFAULT NULL,
    `notes` TEXT DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `freelancer_id` (`freelancer_id`),
    KEY `order_id` (`order_id`),
    KEY `status` (`status`),
    KEY `created_at` (`created_at`),
    CONSTRAINT `fk_commissions_freelancer` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancers` (`id`) ON DELETE CASCADE,
    CONSTRAINT `fk_commissions_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_commissions_freelancer_status ON commissions(freelancer_id, status);
CREATE INDEX idx_commissions_status_created ON commissions(status, created_at DESC);
