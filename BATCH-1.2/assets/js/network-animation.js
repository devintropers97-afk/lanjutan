/**
 * ================================================
 * SITUNEO DIGITAL - Network Animation
 * ================================================
 * Animated network background dengan particles & connections
 * (Particles yang bergerak dan saling terhubung)
 */

// Wait sampai DOM ready
document.addEventListener('DOMContentLoaded', function() {
    // Get network background element
    const networkBg = document.getElementById('networkBg');

    if (!networkBg) {
        console.log('Network background element not found');
        return;
    }

    // Create canvas
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    networkBg.appendChild(canvas);

    // Resize canvas function
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }

    // Call resize pada load
    resizeCanvas();

    // Resize saat window resize
    window.addEventListener('resize', resizeCanvas);

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

            // Bounce dari dinding
            if (this.x < 0 || this.x > canvas.width) this.vx = -this.vx;
            if (this.y < 0 || this.y > canvas.height) this.vy = -this.vy;
        }

        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(255, 180, 0, 0.7)'; // Gold color
            ctx.fill();
        }
    }

    // Create particles array
    const particles = [];
    const particleCount = 80; // Jumlah particles

    for (let i = 0; i < particleCount; i++) {
        particles.push(new Particle());
    }

    // Connection distance
    const connectionDistance = 150;

    // Draw connections between particles
    function connectParticles() {
        for (let i = 0; i < particles.length; i++) {
            for (let j = i + 1; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < connectionDistance) {
                    const opacity = 0.2 * (1 - distance / connectionDistance);
                    ctx.beginPath();
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.strokeStyle = `rgba(255, 180, 0, ${opacity})`;
                    ctx.lineWidth = 0.5;
                    ctx.stroke();
                }
            }
        }
    }

    // Animation loop
    function animate() {
        // Clear canvas
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Update dan draw semua particles
        particles.forEach(particle => {
            particle.update();
            particle.draw();
        });

        // Draw connections
        connectParticles();

        // Loop animation
        requestAnimationFrame(animate);
    }

    // Start animation
    animate();

    console.log('✅ Network animation initialized');
});
