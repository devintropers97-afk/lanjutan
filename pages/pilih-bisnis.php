<?php
/**
 * PILIH BISNIS ANDA - Kategori Berdasarkan BISNIS bukan Teknis
 */

$pageTitle = 'Pilih Jenis Bisnis Anda - SITUNEO DIGITAL';
$pageDescription = 'Pilih kategori bisnis Anda, biar kami kasih solusi website yang pas!';

include __DIR__ . '/../includes/header.php';

// Kategori berdasarkan BISNIS, bukan teknis
$business_categories = [
    [
        'icon' => '🏪',
        'title' => 'Saya Punya Toko/Jualan Produk',
        'examples' => 'Fashion, Elektronik, Kosmetik, Makanan Kemasan, dll',
        'solution' => 'Website Toko Online',
        'link' => '/solutions/toko-online',
        'price' => 'Mulai 350rb/bulan',
        'color' => 'primary'
    ],
    [
        'icon' => '🍔',
        'title' => 'Saya Punya Resto/Cafe/Warung',
        'examples' => 'Restoran, Cafe, Catering, Bakery, Kedai Minuman',
        'solution' => 'Website Resto + Order System',
        'link' => '/solutions/resto-online',
        'price' => 'Mulai 250rb/bulan',
        'color' => 'success'
    ],
    [
        'icon' => '🏢',
        'title' => 'Saya Punya Perusahaan/Kantor',
        'examples' => 'PT, CV, Pabrik, Kontraktor, Konsultan',
        'solution' => 'Website Company Profile',
        'link' => '/solutions/company-profile',
        'price' => 'Mulai 150rb/bulan',
        'color' => 'info'
    ],
    [
        'icon' => '💊',
        'title' => 'Saya Punya Klinik/Praktek',
        'examples' => 'Dokter Praktek, Klinik, Apotek, Lab, Rumah Sakit',
        'solution' => 'Website Klinik + Appointment',
        'link' => '/solutions/klinik-online',
        'price' => 'Mulai 500rb/bulan',
        'color' => 'danger'
    ],
    [
        'icon' => '🎮',
        'title' => 'Saya Mau Bikin Bisnis Digital',
        'examples' => 'Top-up Game, Jual Pulsa, Kursus Online, Jual Akun Premium',
        'solution' => 'Website Autopilot System',
        'link' => '/solutions/bisnis-digital',
        'price' => 'Mulai 10 juta',
        'color' => 'warning'
    ],
    [
        'icon' => '🏠',
        'title' => 'Saya Agen Property/Mobil',
        'examples' => 'Real Estate, Dealer Mobil, Rental Kendaraan, Travel Agent',
        'solution' => 'Website Listing + Booking',
        'link' => '/solutions/property',
        'price' => 'Mulai 500rb/bulan',
        'color' => 'secondary'
    ],
    [
        'icon' => '📚',
        'title' => 'Saya Punya Sekolah/Kursus',
        'examples' => 'Sekolah, Universitas, Bimbel, Daycare, Training Center',
        'solution' => 'Website Sekolah + E-Learning',
        'link' => '/solutions/education',
        'price' => 'Mulai 750rb/bulan',
        'color' => 'primary'
    ],
    [
        'icon' => '❓',
        'title' => 'Saya Bingung/Bisnis Lainnya',
        'examples' => 'Konsultasi dulu untuk solusi yang tepat',
        'solution' => 'Free Consultation',
        'link' => '/consultation',
        'price' => 'GRATIS',
        'color' => 'dark'
    ]
];
?>

<div class="pilih-bisnis-page py-5">
    <div class="container">
        <!-- Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 class="display-4 mb-3">Pilih Jenis Bisnis Anda</h1>
            <p class="lead text-muted">Biar kami kasih solusi website yang pas!</p>
            <p class="text-secondary">Gak usah bingung istilah teknis. Cukup pilih bisnis Anda yang mana 👇</p>
        </div>

        <!-- Business Categories Grid -->
        <div class="row g-4 mb-5">
            <?php foreach($business_categories as $index => $cat): ?>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <a href="<?= $cat['link'] ?>" class="business-selector-card border-<?= $cat['color'] ?>">
                    <div class="business-selector-icon mb-3">
                        <?= $cat['icon'] ?>
                    </div>
                    <h4 class="mb-3"><?= $cat['title'] ?></h4>
                    <p class="text-muted small mb-3"><?= $cat['examples'] ?></p>

                    <div class="solution-info mb-3">
                        <div class="text-<?= $cat['color'] ?> fw-bold mb-1">
                            <i class="bi bi-arrow-right-circle me-1"></i>
                            <?= $cat['solution'] ?>
                        </div>
                        <div class="price-badge badge bg-<?= $cat['color'] ?>">
                            <?= $cat['price'] ?>
                        </div>
                    </div>

                    <div class="btn btn-outline-<?= $cat['color'] ?> btn-sm w-100">
                        Lihat Detail
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Help Section -->
        <div class="help-section" data-aos="fade-up">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h3 class="mb-3">
                                <i class="bi bi-question-circle text-warning me-2"></i>
                                Masih Bingung Mau Pilih Yang Mana?
                            </h3>
                            <p class="text-muted mb-4">
                                Gak papa! Chat aja sama admin, jelasin bisnis Anda apa,
                                nanti kita bantu carikan solusi yang pas. <strong>100% GRATIS kok!</strong>
                            </p>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Konsultasi GRATIS tanpa biaya
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Lihat demo contoh website
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Penawaran sesuai budget Anda
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Halo%20SITUNEO,%20saya%20mau%20konsultasi%20tapi%20masih%20bingung%20pilih%20yang%20mana"
                               class="btn btn-success btn-lg w-100 mb-3" target="_blank">
                                <i class="bi bi-whatsapp me-2"></i>
                                Chat Admin Sekarang
                            </a>
                            <small class="text-muted">
                                <i class="bi bi-shield-check me-1"></i>
                                Respons dalam 5 menit
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Helper -->
        <div class="search-helper mt-5 text-center" data-aos="fade-up">
            <h5 class="mb-4">Atau cari berdasarkan kata kunci:</h5>
            <div class="d-flex justify-content-center flex-wrap gap-2">
                <?php
                $keywords = [
                    'Tokopedia' => '/solutions/toko-online',
                    'Shopee' => '/solutions/toko-online',
                    'GoFood' => '/solutions/resto-online',
                    'GrabFood' => '/solutions/resto-online',
                    'Ruangguru' => '/solutions/education',
                    'Traveloka' => '/solutions/property',
                    'Gojek' => '/solutions/bisnis-digital',
                ];
                foreach ($keywords as $keyword => $link):
                ?>
                <a href="<?= $link ?>" class="badge bg-light text-dark p-2">
                    Kayak <?= $keyword ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<style>
.business-selector-card {
    display: block;
    background: white;
    padding: 30px 20px;
    border-radius: 20px;
    text-align: center;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s;
    box-shadow: 0 3px 15px rgba(0,0,0,0.1);
    height: 100%;
    border: 3px solid transparent;
}

.business-selector-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    color: inherit;
}

.business-selector-icon {
    font-size: 64px;
}

.solution-info {
    padding-top: 15px;
    border-top: 1px dashed #dee2e6;
}

.price-badge {
    font-size: 0.9rem;
    padding: 5px 15px;
}

.help-section .card {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}
</style>

<?php include __DIR__ . '/../includes/footer.php'; ?>
