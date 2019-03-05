<?php
$current_page = new CnrswebkitRichData($page->ID);
?>
<!-- start loop rubrique -->
<a href="<?php echo get_page_link($page->ID); ?>" class="basePage">
    <h2><?php echo $page->post_title; ?></h2>
    <span><?php echo $current_page->value('chapo'); ?></span>
</a>
<!-- end loop rubrique -->
