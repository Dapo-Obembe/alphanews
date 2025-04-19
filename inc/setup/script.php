<?php
/**
 * Theme scripts and styles declarations.
 */

if( !defined( 'ABSPATH' )) exit;

function theme_enqueue_assets() {
    // Check if manifest file exists.
    $manifest_path = get_theme_file_path( '/dist/manifest.json' );
    if ( ! file_exists( $manifest_path ) ) {
        error_log('Manifest file not found at: ' . $manifest_path);
        return;
    }

    // Set the version based on the manifest file's modification time.
    $version = filemtime( $manifest_path );

    // Get manifest content.
    $manifest_content = file_get_contents( $manifest_path ); // phpcs:ignore
    $manifest         = json_decode( $manifest_content, true );

    // Check if manifest is empty or not decoded properly.
    if ( empty( $manifest ) ) {
        error_log('Manifest is empty or not decoded properly');
        return;
    }

    // Fonts
    wp_enqueue_style( 'poppins-font', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap', array(), null, 'all' );

    // Enqueue Bootstrap Icons CSS.
    wp_enqueue_style( 'bootstrap-icons', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css', array(), '1.10.3' );
    
   
    if ( isset( $manifest['css/main.css'] ) ) {
        wp_enqueue_style( 'theme-styles', get_theme_file_uri( $manifest['css/main.css'] ), array(), $version, 'all' );
    }

    // Theme scripts.
    if ( isset( $manifest['main.js'] ) ) {
        wp_enqueue_script( 'theme-scripts', get_theme_file_uri( $manifest['main.js'] ), array(), $version, true );
    } else {
        error_log('main.js is not defined in the manifest');
    }

    // SWIPER JS.
    wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null, 'all' );
    wp_enqueue_script( 'swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array( 'jquery' ), null, true );

    // Front page assets.
    if ( is_front_page() ) {
        if ( isset( $manifest['css/home.css'] ) ) {
            wp_enqueue_style( 'home-styles', get_theme_file_uri( $manifest['css/home.css'] ), array(), $version, 'all' );
        }
        if ( isset( $manifest['js/pages/home.js'] ) ) {
            wp_enqueue_script( 'home-scripts', get_theme_file_uri( $manifest['js/pages/home.js'] ), array(), $version, true );
        }
    }
    // About page assets.
    if ( is_page( 'about' ) ) {
        if ( isset( $manifest['css/about.css'] ) ) {
            wp_enqueue_style( 'about-styles', get_theme_file_uri( $manifest['css/about.css'] ), array(), $version, 'all' );
        }
    }

    // Single Post Page.
    if ( is_singular( 'post' ) ) {
        if ( isset( $manifest['css/single.css'] ) ) {
            wp_enqueue_style( 'single-styles', get_theme_file_uri( $manifest['css/single.css'] ), array(), $version, 'all' );
        }
        if ( isset( $manifest['js/pages/single.js'] ) ) {
            wp_enqueue_script( 'single-sentry-footercripts', get_theme_file_uri( $manifest['js/pages/single.js'] ), array(), $version, true );
        }
    }
    
    // ARCHIVE Post Page.
    if ( is_home( 'post' ) || is_post_type_archive( 'event' ) ) {
        if ( isset( $manifest['css/archive-blog.css'] ) ) {
            wp_enqueue_style( 'archive-blog-styles', get_theme_file_uri( $manifest['css/archive-blog.css'] ), array(), $version, 'all' );
        } 
    }

    // CONTACT Page.
    if ( is_page('contact') ) {
        wp_enqueue_style('sweetalert2-css', 'https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css');
		wp_enqueue_script('sweetalert2-js', 'https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js', array('jquery'), '10.16.6', true);
        
        if ( isset( $manifest['css/contact.css'] ) ) {
            wp_enqueue_style( 'contact-styles', get_theme_file_uri( $manifest['css/contact.css'] ), array(), $version, 'all' );
        }
        if ( isset( $manifest['js/pages/contact.js'] ) ) {
            wp_enqueue_script( 'contact-scripts', get_theme_file_uri( $manifest['js/pages/contact.js'] ), array(), $version, true );
        }
    }

    // Text-Page Styles.
    if ( in_array( 'page-template-text-page-template', get_body_class( )) ) {
        
        if ( isset( $manifest['css/text-page.css'] ) ) {
            wp_enqueue_style( 'text-page-styles', get_theme_file_uri( $manifest['css/text-page.css'] ), array(), $version, 'all' );
        }
    }
    // 404 Styles.
    if ( is_404(  ) ) {
        
        if ( isset( $manifest['css/error-404.css'] ) ) {
            wp_enqueue_style( 'error-404-styles', get_theme_file_uri( $manifest['css/error-404.css'] ), array(), $version, 'all' );
        }
    }

    // Add Recaptcha API on the single post page.
	if ( is_single() && comments_open() ) {
		// Don't load reCAPTCHA for admin users.
		if ( is_admin() || current_user_can('manage_options') ) {
			return;
		}
        wp_enqueue_script('google-recaptcha', 'https://www.google.com/recaptcha/api.js', array(), null, true);
    }
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_assets' );

function enqueue_recaptcha_settings_script($hook) {
    // Check if manifest file exists.
    $manifest_path = get_theme_file_path( '/dist/manifest.json' );
    if ( ! file_exists( $manifest_path ) ) {
        error_log('Manifest file not found at: ' . $manifest_path);
        return;
    }

    // Set the version based on the manifest file's modification time.
    $version = filemtime( $manifest_path );

    // Get manifest content.
    $manifest_content = file_get_contents( $manifest_path ); // phpcs:ignore
    $manifest         = json_decode( $manifest_content, true );

     if ($hook !== 'toplevel_page_recaptcha-settings') {
        return; // Don't load the script on other admin pages.
    }

    // Enqueue the custom JS file for the settings page.
    if ( isset( $manifest['css/recaptcha-settings.css'] ) ) {
    wp_enqueue_style( 'recaptcha-style', get_theme_file_uri( $manifest['css/recaptcha-settings.css'] ), array(), $version, 'all');
    }

    if ( isset( $manifest['js/pages/recaptcha-settings.js'] ) ) {
    wp_enqueue_script( 'recaptcha-scripts', get_theme_file_uri( $manifest['js/pages/recaptcha-settings.js'] ), array(), $version, true );
    }
    
}
add_action('admin_enqueue_scripts', 'enqueue_recaptcha_settings_script');
