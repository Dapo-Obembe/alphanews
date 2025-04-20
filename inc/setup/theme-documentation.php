<?php
/**
 * Theme documentation notice for users.
 * 
 * @package AlphaWebConsult
 * @since 1.0.0
 */

 if( !defined( 'ABSPATH' )) exit;
 
function alphanews_theme_activation_notice() {
    add_action( 'admin_notices', function () {
        echo '<div class="notice notice-info is-dismissible">';
        echo '<p>';
        esc_html_e( 'Thank you for using the ALPHANEWS theme!', 'alphanews' );
        echo ' <a href="https://www.alphawebconsult.com/alphanews-documentation" target="_blank">';
        esc_html_e( 'Click here to read the documentation.', 'alphanews' );
        echo '</a>';
        echo '</p>';
        echo '</div>';
    });
}
add_action( 'admin_init', 'alphanews_theme_activation_notice' );

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
