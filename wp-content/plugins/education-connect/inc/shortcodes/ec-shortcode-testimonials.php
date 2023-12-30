<?php
/*
 * Event Details
 */
// shortcode for testimonial options
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

// testimonials acgion function maheswor --- marich
function ec_action_testimonial_content()
{
    ?>
    <div class="col-grid col-three">
        <div class="ec-item testimonial-item">
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
                    <i class="ecicon ecicon-ec-classroom-tribune ec-bgcolor"></i>
                </div>
            </div>

            <figcaption class="ec-contents ec-contents-archieve testimonial-contents">
                <h3 class="ec-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>

                <div class="ec-excerpt">
                    <?php
                    if ( has_excerpt() ) {
                        the_excerpt();
                    } else {
                        echo esc_html (wp_trim_words( get_the_content(), 30, '' ));
                    } ?>
                </div>

                <a href="<?php the_permalink(); ?>" class="ec-btn ec-bgcolor">
                    <?php _e('Learn More', 'education-connect'); ?> <i class="ecicon ecicon-ec-next"></i>
                </a>

            </figcaption><!-- .testimonial-contents -->
        </div><!-- .testimonial-item -->
    </div><!-- .column-wrapper -->
    <?php
}

add_action('ec_action_testimonial_content_action', 'ec_action_testimonial_content', 10);

function education_connect_testimonial_shortcode_function($atts)
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
        'post_type' => 'testimonials',
        'ec-testimonial-category' => $input['category'],
        'posts_per_page' => $input['no_of_posts'],
        'post__in' => !empty($input['post_ids']) ? explode(',', $input['post_ids']) : ''
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) : ?>
        <section class="page-section ec-customization-properties">
            <div class="ec-testimonials">
                <div class="ec-row">
                    <?php
                    /* Start the Loop */
                    while ($the_query->have_posts()) : $the_query->the_post();
                        /**
                         * Hook - ec_action_testimonial_content_action.
                         *
                         * @hooked ec_action_testimonial_content -  10
                         */
                        do_action('ec_action_testimonial_content_action');
                    endwhile; ?>
                </div>
            </div><!-- .testimonial-lists -->
        </section>
    <?php
    endif;
    wp_reset_postdata();
    return ob_get_clean();
}

add_shortcode('EDUCATION_CONNECT_TESTIMONIALS', 'education_connect_testimonial_shortcode_function');