# SITUNEO DIGITAL - Repository Structure

## 📁 Struktur Folder Baru

Repository ini telah dirapikan dan direstrukturisasi untuk kemudahan pengelolaan. Berikut adalah struktur folder yang baru:

```
lanjutan/
├── index.php              # Main entry point (akses: http://domain.com/)
├── config/                # Configuration files
│   ├── database.php       # Database configuration
│   ├── database.example.php
│   └── .gitignore        # Proteksi file sensitif
├── pages/                 # PHP page files
│   ├── index.php         # Home page
│   ├── about.php         # About page
│   ├── contact.php       # Contact page
│   ├── calculator.php    # Price calculator
│   ├── dashboard.php     # User dashboard
│   ├── services.php      # Services page
│   ├── portfolio.php     # Portfolio page
│   ├── pricing.php       # Pricing page
│   ├── profile.php       # User profile
│   ├── orders.php        # User orders
│   ├── invoices.php      # User invoices
│   ├── admin/            # Admin pages
│   │   ├── orders.php    # Manage orders
│   │   ├── services.php  # Manage services
│   │   ├── settings.php  # Admin settings
│   │   ├── reports.php   # Admin reports
│   │   └── users.php     # Manage users
│   └── *.php             # Other pages
├── assets/               # Static assets
│   ├── css/              # Stylesheets
│   │   └── style.css     # Main stylesheet
│   ├── js/               # JavaScript files
│   │   └── main.js       # Main JavaScript
│   └── images/           # Image files
├── docs/                 # Documentation
│   ├── pembuatan.md      # Project creation guide
│   ├── formulir.md       # Form documentation
│   ├── sistem-situneo.md # System documentation
│   └── *.md              # Other docs
└── data/                 # Data files
    └── komisi-freelance.csv
```

## 🔧 Perubahan Utama

### 1. **Pemisahan File CSS dan JavaScript**
   - File CSS dipindahkan ke `assets/css/`
   - File JavaScript dipindahkan ke `assets/js/`
   - File HTML/PHP dapat menggunakan external CSS/JS

### 2. **Organisasi File PHP**
   - Semua halaman utama ada di folder `pages/`
   - File admin terpisah di `pages/admin/`
   - Setiap file sekarang memiliki nama yang deskriptif

### 3. **Konfigurasi Database**
   - Database config di `config/database.php`
   - File ini **tidak** di-commit ke Git (dilindungi .gitignore)
   - Gunakan `database.example.php` sebagai template

### 4. **Dokumentasi**
   - Semua dokumentasi dipindahkan ke folder `docs/`
   - Format markdown (.md) untuk kemudahan membaca

## 🚀 Cara Menggunakan

### Setup Database
1. Copy `config/database.example.php` menjadi `config/database.php`
2. Edit `config/database.php` dengan kredensial database Anda
3. Database akan otomatis terkoneksi saat akses index.php

### Akses Halaman
- **Home**: `http://domain.com/` atau `http://domain.com/index.php`
- **About**: `http://domain.com/pages/about.php`
- **Contact**: `http://domain.com/pages/contact.php`
- **Calculator**: `http://domain.com/pages/calculator.php`
- **Dashboard**: `http://domain.com/pages/dashboard.php`
- **Admin**: `http://domain.com/pages/admin/`

### Koneksi Antar Halaman

**Untuk halaman di `/pages/`:**
```php
<!-- Link ke halaman lain -->
<a href="about.php">About</a>
<a href="services.php">Services</a>
<a href="admin/orders.php">Admin Orders</a>

<!-- Include CSS/JS -->
<link rel="stylesheet" href="../assets/css/style.css">
<script src="../assets/js/main.js"></script>

<!-- Include config -->
<?php require_once __DIR__ . '/../config/database.php'; ?>
```

**Untuk halaman di `/pages/admin/`:**
```php
<!-- Link ke halaman lain -->
<a href="../dashboard.php">Dashboard</a>
<a href="orders.php">Orders</a>

<!-- Include CSS/JS -->
<link rel="stylesheet" href="../../assets/css/style.css">
<script src="../../assets/js/main.js"></script>

<!-- Include config -->
<?php require_once __DIR__ . '/../../config/database.php'; ?>
```

## 🔄 Migrasi dari Struktur Lama

### Mapping File Lama ke Baru:
```
lanjutan2       → assets/js/main.js
lanjutan48      → assets/css/style.css
lanjutan14      → pages/dashboard.php
lanjutan17      → pages/about.php
lanjutan22      → pages/calculator.php
lanjutan23      → pages/contact.php
lanjutan30      → pages/index.php
lanjutan32      → pages/invoices.php
lanjutan36      → pages/orders.php
lanjutan37      → pages/admin/orders.php
lanjutan38      → pages/portfolio.php
lanjutan39      → pages/pricing.php
lanjutan40      → pages/profile.php
lanjutan45      → pages/admin/services.php
lanjutan46      → pages/services.php
lanjutan47      → pages/admin/settings.php
lanjutan50      → pages/admin/users.php
database wajib  → config/database.php
pembuatan       → docs/pembuatan.md
formulir        → docs/formulir.md
sistem situneo  → docs/sistem-situneo.md
```

## ⚠️ Catatan Penting

### CSS & JavaScript Inline
Banyak file PHP masih memiliki CSS dan JavaScript inline (di dalam tag `<style>` dan `<script>`).
Untuk refactoring lebih lanjut:
1. Extract CSS inline ke file terpisah di `assets/css/`
2. Extract JavaScript inline ke file terpisah di `assets/js/`
3. Update link di file PHP untuk menggunakan external files

### Path Update
Beberapa file masih menggunakan path lama. Untuk update:
- Ganti `require_once 'config.php'` dengan `require_once __DIR__ . '/../config/database.php'`
- Ganti link relatif seperti `/about` dengan `pages/about.php`
- Update path CSS/JS untuk menggunakan path relatif yang benar

### Database Connection
Semua halaman yang membutuhkan database harus include config:
```php
<?php
require_once __DIR__ . '/../config/database.php';
// $conn sekarang tersedia untuk query
?>
```

## 📝 TODO - Refactoring Selanjutnya

- [ ] Extract semua inline CSS ke external files
- [ ] Extract semua inline JavaScript ke external files
- [ ] Update semua internal links untuk menggunakan path baru
- [ ] Buat routing system untuk URL yang lebih bersih
- [ ] Implementasi .htaccess untuk URL rewriting
- [ ] Buat template system untuk header/footer
- [ ] Pisahkan logic dan presentation (MVC pattern)

## 🔐 Security

- File `config/database.php` dilindungi oleh `.gitignore`
- **JANGAN** commit kredensial database ke Git
- Gunakan environment variables untuk production

## 📞 Kontak

**SITUNEO DIGITAL**
- Website: https://situneo.my.id
- WhatsApp: +62 831-7386-8915
- Email: support@situneo.my.id
- NIB: 20250926145704515453

---

**Last Updated:** 2025-10-30
**Branch:** claude/refactor-repo-structure-011CUd8d8qweBQvwY1yjHnjG
