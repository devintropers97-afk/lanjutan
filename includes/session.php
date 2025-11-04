<?php
/**
 * SITUNEO DIGITAL - Session Management
 * Manage user sessions
 */

// Start secure session
secureSessionStart();

/**
 * Set Flash Message
 */
function setFlash($type, $message) {
    $_SESSION['flash'][$type] = $message;
}

/**
 * Get Flash Message
 */
function getFlash($type) {
    if (isset($_SESSION['flash'][$type])) {
        $message = $_SESSION['flash'][$type];
        unset($_SESSION['flash'][$type]);
        return $message;
    }
    return null;
}

/**
 * Has Flash Message
 */
function hasFlash($type) {
    return isset($_SESSION['flash'][$type]);
}

/**
 * Display Flash Messages HTML
 */
function displayFlash() {
    $html = '';
    $types = [
        'success' => 'alert-success',
        'error' => 'alert-danger',
        'warning' => 'alert-warning',
        'info' => 'alert-info'
    ];

    foreach ($types as $type => $class) {
        if ($message = getFlash($type)) {
            $icon = $type === 'success' ? 'check-circle' : ($type === 'error' ? 'x-circle' : ($type === 'warning' ? 'exclamation-triangle' : 'info-circle'));
            $html .= '<div class="alert ' . $class . ' alert-dismissible fade show" role="alert"><i class="bi bi-' . $icon . ' me-2"></i>' . htmlspecialchars($message) . '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
        }
    }
    return $html;
}

function setUserSession($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_role'] = $user['role'];
    $_SESSION['user_avatar'] = $user['avatar'] ?? null;
    $_SESSION['logged_in_at'] = time();
    logActivity($user['id'], 'User logged in');
}

function getCurrentUser() {
    if (!isLoggedIn()) return null;
    global $pdo;
    $sql = "SELECT u.*, up.company_name FROM users u LEFT JOIN user_profiles up ON u.id = up.user_id WHERE u.id = ?";
    return db_fetch($sql, [$_SESSION['user_id']]);
}

function clearUserSession() {
    if (isLoggedIn()) logActivity($_SESSION['user_id'], 'User logged out');
    unset($_SESSION['user_id'], $_SESSION['user_name'], $_SESSION['user_email'], $_SESSION['user_role']);
    secureSessionDestroy();
}

function checkSessionTimeout() {
    if (isLoggedIn() && isset($_SESSION['logged_in_at'])) {
        if (time() - $_SESSION['logged_in_at'] > SESSION_LIFETIME) {
            clearUserSession();
            setFlash('warning', 'Sesi berakhir. Silakan login kembali.');
            redirect('/auth/login.php');
        }
    }
}

checkSessionTimeout();
checkRememberMe();
updateLastActivity();
