<?php
/**
* Twitter options.
*
* @package Education X
*/

$default = education_x_get_default_theme_options();
// Webmaster Panel.
$wp_customize->add_panel( 'education_x_twitter',
	array(
		'title'      => esc_html__( 'Twitter Summary Card', 'education-x-pro' ),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);

$wp_customize->add_section( 'tmt_twitter_summary_ed_sec', array(
        'title'    	=> __( 'Twitter Summary Enable Disable', 'education-x-pro' ),
        'panel'		=> 'education_x_twitter',
        
) );

// Enable Disable Twitter Summary.
$wp_customize->add_setting('tmt_ed_twitter_summary',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_checkbox',
    )
);
$wp_customize->add_control('tmt_ed_twitter_summary',
    array(
        'label' => esc_html__('Enable Twitter Summary', 'education-x-pro'),
        'description' => esc_html__('Add meta on head for Twitter Summary.', 'education-x-pro'),
        'section' => 'tmt_twitter_summary_ed_sec',
        'type' => 'checkbox',
        'priority' => 1,
    )
);

$wp_customize->add_section( 'tmt_twitter_summary_home_sec', array(
        'title'    	=> __( 'Homepage Setting', 'education-x-pro' ),
        'panel'		=> 'education_x_twitter',
        
) );


// Twitter Summary Title.
$wp_customize->add_setting( 'tmt_twitter_summary_title',
	array(
	'default'           => $default['tmt_twitter_summary_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'tmt_twitter_summary_title',
	array(
	'label'    => esc_html__( 'Title', 'education-x-pro' ),
	'section'  => 'tmt_twitter_summary_home_sec',
	'type'     => 'text',
	)
);

// Twitter Summary Description.
$wp_customize->add_setting( 'tmt_twitter_summary_desc',
	array(
	'default'           => $default['tmt_twitter_summary_desc'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'tmt_twitter_summary_desc',
	array(
	'label'    => esc_html__( 'Description', 'education-x-pro' ),
	'section'  => 'tmt_twitter_summary_home_sec',
	'type'     => 'text',
	)
);

// Twitter Summary Description.
$wp_customize->add_setting( 'tmt_twitter_summary_user',
	array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'tmt_twitter_summary_user',
	array(
	'label'    => esc_html__( 'Username', 'education-x-pro' ),
	'section'  => 'tmt_twitter_summary_home_sec',
	'type'     => 'text',
	)
);

// Twitter Summary Description.
$wp_customize->add_setting( 'tmt_twitter_summary_site_type',
	array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_x_sanitize_select',
	)
);
$wp_customize->add_control( 'tmt_twitter_summary_site_type',
	array(
	'label'    => esc_html__( 'Twitter Card', 'education-x-pro' ),
	'section'  => 'tmt_twitter_summary_home_sec',
	'type'     => 'select',
	'choices'	=> array(
			'' => esc_html__('--select--','education-x-pro'),
			'summary' => esc_html__('summary','education-x-pro'),
			'summary_large_image' => esc_html__('Summary Large Image','education-x-pro'),
			'app' => esc_html__('APP','education-x-pro'),
			'player' => esc_html__('Player','education-x-pro'),
			'lead_generation' => esc_html__('Lead Generation','education-x-pro'),
			
		),
	)
);


// Header Advertise Image
$wp_customize->add_setting('tmt_twitter_summary_home_default_image',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
    'tmt_twitter_summary_home_default_image',
    	array(
        	'label'      => esc_html__( 'Image for Home and Default Image.', 'education-x-pro' ),
           	'section'    => 'tmt_twitter_summary_home_sec',
           	'priority' => 10,
       	)
   	)
);


$wp_customize->add_section( 'tmt_twitter_summary_custom_meta_sec', array(
        'title'    	=> __( 'Custom Meta', 'education-x-pro' ),
        'panel'		=> 'education_x_twitter',
        
) );

// Twitter Summary Suctom Meta.
$wp_customize->add_setting( 'tmt_twitter_summary_custom_meta',
	array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'education_x_meta_sanitize',
	)
);
$wp_customize->add_control( 'tmt_twitter_summary_custom_meta',
	array(
	'label'    => esc_html__( 'Custom Meta', 'education-x-pro' ),
	'description'    => esc_html__( 'For example: <meta name="twitter:card" content="summary" />', 'education-x-pro' ),
	'section'  => 'tmt_twitter_summary_custom_meta_sec',
	'type'     => 'textarea',
	)
);