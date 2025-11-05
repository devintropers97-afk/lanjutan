<?php
/**
 * SITUNEO DIGITAL - Index/Homepage
 * Entry Point Website
 */

// Load configuration
require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/config/recaptcha.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/security.php';
require_once __DIR__ . '/includes/session.php';

// Get current language
$lang = $_GET['lang'] ?? $_SESSION['lang'] ?? 'id';
$_SESSION['lang'] = $lang;

// Redirect to homepage
require_once __DIR__ . '/pages/home.php';
