<?php
/**
 * Theme documentation notice for users.
 * 
 * @package AlphaWebConsult
 * @since 1.0.0
 */

 if( !defined( 'ABSPATH' )) exit;

// Add a dashboard notice if update checker fails to load
if (!function_exists('alphanews_update_checker_notice')) {
    function alphanews_update_checker_notice() {
        if (!class_exists('YahnisElsts\\PluginUpdateChecker\\v5\\PucFactory')) {
            echo '<div class="notice notice-warning"><p>';
            _e('Your Theme update checker is not working. Updates might not be available.', 'alphanews');
            echo '</p></div>';
        }
    }
    add_action('admin_notices', 'alphanews_update_checker_notice');
}
