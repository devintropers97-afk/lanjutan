# 🚀 PANDUAN INSTALASI cPANEL - SITUNEO DIGITAL

Panduan lengkap untuk upload dan install website ke cPanel hosting.

---

## 📦 PERSIAPAN

### 1. File yang Dibutuhkan
Folder **BATCH-1.3** ini adalah folder PRODUCTION-READY yang siap diupload ke cPanel.

### 2. Struktur Folder (Modular & Rapi)
```
BATCH-1.3/
├── index.php                    # Homepage utama
├── 404.php                      # Error page
├── .htaccess                    # Apache configuration
├── robots.txt                   # SEO robots
├── README.md                    # Dokumentasi lengkap
├── INSTALLATION-GUIDE.md        # Panduan ini
│
├── auth/                        # Login & Register
│   ├── login.php
│   └── register.php
│
├── pages/                       # Halaman publik
│   ├── services.php            # 107 services lengkap
│   ├── portfolio.php           # Portfolio showcase
│   ├── pricing.php             # All pricing packages
│   └── faq.php                 # Frequently Asked Questions
│
├── includes/                    # Backend components
│   ├── config/
│   │   └── config.php          # Configuration & helpers
│   ├── components/             # Modular components (easy edit!)
│   │   ├── header.php
│   │   ├── footer.php
│   │   ├── hero.php
│   │   ├── services.php
│   │   ├── packages.php
│   │   ├── partner-info.php
│   │   └── testimonials.php
│   └── data/                   # Data files (easy edit!)
│       ├── services-data.php   # 107 services
│       ├── portfolio-data.php  # Portfolio items
│       ├── pricing-data.php    # Pricing packages
│       └── faq-data.php        # FAQ data
│
└── assets/                      # Static assets
    ├── css/
    │   └── main.css            # Semua styling
    ├── js/
    │   └── main.js             # Semua interactivity
    └── images/                 # Upload images di sini
```

---

## 🔧 LANGKAH INSTALASI ke cPANEL

### STEP 1: Download & Compress
1. Download folder **BATCH-1.3** dari repository
2. Compress menjadi **BATCH-1.3.zip**
   - Windows: Right-click → "Send to" → "Compressed (zipped) folder"
   - Mac: Right-click → "Compress BATCH-1.3"
   - Linux: `zip -r BATCH-1.3.zip BATCH-1.3/`

### STEP 2: Login ke cPanel
1. Buka browser, akses: `https://yourdomain.com/cpanel`
2. Atau: `https://yourdomain.com:2083`
3. Login dengan username & password hosting Anda

### STEP 3: Upload File via File Manager
1. Di cPanel, cari & klik **"File Manager"**
2. Navigate ke folder **public_html** (atau **www** atau **htdocs** tergantung hosting)
3. Klik tombol **"Upload"** di toolbar atas
4. Pilih file **BATCH-1.3.zip**
5. Wait sampai upload selesai 100%

### STEP 4: Extract File di cPanel
1. Kembali ke File Manager
2. Klik kanan file **BATCH-1.3.zip**
3. Pilih **"Extract"**
4. Pilih extract ke folder **public_html**
5. Klik **"Extract File(s)"**
6. Setelah selesai, delete file **BATCH-1.3.zip**

### STEP 5: Pindahkan File ke Root
Setelah extract, struktur akan seperti ini:
```
public_html/
└── BATCH-1.3/
    ├── index.php
    ├── assets/
    └── ...
```

