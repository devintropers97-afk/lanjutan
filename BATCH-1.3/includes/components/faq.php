<?php
/**
 * FAQ Section Component
 */

$faqs = [
    [
        'question' => 'Apa itu sistem sewa bulanan? Bedanya dengan beli putus?',
        'question_en' => 'What is a monthly rental system? How is it different from one-time purchase?',
        'answer' => 'Sistem sewa bulanan artinya kamu bayar Setup Fee (biaya pembuatan) di awal, terus bayar biaya sewa/maintenance setiap bulan. Keuntungannya: dapat maintenance rutin, update fitur, hosting + domain, backup data, dan support terus-menerus. Jadi website kamu selalu aman dan up-to-date tanpa perlu pusing mikirin teknis!'
    ],
    [
        'question' => 'Berapa lama proses pembuatan website?',
        'question_en' => 'How long does the website development take?',
        'answer' => 'Landing page (1-3 halaman): 3-5 hari kerja. Website multi-page (4-6 halaman): 7-10 hari kerja. E-Commerce/Toko Online: 14-21 hari kerja. Custom system: tergantung kompleksitas. Yang pasti, kamu dapet FREE DEMO dalam 24 jam dulu buat lihat hasilnya!'
    ],
    [
        'question' => 'Apa yang termasuk dalam maintenance bulanan?',
        'question_en' => 'What is included in monthly maintenance?',
        'answer' => 'Maintenance bulanan include: Update konten/gambar (2-3 kali), backup data rutin, security update, technical support via WhatsApp, monitoring uptime 24/7, domain + hosting renewal, minor bug fixes, dan konsultasi digital marketing gratis!'
    ],
    [
        'question' => 'Kalau ga bayar bulanan, website tetap jalan?',
        'question_en' => 'If I don\'t pay monthly, will the website still run?',
        'answer' => 'Website tetap jalan selama masa tenggang (grace period) 7 hari. Setelah itu akan di-suspend sementara. Kalo 30 hari masih belum bayar, data akan di-backup dan website di-takedown. Tapi tenang, data kamu aman! Bisa diaktifkan lagi kapan aja dengan bayar tunggakan.'
    ],
    [
        'question' => 'Bisa minta website tanpa sewa bulanan (beli putus)?',
        'question_en' => 'Can I get a website without monthly rental (one-time purchase)?',
        'answer' => 'Bisa! Tapi harganya lebih mahal karena ga ada recurring income buat kami. Contoh: Landing Page yang normalnya Setup 350k + Sewa 150k/bln, jadi one-time payment sekitar 3-5 juta tergantung fitur. Plus kamu handle sendiri hosting, domain, maintenance, dan update. Kami tetap kasih garansi 3 bulan.'
    ],
    [
        'question' => 'Bisa request custom design atau fitur khusus?',
        'question_en' => 'Can I request custom design or special features?',
        'answer' => 'Bisa banget! Semua paket kami bisa di-custom sesuai kebutuhan. Mau design unik? Bisa. Mau fitur spesial? Bisa. Tinggal konsultasi via WhatsApp dulu, nanti tim kami analisa dan kasih quotation. Biasanya custom design ada biaya tambahan 500k-2jt tergantung kompleksitas.'
    ],
    [
        'question' => 'Apa bedanya dengan jasa pembuatan website lain?',
        'question_en' => 'What makes you different from other website services?',
        'answer' => 'Yang beda: (1) Harga PALING MURAH se-Indonesia dengan kualitas profesional, (2) FREE DEMO 24 JAM - bayar kalau cocok aja, (3) Support 24/7 via WhatsApp fast response, (4) Sistem sewa bulanan lebih hemat, (5) Punya NIB resmi - bisnis legal dan terpercaya, (6) 500+ client puas dengan rating 4.9/5!'
    ],
    [
        'question' => 'Kalau mau jadi Partner/Reseller bisa ga?',
        'question_en' => 'Can I become a Partner/Reseller?',
        'answer' => 'Bisa banget! Program Partner kami kasih komisi 30%-55% per order! Ada 4 tier: Tier 1 (0-10 order) = 30%, Tier 2 (10-25 order) = 40%, Tier 3 (50+ order) = 50%, Tier MAX (75+ order) = 55%. Tanpa target bulanan wajib, modal cuma semangat jualan! Daftar gratis di menu Register → Partner.'
    ],
    [
        'question' => 'Apakah website yang dibuat SEO friendly?',
        'question_en' => 'Are the websites SEO friendly?',
        'answer' => 'YES! Semua website kami dibuat dengan SEO best practices: struktur HTML semantic, meta tags lengkap, sitemap.xml, robots.txt, mobile responsive, fast loading, HTTPS/SSL, clean URL, alt text gambar, dan schema markup. Paket tertentu juga include optimasi konten dan backlink building.'
    ],
    [
        'question' => 'Bagaimana cara pembayarannya?',
        'question_en' => 'What are the payment methods?',
        'answer' => 'Pembayaran bisa via: Transfer Bank (BCA, Mandiri, BRI, BNI), E-wallet (OVO, GoPay, Dana, ShopeePay), QRIS, atau cicilan kartu kredit. Untuk Setup Fee bisa cicil 2-3x tanpa bunga (min. 500k). Payment monthly recurring bisa auto-debit atau manual transfer setiap tanggal jatuh tempo.'
    ]
];
?>

