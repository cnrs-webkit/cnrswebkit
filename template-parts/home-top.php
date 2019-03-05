<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="homeLabo">
    <div class="laboThumb"><?php echo get_the_post_thumbnail($post_id, 'cnrsmediatheque-size'); ?></div>
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







<!-- TODO C. SEGUINOT What's that stuff ????
<div id="pg-12-0" class="panel-grid panel-no-style"><div id="pgc-12-0-0" class="panel-grid-cell"><div id="panel-12-0-0-0" class="so-panel widget widget_sow-image panel-first-child panel-last-child" data-index="0"><div class="imgHome panel-widget-style panel-widget-style-for-12-0-0-0"><div class="so-widget-sow-image so-widget-sow-image-default-813df796d9b1">

<div class="sow-image-container">
<?php //echo get_the_post_thumbnail( $post_id, 'cnrsmediatheque-size' );  ?>
</div>

</div></div></div></div><div id="pgc-12-0-1" class="panel-grid-cell"><div id="panel-12-0-1-0" class="so-panel widget widget_sow-editor panel-first-child panel-last-child" data-index="1"><div class="txtHome panel-widget-style panel-widget-style-for-12-0-1-0"><div class="so-widget-sow-editor so-widget-sow-editor-base"><h3 class="widget-title">
<?php //echo get_bloginfo( 'name' ); ?>.
                </h3>
<div class="siteorigin-widget-tinymce textwidget">
        <p>
<?php //echo $cnrs_global_params->field('presentation_du_site');  ?>
        </p>
<p><img class="alignnone wp-image-399" src="https://cnrs.civibox.fr/wp-content/uploads/2017/10/Partenaires-Logo-Universite-de-Pau-Pays-de-lAdour-300-001-1.jpg" alt="" width="150" height="75" srcset="https://cnrs.civibox.fr/wp-content/uploads/2017/10/Partenaires-Logo-Universite-de-Pau-Pays-de-lAdour-300-001-1.jpg 300w, https://cnrs.civibox.fr/wp-content/uploads/2017/10/Partenaires-Logo-Universite-de-Pau-Pays-de-lAdour-300-001-1-200x100.jpg 200w" sizes="(max-width: 150px) 85vw, 150px"><img class="alignnone wp-image-398" src="https://cnrs.civibox.fr/wp-content/uploads/2017/10/Partenaires-Logo-Universite-Aix-Marseille-300-001-1.jpg" alt="" width="150" height="75" srcset="https://cnrs.civibox.fr/wp-content/uploads/2017/10/Partenaires-Logo-Universite-Aix-Marseille-300-001-1.jpg 300w, https://cnrs.civibox.fr/wp-content/uploads/2017/10/Partenaires-Logo-Universite-Aix-Marseille-300-001-1-200x100.jpg 200w" sizes="(max-width: 150px) 85vw, 150px"><a href="/le-laboratoire/">En savoir plus</a></p>
</div>
</div></div></div></div></div>
-->
