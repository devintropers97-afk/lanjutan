# 📦 Panduan Setup di cPanel

## Langkah-langkah Install

### 1. Upload File ZIP
1. Login ke **cPanel** Anda
2. Buka **File Manager**
3. Masuk ke folder `public_html` (atau `www` atau `htdocs`)
4. Upload file **`situneo-digital-ready.zip`**

### 2. Extract File
1. Klik kanan pada file `situneo-digital-ready.zip`
2. Pilih **Extract**
3. Pilih lokasi extract (biasanya `public_html`)
4. Klik **Extract Files**
5. Hapus file ZIP setelah selesai extract

### 3. Konfigurasi Database
1. Buka file `config/database.php` melalui File Manager
2. Edit file dan sesuaikan dengan kredensial database Anda:

```php
define('DB_HOST', 'localhost');           // Host database
define('DB_USER', 'username_database');   // Username database
define('DB_PASS', 'password_database');   // Password database
define('DB_NAME', 'nama_database');       // Nama database
```

3. Save file

### 4. Set Permission File (Opsional)
Pastikan permission file sudah benar:
- **Folder**: 755
- **File PHP**: 644
- **File Config**: 600 atau 644

### 5. Akses Website
Buka browser dan akses:
```
http://yourdomain.com/
```

## 🗂️ Struktur File Setelah Extract

```
public_html/
├── index.php              ← Entry point utama
├── config/
│   └── database.php       ← Edit kredensial database di sini
├── pages/                 ← Semua halaman PHP
│   ├── index.php         ← Home page
│   ├── about.php         ← Tentang kami
│   ├── contact.php       ← Kontak
│   ├── calculator.php    ← Kalkulator harga
│   ├── services.php      ← Layanan
│   ├── portfolio.php     ← Portfolio
│   ├── pricing.php       ← Harga
│   └── admin/            ← Halaman admin
├── assets/
│   ├── css/              ← File CSS
│   ├── js/               ← File JavaScript
│   └── images/           ← Upload gambar di sini
└── docs/                 ← Dokumentasi

```

## 🔗 URL Akses

Setelah setup selesai, Anda bisa akses:

- **Home**: `http://yourdomain.com/`
- **About**: `http://yourdomain.com/pages/about.php`
- **Services**: `http://yourdomain.com/pages/services.php`
- **Contact**: `http://yourdomain.com/pages/contact.php`
- **Calculator**: `http://yourdomain.com/pages/calculator.php`
- **Dashboard**: `http://yourdomain.com/pages/dashboard.php`
- **Admin**: `http://yourdomain.com/pages/admin/`

## 🔧 Setup Database (Jika Belum Ada)

### Cara Membuat Database di cPanel:

1. **Buka MySQL® Databases** di cPanel
2. **Buat Database Baru**:
   - Masukkan nama: `situneo_digital`
   - Klik **Create Database**

3. **Buat User Database**:
   - Username: `situneo_user`
   - Password: (buat password kuat)
   - Klik **Create User**

4. **Hubungkan User ke Database**:
   - Pilih user yang baru dibuat
   - Pilih database yang baru dibuat
   - Klik **Add**
   - Centang **ALL PRIVILEGES**
   - Klik **Make Changes**

5. **Catat Informasi Berikut**:
   ```
   DB_HOST: localhost
   DB_USER: cpanelusername_situneo_user
   DB_PASS: password_yang_anda_buat
   DB_NAME: cpanelusername_situneo_digital
   ```

   *Note*: `cpanelusername_` adalah prefix dari username cPanel Anda

6. **Update config/database.php** dengan informasi di atas

## 🗄️ Import Database (Jika Ada SQL File)

Jika Anda memiliki file SQL untuk database:

1. Buka **phpMyAdmin** di cPanel
2. Pilih database yang sudah dibuat
3. Klik tab **Import**
4. Pilih file SQL Anda
5. Klik **Go**

## ⚠️ Troubleshooting

### Error "Connection failed"
- ✅ Pastikan kredensial database di `config/database.php` sudah benar
- ✅ Pastikan database sudah dibuat di cPanel
- ✅ Pastikan user database sudah dihubungkan ke database

### Error "File not found"
- ✅ Pastikan file sudah di-extract dengan benar
- ✅ Pastikan struktur folder sesuai dengan panduan

### Error "Permission denied"
- ✅ Set permission folder ke 755
- ✅ Set permission file ke 644

### Halaman blank/error 500
- ✅ Cek error log di cPanel → Errors
- ✅ Pastikan PHP version minimal 7.4
- ✅ Aktifkan display_errors untuk debugging

## 🔒 Keamanan

### Setelah Setup:
1. ✅ Ganti password database default
2. ✅ Set permission `config/database.php` ke 600
3. ✅ Hapus file `SETUP-CPANEL.md` dan `README.md` dari public
4. ✅ Nonaktifkan display_errors di production
5. ✅ Gunakan HTTPS (SSL Certificate)

## 📞 Bantuan

Jika ada masalah:
- Email: support@situneo.my.id
- WhatsApp: +62 831-7386-8915
- Website: https://situneo.my.id

---

**SITUNEO DIGITAL**
Digital Harmony for a Modern World
NIB: 20250926145704515453
