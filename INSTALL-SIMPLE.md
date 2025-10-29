# 🚀 CARA INSTALL (SUPER SIMPLE!)

**BATCH 1 COMPLETE - All-in-One Package**

---

## 📥 STEP 1: DOWNLOAD & UPLOAD

1. **Download** file `BATCH-1-COMPLETE.zip` dari GitHub
2. **Login** ke cPanel Anda
3. **File Manager** → Masuk ke folder `public_html`
4. **Upload** file `BATCH-1-COMPLETE.zip`
5. **Klik kanan** pada file ZIP → **Extract**
6. **Masuk** ke folder `BATCH-1-COMPLETE` yang baru muncul

---

## 📂 STEP 2: PINDAHKAN ISI FOLDER

**PENTING:** Yang dipindah adalah **ISI FOLDER**, bukan foldernya!

1. **Masuk** ke folder `BATCH-1-COMPLETE`
2. **SELECT ALL** (tekan CTRL+A atau klik "Select All")
3. **Klik tombol MOVE** di toolbar File Manager
4. **Destination:** Pilih `/public_html/` (satu tingkat ke atas)
5. **Klik MOVE FILE(S)**
6. **Tunggu** sampai semua file selesai dipindah
7. **Hapus** folder kosong `BATCH-1-COMPLETE` (opsional)

**Hasilnya:**
```
/public_html/
├── index.php           ✅ Langsung di sini
├── database.sql        ✅ Langsung di sini
├── config/             ✅ Langsung di sini
├── includes/           ✅ Langsung di sini
├── components/         ✅ Langsung di sini
├── assets/             ✅ Langsung di sini
├── auth/               ✅ Langsung di sini
├── pages/              ✅ Langsung di sini
└── test.php            ✅ Langsung di sini
```

**BUKAN seperti ini** (SALAH!):
```
/public_html/
└── BATCH-1-COMPLETE/   ❌ Jangan ada folder ini!
    └── index.php
```

---

## ⚙️ STEP 3: EDIT DATABASE CONFIG

1. **Buka** file `config/database.php` (klik kanan → Edit)
2. **Ganti** 3 baris ini dengan credentials database Anda:
   ```php
   define('DB_USER', 'nrrskfvk_user_situneo_digital');  // ← Username database
   define('DB_PASS', 'Devin1922$');                      // ← Password database
   define('DB_NAME', 'nrrskfvk_situneo_digital');        // ← Nama database
   ```
3. **Save** file (CTRL+S atau klik Save Changes)

---

## 🗄️ STEP 4: IMPORT DATABASE

### Method 1: Copy-Paste (MUDAH!)

1. **Buka** file `database.sql` dengan Notepad/Text Editor di komputer
2. **CTRL+A** (select all) → **CTRL+C** (copy)
3. **Login** ke phpMyAdmin di cPanel
4. **Klik** nama database Anda di sidebar kiri
5. **Klik tab SQL** (BUKAN Import!)
6. **CTRL+V** (paste) semua code ke kotak putih
7. **Klik tombol GO**
8. **Tunggu** 10-30 detik
9. **Harus muncul:** "17 queries successfully executed" (hijau)

### Method 2: Import File (Alternatif)

1. **phpMyAdmin** → Pilih database → **Tab Import**
2. **Choose file:** Pilih `database.sql`
3. **Character set:** `utf8mb4`
4. **Click GO**

---

## ✅ STEP 5: TEST WEBSITE

1. **Buka browser**, ketik: `https://situneo.my.id/test.php` (ganti domain!)
2. **Harus muncul:**
   - ✅ PHP Version: OK
   - ✅ 17+ File checks: ALL GREEN
   - ✅ Init file: OK
   - ✅ Constants: ALL GREEN
   - ✅ Database: Connected + 17 tables
   - ✅ Functions: ALL GREEN
   - ✅ Public pages: ALL GREEN
3. **Jika SEMUA HIJAU (✅) = SUKSES!** 🎉

---

## 🎯 STEP 6: CEK HOMEPAGE

