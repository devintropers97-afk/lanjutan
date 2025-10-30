<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Session Management
 * Session handling and user authentication
 * ========================================
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    // Configure session
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.cookie_secure', isHttps() ? 1 : 0);

    // Set session name
    session_name(SESSION_NAME);

    // Set session lifetime
    session_set_cookie_params(SESSION_LIFETIME);

    // Start session
    session_start();
}

/**
 * Check if user is logged in
 *
 * @return bool Login status
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

/**
 * Get current user ID
 *
 * @return int|null User ID or null
 */
function getUserId() {
    return $_SESSION['user_id'] ?? null;
}

/**
 * Get current user role
 *
 * @return string|null User role or null
 */
function getUserRole() {
    return $_SESSION['user_role'] ?? null;
}

/**
 * Get current user name
 *
 * @return string|null User name or null
 */
function getUserName() {
    return $_SESSION['user_name'] ?? null;
}

/**
 * Get current user email
 *
 * @return string|null User email or null
 */
function getUserEmail() {
    return $_SESSION['user_email'] ?? null;
}

/**
 * Check if user has specific role
 *
 * @param string $role Role to check ('admin', 'client', 'freelancer')
 * @return bool Role match status
 */
function hasRole($role) {
    return getUserRole() === $role;
}

/**
 * Check if user is admin
 *
 * @return bool Admin status
 */
function isAdmin() {
    return hasRole('admin');
}

/**
 * Check if user is client
 *
 * @return bool Client status
 */
function isClient() {
    return hasRole('client');
}

/**
 * Check if user is freelancer
 *
 * @return bool Freelancer status
 */
function isFreelancer() {
    return hasRole('freelancer');
}

/**
 * Login user and create session
 *
 * @param array $user User data from database
 */
function loginUser($user) {
    // Regenerate session ID for security
    session_regenerate_id(true);

    // Set session variables
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_role'] = $user['role'];
    $_SESSION['login_time'] = time();
    $_SESSION['ip_address'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
}

/**
 * Logout user and destroy session
 */
function logoutUser() {
    // Unset all session variables
    $_SESSION = [];

    // Destroy session cookie
    if (isset($_COOKIE[SESSION_NAME])) {
        setcookie(SESSION_NAME, '', time() - 3600, '/');
    }

    // Destroy session
    session_destroy();
}

/**
 * Require login (redirect to login if not logged in)
 *
 * @param string $redirectTo Page to redirect to after login
 */
function requireLogin($redirectTo = null) {
    if (!isLoggedIn()) {
        $redirectUrl = $redirectTo ?? currentUrl();
        redirect('auth/login?redirect=' . urlencode($redirectUrl));
    }
}

/**
 * Require specific role (redirect to home if role doesn't match)
 *
 * @param string $role Required role
 */
function requireRole($role) {
    requireLogin();

    if (!hasRole($role)) {
        setFlashMessage('error', MSG_ERROR_PERMISSION);
        redirect('');
    }
}

/**
 * Require admin role
 */
function requireAdmin() {
    requireRole('admin');
}

/**
 * Set flash message in session
 *
 * @param string $type Message type (success, error, warning, info)
 * @param string $message Message text
 */
function setFlashMessage($type, $message) {
    $_SESSION['flash_message'] = [
        'type' => $type,
        'message' => $message
    ];
}

/**
 * Get and clear flash message
 *
 * @return array|null Flash message or null
 */
function getFlashMessage() {
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
        return $message;
    }

    return null;
}

/**
 * Check if flash message exists
 *
 * @return bool Flash message existence
 */
function hasFlashMessage() {
    return isset($_SESSION['flash_message']);
}

/**
 * Display flash message HTML
 *
 * @return string Flash message HTML or empty string
 */
function displayFlashMessage() {
    $flash = getFlashMessage();

    if (!$flash) {
        return '';
    }

    $typeClasses = [
        'success' => 'alert-success',
        'error' => 'alert-danger',
        'warning' => 'alert-warning',
        'info' => 'alert-info'
    ];

    $class = $typeClasses[$flash['type']] ?? 'alert-info';

    return '<div class="alert ' . $class . ' alert-dismissible fade show" role="alert">
        ' . htmlspecialchars($flash['message']) . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

/**
 * Set old input data (for form repopulation after error)
 *
 * @param array $data Form data
 */
function setOldInput($data) {
    $_SESSION['old_input'] = $data;
}

/**
 * Get old input value
 *
 * @param string $key Input key
 * @param mixed $default Default value
 * @return mixed Old input value or default
 */
function old($key, $default = '') {
    $value = $_SESSION['old_input'][$key] ?? $default;

    // Clear old input after first use
    if (isset($_SESSION['old_input'][$key])) {
        unset($_SESSION['old_input'][$key]);
    }

    return htmlspecialchars($value);
}

/**
 * Clear all old input data
 */
function clearOldInput() {
    unset($_SESSION['old_input']);
}
?>
