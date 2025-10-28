<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Validation Functions
 * ================================================
 * File ini berisi function untuk validasi input
 */

/**
 * Validasi email
 * Return: true/false
 */
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validasi nomor telepon Indonesia
 * Return: true/false
 */
function is_valid_phone($phone) {
    // Hapus karakter selain angka
    $phone = preg_replace('/[^0-9]/', '', $phone);

    // Cek panjang (10-13 digit)
    if (strlen($phone) < 10 || strlen($phone) > 13) {
        return false;
    }

    // Cek awalan (08, 628, atau +628)
    return preg_match('/^(08|628|\+628)/', $phone);
}

/**
 * Validasi password (minimal 6 karakter)
 * Return: true/false
 */
function is_valid_password($password) {
    return strlen($password) >= MIN_PASSWORD_LENGTH;
}

/**
 * Validasi URL
 * Return: true/false
 */
function is_valid_url($url) {
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

/**
 * Validasi angka
 * Return: true/false
 */
function is_valid_number($value) {
    return is_numeric($value);
}

/**
 * Validasi required field (tidak boleh kosong)
 * Return: true/false
 */
function is_required($value) {
    return !empty(trim($value));
}

/**
 * Validasi minimal panjang string
 * Return: true/false
 */
function min_length($value, $min) {
    return strlen(trim($value)) >= $min;
}

/**
 * Validasi maksimal panjang string
 * Return: true/false
 */
function max_length($value, $max) {
    return strlen(trim($value)) <= $max;
}
?>
