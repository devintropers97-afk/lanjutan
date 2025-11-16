-- ========================================
-- SITUNEO DIGITAL - Activity Logs Table
-- Log semua aktivitas pengguna
-- ========================================

CREATE TABLE IF NOT EXISTS `activity_logs` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) UNSIGNED DEFAULT NULL,
    `action` VARCHAR(100) NOT NULL,
    `description` TEXT NOT NULL,
    `model` VARCHAR(50) DEFAULT NULL,
    `model_id` INT(11) UNSIGNED DEFAULT NULL,
    `old_data` TEXT DEFAULT NULL,
    `new_data` TEXT DEFAULT NULL,
    `ip_address` VARCHAR(45) NOT NULL,
    `user_agent` TEXT DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    KEY `action` (`action`),
    KEY `model` (`model`),
    KEY `model_id` (`model_id`),
    KEY `created_at` (`created_at`),
    CONSTRAINT `fk_activity_logs_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_activity_logs_user_created ON activity_logs(user_id, created_at DESC);
CREATE INDEX idx_activity_logs_model ON activity_logs(model, model_id);
