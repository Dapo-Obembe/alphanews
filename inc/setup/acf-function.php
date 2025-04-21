<?php
/**
 * ACF functions and definitions
 *
 * Sets up the Advanced Custom Fields (ACF) plugin related functions.
 * This includes setting up options pages, defining custom fields and related features.
 *
 * @package  AlphaWebConsult
 */

/**
 * Add the ACF options page.
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title'  => 'Theme Settings', // Title displayed on the options page.
		'menu_title'  => 'Theme Settings', // Title displayed in the WordPress admin menu.
		'menu_slug'   => 'theme-settings', // The slug for the menu item.
		'capability'  => 'manage_options', // Capability required to access the page.
		'parent_slug' => 'themes.php',    // Places it under the Appearance tab.
		'redirect'    => false,         // Position in the admin menu (default: bottom).
	) );
}

/**
 * Save ACF JSON directly into the acf-json/ folder.
 */
add_filter('acf/settings/save_json', function( $path ) {
    // Save ACF JSON files in the specified directory.
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
});

add_filter('acf/settings/load_json', function( $paths ) {
    // Load ACF JSON files from the specified directory.
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});

/**
 * Register ACF Blocks and enqueue the neccessary styles and scripts.
 */
function register_acf_blocks() {
    $blocks_dir = get_template_directory() . '/acf-blocks/';
    $blocks = array_filter( glob( $blocks_dir . '*' ), 'is_dir' );

    foreach ( $blocks as $block ) {
        $block_json_path = $block . '/block.json';

        // Skip blocks without block.json.
        if ( ! file_exists( $block_json_path ) ) {
            continue;
        }

        // Parse block.json.
        $block_args = json_decode( file_get_contents( $block_json_path ), true );

        // Automatically handle template path.
        if ( isset( $block_args['acf']['renderTemplate'] ) ) {
            $block_args['render_template'] = "$block/{$block_args['acf']['renderTemplate']}";
            unset( $block_args['acf']['renderTemplate'] );
        }

        // Enqueue styles and scripts.
        $block_args['enqueue_assets'] = function() use ( $block ) {
            $block_name = basename( $block );

            // Enqueue frontend style.
            if ( file_exists( "$block/style.scss" ) ) {
                wp_enqueue_style(
                    "acf-{$block_name}-style",
                    get_template_directory_uri() . "/dist/acf-blocks/{$block_name}/style.css",
                    array(),
                    '1.0.0'
                );
                wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null, 'all' );
            }

            // Enqueue script.
            if ( file_exists( "$block/script.js" ) ) {
                wp_enqueue_script(
                    "acf-{$block_name}-script",
                    get_template_directory_uri() . "/dist/acf-blocks/{$block_name}/script.js",
                    array( 'wp-blocks', 'wp-element', 'wp-editor' ),
                    '1.0.0',
                    true
                );

	            wp_enqueue_script( 'swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), null, true ); // phpcs:ignore.
            }
        };

        // Register the block with ACF.
        acf_register_block_type( $block_args );
    }
}
add_action( 'acf/init', 'register_acf_blocks' );