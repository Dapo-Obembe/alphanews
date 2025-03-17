<?php
/**
 * Copyright year shortcode.
 * 
 * @package awc-boilerplate
 * 
 * @author Dapo Obembe
 */
function awc_copyright_year_shortcode( $atts ) {
    $atts = shortcode_atts(
        array(
            'starting_year' => date( 'Y' ),
            'separator'     => '',
        ),
        $atts
    );

    $current_year = date( 'Y' );
    $starting_year = intval( $atts['starting_year'] );

    if ( $starting_year < $current_year ) {
        return esc_html( $starting_year . $atts['separator'] . $current_year );
    } else {
        return esc_html( $current_year );
    }
}
add_shortcode( 'copyright_year', 'awc_copyright_year_shortcode' );
