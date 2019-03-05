<?php
/**
 * The template for displaying list of Événements
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 1.0
 * 
 * Template Name: Events list
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
                $_SESSION['date_month'] = false;
                $evenement_data = new CnrswebkitPageItemsList('evenement');
                echo $evenement_data->get_html_filters();
                $evenement_data->get_html_item_list();
                echo '<div id="evenement_ajax_container"></div>';
                ?>
                <div class="moreEvents"><a page="1" target="#evenement_ajax_container"><?php _e('Display more events','cnrswebkit')?></a></div>
                <script>
	                var hideLoadMore = false; // C. Seguinot this was not declared on this page! 
	                (function ($) {
                        if (hideLoadMore) {
                            $('.moreEvents').hide();
                        }
                    })(jQuery);
                </script>
                <?php
                display_bottom_partenaires();
                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-## -->
    </main><!-- .site-main -->
<?php get_sidebar('content-bottom'); ?>
</div><!-- .content-area -->
<?php get_sidebar(); ?>  
<?php get_footer(); ?>
