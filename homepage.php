<?php
/**
 * The template for displaying the Homepage
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 1.0
 * 
 * Template Name: Website homepage
 */
get_header();
//require_once( get_template_directory() . '/inc/ajax.php' ); 
?> 
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php //the_title('<h1 class="entry-title">', '</h1>'); ?>
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
                    $actualite_data = new CnrswebkitPageItemsList('actualite', $custom_params);
                    if ($actualite_data->has_items()) {
                        ?>
                        <div class="actuHeader"><h3 class="actuTitle">Les Actualités</h3><a href="/les-actualites/" class="linkAllActus"><?php _e('See All news', 'cnrswebkit') ?></a></div>
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
                    ?> 
                    <div class="so-widget-sow-editor so-widget-sow-editor-base">
                        <h3 class="widget-title titleDL">Téléchargements</h3>
                    </div>
                    <div class="home-downloads">
                        <?php
                        foreach ($cnrs_global_params->field('fichiers_telechargements_page_daccueil') as $one_dnld) {
                            // TODO Warning: filesize(): stat failed for /home/seguinot/Documents/www/wp_ircica_v0.3/kitwebWP/wp-content/uploads/2018/02/RA_CNRS2016_complet_BD.pdf
                            // in /home/seguinot/Documents/www/wp_ircica_v0.3/wp-content/themes/cnrswebkit/inc/inc-pages-functions.php on line 841
                            // var_dump($one_dnld);
                            //  ["guid"]=> string(100) "http://dircomnas1.auteuil.cnrs-dir.fr/kitwebWP/wp-content/uploads/2018/02/RA_CNRS2016_complet_BD.pdf"
                            
                            ?>
                            <div class="itemDL">
                                <span class="icon-folder"></span>
                                <span><?php echo $one_dnld['post_title']; ?></span>
                                <strong><?php echo get_file_size_from_url($one_dnld['guid']); ?>Mo</strong>
                                <a href="<?php echo $one_dnld['guid']; ?>"><?php _e('Download', 'cnrswebkit') ?></a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }

                // Affichage de l'agenda
                if ($cnrs_global_params->field('partenaires_sur_la_page_daccueil')) {
                    display_bottom_partenaires();
                }
                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-## -->
    </main><!-- .site-main -->
    <?php get_sidebar('content-bottom'); ?>
</div><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