<!-- FAQ Section -->
<section id="faq" style="padding: 80px 0; background: linear-gradient(180deg, white 0%, #f8f9fa 100%);">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title" style="font-size: 2.8rem; font-weight: 900; color: var(--dark-blue); margin-bottom: 15px;">
                <?= $lang === 'id' ? 'Pertanyaan yang Sering Ditanya' : 'Frequently Asked Questions' ?>
            </h2>
            <p class="lead" style="color: var(--text-light); max-width: 700px; margin: 0 auto; font-size: 1.2rem;">
                <?= $lang === 'id' ? 'Punya pertanyaan? Temukan jawabannya di sini!' : 'Have questions? Find answers here!' ?>
            </p>
        </div>

        <!-- FAQ Accordion -->
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="accordion" id="faqAccordion">
                    <?php foreach ($faqs as $index => $faq): ?>
                        <div class="accordion-item" style="background: white; border: none; border-radius: 20px; margin-bottom: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); overflow: hidden;" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                            <h3 class="accordion-header" id="faqHeading<?= $index ?>">
                                <button class="accordion-button <?= $index !== 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse<?= $index ?>" aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" aria-controls="faqCollapse<?= $index ?>" style="background: transparent; border: none; padding: 25px 30px; font-weight: 700; font-size: 1.1rem; color: var(--dark-blue); box-shadow: none;">
                                    <span style="flex: 1; text-align: left; padding-right: 20px;">
                                        <i class="bi bi-question-circle" style="color: var(--gold); margin-right: 10px;"></i>
                                        <?= $lang === 'en' && isset($faq['question_en']) ? $faq['question_en'] : $faq['question'] ?>
                                    </span>
                                </button>
                            </h3>
                            <div id="faqCollapse<?= $index ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" aria-labelledby="faqHeading<?= $index ?>" data-bs-parent="#faqAccordion">
                                <div class="accordion-body" style="padding: 0 30px 30px; color: var(--text-light); font-size: 1rem; line-height: 1.7;">
                                    <?= $faq['answer'] ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- CTA Bottom -->
        <div class="text-center mt-5" data-aos="fade-up">
            <p style="color: var(--text-light); margin-bottom: 20px; font-size: 1.1rem;">
                <?= $lang === 'id' ? 'Masih punya pertanyaan lain? Yuk tanya langsung!' : 'Still have questions? Ask us directly!' ?>
            </p>
            <a href="<?= whatsapp_link($lang === 'id' ? 'Halo! Saya mau tanya tentang layanan SITUNEO' : 'Hello! I want to ask about SITUNEO services') ?>" class="btn btn-warning btn-lg" style="border-radius: 50px; padding: 15px 40px; font-weight: 700; box-shadow: 0 8px 25px rgba(255, 180, 0, 0.4);">
                <i class="bi bi-whatsapp"></i>
                <?= $lang === 'id' ? 'Chat via WhatsApp' : 'Chat via WhatsApp' ?>
            </a>
        </div>
    </div>
</section>

<style>
/* FAQ Accordion Custom Styles */
.accordion-button:not(.collapsed) {
    background: linear-gradient(135deg, rgba(30, 92, 153, 0.05) 0%, rgba(255, 180, 0, 0.05) 100%);
    color: var(--dark-blue);
    box-shadow: none;
}

.accordion-button::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23FFB400'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    transition: transform 0.3s ease;
}

.accordion-button:not(.collapsed)::after {
    transform: rotate(-180deg);
}

.accordion-button:focus {
    box-shadow: none;
    border-color: transparent;
}

.accordion-button:hover {
    background: linear-gradient(135deg, rgba(30, 92, 153, 0.05) 0%, rgba(255, 180, 0, 0.05) 100%);
}
</style>
