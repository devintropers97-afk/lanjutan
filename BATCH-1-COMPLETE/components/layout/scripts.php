<?php
/**
 * ================================================
 * SITUNEO DIGITAL - JavaScript Includes
 * ================================================
 * File ini berisi semua JavaScript yang dimuat di akhir page
 * untuk performa loading yang lebih cepat
 *
 * CARA PAKAI:
 * Include di akhir halaman sebelum </body>
 * <?php include 'components/layout/scripts.php'; ?>
 */
?>

<!-- Bootstrap Bundle (termasuk Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS (Animate On Scroll) -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- GSAP (Animation Library) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<!-- Custom JavaScript -->
<script src="<?= APP_URL ?>/assets/js/network-animation.js"></script>
<script src="<?= APP_URL ?>/assets/js/main.js"></script>

<!-- Page Specific JS (kalau ada) -->
<?php if (isset($page_js)): ?>
    <script src="<?= APP_URL ?>/assets/js/<?= $page_js ?>"></script>
<?php endif; ?>

<!-- Initialize AOS -->
<script>
AOS.init({
    duration: 1000,
    once: true,
    offset: 100,
    easing: 'ease-in-out'
});
</script>

</body>
</html>
