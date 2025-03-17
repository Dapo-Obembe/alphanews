<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package awc-boilerplate
 */

get_header(); ?>

<main id="main" class="site-main" role="main">

	<div class="container">

		<section class="error-404 not-found">

			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'awc-boilerplate' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'awc-boilerplate' ); ?></p>

				<?php get_search_form(); ?>

			</div>

		</section>

	</div>

</main>

<?php get_footer(); ?>
