<?php
/**
 * Load the recaptcha for CF7 only on the contact page.
 */

 // First, disable reCAPTCHA loading by default
// add_filter( 'wpcf7_load_js', '__return_false' );
// add_filter( 'wpcf7_load_css', '__return_false' );

// Then, re-enable only on the contact page
// function conditionally_load_cf7_recaptcha() {
//     if ( is_page( 'contact' ) ) {
//         if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
//             wpcf7_enqueue_scripts();
//         }
//         if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
//             wpcf7_enqueue_styles();
//         }
//     }
// }
// add_action( 'wp_enqueue_scripts', 'conditionally_load_cf7_recaptcha' );


add_action('wp_print_scripts', 'remove_recaptcha_except_contact_page', 100);

function remove_recaptcha_except_contact_page() {
    
    if (!is_page('contact')) { 
        // Remove the reCAPTCHA scripts
        wp_dequeue_script('google-recaptcha');
        wp_deregister_script('google-recaptcha');
        
        // Remove Contact Form 7 reCAPTCHA scripts
        wp_dequeue_script('wpcf7-recaptcha');
        wp_deregister_script('wpcf7-recaptcha');
        
        // Remove related CSS if needed
        wp_dequeue_style('wpcf7-recaptcha');
        wp_deregister_style('wpcf7-recaptcha');
    }
}