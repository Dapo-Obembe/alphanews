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
			'primary' => esc_html__( 'Primary Menu', ' alphanews' ),
			'footer'  => esc_html__( 'Footer Menu', ' alphanews' ),
			'privacy'  => esc_html__( 'Privacy Menu', ' alphanews' ),
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
				'name' => __( 'Small', ' alphanews' ),
				'size' => 14,
				'slug' => 'small',
			),
			array(
				'name' => __( 'Normal', ' alphanews' ),
				'size' => 16,
				'slug' => 'normal',
			),
			array(
				'name' => __( 'Large', ' alphanews' ),
				'size' => 36,
				'slug' => 'large',
			),
			array(
				'name' => __( 'Huge', ' alphanews' ),
				'size' => 50,
				'slug' => 'huge',
			),
		)
	);

	// Gutenberg responsive embed support.
	add_theme_support( 'responsive-embeds' );

	// Gutenberg editor styles support.
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );


	$admin_css_path = '/dist/css/admin.css';
	if (file_exists(get_theme_file_path($admin_css_path))) {
		// For editor
		add_editor_style($admin_css_path);
		
		// For admin head
		add_action('admin_enqueue_scripts', function() use ($admin_css_path) {
			wp_enqueue_style(
				'alphaweb-admin-css',
				get_theme_file_uri($admin_css_path),
				[],
				filemtime(get_theme_file_path($admin_css_path))
			);
		});
	}
}
add_action( 'after_setup_theme', 'setup' );
