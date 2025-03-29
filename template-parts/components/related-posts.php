<?php
/**
 * Related Posts Template.
 *
 * @package  awc-boilerplate
 * @author Dapo
 */

$post_id    = get_the_ID();
$current_post_type = get_post_type( $post_id );

// Get categories
$categories = get_the_category( $post_id );
$cat_ids = ! empty( $categories ) ? wp_list_pluck( $categories, 'term_id' ) : [];

// Get the fallback image URL
$fallback_url = 'https://www.alphawebtips.com/wp-content/uploads/2025/02/no-thumbnail.webp';


// Query related posts
$query_args = array(
    'category__in'   => $cat_ids,
    'post_type'      => $current_post_type,
    'post__not_in'   => array( $post_id ),
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'orderby'        => 'date',
    'order'          => 'ASC',
    'ignore_sticky_posts' => true,
    'suppress_filters' => true,
);

$related_cats = new WP_Query( $query_args );

if ( $related_cats->have_posts() ) : ?>
    <div class="related-posts">
        <div class="container">

        <h3 class="related-posts__title"><?php esc_html_e( 'Related Posts', 'awc-boilerplate' ); ?></h3>
        <div class="related-posts__wrapper">
            <?php while ( $related_cats->have_posts() ) : $related_cats->the_post(); ?>
                <div class="related-posts__wrapper--single">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                       <img src="<?php echo esc_url( get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $fallback_url ); ?>" alt="<?php the_title(); ?>" width="100%" height="300px">
                    </a>
                    <h4 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                </div>
            <?php endwhile; ?>
        </div>

        </div>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
