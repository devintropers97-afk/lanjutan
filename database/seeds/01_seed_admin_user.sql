-- ========================================
-- SITUNEO DIGITAL - Seed Admin User
-- User admin default untuk login pertama kali
-- ========================================

-- Password: admin123 (hash bcrypt dengan cost 12)
INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `phone`, `status`, `email_verified`, `email_verified_at`, `created_at`) VALUES
(1, 'admin', 'Admin SITUNEO', 'admin@situneo.my.id', '$2y$12$LQv3c1yycUPdvFHI3YDeXuKuR9.3YW5U3EzB.EJ9vDxBd8mjJJKSi', '6283173868915', 'active', 1, NOW(), NOW());

-- Profile admin
INSERT INTO `user_profiles` (`user_id`, `company_name`, `company_address`, `company_city`, `company_province`, `nib`, `created_at`) VALUES
(1, 'SITUNEO DIGITAL', 'Indonesia', 'Jakarta', 'DKI Jakarta', '20250-9261-4570-4515-5453', NOW());
