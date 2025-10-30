# 🚀 BATCH 1 COMPLETE - SITUNEO DIGITAL

**Versi All-in-One - Langsung Jalan!**

---

## 📦 ISI PACKAGE INI

BATCH 1 COMPLETE adalah **foundation lengkap** yang sudah include:

✅ **Database** (17 tables - database.sql)
✅ **Configuration** (Database, Constants, Session, Language)
✅ **Authentication** (Login, Register, Logout, Forgot Password, Verify Email)
✅ **Helper Functions** (Auth, Format, Security, String, URL, Validation)
✅ **Layout Components** (Head, Navbar, Footer, Scripts)
✅ **Homepage** (index.php dengan hero, stats, services preview, CTA)
✅ **Assets** (CSS, JavaScript, Images)

---

## 🎯 CARA INSTALL (5 MENIT!)

### Step 1: Upload ke cPanel

1. **Download** file `BATCH-1-COMPLETE.zip`
2. **Login** ke cPanel Anda
3. **File Manager** → Pilih folder `public_html`
4. **Upload** file `BATCH-1-COMPLETE.zip`
5. **Extract** file ZIP (klik kanan → Extract)
6. **Masuk** ke folder `BATCH-1-COMPLETE` yang baru diextract
7. **SELECT ALL** isi folder (CTRL+A)
8. **MOVE** semua file ke folder `public_html` (satu tingkat ke atas)
   - Klik tombol **Move** di toolbar
   - Pilih destination: `/public_html/`
   - Klik **Move File(s)**
9. **Hapus** folder kosong `BATCH-1-COMPLETE` (opsional, untuk bersih-bersih)

**PENTING:** Yang dipindah adalah **ISI FOLDER**, bukan foldernya!

Struktur akhir harus seperti ini:
```
/public_html/
├── index.php          ← File langsung di sini!
├── database.sql       ← File langsung di sini!
├── config/            ← Folder langsung di sini!
├── includes/
├── components/
├── assets/
├── auth/
├── pages/
└── database/
```

**BUKAN seperti ini** (SALAH!):
```
/public_html/
└── BATCH-1-COMPLETE/   ← Jangan biarkan ada folder ini!
    ├── index.php
    └── ...
```

### Step 2: Edit Database Configuration

1. **Buka** file `/public_html/config/database.php`
2. **Edit** credentials database Anda:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'nrrskfvk_user_situneo_digital');  // ← Ganti ini
   define('DB_PASS', 'Devin1922$');                      // ← Ganti ini
   define('DB_NAME', 'nrrskfvk_situneo_digital');        // ← Ganti ini
   ```
3. **Save** file

### Step 3: Import Database

**Method 1: Copy-Paste (RECOMMENDED) ✅**

1. **Buka** file `database.sql` dengan Notepad/Text Editor
2. **Select All** (CTRL+A) → **Copy** (CTRL+C)
3. **Login** ke phpMyAdmin di cPanel
4. **Pilih** database Anda (klik nama database di sidebar kiri)
5. **Klik** tab **SQL** (BUKAN Import!)
6. **Paste** semua code (CTRL+V) ke textarea
7. **Klik** tombol **Go**
8. **Tunggu** 10-30 detik
9. **Harus muncul:** "17 queries successfully executed"

**Method 2: Import File**

1. **phpMyAdmin** → Pilih database → tab **Import**
2. **Choose file:** Pilih `database.sql`
3. **Character set:** `utf8mb4`
4. **Click** Go

### Step 4: Verify Installation

1. **Buka:** `https://situneo.my.id/` (ganti dengan domain Anda)
2. **Harus muncul:** Homepage dengan hero section, stats, services
3. **Check Navbar:** Harus ada NIB badge
4. **Check Footer:** Harus ada WhatsApp button

### Step 5: Test Login

1. **Buka:** `https://situneo.my.id/auth/login.php`
2. **Login dengan akun admin:**
   - Email: `admin@situneo.my.id`
   - Password: `admin123`
3. **Jika berhasil:** Akan redirect (mungkin error karena dashboard belum ada - ini normal!)
4. **Logout:** `https://situneo.my.id/auth/logout.php`

---

