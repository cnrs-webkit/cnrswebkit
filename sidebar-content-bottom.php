<?php
/**
 * The template for the content bottom widget areas on posts and pages
 *
 * @package Atos
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 1.0
 */
if (!is_active_sidebar('sidebar-2') && !is_active_sidebar('sidebar-3')) {
    return;
}

// If we get this far, we have widgets. Let's do this.
global $cnrs_global_params;
if ($cnrs_global_params->field('newsletter_sur_la_page_daccueil')) {
    ?>
    <!-- Start Actus Widget -->
    <div id="NewsletterRegistration">Tenez-vous au courant de l'actualité
        <span id="NewsletterResult"></span>
        <div>
            <form method="post" action="?na=s" onsubmit="return newsletter_check(this)">
                <input type="email" placeholder="Adresse E-mail" name="ne" required />
                <button type="submit">inscription</button>
            </form>
        </div>
    </div>
    <?php
}
?>
<!-- End Actus Widget -->
<aside id="content-bottom-widgets" class="content-bottom-widgets" role="complementary">
    <?php if (is_active_sidebar('sidebar-2')) : ?>
        <div class="widget-area">
            <?php dynamic_sidebar('sidebar-2'); ?>
        </div><!-- .widget-area -->
    <?php endif; ?>

    <?php if (is_active_sidebar('sidebar-3')) : ?>
        <div class="widget-area">
            <?php dynamic_sidebar('sidebar-3'); ?>
        </div><!-- .widget-area -->
    <?php endif; ?>
</aside><!-- .content-bottom-widgets -->
