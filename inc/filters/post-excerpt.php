<?php
/**
 * Replace the default [...] excerpt more with an elipsis.
 *
 * @since 1.0.0
*/
add_filter(
	'excerpt_more',
	function( $more ) {
		return '&hellip;';
	}
);
