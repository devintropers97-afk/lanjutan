<?php
require_once __DIR__ . '/../BATCH-1-PUBLIC-PAGES/includes/init.php';
require_once __DIR__ . '/../includes/data/faq-data.php';

$page_title = 'FAQ - Pertanyaan Yang Sering Ditanya - ' . APP_NAME;
$page_description = 'Temukan jawaban untuk pertanyaan yang sering ditanya tentang layanan SITUNEO DIGITAL';
$breadcrumb_items = [['name' => 'FAQ']];
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
                <h1 class="display-4 fw-bold mb-3">FAQ</h1>
                <p class="lead">Pertanyaan Yang Sering Ditanya</p>
            </div>

            <div class="faq-tabs" data-aos="fade-up">
                <button class="faq-tab active" data-tab="client">Untuk Klien</button>
                <button class="faq-tab" data-tab="partner">Untuk Partner</button>
                <button class="faq-tab" data-tab="general">Umum</button>
            </div>

            <!-- Client FAQ -->
            <div class="faq-content" id="faq-client">
                <?php foreach ($faq_items['client'] as $index => $faq): ?>
                <div class="faq-item" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                    <div class="faq-question">
                        <span><?= e($faq['question']) ?></span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p><?= nl2br(e($faq['answer'])) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Partner FAQ -->
            <div class="faq-content" id="faq-partner" style="display: none;">
                <?php foreach ($faq_items['partner'] as $index => $faq): ?>
                <div class="faq-item" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                    <div class="faq-question">
                        <span><?= e($faq['question']) ?></span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p><?= nl2br(e($faq['answer'])) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- General FAQ -->
            <div class="faq-content" id="faq-general" style="display: none;">
                <?php foreach ($faq_items['general'] as $index => $faq): ?>
                <div class="faq-item" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                    <div class="faq-question">
                        <span><?= e($faq['question']) ?></span>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p><?= nl2br(e($faq['answer'])) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <div class="cta-banner" data-aos="zoom-in">
                <h2>Masih Punya Pertanyaan?</h2>
                <p>Tim kami siap membantu Anda!</p>
                <a href="<?= whatsapp_link('Halo, saya punya pertanyaan...') ?>" class="btn-gold">
                    <i class="bi bi-whatsapp"></i> Chat Dengan Kami
                </a>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/../BATCH-1-PUBLIC-PAGES/components/layout/footer.php'; ?>
    <?php include __DIR__ . '/../BATCH-1-PUBLIC-PAGES/components/layout/scripts.php'; ?>
    
    <script>
    // FAQ Tabs
    document.querySelectorAll('.faq-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.faq-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            const targetTab = this.getAttribute('data-tab');
            document.querySelectorAll('.faq-content').forEach(content => {
                content.style.display = 'none';
            });
            document.getElementById('faq-' + targetTab).style.display = 'block';
        });
    });

    // FAQ Accordion
    document.querySelectorAll('.faq-question').forEach(question => {
        question.addEventListener('click', function() {
            const faqItem = this.parentElement;
            faqItem.classList.toggle('active');
        });
    });
    </script>
</body>
</html>
