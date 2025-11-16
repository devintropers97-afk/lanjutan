<?php
/**
 * ========================================
 * SITUNEO DIGITAL - URL Routing
 * Simple routing system
 * ========================================
 */

/**
 * Get current URL path
 *
 * @return string Current path
 */
function getCurrentPath() {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return rtrim($path, '/');
}

/**
 * Get current page name
 *
 * @return string Current page
 */
function getCurrentPage() {
    $path = getCurrentPath();
    $page = basename($path);

    // Remove .php extension if exists
    $page = str_replace('.php', '', $page);

    return $page ?: 'index';
}

/**
 * Check if current page matches given page name
 *
 * @param string $pageName Page name to check
 * @return bool Match status
 */
function isCurrentPage($pageName) {
    return getCurrentPage() === $pageName;
}

/**
 * Generate URL for given path
 *
 * @param string $path Path (e.g., 'about', 'services', etc)
 * @param array $params Query parameters
 * @return string Full URL
 */
function url($path = '', $params = []) {
    $url = SITE_URL . '/' . ltrim($path, '/');

    if (!empty($params)) {
        $url .= '?' . http_build_query($params);
    }

    return $url;
}

/**
 * Redirect to given path
 *
 * @param string $path Path to redirect to
 * @param int $statusCode HTTP status code
 */
function redirect($path, $statusCode = 302) {
    header('Location: ' . url($path), true, $statusCode);
    exit;
}

/**
 * Redirect back to previous page
 */
function redirectBack() {
    $referer = $_SERVER['HTTP_REFERER'] ?? url();
    header('Location: ' . $referer);
    exit;
}

/**
 * Get asset URL
 *
 * @param string $path Asset path (e.g., 'css/style.css')
 * @return string Asset URL
 */
function asset($path) {
    return SITE_URL . '/assets/' . ltrim($path, '/');
}

/**
 * Get upload URL
 *
 * @param string $path Upload file path
 * @return string Upload URL
 */
function uploadUrl($path) {
    return SITE_URL . '/uploads/' . ltrim($path, '/');
}

/**
 * Check if HTTPS is enabled
 *
 * @return bool HTTPS status
 */
function isHttps() {
    return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || $_SERVER['SERVER_PORT'] == 443;
}

/**
 * Get full current URL
 *
 * @return string Current URL
 */
function currentUrl() {
    $protocol = isHttps() ? 'https' : 'http';
    return $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

/**
 * Generate WhatsApp URL with message
 *
 * @param string $message Message to send
 * @param string $phone Phone number (default: company WhatsApp)
 * @return string WhatsApp URL
 */
function whatsappUrl($message = '', $phone = CONTACT_WHATSAPP) {
    $encodedMessage = urlencode($message);
    return "https://wa.me/{$phone}?text={$encodedMessage}";
}
?>
