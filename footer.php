<?php
/**
 * The template for displaying the account footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package swiftpress
 */

 // ACF DATA.
 $footer_subscribe_heading = get_field( 'footer_subscribe_heading', 'option' );
 $reach_out_phone = get_field( 'reach_out_phone', 'option' );
 $reach_out_email = get_field( 'reach_out_email', 'option' );

 // ICONS
 $email_icon = '<svg width="16px" height="16px" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
</svg>';

$phone_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
</svg>';

?>

<footer id="colophon" class="site-footer">

	<div class="container">

		<div class="site-footer__top">

			<!-- Logo -->
			<div class="site-footer__top--left">
				<?php if( !empty( $footer_subscribe_heading ) ) : ?>
					<h3><?php echo esc_html( $footer_subscribe_heading ); ?></h3>
				<?php endif; ?>
				<!-- Social Icons -->
				<?php get_template_part( 'template-parts/components/social-icons' ); ?>
			</div>

			<!-- Navigation -->
			 <div class="site-footer__top--middle">
				<h3><?php echo esc_html__( 'Navigations', 'swiftpress' ); ?></h3>
				<nav class="site-footer__navigation" role="navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'menu_id'        => 'footer-menu',
								'menu_class'     => 'site-footer__menu',
								'container'      => false,
							)
						);
					?>
				</nav>
			 </div>

			 <div class="site-footer__top--right">
				<h3><?php echo esc_html__( 'Reach Out', 'swiftpress' ); ?></h3>
				<span>
					<?php echo $email_icon; ?>
					<?php if( $reach_out_email ) : ?>
						<p><?php echo esc_html( $reach_out_email ); ?></p>
					<?php endif; ?>
				</span>
				<span>
					<?php echo $phone_icon; ?>
					<?php if( $reach_out_phone ) : ?>
						<p><?php echo esc_html( $reach_out_phone ); ?></p>
					<?php endif; ?>
				</span>
			 </div>	
			 
		</div>

		<!-- Copyright -->
		<div class="site-footer__copyright"><?php print_copyright_text(); ?></div>

	</div>

</footer>

<?php wp_footer(); ?>
<script src="//instant.page/5.2.0" type="module" integrity="sha384-jnZyxPjiipYXnSU0ygqeac2q7CVYMbh84q0uHVRRxEtvFPiQYbXWUorga2aqZJ0z"></script>
</body>
</html>