Anda perlu **pindahkan semua file dari dalam BATCH-1.3/ ke public_html/**:

**CARA MUDAH:**
1. Masuk ke folder **BATCH-1.3**
2. Klik **"Select All"** (checkbox di toolbar)
3. Klik **"Move"**
4. Ketik destination: `/public_html/` atau `/home/username/public_html/`
5. Klik **"Move File(s)"**
6. Hapus folder kosong **BATCH-1.3**

**HASIL AKHIR:**
```
public_html/
├── index.php
├── .htaccess
├── robots.txt
├── auth/
├── pages/
├── includes/
└── assets/
```

### STEP 6: Set File Permissions
1. Di File Manager, select semua folder
2. Klik **"Permissions"** atau **"Change Permissions"**
3. Set permissions:
   - **Folders:** 755 (rwxr-xr-x)
   - **Files (.php, .css, .js):** 644 (rw-r--r--)
   - **.htaccess:** 644
4. Checklist **"Recurse into subdirectories"**
5. Klik **"Change Permissions"**

---

## ⚙️ KONFIGURASI

### 1. Edit File Config
Edit file: `includes/config/config.php`

```php
// Ganti dengan informasi Anda:
define('SITE_NAME', 'SITUNEO DIGITAL');
define('SITE_URL', 'https://yourdomain.com');
define('SITE_EMAIL', 'info@yourdomain.com');
define('SITE_WHATSAPP', '6281234567890');  // Format: 62xxx (tanpa +)
define('COMPANY_NIB', '1234567890123');

// Untuk production:
define('ENVIRONMENT', 'production');
```

### 2. Test Website
Buka browser dan akses:
- Homepage: `https://yourdomain.com`
- Services: `https://yourdomain.com/services`
- Portfolio: `https://yourdomain.com/portfolio`
- Pricing: `https://yourdomain.com/pricing`
- FAQ: `https://yourdomain.com/faq`

### 3. Enable SSL (HTTPS) - PENTING!
1. Di cPanel, cari **"SSL/TLS Status"**
2. Atau gunakan **"Let's Encrypt SSL"** (gratis)
3. Pilih domain Anda
4. Klik **"Install SSL"**
5. Wait 5-10 menit
6. Test: `https://yourdomain.com` (harus ada gembok hijau)

---

## 🎨 EDIT KONTEN (MUDAH!)

### Edit Teks Homepage
Edit file: `includes/components/hero.php`
```php
// Line 21: Ubah headline
<h1>
    Bikin Website Profesional <span class="highlight">Mulai dari Rp 150rb/bulan</span>
</h1>
```

### Edit Services (8 Popular Services)
Edit file: `includes/components/services.php`
```php
// Line 6-95: Edit array $popular_services
$popular_services = [
    [
        'name' => 'Nama Service Anda',
        'price_setup' => 350000,
        'price_monthly' => 150000,
        // ... dst
    ],
];
```

### Edit All 107 Services
Edit file: `includes/data/services-data.php`
- Gampang! Tinggal edit array
- Struktur jelas: name, price_setup, price_monthly, features

### Edit Packages
Edit file: `includes/components/packages.php`
- Edit 3 paket bundling di homepage

Edit file: `includes/data/pricing-data.php`
- Edit semua 8 paket lengkap untuk halaman pricing

### Edit Portfolio
Edit file: `includes/data/portfolio-data.php`
```php
$portfolio_items = [
    [
        'title' => 'Nama Project',
        'image' => 'URL gambar',
        'url' => 'https://clientwebsite.com',
        'category' => 'website',
        // ... dst
    ],
];
```

### Edit FAQ
Edit file: `includes/data/faq-data.php`
```php
$faq_data = [
    'Untuk Client' => [
        [
            'question' => 'Pertanyaan?',
            'answer' => 'Jawaban lengkap...'
        ],
    ],
];
```

### Edit Warna & Design
Edit file: `assets/css/main.css`
```css
/* Line 14-19: CSS Variables */
:root {
    --gold: #FFB400;           /* Ubah warna gold */
    --primary-blue: #1E5C99;   /* Ubah warna blue */
    --dark-blue: #0F3057;      /* Ubah warna dark blue */
}
```

---

## 🗂️ KENAPA MODULAR?

### Keuntungan Struktur Modular:
✅ **1 File = 1 Fungsi** → Mudah dicari
✅ **Easy Edit** → Edit 1 file tidak ganggu yang lain
✅ **Clean Code** → Tidak ada file 1000+ baris
✅ **Team Friendly** → Bisa kerja bareng tanpa conflict
✅ **Easy Maintenance** → Gampang debug & update

### Contoh: Mau Edit Services?
❌ **BEFORE (Non-modular):**
```
index.php (3000 lines) → Cari baris services → Edit → Takut rusak yang lain
```

✅ **AFTER (Modular):**
```
includes/components/services.php (120 lines) → Edit → Save → Done!
```

### File Kecil-kecil Gak Masalah!
- **Performance:** PHP di-cache oleh server, tidak ada overhead
- **Loading Speed:** Sama cepatnya dengan 1 file besar
- **Easy Edit:** Developer happy, client happy!

---

## 🔍 TROUBLESHOOTING

### 1. White Screen / Blank Page
**Penyebab:** PHP error atau file config salah
**Solusi:**
```php
// Edit includes/config/config.php
// Aktifkan error reporting untuk debug:
ini_set('display_errors', 1);
error_reporting(E_ALL);
```

### 2. CSS/JS Tidak Load
**Penyebab:** Path salah atau .htaccess issue
**Solusi:**
- Cek file .htaccess ada di root
- Cek permission: .htaccess = 644
- View page source, cek URL assets: `https://yourdomain.com/assets/css/main.css`

