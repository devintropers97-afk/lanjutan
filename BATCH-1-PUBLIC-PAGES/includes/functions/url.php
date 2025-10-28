<?php
/**
 * ================================================
 * SITUNEO DIGITAL - URL Helper Functions
 * ================================================
 * File ini berisi function untuk manipulasi URL
 */

/**
 * Redirect ke URL lain
 */
function redirect($url) {
    header("Location: " . $url);
    exit;
}

/**
 * Redirect ke homepage
 */
function redirect_home() {
    redirect(APP_URL);
}

/**
 * Redirect back (ke halaman sebelumnya)
 */
function redirect_back() {
    if (isset($_SERVER['HTTP_REFERER'])) {
        redirect($_SERVER['HTTP_REFERER']);
    } else {
        redirect_home();
    }
}

/**
 * Get current URL
 */
function current_url() {
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

/**
 * Get current page name
 */
function current_page() {
    return basename($_SERVER['PHP_SELF'], '.php');
}

/**
 * Check if current page
 */
function is_current_page($page) {
    return current_page() === $page;
}

/**
 * Build URL dengan parameter
 * Contoh: build_url('services.php', ['category' => 'website'])
 *         Output: "services.php?category=website"
 */
function build_url($base_url, $params = []) {
    if (empty($params)) {
        return $base_url;
    }

    $query_string = http_build_query($params);
    $separator = (strpos($base_url, '?') !== false) ? '&' : '?';

    return $base_url . $separator . $query_string;
}

/**
 * Get parameter dari URL
 */
function get_param($key, $default = null) {
    return isset($_GET[$key]) ? clean_input($_GET[$key]) : $default;
}

/**
 * Get WhatsApp link dengan message
 */
function whatsapp_link($message = '') {
    $phone = COMPANY_WHATSAPP;
    $encoded_message = urlencode($message);
    return "https://wa.me/{$phone}?text={$encoded_message}";
}

/**
 * Get default WhatsApp message
 */
function default_whatsapp_message() {
    return "Halo SITUNEO DIGITAL! 👋\n\nSaya tertarik dengan layanan website Anda. Bisa minta info lebih detail dan free demo?\n\nTerima kasih!";
}
?>
