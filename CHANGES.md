#### [To appear in next release]

##### Added feature, template, functionalities
 * New : le kit propose à présent un widget actualité (News's list) affichant les dernières actualités 
 * New : le kit propose à présent un widget événements (event's list) affichant les dernièrs évéements 
 * Add missing wp-color-picker enqueuing in /inc/inc-pages-functions.php
 * Add missing admin_script.js dependancy to wp-color-picker in /inc/inc-pages-functions.php
 * Improve filters: can use as many and any of existing taxonomy (see settings in pods menu)
 * function record_GET_filters() Sanitized for preventing SQL injection !!
 * Make cnrs_breadcrumb pluggable for possible override it in child theme
 * All template with or whitout sidebar  (parameter in template settings + additionnal templates)
 * 
 * 
 *  
 
##### Fixed bugs, errors 
 * Notice: Undefined variable: post_id ../template-parts/home-top.php on line 10
 * Notice: Use of undefined constant thumb - in loop-bottompartenaire.php loop-partenaire.php and looplabopartenaire.php
 * Notice: Use of undefined constant this - in /inc/inc-pages-functions.php. A constructor should not explicitly return something 
 * Notice: Use of undefined constant relation - in inc-pages-functions.php /template-parts/bottom-evenement.php and cnrs-ajax.php: replaced by 'relation' !
 * ini_set("display_errors", 0); was used inc-pages-functions.php : removed, this must be set in config.php, not here !! 
 * Notice: Undefined index: categorie_actualites in /inc/inc-pages-functions.php :code removed 
 * Notice: Undefined index: typologie_actualites in /inc/inc-pages-functions.php :code removed
 * error: $date_month replaced by $_SESSION['date_month'] in /inc/inc-pages-functions.php
 * Trying to get property of non-object in /inc/inc-pages-functions.php :code removed 
 * Error: list parents in reverse order in breadcrumb
 * Missing: Add "related page" slug in breadcrumbs whenever title differs from related page title
 * javascript error SyntaxError: '' string literal contains an unescaped line break: put tile inside ``
 * wp_enqueue_script est appelée de la mauvaise manière...
 * erreur: Chargement des styles admin, voir http://kit-web.cnrs.fr/forums/topic/erreur-admin-chargement-styles/
 * Bug : some admin pages use wp-color-picker which is not loaded by the theme
 * Bug : Newsletter registration form action was "https://cnrs.civibox.fr/?na=s" !! 
 * Error: remove of "do_shortcode( '[TheChamp-Sharing]' )" since "Super Socializer" plugin is not used nor installed
 * remove "htmlPopin += obj.share;" since "Super Socializer" plugin is not used nor installed
 * événements : lien vers « Add to calendar » brisé !!!
 * [newsletter form="1"] dans le contenu de la page /newsletter génère un warning 
 * Warning: Illegal string offset 'form_1' sur la page /Newsletter
 * Undefined index: name in /cnrswebkit/template-parts/content-emploi.php on line 13
 * URL Télécharger la fiche de l'offre  d'emploi BROKEN 
 * Notice undefined index name pour "typologie_emploi" ET "duree_du_poste" in content-emploi.php
 * Notice Undefined index: name in loop-bottomemploi.php
 * Notice: Use of undefined constant relation /bottom-evenement.php 
 * Notice: Use of undefined constant full - assumed 'full' in /home/seguinot/Documents/www/wp_ircica_v0.3/wp-content/themes/cnrswebkit/loops/loop-publication.php on line 13
 * Vignettes, thumbnail : not displayed (commented in PHP), no css applied (too large, center...) (in most templates)
 * Vignettes, thumbnail : add_image_size('cnrspost-thumbnail-size', 200, 9999);  (in most templates)
 * Vignettes, thumbnail : moved before header, floated right.   (in most templates)
 * Empty post_content = '0' on 18 post !!
 * Secondary menu not displayed if primary menu don't exist
 * Newsletter subscription removed when newsletter plugin not used (not activated)
 * error cnrs-ajax.js: le lien "Afficher plus d'évènements" est masqué après le premier clic
 * content-evenement stylesheet not loaded (wrong uri) 
 * content-evenement replace non working submit button on event form (add to calendar)
 * content-evenement removed eventDateHeader above title
 * Add CSRF protection to search form (searchform.php)
 * Add "no item"  message to list templates when list is empty
   * template publication.php, template contact.php, template actualite.php, 
   * template-rubrique.php, template mediatheque.php, template agenda.php:,
 * $custom_script duplicated on events and contacts pages 
 * "display more" events publication and news are now hidden for empty list
 * all custom post type now have templates with or without sidebar  
 * Add missing "template name" and translation for all "template name"
 * Add missing <?php get_sidebar(''); ?> in some default tremplates
 * Add 'menu_id' and 'container_class' to  'menu-menu-principal-container',
 * Style sheet : remove 2 unsused  files /css/cnrs_dyn.scss /library/cnrs_dyn_.scss 
 * New : Prepare theme for versioning, upgrade
 * New : Upgrade will automatically add new settings (pods: réglage du thème)
 * New : All template with or whitout sidebar  (parameter in template settings)
 * Pages emploi () l’email du contact est à présent au formar des autres Uliens
 * Notice: Undefined variable: liste_evenement_url in template-parts/bottom-emploi.php on line 15
 * Warning: filesize()sur téléchargement: erreur due à guid des documents incorrects (modifiés dans base de données)
 
 
 
 
 

                       
  
##### removed from theme
 * commented unusefull code in /template-parts/home-top.php
 

#### Version 0.3 (2018 Nov. 1)
* This was the original cnrswebkit developped by  ATOS 
