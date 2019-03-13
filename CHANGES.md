#### [To appear in next release]

##### Added feature, template, functionalities
 * Add missing wp-color-picker enqueuing in /inc/inc-pages-functions.php
 * Add missing admin_script.js dependancy to wp-color-picker in /inc/inc-pages-functions.php
 * Improve filters: can use as many and any of existing taxonomy (see settings in pods menu)
 * function record_GET_filters() Sanitized for preventing SQL injection !!
 * Make cnrs_breadcrumb pluggable for possible override it in child theme
 
 
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
 Missing: Add "related page" slug in breadcrumbs whenever title differs from related page title
                         
 

 
##### removed from theme
 * commented unusefull code in /template-parts/home-top.php
 

#### Version 0.3 (2018 Nov. 1)
* This was the original cnrswebkit developped by  ATOS 
