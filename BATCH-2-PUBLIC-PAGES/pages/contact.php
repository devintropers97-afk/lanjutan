<?php
require_once __DIR__ . '/../BATCH-1-PUBLIC-PAGES/includes/init.php';

$page_title = 'Hubungi Kami - ' . APP_NAME;
$page_description = 'Hubungi SITUNEO DIGITAL untuk konsultasi gratis. WhatsApp: ' . COMPANY_WHATSAPP . ', Email: ' . COMPANY_EMAIL;
$breadcrumb_items = [['name' => 'Hubungi Kami']];
?>
<!DOCTYPE html>
<html lang="<?= get_language() ?>">
<head>
    <?php include __DIR__ . '/../BATCH-1-PUBLIC-PAGES/components/layout/head.php'; ?>
    <link rel="stylesheet" href="<?= APP_URL ?>/BATCH-2-PUBLIC-PAGES/assets/css/pages.css">
</head>
<body>
    <?php include __DIR__ . '/../BATCH-1-PUBLIC-PAGES/components/layout/navbar.php'; ?>
    <?php include __DIR__ . '/../BATCH-2-PUBLIC-PAGES/components/breadcrumb.php'; ?>
    
    <section class="about-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h1 class="display-4 fw-bold mb-3">Hubungi Kami</h1>
                <p class="lead">Ada pertanyaan? Tim kami siap membantu Anda!</p>
            </div>

            <div class="row mb-5">
                <div class="col-lg-4 mb-4" data-aos="fade-up">
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <h4>WhatsApp</h4>
                        <p><?= format_phone(COMPANY_WHATSAPP) ?></p>
                        <a href="<?= whatsapp_link(default_whatsapp_message()) ?>" class="btn-gold btn-sm">Chat Sekarang</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <h4>Email</h4>
                        <p><?= COMPANY_EMAIL ?></p>
                        <p><?= COMPANY_EMAIL_SUPPORT ?></p>
                        <a href="mailto:<?= COMPANY_EMAIL ?>" class="btn-gold btn-sm">Kirim Email</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-info-card">
                        <div class="contact-info-icon">
                            <i class="bi bi-clock"></i>
                        </div>
                        <h4>Jam Operasional</h4>
                        <p>Senin - Jumat<br>09:00 - 18:00 WIB</p>
                        <p>Sabtu<br>09:00 - 15:00 WIB</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4" data-aos="fade-right">
                    <h2 class="mb-4">Kirim Pesan</h2>
                    <?php include __DIR__ . '/../BATCH-2-PUBLIC-PAGES/components/contact-form.php'; ?>
                </div>
                <div class="col-lg-6 mb-4" data-aos="fade-left">
                    <h2 class="mb-4">Informasi Perusahaan</h2>
                    <div class="card-premium">
                        <h5><i class="bi bi-building"></i> <?= APP_NAME ?></h5>
                        <hr>
                        <p><strong>NIB:</strong> <?= COMPANY_NIB ?></p>
                        <p><strong>NPWP:</strong> <?= COMPANY_NPWP ?></p>
                        <p><strong>Direktur:</strong> <?= COMPANY_DIRECTOR ?></p>
                        <hr>
                        <p><strong>Rekening Bank:</strong></p>
                        <p>BCA <?= BANK_ACCOUNT_NUMBER ?><br>a/n <?= BANK_ACCOUNT_NAME ?></p>
                        <hr>
                        <div class="d-flex gap-3">
                            <a href="<?= SOCIAL_INSTAGRAM ?>" class="btn btn-outline-primary btn-sm"><i class="bi bi-instagram"></i></a>
                            <a href="<?= SOCIAL_FACEBOOK ?>" class="btn btn-outline-primary btn-sm"><i class="bi bi-facebook"></i></a>
                            <a href="<?= SOCIAL_LINKEDIN ?>" class="btn btn-outline-primary btn-sm"><i class="bi bi-linkedin"></i></a>
                            <a href="<?= SOCIAL_YOUTUBE ?>" class="btn btn-outline-danger btn-sm"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/../BATCH-1-PUBLIC-PAGES/components/layout/footer.php'; ?>
    <?php include __DIR__ . '/../BATCH-1-PUBLIC-PAGES/components/layout/scripts.php'; ?>
</body>
</html>
