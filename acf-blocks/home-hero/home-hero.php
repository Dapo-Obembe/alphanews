<?php
/**
 * Block: Hero Section.
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int|string $post_id The post ID this block is saved to.
 * @package  fellow-nurses-africa
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'home-hero';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$block_class = 'home-hero';

if ( ! empty( $block['className'] ) ) {
	$block_class .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$block_class .= ' align' . $block['align'];
}

// ACF Block data.
$hero_title             = get_field( 'hero_title' );
$hero_description       = get_field( 'hero_description' );
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?>">

    <div class="home-hero__container container">
        <?php if( !empty( $hero_title ) ) : ?>
		    <h1 class="home-hero__title"><?php echo wp_kses_post( $hero_title ); ?></h1>
	    <?php endif; ?>
        <?php if( !empty( $hero_description ) ) : ?>
		    <div class="home-hero__description"><?php echo wp_kses_post( $hero_description ); ?></div>
	    <?php endif; ?>

        <!-- Show latest posts in a slide -->
         <div class="home-hero__swiper">
            <div class="posts-wrapper swiper-wrapper">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 8,
                    'order' => 'DESC',
                    'ignore_sticky_posts' => true,
                    'suppress_filters'    => true,
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) :
                        $query->the_post();

                        // Get the featured image URL
                        $thumbnail_url = get_the_post_thumbnail_url() ?: 'https://fellownurses.com/wp-content/uploads/2025/01/no-thumbnail.webp'; // Use a fallback image if none exists
                        ?>
                        <article 
                            class="posts-wrapper__card swiper-slide" 
                            style="background-image: linear-gradient(180deg, rgba(0,0,0,0.3), rgba(0,0,0,0.85) 60%), url(<?php echo esc_url( $thumbnail_url ); ?>);" 
                            title="<?php echo esc_attr( get_the_title() ); ?>">
                            <div class="posts-wrapper__card--meta">
                                <h2>
                                    <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                                </h2>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php endif; 

                wp_reset_postdata();
                ?>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 28 28" fill="none" class="arrow-left swiper-button-prev" aria-label="previous slide icon">
                <rect width="28" height="28" rx="14" transform="matrix(4.37114e-08 -1 -1 -4.37114e-08 28 28)" fill="#000"/>
                <path d="M16.4869 8C16.4869 8.689 15.8009 9.71786 15.1065 10.5814C14.2137 11.6957 13.1468 12.6679 11.9236 13.4099C11.0065 13.9661 9.89469 14.5 9 14.5C9.89469 14.5 11.0074 15.0339 11.9236 15.5901C13.1468 16.333 14.2137 17.3052 15.1065 18.4176C15.8009 19.2821 16.4869 20.3129 16.4869 21" stroke="white" stroke-width="1.2"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 28 28" fill="none" class="arrow-right swiper-button-next" aria-label="next slide icon">
                <rect y="28" width="28" height="28" rx="14" transform="rotate(-90 0 28)" fill="#000"/>
                <path d="M11.5131 8C11.5131 8.689 12.1991 9.71786 12.8935 10.5814C13.7863 11.6957 14.8532 12.6679 16.0764 13.4099C16.9935 13.9661 18.1053 14.5 19 14.5C18.1053 14.5 16.9926 15.0339 16.0764 15.5901C14.8532 16.333 13.7863 17.3052 12.8935 18.4176C12.1991 19.2821 11.5131 20.3129 11.5131 21" stroke="white" stroke-width="1.2"/>
            </svg>
    
        </div>
        
    </div>
   
</section>
