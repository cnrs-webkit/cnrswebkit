<?php
$current_page = new CnrswebkitRichData($page->ID);
?>
<!-- start loop rubrique -->
<a href="<?php echo get_page_link($page->ID); ?>" class="vaItem">
    <strong><?php echo get_the_title($page->ID); ?></strong>
    <span><?php echo $current_page->value('chapo'); ?></span>
</a>
<!-- end loop rubrique -->
