<?php
/**
 * Mobile navigation template part
 *
 * This template is used for displaying the mobile navigation.
 *
 * @package swiftpress
 * 
 * @author Dapo Obembe
 */

  $join_us_btn = get_field( 'join_us_button', 'option' );
?>

<button class="menu-toggle" aria-expanded="false" aria-label="<?php esc_attr_e( 'Menu', 'swiftpress' ); ?>">
	<?php
	the_svg(
		array(
			'icon'   => 'menu',
			'class'  => 'menu-toggle__icon menu-toggle__icon--open',
			'height' => 32,
			'width'  => 32,
		)
	);
	?>
	<?php
	the_svg(
		array(
			'icon'   => 'close',
			'class'  => 'menu-toggle__icon menu-toggle__icon--close',
			'height' => 32,
			'width'  => 32,
		)
	);
	?>
</button>

<nav class="mobile-nav" hidden>
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'mobile-nav__menu',
			'fallback_cb'    => false,
		)
	);
	?>
	<div class="mobile-nav__buttons" style="margin-top:2rem;">
		<?php
			if ( $join_us_btn ) :
				$link_url    = $join_us_btn['url'];
				$link_title  = $join_us_btn['title'];
				$link_target = $join_us_btn['target'] ? $join_us_btn['target'] : '_self';
				?>
				<button class="join-us-button primary-button">
					<a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
					<?php echo esc_html( $link_title ); ?>
					</a>
				</button>
		<?php endif; ?>
	</div>
</nav>


