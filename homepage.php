<?php
/**
 * Template Name: CNRS WebKit homepage
 *
 * The default template for displaying the Homepage
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 * 
 */

get_header();
?> 
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php // No title, we use lab title there in home-top.php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header><!-- .entry-header -->
            <div class="entry-content">
                <?php
                include(locate_template('template-parts/home-top.php'));
                // Affichage des actualités //
                if ($cnrs_global_params->field('actualites_sur_la_page_daccueil')) {
                    $custom_params = new CnrswebkitStdListParams();
                    $custom_params->where = [
                        'key' => 'a_la_une',
                        'value' => 1,
                        'compare' => '='
                    ];
                    $custom_params->limit = $cnrs_global_params->field('nombre_dactualites_page_daccueil');
                    if (0 === $custom_params->limit ) {
                        $custom_params->limit = -1;
                    }
                    $actualite_data = new CnrswebkitPageItemsList('actualite', $custom_params);
                    if ($actualite_data->has_items()) {
                        $url = get_pod_page('pageliste_actualite');
                        $page_link = '';
                        if ($url) {
                            $page_link = '<a class="linkAllActus" href="' . $url . '">' . __( 'See All news', 'cnrswebkit' ) . '</a>';
                        }
                        ?>
                        <div class="actuHeader"><h3 class="actuTitle">Les Actualités</h3><?php echo $page_link; ?></div>
                        <div class="loop-contents loop-contents-actualite">
                        <?php
                        echo $actualite_data->get_html_item_list();
                        ?>
                    	</div>
                        <?php
                    }
                }

                // Affichage de l'agenda
                if ($cnrs_global_params->field('agenda_sur_la_page_daccueil')) {
                    display_bottom_evenements();
                }
                // Affichage des téléchargements
                if ($cnrs_global_params->field('telechargements_sur_la_page_daccueil')) {
                    if ($cnrs_global_params->field('fichiers_telechargements_page_daccueil') ) {
                        ?> 
                    <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <h3 class="widget-title titleDL"><?php _e('Downloadable documents', 'cnrswebkit')?></h3>
                    </div>
                    <div class="home-downloads">
                        <?php
                            foreach ($cnrs_global_params->field('fichiers_telechargements_page_daccueil') as $one_dnld) {
                                $url = wp_get_attachment_url($one_dnld['ID']);
                            ?>
                            <div class="itemDL">
                                <span class="icon-folder"></span>
                                <span><?php echo $one_dnld['post_title']; ?></span>
                                <strong><?php echo get_file_size_from_url($url); ?>Mo</strong>
                                <a href="<?php echo $url; ?>"><?php _e('Download', 'cnrswebkit') ?></a>
                            </div>
                            <?php
                            }

                        ?>
                    </div>
                    <?php
                    }
                }

                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-## -->
    </main><!-- .site-main -->
    <?php get_sidebar('content-bottom'); ?>
</div><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
