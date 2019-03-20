<?php
/**
 * Template Name: CNRS WebKit list of contact
 * Template Post Type: post, page
 *
 * The template for displaying a list of contact
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 1.0
 * 
 */

// Translators: Template Name translation.
__('CNRS WebKit list of contact', 'cnrswebkit');

global $cnrs_global_params;
$sidebar = $cnrs_global_params->field('liste_contacts_with_sidebar');

if (! $sidebar){
    add_filter( 'body_class', 'add_no_sidebar_class' );
}

get_header();
// TODO next line commented in V0.3! Is ajax useful?? 
// require_once( get_template_directory() . '/inc/ajax.php' );  
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
                    if ($contact_data->has_items() ) {
                        echo $contact_data->get_html_item_list();
                    } else {
                        echo '<br/><p>'. __('There is currently no person in the present list', 'cnrswebkit') . '</p>';
                    }
                    ?>
                </div>
                <div class="moreContacts"><a page="1" target="#contact_ajax_container">Afficher plus de contacts</a></div>
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
<?php 
if ( $sidebar ){
    get_sidebar();
}

get_footer(); 

