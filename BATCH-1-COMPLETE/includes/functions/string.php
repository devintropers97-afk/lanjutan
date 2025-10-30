<?php
/**
 * ================================================
 * SITUNEO DIGITAL - String Functions
 * ================================================
 * File ini berisi function untuk manipulasi string
 */

/**
 * Generate slug dari string (untuk URL)
 * Contoh: "Website Profesional" → "website-profesional"
 */
function str_slug($string) {
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9\-]/', '-', $string);
    $string = preg_replace('/-+/', '-', $string);
    $string = trim($string, '-');
    return $string;
}

/**
 * Capitalize first letter
 */
function str_capitalize($string) {
    return ucfirst(strtolower($string));
}

/**
 * Capitalize all words
 */
function str_title($string) {
    return ucwords(strtolower($string));
}

/**
 * Limit string dengan "..."
 */
function str_limit($string, $limit = 100, $end = '...') {
    if (mb_strlen($string) <= $limit) {
        return $string;
    }
    return mb_substr($string, 0, $limit) . $end;
}

/**
 * Replace multiple spaces dengan single space
 */
function str_clean_space($string) {
    return preg_replace('/\s+/', ' ', trim($string));
}

/**
 * Remove special characters
 */
function str_alpha_numeric($string) {
    return preg_replace('/[^a-zA-Z0-9]/', '', $string);
}

/**
 * Check if string contains substring
 */
function str_contains($haystack, $needle) {
    return strpos($haystack, $needle) !== false;
}

/**
 * Check if string starts with substring
 */
function str_starts_with($haystack, $needle) {
    return strpos($haystack, $needle) === 0;
}

/**
 * Check if string ends with substring
 */
function str_ends_with($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }
    return substr($haystack, -$length) === $needle;
}
?>
