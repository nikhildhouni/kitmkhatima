<?php
/**
 * Team Options Metabox
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_action( 'admin_init', 'education_connect_teams_meta_init' );
add_action( 'save_post', 'education_connect_teams_meta_save' );

function education_connect_teams_meta_init() {

    add_meta_box("education_connect_teams_meta", __( "Additional Team's Information", 'education-connect' ), "education_connect_teams_meta_options", "teams", "normal", "high");
}

function education_connect_teams_meta_options( $post )
{
    /**
     * Outputs the content of the meta options
     */
    wp_nonce_field( 'education_connect_options_team_nonce', 'education_connect_team_nonce' );
    $education_connect_team_email = get_post_meta( $post->ID, 'ec_team_email_value', true );
    $team_email = ! empty( $education_connect_team_email ) ? $education_connect_team_email : '';
    $education_connect_team_website = get_post_meta( $post->ID, 'ec_team_website_value', true );
    $team_website = ! empty( $education_connect_team_website ) ? $education_connect_team_website : '';

    $education_connect_team_as_teacher = get_post_meta( $post->ID, 'ec_team_set_as_teacher', true );
    $checked = '';
    
    if( $education_connect_team_as_teacher){
        $checked = 'checked';
    }
    $team_social_count = 4;
    $social_links = array('facebook'=>'Facebook', 'twitter'=>'Twitter', 'linkedin'=>'Linkedin', 'google-plus'=>'Google Plus');

    foreach ( $social_links as $key => $value ) :
        $education_connect_social[$key] = get_post_meta( $post->ID, 'education_connect_team_social_value_' . $key, true );
        $education_connect_social[$key] = ! empty( $education_connect_social[$key] ) ? $education_connect_social[$key] : '';
    endforeach;
    ?>

    <label class="ec-label" for="ec_team_set_as_teacher"><?php _e( 'Set as Teacher', 'education-connect' ); ?>: </label><br>
    <input type="checkbox" name="ec_team_set_as_teacher" id="ec_team_set_as_teacher_id"  <?php echo $checked; ?> />
    <p><?php _e( 'Please check team member is a teacher.', 'education-connect' ); ?></p>

    <label class="ec-label" for="ec_team_email_value"><?php _e( 'Email', 'education-connect' ); ?>: </label><br>
    <input type="email" name="ec_team_email_value" id="team_email_id" placeholder="xyzz@gmail.com" value="<?php echo esc_attr( $team_email ); ?>" />
    <p><?php _e( 'Please input the email id of the member.', 'education-connect' ); ?></p>

    <hr>

    <label class="ec-label" for="ec_team_website_value"><?php _e( 'Website', 'education-connect' ); ?>: </label><br>
    <input type="text" name="ec_team_website_value" id="team_website_id" placeholder="www.xyzz.com" value="<?php echo esc_attr( $team_website ); ?>" />
    <p><?php _e( 'Please input the personal website of this member.', 'education-connect' ); ?></p>

    <hr>

    <?php foreach ( $social_links as $key => $value ) : ?>


    <label class="ec-label" for="education_connect_team_social_value"><?php printf( __( '%s', 'education-connect' ), $value ); ?>: </label><br>
    <input type="url" name="<?php echo 'education_connect_team_social_value_' . $key; ?>" id="<?php echo 'education_connect_team_social_' . $key; ?>" value="<?php echo esc_attr( $education_connect_social[$key] ); ?>" />
    <p><?php _e( 'Please input your social links or leave empty.', 'tp-education' ); ?></p>

<?php endforeach; ?>
    <?php
}

function education_connect_teams_meta_save( $post_id )
{
    global $post;
    /**
     * Saves the mata input value
     */
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['education_connect_team_nonce'] ) || !wp_verify_nonce( $_POST['education_connect_team_nonce'], 'education_connect_options_team_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post', $post_id ) ) return;

    if( isset( $_POST['ec_team_set_as_teacher'] ) ) :
        $value = ! empty( $_POST['ec_team_set_as_teacher'] ) ? $_POST['ec_team_set_as_teacher'] : '';
        update_post_meta( $post_id, 'ec_team_set_as_teacher',  $value  );
    else: 
        update_post_meta( $post_id, 'ec_team_set_as_teacher',  ''  );    
    endif;

    if( isset( $_POST['ec_team_email_value'] ) ) :
        $value = ! empty( $_POST['ec_team_email_value'] ) ? $_POST['ec_team_email_value'] : '';
        update_post_meta( $post_id, 'ec_team_email_value', sanitize_email( $value ) );
    endif;

    // Make sure your data is set before trying to save it
    if( isset( $_POST['ec_team_website_value'] ) ) :
        $value = ! empty( $_POST['ec_team_website_value'] ) ? $_POST['ec_team_website_value'] : '';
        update_post_meta( $post_id, 'ec_team_website_value', sanitize_text_field( $value ) );
    endif;

    $social_links = array('facebook'=>'Facebook', 'twitter'=>'Twitter', 'linkedin'=>'Linkedin', 'google-plus'=>'Google Plus');
    foreach ( $social_links as $key => $value ) :
        // Make sure your data is set before trying to save it
        if( isset( $_POST['education_connect_team_social_value_' . $key] ) ) :
            $val = ! empty($_POST['education_connect_team_social_value_' . $key]) ? $_POST['education_connect_team_social_value_' . $key] : '';
            update_post_meta( $post_id, 'education_connect_team_social_value_' . $key, esc_url( $val ) );
        endif;
    endforeach;
}