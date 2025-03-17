<?php
/**
 * Hide the WordPress version for security reason.
 * 
 * @package awc-boilerplate
 * 
 * @author Dapo Obembe
 * 
 * @since 1.0.0
 * 
 */
/* Hide WP version strings from scripts and styles
* @return {string} $src
* @filter script_loader_src
* @filter style_loader_src
*/
function awc_remove_wp_version_strings( $src ) {
    global $wp_version;

    // Parse the query part of the URL only if it exists
    $query_string = parse_url( $src, PHP_URL_QUERY );
    if ( $query_string ) {
        parse_str( $query_string, $query );
        if ( !empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
            $src = remove_query_arg( 'ver', $src );
        }
    }

    return $src;
}

add_filter( 'script_loader_src', 'awc_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'awc_remove_wp_version_strings' );

/* Hide WP version strings from generator meta tag */
function wpmudev_remove_version() {
    return '';
}

add_filter( 'the_generator', 'wpmudev_remove_version' );
