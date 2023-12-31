<?php
/**
* Webmasters Tools.
*
* @package Education X
*/



add_action( 'wp_head', 'education_x_webmaster_message',1 );
/**
 * Meta Tags message.
 */
function education_x_webmaster_message() {
    
    $tmt_verification_code_google = get_theme_mod('tmt_verification_code_google');
    $tmt_verification_code_bing = get_theme_mod('tmt_verification_code_bing');
    $tmt_verification_code_pinterest = get_theme_mod('tmt_verification_code_pinterest');
    $tmt_verification_code_alexa = get_theme_mod('tmt_verification_code_alexa');
    $tmt_verification_code_yandex = get_theme_mod('tmt_verification_code_yandex');
    $tmt_ed_open_graph = get_theme_mod( 'tmt_ed_open_graph' );
    $tmt_ed_twitter_summary = get_theme_mod( 'tmt_ed_twitter_summary' );

    if( $tmt_verification_code_google || 
        $tmt_verification_code_bing || 
        $tmt_verification_code_pinterest || 
        $tmt_verification_code_alexa || 
        $tmt_verification_code_yandex || 
        $tmt_ed_open_graph || 
        $tmt_ed_twitter_summary)
    echo '<!-- '.esc_html__('Generated By ','education-x-pro').wp_get_theme().esc_html__(' Webmasters Tools','education-x-pro').'  - https://thememattic.com/theme/education-x-pro/ -->', "\n";
}

add_action( 'wp_head', 'education_x_header_scripts',100 );
/**
 * Outputs Additional JS to site header.
 *
 * @since  1.0.0
 *
 * @return void
 */
function education_x_header_scripts() {
 
    $addtional_js_head = get_option( 'tmt_header_script', '' );

    if ( '' === $addtional_js_head ) {
        return;
    }

    echo $addtional_js_head . "\n";

}

add_action( 'wp_footer', 'education_x_footer_scripts',100 );
/**
 * Outputs Additional JS to site footer.
 *
 * @since  1.0.0
 *
 * @return void
 */
function education_x_footer_scripts() {
 
    $addtional_js_footer = get_option( 'tmt_footer_script', '' );

    if ( '' === $addtional_js_footer ) {
        return;
    }

    echo $addtional_js_footer . "\n";
}

add_action( 'wp_head', 'education_x_verification_meta',1 );
/**
 * Verification Meta.
 *
 * @since  1.0.0
 *
 * @return void
 */
function education_x_verification_meta() {

    $tmt_verification_code_google = get_theme_mod('tmt_verification_code_google');
    $tmt_verification_code_bing = get_theme_mod('tmt_verification_code_bing');
    $tmt_verification_code_pinterest = get_theme_mod('tmt_verification_code_pinterest');
    $tmt_verification_code_alexa = get_theme_mod('tmt_verification_code_alexa');
    $tmt_verification_code_yandex = get_theme_mod('tmt_verification_code_yandex');

    if( $tmt_verification_code_google ){ 
    echo '<meta name="google-site-verification" content="'.esc_attr( $tmt_verification_code_google ).'">', "\n";
    }

    if( $tmt_verification_code_bing ){
    echo '<meta name="msvalidate.01" content="'.esc_attr( $tmt_verification_code_bing ).'">', "\n";
    }

    if( $tmt_verification_code_pinterest ){
    echo '<meta name="p:domain_verify" content="'.esc_attr( $tmt_verification_code_pinterest ).'">', "\n";
    }

    if( $tmt_verification_code_alexa ){
    echo '<meta name="alexaVerifyID" content="'.esc_attr( $tmt_verification_code_alexa ).'">', "\n";
    }

    if( $tmt_verification_code_yandex ){
    echo '<meta name="yandex-verification" content="'.esc_attr( $tmt_verification_code_yandex ).'">', "\n";
    }


}