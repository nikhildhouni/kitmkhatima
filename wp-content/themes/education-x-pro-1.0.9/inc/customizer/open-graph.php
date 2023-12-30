<?php
/**
* Open Graph options.
*
* @package Education X
*/

$default = education_x_get_default_theme_options();
// Webmaster Panel.
$wp_customize->add_panel( 'education_x_og_panel',
	array(
		'title'      => esc_html__( 'Open Graph', 'education-x-pro' ),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);

$wp_customize->add_section( 'tmt_open_graph_ed_sec', array(
        'title'    	=> __( 'Open Graph Enable Disable', 'education-x-pro' ),
        'panel'		=> 'education_x_og_panel',
        
) );

// Enable Disable Open Graph.
$wp_customize->add_setting('tmt_ed_open_graph',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_checkbox',
    )
);
$wp_customize->add_control('tmt_ed_open_graph',
    array(
        'label' => esc_html__('Enable Open Graph', 'education-x-pro'),
        'description' => esc_html__('Add meta on head for Open Graph.', 'education-x-pro'),
        'section' => 'tmt_open_graph_ed_sec',
        'type' => 'checkbox',
        'priority' => 1,
    )
);

$wp_customize->add_section( 'tmt_open_graph_home_sec', array(
        'title'    	=> __( 'Homepage Setting', 'education-x-pro' ),
        'panel'		=> 'education_x_og_panel',
        
) );


// Open Graph Title.
$wp_customize->add_setting( 'tmt_open_graph_title',
	array(
	'default'           => $default['tmt_open_graph_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'tmt_open_graph_title',
	array(
	'label'    => esc_html__( 'Title', 'education-x-pro' ),
	'section'  => 'tmt_open_graph_home_sec',
	'type'     => 'text',
	)
);

// Open Graph Description.
$wp_customize->add_setting( 'tmt_open_graph_desc',
	array(
	'default'           => $default['tmt_open_graph_desc'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'tmt_open_graph_desc',
	array(
	'label'    => esc_html__( 'Description', 'education-x-pro' ),
	'section'  => 'tmt_open_graph_home_sec',
	'type'     => 'text',
	)
);

// Open Graph Description.
$wp_customize->add_setting( 'tmt_open_graph_site_name',
	array(
	'default'           => $default['tmt_open_graph_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'tmt_open_graph_site_name',
	array(
	'label'    => esc_html__( 'Sitename', 'education-x-pro' ),
	'section'  => 'tmt_open_graph_home_sec',
	'type'     => 'textarea',
	)
);

// Open Graph Description.
$wp_customize->add_setting( 'tmt_open_graph_site_type',
	array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control( 'tmt_open_graph_site_type',
	array(
	'label'    => esc_html__( 'Type', 'education-x-pro' ),
	'section'  => 'tmt_open_graph_home_sec',
	'type'     => 'select',
	'choices'	=> array(
			'' => esc_html__('--select--','education-x-pro'),
			'website' => esc_html__('Website','education-x-pro'),
			'video.episode' => esc_html__('video.episode','education-x-pro'),
			'music.radio_station' => esc_html__('music.radio_station','education-x-pro'),
			'music.song' => esc_html__('music.song','education-x-pro'),
			'music.playlist' => esc_html__('music.playlist','education-x-pro'),
			'video.movie' => esc_html__('video.movie','education-x-pro'),
			'music.album' => esc_html__('music.album','education-x-pro'),
			'video.tv_show' => esc_html__('video.tv_show','education-x-pro'),
			'article' => esc_html__('Article','education-x-pro'),
			'video.other' => esc_html__('video.other','education-x-pro'),
			'profile' => esc_html__('Profile','education-x-pro'),
			'book' => esc_html__('Book','education-x-pro'),

		),
	)
);

// Open Graph URL.
$wp_customize->add_setting( 'tmt_open_graph_url',
	array(
	'default'           => $default['tmt_open_graph_url'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'tmt_open_graph_url',
	array(
	'label'    => esc_html__( 'URL', 'education-x-pro' ),
	'section'  => 'tmt_open_graph_home_sec',
	'type'     => 'text',
	)
);


// Header Advertise Image
$wp_customize->add_setting('tmt_open_graph_home_default_image',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
    'tmt_open_graph_home_default_image',
    	array(
        	'label'      => esc_html__( 'Image for Home and Default Image.', 'education-x-pro' ),
           	'section'    => 'tmt_open_graph_home_sec',
           	'priority' => 10,
       	)
   	)
);

// Open Graph Description.
$wp_customize->add_setting( 'tmt_open_graph_locole',
	array(
	'default'           => $default['tmt_open_graph_locole'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'tmt_open_graph_locole',
	array(
	'label'    => esc_html__( 'Locale', 'education-x-pro' ),
	'description'    => esc_html__( 'eg: en_US', 'education-x-pro' ),
	'section'  => 'tmt_open_graph_home_sec',
	'type'     => 'text',
	)
);


$wp_customize->add_section( 'tmt_open_graph_custom_meta_sec', array(
        'title'    	=> __( 'Custom Meta', 'education-x-pro' ),
        'panel'		=> 'education_x_og_panel',
        
) );

// Open Graph Custom Meta.
$wp_customize->add_setting( 'tmt_open_graph_custom_meta',
	array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_x_meta_sanitize',
	)
);
$wp_customize->add_control( 'tmt_open_graph_custom_meta',
	array(
	'label'    => esc_html__( 'Custom Meta', 'education-x-pro' ),
	'description'    => esc_html__( 'For example: <meta name="twitter:card" content="summary" />', 'education-x-pro' ),
	'section'  => 'tmt_open_graph_custom_meta_sec',
	'type'     => 'textarea',
	)
);