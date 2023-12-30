<?php
/**
* Webmasters options.
*
* @package Education X
*/


// Webmaster Panel.
$wp_customize->add_panel( 'education_x_webmaster_panel',
	array(
		'title'      => esc_html__( 'Webmasters Tools', 'education-x-pro' ),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);

$wp_customize->add_section( 'tmt_webmasters_tools', array(
        'title'    	=> __( 'Addtional Scripts', 'education-x-pro' ),
        'panel'		=> 'education_x_webmaster_panel',
        
) );

$wp_customize->add_setting( 'tmt_header_script', array(
        'type' => 'option',
        'transport'=>'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'header_script', array(
        'label'     => __( 'Before Header Script', 'education-x-pro' ),
        'code_type' => 'javascript',
        'settings'  => 'tmt_header_script',
        'section'   => 'tmt_webmasters_tools',
        
) ) );


$wp_customize->add_setting( 'tmt_footer_script', array(
        'type' => 'option',
        'transport'=>'postMessage',

) );
$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'footer_script', array(
        'label'     => __( 'Aftere Footer Script', 'education-x-pro' ),
        'code_type' => 'javascript',
        'settings'  => 'tmt_footer_script',
        'section'   => 'tmt_webmasters_tools',
        
) ) );

$wp_customize->add_section( 'tmt_site_verification', array(
        'title'    	=> __( 'SIte Verification', 'education-x-pro' ),
        'panel'		=> 'education_x_webmaster_panel',
        
) );

$wp_customize->add_setting( 'tmt_verification_code_google',
	array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'=>'postMessage',
	)
);
$wp_customize->add_control( 'tmt_verification_code_google',
	array(
	'label'    => esc_html__( 'Google Webmaster Tools', 'education-x-pro' ),
	'section'  => 'tmt_site_verification',
	'type'     => 'text',
	)
);

$wp_customize->add_setting( 'tmt_verification_code_bing',
	array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'=>'postMessage',
	)
);
$wp_customize->add_control( 'tmt_verification_code_bing',
	array(
	'label'    => esc_html__( 'Bing Webmaster Tools', 'education-x-pro' ),
	'section'  => 'tmt_site_verification',
	'type'     => 'text',
	)
);

$wp_customize->add_setting( 'tmt_verification_code_pinterest',
	array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'=>'postMessage',
	)
);
$wp_customize->add_control( 'tmt_verification_code_pinterest',
	array(
	'label'    => esc_html__( 'Pinterest Site Verification', 'education-x-pro' ),
	'section'  => 'tmt_site_verification',
	'type'     => 'text',
	)
);

$wp_customize->add_setting( 'tmt_verification_code_alexa',
	array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'=>'postMessage',
	)
);
$wp_customize->add_control( 'tmt_verification_code_alexa',
	array(
	'label'    => esc_html__( 'Alexa Verification ID', 'education-x-pro' ),
	'section'  => 'tmt_site_verification',
	'type'     => 'text',
	)
);

$wp_customize->add_setting( 'tmt_verification_code_yandex',
	array(
	'default'           => '',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'=>'postMessage',
	)
);
$wp_customize->add_control( 'tmt_verification_code_yandex',
	array(
	'label'    => esc_html__( 'Yandex Webmaster Tools', 'education-x-pro' ),
	'section'  => 'tmt_site_verification',
	'type'     => 'text',
	)
);