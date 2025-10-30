# 📦 SITUNEO DIGITAL - Installation Guide

## ⚠️ PENTING - BACA INI DULU!

Jika Anda mengalami masalah:
1. **BATCH 2 halaman biru blank** → Ikuti Step 2.5 (Test Page)
2. **BATCH 3 SQL error** → Gunakan `database-simple.sql` (Step 3.2)

---

## 📋 STEP-BY-STEP INSTALLATION

### ✅ STEP 1: BATCH 1 - Foundation (SUDAH OK!)

Anda bilang BATCH 1 sudah jalan ✅

---

### ✅ STEP 2: BATCH 2 - Public Pages

#### 2.1. Upload Files
1. Download `BATCH-2-PUBLIC-PAGES.zip`
2. Extract ZIP file
3. Upload folder `BATCH-2-PUBLIC-PAGES` ke `/public_html/`

Struktur harus jadi seperti ini:
```
/public_html/
├── BATCH-1-PUBLIC-PAGES/     ← Sudah ada
├── BATCH-2-PUBLIC-PAGES/     ← Upload ini
├── index.php
└── test.php                   ← Upload ini juga (dari file terpisah)
```

#### 2.2. Test Pages (PENTING!)

**Jangan langsung buka pages! Test dulu dengan test.php:**

1. Upload file `test.php` ke `/public_html/`
2. Buka di browser: `https://situneo.my.id/test.php`
3. **Lihat hasilnya:**
   - ✅ Semua hijau → Lanjut ke step 2.3
   - ❌ Ada merah → Screenshot dan kirim ke saya

#### 2.3. Test BATCH 2 Pages

Jika test.php OK, coba buka:
- `https://situneo.my.id/BATCH-2-PUBLIC-PAGES/pages/about.php`
- `https://situneo.my.id/BATCH-2-PUBLIC-PAGES/pages/contact.php`
- `https://situneo.my.id/BATCH-2-PUBLIC-PAGES/pages/faq.php`

**Jika masih halaman biru blank:**
```
Tambahkan ini di PALING ATAS file about.php (baris 1-3):

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
```

Refresh browser dan lihat error apa yang muncul, kirim screenshot error nya!

---

### ✅ STEP 3: BATCH 3 - Database & Auth

#### 3.1. Upload Files
1. Download `BATCH-3-AUTH-DATABASE.zip`
2. Extract ZIP
3. Upload folder `BATCH-3-AUTH-DATABASE` ke `/public_html/`

#### 3.2. Import Database ⚠️ GUNAKAN METHOD INI!

**JANGAN** pakai Import biasa! Gunakan cara ini:

**METHOD 1 (RECOMMENDED):**
1. Buka file `BATCH-3-AUTH-DATABASE/database/database-simple.sql` dengan Notepad/TextEdit
2. **COPY SEMUA ISI FILE** (Ctrl+A lalu Ctrl+C)
3. Login ke **phpMyAdmin** di cPanel
4. Pilih database: `nrrskfvk_situneo_digital`
5. Klik tab **SQL** (BUKAN Import!)
6. **PASTE** semua code yang sudah dicopy
7. Klik **Go**

**METHOD 2 (If Method 1 failed):**
1. Di phpMyAdmin, klik tab **Import**
2. Klik **Choose File**
3. Pilih: `database-simple.sql` (BUKAN database.sql!)
4. Scroll ke bawah
5. Set **Character set**: `utf8mb4`
6. Klik **Go**

#### 3.3. Verify Database

Setelah import, cek:
1. Di phpMyAdmin, lihat daftar tables
2. Harus ada minimal: `users`, `service_categories`, `settings`, `activity_logs`
3. Klik table `users` → Browse → Harus ada 1 admin user

#### 3.4. Test Login

1. Buka: `https://situneo.my.id/BATCH-3-AUTH-DATABASE/auth/login.php`
2. Login dengan:
   ```
   Email: admin@situneo.my.id
   Password: admin123
   ```
3. Jika berhasil → Dashboard admin akan muncul (atau error karena dashboard belum dibuat - itu normal!)

---

## 🚨 TROUBLESHOOTING

### Problem 1: "Halaman Biru Blank" (BATCH 2)

**Solusi:**
1. Upload `test.php` dan cek hasilnya
2. Enable error display (tambah code di atas)
3. Check error_log di cPanel → File Manager → public_html → error_log

### Problem 2: "SQL Import Error"

**Error seperti:**
```
text/x-generic database.sql ( ASCII text )
```

**Solusi:**
Gunakan `database-simple.sql` dengan METHOD 1 (copy-paste via SQL tab)!

### Problem 3: "Cannot redeclare get_current_user()"

**Solusi:**
Sudah fixed di BATCH-1-v2! Re-download BATCH-1 terbaru.

### Problem 4: "Database connection failed"

**Solusi:**
1. Cek `BATCH-1-PUBLIC-PAGES/config/database.php`
2. Pastikan credentials benar:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'nrrskfvk_user_situneo_digital');
   define('DB_PASS', 'Devin1922$');
   define('DB_NAME', 'nrrskfvk_situneo_digital');
   ```

---

## 📞 NEED HELP?

Jika masih error:
1. Upload dan jalankan `test.php`
2. Screenshot hasilnya
3. Screenshot error yang muncul
4. Kirim ke WhatsApp: 083173868915

---

## ✅ CHECKLIST

- [ ] BATCH 1 uploaded dan jalan
- [ ] test.php uploaded dan hasilnya semua hijau
- [ ] BATCH 2 uploaded
- [ ] BATCH 2 pages bisa diakses (about, contact, faq)
- [ ] BATCH 3 uploaded
- [ ] Database imported (pakai database-simple.sql)
- [ ] Login berhasil dengan admin account

Jika semua checklist ✅, Anda siap lanjut ke BATCH 4!
