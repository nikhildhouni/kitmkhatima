<?php
/*
 * Creating a function to create our CPT
 */

function education_connect_testimonials_post_type() {
	$education_connect_setting_option = get_option('education_connect_setting_option');
	$testimonial_post_type_description = isset($education_connect_setting_option['testimonial_post_type_description']) ? $education_connect_setting_option['testimonial_post_type_description'] : '';
	// Set UI labels for Custom Post Type
	$testimonials_labels = array(
		'name'               => _x('Testimonials', 'post type general name', 'education-connect'),
		'singular_name'      => _x('Testimonial', 'post type singular name', 'education-connect'),
		'menu_name'          => _x('EC Testimonials', 'admin menu', 'education-connect'),
		'name_admin_bar'     => _x('Testimonial', 'add new on admin bar', 'education-connect'),
		'add_new'            => _x('Add New', 'Testimonial', 'education-connect'),
		'add_new_item'       => __('Add New Testimonial', 'education-connect'),
		'new_item'           => __('New Testimonial', 'education-connect'),
		'edit_item'          => __('Edit Testimonial', 'education-connect'),
		'view_item'          => __('View Testimonial', 'education-connect'),
		'all_items'          => __('All Testimonials', 'education-connect'),
		'search_items'       => __('Search Testimonials', 'education-connect'),
		'parent_item_colon'  => __('Parent Testimonials:', 'education-connect'),
		'not_found'          => __('No Testimonials Found.', 'education-connect'),
		'not_found_in_trash' => __('No Testimonials Found in Trash.', 'education-connect')
	);

	// Set other options for Custom Post Type
	$testimonials_args = array(
		'labels'             => $testimonials_labels,
		'description'        => $testimonial_post_type_description,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
//		'rewrite'            => array('slug'            => 'testimonials', 'with_front'            => false),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-megaphone',
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
	);

	// Registering your Custom Post Type
	register_post_type('testimonials', $testimonials_args);
	// Add new taxonomy for testimonials
	$testimonials_cat_labels = array(
		'name'              => _x('Testimonial Categories', 'taxonomy general name', 'education-connect'),
		'singular_name'     => _x('Testimonial Category', 'taxonomy singular name', 'education-connect'),
		'search_items'      => __('Search Testimonial Categories', 'education-connect'),
		'all_items'         => __('All Testimonial Categories', 'education-connect'),
		'parent_item'       => __('Parent Testimonial Category', 'education-connect'),
		'parent_item_colon' => __('Parent Testimonial Category:', 'education-connect'),
		'edit_item'         => __('Edit Testimonial Category', 'education-connect'),
		'update_item'       => __('Update Testimonial Category', 'education-connect'),
		'add_new_item'      => __('Add New Testimonial Category', 'education-connect'),
		'new_item_name'     => __('New Testimonial Category Name', 'education-connect'),
		'menu_name'         => __('Testimonial Category', 'education-connect'),
	);

	$testimonials_cat_args = array(
		'hierarchical'      => true,
		'labels'            => $testimonials_cat_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
//		'rewrite'           => array('slug'           => 'testimonials-category'),
	);

	register_taxonomy('testimonials-category', array('testimonials'), $testimonials_cat_args);
}
add_action('init', 'education_connect_testimonials_post_type', 0);