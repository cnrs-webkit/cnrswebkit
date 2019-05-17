<?php
/**
 * The template part for displaying single post Actualité
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */
$current_item = new CnrswebkitRichData(get_the_ID());
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        <?php echo get_post_date($current_item->value('post_date'), 'datesimple'); ?> 
        par <?php the_author(); ?>
    </header><!-- .entry-header -->
    
    <div class="entry-content">
        <?php cnrswebkit_post_thumbnail(); ?>
        <div class="article-chapo"><?php echo $current_item->value('chapo'); ?></div>
        <?php
            the_content();
            if (trim($current_item->value('notes_de_bas_de_page') != '')) {
        ?>
        <div class="bottom-notes"><?php echo text_to_html($current_item->value('notes_de_bas_de_page'), 'p'); ?></div>
        <?php
            }
            display_bottom_actualites();
        ?>
    </div><!-- .entry-content -->
    <footer class="entry-footer">
        <?php cnrswebkit_entry_meta(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
