<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="homeLabo">
    <div class="laboThumb"><?php echo get_the_post_thumbnail($post->ID, 'cnrsmediatheque-size'); ?></div>
    <div class="laboInfo">
        <div class="umi"><?php echo $cnrs_global_params->field('code_du_laboratoire'); ?></div>
        <h3><?php echo get_bloginfo('name'); ?></h3>
        <p><?php echo $cnrs_global_params->field('presentation_du_site'); ?></p>
        <div class="bottomLabo">
            <div>
                <?php
                display_labo_partenaires($cnrs_global_params);
                ?>
            </div>
            <a href="/le-laboratoire/"><?php _e('En savoir plus', 'cnrswebkit') ?></a>
        </div>
    </div>
</div>