### 3. 404 Not Found
**Penyebab:** .htaccess tidak jalan
**Solusi:**
- Pastikan mod_rewrite aktif (tanya hosting support)
- Rename .htaccess jadi htaccess.txt, test lagi
- Akses dengan .php: `yourdomain.com/services.php`

### 4. Images Tidak Muncul
**Penyebab:** Menggunakan Unsplash URL (external)
**Solusi:**
- Download gambar, upload ke `assets/images/`
- Edit PHP file, ganti URL:
```php
'image' => 'assets/images/service1.jpg'  // Local file
```

### 5. WhatsApp Link Tidak Jalan
**Penyebab:** Nomor WhatsApp salah format
**Solusi:**
```php
// Edit includes/config/config.php
define('SITE_WHATSAPP', '628123456789');  // ✅ BENAR: 62xxx
define('SITE_WHATSAPP', '+62 812-3456-789');  // ❌ SALAH
define('SITE_WHATSAPP', '0812-3456-789');     // ❌ SALAH
```

---

## 📱 OPTIMASI (Optional)

### 1. Enable Gzip Compression
Already configured in `.htaccess`! No action needed.

### 2. Browser Caching
Already configured in `.htaccess`! No action needed.

### 3. Image Optimization
- Gunakan tools online: TinyPNG, ImageOptim
- Compress sebelum upload
- Target: < 200KB per image

### 4. CDN (Advanced)
- Cloudflare (gratis): https://cloudflare.com
- Setup DNS ke Cloudflare
- Auto caching & DDoS protection

---

## 🎯 CHECKLIST SETELAH INSTALL

- [ ] Website bisa diakses di browser
- [ ] SSL (HTTPS) aktif - ada gembok hijau
- [ ] Semua menu navigasi jalan
- [ ] WhatsApp button berfungsi
- [ ] Form contact/order jalan
- [ ] Test di mobile (responsive check)
- [ ] Google PageSpeed Insights > 80
- [ ] Submit sitemap ke Google Search Console

---

## 💡 TIPS EDITING

### Quick Edit via cPanel
1. File Manager → Navigate ke file
2. Right-click file → Edit
3. Edit langsung di browser
4. Save Changes

### Advanced Edit via FTP (Recommended)
1. Download FileZilla: https://filezilla-project.org
2. Connect ke FTP server Anda
3. Download files, edit di local (VS Code, Sublime, dll)
4. Upload kembali
5. **Keuntungan:** Syntax highlighting, auto-complete, faster!

### Best Practice
- **Backup dulu** sebelum edit (download file asli)
- Edit **1 file at a time**
- Test setelah setiap perubahan
- Jika error, restore backup

---

## 📞 SUPPORT

Butuh bantuan? Hubungi developer:

- **GitHub:** https://github.com/devintropers97-afk/lanjutan
- **Email:** support@situneo.com
- **WhatsApp:** +62 xxx-xxxx-xxxx

---

## 🎉 SELAMAT!

Website Anda sudah LIVE dan siap menerima order!

**Next Steps:**
1. ✅ Promosikan website di social media
2. ✅ Setup Google Analytics (tracking)
3. ✅ Setup Facebook Pixel (retargeting)
4. ✅ Jalankan ads (Google/Meta)
5. ✅ Monitor & optimize

**Good luck with your digital business! 🚀**
