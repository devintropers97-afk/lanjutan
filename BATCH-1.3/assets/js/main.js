/**
 * ================================================
 * SITUNEO DIGITAL - Main JavaScript
 * ================================================
 * BATCH 1.3 - Commercial Design Edition
 * Features: Loading Screen, Network Animation, Order Notifications, Popup Modal
 */

// ========================================
// LOADING SCREEN
// ========================================
window.addEventListener('load', function() {
    setTimeout(function() {
        const loadingScreen = document.getElementById('loadingScreen');
        if (loadingScreen) {
            loadingScreen.classList.add('hidden');
            // Remove from DOM after animation
            setTimeout(() => loadingScreen.remove(), 500);
        }
    }, 1500); // Show loading for 1.5 seconds
});

// ========================================
// NETWORK CANVAS ANIMATION
// ========================================
function initNetworkCanvas() {
    const canvas = document.getElementById('network-canvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    let particles = [];
    let animationId;

    // Set canvas size
    function setCanvasSize() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    setCanvasSize();
    window.addEventListener('resize', setCanvasSize);

    // Particle class
    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.vx = (Math.random() - 0.5) * 0.5;
            this.vy = (Math.random() - 0.5) * 0.5;
            this.radius = Math.random() * 2 + 1;
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;

            // Bounce off edges
            if (this.x < 0 || this.x > canvas.width) this.vx *= -1;
            if (this.y < 0 || this.y > canvas.height) this.vy *= -1;
        }

        draw() {
            ctx.fillStyle = '#1E5C99';
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    // Create particles
    function createParticles() {
        particles = [];
        const particleCount = Math.min(80, Math.floor(canvas.width / 15));
        for (let i = 0; i < particleCount; i++) {
            particles.push(new Particle());
        }
    }
    createParticles();

    // Draw connections
    function drawConnections() {
        for (let i = 0; i < particles.length; i++) {
            for (let j = i + 1; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < 150) {
                    ctx.strokeStyle = `rgba(30, 92, 153, ${1 - distance / 150})`;
                    ctx.lineWidth = 0.5;
                    ctx.beginPath();
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                }
            }
        }
    }

    // Animation loop
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        particles.forEach(particle => {
            particle.update();
            particle.draw();
        });

        drawConnections();

        animationId = requestAnimationFrame(animate);
    }

    animate();
}

// Initialize network canvas when DOM is loaded
document.addEventListener('DOMContentLoaded', initNetworkCanvas);

// ========================================
// ORDER NOTIFICATIONS
// ========================================
function initOrderNotifications() {
    const orders = [
        { name: 'Budi S.', service: 'Website Company Profile', location: 'Jakarta' },
        { name: 'Siti A.', service: 'Toko Online Lengkap', location: 'Bandung' },
        { name: 'Agus P.', service: 'Digital Marketing', location: 'Surabaya' },
        { name: 'Rina M.', service: 'Logo & Branding', location: 'Yogyakarta' },
        { name: 'Doni W.', service: 'SEO Optimization', location: 'Medan' },
        { name: 'Maya L.', service: 'Website Restoran', location: 'Bali' },
        { name: 'Hendra T.', service: 'E-Commerce Premium', location: 'Semarang' },
        { name: 'Linda K.', service: 'Chatbot AI', location: 'Malang' }
    ];

    let currentIndex = 0;

    function showNotification() {
        const notification = document.getElementById('orderNotification');
        if (!notification) return;

        const order = orders[currentIndex];

        // Update notification content
        notification.querySelector('h4').textContent = `${order.name} - ${order.location}`;
        notification.querySelector('p').textContent = `Baru saja order: ${order.service}`;

        // Show notification
        notification.classList.add('show');

        // Hide after 5 seconds
        setTimeout(() => {
            notification.classList.remove('show');
        }, 5000);

        // Move to next order
        currentIndex = (currentIndex + 1) % orders.length;
    }

    // Show first notification after 3 seconds
    setTimeout(showNotification, 3000);

    // Then show every 30 seconds
    setInterval(showNotification, 30000);
}

document.addEventListener('DOMContentLoaded', initOrderNotifications);

// ========================================
// AUTO POPUP MODAL
// ========================================
function initAutoPopup() {
    setTimeout(function() {
        const demoModal = document.getElementById('demoModal');
        if (demoModal && typeof bootstrap !== 'undefined') {
            const modal = new bootstrap.Modal(demoModal);
            modal.show();
        }
    }, 10000); // Show after 10 seconds
}

document.addEventListener('DOMContentLoaded', initAutoPopup);

// ========================================
// COUNTER ANIMATION
// ========================================
function animateCounter(element, start, end, duration) {
    let startTimestamp = null;

    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const value = Math.floor(progress * (end - start) + start);
        element.textContent = value + (element.dataset.suffix || '');

        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };

    window.requestAnimationFrame(step);
}

// Observe counters and animate when visible
function initCounters() {
    const counters = document.querySelectorAll('.stat-number[data-count]');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const endValue = parseInt(target.dataset.count);
                animateCounter(target, 0, endValue, 2000);
                observer.unobserve(target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));
}

document.addEventListener('DOMContentLoaded', initCounters);

// ========================================
// SMOOTH SCROLL
// ========================================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#') return;

        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// ========================================
// WHATSAPP ORDER BUTTON
// ========================================
function initOrderButtons() {
    document.querySelectorAll('.btn-order').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const serviceName = this.dataset.service || 'Layanan SITUNEO';
            const message = `Halo SITUNEO DIGITAL!\n\nSaya tertarik dengan layanan: *${serviceName}*\n\nMohon info lebih lanjut. Terima kasih!`;
            const whatsappUrl = `https://wa.me/6283173868915?text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');
        });
    });
}

document.addEventListener('DOMContentLoaded', initOrderButtons);

// ========================================
// LANGUAGE SWITCHER
// ========================================
function initLanguageSwitcher() {
    const langButtons = document.querySelectorAll('.lang-btn');

    langButtons.forEach(button => {
        button.addEventListener('click', function() {
            const lang = this.dataset.lang;

            // Update URL
            const url = new URL(window.location);
            url.searchParams.set('lang', lang);
            window.location.href = url.toString();
        });
    });
}

document.addEventListener('DOMContentLoaded', initLanguageSwitcher);

// ========================================
// MOBILE MENU TOGGLE
// ========================================
function initMobileMenu() {
    const menuToggle = document.getElementById('mobileMenuToggle');
    const navbarMenu = document.querySelector('.navbar-menu');

    if (menuToggle && navbarMenu) {
        menuToggle.addEventListener('click', function() {
            navbarMenu.classList.toggle('active');
            this.classList.toggle('active');
        });
    }
}

document.addEventListener('DOMContentLoaded', initMobileMenu);

// ========================================
// FORMAT RUPIAH HELPER
// ========================================
function formatRupiah(angka) {
    if (angka === 0) return 'Rp 0';
    const formatted = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(angka);
    return formatted;
}

// Make it globally available
window.formatRupiah = formatRupiah;

// ========================================
// AOS ANIMATION (if library is loaded)
// ========================================
if (typeof AOS !== 'undefined') {
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });
}

console.log('🚀 SITUNEO DIGITAL - BATCH 1.3 Loaded Successfully!');
