<?php
/**
 * SITUNEO DIGITAL - Main Entry Point
 *
 * This is the main entry point for the SITUNEO DIGITAL website.
 * It loads the configuration and includes the home page.
 */

// Include database configuration
require_once __DIR__ . '/config/database.php';

// Include the home page
require_once __DIR__ . '/pages/index.php';
