<?php
/**
 * The template part for displaying results in search pages
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
    </header><!-- .entry-header -->
    <?php cnrswebkit_excerpt(); ?>
    <?php if ('post' === get_post_type()) : ?>
        <footer class="entry-footer">
            <?php cnrswebkit_entry_meta(); ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-## -->