1. **Buka:** `https://situneo.my.id/` (ganti domain!)
2. **Harus muncul:**
   - Hero section dengan animasi
   - NIB badge di navbar
   - Stats (150+, 500+, 99%, 5 Tahun)
   - 4 service cards (Website, Marketing, AI, Branding)
   - Footer dengan WhatsApp button hijau melayang

---

## 🔐 STEP 7: TEST LOGIN

1. **Buka:** `https://situneo.my.id/auth/login.php`
2. **Login dengan:**
   - Email: `admin@situneo.my.id`
   - Password: `admin123`
3. **Klik LOGIN**
4. **Jika berhasil:** Akan redirect (mungkin error karena dashboard belum ada - ini NORMAL!)
5. **Artinya login BERHASIL!** ✅

---

## 🚨 TROUBLESHOOTING

### Problem: test.php menunjukkan error merah (❌)

**Solusi berdasarkan error:**

1. **PHP Version error** → Upgrade PHP ke 7.4+ di cPanel
2. **File not found** → Ulangi Step 2, pastikan pindahkan ISI folder
3. **Constants error** → Check Step 3, edit database.php
4. **Database connection failed** → Check credentials di config/database.php
5. **Database 0 tables** → Ulangi Step 4, import database.sql

### Problem: Homepage blank putih

**Solusi:**
1. Buka `test.php` dulu untuk lihat error
2. Check `config/database.php` credentials benar
3. Pastikan database sudah diimport (ada 17 tables)
4. Clear browser cache (CTRL+F5)

### Problem: CSS tidak load (tampilan rusak)

**Solusi:**
1. Pastikan folder `assets/` ada di `/public_html/assets/`
2. Clear browser cache (CTRL+SHIFT+DEL)
3. Hard refresh (CTRL+F5)

### Problem: Login redirect error

**Solusi:**
Ini NORMAL! Dashboard belum ada di BATCH 1. Login tetap berhasil, tapi redirect error karena dashboard.php belum dibuat (akan dibuat di BATCH 2).

---

## 📋 VERIFICATION CHECKLIST

Setelah install, cek semua ini:

- [ ] ✅ File structure benar (index.php langsung di /public_html/)
- [ ] ✅ Database credentials sudah diedit
- [ ] ✅ Database sudah diimport (17 tables)
- [ ] ✅ test.php menunjukkan SEMUA HIJAU (✅)
- [ ] ✅ Homepage muncul dengan benar
- [ ] ✅ Navbar ada NIB badge
- [ ] ✅ Footer ada WhatsApp button
- [ ] ✅ Stats counter muncul
- [ ] ✅ 4 Service cards muncul
- [ ] ✅ Login page bisa dibuka
- [ ] ✅ Bisa login dengan admin

**Jika SEMUA ✅ = BATCH 1 SUKSES!** 🎉

---

## 🔜 NEXT STEPS

Setelah BATCH 1 sukses, nanti akan ada:

**BATCH 2 - Fitur Tambahan (Coming Soon!)**
- Client Dashboard (Orders, Payments, Profile)
- Partner Dashboard (Commission, Withdrawals)
- Admin Panel (User Management, Reports)

BATCH 2 nanti **tinggal tambahkan file** aja, tidak perlu install ulang!

---

## 📞 NEED HELP?

**Developer:**
- WhatsApp: **083173868915**
- Email: **vins@situneo.my.id**

**Kirim info ini jika ada error:**
1. Screenshot halaman test.php
2. Screenshot error message (jika ada)
3. URL website Anda
4. Step mana yang error

---

## ⏱️ WAKTU INSTALL

**Total waktu:** 5-10 menit

- Step 1-2: 2 menit (upload & pindahkan)
- Step 3: 1 menit (edit database.php)
- Step 4: 2 menit (import SQL)
- Step 5-7: 2 menit (testing)

---

**Created:** 2025-10-29
**Version:** BATCH 1 COMPLETE All-in-One

**🚀 Selamat install! Pasti berhasil!**
