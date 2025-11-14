-- ========================================
-- SITUNEO DIGITAL - Freelancers Table
-- Data partner/freelancer
-- ========================================

CREATE TABLE IF NOT EXISTS `freelancers` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) UNSIGNED NOT NULL,
    `referral_code` VARCHAR(50) NOT NULL,
    `tier` ENUM('tier_1', 'tier_2', 'tier_3', 'tier_max') NOT NULL DEFAULT 'tier_1',
    `commission_rate` DECIMAL(5,2) NOT NULL DEFAULT 30.00,
    `total_orders` INT(11) NOT NULL DEFAULT 0,
    `total_orders_this_month` INT(11) NOT NULL DEFAULT 0,
    `total_earnings` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    `available_balance` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    `withdrawn_balance` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    `pending_balance` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    `bank_name` VARCHAR(100) DEFAULT NULL,
    `bank_account_number` VARCHAR(50) DEFAULT NULL,
    `bank_account_name` VARCHAR(150) DEFAULT NULL,
    `status` ENUM('active', 'inactive', 'suspended') NOT NULL DEFAULT 'active',
    `verified` TINYINT(1) NOT NULL DEFAULT 0,
    `verified_at` DATETIME DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `user_id` (`user_id`),
    UNIQUE KEY `referral_code` (`referral_code`),
    KEY `tier` (`tier`),
    KEY `status` (`status`),
    KEY `verified` (`verified`),
    CONSTRAINT `fk_freelancers_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_freelancers_referral_code ON freelancers(referral_code);
CREATE INDEX idx_freelancers_tier_status ON freelancers(tier, status);
