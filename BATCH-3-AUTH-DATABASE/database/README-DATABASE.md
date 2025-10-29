# 📦 BATCH 3 - DATABASE FILES

## 🗄️ 2 VERSI DATABASE

### 1. `database-simple.sql` - FOR TESTING ✅
**4 Tables** - Untuk test koneksi dan troubleshooting

Tables:
- users
- activity_logs
- service_categories
- settings

**Gunakan ini jika:**
- Mau test dulu apakah database bisa connect
- Troubleshooting error
- Test cepat

---

### 2. `database-full.sql` - FOR PRODUCTION 🚀
**17 Tables LENGKAP** - Database complete untuk website jalan penuh

#### Core Tables (5):
1. **users** - Main user table (Client, Partner, Admin)
2. **user_profiles** - Extended profile (address, bio, social media)
3. **user_verifications** - Email/phone verification tokens
4. **password_resets** - Password reset tokens
5. **sessions** - Session tracking

#### Partner System (4):
6. **partners** - Partner data (tier, commission, balance)
7. **partner_tier_history** - Tier upgrade/downgrade history
8. **partner_commissions** - Commission per order
9. **partner_withdrawals** - Withdrawal requests

#### Service & Order (5):
10. **service_categories** - 8 divisions
11. **services** - Service catalog
12. **orders** - Client orders
13. **order_items** - Order line items
14. **order_payments** - Payment tracking

#### System Tables (3):
15. **transactions** - All financial transactions
16. **activity_logs** - System activity logging
17. **settings** - System configuration

**Gunakan ini untuk:**
- Production website (website sebenarnya)
- Full functionality
- Complete system

---

## 📥 CARA IMPORT

### Method 1: Copy-Paste (RECOMMENDED) ✅

1. Buka file `database-full.sql` dengan Notepad
2. **COPY SEMUA** (Ctrl+A → Ctrl+C)
3. Login phpMyAdmin
4. Pilih database: `nrrskfvk_situneo_digital`
5. Klik tab **SQL** (BUKAN Import!)
6. **PASTE** semua code
7. Klik **Go**
8. Tunggu sampai selesai (bisa 10-30 detik)

✅ **Success message:** "17 queries successfully executed"

### Method 2: Import File (Alternative)

1. phpMyAdmin → Import tab
2. Choose file: `database-full.sql`
3. Character set: `utf8mb4`
4. Click **Go**

---

## ✅ VERIFY DATABASE

Setelah import, **WAJIB CEK:**

1. Di phpMyAdmin, lihat daftar tables
2. **Harus ada 17 tables:**
   - users ✓
   - user_profiles ✓
   - user_verifications ✓
   - password_resets ✓
   - sessions ✓
   - partners ✓
   - partner_tier_history ✓
   - partner_commissions ✓
   - partner_withdrawals ✓
   - service_categories ✓
   - services ✓
   - orders ✓
   - order_items ✓
   - order_payments ✓
   - transactions ✓
   - activity_logs ✓
   - settings ✓

3. Click table **users** → Browse
   - Harus ada 1 row (admin user)

4. Click table **service_categories** → Browse
   - Harus ada 8 rows (8 divisions)

5. Click table **settings** → Browse
   - Harus ada 8 rows (settings)

---

## 🔐 DEFAULT LOGIN

**Admin Account:**
```
Email: admin@situneo.my.id
Password: admin123
```

⚠️ **WAJIB GANTI PASSWORD** setelah login pertama kali!

---

## 🎯 PILIH YANG MANA?

| Situasi | File yang Digunakan |
|---------|---------------------|
| **Test koneksi dulu** | database-simple.sql (4 tables) |
| **Production / website jalan** | database-full.sql (17 tables) ✅ |
| **Error saat import** | database-simple.sql dulu, kalau berhasil baru database-full.sql |

---

## 📊 COMPARISON

| Feature | database-simple.sql | database-full.sql |
|---------|-------------------|------------------|
| Tables | 4 | 17 |
| Size | ~2 KB | ~15 KB |
| Purpose | Testing | Production |
| Login | ✅ Yes | ✅ Yes |
| Orders | ❌ No | ✅ Yes |
| Partners | ❌ No | ✅ Yes |
| Commissions | ❌ No | ✅ Yes |
| Payments | ❌ No | ✅ Yes |

---

## 🚀 RECOMMENDATION

**Untuk website production**, gunakan **`database-full.sql`**!

Kalau import gagal, baru pakai `database-simple.sql` untuk troubleshooting.

---

## 📞 SUPPORT

Jika import gagal:
1. Screenshot error message
2. Kirim ke WhatsApp: 083173868915
