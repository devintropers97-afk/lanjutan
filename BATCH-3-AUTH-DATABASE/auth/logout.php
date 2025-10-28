<?php
require_once __DIR__ . '/../BATCH-1-PUBLIC-PAGES/includes/init.php';

// Log activity before logout
if (is_logged_in()) {
    log_activity(get_user_id(), 'logout', 'User logged out');
}

// Logout user
logout_user();

// Redirect to login with success message
set_flash('success', 'Anda telah berhasil logout.');
redirect(APP_URL . '/BATCH-3-AUTH-DATABASE/auth/login.php');
