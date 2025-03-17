<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awc-boilerplate
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

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<a class="screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'awc-boilerplate' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="container">

			<div class="site-header__wrapper">

				<!-- Logo -->
				<div class="site-header__branding">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<h1 class="site-header__title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</h1>
					<?php endif; ?>
				</div>

				<!-- Desktop Nav -->
				<nav class="site-header__navigation" role="navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'site-header__menu',
							'container'      => false,
						)
					);
					?>
				</nav>

				<!-- Header buttons -->
				 <?php // get_template_part( 'template-parts/components/header-buttons' ); ?>

				<!-- Search Form -->
				<?php // get_template_part( 'template-parts/components/search-form' ); ?>

				<!-- Mobile Nav -->
				<?php get_template_part( 'template-parts/components/mobile-nav' ); ?>

			</div>

		</div>

	</header>
