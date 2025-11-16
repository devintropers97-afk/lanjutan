<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Security Settings
 * XSS, CSRF, and security functions
 * ========================================
 */

// ============================================
// CSRF PROTECTION
// ============================================

/**
 * Generate CSRF token
 *
 * @return string CSRF token
 */
function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

/**
 * Get CSRF token
 *
 * @return string CSRF token
 */
function getCSRFToken() {
    return $_SESSION['csrf_token'] ?? generateCSRFToken();
}

/**
 * Verify CSRF token
 *
 * @param string $token Token to verify
 * @return bool Verification status
 */
function verifyCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Generate CSRF hidden input field
 *
 * @return string HTML input field
 */
function csrfField() {
    return '<input type="hidden" name="csrf_token" value="' . getCSRFToken() . '">';
}

/**
 * Require valid CSRF token (or die with error)
 */
function requireCSRF() {
    $token = $_POST['csrf_token'] ?? $_GET['csrf_token'] ?? '';

    if (!verifyCSRFToken($token)) {
        http_response_code(403);
        die('CSRF token validation failed');
    }
}

// ============================================
// XSS PROTECTION
// ============================================

/**
 * Escape HTML to prevent XSS
 *
 * @param string $string String to escape
 * @return string Escaped string
 */
function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Clean input from XSS
 *
 * @param string $input Input to clean
 * @return string Cleaned input
 */
function cleanInput($input) {
    // Remove HTML tags
    $input = strip_tags($input);

    // Trim whitespace
    $input = trim($input);

    // Convert special characters
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

    return $input;
}

/**
 * Clean array inputs recursively
 *
 * @param array $data Data to clean
 * @return array Cleaned data
 */
function cleanInputArray($data) {
    $cleaned = [];

    foreach ($data as $key => $value) {
        if (is_array($value)) {
            $cleaned[$key] = cleanInputArray($value);
        } else {
            $cleaned[$key] = cleanInput($value);
        }
    }

    return $cleaned;
}

// ============================================
// PASSWORD HASHING
// ============================================

/**
 * Hash password using bcrypt
 *
 * @param string $password Plain password
 * @return string Hashed password
 */
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
}

/**
 * Verify password against hash
 *
 * @param string $password Plain password
 * @param string $hash Hashed password
 * @return bool Verification status
 */
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

/**
 * Check if password needs rehashing
 *
 * @param string $hash Hashed password
 * @return bool Rehash needed status
 */
function passwordNeedsRehash($hash) {
    return password_needs_rehash($hash, PASSWORD_BCRYPT, ['cost' => 12]);
}

// ============================================
// SQL INJECTION PROTECTION
// ============================================

/**
 * Escape SQL string (use database escape method instead)
 *
 * @param string $string String to escape
 * @return string Escaped string
 */
function escapeSql($string) {
    global $db;
    return $db ? $db->escape($string) : addslashes($string);
}

// ============================================
// FILE UPLOAD SECURITY
// ============================================

/**
 * Validate file upload
 *
 * @param array $file File from $_FILES
 * @param array $allowedTypes Allowed MIME types
 * @param int $maxSize Max file size in bytes
 * @return array ['valid' => bool, 'error' => string]
 */
function validateFileUpload($file, $allowedTypes = [], $maxSize = UPLOAD_MAX_SIZE) {
    // Check if file was uploaded
    if (!isset($file['error']) || is_array($file['error'])) {
        return ['valid' => false, 'error' => 'Invalid file upload'];
    }

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['valid' => false, 'error' => 'File upload error: ' . $file['error']];
    }

    // Check file size
    if ($file['size'] > $maxSize) {
        return ['valid' => false, 'error' => 'File size exceeds maximum limit'];
    }

    // Check file type
    if (!empty($allowedTypes)) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mimeType, $allowedTypes)) {
            return ['valid' => false, 'error' => 'File type not allowed'];
        }
    }

    return ['valid' => true, 'error' => ''];
}

/**
 * Generate safe filename
 *
 * @param string $filename Original filename
 * @return string Safe filename
 */
function sanitizeFilename($filename) {
    // Get file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // Generate random name
    $safeName = bin2hex(random_bytes(16));

    return $safeName . '.' . strtolower($extension);
}

// ============================================
// RATE LIMITING (Simple implementation)
// ============================================

/**
 * Check rate limit
 *
 * @param string $key Rate limit key (e.g., 'login_attempt')
 * @param int $maxAttempts Max attempts allowed
 * @param int $timeWindow Time window in seconds
 * @return bool Rate limit exceeded status
 */
function checkRateLimit($key, $maxAttempts = 5, $timeWindow = 300) {
    $sessionKey = 'rate_limit_' . $key;

    if (!isset($_SESSION[$sessionKey])) {
        $_SESSION[$sessionKey] = [
            'attempts' => 0,
            'first_attempt' => time()
        ];
    }

    $data = &$_SESSION[$sessionKey];

    // Reset if time window has passed
    if (time() - $data['first_attempt'] > $timeWindow) {
        $data['attempts'] = 0;
        $data['first_attempt'] = time();
    }

    // Increment attempts
    $data['attempts']++;

    // Check if limit exceeded
    return $data['attempts'] > $maxAttempts;
}

/**
 * Reset rate limit counter
 *
 * @param string $key Rate limit key
 */
function resetRateLimit($key) {
    unset($_SESSION['rate_limit_' . $key]);
}

// ============================================
// IP BLOCKING (Simple implementation)
// ============================================

/**
 * Get client IP address
 *
 * @return string Client IP
 */
function getClientIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

/**
 * Check if IP is blocked
 *
 * @param string $ip IP address
 * @return bool Blocked status
 */
function isIPBlocked($ip) {
    global $db;

    $ip = $db->escape($ip);
    $result = $db->fetchOne("SELECT id FROM blocked_ips WHERE ip_address = '{$ip}' AND is_active = 1");

    return $result !== null;
}

/**
 * Block IP address
 *
 * @param string $ip IP address
 * @param string $reason Block reason
 * @return bool Success status
 */
function blockIP($ip, $reason = 'Security violation') {
    global $db;

    return $db->insert('blocked_ips', [
        'ip_address' => $ip,
        'reason' => $reason,
        'is_active' => 1,
        'created_at' => date('Y-m-d H:i:s')
    ]);
}
?>
