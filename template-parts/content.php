<?php
/**
 * The template part for displaying content
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if (is_sticky() && is_home() && !is_paged()) : ?>
            <span class="sticky-post"><?php _e('Featured', 'cnrswebkit'); ?></span>
        <?php endif; ?>

        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
    </header><!-- .entry-header -->

    <?php cnrswebkit_excerpt(); ?>

    <?php cnrswebkit_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        /* translators: %2$s: Page title , %1$s and %3$s enclosing span used for styling rendered as "Continue reading<span>page title</span>" */
        the_content(sprintf(
        __('Continue reading %1$s"%2$s"%3$s', 'cnrswebkit'), '<span class="screen-reader-text">', get_the_title(), '</span>'
            ));
        
        wp_link_pages(array(
            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'cnrswebkit') . '</span>',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'pagelink' => '<span class="screen-reader-text">' . __('Page', 'cnrswebkit') . ' </span>%',
            'separator' => '<span class="screen-reader-text">, </span>',
        ));
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php cnrswebkit_entry_meta(); ?>
        <?php
        /* translators: %2$s: Page title , %1$s and %3$s enclosing span used for styling rendered as "Edit <span>page title</span>" */
        edit_post_link(
                sprintf(
                __('Edit %1$s "%2$s"%3$s', 'cnrswebkit'), '<span class="screen-reader-text">', get_the_title(), '</span>'
                ), '<span class="edit-link">', '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
