<?php
/**
 * OCDI support.
 *
 * @package Education X
 */

// Disable PT branding.
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * OCDI after import.
 *
 * @since 1.0.0
 */
function education_x_ocdi_after_import() {

    // check for plugin using plugin name
    if (is_plugin_active('one-click-demo-import/one-click-demo-import.php')) {
        //plugin is activated
        function ocdi_after_import_setup() {
            // Assign menus to their locations.
            $main_menu   = get_term_by('name', 'Primary', 'nav_menu');
            $footer_menu = get_term_by('name', 'Secondary', 'nav_menu');
            $social_menu = get_term_by('name', 'Social Menu', 'nav_menu');

            set_theme_mod('nav_menu_locations', array(
                    'primary' => $main_menu->term_id,
                    'top'  => $footer_menu->term_id,
                    'social'  => $social_menu->term_id,
                )
            );

            // Assign front page and posts page (blog page).
            $front_page_id = get_page_by_title('Homepage');
            $blog_page_id  = get_page_by_title('Blog');

            update_option('show_on_front', 'page');
            update_option('page_on_front', $front_page_id->ID);
            update_option('page_for_posts', $blog_page_id->ID);
			
			register_taxonomy( 'course-category', array('courses'), array() );
			register_taxonomy( 'team-department', array('courses'), array() );
			register_taxonomy( 'testimonials-category', array('testimonials'), array() );
			register_taxonomy( 'team-category', array('teams'), array() );
			register_taxonomy( 'team-department', array('teams'), array() );
			register_taxonomy( 'team-designation', array('teams'), array() );
			register_taxonomy( 'event-category', array('events'), array() );

			$imported_posts = get_posts( array('post_type' => 'courses', 'numberposts' => -1 ) );

			foreach ( $imported_posts as $current_post ):

			$current_post->post_content = $current_post->post_content . 'Demo Content';

			wp_update_post( $current_post );

			endforeach;
			
			set_theme_mod( 'show_about_section' , 1);	
			set_theme_mod( 'show_our_featured_section' , 1);	
			set_theme_mod( 'show_search_section' , 1);	
			set_theme_mod( 'show_our_callback_section' , 1);	
			set_theme_mod( 'show_testimonial_section' , 1);	
			set_theme_mod( 'show_team_section' , 1);
			set_theme_mod( 'show_contact_map_section' , 1);	
			set_theme_mod( 'home_page_content_status' , 0);				
			set_theme_mod( 'select_team_from' , 'from-category');		


			
		
			$slides_cat_id = get_cat_ID ( 'Slides' );	
			$featured_cat_id = get_cat_ID ( 'Featured Section' );
			$cover_cat_id = get_cat_ID ( 'Cover Stories' );
			$about_id = get_term_by('name', 'IT and engineering', 'course-category')->term_id;
			$health_id = get_term_by('name', 'Health', 'course-category')->term_id;
			$law_id = get_term_by('name', 'Law and criminology', 'course-category')->term_id;
			$masters_id = get_term_by('name', 'Masters Degree', 'course-category')->term_id;
			$featured_id = get_term_by('name', 'Featured', 'course-category')->term_id;
			$review_id = get_term_by('name', 'Featured', 'testimonials-category')->term_id;
			$team_id = get_term_by('name', 'Department Head', 'team-category')->term_id;
			$about_page = get_page_by_title( 'Hats Off As Arts Students Celebrate Graduation' );
			$about_page_main = get_page_by_title( 'TAKE THE NEXT STEP....!!!!' );
			$feat_page = get_page_by_title( 'DEVELOPING INDUSTRY READY GRADUATES SINCE 1991' );

			if ( is_array( $about_page_main ) ) {
			$first_page = array_shift( $about_page_main );
			$about_page_main_id = $first_page->ID;
			} else {
			$about_page_main_id = $about_page_main->ID;
			}
			
			if ( is_array( $about_page ) ) {
			$first_page = array_shift( $about_page );
			$about_page_id = $first_page->ID;
			} else {
			$about_page_id = $about_page->ID;
			}

			$callback_page = get_page_by_title( 'A LAUNCH PAD TO THE WORLD' );

			if ( is_array( $callback_page ) ) {
			$first_page = array_shift( $callback_page );
			$callback_page_id = $first_page->ID;
			} else {
			$callback_page_id = $callback_page->ID;
			}
			
			if ( is_array( $feat_page ) ) {
			$first_page = array_shift( $feat_page );
			$feat_page_id = $first_page->ID;
			} else {
			$feat_page_id = $feat_page->ID;
			}
			
			set_theme_mod( 'select_category_for_slider' , $slides_cat_id );	
			set_theme_mod( 'select_category_for_about' , $featured_cat_id );	
			set_theme_mod( 'select_category_sec_about' , $about_id );	
			set_theme_mod( 'select_about_main_page' , $about_page_main );			
			set_theme_mod( 'select_about_secondary_page' , $about_page_id );			
			set_theme_mod( 'select_our_featured_page' , $feat_page_id );			
			set_theme_mod( 'select_callback_page' , $callback_page_id );				
			set_theme_mod( 'select_category_for_testimonial' , $review_id );		
			set_theme_mod( 'select_team_from' , $team_id );	 
			set_theme_mod( 'select_cat_for_search_1' , $featured_id );
			set_theme_mod( 'select_cat_for_search_2' , $health_id );
			set_theme_mod( 'select_cat_for_search_3' , $about_id );
			set_theme_mod( 'select_cat_for_search_4' , $masters_id );
			set_theme_mod( 'select_cat_for_search_5' , $law_id );
	
			

        }
        add_action('pt-ocdi/after_import', 'ocdi_after_import_setup');
    }
}
add_action('admin_init', 'education_x_ocdi_after_import');