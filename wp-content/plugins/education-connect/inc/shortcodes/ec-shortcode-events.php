<?php
/*
 * Event Details
 */
if (!function_exists('education_connect_event_date')):
    // Event date
    function education_connect_event_date($post_id = '')
    {
        if (empty($post_id)) {
            GLOBAL $post;
            $post_id = $post->ID;
        }
        $education_connect_event_date = get_post_meta($post_id, 'ec_event_date_value', true);
        if (!empty($education_connect_event_date)) {
            echo '<td class="ec-label ec-event-date-label">' . __('Date: ', 'education-connect') . '</td><td class="ec-event-date">' . esc_html($education_connect_event_date) . '</td>';
        }
    }
endif;

if (!function_exists('education_connect_event_start_time')):
    // Event start time
    function education_connect_event_start_time($post_id = '')
    {
        if (empty($post_id)) {
            GLOBAL $post;
            $post_id = $post->ID;
        }
        $education_connect_event_start_time = get_post_meta($post_id, 'ec_event_time_from_value', true);
        if (!empty($education_connect_event_start_time)) {
            echo '<td class="ec-label ec-event-start-time-label">' . __('From: ', 'education-connect') . '</td><td class="ec-event-start-time">' . esc_html($education_connect_event_start_time) . '</td>';
        }
    }
endif;

if (!function_exists('education_connect_event_end_time')):
    // Event end time
    function education_connect_event_end_time($post_id = '')
    {
        if (empty($post_id)) {
            GLOBAL $post;
            $post_id = $post->ID;
        }
        $education_connect_event_end_time = get_post_meta($post_id, 'ec_event_time_to_value', true);
        if (!empty($education_connect_event_end_time)) {
            echo '<td class="ec-label ec-event-end-time-label">' . __('To: ', 'education-connect') . '</td><td class="ec-event-end-time">' . esc_html($education_connect_event_end_time) . '</td>';
        }
    }
endif;

if (!function_exists('education_connect_event_location')):
    // Event locaton
    function education_connect_event_location($post_id = '')
    {
        if (empty($post_id)) {
            GLOBAL $post;
            $post_id = $post->ID;
        }
        $education_connect_event_location = get_post_meta($post_id, 'ec_event_location_value', true);
        if (!empty($education_connect_event_location)) {
            echo '<td class="ec-label ec-event-location-label">' . __('Location: ', 'education-connect') . '</td><td class="ec-event-location">' . strip_tags(htmlspecialchars_decode($education_connect_event_location)) . '</td>';
        }
    }
endif;

// shortcode for event options
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

// events action function
function ec_action_event_content()
{
    ?>
    <div class="col-grid col-three">
        <div class="ec-item event-item">
            <figure class="image-wrapper">
                <a href="<?php the_permalink(); ?>">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('post-thumbnail', array('alt' => the_title_attribute(array('echo' => false))));
                    } else {
                        echo '';
                    }
                    ?>
                </a>
                <div class="ec-bg-overlay"></div>
            </figure><!-- .image-wrapper -->

            <div class="ec-cpt-format">
                <div class="cpt-format">
                    <i class="ecicon ecicon-ec-calendar ec-bgcolor"></i>
                </div>
            </div>

            <figcaption class="ec-contents ec-contents-archieve event-contents">
                <h3 class="ec-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <table class="ec-table">
                    <colgroup>
                        <col width="30%">
                        <col width="70%">
                    </colgroup>
                    <!-- event date -->
                    <tr>
                        <?php education_connect_event_date(); ?>
                    </tr>
                    <!-- start time -->
                    <tr>
                        <?php education_connect_event_start_time(); ?>
                    </tr>
                    <!-- end time -->
                    <tr>
                        <?php education_connect_event_end_time(); ?>
                    </tr>
                    <!-- event location -->
                    <tr>
                        <?php education_connect_event_location(); ?>
                    </tr>
                </table>
                <?php if (has_term('','event-category')){ ?>
                    <div class="categories">
                        <b><?php esc_html_e('Posted In: ', 'education-connect'); ?></b>
                        <?php
                        // get all terms
                        education_connect_get_terms('event-category');
                        ?>
                    </div><!-- .categories -->
                <?php } ?>

                <a href="<?php the_permalink(); ?>" class="ec-btn ec-bgcolor">
                    <?php _e('Learn More', 'education-connect'); ?> <i class="ecicon ecicon-ec-next"></i>
                </a>

            </figcaption><!-- .event-contents -->
        </div><!-- .event-item -->
    </div><!-- .column-wrapper -->
    <?php
}

add_action('ec_action_event_content_action', 'ec_action_event_content', 10);

function education_connect_event_shortcode_function($atts)
{
    /*
     * Event Shortcode Function
     */

    ob_start();
    $input = shortcode_atts(array(
        'category' => '',
        'post_ids' => '',
        'no_of_posts' => '',
    ), $atts);
    $args = array(
        'post_type' => 'events',
        'event-category' => $input['category'],
        'posts_per_page' => $input['no_of_posts'],
        'post__in' => !empty($input['post_ids']) ? explode(',', $input['post_ids']) : ''
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) : ?>
        <section class="page-section ec-customization-properties">
            <div class="ec-events">
                <div class="ec-row">
                    <?php
                    /* Start the Loop */
                    while ($the_query->have_posts()) : $the_query->the_post();
                        /**
                         * Hook - ec_action_event_content_action.
                         *
                         * @hooked ec_action_event_content -  10
                         */
                        do_action('ec_action_event_content_action');
                    endwhile; ?>
                </div>
            </div><!-- .event-lists -->
        </section>
    <?php
    endif;
    wp_reset_postdata();
    return ob_get_clean();
}

add_shortcode('EDUCATION_CONNECT_EVENTS', 'education_connect_event_shortcode_function');