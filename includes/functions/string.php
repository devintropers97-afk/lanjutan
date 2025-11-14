<?php
/**
 * ========================================
 * SITUNEO DIGITAL - String Utilities
 * String manipulation functions
 * ========================================
 */

/**
 * Convert string to slug
 *
 * @param string $string String to convert
 * @return string Slug
 */
function slugify($string) {
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9]+/i', '-', $string);
    $string = trim($string, '-');

    return $string;
}

/**
 * Convert string to camelCase
 *
 * @param string $string String to convert
 * @return string camelCase string
 */
function camelCase($string) {
    $string = str_replace(['-', '_'], ' ', $string);
    $string = ucwords($string);
    $string = str_replace(' ', '', $string);
    $string = lcfirst($string);

    return $string;
}

/**
 * Convert string to PascalCase
 *
 * @param string $string String to convert
 * @return string PascalCase string
 */
function pascalCase($string) {
    $string = str_replace(['-', '_'], ' ', $string);
    $string = ucwords($string);
    $string = str_replace(' ', '', $string);

    return $string;
}

/**
 * Convert string to snake_case
 *
 * @param string $string String to convert
 * @return string snake_case string
 */
function snakeCase($string) {
    $string = preg_replace('/([a-z])([A-Z])/', '$1_$2', $string);
    $string = strtolower($string);
    $string = str_replace(['-', ' '], '_', $string);

    return $string;
}

/**
 * Convert string to kebab-case
 *
 * @param string $string String to convert
 * @return string kebab-case string
 */
function kebabCase($string) {
    $string = preg_replace('/([a-z])([A-Z])/', '$1-$2', $string);
    $string = strtolower($string);
    $string = str_replace(['_', ' '], '-', $string);

    return $string;
}

/**
 * Check if string starts with substring
 *
 * @param string $haystack String to search in
 * @param string $needle String to search for
 * @return bool Match status
 */
function startsWith($haystack, $needle) {
    return substr($haystack, 0, strlen($needle)) === $needle;
}

/**
 * Check if string ends with substring
 *
 * @param string $haystack String to search in
 * @param string $needle String to search for
 * @return bool Match status
 */
function endsWith($haystack, $needle) {
    return substr($haystack, -strlen($needle)) === $needle;
}

/**
 * Check if string contains substring
 *
 * @param string $haystack String to search in
 * @param string $needle String to search for
 * @return bool Match status
 */
function contains($haystack, $needle) {
    return strpos($haystack, $needle) !== false;
}

/**
 * Limit string to character limit
 *
 * @param string $string String to limit
 * @param int $limit Character limit
 * @param string $end End string
 * @return string Limited string
 */
function limitString($string, $limit = 100, $end = '...') {
    if (mb_strlen($string) <= $limit) {
        return $string;
    }

    return mb_substr($string, 0, $limit) . $end;
}

/**
 * Limit string to word limit
 *
 * @param string $string String to limit
 * @param int $words Word limit
 * @param string $end End string
 * @return string Limited string
 */
function limitWords($string, $words = 50, $end = '...') {
    $wordsArray = explode(' ', $string);

    if (count($wordsArray) <= $words) {
        return $string;
    }

    return implode(' ', array_slice($wordsArray, 0, $words)) . $end;
}

/**
 * Generate excerpt from text
 *
 * @param string $text Text to excerpt
 * @param int $length Excerpt length
 * @return string Excerpt
 */
function excerpt($text, $length = 150) {
    // Remove HTML tags
    $text = strip_tags($text);

    // Limit length
    $text = limitString($text, $length);

    return $text;
}

/**
 * Mask string (e.g., email, phone)
 *
 * @param string $string String to mask
 * @param int $visibleStart Visible characters at start
 * @param int $visibleEnd Visible characters at end
 * @param string $mask Mask character
 * @return string Masked string
 */
function maskString($string, $visibleStart = 3, $visibleEnd = 3, $mask = '*') {
    $length = strlen($string);

    if ($length <= ($visibleStart + $visibleEnd)) {
        return $string;
    }

    $start = substr($string, 0, $visibleStart);
    $end = substr($string, -$visibleEnd);
    $middle = str_repeat($mask, $length - $visibleStart - $visibleEnd);

    return $start . $middle . $end;
}

/**
 * Pluralize word
 *
 * @param string $word Word to pluralize
 * @param int $count Count
 * @param string $plural Custom plural form
 * @return string Pluralized word
 */
function pluralize($word, $count = 2, $plural = null) {
    if ($count === 1) {
        return $word;
    }

    if ($plural !== null) {
        return $plural;
    }

    // Simple English pluralization rules
    if (endsWith($word, 'y')) {
        return substr($word, 0, -1) . 'ies';
    } elseif (endsWith($word, 's') || endsWith($word, 'x') || endsWith($word, 'ch') || endsWith($word, 'sh')) {
        return $word . 'es';
    } else {
        return $word . 's';
    }
}

/**
 * Strip all spaces from string
 *
 * @param string $string String to process
 * @return string String without spaces
 */
function stripSpaces($string) {
    return str_replace(' ', '', $string);
}

/**
 * Remove multiple spaces to single space
 *
 * @param string $string String to process
 * @return string Clean string
 */
function cleanSpaces($string) {
    return preg_replace('/\s+/', ' ', trim($string));
}
?>
