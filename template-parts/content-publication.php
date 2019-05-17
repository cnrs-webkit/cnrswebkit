<?php
/**
 * The template part for displaying single post Publication
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */
?>
<?php
$current_item = new CnrswebkitRichData(get_the_ID());

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->
    <div class="entry-content">
        <div class="leftCol">
            <div class="article-chapo"><?php echo $current_item->value('chapo'); ?></div>
            <?php
            the_content();
            ?>
        </div>
        <div class="rightCol">
            <?php echo get_the_post_thumbnail($current_item->value('ID'), 'cnrsloop-size'); ?>
        </div>
        <?php 
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
                $url = wp_get_attachment_url($one_dnld['ID']);
                $ext_link = '<a href="' . $url . '">';
                if ($one_dnld['post_title'] != '') {
                    $ext_link .= $one_dnld['post_title'];
                } else {
                    $ext_link .= $url;
                }
                $ext_link .= ' </a>';
                $pub_link[] = $ext_link;
            }
            echo implode(' | ', $pub_link);
        }
        
        ?>
        
    </div><!-- .entry-content -->
    <footer class="entry-footer">
        <?php cnrswebkit_entry_meta(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
