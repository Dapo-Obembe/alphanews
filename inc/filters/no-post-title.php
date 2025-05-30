<?php
/**
 * Show '(No title)' if a post has no title.
 *
 * @since 1.0.0
 */
if( !defined( 'ABSPATH' )) exit;

add_filter(
	'the_title',
	function( $title ) {
		if ( ! is_admin() && empty( $title ) ) {
			$title = _x( '(No title)', 'Used if posts or pages has no title', 'alphanews' );
		}

		return $title;
	}
);