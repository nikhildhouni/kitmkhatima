<?php

/**
 * Theme Options Panel.
 *
 * @package education-x
 */

$default = education_x_get_default_theme_options();

// Add Theme Options Panel.
$wp_customize->add_panel('theme_option_panel',
	array(
		'title'      => esc_html__('Theme Options', 'education-x-pro'),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);

// Add Theme Options Panel.
$wp_customize->add_panel('theme_homepage_section',
	array(
		'title'      => esc_html__('Homepage Options', 'education-x-pro'),
		'priority'   => 190,
		'capability' => 'edit_theme_options',
	)
);
// Add Page Template Panel.
$wp_customize->add_section('theme_contact_page_section',
	array(
		'title'      => esc_html__('Contact Page Options', 'education-x-pro'),
		'priority'   => 195,
		'capability' => 'edit_theme_options',
	)
);

// our header Main Section.
$wp_customize->add_section('header_section_settings',
	array(
		'title'      => esc_html__('Header Options', 'education-x-pro'),
		'priority'   => 5,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting - top_header_location.
$wp_customize->add_setting('top_header_location',
	array(
		'default'           => $default['top_header_location'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('top_header_location',
	array(
		'label'    => esc_html__('Location', 'education-x-pro'),
		'section'  => 'header_section_settings',
		'type'     => 'text',
		'priority' => 100,

	)
);

// Setting - top_header_telephone.
$wp_customize->add_setting('top_header_telephone',
	array(
		'default'           => $default['top_header_telephone'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('top_header_telephone',
	array(
		'label'    => esc_html__('Contact Number', 'education-x-pro'),
		'section'  => 'header_section_settings',
		'type'     => 'text',
		'priority' => 90,

	)
);

// Setting - top_header_email.
$wp_customize->add_setting('top_header_email',
	array(
		'default'           => $default['top_header_email'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_email',
	)
);
$wp_customize->add_control('top_header_email',
	array(
		'label'    => esc_html__('Email Address', 'education-x-pro'),
		'section'  => 'header_section_settings',
		'type'     => 'text',
		'priority' => 95,

	)
);

$wp_customize->add_setting('enable_nav_overlay',
    array(
        'default'           => $default['enable_nav_overlay'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_nav_overlay',
    array(
        'label'    => esc_html__('Enable Nav Overlay', 'education-x-pro'),
        'section'  => 'header_section_settings',
        'type'     => 'checkbox',
        'priority' => 100,
    )
);

$wp_customize->add_setting('enable_header_contact_section',
    array(
        'default'           => $default['enable_header_contact_section'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_header_contact_section',
    array(
        'label'    => esc_html__('Enable Header Contact Section', 'education-x-pro'),
        'section'  => 'header_section_settings',
        'type'     => 'checkbox',
        'priority' => 10,
    )
);

// Slider Main Section.
$wp_customize->add_section('slider_section_settings',
	array(
		'title'      => esc_html__('Slider Section Settings', 'education-x-pro'),
		'priority'   => 60,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_homepage_section',
	)
);

// Setting - show_slider_section.
$wp_customize->add_setting('show_slider_section',
	array(
		'default'           => $default['show_slider_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('show_slider_section',
	array(
		'label'    => esc_html__('Enable Slider', 'education-x-pro'),
		'section'  => 'slider_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);


// Setting - banner_overlay_slider.
$wp_customize->add_setting('banner_overlay_slider',
	array(
		'default'           => $default['banner_overlay_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('banner_overlay_slider',
	array(
		'label'    => esc_html__('Enable Slider Overlay', 'education-x-pro'),
		'section'  => 'slider_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);
/*No of Slider*/
$wp_customize->add_setting('number_of_home_slider',
	array(
		'default'           => $default['number_of_home_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control('number_of_home_slider',
	array(
		'label'       => __('Select no of Slider', 'education-x-pro'),
		'description' => __('If you are using selection "from page" option please refresh to get actual no of page(max 3)', 'education-x-pro'),
		'section'     => 'slider_section_settings',
		'choices'     => array(
			'1'          => __('1', 'education-x-pro'),
			'2'          => __('2', 'education-x-pro'),
			'3'          => __('3', 'education-x-pro')
		),
		'type'     => 'select',
		'priority' => 105,
	)
);

/*content excerpt in Slider*/
$wp_customize->add_setting('number_of_content_home_slider',
	array(
		'default'           => $default['number_of_content_home_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_positive_integer',
	)
);
$wp_customize->add_control('number_of_content_home_slider',
	array(
		'label'       => __('Select no of words in Slides', 'education-x-pro'),
		'section'     => 'slider_section_settings',
		'type'        => 'number',
		'priority'    => 110,
		'input_attrs' => array('min' => 1, 'max' => 200, 'style' => 'width: 150px;'),

	)
);

// Setting - select_slider_from.
$wp_customize->add_setting('select_slider_from',
	array(
		'default'           => $default['select_slider_from'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control('select_slider_from',
	array(
		'label'          => __('Select Slides From', 'education-x-pro'),
		'section'        => 'slider_section_settings',
		'type'           => 'select',
		'choices'        => array(
			'from-page'     => __('Page', 'education-x-pro'),
			'from-category' => __('Category', 'education-x-pro')
		),
		'priority' => 110,
	)
);

for ($i = 1; $i <= education_x_get_option('number_of_home_slider'); $i++) {
	$wp_customize->add_setting('select_page_for_slider_'.$i, array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'education_x_sanitize_dropdown_pages',
		));

	$wp_customize->add_control('select_page_for_slider_'.$i, array(
			'input_attrs' => array(
				'style'      => 'width: 50px;',
			),
			'label'           => __('Slides From Page', 'education-x-pro').' - '.$i,
			'priority'        => '120'.$i,
			'section'         => 'slider_section_settings',
			'type'            => 'dropdown-pages',
			'priority'        => 120,
			'active_callback' => 'education_x_is_select_page_slider',
		)
	);
}

// Setting - drop down category for slider.
$wp_customize->add_setting('select_category_for_slider',
	array(
		'default'           => $default['select_category_for_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(new Education_X_Dropdown_Taxonomies_Control($wp_customize, 'select_category_for_slider',
		array(
			'label'           => __('Category for Slides', 'education-x-pro'),
			'description'     => __('Select category to be shown on slider ', 'education-x-pro'),
			'section'         => 'slider_section_settings',
			'type'            => 'dropdown-taxonomies',
			'taxonomy'        => 'category',
			'priority'        => 130,
			'active_callback' => 'education_x_is_select_cat_slider',

		)));

/*Button Text*/
$wp_customize->add_setting('button_text_on_slider',
	array(
		'default'           => $default['button_text_on_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('button_text_on_slider',
	array(
		'label'       => __('Button Text', 'education-x-pro'),
		'description' => __('Removing text will disable button on the slider', 'education-x-pro'),
		'section'     => 'slider_section_settings',
		'type'        => 'text',
		'priority'    => 170,
	)
);

/*Button Text*/
$wp_customize->add_setting('additional_button_text_on_slider',
	array(
		'default'           => $default['additional_button_text_on_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('additional_button_text_on_slider',
	array(
		'label'       => __('Additional Button Text', 'education-x-pro'),
		'description' => __('Removing text will disable button on the slider', 'education-x-pro'),
		'section'     => 'slider_section_settings',
		'type'        => 'text',
		'priority'    => 170,
	)
);

$wp_customize->add_setting('additional_button_url_on_slider',
	array(
		'default'           => $default['additional_button_url_on_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control('additional_button_url_on_slider',
	array(
		'label'       => __('Additional Button URL', 'education-x-pro'),
		'section'     => 'slider_section_settings',
		'type'        => 'text',
		'priority'    => 170,
	)
);
// end of slider

$wp_customize->add_section('featured_search_section_settings',
	array(
		'title'      => esc_html__('Search Section Settings', 'education-x-pro'),
		'priority'   => 60,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_homepage_section',
	)
);

// Setting - show_search_section.
$wp_customize->add_setting('show_search_section',
    array(
        'default'           => $default['show_search_section'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_checkbox',
    )
);
$wp_customize->add_control('show_search_section',
    array(
        'label'    => esc_html__('Enable Search Section', 'education-x-pro'),
        'description' => __('Note: If our plugin Education Connect is active the category will be displayed form Course post types', 'education-x-pro'),
        'section'  => 'featured_search_section_settings',
        'type'     => 'checkbox',
        'priority' => 5,
    )
);

$wp_customize->add_setting('search_section_title',
    array(
        'default'           => $default['search_section_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('search_section_title',
    array(
        'label'       => __('Section Title', 'education-x-pro'),
        'section'     => 'featured_search_section_settings',
        'type'        => 'text',
        'priority'    => 7,
    )
);
//$wp_customize->add_setting('show_search_bar',
//    array(
//        'default'           => $default['show_search_bar'],
//        'capability'        => 'edit_theme_options',
//        'sanitize_callback' => 'education_x_sanitize_checkbox',
//    )
//);
//$wp_customize->add_control('show_search_bar',
//    array(
//        'label'    => esc_html__('Enable Search Field', 'education-x-pro'),
//        'section'  => 'featured_search_section_settings',
//        'type'     => 'checkbox',
//        'priority' => 9,
//        'priority' => 9,
//    )
//);

/*content excerpt in search category section*/
$wp_customize->add_setting('number_of_content_home_search',
    array(
        'default'           => $default['number_of_content_home_search'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_positive_integer',
    )
);
$wp_customize->add_control('number_of_content_home_search',
    array(
        'label'       => __('Select no of Category to display', 'education-x-pro'),
        'section'     => 'featured_search_section_settings',
        'type'        => 'number',
        'priority'    => 9,
        'input_attrs' => array('min' => 1, 'max' => 20, 'style' => 'width: 150px;'),

    )
);
if (class_exists('Education_Connect') && post_type_exists('courses')) {
    $education_content_courses_tax = 'course-category';
} else {
    $education_content_courses_tax = 'category';
}
for ($i = 1; $i <= education_x_get_option('number_of_content_home_search'); $i++) {
    $wp_customize->add_setting('select_cat_for_search_'.$i, array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control(new Education_X_Dropdown_Taxonomies_Control($wp_customize, 'select_cat_for_search_'.$i,
        array(
            'input_attrs' => array(
                'style'      => 'width: 50px;',
            ),
            'label'           => __('Select Category to Display ', 'education-x-pro').' - '.$i,
            'priority'        => '1'.$i,
            'section'         => 'featured_search_section_settings',
            'description'     => __('Select category to be shown on Listings ', 'education-x-pro'),
            'type'            => 'dropdown-taxonomies',
            'taxonomy'        => $education_content_courses_tax,
        )
    ));
}

/*Button Text*/
$wp_customize->add_setting('button_text_on_search',
    array(
        'default'           => $default['button_text_on_search'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('button_text_on_search',
    array(
        'label'       => __('Button Text', 'education-x-pro'),
        'description' => __('Removing text will disable button on the Search Section', 'education-x-pro'),
        'section'     => 'featured_search_section_settings',
        'type'        => 'text',
        'priority'    => 30,
    )
);
$wp_customize->add_setting('button_button_link',
    array(
        'default'           => $default['button_button_link'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control('button_button_link',
    array(
        'label'    => __('URL Link', 'education-x-pro'),
        'section'  => 'featured_search_section_settings',
        'type'     => 'text',
        'priority' => 40,
    )
);

// Setting - .
$wp_customize->add_section('our_featured_section_settings',
	array(
		'title'      => esc_html__('Featured Section Settings', 'education-x-pro'),
		'priority'   => 70,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_homepage_section',
	)
);

$wp_customize->add_setting('show_our_featured_section',
	array(
		'default'           => $default['show_our_featured_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('show_our_featured_section',
	array(
		'label'    => esc_html__('Enable Our Featured Section', 'education-x-pro'),
		'section'  => 'our_featured_section_settings',
		'type'     => 'checkbox',
		'priority' => 90,
	)
);

// Setting - show-callback-section.
$wp_customize->add_setting('select_our_featured_page',
	array(
		'default'           => $default['select_our_featured_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_dropdown_pages',
	)
);
$wp_customize->add_control('select_our_featured_page',
	array(
		'label'    => esc_html__('Select Featrured Page', 'education-x-pro'),
		'section'  => 'our_featured_section_settings',
		'type'     => 'dropdown-pages',
		'priority' => 130,
	)
);

/*content excerpt in callback*/
$wp_customize->add_setting('number_of_content_our_featured',
	array(
		'default'           => $default['number_of_content_our_featured'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_positive_integer',
	)
);
$wp_customize->add_control('number_of_content_our_featured',
	array(
		'label'       => __('Select words number for Featured Page', 'education-x-pro'),
		'section'     => 'our_featured_section_settings',
		'type'        => 'number',
		'priority'    => 130,
		'input_attrs' => array('min' => 1, 'max' => 500, 'style' => 'width: 150px;'),

	)
);

// Setting .
$wp_customize->add_setting('show_featured_page_link_button',
	array(
		'default'           => $default['show_featured_page_link_button'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('show_featured_page_link_button',
	array(
		'label'    => esc_html__('Enable Page Link Button', 'education-x-pro'),
		'section'  => 'our_featured_section_settings',
		'type'     => 'checkbox',
		'priority' => 140,
	)
);

/*button text*/
$wp_customize->add_setting('featured_page_button_text',
	array(
		'default'           => $default['featured_page_button_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('featured_page_button_text',
	array(
		'label'       => __('Additional Button Text', 'education-x-pro'),
		'description' => __('Removing the text from this section will disable the custom button on callback section', 'education-x-pro'),
		'section'     => 'our_featured_section_settings',
		'type'        => 'text',
		'priority'    => 150,
	)
);

/*button url*/
$wp_customize->add_setting('featured_page_button_link',
	array(
		'default'           => $default['featured_page_button_link'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control('featured_page_button_link',
	array(
		'label'    => __('Additonla Button URL', 'education-x-pro'),
		'section'  => 'our_featured_section_settings',
		'type'     => 'text',
		'priority' => 160,
	)
);


// about section
$wp_customize->add_section('about_section_settings',
	array(
		'title'      => esc_html__('About Section Settings', 'education-x-pro'),
		'priority'   => 70,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_homepage_section',
	)
);

// Setting - show_about_section.
$wp_customize->add_setting('show_about_section',
	array(
		'default'           => $default['show_about_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('show_about_section',
	array(
		'label'    => esc_html__('Enable About Section', 'education-x-pro'),
		'section'  => 'about_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - show-about-section.
$wp_customize->add_setting('select_about_main_page',
	array(
		'default'           => $default['select_about_main_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_dropdown_pages',
	)
);
$wp_customize->add_control('select_about_main_page',
	array(
		'label'    => esc_html__('Select Introduction Page', 'education-x-pro'),
		'section'  => 'about_section_settings',
		'type'     => 'dropdown-pages',
		'priority' => 110,
	)
);

/*content excerpt in About*/
$wp_customize->add_setting('number_of_content_home_about',
	array(
		'default'           => $default['number_of_content_home_about'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_positive_integer',
	)
);
$wp_customize->add_control('number_of_content_home_about',
	array(
		'label'       => __('No of words for Introduction Page', 'education-x-pro'),
		'section'     => 'about_section_settings',
		'type'        => 'number',
		'priority'    => 110,
		'input_attrs' => array('min' => 0, 'max' => 200, 'style' => 'width: 150px;'),

	)
);
$wp_customize->add_setting('select_category_for_about',
	array(
		'default'           => $default['select_category_for_about'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(new Education_X_Dropdown_Taxonomies_Control($wp_customize, 'select_category_for_about',
		array(
			'label'       => __('Select Category for Featured Block', 'education-x-pro'),
			'description' => __('Select category to be shown as featured page below about section', 'education-x-pro'),
			'section'     => 'about_section_settings',
			'type'        => 'dropdown-taxonomies',
			'taxonomy'    => 'category',
			'priority'    => 130,
		)));

// Setting - show-about-section.
$wp_customize->add_setting('select_about_secondary_page',
	array(
		'default'           => $default['select_about_secondary_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_dropdown_pages',
	)
);
$wp_customize->add_control('select_about_secondary_page',
	array(
		'label'    => esc_html__('Select Page for Parallax Section', 'education-x-pro'),
		'section'  => 'about_section_settings',
		'type'     => 'dropdown-pages',
		'priority' => 140,
	)
);
$wp_customize->add_setting('number_of_content_home_sec_about',
	array(
		'default'           => $default['number_of_content_home_sec_about'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_positive_integer',
	)
);
$wp_customize->add_control('number_of_content_home_sec_about',
	array(
		'label'       => __('No of words for Parallax Section', 'education-x-pro'),
        'description' => __('Note: If our plugin Education Connect is active the category will be displayed form Course post types', 'education-x-pro'),
        'section'     => 'about_section_settings',
		'type'        => 'number',
		'priority'    => 140,
		'input_attrs' => array('min' => 0, 'max' => 200, 'style' => 'width: 150px;'),

	)
);
if (class_exists('Education_Connect') && post_type_exists('courses')) {
    $education_content_course_tax = 'course-category';
} else {
    $education_content_course_tax = 'category';
}
$wp_customize->add_setting('select_category_sec_about',
	array(
		'default'           => $default['select_category_sec_about'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(new Education_X_Dropdown_Taxonomies_Control($wp_customize, 'select_category_sec_about',
		array(
			'label'       => __('Select Category For Courses', 'education-x-pro'),
			'description' => __('Select category to be shown as featured page below about section', 'education-x-pro'),
			'section'     => 'about_section_settings',
			'type'        => 'dropdown-taxonomies',
			'taxonomy'    => $education_content_course_tax,
			'priority'    => 150,
		)));

// our callback Main Section.
$wp_customize->add_section('callback_section_settings',
	array(
		'title'      => esc_html__('Callback Section Settings', 'education-x-pro'),
		'priority'   => 75,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_homepage_section',
	)
);

// Setting - .
$wp_customize->add_setting('show_our_callback_section',
	array(
		'default'           => $default['show_our_callback_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('show_our_callback_section',
	array(
		'label'    => esc_html__('Enable Callback Section', 'education-x-pro'),
		'section'  => 'callback_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - show-callback-section.
$wp_customize->add_setting('select_callback_page',
	array(
		'default'           => $default['select_callback_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_dropdown_pages',
	)
);
$wp_customize->add_control('select_callback_page',
	array(
		'label'    => esc_html__('Select Callback Page', 'education-x-pro'),
		'section'  => 'callback_section_settings',
		'type'     => 'dropdown-pages',
		'priority' => 130,
	)
);

/*content excerpt in callback*/
$wp_customize->add_setting('number_of_content_home_callback',
	array(
		'default'           => $default['number_of_content_home_callback'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_positive_integer',
	)
);
$wp_customize->add_control('number_of_content_home_callback',
	array(
		'label'       => __('Select no words of Callback', 'education-x-pro'),
		'section'     => 'callback_section_settings',
		'type'        => 'number',
		'priority'    => 130,
		'input_attrs' => array('min' => 1, 'max' => 500, 'style' => 'width: 150px;'),

	)
);

// Setting .
$wp_customize->add_setting('show_page_link_button',
	array(
		'default'           => $default['show_page_link_button'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('show_page_link_button',
	array(
		'label'    => esc_html__('Enable Page Link Button', 'education-x-pro'),
		'section'  => 'callback_section_settings',
		'type'     => 'checkbox',
		'priority' => 140,
	)
);

/*button text*/
$wp_customize->add_setting('callback_button_text',
	array(
		'default'           => $default['callback_button_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('callback_button_text',
	array(
		'label'       => __('Callback Button Text', 'education-x-pro'),
		'description' => __('Removing the text from this section will disable the custom button on callback section', 'education-x-pro'),
		'section'     => 'callback_section_settings',
		'type'        => 'text',
		'priority'    => 150,
	)
);

/*button url*/
$wp_customize->add_setting('callback_button_link',
	array(
		'default'           => $default['callback_button_link'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control('callback_button_link',
	array(
		'label'    => __('URL Link', 'education-x-pro'),
		'section'  => 'callback_section_settings',
		'type'     => 'text',
		'priority' => 160,
	)
);

// our Tab Main Section.
$wp_customize->add_section('tab_section_settings',
	array(
		'title'      => esc_html__('Blog/Event Tab Section Settings', 'education-x-pro'),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_homepage_section',
	)
);

// Setting - .
$wp_customize->add_setting('show_blog_event_tab_section',
	array(
		'default'           => $default['show_blog_event_tab_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('show_blog_event_tab_section',
	array(
		'label'       => esc_html__('Enable Blog/Event Section', 'education-x-pro'),
		'description' => __('Note: If our plugin Education Connect is active the category will be displayed form event post types', 'education-x-pro'),

		'section'  => 'tab_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

$wp_customize->add_setting('blog_title_text',
	array(
		'default'           => $default['blog_title_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('blog_title_text',
	array(
		'label'    => __('Blog Title Text', 'education-x-pro'),
		'section'  => 'tab_section_settings',
		'type'     => 'text',
		'priority' => 110,
	)
);

$wp_customize->add_setting('number_of_content_home_blog',
	array(
		'default'           => $default['number_of_content_home_blog'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_positive_integer',
	)
);
$wp_customize->add_control('number_of_content_home_blog',
	array(
		'label'       => __('Select no words for Blog', 'education-x-pro'),
		'section'     => 'tab_section_settings',
		'type'        => 'number',
		'priority'    => 110,
		'input_attrs' => array('min' => 1, 'max' => 200, 'style' => 'width: 150px;'),

	)
);

$wp_customize->add_setting('select_category_blog_event_tab',
	array(
		'default'           => $default['select_category_blog_event_tab'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(new Education_X_Dropdown_Taxonomies_Control($wp_customize, 'select_category_blog_event_tab',
		array(
			'label'       => __('Category For Blog Tab', 'education-x-pro'),
			'description' => __('Select category to be shown as blogs', 'education-x-pro'),
			'section'     => 'tab_section_settings',
			'type'        => 'dropdown-taxonomies',
			'taxonomy'    => 'category',
			'priority'    => 120,
		)));

$wp_customize->add_setting('event_title_text',
	array(
		'default'           => $default['event_title_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('event_title_text',
	array(
		'label'    => __('Event Title Text', 'education-x-pro'),
		'section'  => 'tab_section_settings',
		'type'     => 'text',
		'priority' => 130,
	)
);

$wp_customize->add_setting('number_of_content_home_event',
	array(
		'default'           => $default['number_of_content_home_event'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_positive_integer',
	)
);
$wp_customize->add_control('number_of_content_home_event',
	array(
		'label'       => __('Select no words for Events', 'education-x-pro'),
		'section'     => 'tab_section_settings',
		'type'        => 'number',
		'priority'    => 130,
		'input_attrs' => array('min' => 1, 'max' => 200, 'style' => 'width: 150px;'),

	)
);

if (class_exists('Education_Connect') && post_type_exists('events')) {
	$education_content_event_tax = 'event-category';
} else {
	$education_content_event_tax = 'category';
}
$wp_customize->add_setting('select_category_event_tab',
	array(
		'default'           => $default['select_category_event_tab'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(new Education_X_Dropdown_Taxonomies_Control($wp_customize, 'select_category_event_tab',
		array(
			'label'    => __('Category For Event Tab', 'education-x-pro'),
			'section'  => 'tab_section_settings',
			'type'     => 'dropdown-taxonomies',
			'taxonomy' => $education_content_event_tax,
			'priority' => 150,
		)));

// testimonial Main Section.
$wp_customize->add_section('testimonial_section_settings',
	array(
		'title'      => __('Testimonial Section Settings', 'education-x-pro'),
		'priority'   => 80,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_homepage_section',
	)
);

// Setting - show-testimonial-section.
$wp_customize->add_setting('show_testimonial_section',
	array(
		'default'           => $default['show_testimonial_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('show_testimonial_section',
	array(
		'label'       => __('Enable Testimonial', 'education-x-pro'),
		'description' => __('Note: If our plugin Education Connect is active the category will be displayed form testimonial post types', 'education-x-pro'),

		'section'  => 'testimonial_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - title_testimonial_section.
$wp_customize->add_setting('title_testimonial_section',
	array(
		'default'           => $default['title_testimonial_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('title_testimonial_section',
	array(
		'label'    => __('Section Title', 'education-x-pro'),
		'section'  => 'testimonial_section_settings',
		'type'     => 'text',
		'priority' => 104,
	)
);

// Setting testimonial_section_background_image.
$wp_customize->add_setting('testimonial_section_background_image',
	array(
		'default'           => $default['testimonial_section_background_image'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_image',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control($wp_customize, 'testimonial_section_background_image',
		array(
			'label'       => __('Testimonial Section Background Image.', 'education-x-pro'),
			'description' => sprintf(__('Recommended Size %1$dpx X %2$dpx', 'education-x-pro'), 1920, 1080),
			'section'     => 'testimonial_section_settings',
			'priority'    => 104,

		)
	)
);

/*No of testimonial*/
$wp_customize->add_setting('number_of_home_testimonial',
	array(
		'default'           => $default['number_of_home_testimonial'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control('number_of_home_testimonial',
	array(
		'label'       => __('Select no of testimonial', 'education-x-pro'),
		'description' => __('If you are using selection "from page" option please refresh to get actual no of page', 'education-x-pro'),
		'section'     => 'testimonial_section_settings',
		'choices'     => array(
			'1'          => __('1', 'education-x-pro'),
			'2'          => __('2', 'education-x-pro'),
			'3'          => __('3', 'education-x-pro'),
		),
		'type'     => 'select',
		'priority' => 105,
	)
);

/*content excerpt in testimonial*/
$wp_customize->add_setting('number_of_content_home_testimonial',
	array(
		'default'           => $default['number_of_content_home_testimonial'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_positive_integer',
	)
);
$wp_customize->add_control('number_of_content_home_testimonial',
	array(
		'label'       => __('Select no words of testimonial', 'education-x-pro'),
		'section'     => 'testimonial_section_settings',
		'type'        => 'number',
		'priority'    => 110,
		'input_attrs' => array('min' => 1, 'max' => 200, 'style' => 'width: 150px;'),

	)
);

// Setting - select_testimonial_from.
$wp_customize->add_setting('select_testimonial_from',
	array(
		'default'           => $default['select_testimonial_from'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control('select_testimonial_from',
	array(
		'label'          => __('Select testimonial From', 'education-x-pro'),
		'section'        => 'testimonial_section_settings',
		'type'           => 'select',
		'choices'        => array(
			'from-page'     => __('Page', 'education-x-pro'),
			'from-category' => __('Category', 'education-x-pro')
		),
		'priority' => 110,
	)
);

for ($i = 1; $i <= education_x_get_option('number_of_home_testimonial'); $i++) {
	$wp_customize->add_setting('select_page_for_testimonial_'.$i, array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'education_x_sanitize_dropdown_pages',

		));

	$wp_customize->add_control('select_page_for_testimonial_'.$i, array(
			'input_attrs' => array(
				'style'      => 'width: 50px;',
			),
			'label'           => __('Testimonial From Page', 'education-x-pro').' - '.$i,
			'priority'        => '120'.$i,
			'section'         => 'testimonial_section_settings',
			'type'            => 'dropdown-pages',
			'priority'        => 120,
			'active_callback' => 'education_x_is_select_page_testimonial',
		)
	);
}
if (class_exists('Education_Connect') && post_type_exists('testimonials')) {
	$education_content_testimonial_tax = 'testimonials-category';
} else {
	$education_content_testimonial_tax = 'category';
}
// Setting - drop down category for testimonial.
$wp_customize->add_setting('select_category_for_testimonial',
	array(
		'default'           => $default['select_category_for_testimonial'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(new Education_X_Dropdown_Taxonomies_Control($wp_customize, 'select_category_for_testimonial',
		array(
			'label'           => __('Category for Testimonial ', 'education-x-pro'),
			'description'     => __('Select category to be shown on tab ', 'education-x-pro'),
			'section'         => 'testimonial_section_settings',
			'type'            => 'dropdown-taxonomies',
			'taxonomy'        => $education_content_testimonial_tax,
			'priority'        => 130,
			'active_callback' => 'education_x_is_select_cat_testimonial',

		)));

// Team Main Section.
$wp_customize->add_section('team_section_settings',
	array(
		'title'      => __('Team Section Settings', 'education-x-pro'),
		'priority'   => 90,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_homepage_section',
	)
);

// Setting - show-team-section.
$wp_customize->add_setting('show_team_section',
	array(
		'default'           => $default['show_team_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('show_team_section',
	array(
		'label'       => __('Enable Team', 'education-x-pro'),
		'description' => __('Note: If our plugin Education Connect is active the category will be displayed form team post types', 'education-x-pro'),

		'section'  => 'team_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - title_team_section.
$wp_customize->add_setting('title_team_section',
	array(
		'default'           => $default['title_team_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('title_team_section',
	array(
		'label'    => __('Section Title', 'education-x-pro'),
		'section'  => 'team_section_settings',
		'type'     => 'text',
		'priority' => 104,
	)
);

// Setting - sub_title_team_section.
$wp_customize->add_setting('sub_title_team_section',
	array(
		'default'           => $default['sub_title_team_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('sub_title_team_section',
	array(
		'label'    => __('Section Sub Title', 'education-x-pro'),
		'section'  => 'team_section_settings',
		'type'     => 'text',
		'priority' => 105,
	)
);

/*No of team*/
$wp_customize->add_setting('number_of_home_team',
	array(
		'default'           => $default['number_of_home_team'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control('number_of_home_team',
	array(
		'label'       => __('Select no of team', 'education-x-pro'),
		'description' => __('If you are using selection "from page" option please refresh to get actual no of page', 'education-x-pro'),
		'section'     => 'team_section_settings',
		'choices'     => array(
			'1'          => __('1', 'education-x-pro'),
			'2'          => __('2', 'education-x-pro'),
			'3'          => __('3', 'education-x-pro'),
			'4'          => __('4', 'education-x-pro'),
		),
		'type'     => 'select',
		'priority' => 105,
	)
);
/*content excerpt in team*/
$wp_customize->add_setting('number_of_content_home_team',
	array(
		'default'           => $default['number_of_content_home_team'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_positive_integer',
	)
);
$wp_customize->add_control('number_of_content_home_team',
	array(
		'label'       => __('Select no words of Team', 'education-x-pro'),
		'section'     => 'team_section_settings',
		'type'        => 'number',
		'priority'    => 110,
		'input_attrs' => array('min' => 1, 'max' => 200, 'style' => 'width: 150px;'),

	)
);
// Setting - select_team_from.
$wp_customize->add_setting('select_team_from',
	array(
		'default'           => $default['select_team_from'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control('select_team_from',
	array(
		'label'          => __('Select team From', 'education-x-pro'),
		'section'        => 'team_section_settings',
		'type'           => 'select',
		'choices'        => array(
			'from-page'     => __('Page', 'education-x-pro'),
			'from-category' => __('Category', 'education-x-pro')
		),
		'priority' => 110,
	)
);

for ($i = 1; $i <= education_x_get_option('number_of_home_team'); $i++) {
	$wp_customize->add_setting('select_page_for_team_'.$i, array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'education_x_sanitize_dropdown_pages',

		));

	$wp_customize->add_control('select_page_for_team_'.$i, array(
			'input_attrs' => array(
				'style'      => 'width: 50px;',
			),
			'label'           => __('Team From Page', 'education-x-pro').' - '.$i,
			'priority'        => '120'.$i,
			'section'         => 'team_section_settings',
			'type'            => 'dropdown-pages',
			'priority'        => 120,
			'active_callback' => 'education_x_is_select_page_team',
		)
	);
}

if (class_exists('Education_Connect') && post_type_exists('teams')) {
	$education_content_team_tax = 'team-category';
} else {
	$education_content_team_tax = 'category';
}
// Setting - drop down category for team.
$wp_customize->add_setting('select_category_for_team',
	array(
		'default'           => $default['select_category_for_team'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(new Education_X_Dropdown_Taxonomies_Control($wp_customize, 'select_category_for_team',
		array(
			'label'           => __('Category for Team ', 'education-x-pro'),
			'description'     => __('Select category to be shown on tab ', 'education-x-pro'),
			'section'         => 'team_section_settings',
			'type'            => 'dropdown-taxonomies',
			'taxonomy'        => $education_content_team_tax,
			'priority'        => 130,
			'active_callback' => 'education_x_is_select_cat_team',

		)));


// our Tab Main Section.
$wp_customize->add_section('footer_page_section_settings',
    array(
        'title'      => esc_html__('Footer Call to Action Settings', 'education-x-pro'),
        'priority'   => 210,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_option_panel',
    )
);

// Setting - .
$wp_customize->add_setting('show_footer_page_section',
    array(
        'default'           => $default['show_footer_page_section'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_checkbox',
    )
);
$wp_customize->add_control('show_footer_page_section',
    array(
        'label'       => esc_html__('Enable Footer Fix Section', 'education-x-pro'),
        'section'  => 'footer_page_section_settings',
        'type'     => 'checkbox',
        'priority' => 100,
    )
);


// Setting - show-select_footer_page-section.
$wp_customize->add_setting('select_footer_page',
    array(
        'default'           => $default['select_footer_page'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_dropdown_pages',
    )
);
$wp_customize->add_control('select_footer_page',
    array(
        'label'    => esc_html__('Select Footer Fix Page', 'education-x-pro'),
        'section'  => 'footer_page_section_settings',
        'type'     => 'dropdown-pages',
        'priority' => 130,
    )
);

/*content excerpt in footer page*/
$wp_customize->add_setting('number_of_content_home_footer_page',
    array(
        'default'           => $default['number_of_content_home_footer_page'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_positive_integer',
    )
);
$wp_customize->add_control('number_of_content_home_footer_page',
    array(
        'label'       => __('Select no words for Footer Fix Section', 'education-x-pro'),
        'section'     => 'footer_page_section_settings',
        'type'        => 'number',
        'priority'    => 130,
        'input_attrs' => array('min' => 1, 'max' => 500, 'style' => 'width: 150px;'),

    )
);

// Setting .
$wp_customize->add_setting('show_footer_fix_page_button',
    array(
        'default'           => $default['show_footer_fix_page_button'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_checkbox',
    )
);
$wp_customize->add_control('show_footer_fix_page_button',
    array(
        'label'    => esc_html__('Enable Fix Page Button', 'education-x-pro'),
        'section'  => 'footer_page_section_settings',
        'type'     => 'checkbox',
        'priority' => 140,
    )
);

/*button text*/
$wp_customize->add_setting('fix_page_button_text',
    array(
        'default'           => $default['fix_page_button_text'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('fix_page_button_text',
    array(
        'label'       => __('Additional Button Text', 'education-x-pro'),
        'description' => __('Removing the text from this section will disable the custom button on callback section', 'education-x-pro'),
        'section'     => 'footer_page_section_settings',
        'type'        => 'text',
        'priority'    => 150,
    )
);

/*button url*/
$wp_customize->add_setting('fix_page_button_link',
    array(
        'default'           => $default['fix_page_button_link'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control('fix_page_button_link',
    array(
        'label'    => __('Additional Button URL Link', 'education-x-pro'),
        'section'  => 'footer_page_section_settings',
        'type'     => 'text',
        'priority' => 160,
    )
);



// Client Main Section.
$wp_customize->add_section( 'client_section_settings',
    array(
        'title'      => esc_html__( 'Client Section', 'education-x-pro' ),
        'priority'   => 100,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_homepage_section',
    )
);


// Setting - show_client_section.
$wp_customize->add_setting( 'show_client_section',
    array(
        'default'           => $default['show_client_section'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_checkbox',
    )
);
$wp_customize->add_control( 'show_client_section',
    array(
        'label'    => esc_html__( 'Enable Affiliation', 'education-x-pro' ),
        'section'  => 'client_section_settings',
        'type'     => 'checkbox',
        'priority' => 100,
    )
);

// Setting client_section_title.
$wp_customize->add_setting( 'client_section_title',
    array(
        'default'           => $default['client_section_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'client_section_title',
    array(
        'label'    => __( 'Section Title', 'education-x-pro' ),
        'section'  => 'client_section_settings',
        'type'     => 'text',
        'priority' => 105,
    )
);


// Setting - client_number.
$wp_customize->add_setting( 'client_numbers',
    array(
        'default'           => $default['client_numbers'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control( 'client_numbers',
    array(
        'label'    =>  __( 'Number of affiliations', 'education-x-pro' ),
        'description'=>  __( 'Please Reload this page to get actual number of input section bellow number range is 1-15 ', 'education-x-pro' ),
        'section'  => 'client_section_settings',
        'type'     => 'number',
        'input_attrs' => array( 'min' => 1, 'max' => 15),
        'priority' => 110,
    )
);

//client image and url
for ( $i=1; $i <=  education_x_get_option( 'client_numbers' ) ; $i++ ) {
    $wp_customize->add_setting( 'upload_image_for_client_'.$i, array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_image',
    ) );
    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize, 'upload_image_for_client_'.$i,
            array(
                'label'             => esc_html__( 'Upload Image/Logo For Affiliation', 'education-x-pro' ) . ' - ' . $i ,
                'section'         => 'client_section_settings',
                'priority'        => 120,
            )
        )
    );

    $wp_customize->add_setting( 'url_for_client_'.$i, array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'url_for_client_'.$i, array(
            'label'             => esc_html__( 'URL For Affiliation', 'education-x-pro' ) . ' - ' . $i ,
            'priority'          =>  '120' . $i,
            'section'           => 'client_section_settings',
            'type'        		=> 'text',
            'priority'    		=> 120,
        )
    );
}



// Client Main Section.
$wp_customize->add_section( 'contact_map_section_settings',
    array(
        'title'      => esc_html__( 'Contact Map Section', 'education-x-pro' ),
        'priority'   => 100,
        'capability' => 'edit_theme_options',
        'panel'      => 'theme_homepage_section',
    )
);


// Setting - show_client_section.
$wp_customize->add_setting( 'show_contact_map_section',
    array(
        'default'           => $default['show_contact_map_section'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_checkbox',
    )
);
$wp_customize->add_control( 'show_contact_map_section',
    array(
        'label'    => esc_html__( 'Enable Map Section', 'education-x-pro' ),
        'section'  => 'contact_map_section_settings',
        'type'     => 'checkbox',
        'priority' => 100,
    )
);

// Setting client_section_title.
$wp_customize->add_setting( 'google_map_shortcode',
    array(
        'default'           => $default['google_map_shortcode'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'google_map_shortcode',
    array(
        'label'    => __( 'Google Map Shortcode', 'education-x-pro' ),
        'section'  => 'contact_map_section_settings',
        'type'     => 'text',
        'priority' => 105,
    )
);



/*layout management section start */
$wp_customize->add_section('theme_option_section_settings',
	array(
		'title'      => esc_html__('Layout Management', 'education-x-pro'),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting social_icon_style.
$wp_customize->add_setting('social_icon_style',
	array(
		'default'           => $default['social_icon_style'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control('social_icon_style',
	array(
		'label'   => esc_html__('Social Icon Style', 'education-x-pro'),
		'section' => 'theme_option_section_settings',
		'type'    => 'select',
		'choices' => array(
			'square' => esc_html__('Square', 'education-x-pro'),
			'circle' => esc_html__('Circle', 'education-x-pro'),
		),
		'priority' => 110,
	)
);

/*Home Page Layout*/
$wp_customize->add_setting('home_page_content_status',
	array(
		'default'           => $default['home_page_content_status'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('home_page_content_status',
	array(
		'label'    => esc_html__('Enable Static Page Content', 'education-x-pro'),
		'section'  => 'static_front_page',
		'type'     => 'checkbox',
		'priority' => 150,
	)
);

/*Home Page Layout*/
$wp_customize->add_setting('enable_overlay_option',
	array(
		'default'           => $default['enable_overlay_option'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('enable_overlay_option',
	array(
		'label'    => esc_html__('Enable Banner Overlay', 'education-x-pro'),
		'section'  => 'theme_option_section_settings',
		'type'     => 'checkbox',
		'priority' => 150,
	)
);

/*Home Page Layout*/
$wp_customize->add_setting('homepage_layout_option',
	array(
		'default'           => $default['homepage_layout_option'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control('homepage_layout_option',
	array(
		'label'       => esc_html__('Home Page Layout', 'education-x-pro'),
		'section'     => 'theme_option_section_settings',
		'choices'     => array(
			'full-width' => esc_html__('Full Width', 'education-x-pro'),
			'boxed'      => esc_html__('Boxed', 'education-x-pro'),
		),
		'type'     => 'select',
		'priority' => 160,
	)
);

/*Global Layout*/
$wp_customize->add_setting('global_layout',
	array(
		'default'           => $default['global_layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control('global_layout',
	array(
		'label'          => esc_html__('Global Layout', 'education-x-pro'),
		'section'        => 'theme_option_section_settings',
		'choices'        => array(
			'right-sidebar' => esc_html__('Content - Primary Sidebar', 'education-x-pro'),
			'left-sidebar'  => esc_html__('Primary Sidebar - Content', 'education-x-pro'),
			'no-sidebar'    => esc_html__('No Sidebar', 'education-x-pro')
		),
		'type'     => 'select',
		'priority' => 170,
	)
);

/*content excerpt in global*/
$wp_customize->add_setting('excerpt_length_global',
	array(
		'default'           => $default['excerpt_length_global'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_positive_integer',
	)
);
$wp_customize->add_control('excerpt_length_global',
	array(
		'label'       => esc_html__('Set Global Archive Length', 'education-x-pro'),
		'section'     => 'theme_option_section_settings',
		'type'        => 'number',
		'priority'    => 175,
		'input_attrs' => array('min' => 1, 'max' => 200, 'style' => 'width: 150px;'),

	)
);

/*Archive Layout text*/
$wp_customize->add_setting('archive_layout',
	array(
		'default'           => $default['archive_layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control('archive_layout',
	array(
		'label'         => esc_html__('Archive Layout', 'education-x-pro'),
		'section'       => 'theme_option_section_settings',
		'choices'       => array(
			'excerpt-only' => esc_html__('Excerpt Only', 'education-x-pro'),
			'full-post'    => esc_html__('Full Post', 'education-x-pro'),
		),
		'type'     => 'select',
		'priority' => 180,
	)
);

/*Archive Layout image*/
$wp_customize->add_setting('archive_layout_image',
	array(
		'default'           => $default['archive_layout_image'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control('archive_layout_image',
	array(
		'label'     => esc_html__('Archive Image Alocation', 'education-x-pro'),
		'section'   => 'theme_option_section_settings',
		'choices'   => array(
			'full'     => esc_html__('Full', 'education-x-pro'),
			'right'    => esc_html__('Right', 'education-x-pro'),
			'left'     => esc_html__('Left', 'education-x-pro'),
		),
		'type'     => 'select',
		'priority' => 185,
	)
);

/*single post Layout image*/
$wp_customize->add_setting('single_post_meta_data',
	array(
		'default'           => $default['single_post_meta_data'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('single_post_meta_data',
    array(
        'label'    => esc_html__('Enable Single Header Meta Data', 'education-x-pro'),
        'section'  => 'theme_option_section_settings',
        'type'     => 'checkbox',
        'priority' => 200,
    )
);

$wp_customize->add_setting('single_post_image_layout',
    array(
        'default'           => $default['single_post_image_layout'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_select',
    )
);
$wp_customize->add_control('single_post_image_layout',
    array(
        'label'     => esc_html__('Single Post/Page Image Alocation', 'education-x-pro'),
        'section'   => 'theme_option_section_settings',
        'choices'   => array(
            'full'     => esc_html__('Full', 'education-x-pro'),
            'right'    => esc_html__('Right', 'education-x-pro'),
            'left'     => esc_html__('Left', 'education-x-pro'),
            'no-image' => esc_html__('No image', 'education-x-pro')
        ),
        'type'     => 'select',
        'priority' => 190,
    )
);
// Pagination Section.
$wp_customize->add_section('pagination_section',
	array(
		'title'      => esc_html__('Pagination Options', 'education-x-pro'),
		'priority'   => 110,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting pagination_type.
$wp_customize->add_setting('pagination_type',
	array(
		'default'           => $default['pagination_type'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control('pagination_type',
	array(
		'label'    => esc_html__('Pagination Type', 'education-x-pro'),
		'section'  => 'pagination_section',
		'type'     => 'select',
		'choices'  => array(
			'default' => esc_html__('Default (Older / Newer Post)', 'education-x-pro'),
			'numeric' => esc_html__('Numeric', 'education-x-pro'),
		),
		'priority' => 100,
	)
);

// Footer Section.
$wp_customize->add_section('footer_section',
	array(
		'title'      => esc_html__('Footer Options', 'education-x-pro'),
		'priority'   => 130,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting social_content_heading.
$wp_customize->add_setting('number_of_footer_widget',
	array(
		'default'           => $default['number_of_footer_widget'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control('number_of_footer_widget',
	array(
		'label'    => esc_html__('Number Of Footer Widget', 'education-x-pro'),
		'section'  => 'footer_section',
		'type'     => 'select',
		'priority' => 100,
		'choices'  => array(
			0         => esc_html__('Disable footer sidebar area', 'education-x-pro'),
			1         => esc_html__('1', 'education-x-pro'),
			2         => esc_html__('2', 'education-x-pro'),
			3         => esc_html__('3', 'education-x-pro'),
		),
	)
);

$wp_customize->add_setting('enable_copyright_credit',
	array(
		'default'           => $default['enable_copyright_credit'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('enable_copyright_credit',
	array(
		'label'    => esc_html__('Enable Copyright Footer Credit', 'education-x-pro'),
		'section'  => 'footer_section',
		'type'     => 'checkbox',
		'priority' => 150,
	)
);
// Setting copyright_text.
$wp_customize->add_setting('copyright_text',
	array(
		'default'           => $default['copyright_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('copyright_text',
	array(
		'label'    => esc_html__('Footer Copyright Text', 'education-x-pro'),
		'section'  => 'footer_section',
		'type'     => 'text',
		'priority' => 120,
	)
);

// Breadcrumb Section.
$wp_customize->add_section('breadcrumb_section',
	array(
		'title'      => esc_html__('Breadcrumb Options', 'education-x-pro'),
		'priority'   => 120,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting('breadcrumb_type',
	array(
		'default'           => $default['breadcrumb_type'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control('breadcrumb_type',
	array(
		'label'       => esc_html__('Breadcrumb Type', 'education-x-pro'),
		'description' => sprintf(esc_html__('Advanced: Requires %1$sBreadcrumb NavXT%2$s plugin', 'education-x-pro'), '<a href="https://wordpress.org/plugins/breadcrumb-navxt/" target="_blank">', '</a>'),
		'section'     => 'breadcrumb_section',
		'type'        => 'select',
		'choices'     => array(
			'disabled'   => esc_html__('Disabled', 'education-x-pro'),
			'simple'     => esc_html__('Simple', 'education-x-pro'),
			'advanced'   => esc_html__('Advanced', 'education-x-pro'),
		),
		'priority' => 100,
	)
);

// Pageloader Section.
$wp_customize->add_section('pageloader_section',
	array(
		'title'      => esc_html__('Pageloader Options', 'education-x-pro'),
		'priority'   => 120,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting('page_loader_setting',
	array(
		'default'           => $default['page_loader_setting'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('page_loader_setting',
	array(
		'label'       => esc_html__('Enable PageLoader', 'education-x-pro'),
		'section'     => 'pageloader_section',
		'type'        => 'checkbox',
		'priority' => 100,
	)
);


// Contact page Section.
// Setting copyright_text.
$wp_customize->add_setting('contact_form_shortcodes',
    array(
        'default'           => $default['contact_form_shortcodes'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('contact_form_shortcodes',
    array(
        'label'    => esc_html__('Contact Form Shortcode', 'education-x-pro'),
        'section'  => 'theme_contact_page_section',
        'type'     => 'text',
        'priority' => 120,
    )
);

// mailchimp Section.
$wp_customize->add_section('mailchimp_section',
	array(
		'title'      => __('Mailchimp Options', 'education-x-pro'),
		'priority'   => 125,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting('enable_mailchimp',
	array(
		'default'           => $default['enable_mailchimp'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'education_x_sanitize_checkbox',
	)
);
$wp_customize->add_control('enable_mailchimp',
	array(
		'label'    => esc_html__('Enable Mailchimp Subscription', 'education-x-pro'),
		'section'  => 'mailchimp_section',
		'type'     => 'checkbox',
		'priority' => 110,
	)
);

// Setting - mailchimp_shortcode.
$wp_customize->add_setting('mailchimp_shortcode',
	array(
		'default'           => $default['mailchimp_shortcode'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('mailchimp_shortcode',
	array(
		'label'    => esc_html__('Mailchimp Subscription Form Shortcode', 'education-x-pro'),
		'section'  => 'mailchimp_section',
		'type'     => 'textarea',
		'priority' => 160,
	)
);

// Setting - mailchimp_title.
$wp_customize->add_setting('mailchimp_title',
	array(
		'default'           => $default['mailchimp_title'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('mailchimp_title',
	array(
		'label'    => esc_html__('Mailchimp Title', 'education-x-pro'),
		'section'  => 'mailchimp_section',
		'type'     => 'text',
		'priority' => 120,
	)
);

// Setting - mailchimp_bg_color.

$wp_customize->add_setting('mailchimp_bg_color',
    array(
        'default'           => $default['mailchimp_bg_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control ( new WP_Customize_Color_Control( $wp_customize, 'mailchimp_bg_color',
    array(
        'label'    => __( 'Mailchimp Background Color', 'education-x-pro' ),
        'section'  => 'mailchimp_section',
        'type'     => 'color',
        'priority' => 170,
    )
) );

// Setting - mailchimp_font_color.

$wp_customize->add_setting('mailchimp_font_color',
    array(
        'default'           => $default['mailchimp_font_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control ( new WP_Customize_Color_Control( $wp_customize, 'mailchimp_font_color',
    array(
        'label'    => __( 'Mailchimp Font Color', 'education-x-pro' ),
        'section'  => 'mailchimp_section',
        'type'     => 'color',
        'priority' => 170,
    )
) );

// Setting - mailchimp_botton_color.

$wp_customize->add_setting('mailchimp_botton_color',
    array(
        'default'           => $default['mailchimp_botton_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control ( new WP_Customize_Color_Control( $wp_customize, 'mailchimp_botton_color',
    array(
        'label'    => __( 'Mailchimp Button Color', 'education-x-pro' ),
        'section'  => 'mailchimp_section',
        'type'     => 'color',
        'priority' => 170,
    )
) );
