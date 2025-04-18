<?php
/**
 * Related posts shortcode.
 * 
 * @package swiftpress
 * @since 1.0.0
 */
/**
 * Shortcode for displaying related posts based on category.
 */
function display_related_posts() {
    global $post;

    // Check if we are on a single post page.
    if ( !is_single() || !$post ) {
        return '<p>No related posts found.</p>';
    }

    // Get categories of the current post
    $categories = get_the_category($post->ID);
    if (empty($categories)) {
        return '<p>No categories found for this post.</p>';
    }

    // Get the first category (you can modify this if needed)
    $category = $categories[0];
    
    // Fetch related posts from the same category
    $related_posts = get_posts(array(
        'post_type' => 'post',
        'posts_per_page' => 8,
        'order_by' => 'ASC',
        'post_status' => 'publish',
        'category' => $category->term_id,
        'exclude' => $post->ID, // Exclude the current post
    ));

    if (empty($related_posts)) {
        return '<p>No related posts found.</p>';
    }

    // Output related posts
    $output = '<div class="swiper-container related-posts">';
    $output .= '<div class="swiper-wrapper">';

    foreach ($related_posts as $post) {
        $output .= '<div class="swiper-slide">';
        $output .= '<div class="post-thumbnail"><a href="' . get_permalink($post->ID) . '">' . get_the_post_thumbnail($post->ID, 'medium') . '</a></div>';
        $output .= '<h4><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></h4>';
        $output .= '</div>';
    }

    $output .= '</div>';
    $output .= '<div class="swiper-button-next"></div>';
    $output .= '<div class="swiper-button-prev"></div>';
    $output .= '</div>';

    return $output;
}

function register_related_posts_shortcode() {
    add_shortcode('related_posts', 'display_related_posts');
}
add_action('init', 'register_related_posts_shortcode');