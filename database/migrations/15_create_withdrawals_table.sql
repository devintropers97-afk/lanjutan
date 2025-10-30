-- ========================================
-- SITUNEO DIGITAL - Withdrawals Table
-- Penarikan dana freelancer
-- ========================================

CREATE TABLE IF NOT EXISTS `withdrawals` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `freelancer_id` INT(11) UNSIGNED NOT NULL,
    `withdrawal_code` VARCHAR(50) NOT NULL,
    `amount` DECIMAL(15,2) NOT NULL,
    `admin_fee` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    `total_amount` DECIMAL(15,2) NOT NULL,
    `bank_name` VARCHAR(100) NOT NULL,
    `bank_account_number` VARCHAR(50) NOT NULL,
    `bank_account_name` VARCHAR(150) NOT NULL,
    `status` ENUM('pending', 'processing', 'completed', 'rejected', 'cancelled') NOT NULL DEFAULT 'pending',
    `processed_by` INT(11) UNSIGNED DEFAULT NULL,
    `processed_at` DATETIME DEFAULT NULL,
    `completed_at` DATETIME DEFAULT NULL,
    `rejection_reason` TEXT DEFAULT NULL,
    `notes` TEXT DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `withdrawal_code` (`withdrawal_code`),
    KEY `freelancer_id` (`freelancer_id`),
    KEY `status` (`status`),
    KEY `processed_by` (`processed_by`),
    KEY `created_at` (`created_at`),
    CONSTRAINT `fk_withdrawals_freelancer` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancers` (`id`) ON DELETE RESTRICT,
    CONSTRAINT `fk_withdrawals_processed_by` FOREIGN KEY (`processed_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_withdrawals_freelancer_status ON withdrawals(freelancer_id, status);
CREATE INDEX idx_withdrawals_status_created ON withdrawals(status, created_at DESC);