## ✅ VERIFICATION CHECKLIST

Setelah install, pastikan semua ini **WORKING**:

- [ ] ✅ Homepage (`/`) loads dengan benar
- [ ] ✅ Navbar muncul dengan NIB badge
- [ ] ✅ Footer muncul dengan WhatsApp button floating
- [ ] ✅ Network animation berjalan di background
- [ ] ✅ Stats counter muncul (150+, 500+, 99%, 5 Tahun)
- [ ] ✅ 4 Service cards muncul (Website, Marketing, AI, Branding)
- [ ] ✅ Database ada 17 tables di phpMyAdmin
- [ ] ✅ Table `users` ada 1 row (Admin)
- [ ] ✅ Table `service_categories` ada 8 rows
- [ ] ✅ Table `settings` ada 8 rows
- [ ] ✅ Login page (`/auth/login.php`) bisa dibuka
- [ ] ✅ Register page (`/auth/register.php`) bisa dibuka
- [ ] ✅ Bisa login dengan admin credentials

**Jika semua ✅ = BATCH 1 SUKSES!** 🎉

---

## 📂 STRUKTUR FILE

```
/public_html/
│
├── index.php                     # Homepage
├── database.sql                  # Database 17 tables (import ini!)
│
├── config/                       # ⚙️ Configuration
│   ├── database.php              # Database connection (EDIT INI!)
│   ├── constants.php             # System constants (80+ constants)
│   ├── session.php               # Session management
│   └── language.php              # Multi-language support
│
├── includes/                     # 📚 Core Functions
│   ├── init.php                  # Bootstrap file (load semua)
│   └── functions/
│       ├── auth.php              # Authentication functions
│       ├── format.php            # Data formatting (rupiah, date, etc)
│       ├── security.php          # Security (CSRF, XSS, sanitize)
│       ├── string.php            # String helpers
│       ├── url.php               # URL helpers (WhatsApp, etc)
│       └── validation.php        # Input validation
│
├── components/                   # 🧩 Reusable Components
│   └── layout/
│       ├── head.php              # HTML head (meta, CSS links)
│       ├── navbar.php            # Navigation bar (premium design)
│       ├── footer.php            # Footer + WhatsApp button
│       └── scripts.php           # JavaScript includes
│
├── assets/                       # 🎨 Static Assets
│   ├── css/
│   │   ├── reset.css             # CSS reset
│   │   ├── variables.css         # CSS variables (colors, fonts)
│   │   ├── layout.css            # Layout styles
│   │   ├── components.css        # Component styles
│   │   └── animations.css        # Keyframe animations
│   ├── js/
│   │   ├── main.js               # Main JavaScript
│   │   └── network-animation.js  # Particle network animation
│   └── img/                      # Images (logo, etc)
│
├── auth/                         # 🔐 Authentication Pages
│   ├── login.php                 # Login page
│   ├── register.php              # Registration (Client/Partner)
│   ├── logout.php                # Logout handler
│   ├── forgot-password.php       # Password reset request
│   └── verify-email.php          # Email verification
│
├── pages/                        # 📄 Public Pages (BATCH 2 nanti)
│   └── (about.php, contact.php, faq.php akan ditambah di BATCH 2)
│
└── database/                     # (Folder cadangan, bisa dihapus)
```

---

## 🗄️ DATABASE SCHEMA (17 Tables)

### Core Tables (5)
1. **users** - Main user table (id, name, email, password, phone, role, status)
2. **user_profiles** - Extended user info (address, company, etc)
3. **user_verifications** - Email/phone verification tokens
4. **password_resets** - Password reset tokens
5. **sessions** - Session tracking

### Partner System (4)
6. **partners** - Partner data (tier, commission_rate, total_orders, balance)
7. **partner_tier_history** - Tier upgrade/downgrade history
8. **partner_commissions** - Commission per order
9. **partner_withdrawals** - Withdrawal requests (amount, status, proof)

### Service & Order (5)
10. **service_categories** - 8 divisions (Website, Marketing, AI, etc)
11. **services** - Service catalog (107 services)
12. **orders** - Client orders (order_number, status, total_amount)
13. **order_items** - Order line items (service, price, quantity)
14. **order_payments** - Payment tracking (amount, method, proof, status)

