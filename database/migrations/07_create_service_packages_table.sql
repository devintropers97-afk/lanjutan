-- ========================================
-- SITUNEO DIGITAL - Service Packages Table
-- Paket layanan (Basic, Standard, Premium)
-- ========================================

CREATE TABLE IF NOT EXISTS `service_packages` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `service_id` INT(11) UNSIGNED NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `description` TEXT DEFAULT NULL,
    `features` TEXT DEFAULT NULL,
    `price` DECIMAL(15,2) NOT NULL,
    `duration_days` INT(11) NOT NULL DEFAULT 7,
    `revisions` INT(11) NOT NULL DEFAULT 2,
    `is_popular` TINYINT(1) NOT NULL DEFAULT 0,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `order_position` INT(11) NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `service_id` (`service_id`),
    KEY `is_active` (`is_active`),
    CONSTRAINT `fk_service_packages_service` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_service_packages_service_active ON service_packages(service_id, is_active, order_position);
