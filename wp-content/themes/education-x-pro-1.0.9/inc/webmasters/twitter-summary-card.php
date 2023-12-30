<?php
/**
* Twitter Summary Card.
*
* @package  Education X
*/



add_action( 'wp_head', 'education_x_twitter_summary_card',1 );
/**
 * Open Graph Meta.
 *
 * @since  1.0.0
 *
 * @return void
 */
function education_x_twitter_summary_card() {
    
    $default = education_x_get_default_theme_options();

   $tmt_ed_twitter_summary = get_theme_mod( 'tmt_ed_twitter_summary' );
    if( $tmt_ed_twitter_summary ){

        global $post;
        
        $tmt_twitter_summary_title = esc_html( get_theme_mod( 'tmt_twitter_summary_title',$default['tmt_twitter_summary_title'] ) );
        $tmt_twitter_summary_desc =  esc_html( get_theme_mod( 'tmt_twitter_summary_desc',$default['tmt_twitter_summary_desc'] ) );
        $tmt_twitter_summary_site_type =  esc_html( get_theme_mod( 'tmt_twitter_summary_site_type' ) );
        $tmt_twitter_summary_home_default_image =  esc_url( get_theme_mod('tmt_twitter_summary_home_default_image') );
        $tmt_twitter_summary_custom_meta = education_x_meta_sanitize_metabox( get_theme_mod('tmt_twitter_summary_custom_meta') );
        $tmt_twittwer_summary_user =  esc_html( get_theme_mod('tmt_twittwer_summary_user' ) );

        $tmt_ts_ed = '';
        if( is_single() || is_page() ){

            $post_id = $post->ID;
            $tmt_ts_ed = esc_html( get_post_meta( $post->ID, 'tmt_ts_ed', true ) );
            $tmt_twitter_summary_title_metabox = esc_html( get_post_meta( $post->ID, 'tmt_twitter_summary_title', true ) );
            $tmt_twitter_summary_desc_metabox = esc_html( get_post_meta( $post->ID, 'tmt_twitter_summary_desc', true ) );
            $tmt_twitter_summary_username_metabox = esc_html( get_post_meta( $post->ID, 'tmt_twitter_summary_username', true ) );
            $tmt_twitter_summary_type_metabox = esc_html( get_post_meta( $post->ID, 'tmt_twitter_summary_type', true ) );
            $tmt_twitter_summary_custom_meta_metabox = education_x_meta_sanitize_metabox( get_post_meta( $post->ID, 'tmt_twitter_summary_custom_meta', true ) );
            $tmt_twitter_summary_image_metabox = esc_url( get_post_meta( $post->ID, 'tmt_twitter_summary_image', true ) );

        }

        if( !$tmt_ts_ed && ( is_single() || is_page() ) ){

            if( $tmt_twitter_summary_username_metabox ){
                $tmt_twittwer_summary_user = $tmt_twitter_summary_username_metabox;
            }

            if( $tmt_twittwer_summary_user ){
                echo '<meta property="twitter:site" content="'. esc_attr( $tmt_twittwer_summary_user ).'">', "\n";
                echo '<meta property="twitter:creator" content="'. esc_attr( $tmt_twittwer_summary_user ).'">', "\n";
            }

        }else{

            if( $tmt_twittwer_summary_user ){
                echo '<meta property="twitter:site" content="'. esc_attr( $tmt_twittwer_summary_user ).'">', "\n";
                echo '<meta property="twitter:creator" content="'. esc_attr( $tmt_twittwer_summary_user ).'">', "\n";
            }

        }

        if( !$tmt_ts_ed && ( is_single() || is_page() ) ){

            if( $tmt_twitter_summary_type_metabox ){
                $tmt_twitter_summary_site_type = $tmt_twitter_summary_type_metabox;
            }
            if( $tmt_twitter_summary_site_type ){
                echo '<meta property="twitter:card" content="'. esc_attr( $tmt_twitter_summary_site_type ).'">', "\n";
            }
        }else{

            if( $tmt_twitter_summary_site_type ){
                echo '<meta property="twitter:card" content="'. esc_attr( $tmt_twitter_summary_site_type ).'">', "\n";
            }

        }

        if( is_single() || is_page() || is_archive() ){

            if( !$tmt_ts_ed && ( is_single() || is_page() ) ){

                $tmt_twitter_summary_title = get_the_title( $post_id );

                if( $tmt_twitter_summary_title_metabox ){
                    $tmt_twitter_summary_title = $tmt_twitter_summary_title_metabox;
                }
                echo '<meta property="twitter:title" content="'. esc_attr( $tmt_twitter_summary_title ).'">', "\n";
             
            }else{

                $tmt_twitter_summary_title = get_the_archive_title( $before = '', $after = '' );
                echo '<meta property="twitter:title" content="'. esc_attr( $tmt_twitter_summary_title ).'">', "\n";
            
            }

        }else{

            if( $tmt_twitter_summary_title ){
                echo '<meta property="twitter:title" content="'. esc_attr( $tmt_twitter_summary_title ).'">', "\n";
            
            }

        }

        if( !$tmt_ts_ed && ( is_single() || is_page() ) ){

            if( has_excerpt() ){
              $tmt_twitter_summary_desc = esc_html( get_the_excerpt() );
            }else{
                
                $content_post = get_post($post_id);
                $content = $content_post->post_content;
                if( $content ){
                    $tmt_twitter_summary_desc = esc_html( wp_trim_words( $content,20,'...') );
                }

            }

            if( $tmt_twitter_summary_desc_metabox ){
                $tmt_twitter_summary_desc = $tmt_twitter_summary_desc_metabox;
            }
            if( $tmt_twitter_summary_desc ){
            echo '<meta property="twitter:description" content="'. esc_attr( $tmt_twitter_summary_desc ).'">', "\n";
            }

        }else{
            if( $tmt_twitter_summary_desc ){
            echo '<meta property="twitter:description" content="'. esc_attr( $tmt_twitter_summary_desc ).'">', "\n";
            }
        }

        if( !$tmt_ts_ed && ( is_single() || is_page() ) ){

            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'large' );

            if( $featured_image[0] ){

                $tmt_twitter_summary_home_default_image = $featured_image[0];

            }
            if( $tmt_twitter_summary_image_metabox ){
                $tmt_twitter_summary_home_default_image = $tmt_twitter_summary_image_metabox;
            }
            if( $tmt_twitter_summary_home_default_image ){
                
            echo '<meta property="twitter:image" content="'. esc_attr( $tmt_twitter_summary_home_default_image ).'">', "\n";
            }

        }else{

            if( $tmt_twitter_summary_home_default_image ){
                echo '<meta property="twitter:image" content="'. esc_attr( $tmt_twitter_summary_home_default_image ).'">', "\n";
            }

        }

        if( !$tmt_ts_ed && ( is_single() || is_page() ) ){

            if( $tmt_twitter_summary_custom_meta_metabox ){

                echo education_x_meta_sanitize_metabox( $tmt_twitter_summary_custom_meta_metabox );
            }
        }

        if( $tmt_twitter_summary_custom_meta ){

            echo education_x_meta_sanitize_metabox( $tmt_twitter_summary_custom_meta );
        }

    }

}