-- ========================================
-- SITUNEO DIGITAL - User Profiles Table
-- Profil lengkap pengguna (data tambahan)
-- ========================================

CREATE TABLE IF NOT EXISTS `user_profiles` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) UNSIGNED NOT NULL,
    `company_name` VARCHAR(150) DEFAULT NULL,
    `company_address` TEXT DEFAULT NULL,
    `company_city` VARCHAR(100) DEFAULT NULL,
    `company_province` VARCHAR(100) DEFAULT NULL,
    `company_postal_code` VARCHAR(10) DEFAULT NULL,
    `nib` VARCHAR(50) DEFAULT NULL,
    `npwp` VARCHAR(50) DEFAULT NULL,
    `bio` TEXT DEFAULT NULL,
    `website` VARCHAR(255) DEFAULT NULL,
    `instagram` VARCHAR(100) DEFAULT NULL,
    `facebook` VARCHAR(100) DEFAULT NULL,
    `linkedin` VARCHAR(100) DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `user_id` (`user_id`),
    CONSTRAINT `fk_user_profiles_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk foreign key
CREATE INDEX idx_user_profiles_user_id ON user_profiles(user_id);
