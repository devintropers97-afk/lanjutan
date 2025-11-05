# PANDUAN SETUP & TESTING - SITUNEO DIGITAL BUSINESS REDESIGN

## 📦 ISI PACKAGE

Package ini berisi **website redesign dengan pendekatan BUSINESS-BASED** dan bahasa yang mudah dipahami (bahasa orang awam).

### File & Folder Penting:
```
📁 Project Root
├── 📄 index.php (Entry point)
├── 📄 router.php (Router utama - UPDATED!)
├── 📄 .htaccess (URL rewriting)
│
├── 📁 pages/
│   ├── 📄 home.php (Homepage BARU - Complete redesign!)
│   ├── 📄 pilih-bisnis.php (Business selector - BARU!)
│   ├── 📁 solutions/ (FOLDER BARU!)
│   │   ├── 📄 toko-online.php
│   │   ├── 📄 resto-online.php
│   │   ├── 📄 company-profile.php
│   │   └── 📄 klinik-online.php
│   │
│   └── (halaman lain: about, services, portfolio, dll)
│
├── 📁 assets/ (CSS, JS, Images)
├── 📁 includes/ (Header, Footer, Functions)
├── 📁 config/ (Konfigurasi - BELUM SETUP DATABASE!)
└── 📁 auth/, client/, freelancer/, admin/ (Dashboard pages)
```

---

## 🚀 CARA SETUP UNTUK TESTING

### Opsi 1: Testing Lokal dengan XAMPP/WAMP/LARAGON

1. **Extract ZIP file** ke folder htdocs:
   ```
   C:\xampp\htdocs\situneo-digital\
   ```

2. **Buka browser**, akses:
   ```
   http://localhost/situneo-digital/
   ```

3. **URL yang bisa dicoba:**
   - Homepage: `http://localhost/situneo-digital/`
   - Pilih Bisnis: `http://localhost/situneo-digital/pilih-bisnis`
   - Toko Online: `http://localhost/situneo-digital/solutions/toko-online`
   - Resto Online: `http://localhost/situneo-digital/solutions/resto-online`
   - Company Profile: `http://localhost/situneo-digital/solutions/company-profile`
   - Klinik Online: `http://localhost/situneo-digital/solutions/klinik-online`

### Opsi 2: Testing dengan PHP Built-in Server

1. **Extract ZIP file** ke folder manapun

2. **Buka terminal/CMD** di folder tersebut

3. **Jalankan server:**
   ```bash
   php -S localhost:8000
   ```

4. **Buka browser:**
   ```
   http://localhost:8000/
   ```

### Opsi 3: Upload ke Hosting

1. **Upload semua file** via FTP/cPanel File Manager

2. **Pastikan .htaccess** sudah ter-upload (kadang hidden)

3. **Akses domain** Anda:
   ```
   https://namadomain.com/
   ```

---

## ✅ CHECKLIST TESTING - HALAMAN BARU

### 1. Homepage (pages/home.php)
- [ ] Hero section tampil dengan teks: "Mau Bikin Website? BINGUNG MULAI DARI MANA?"
- [ ] 8 kartu kategori bisnis tampil (Toko, Resto, Company Profile, dll)
- [ ] Testimoni dengan "DULU vs SEKARANG" tampil
- [ ] FAQ accordion berfungsi
- [ ] Tombol WhatsApp berfungsi (link ke WA)
- [ ] Responsive di mobile

### 2. Pilih Bisnis (pages/pilih-bisnis.php)
- [ ] 8 kategori bisnis tampil dengan icon
- [ ] Setiap kartu ada examples & price
- [ ] Link ke solution page berfungsi
- [ ] Help section tampil di bawah
- [ ] Tombol WhatsApp berfungsi

### 3. Toko Online (pages/solutions/toko-online.php)
- [ ] Hero: "Persis Kayak Tokopedia, Tapi Khusus Untuk Toko Anda!"
- [ ] Workflow 4 step tampil
- [ ] Before/After comparison (DULU vs SEKARANG) tampil
- [ ] 8 feature boxes tampil
- [ ] Success story (Pak Budi) tampil
- [ ] Pricing cards (Sewa Rp 350rb vs Beli Rp 5jt) tampil
- [ ] FAQ accordion berfungsi

