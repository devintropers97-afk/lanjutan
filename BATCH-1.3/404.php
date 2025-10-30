<?php
/**
 * 404 Error Page
 */
require_once __DIR__ . '/includes/config/config.php';
$page_title = '404 - Halaman Tidak Ditemukan';
http_response_code(404);
?>

<?php include __DIR__ . '/includes/components/header.php'; ?>

<section class="error-page" style="padding: 100px 0; text-align: center; min-height: 60vh; display: flex; align-items: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="error-content">
                    <h1 style="font-size: 120px; font-weight: 900; color: var(--primary-blue); margin-bottom: 20px;">404</h1>
                    <h2 style="font-size: 32px; font-weight: 700; color: var(--dark-blue); margin-bottom: 20px;">
                        <?= $lang === 'id' ? 'Halaman Tidak Ditemukan' : 'Page Not Found' ?>
                    </h2>
                    <p style="font-size: 18px; color: #666; margin-bottom: 40px;">
                        <?= $lang === 'id'
                            ? 'Maaf, halaman yang Anda cari tidak ditemukan atau sudah dipindahkan.'
                            : 'Sorry, the page you are looking for could not be found or has been moved.'
                        ?>
                    </p>
                    <div class="error-actions">
                        <a href="/" class="btn btn-primary btn-lg" style="margin-right: 15px;">
                            <i class="bi bi-house"></i>
                            <?= $lang === 'id' ? 'Kembali ke Beranda' : 'Back to Home' ?>
                        </a>
                        <a href="<?= whatsapp_link('Halo! Saya butuh bantuan') ?>" class="btn btn-outline btn-lg">
                            <i class="bi bi-whatsapp"></i>
                            <?= $lang === 'id' ? 'Hubungi Kami' : 'Contact Us' ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/components/footer.php'; ?>
