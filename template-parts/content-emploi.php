<?php
/**
 * The template part for displaying single post Emploi
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */
?>
<?php
$current_item = new CnrswebkitRichData(get_the_ID());
$job_summary = [];

if ( isset( $current_item->value('typologie_emploi')['name']) ) {
    $job_summary[] = $current_item->value('typologie_emploi')['name'];
}
if ( '' !== $current_item->value('duree_du_poste')  ) {
    $job_summary[] = $current_item->value('duree_du_poste');
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div>
            <?php echo implode(' - ', $job_summary); ?>
        </div>
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->
    <div class="entry-content">
        <div class="leftCol">
            <div class="article-chapo"><?php echo $current_item->value('chapo'); ?></div>
        </div>
        <div class="rightCol">
            <div class="contactMail"><?php echo $current_item->value('nom_contact'); ?> - <a href="#" dataid="<?php echo $current_item->value('ID'); ?>"><?php _e('Contact', 'cnrswebkit') ?></a></div>
            <?php if ($current_item->value('fiche_de_poste_pdf')['ID'] != '') { ?>
                <div class="ficheOffre"><a href="<?php echo wp_get_attachment_url( $current_item->value('fiche_de_poste_pdf')['ID'] ); ?>" target="_blank"><?php _e('Download recruitment offer', 'cnrswebkit') ?></a></div>
            <?php } ?>
            <div class="adresseOffre"><?php echo text_to_html($current_item->value('adresse_du_poste')); ?></div>
            <?php echo get_the_post_thumbnail($current_item->value('ID'), 'cnrsloop-size'); ?>
        </div>
        <?php 
        the_content(); 
        display_bottom_emplois();
        ?>
    </div><!-- .entry-content -->
    <footer class="entry-footer">
        <?php cnrswebkit_entry_meta(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
<!-- start popin -->
<div id="popinOverlay"><div id="popinContainer"><div id='popinClose'><a href='#'></a></div><div id="popinContainerform"></div></div>
    <!-- end popin -->

