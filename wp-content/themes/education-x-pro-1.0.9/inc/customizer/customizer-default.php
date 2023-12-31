<?php
/**
 * Default theme options.
 *
 * @package Education X
 */

if (!function_exists('education_x_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function education_x_get_default_theme_options() {

	$defaults = array();
	// header section
	$defaults['enable_header_contact_section'] = 1;
	$defaults['top_header_location']           = '';
	$defaults['top_header_telephone']          = '';
	$defaults['top_header_email']              = '';
	$defaults['enable_nav_overlay']              = 1;
	// Slider Section.
	$defaults['show_slider_section']           = 1;
	$defaults['banner_overlay_slider']           = 1;
	$defaults['number_of_home_slider']         = 3;
	$defaults['number_of_content_home_slider'] = 30;
	$defaults['select_slider_from']            = 'from-category';
	$defaults['select_page_for_slider']        = 0;
	$defaults['select_category_for_slider']    = 1;
	$defaults['button_text_on_slider']         = esc_html__('Learn More', 'education-x-pro');
	$defaults['additional_button_text_on_slider']         = esc_html__('Contact US', 'education-x-pro');
	$defaults['additional_button_url_on_slider']         = '#';

	/*About Default Value*/
	$defaults['show_about_section']               = 0;
	$defaults['select_about_main_page']           = 2;
	$defaults['number_of_content_home_about']     = 30;
	$defaults['select_category_for_about']        = 1;
	$defaults['select_about_secondary_page']      = 2;
	$defaults['number_of_content_home_sec_about'] = 0;
	$defaults['select_category_sec_about']        = 1;

	/*callback section*/
	$defaults['show_our_featured_section']       = 0;
	$defaults['select_our_featured_page']            = 0;
	$defaults['number_of_content_our_featured'] = 40;
	$defaults['show_featured_page_link_button']           = 1;
	$defaults['featured_page_button_text']            = esc_html__('Join Now', 'education-x-pro');
	$defaults['featured_page_button_link']            = '';

	/*mailchimp*/
	$defaults['enable_mailchimp']       = 0;
	$defaults['mailchimp_title']        = esc_html__('Subscribe Our Newsletter', 'education-x-pro');
	$defaults['mailchimp_shortcode']    = '';
	$defaults['mailchimp_bg_color']     = '#0f100f';
	$defaults['mailchimp_font_color']   = '#ffffff';
	$defaults['mailchimp_botton_color'] = '#f88b01';
	
	/*callback section*/
	$defaults['show_our_callback_section']       = 0;
	$defaults['select_callback_page']            = 0;
	$defaults['number_of_content_home_callback'] = 30;
	$defaults['show_page_link_button']           = 1;
	$defaults['callback_button_text']            = esc_html__('Buy Now', 'education-x-pro');
	$defaults['callback_button_link']            = '';

	/*blog/event*/
	$defaults['show_blog_event_tab_section']    = 0;
	$defaults['enable_copyright_credit']    = 1;
	$defaults['select_category_blog_event_tab'] = 1;
	$defaults['number_of_content_home_blog']    = 30;
	$defaults['number_of_content_home_event']   = 30;
	$defaults['select_category_event_tab']      = 1;
	$defaults['blog_title_text']                = esc_html__('Latest Blog', 'education-x-pro');
	$defaults['event_title_text']               = esc_html__('Our Events', 'education-x-pro');

	/*testimonial*/
	$defaults['show_testimonial_section']             = 0;
	$defaults['testimonial_section_background_image'] = '';
	$defaults['title_testimonial_section']            = esc_html__('Voice Of Students', 'education-x-pro');
	$defaults['number_of_home_testimonial']           = 6;
	$defaults['number_of_content_home_testimonial']   = 30;
	$defaults['select_testimonial_from']              = 'from-category';
	$defaults['select_page_for_testimonial']          = 0;
	$defaults['select_category_for_testimonial']      = 1;

	/*team*/
	$defaults['show_team_section']           = 0;
	$defaults['sub_title_team_section']      = '';
	$defaults['title_team_section']          = esc_html__('Who are we?', 'education-x-pro');
	$defaults['number_of_home_team']         = 3;
	$defaults['number_of_content_home_team'] = 20;
	$defaults['select_team_from']            = 'from-category';
	$defaults['select_page_for_team']        = 0;
	$defaults['select_category_for_team']    = 1;
    //footer page section
    $defaults['show_footer_page_section'] = 0;
    $defaults['select_footer_page'] = 2;
    $defaults['number_of_content_home_footer_page'] = 30;
    $defaults['show_footer_fix_page_button'] = 1;
    $defaults['fix_page_button_text'] = esc_html__('View Our Courses', 'education-x-pro');
    $defaults['fix_page_button_link'] = '';

	/*layout*/
	$defaults['home_page_content_status'] = 1;
	$defaults['enable_overlay_option']    = 1;
	$defaults['single_post_meta_data']    = 1;
	$defaults['homepage_layout_option']   = 'full-width';
	$defaults['global_layout']            = 'right-sidebar';
	$defaults['excerpt_length_global']    = 50;
	$defaults['archive_layout']           = 'excerpt-only';
	$defaults['archive_layout_image']     = 'full';
	$defaults['single_post_image_layout'] = 'full';
	$defaults['pagination_type']          = 'default';
	$defaults['copyright_text']           = esc_html__('Copyright All right reserved', 'education-x-pro');
	$defaults['social_icon_style']        = 'circle';
	$defaults['number_of_footer_widget']  = 3;
	$defaults['page_loader_setting']  = 1;
	$defaults['breadcrumb_type']          = 'simple';
	$defaults['contact_form_shortcodes']          = '';
    if (class_exists('Education_Connect')) {
        $defaults['select_category_sec_about']        = 21;
        $defaults['select_category_for_team']    = 27;
        $defaults['select_category_for_testimonial']      = 26;
        $defaults['select_category_event_tab']      = 18;

    }


    /* client section */
    $defaults['client_numbers']						= 6;
    $defaults['show_client_section']				= 1;
    $defaults['client_section_title']				= esc_html__( 'Our Clients', 'education-x-pro' );

    $defaults['show_contact_map_section']			= 0;
    $defaults['google_map_shortcode']				= '';
    // search section
    $defaults['show_search_section']  = 0;
    $defaults['number_of_content_home_search']  = 6;
    $defaults['show_search_bar']  = 1;
    $defaults['search_section_title']  = esc_html__('Quick Search','education-x-pro');
    $defaults['button_text_on_search']  = esc_html__('Learn More','education-x-pro');
    $defaults['button_button_link']  = '';
    $defaults['select_cat_for_search']  = 0;


    /*font and color*/
    $defaults['primary_color']     = '#f88b01';
    $defaults['secondary_color']   = '#fdc735';
    $defaults['nav_menu_bg_color'] = '#000';
    $defaults['nav_menu_text_color'] = '#fff';
    $defaults['primary_font']      = 'Open+Sans:400,400italic,600,700';
    $defaults['secondary_font']    = 'Montserrat:400,700';
    $defaults['text_size']         = 16;
    $defaults['section_title_text_size']      = 28;
    $defaults['bklock_title_text_size']      = 16;

    // Open Graph
    $defaults['tmt_open_graph_title'] = get_bloginfo('name');
    $defaults['tmt_open_graph_desc'] = get_bloginfo('description');
    $defaults['tmt_open_graph_url'] = home_url();
    $defaults['tmt_open_graph_locole'] = 'en_US';

    // Twitter Summary
    $defaults['tmt_twitter_summary_title'] = get_bloginfo('name');
    $defaults['tmt_twitter_summary_desc'] = get_bloginfo('description');
    $defaults['tmt_twitter_summary_url'] = home_url();
    $defaults['tmt_twitter_summary_locole'] = 'en_US';

    // Popup Model Box
    $defaults['ed_popup_model_box'] = '';
    $defaults['ed_popup_model_box_home_only'] = '';
    $defaults['ed_popup_model_box_first_loading_only'] = '';
    $defaults['tmt_popup_title'] = esc_html__('Sign Up to Our Newsletter', 'education-x-pro');
    $defaults['tmt_popup_desc'] = esc_html__('Get notified about exclusive offers every week!', 'education-x-pro');
    
	// Pass through filter.
	$defaults = apply_filters('education_x_filter_default_theme_options', $defaults);

	return $defaults;

}

endif;
