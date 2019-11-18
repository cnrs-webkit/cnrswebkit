## cnrswebkit TODO list

* neutraliser upgrade si version>0.5.0.... 
* Style de menu dans réglage du thème: quid ??
* Agenda sur la page d'accueil devient événements de l'Agenda sur la page d'accueil
* /wp-admin/admin.php?page=CNRS-Webkit : Merci de faire de WordPress votre outil de création mal placé!
* Red buttons correspond to content that have already been imported
* Depandancies :typo
* détecter origine pb recadrage images ?? 
* modifier les couleurs par défaut utilisées après la mise à jour de 1.0.3 vers 0.4.2
* utilité de html5.js, shiv ?? update ??
* icomoon: update ??
* jquery ???

 
#### Other tasks
- [x] corriger tous les bugs de la version 0.3
- [x] Apporter quelques améliorations indispensables
- [x] constituer un ensemble de paramètres par défaut (pods...) installable (pour utiliser le kit)
- [x] Constituer un contenu (page média...) téléchargeable pour tester le kit sans disposer de contenu initial
- [x] Rendre le thème upgradable à partir de GitHub
- [x] Langue remettre toutes les chaines en anglais (actuellement moitié français moitié anglais !!) 
- [ ] ET ajouter traductions en français (.po)
- [x] Ajouter un ordre à toutes les catégories/taxonomies pour éventuel classement (utiliser date publication)
- [x] Ajouter un ordre aux partenaires aussi
- [ ] Proposer un thème enfant par défaut
- [ ] apply Worpdress coding standard


### Liste des futures améliorations à apporter
- [ ] CSS: importer le "css personnalisé" indispensable (menu...)
- [ ] Définir programmatiquement H1 H2  H6 (dyn css), supprimer les déclarations multiples dans .css
- [ ] toiletter les styles (redondance, inutilisés..) voir https://www.cssportal.com/css-validator/
- [ ] page contact thumbcontainer à mettre flottant pour que la description s'étende sur toute la largeur 
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
- [ ] Les liens depuis des pages de listes ne fonctionnent pas tous avec la même logique :
– parfois c’est le titre qui est cliquable https://kit-demo.cnrs.fr/lagenda/,
– parfois il y a un bouton « en savoir plus » et le titre est non cliquable https://kit-demo.cnrs.fr/les-publications/
– parfois le titre et le texte resume sont cliquable, sans « en savoir plus » https://kit-demo.cnrs.fr/les-actualites/.

- [ ] AMP ???
- [ ] Ligne crédits du bas de page/footer: utiliser un contenu site origin ?? 

### TODO site de démo /package
- [ ] Voir liste dans Upgrading from 0.3 to 0.4 ### paramétrage à modifier
- [ ] modifier les liens bas de page non fonctionnels non paramétrables -> site origin ??
- [ ] supprimer les brouillons inutiles
- [ ] supprimer les médias inutilisés
- [ ] proposer pages en anglais / site bilingue pour montrer comment ça marche et proposer traduction des pods par défaut
- [ ] Newsletter inscription !! Widget non fonctionnel a priori, à déplacer de barre latérale à contenu bas ?? 
- [ ] Ajouter un theme de Wordpress (Twenty Nineteen?) en cas de pb avec pods (on bascule sur le thème par défaut de Wordpress)
- [ ] 
- [ ] 
- [ ] 
- [ ] 
- [ ] 
- [ ] 
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
- [ ] Customize: Personnalisation Image d’en-tête :  recadrer ne fonctionne pas
   * si la bibliothèque php-gd est absente

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

### liste des infos à publier dans la doc des développeurs

- [ ] Customizer: 
   * le fonctionnement initial du kit-web est basé sur un fichier css dynamique cnrs_dyn.scss comportnat des paramètres, des fichiers de styles dispersés, et du style en ligne. Le fichier dynamique est recompilé à chaque modification par le plugin wp-scss
   * la personalisation du kit s'appuie sur l'API customizer de Wordpress, notamment sur l'ajout de style 'in-line' pour faire fonctionner la prévisualisation. 
   * Incompatibilités et problèmes: 
     * le paramètre couleur principale ($maincolor) définissait la couleur principale à modifier dans les 'réglages du thème', alors que dans la personnalisation c'est un aure paramètre qui remplissait cette fonction.
     * l'utilisation de paramètres pour les couleurs nécessitait de recompiler le css dynamique à chaque changement dans la prévisualisation du thème. (compter 4 secondes) . Mais, ainsi on appliquerait les changements avant que les modification dans la prévisualisation soient enregistrés (à éviter absolument)
     * l'utilisation de morceaux de code @mixin paramétrés est incompatible avec la prévisualisation des modifications du thème. 
     * les fichiers css sont concurrents et redondants, beaucoup de styles doivent être supprimés (inutiles) , il faut absolument simplifier cela
     * l'implémentation de l'API customizer génré sur chaque page en frontend un style en ligne qui ne peut  pas être mis en cache. 
   * solution implémentée: 
     * on utilise un fichier cnrs-dyn.scss qui contient tous les css dynamiques 
     * on crée un fichier underscore _cnrs_dyn_custom.scss qui contient la partie de scss qu'il faut modifier pour afficher les modifications dans la prévisualisation
     * ce fichier scss est mis à jour et injecté dans la prévisualisation à chaque changement de paramètre (couleur..)
     * TODO : il faudrait remonter dans  _cnrs_dyn_custom.scss toutes les règles qui utilisent un paramètre. C'est impossible à cause des morceaux de code @mixin eux mêmes paramétrés
     * conclusion: la prévisualisation du thème n'est que partiellement fonctionelle

### Liste des bugs et améliorations à apporter sur theme cnrswebkit
- [ ] Slogan et titre du site :/wp-admin/options-general.php ajouter un message explicatif dans l’admin (du thème ? Ou de WP ? )  
- [ ] La création d’un thème enfant « child theme » avec les méthodes classiques échoue : 
   * les librairies utilisées par WP-SCSS ne sont pas chargées (il faut les copier dans le thème enfant)
   * les menus sont absents
   * ? comment surcharger les templates dans ces conditions ? Voir section ad’hoc
 - [ ] pb affichage si col aside courte: il faudrait étendre les sections dans la partie vide de sidebar. Comment ? 
   * Pagination et filtres sur même ligne 50/50 flex (similaire aux "articles" dans la boucle actualités)


