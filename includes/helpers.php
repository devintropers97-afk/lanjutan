<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Helper Functions
 * General utility functions
 * ========================================
 */

/**
 * Debug variable (var_dump with pre tags)
 *
 * @param mixed $var Variable to debug
 * @param bool $die Die after debug
 */
function dd($var, $die = true) {
    echo '<pre style="background: #1e1e1e; color: #dcdcdc; padding: 20px; border-radius: 5px; margin: 10px; overflow: auto;">';
    var_dump($var);
    echo '</pre>';

    if ($die) {
        die();
    }
}

/**
 * Print variable (print_r with pre tags)
 *
 * @param mixed $var Variable to print
 * @param bool $die Die after print
 */
function pr($var, $die = false) {
    echo '<pre style="background: #1e1e1e; color: #dcdcdc; padding: 20px; border-radius: 5px; margin: 10px; overflow: auto;">';
    print_r($var);
    echo '</pre>';

    if ($die) {
        die();
    }
}

/**
 * Get value from array with default
 *
 * @param array $array Array to search
 * @param string $key Key to find
 * @param mixed $default Default value
 * @return mixed Value or default
 */
function arrayGet($array, $key, $default = null) {
    return isset($array[$key]) ? $array[$key] : $default;
}

/**
 * Check if array key exists and not empty
 *
 * @param array $array Array to check
 * @param string $key Key to check
 * @return bool Existence and non-empty status
 */
function arrayHas($array, $key) {
    return isset($array[$key]) && !empty($array[$key]);
}

/**
 * Generate random string
 *
 * @param int $length String length
 * @param string $type Type: 'alnum', 'alpha', 'numeric', 'hex'
 * @return string Random string
 */
function randomString($length = 16, $type = 'alnum') {
    $pools = [
        'alnum' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'alpha' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'numeric' => '0123456789',
        'hex' => '0123456789abcdef'
    ];

    $pool = $pools[$type] ?? $pools['alnum'];
    return substr(str_shuffle(str_repeat($pool, ceil($length / strlen($pool)))), 0, $length);
}

/**
 * Truncate string with ellipsis
 *
 * @param string $string String to truncate
 * @param int $length Max length
 * @param string $append String to append
 * @return string Truncated string
 */
function truncate($string, $length = 100, $append = '...') {
    if (mb_strlen($string) <= $length) {
        return $string;
    }

    return mb_substr($string, 0, $length) . $append;
}

/**
 * Convert array to CSV string
 *
 * @param array $data Array data
 * @return string CSV string
 */
function arrayToCsv($data) {
    $output = fopen('php://temp', 'r+');

    foreach ($data as $row) {
        fputcsv($output, $row);
    }

    rewind($output);
    $csv = stream_get_contents($output);
    fclose($output);

    return $csv;
}

/**
 * Download file
 *
 * @param string $filePath File path
 * @param string $fileName Download name
 */
function downloadFile($filePath, $fileName = null) {
    if (!file_exists($filePath)) {
        die('File not found');
    }

    $fileName = $fileName ?? basename($filePath);

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filePath));

    readfile($filePath);
    exit;
}

/**
 * Get file size in human readable format
 *
 * @param int $bytes File size in bytes
 * @return string Human readable size
 */
function humanFileSize($bytes) {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];

    for ($i = 0; $bytes > 1024; $i++) {
        $bytes /= 1024;
    }

    return round($bytes, 2) . ' ' . $units[$i];
}

/**
 * Check if request is AJAX
 *
 * @return bool AJAX status
 */
function isAjax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH'])
        && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

/**
 * Check if request method is POST
 *
 * @return bool POST status
 */
function isPost() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * Check if request method is GET
 *
 * @return bool GET status
 */
function isGet() {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

/**
 * Get user browser info
 *
 * @return string Browser name
 */
function getBrowser() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    if (strpos($userAgent, 'Firefox') !== false) {
        return 'Firefox';
    } elseif (strpos($userAgent, 'Chrome') !== false) {
        return 'Chrome';
    } elseif (strpos($userAgent, 'Safari') !== false) {
        return 'Safari';
    } elseif (strpos($userAgent, 'Edge') !== false) {
        return 'Edge';
    } elseif (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Trident') !== false) {
        return 'Internet Explorer';
    } else {
        return 'Unknown';
    }
}

/**
 * Get user OS info
 *
 * @return string OS name
 */
function getOS() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    if (strpos($userAgent, 'Windows') !== false) {
        return 'Windows';
    } elseif (strpos($userAgent, 'Mac') !== false) {
        return 'Mac';
    } elseif (strpos($userAgent, 'Linux') !== false) {
        return 'Linux';
    } elseif (strpos($userAgent, 'Android') !== false) {
        return 'Android';
    } elseif (strpos($userAgent, 'iOS') !== false || strpos($userAgent, 'iPhone') !== false) {
        return 'iOS';
    } else {
        return 'Unknown';
    }
}

/**
 * Get pagination data
 *
 * @param int $total Total items
 * @param int $page Current page
 * @param int $perPage Items per page
 * @return array Pagination data
 */
function getPagination($total, $page = 1, $perPage = ITEMS_PER_PAGE) {
    $totalPages = ceil($total / $perPage);
    $page = max(1, min($page, $totalPages));
    $offset = ($page - 1) * $perPage;

    return [
        'total' => $total,
        'per_page' => $perPage,
        'current_page' => $page,
        'total_pages' => $totalPages,
        'offset' => $offset,
        'has_previous' => $page > 1,
        'has_next' => $page < $totalPages
    ];
}
?>
