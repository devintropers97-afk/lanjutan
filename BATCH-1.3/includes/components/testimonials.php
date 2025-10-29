<?php
/**
 * Testimonials Section Component
 */

$testimonials = [
    [
        'name' => 'Budi Santoso',
        'company' => 'CV Maju Jaya',
        'location' => 'Jakarta',
        'rating' => 5,
        'text' => 'Puas banget sama hasilnya! Website toko online kami jadi lebih profesional dan omzet naik 200%. Tim SITUNEO sangat responsif dan helpful!',
        'text_en' => 'Very satisfied with the result! Our online store website became more professional and revenue increased by 200%. SITUNEO team is very responsive and helpful!',
        'image' => 'https://ui-avatars.com/api/?name=Budi+Santoso&background=FFB400&color=0F3057&size=128'
    ],
    [
        'name' => 'Siti Nurhaliza',
        'company' => 'Klinik Sehat Sejahtera',
        'location' => 'Bandung',
        'rating' => 5,
        'text' => 'Sistem booking appointment online sangat membantu! Pasien jadi lebih mudah daftar dan kami bisa manage jadwal dengan lebih baik. Recommended!',
        'text_en' => 'The online appointment booking system is very helpful! Patients find it easier to register and we can manage schedules better. Recommended!',
        'image' => 'https://ui-avatars.com/api/?name=Siti+Nurhaliza&background=1E5C99&color=fff&size=128'
    ],
    [
        'name' => 'Agus Prasetyo',
        'company' => 'PT Teknologi Maju',
        'location' => 'Surabaya',
        'rating' => 5,
        'text' => 'Chatbot AI nya keren banget! Customer service kami jadi 24/7 otomatis. Response cepat dan akurat. Worth it investasinya!',
        'text_en' => 'The AI chatbot is amazing! Our customer service became 24/7 automatic. Fast and accurate response. Worth the investment!',
        'image' => 'https://ui-avatars.com/api/?name=Agus+Prasetyo&background=FFB400&color=0F3057&size=128'
    ],
    [
        'name' => 'Maya Lindawati',
        'company' => 'Toko Batik Nusantara',
        'location' => 'Yogyakarta',
        'rating' => 5,
        'text' => 'Digital marketing campaign dari SITUNEO luar biasa! Dari yang tadinya sepi jadi ramai order. ROI nya 350%. Terima kasih!',
        'text_en' => 'SITUNEO\'s digital marketing campaign is extraordinary! From quiet to busy with orders. 350% ROI. Thank you!',
        'image' => 'https://ui-avatars.com/api/?name=Maya+Lindawati&background=1E5C99&color=fff&size=128'
    ]
];
?>

<!-- Testimonials Section -->
<section class="testimonials" style="padding: 80px 0; background: linear-gradient(135deg, rgba(30, 92, 153, 0.05) 0%, rgba(15, 48, 87, 0.1) 100%);">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2 class="section-title">
                <?= $lang === 'id' ? 'Kata Mereka Tentang Kami' : 'What They Say About Us' ?>
            </h2>
            <p class="section-subtitle">
                <?= $lang === 'id' ? '500+ klien puas dengan layanan kami' : '500+ satisfied clients with our services' ?>
            </p>
        </div>

        <div class="row">
            <?php foreach ($testimonials as $index => $testimonial): ?>
                <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="testimonial-card" style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); height: 100%;">
                        <div class="d-flex align-items-center mb-3">
                            <img src="<?= $testimonial['image'] ?>" alt="<?= $testimonial['name'] ?>" style="width: 60px; height: 60px; border-radius: 50%; margin-right: 15px;">
                            <div>
                                <h5 style="margin: 0; font-weight: 700; color: var(--dark-blue);"><?= $testimonial['name'] ?></h5>
                                <p style="margin: 0; font-size: 14px; color: #666;">
                                    <?= $testimonial['company'] ?> - <?= $testimonial['location'] ?>
                                </p>
                                <div class="rating" style="color: var(--gold); margin-top: 5px;">
                                    <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>
                                        <i class="bi bi-star-fill"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                        <p style="font-style: italic; color: #555; margin: 0;">
                            "<?= $lang === 'en' && isset($testimonial['text_en']) ? $testimonial['text_en'] : $testimonial['text'] ?>"
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
