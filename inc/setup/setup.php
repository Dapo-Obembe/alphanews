<?php
/**
 * Theme setup files.
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function setup() {
	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Adds support for Block styles.
	 */
	add_theme_support( "wp-block-styles" );

	add_theme_support( 'automatic-feed-links' );
	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Register navigation menus.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', ' awc-boilerplate' ),
			'footer'  => esc_html__( 'Footer Menu', ' awc-boilerplate' ),
			'privacy'  => esc_html__( 'Privacy Menu', ' awc-boilerplate' ),
		)
	);

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Custom logo support.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 500,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Gutenberg support for full-width/wide alignment of supported blocks.
	add_theme_support( 'align-wide' );

	// Gutenberg defaults for font sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name' => __( 'Small', ' awc-boilerplate' ),
				'size' => 14,
				'slug' => 'small',
			),
			array(
				'name' => __( 'Normal', ' awc-boilerplate' ),
				'size' => 16,
				'slug' => 'normal',
			),
			array(
				'name' => __( 'Large', ' awc-boilerplate' ),
				'size' => 36,
				'slug' => 'large',
			),
			array(
				'name' => __( 'Huge', ' awc-boilerplate' ),
				'size' => 50,
				'slug' => 'huge',
			),
		)
	);

	// Gutenberg responsive embed support.
	add_theme_support( 'responsive-embeds' );

	// Gutenberg editor styles support.
	add_theme_support( 'editor-styles' );

	$manifest_path = get_theme_file_path( '/dist/manifest.json' );
	if ( file_exists( $manifest_path ) ) {
		// Get manifest content.
		$manifest_content = file_get_contents( $manifest_path ); // phpcs:ignore
		$manifest         = json_decode( $manifest_content, true );

		// Theme global styles.
		// TO DO: Extract the most necessary global styles and place them in a separate file.
		// Then, replace this with the path to that new file, instead of including all global styles.
		if ( isset( $manifest['main.css'] ) ) {
			add_editor_style( $manifest['main.css'] );
		}
	}
}
add_action( 'after_setup_theme', 'setup' );
