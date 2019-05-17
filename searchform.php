<?php
/**
 * Template for displaying search forms in CNRS Web Kit
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<?php wp_nonce_field('search','_wpnonce'); ?>
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'cnrswebkit' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php /* translators: this is a Search box placeholder, &hellip; stand for "...", rendered as "Search ..." */
		_e( 'Search &hellip;', 'cnrswebkit' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'cnrswebkit' ); ?></span></button>
</form>
