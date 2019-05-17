<?php
/**
 * The template part for displaying loops of Actualités complémentaires
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 * 
 * Loop Name: Boucle d'actualités complémentaires
 */
?>
<article id="post-<?php echo $current_item->value('ID'); ?>" <?php post_class([$current_item->value('post_type')], $current_item->value('ID')); ?>>
    <div>
        <header class="entry-header">
            <h1 class="entry-title"><a href="<?php echo get_permalink($current_item->value('ID')); ?>"><?php echo $current_item->value('post_title'); ?></a></h1>
        </header><!-- .entry-header -->
        <div class="entry-content">
            <?php echo get_post_date($current_item->value('post_date'), 'datesimple'); ?> 
            par <?php the_author(); ?>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->

