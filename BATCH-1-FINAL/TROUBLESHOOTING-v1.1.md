# 🔧 TROUBLESHOOTING GUIDE v1.1
## SITUNEO DIGITAL - Common Issues & Solutions

---

## 🚀 QUICK DIAGNOSTIC

**LANGKAH PERTAMA: Jalankan System Check**
```
https://your-domain.com/system-check.php
```

System Check akan otomatis detect semua masalah dan kasih solusi!

---

## ❌ BLANK PAGE / BLANK BLUE SCREEN

### Penyebab Umum:
1. **PHP Error yang tidak tampil**
2. **File core missing**
3. **Database connection error**
4. **LiteSpeed cache issue**

### Solusi v1.1:

**✅ BATCH-1.1 sudah include ERROR HANDLING!**

Kalau ada error, sekarang akan tampil pesan seperti ini:
- ❌ "Initialization Error" → File core missing
- ❌ "Database Configuration Error" → Config belum diubah
- ❌ "Koneksi Database Gagal" → Username/password salah
- ⚠️ "Component Missing" → Component file tidak ada

**Tidak akan blank lagi!** Pasti ada pesan error yang helpful.

### Step-by-Step Fix:

#### 1. Check Error Messages
Refresh page, lihat error message apa yang muncul.

#### 2. Kalau Masih Blank (Sangat Jarang):
```bash
# Enable PHP error display
# Buat file .user.ini di public_html:
display_errors = On
error_reporting = E_ALL
```

#### 3. Check PHP Error Log
- cPanel → Errors
- Atau file: `/home/username/public_html/error_log`

#### 4. Clear LiteSpeed Cache
```bash
# Di cPanel:
1. LiteSpeed Web Cache Manager
2. Flush All
```

#### 5. Test dengan system-check.php
```
https://your-domain.com/system-check.php
```

---

## 🗄️ DATABASE ERRORS

### Error: "Database Configuration Error"

**Penyebab:** Masih pakai config default

