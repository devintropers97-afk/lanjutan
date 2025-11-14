<!-- Main Navigation -->
<ul class="nav-menu">
    <li class="nav-item <?php echo ($currentPage === 'home') ? 'active' : ''; ?>">
        <a href="/" class="nav-link">Beranda</a>
    </li>
    <li class="nav-item <?php echo ($currentPage === 'about') ? 'active' : ''; ?>">
        <a href="/about" class="nav-link">Tentang Kami</a>
    </li>
    <li class="nav-item <?php echo ($currentPage === 'services') ? 'active' : ''; ?>">
        <a href="/services" class="nav-link">Layanan</a>
    </li>
    <li class="nav-item <?php echo ($currentPage === 'portfolio') ? 'active' : ''; ?>">
        <a href="/portfolio" class="nav-link">Portfolio</a>
    </li>
    <li class="nav-item <?php echo ($currentPage === 'pricing') ? 'active' : ''; ?>">
        <a href="/pricing" class="nav-link">Harga</a>
    </li>
    <li class="nav-item <?php echo ($currentPage === 'calculator') ? 'active' : ''; ?>">
        <a href="/calculator" class="nav-link">Kalkulator Harga</a>
    </li>
    <li class="nav-item <?php echo ($currentPage === 'blog') ? 'active' : ''; ?>">
        <a href="/blog" class="nav-link">Blog</a>
    </li>
    <li class="nav-item <?php echo ($currentPage === 'contact') ? 'active' : ''; ?>">
        <a href="/contact" class="nav-link">Kontak</a>
    </li>
</ul>
