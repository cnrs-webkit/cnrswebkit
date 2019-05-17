<?php
/**
 * Template Name: CNRS WebKit list of news
 * Template Post Type: post, page
 *
 * The template for displaying a list of  news
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 * 
 */

// Translators: Template Name translation.
__('CNRS WebKit list of news', 'cnrswebkit');

$sidebar = "1" === $cnrs_global_params->field('liste_actualites_with_sidebar');

if (! $sidebar){
    add_filter( 'body_class', 'add_no_sidebar_class' );
}

get_header();

?> 
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header><!-- .entry-header -->
            <div class="entry-content">
                <?php
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
                $actualites_data = new CnrswebkitPageItemsList('actualite');
                echo $actualites_data->get_html_filters();
                echo $actualites_data->get_pagination();
                ?>
                <div class="loop-contents loop-contents-actualite">
                    <?php
                    if ($actualites_data->has_items() ) {
                        echo $actualites_data->get_html_item_list();
                    } else {
                        if ($cnrs_webkit_list_filtered) {
                            echo '<br/><p>'. __('There is no news in the present filtered list', 'cnrswebkit') . '</p>';
                            
                        } else {
                            echo '<br/><p>'. __('There is currently no news in the present list', 'cnrswebkit') . '</p>';
                        }
                    }
                    
                    // include for is_plugin_active which is an admin only function
                    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );  
                    if (is_plugin_active('newsletter') ) {
                        /*
                         TODO Ces 2 liens sont brisés !!
                         <article class="type-actualite newsletterActus"><strong>S’abonner à la newsletter du labo</strong><span>Recevez chaque semaine les dernières actualités du laboratoire par email.</span><button type="button">je m'inscris</button></article>
                         <article id="actualite-social-links" class="widget"><h1>Suivez-nous</h1></article>
                         */
                    } ?>

                </div>
                <?php
                echo $actualites_data->get_pagination();
                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-## -->
    </main><!-- .site-main -->
    <?php get_sidebar('content-bottom'); ?>
</div><!-- .content-area -->

<?php 
if ( $sidebar ){ 
    get_sidebar();
}

get_footer(); 

