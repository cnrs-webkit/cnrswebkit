<?php
/**
 * The template part for displaying loops of Actualités 
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 * 
 * Loop Name: Boucle d'actualités
 */
?>

<article id="post-<?php echo $current_item->value('ID'); ?>" <?php post_class([$current_item->value('post_type')], $current_item->value('ID')); ?> data-url="<?php echo get_permalink($current_item->value('ID')); ?>">
    <div><a href="<?php echo get_permalink($current_item->value('ID')); ?>"><?php echo get_the_post_thumbnail($current_item->value('ID'), 'cnrsloop-size'); ?></a></div>
    <header class="entry-header">
        <h1 class="entry-title"><a href="<?php echo get_permalink($current_item->value('ID')); ?>"><?php echo $current_item->value('post_title'); ?></a></h1>
    </header><!-- .entry-header -->
    <div class="entry-content">
        <div><?php echo $current_item->value('chapo'); ?></div>
    </div><!-- .entry-content -->
</article><!-- #post-## -->
