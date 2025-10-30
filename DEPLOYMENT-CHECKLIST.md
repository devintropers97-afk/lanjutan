# ✅ DEPLOYMENT CHECKLIST - SITUNEO DIGITAL

**Gunakan checklist ini untuk deploy website dengan benar!**

---

## 📦 BATCH 1 - FOUNDATION (STATUS: ✅ TESTED & WORKING)

### Upload Files
- [ ] Download `BATCH-1-PUBLIC-PAGES-v2.zip`
- [ ] Extract ke komputer
- [ ] Upload folder `BATCH-1-PUBLIC-PAGES` ke `/public_html/`
- [ ] Upload file `index.php` ke `/public_html/`

### Konfigurasi Database
- [ ] Edit file `BATCH-1-PUBLIC-PAGES/config/database.php`
- [ ] Pastikan credentials benar:
  ```php
  define('DB_HOST', 'localhost');
  define('DB_USER', 'nrrskfvk_user_situneo_digital');
  define('DB_PASS', 'Devin1922$');
  define('DB_NAME', 'nrrskfvk_situneo_digital');
  ```

### Test BATCH 1
- [ ] Buka: `https://situneo.my.id/`
- [ ] Homepage muncul dengan benar (hero, stats, services)
- [ ] Navbar muncul dengan NIB badge
- [ ] Footer muncul dengan WhatsApp button

**✅ BATCH 1 CONFIRMED WORKING by User: "ok sudah berjalan aman"**

---

## 📦 BATCH 2 - PUBLIC PAGES (STATUS: ⚠️ NEEDS TESTING)

### Upload Files
- [ ] Download `BATCH-2-PUBLIC-PAGES-v2.zip` (sudah diperbaiki paths!)
- [ ] Extract ke komputer
- [ ] Upload folder `BATCH-2-PUBLIC-PAGES` ke `/public_html/`

### Test dengan test.php DULU!
- [ ] Upload file `test.php` ke `/public_html/`
- [ ] Buka: `https://situneo.my.id/test.php`
- [ ] **SCREENSHOT HASILNYA!**
- [ ] Cek semua test harus hijau (✅):
  - ✅ Test 1: PHP Version
  - ✅ Test 2: BATCH-1 Files
  - ✅ Test 3: Load BATCH-1 Init
  - ✅ Test 4: Constants
  - ✅ Test 5: Database Connection
  - ✅ Test 6: Helper Functions
  - ✅ Test 7: BATCH-2 Files

### Jika test.php SEMUA HIJAU (✅), test halaman:
- [ ] `https://situneo.my.id/BATCH-2-PUBLIC-PAGES/pages/about.php`
- [ ] `https://situneo.my.id/BATCH-2-PUBLIC-PAGES/pages/contact.php`
- [ ] `https://situneo.my.id/BATCH-2-PUBLIC-PAGES/pages/faq.php`

### ⚠️ Jika masih BIRU BLANK:
- Screenshot hasil test.php dan kirim ke developer
- Jangan lanjut ke BATCH 3 dulu

---

## 📦 BATCH 3 - DATABASE & AUTHENTICATION (STATUS: ⚠️ NEEDS TESTING)

### Step 1: Import Database

**PENTING: Gunakan `database-full.sql` (17 tables), BUKAN `database-simple.sql`!**

**Method 1: Copy-Paste (RECOMMENDED) ✅**
- [ ] Buka file `database-full.sql` dengan Notepad/Text Editor
- [ ] CTRL+A (select all) → CTRL+C (copy)
- [ ] Login phpMyAdmin di cPanel
- [ ] Pilih database: `nrrskfvk_situneo_digital`
- [ ] Klik tab **SQL** (BUKAN Import!)
- [ ] CTRL+V (paste) semua code SQL
- [ ] Klik tombol **Go**
- [ ] Tunggu 10-30 detik
- [ ] Harus muncul: "17 queries successfully executed"

**Method 2: Import File (Alternative)**
- [ ] phpMyAdmin → tab Import
- [ ] Choose file: `database-full.sql`
- [ ] Character set: `utf8mb4`
- [ ] Click **Go**

### Step 2: Verify Database
- [ ] Di phpMyAdmin, lihat daftar tables
- [ ] **HARUS ADA 17 TABLES:**
  - [ ] users
  - [ ] user_profiles
  - [ ] user_verifications
  - [ ] password_resets
  - [ ] sessions
  - [ ] partners
  - [ ] partner_tier_history
  - [ ] partner_commissions
  - [ ] partner_withdrawals
  - [ ] service_categories
  - [ ] services
  - [ ] orders
  - [ ] order_items
  - [ ] order_payments
  - [ ] transactions
  - [ ] activity_logs
  - [ ] settings

- [ ] Click table **users** → Browse → Harus ada 1 row (Admin)
- [ ] Click table **service_categories** → Browse → Harus ada 8 rows
- [ ] Click table **settings** → Browse → Harus ada 8 rows

