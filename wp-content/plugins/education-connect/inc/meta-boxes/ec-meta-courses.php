<?php
/**
 * subject Options Metabox
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_action( 'admin_init', 'education_connect_courses_meta_init' );
add_action( 'save_post', 'education_connect_courses_meta_save' );

function education_connect_courses_meta_init() {

    add_meta_box("education_connect_courses_meta", __( "Assign Teacher", 'education-connect' ), "education_connect_courses_meta_options", "courses", "side", "default");
}

function education_connect_courses_meta_options( $post )
{
    /**
     * Outputs the content of the meta options
     */

    global $post;
    $args = array(
        'post_type'        => 'teams',
        'post_status'      => 'publish',
        'posts_per_page'   => -1,
        'meta_query' => array(
            array(
                'key' => 'ec_team_set_as_teacher',
                'value' => '',
                'compare' => '!='
            )
        ),

        'orderby'          => 'title',
        'order'            => 'ASC',
        'suppress_filters' => true
    );


    $teachers = get_posts( $args );


    wp_nonce_field( 'education_connect_options_subject_nonce', 'education_connect_subject_nonce' );

    $education_connect_subject_teacher = get_post_meta( $post->ID, 'ec_subject_teacher', true );
    $subject_teacher = ! empty( $education_connect_subject_teacher ) ? $education_connect_subject_teacher : '';
    $education_connect_education_course_duration = get_post_meta( $post->ID, 'education_connect_course_duration_value', true );
    $course_duration = ! empty( $education_connect_education_course_duration ) ? $education_connect_education_course_duration : '';
    $education_connect_education_course_price = get_post_meta( $post->ID, 'education_connect_course_price_value', true );
    $course_price = ! empty( $education_connect_education_course_price ) ? $education_connect_education_course_price : '';
    $education_connect_education_course_students = get_post_meta( $post->ID, 'education_connect_course_students_value', true );
    $course_students = ! empty( $education_connect_education_course_students ) ? $education_connect_education_course_students : '';


    ?>
    <select name="ec_subject_teacher" class="select">

        <option value=""data-subject-id="" data-subject-id=""><?php _e('Select teacher'); ?></option>
        <?php if(isset($teachers)): ?>
            <?php foreach( $teachers as $teacher ):
                $selected = '';
                if(!empty($subject_teacher )){
                    $selected = ( absint($teacher->ID) == absint($subject_teacher) ) ? 'selected' : '';
                }

                ?>
                <option value="<?php echo $teacher->ID; ?>" data-subject-id="<?php echo $teacher->ID; ?>" <?php echo $selected; ?>>
                    <?php echo $teacher->post_title; ?>
                </option>
            <?php endforeach ?>
        <?php endif ?>


    </select>
    <hr>

    <label class="ec-label" for="education_connect_course_duration_value"><?php _e( 'Duration', 'education-connect' ); ?>: </label><br>
    <input type="text" name="education_connect_course_duration_value" id="course_duration_id" placeholder="<?php _e( '3 Month', 'education-connect' ); ?>" value="<?php echo esc_attr( $course_duration ); ?>" />
    <p><?php _e( 'Please insert the designated duration for this course.', 'education-connect' ); ?></p>

    <hr>

    <label class="ec-label" for="education_connect_course_price_value"><?php _e( 'Price', 'education-connect' ); ?>: </label><br>
    <input type="text" name="education_connect_course_price_value" id="course_price_id" placeholder="<?php _e( '$3', 'education-connect' ); ?>" value="<?php echo esc_attr( $course_price ); ?>" />
    <p><?php _e( 'Please insert the price for this course.', 'education-connect' ); ?></p>

    <hr>

    <label class="ec-label" for="education_connect_course_students_value"><?php _e( 'No of students allocated', 'education-connect' ); ?>: </label><br>
    <input type="text" name="education_connect_course_students_value" id="course_price_id" placeholder="<?php _e( '200', 'education-connect' ); ?>" value="<?php echo esc_attr( $course_students ); ?>" />
    <p><?php _e( 'Please insert the number of students for this course.', 'education-connect' ); ?></p>

    <hr>



    <?php
}

function education_connect_courses_meta_save( $post_id )
{
    global $post;
    /**
     * Saves the mata input value
     */
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['education_connect_subject_nonce'] ) || !wp_verify_nonce( $_POST['education_connect_subject_nonce'], 'education_connect_options_subject_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post', $post_id ) ) return;



    if( isset( $_POST['ec_subject_teacher'] ) ) :
        //teacher
        $value = ! empty( $_POST['ec_subject_teacher'] ) ? $_POST['ec_subject_teacher'] : '';
        update_post_meta( $post_id, 'ec_subject_teacher', sanitize_text_field( $value ) );


    endif;

    // Make sure your data is set before trying to save it
    if( isset( $_POST['education_connect_course_duration_value'] ) ) :
        $value = ! empty( $_POST['education_connect_course_duration_value'] ) ? $_POST['education_connect_course_duration_value'] : '';
        update_post_meta( $post_id, 'education_connect_course_duration_value', sanitize_text_field( $value ) );
    endif;

    // Make sure your data is set before trying to save it
    if( isset( $_POST['education_connect_course_price_value'] ) ) :
        $value = ! empty( $_POST['education_connect_course_price_value'] ) ? $_POST['education_connect_course_price_value'] : '';
        update_post_meta( $post_id, 'education_connect_course_price_value', sanitize_text_field( $value ) );
    endif;

    // Make sure your data is set before trying to save it
    if( isset( $_POST['education_connect_course_students_value'] ) ) :
        $value = ! empty( $_POST['education_connect_course_students_value'] ) ? $_POST['education_connect_course_students_value'] : '';
        update_post_meta( $post_id, 'education_connect_course_students_value', sanitize_text_field( $value ) );
    endif;
}