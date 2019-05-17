<?php
/**
 * The template used for displaying page content
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */
$current_item = new CnrswebkitRichData(get_the_ID());
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php cnrswebkit_post_thumbnail(); ?>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->
    <?php echo text_to_html($current_item->value('chapo'), 'p'); ?>
    <div class="entry-content">
        <?php
        the_content();
        ?>
        <?php
        if (is_page() && $post->post_parent) {
            $args = array(
                'sort_order' => 'asc',
                'sort_column' => 'post_title',
                'hierarchical' => 1,
                'exclude' => get_the_ID(),
                'include' => '',
                'meta_key' => '',
                'meta_value' => '',
                'authors' => '',
                'child_of' => 0,
                'parent' => $post->post_parent,
                'exclude_tree' => '',
                'number' => 3,
                'offset' => 0,
                'post_type' => 'page',
                'post_status' => 'publish'
            );
            $pages = get_pages($args);
            ?>
            <div class="voirAussi">
                <h2><?php _e('See others ', 'cnrswebkit'); echo '&laquo;' . get_the_title($post->post_parent) . '&raquo;'; ?></h2>
                <?php
                foreach ($pages as $page) {
                    include(locate_template('loops/loop-rubrique-bottom.php'));
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->
