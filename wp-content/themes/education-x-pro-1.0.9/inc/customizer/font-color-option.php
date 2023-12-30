<?php
$default = education_x_get_default_theme_options();

// Add Theme Options Panel.
$wp_customize->add_panel('theme_color_typo',
    array(
        'title' => esc_html__('General settings', 'education-x-pro'),
        'priority' => 40,
        'capability' => 'edit_theme_options',
    )
);

// font Section.
$wp_customize->add_section('font_typo_section',
    array(
        'title' => esc_html__('Fonts & Typography', 'education-x-pro'),
        'priority' => 100,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_color_typo',
    )
);

// font Section.
$wp_customize->add_section('colors',
    array(
        'title' => esc_html__('Color Options', 'education-x-pro'),
        'priority' => 100,
        'capability' => 'edit_theme_options',
        'panel' => 'theme_color_typo',
    )
);

// Setting - primary_color.
$wp_customize->add_setting('primary_color',
    array(
        'default'           => $default['primary_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control ( new WP_Customize_Color_Control( $wp_customize, 'primary_color',
    array(
        'label'    => __( 'Primary Background Color', 'education-x-pro' ),
        'section'  => 'colors',
        'type'     => 'color',
        'priority' => 100,
    )
) );


// Setting - secondary_color.
$wp_customize->add_setting('secondary_color',
    array(
        'default'           => $default['secondary_color'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control ( new WP_Customize_Color_Control( $wp_customize, 'secondary_color',
    array(
        'label'    => __( 'Secondary Background Color', 'education-x-pro' ),
        'section'  => 'colors',
        'type'     => 'color',
        'priority' => 100,
    )
) );

global $education_x_google_fonts;

// Setting - primary_font.
$wp_customize->add_setting('primary_font',
    array(
        'default' => $default['primary_font'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_select',
    )
);
$wp_customize->add_control('primary_font',
    array(
        'label' => esc_html__('Primary Font', 'education-x-pro'),
        'section' => 'font_typo_section',
        'type' => 'select',
        'choices' => $education_x_google_fonts,
        'priority' => 100,
    )
);

// Setting - secondary_font.
$wp_customize->add_setting('secondary_font',
    array(
        'default' => $default['secondary_font'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_select',
    )
);
$wp_customize->add_control('secondary_font',
    array(
        'label' => esc_html__('Secondary Font', 'education-x-pro'),
        'section' => 'font_typo_section',
        'type' => 'select',
        'choices' => $education_x_google_fonts,
        'priority' => 110,
    )
);


// Setting - text_size.
$wp_customize->add_setting('text_size',
    array(
        'default' => $default['text_size'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_positive_integer',
    )
);
$wp_customize->add_control('text_size',
    array(
        'label' => esc_html__('Text Size For Paragraph', 'education-x-pro'),
        'section' => 'font_typo_section',
        'type' => 'number',
        'priority' => 120,
        'input_attrs' => array('min' => 1, 'max' => 100, 'style' => 'width: 150px;'),
    )
);

// Setting - section_title_text_size.
$wp_customize->add_setting('section_title_text_size',
    array(
        'default' => $default['section_title_text_size'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_positive_integer',
    )
);
$wp_customize->add_control('section_title_text_size',
    array(
        'label' => esc_html__('Section Title Font Size', 'education-x-pro'),
        'section' => 'font_typo_section',
        'type' => 'number',
        'priority' => 120,
        'input_attrs' => array('min' => 1, 'max' => 100, 'style' => 'width: 150px;'),
    )
);

// Setting - bklock_title_text_size.
$wp_customize->add_setting('bklock_title_text_size',
    array(
        'default' => $default['bklock_title_text_size'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'education_x_sanitize_positive_integer',
    )
);
$wp_customize->add_control('bklock_title_text_size',
    array(
        'label' => esc_html__('Block Title Font Size', 'education-x-pro'),
        'section' => 'font_typo_section',
        'type' => 'number',
        'priority' => 125,
        'input_attrs' => array('min' => 1, 'max' => 100, 'style' => 'width: 150px;'),
    )
);