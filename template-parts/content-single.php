<?php
/**
 * The template part for displaying single posts
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php cnrswebkit_post_thumbnail(); ?>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->

    <?php cnrswebkit_excerpt(); ?>

    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages(array(
            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'cnrswebkit') . '</span>',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'pagelink' => '<span class="screen-reader-text">' . __('Page', 'cnrswebkit') . ' </span>%',
            'separator' => '<span class="screen-reader-text">, </span>',
        ));

        if ('' !== get_the_author_meta('description')) {
            get_template_part('template-parts/biography');
        }
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php cnrswebkit_entry_meta(); ?>
        <?php
        edit_post_link(
                sprintf(
                        /* translators: %2$s: Title of current post,  %1$s and %3$s enclosing span used for styling rendered as "Edit <span>page title</span>" */
                        __('Edit %1$s"%2$s"%3$s', 'cnrswebkit'), '<span class="screen-reader-text">', get_the_title(), '</span>'
                ), '<span class="edit-link">', '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
