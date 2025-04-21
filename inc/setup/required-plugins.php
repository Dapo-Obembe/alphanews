<?php
/**
 * Require TGM Plugin Activation library
 */
if( !defined( 'ABSPATH' )) exit;

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'awc_register_required_plugins');

function awc_register_required_plugins() {
    $plugins = array(
        array(
            'name'         => 'Yoast SEO',
            'slug'         => 'wordpress-seo',
            'required'     => true,
            'is_callable'  => 'wpseo_init', // Yoast's main function
        ),
        array(
            'name'         => 'Secure Custom Fields',
            'slug'         => 'secure-custom-fields',
            'required'     => true,
            'is_callable'  => 'acf', // ACF's main function
        ),
    );

    $config = array(
        'id'           => 'alphanews',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => false,
        'is_automatic' => true,
        'strings'      => array(
            'nag_type' => 'error',
        ),
    );

    tgmpa($plugins, $config);
}