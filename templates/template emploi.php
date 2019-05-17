<?php
/**
 * Template Name: CNRS WebKit list of job offer
 * Template Post Type: post, page
 *
 * The template for displaying a list of job offer
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 * 
 */

// Translators: Template Name translation.
__('CNRS WebKit list of job offer', 'cnrswebkit');

$sidebar = "1" === $cnrs_global_params->field('liste_emplois_with_sidebar');

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
                $_SESSION['type_emploi'] = false;
                $actualites_data = new CnrswebkitPageItemsList('emploi');
                echo $actualites_data->get_html_filters();
				echo $actualites_data->get_pagination();
				if ($actualites_data->has_items() ) {
				    
				    echo $actualites_data->get_html_item_list();
				} else {
				    if ($cnrs_webkit_list_filtered) {
				        echo '<br/><p>'. __('There is no recruitment offer in this filtered list', 'cnrswebkit') . '</p>';
				    } else {
				        echo '<br/><p>'. __('There is currently no recruitment offer published', 'cnrswebkit') . '</p>';
				    }
				}
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


