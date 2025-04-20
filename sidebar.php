<?php
/**
 * The theme sidebar template file.
 * 
 * @package  fellow-nurses-africa
 * 
 */

 //ACF DATA.
 $toc_shortcode = get_field( 'toc_shortcode', 'option' );
 $subscribe_heading = get_field( 'subscribe_heading', 'option' );
?>
<aside class="sidebar-area">

    <div class="sidebar-area__inner">
      <?php if( $toc_shortcode ) : ?>
        <div class="toc">
          <?php echo do_shortcode( $toc_shortcode ); ?>
        </div>
      <?php endif; ?>
        <div class="subscribe">
          <?php if( $subscribe_heading) : ?>
            <h3><?php echo esc_html( $subscribe_heading ); ?></h3>
          <?php endif; ?>
          <button class="subscribe-button" aria-label="Subscribe">
            <?php echo esc_html_e( 'Subscribe To Our Blog', 'alphanews' );  ?>
          </button>
        </div>
       
    </div>

</aside>