<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Format Functions
 * ================================================
 * File ini berisi function untuk format data
 * - Format Rupiah
 * - Format tanggal
 * - Format angka
 * dll
 */

/**
 * Format angka jadi format Rupiah
 *
 * Contoh:
 * format_rupiah(1500000) → "Rp 1.500.000"
 * format_rupiah(1500000, false) → "1.500.000"
 */
function format_rupiah($angka, $with_currency = true) {
    $formatted = number_format($angka, 0, ',', '.');

    if ($with_currency) {
        return 'Rp ' . $formatted;
    }

    return $formatted;
}

/**
 * Format tanggal jadi format Indonesia
 *
 * Contoh:
 * format_date('2025-01-15') → "15 Januari 2025"
 * format_date('2025-01-15', 'short') → "15 Jan 2025"
 * format_date('2025-01-15', 'full') → "Rabu, 15 Januari 2025"
 */
function format_date($date, $format = 'long') {
    if (empty($date) || $date == '0000-00-00') {
        return '-';
    }

    // Nama bulan Indonesia
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    // Nama bulan pendek
    $bulan_short = [
        1 => 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
        'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
    ];

    // Nama hari Indonesia
    $hari = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    ];

    $timestamp = strtotime($date);
    $tanggal = date('j', $timestamp);
    $bulan_number = date('n', $timestamp);
    $tahun = date('Y', $timestamp);
    $nama_hari = $hari[date('l', $timestamp)];

    if ($format == 'short') {
        // Format pendek: 15 Jan 2025
        return $tanggal . ' ' . $bulan_short[$bulan_number] . ' ' . $tahun;
    } elseif ($format == 'full') {
        // Format lengkap: Rabu, 15 Januari 2025
        return $nama_hari . ', ' . $tanggal . ' ' . $bulan[$bulan_number] . ' ' . $tahun;
    } else {
        // Format default: 15 Januari 2025
        return $tanggal . ' ' . $bulan[$bulan_number] . ' ' . $tahun;
    }
}

/**
 * Format datetime jadi format Indonesia dengan jam
 *
 * Contoh:
 * format_datetime('2025-01-15 14:30:00') → "15 Januari 2025, 14:30 WIB"
 */
function format_datetime($datetime, $format = 'long') {
    if (empty($datetime) || $datetime == '0000-00-00 00:00:00') {
        return '-';
    }

    $date_part = date('Y-m-d', strtotime($datetime));
    $time_part = date('H:i', strtotime($datetime));

    return format_date($date_part, $format) . ', ' . $time_part . ' WIB';
}

/**
 * Format "berapa lama yang lalu" (relative time)
 *
 * Contoh:
 * time_ago('2025-01-15 14:30:00') → "2 jam yang lalu"
 */
function time_ago($datetime) {
    $timestamp = strtotime($datetime);
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
 * Format angka jadi format ribuan
 *
 * Contoh:
 * format_number(1500) → "1.500"
 * format_number(1500000) → "1.500.000"
 */
function format_number($number) {
    return number_format($number, 0, ',', '.');
}

/**
 * Format ukuran file jadi KB, MB, GB
 *
 * Contoh:
 * format_filesize(1024) → "1 KB"
 * format_filesize(1048576) → "1 MB"
 */
function format_filesize($bytes) {
    if ($bytes >= 1073741824) {
        return number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } else {
        return $bytes . ' bytes';
    }
}

/**
 * Format nomor telepon
 *
 * Contoh:
 * format_phone('081234567890') → "0812-3456-7890"
 */
function format_phone($phone) {
    // Hapus karakter selain angka
    $phone = preg_replace('/[^0-9]/', '', $phone);

    // Format sesuai panjang
    if (strlen($phone) == 11) {
        return substr($phone, 0, 4) . '-' . substr($phone, 4, 3) . '-' . substr($phone, 7);
    } elseif (strlen($phone) == 12) {
        return substr($phone, 0, 4) . '-' . substr($phone, 4, 4) . '-' . substr($phone, 8);
    } else {
        return $phone;
    }
}

/**
 * Format persentase
 *
 * Contoh:
 * format_percent(75) → "75%"
 * format_percent(75.5) → "75.5%"
 */
function format_percent($number, $decimals = 0) {
    return number_format($number, $decimals, ',', '.') . '%';
}

/**
 * Potong teks panjang dan tambah "..."
 *
 * Contoh:
 * excerpt('Ini adalah teks yang sangat panjang', 10) → "Ini adalah..."
 */
function excerpt($text, $length = 100) {
    if (strlen($text) <= $length) {
        return $text;
    }

    $text = substr($text, 0, $length);
    $text = substr($text, 0, strrpos($text, ' '));
    return $text . '...';
}
?>
