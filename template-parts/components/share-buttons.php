<?php
/**
 * Share Buttons Template
 *
 * @param   array $block The block settings and attributes.
 * @package  swiftpress
 * 
 * @author Dapo Obembe
 * 
 * @since 1.0.0
 */

// Inside the WordPress loop.
$post_link = get_permalink();
?>
<div class="post-share">
	<div class="post-share__toggle">
		 <span><?php echo esc_html_e( 'SHARE', ' swiftpress' ); ?></span>
	</div>
	<div class="post-share__buttons">
		<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="nofollow noopener noreferrer" class="twitter" title="Share to Twitter">
			<?php the_svg(
                array(
                    'icon' => 'twitter',
                    'width' => 16,
                    'height' => 16
                )
            ); ?>
			
		</a>
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="nofollow noopener noreferrer" class="facebook" title="Share to Facebook">
			<?php the_svg(
                array(
                    'icon' => 'facebook',
                    'width' => 16,
                    'height' => 16
                )
            ); ?>
			
		</a>
		<a href="https://api.whatsapp.com/send?text=<?php the_title(); ?> <?php the_permalink(); ?>" target="_blank" rel="nofollow noopener noreferrer" class="whatsapp"  title="Share to WhatsApp">
			<?php the_svg(
                array(
                    'icon' => 'whatsapp',
                    'width' => 16,
                    'height' => 16
                )
            ); ?>
			
		</a>
		<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>" target="_blank" rel="nofollow noopener noreferrer" class="linkedin" title="Share to Linkedin">
			<?php the_svg(
                array(
                    'icon' => 'linkedin',
                    'width' => 16,
                    'height' => 16
                )
            ); ?>
			
		</a>
		
	</div>
</div>
