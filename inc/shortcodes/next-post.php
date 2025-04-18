<?php
/**
 * The FLoating Next Post shortcode.
 * 
 * @package swiftpress
 * @since 1.0.0
 */
/**
 * SHORTCODE FOR NEXT POST ON SINGLE POST PAGE.
 */
function display_next_post_shortcode() {
    // Get the current post ID
    $current_post_id = get_the_ID();

    // Set up a query to get the next post
    $next_post_args = array(
        'posts_per_page' => 1,
        'order'          => 'ASC',
        'orderby'        => 'date',
        'post__not_in'   => array($current_post_id),
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'date_query'     => array(
            array(
                'after' => get_the_date('Y-m-d H:i:s', $current_post_id),
            ),
        ),
    );

    $next_post_query = new WP_Query($next_post_args);

    // Check if there's a next post
    if ($next_post_query->have_posts()) {
        $next_post_query->the_post();
        $next_post_id        = get_the_ID();
        $next_post_thumbnail = get_the_post_thumbnail($next_post_id, 'thumbnail');
        $next_post_title     = get_the_title();
        $next_post_date      = get_the_date();
        wp_reset_postdata();

        // Output the HTML
        $output = '<div class="next-post-container">';
        $output .= '<div class="next-post-details">';
        $output .= $next_post_thumbnail;
        $output .= '<h2 class="next-post-title"><a href="' . get_permalink($next_post_id) . '">' . $next_post_title . '</a></h2>';
        $output .= '</div>';
        $output .= '</div>';

        return $output;
    } else {
        return '';
    }
}

function register_next_post_shortcode() {
    add_shortcode('next-post', 'display_next_post_shortcode');
}
add_action('init', 'register_next_post_shortcode');