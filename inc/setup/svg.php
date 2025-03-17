<?php
/**
 * Return SVG markup.
 *
 * @package  awc-boilerplate
 */

/**
 * Includes the SVG sprite in the footer of the HTML document.
 *
 * This function uses the `wp_footer` action hook to include
 * the SVG sprite at the end of the document, before the
 * closing </body> tag. The sprite is included on every
 * page of the site.
 */
function include_svg_sprite() {
	echo '<div class="svg-sprite" style="display: none;">';
	include_once get_template_directory() . '/assets/sprite.svg';
	echo '</div>';
}
add_action( 'wp_footer', 'include_svg_sprite' );
add_action( 'admin_footer', 'include_svg_sprite' );

/**
 * Helper function to generate SVG attributes.
 *
 * @param string $attr_name  Attribute name.
 * @param string $attr_value Attribute value.
 *
 * @return string SVG attribute markup.
 */
function get_svg_attr( $attr_name, $attr_value ) {
	if ( '' === $attr_value ) {
		return '';
	}

	return sprintf( ' %s="%s"', $attr_name, esc_attr( $attr_value ) );
}

/**
 * Function to get the SVG markup.
 *
 * @param array $args {
 *     An array of SVG attributes. Optional.
 *
 *     @type string $icon   Icon name. Default ''.
 *     @type int    $width  Width of the SVG. Default 24.
 *     @type int    $height Height of the SVG. Default 24.
 *     @type string $class  CSS class for the SVG. Default ''.
 *     @type string $role   Role attribute. Default 'img'.
 *     @type bool   $aria_hidden aria-hidden attribute. Default true.
 *     @type string $title  Title for the SVG. Default ''.
 * }
 *
 * @return string The SVG markup.
 */
function get_svg( $args = array() ) {
	// Set default values.
	$defaults = array(
		'icon'        => '',
		'width'       => 24,
		'height'      => 24,
		'class'       => '',
		'role'        => 'img',
		'aria_hidden' => true,
		'title'       => $args['icon'],
	);

	// Merge the input arguments with the defaults.
	$args = wp_parse_args( $args, $defaults );

	// Start SVG markup.
	$svg_markup  = '<svg';
	$svg_markup .= get_svg_attr( 'class', $args['class'] );
	$svg_markup .= get_svg_attr( 'role', $args['role'] );
	$svg_markup .= get_svg_attr( 'aria-hidden', $args['aria_hidden'] ? 'true' : 'false' );
	$svg_markup .= get_svg_attr( 'width', $args['width'] );
	$svg_markup .= get_svg_attr( 'height', $args['height'] );
	$svg_markup .= '>';

	if ( ! empty( $args['title'] ) ) {
		$svg_markup .= '<title>' . esc_html( $args['title'] ) . '</title>';
	}

	$svg_markup .= '<use xlink:href="#' . esc_attr( $args['icon'] ) . '"></use></svg>';

	return $svg_markup;
}

/**
 * Function to output the SVG markup.
 *
 * @param array $args The SVG attributes.
 */
function the_svg( $args = array() ) {
	echo get_svg( $args ); // phpcs:ignore
}
