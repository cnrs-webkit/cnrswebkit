<?php
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Custom CNRS Web Kit template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */

if ( ! function_exists( 'cnrswebkit_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * Create your own cnrswebkit_entry_meta() function to override in a child theme.
 *
 * @since CNRS Web Kit 0.3
 */
function cnrswebkit_entry_meta() {
	if ( 'post' === get_post_type() ) {
		$author_avatar_size = apply_filters( 'cnrswebkit_author_avatar_size', 49 );
		printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
			get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
			_x( 'Author', 'Used before page author name.', 'cnrswebkit' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		cnrswebkit_entry_date();
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before page format.', 'cnrswebkit' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( 'post' === get_post_type() ) {
		cnrswebkit_entry_taxonomies();
	}

	if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* Translators %2$s: Page title , %1$s and %3$s enclosing span used for styling rendered as "Leave a comment on <span>page title</span>"*/
		comments_popup_link( sprintf( __( 'Leave a comment on %1$s %2$s %3$s', 'cnrswebkit' ), '<span class="screen-reader-text">', get_the_title(), '</span>' ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'cnrswebkit_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own cnrswebkit_entry_date() function to override in a child theme.
 *
 * @since CNRS Web Kit 0.3
 */
function cnrswebkit_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		_x( 'Posted on', 'Used before publish date.', 'cnrswebkit' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

if ( ! function_exists( 'cnrswebkit_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own cnrswebkit_entry_taxonomies() function to override in a child theme.
 *
 * @since CNRS Web Kit 0.3
 */
function cnrswebkit_entry_taxonomies() {
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'cnrswebkit' ) );
	if ( $categories_list && cnrswebkit_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'cnrswebkit' ),
			$categories_list
		);
	}

	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'cnrswebkit' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'cnrswebkit' ),
			$tags_list
		);
	}
}
endif;

if ( ! function_exists( 'cnrswebkit_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     *
     * Create your own cnrswebkit_post_thumbnail() function to override in a child theme.
     *
     * @since CNRS Web Kit 0.3
     */
    function cnrswebkit_post_thumbnail() {
    	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
    		return;
    	}
    
    	if ( is_singular() ) :
    	?>
    
    	<div class="post-thumbnail">
    		<?php the_post_thumbnail('cnrspost-thumbnail-size'); ?>
    	</div><!-- .post-thumbnail -->
    
    	<?php else : ?>
    
    	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
    		<?php the_post_thumbnail( 'cnrspost-thumbnail-size', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
    	</a>
    
    	<?php endif; // End is_singular()
    }
endif;

if ( ! function_exists( 'cnrswebkit_excerpt' ) ) :
	/**
	 * Displays the optional excerpt.
	 *
	 * Wraps the excerpt in a div element.
	 *
	 * Create your own cnrswebkit_excerpt() function to override in a child theme.
	 *
	 * @since CNRS Web Kit 0.3
	 *
	 * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
	 */
	function cnrswebkit_excerpt( $class = 'entry-summary' ) {
		$class = esc_attr( $class );

		if ( has_excerpt() || is_search() ) : ?>
			<div class="<?php echo $class; ?>">
				<?php the_excerpt(); ?>
			</div><!-- .<?php echo $class; ?> -->
		<?php endif;
	}
endif;

if ( ! function_exists( 'cnrswebkit_excerpt_more' ) && ! is_admin() ) :
    /**
     * Replaces "[...]" (appended to automatically generated excerpts) with ... and
     * a 'Continue reading' link.
     *
     * Create your own cnrswebkit_excerpt_more() function to override in a child theme.
     *
     * @since CNRS Web Kit 0.3
     *
     * @return string 'Continue reading' link prepended with an ellipsis.
     */
    function cnrswebkit_excerpt_more() {
    	$link = sprintf( '&hellip;<a href="%1$s" class="more-link">%2$s</a>',
    		esc_url( get_permalink( get_the_ID() ) ),
    		/* Translators %2$s: Page title , %1$s and %3$s enclosing span used for styling rendered as "Continue reading <span>page title</span>"*/
    	    sprintf( __( 'Continue reading %1$s %2$s %3$s', 'cnrswebkit' ), '<span class="screen-reader-text">', get_the_title( get_the_ID()), '</span>' )
    	);
    
    	return $link;
    }
    add_filter( 'excerpt_more', 'cnrswebkit_excerpt_more' );
endif;

if ( ! function_exists( 'cnrswebkit_categorized_blog' ) ) :
    /**
     * Determines whether blog/site has more than one category.
     *
     * Create your own cnrswebkit_categorized_blog() function to override in a child theme.
     *
     * @since CNRS Web Kit 0.3
     *
     * @return bool True if there is more than one category, false otherwise.
     */
    function cnrswebkit_categorized_blog() {
    	if ( false === ( $all_the_cool_cats = get_transient( 'cnrswebkit_categories' ) ) ) {
    		// Create an array of all the categories that are attached to posts.
    		$all_the_cool_cats = get_categories( array(
    			'fields'     => 'ids',
    			// We only need to know if there is more than one category.
    			'number'     => 2,
    		) );
    
    		// Count the number of categories that are attached to the posts.
    		$all_the_cool_cats = count( $all_the_cool_cats );
    
    		set_transient( 'cnrswebkit_categories', $all_the_cool_cats );
    	}
    
    	if ( $all_the_cool_cats > 1 ) {
    		// This blog has more than 1 category so cnrswebkit_categorized_blog should return true.
    		return true;
    	} else {
    		// This blog has only 1 category so cnrswebkit_categorized_blog should return false.
    		return false;
    	}
    }
endif;

/**
 * Flushes out the transients used in cnrswebkit_categorized_blog().
 *
 * @since CNRS Web Kit 0.3
 */
function cnrswebkit_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'cnrswebkit_categories' );
}
add_action( 'edit_category', 'cnrswebkit_category_transient_flusher' );
add_action( 'save_post',     'cnrswebkit_category_transient_flusher' );

if ( ! function_exists( 'cnrswebkit_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since CNRS Web Kit 1.2
 */
function cnrswebkit_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
