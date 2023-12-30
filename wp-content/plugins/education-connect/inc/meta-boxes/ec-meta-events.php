<?php
/**
 * Events Options Metabox
 */

if (!defined('ABSPATH')) {
	exit;// Exit if accessed directly
}

add_action('admin_init', 'education_connect_events_meta_init');
add_action('save_post', 'education_connect_events_meta_save');

function education_connect_events_meta_init() {

	add_meta_box("education_connect_events_meta", __("Additional Event's Information", 'education-connect'), "education_connect_events_meta_options", "events", "normal", "high");
}

function education_connect_events_meta_options($post) {
	/**
	 * Ouecuts the content of the meta options
	 */

	$values = get_post_custom($post->ID);

	$event_date      = isset($values['ec_event_date_value'])?esc_html($values['ec_event_date_value'][0]):'';
	$event_time_from = isset($values['ec_event_time_from_value'])?esc_html($values['ec_event_time_from_value'][0]):'';
	$event_time_to   = isset($values['ec_event_time_to_value'])?esc_html($values['ec_event_time_to_value'][0]):'';
	$event_location  = isset($values['ec_event_location_value'])?esc_html($values['ec_event_location_value'][0]):'';
	wp_nonce_field('education_connect_events_meta_options_nonce', 'meta_box_nonce');
	?>

	    <label class="tm-label" for="ec_event_date_value"><?php _e('Date', 'education-connect');?>: </label><br>
	    <input type="text" value="<?php echo esc_attr($event_date);?>" id="event_date_id" name="ec_event_date_value"></p>
	    <p><?php _e('Please select date for event');?></p>

	    <hr>

	    <strong><?php _e('Time Span', 'education-connect');?></strong><br />

	    <label class="tm-label" for="ec_event_time_from_value"><?php _e('From', 'education-connect');?>: </label>
	    <input type="text" style="width:100px;" value="<?php echo esc_attr($event_time_from);?>" id="event_time_from_id" name="ec_event_time_from_value">

	    <label class="tm-label" for="ec_event_time_to_value"><?php _e('To', 'education-connect');?>: </label>
	    <input type="text" style="width:100px;" value="<?php echo esc_attr($event_time_to);?>" id="event_time_to_id" name="ec_event_time_to_value">
	    <p><?php _e('Please insert starting time and ending time.', 'education-connect');?></p>

	    <hr>

	    <label class="tm-label" for="ec_event_location_value"><?php _e('Location', 'education-connect');?>: </label><br>
	    <textarea type="text" id="event_location_id" style="width:400px;" name="ec_event_location_value"><?php echo esc_textarea($event_location);
	?></textarea>
	    <p><?php _e('Please insert the designated location for the event.', 'education-connect');?></p>

	<?php
}

function education_connect_events_meta_save($post_id) {
	global $post;
	/**
	 * Saves the mata input value
	 */
	// Bail if we're doing an auto save
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {return;
	}

	// if our nonce isn't there, or we can't verify it, bail
	if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'education_connect_events_meta_options_nonce')) {return;
	}

	// if our current user can't edit this post, bail
	if (!current_user_can('edit_post', $post_id)) {return;
	}

	$custom_meta_fields = array('ec_event_date_value', 'ec_event_time_from_value', 'ec_event_time_to_value', 'ec_event_location_value');

	foreach ($custom_meta_fields as $custom_meta_field) {

		if (isset($_POST[$custom_meta_field])) {

			update_post_meta($post->ID, $custom_meta_field, sanitize_text_field($_POST[$custom_meta_field]));
		}
	}
}
