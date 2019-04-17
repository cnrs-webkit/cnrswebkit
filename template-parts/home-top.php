<?php
/*
 * Template used to display labs partners on homepage, after content and before news
 * this template is not used in footer
 */
?>

<div class="homeLabo">
    <div class="laboThumb"><?php echo get_the_post_thumbnail($post->ID, 'cnrsmediatheque-size'); ?></div>
    <div class="laboInfo">
        <div class="umi"><?php echo $cnrs_global_params->field('code_du_laboratoire'); ?></div>
        <h3><?php echo get_bloginfo('name'); ?></h3>
        <p><?php echo $cnrs_global_params->field('presentation_du_site'); ?></p>
        <?php  
        $page_labo_url= get_permalink($cnrs_global_params->field('page_labo')['ID']);
        
        if ($page_labo_url) {
            echo '<div class="bottomLabo"><a href="'. $page_labo_url . '">' . __('Learn more about our laboratory &hellip;', 'cnrswebkit') . '</a></div>';
        }
        ?>
        <div class="bottomLabo">
            <div>
                <?php
                // TODO supprimer cette div (bottomLabo") dans les prochaines version  si non réactivé
                // display_labo_partenaires($cnrs_global_params);
                ?>
            </div>
            
        </div>
    </div>
</div>
