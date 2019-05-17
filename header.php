<?php
/**
 * The default template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Roboto:300,400,500,700 <https://fonts.googleapis.com/css?family=Lora:400%2c400i%7cRoboto:300%2c400%2c500%2c700> " rel="stylesheet">
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
        <link rel='stylesheet' id='style-lmo'  href='<?php echo get_template_directory_uri() . '/css/style-lmo.css'; ?>' type='text/css' media='all' />        
    </head>

    <body <?php body_class(); ?>>
       <div id="page" class="site">
            <div class="site-inner">
                <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'cnrswebkit'); ?></a>
                <header id="masthead" class="site-header" role="banner">
                    <div class="site-header-main">
                        <div class="site-branding">
                            <?php 
                            cnrswebkit_the_custom_logo();
                            $titre = get_bloginfo( 'name', 'display' );
                            if ($titre) : 
	                            if (is_front_page() && is_home()) : ?>
	                                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php echo $titre; ?></a></h1>
	                            <?php else : ?>
	                                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php echo $titre; ?></a></p>
	                            <?php
	                            endif;
                            endif;
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) :
                                ?>
                                <p class="site-description"><?php echo $description; ?></p>
                            <?php endif; ?>
                        	<!-- Mini logos partenaires -->
                        	<?php display_header_partenaires(); ?>
                        	<!-- Fin Mini logos partenaires -->
                        </div><!-- .site-branding -->
                        <?php  if (has_nav_menu('primary') || has_nav_menu('secondary') || has_nav_menu('social')) : ?>
                            <button id="menu-toggle" class="menu-toggle"><?php /*Translators:  Text used for menu link on small screen */ _e('Menu', 'cnrswebkit'); ?></button>
                            <div id="site-header-menu" class="site-header-menu">
                                <?php if (has_nav_menu('primary')) : ?>
                                    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'cnrswebkit'); ?>">
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
                                <?php if (has_nav_menu('secondary')) : ?>
                                    <nav id="secondary-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Secondary Menu', 'cnrswebkit'); ?>">
                                        <?php
                                        wp_nav_menu(array(                                        
                                            'menu_id' => 'menu-menu-secondaire',  
                                            'container_class' => 'menu-menu-secondaire-container', 
                                            'theme_location' => 'secondary',
                                            'menu_class' => 'secondary-menu',
                                        ));
                                        ?>
                                    </nav><!-- .main-navigation -->
                                <?php endif; ?>
                                <div id="searchContainer">
                                    <form role="search" method="get" class="search-form" action="<?php echo get_site_url(); ?>">
                                        <?php wp_nonce_field('search','_wpnonce'); ?>
                                        <input type="checkbox" id="checkSearch" />
                                        <input type="text" id="searchInput" placeholder="<?php _e( 'Search &hellip;', 'cnrswebkit' );?>" class="search-field" name="s" />
                                        <label for="checkSearch" id="searchIconContainer"><span class="icon-search"></span></label>
                                    </form>
                                </div>
                                <?php if (has_nav_menu('social')) : ?>
                                    <nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Social Links Menu', 'cnrswebkit'); ?>">
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
                            </div><!-- .site-header-menu -->
                        <?php endif; ?>
                    </div><!-- .site-header-main -->
                    <?php if (get_header_image()) : ?>
                        <?php
                        /**
                         * Filter the default cnrswebkit custom header sizes attribute.
                         *
                         * @since CNRS Web Kit 0.3
                         *
                         * @param string $custom_header_sizes sizes attribute
                         * for Custom Header. Default '(max-width: 709px) 85vw,
                         * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
                         */
                        $custom_header_sizes = apply_filters('cnrswebkit_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px');
                        ?>
                        <div class="header-image">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <img src="<?php header_image(); ?>" srcset="<?php echo esc_attr(wp_get_attachment_image_srcset(get_custom_header()->attachment_id)); ?>" sizes="<?php echo esc_attr($custom_header_sizes); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                            </a>
                        </div><!-- .header-image -->
                    <?php endif; // End header image check.  ?>
                    <?php cnrs_breadcrumb(); ?>
                </header><!-- .site-header -->
                <div id="content" class="site-content">
