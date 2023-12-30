<?php
/**
 * @package Education_Connect
 * @version 1.0.3
 */
/*
Plugin Name: Education Connect
Plugin URI: https://wordpress.org/plugins/education-connect/
Description: A plugin that creates custom post type named as Events, Courses, Team and Testimonial. Each of these post types has required minimal meta fields for educational sites. This addon is best to enhance features of educational themes as it is easy to use and highly secure.
Author: Thememattic
Version: 1.0.3
Author URI: http://thememattic.com/
Text Domain: education-connect
 */

if (!defined('ABSPATH')) {
    exit;// Exit if accessed directly.
}

// getting your files / directory ready
define('EDUCATION_CONNECT_MAIN_DIR', dirname(__FILE__));
define('EDUCATION_CONNECT_MAIN_URL', plugin_dir_url(__FILE__));

function education_connect_custom_template($template) {
    if (is_post_type_archive('events') || is_tax('event-category')):
        if (locate_template('education-connect/archive-ec-events.php') != '') {
            $template = locate_template('education-connect/archive-ec-events.php');
        } else {

            $template = EDUCATION_CONNECT_MAIN_DIR.'/inc/template-parts/archive-ec-events.php';
        }

    endif;
    if (is_singular('events')):
        if (locate_template('education-connect/single-ec-events.php') != '') {
            $template = locate_template('education-connect/single-events.php');
        } else {

            $template = EDUCATION_CONNECT_MAIN_DIR.'/inc/template-parts/single-ec-events.php';
        }

    endif;

    if (is_post_type_archive('testimonials') || is_tax('ec-testimonial-category')):
        if (locate_template('education-connect/archive-ec-testimonials.php') != '') {
            $template = locate_template('education-connect/archive-ec-testimonials.php');
        } else {

            $template = EDUCATION_CONNECT_MAIN_DIR.'/inc/template-parts/archive-ec-testimonials.php';
        }

    endif;
    if (is_singular('testimonials')):
        if (locate_template('education-connect/single-ec-testimonials.php') != '') {
            $template = locate_template('education-connect/single-testimonials.php');
        } else {

            $template = EDUCATION_CONNECT_MAIN_DIR.'/inc/template-parts/single-ec-testimonials.php';
        }

    endif;
    if (is_post_type_archive('teams') || is_tax('team-category') || is_tax('team-designation')):
        if (locate_template('education-connect/archive-ec-teams.php') != '') {
            $template = locate_template('education-connect/archive-ec-teams.php');
        } else {

            $template = EDUCATION_CONNECT_MAIN_DIR.'/inc/template-parts/archive-ec-teams.php';
        }

    endif;
    if (is_singular('courses')):
        if (locate_template('education-connect/single-ec-courses.php') != '') {
            $template = locate_template('education-connect/single-courses.php');
        } else {

            $template = EDUCATION_CONNECT_MAIN_DIR.'/inc/template-parts/single-ec-courses.php';
        }

    endif;
    if (is_post_type_archive('courses') || is_tax('team-department') || is_tax('course-category')):
        if (locate_template('education-connect/archive-ec-courses.php') != '') {
            $template = locate_template('education-connect/archive-ec-courses.php');
        } else {

            $template = EDUCATION_CONNECT_MAIN_DIR.'/inc/template-parts/archive-ec-courses.php';
        }

    endif;
    if (is_singular('teams')):
        if (locate_template('education-connect/single-ec-teams.php') != '') {
            $template = locate_template('education-connect/single-teams.php');
        } else {

            $template = EDUCATION_CONNECT_MAIN_DIR.'/inc/template-parts/single-ec-teams.php';
        }

    endif;
    return $template;

}
/* Filter the template_include with our custom function*/
add_filter('template_include', 'education_connect_custom_template');
/**
 * Set up and initialize
 */
class Education_Connect {

    private static $instance;

    /**
     * Actions setup
     */
    public function __construct() {

        add_action('plugins_loaded', array($this, 'education_connect_admin_settings'), 2);

        add_action('plugins_loaded', array($this, 'education_connect_post_types'), 3);

        add_action('admin_enqueue_scripts', array($this, 'education_connect_admin_enqueue'), 10);

        add_action('wp_enqueue_scripts', array($this, 'education_connect_scripts'), 4);

        add_action('education_connect_admin_styles', array($this, 'education_connect_admin_style'), 11);

        add_action('pre_get_posts', array($this, 'education_connect_filter_query'));

    }

