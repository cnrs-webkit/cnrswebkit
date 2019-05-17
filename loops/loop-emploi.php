<?php
/**
 * The template part for displaying loops of Emplois
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 * 
 * Loop Name: Boucle Emplois
 */
?>
<?php
if ($display_type_line) {
    ?>
    <div class="emploiType"><?php echo $type_emploi; ?></div>
    <?php
}
?>
<article id="post-<?php echo $current_item->value('ID'); ?>" <?php post_class([$current_item->value('post_type')], $current_item->value('ID')); ?>>
    <div><?php echo $current_item->value('duree_du_poste'); ?></div>
    <div>
        <header class="entry-header">
            <h1 class="entry-title"><a href="<?php echo get_permalink($current_item->value('ID')); ?>"><?php echo $current_item->value('post_title'); ?></a></h1>
        </header><!-- .entry-header -->
        <div class="entry-content">
            <div><?php echo $current_item->value('chapo'); ?></div>
            <?php if ($current_item->value('fiche_de_poste_pdf')['ID'] != '') { ?>
                <a href="<?php echo wp_get_attachment_url( $current_item->value('fiche_de_poste_pdf')['ID'] ); ?>" target="_blank"><?php _e('Download recruitment offer', 'cnrswebkit') ?></a>
            <?php } ?>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->
