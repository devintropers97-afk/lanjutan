-- ========================================
-- SITUNEO DIGITAL - Contact Messages Table
-- Pesan dari form kontak
-- ========================================

CREATE TABLE IF NOT EXISTS `contact_messages` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(20) DEFAULT NULL,
    `company` VARCHAR(150) DEFAULT NULL,
    `subject` VARCHAR(200) NOT NULL,
    `message` TEXT NOT NULL,
    `status` ENUM('unread', 'read', 'replied', 'archived') NOT NULL DEFAULT 'unread',
    `replied_by` INT(11) UNSIGNED DEFAULT NULL,
    `replied_at` DATETIME DEFAULT NULL,
    `reply_message` TEXT DEFAULT NULL,
    `ip_address` VARCHAR(45) NOT NULL,
    `user_agent` TEXT DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `email` (`email`),
    KEY `status` (`status`),
    KEY `created_at` (`created_at`),
    KEY `replied_by` (`replied_by`),
    CONSTRAINT `fk_contact_messages_replied_by` FOREIGN KEY (`replied_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_contact_messages_status_created ON contact_messages(status, created_at DESC);
