<?php
/*
 * Creating a function to create our CPT
 */

function education_connect_events_post_type() {
	$education_connect_setting_option = get_option('education_connect_setting_option');
	$event_post_type_description = isset($education_connect_setting_option['event_post_type_description']) ? $education_connect_setting_option['event_post_type_description'] : '';
	// Set UI labels for Custom Post Type
	$event_labels = array(
		'name'               => _x('Events', 'post type general name', 'education-connect'),
		'singular_name'      => _x('Event', 'post type singular name', 'education-connect'),
		'menu_name'          => _x('EC Events', 'admin menu', 'education-connect'),
		'name_admin_bar'     => _x('Event', 'add new on admin bar', 'education-connect'),
		'add_new'            => _x('Add New', 'Event', 'education-connect'),
		'add_new_item'       => __('Add New Event', 'education-connect'),
		'new_item'           => __('New Event', 'education-connect'),
		'edit_item'          => __('Edit Event', 'education-connect'),
		'view_item'          => __('View Event', 'education-connect'),
		'all_items'          => __('All Events', 'education-connect'),
		'search_items'       => __('Search Events', 'education-connect'),
		'parent_item_colon'  => __('Parent Events:', 'education-connect'),
		'not_found'          => __('No Events Found.', 'education-connect'),
		'not_found_in_trash' => __('No Events Found in Trash.', 'education-connect')
	);

	// Set other options for Custom Post Type
	$event_args = array(
		'labels'             => $event_labels,
		'description'        => $event_post_type_description,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
//		'rewrite'            => array('slug'            => 'events', 'with_front'            => false),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-calendar',
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
	);

	// Registering your Custom Post Type
	register_post_type('events', $event_args);
	// Add new taxonomy for events
	$event_cat_labels = array(
		'name'              => _x('Event Categories', 'taxonomy general name', 'education-connect'),
		'singular_name'     => _x('Event Category', 'taxonomy singular name', 'education-connect'),
		'search_items'      => __('Search Event Categories', 'education-connect'),
		'all_items'         => __('All Event Categories', 'education-connect'),
		'parent_item'       => __('Parent Event Category', 'education-connect'),
		'parent_item_colon' => __('Parent Event Category:', 'education-connect'),
		'edit_item'         => __('Edit Event Category', 'education-connect'),
		'update_item'       => __('Update Event Category', 'education-connect'),
		'add_new_item'      => __('Add New Event Category', 'education-connect'),
		'new_item_name'     => __('New Event Category Name', 'education-connect'),
		'menu_name'         => __('Event Category', 'education-connect'),
	);

	$event_cat_args = array(
		'hierarchical'      => true,
		'labels'            => $event_cat_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
//		'rewrite'           => array('slug'           => 'event-category'),
	);

	register_taxonomy('event-category', array('events'), $event_cat_args);
}
add_action('init', 'education_connect_events_post_type', 0);