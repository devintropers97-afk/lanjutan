-- ========================================
-- SITUNEO DIGITAL - Payments Table
-- Pembayaran dari client
-- ========================================

CREATE TABLE IF NOT EXISTS `payments` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `order_id` INT(11) UNSIGNED NOT NULL,
    `payment_code` VARCHAR(50) NOT NULL,
    `payment_method` VARCHAR(50) NOT NULL,
    `payment_channel` VARCHAR(50) DEFAULT NULL,
    `amount` DECIMAL(15,2) NOT NULL,
    `admin_fee` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    `total_amount` DECIMAL(15,2) NOT NULL,
    `status` ENUM('pending', 'paid', 'verified', 'failed', 'expired', 'refunded') NOT NULL DEFAULT 'pending',
    `payment_proof` VARCHAR(255) DEFAULT NULL,
    `payment_details` TEXT DEFAULT NULL,
    `xendit_id` VARCHAR(100) DEFAULT NULL,
    `xendit_response` TEXT DEFAULT NULL,
    `verified_by` INT(11) UNSIGNED DEFAULT NULL,
    `verified_at` DATETIME DEFAULT NULL,
    `paid_at` DATETIME DEFAULT NULL,
    `expires_at` DATETIME DEFAULT NULL,
    `notes` TEXT DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `payment_code` (`payment_code`),
    KEY `order_id` (`order_id`),
    KEY `status` (`status`),
    KEY `payment_method` (`payment_method`),
    KEY `xendit_id` (`xendit_id`),
    KEY `verified_by` (`verified_by`),
    CONSTRAINT `fk_payments_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT,
    CONSTRAINT `fk_payments_verified_by` FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_payments_order_status ON payments(order_id, status);
CREATE INDEX idx_payments_status_created ON payments(status, created_at DESC);
