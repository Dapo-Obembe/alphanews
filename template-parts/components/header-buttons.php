<?php
/**
 * Buttons used in the header
 */

  // DATA FROM ACF
 $join_us_btn = get_field( 'join_us_button', 'option' );
 $contact_us_btn = get_field( 'contact_us_button', 'option' );
?>
<div class="site-header__buttons">
<?php
    if ( $join_us_btn ) :
        $link_url    = $join_us_btn['url'];
        $link_title  = $join_us_btn['title'];
        $link_target = $join_us_btn['target'] ? $join_us_btn['target'] : '_self';
        ?>
        <button class="join-us-button primary-button">
            <a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
            <?php echo esc_html( $link_title ); ?>
            </a>
        </button>
<?php endif; ?>
<?php
    if ( $contact_us_btn ) :
        $link_url    = $contact_us_btn['url'];
        $link_title  = $contact_us_btn['title'];
        $link_target = $contact_us_btn['target'] ? $contact_us_btn['target'] : '_self';
        ?>
        <button class="contact-us-button secondary-button">
            <a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
            <?php echo esc_html( $link_title ); ?>
            </a>
        </button>
<?php endif; ?>
</div>