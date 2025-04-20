<?php
/**
 * SHow the required plugins for this theme to work perfectly.
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

function awc_register_required_plugins() {
    $plugins = array(
        array(
            'name'     => 'Yoast SEO', // The name of the plugin
            'slug'     => 'wordpress-seo', // The slug of the plugin (from the WordPress.org repository)
            'required' => true,          // If false, the plugin is only recommended
        ),
        array(
            'name'     => 'Secured Custom Fields', // The name of the plugin
            'slug'     => 'advanced-custom-fields', // The slug of the plugin (from the WordPress.org repository)
            'required' => true,          // If false, the plugin is only recommended
        ),
    );

    $config = array(
        'id'           => 'alphanews',                 // Unique ID for hashing notices
        'default_path' => '',                         // Default absolute path to bundled plugins
        'menu'         => 'tgmpa-install-plugins',    // Menu slug
        'has_notices'  => true,                       // Show admin notices
        'dismissable'  => false,                       // Dismissable messages
        'is_automatic' => true,                      // Automatically activate plugins after install
    );

    tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'awc_register_required_plugins');
