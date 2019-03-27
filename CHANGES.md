#### [To appear in next release]

#### Version 0.4.x

##### Added feature, template, functionalities
 * New : le kit propose à présent un widget actualité (News's list) affichant les dernières actualités 
 * New : le kit propose à présent un widget événements (event's list) affichant les dernièrs évéements 
 * Add missing wp-color-picker enqueuing in /inc/inc-pages-functions.php
 * Add missing admin_script.js dependancy to wp-color-picker in /inc/inc-pages-functions.php
 * Improve filters: can use as many and any of existing taxonomy (see settings in pods menu)
 * function record_GET_filters() Sanitized for preventing SQL injection !!
 * Make cnrs_breadcrumb pluggable for possible override it in child theme
 * All template with or whitout sidebar  (parameter in template settings + additionnal templates)
 * Partenaires du laboratoire : déplacé dans le footer pour s'adapter aux page avec/sans sidebar
 * New : Tutelles du laboratoire à renseigner dans le réglage du thème (en plus des partenaires du labo)
 * New : Mini Logos des partenaires dans le header à renseigner dans le réglage du thème (affichage sous le logo du laboratoire)
 * new : text-align can be set (left or justify) in template settings  
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
 * Ajout du réglale page tutelles et partenaires
 * Lien "en savoir plus sur nos tutelles" /partenaires était codé en dur
 * Lien "en savoir plus sur nos tutelles" supprimé de la page tutelles
 * section partenaires de l'événement était commentée,
 * section partenaires du laboratoire affichait tous les partenaires  (pas ceux de la sélection dans réglage du thème) !! 
  * le message "partenaires" au desus des logos est remplacé par le libellé du pods, ou sa traduction dans les pods
 * suppression affichage des partenaires du labo SI l'événement a aussi des partenaires. (si 2 listes cela prête à confusion)
 * déplacement du lien 'En savoir plus' avant les logo partenaires sur la page d'accueil (homepage.php)
 * removed unused comment // require_once( get_template_directory() . '/inc/ajax.php' ); 
 * removed undefined theme parameter : $display_header_text = bloginfo('display_header_text')
 * le thème utilise à présent le logo défini dans l'admin (auparavant : /assets/img/kitweb.png !!
 * removed unnecessary style in cnrswebkit_header_style (site-branding .site-title, .site-description) 
 * ajout de l'affichage conditionnel du slogan get_bloginfo('description', 'display');

 * Masquage de la version de  WordPress, car elle donne des informations aux hackers  (conseil Acunetix)  
 * Nombre de partenaires du laboratoire n'est plus limité à 5!  
 * NEW : fonction cnrswebkit_credits() créée, surchargeable dans le thème enfantpour afficher la ligne crédits... dans le bas de footer
 * New : Tutelles du laboratoire à renseigner dans le réglage du thème (en plus des partenaires du labo)
 * New : Mini Logos des partenaires dans le header à renseigner dans le réglage du thème (affichage sous le logo du laboratoire)

 * new : text-align can be set (left or justify) in template settings
 * new : parent style.css is loaded even when a child theme is used  
 * Add missing templates: page whitout sidebar,  page with sidebar
 * Affichage conditionnel du titre et du slogan du laboratoire seulement s'ils existent
 * Page actualité: lien ne respectant pas la couleur définie dans le thème
 * Sitemap: ajout de div autour des items (filter) , ajout de css pour sitemap sur 2 colonnes
 
                  
 

##### CSS changes  
 * page rubriques (par exemple /le-laboratoire/
  * "vignette" ajustée (taille dépassait l'écran), 
 * CSS : cleaning and removing unused style : post-thumbnail 
 * ajout id et classes au menu principal 'menu_id' => 'menu-menu-principal','container_class' => 'menu-menu-principal-container' pour styler en css
 * ajout id et classes au menu secondaire 'menu_id' => 'menu-menu-secondaire', 'container_class' => 'menu-menu-secondaire-container',   
 

                       
  
##### removed from theme
 * commented unusefull code in /template-parts/home-top.php
 

#### Version 0.3 (2018 Nov. 1)
* This was the original cnrswebkit developped by  ATOS 
