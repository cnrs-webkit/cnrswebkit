## cnrswebkit TODO list

#### Other tasks
- [x] corriger tous les bugs de la version 0.3
- [x] Apporter quelques améliorations indispensables
- [x] constituer un ensemble de paramètres par défaut (pods...) installable (pour utiliser le kit)
- [x] Constituer un contenu (page média...) téléchargeable pour tester le kit sans disposer de contenu initial
- [ ] Rendre le thème upgradable à partir de GitHub
- [ ] Proposer un thème enfant par défaut
- [ ] apply Worpdress coding standard
- [x] Langue remettre toutes les chaines en anglais (actuellement moitié français moitié anglais !!) 
- [ ] ET ajouter traductions en français (.po)
- [x] Ajouter un ordre à toutes les catégories/taxonomies pour éventuel classement (utiliser date publication)
- [x] Ajouter un ordre aux partenaires aussi
- [ ] toiletter les styles (redondance, inutilisés..) voir https://www.cssportal.com/css-validator/

### Liste des bugs et améliorations à apporter avant publication 1ère version

- [ ] GitHub Plugin URI: https://github.com/cnrs-webkit/cnrswebkit
- [ ] Définir programatiquement H1 H2  H6 (dyn css), supprimer les déclarations multiples dans .css
- [ ] CSS: importer le "css personnalisé" indispensable (menu...)

### Liste des futures améliorations à apporter
- [ ] ? désactiver les vignettes sur format mobile ?
- [ ] put code in classes AND separate admin from frontend 
- [ ] revoir css mobile
- [ ] revoir toutes les polices font-family: (css)
- [ ] faut-il ajouter qq traductions personnalisables dans admin ???
  * surcharge des traductions partenaire et tutelles???  
- [ ] /* TODO javascript i18n*/ https://pascalbirchler.com/internationalization-in-wordpress-5-0/
- [ ] tester emploi_form...
- [ ] Améliorer le rendu de la section téléchargements
- [ ] Social Links Menu Quid ?? http://wp_test_kit.fr/wp-admin/nav-menus.php?action=locations
   * conflit ?? avec "social network"
- [ ] 
- [ ] 

### TODO site de démo /package
- [ ] http://Dircomnas ?? à modifier sur site démo
- [ ] modifier les liens bas de page non fonctionnels non paramétrables -> site origin ??
- [ ] supprimer les brouillons inutiles
- [ ] supprimer les médias inutilisés
- [ ] proposer pages en anglais / site bilingue pour montrer comment ça marche et proposer traduction des pods par défaut
- [ ] 
- [ ] 


#### liste des fichiers de style et tailles en V0.3
 * 77.7 ko /library/scss/cnrs_dyn.scss
 * 87.6 ko /library/css/cnrs_dyn.css (version compilée de cnrs_dyn.scss )
 * 70.0 ko /style.css
 * 12.9 ko /rtl.css
 * 00.7 ko /css/admin.css
 * 07.2 ko /css/editor-style.css
 * 01.2 ko /css/icomoon.css
 * 00.7 ko /css/ie.css
 * 02.6 ko /css/ie7.css
 * 03.5 ko /css/ie8.css
 * 15.3 ko /css/style-lmo.css attention ajouté en direct dans header sans enqueue, pb $maincolor ... !!

#### liste des fichiers de style supprimés
 * 01.1 ko /css/style_dyn.css vide supprimé 
 * 15.3 ko /css/style-lmok.css identique à /css/style-lmo.css, pas chargé !!!! 



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

- [ ] PODS Comment mettre à jour les pods qui peuvent être modifiés par le webmaster??
on distingue: 
- reglages du thème
- custom post type (actualité, événements, contact, publications)
- taxonomies (catégories / typologies)
-
  * peut-on ajouter/supprimer des pods CPT ?? non car cela rompt le fonctionnement du kit. 
    * il est préférable de supprimer des contenus, pas les CTP correspondants NON
    * on proposera dans l'admin de désactiver les CPT (uniquement dans les menus d'admin) NON
  * peut-on ajouter/supprimer des champs aux pods [en local sur mon site? (webmasters)  sur le theme CNRSWebkit? (développeurs) ]
   * côté developpeur on supprime les champs à la une inutiles et non géréset le champ "type de poste" 
    * mais il ne faut plus supprimer de champs côté developpeur
    * c'est indispensable de pouvoir en ajouter pour l'annuaire des contacts (webmasters) , et doivent être géré dans le thème (développeurs)
  	* les traductions des champs existants dans le kit sont mises à jour si le champ existent sur le thème installé, et que sa traduction n'existe pas (on ne surcharge pas les traductions du webmaster)
  	* l'ordre des champs est actualise automatiquement mais que pour réglages du thème 
 
- [ ] traduction des pods (comment ajouter des)
  * installer et activer le plugin Polylang 
  * ajouter les langues dans l'administration
  * dans l'administration (des pods) /composants: activer le composant "Translate Pods Admin" s'il n'est pas activé
  * le menu administration (des pods) /translate pods apparait: dans ce menu activer les langues désirées
- [ ] téléchargement homepage rien sur la page en anglais !!
  * il faut traduire les contenus événements et actualités. 
- [ ] Liste des dépendances /todo avant d'installer le thème : Mettre cette liste dans le theme pour affichage
  * installer wordpress 
  * installer polylang si le site gère plusieurs langues (optionnel)
  * configurer la/les langue(s) désirée(s) en admin et en frontend
  * installer le plugin pods
  * activation du "migrate packages" des pods
  * installer wp_sitemap_page
  * installer WP-SCSS
  * installer le thème cnrs webkit
  * optionnel installer site origine (requis pour contenu demo)
  * installet GithubUpdater
  
  * importer les contenus de démo (optionnel)
- [ ] Import des contenus en manuel 
  * importer fichier .xml
  * en cochant la case "importer les médias"
  * message d'erreur Failed to import post_translations pll_59c919044ddeb
Failed to import language Français 
  *  Failed to import “ polylang_mo_6 ”: Invalid post type polylang_mo
  * apparence /menus /onglet manage location gérer les emplacements
    * Primary menu sélectionner menu principal
    * Secondary menu sélectionner menu secondaire
    * Primary menu sélectionner pas de sélection
    * enregistrer 
- [ ] Pods Custon Post Types et autres types inutilisés
  * l'administration ne propose pas de désactiver les Pods inutilisés. On peut supprimer les pods inutiliser dans l'administration des Pods. Les mises à jour du thème ne ré-installent pas les Pods supprimés. 
- [ ] Ajouter un ordre pour partenaires : http://kit-web.cnrs.fr/forums/topic/partenaires/
   * on utilise la date pour ordonner les parttenaires 
   * voir https://www.wpexplorer.com/order-custom-post-type-posts-wordpress/
   * les autres méthodes ne sont pas plus efficaces et nécessite code ou plugin. 
- [ ] Ajouter les taxonomies dans les liste de contenus : à activer dans admin/pods/: panneau d'admin de la  taxonomie / onglet interface administrateur / cocher Afficher une colonne taxonomie pour les types de contenus
  
https://www.google.com/search?client=firefox-b&q=wordpress+modify+secret+key
https://fr.wordpress.org/plugins/change-table-prefix/
+ ajouter procédure pour imposer modification login/password    

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


