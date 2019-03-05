<?php
/**
 * The template for displaying list of Publications
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 1.0
 * 
 * Template Name: Publications list
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
            <?php cnrswebkit_post_thumbnail(); ?>
            <div class="entry-content">
                <?php
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
                $publication_data = new CnrswebkitPageItemsList('publication');
                echo $publication_data->get_html_filters();
                echo $publication_data->get_pagination();
                echo $publication_data->get_html_item_list();
                echo $publication_data->get_pagination();
                display_bottom_partenaires();
                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-## -->
    </main><!-- .site-main -->
    <?php get_sidebar('content-bottom'); ?>
</div><!-- .content-area -->
<?php get_sidebar(); ?>  
<?php get_footer(); ?>
