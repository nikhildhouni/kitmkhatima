<?php
/**
 * CSS related hooks.
 *
 * This file contains hook functions which are related to CSS.
 *
 * @package Education x
 */

if (!function_exists('education_x_trigger_custom_css_action')) :

    /**
     * Do action theme custom CSS.
     *
     * @since 1.0.0
     */
    function education_x_trigger_custom_css_action()
    {   
        $style = '';
        global $education_x_google_fonts;
        $education_x_enable_banner_overlay = education_x_get_option('enable_overlay_option');

        $education_x_primary_color = education_x_get_option('primary_color');
        $education_x_secondary_color = education_x_get_option('secondary_color');
        $education_x_nav_color = education_x_get_option('nav_menu_bg_color');
        $education_x_nav_text_color = education_x_get_option('nav_menu_text_color');
        $education_x_primary_font = $education_x_google_fonts[education_x_get_option('primary_font')];
        $education_x_secondary_font = $education_x_google_fonts[education_x_get_option('secondary_font')];
        $education_x_font_size = education_x_get_option('text_size');
        $education_x_section_title_text_size = education_x_get_option('section_title_text_size');
        $education_x_bklock_title_text_size = education_x_get_option('bklock_title_text_size');
        $education_x_mailchimp_font_color = education_x_get_option('mailchimp_font_color');
        $education_x_mailchimp_botton_color = education_x_get_option('mailchimp_botton_color');
        $education_x_mailchimp_bg_color = education_x_get_option('mailchimp_bg_color');

        if (!empty($education_x_mailchimp_bg_color) ){
            $style .='
            body .mailchimp-bgcolor {
                background:'. esc_html($education_x_mailchimp_bg_color).';
            }';

        }
        if (!empty($education_x_mailchimp_font_color) ){
            $style .='
            body .section-mailchimp,
            body .section-mailchimp .widget-title,
            body .section-mailchimp a{
                color:'. esc_html($education_x_mailchimp_font_color).';
            }';

        }
        if (!empty($education_x_mailchimp_font_color) ){
            $style .='
            .section-mailchimp .widget-title:before{ 
                background-color:'. esc_html($education_x_mailchimp_font_color).';
            }';

        }
        if (!empty($education_x_mailchimp_botton_color) ){
            $style .='
            body .site .section-mailchimp .mc4wp-form-fields input[type="submit"] {
                background:'. esc_html($education_x_mailchimp_botton_color).';
            }';

        }
        
        if ( $education_x_enable_banner_overlay == 1 ){

            $style .= '
            .inner-header-overlay,
            .hero-slider.overlay .slide-item .bg-image:before {
                background: #042738;
                filter: alpha(opacity=65);
                opacity: 0.65;
            }';

        }

        if (!empty($education_x_primary_color) ){

            $style .= '
            body .site button,
            body .site input[type="button"],
            body .site input[type="reset"],
            body .site input[type="submit"],
            body .site .btn-primary,
            body .site .mouse-icon .wheel,
            body .site .main-navigation .menu > ul.menu-desktop > li.current-menu-item > a:after,
            body .site .main-navigation .menu > ul.menu-desktop > li:hover > a:after,
            body .site .main-navigation .menu > ul.menu-desktop > li:focus > a:after,
            body .site .about-cta-section .about-cta-block:nth-child(even) .data-bg,
            body .site .team-section .tm-team-wrapper > [class*="col-"]:nth-child(even) .data-bg,
            body .site .team-section .tm-team-wrapper > [class*="col-"]:nth-child(even) .photo .move,
            body .site .featured-course .voice-items:nth-child(even),
            body .site .about-cta-block:nth-child(odd) .section-block-title-1 a,
            body .site .tm-metawrap-top {
                background:'. esc_html($education_x_primary_color).';
            }

            body .site .top-bar{
                background:'. esc_html($education_x_primary_color).';
                background:'. educationx_hex2rgb($education_x_primary_color, '0.94').';
            }

             body .site .header-links .link-list .link-icon,
             body .site .top-bar .social-icons ul li a:after,
             body .site .top-bar .social-icons ul li:first-child a:after {
                border-color:'. esc_html($education_x_primary_color).';
            }

            @media only screen and (min-width: 992px) {
                body .site .main-navigation .sub-menu > li:hover > a,
                body .site .main-navigation .sub-menu > li:focus > a {
                    background:'. esc_html($education_x_primary_color).';
                }
            }

            body .site .tm-metawrap {
                border-color:'. esc_html($education_x_primary_color).';
            }

            body .site .tm-metawrap-bottom {
                color:'. esc_html($education_x_primary_color).';
            }';

        }

        if (!empty($education_x_secondary_color) ){

            $style .= '
            body .site .secondary-bgcolor,
            body .site .main-navigation .popular-post a,
            body .site .footer-bottom .social-icons ul li:hover a:after,
            body .site .footer-bottom .social-icons ul li:hover a:after,
            body .site .widget.education_x_social_widget .social-widget-menu ul a:hover,
            body .site .widget.education_x_social_widget .social-widget-menu ul a:focus,
            body .site .widget.education_x_widget_tabbed ul.nav-tabs li:hover a,
            body .site .widget.education_x_widget_tabbed ul.nav-tabs li:hover a,
            body .site .widget.education_x_widget_tabbed .nav-tabs > li.active > a,
            body .site .widget.education_x_widget_tabbed .nav-tabs > li.active > a:focus,
            body .site .widget.education_x_widget_tabbed .nav-tabs > li.active > a:hover
            body .site .widget.education_x_widget_tabbed .site-footer .widget ul li,
            body .site .widget .social-widget-menu ul li a,
            body .site .author-info .author-social > a,
            body .site .top-bar .social-icons ul li:hover a:after,
            body .site .top-bar .social-icons ul li:focus a:after,
            body .site .btn-primary:hover,
            body .site .btn-primary:focus,
            body .site button:hover,
            body .site button:focus,
            body .site button:active,
            body .site input[type="button"]:hover,
            body .site input[type="button"]:focus,
            body .site input[type="button"]:active,
            body .site input[type="reset"]:hover,
            body .site input[type="reset"]:focus,
            body .site input[type="reset"]:active,
            body .site input[type="submit"]:hover,
            body .site input[type="submit"]:active,
            body .site input[type="submit"]:focus,
            body .site .about-cta-section .about-cta-block .data-bg,
            body .site .team-section .tm-team-wrapper > [class*="col-"] .data-bg,
            body .site .team-section .tm-team-wrapper > [class*="col-"] .photo .move,
            body .site .featured-course .voice-items,
            body .site .about-cta-block:nth-child(even) .section-block-title-1 a {
                background:'. esc_html($education_x_secondary_color).';
            }

            body .site a:hover,
            body .site a:focus,
            body .site a:active,
            body .site .btn-border:hover,
            body .site .btn-border:focus,
            body .loader-2 {
                color:'. esc_html($education_x_secondary_color).';
            }

            body .site .btn-border:hover,
            body .site .btn-border:focus {
                border-color:'. esc_html($education_x_secondary_color).';
            }';

        }

        if (!empty($education_x_nav_color) ){

            $style .= '
            body .site .header-overlay {
                background:'. educationx_hex2rgb($education_x_nav_color, '0.45').';
            }';

        }

        if (!empty($education_x_nav_text_color) ){

            $style .= '
            body .site .main-navigation .menu ul li a {
                color:'. esc_html($education_x_nav_text_color).';
            }';

        }

        if (!empty($education_x_primary_font) ){

            $style .= '
            body .site,
            body .site button,
            body .site input,
            body .site select,
            body .site textarea {
                font-family:'. esc_html($education_x_primary_font).';
            }';

        }

        if (!empty($education_x_secondary_font) ){

            $style .= '
            body .site h1,
            body .site h2,
            body .site h3,
            body .site h4,
            body .site h5,
            body .site h6,
            body .site .h1,
            body .site .h2,
            body .site .h3,
            body .site .h4,
            body .site .h5,
            body .site .h6 {
                font-family:'. esc_html($education_x_secondary_font).';
            }';

        }


        if (!empty($education_x_font_size) ){

            $style .= '
            body .site,
            body .site button,
            body .site input,
            body .site select,
            body .site textarea {
                font-size:'. esc_html($education_x_font_size).'px;
            }';

        }


        if (!empty($education_x_section_title_text_size) ){

            $style .= '
            body .site .section-title {
                font-size:'. esc_html($education_x_section_title_text_size).'px;
            }';

        }


        if (!empty($education_x_bklock_title_text_size) ){

            $style .= '
            body .site .section-block-title{
                font-size:'. esc_html($education_x_bklock_title_text_size).'px;
            }';

        }

        return $style;

    }

endif;

if (!function_exists('educationx_hex2rgb')) {

    /**
     * @param $hex
     * @return array
     */
    function educationx_hex2rgb($hex, $alpha = '1')
    {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgba = 'rgba(' . $r . ',' . $g . ',' . $b . ',' . $alpha . ')';
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgba; // returns an array with the rgb values
    }
}