    /**
     * Include required admin setting files
     */
    function education_connect_admin_settings() {

        require_once (EDUCATION_CONNECT_MAIN_DIR.'/inc/ec-settings.php');
    }

    /**
     * Include required post types and their files
     */
    function education_connect_post_types() {
        $options = get_option('education_connect_setting_option');

        //For custom post type events
        if (isset($options['enable_event_post_type'])):
            require_once (EDUCATION_CONNECT_MAIN_DIR.'/inc/post-types/ec-events.php');
            require_once (EDUCATION_CONNECT_MAIN_DIR.'/inc/shortcodes/ec-shortcode-events.php');
            require_once (EDUCATION_CONNECT_MAIN_DIR.'/inc/meta-boxes/ec-meta-events.php');
        endif;

        //For custom post type courses
        if (isset($options['enable_subject_post_type'])):
            require_once (EDUCATION_CONNECT_MAIN_DIR.'/inc/post-types/ec-courses.php');
            require_once (EDUCATION_CONNECT_MAIN_DIR.'/inc/shortcodes/ec-shortcode-courses.php');
            require_once (EDUCATION_CONNECT_MAIN_DIR.'/inc/meta-boxes/ec-meta-courses.php');
        endif;

        //For custom post type teams
        if (isset($options['enable_team_post_type'])):
            require_once (EDUCATION_CONNECT_MAIN_DIR.'/inc/post-types/ec-teams.php');
            require_once (EDUCATION_CONNECT_MAIN_DIR.'/inc/shortcodes/ec-shortcode-teams.php');
            require_once (EDUCATION_CONNECT_MAIN_DIR.'/inc/meta-boxes/ec-meta-teams.php');
        endif;

        //For custom post type testiminails
        if (isset($options['enable_testimonial_post_type'])):
            require_once (EDUCATION_CONNECT_MAIN_DIR.'/inc/post-types/ec-testimonials.php');
            require_once (EDUCATION_CONNECT_MAIN_DIR.'/inc/shortcodes/ec-shortcode-testimonials.php');
        endif;

    }

    function education_connect_scripts() {

        wp_enqueue_style('education-connect-style', EDUCATION_CONNECT_MAIN_URL.'assets/main-style.css');
        wp_enqueue_script('jquery-match-height', EDUCATION_CONNECT_MAIN_URL.'assets/jquery-match-height/jquery.matchHeight-min.js', array('jquery'), '', true);
        wp_enqueue_script('education-connect-script', EDUCATION_CONNECT_MAIN_URL.'assets/main-script.js', array('jquery'), '', true);
    }

    function education_connect_admin_enqueue($hook) {
        /*
         * Enqueue admin scripts
         */
        if ('post.php' == $hook || 'post-new.php' == $hook):
            // Load admin custom js
            wp_enqueue_script('jquery-ui-datepicker');
            wp_enqueue_script('education-connect-admin-script', EDUCATION_CONNECT_MAIN_URL.'assets/admin-script.js', array('jquery', 'jquery-ui-datepicker'), '', true);
            wp_enqueue_style('education-connect-admin-style', EDUCATION_CONNECT_MAIN_URL.'assets/admin-style.css');
            wp_register_style('jquery-ui-style', EDUCATION_CONNECT_MAIN_URL.'assets/jquery-ui.css');
            wp_enqueue_style('jquery-ui-style');
        endif;
    }


    function education_connect_filter_query( $query ) {

        if ( is_tax( 'team-department' ) ) {
            // Display 50 posts for a custom post type called 'movie'
            $query->set( 'post_type', 'courses' );
            return;
        }
    }

/**
 * Returns the instance.
 */
public static function get_instance() {

    if (!self::$instance) {
        self::$instance = new self;
    }

    return self::$instance;
}
}

function education_connect_main() {

    return Education_Connect::get_instance();
}

add_action('plugins_loaded', 'education_connect_main', 1);