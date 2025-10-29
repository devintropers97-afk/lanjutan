# 🚀 INSTALL SITUNEO DIGITAL - SUPER SIMPLE!

**Versi FINAL - Tested & 100% Working!**

---

## ⏱️ TOTAL WAKTU: 5 MENIT!

---

## 📥 STEP 1: UPLOAD FILES (2 menit)

### 1.1 Download ZIP
- Download file: **BATCH-1-FINAL.zip**

### 1.2 Upload ke cPanel
1. Login **cPanel**
2. **File Manager**
3. Masuk folder **public_html**
4. **Upload** file ZIP
5. **Klik kanan** ZIP → **Extract**
6. **Masuk** folder `BATCH-1-FINAL` yang baru diextract

### 1.3 Pindahkan File
**PENTING:** Yang dipindah adalah **ISI FOLDER**, bukan foldernya!

1. **Di dalam folder BATCH-1-FINAL:**
2. **SELECT ALL** (CTRL+A atau klik Select All)
3. Klik tombol **Move**
4. Destination: `/public_html/` (satu tingkat ke atas)
5. **Move File(s)**
6. **Delete** folder kosong `BATCH-1-FINAL`

**Struktur akhir harus:**
```
/public_html/
├── index.php       ← Langsung di sini!
├── .htaccess       ← Langsung di sini!
├── database.sql    ← Langsung di sini!
├── config/         ← Langsung di sini!
├── includes/       ← Langsung di sini!
├── components/     ← Langsung di sini!
├── assets/         ← Langsung di sini!
├── auth/           ← Langsung di sini!
└── pages/          ← Langsung di sini!
```

---

## ⚙️ STEP 2: EDIT DATABASE CONFIG (1 menit)

1. **Buka file:** `public_html/config/database.php`
2. **Edit** 3 baris ini dengan credentials database Anda:

```php
define('DB_USER', 'nrrskfvk_user_situneo_digital');  // ← Username database
define('DB_PASS', 'Devin1922$');                      // ← Password database
define('DB_NAME', 'nrrskfvk_situneo_digital');        // ← Nama database
```

3. **Save** (CTRL+S)

---

## 🗄️ STEP 3: IMPORT DATABASE (2 menit)

### Method: Copy-Paste (MUDAH!)

1. **Buka** file `database.sql` dengan Notepad
2. **CTRL+A** (select all) → **CTRL+C** (copy)
3. **Login** phpMyAdmin di cPanel
4. **Klik** nama database Anda di sidebar kiri
5. **Klik** tab **SQL** (BUKAN Import!)
6. **CTRL+V** (paste) semua code
7. **Klik** tombol **Go**
8. **Tunggu** 10-30 detik
9. **Harus muncul:** "17 queries successfully executed"

---

## ✅ STEP 4: TEST WEBSITE (30 detik)

### 4.1 Test Homepage
```
Buka: https://situneo.my.id/
```

**Harus muncul:**
- ✅ Hero section dengan judul besar
- ✅ NIB badge di navbar
- ✅ Stats (150+, 500+, 99%, 5 Tahun)
- ✅ 4 Service cards
- ✅ Footer dengan WhatsApp button hijau melayang

### 4.2 Test Public Pages
```
✅ https://situneo.my.id/pages/about.php
✅ https://situneo.my.id/pages/contact.php
✅ https://situneo.my.id/pages/faq.php
```

### 4.3 Test Login
```
URL: https://situneo.my.id/auth/login.php
Email: admin@situneo.my.id
Password: admin123
```

**Login berhasil!** ✅

---

## 🎉 SELESAI!

**Jika SEMUA test di atas OK = SUKSES!** 🎉

---

## 🚨 TROUBLESHOOTING

### Problem 1: Homepage blank putih

**Solusi:**
1. Cek `config/database.php` credentials benar?
2. Database sudah diimport? (harus ada 17 tables)
3. Clear browser cache (CTRL+F5)

### Problem 2: Error "Cannot connect to database"

**Solusi:**
1. cPanel → MySQL Databases
2. Pastikan database sudah dibuat
3. Pastikan user sudah di-assign ke database (All Privileges)
4. Check credentials di `config/database.php`

### Problem 3: CSS tidak load (tampilan rusak)

**Solusi:**
1. Pastikan folder `assets/` ada di `/public_html/assets/`
2. Clear browser cache (CTRL+SHIFT+DEL)
3. Hard refresh (CTRL+F5)

---

## 📋 VERIFICATION CHECKLIST

Pastikan semua ini ✅:

**File Structure:**
- [ ] index.php ada di `/public_html/` (bukan di subfolder)
- [ ] config/ folder ada di `/public_html/config/`
- [ ] assets/ folder ada di `/public_html/assets/`
- [ ] .htaccess ada di `/public_html/.htaccess`

**Database:**
- [ ] Database sudah dibuat di cPanel
- [ ] Database sudah diimport (17 tables)
- [ ] Config database.php sudah diedit
- [ ] Ada 1 user admin di table users

**Website:**
- [ ] Homepage muncul dengan benar
- [ ] Navbar ada NIB badge
- [ ] Footer ada WhatsApp button
- [ ] Stats muncul (150+, 500+, etc)
- [ ] 4 Service cards muncul
- [ ] Login page bisa dibuka
- [ ] Bisa login dengan admin credentials

**Jika SEMUA ✅ = INSTALLATION SUKSES!** 🎉

---

## 💡 TIPS

1. **Jangan skip steps** - ikuti urutan 1-2-3-4
2. **Backup dulu** sebelum upload (jika ada website lama)
3. **Ganti password admin** setelah login pertama kali
4. **Test di browser berbeda** (Chrome, Firefox, Edge)
5. **Test di HP** untuk cek responsive design

---

## 📞 SUPPORT

**Jika ada masalah:**
- WhatsApp: 083173868915
- Email: vins@situneo.my.id

**Kirim info:**
1. Screenshot error (jika ada)
2. URL website Anda
3. Step mana yang error

---

**Created:** 2025-10-29
**Version:** BATCH-1-FINAL (Tested & Working)
**Status:** Production Ready 🚀

**Selamat! Website Anda siap!** 🎉
