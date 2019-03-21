### IMPéRATIF avant de commencer
 * aller dans l'administration à "apparence / réglage du thème", paraméter les nouveaux champs (sidebar) comme désiré et enregistrer 
 * N.B. il faut au moins enregistrer les paramètres par défauts, sinon toutes les sidebar sont désactivées!
 
### paramétrage à modifier
Cette liste indique les modifications de paramétrage à apporter pour ceux qui avaient installé la version 0.3 du kit et souhaitent évoluer vers la version supérieure. 

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
 * 
 
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
    
### si vous utilisez un thème enfant
 * Vous pouvez supprimer du thème enfant les templates proposés sur le forum du CNRS pour activer /désactiver les sidebar. Ils deviennent inutiles    
 * 