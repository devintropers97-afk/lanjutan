-- ========================================
-- SITUNEO DIGITAL - Seed Payment Methods
-- Metode pembayaran default
-- ========================================

INSERT INTO `payment_methods` (`code`, `name`, `type`, `account_number`, `account_name`, `admin_fee_type`, `admin_fee_amount`, `instructions`, `is_active`, `order_position`) VALUES
-- Bank Transfer
('bca', 'BCA', 'bank_transfer', '2750424018', 'Devin Prasetyo Hermawan', 'fixed', 0,
'1. Transfer ke rekening BCA: 2750424018 a.n. Devin Prasetyo Hermawan
2. Upload bukti transfer
3. Tunggu verifikasi dari admin (maks 1x24 jam)', 1, 1),

-- E-Wallet & QRIS
('qris', 'QRIS', 'qris', NULL, 'SITUNEO DIGITAL', 'fixed', 0,
'1. Scan QR Code yang tersedia
2. Lakukan pembayaran sesuai nominal
3. Upload bukti pembayaran
4. Tunggu verifikasi dari admin', 1, 2),

('gopay', 'GoPay', 'e_wallet', '6283173868915', 'Devin Prasetyo', 'fixed', 0,
'1. Transfer ke nomor GoPay: 083173868915
2. Upload bukti transfer
3. Tunggu verifikasi dari admin', 1, 3),

('ovo', 'OVO', 'e_wallet', '6283173868915', 'Devin Prasetyo', 'fixed', 0,
'1. Transfer ke nomor OVO: 083173868915
2. Upload bukti transfer
3. Tunggu verifikasi dari admin', 1, 4),

('dana', 'DANA', 'e_wallet', '6283173868915', 'Devin Prasetyo', 'fixed', 0,
'1. Transfer ke nomor DANA: 083173868915
2. Upload bukti transfer
3. Tunggu verifikasi dari admin', 1, 5);
