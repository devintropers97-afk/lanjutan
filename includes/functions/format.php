<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Format Functions
 * Format Rupiah, Date, Phone, etc
 * ========================================
 */

/**
 * Format number to Rupiah
 *
 * @param float $amount Amount
 * @param bool $includeSymbol Include Rp symbol
 * @return string Formatted Rupiah
 */
function formatRupiah($amount, $includeSymbol = true) {
    $formatted = number_format($amount, 0, ',', '.');

    return $includeSymbol ? 'Rp ' . $formatted : $formatted;
}

/**
 * Format short Rupiah (e.g., 1.5jt, 2.3M)
 *
 * @param float $amount Amount
 * @return string Formatted short Rupiah
 */
function formatRupiahShort($amount) {
    if ($amount >= 1000000000) {
        return 'Rp ' . number_format($amount / 1000000000, 1, ',', '.') . 'M';
    } elseif ($amount >= 1000000) {
        return 'Rp ' . number_format($amount / 1000000, 1, ',', '.') . 'jt';
    } elseif ($amount >= 1000) {
        return 'Rp ' . number_format($amount / 1000, 1, ',', '.') . 'rb';
    } else {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
}

/**
 * Parse Rupiah string to number
 *
 * @param string $rupiah Rupiah string
 * @return float Amount
 */
function parseRupiah($rupiah) {
    // Remove Rp, spaces, and dots
    $number = str_replace(['Rp', ' ', '.'], '', $rupiah);

    // Replace comma with dot for decimal
    $number = str_replace(',', '.', $number);

    return (float) $number;
}

/**
 * Format date to Indonesian format
 *
 * @param string $date Date string
 * @param string $format Output format
 * @return string Formatted date
 */
function formatDate($date, $format = 'd F Y') {
    if (empty($date) || $date === '0000-00-00' || $date === '0000-00-00 00:00:00') {
        return '-';
    }

    $months = [
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
    ];

    $days = [
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu',
        'Sunday' => 'Minggu'
    ];

    $formatted = date($format, strtotime($date));

    // Replace English month/day names with Indonesian
    $formatted = str_replace(array_keys($months), array_values($months), $formatted);
    $formatted = str_replace(array_keys($days), array_values($days), $formatted);

    return $formatted;
}

/**
 * Format date to relative time (e.g., 2 hours ago)
 *
 * @param string $date Date string
 * @return string Relative time
 */
function formatRelativeTime($date) {
    $timestamp = strtotime($date);
    $diff = time() - $timestamp;

    if ($diff < 60) {
        return 'Baru saja';
    } elseif ($diff < 3600) {
        $minutes = floor($diff / 60);
        return $minutes . ' menit yang lalu';
    } elseif ($diff < 86400) {
        $hours = floor($diff / 3600);
        return $hours . ' jam yang lalu';
    } elseif ($diff < 604800) {
        $days = floor($diff / 86400);
        return $days . ' hari yang lalu';
    } elseif ($diff < 2592000) {
        $weeks = floor($diff / 604800);
        return $weeks . ' minggu yang lalu';
    } elseif ($diff < 31536000) {
        $months = floor($diff / 2592000);
        return $months . ' bulan yang lalu';
    } else {
        $years = floor($diff / 31536000);
        return $years . ' tahun yang lalu';
    }
}

/**
 * Format phone number to Indonesian format
 *
 * @param string $phone Phone number
 * @param string $format Output format: 'standard', 'international', 'whatsapp'
 * @return string Formatted phone
 */
function formatPhone($phone, $format = 'standard') {
    // Remove all non-numeric characters
    $phone = preg_replace('/\D/', '', $phone);

    // Convert to 62 format
    if (substr($phone, 0, 1) === '0') {
        $phone = '62' . substr($phone, 1);
    } elseif (substr($phone, 0, 2) !== '62') {
        $phone = '62' . $phone;
    }

    switch ($format) {
        case 'international':
            // +62 831-7386-8915
            return '+' . substr($phone, 0, 2) . ' ' .
                   substr($phone, 2, 3) . '-' .
                   substr($phone, 5, 4) . '-' .
                   substr($phone, 9);

        case 'whatsapp':
            // 6283173868915 (no formatting)
            return $phone;

        case 'standard':
        default:
            // 0831-7386-8915
            return '0' . substr($phone, 2, 3) . '-' .
                   substr($phone, 5, 4) . '-' .
                   substr($phone, 9);
    }
}

/**
 * Format number with thousands separator
 *
 * @param numeric $number Number
 * @param int $decimals Decimal places
 * @return string Formatted number
 */
function formatNumber($number, $decimals = 0) {
    return number_format($number, $decimals, ',', '.');
}

/**
 * Format percentage
 *
 * @param float $value Value
 * @param float $total Total
 * @param int $decimals Decimal places
 * @return string Formatted percentage
 */
function formatPercentage($value, $total = 100, $decimals = 1) {
    if ($total == 0) {
        return '0%';
    }

    $percentage = ($value / $total) * 100;
    return number_format($percentage, $decimals, ',', '.') . '%';
}

/**
 * Format file size
 *
 * @param int $bytes File size in bytes
 * @param int $decimals Decimal places
 * @return string Formatted file size
 */
function formatFileSize($bytes, $decimals = 2) {
    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

    for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
        $bytes /= 1024;
    }

    return number_format($bytes, $decimals, ',', '.') . ' ' . $units[$i];
}

