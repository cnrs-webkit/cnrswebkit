<?php
if ( !defined( 'ABSPATH' ) ) exit;

/*
 * Name cnrswebkit_events_widget
 * Description: This widget displays a list of events registered in cnrswebkit theme calendar
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

function load_cnrswebkit_events_widget() {
	register_widget( 'cnrswebkit_events_widget' );
}
add_action( 'widgets_init', 'load_cnrswebkit_events_widget' );

// Creating the cnrswebkit_events_widget class
class cnrswebkit_events_widget extends WP_Widget {

	protected $defaults;
	function __construct() {
		$this->defaults = array(
            /* Translator : this is the agenda widget title (displayed in the widget header)*/ 
		    'title'  => __( 'Agenda', 'cnrswebkit' ),
			'limit_all'  => 10,
			'limit_past'  => 0,
			'display_widget_if_empty'  => 0,
			'display_all_event_link' => 0,
			'display_empty_message' => 1,
			'date_format'  => 'DMY',
			'year_format'  => 'Y',
			'month_format'  => 'n',
			'day_format'  => 'd',
			'YMD_separator'  => '/',
			'range_separator'  => '-',
				);

        parent::__construct(

			// Base ID of your widget
			'cnrswebkit_events_widget',

			// Widget name will appear in UI
			/* translators: This widegt default name used in admin interface. This should be short to stay on one line when appearing in admin menu.*/
			__('Event\'s List (cnrswebkit)', 'cnrswebkit'),

			// Widget description
			array( 'description' => __( 'This widget display a list of futur events registered in cnrswebkit theme calendar, and optionnal past events', 'cnrswebkit' ), )
			);
	}

	// Creating widget front-end

	public function widget( $args, $instance ) {
				
		$title = apply_filters( 'widget_title', $instance['title'] );
		$output = cnrswebkit_events_widget::get_widget_output($instance);
		if (!$output AND !$instance['display_widget_if_empty']) {
			return;
		}
		
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
			echo $output;
			
			if (!$output AND $instance['display_empty_message']) {
				_e( 'No event scheduled', 'cnrswebkit' );
	
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
	<label for="<?php echo $this->get_field_id( 'limit_past' ); ?>"><?php _e( 'Maximum number of optionnal past (finished) item to display', 'cnrswebkit' ); ?></label> 
	<input class="widefat" maxlength="2" style="width:3em;" id="<?php echo $this->get_field_id( 'limit_past' ); ?>" name="<?php echo $this->get_field_name( 'limit_past' ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'limit_past' ] ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'display_widget_if_empty' ); ?>"><?php _e( 'Display Widget if empty event list', 'cnrswebkit' ); ?></label>  
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
	<label for="<?php echo $this->get_field_id( 'display_all_event_link' ); ?>"><?php _e( 'Display a link to "all events" page', 'cnrswebkit' ); ?></label>  
    <select id="<?php echo $this->get_field_id('display_all_event_link'); ?>" name="<?php echo $this->get_field_name('display_all_event_link'); ?>">
            <option <?php selected($instance['display_all_event_link'], 1);?> value="1"><?php _e('Yes')?></option>
            <option <?php selected($instance['display_all_event_link'], 0);?> value="0"><?php _e('No')?></option>
    </select>
</p>

<p>
	<label for="<?php echo $this->get_field_id( 'date_format' ); ?>"><?php _e( 'Date format', 'cnrswebkit' ); ?></label>  
    <select id="<?php echo $this->get_field_id('date_format'); ?>" name="<?php echo $this->get_field_name('date_format'); ?>">
            <option <?php selected($instance['date_format'], 'DMY');?> value="DMY">DMY</option>
            <option <?php selected($instance['date_format'], 'YMD');?> value="YMD">YMD</option>
    </select>
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'year_format' ); ?>"><?php _e( 'Year format', 'cnrswebkit' ); ?></label>  
    <select id="<?php echo $this->get_field_id('year_format'); ?>" name="<?php echo $this->get_field_name('year_format'); ?>">
            <option <?php selected($instance['year_format'], 'Y');?> value="Y"><?php _e( '4 digit format', 'cnrswebkit' ); ?></option>
            <option <?php selected($instance['year_format'], 'y');?> value="y"><?php _e( '2 digit format', 'cnrswebkit' ); ?></option>
    </select>
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'month_format' ); ?>"><?php _e( 'Month format', 'cnrswebkit' ); ?></label>  
    <select id="<?php echo $this->get_field_id('month_format'); ?>" name="<?php echo $this->get_field_name('month_format'); ?>">
            <option <?php selected($instance['month_format'], 'F');?> value="F"><?php _e( 'A full textual representation of a month', 'cnrswebkit' ); ?></option>
            <option <?php selected($instance['month_format'], 'M');?> value="M"><?php _e( '3 letters representation of a month', 'cnrswebkit' ); ?></option>
            <option <?php selected($instance['month_format'], 'm');?> value="m"><?php _e( 'Numeric representation of a month: 01 02 ...12', 'cnrswebkit' ); ?></option>
            <option <?php selected($instance['month_format'], 'n');?> value="n"><?php _e( 'Numeric representation of a month: 1 2 ... 12', 'cnrswebkit' ); ?></option>
    </select>
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'day_format' ); ?>"><?php _e( 'Day format', 'cnrswebkit' ); ?></label>  
    <select id="<?php echo $this->get_field_id('day_format'); ?>" name="<?php echo $this->get_field_name('day_format'); ?>">
            <option <?php selected($instance['day_format'], 'd');?> value="d"><?php _e( 'Day of the month, 2 digits: 01 ... 31', 'cnrswebkit' ); ?></option>
            <option <?php selected($instance['day_format'], 'D');?> value="D"><?php _e( '3 letters textual representation of a day', 'cnrswebkit' ); ?></option>
            <option <?php selected($instance['day_format'], 'j');?> value="j"><?php _e( 'Day of the month, 1 or 2 digits: 1 ... 31', 'cnrswebkit' ); ?></option>
            <option <?php selected($instance['day_format'], 'l');?> value="m"><?php _e( 'A full textual representation of the day', 'cnrswebkit' ); ?></option>
    </select>
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'YMD_separator' ); ?>"><?php _e( 'YMD separator (1 char)', 'cnrswebkit' ); ?></label>  
	<input class="widefat" maxlength="1" style="width:2em;" id="<?php echo $this->get_field_id( 'YMD_separator' ); ?>" name="<?php echo $this->get_field_name( 'YMD_separator' ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'YMD_separator' ] ); ?>" />

