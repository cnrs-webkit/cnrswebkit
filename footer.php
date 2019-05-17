<?php
/**
 * The default template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */
?>

</div><!-- .site-content -->

<footer id="colophon" class="site-footer" role="contentinfo">

    <?php if (has_nav_menu('primary')) : ?>
        <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer Primary Menu', 'cnrswebkit'); ?>">
            <?php
            wp_nav_menu(array(
                'menu_id' => 'menu-menu-principal', 
                'container_class' => 'menu-menu-principal-container',
                'theme_location' => 'primary',
                'menu_class' => 'primary-menu',
            ));
            ?>
        </nav><!-- .main-navigation -->
    <?php endif; ?>

    <?php if (has_nav_menu('social')) : ?>
        <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer Social Links Menu', 'cnrswebkit'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'social',
                'menu_class' => 'social-links-menu',
                'depth' => 1,
                'link_before' => '<span class="screen-reader-text">',
                'link_after' => '</span>',
            ));
            ?>
        </nav><!-- .social-navigation -->
    <?php endif; ?>

    <div class="site-info">
        <?php
        /**
         * Fires before the cnrswebkit footer text for footer customization.
         *
         * @since CNRS Web Kit 0.3
         */
        do_action('cnrswebkit_credits');
        ?>

    </div><!-- .site-info -->
    <?php 
    if ( !isset($current_item) || 
        (isset($current_item) && ! $current_item->value('partenaires'))
        ) {
        // Disable display laboratory partners when page is event and the event has partners
        display_bottom_partenaires(); 
    } 
    ?>
</footer><!-- .site-footer -->
</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
