<?php
if ( !defined( 'ABSPATH' ) ) exit;

// Actualite admin columns 
add_filter( 'manage_edit-actualite_columns',
    array( 'cnrs_webkit', 'set_actualite_admin_columns' ), 10, 1 );
add_filter( 'manage_actualite_posts_custom_column',
    array( 'cnrs_webkit', 'custom_actualite_admin_columns' ), 10, 3 );
add_filter( 'manage_edit-actualite_sortable_columns',
    array( 'cnrs_webkit', 'custom_actualite_sortable_columns' ), 10, 3 );

// Emploi admin columns
add_filter( 'manage_edit-emploi_columns',
    array( 'cnrs_webkit', 'set_emploi_admin_columns' ), 10, 1 );
add_filter( 'manage_emploi_posts_custom_column',
    array( 'cnrs_webkit', 'custom_emploi_admin_columns' ), 10, 3 );
add_filter( 'manage_edit-emploi_sortable_columns',
    array( 'cnrs_webkit', 'custom_emploi_sortable_columns' ), 10, 3 );


Class cnrs_webkit {

    static function set_actualite_admin_columns($columns) {
        
        $columns['date'] = __( 'Publish date', 'cnrswebkit' );
        $new_columns = array(); 
        //$new_columns['featured_image'] = __( 'featured_image', 'cnrswebkit' );
        $new_columns['date_fin_publication'] = __( 'Publication end', 'cnrswebkit' );
        // slice $columns into two parts and insert $new_columns in between
        $columns = array_merge(array_slice($columns, 0, 2), $new_columns, array_slice($columns, 2));
        
        return $columns;
    }
    static function custom_actualite_admin_columns( $column_name, $post_id ) {
        
        $out = '';
        
        switch ( $column_name ) {
            case 'date_fin_publication' :
               
                $out = get_post_meta( $post_id , 'date_fin_publication' , true );
                if (! $out) {
                    $out = __('none');
                }
                break;
            default :
                break;
        }
        echo $out;
    }
    
    static function custom_actualite_sortable_columns($columns) {
        $columns ['date_fin_publication'] = 'date_fin_publication';
        return $columns;
    }
    
    static function set_emploi_admin_columns($columns) {
        
        $columns['date'] = __( 'Publish date', 'cnrswebkit' );
        $new_columns = array();
        //$new_columns['featured_image'] = __( 'featured_image', 'cnrswebkit' );
        $new_columns['date_fin_publication'] = __( 'Publication end', 'cnrswebkit' );
        // slice $columns into two parts and insert $new_columns in between
        $columns = array_merge(array_slice($columns, 0, 2), $new_columns, array_slice($columns, 2));
        
        return $columns;
    }
    static function custom_emploi_admin_columns( $column_name, $post_id ) {
        
        $out = '';
        
        switch ( $column_name ) {
            case 'date_fin_publication' :
                
                $out = get_post_meta( $post_id , 'date_fin_publication' , true );
                if (! $out) {
                    $out = __('none');
                }
                break;
            default :
                break;
        }
        echo $out;
    }
    
    static function custom_emploi_sortable_columns($columns) {
        $columns ['date_fin_publication'] = 'date_fin_publication';
        return $columns;
    }
}
    