</p>
<p>
	<label for="<?php echo $this->get_field_id( 'range_separator' ); ?>"><?php _e( 'range separator (1 char)', 'cnrswebkit' ); ?></label>  
	<input class="widefat" maxlength="1" style="width:2em;" id="<?php echo $this->get_field_id( 'range_separator' ); ?>" name="<?php echo $this->get_field_name( 'range_separator' ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'range_separator' ] ); ?>" />
</p>
<?php 
}
     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['limit_all'] = ( ! empty( $new_instance['limit_all'] ) ) ? (int)$new_instance['limit_all'] : 0;
		$instance['limit_past'] = ( ! empty( $new_instance['limit_past'] ) ) ? (int)$new_instance['limit_past'] : 0;
		$instance['display_widget_if_empty'] = ( $new_instance['display_widget_if_empty'] ) ? 1 : 0;
		$instance['display_all_event_link']  = ( $new_instance['display_all_event_link'] ) ? 1 : 0;
		$instance['display_empty_message']  = ( $new_instance['display_empty_message'] ) ? 1 : 0;
		$instance['date_format'] = ( ! empty( $new_instance['date_format'] ) ) ? strip_tags( $new_instance['date_format'] ) : 'DMY';
		$instance['year_format'] = ( ! empty( $new_instance['year_format'] ) ) ? strip_tags( $new_instance['year_format'] ) : 'Y';
		$instance['month_format'] = ( ! empty( $new_instance['month_format'] ) ) ? strip_tags( $new_instance['month_format'] ) : 'm';
		$instance['day_format'] = ( ! empty( $new_instance['day_format'] ) ) ? strip_tags( $new_instance['day_format'] ) : 'd';
		$instance['YMD_separator'] = ( ! empty( $new_instance['YMD_separator'] ) ) ? strip_tags( $new_instance['YMD_separator'] ) : '/';
		$instance['range_separator'] = ( ! empty( $new_instance['range_separator'] ) ) ? strip_tags( $new_instance['range_separator'] ) : '-';
		return $instance;
	}
	
	
	private static function get_range_date_string(
		$start_date ='', $end_date='',
		$date_format='DMY', 
		$Y='Y', $M='M', $D='d', $YMD_sep='/', $range_sep='-') {

		if ($date_format=='none') {
			return '';
		}
		$start_date=strtotime($start_date);
		$date_range = '';
		// If only one date
		if ( empty($end_date) ) {
			if ($date_format=='DMY'){
				$date_range = date( "$D$YMD_sep$M$YMD_sep$Y", $start_date ). ': ';
			} else {
				$date_range = date( "$Y$YMD_sep$M$YMD_sep$D", $start_date ). ': ';
			}
			return $date_range;
		}
		$end_date=strtotime($end_date);
		if ( date('FjY',$start_date) == date('FjY',$end_date) ) {
			if ($date_format=='DMY'){
				$date_range = date( "$D$YMD_sep$M$YMD_sep$Y", $start_date ). ': ';
			} else {
				$date_range = date( "$Y$YMD_sep$M$YMD_sep$D", $start_date ). ': ';
			}
			return $date_range;
		}

		if ($date_format=='YMD'){
			// Setup basic dates: sample 2016-09-19 / 2016-09-27
			$start_date_pretty = date( "$Y$YMD_sep$M$YMD_sep$D", $start_date );
			$end_date_pretty = date( "$D", $end_date );
			//
			if ( date('F',$start_date) != date('F',$end_date) ) {
				$end_date_pretty = date( "$M$YMD_sep", $end_date ). $end_date_pretty;

				// If only months differ add suffix and year to end_date
				if ( date('Y',$start_date) != date('Y',$end_date) ) {
					$end_date_pretty = date( "$Y$YMD_sep", $end_date) . $end_date_pretty;
				}
			}
		} else {
			// Setup basic DMY dates: sample 19-09-2016 / 27-09-2016
			$end_date_pretty = date( "$D$YMD_sep$M$YMD_sep$Y", $end_date );
			if ( date('F',$start_date) == date('F',$end_date) ) {
				if ( date('Y',$start_date) == date('Y',$end_date) ) {
					// Same months and years
					$start_date_pretty = date( "$D", $start_date );
				} else {
					// Same years, differents months
					$start_date_pretty = date( "$D$YMD_sep$M", $start_date );
				}
			}
			else{
				// Different years
				$start_date_pretty = date( "$D$YMD_sep$M$YMD_sep$Y", $start_date );
			}
		}
		// build date_range return string
		$date_range .= $start_date_pretty . $range_sep . $end_date_pretty . ': ';
		return $date_range;
	}
	
	
	
	public static function get_widget_output(&$params){

	    global $cnrs_global_params;
	    
	    global $wpdb;
		$date_format  = $params['date_format'];
		$year_format = $params['year_format'];
		$month_format  = $params['month_format'];
		$day_format = $params['day_format'];
		$YMD_separator = $params['YMD_separator'];
		$range_separator = $params['range_separator'];
	
		$events = array();							

		$select = "SELECT i.ID, i.post_title as title, i.guid ";
		$select2='';
		$from = " FROM {$wpdb->posts} AS i ";
		$join = " ";
		$where = " WHERE i.post_status='publish' AND i.post_type='evenement' AND irel.meta_key='date_de_debut' ";
		$order = ' ORDER BY day ';
		$limit = ' LIMIT ' . max($params['limit_all'],0) . ' ';
		
		// Filter for start date (Event has always a start date)
		$join .= " JOIN {$wpdb->postmeta} AS irel ON irel.post_id = i.ID";
		$select .=" ,irel.meta_value as day";
		// Filter for end date (Range date event)
		$join2 = " JOIN {$wpdb->postmeta} AS irel2 ON irel2.post_id = i.ID";
		$select2 = " ,irel2.meta_value as day2";
		$where .= " AND irel2.meta_key='date_de_fin' ";
		$w1 = " (irel.meta_value>=CURDATE()  OR irel2.meta_value>=CURDATE())";
		$w2 = " (irel2.meta_value<>'0000-00-00 00:00:00' AND irel2.meta_value <=CURDATE())";
		$w3 = " (irel2.meta_value='0000-00-00 00:00:00' AND irel.meta_value <=CURDATE())";
		
		$where_ids=''; 
		// First retrieve futur events
		$where2 =$where . " AND " . $w1;
		$query = $select.$select2.$from.$join.$join2.$where2.$order.$limit;
		$items = $wpdb->get_results($query);
	
		// Than search for past events
		$limit2 = min ($params['limit_past'], $params['limit_all'] -count($items) );
		$limit2=max($limit2, 0);
		
		if ( $params['limit_all']>count($items) AND ($params['limit_past']>0) ) {
			
			$order = ' ORDER BY day DESC';
			$limit = ' LIMIT ' . $limit2 . ' ';
			$where2 = $where . " AND ( $w2 OR $w3 )";
			$query = 'SELECT * FROM (' . $select.$select2.$from.$join.$join2.$where2.$order.$limit . ') sub ORDER BY day ASC';
			$items_past =  $wpdb->get_results($query);
			// Add past events to list
			foreach ($items_past as &$item) {
				$item->daterange = cnrswebkit_events_widget::get_range_date_string(
						$item->day, $item->day2,
						$date_format, $year_format, $month_format, $day_format,
						$YMD_separator, $range_separator);			
				$item->link = get_permalink( $item->ID );
				$item->past=true; 
				$events[] = $item;
			
			}			
		}
		// Add futur events to list (after past events)
		foreach ($items as &$item) {
			$item->daterange = cnrswebkit_events_widget::get_range_date_string(
					$item->day, $item->day2,
					$date_format,
					$year_format, $month_format, $day_format,
					$YMD_separator, $range_separator);
			$item->link = get_permalink( $item->ID );
			$item->past=false; 
			$events[] = $item;
		}
		
		$output = '';
		
		foreach ($events as $item) {
			if ($item->past) {
				$class = 'class="past" ';
			} else {
				$class = '';
			}
			$output .="<li $class>{$item->daterange} <a href=\"$item->link\"> <strong>{$item->title}</strong></a></li>";
		}
		if ($params['display_all_event_link']) {
			// TODO la page agenda ne liste que les événement futur !!
		    $url = get_pod_page('pageliste_evenement');
		    
			if ($url) {
			    $output .= '<li><a href="' . $url . '">' . __( 'More on "all events" page', 'cnrswebkit' ) . '</a></li>';
			}
		}
		
		if ($output) {
			return '<ul>' . $output . '</ul>';}
		else {
			return '';
		}
	}
		
} 
// Class cnrswebkit_events_widget ends here

