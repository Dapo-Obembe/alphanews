<?php
/**
 * Create option page and menu to add add tags to <head>.
 * 
 * @package AlphaWebConsult
 * 
 * @author Dapo Obembe
 * 
 * @since 1.0.0
 */

if( !defined( 'ABSPATH' )) exit;

function awc_head_and_footer_code_menu() {
    add_menu_page(
        'awc Head Code',            // Page title
        'Head & Footer Code',                    // Menu title
        'manage_options',               // Capability
        'awc-head-code',            // Menu slug
        'awc_head_and_footer_code_page',       // Callback function
        'dashicons-editor-code',      // Icon
        100                           // Position
    );
}
add_action('admin_menu', 'awc_head_and_footer_code_menu');

function awc_head_and_footer_code_page() {
    ?>
    <div class="wrap">
        <h1>Add Codes To Your Site's Head & Footer</h1>
        <div class="notice notice-info">
            <p><strong>Warning:</strong> Only paste code you trust. Adding malicious or unverified scripts can harm your site.</p>
            <p>If you are not sure, talk to Dapo Obembe on WhatsApp (+2348134107514)</p>
        </div>
        <form method="post" action="options.php">
            <?php
            settings_fields('awc_head_and_footer_code_settings');
            do_settings_sections('awc-head-code');
            do_settings_sections('awc-footer-code');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
?>
