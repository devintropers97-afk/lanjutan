<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - SITUNEO DIGITAL</title>
    <meta name="description" content="Masuk ke akun SITUNEO DIGITAL untuk mengakses layanan digital kami">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="https://situneo.my.id/logo">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #1E5C99;
            --dark-blue: #0F3057;
            --gold: #FFB400;
            --bright-gold: #FFD700;
            --white: #ffffff;
            --text-light: #e9ecef;
            --gradient-primary: linear-gradient(135deg, #1E5C99 0%, #0F3057 100%);
            --gradient-gold: linear-gradient(135deg, #FFD700 0%, #FFB400 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark-blue);
            color: var(--white);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Animated Background */
        .bg-animation {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
        }

        .bg-animation canvas {
            width: 100%;
            height: 100%;
        }

        .auth-container {
            background: rgba(15, 48, 87, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 180, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            position: relative;
            z-index: 1;
        }

        .auth-row {
            display: flex;
            flex-wrap: wrap;
            min-height: 600px;
        }

        .auth-left {
            flex: 1;
            min-width: 350px;
            background: var(--gradient-primary);
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .auth-left::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255,180,0,0.15) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translate(-50%, -50%) translate(0, 0); }
            50% { transform: translate(-50%, -50%) translate(20px, 20px); }
        }

        .auth-right {
            flex: 1;
            min-width: 350px;
            padding: 50px 40px;
        }

        .logo {
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .logo img {
            width: 140px;
            height: 140px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            border: 3px solid rgba(255, 180, 0, 0.3);
        }

        .auth-left-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 2.2rem;
            font-weight: 900;
            margin-bottom: 15px;
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
            z-index: 1;
        }

        .auth-left-tagline {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .auth-left-features {
            text-align: left;
            position: relative;
            z-index: 1;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            transition: all 0.3s;
        }

        .feature-item:hover {
            background: rgba(255, 180, 0, 0.2);
            transform: translateX(5px);
        }

        .feature-item i {
            font-size: 1.5rem;
            color: var(--gold);
            margin-right: 15px;
        }

        .feature-item span {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .auth-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 10px;
            color: var(--gold);
        }

        .auth-subtitle {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 30px;
        }

        /* Role Tabs */
        .role-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }

        .role-tab {
            flex: 1;
            padding: 12px 20px;
            border: 2px solid rgba(255, 180, 0, 0.3);
            border-radius: 10px;
            background: transparent;
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            text-align: center;
        }

        .role-tab:hover {
            border-color: var(--gold);
            color: var(--white);
        }

        .role-tab.active {
            background: var(--gradient-gold);
            border-color: var(--gold);
            color: var(--dark-blue);
        }

        .role-tab i {
            margin-right: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            color: var(--text-light);
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 14px 18px;
            color: var(--white);
            transition: all 0.3s;
            font-size: 1rem;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--gold);
            box-shadow: 0 0 0 0.25rem rgba(255, 180, 0, 0.25);
            color: var(--white);
            outline: none;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .input-group {
            position: relative;
        }

        .input-group .form-control {
            padding-right: 45px;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gold);
            cursor: pointer;
            font-size: 1.2rem;
        }

        .form-check {
            margin-bottom: 20px;
        }

        .form-check-input {
            background-color: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .form-check-input:checked {
            background-color: var(--gold);
            border-color: var(--gold);
        }

        .form-check-label {
            color: rgba(255, 255, 255, 0.8);
        }

        .btn-gold {
            background: var(--gradient-gold);
            color: var(--dark-blue);
            border: none;
            padding: 14px 30px;
            font-weight: 700;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            width: 100%;
            box-shadow: 0 5px 15px rgba(255, 180, 0, 0.3);
            font-size: 1rem;
        }

        .btn-gold:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 180, 0, 0.6);
            color: var(--dark-blue);
        }

        .btn-gold:active {
            transform: translateY(-1px);
        }

        .btn-gold i {
            margin-right: 8px;
        }

        .auth-link {
            color: var(--gold);
            text-decoration: none;
            transition: all 0.3s;
        }

        .auth-link:hover {
            color: var(--bright-gold);
            text-decoration: underline;
        }

        .divider {
            text-align: center;
            margin: 20px 0;
            color: rgba(255, 255, 255, 0.5);
            position: relative;
        }

        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background: rgba(255, 255, 255, 0.2);
        }

        .divider::before {
            left: 0;
        }

        .divider::after {
            right: 0;
        }

        .admin-login-link {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .admin-login-link a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .admin-login-link a:hover {
            color: var(--gold);
        }

        .admin-login-link i {
            margin-right: 5px;
        }

        @media (max-width: 768px) {
            .auth-left {
                min-width: 100%;
                min-height: 300px;
                padding: 30px 20px;
            }

            .auth-right {
                min-width: 100%;
                padding: 30px 20px;
            }

            .auth-left-title {
                font-size: 1.8rem;
            }

            .auth-title {
                font-size: 1.5rem;
            }

            .logo img {
                width: 100px;
                height: 100px;
            }

            .role-tabs {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="bg-animation">
        <canvas id="bgCanvas"></canvas>
    </div>

    <!-- Auth Container -->
    <div class="auth-container">
        <div class="auth-row">
            <!-- Left Side: Branding -->
            <div class="auth-left">
                <div class="logo">
                    <img src="https://situneo.my.id/logo" alt="SITUNEO DIGITAL">
                </div>
                <h1 class="auth-left-title">SITUNEO DIGITAL</h1>
                <p class="auth-left-tagline">Digital Harmony for a Modern World</p>

                <div class="auth-left-features">
                    <div class="feature-item">
                        <i class="bi bi-shield-check"></i>
                        <span>Keamanan data terjamin dengan enkripsi tingkat tinggi</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard intuitif untuk kelola semua project</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-headset"></i>
                        <span>Support 24/7 via WhatsApp untuk bantuan cepat</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-rocket-takeoff"></i>
                        <span>FREE Demo 24 jam sebelum bayar</span>
                    </div>
                </div>
            </div>

            <!-- Right Side: Login Form -->
            <div class="auth-right">
                <h2 class="auth-title">Selamat Datang Kembali!</h2>
                <p class="auth-subtitle">Masuk ke akun Anda untuk melanjutkan</p>

                <!-- Role Selection Tabs -->
                <div class="role-tabs">
                    <button class="role-tab active" data-role="client">
                        <i class="bi bi-person"></i> Client
                    </button>
                    <button class="role-tab" data-role="freelancer">
                        <i class="bi bi-briefcase"></i> Freelancer
                    </button>
                </div>

                <!-- Login Form -->
                <form action="/auth/login-process.php" method="POST" id="loginForm">
                    <input type="hidden" name="role" id="roleInput" value="client">

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Masukkan password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword()">
                                <i class="bi bi-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">
                                Ingat saya
                            </label>
                        </div>
                        <a href="/auth/forgot-password" class="auth-link">Lupa password?</a>
                    </div>

                    <button type="submit" class="btn-gold">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Masuk
                    </button>
                </form>

                <div class="divider">atau</div>

                <p class="text-center">
                    Belum punya akun? <a href="/auth/register" class="auth-link">Daftar sekarang</a>
                </p>

                <div class="admin-login-link">
                    <a href="?admin=true">
                        <i class="bi bi-gear"></i>
                        Login sebagai Admin
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Role Tab Switching
        document.querySelectorAll('.role-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                document.querySelectorAll('.role-tab').forEach(t => t.classList.remove('active'));

                // Add active class to clicked tab
                this.classList.add('active');

                // Update hidden role input
                const role = this.getAttribute('data-role');
                document.getElementById('roleInput').value = role;
            });
        });

        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            }
        }

        // Animated Background (Simple Particles)
        const canvas = document.getElementById('bgCanvas');
        const ctx = canvas.getContext('2d');

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const particles = [];
        const particleCount = 50;

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

                if (this.x < 0 || this.x > canvas.width) this.vx *= -1;
                if (this.y < 0 || this.y > canvas.height) this.vy *= -1;
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(255, 180, 0, 0.3)';
                ctx.fill();
            }
        }

        for (let i = 0; i < particleCount; i++) {
            particles.push(new Particle());
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            particles.forEach(particle => {
                particle.update();
                particle.draw();
            });

            // Draw connections
            particles.forEach((p1, i) => {
                particles.slice(i + 1).forEach(p2 => {
                    const dx = p1.x - p2.x;
                    const dy = p1.y - p2.y;
                    const distance = Math.sqrt(dx * dx + dy * dy);

                    if (distance < 150) {
                        ctx.beginPath();
                        ctx.moveTo(p1.x, p1.y);
                        ctx.lineTo(p2.x, p2.y);
                        ctx.strokeStyle = `rgba(255, 180, 0, ${0.2 * (1 - distance / 150)})`;
                        ctx.lineWidth = 1;
                        ctx.stroke();
                    }
                });
            });

            requestAnimationFrame(animate);
        }

        animate();

        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });
    </script>
</body>
</html>
