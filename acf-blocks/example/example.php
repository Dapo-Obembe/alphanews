<?php
/**
 * Block: Example Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int|string $post_id The post ID this block is saved to.
 * @package AlphaWebConsult
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'example-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$block_class = 'example';
if ( ! empty( $block['className'] ) ) {
	$block_class .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$block_class .= ' align' . $block['align'];
}

// ACF Block data.
$block_title = get_field( 'block_title' );
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?>">

    <?php if( !empty( $block_title ) ) : ?>
		<h2><?php echo esc_html( $block_title ); ?></h2>
	<?php endif; ?>
   
</div>