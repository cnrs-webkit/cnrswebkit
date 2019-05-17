<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