**Solusi:**
1. Edit `config/database.php`
2. Ganti dengan credential database Anda:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'youruser_dbuser');    // ← Ganti ini
define('DB_PASS', 'your_password');       // ← Ganti ini
define('DB_NAME', 'youruser_database');   // ← Ganti ini
```

---

### Error: "Koneksi Database Gagal"

**Kemungkinan Penyebab:**

#### 1. Username/Password Salah
**Cek:**
- cPanel → MySQL Databases
- Pastikan user & password match

**Fix:**
```php
// config/database.php
define('DB_USER', 'exact_username_from_cpanel');
define('DB_PASS', 'exact_password_you_set');
```

#### 2. Database Belum Dibuat
**Fix:**
- cPanel → MySQL Databases
- Create New Database
- Add user to database (ALL PRIVILEGES)

#### 3. User Belum Di-Assign
**Fix:**
- cPanel → MySQL Databases
- Scroll ke "Add User To Database"
- Select user + database
- Grant ALL PRIVILEGES

#### 4. Database Name Salah
**Check:**
```bash
# Database name biasanya format:
username_database
# Contoh: nrrskfvk_situneo
```

---

## 📁 MISSING FILES ERROR

### Error: "Component Missing" atau "File Not Found"

**Penyebab:** File tidak terupload atau corrupt

**Solusi:**

#### 1. Re-upload File yang Missing
```bash
# Kalau error: "components/layout/navbar.php missing"
# Upload ulang folder components/
```

#### 2. Check File Permissions
```bash
Files: 644
Folders: 755
```

Di cPanel File Manager:
- Right-click file → Change Permissions
- Files: `644` (rw-r--r--)
- Folders: `755` (rwxr-xr-x)

#### 3. Re-extract ZIP
Kadang extract gagal, coba:
- Delete semua file
- Upload BATCH-1.1.zip lagi
- Extract ulang di cPanel

---

## 🎨 CSS NOT LOADING / STYLING RUSAK

### Gejala:
- Website tampil tapi tidak ada style
- Warna/layout berantakan
- Font tidak load

### Penyebab:
1. **CSS files missing**
2. **Wrong path/URL**
3. **File permissions**

### Solusi:

#### 1. Check CSS Files Exist
```bash
assets/css/
├── variables.css    ✅
├── reset.css        ✅
├── typography.css   ✅ (v1.1)
├── layout.css       ✅
├── components.css   ✅
├── animations.css   ✅
├── responsive.css   ✅ (v1.1)
└── pages.css        ✅
```

Harus ada **8 files** (v1.1 menambahkan typography.css & responsive.css)

#### 2. Check APP_URL Setting
```php
// config/constants.php
define('APP_URL', 'https://yourdomain.com');
// ⚠️ HARUS MATCH dengan domain Anda!
// ⚠️ TIDAK boleh ada trailing slash!
```

#### 3. Clear Browser Cache
```
Ctrl + Shift + R (Windows)
Cmd + Shift + R (Mac)
```

#### 4. Check File Permissions
```bash
chmod 644 assets/css/*.css
```

---

## 🔐 SESSION ERRORS

### Warning: "session_start(): Cannot start session"

**BATCH-1.1 FIXED:** Sudah pakai output buffering!

Tapi kalau masih ada issue:

#### 1. Check Session Path Writable
```php
// Tambahkan di config/session.php (baris 1):
session_save_path(sys_get_temp_dir());
```

#### 2. Clear Session Files
```bash
# Di cPanel → File Manager
# Delete files di: /tmp/sess_*
```

---

## 📱 RESPONSIVE ISSUES (MOBILE/TABLET)

### Gejala:
- Layout rusak di mobile
- Text terlalu kecil/besar
- Elements overlap

### Solusi:

**✅ BATCH-1.1 Include responsive.css!**

Pastikan file ini exist:
```bash
assets/css/responsive.css  ← NEW in v1.1!
```

Kalau masih ada issue:
1. Clear browser cache
2. Check di browser DevTools (F12)
3. Pastikan responsive.css loaded

---

## ⚡ PERFORMANCE ISSUES

### Website Lambat

#### 1. Enable LiteSpeed Cache
```bash
cPanel → LiteSpeed Web Cache
Enable: ON
```

#### 2. Optimize Database
```bash
phpMyAdmin → database → Operations → Optimize table
```

#### 3. Enable Gzip Compression
```apache
# .htaccess
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/css text/javascript application/javascript
</IfModule>
```

---

## 🔍 DEBUGGING TOOLS

### Tool 1: system-check.php
```
https://yourdomain.com/system-check.php
```
**Use Case:** Check semua requirement & configuration

### Tool 2: PHP Info
```php
<?php phpinfo(); ?>
// Save as info.php
```
**Use Case:** Check PHP version, extensions, settings

### Tool 3: Error Log
```bash
# cPanel → Errors
# Or: tail -f ~/public_html/error_log
```
**Use Case:** See detailed PHP errors

### Tool 4: Browser DevTools
```
F12 → Console
```
**Use Case:** Check JavaScript errors, network requests

---

## 🆘 STILL HAVING ISSUES?

### Pre-Contact Checklist:
✅ Ran system-check.php
✅ Checked error logs
✅ Re-uploaded files
✅ Checked database credentials
✅ Cleared all caches

### Contact Support:
📧 Email: support@situneo.my.id
💬 WhatsApp: [Your number]

**Include in your message:**
1. URL website
2. Screenshot error message
3. System Check result
4. PHP version (dari system-check.php)

---

## 📋 QUICK REFERENCE

### File Structure Check:
```
public_html/
├── index.php               ✅
├── system-check.php        ✅ (NEW v1.1)
├── database.sql            ✅
├── .htaccess              ✅
├── config/
│   ├── database.php       ✅ (IMPROVED v1.1)
│   ├── constants.php      ✅
│   ├── session.php        ✅
│   └── language.php       ✅
├── includes/
│   ├── init.php           ✅ (IMPROVED v1.1)
│   └── functions/         ✅
├── components/
│   └── layout/            ✅
├── assets/
│   ├── css/               ✅ (8 files in v1.1)
│   ├── js/                ✅
│   └── img/               ✅
└── pages/                 ✅
```

### Permission Check:
```bash
Files:   644 (rw-r--r--)
Folders: 755 (rwxr-xr-x)
```

### Database Check:
```sql
-- Should have 17 tables:
SHOW TABLES;

-- Should return: users, user_profiles, partners, services, orders, etc.
```

---

## 🎉 VERSION 1.1 IMPROVEMENTS

### What's Fixed in v1.1:

✅ **No More Blank Pages!**
- Comprehensive error handling
- Friendly error messages
- Helpful solutions

✅ **Database Errors**
- Config validation
- Connection error handling
- Step-by-step fix guide

✅ **Missing Files**
- Safe component includes
- Fallback mechanisms
- Warning messages (not crash!)

✅ **System Check Tool**
- Automatic diagnostics
- Pre-deployment check
- Visual report

✅ **CSS Complete**
- typography.css added
- responsive.css added
- All 8 CSS files included

---

**BATCH-1.1 = BATCH-1 + Bulletproof Error Handling!** 🛡️

Kalau masih ada masalah setelah pakai v1.1, kemungkinan besar:
1. Hosting configuration issue (hubungi hosting support)
2. PHP version terlalu lama (upgrade ke PHP 7.4+)
3. Server restrictions (check dengan hosting)

Happy coding! 🚀
