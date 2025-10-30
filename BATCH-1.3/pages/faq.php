<?php
/**
 * FAQ Page
 */
require_once __DIR__ . '/../includes/config/config.php';
require_once __DIR__ . '/../includes/data/faq-data.php';

$page_title = $lang === 'id' ? 'FAQ - Pertanyaan yang Sering Diajukan' : 'FAQ - Frequently Asked Questions';
?>

<?php include __DIR__ . '/../includes/components/header.php'; ?>

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%); padding: 80px 0; text-align: center; color: white;">
    <div class="container">
        <h1 style="font-size: 48px; font-weight: 900; margin-bottom: 15px;">
            <?= $lang === 'id' ? 'Pertanyaan yang Sering Diajukan' : 'Frequently Asked Questions' ?>
        </h1>
        <p style="font-size: 20px;">
            <?= $lang === 'id' ? 'Temukan jawaban untuk pertanyaan Anda di sini' : 'Find answers to your questions here' ?>
        </p>
    </div>
</section>

<!-- FAQ Sections -->
<section class="faq-section" style="padding: 80px 0; background: #f5f7fa;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <?php foreach ($faq_data as $category => $faqs): ?>
                    <div class="faq-category" style="margin-bottom: 50px;">
                        <h2 style="font-size: 32px; font-weight: 700; color: var(--dark-blue); margin-bottom: 30px; border-left: 5px solid var(--gold); padding-left: 20px;">
                            <?= $category ?>
                        </h2>

                        <div class="accordion" id="faq-<?= str_replace(' ', '-', strtolower($category)) ?>">
                            <?php foreach ($faqs as $index => $faq): ?>
                                <div class="accordion-item" style="background: white; border-radius: 15px; margin-bottom: 15px; overflow: hidden; box-shadow: 0 3px 10px rgba(0,0,0,0.05);">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button <?= $index !== 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq-<?= str_replace(' ', '-', strtolower($category)) ?>-<?= $index ?>" style="background: white; border: none; padding: 20px; width: 100%; text-align: left; font-size: 18px; font-weight: 600; color: var(--dark-blue); cursor: pointer;">
                                            <i class="bi bi-plus-circle" style="margin-right: 15px; color: var(--gold);"></i>
                                            <?= $lang === 'en' && isset($faq['question_en']) ? e($faq['question_en']) : e($faq['question']) ?>
                                        </button>
                                    </h3>
                                    <div id="faq-<?= str_replace(' ', '-', strtolower($category)) ?>-<?= $index ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" data-bs-parent="#faq-<?= str_replace(' ', '-', strtolower($category)) ?>">
                                        <div class="accordion-body" style="padding: 0 20px 20px 55px; color: #666; line-height: 1.8;">
                                            <?= $lang === 'en' && isset($faq['answer_en']) ? nl2br(e($faq['answer_en'])) : nl2br(e($faq['answer'])) ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Still Have Questions -->
<section class="contact-cta" style="background: white; padding: 60px 0; text-align: center;">
    <div class="container">
        <h2 style="font-size: 36px; font-weight: 900; color: var(--dark-blue); margin-bottom: 15px;">
            <?= $lang === 'id' ? 'Masih Ada Pertanyaan?' : 'Still Have Questions?' ?>
        </h2>
        <p style="font-size: 18px; color: #666; margin-bottom: 30px;">
            <?= $lang === 'id' ? 'Tim kami siap membantu Anda 24/7 via WhatsApp' : 'Our team is ready to help you 24/7 via WhatsApp' ?>
        </p>
        <a href="<?= whatsapp_link('Halo! Saya punya pertanyaan tentang layanan SITUNEO') ?>" class="btn btn-primary btn-lg" style="padding: 15px 40px;">
            <i class="bi bi-whatsapp"></i>
            <?= $lang === 'id' ? 'Hubungi Kami' : 'Contact Us' ?>
        </a>
    </div>
</section>

<style>
.accordion-button:not(.collapsed) i {
    transform: rotate(45deg);
    transition: transform 0.3s ease;
}
.accordion-button.collapsed i {
    transition: transform 0.3s ease;
}
.accordion-button:hover {
    background: rgba(255, 180, 0, 0.05) !important;
}
</style>

<?php include __DIR__ . '/../includes/components/footer.php'; ?>
