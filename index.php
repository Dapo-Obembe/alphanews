<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package swiftpress
 */

get_header();

// ACF DATA.
$blog_archive_title = get_field( 'blog_archive_title', 'option' );
$archive_description = get_field( 'archive_description', 'option' );
$archive_sub_title = get_field( 'archive_sub_title', 'option' );
$archive_image = get_field( 'archive_image', 'option' );       

?>

<main id="main" class="site-main blog-archive" role="main">

	<div class="archive-hero">
		<div class="container">
			<div class="archive-hero__heading">
				<?php if( $blog_archive_title ) : ?>
					<h1><?php echo esc_html( $blog_archive_title ); ?></h1>
				<?php endif; ?>
				<div class="right">
					<?php if( $archive_description ) : ?>
						<p class="description"><?php echo esc_html( $archive_description ); ?></p>
					<?php else: ?>
						<p>Update this in the backend appearance > site-settings.</p>
					<?php endif; ?>
					
					<div class="subscription">
						<div class="subscription__header">
							<?php if( $archive_image ) : ?>
								<?php echo wp_get_attachment_image($archive_image['ID'], 'thumbnail' ); ?>
							<?php endif; ?>

							<?php if( $archive_sub_title ) : ?>
								<h2><?php echo esc_html( $archive_sub_title ); ?></h2>
							<?php else: ?>
								<p>Update this in the backend appearance > site-settings.</p>
							<?php endif; ?>
						</div>
						<div class="subscription__form"></div>
					</div>
				</div>
			</div>

		</div>
	</div>
	 
	<div class="blog-archive-contents">

		<div class="container">
			<?php
			$post_args = array(
				'post_type' => 'post',
				'posts_per_page' => 9,
				'post_status' => 'publish', // Corrected this line
				'order' => 'DESC',
				'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
				'ignore_sticky_posts' => true, // Ignore sticky posts
    			'suppress_filters'    => true, // Suppress conflicting filters
			);

			$archive_query = new WP_Query($post_args);

			if ( $archive_query->have_posts() ) : ?>
				<div class="posts-wrapper">
					<?php while ( $archive_query->have_posts() ) : 
						$archive_query->the_post(); 

						// Get the featured image URL
						$thumbnail_url = get_the_post_thumbnail_url() ?: 'https://fellownurses.com/wp-content/uploads/2025/01/no-thumbnail.webp';
					?>

					<article class="post-card">
						<figure>
							<img src="<?php echo esc_url( $thumbnail_url ); ?>" alt="" width="100%" height="100%" />
						</figure>
						<div class="post-card__meta">
							<h3>
								<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
							</h3>
							<div class="name-date">
								<p class="name"><?php echo get_the_author( ); ?></p>
                        		<p class="date"><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></p>
							</div>
						</div>
					</article>
					<?php endwhile; ?>
				</div>
			<?php endif;

			wp_reset_postdata(); ?>

			<!-- pagination -->
			<div class="pagination-container">
				<?php print_numeric_pagination();; ?>
			</div>

		</div>

	</div> 

</main>

<?php
get_footer();
