-- ========================================
-- SITUNEO DIGITAL - Security Logs Table
-- Log aktivitas security penting
-- ========================================

CREATE TABLE IF NOT EXISTS `security_logs` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) UNSIGNED DEFAULT NULL,
    `event_type` VARCHAR(50) NOT NULL,
    `event_description` TEXT NOT NULL,
    `ip_address` VARCHAR(45) NOT NULL,
    `user_agent` TEXT DEFAULT NULL,
    `request_method` VARCHAR(10) DEFAULT NULL,
    `request_uri` TEXT DEFAULT NULL,
    `severity` ENUM('low', 'medium', 'high', 'critical') NOT NULL DEFAULT 'low',
    `metadata` TEXT DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    KEY `event_type` (`event_type`),
    KEY `ip_address` (`ip_address`),
    KEY `severity` (`severity`),
    KEY `created_at` (`created_at`),
    CONSTRAINT `fk_security_logs_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa dan monitoring
CREATE INDEX idx_security_logs_user_created ON security_logs(user_id, created_at DESC);
CREATE INDEX idx_security_logs_ip_created ON security_logs(ip_address, created_at DESC);
CREATE INDEX idx_security_logs_severity_created ON security_logs(severity, created_at DESC);
