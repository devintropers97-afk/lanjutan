-- ========================================
-- SITUNEO DIGITAL - Login Logs Table
-- Log aktivitas login pengguna
-- ========================================

CREATE TABLE IF NOT EXISTS `login_logs` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) UNSIGNED DEFAULT NULL,
    `email` VARCHAR(100) NOT NULL,
    `status` ENUM('success', 'failed') NOT NULL,
    `ip_address` VARCHAR(45) NOT NULL,
    `user_agent` TEXT DEFAULT NULL,
    `browser` VARCHAR(50) DEFAULT NULL,
    `os` VARCHAR(50) DEFAULT NULL,
    `device` VARCHAR(50) DEFAULT NULL,
    `failure_reason` VARCHAR(255) DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    KEY `email` (`email`),
    KEY `status` (`status`),
    KEY `ip_address` (`ip_address`),
    KEY `created_at` (`created_at`),
    CONSTRAINT `fk_login_logs_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk monitoring security
CREATE INDEX idx_login_logs_user_created ON login_logs(user_id, created_at DESC);
CREATE INDEX idx_login_logs_ip_status ON login_logs(ip_address, status, created_at DESC);
