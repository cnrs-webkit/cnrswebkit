<?php
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * CNRS Web Kit dependancy (Pods) check
 *
 * Prevents CNRS Web Kit from running on WordPress whitout Pods Framework activated
 * If Pods Framework is uninstalled or unactivated, CNRS Webkit theme freezes frontend and backend  
 * For this reason Wordpress is stopped and Wordpress theme will be reset next time the admin panel is open
 *
 * @package CNRS_Web_Kit
 * @subpackage CNRS_Web_Kit
 * @since CNRS Web Kit 0.3
 */

/**
 * Prevent running CNRS Web Kit whitout Pods Framework activated
 *
 * Switches to the default theme.
 *
 * @since CNRS Web Kit 0.3
 */
function cnrswebkit_dependancy_check(){
    global $messages;
    $messages = array(); 
    
    // Check for pods ! 
    if (! is_admin() && ! function_exists('pods')) {
        /* We arrive here when theme has not been changed but an admin has unactivated Pods.
         * This should never occurs !!
         * This completely breaks frontend and backend websites; instead we issue a message.
         * This message indicates that an admin must activate Pods.
         */
        $messages[] = __( 'CNRS Web Kit requires Pods Framework/plugin. Please Ask an administrator to reactivate and/or install Pods .', 'cnrswebkit' );
    }
    
    if (is_admin() ){
        if (! function_exists('pods')) {
            $messages[] = __( 'It appears that Pods Framework is not installed or unactivated. This breaks CNRS Webkit theme and causes frontend and backend freezing. For this reason, theme has been reset to Default Wordpress theme.', 'cnrswebkit' );  
            /* Translators : "Pods – Custom Content Types and Fields" is "Pods - Types de contenus et champs personnalisés" in french */ 
            $messages[] = '<a href="/wp-admin/plugin-install.php?tab=plugin-information&plugin=pods">' . __( 'Install "Pods – Custom Content Types and Fields".', 'cnrswebkit' ). '</a>';
            $messages[] =  __( 'You must also install "Pods Migrates Package".', 'cnrswebkit' );
            
        } else {
            // Check for Pods_Migrate_Packages
            if ( ! class_exists( 'Pods_Migrate_Packages' ) ) {
                $messages[] = __( 'It appears that Pods Migrates Package is not installed . This breaks CNRS Webkit theme and causes frontend and backend freezing. For this reason, theme has been reset to Default Wordpress theme.', 'cnrswebkit' );
                $messages[] = '<a href="/wp-admin/admin.php?page=pods-components">' . __( 'Please enable  "Pods – Migrate: Packages".', 'cnrswebkit' ). '</a>';
                
            }}
        if (! empty($messages)) {
            // We must switch theme to default theme since this breaks frontend and backend websites
            switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
            unset( $_GET['activated'] );
        }
    }
    
    // TODO add dependancy check (wp-scss, )
    
    if (empty($messages) ) {
        return; 
    }
    // Dependancies issue found !
    ?>
    <html>
    <head>
    <style>
    body  {
        background-color: #f1f1f1 ;
    } 
    div.error {
        margin: 5px 15px 2px;
        padding: 5px;
    }
    div.error p{
        margin: 5px 15px 2px;
        border-left: 4px solid #dc3232;
        background-color: #fff; 
        box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        padding: 12px;
    }
    </style>
    </head>
    <body>
    <?php 
    foreach ($messages as $message) {
        echo '<div class="error"><p>' . $message . "</p></div>\n";
    }
    ?>
    </body>
    </html>
    <?php
    die(2);
    
  
}


cnrswebkit_dependancy_check(); 
