<!-- WhatsApp Float Button -->
<a href="<?php echo whatsappUrl('Halo SITUNEO DIGITAL! Saya ingin konsultasi tentang layanan digital yang tersedia.'); ?>"
   target="_blank"
   class="whatsapp-float"
   id="whatsappFloat"
   aria-label="Chat via WhatsApp"
   title="Chat via WhatsApp">
    <i class="fab fa-whatsapp"></i>
    <span class="whatsapp-pulse"></span>
</a>

<style>
.whatsapp-float {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    background: #25D366;
    color: var(--color-white);
    border-radius: var(--border-radius-full);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: var(--font-size-2xl);
    box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
    z-index: var(--z-fixed);
    transition: var(--transition-all);
    text-decoration: none;
}

.whatsapp-float:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 30px rgba(37, 211, 102, 0.6);
}

.whatsapp-pulse {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: var(--border-radius-full);
    background: #25D366;
    opacity: 0.5;
    animation: whatsappPulse 2s infinite;
}

@keyframes whatsappPulse {
    0% {
        transform: scale(1);
        opacity: 0.5;
    }
    50% {
        transform: scale(1.2);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 0;
    }
}

@media (max-width: 768px) {
    .whatsapp-float {
        width: 50px;
        height: 50px;
        bottom: 15px;
        right: 15px;
        font-size: var(--font-size-xl);
    }
}
</style>
