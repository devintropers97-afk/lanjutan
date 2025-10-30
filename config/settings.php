<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Dynamic Settings
 * Load settings from database
 * ========================================
 */

// Require database connection
require_once __DIR__ . '/database.php';

/**
 * Get all settings from database
 *
 * @return array Associative array of settings
 */
function getSettings() {
    global $db;

    $settings = [];

    // Try to fetch from database
    $result = $db->query("SELECT setting_key, setting_value FROM settings");

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }
    }

    // Return settings or defaults if table doesn't exist yet
    return !empty($settings) ? $settings : getDefaultSettings();
}

/**
 * Get default settings (fallback when database is not ready)
 *
 * @return array Default settings
 */
function getDefaultSettings() {
    return [
        'company_name' => COMPANY_NAME,
        'company_tagline' => COMPANY_TAGLINE,
        'company_phone' => CONTACT_WHATSAPP_FORMATTED,
        'company_email' => CONTACT_EMAIL_ADMIN,
        'support_email' => CONTACT_EMAIL_SUPPORT,
        'company_address' => COMPANY_ADDRESS_FULL,
        'site_url' => SITE_URL,
        'maintenance_mode' => '0',
        'allow_registration' => '1',
        'items_per_page' => ITEMS_PER_PAGE,
        'timezone' => TIMEZONE,
        'currency' => CURRENCY,
    ];
}

/**
 * Get single setting value
 *
 * @param string $key Setting key
 * @param mixed $default Default value if not found
 * @return mixed Setting value
 */
function getSetting($key, $default = null) {
    global $db;

    $key = $db->escape($key);
    $result = $db->fetchOne("SELECT setting_value FROM settings WHERE setting_key = '{$key}'");

    return $result ? $result['setting_value'] : $default;
}

/**
 * Update or insert setting
 *
 * @param string $key Setting key
 * @param mixed $value Setting value
 * @return bool Success status
 */
function setSetting($key, $value) {
    global $db;

    $key = $db->escape($key);
    $value = $db->escape($value);

    // Check if setting exists
    $existing = $db->fetchOne("SELECT id FROM settings WHERE setting_key = '{$key}'");

    if ($existing) {
        // Update existing setting
        return $db->query("UPDATE settings SET setting_value = '{$value}', updated_at = NOW() WHERE setting_key = '{$key}'");
    } else {
        // Insert new setting
        return $db->query("INSERT INTO settings (setting_key, setting_value, created_at) VALUES ('{$key}', '{$value}', NOW())");
    }
}

/**
 * Delete setting
 *
 * @param string $key Setting key
 * @return bool Success status
 */
function deleteSetting($key) {
    global $db;

    $key = $db->escape($key);
    return $db->query("DELETE FROM settings WHERE setting_key = '{$key}'");
}

/**
 * Check if maintenance mode is enabled
 *
 * @return bool Maintenance status
 */
function isMaintenanceMode() {
    return getSetting('maintenance_mode', '0') === '1';
}

/**
 * Check if registration is allowed
 *
 * @return bool Registration status
 */
function isRegistrationAllowed() {
    return getSetting('allow_registration', '1') === '1';
}

// Load settings into global variable
$SETTINGS = getSettings();
?>