### 4. Resto Online (pages/solutions/resto-online.php)
- [ ] Hero: "Customer Pesan Dari Rumah, Anda Tinggal Masak & Kirim!"
- [ ] Workflow 4 step tampil
- [ ] Before/After comparison tampil
- [ ] 8 feature boxes tampil
- [ ] Success story (Bu Siti - Warteg Berkah) tampil
- [ ] Pricing cards (Sewa Rp 250rb vs Beli Rp 3.5jt) tampil
- [ ] FAQ accordion berfungsi

### 5. Company Profile (pages/solutions/company-profile.php)
- [ ] Hero: "Dari CV Kecil Jadi Keliatan Kayak Perusahaan Multinasional!"
- [ ] Before/After: Tender rejection vs winning Rp 500 juta
- [ ] 8 feature boxes (Homepage, About, Services, dll)
- [ ] 6 use cases tampil
- [ ] Success story (CV Karya Mandiri) tampil
- [ ] Pricing cards (Sewa Rp 150rb vs Beli Rp 2.5jt) tampil
- [ ] FAQ accordion + comparison table berfungsi

### 6. Klinik Online (pages/solutions/klinik-online.php)
- [ ] Hero: "Pasien Daftar Dari Rumah, Gak Perlu Antri Panjang!"
- [ ] Workflow 4 step tampil
- [ ] Before/After: Chaos antrian vs organized appointments
- [ ] 8 feature boxes tampil
- [ ] Success story (Klinik Sehat Keluarga) tampil
- [ ] Pricing cards (Sewa Rp 300rb vs Beli Rp 4.5jt) tampil
- [ ] FAQ accordion berfungsi

---

## 🎨 FITUR UI YANG BISA DI-TEST

