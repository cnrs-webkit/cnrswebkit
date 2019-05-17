<?php
/**
 * The template part for displaying loops of Événements
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 * 
 * Loop Name: Boucle d'actualités
 */
?>
<?php
if ($display_month_line) {
    ?>
    <div class="agendaMonth"><?php echo $date_month; ?></div>
    <?php
}
?>
<article id="post-<?php echo $current_item->value('ID'); ?>" <?php post_class([$current_item->value('post_type')], $current_item->value('ID')); ?>>
    <div class="eventDate"><?php echo get_event_dates($current_item->value('date_de_debut'), $current_item->value('date_de_fin'), 'datesimple'); ?></div>
    <div class="eventThumb">
        <?php
        $image = get_the_post_thumbnail($current_item->value('ID'), 'cnrsloop-size');
        if ($image) {
            ?><a href="<?php echo get_permalink($current_item->value('ID')); ?>"><?php echo $image; ?></a><?php
        } else {
            ?><div class="imgPlaceholder"><svg xmlns='http://www.w3.org/2000/svg' version='1.1' preserveAspectRatio='none' viewBox='0 0 100 100'><path d='M1 0 L1 1 L99 100 L100 100' fill='#e6e6e6' /></svg></div><?php
        }
        ?>
    </div>
    <div class="eventInfo">
        <header class="entry-header">
            <h1 class="entry-title"><a href="<?php echo get_permalink($current_item->value('ID')); ?>"><?php echo $current_item->value('post_title'); ?></a></h1>
        </header><!-- .entry-header -->
        <div class="entry-content">
            <p><?php echo $current_item->value('chapo'); ?></p>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->