### Step 3: Upload Auth Files
- [ ] Upload folder `BATCH-3-AUTH-DATABASE` ke `/public_html/`
- [ ] Pastikan struktur:
  ```
  /public_html/
  ├── BATCH-1-PUBLIC-PAGES/
  ├── BATCH-2-PUBLIC-PAGES/
  └── BATCH-3-AUTH-DATABASE/
      ├── auth/
      │   ├── login.php
      │   ├── register.php
      │   ├── logout.php
      │   ├── forgot-password.php
      │   └── verify-email.php
      └── database/
  ```

### Step 4: Test Authentication
- [ ] Buka: `https://situneo.my.id/BATCH-3-AUTH-DATABASE/auth/login.php`
- [ ] Test login dengan akun admin:
  - Email: `admin@situneo.my.id`
  - Password: `admin123`
- [ ] Login berhasil dan redirect ke dashboard (akan dibuat di BATCH 4)
- [ ] Test logout
- [ ] Test register page

---

## 🎯 FINAL STRUCTURE

Setelah semua batch diupload, struktur folder harus seperti ini:

```
/public_html/
├── index.php                          # Homepage
├── test.php                           # Test diagnostic (aman dihapus setelah test)
│
├── BATCH-1-PUBLIC-PAGES/              # ✅ FOUNDATION
│   ├── config/
│   │   ├── database.php
│   │   ├── constants.php
│   │   └── session.php
│   ├── includes/
│   │   ├── init.php
│   │   └── functions/
│   │       ├── auth.php
│   │       ├── format.php
│   │       └── security.php
│   ├── components/
│   │   └── layout/
│   │       ├── head.php
│   │       ├── navbar.php
│   │       └── footer.php
│   └── assets/
│       ├── css/
│       ├── js/
│       └── img/
│
├── BATCH-2-PUBLIC-PAGES/              # ⚠️ PUBLIC PAGES (Test dulu!)
│   ├── pages/
│   │   ├── about.php
│   │   ├── contact.php
│   │   └── faq.php
│   ├── components/
│   └── assets/
│
└── BATCH-3-AUTH-DATABASE/             # ⚠️ DATABASE & AUTH (Test dulu!)
    ├── auth/
    │   ├── login.php
    │   ├── register.php
    │   └── ...
    └── database/
        ├── database-simple.sql        # 4 tables (untuk test)
        └── database-full.sql          # 17 tables (GUNAKAN INI!)
```

---

## 🚨 TROUBLESHOOTING

### Problem: Halaman biru blank (BATCH 2)
**Solusi:**
1. Pastikan BATCH 1 sudah diupload dengan benar
2. Jalankan `test.php` dan screenshot hasilnya
3. Pastikan menggunakan `BATCH-2-PUBLIC-PAGES-v2.zip` (yang sudah diperbaiki paths)

### Problem: SQL import error
**Solusi:**
1. Jangan gunakan Import file
2. Gunakan method **Copy-Paste** via tab SQL
3. Gunakan `database-full.sql` (17 tables)
4. Pastikan charset: utf8mb4

### Problem: Database connection failed
**Solusi:**
1. Cek credentials di `BATCH-1-PUBLIC-PAGES/config/database.php`
2. Pastikan database `nrrskfvk_situneo_digital` sudah dibuat di cPanel
3. Pastikan user database punya akses ke database

---

## 📋 REPORTING

**Setelah test, kirim info ini ke developer:**

✅ **BATCH 1:** [WORKING / ERROR]
- Homepage: [OK / ERROR]
- Navbar: [OK / ERROR]
- Footer: [OK / ERROR]

⚠️ **BATCH 2:** [WORKING / ERROR]
- test.php results: [Screenshot]
- About page: [OK / ERROR / BLUE BLANK]
- Contact page: [OK / ERROR / BLUE BLANK]
- FAQ page: [OK / ERROR / BLUE BLANK]

⚠️ **BATCH 3:** [WORKING / ERROR]
- Database import: [SUCCESS / ERROR]
- Total tables: [?? tables]
- Login page: [OK / ERROR]
- Login test: [SUCCESS / ERROR]

**Error messages (jika ada):**
```
[paste error messages here]
```

---

## 🔜 NEXT STEPS

Setelah BATCH 1, 2, 3 **SEMUA WORKING**, baru lanjut:

- **BATCH 4:** Client Dashboard (Order management, Payment, Profile)
- **BATCH 5:** Partner Dashboard (Commission, Withdrawal, Statistics)
- **BATCH 6:** Admin Panel (User management, Orders, Reports)

**⚠️ JANGAN LANJUT KE BATCH 4 SEBELUM BATCH 1-3 WORKING!**

---

## 📞 SUPPORT

WhatsApp: 083173868915
Email: vins@situneo.my.id

**File ini dibuat:** 2025-10-29
**Last updated:** BATCH 3 complete (17-table database)
