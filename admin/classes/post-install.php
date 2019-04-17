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
            self::Reorder_template_settings_Pods(); 
        }
        
        // Form messages must be displayed before loading form
        cnrsWebkitAdminNotices::displayAdminNotice();
        require_once( CNRS_WEBKIT_DIR . '/admin/views/settings_post_install.php' );
    }
    static function Reorder_template_settings_Pods() {
        
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
                $messages[] = array('message' => "CNRS Webkit : Liste des champs réordonnés: ".$message,
                    'notice-level' => 'notice-info' );
            } else {
                $messages[] = array('message' => "CNRS Webkit : Field were already ordered !",
                    'notice-level' => 'notice-info' ); 
            }
            cnrsWebkitAdminNotices::addNotices( $messages  );
            
        }

        
    }
}
