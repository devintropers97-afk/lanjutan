# 🌟 SITUNEO DIGITAL - Complete Website Project

[![Status](https://img.shields.io/badge/Status-In%20Development-yellow)](https://github.com/devintropers97-afk/lanjutan)
[![PHP](https://img.shields.io/badge/PHP-7.4%2B-blue)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-orange)](https://mysql.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.3-purple)](https://getbootstrap.com)

**Professional digital agency website with client portal, partner system, and admin panel.**

---

## 📖 About This Project

SITUNEO DIGITAL is a complete web platform for a digital agency offering 8 service divisions:
- 🌐 Website & System Development
- 📈 Digital Marketing
- 🤖 Automation & AI
- 🎨 Branding & Design
- ✍️ Content & Copywriting
- 📊 Data & Analytics
- 🏗️ Infrastructure & Legal
- 🎧 Customer Experience

### Key Features

- ✅ **Multi-role System:** Client, Partner (with 5-tier commission), Admin
- ✅ **Authentication:** Login, Register, Email Verification, Password Reset
- ✅ **Service Catalog:** 107 services across 8 divisions
- ✅ **Order Management:** Client orders with payment tracking
- ✅ **Partner Commission:** Automatic tier upgrades based on performance
- ✅ **Responsive Design:** Mobile-first with Bootstrap 5.3.3
- ✅ **Security:** CSRF protection, XSS prevention, SQL injection prevention

---

## 🚀 Quick Start

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- cPanel access (for deployment)

### Installation

1. **Clone or download this repository**
   ```bash
   git clone https://github.com/devintropers97-afk/lanjutan.git
   ```

2. **Read the documentation**
   - Start with `START-HERE.md` for overview
   - Follow `DEPLOYMENT-CHECKLIST.md` step-by-step

3. **Deploy to server**
   - Upload BATCH-1-PUBLIC-PAGES to `/public_html/`
   - Upload BATCH-2-PUBLIC-PAGES to `/public_html/`
   - Upload BATCH-3-AUTH-DATABASE to `/public_html/`

4. **Import database**
   - Use `database-full.sql` (17 tables)
   - Method: Copy-paste via phpMyAdmin SQL tab

5. **Test the installation**
   - Upload `test.php` to `/public_html/`
   - Visit `https://yourdomain.com/test.php`
   - All checks should be green ✅

6. **Login as admin**
   - URL: `https://yourdomain.com/BATCH-3-AUTH-DATABASE/auth/login.php`
   - Email: `admin@situneo.my.id`
   - Password: `admin123`

---

## 📂 Project Structure

```
lanjutan/
├── START-HERE.md                    # 👈 Start here!
├── DEPLOYMENT-CHECKLIST.md          # Step-by-step deployment guide
├── QUICK-REFERENCE.md               # URLs, credentials, quick info
├── TROUBLESHOOTING.md               # Common errors and solutions
├── README-INSTALL.md                # Installation instructions
├── test.php                         # Diagnostic tool
│
├── BATCH-1-PUBLIC-PAGES/            # Foundation (25+ files)
│   ├── config/                      # Database, constants, session
│   ├── includes/                    # Functions, init
│   ├── components/                  # Layout components
│   └── assets/                      # CSS, JS, images
│
├── BATCH-2-PUBLIC-PAGES/            # Public Pages (16 files)
│   ├── pages/                       # About, Contact, FAQ
│   ├── components/                  # Breadcrumb, cards
│   ├── includes/data/               # Services, portfolio, pricing
│   └── assets/                      # Page-specific CSS/JS
│
├── BATCH-3-AUTH-DATABASE/           # Database & Auth (8 files)
│   ├── database/
│   │   ├── database-simple.sql     # 4 tables (testing)
│   │   ├── database-full.sql       # 17 tables (production)
│   │   └── README-DATABASE.md      # Database docs
│   └── auth/
│       ├── login.php
│       ├── register.php
│       └── logout.php
│
└── BATCH-4-6/ (Coming soon)
    ├── Client Dashboard
    ├── Partner Dashboard
    └── Admin Panel
```

---

## 📚 Documentation

### Getting Started
- **[START-HERE.md](START-HERE.md)** - Main entry point, project overview
- **[DEPLOYMENT-CHECKLIST.md](DEPLOYMENT-CHECKLIST.md)** - Step-by-step deployment
- **[QUICK-REFERENCE.md](QUICK-REFERENCE.md)** - URLs, credentials, quick access

### Technical Docs
- **[TROUBLESHOOTING.md](TROUBLESHOOTING.md)** - Error solutions
- **[README-INSTALL.md](README-INSTALL.md)** - Installation guide
- **[database/README-DATABASE.md](BATCH-3-AUTH-DATABASE/database/README-DATABASE.md)** - Database documentation

### Testing
- **[test.php](test.php)** - Diagnostic tool (upload to server and run)

---

## 🗄️ Database Schema

### 17 Tables (Production)

**Core Tables (5):**
1. `users` - Main user table
2. `user_profiles` - Extended user info
3. `user_verifications` - Email/phone verification
4. `password_resets` - Password reset tokens
5. `sessions` - Session tracking

**Partner System (4):**
6. `partners` - Partner data (tier, commission, balance)
7. `partner_tier_history` - Tier upgrade/downgrade history
8. `partner_commissions` - Commission per order
9. `partner_withdrawals` - Withdrawal requests

**Service & Order (5):**
10. `service_categories` - 8 divisions
11. `services` - Service catalog
12. `orders` - Client orders
13. `order_items` - Order line items
14. `order_payments` - Payment tracking

**System Tables (3):**
15. `transactions` - Financial transactions
16. `activity_logs` - Activity logging
17. `settings` - System configuration

---

## 💎 Partner Tier System

| Tier | Commission | Requirements |
|------|-----------|-------------|
| 🥉 Bronze | 15% | Default (starting tier) |
| 🥈 Silver | 25% | 6 orders + 3 maintenance/month |
| 🥇 Gold | 35% | 16 orders + 8 maintenance/month |
| 💍 Platinum | 45% | 31 orders + 15 maintenance/month |
| 💎 Diamond | 50% | 51 orders + 25 maintenance/month |

**Automatic tier evaluation:** Monthly based on performance

---

## 🔐 Security Features

- ✅ **Password Hashing:** bcrypt via `password_hash()`
- ✅ **CSRF Protection:** Token generation and validation
- ✅ **XSS Prevention:** `htmlspecialchars()` wrapper
- ✅ **SQL Injection Prevention:** Prepared statements
- ✅ **Session Security:** 2-hour timeout, secure cookies
- ✅ **Input Sanitization:** All user inputs cleaned
- ✅ **Activity Logging:** All user actions tracked

---

## 🎨 Design System

### Color Palette
```css
Primary Gold:    #FFB400
Secondary Gold:  #FFD700
Primary Blue:    #1E5C99
Secondary Blue:  #0F3057
Dark Background: #1A1A2E
Light Text:      #F8F9FA
```

### Typography
- **Headings:** Plus Jakarta Sans
- **Body:** Inter

### UI Features
- Glassmorphism effects
- Network particle animation
- AOS scroll animations
- GSAP transitions
- Responsive mobile-first design

---

## 📊 Project Status

### ✅ Completed (50%)

**BATCH 1 - Foundation:**
- [x] Database connection
- [x] Session management
- [x] Helper functions (auth, format, security)
- [x] Layout components (navbar, footer)
- [x] Homepage with animations
- [x] **Status:** Tested and working

**BATCH 2 - Public Pages:**
- [x] About page
- [x] Contact page with WhatsApp integration
- [x] FAQ page with tabs
- [x] Service catalog (107 services)
- [x] Portfolio showcase (50 items)
- [x] Pricing packages (8 plans)
- [x] **Status:** Path issues fixed, awaiting user test

**BATCH 3 - Database & Authentication:**
- [x] 17-table database schema
- [x] Login system
- [x] Registration (Client/Partner)
- [x] Logout handler
- [x] Email verification (prepared)
- [x] Password reset (prepared)
- [x] **Status:** Complete, awaiting user test

### 🔜 Coming Next (50%)

**BATCH 4 - Client Dashboard:**
- [ ] Order management
- [ ] Payment tracking
- [ ] Profile settings
- [ ] Order history

**BATCH 5 - Partner Dashboard:**
- [ ] Commission overview
- [ ] Withdrawal requests
- [ ] Performance statistics
- [ ] Tier progress tracking

**BATCH 6 - Admin Panel:**
- [ ] User management
- [ ] Order management
- [ ] Payment verification
- [ ] System reports

---

## 🐛 Known Issues & Fixes

### Issue 1: Fatal Error - Cannot Redeclare get_current_user()
**Status:** ✅ Fixed in v2
- **Cause:** PHP built-in function conflict
- **Fix:** Renamed to `get_logged_in_user()`

### Issue 2: Blue Blank Page (BATCH 2)
**Status:** ✅ Fixed in v2
- **Cause:** Wrong relative paths (`/../` instead of `/../../`)
- **Fix:** Corrected all path references
- **Test:** Use `test.php` to verify

### Issue 3: SQL Import Error
**Status:** ✅ Solved
- **Cause:** phpMyAdmin encoding issues
- **Fix:** Use copy-paste method via SQL tab
- **Alternative:** Use `database-simple.sql` for testing

---

## 🧪 Testing

### Automated Test Tool

Upload `test.php` to your server and run it. It checks:

- ✅ PHP version (7.4+)
- ✅ File structure (all batches)
- ✅ Database connection
- ✅ Constants loaded
- ✅ Helper functions available
- ✅ All components exist

### Manual Testing Checklist

**BATCH 1:**
- [ ] Homepage loads
- [ ] Navbar shows NIB badge
- [ ] Footer with WhatsApp button
- [ ] Network animation works

**BATCH 2:**
- [ ] About page loads
- [ ] Contact form works
- [ ] FAQ tabs function
- [ ] All pages have breadcrumb

**BATCH 3:**
- [ ] Database has 17 tables
- [ ] Admin user exists
- [ ] Login works
- [ ] Logout works

---

## 🔧 Configuration

### Database Credentials

Edit `BATCH-1-PUBLIC-PAGES/config/database.php`:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'your_database_user');
define('DB_PASS', 'your_database_password');
define('DB_NAME', 'your_database_name');
```

### Company Information

Edit `BATCH-1-PUBLIC-PAGES/config/constants.php`:

```php
define('COMPANY_NIB', 'your_nib_number');
define('COMPANY_NPWP', 'your_npwp_number');
define('COMPANY_WHATSAPP', '62xxxxxxxxxx');
define('COMPANY_EMAIL', 'your@email.com');
```

---

## 📱 Browser Support

- ✅ Chrome (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Edge (latest)
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

---

## 🤝 Contributing

This is a private project for SITUNEO DIGITAL. If you're part of the team:

1. Create a feature branch
2. Make your changes
3. Test thoroughly
4. Submit for review

---

## 📞 Support

### Developer Contact
- **WhatsApp:** +62 831-7386-8915
- **Email:** vins@situneo.my.id

### Company Contact
- **Website:** https://situneo.my.id
- **Support:** support@situneo.my.id

---

## 📝 License

Proprietary - © 2025 SITUNEO DIGITAL

**NIB:** 20250926145704515453
**NPWP:** 90.296.264.6-002.000
**Director:** Devin Prasetyo Hermawan

---

## 🙏 Acknowledgments

- Built with ❤️ for SITUNEO DIGITAL
- Powered by PHP, MySQL, Bootstrap
- UI animations by AOS & GSAP
- Icons by Bootstrap Icons

---

## 📈 Changelog

### v1.0.0 (2025-10-29)
- ✅ BATCH 1: Foundation complete and tested
- ✅ BATCH 2: Public pages complete with path fixes
- ✅ BATCH 3: Database (17 tables) and authentication complete
- ✅ Documentation: 6 comprehensive docs created
- ✅ Testing: Diagnostic tool (test.php) created

---

## 🎯 Roadmap

**Q1 2025:**
- [x] BATCH 1-3: Foundation, public pages, auth
- [ ] BATCH 4: Client dashboard
- [ ] BATCH 5: Partner dashboard
- [ ] BATCH 6: Admin panel

**Q2 2025:**
- [ ] Payment gateway integration
- [ ] Email notifications
- [ ] SMS notifications
- [ ] Advanced reporting

**Future:**
- [ ] Mobile app (React Native)
- [ ] API for third-party integrations
- [ ] Multi-language support expansion

---

## 💡 Quick Tips

1. **Always backup before updates**
2. **Test each batch before continuing**
3. **Use test.php for troubleshooting**
4. **Change default passwords immediately**
5. **Delete test.php after deployment**
6. **Keep documentation updated**

---

## 📖 Reading Order for New Developers

1. **README.md** (this file) - Project overview
2. **START-HERE.md** - Detailed getting started
3. **QUICK-REFERENCE.md** - Quick access to info
4. **DEPLOYMENT-CHECKLIST.md** - Step-by-step deployment
5. **TROUBLESHOOTING.md** - When things go wrong

---

**Last Updated:** 2025-10-29
**Version:** 1.0.0
**Status:** BATCH 1-3 Complete (50%)

**🚀 Ready to deploy? Start with [START-HERE.md](START-HERE.md)!**
