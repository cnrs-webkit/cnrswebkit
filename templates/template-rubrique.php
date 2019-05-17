<?php
/**
 * Template Name: CNRS WebKit sections list
 * Template Post Type: post, page
 *
 * The template for displaying a sections list
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 * 
 */

// Translators: Template Name translation.
__('CNRS WebKit sections list', 'cnrswebkit');

 
global $cnrs_global_params;
$sidebar = "1" === $cnrs_global_params->field('liste_rubriques_with_sidebar');

if (! $sidebar){
    add_filter( 'body_class', 'add_no_sidebar_class' );
}

get_header();

?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			// Include the page content template.
			get_template_part( 'template-parts/content', 'rubrique' );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			// End of the loop.
		endwhile;
		?>
	</main><!-- .site-main -->
	<?php get_sidebar( 'content-bottom' ); ?>
</div><!-- .content-area -->
<?php 
if ( $sidebar ){
    get_sidebar();
}

get_footer(); 

