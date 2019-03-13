## cnrswebkit TODO list

#### Other tasks
- [ ] corriger tous les bugs de la version 0.3
- [ ] Apporter quelques améliorations indispensables
- [ ] constituer un ensemble de paramètres par défaut (pods...) installable (pour utiliser le kit)
- [ ] Constituer un contenu (page média...) téléchargeable pour tester le kit sans disposer de contenu initial
- [ ] Rendre le thème upgradable à partir de GitHub
- [ ] Proposer un thème enfant par défaut
- [ ] apply Worpdress coding standard
- [ ] traductions

### Liste des bugs et améliorations à apporter
Cette liste est la concaténation de l'ensemble des observations faites sur le forum. Certaines items peuvent être redondants car la liste n'a pas été ni structurée ni priorisée. 
Au fur et à mesure des corrections par les développeurs, cette liste sera épurée. 

- [ ] wp_enqueue_script est appelée de la mauvaise manière. Les scripts et les styles ne peuvent pas être enregistrés ou ajoutés avant le déclenchement des crochets <code>wp_enqueue_scripts</code>, <code>admin_enqueue_scripts</code> ou <code>login_enqueue_scripts</code>. Veuillez lire <a href="https://codex.wordpress.org/fr:Débogage_dans_WordPress">Débogage dans WordPress</a> (en) pour plus d’informations. (Ce message a été ajouté à la version 3.3.0.) in /home/seguinot/Documents/www/CNRS_Web_Kit_V.0_3/wp-includes/functions.php on line 4147
- [ ] Use of undefined constant this - assumed 'this' in /home/seguinot/Documents/www/CNRS_Web_Kit_V.0_3/wp-content/themes/cnrswebkit/inc/inc-pages-functions.php on line 183
- [ ] Use of undefined constant thumb - assumed 'thumb' in /home/seguinot/Documents/www/CNRS_Web_Kit_V.0_3/wp-content/themes/cnrswebkit/loops/loop-bottompartenaire.php on line 14
- [ ] image médiathèque/admin   le champ à la une m’apparaît totalement inutile ici (il doit provenir d'un copier coller des pages actualités pour lesquelles ce champ est pertinent!)
- [ ] image médiathèque :erreur javascript :  remplacer la ligne 
   * `chapo: '<?php echo json_encode($current_item->value('chapo')); ?>',` 
   * de /loop/loop-mediathèque  par 
   * chapo: `<?php echo json_encode($current_item->value('chapo')); ?>`,
   * Autre problème sur le popup de l’image de sur mon site de test le shortcode [TheChamp-Sharing] apparaît alors qu’il devrait être remplacé par les liens de partage…. 
- [ ] A la mise à jour de Polylang, les news et événements disparaissent de la page/news /events il faut désactiver et réactiver Polylang !!  
- [ ] Modèle Page d’accueil  appliqué à la page d’accueil 3 notices + contenu non affiché !!
- [ ] Taxonomie (pods) les configurer pour apparaître dans un menu webkitcnrs ! Mais plus dans les ajouts de contenus ! 
- [ ] Breadcrumb: aucun sur pages d’accueil fr et en ??
- [ ] Newsletter <form method="post" action="https://cnrs.civibox.fr/?na=s" 
- [ ] Page 404.php n’apparaît pas dans la bonne langue , pourtant locale correcte !!
- [ ] Return to event list URL ne fonctionne pas si page # /lagenda !!!! 
   * voir http://cnrs_webkit.fr/wp-admin/themes.php?page=pods-settings-reglage_du_theme 
   * Page liste des actualités
- [ ] 
- [ ] événements : lien vers « Add to calendar » brisé !!!
- [ ] /newsletter :Warning: Illegal string offset 'form_1' in /var/www/html/wp-content/plugins/newsletter/subscription/subscription.php on line 1576
0
- [ ] Pourquoi l’appel direct à index.php du thème cnrswebkit génère l’erreur Fatale sur get_header() ; (pas le thème WP !!! (résolu autrement)
- [ ] Il faut proposer dans l’admin de pouvoir désactiver les menus inutilisés (Article/pages/annuaire/actualités/emploi/evenements/partenaires/Médiathèque
- [ ] Langue remettre tutes les chaines en français OU anglais, pas les 2 ! 
- [ ] Injection SQL: voir rapport inc-page-functions.php
   * // C. SEGUINOT sanitize for preventing SQL injection !!
   * $_SESSION[$k] = sanitize_title(get_query_var($k));
- [ ] Ajouter un ordre pour partenaires : http://kit-web.cnrs.fr/forums/topic/partenaires/
- [ ] Page agenda ne liste que les événement passés (ajouter un lien sur la page pour tous les événements ? 
- [ ] Widget event_list à insérer dans le kit
- [ ] Thèmes endommagés
   * Les thèmes suivants sont installés mais incomplets.
   * Nom Description
   * lab-directory 	La feuille de style est absente.
- [ ] 
- [ ] Ajouter un ordre à toutes les catégories/taxonomies pour éventuel classement 
- [ ] Ajouter un ordre aux partenaires aussi 
- [ ] Liste des langues #pll_switcher dans le menu principal par défaut mais si aucune langue affiche Liste des langues avec lien mort !! 
- [ ] Slogan et titre du site :/wp-admin/options-general.php ajouter un message explicatif dans l’admin (du thème ? Ou de WP ? )  
- [ ] Bug : supprimer site-branding .site-title, .site-description {# clip: rect(1px, 1px, 1px, 1px) de inc/customizer.php sinon l’affichage du slogan ne se fait pas. MAIS revoir la taille du slogan !!  ET AJOUTER affichage conditionnel du slogan/tITTRE
- [ ] Bug : certaines pages admin utilisent wp-color-picker, mais le thème ne le charge pas ! Corrigé ! 
- [ ] Proposer pour chaque page un modèle avec ET sans sidebar  
- [ ] Elargir les pages sans sidebar
   * ces modifications peuvent s’appliquer aux templates situés dans /cnrswebkit/templates correspondant aux pages : actualité emploi agenda et médiathèque.. 
   * (erreur à corriger) la commande <?php // get_sidebar(); ?> doit être déplacée sous le contenu soit après la ligne </div><!-- .content-area -->
   * commenter ou décommenter l’instruction get_sidebar() pour MASQUER/afficher la barre latérale à droite 
   * si vous n’utilisez pas  (désactivez) la barre latérale, ajouter la classe no-sidebar au contenu  en remplacant <div id="primary" class="content-area"> par <div id="primary" class="content-area no-sidebar">
   * N.B. il faudrait détecter dans le code les barres latérales vides pour ajuster le contenu dans ces cas…. 
   * –
   * Comment implémenter cela : soit on surcharge, soit on modifie le kit mais il faudrait un paramètre supplémentaire pour activer/désactiver les sidebar sur chaque template…. 

- [ ] Bread crumb : liste les parents dans l’ordre inversé !! (voir modif dans inc/inc-pages-functions.php)
- [ ] Notice: Use of undefined constant relation - assumed 'relation' in /home/seguinot/Documents/www/CNRS_Web_Kit_V.0_3/wp-content/themes/cnrswebkit/template-parts/bottom-evenement.php on line 4
- [ ] Chargement des styles admin : voir http://kit-web.cnrs.fr/forums/topic/erreur-admin-chargement-styles/
- [ ] Fichiers stylesheets/style-lmo.css     
   * color:$black;
   * border-left: 3px solid $mainColor;
- [ ] Fichier stylesheets/ cnrs_dyn.css
   * font-family: 'Roboto', sans-serif; (à 2 endroits!) 
- [ ] La traduction des pages fonctionnent avec Polylang, mais pas la traduction du chapô. Le texte du chapô prend la dernière valeur saisie, les pages dans les différentes langues affiche toute le même chapô.
   * Sans avoir regardé au code, il est fort probable que la prise en compte de la langue ne soit pas prise en compte pour le chapô !!!
   * Contournement temporaire: ne pas utiliser le chapô (ce qui n’est pas satisfaisant)
   * Solution à vérifier:
   1 aller dans l’administration langues/régleages (polylang an fait)
   2 cliquer sur réglages de l’item « synchronisation »
   3 décochez « champs personnalisés »
   * Cela fonctionne pour les pages, MAIS je ne sais pas si cela générera d’autres conflits ou problèmes!!
- [ ] CSS sur menu en anglais !!!! 
   * Les items de menus sont organisés en liste, le CSS utilise les class et les ID de ces items les classes semble a priori identique quel que soit la langue. Les ID dépendent de la langue. (par exemple « menu-menu-secondaire »  et «menu-secondary-menu-en») 
   * Le css met en forme selon les class et selon les ID 
   * Il faut modifier le code pour conserver les ID, ou plutôt revoir tous les CSS de menu  pour supprimer les mises en forme selon les ID….. 
- [ ] Le menu secondaire En (2ème langue) ne s’afficha pas s’il n’y a pas de menu principal 
   * à cause de la <?php if (has_nav_menu('primary') || has_nav_menu('social')) : ?> dans header.php
- [ ] Actu, Médiathèque, emplois, Agenda (événements)
   * prévoir un texte si la liste est vide ! 
- [ ] Mise à Jour de Pods : 
   * une pagination génante/inutile apparaît sur les pages actualités
   * solution : surcharger le fichier « /templates/template actualite.php » et y commenter les 2 lignes echo $actualites_data→get_pagination();
   * voir aussi templates/template emploi.php:				echo $actualites_data->get_pagination();
   * templates/template emploi.php:                echo $actualites_data->get_pagination();
   * templates/template publication.php:                echo $publication_data->get_pagination();
   * templates/template publication.php:                echo $publication_data->get_pagination();
   * templates/template contact.php://                echo $contact_data->get_pagination();
   * templates/template contact.php://                echo $contact_data->get_pagination();
   * templates/template actualite.php:                echo $actualites_data->get_pagination();
   * templates/template actualite.php:                echo $actualites_data->get_pagination();
   * templates/template mediatheque.php:                echo $mediatheque_data->get_pagination();
   * templates/template mediatheque.php:                echo $mediatheque_data->get_pagination();
- [ ] Mise à jour Site Origin
   * disparition actualités
- [ ] Utilité du Widget calendrier ???? 
- [ ] Comment désactiver newsletter (plugin désactivé ne suffit pas !!) et social network sur la page actus ? 
- [ ] Page emploi (/template-parts/content-emploi.php)
   * la partie descriptive de l’offre devrait être en simple colonne (on peut lassier Chapo et constact en 2 colonnes)
- [ ] Pages emploi () l’email  du contact devrait être surligné comme les liens.
- [ ] s’il n’y a pas d’emploi :
   * Notice: Undefined index: name in /home/seguinot/Documents/www/CNRS_Web_Kit_V.0_3/wp-content/themes/cnrswebkit-IRCICA/template-parts/content-emploi.php on line 13
   * Notice: Undefined index: name in /home/seguinot/Documents/www/CNRS_Web_Kit_V.0_3/wp-content/themes/cnrswebkit/loops/loop-bottomemploi.php on line 14
- [ ] EVENEMENTS : Premier constat, le nombres d'événements sur la page d'accueil est réglé à 2 par défaut. La page agenda affiche 2 événements, et ajoute 2 événements à chaque clic sur "Afficher plus d'évènements"
   * Problème 1: le lien "Afficher plus d'évènements" est masqué après le premier clic. 
   * Correction 1: supprimer la ligne 54 [$(".moreEvents a").hide();] du fichier /inc/ajax-cnrs.js
   * Problème2 : si on sélectionne une catégorie et qu'il n'y a rien a afficher, le lien "Afficher plus d'évènements"  est présent
   * Je n'ai pas corrigé cela car j'ai proposé un code et j'utilise une gestion des catégories plus conforme aux pods. Cela me permet d'utiliser 0 1 2 ou 3 catégories par type de page et surtout de partager des catégories entre les type de pages pour éviter de les répliquer en 3 ou 4 exemplaires (certaines catégories peuvent être partagées par les médias, les pages, les événements et les actus). 
- [ ] pb événement non listés
``` php 
                
                SELECT DISTINCT
                `t`.*
                FROM `Irc7ek89df4G_posts` AS `t`
                
                    LEFT JOIN `Irc7ek89df4G_postmeta` AS `date_de_fin` ON
                        `date_de_fin`.`meta_key` = 'date_de_fin'
                        AND `date_de_fin`.`post_id` = `t`.`ID`
                
                
                    LEFT JOIN `Irc7ek89df4G_postmeta` AS `date_de_debut` ON
                        `date_de_debut`.`meta_key` = 'date_de_debut'
                        AND `date_de_debut`.`post_id` = `t`.`ID`
                
                
                        LEFT JOIN `Irc7ek89df4G_term_relationships` AS `polylang_languages`
                            ON `polylang_languages`.`object_id` = `t`.`ID`
                                AND `polylang_languages`.`term_taxonomy_id` = 6
                    
                WHERE ( ( CAST( `date_de_fin`.`meta_value` AS DATE ) >= '2018-06-07 11:25:57' ) AND ( `t`.`post_type` = "evenement" ) AND ( `polylang_languages`.`object_id` IS NOT NULL ) AND ( `t`.`post_status` IN ( "publish" ) ) )
                
                
                ORDER BY `date_de_debut`.`meta_value` ASC, `t`.`menu_order`, `t`.`post_title`, `t`.`post_date`
```
   * Expression #1 of ORDER BY clause is not in SELECT list, references column 'cnrs_webkit.date_de_debut.meta_value' which is not in SELECT list; this is incompatible with DISTINCT

- [ ] pb suite taxonomy modifiées : 
   * Notice: Undefined index: categorie_actualites in /home/seguinot/Documents/www/CNRS_Web_Kit_V.0_3/wp-content/themes/cnrswebkit/inc/inc-pages-functions.php on line 211
   * Notice: Undefined index: categorie_actualites in /home/seguinot/Documents/www/CNRS_Web_Kit_V.0_3/wp-content/themes/cnrswebkit/inc/inc-pages-functions.php on line 218
   * Notice: Undefined index: categorie_actualites in /home/seguinot/Documents/www/CNRS_Web_Kit_V.0_3/wp-content/themes/cnrswebkit/inc/inc-pages-functions.php on line 74
   * Notice: Undefined index: typologie_actualites in /home/seguinot/Documents/www/CNRS_Web_Kit_V.0_3/wp-content/themes/cnrswebkit/inc/inc-pages-functions.php on line 84 
   * revoir tous les get_the_post_thumbnail, second argument faux !!
- [ ] Je viens de mettre à jour WordPress en 4.9.6, mais sans mettre à jour les plugins.
   * Le calendrier reste sur les pages où il était présent, même s’il n’y a aucun événement à afficher.
   * Il n’apparaît pas sur les pages Emplois, Médiathèque, Actualités, L’agenda où il n’est probablement pas prévu de l’afficher. 
- [ ] En faisant ce test (événements ) , j’ai découvert un comportement inadapté de l’affichage des événements:. Je ne comprends pas comment est faite cette sélection.
   * sur la page d’accueil, les « prochains événements » n’affichent que certains des événements dont la date de début et future: il en manque ! 
   * sur la page « l’agenda » seuls les événements futurs non listés dans « prochains événements » sont affichés (il en manque ici aussi!). 
- [ ] Défaut de fonctionnement annuaire
   * Les champs ajoutés aux pods ne s’affichent pas sur la page contact
   * 2- Les shortcode dans les champs existants ne sont pas interprétés même si on active « utiliser les shortcodes » dans la configuration du champs
   * L’affichage de l’annuaire est fait pas le code /wp-content/themes/cnrswebkit/loops/loop-contact.php
   * ce code est prévu pour n’afficher QUE les champs prédéfinis dans le kit. Donc les champs ajoutés ne s’affichent pas
   * – je n’ai pas trouvé d’instruction do_shortcode ni dans ce fichier, ni dans le kit
   * – l’ajout de do_shortcode() sur un champs ne résout pas le problème
   * – la solution proposée par https://pods.io/docs/build/using-shortcodes-pods-templates/ ne fonctionne pas non plus.
- [ ] Le lien « En savoir plus sur les tutelles » apparaît aussi sur le page tutelles !
- [ ] Le fichier /cnrswebkit/inc/inc-pages-functions.php du kit CNRS contient la ligne « ini_set(« display_errors », 0); » qui désactive l’affichage des erreurs! 
- [ ] cnrs.civibox.fr  notamment  dans wp-content/themes/cnrswebkit/template-parts/home-top.php
- [ ] Sidebar, barre latérale  vide : 
   * NON problème de cache !!! widget dans barre latérale non visible ou non fonctionnels ? 
   * Le css libère une colonne à droite
   * mais il n’y a aucune div, aucun contenu
- [ ] La création d’un thème enfant « child theme » avec les méthodes classiques échoue : 
   * les librairies utilisées par WP-SCSS ne sont pas chargées (il faut les copier dans le thème enfant)
   * les menus sont absents
   * ? comment surcharger les templates dans ces conditions ? Voir section ad’hoc
- [ ] Css ajouté pour image mise en avant 
- [ ] Liste rubriques : affiche le chapo des enfants
- [ ] Attention image mise en avant pas affiché sur le page modèle par défaut ! 
- [ ] il manque post_thumbnail (image en avant) sur les pages  par défaut : ajoutre en ligne 15 <?php cnrswebkit_post_thumbnail(); ?> 
   * au fichier /wp-content/themes/cnrswebkit/template-parts/content-page.php
- [ ] médiathèque : les images sont choisies dans les médias, pas en dehors) mediathèque = sous ensemble de  média
- [ ] Barre latérale : 
   * colonne réservée mais pas affichée sur : Emploi, Médiathèque, Actualités, Agenda, Publications, 
- [ ] médias : installer https://wordpress.org/plugins/enhanced-media-library/
- [ ] il faut remplacer les contenus statiques des filtres (inc/inc-pages-functions.php)
   * $FilterSelectorParams->selectorLabel = __('Catégorie', 'cnrswebkit');
   * $FilterSelectorParams->selectorEmptyText = __('Toutes', 'cnrswebkit');
- [ ] par le contenu dynamique entré dans les pods partie admin.  (Toutes ou Tous suivant les cas !! ) et leur traduction aussi. 
