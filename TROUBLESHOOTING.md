## 🚨 TROUBLESHOOTING GUIDE

### BATCH 2 - Halaman Biru Blank

**Penyebab:**
1. Path ke BATCH-1 salah
2. PHP error tidak ditampilkan
3. Missing file atau folder

**Solusi Quick Fix:**

**Pastikan struktur folder seperti ini:**
```
/public_html/
├── BATCH-1-PUBLIC-PAGES/
│   ├── includes/
│   │   └── init.php
│   └── components/
│       └── layout/
│           ├── head.php
│           ├── navbar.php
│           └── footer.php
└── BATCH-2-PUBLIC-PAGES/
    └── pages/
        ├── about.php
        ├── contact.php
        └── faq.php
```

**Test dengan file ini:**

Buat file `test.php` di folder `/public_html/`:

```php
<?php
// Enable error display
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Testing Paths</h1>";

// Test 1: Check if BATCH-1 exists
if (file_exists('BATCH-1-PUBLIC-PAGES/includes/init.php')) {
    echo "✅ BATCH-1 init.php found<br>";
    require_once 'BATCH-1-PUBLIC-PAGES/includes/init.php';
    echo "✅ BATCH-1 init.php loaded successfully<br>";
} else {
    echo "❌ BATCH-1 init.php NOT FOUND<br>";
}

// Test 2: Check constants
echo "<br><h2>Constants:</h2>";
echo "APP_NAME: " . (defined('APP_NAME') ? APP_NAME : 'NOT DEFINED') . "<br>";
echo "APP_URL: " . (defined('APP_URL') ? APP_URL : 'NOT DEFINED') . "<br>";

// Test 3: Check database
if (isset($conn)) {
    echo "<br>✅ Database connection OK<br>";
} else {
    echo "<br>❌ Database connection FAILED<br>";
}

echo "<br><h2>All Good! You can proceed.</h2>";
?>
```

Upload `test.php` ke `/public_html/` dan buka di browser:
`https://situneo.my.id/test.php`

**Jika masih error, kirim screenshot hasil test.php nya!**

---

### BATCH 3 - SQL Import Error

**Error:** `text/x-generic database.sql ( ASCII text )`

**Solusi:**

1. **Jangan import langsung!** Buka file `database.sql` dengan text editor
2. **Copy SEMUA isinya**
3. Di phpMyAdmin, klik tab **SQL** (bukan Import)
4. **Paste** semua code SQL
5. Klik **Go**

**Atau gunakan method kedua:**
1. Download file `database-simple.sql` yang sudah saya buat
2. Import via phpMyAdmin → Import tab
3. Pilih charset: `utf8mb4_unicode_ci`

---

### Debug Mode (Jika masih error)

Tambahkan ini di **paling atas** file yang error:

```php
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
```

Ini akan **menampilkan semua error PHP** sehingga kita tahu masalahnya dimana!
