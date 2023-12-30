<?php
// shortcode for subject options
if (!function_exists('education_connect_get_terms')):
    // Terms name and slug
    function education_connect_get_terms($taxonomy = '', $post_id = '')
    {
        if (empty($post_id)) {
            GLOBAL $post;
            $post_id = $post->ID;
        }
        $education_connect_taxonomies = wp_get_post_terms($post_id, $taxonomy, array("fields" => "all"));
        foreach ($education_connect_taxonomies as $education_connect_taxonomy) {
            echo '<a href="' . esc_url(get_term_link($education_connect_taxonomy->slug, $taxonomy)) . '" class="category-name">' . esc_html($education_connect_taxonomy->name) . '</a> ';
        }
    }
endif;


if (!function_exists('education_connect_course_duration')):
    // Course duration
    function education_connect_course_duration($post_id = '')
    {
        if (empty($post_id)) {
            GLOBAL $post;
            $post_id = $post->ID;
        }
        $education_connect_course_duration = get_post_meta($post_id, 'education_connect_course_duration_value', true);
        if (!empty($education_connect_course_duration)) {
            echo '<td class="ec-label ec-course-duration-label">' . __('Duration: ', 'education-connect') . '</td><td class="ec-course-duration">' . esc_html($education_connect_course_duration) . '</td>';
        }
    }
endif;


if (!function_exists('education_connect_course_teacher')):
    // Course duration
    function education_connect_course_teacher($post_id = '')
    {
        if (empty($post_id)) {
            GLOBAL $post;
            $post_id = $post->ID;
        }
        $ec_subject_teacher_id = absint(get_post_meta($post_id, 'ec_subject_teacher', true));
        if ($ec_subject_teacher_id == 0) {
            return;
        }
        $ec_subject_teacher = get_the_title($ec_subject_teacher_id);
        if (!empty($ec_subject_teacher)) {
            echo '<td class="ec-label ec-course-duration-label">' . __('Teacher: ', 'education-connect') . '</td><td class="ec-course-duration">' . esc_html($ec_subject_teacher) . '</td>';
        }
    }
endif;

if (!function_exists('education_connect_course_price')):
    // Course price
    function education_connect_course_price($post_id = '')
    {
        if (empty($post_id)) {
            GLOBAL $post;
            $post_id = $post->ID;
        }
        $education_connect_course_price = get_post_meta($post_id, 'education_connect_course_price_value', true);
        if (!empty($education_connect_course_price)) {
            echo '<td class="ec-label ec-course-price-label">' . __('Price: ', 'education-connect') . '</td><td class="ec-course-price">' . esc_html($education_connect_course_price) . '</td>';
        }
    }
endif;

if (!function_exists('education_connect_course_students')):
    // Course no of students
    function education_connect_course_students($post_id = '')
    {
        if (empty($post_id)) {
            GLOBAL $post;
            $post_id = $post->ID;
        }
        $education_connect_course_students = get_post_meta($post_id, 'education_connect_course_students_value', true);
        if (!empty($education_connect_course_students)) {
            echo '<td class="ec-label ec-course-students-label">' . __('No of Students: ', 'education-connect') . '</td><td class="ec-course-students">' . esc_html($education_connect_course_students) . '</td>';
        }
    }
endif;

function education_connect_subject_content()
{
    ?>
    <div class="col-grid col-three">
        <div class="ec-item subject-item">
            <figure class="image-wrapper">
                <a href="<?php the_permalink(); ?>">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('post-thumbnail', array('alt' => the_title_attribute(array('echo' => false))));
                    } else {
                        echo '<img src="">';
                    }
                    ?>
                </a>
                <div class="ec-bg-overlay"></div>
            </figure><!-- .image-wrapper -->

            <div class="ec-cpt-format">
                <div class="cpt-format">
                    <i class="ecicon ecicon-ec-mortarboard ec-bgcolor"></i>
                </div>
            </div>

            <figcaption class="ec-contents ec-contents-archieve subject-contents">
                <div class="course-header-contents">
                    <h3 class="ec-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>

                    <?php if (has_term('','team-department')){ ?>
                        <div class="department">
                            <b><?php esc_html_e('Department ', 'education-connect'); ?></b>
                            <?php
                            // get all terms
                            education_connect_get_terms('team-department');
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (has_term('', 'course-category')) { ?>
                        <div class="course">
                            <b><?php esc_html_e('Course ', 'education-connect'); ?></b>
                            <?php
                            // get all terms
                            education_connect_get_terms('course-category');
                            ?>
                        </div>
                    <?php } ?>

                    <table class="ec-table">
                        <colgroup>
                            <col width="30%">
                            <col width="70%">
                        </colgroup>
                        <tr>
                            <?php education_connect_course_duration(); ?>
                        </tr>
                        <tr>
                            <?php education_connect_course_price(); ?>
                        </tr>
                        <tr>
                            <?php education_connect_course_students(); ?>
                        </tr>
                    </table>

                </div><!-- .course-header-contents -->


                <a href="<?php the_permalink(); ?>" class="ec-btn ec-bgcolor">
                    <?php _e('Learn More', 'education-connect'); ?> <i class="ecicon ecicon-ec-next"></i>
                </a>

            </figcaption><!-- .subject-contents -->
        </div><!-- .subject-item -->
    </div><!-- .column-wrapper -->
    <?php
}

add_action('education_connect_subject_content_action', 'education_connect_subject_content', 10);

function education_connect_subject_shortcode_function($atts)
{
    /*
     * Course Shortcode Function
     */

    ob_start();

    $input = shortcode_atts(array(
        'category' => '',
        'no_of_posts' => 2,
        'post_ids' => '',
    ), $atts);
    $args = array(
        'post_type' => 'courses',
        'courses-category' => $input['category'],
        'posts_per_page' => $input['no_of_posts'],
        'post__in' => !empty($input['post_ids']) ? explode(',', $input['post_ids']) : ''
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()):
        ?>
        <section class="page-section ec-customization-properties">
            <div class="ec-courses">
                <div class="ec-row">
                    <?php
                    /* Start the Loop */
                    while ($the_query->have_posts()):$the_query->the_post();
                        /**
                         * Hook - education_connect_subject_content_action.
                         */
                        do_action('education_connect_subject_content_action');
                    endwhile; ?>
                </div>
            </div><!-- .subject-lists -->
        </section>
    <?php endif;
    wp_reset_postdata();
    return ob_get_clean();
}

add_shortcode('EDUCATION_CONNECT_SUBJECTS', 'education_connect_subject_shortcode_function');