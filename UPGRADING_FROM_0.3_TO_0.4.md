### IMPéRATIF avant de commencer
 * aller dans l'administration à "apparence / réglage du thème", paraméter les nouveaux champs (sidebar) comme désiré et enregistrer 
 * N.B. il faut au moins enregistrer les paramètres par défauts, sinon toutes les sidebar sont désactivées!
 
### paramétrage à modifier
Cette liste indique les modifications de paramétrage à apporter pour ceux qui avaient installé la version 0.3 du kit et souhaitent évoluer vers la version supérieure. 
 * il faut à présent définir le logo du site dans l'admin : le thème utilisait auparavant : /assets/img/kitweb.png !!
 * Ajout de pods pour le réglage du thème
  *  les nouveaux paramètres seront automatiquement ajoutés, il faut cependant effectuer un enregistrement des paramètres du thème
 * Modifier le contenu de la page newsletter (shortcode erroné)
   * [newsletter form="1"]  devient [newsletter_form form="1"] 
 * Traduction des chapô à activer
   1 aller dans l’administration langues/réglages (polylang en fait)
   2 cliquer sur réglages de l’item « synchronisation »
   3 décochez « champs personnalisés » et enregistrez
 * Abonnement Newsletter réactivés peuvent à nouveau apparaitre sur vos pages
   * désactiver le plugin "newsletter" pour les supprimer si vous ne souhaitez pas utiliser le plugin "newsletter"
 * Partenaires du laboratoire: 
   * le contenu a été déplacé sous <!-- .content-area -->, dans footer.php
   * Les filtres partenaires ne sont plus utilisés. ils peuvent être supprimés
   * nouvelle section : Tutelles du laboratoire à renseigner dans le réglage du thème (en plus des partenaires du labo)
   * on peut afficher tutelles ET/OU partenaires (affichage est actif dès que des tutelles ET/OU des partenaires sont définis
 * New : Mini Logos des partenaires dans le header à renseigner dans le réglage du thème (affichage sous le logo du laboratoire)
 * Ligne crédits du bas de page/footer:  La fonction cnrswebkit_credits() a été créée. Elle est surchargeable dans le thème enfant. Elle permet d'afficher une liste de liens sur la ligne crédits... 
 
 
### éléments pouvant impacter le visuel du site
 Ce paragraphe indique toutes les modifications pouvant avoir un impact visuel sur le site. Veuillez consulter cette liste et ajuster le CSS ou le paramétrage pour rétablir le fonctionnement que vous désirez. 
 
 * Mise en place des vignettes (auparavant désactivées), flottantes, avant le header sur la plupart des templates (template-parts/content-xxxx.php)
   * on peut désactiver/modifier les vignettes en surchargeant la function cnrswebkit_post_thumbnail
   * on peut ajuster leur taille avec du CSS personalisé
 * Ajout des sidebar sur les pages pour lesquelles l'emplacement était déjà reservé (peu d'impact a priori) 
 * Possibilité d'activer ou pas les sidebar pour les listes, les éléments simples (événements, contact, emploi, actualités, publication...)
   * Il faut ajuster le paramétrage dans le réglage du thème (liste avec ou sans sidebar, items avec u sans sidebar)
   * On peut utiliser pour un item particulier un template avec ou sans Sidebar
   * exemple paramétrage "Page actualité avec sidebar" oui il y a une sidebar pour toutes les actualités affichées 
   * mais si pour "l'actualité 1" on chosit le template "CNRSwebkit news whitout sidebar"  (traduction bientôt disponible!), cette actualité apparaitra en pleine page.  
 * affichage des partenaires de l'événement a été activé (précédemment commenté)
 * affichage des partenaires du laboratoire utilise à présent la liste définie dans réglage du thème (auparavant affichait tous les partenaires!) 
 * On peut à présent styler les menus plus facilement 
  * ajout id et classes au menu principal 'menu_id' => 'menu-menu-principal','container_class' => 'menu-menu-principal-container' pour styler en css
  * ajout id et classes au menu secondaire 'menu_id' => 'menu-menu-secondaire', 'container_class' => 'menu-menu-secondaire-container',  
   
    
### si vous utilisez un thème enfant
 * Vous pouvez supprimer du thème enfant les templates proposés sur le forum du CNRS pour activer /désactiver les sidebar. Ils deviennent inutiles    
 * Vous pouvez supprimer du thème enfant cnrs_dyn.scss et cnrs_dyn.css si vous utlisez ceux du thème principal, 
   * MAIS il faut laisser les répertoires library library/css et library/scss vide (sinon cela génère une erreur de wp-scss dans l'admin)  
   * on charge par défaut cnrs_dyn.css du thème principal
   * pour surcharger le style, il est préférable de le faire dans style.css du thème enfant même si on peut utiliser cnrs_dyn.scss  du thème enfant qui sera compilé par wp-scss
     
 * il n'est plus nécessaire de charger style.css du thème parent. 
   * Le thème enfant charge le style (style.css) du thème parent et ajout le style.css du thème enfant
   * le fichier style.css du thème enfant ne doit comporter que les règles ajoutées ou modifiées, 
   il devient par conséquent inutile de copier/coller l'intégralité du fichier style.css dans le thème enafant