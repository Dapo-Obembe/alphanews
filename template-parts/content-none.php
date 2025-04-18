<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package swiftpress
 */

?>

<section class="no-results not-found">

	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'swiftpress' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'swiftpress' ); ?></p>

			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can’t find what you’re looking for. Perhaps searching can help.', 'swiftpress' ); ?></p>

			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->

</section><!-- .no-results -->
