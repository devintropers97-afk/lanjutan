-- ========================================
-- SITUNEO DIGITAL - Orders Table
-- Order dari client
-- ========================================

CREATE TABLE IF NOT EXISTS `orders` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `order_number` VARCHAR(50) NOT NULL,
    `user_id` INT(11) UNSIGNED NOT NULL,
    `freelancer_id` INT(11) UNSIGNED DEFAULT NULL,
    `status` ENUM('pending', 'paid', 'processing', 'revision', 'completed', 'cancelled', 'refunded') NOT NULL DEFAULT 'pending',
    `customer_name` VARCHAR(100) NOT NULL,
    `customer_email` VARCHAR(100) NOT NULL,
    `customer_phone` VARCHAR(20) DEFAULT NULL,
    `customer_company` VARCHAR(150) DEFAULT NULL,
    `subtotal` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    `discount` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    `tax` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    `total_amount` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    `notes` TEXT DEFAULT NULL,
    `admin_notes` TEXT DEFAULT NULL,
    `requirements` TEXT DEFAULT NULL,
    `files` TEXT DEFAULT NULL,
    `deliverables` TEXT DEFAULT NULL,
    `started_at` DATETIME DEFAULT NULL,
    `completed_at` DATETIME DEFAULT NULL,
    `cancelled_at` DATETIME DEFAULT NULL,
    `cancellation_reason` TEXT DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `order_number` (`order_number`),
    KEY `user_id` (`user_id`),
    KEY `freelancer_id` (`freelancer_id`),
    KEY `status` (`status`),
    KEY `created_at` (`created_at`),
    CONSTRAINT `fk_orders_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT,
    CONSTRAINT `fk_orders_freelancer` FOREIGN KEY (`freelancer_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index untuk performa
CREATE INDEX idx_orders_user_status ON orders(user_id, status);
CREATE INDEX idx_orders_freelancer_status ON orders(freelancer_id, status);
CREATE INDEX idx_orders_status_created ON orders(status, created_at DESC);
