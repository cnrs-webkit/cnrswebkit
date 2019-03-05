<?php
/**
 * The template for displaying list of Contacts
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 1.0
 * 
 * Template Name: Contacts list
 */
get_header();
//require_once( get_template_directory() . '/inc/ajax.php' ); 
?> 
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header><!-- .entry-header -->
            <div class="entry-content">
                <?php
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
                $_SESSION['lettre_contact'] = false;
                $contact_data = new CnrswebkitPageItemsList('contact');
                echo $contact_data->get_html_filters('contact');
//                echo $contact_data->get_pagination();
                ?>
                <div id="contact_ajax_container" class="loop-contents loop-contents-contact">
                    <?php
                    echo $contact_data->get_html_item_list();
                    ?>
                </div>
                <div class="moreContacts"><a page="1" target="#contact_ajax_container">Afficher plus de contacts</a></div>
                <script>
                    (function ($) {
                        if (hideLoadMore) {
                            $('.moreContacts').hide();
                        }
                    })(jQuery);
                </script>
                <?php
//                echo $contact_data->get_pagination();
                display_bottom_partenaires();
                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-## -->
    </main><!-- .site-main -->
    <?php get_sidebar('content-bottom'); ?>
</div><!-- .content-area -->
<!-- start popin -->
<div id="popinOverlay"><div id="popinContainer"></div></div>
<!-- end popin -->
<?php get_sidebar(); ?>  
<?php get_footer(); ?>
