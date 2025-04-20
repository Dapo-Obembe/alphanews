<?php
/**
 * Echo the copyright text saved in the Advanced Custom Fields options.
 *
 * @package AlphaWebConsult
 */


/**
 * Echo the copyright text saved in the Advanced Custom Fields options.
 *
 * @author Dapo Obembe
 */
function print_copyright_text() {
	// Grab our ACF option.
	$copyright_text = get_field( 'site_copyright', 'option' );

	if ( $copyright_text ) {
		echo wp_kses_post( do_shortcode( $copyright_text ) );
	}
}
