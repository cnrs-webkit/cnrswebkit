<?php
/**
 * The template for displaying list of Actualités
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 1.0
 * 
 * Template Name: News list
 */
get_header();
//require_once( get_template_directory() . '/inc/ajax.php' ); 
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
                    echo $actualites_data->get_html_item_list();
                    ?>
                    <article class="type-actualite newsletterActus"><strong>S’abonner à la newsletter du labo</strong><span>Recevez chaque semaine les dernières actualités du laboratoire par email.</span><button type="button">je m'inscris</button></article>
                    <article id="actualite-social-links" class="widget"><h1>Suivez-nous</h1></article>
                </div>
                <?php
                echo $actualites_data->get_pagination();
                display_bottom_partenaires();
                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-## -->
    </main><!-- .site-main -->
    <?php get_sidebar('content-bottom'); ?>
</div><!-- .content-area -->
<?php get_footer(); ?>
