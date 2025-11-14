-- ========================================
-- SITUNEO DIGITAL - Order Items Table
-- Item-item dalam order (bisa multiple services)
-- ========================================

CREATE TABLE IF NOT EXISTS `order_items` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `order_id` INT(11) UNSIGNED NOT NULL,
    `service_id` INT(11) UNSIGNED NOT NULL,
    `package_id` INT(11) UNSIGNED DEFAULT NULL,
    `service_name` VARCHAR(150) NOT NULL,
    `package_name` VARCHAR(100) DEFAULT NULL,
    `quantity` INT(11) NOT NULL DEFAULT 1,
    `price` DECIMAL(15,2) NOT NULL,
    `subtotal` DECIMAL(15,2) NOT NULL,
    `features` TEXT DEFAULT NULL,
    `duration_days` INT(11) NOT NULL DEFAULT 7,
    `revisions` INT(11) NOT NULL DEFAULT 2,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `order_id` (`order_id`),
    KEY `service_id` (`service_id`),
    KEY `package_id` (`package_id`),
    CONSTRAINT `fk_order_items_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
    CONSTRAINT `fk_order_items_service` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE RESTRICT,
    CONSTRAINT `fk_order_items_package` FOREIGN KEY (`package_id`) REFERENCES `service_packages` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_order_items_order ON order_items(order_id);
CREATE INDEX idx_order_items_service ON order_items(service_id);
