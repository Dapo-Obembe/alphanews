<?php
/**
 * Registers the settings page to add the codes.
 * 
 * @package alpha_web_consult
 * 
 * @author Dapo Obembe
 * 
 * @since 1.0.0
 */
function awc_head_and_footer_code_settings() {
    // Register settings for the head code.
    register_setting('awc_head_and_footer_code_settings', 'awc_head_code');

    add_settings_section(
        'awc_head_code_section',
        'Add Code to Head',
        'awc_head_code_section_callback',
        'awc-head-code'
    );

    add_settings_field(
        'awc_head_code_field',
        'Head Code',
        'awc_head_code_field_callback',
        'awc-head-code',
        'awc_head_code_section'
    );

    // Register settings for the footer code
    register_setting('awc_head_and_footer_code_settings', 'awc_footer_code');

    add_settings_section(
        'awc_footer_code_section',
        'Add Code to Footer',
        'awc_footer_code_section_callback',
        'awc-footer-code'
    );

    add_settings_field(
        'awc_footer_code_field',
        'Footer Code',
        'awc_footer_code_field_callback',
        'awc-footer-code',
        'awc_footer_code_section'
    );
}
add_action('admin_init', 'awc_head_and_footer_code_settings');



function awc_head_code_section_callback() {
    echo '<p>Paste your code/tag for the <code>&lt;head&gt;</code> section below:</p>';
    echo '<p>One tag/code per line.</p>';
}

function awc_head_code_field_callback() {
    $head_code = get_option('awc_head_code', '');
    echo '<textarea name="awc_head_code" rows="10" style="width:100%;">' . esc_textarea($head_code) . '</textarea>';
}

// Callback for footer section
function awc_footer_code_section_callback() {
    echo '<p>Paste your code/tag for the footer (before <code>&lt;/body&gt;</code>) below:</p>';
    echo '<p>One tag/code per line.</p>';

}

// Callback for footer field
function awc_footer_code_field_callback() {
    $footer_code = get_option('awc_footer_code', '');
    echo '<textarea name="awc_footer_code" rows="10" style="width:100%;">' . esc_textarea($footer_code) . '</textarea>';
}
?>
