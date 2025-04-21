<?php
/**
 * Defer scripts
 */
if( !defined( 'ABSPATH' )) exit;

function defer_scripts($tag, $handle, $src) {
    if (!is_admin() && $handle === 'theme-main-script') {
        return '<script defer src="' . $src . '"></script>';
    }
    return $tag;
}
add_filter('script_loader_tag', 'defer_scripts', 10, 3);
