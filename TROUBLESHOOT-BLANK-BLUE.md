# 🔧 TROUBLESHOOTING: Blank Blue Page

**Problem:** Homepage loading terus-menerus, blank biru

**Diagnosis:** PHP execution hang (infinite loop atau session lock)

---

## 📋 STEP-BY-STEP DIAGNOSTIC

### STEP 1: Test Bertahap (Wajib!)

Upload dan jalankan file test **SATU-SATU** dengan urutan ini:

#### Test 1: Pure HTML
```
URL: https://situneo.my.id/test1.php
Expected: ✅ Muncul halaman hijau "TEST 1 PASSED"
```

**Jika GAGAL:**
- Masalah: Server/PHP issue
- Solusi: Contact hosting support

**Jika SUKSES:** Lanjut Test 2

---

#### Test 2: PHP Execution
```
URL: https://situneo.my.id/test2.php
Expected: ✅ Muncul PHP info (version, memory, execution time)
```

**Jika HANG/LOADING TERUS:**
- Masalah: PHP execution timeout
- Solusi: Increase max_execution_time di php.ini

**Jika SUKSES:** Lanjut Test 3

---

#### Test 3: Config Files
```
URL: https://situneo.my.id/test3.php
Expected: ✅ Table showing database.php OK, constants.php OK
```

**Jika ADA ERROR:**
- Screenshot hasil test
- Check file yang error
- Database credentials salah?

**Jika SUKSES:** Lanjut Test 4

---

#### Test 4: With Session ⚠️ **CRITICAL TEST**
```
URL: https://situneo.my.id/test4.php
Expected: ✅ "init.php loaded successfully"
```

**Jika HANG/LOADING TERUS DI SINI:**
🚨 **MASALAH KETEMU!** Session yang bikin hang!

**SOLUSI:**

1. **Quick Fix:** Gunakan index-nosession.php
   ```
   - Download: index-nosession.php
   - Rename index.php → index-old.php
   - Upload index-nosession.php sebagai index.php
   - Test: https://situneo.my.id/
   ```

2. **Permanent Fix:** Clean session files
   ```
   cPanel → Select PHP Version → Options
   Find: session.save_path
   Note the path (e.g., /tmp)

   File Manager → Go to /tmp
   Delete semua file: sess_*
   ```

3. **Alternative:** Use database session
   Edit config/session.php:
   ```php
   // Change from file to database session
   ini_set('session.save_handler', 'user');
   ```

**Jika SUKSES:** Lanjut Test 5

---

#### Test 5: Full Page (No Navbar)
```
URL: https://situneo.my.id/test5.php
Expected: ✅ Full page dengan Bootstrap, stats table
```

**Jika HANG:**
- Masalah: Assets/CSS loading issue
- Check: assets/css/ folder exists?

**Jika SUKSES:** Lanjut Test 6

---

#### Test 6: With Navbar
```
URL: https://situneo.my.id/test6.php
Expected: ✅ Page with navbar "TEST 6 PASSED"
```

**Jika HANG:**
- Masalah: Navbar component issue
- Check: components/layout/navbar.php

**Jika SUKSES:** Homepage siap!
```
✅ Semua test passed!
✅ Homepage: https://situneo.my.id/index.php harus work!
```

---

## 🎯 QUICK SOLUTIONS

### Solution A: Use index-nosession.php (FASTEST!)

File ini **SKIP session** untuk temporary fix:

1. Download `index-nosession.php`
2. Upload ke `/public_html/`
3. Rename:
   - `index.php` → `index-backup.php`
   - `index-nosession.php` → `index.php`
4. Test: `https://situneo.my.id/`

**Note:** Login tidak akan work dengan file ini, tapi homepage muncul!

---

### Solution B: Disable Session in init.php

Edit `includes/init.php`:

```php
// BEFORE
require_once __DIR__ . '/../config/session.php';

// AFTER (commented out)
// require_once __DIR__ . '/../config/session.php';
```

---

### Solution C: Use Alternative Session Handler

Edit `config/session.php`, tambahkan di line 10:

```php
// Clear any existing session lock
if (session_status() === PHP_SESSION_ACTIVE) {
    session_write_close();
}

// Use more aggressive session settings
ini_set('session.use_strict_mode', 0);
ini_set('session.use_cookies', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_httponly', 1);

// Start session with timeout
if (session_status() === PHP_SESSION_NONE) {
    session_start([
        'cookie_lifetime' => 7200,
        'gc_maxlifetime' => 7200,
        'gc_probability' => 1,
        'gc_divisor' => 100
    ]);
}
```

---

## 📊 DIAGNOSIS MATRIX

| Test | Result | Diagnosis |
|------|--------|-----------|
| test1.php | ❌ Hang | Server/PHP issue |
| test2.php | ❌ Hang | PHP timeout |
| test3.php | ❌ Hang | Config file error |
| test4.php | ❌ Hang | **SESSION ISSUE** ⚠️ |
| test5.php | ❌ Hang | Assets/include issue |
| test6.php | ❌ Hang | Navbar component issue |
| All ✅ | Homepage ❌ | Cache issue (clear LiteSpeed cache) |

---

## 🚨 COMMON CAUSES

### 1. Session Lock (MOST COMMON)
- **Symptom:** test4.php hangs
- **Cause:** Session file locked by another process
- **Fix:** Delete `/tmp/sess_*` files or use index-nosession.php

### 2. Infinite Loop in Code
- **Symptom:** One specific test hangs
- **Cause:** Code logic error
- **Fix:** Check the file that test loads

### 3. LiteSpeed Cache
- **Symptom:** All tests pass, homepage still blank
- **Cause:** Old cached version served
- **Fix:** Purge LiteSpeed cache in cPanel

### 4. PHP Timeout
- **Symptom:** test2.php hangs
- **Cause:** max_execution_time too low
- **Fix:** Increase in php.ini or .htaccess

---

## 📞 REPORTING

**Jika masih belum solved, kirim info ini:**

1. **Screenshot setiap test** (test1.php sampai test6.php)
2. **Test mana yang hang?** (e.g., "test4.php hang")
3. **Error log** (5 baris terakhir dari cPanel error log)
4. **PHP version** (dari test2.php atau phpinfo)

---

## ✅ SUCCESS CRITERIA

Homepage sukses jika muncul:
- ✅ Hero section (judul besar + buttons)
- ✅ NIB badge di navbar
- ✅ Stats (150+, 500+, 99%, 5 Tahun)
- ✅ 4 Service cards
- ✅ Footer dengan WhatsApp button

---

**Created:** 2025-10-29
**For:** SITUNEO DIGITAL - BATCH 1 COMPLETE
**Issue:** Blank blue page / Loading forever
