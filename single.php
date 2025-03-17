<?php
/**
 * The Single template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a post when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package awc-boilerplate
 */

get_header();

$author_avatar = get_avatar( get_the_author_meta( 'ID' ), 60 );
$author_name  = get_the_author_meta( 'first_name', get_post_field( 'post_author', get_the_ID() ) );
?>

<main id="main" class="site-main post-page" role="main">

	<div class="post-hero">
		<div class="container">
            <div class="breadcrumbs">
                <?php if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                } ?>
            </div>
			<header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="post-date">
                    <p class="date"><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></p>
                    <a href="#content" class="scroll">Scroll Down</a>
                </div>
            </header>
		</div>
	</div>

    <?php if ( have_posts() ) : ?>
	 
        <div id="content" class="content-wrapper">

            <div class="container">

            <?php while ( have_posts() ) : 
                the_post(); ?>
                <article class="content">
                    <div class="content__header">
                        <div class="author-data">
                            <?php echo $author_avatar; ?>
                            <p class="name"><?php echo get_the_author( ); ?></p>
                        </div>
                        <!-- Sharebutton -->
                        <?php get_template_part( 'template-parts/components/share-buttons' ); ?>
                    </div>

                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

                    <!-- ABOUT AUTHOR -->
                    <div class="about-author">
                        <?php echo $author_avatar; ?>
                        <div class="about-author__name-description">
                            <h3 class="name"><?php echo get_the_author( ); ?></h3>
                            <p class="description"><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
                            <?php // get_template_part( 'template-parts/components/author-socials' ); ?>
                        </div>
                    </div>

                    <!-- Comment Area -->
                    <?php comments_template(); ?>

                </article>

                <!-- Sidebar -->
                <?php get_sidebar(); ?>

                <?php endwhile; ?>
            </div>

        </div> 

    <?php endif; ?>

    <!-- RELATED POSTS -->
    <?php get_template_part( 'template-parts/components/related-posts' ); ?>

</main>

<?php
get_footer();
