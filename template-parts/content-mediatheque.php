<?php
/**
 * The template part for displaying single post Médiathèque
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 1.0
 */
?>
<?php
$current_item = new CnrswebkitRichData(get_the_ID());
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        <?php echo get_post_date($current_item->value('post_date'), 'datesimple'); ?> 
        par <?php the_author(); ?>
    </header><!-- .entry-header -->
    <?php cnrswebkit_post_thumbnail(); ?>
    <div class="entry-content">
        <div class="article-chapo"><?php echo $current_item->value('chapo'); ?></div>
        <?php
        the_content();
        display_bottom_partenaires();
        ?>
    </div><!-- .entry-content -->
    <footer class="entry-footer">
        <?php cnrswebkit_entry_meta(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