### Visual & Design
- [ ] Semua halaman pakai warna konsisten (Gold #FFD700, Dark bg)
- [ ] Font konsisten (Segoe UI)
- [ ] Animasi hover di semua card/button
- [ ] Gradient backgrounds di hero sections
- [ ] Icon emoji tampil dengan baik

### Interaktivity
- [ ] Accordion FAQ buka/tutup smooth
- [ ] Hover effects di semua cards
- [ ] Button WhatsApp redirect ke WhatsApp dengan message pre-filled
- [ ] All links berfungsi (internal navigation)

### Responsive Design
- [ ] Mobile view: Grid jadi 1 kolom
- [ ] Tablet view: Grid jadi 2 kolom
- [ ] Desktop view: Grid 3-4 kolom
- [ ] Text readable di semua device
- [ ] No horizontal scroll di mobile

---

## ⚠️ YANG BELUM BERFUNGSI (NORMAL!)

Ini adalah **UI/Display Testing Phase**, jadi yang belum berfungsi:

### Database & Backend
- ❌ Login/Register (belum setup database)
- ❌ Dashboard (client, freelancer, admin)
- ❌ Form submission (contact form, dll)
- ❌ Payment upload
- ❌ Order tracking

### External Services
- ❌ WhatsApp API integration (link manual aja dulu)
- ❌ Payment Gateway
- ❌ Email notification
- ❌ reCAPTCHA

**CATATAN:** Ini NORMAL karena fokus sekarang adalah **REVIEW TAMPILAN & COPYWRITING**.
Database & backend baru disetup setelah UI approved!

---

## 📝 YANG PERLU DI-REVIEW

### 1. Copywriting (Bahasa)
- Apakah bahasa sudah cukup sederhana?
- Apakah "orang awam" bisa paham?
- Apakah ada istilah teknis yang perlu disederhanakan?

### 2. Kategori Bisnis
- Apakah 8 kategori sudah cukup?
- Apakah ada kategori yang kurang/lebih?
- Apakah examples di setiap kategori sudah tepat?

### 3. Penjelasan Layanan
- Apakah penjelasan "APA ITU" cukup jelas?
- Apakah "YANG ANDA DAPAT" cukup detail?
- Apakah "YANG ANDA RASAKAN" cukup menarik?

### 4. Before/After Comparison
- Apakah skenario "DULU" relatable?
- Apakah skenario "SEKARANG" convincing?
- Apakah perbedaannya cukup dramatic?

### 5. Pricing
- Apakah harga masuk akal?
- Apakah penjelasan Sewa vs Beli jelas?
- Apakah perlu ada paket lain?

### 6. Success Stories
- Apakah case study believable?
- Apakah angka-angka realistic?
- Apakah ada case study lain yang perlu ditambah?

---

## 🐛 TROUBLESHOOTING

### Halaman 404 Not Found
**Problem:** Akses URL tapi muncul 404

**Solusi:**
1. Pastikan `.htaccess` sudah ter-upload
2. Pastikan mod_rewrite enabled di Apache
3. Coba akses dengan `index.php`, contoh:
   ```
   http://localhost/situneo-digital/index.php?page=pilih-bisnis
   ```

### CSS/JS Tidak Load
**Problem:** Halaman tampil tapi gak ada style

**Solusi:**
1. Check path `assets/` sudah benar
2. Buka Console browser (F12), lihat error
3. Pastikan semua file di folder `assets/` sudah ter-upload

### Accordion FAQ Tidak Buka
**Problem:** Klik accordion tapi tidak expand

**Solusi:**
1. Pastikan Bootstrap JS sudah load
2. Check Console browser (F12) untuk error JavaScript
3. Pastikan file `assets/js/main.js` ada

### WhatsApp Link Tidak Berfungsi
**Problem:** Klik tombol WA tapi tidak redirect

**Solusi:**
1. Ganti nomor WA di semua file:
   - Cari: `6281234567890`
   - Ganti dengan nomor WA asli Anda (format: 62xxx)
2. Nomor WA ada di semua solution pages

---

## 📱 TEST DI BERBAGAI DEVICE

### Desktop
- [ ] Chrome
- [ ] Firefox
- [ ] Edge
- [ ] Safari (Mac)

### Mobile
- [ ] Android Chrome
- [ ] iOS Safari
- [ ] Android Firefox

### Tablet
- [ ] iPad
- [ ] Android Tablet

---

## 💬 CARA KASIH FEEDBACK

Setelah testing, kasih feedback dengan format:

### Format Feedback
```
HALAMAN: [nama halaman]
SECTION: [bagian mana]
ISSUE/SARAN: [jelaskan]

Contoh:
HALAMAN: Toko Online
SECTION: Success Story (Pak Budi)
ISSUE: Angka omset terlalu tinggi, kurang realistic
SARAN: Turunkan dari 25 juta jadi 15 juta/bulan
```

---

## ✨ NEXT STEPS (Setelah Approved)

Setelah UI/tampilan approved, tahap selanjutnya:

1. **Setup Database**
   - Import schema.sql
   - Konfigurasi database connection
   - Test koneksi

2. **Backend Integration**
   - Login/Register system
   - Dashboard functionality
   - Form submissions
   - File uploads

3. **External Services**
   - WhatsApp API integration
   - Payment Gateway (Midtrans/Xendit)
   - Email service (SMTP)
   - reCAPTCHA

4. **Testing & QA**
   - Functional testing
   - Security testing
   - Performance testing
   - Cross-browser testing

5. **Deployment**
   - Domain setup
   - Hosting setup
   - SSL installation
   - Go Live!

---

## 📞 KONTAK

Jika ada issue saat testing:
- Buka Issue di GitHub
- Atau kontak via WhatsApp (ganti nomor di website)

---

**Version:** Business Redesign v1.0
**Date:** 5 November 2025
**Status:** UI/Display Testing Phase
**Database:** Not configured yet (waiting for UI approval)

---

## 🎯 KESIMPULAN

**YANG BISA DI-TEST SEKARANG:**
✅ Semua tampilan halaman (6 halaman baru)
✅ Navigasi antar halaman
✅ Responsive design
✅ Copywriting & bahasa
✅ Visual design & layout
✅ Interactivity (accordion, hover, dll)

**YANG BELUM BISA DI-TEST:**
❌ Database operations
❌ Form submissions
❌ Login/Register
❌ Dashboard features
❌ Payment processing

**FOKUS REVIEW:** Tampilan, copywriting, dan user flow!

---

Selamat testing! 🚀
