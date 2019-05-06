<?php
if ( !defined( 'ABSPATH' ) ) exit;



add_filter(
    'manage_edit-actualite_columns',
    array( 'cnrs_webkit', 'set_actualite_admin_columns' ), 10, 1 );

add_filter(
    'manage_actualite_posts_custom_column',
    array( 'cnrs_webkit', 'custom_actualite_admin_columns' ),
    10,
    3 );


Class cnrs_webkit {

    static function set_actualite_admin_columns($columns) {
        
        // var_dump($columns); 
        $columns['date'] = __( 'Publish date', 'your_text_domain' );
        $new_columns = array(); 
        // $new_columns['featured_image'] = __( 'featured_image', 'your_text_domain' );
        $new_columns['date_fin'] = __( 'date_fin', 'your_text_domain' );
        array_splice( $columns, 2, 0, $new_columns );
        // var_dump($columns);
        
        return $columns;
    }
    static function custom_actualite_admin_columns( $column_name, $post_id ) {
        
        $out = '';
        
        switch ( $column_name ) {
            case 'date_fin' :
               
                $out = 'test';
                break;
            default :
                break;
        }
        echo $out;
    }
}
    