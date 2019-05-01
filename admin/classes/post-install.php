<?php
if ( !defined( 'ABSPATH' ) ) exit;


Class cnrs_webkit_post_install {

    static function init() {

        
        // TODO adjust access rights
        if (!current_user_can( 'administrator' )) {
            return;
        }
        
        add_action('admin_menu',array('cnrs_webkit_post_install','setup_menu'));
                
    }

    static function setup_menu(){
        // array( 'cnrs_webkit_post_install', 'settings_post_install')
        add_menu_page('CNRS Webkit', 'CNRS Webkit', 'manage_options', 'CNRS-Webkit', array( 'cnrs_webkit_post_install', 'settings_post_install') );
    }
    
    static function settings_post_install() {
        
        // TODO adjust access rights
        if (!current_user_can( 'administrator' )) {
            return;
        }
                
        if (isset( $_POST['Reorder_template_settings_Pods']) && wp_verify_nonce( $_POST['_wpnonce'], 'settings_post_install' )){
            self::reorder_template_settings_Pods(); 
        }

        if (isset( $_POST['default_content_load']) && wp_verify_nonce( $_POST['_wpnonce'], 'settings_post_install' )){
            self::default_content_load($_POST['default_content_load']);
        }
        
        if (isset( $_POST['Reinstall']) && wp_verify_nonce( $_POST['_wpnonce'], 'settings_post_install' )){
            
            if ('cnrswebkit_load_cnrs_default_pods' ===$_POST['Reinstall']) {
                cnrswebkit_load_cnrs_default_pods();
            }
            
            if ('cnrswebkit_set_cnrs_template_settings_to_default' ===$_POST['Reinstall']) {
                cnrswebkit_set_cnrs_template_settings_to_default();
            }
    				
        }
        // Form messages must be displayed before loading form
        cnrsWebkitAdminNotices::displayAdminNotice();
        require_once( CNRS_WEBKIT_DIR . '/admin/views/settings_post_install.php' );
    }
    
    static function default_content_load($filename = '') {
        global $wp_filesystem;
        $messages = array();
        
        // require_once ABSPATH . 'wp-content/plugins/wordpress-importer/wordpress-importer.php';

        https://hotexamples.com/examples/-/WP_Import/import/php-wp_import-import-method-examples.html
        // Load Importer API
        //require_once ABSPATH . 'wp-admin/includes/import.php';
        /* if ( !class_exists( 'WP_Importer' ) ) {
            $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
            if ( file_exists( $class_wp_importer ) ) {
                require_once $class_wp_importer;
            }
        }
*/
        if ( ! class_exists( 'WP_Import' ) ) {
            $class_wp_import = ABSPATH . 'wp-content/plugins/wordpress-importer/wordpress-importer.php';
            if ( file_exists( $class_wp_import ) ) {
                require_once $class_wp_import;
            }
        }

        if ( ! class_exists( 'WP_Import' ) ) {
            $messages[] = array('message' => 'CNRS Webkit : You must install <a href="import.php">"wordpress-importer"</a> plugin before importing default CNRS Webkit content ! (https://wordpress.org/plugins/wordpress-importer/)',
                'notice-level' => 'notice-info' );
            cnrsWebkitAdminNotices::addNotices( $messages );
            return; 
        }
        
        $WP_import = new WP_Import;
        
        // Initialize the WP filesystem
        if (empty($wp_filesystem)) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }
        
        $file = CNRS_WEBKIT_DIR . '/assets/content/'. $filename .'.xml';
        $WP_import->import($file);
        delete_transient ('cnrswebkit_default_content_load'.$filename);
        return;
    }
    
    static function reorder_template_settings_Pods() {
        
        global $wp_filesystem;
        $messages = array();
        
        // Initialize the WP filesystem
        if (empty($wp_filesystem)) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }
        
        // Load pods api
        $pods_api = pods_api();
        // Load default settings "reglage_du_theme"
        $default_reglage_du_theme_json = json_decode( $wp_filesystem->get_contents(get_template_directory() . '/assets/pods/default_reglage_du_theme.json' ) );
        
        // Verify that this json contains "reglage_du_theme" pods
        foreach ($default_reglage_du_theme_json->pods as $pod_id => $pod_array) {
            if ('reglage_du_theme' === $pod_array->name) {
                $default_reglage_du_theme = $pod_array;
            }
            if (isset($default_reglage_du_theme) ) {
                break;
            }
        }
        
        if ( isset($default_reglage_du_theme) ) {
            // Load current settings "reglage_du_theme"
            $reglage_du_theme = pods('reglage_du_theme');
            $message = '';
            
            // reorder fields in settings "reglage_du_theme"
            foreach ($reglage_du_theme->fields as $field_slug => $field) {
                
                // reorder fields in settings "reglage_du_theme"
                $old = $field['weight'];
                $new = $default_reglage_du_theme->fields->$field_slug->weight;
                if ($old !== $new) {
                    $field['weight']= $new;
                    $pods_api->save_field($field);
                    $message .= "<br/>&nbsp;&nbsp;&nbsp; field :$old==>$new [$field_slug]"; 
                }
                
               

            }
            // $success = $reglage_du_theme->save($reglage_du_theme);
            // Add a form message
            if ($message) {
                $messages[] = array('message' => "CNRS Webkit : Field list has been reordered (in template setting pods)".$message,
                    'notice-level' => 'notice-info' );
            } else {
                $messages[] = array('message' => "CNRS Webkit : Fields were already ordered ! (in template setting pods)",
                    'notice-level' => 'notice-info' ); 
            }
            cnrsWebkitAdminNotices::addNotices( $messages  );
            
        }

        
    }
}
