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
- [ ] ? désactiver les vignettes sur format mobile ?
- [ ] utilité du template content-publication ?? avec !!! "eventDateRight "addCalendar" et "eventLocation" !!!
- [ ] faut-il ajouter if ( !defined( 'ABSPATH' ) ) exit; aux fichier template, aux autres fichiers PHP ??

- [ ] revoir tous les echo print printf _e( __( _x(
- [ ] revoir tous les liens href (codage en dur!)
- [ ] put code in classes AND separate admin from frontend 
- [ ]   * GitHub Plugin URI: https://github.com/cnrs-webkit/cnrswebkit
- [ ] Agenda sur la page d'accueil QU'EST CE ????? à renommer car pas explicite !!
- [ ] image médiathèque/admin le champ à la une m’apparaît totalement inutile ici (il doit provenir d'un copier coller des pages actualités pour lesquelles ce champ est pertinent!)
- [ ] Page 404.php n’apparaît pas dans la bonne langue , pourtant locale correcte !!
- [ ] Il faut proposer dans l’admin de pouvoir désactiver les menus inutilisés (Article/pages/annuaire/actualités/emploi/evenements/partenaires/Médiathèque
- [ ] Ajouter un ordre pour partenaires : http://kit-web.cnrs.fr/forums/topic/partenaires/
- [ ] Thèmes endommagés
   * Les thèmes suivants sont installés mais incomplets.
   * Nom Description
   * lab-directory 	La feuille de style est absente.

- [ ] Fichiers stylesheets/style-lmo.css  Qu'est ce ?    
   * color:$black;
   * border-left: 3px solid $mainColor;

- [ ] Page agenda ne liste que les événement passés (ajouter un lien sur la page pour tous les événements ? 
- [ ] En faisant ce test (événements ) , j’ai découvert un comportement inadapté de l’affichage des événements:. Je ne comprends pas comment est faite cette sélection.
   * sur la page d’accueil, les « prochains événements » n’affichent que certains des événements dont la date de début et future: il en manque ! 
   * sur la page « l’agenda » seuls les événements futurs non listés dans « prochains événements » sont affichés (il en manque ici aussi!). 


- [ ] Css ajouté pour image mise en avant 
- [ ] **Voir toutes les commentaires ajoutés TODO SEGUINOT qui pourraient subsister et indiquer des corrections à ajouter non répertoriées dans les lignes précédentes ... **
- [ ] **Voir toutes les commentaires du thème enfant IRCIA de C. Seguinot qui correspondent à des modifications par rapport au thème original ... **
- [ ] téléchargement homepage rien sur la page en anglais !!
- [ ] l’agenda ne semble pas s’afficher sur la page d’accueil.
- [ ] Attention plus de traduction dans les pods sur mon site de test pourquoi?? 
- [ ] http://local_wp_ircica.fr/evenement/reste-t-a-decouvrir/ mettre content sur 2 colonnes 
- [ ] Comment ordonner les pods de réglage du thème? 
- [ ] revoir css mobile
- [ ] partenaire sur page d'accueil devient inutile. 
- [ ] pb affichage si col aside courte: il faudrait étendre les sections dans la partie vide de sidebar. Comment ? 
- [ ] cnrs_dyn.scss  semble être  recompilé à chaque page y compris hors admin !!
- [ ] https://kit-web.cnrs.fr/forums/topic/agenda-page-daccueil/#post-7840 (agenda absent page d'accueil ?)

### liste des infos à publier dans la doc ou dans FAQ
- [ ] Comment désactiver social network sur la page actus ? 
   * il suffit de supprimer le widget dans le 'contenu du bas2' ou de paramétrer ce widget
- [ ] Liste rubriques : affiche le chapo des enfants
   * au fichier /wp-content/themes/cnrswebkit/template-parts/content-page.php
- [ ] médiathèque : les images sont choisies dans les médias, pas en dehors) mediathèque = sous ensemble de  média
- [ ] médias : installer https://wordpress.org/plugins/enhanced-media-library/
- [ ] Mise à jour Site Origin (et autres plugin 
   * disparition actualités.. Il faut rafraichir tous les  permaliens 
- [ ] NON a faire dans Pods ...partenaires On peut ajouter la traduction de "du laboratoire" qui donne "du" "de l'" ... selon les cas 

  
### Liste des bugs et améliorations à apporter sur theme cnrswebkit-IRCICA
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
    


