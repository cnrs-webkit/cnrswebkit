<?php
/**
 * The template part for displaying loops of Agenda
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 * 
 * Loop Name: Boucle des contacts
 */
?>
<?php
if ($display_lettre_line) {
    ?>
    <div class="lettrecontact"><?php echo $lettre_contact; ?></div>
    <?php
}
// build an array of fields key, label type : remove =1 for each that should not be listed by Cnrswebkit_span_field
$fields_list = $current_item->fields_list();
$fields_list['ID']['remove']=1;
$fields_list['nom']['remove']=1;
$fields_list['prenom']['remove']=1;
$fields_list['job']['remove']=1;
$fields_list['telephone']['remove']=1;
$fields_list['description']['remove']=1;
?>
<article id="post-<?php echo $current_item->value('ID'); ?>" <?php post_class([$current_item->value('post_type')], $current_item->value('ID')); ?>>
    <div class="contactDetails">
        <div class="closeContact"><span class="icon-close"></span></div>
        <div class="thumbContainer"><?php echo get_the_post_thumbnail($current_item->value('ID'), 'cnrsloop-size'); ?></div>
        <div class="detailsContainer">
            <span class="name"><?php echo ($current_item->value('prenom')); ?> <?php echo ($current_item->value('nom')); ?></span>
            <span class="function"><?php echo ($current_item->value('job')); ?></span>
            <?php foreach ($fields_list as $field_slug => $label) {echo Cnrswebkit_span_field($field_slug,$current_item->value($field_slug),$fields_list);} ?>
            <p><?php echo (text_to_html($current_item->value('description'))); ?></p>
            <a href="#" class="contactLink" target="#form-container-<?php echo $current_item->value('ID'); ?>" dataid="<?php echo $current_item->value('ID'); ?>"><?php _e('Contact this person', 'cnrswebkit') ?></a>
            <div id="form-container-<?php echo $current_item->value('ID'); ?>"></div>
        </div>
    </div>
    <a href="#" class="contact" data-id="<?php echo $current_item->value('ID'); ?>">
        <span><?php echo $current_item->value('prenom') . ' ' . $current_item->value('nom'); ?></span>
        <strong><?php echo $current_item->value('job'); ?></strong>
    </a>
</article>
<!-- #post-## -->
