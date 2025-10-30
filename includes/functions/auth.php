<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Authentication Functions
 * User authentication & authorization
 * ========================================
 */

/**
 * Authenticate user by email and password
 *
 * @param string $email User email
 * @param string $password User password
 * @return array|false User data or false
 */
function authenticateUser($email, $password) {
    global $db;

    // Escape input
    $email = $db->escape($email);

    // Get user from database
    $user = $db->fetchOne("SELECT * FROM users WHERE email = '{$email}' AND status = 'active'");

    if (!$user) {
        return false;
    }

    // Verify password
    if (!verifyPassword($password, $user['password'])) {
        return false;
    }

    // Update last login
    $db->update('users', [
        'last_login' => date('Y-m-d H:i:s'),
        'last_ip' => getClientIP()
    ], "id = {$user['id']}");

    return $user;
}

/**
 * Register new user
 *
 * @param array $data User data
 * @return array ['success' => bool, 'message' => string, 'user_id' => int]
 */
function registerUser($data) {
    global $db;

    // Check if email already exists
    $email = $db->escape($data['email']);
    $existing = $db->fetchOne("SELECT id FROM users WHERE email = '{$email}'");

    if ($existing) {
        return ['success' => false, 'message' => 'Email sudah terdaftar'];
    }

    // Hash password
    $data['password'] = hashPassword($data['password']);

    // Set default values
    $data['role'] = $data['role'] ?? 'client';
    $data['status'] = 'active';
    $data['created_at'] = date('Y-m-d H:i:s');
    $data['created_ip'] = getClientIP();

    // Insert user
    $success = $db->insert('users', $data);

    if (!$success) {
        return ['success' => false, 'message' => 'Gagal mendaftar, silakan coba lagi'];
    }

    $userId = $db->lastInsertId();

    // Send welcome email
    sendWelcomeEmail($data['email'], $data['name']);

    return [
        'success' => true,
        'message' => 'Pendaftaran berhasil! Silakan login',
        'user_id' => $userId
    ];
}

/**
 * Get user by ID
 *
 * @param int $userId User ID
 * @return array|null User data or null
 */
function getUserById($userId) {
    global $db;

    $userId = (int) $userId;
    return $db->fetchOne("SELECT * FROM users WHERE id = {$userId}");
}

/**
 * Get user by email
 *
 * @param string $email User email
 * @return array|null User data or null
 */
function getUserByEmail($email) {
    global $db;

    $email = $db->escape($email);
    return $db->fetchOne("SELECT * FROM users WHERE email = '{$email}'");
}

/**
 * Update user data
 *
 * @param int $userId User ID
 * @param array $data Data to update
 * @return bool Success status
 */
function updateUser($userId, $data) {
    global $db;

    $userId = (int) $userId;

    // Remove sensitive fields that shouldn't be updated directly
    unset($data['id'], $data['password'], $data['role'], $data['created_at']);

    // Update user
    return $db->update('users', $data, "id = {$userId}");
}

/**
 * Change user password
 *
 * @param int $userId User ID
 * @param string $oldPassword Current password
 * @param string $newPassword New password
 * @return array ['success' => bool, 'message' => string]
 */
function changePassword($userId, $oldPassword, $newPassword) {
    global $db;

    $user = getUserById($userId);

    if (!$user) {
        return ['success' => false, 'message' => 'User tidak ditemukan'];
    }

    // Verify old password
    if (!verifyPassword($oldPassword, $user['password'])) {
        return ['success' => false, 'message' => 'Password lama salah'];
    }

    // Hash new password
    $hashedPassword = hashPassword($newPassword);

    // Update password
    $success = $db->update('users', [
        'password' => $hashedPassword
    ], "id = {$userId}");

    if ($success) {
        return ['success' => true, 'message' => 'Password berhasil diubah'];
    } else {
        return ['success' => false, 'message' => 'Gagal mengubah password'];
    }
}

/**
 * Reset password for user
 *
 * @param string $email User email
 * @return array ['success' => bool, 'message' => string, 'token' => string]
 */
function resetPasswordRequest($email) {
    global $db;

    $user = getUserByEmail($email);

    if (!$user) {
        return ['success' => false, 'message' => 'Email tidak terdaftar'];
    }

    // Generate reset token
    $token = bin2hex(random_bytes(32));
    $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // Save token to database
    $db->insert('password_resets', [
        'user_id' => $user['id'],
        'token' => $token,
        'expires_at' => $expiry,
        'created_at' => date('Y-m-d H:i:s')
    ]);

    // Send reset email (implement this in email.php)
    // sendPasswordResetEmail($email, $token);

    return [
        'success' => true,
        'message' => 'Link reset password telah dikirim ke email Anda',
        'token' => $token
    ];
}

/**
 * Verify reset token
 *
 * @param string $token Reset token
 * @return array|null User data or null
 */
function verifyResetToken($token) {
    global $db;

    $token = $db->escape($token);
    $now = date('Y-m-d H:i:s');

    $reset = $db->fetchOne("
        SELECT pr.*, u.*
        FROM password_resets pr
        JOIN users u ON pr.user_id = u.id
        WHERE pr.token = '{$token}'
        AND pr.expires_at > '{$now}'
        AND pr.used = 0
    ");

    return $reset;
}

/**
 * Complete password reset
 *
 * @param string $token Reset token
 * @param string $newPassword New password
 * @return array ['success' => bool, 'message' => string]
 */
function completePasswordReset($token, $newPassword) {
    global $db;

    $reset = verifyResetToken($token);

    if (!$reset) {
        return ['success' => false, 'message' => 'Token tidak valid atau sudah kadaluarsa'];
    }

    // Hash new password
    $hashedPassword = hashPassword($newPassword);

    // Update user password
    $db->update('users', [
        'password' => $hashedPassword
    ], "id = {$reset['user_id']}");

    // Mark token as used
    $tokenEscaped = $db->escape($token);
    $db->update('password_resets', [
        'used' => 1
    ], "token = '{$tokenEscaped}'");

    return ['success' => true, 'message' => 'Password berhasil direset'];
}
?>
