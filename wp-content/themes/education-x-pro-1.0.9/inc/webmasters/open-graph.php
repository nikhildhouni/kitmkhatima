<?php
/**
* Open Graph.
*
* @package Education X
*/



add_action( 'wp_head', 'education_x_opengraph',1 );
/**
 * Open Graph Meta.
 *
 * @since  1.0.0
 *
 * @return void
 */
function education_x_opengraph() {
    
    $default = education_x_get_default_theme_options();

    $tmt_ed_open_graph = get_theme_mod( 'tmt_ed_open_graph' );
    if( $tmt_ed_open_graph ){

        global $post;
        $tmt_open_graph_title = get_theme_mod( 'tmt_open_graph_title',$default['tmt_open_graph_title'] );
        $tmt_open_graph_desc = get_theme_mod( 'tmt_open_graph_desc',$default['tmt_open_graph_desc'] );
        $tmt_open_graph_site_name = get_theme_mod( 'tmt_open_graph_site_name',$default['tmt_open_graph_title'] );
        $tmt_open_graph_site_type = get_theme_mod( 'tmt_open_graph_site_type' );
        $tmt_open_graph_url = get_theme_mod( 'tmt_open_graph_url',$default['tmt_open_graph_url'] );
        $tmt_open_graph_home_default_image = get_theme_mod('tmt_open_graph_home_default_image');
        $tmt_open_graph_locole = get_theme_mod( 'tmt_open_graph_locole',$default['tmt_open_graph_locole'] );
        $tmt_open_graph_custom_meta = education_x_meta_sanitize_metabox( get_theme_mod('tmt_open_graph_custom_meta') );

        $tmt_og_ed  = '';
        if( is_single() || is_page() ){

            $post_id = $post->ID;
            $tmt_og_ed = esc_attr( get_post_meta( $post->ID, 'tmt_og_ed', true ) );
            $tmt_og_title = esc_attr( get_post_meta( $post->ID, 'tmt_og_title', true ) );
            $tmt_og_desc = esc_attr( get_post_meta( $post->ID, 'tmt_og_desc', true ) );
            $tmt_og_url = esc_attr( get_post_meta( $post->ID, 'tmt_og_url', true ) );
            $tmt_og_type = esc_attr( get_post_meta( $post->ID, 'tmt_og_type', true ) );
            $tmt_og_custom_meta = education_x_meta_sanitize_metabox( get_post_meta( $post->ID, 'tmt_og_custom_meta', true ) );
            $tmt_og_image = esc_attr( get_post_meta( $post->ID, 'tmt_og_image', true ) );
        }

        if( $tmt_open_graph_locole ){
            echo '<meta property="og:locale" content="'. esc_attr( $tmt_open_graph_locole ).'">',"\n";
        }

        if( !$tmt_og_ed && ( is_single() || is_page() ) ){

            if( $tmt_og_type ){
                $tmt_open_graph_site_type = $tmt_og_type;
            }
            if( $tmt_open_graph_site_type ){
                echo '<meta property="og:type" content="'. esc_attr( $tmt_open_graph_site_type ).'">',"\n";
            }

        }else{

            if( $tmt_open_graph_site_type ){
                echo '<meta property="og:type" content="'. esc_attr( $tmt_open_graph_site_type ).'">',"\n";
            }

        }

        if( $tmt_open_graph_site_name ){
            echo '<meta property="og:site_name" content="'. esc_attr( $tmt_open_graph_site_name ).'">',"\n";
        }

        if( is_single() || is_page() || is_archive() ){

            if( !$tmt_og_ed && ( is_single() || is_page() ) ){

                $tmt_open_graph_title = get_the_title( $post_id );
                if( $tmt_og_title ){
                    $tmt_open_graph_title = $tmt_og_title;
                }
                echo '<meta property="og:title" content="'. esc_attr( $tmt_open_graph_title ).'">',"\n";
            }else{
                $tmt_open_graph_title = get_the_archive_title( $before = '', $after = '' );
                echo '<meta property="og:title" content="'. esc_attr( $tmt_open_graph_title ).'">',"\n";
            }

        }else{

            if( $tmt_open_graph_title ){
                echo '<meta property="og:title" content="'. esc_attr( $tmt_open_graph_title ).'">',"\n";
            }

        }

        if( !$tmt_og_ed && ( is_single() || is_page() ) ){

            if( has_excerpt() ){
              $tmt_open_graph_desc = esc_html( get_the_excerpt() );
            }else{
                
                $content_post = get_post($post_id);
                $content = $content_post->post_content;
                if( $content ){
                    $tmt_open_graph_desc = esc_html( wp_trim_words( $content,10,'...') );
                }

            }
            if( $tmt_og_desc ){
                $tmt_open_graph_desc = $tmt_og_desc;
            }

            if( $tmt_open_graph_desc ){ 
                echo '<meta property="og:description" content="'. esc_attr( $tmt_open_graph_desc ).'">',"\n";
            }

        }else{
            if( $tmt_open_graph_desc ){
                echo '<meta property="og:description" content="'. esc_attr( $tmt_open_graph_desc ).'">',"\n";
            }
        }

        if( !$tmt_og_ed && ( is_single() || is_page() ) ){

            $tmt_open_graph_url = get_the_permalink();
            if( $tmt_og_url ){
                $tmt_open_graph_url = $tmt_og_url;
            }
            echo '<meta property="og:url" content="'. esc_attr( $tmt_open_graph_url ).'">',"\n";
        }else{

            if( $tmt_open_graph_url ){
            echo '<meta property="og:url" content="'. esc_attr( $tmt_open_graph_url ).'">',"\n";
            }

        }

        if( !$tmt_og_ed && ( is_single() || is_page() ) ){

            $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(),'large' );

            if( $featured_image[0] ){

                $tmt_open_graph_home_default_image = $featured_image[0];

            }
            if( $tmt_og_image ){
                $tmt_open_graph_home_default_image = $tmt_og_image;
            }
            if( $tmt_open_graph_home_default_image ){
                
                echo '<meta property="og:image" content="'. esc_attr( $tmt_open_graph_home_default_image ).'">',"\n";
                echo '<meta property="og:image:secure_url" content="'. esc_attr( $tmt_open_graph_home_default_image ).'" />',"\n";
                echo '<meta property="og:image:alt" content="'. esc_attr( $tmt_open_graph_title ).'" />',"\n";
            }

        }else{

            if( $tmt_open_graph_home_default_image ){
                
                echo '<meta property="og:image" content="'. esc_attr( $tmt_open_graph_home_default_image ).'">',"\n";
                echo '<meta property="og:image:secure_url" content="'. esc_attr( $tmt_open_graph_home_default_image ).'" />',"\n";
                echo '<meta property="og:image:alt" content="'. esc_attr( $tmt_open_graph_title ).'" />',"\n";
            }

        }

        if( !$tmt_og_ed && ( is_single() || is_page() ) ){

            if( $tmt_og_custom_meta ){

                echo education_x_meta_sanitize_metabox( $tmt_og_custom_meta );
            }

        }

        if( $tmt_open_graph_custom_meta ){

            echo $tmt_open_graph_custom_meta;
        }

    }

}