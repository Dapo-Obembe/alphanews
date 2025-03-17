<?php
/**
 * Comments Template. 
 * 
 * This is the template that displays the comments section.
 * 
 * The arrange is different from the default WordPress comments template.
 * 
 * @package  awc-boilerplate
 * @author Dapo Obembe
 * @since 1.0.0
 */

?>
<section id="comment-wrapper" class="comment-wrapper">
    <div class="comment-wrapper__heading">
        <h3 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            printf(
                esc_html( _n( '%1$s Comment', '%1$s Comments', $comment_count, ' awc-boilerplate' ) ),
                number_format_i18n( $comment_count )
            );
            ?>
        </h3>
    </div>

    <div class="comment-wrapper__comment-lists">
        <?php
            if ( have_comments() ) : ?>
                <ul class="comment-list">
                    <?php
                        wp_list_comments( array(
                            'style'      => 'ul',
                            'short_ping' => true,
                            'avatar_size' => 50,
                        ) );
                    ?>
                </ul>
            <?php
            endif;
        ?>
    </div>
    <div class="comment-wrapper__comment-form">
        
        <?php
            if ( comments_open() ) {
                comment_form();
            }else{
                echo esc_html_e( 'Comments are closed', ' awc-boilerplate' );
            }
        ?>
    </div>
</section>