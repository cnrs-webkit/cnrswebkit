<?php
/**
 * Template Name: CNRS WebKit list of job offer
 * Template Post Type: post, page
 *
 * The template for displaying a list of job offer
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 1.0
 * 
 */

// Translators: Template Name translation.
__('CNRS WebKit list of job offer', 'cnrswebkit');

get_header();
// TODO next line commented in V0.3! Is ajax useful?? 
// require_once( get_template_directory() . '/inc/ajax.php' );  
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
				    echo '<br/><p>'. __('There is currently no recruitment offer published', 'cnrswebkit') . '</p>';
				}
				echo $actualites_data->get_pagination();
                display_bottom_partenaires();
                ?>  
            </div><!-- .entry-content -->
        </article><!-- #post-## -->
    </main><!-- .site-main -->
    <?php get_sidebar('content-bottom'); ?>
</div><!-- .content-area -->
<?php get_sidebar(); ?>  
<?php get_footer(); ?>
