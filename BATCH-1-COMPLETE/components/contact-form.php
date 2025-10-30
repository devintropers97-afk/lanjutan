<?php
/**
 * Contact Form Component
 * Usage: include('components/contact-form.php');
 */
?>

<form id="contactForm" class="contact-form" data-aos="fade-up">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label"><?= t('full_name') ?> <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="phone" class="form-label"><?= t('phone_number') ?> <span class="text-danger">*</span></label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="email" class="form-label"><?= t('email') ?> <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="service" class="form-label"><?= t('interested_service') ?></label>
            <select class="form-control" id="service" name="service">
                <option value="">Pilih Layanan</option>
                <option value="website">Website & Development</option>
                <option value="marketing">Digital Marketing</option>
                <option value="ai">AI & Automation</option>
                <option value="branding">Branding & Creative</option>
                <option value="content">Content & Copywriting</option>
                <option value="analytics">Data & Analytics</option>
                <option value="infrastructure">Infrastructure & Legal</option>
                <option value="customer-experience">Customer Experience</option>
            </select>
        </div>
    </div>

    <div class="mb-3">
        <label for="message" class="form-label"><?= t('message') ?> <span class="text-danger">*</span></label>
        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn-gold">
        <i class="bi bi-send"></i> Kirim Pesan
    </button>
</form>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;
    const service = document.getElementById('service').value;
    const message = document.getElementById('message').value;

    const whatsappMessage = '*PESAN DARI WEBSITE*\n\n' +
        'Nama: ' + name + '\n' +
        'HP: ' + phone + '\n' +
        'Email: ' + email + '\n' +
        'Layanan: ' + service + '\n' +
        'Pesan: ' + message;

    const whatsappUrl = 'https://wa.me/6283173868915?text=' + encodeURIComponent(whatsappMessage);
    window.open(whatsappUrl, '_blank');

    // Reset form
    this.reset();
    alert('Terima kasih! Anda akan diarahkan ke WhatsApp.');
});
</script>

<style>
.contact-form {
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.contact-form .form-label {
    font-weight: 600;
    color: var(--dark-blue);
    margin-bottom: 8px;
}

.contact-form .form-control {
    border: 2px solid rgba(30, 92, 153, 0.2);
    border-radius: 10px;
    padding: 12px 15px;
    transition: all 0.3s ease;
}

.contact-form .form-control:focus {
    border-color: var(--gold);
    box-shadow: 0 0 0 0.2rem rgba(255, 180, 0, 0.25);
}

.contact-form .btn-gold {
    width: 100%;
    padding: 15px;
    font-size: 18px;
    margin-top: 10px;
}
</style>
