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

#### liste des fichiers de style et tailles en V0.3
 * 77.7 ko /library/scss/crs_dyn.scss
 * 87.6 ko /library/css/crs_dyn.css (crs_dyn.scss compilé)
 * 70.0 ko /style.css
 * 12.9 ko /rtl.css
 * 00.7 ko /css/admin.css
 * 07.2 ko /css/editor-style.css
 * 01.2 ko /css/icomoon.css
 * 00.7 ko /css/ie.css
 * 02.6 ko /css/ie7.css
 * 03.5 ko /css/ie8.css
 * 01.1 ko /css/style_dyn.css vide supprimé 
 * 15.3 ko /css/style-lmo.css attention ajouté en direct dans header sans enqueue, pb $maincolor ... !!
 * 15.3 ko /css/style-lmok.css identique au précédent, pas chargé !!!! 

##### icones 
Quelle icones utiliser sans dupliquer .... choix => dashicons
 * genericons 28 k css
 * icomoon 3 ko frontend, mais correspond à icomoon commenté dans css !!
 * dashicons 48 ko (utilise par défaut en admin, utilisé par admin/pods, pas en frontend pour l'instant sauf dans lab-hal et lab-directory
 * Google font chargées frontend et backend MAIS utilisées pour éditeur (frontend et backend ???)
 
### Liste des bugs et améliorations à apporter
Cette liste est la concaténation de l'ensemble des observations faites sur le forum et par C. Seguinot. Certains items peuvent être redondants car la liste n'a été ni structurée ni priorisée. 
Au fur et à mesure des corrections par les développeurs, cette liste sera épurée et les modifications consignées dans le changelog intitulé [CHANGES.md](CHANGES.md). __La plupart des bugs sont relatifs à un template; dans ce cas il faut examiner l'ensemble du code pour corriger les éventuels bugs identiques ou similaires des autres templates.__ 

- [ ] Add possible defaut parameter (so that template can be used whitout saving settings first)
     * at install 
     * at upgrade too for added fields
- [ ] ? désactiver les vignettes sur format mobile ?
- [ ] utilité du template content-publication ?? avec !!! "eventDateRight "addCalendar" et "eventLocation" !!!
- [ ] faut-il ajouter if ( !defined( 'ABSPATH' ) ) exit; aux fichier template, aux autres fichiers PHP ??

- [ ] revoir tous les echo print printf _e( __( _x(
- [ ] TODOHREF
- [ ] put code in classes AND separate admin from frontend 
- [ ]   * GitHub Plugin URI: https://github.com/cnrs-webkit/cnrswebkit
- [ ] image médiathèque/admin le champ à la une m’apparaît totalement inutile ici (il doit provenir d'un copier coller des pages actualités pour lesquelles ce champ est pertinent!)
    * le champ ne semble pas utilisé: (vérifié)
    * "Photos et vidéos issues de nos recherches." s'affiche si médiathèque vide v03.fr pb ???? 
- [ ] Page 404.php n’apparaît pas dans la bonne langue , pourtant locale correcte !!
- [ ] Il faut proposer dans l’admin de pouvoir désactiver les menus inutilisés (Article/pages/annuaire/actualités/emploi/evenements/partenaires/Médiathèque
- [ ] Disable CPT programmatically (filter pods_wp_post_types) 

- [ ] Ajouter un ordre pour partenaires : http://kit-web.cnrs.fr/forums/topic/partenaires/
- [ ] Page agenda ne liste que les événement passés (ajouter un lien sur la page pour tous les événements ? 
- [ ] En faisant ce test (événements ) , j’ai découvert un comportement inadapté de l’affichage des événements:. Je ne comprends pas comment est faite cette sélection.
   * sur la page d’accueil, les « prochains événements » n’affichent que certains des événements dont la date de début et future: il en manque ! 
   * sur la page « l’agenda » seuls les événements futurs non listés dans « prochains événements » sont affichés (il en manque ici aussi!). 

- [ ] **Voir toutes les commentaires ajoutés TODO SEGUINOT qui pourraient subsister et indiquer des corrections à ajouter non répertoriées dans les lignes précédentes ... **
- [ ] revoir css mobile

- [ ] import valeurs des pods? ? 
- [ ] Ajouter aux pods les traductions du json si elles existent dans le thème par défaut JSON , et si elles n'existent pas dans le thème
   * au réglage du thème oui 
   * aux autres pods oui 
   * label_en_GB description_en_GB (! double undescore )
- [ ] import contenus d'un site (install)
- [ ] résultat de la recherche pas explicite (rechercher hal par exemple) afficher de vrai liens!! pas des titres? 
- [ ] revoir toutes les polices font-family:
- [ ] revoir couleur lien bas de page !! 
- [ ] ajouter qq traductions dans admin 
- [ ] traduction ? toutes avec 'cnrswebkit' ? certaines avec avec 'cnrs_webkit');
- [ ] générer .pot 
- [ ] tester emploi_form...
- [ ] $cnrs_webkit_list_filtered à généraliser !!
- [ ] 
   

### liste des infos à publier dans la doc ou dans FAQ
- [ ] Comment désactiver social network sur la page actus ? 
   * il suffit de supprimer le widget dans le 'contenu du bas2' ou de paramétrer ce widget
- [ ] Liste rubriques : affiche le chapo des enfants
   * au fichier /wp-content/themes/cnrswebkit/template-parts/content-page.php
- [ ] médiathèque : les images sont choisies dans les médias, pas en dehors) mediathèque = sous ensemble de  média
- [ ] médias : installer https://wordpress.org/plugins/enhanced-media-library/
- [ ] Mise à jour Site Origin (et autres plugin 
   * disparition actualités.. Il faut rafraichir tous les  permaliens 
- [ ] NON a faire dans Pods ...reste inutile car traduction dans pods / partenaires On peut ajouter la traduction de "du laboratoire" qui donne "du" "de l'" ... selon les cas 
- [ ] favicon ?  sur page sur /wp-admin/customize.php?return=%2Fwp-admin%2F           
- [ ] traduction des pods 
  * ajouter les langues dns l'administration
  * dans l'administration (des pods) /composants: activer le composant "Translate Pods Admin" s'il n'est pas activé
  * le menu administration (des pods) /translate pods apparait: dans ce menu activer les langues désirées
- [ ] téléchargement homepage rien sur la page en anglais !!
  * il faut traduire les contenus événements et actualités. 
 

### Liste des bugs et améliorations à apporter sur theme cnrswebkit
- [ ] Slogan et titre du site :/wp-admin/options-general.php ajouter un message explicatif dans l’admin (du thème ? Ou de WP ? )  
- [ ] La création d’un thème enfant « child theme » avec les méthodes classiques échoue : 
   * les librairies utilisées par WP-SCSS ne sont pas chargées (il faut les copier dans le thème enfant)
   * les menus sont absents
   * ? comment surcharger les templates dans ces conditions ? Voir section ad’hoc
- [ ] Défaut de fonctionnement annuaire
   * Les champs ajoutés aux pods ne s’affichent pas sur la page contact
   * 2- Les shortcode dans les champs existants ne sont pas interprétés même si on active « utiliser les shortcodes » dans la configuration du champs
   * L’affichage de l’annuaire est fait pas le code /wp-content/themes/cnrswebkit/loops/loop-contact.php
   * ce code est prévu pour n’afficher QUE les champs prédéfinis dans le kit. Donc les champs ajoutés ne s’affichent pas
   * – je n’ai pas trouvé d’instruction do_shortcode ni dans ce fichier, ni dans le kit
   * – l’ajout de do_shortcode() sur un champs ne résout pas le problème
   * – la solution proposée par https://pods.io/docs/build/using-shortcodes-pods-templates/ ne fonctionne pas non plus.
 - [ ] pb affichage si col aside courte: il faudrait étendre les sections dans la partie vide de sidebar. Comment ? 
   * Pagination et filtres sur même ligne 50/50 flex (similaire aux "articles" dans la boucle actualités)


