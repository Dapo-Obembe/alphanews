<?php
/**
 * This function is intended to defer Js on the pages.
 * 
 * @package awc-boilerplate
 * 
 * @author Dapo Obembe
 * 
 * @since 1.0.0
 */
function defer_parsing_of_js( $url ) {
        if ( is_user_logged_in() ) return $url; 
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.js' ) ) return $url;
        return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );