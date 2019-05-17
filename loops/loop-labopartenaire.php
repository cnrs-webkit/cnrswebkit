<?php
/**
 * The template part for displaying loops of Partenaires
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 * 
 * Loop Name: Boucle Partenaires
 */
?>

<div class="itemPart">
    <div class="thumbPart"><a href="<?php echo $current_item->value('site_web_du_partenaire'); ?>" target="_blank"><?php echo get_the_post_thumbnail($current_item->value('ID'), 'cnrsloop-size'); ?></a></div>
</div>

