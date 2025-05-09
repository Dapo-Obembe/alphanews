<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AlphaWebConsult
 * @since 1.0.0
 */
if(!defined('ABSPATH')) exit;

function include_inc_files() {
	$files = array(
		'./inc/custom-functions', // Adds custom functions to the theme.
		'./inc/filters/', // Load filters and hooks.
		'./inc/google-recaptcha/', // Google recaptcha functions and filter.
		'./inc/head-and-footer-codes/', // Add code/tags to <head> and </body>.
		'./inc/partials/', // Reusable functions for items like buttons, img, etc.
		'./inc/post-types/', // Custom Post Types registration.
		'./inc/setup/', // Theme setup files.
		'./inc/shortcodes/', // Load Shortcodes used in the theme.
		'./inc/template-tags/', // Custom template tags for this theme.
	);

	foreach ( $files as $include ) {
		$include = trailingslashit( get_template_directory() ) . $include;

		// Allows inclusion of individual files or all .php files in a directory.
		if ( is_dir( $include ) ) {
			foreach ( glob( $include . '*.php' ) as $file ) {
				require_once $file;
			}
		} else {
			require_once $include;
		}
	}
}

include_inc_files();

/**
 * NOTE: Developer, do not add any custom functions in this file. 
 * Find the relevant file to add your custom functions in the inc/ folder.
 * Or add them like inc/custom-functions/your-function-name.
 * 
 * Happy coding!!!
 */