/**
 * Format NIB (Indonesian business ID)
 *
 * @param string $nib NIB
 * @return string Formatted NIB
 */
function formatNIB($nib) {
    // Remove all non-numeric characters
    $nib = preg_replace('/\D/', '', $nib);

    // Format: XXXXX-XXXX-XXXX-XXXX-XXXX
    return substr($nib, 0, 5) . '-' .
           substr($nib, 5, 4) . '-' .
           substr($nib, 9, 4);
}

/**
 * Format NPWP (Indonesian tax ID)
 *
 * @param string $npwp NPWP
 * @return string Formatted NPWP
 */
function formatNPWP($npwp) {
    // Remove all non-numeric characters
    $npwp = preg_replace('/\D/', '', $npwp);

    // Format: XX.XXX.XXX.X-XXX.XXX
    return substr($npwp, 0, 2) . '.' .
           substr($npwp, 2, 3) . '.' .
           substr($npwp, 5, 3) . '.' .
           substr($npwp, 8, 1) . '-' .
           substr($npwp, 9, 3) . '.' .
           substr($npwp, 12, 3);
}

/**
 * Format credit card number (masked)
 *
 * @param string $number Card number
 * @return string Formatted card number
 */
function formatCreditCard($number) {
    // Remove all non-numeric characters
    $number = preg_replace('/\D/', '', $number);

    // Mask middle digits: **** **** **** 1234
    $length = strlen($number);
    $masked = str_repeat('*', $length - 4) . substr($number, -4);

    // Add spaces every 4 digits
    return implode(' ', str_split($masked, 4));
}

/**
 * Format order number
 *
 * @param int $orderId Order ID
 * @param string $prefix Prefix
 * @return string Formatted order number
 */
function formatOrderNumber($orderId, $prefix = 'ORD') {
    return $prefix . '-' . date('Ymd') . '-' . str_pad($orderId, 6, '0', STR_PAD_LEFT);
}

/**
 * Format invoice number
 *
 * @param int $invoiceId Invoice ID
 * @param string $prefix Prefix
 * @return string Formatted invoice number
 */
function formatInvoiceNumber($invoiceId, $prefix = 'INV') {
    return $prefix . '-' . date('Ym') . '-' . str_pad($invoiceId, 6, '0', STR_PAD_LEFT);
}
?>
