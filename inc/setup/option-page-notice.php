<?php
/**
 * Add a custom UI before the fields in the theme option page.
 * 
 * @package AlphaWebConsult
 * 
 * @author Dapo Obembe
 * 
 */
if( !defined( 'ABSPATH' )) exit;

/**
 * Add a notice to the theme options page for instructions to follow.
 */
 function alphaweb_add_theme_options_header_notice() {
     $screen = get_current_screen();
     
     if($screen && strpos($screen->id, 'theme-settings') !== false) { ?>
          <div class="alphanews-options-header" >
                <h1>Welcome to <strong>Alpha News</strong> Settings</h1>
                <p>Use the options below to customize your theme/website look. <br> Advanced users can enable developer tools in the Advanced tab.</p>

                <div class="alphanews-options-header__buttons">
                    <a href="#" target="_blank">Theme Documntation</a>
                    <a href="#" target="_blank">Support / Donate</a>
                </div>
            </div>
        <?php }
}
add_action('admin_notices', 'alphaweb_add_theme_options_header_notice');