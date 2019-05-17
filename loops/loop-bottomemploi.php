<?php
/**
 * The template part for displaying loops of Emplois complémentaires
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 * 
 * Loop Name: Boucle d'emplois
 */
?>
<?php
$job_summary = [];

if ( isset($current_item->value('typologie_emploi')['name']) ) {
    $job_summary[] = $current_item->value('typologie_emploi')['name'];
}
if ( '' !== $current_item->value('duree_du_poste')  ) {
    $job_summary[] = $current_item->value('duree_du_poste');
}
?>
<article id="post-<?php echo $current_item->value('ID'); ?>" <?php post_class([$current_item->value('post_type')], $current_item->value('ID')); ?>>
	<div class="eventDate"><span><?php echo implode(' - ', $job_summary); ?></span></div>
    <div>
        <header class="entry-header">
            <h1 class="entry-title"><a href="<?php echo get_permalink($current_item->value('ID')); ?>"><?php echo $current_item->value('post_title'); ?></a></h1>
        </header><!-- .entry-header -->
        <div class="entry-content">
            <p><?php echo $current_item->value('chapo'); ?></p>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->

