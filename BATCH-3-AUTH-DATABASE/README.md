# BATCH 3 - DATABASE & AUTHENTICATION SYSTEM

## 📋 CONTENTS

### Database
- `database/database.sql` - Complete database schema with 17 tables

### Authentication Pages
- `auth/login.php` - Login page
- `auth/register.php` - Registration page (Client & Partner)
- `auth/logout.php` - Logout handler
- `auth/forgot-password.php` - Forgot password page
- `auth/verify-email.php` - Email verification page

## 🗄️ DATABASE SCHEMA (17 Tables)

### Core User Tables
1. **users** - Main user table (Client, Partner, Admin)
2. **user_profiles** - Extended user profile information
3. **user_verifications** - Email/phone verification tokens
4. **password_resets** - Password reset tokens
5. **sessions** - User session tracking

### Partner System Tables
6. **partners** - Partner-specific data (tiers, commissions, balance)
7. **partner_tier_history** - History of tier changes
8. **partner_commissions** - Commission tracking per order
9. **partner_withdrawals** - Withdrawal requests and status

### Service & Order Tables
10. **service_categories** - 8 service divisions
11. **services** - All services catalog
12. **orders** - Client orders
13. **order_items** - Order line items
14. **order_payments** - Payment tracking and verification

### System Tables
15. **transactions** - All financial transactions
16. **activity_logs** - System activity logging
17. **settings** - System configuration

## 📦 INSTALLATION

### Step 1: Import Database

1. Login to **phpMyAdmin** di cPanel
2. Pilih database: `nrrskfvk_situneo_digital`
3. Click tab **Import**
4. Upload file: `database/database.sql`
5. Click **Go**

✅ **Database akan otomatis create:**
- 17 tables
- 1 admin user (email: admin@situneo.my.id, password: admin123)
- 8 service categories
- Default settings

### Step 2: Upload Auth Files

1. Extract `BATCH-3-AUTH-DATABASE.zip`
2. Upload folder `BATCH-3-AUTH-DATABASE` ke `/public_html/`
3. Pastikan strukturnya:
```
/public_html/
├── BATCH-1-PUBLIC-PAGES/
├── BATCH-2-PUBLIC-PAGES/
└── BATCH-3-AUTH-DATABASE/
    ├── database/
    │   └── database.sql
    └── auth/
        ├── login.php
        ├── register.php
        ├── logout.php
        ├── forgot-password.php
        └── verify-email.php
```

### Step 3: Test Authentication

Test URLs:
- **Login:** `https://situneo.my.id/BATCH-3-AUTH-DATABASE/auth/login.php`
- **Register:** `https://situneo.my.id/BATCH-3-AUTH-DATABASE/auth/register.php`

Default Admin Login:
- Email: `admin@situneo.my.id`
- Password: `admin123`

## ✨ FEATURES

### Authentication System
✅ **Login** - Email + Password authentication
✅ **Register** - Client & Partner registration
✅ **Logout** - Session termination with logging
✅ **Forgot Password** - Password reset via email
✅ **Email Verification** - Token-based verification
✅ **Remember Me** - Extended session option
✅ **Session Timeout** - Auto logout after 2 hours

### Security Features
✅ **Password Hashing** - bcrypt encryption
✅ **CSRF Protection** - Token validation
✅ **XSS Prevention** - Input sanitization
✅ **SQL Injection Prevention** - Prepared statements
✅ **Activity Logging** - Track all user actions
✅ **Role-based Access Control** - Admin/Partner/Client

### Partner Tier System
- **Bronze:** 15% commission (starting tier)
- **Silver:** 25% commission (6 orders + 3 maintenance/month)
- **Gold:** 35% commission (16 orders + 8 maintenance/month)
- **Platinum:** 45% commission (31 orders + 15 maintenance/month)
- **Diamond:** 50% commission (51 orders + 25 maintenance/month)

## 🔐 DATABASE USERS

### Admin User (Pre-created)
```
Email: admin@situneo.my.id
Password: admin123
Role: Admin (3)
Status: Active
```

**⚠️ IMPORTANT:** Change the admin password immediately after first login!

## 🔜 NEXT BATCH

**BATCH 4** will include:
- Client Dashboard (Order management, Payment, Profile)
- Partner Dashboard (Commission, Withdrawal, Statistics)
- Admin Panel (User management, Order management, Reports)

## 📞 SUPPORT

WhatsApp: 083173868915
Email: vins@situneo.my.id

---

**Note:** This batch focuses on database structure and authentication. Full dashboard functionality will be available in BATCH 4-6.
