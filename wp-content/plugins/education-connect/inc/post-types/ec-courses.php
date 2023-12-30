<?php
/*
 * Creating a function to create our CPT
 */

function education_connect_courses_post_type() {
	$education_connect_setting_option = get_option('education_connect_setting_option');
	$subject_post_type_description = isset($education_connect_setting_option['subject_post_type_description']) ? $education_connect_setting_option['subject_post_type_description'] : '';
	// Set UI labels for Custom Post Type
	$subject_labels = array(
		'name'               => _x('Courses', 'post type general name', 'education-connect'),
		'singular_name'      => _x('Course', 'post type singular name', 'education-connect'),
		'menu_name'          => _x('EC Courses', 'admin menu', 'education-connect'),
		'name_admin_bar'     => _x('Course', 'add new on admin bar', 'education-connect'),
		'add_new'            => _x('Add New', 'Course', 'education-connect'),
		'add_new_item'       => __('Add New Course', 'education-connect'),
		'new_item'           => __('New Course', 'education-connect'),
		'edit_item'          => __('Edit Course', 'education-connect'),
		'view_item'          => __('View Course', 'education-connect'),
		'all_items'          => __('All Courses', 'education-connect'),
		'search_items'       => __('Search Courses', 'education-connect'),
		'parent_item_colon'  => __('Parent Courses:', 'education-connect'),
		'not_found'          => __('No Courses Found.', 'education-connect'),
		'not_found_in_trash' => __('No Courses Found in Trash.', 'education-connect')
	);

	// Set other options for Custom Post Type
	$subject_args = array(
		'labels'             => $subject_labels,
		'description'        => $subject_post_type_description,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
//		'rewrite'            => array('slug'            => 'courses', 'with_front'            => false),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-welcome-learn-more',
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
	);

	// Registering your Custom Post Type
	register_post_type('courses', $subject_args);

    // Add new taxonomy for departments
    $team_depart_labels = array(
        'name'              => _x('Departments', 'taxonomy general name', 'education-connect'),
        'singular_name'     => _x('Department', 'taxonomy singular name', 'education-connect'),
        'search_items'      => __('Search Departments', 'education-connect'),
        'all_items'         => __('All Departments', 'education-connect'),
        'parent_item'       => __('Parent Department', 'education-connect'),
        'parent_item_colon' => __('Parent Department:', 'education-connect'),
        'edit_item'         => __('Edit Department', 'education-connect'),
        'update_item'       => __('Update Department', 'education-connect'),
        'add_new_item'      => __('Add New Department', 'education-connect'),
        'new_item_name'     => __('New Department Name', 'education-connect'),
        'menu_name'         => __('Department', 'education-connect'),
    );

    $team_depart_args = array(
        'hierarchical'      => true,
        'labels'            => $team_depart_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
//		'rewrite'           => array('slug'           => 'team-department'),
    );

    register_taxonomy('team-department', array('courses'), $team_depart_args);

    // Add new taxonomy for courses
	$subject_cat_labels = array(
		'name'              => _x('Course Categories', 'taxonomy general name', 'education-connect'),
		'singular_name'     => _x('Course Category', 'taxonomy singular name', 'education-connect'),
		'search_items'      => __('Search Course Categories', 'education-connect'),
		'all_items'         => __('All Course Categories', 'education-connect'),
		'parent_item'       => __('Parent Course Category', 'education-connect'),
		'parent_item_colon' => __('Parent Course Category:', 'education-connect'),
		'edit_item'         => __('Edit Course Category', 'education-connect'),
		'update_item'       => __('Update Course Category', 'education-connect'),
		'add_new_item'      => __('Add New Course Category', 'education-connect'),
		'new_item_name'     => __('New Course Category Name', 'education-connect'),
		'menu_name'         => __('Course Category', 'education-connect'),
	);

	$subject_cat_args = array(
		'hierarchical'      => true,
		'labels'            => $subject_cat_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
//		'rewrite'           => array('slug'           => 'course-category'),
	);

	register_taxonomy('course-category', array('courses'), $subject_cat_args);

}
add_action('init', 'education_connect_courses_post_type', 0);