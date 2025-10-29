/**
 * ================================================
 * SITUNEO DIGITAL - Main JavaScript
 * ================================================
 * File ini berisi JavaScript utama website:
 * - Navbar scroll effect
 * - FAQ accordion
 * - Smooth scroll
 * - dll
 */

// Document Ready
document.addEventListener('DOMContentLoaded', function() {

    // ========================================
    // Navbar Scroll Effect
    // ========================================
    const navbar = document.querySelector('.navbar-premium');

    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    // ========================================
    // Smooth Scroll untuk anchor links
    // ========================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // ========================================
    // FAQ Accordion
    // ========================================
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const faqItem = this.parentElement;
            const isActive = faqItem.classList.contains('active');

            // Close semua FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });

            // Open clicked item (kalau belum active)
            if (!isActive) {
                faqItem.classList.add('active');
            }
        });
    });

    // ========================================
    // Active Nav Link (berdasarkan current page)
    // ========================================
    const currentLocation = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        if (link.href.includes(currentLocation)) {
            link.classList.add('active');
        }
    });

    // ========================================
    // Mobile Menu Close saat klik nav link
    // ========================================
    const navbarCollapse = document.querySelector('.navbar-collapse');
    const navLinksMobile = document.querySelectorAll('.navbar-nav .nav-link');

    navLinksMobile.forEach(link => {
        link.addEventListener('click', function() {
            if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                    toggle: false
                });
                bsCollapse.hide();
            }
        });
    });

    // ========================================
    // Back to Top Button (sudah ada di footer.php)
    // ========================================
    const backToTop = document.getElementById('backToTop');

    if (backToTop) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        backToTop.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // ========================================
    // Loading Animation (fade in content)
    // ========================================
    document.body.style.opacity = '0';

    window.addEventListener('load', function() {
        document.body.style.transition = 'opacity 0.5s ease-in-out';
        document.body.style.opacity = '1';
    });

    console.log('✅ Main.js loaded successfully');
});
