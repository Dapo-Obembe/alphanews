<?php
// File: wp-content/themes/alphanews/inc/setup/theme-update-checker.php

require_once get_template_directory() . '/inc/plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$themeUpdater = PucFactory::buildUpdateChecker(
    'https://github.com/Dapo-Obembe/alphanews', // or your JSON URL
    get_template_directory() . '/style.css', // Must point to style.css!
    'alphanews' // Must match text domain in style.css
);

// Enable automatic updates (WordPress 5.5+)
add_filter('auto_update_theme', function($update, $item) {
    if ($item->theme === 'alphanews') { // Match your theme slug
        return true;
    }
    return $update;
}, 10, 2);

// For private repos (optional):
// $themeUpdater->setAuthentication('your-github-token');

// Enable releases if using GitHub:
$themeUpdater->getVcsApi()->enableReleaseAssets();