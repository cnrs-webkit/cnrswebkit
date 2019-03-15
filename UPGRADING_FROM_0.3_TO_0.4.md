 ### paramétrage à modifier
Cette liste indique les modifications de paramétrage à apporter pour ceux qui avaient installé la version 0.3 du kit et souhaitent évoluer vers la version supérieure. 

 * Modifier le contenu de la page newsletter
   * [newsletter form="1"]  devient [newsletter_form form="1"] 
 * Traduction des chapô à activer
   1 aller dans l’administration langues/réglages (polylang en fait)
   2 cliquer sur réglages de l’item « synchronisation »
   3 décochez « champs personnalisés » et enregistrez
 * Abonnement Newsletter réactivés peuvent à nouveau apapraitre sur vos pages
   * désactiver le plugin "newsletter" pour les supprimer si vous ne souhaitez pas utiliser le plugin "newsletter"
 * 
 
 ### éléments pouvant impacter le visuel du site
 Ce paragraphe indique toutes les modifications pouvant avaoir un impact visuel sur le site. Veuillez consulter cette liste et ajuster le CSS ou le paramétrage pour rétablir le fonctionnement que vous désirez. 
 
 * Mise en place des vignettes (auparavant désactivées), flottantes, avant le header sur la plupart des templates (template-parts/content-xxxx.php)
   * on peut désactiver/modifier les vignettes en surchargeant la function cnrswebkit_post_thumbnail
   * on peut ajuster leur taille avec du CSS personalisé