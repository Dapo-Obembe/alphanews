<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package swiftpress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html_e( 'Read More', 'swiftpress' ); ?></a>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
