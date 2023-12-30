<?php
/**
* Popup Model Box Settings.
*
* @package Education X
*/

$default = education_x_get_default_theme_options();

// Popup Model Box Section.
$wp_customize->add_section( 'tmt_popup_bodel_box_newsletter',
	array(
	'title'      => esc_html__( 'Popup Model Box', 'education-x-pro' ),
	'priority'   => 125,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Popup Model Box Enable Disable.
$wp_customize->add_setting('ed_popup_model_box',
    array(
        'default' => $default['ed_popup_model_box'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_popup_model_box',
    array(
        'label' => esc_html__('Enable Popup Model Box', 'education-x-pro'),
        'section' => 'tmt_popup_bodel_box_newsletter',
        'type' => 'checkbox',
        'priority' => 1,
    )
);

// Popup Model Box Enable Disable.
$wp_customize->add_setting('ed_popup_model_box_home_only',
    array(
        'default' => $default['ed_popup_model_box_home_only'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_popup_model_box_home_only',
    array(
        'label' => esc_html__('Popup Model Box On Home Page Only', 'education-x-pro'),
        'section' => 'tmt_popup_bodel_box_newsletter',
        'type' => 'checkbox',
        'priority' => 1,
    )
);

// Popup Model Box Enable Disable.
$wp_customize->add_setting('ed_popup_model_box_first_loading_only',
    array(
        'default' => $default['ed_popup_model_box_first_loading_only'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_checkbox',
    )
);
$wp_customize->add_control('ed_popup_model_box_first_loading_only',
    array(
        'label' => esc_html__('One Time Load Popup Model Box', 'education-x-pro'),
        'section' => 'tmt_popup_bodel_box_newsletter',
        'type' => 'checkbox',
        'priority' => 1,
    )
);

// Popup Model Box Image
$wp_customize->add_setting('tmt_popup_bg_image_image',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);
$wp_customize->add_control( new WP_Customize_Image_Control(
    $wp_customize,
    'tmt_popup_bg_image_image',
        array(
            'label'      => esc_html__( 'Popup Model Box Image', 'education-x-pro' ),
            'section'    => 'tmt_popup_bodel_box_newsletter',
            'priority' => 10,
        )
    )
);

// Popup Model Box Title.
$wp_customize->add_setting( 'tmt_popup_title',
    array(
    'default'           => $default['tmt_popup_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'tmt_popup_title',
    array(
    'label'    => esc_html__( 'Popup Model Box Title', 'education-x-pro' ),
    'section'  => 'tmt_popup_bodel_box_newsletter',
    'type'     => 'text',
    )
);

// Popup Model Box Description.
$wp_customize->add_setting( 'tmt_popup_desc',
    array(
    'default'           => $default['tmt_popup_desc'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'tmt_popup_desc',
    array(
    'label'    => esc_html__( 'Popup Model Box Description', 'education-x-pro' ),
    'section'  => 'tmt_popup_bodel_box_newsletter',
    'type'     => 'text',
    )
);

// Shortcode.
$wp_customize->add_setting( 'tmt_form_shortcode',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'tmt_form_shortcode',
    array(
    'label'    => esc_html__( 'Shortcode', 'education-x-pro' ),
    'section'  => 'tmt_popup_bodel_box_newsletter',
    'type'     => 'textarea',
    )
);