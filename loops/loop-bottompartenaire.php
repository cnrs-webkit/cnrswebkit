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

<div class="itemPart" style="max-width:150px; width:<?php echo $logo_width; ?>%">
    <div class="thumbPart"><a href="<?php echo $current_item->value('site_web_du_partenaire'); ?>" target="_blank">
    	<?php echo get_the_post_thumbnail($current_item->value('ID'), ''); ?>
    	</a></div>
    <div class="titlePart"><a href="<?php echo $current_item->value('site_web_du_partenaire'); ?>" target="_blank"><?php echo $current_item->value('post_title'); ?></a></div>
</div>

