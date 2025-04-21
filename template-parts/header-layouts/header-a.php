<?php
/**
 * Header Layout A
 * This markup is used if the user picked the header layout A in the option page.
 * 
 * @package AlphaWebConsult
 * 
 * @author Dapo Obembe
 */

 // ACF/SCF DATA
 $alpha_site_logo = get_field( 'site_logo', 'option' );
 $subscribe_button = get_field( 'subscribe_button', 'option' );

 ?>
 <header id="masthead" class="site-header header-layout-a" role="banner">

    <div class="container site-header__wrapper">

        <!-- Logo -->
        <div class="site-header__branding">
            <?php if ( $alpha_site_logo ) : ?>
                <?php echo wp_get_attachment_image( $alpha_site_logo['ID'], 'full', true, array( 'class' => 'site-logo', 'alt' => get_bloginfo('name') ) ); ?>
            <?php else : ?>
                <h1 class="site-header__title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </h1>
            <?php endif; ?>
        </div>

        <!-- Desktop Nav -->
        <nav class="site-header__navigation" role="navigation">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'site-header__menu',
                    'container'      => false,
                )
            );
            ?>
        </nav>

        <!-- Subscribe Button & Search Icon -->
        <div class="site-header__cta" style="display:flex;align-items:center;gap:1rem;">

            <?php if( $subscribe_button ) : ?>
                <button class="subscribe-toggle button-with-no-link">
                    <?php echo esc_html($subscribe_button); ?>
                </button>
            <?php endif; ?>
            <?php
                the_svg(
                    array(
                        'icon'   => 'search',
                        'class'  => 'site-header__search--icon',
                        'height' => 32,
                        'width'  => 32,
                    )
                );
            ?>
        </div>
        <!-- Mobile Nav -->
        <?php get_template_part( 'template-parts/components/mobile-nav' ); ?>

    </div>

</header>
