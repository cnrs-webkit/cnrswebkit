<?php
/**
 * The template part for displaying loops of Publication
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 1.0
 * 
 * Loop Name: Boucle d'actualités
 */
?>
<article id="post-<?php echo $current_item->value('ID'); ?>" <?php post_class([$current_item->value('post_type')], $current_item->value('ID')); ?>>
    <div><?php echo get_the_post_thumbnail($current_item->value('ID'), full); ?></div>
    <div>
        <header class="entry-header">
            <div class="authorsPub"><?php echo $current_item->value('auteur'); ?></div>
            <h1 class="entry-title"><?php echo $current_item->value('post_title'); ?></h1>
        </header><!-- .entry-header -->
        <div class="entry-content">
            <p><?php echo $current_item->value('chapo'); ?></p>
            <?php if ($current_item->value('lien') != '' || $current_item->value('fichier_telechargeables') || $current_item->value('description') != '') { ?>
                <div class="knowMorePub">
                    <?php
                    if ($current_item->value('description') != '') {
                        ?>
                        <p class='pubdescription'><?php echo $current_item->value('description'); ?></p>
                        <?php
                    }
                    $pub_link = [];
                    if ($current_item->value('lien') != '') {
                        ?>
                        <?php _e('Export this reference', 'cnrswebkit') ?> : 
                        <?php
                        $ext_link = '<a href="' . $current_item->value('lien') . '">';
                        if (trim($current_item->value('intitule_du_lien')) != '') {
                            $ext_link .= $current_item->value('intitule_du_lien');
                        } else {
                            $ext_link .= $current_item->value('lien');
                        }
                        $ext_link .= ' </a>';
                        echo $ext_link;
                    }
                    if (is_array($current_item->value('fichier_telechargeables'))) {
                        foreach ($current_item->value('fichier_telechargeables') as $one_dnld) {
                            $ext_link = '<a href="' . $one_dnld['guid'] . '">';
                            if ($one_dnld['post_title'] != '') {
                                $ext_link .= $one_dnld['post_title'];
                            } else {
                                $ext_link .= $one_dnld['guid'];
                            }
                            $ext_link .= ' </a>';
                            $pub_link[] = $ext_link;
                        }
                        echo implode(' | ', $pub_link);
                    }
                    ?>
                </div>
                <a href="javascript:void(0);" class="knowMorePubLink" target="_blank"><?php _e('En savoir plus', 'cnrswebkit') ?></a>
            <?php } ?>
        </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->

