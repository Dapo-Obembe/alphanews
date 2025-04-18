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
?>

<main id="main" class="site-main" role="main">

	<div class="entry-content">

		<?php
		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();

				the_content();
			}
		}
		?>

	</div>

</main>

<?php
get_footer();
