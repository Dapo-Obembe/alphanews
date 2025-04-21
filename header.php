<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AlphaWebConsult
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

   	<!-- Preload the fonts -->
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/geist-v1-latin/geist-v1-latin-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/geist-v1-latin/geist-v1-latin-700.woff2" as="font" type="font/woff2" crossorigin="anonymous">

	<!-- Load the font styles -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/geist-v1-latin/geist-font.css" media="print" onload="this.media='all'">

	<!-- Fallback for non-JS users -->
	<noscript>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/geist-v1-latin/geist-font.css">
	</noscript>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<a class="screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'alphanews' ); ?></a>

	<?php 
		// Get the layout from the backend.
		$header_layout = get_field('header_layout', 'option') ?: 'header_a';
		// Render the templates based on the layout picked/selected.
		switch ($header_layout) {
			case 'header-a':
				get_template_part('template-parts/header-layouts/header-a');
				break;
			case 'header-b':
				get_template_part('template-parts/header-layouts/header-b');
				break;
			default:
				get_template_part('template-parts/header-layouts/header-a'); // fallback if no specific layout was choosen.
				break;
		}
	?>