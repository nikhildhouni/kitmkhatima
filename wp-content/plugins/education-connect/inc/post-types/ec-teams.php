<?php
/*
 * Creating a function to create our CPT
 */

function education_connect_teams_post_type() {
	$education_connect_setting_option = get_option('education_connect_setting_option');
	$team_post_type_description = isset($education_connect_setting_option['team_post_type_description']) ? $education_connect_setting_option['team_post_type_description'] : '';
	// Set UI labels for Custom Post Type
	$team_labels = array(
		'name'               => _x('Teams', 'post type general name', 'education-connect'),
		'singular_name'      => _x('Team', 'post type singular name', 'education-connect'),
		'menu_name'          => _x('EC Teams', 'admin menu', 'education-connect'),
		'name_admin_bar'     => _x('Team', 'add new on admin bar', 'education-connect'),
		'add_new'            => _x('Add New', 'Team', 'education-connect'),
		'add_new_item'       => __('Add New Team', 'education-connect'),
		'new_item'           => __('New Team', 'education-connect'),
		'edit_item'          => __('Edit Team', 'education-connect'),
		'view_item'          => __('View Team', 'education-connect'),
		'all_items'          => __('All Teams', 'education-connect'),
		'search_items'       => __('Search Teams', 'education-connect'),
		'parent_item_colon'  => __('Parent Teams:', 'education-connect'),
		'not_found'          => __('No Teams Found.', 'education-connect'),
		'not_found_in_trash' => __('No Teams Found in Trash.', 'education-connect')
	);

	// Set other options for Custom Post Type
	$team_args = array(
		'labels'             => $team_labels,
		'description'        => $team_post_type_description,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
//		'rewrite'            => array('slug'            => 'teams', 'with_front'            => false),
		'capability_type'    => 'post',
		'has_archive'        => true,
        'taxonomies'        => array('team-department'),
        'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-groups',
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
	);

	// Registering your Custom Post Type
	register_post_type('teams', $team_args);
	// Add new taxonomy for Designation:
	$team_deg_labels = array(
		'name'              => _x('Designations', 'taxonomy general name', 'education-connect'),
		'singular_name'     => _x('Designation', 'taxonomy singular name', 'education-connect'),
		'search_items'      => __('Search Designations', 'education-connect'),
		'all_items'         => __('All Designations', 'education-connect'),
		'parent_item'       => __('Parent Designation', 'education-connect'),
		'parent_item_colon' => __('Parent Designation:', 'education-connect'),
		'edit_item'         => __('Edit Designation', 'education-connect'),
		'update_item'       => __('Update Designation', 'education-connect'),
		'add_new_item'      => __('Add New Designation', 'education-connect'),
		'new_item_name'     => __('New Designation Name', 'education-connect'),
		'menu_name'         => __('Designation', 'education-connect'),
	);

	$team_deg_args = array(
		'hierarchical'      => true,
		'labels'            => $team_deg_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
//		'rewrite'           => array('slug'           => 'team-designation'),
	);

	register_taxonomy('team-designation', array('teams'), $team_deg_args);

	// Add new taxonomy for teams
	$team_cat_labels = array(
		'name'              => _x('Team Categories', 'taxonomy general name', 'education-connect'),
		'singular_name'     => _x('Team Category', 'taxonomy singular name', 'education-connect'),
		'search_items'      => __('Search Team Categories', 'education-connect'),
		'all_items'         => __('All Team Categories', 'education-connect'),
		'parent_item'       => __('Parent Team Category', 'education-connect'),
		'parent_item_colon' => __('Parent Team Category:', 'education-connect'),
		'edit_item'         => __('Edit Team Category', 'education-connect'),
		'update_item'       => __('Update Team Category', 'education-connect'),
		'add_new_item'      => __('Add New Team Category', 'education-connect'),
		'new_item_name'     => __('New Team Category Name', 'education-connect'),
		'menu_name'         => __('Team Category', 'education-connect'),
	);

	$team_cat_args = array(
		'hierarchical'      => true,
		'labels'            => $team_cat_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
//		'rewrite'           => array('slug'           => 'team-category'),
	);

	register_taxonomy('team-category', array('teams'), $team_cat_args);

}
add_action('init', 'education_connect_teams_post_type', 0);