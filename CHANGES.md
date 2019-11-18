#### [To appear in next release]
 * Fix : PHP v7.2 bug 
 
#### Version 0.4.3

 * Fix : template-parts/content-publication.php ajouté, et corrigé (c'était une copie de content-evenement.php !)
 * Fix : lien sur les publications manquant
 * Fix : tutellescontainer: ajout border left 
 * Fix : remplacement de guid par wp_get_attachment_url($one_dnld['ID']) bug affichage des tailles des fichiers à télécharger
 * Fix : Downloadable documents s'affiche même si pas de documents

#### Version 0.4.2
 * Depuis la version 0.4.2, le theme CNRS WebKit Propose les mises à jour disponibles dans l'administration de Wordpress. 
 
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
 * new : text-align can be set (left or justify) in template customization
 * new : "date de fin de publication" alias "date d'expiration" au dela de laquelle les actualités et emplois ne sont plus listés sur le site web.  
 - new : Tous les pods définis pour les contact (annuaire) s'affichent désormais sur la page annuaire
 - new : le nombre d'items des listes actualités, contact, événement peut être illimité en choississant 0 comme limite
 - new : Wordpress customizer is now functional
 
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
 * Notice: Use of undefined constant full - assumed 'full' in /wp-content/themes/cnrswebkit/loops/loop-publication.php on line 13
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
 * Pages emploi () l’email du contact est à présent au format des autres liens
 * Notice: Undefined variable: liste_evenement_url in template-parts/bottom-emploi.php on line 15
 * Warning: filesize()sur téléchargement: erreur due à guid des documents incorrects (modifiés dans base de données)
 * Ajout du réglale page tutelles et partenaires
 * Liens ("en savoir plus sur nos tutelles" et d'autres...)   était codé en dur
 * Lien "en savoir plus sur nos tutelles" supprimé de la page tutelles
 * section partenaires de l'événement était commentée,
 * section partenaires du laboratoire affichait tous les partenaires  (pas ceux de la sélection dans réglage du thème) !! 
  * le message "partenaires" au desus des logos est remplacé par le libellé du pods, ou sa traduction dans les pods
 * suppression affichage des partenaires du labo SI l'événement a aussi des partenaires. (si 2 listes cela prête à confusion)
 * déplacement du lien 'En savoir plus' avant les logo partenaires sur la page d'accueil (homepage.php)
 * removed unused comment // require_once( get_template_directory() . '/inc/ajax.php' ); 
 * removed undefined theme parameter : $display_header_text = bloginfo('display_header_text')
 * le thème utilise à présent le logo défini dans l'admin (auparavant : /assets/img/kitweb.png !!
 * ajout de l'affichage conditionnel du slogan et/ou du titre s'ils sont vide(s)
 * Bouton "afficher le titre et le slogan du site" réactivé

 * Masquage de la version de  WordPress, car elle donne des informations aux hackers  (conseil Acunetix)  
 * Nombre de partenaires du laboratoire n'est plus limité à 5!  
 * NEW : fonction cnrswebkit_credits() créée, surchargeable dans le thème enfantpour afficher la ligne crédits... dans le bas de footer
 * New : Tutelles du laboratoire à renseigner dans le réglage du thème (en plus des partenaires du labo)
 * New : Mini Logos des partenaires dans le header à renseigner dans le réglage du thème (affichage sous le logo du laboratoire)

 * new : text-align can be set (left or justify) in template c
 * new : parent style.css is loaded even when a child theme is used  
 * Add missing templates: page whitout sidebar,  page with sidebar
 * Affichage conditionnel du titre et du slogan du laboratoire seulement s'ils existent
 * Page actualité: lien ne respectant pas la couleur définie dans le thème
 * Sitemap: ajout de div autour des items (filter) , ajout de css pour sitemap sur 2 colonnes
 * new : pods fields used in "theme settings" can be automatically reordered by the plugin (new CNRS Webkit menu)
 * Actualite: change wrong fonts ('Lora')
 * add parameter to hide author (ou config Wordpress ?? )
 * Evénements sur la page d'accueil affiche à présent tous les événements dont date_de_fin>=aujourd'hui)  
- [ ] "partenaire sur page d'accueil" déplacés dans le footer comme pour les autres pages (sinon situé au dessus des actualités et des événements!! 
* devient inutile.   
 * Fix : Si polylang est utilisé, les pages pointées par les pods (dans réglage du thème) ne sont pas trouvées si elles ne sont pas traduites.
 * Fix : la désactivation de Pods bloque Wordpress en admin etFrontend si le theme CNRS Webkit est activé
 * Fix : largeur des fenêtres next events, newsletter registration... empiète sur sidebar. 
 * Styling : contenu événement est à présent sur 2 colonnes
 * Bug : Fichiers /css/style-lmo.css contient paramètres inutilisables $black et  $mainColor;
 * homepage "En savoir plus" remplacé par texte plus explicite "En savoir plus sur le laboratoire"
 * Fix : Pagination show for Single page : Pods issue: https://github.com/pods-framework/pods/issues/5184
 * New : when sidebar is empty, content adjust to full size 
 * CSS: mise en forme de la section pagination (pages actualités, emplois, ...)
 * Résultat de la recherche: mise en page améliorée
 * Message pour liste vide (actualités, agenda...) modifié si la liste est filtrée. 
 * added missing translation (echo 'blabla';)
 * All existing translation string are now in english (some were in french) Ready for translation (.pot refactored)
 * Add if ( !defined( 'ABSPATH' ) ) exit; on each php code (not templates)
 * fontes Google peu utiles, souvent urchargées par Roboto supprimées: Merriweather Montserrat et Inconsolata
 * lien pour l'installation du plugin pods si manquant 
 * is_plugin_active('newsletter') need include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
 * Undefined index: date_month in /cnrswebkit/inc/inc-pages-functions.php on line 637
 * Default pods values are now set at theme install (so that template can be used whitout saving settings first)
 * template inutilisé supprimé : content-publication
 * rename slug nombre_dactualites_page_actualite to nombre_dactualites_page_actualite (typo in Atos version)
 * Modification du fichier screenshot.png illustrant le thème 
 * suppression de quelques champs 'à la une' inutiles (emploi, mediatheque, publication)
 * Emplois: il existe un champ "type de poste" (supprimé) et une typologie d'emploi aussi redondant
 * Menu permettant d'ajouter aux pods les nouvelles traductions du theme CNRSWebkit 
 * affichage du champ "publication end date" actualités et emplois dans l'administration (pour faciliter la gestion des contenus)
  * Modification de la gestion de la personnalisation (Wordpress customizer) , à présent fonctionnelle
  * image de fond (background-image) est à présent fonctionnelle
  * Couleur des liens à présent fonctionnelle (sauf en preview)
  * Ajout du paramétrage de l'alignement des textes dans la personalisation
 * commented unusefull code in /template-parts/home-top.php
 * page rubriques (par exemple /le-laboratoire/
  * "vignette" ajustée (taille dépassait l'écran), 
 * CSS : cleaning and removing unused style : post-thumbnail 
 * ajout id et classes au menu principal 'menu_id' => 'menu-menu-principal','container_class' => 'menu-menu-principal-container' pour styler en css
 * ajout id et classes au menu secondaire 'menu_id' => 'menu-menu-secondaire', 'container_class' => 'menu-menu-secondaire-container',   


#### Version 0.3 (2018 Nov, package v1.02 and v1.03)
* This was the original cnrswebkit developped by  ATOS 
