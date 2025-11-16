<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Security Functions
 * Additional security utilities
 * Note: Main security functions are in config/security.php
 * ========================================
 */

/**
 * Log security event
 *
 * @param string $event Event description
 * @param string $level Level (info, warning, critical)
 * @param array $data Additional data
 */
function logSecurityEvent($event, $level = 'info', $data = []) {
    global $db;

    $logData = [
        'event' => $event,
        'level' => $level,
        'user_id' => getUserId(),
        'ip_address' => getClientIP(),
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
        'data' => json_encode($data),
        'created_at' => date('Y-m-d H:i:s')
    ];

    // Try to insert to security_logs table
    try {
        $db->insert('security_logs', $logData);
    } catch (Exception $e) {
        // If table doesn't exist, log to file
        $logFile = BASE_PATH . '/logs/security_' . date('Y-m-d') . '.log';
        $logMessage = "[" . date('Y-m-d H:i:s') . "] [{$level}] {$event}\n";
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }
}

/**
 * Check if request is suspicious
 *
 * @return bool Suspicious status
 */
function isSuspiciousRequest() {
    // Check for common attack patterns
    $suspicious = false;

    // Check for SQL injection patterns
    $sqlPatterns = ['/union\s+select/i', '/select\s+.*\s+from/i', '/drop\s+table/i', '/insert\s+into/i'];
    $requestUri = $_SERVER['REQUEST_URI'] ?? '';

    foreach ($sqlPatterns as $pattern) {
        if (preg_match($pattern, $requestUri)) {
            $suspicious = true;
            logSecurityEvent('SQL Injection attempt detected', 'critical', ['uri' => $requestUri]);
            break;
        }
    }

    // Check for XSS patterns
    $xssPatterns = ['/<script/i', '/javascript:/i', '/onerror=/i', '/onload=/i'];

    foreach ($_REQUEST as $key => $value) {
        if (is_string($value)) {
            foreach ($xssPatterns as $pattern) {
                if (preg_match($pattern, $value)) {
                    $suspicious = true;
                    logSecurityEvent('XSS attempt detected', 'critical', ['key' => $key, 'value' => substr($value, 0, 100)]);
                    break 2;
                }
            }
        }
    }

    return $suspicious;
}

/**
 * Sanitize filename to prevent directory traversal
 *
 * @param string $filename Filename
 * @return string Safe filename
 */
function sanitizeFilenameSafe($filename) {
    // Remove directory traversal attempts
    $filename = str_replace(['..', '/', '\\', "\0"], '', $filename);

    // Remove special characters
    $filename = preg_replace('/[^a-zA-Z0-9._-]/', '_', $filename);

    return $filename;
}

/**
 * Verify file upload is safe
 *
 * @param array $file File from $_FILES
 * @return bool Safe status
 */
function isFileSafe($file) {
    // Check if file exists
    if (!isset($file['tmp_name']) || !file_exists($file['tmp_name'])) {
        return false;
    }

    // Check MIME type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    // Blacklist dangerous MIME types
    $dangerousTypes = [
        'application/x-php',
        'application/x-httpd-php',
        'application/x-sh',
        'application/x-csh',
        'text/x-python',
        'application/x-perl',
        'application/x-executable'
    ];

    if (in_array($mimeType, $dangerousTypes)) {
        logSecurityEvent('Dangerous file upload attempt', 'critical', ['mime' => $mimeType, 'filename' => $file['name']]);
        return false;
    }

    return true;
}

/**
 * Generate secure random token
 *
 * @param int $length Token length
 * @return string Secure token
 */
function generateSecureToken($length = 32) {
    return bin2hex(random_bytes($length));
}

/**
 * Verify JWT-like token (simple implementation)
 *
 * @param string $token Token to verify
 * @param string $secret Secret key
 * @return array|false Decoded data or false
 */
function verifyToken($token, $secret) {
    $parts = explode('.', $token);

    if (count($parts) !== 3) {
        return false;
    }

    list($header, $payload, $signature) = $parts;

    // Verify signature
    $validSignature = hash_hmac('sha256', "$header.$payload", $secret);

    if (!hash_equals($signature, $validSignature)) {
        return false;
    }

    // Decode payload
    $data = json_decode(base64_decode($payload), true);

    // Check expiration
    if (isset($data['exp']) && $data['exp'] < time()) {
        return false;
    }

    return $data;
}

/**
 * Create JWT-like token (simple implementation)
 *
 * @param array $data Data to encode
 * @param string $secret Secret key
 * @param int $expiry Expiry in seconds
 * @return string Token
 */
function createToken($data, $secret, $expiry = 3600) {
    $header = base64_encode(json_encode(['typ' => 'JWT', 'alg' => 'HS256']));

    $data['exp'] = time() + $expiry;
    $payload = base64_encode(json_encode($data));

    $signature = hash_hmac('sha256', "$header.$payload", $secret);

    return "$header.$payload.$signature";
}

/**
 * Prevent clickjacking
 */
function preventClickjacking() {
    header('X-Frame-Options: SAMEORIGIN');
    header('Content-Security-Policy: frame-ancestors \'self\'');
}

/**
 * Set secure headers
 */
function setSecureHeaders() {
    // Prevent clickjacking
    header('X-Frame-Options: SAMEORIGIN');

    // XSS Protection
    header('X-XSS-Protection: 1; mode=block');

    // Prevent MIME sniffing
    header('X-Content-Type-Options: nosniff');

    // Referrer policy
    header('Referrer-Policy: strict-origin-when-cross-origin');

    // HTTPS only (if using HTTPS)
    if (isHttps()) {
        header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
    }
}

// Auto-set secure headers
if (!headers_sent()) {
    setSecureHeaders();
}
?>