### System Tables (3)
15. **transactions** - Financial transactions (debit/credit tracking)
16. **activity_logs** - Activity logging (user actions, IP, user agent)
17. **settings** - System configuration (site_name, maintenance_mode, etc)

---

## 🔐 DEFAULT CREDENTIALS

### Admin Account
```
Email: admin@situneo.my.id
Password: admin123
Role: Admin (Level 3)
Status: Active
```

**⚠️ WAJIB GANTI PASSWORD** setelah login pertama kali!

### Database
```
Host: localhost
Database: nrrskfvk_situneo_digital
User: nrrskfvk_user_situneo_digital
Password: Devin1922$
```

---

## 🎨 DESIGN SYSTEM

### Colors
```css
Primary Gold: #FFB400
Secondary Gold: #FFD700
Primary Blue: #1E5C99
Secondary Blue: #0F3057
Dark Background: #1A1A2E
Light Text: #F8F9FA
```

### Typography
- **Headings:** Plus Jakarta Sans (bold, modern)
- **Body:** Inter (readable, professional)

### UI Features
- Glassmorphism navbar (backdrop blur)
- Network particle animation
- Gradient backgrounds
- Smooth AOS animations
- Mobile responsive (Bootstrap 5.3.3)

---

## 🚨 TROUBLESHOOTING

### Problem 1: Homepage blank putih

**Penyebab:** PHP error atau database connection failed

**Solusi:**
1. Check `config/database.php` - pastikan credentials benar
2. Pastikan database sudah dibuat di cPanel
3. Pastikan user database punya akses ke database
4. Check PHP version minimal 7.4

### Problem 2: Error "Cannot connect to database"

**Penyebab:** Database credentials salah atau database belum dibuat

**Solusi:**
1. Buat database dulu di cPanel → MySQL Databases
2. Buat user database
3. Assign user ke database (All Privileges)
4. Update `config/database.php` dengan credentials yang benar

### Problem 3: Login redirect error

**Penyebab:** Dashboard belum ada (normal!)

**Solusi:**
Ini normal karena BATCH 1 belum include dashboard. Dashboard akan ditambah di BATCH berikutnya. Login tetap berhasil, tapi redirect error karena file tujuan belum ada.

### Problem 4: Navbar atau Footer tidak muncul

**Penyebab:** File component tidak ketemu atau path salah

**Solusi:**
1. Pastikan struktur folder benar (lihat di atas)
2. Pastikan file dipindah ke `/public_html/`, bukan di subfolder
3. Check file `components/layout/navbar.php` dan `footer.php` exist

### Problem 5: CSS tidak load (tampilan rusak)

**Penyebab:** Path assets salah atau file CSS tidak ketemu

**Solusi:**
1. Check folder `assets/css/` ada semua file CSS
2. Clear browser cache (CTRL+F5)
3. Check di browser console (F12) ada error?

---

## 🔜 NEXT STEPS

Setelah BATCH 1 berhasil, Anda siap untuk:

### BATCH 2 - Public Pages (Coming Next!)
- About page (Tentang Kami)
- Contact page (Kontak + Form)
- FAQ page (Pertanyaan Umum)
- Services page (Katalog 107 layanan)
- Portfolio page (Showcase 50 portfolio)
- Pricing page (8 paket harga)

**BATCH 2 akan berupa addon files** yang tinggal ditambahkan ke struktur BATCH 1.

---

## 📞 SUPPORT

### Developer
- **WhatsApp:** +62 831-7386-8915
- **Email:** vins@situneo.my.id

### Company
- **Website:** https://situneo.my.id
- **Support:** support@situneo.my.id
- **NIB:** 20250926145704515453

---

## 📝 CHANGELOG

### Version 1.0 (2025-10-29)
- ✅ Initial release
- ✅ All-in-one structure (no nested BATCH folders)
- ✅ 17-table database included
- ✅ Authentication system complete
- ✅ Homepage with premium design
- ✅ All paths fixed and tested

---

**Created:** 2025-10-29
**Status:** Production Ready
**Total Files:** 25+ files

**🚀 Selamat deploy! Jika ada masalah, hubungi support.**
