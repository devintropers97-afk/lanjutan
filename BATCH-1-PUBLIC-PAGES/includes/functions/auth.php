<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Authentication Functions
 * ================================================
 * File ini berisi function untuk authentication
 * (Login, register, logout, dll)
 */

/**
 * Get current user data dari database
 * Return: array user data atau null
 * NOTE: Renamed dari get_current_user() karena PHP sudah punya built-in function dengan nama itu
 */
function get_logged_in_user() {
    global $conn;

    if (!is_logged_in()) {
        return null;
    }

    $user_id = get_user_id();

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }

    return null;
}

/**
 * Check if email exists di database
 * Return: true/false
 */
function email_exists($email) {
    global $conn;

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows > 0;
}

/**
 * Create new user (register)
 * Return: user_id atau false
 */
function create_user($data) {
    global $conn;

    // Hash password
    $hashed_password = hash_password($data['password']);

    // Generate referral code (untuk partner)
    $referral_code = strtoupper(substr(md5(time() . $data['email']), 0, 8));

    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone, role, referral_code, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssis", $data['name'], $data['email'], $hashed_password, $data['phone'], $data['role'], $referral_code);

    if ($stmt->execute()) {
        return $conn->insert_id;
    }

    return false;
}

/**
 * Login user dengan email & password
 * Return: user data atau false
 */
function login_attempt($email, $password) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND status = 'active'");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (verify_password($password, $user['password'])) {
            // Update last login
            $update_stmt = $conn->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
            $update_stmt->bind_param("i", $user['id']);
            $update_stmt->execute();

            return $user;
        }
    }

    return false;
}

/**
 * Log activity user
 */
function log_activity($user_id, $action, $description = '') {
    global $conn;

    $ip_address = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    $stmt = $conn->prepare("INSERT INTO activity_logs (user_id, action, description, ip_address, user_agent, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("issss", $user_id, $action, $description, $ip_address, $user_agent);
    $stmt->execute();
}

/**
 * Send email verification
 */
function send_verification_email($email, $token) {
    $subject = "Verifikasi Email - " . APP_NAME;
    $verification_link = APP_URL . "/auth/verify-email.php?token=" . $token;

    $message = "
    <html>
    <body>
        <h2>Verifikasi Email Anda</h2>
        <p>Terima kasih telah mendaftar di " . APP_NAME . ".</p>
        <p>Klik link di bawah untuk verifikasi email Anda:</p>
        <p><a href='{$verification_link}' style='background: #1E5C99; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Verifikasi Email</a></p>
        <p>Atau copy link ini: {$verification_link}</p>
        <p>Link akan kadaluarsa dalam 24 jam.</p>
        <br>
        <p>Terima kasih,<br>Tim " . APP_NAME . "</p>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: " . FROM_NAME . " <" . FROM_EMAIL . ">\r\n";

    return mail($email, $subject, $message, $headers);
}
?>
