## cnrswebkit TODO list

#### Other tasks
- [ ] corriger tous les bugs de la version 0.3
- [ ] Apporter quelques améliorations indispensables
- [ ] constituer un ensemble de paramètres par défaut (pods...) installable (pour utiliser le kit)
- [ ] Constituer un contenu (page média...) téléchargeable pour tester le kit sans disposer de contenu initial
- [ ] Rendre le thème upgradable à partir de GitHub
- [ ] Proposer un thème enfant par défaut
- [ ] apply Worpdress coding standard
- [ ] Langue remettre toutes les chaines en anglais (actuellement moitié français moitié anglais !!) 
- [ ] ET ajouter traductions en français
- [ ] Ajouter un ordre à toutes les catégories/taxonomies pour éventuel classement 
- [ ] Ajouter un ordre aux partenaires aussi 


### Liste des bugs et améliorations à apporter
Cette liste est la concaténation de l'ensemble des observations faites sur le forum et par C. Seguinot. Certains items peuvent être redondants car la liste n'a été ni structurée ni priorisée. 
Au fur et à mesure des corrections par les développeurs, cette liste sera épurée et les modifications consignées dans le changelog intitulé [CHANGES.md](CHANGES.md). __La plupart des bugs sont relatifs à un template; dans ce cas il faut examiner l'ensemble du code pour corriger les éventuels bugs identiques ou similaires des autres templates.__ 

- [ ] Add install (copy of pods)
- [ ] Add possible defaut parameter (so that template can be used whitout saving settings first)
     * at install 
     * at upgrade to for added fields
- [ ] Refresh assets/pods/...json files for pods (si ordre ajoutés par exemple!)
- [ ] Disable CPT programmatically (filter pods_wp_post_types) 
PB: css sur page les actualites sans sidebar !!
- [ ] test http://local_wp_ircica.fr/ : Site de démo du Kit Web du CNRS affiché en double
- [ ] test http://cnrs_webkit.fr/fr : pb de border sur les partenaires et tutelles
- [ ] ? désactiver les vignettes sur format mobile ?
- [ ] utilité du template content-publication ?? avec !!! "eventDateRight "addCalendar" et "eventLocation" !!!
- [ ] faut-il ajouter if ( !defined( 'ABSPATH' ) ) exit; aux fichier template, aux autres fichiers PHP ??

- [ ] revoir tous les echo print printf _e( __( _x(
- [ ] revoir tous les liens href
- [ ] put code in classes AND separate admin from frontend 
- [ ]   * GitHub Plugin URI: https://github.com/cnrs-webkit/cnrswebkit
- [ ] Agenda sur la page d'accueil QU'EST CE ????? à renommer car pas explicite !!

- [ ] image médiathèque/admin le champ à la une m’apparaît totalement inutile ici (il doit provenir d'un copier coller des pages actualités pour lesquelles ce champ est pertinent!)
- [ ] Page 404.php n’apparaît pas dans la bonne langue , pourtant locale correcte !!
- [ ] Il faut proposer dans l’admin de pouvoir désactiver les menus inutilisés (Article/pages/annuaire/actualités/emploi/evenements/partenaires/Médiathèque
- [ ] Ajouter un ordre pour partenaires : http://kit-web.cnrs.fr/forums/topic/partenaires/
- [ ] Page agenda ne liste que les événement passés (ajouter un lien sur la page pour tous les événements ? 
- [ ] Thèmes endommagés
   * Les thèmes suivants sont installés mais incomplets.
   * Nom Description
   * lab-directory 	La feuille de style est absente.
- [ ] Liste des langues #pll_switcher dans le menu principal par défaut mais si aucune langue affiche Liste des langues avec lien mort !! 
- [ ] Slogan et titre du site :/wp-admin/options-general.php ajouter un message explicatif dans l’admin (du thème ? Ou de WP ? )  
- [ ] Bug : supprimer site-branding .site-title, .site-description {# clip: rect(1px, 1px, 1px, 1px) de inc/customizer.php sinon l’affichage du slogan ne se fait pas. MAIS revoir la taille du slogan !!  ET AJOUTER affichage conditionnel du slogan/tITTRE

- [ ] Fichiers stylesheets/style-lmo.css     
   * color:$black;
   * border-left: 3px solid $mainColor;

- [ ] CSS sur menu en anglais !!!! 
   * Les items de menus sont organisés en liste, le CSS utilise les class et les ID de ces items les classes semble a priori identique quel que soit la langue. Les ID dépendent de la langue. (par exemple « menu-menu-secondaire »  et «menu-secondary-menu-en») 
   * Le css met en forme selon les class et selon les ID 
   * Il faut modifier le code pour conserver les ID, ou plutôt revoir tous les CSS de menu  pour supprimer les mises en forme selon les ID….. 
- [ ] Mise à jour Site Origin
   * disparition actualités
- [ ] Utilité du Widget calendrier ???? 
- [ ] Comment désactiver social network sur la page actus ? 
- [ ] EVENEMENTS : Premier constat, le nombres d'événements sur la page d'accueil est réglé à 2 par défaut. La page agenda affiche 2 événements, et ajoute 2 événements à chaque clic sur "Afficher plus d'évènements"
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

   * au fichier /wp-content/themes/cnrswebkit/template-parts/content-page.php
- [ ] médiathèque : les images sont choisies dans les médias, pas en dehors) mediathèque = sous ensemble de  média
- [ ] médias : installer https://wordpress.org/plugins/enhanced-media-library/
- [ ] **Voir toutes les commentaires ajoutés TODO SEGUINOT qui pourraient subsister et indiquer des corrections à ajouter non répertoriées dans les lignes précédentes ... **
- [ ] **Voir toutes les commentaires du thème enfant IRCIA de C. Seguinot qui correspondent à des modifications par rapport au thème original ... **

### Liste des bugs et améliorations à apporter sur theme cnrswebkit-IRCICA

    


