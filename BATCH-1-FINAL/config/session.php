<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Session Management
 * ================================================
 * File ini untuk manage session (login, logout, dll)
 *
 * BATCH-1.2 FIX:
 * - Session sudah di-start di init.php (TIDAK di sini!)
 * - File ini HANYA berisi session functions
 */

// Session sudah di-start di init.php, jangan start lagi di sini!
// Kalau start 2x akan error "headers already sent"

// Set session timeout (2 jam)
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > SESSION_TIMEOUT)) {
    // Session sudah expired (lebih dari 2 jam)
    session_unset();
    session_destroy();
    header("Location: " . APP_URL . "/auth/login.php?timeout=1");
    exit;
}

// Update last activity time
$_SESSION['last_activity'] = time();

/**
 * Function: Cek apakah user sudah login
 * Return: true/false
 */
function is_logged_in() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

/**
 * Function: Get user ID yang sedang login
 * Return: user_id atau null
 */
function get_user_id() {
    return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
}

/**
 * Function: Get user role (level)
 * Return: role number (1=client, 2=partner, 3=admin)
 */
function get_user_role() {
    return isset($_SESSION['user_role']) ? $_SESSION['user_role'] : 0;
}

/**
 * Function: Get user name
 * Return: nama user atau 'Guest'
 */
function get_user_name() {
    return isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';
}

/**
 * Function: Get user email
 * Return: email user atau null
 */
function get_user_email() {
    return isset($_SESSION['user_email']) ? $_SESSION['user_email'] : null;
}

/**
 * Function: Cek apakah user adalah admin
 * Return: true/false
 */
function is_admin() {
    return get_user_role() >= ROLE_ADMIN;
}

/**
 * Function: Cek apakah user adalah partner
 * Return: true/false
 */
function is_partner() {
    return get_user_role() >= ROLE_PARTNER;
}

/**
 * Function: Cek apakah user adalah client
 * Return: true/false
 */
function is_client() {
    return get_user_role() >= ROLE_CLIENT;
}

/**
 * Function: Redirect kalau belum login
 * Pakai ini di halaman yang perlu login
 */
function require_login() {
    if (!is_logged_in()) {
        // Simpan URL yang mau dituju
        $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];

        // Redirect ke halaman login
        header("Location: " . APP_URL . "/auth/login.php");
        exit;
    }
}

/**
 * Function: Redirect kalau bukan admin
 * Pakai ini di halaman admin
 */
function require_admin() {
    require_login();

    if (!is_admin()) {
        // Kalau bukan admin, redirect ke dashboard
        header("Location: " . APP_URL . "/client/index.php?error=unauthorized");
        exit;
    }
}

/**
 * Function: Redirect kalau bukan partner
 * Pakai ini di halaman partner
 */
function require_partner() {
    require_login();

    if (!is_partner() && !is_admin()) {
        // Kalau bukan partner atau admin, redirect ke dashboard
        header("Location: " . APP_URL . "/client/index.php?error=unauthorized");
        exit;
    }
}

/**
 * Function: Set flash message (pesan sementara)
 * Pakai untuk success/error message setelah form submit
 *
 * Contoh pakai:
 * set_flash('success', 'Data berhasil disimpan!');
 * set_flash('error', 'Terjadi kesalahan!');
 */
function set_flash($type, $message) {
    $_SESSION['flash_' . $type] = $message;
}

/**
 * Function: Get flash message dan hapus setelah ditampilkan
 * Return: message atau null
 *
 * Contoh pakai:
 * $success = get_flash('success');
 * if ($success) echo $success;
 */
function get_flash($type) {
    if (isset($_SESSION['flash_' . $type])) {
        $message = $_SESSION['flash_' . $type];
        unset($_SESSION['flash_' . $type]);
        return $message;
    }
    return null;
}

/**
 * Function: Logout user
 * Hapus semua session dan redirect ke login
 */
function logout_user() {
    // Hapus semua session
    session_unset();
    session_destroy();

    // Redirect ke homepage
    header("Location: " . APP_URL . "/?logout=success");
    exit;
}

/**
 * Function: Login user
 * Set session setelah login berhasil
 */
function login_user($user_data) {
    $_SESSION['user_id'] = $user_data['id'];
    $_SESSION['user_name'] = $user_data['name'];
    $_SESSION['user_email'] = $user_data['email'];
    $_SESSION['user_role'] = $user_data['role'];
    $_SESSION['user_avatar'] = $user_data['avatar'] ?? null;

    // Set last activity
    $_SESSION['last_activity'] = time();

    // Kalau ada redirect URL, redirect ke sana
    if (isset($_SESSION['redirect_after_login'])) {
        $redirect_url = $_SESSION['redirect_after_login'];
        unset($_SESSION['redirect_after_login']);
        header("Location: " . $redirect_url);
    } else {
        // Redirect berdasarkan role
        if ($user_data['role'] >= ROLE_ADMIN) {
            header("Location: " . APP_URL . "/admin/index.php");
        } elseif ($user_data['role'] >= ROLE_PARTNER) {
            header("Location: " . APP_URL . "/partner/index.php");
        } else {
            header("Location: " . APP_URL . "/client/index.php");
        }
    }
    exit;
}
?>
