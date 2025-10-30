-- ========================================
-- SITUNEO DIGITAL - Payment Methods Table
-- Metode pembayaran yang tersedia
-- ========================================

CREATE TABLE IF NOT EXISTS `payment_methods` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `code` VARCHAR(50) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `type` ENUM('bank_transfer', 'e_wallet', 'qris', 'credit_card', 'other') NOT NULL,
    `account_number` VARCHAR(100) DEFAULT NULL,
    `account_name` VARCHAR(150) DEFAULT NULL,
    `logo` VARCHAR(255) DEFAULT NULL,
    `admin_fee_type` ENUM('fixed', 'percentage') NOT NULL DEFAULT 'fixed',
    `admin_fee_amount` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    `instructions` TEXT DEFAULT NULL,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `order_position` INT(11) NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `code` (`code`),
    KEY `is_active` (`is_active`),
    KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_payment_methods_active_order ON payment_methods(is_active, order_position);
