# 🚀 QUICK REFERENCE - SITUNEO DIGITAL

**Simpan file ini! Berisi semua URLs dan credentials penting.**

---

## 🌐 WEBSITE URLs

### Public Pages
- **Homepage:** `https://situneo.my.id/`
- **About:** `https://situneo.my.id/BATCH-2-PUBLIC-PAGES/pages/about.php`
- **Contact:** `https://situneo.my.id/BATCH-2-PUBLIC-PAGES/pages/contact.php`
- **FAQ:** `https://situneo.my.id/BATCH-2-PUBLIC-PAGES/pages/faq.php`

### Authentication
- **Login:** `https://situneo.my.id/BATCH-3-AUTH-DATABASE/auth/login.php`
- **Register:** `https://situneo.my.id/BATCH-3-AUTH-DATABASE/auth/register.php`
- **Logout:** `https://situneo.my.id/BATCH-3-AUTH-DATABASE/auth/logout.php`

### Testing
- **Test Page:** `https://situneo.my.id/test.php`

---

## 🔐 DEFAULT LOGIN CREDENTIALS

### Admin Account (Pre-created)
```
Email: admin@situneo.my.id
Password: admin123
Role: Admin (Level 3)
Status: Active
```

**⚠️ WAJIB GANTI PASSWORD setelah login pertama kali!**

---

## 🗄️ DATABASE INFO

### Database Credentials
```
Host: localhost
Database: nrrskfvk_situneo_digital
Username: nrrskfvk_user_situneo_digital
Password: Devin1922$
Charset: utf8mb4
```

### Database Files
- **database-simple.sql** - 4 tables (untuk test koneksi)
- **database-full.sql** - 17 tables (untuk production) ✅ GUNAKAN INI!

### 17 Tables (Production)
```
Core Tables (5):
1. users
2. user_profiles
3. user_verifications
4. password_resets
5. sessions

Partner System (4):
6. partners
7. partner_tier_history
8. partner_commissions
9. partner_withdrawals

Service & Order (5):
10. service_categories
11. services
12. orders
13. order_items
14. order_payments

System Tables (3):
15. transactions
16. activity_logs
17. settings
```

---

## 👥 USER ROLES

```
ROLE_CLIENT  = 1  (Customer biasa)
ROLE_PARTNER = 2  (Mitra dengan komisi)
ROLE_ADMIN   = 3  (Administrator penuh)
```

---

## 💎 PARTNER TIER SYSTEM

| Tier | Commission | Requirements |
|------|-----------|-------------|
| Bronze | 15% | Default (starting tier) |
| Silver | 25% | 6 orders + 3 maintenance/month |
| Gold | 35% | 16 orders + 8 maintenance/month |
| Platinum | 45% | 31 orders + 15 maintenance/month |
| Diamond | 50% | 51 orders + 25 maintenance/month |

**Upgrade/Downgrade:** OTOMATIS setiap bulan berdasarkan performa

**Minimum Withdrawal:** Rp 50,000

---

## 🏢 COMPANY INFO

### Legal
```
Nama: SITUNEO DIGITAL
NIB: 20250926145704515453
NPWP: 90.296.264.6-002.000
Director: Devin Prasetyo Hermawan
```

### Contact
```
WhatsApp: +62 831-7386-8915 (6283173868915)
Email: vins@situneo.my.id
Support: support@situneo.my.id
Website: https://situneo.my.id
```

### Banking
```
Bank: BCA
Account: 2750424018
Name: [Account holder name]
```

---

## 📂 FOLDER STRUCTURE

```
/public_html/
├── index.php
├── test.php
├── BATCH-1-PUBLIC-PAGES/
│   ├── config/
│   ├── includes/
│   ├── components/
│   └── assets/
├── BATCH-2-PUBLIC-PAGES/
│   ├── pages/
│   ├── components/
│   └── assets/
└── BATCH-3-AUTH-DATABASE/
    ├── auth/
    └── database/
```

---

## 🎨 DESIGN SYSTEM

### Colors
```css
Primary Gold: #FFB400
Secondary Gold: #FFD700
Primary Blue: #1E5C99
Secondary Blue: #0F3057
Dark: #1A1A2E
Light: #F8F9FA
```

### Typography
```
Headings: Plus Jakarta Sans
Body: Inter
```

---

## 📱 8 SERVICE DIVISIONS

1. **Website & Pengembangan Sistem** (#1E5C99)
   - Website profesional, e-commerce, sistem custom

2. **Digital Marketing** (#0F3057)
   - SEO, Google Ads, social media ads

3. **Otomasi & AI** (#FFB400)
   - Chatbot AI, CRM, automation

4. **Branding & Desain** (#FFD700)
   - Logo, brand identity, desain grafis

5. **Konten & Copywriting** (#1E5C99)
   - Artikel SEO, copywriting, content strategy

6. **Data & Analytics** (#0F3057)
   - Google Analytics, reporting, optimization

7. **Infrastruktur & Legal** (#FFB400)
   - Domain, hosting, SSL, legalitas

8. **Customer Experience** (#FFD700)
   - Live chat, customer support, helpdesk

---

## 🔧 COMMON COMMANDS

### File Permissions (jika error permission)
```bash
chmod 644 index.php
chmod 755 BATCH-1-PUBLIC-PAGES
chmod 644 BATCH-1-PUBLIC-PAGES/config/database.php
```

### Clear Cache (jika perubahan tidak muncul)
```
1. Clear browser cache (Ctrl+Shift+Del)
2. Hard refresh (Ctrl+F5)
3. Incognito mode (Ctrl+Shift+N)
```

---

## 📋 TESTING CHECKLIST

### Test BATCH 1
- [ ] Homepage loads
- [ ] Navbar shows NIB badge
- [ ] Footer shows WhatsApp button
- [ ] Network animation works

### Test BATCH 2
- [ ] Run test.php - all green (✅)
- [ ] About page loads
- [ ] Contact page loads
- [ ] FAQ page loads

### Test BATCH 3
- [ ] Database has 17 tables
- [ ] Admin user exists
- [ ] Login page works
- [ ] Can login with admin credentials

---

## 🚨 EMERGENCY CONTACTS

**Developer:**
- WhatsApp: 083173868915
- Email: vins@situneo.my.id

**Kirim info ini jika error:**
1. Screenshot error message
2. Screenshot test.php results
3. URL yang error
4. Browser & device yang digunakan

---

## 📌 IMPORTANT NOTES

1. **ALWAYS backup database before any changes**
2. **Test each batch before proceeding to next**
3. **Use database-full.sql (17 tables) for production**
4. **Change admin password after first login**
5. **Delete test.php after testing complete**

---

## 🔜 UPCOMING BATCHES

- **BATCH 4:** Client Dashboard (Orders, Payments, Profile)
- **BATCH 5:** Partner Dashboard (Commission, Withdrawals, Stats)
- **BATCH 6:** Admin Panel (User mgmt, Order mgmt, Reports)

**⚠️ Deploy BATCH 4-6 only after BATCH 1-3 are fully working!**

---

**Created:** 2025-10-29
**Version:** 1.0 (BATCH 1-3 Complete)
