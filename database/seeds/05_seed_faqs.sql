-- ========================================
-- SITUNEO DIGITAL - Seed FAQs
-- Frequently Asked Questions default
-- ========================================

INSERT INTO `faqs` (`category`, `question`, `answer`, `is_active`, `order_position`) VALUES
-- General
('general', 'Apa itu SITUNEO DIGITAL?', 'SITUNEO DIGITAL adalah perusahaan penyedia layanan digital yang berfokus pada pembuatan website, aplikasi mobile, digital marketing, dan solusi IT untuk bisnis. Kami berkomitmen memberikan solusi digital terbaik untuk membantu bisnis Anda berkembang.', 1, 1),

('general', 'Layanan apa saja yang tersedia?', 'Kami menyediakan berbagai layanan digital meliputi: Website Development (Company Profile, E-Commerce, Custom Web App), Mobile App Development (Android & iOS), UI/UX Design, Digital Marketing, SEO Services, Content Writing, IT Consulting, serta Maintenance & Support.', 1, 2),

('general', 'Apakah ada garansi untuk layanan yang diberikan?', 'Ya, kami memberikan garansi untuk setiap project yang kami kerjakan. Garansi mencakup bug fixing dan technical support sesuai dengan paket yang Anda pilih. Detail garansi akan dijelaskan dalam proposal project.', 1, 3),

-- Payment
('payment', 'Bagaimana cara pembayaran?', 'Kami menerima pembayaran melalui transfer bank (BCA), e-wallet (GoPay, OVO, DANA), dan QRIS. Pembayaran dapat dilakukan secara penuh atau dengan sistem termin sesuai kesepakatan.', 1, 4),

('payment', 'Apakah bisa membayar dengan sistem cicilan?', 'Ya, untuk project dengan nilai tertentu kami menyediakan sistem pembayaran termin/cicilan. Biasanya dibagi menjadi 3 tahap: DP 30%, Progress 40%, dan Pelunasan 30%. Detail pembayaran akan disesuaikan dengan scope project.', 1, 5),

('payment', 'Berapa lama proses verifikasi pembayaran?', 'Setelah Anda melakukan pembayaran dan upload bukti transfer, tim kami akan melakukan verifikasi maksimal 1x24 jam. Untuk mempercepat proses, pastikan upload bukti transfer yang jelas dan lengkap.', 1, 6),

-- Process
('process', 'Berapa lama waktu pengerjaan project?', 'Waktu pengerjaan tergantung kompleksitas dan scope project. Website company profile sederhana: 7-14 hari. Website e-commerce: 21-30 hari. Aplikasi mobile: 30-60 hari. Timeline detail akan dijelaskan dalam proposal.', 1, 7),

('process', 'Bagaimana proses pengerjaan project?', 'Proses pengerjaan: 1) Konsultasi & analisa kebutuhan, 2) Pembuatan proposal & quotation, 3) Deal & pembayaran DP, 4) Design & development, 5) Review & revisi, 6) Testing & launching, 7) Training & handover, 8) Support & maintenance.', 1, 8),

('process', 'Apakah saya bisa request revisi?', 'Ya, setiap paket layanan kami sudah termasuk revisi. Jumlah revisi tergantung paket yang dipilih (biasanya 2-3x revisi). Revisi major yang mengubah konsep awal akan dikenakan biaya tambahan.', 1, 9),

-- Freelancer
('freelancer', 'Bagaimana cara menjadi partner/freelancer?', 'Anda bisa mendaftar sebagai freelancer melalui halaman registrasi dan pilih role "Freelancer". Setelah registrasi, tim kami akan melakukan verifikasi. Setelah disetujui, Anda bisa mulai mendapatkan project dan komisi.', 1, 10),

('freelancer', 'Berapa komisi yang didapat freelancer?', 'Sistem komisi kami menggunakan tier system: Tier 1 (30%), Tier 2 (40%), Tier 3 (50%), dan Tier MAX (55%). Tier naik berdasarkan jumlah order yang berhasil diselesaikan setiap bulannya.', 1, 11),

('freelancer', 'Kapan komisi bisa ditarik?', 'Komisi akan available untuk ditarik setelah 7 hari dari order selesai (untuk memastikan tidak ada komplain dari client). Minimum penarikan Rp 100.000 dengan biaya admin Rp 5.000.', 1, 12),

-- Technical
('technical', 'Apakah website yang dibuat SEO friendly?', 'Ya, semua website yang kami buat sudah mengikuti best practice SEO meliputi: struktur URL yang clean, meta tags optimization, responsive design, fast loading speed, sitemap, dan schema markup.', 1, 13),

('technical', 'Apakah saya mendapat akses penuh ke website?', 'Ya, setelah project selesai Anda akan mendapatkan full access ke website termasuk: source code (opsional), admin panel, database, hosting cpanel (jika pakai hosting kami), dan dokumentasi lengkap.', 1, 14),

('technical', 'Bagaimana dengan keamanan website?', 'Keamanan adalah prioritas kami. Setiap website dilengkapi dengan: SSL certificate, protection dari SQL injection & XSS, regular backup, secure authentication, dan security updates berkala.', 1, 15);
