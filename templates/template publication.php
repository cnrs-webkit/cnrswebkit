<?php
/**
 * Template Name: CNRS WebKit list of publications
 * Template Post Type: post, page
 *
 * The template for displaying a list of publication
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 * 
 */

// Translators: Template Name translation.
__('CNRS WebKit list of publications', 'cnrswebkit');


$sidebar = "1" === $cnrs_global_params->field('liste_publications_with_sidebar');

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
            <?php cnrswebkit_post_thumbnail(); ?>
            <div class="entry-content">
                <?php
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
                $publication_data = new CnrswebkitPageItemsList('publication');
                echo $publication_data->get_html_filters();
                echo $publication_data->get_pagination();
                if ($publication_data->has_items() ) {
                    echo $publication_data->get_html_item_list();
                } else {
                    if ($cnrs_webkit_list_filtered) {
                        echo '<br/><p>'. __('There is no publication in this filtered list', 'cnrswebkit') . '</p>';
                    } else {
                        echo '<br/><p>'. __('There is currently no publication in this list', 'cnrswebkit') . '</p>';
                    }
                }
                echo $publication_data->get_pagination();
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

