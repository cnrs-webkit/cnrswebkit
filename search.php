<?php
/**
 * The default template for displaying search results
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */

global $cnrs_global_params;
$sidebar = "1" === $cnrs_global_params->field('page_with_sidebar');

if (! $sidebar){
    add_filter( 'body_class', 'add_no_sidebar_class' );
}

get_header();

?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'cnrswebkit' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			// TODO Adjust pagination style (see pods-pagination-advanced)
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'cnrswebkit' ),
				'next_text'          => __( 'Next page', 'cnrswebkit' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cnrswebkit' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php 
if ( $sidebar ){
    get_sidebar();
}

get_footer(); 