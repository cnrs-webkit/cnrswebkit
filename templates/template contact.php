<?php
/**
 * Template Name: CNRS WebKit list of contact
 * Template Post Type: post, page
 *
 * The template for displaying a list of contact
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 * 
 */

// Translators: Template Name translation.
__('CNRS WebKit list of contact', 'cnrswebkit');


$sidebar = "1" === $cnrs_global_params->field('liste_contacts_with_sidebar');

if (! $sidebar){
    add_filter( 'body_class', 'add_no_sidebar_class' );
}

get_header();
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
                echo $contact_data->get_pagination();
                ?>
                <div id="contact_ajax_container" class="loop-contents loop-contents-contact">
                    <?php
                    if ($contact_data->has_items() ) {
                        echo $contact_data->get_html_item_list();
                    } else {
                        if ($cnrs_webkit_list_filtered) {
                            echo '<br/><p>'. __('There is no person in the present filtered list', 'cnrswebkit') . '</p>';
                        } else {
                            echo '<br/><p>'. __('There is currently no person in the present list', 'cnrswebkit') . '</p>';
                        }
                    }
                    ?>
                </div>
                <?php if ($contact_data->limit()>1) { ?>
                <div class="moreContacts"><a page="1" target="#contact_ajax_container"><?php _e('Display more contacts','cnrswebkit');?></a></div>
                <?php
                    }
                echo $contact_data->get_pagination();
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

