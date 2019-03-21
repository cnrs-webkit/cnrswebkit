<?php

/*
 * Name cnrswebkit_news_widget
 * Description: This widget displays a list ofnews registered in cnrswebkit theme
 * Version: 0.1
 * Requires at least: 4.8.2
 * Tested up to: 4.9.2
 * Author: Christophe Seguinot
 * Author URI: 
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */

//TODO Account/filter for language or all languages depending on settings
// voir https://wordpress.stackexchange.com/questions/217676/get-posts-by-language-in-polylang-plugin

function load_cnrswebkit_news_widget() {
	register_widget( 'cnrswebkit_news_widget' );
}
add_action( 'widgets_init', 'load_cnrswebkit_news_widget' );

// Creating the cnrswebkit_news_widget class
class cnrswebkit_news_widget extends WP_Widget {

	protected $defaults;
	function __construct() {
		$this->defaults = array(
            'title'  => __( 'News', 'cnrswebkit' ),
			'limit_all'  => 10,
			'display_widget_if_empty'  => 0,
			'display_all_news_link' => 0,
			'display_empty_message' => 1,
				);

        parent::__construct(

			// Base ID of your widget
			'cnrswebkit_news_widget',

			// Widget name will appear in UI
			/* translators: This widegt default title should be short to stay on one line when appearing in sidebar widget.*/
			__('New\'s List (cnrswebkit)', 'cnrswebkit'),

			// Widget description
			array( 'description' => __( 'This widget display a list of news registered in cnrswebkit theme', 'cnrswebkit' ), )
			);
	}

	// Creating widget front-end

	public function widget( $args, $instance ) {
				
		$title = apply_filters( 'widget_title', $instance['title'] );
		$output = cnrswebkit_news_widget::get_widget_output($instance);
		if (!$output AND !$instance['display_widget_if_empty']) {
			return;
		}
		
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
			echo $output;
			
			if (!$output AND $instance['display_empty_message']) {
				_e( 'No news at present', 'cnrswebkit' );
	
			}
			
			echo $args['after_widget'];
	}


	// Widget Backend
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		
		// Widget admin form
		?>
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget title'); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'title' ] ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'limit_all' ); ?>"><?php _e( 'Overall maximum number of items to display', 'cnrswebkit' ); ?></label> 
	<input class="widefat" maxlength="2" style="width:3em;" id="<?php echo $this->get_field_id( 'limit_all' ); ?>" name="<?php echo $this->get_field_name( 'limit_all' ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'limit_all' ] ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'display_widget_if_empty' ); ?>"><?php _e( 'Display Widget even in case of empty news list', 'cnrswebkit' ); ?></label>  
    <select id="<?php echo $this->get_field_id('display_widget_if_empty'); ?>" name="<?php echo $this->get_field_name('display_widget_if_empty'); ?>">
            <option <?php selected($instance['display_widget_if_empty'], 1);?> value="1"><?php _e('Yes')?></option>
            <option <?php selected($instance['display_widget_if_empty'], 0);?> value="0"><?php _e('No')?></option>
    </select>
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'display_empty_message' ); ?>"><?php _e( 'Optionnally display an empty list message', 'cnrswebkit' ); ?></label>  
    <select id="<?php echo $this->get_field_id('display_empty_message'); ?>" name="<?php echo $this->get_field_name('display_empty_message'); ?>">
            <option <?php selected($instance['display_empty_message'], 1);?> value="1"><?php _e('Yes')?></option>
            <option <?php selected($instance['display_empty_message'], 0);?> value="0"><?php _e('No')?></option>
    </select>
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'display_all_news_link' ); ?>"><?php _e( 'Display a link to "all news" page', 'cnrswebkit' ); ?></label>  
    <select id="<?php echo $this->get_field_id('display_all_news_link'); ?>" name="<?php echo $this->get_field_name('display_all_news_link'); ?>">
            <option <?php selected($instance['display_all_news_link'], 1);?> value="1"><?php _e('Yes')?></option>
            <option <?php selected($instance['display_all_news_link'], 0);?> value="0"><?php _e('No')?></option>
    </select>
</p>


<?php 
}
     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['limit_all'] = ( ! empty( $new_instance['limit_all'] ) ) ? (int)$new_instance['limit_all'] : 0;
		$instance['display_widget_if_empty'] = ( $new_instance['display_widget_if_empty'] ) ? 1 : 0;
		$instance['display_all_news_link']  = ( $new_instance['display_all_news_link'] ) ? 1 : 0;
		$instance['display_empty_message']  = ( $new_instance['display_empty_message'] ) ? 1 : 0;
		return $instance;
	}
	
	
	
	
	
	public static function get_widget_output(&$params){

		global $wpdb;
	
		$news = array();							

		$select = "SELECT i.ID, i.post_title as title, i.guid ";
		$from = " FROM {$wpdb->posts} AS i ";
		$where = " WHERE i.post_status='publish' AND i.post_type='actualite' ";
		$order = ' ORDER BY post_date DESC ';
		$limit = ' LIMIT ' . max($params['limit_all'],0) . ' ';
		
		// Retrieve news

		$query = $select.$from.$where.$order.$limit;
		$news = $wpdb->get_results($query);
	
		
		$output = '';
		foreach ($news as $new) {

			$output .="<li><a href=\"" . get_permalink( $new->ID) . "\" title=\"{$new->title}\"> <strong>{$new->title}</strong></a></li>";
		}
		if ($params['display_all_news_link']) {
			// TODO la page agenda ne liste que les événement futur !!
			$query = "SELECT post_id FROM {$wpdb->postmeta} as p WHERE p.meta_key='_wp_page_template' and p.meta_value='templates/template actualite.php' LIMIT 1; 
			";
			if ($id = $wpdb->get_var($query)) {
				$output .= '<li><a href="' . get_permalink($id) . '">' . __( 'More on "all news" page', 'cnrswebkit' ) . '</a></li>';
			}
		}
		
		if ($output) {
			return '<ul class="news_widget">' . $output . '</ul>';}
		else {
			return '';
		}
	}
		
} 
// Class cnrswebkit_news_widget ends here

