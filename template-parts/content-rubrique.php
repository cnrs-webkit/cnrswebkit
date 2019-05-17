<?php
/**
 * The template part for displaying single rubriques
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */
$current_item = new CnrswebkitRichData(get_the_ID());
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('page-rubrique'); ?>>
    <?php cnrswebkit_post_thumbnail(); ?>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->
    <?php if ($current_item->value('chapo')) {echo text_to_html($current_item->value('chapo'), 'p');} ?>
    <div class="entry-content">
        <?php
        the_content();
        ?>
        <?php
        $args = array(
            'sort_order' => 'asc',
            'sort_column' => 'post_title',
            'hierarchical' => 1,
            'exclude' => '',
            'include' => '',
            'meta_key' => '',
            'meta_value' => '',
            'authors' => '',
            'child_of' => 0,
            'parent' => get_the_ID(),
            'exclude_tree' => '',
            'number' => '',
            'offset' => 0,
            'post_type' => 'page',
            'post_status' => 'publish'
        );
        $pages = get_pages($args);
        foreach ($pages as $page) {
            include(locate_template('loops/loop-rubrique.php'));
        }
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->
