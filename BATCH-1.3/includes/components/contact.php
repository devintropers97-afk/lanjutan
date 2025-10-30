<?php
/**
 * Contact Section Component
 */
?>

<!-- Contact Section -->
<section id="contact" style="padding: 80px 0; background: white;">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title" style="font-size: 2.8rem; font-weight: 900; color: var(--dark-blue); margin-bottom: 15px;">
                <?= $lang === 'id' ? 'Hubungi Kami' : 'Contact Us' ?>
            </h2>
            <p class="lead" style="color: var(--text-light); max-width: 700px; margin: 0 auto; font-size: 1.2rem;">
                <?= $lang === 'id' ? 'Siap membantu mewujudkan website impian Anda!' : 'Ready to help bring your dream website to life!' ?>
            </p>
        </div>

        <div class="row g-5 align-items-start">
            <!-- Contact Info -->
            <div class="col-lg-5" data-aos="fade-right">
                <div class="card-premium" style="position: sticky; top: 100px;">
                    <h3 style="font-size: 1.8rem; font-weight: 900; color: var(--dark-blue); margin-bottom: 25px;">
                        <i class="bi bi-geo-alt-fill" style="color: var(--gold);"></i>
                        <?= $lang === 'id' ? 'Info Kontak' : 'Contact Information' ?>
                    </h3>

                    <!-- WhatsApp -->
                    <div style="display: flex; align-items: flex-start; gap: 20px; margin-bottom: 25px; padding: 20px; background: linear-gradient(135deg, rgba(37, 211, 102, 0.1), rgba(18, 140, 126, 0.1)); border-radius: 15px;">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #25D366, #128C7E); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="bi bi-whatsapp" style="font-size: 1.5rem; color: white;"></i>
                        </div>
                        <div>
                            <div style="font-weight: 600; color: var(--dark-blue); margin-bottom: 5px;">WhatsApp</div>
                            <a href="<?= whatsapp_link('Halo! Saya mau konsultasi tentang pembuatan website') ?>" style="color: var(--primary-blue); text-decoration: none; font-weight: 700; font-size: 1.1rem;">
                                <?= COMPANY_WHATSAPP ?>
                            </a>
                            <div style="font-size: 0.85rem; color: var(--text-light); margin-top: 5px;">
                                <i class="bi bi-clock"></i> Fast Response < 5 menit
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div style="display: flex; align-items: flex-start; gap: 20px; margin-bottom: 25px; padding: 20px; background: rgba(30, 92, 153, 0.08); border-radius: 15px;">
                        <div style="width: 50px; height: 50px; background: var(--gradient-blue); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="bi bi-envelope-fill" style="font-size: 1.5rem; color: white;"></i>
                        </div>
                        <div>
                            <div style="font-weight: 600; color: var(--dark-blue); margin-bottom: 5px;">Email</div>
                            <a href="mailto:<?= COMPANY_EMAIL ?>" style="color: var(--primary-blue); text-decoration: none; font-weight: 700;">
                                <?= COMPANY_EMAIL ?>
                            </a>
                            <div style="font-size: 0.85rem; color: var(--text-light); margin-top: 5px;">
                                <i class="bi bi-clock"></i> Response dalam 24 jam
                            </div>
                        </div>
                    </div>

                    <!-- Address -->
                    <div style="display: flex; align-items: flex-start; gap: 20px; margin-bottom: 25px; padding: 20px; background: rgba(255, 180, 0, 0.08); border-radius: 15px;">
                        <div style="width: 50px; height: 50px; background: var(--gradient-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="bi bi-geo-alt-fill" style="font-size: 1.5rem; color: var(--dark-blue);"></i>
                        </div>
                        <div>
                            <div style="font-weight: 600; color: var(--dark-blue); margin-bottom: 5px;"><?= $lang === 'id' ? 'Alamat' : 'Address' ?></div>
                            <div style="color: var(--text-light); line-height: 1.6;">
                                <?= COMPANY_ADDRESS ?>
                            </div>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div style="display: flex; align-items: flex-start; gap: 20px; padding: 20px; background: linear-gradient(135deg, rgba(30, 92, 153, 0.05), rgba(255, 180, 0, 0.05)); border-radius: 15px;">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue)); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="bi bi-clock-fill" style="font-size: 1.5rem; color: white;"></i>
                        </div>
                        <div>
                            <div style="font-weight: 600; color: var(--dark-blue); margin-bottom: 5px;"><?= $lang === 'id' ? 'Jam Operasional' : 'Business Hours' ?></div>
                            <div style="color: var(--text-light); line-height: 1.6;">
                                <?= $lang === 'id' ? 'Senin - Jumat: 09.00 - 18.00 WIB' : 'Monday - Friday: 09.00 - 18.00 WIB' ?><br>
                                <?= $lang === 'id' ? 'Sabtu: 09.00 - 15.00 WIB' : 'Saturday: 09.00 - 15.00 WIB' ?><br>
                                <strong style="color: var(--gold);"><?= $lang === 'id' ? 'Support 24/7 via WhatsApp' : '24/7 Support via WhatsApp' ?></strong>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div style="margin-top: 30px; padding-top: 30px; border-top: 2px solid rgba(30, 92, 153, 0.1);">
                        <div style="font-weight: 600; color: var(--dark-blue); margin-bottom: 15px;">
                            <i class="bi bi-share-fill" style="color: var(--gold);"></i>
                            <?= $lang === 'id' ? 'Ikuti Kami' : 'Follow Us' ?>
                        </div>
                        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                            <a href="<?= SOCIAL_INSTAGRAM ?>" target="_blank" style="width: 45px; height: 45px; background: linear-gradient(135deg, #E1306C, #C13584); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: transform 0.3s ease;">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="<?= SOCIAL_FACEBOOK ?>" target="_blank" style="width: 45px; height: 45px; background: #1877F2; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: transform 0.3s ease;">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="<?= SOCIAL_TIKTOK ?>" target="_blank" style="width: 45px; height: 45px; background: #000000; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: transform 0.3s ease;">
                                <i class="bi bi-tiktok"></i>
                            </a>
                            <a href="<?= SOCIAL_LINKEDIN ?>" target="_blank" style="width: 45px; height: 45px; background: #0A66C2; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: transform 0.3s ease;">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="<?= SOCIAL_YOUTUBE ?>" target="_blank" style="width: 45px; height: 45px; background: #FF0000; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: transform 0.3s ease;">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="card-premium">
                    <h3 style="font-size: 1.8rem; font-weight: 900; color: var(--dark-blue); margin-bottom: 10px;">
                        <?= $lang === 'id' ? 'Kirim Pesan' : 'Send Message' ?>
                    </h3>
                    <p style="color: var(--text-light); margin-bottom: 30px;">
                        <?= $lang === 'id' ? 'Isi form di bawah atau langsung chat via WhatsApp untuk respon lebih cepat!' : 'Fill the form below or chat directly via WhatsApp for faster response!' ?>
                    </p>

                    <form id="contactForm" action="includes/handlers/contact-handler.php" method="POST">
                        <div class="row g-3">
                            <!-- Name -->
                            <div class="col-md-6">
                                <label style="font-weight: 600; color: var(--dark-blue); margin-bottom: 8px; display: block;">
                                    <i class="bi bi-person"></i> <?= $lang === 'id' ? 'Nama Lengkap' : 'Full Name' ?> <span style="color: red;">*</span>
                                </label>
                                <input type="text" name="name" class="form-control" required style="border-radius: 12px; padding: 12px 18px; border: 2px solid rgba(30, 92, 153, 0.2);" placeholder="<?= $lang === 'id' ? 'Masukkan nama lengkap' : 'Enter full name' ?>">
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label style="font-weight: 600; color: var(--dark-blue); margin-bottom: 8px; display: block;">
                                    <i class="bi bi-envelope"></i> Email <span style="color: red;">*</span>
                                </label>
                                <input type="email" name="email" class="form-control" required style="border-radius: 12px; padding: 12px 18px; border: 2px solid rgba(30, 92, 153, 0.2);" placeholder="nama@email.com">
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <label style="font-weight: 600; color: var(--dark-blue); margin-bottom: 8px; display: block;">
                                    <i class="bi bi-phone"></i> <?= $lang === 'id' ? 'No. WhatsApp' : 'WhatsApp Number' ?> <span style="color: red;">*</span>
                                </label>
                                <input type="tel" name="phone" class="form-control" required style="border-radius: 12px; padding: 12px 18px; border: 2px solid rgba(30, 92, 153, 0.2);" placeholder="08xx-xxxx-xxxx">
                            </div>

                            <!-- Service Interest -->
                            <div class="col-md-6">
                                <label style="font-weight: 600; color: var(--dark-blue); margin-bottom: 8px; display: block;">
                                    <i class="bi bi-tag"></i> <?= $lang === 'id' ? 'Layanan yang Diminati' : 'Service Interest' ?>
                                </label>
                                <select name="service" class="form-select" style="border-radius: 12px; padding: 12px 18px; border: 2px solid rgba(30, 92, 153, 0.2);">
                                    <option value=""><?= $lang === 'id' ? '-- Pilih Layanan --' : '-- Select Service --' ?></option>
                                    <option value="website">Website</option>
                                    <option value="ecommerce">E-Commerce</option>
                                    <option value="marketing">Digital Marketing</option>
                                    <option value="seo">SEO</option>
                                    <option value="ai">AI & Automation</option>
                                    <option value="branding">Branding</option>
                                    <option value="content">Content Creation</option>
                                    <option value="other"><?= $lang === 'id' ? 'Lainnya' : 'Other' ?></option>
                                </select>
                            </div>

                            <!-- Message -->
                            <div class="col-12">
                                <label style="font-weight: 600; color: var(--dark-blue); margin-bottom: 8px; display: block;">
                                    <i class="bi bi-chat-text"></i> <?= $lang === 'id' ? 'Pesan' : 'Message' ?> <span style="color: red;">*</span>
                                </label>
                                <textarea name="message" class="form-control" rows="5" required style="border-radius: 12px; padding: 12px 18px; border: 2px solid rgba(30, 92, 153, 0.2); resize: vertical;" placeholder="<?= $lang === 'id' ? 'Ceritakan kebutuhan Anda...' : 'Tell us about your needs...' ?>"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-warning w-100" style="border-radius: 15px; padding: 15px; font-weight: 700; font-size: 1.1rem; box-shadow: 0 8px 25px rgba(255, 180, 0, 0.4);">
                                    <i class="bi bi-send-fill"></i>
                                    <?= $lang === 'id' ? 'Kirim Pesan' : 'Send Message' ?>
                                </button>
                            </div>

                            <!-- Or WhatsApp -->
                            <div class="col-12">
                                <div style="text-align: center; margin: 20px 0;">
                                    <div style="display: inline-block; background: white; padding: 0 15px; position: relative; z-index: 1;">
                                        <span style="color: var(--text-light); font-weight: 600;">ATAU</span>
                                    </div>
                                    <div style="border-top: 2px solid rgba(30, 92, 153, 0.1); margin-top: -12px;"></div>
                                </div>
                                <a href="<?= whatsapp_link('Halo! Saya mau konsultasi tentang pembuatan website') ?>" class="btn btn-success w-100" style="border-radius: 15px; padding: 15px; font-weight: 700; font-size: 1.1rem; background: linear-gradient(135deg, #25D366, #128C7E); border: none;">
                                    <i class="bi bi-whatsapp"></i>
                                    <?= $lang === 'id' ? 'Chat Langsung via WhatsApp' : 'Chat Directly via WhatsApp' ?>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Contact Form Styles */
.form-control:focus,
.form-select:focus {
    border-color: var(--gold);
    box-shadow: 0 0 0 0.2rem rgba(255, 180, 0, 0.25);
}

/* Social Media Hover Effect */
a[href*="instagram"]:hover,
a[href*="facebook"]:hover,
a[href*="tiktok"]:hover,
a[href*="linkedin"]:hover,
a[href*="youtube"]:hover {
    transform: scale(1.15);
}
</style>

<script>
// Contact Form Submit Handler
document.getElementById('contactForm')?.addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Mengirim...';

    fetch(this.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('<?= $lang === 'id' ? 'Pesan berhasil dikirim! Kami akan segera menghubungi Anda.' : 'Message sent successfully! We will contact you soon.' ?>');
            this.reset();
        } else {
            alert('<?= $lang === 'id' ? 'Gagal mengirim pesan. Silakan coba lagi atau hubungi via WhatsApp.' : 'Failed to send message. Please try again or contact via WhatsApp.' ?>');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('<?= $lang === 'id' ? 'Terjadi kesalahan. Silakan hubungi kami via WhatsApp.' : 'An error occurred. Please contact us via WhatsApp.' ?>');
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    });
});
</script>
