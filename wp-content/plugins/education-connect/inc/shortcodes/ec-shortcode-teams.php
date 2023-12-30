<?php
/*
 * Team Details
 */
if (!function_exists('education_connect_team_email')):
    // Team Email
    function education_connect_team_email($post_id = '')
    {
        if (empty($post_id)) {
            GLOBAL $post;
            $post_id = $post->ID;
        }
        $ec_team_email = get_post_meta($post_id, 'ec_team_email_value', true);
        if (!empty($ec_team_email)) {
            echo '<td class="ec-label team-email-label">' . __('Email: ', 'education-connect') . '</td><td class="team-email">' . esc_html($ec_team_email) . '</td>';
        }
    }
endif;


if (!function_exists('education_connect_team_website')):
    // Team Website
    function education_connect_team_website($post_id = '')
    {
        if (empty($post_id)) {
            GLOBAL $post;
            $post_id = $post->ID;
        }
        $ec_team_website = get_post_meta($post_id, 'ec_team_website_value', true);
        if (!empty($ec_team_website)) {
            echo '<td class="ec-label team-Website-label">' . __('website: ', 'education-connect') . '</td><td class="team-Website">' . esc_html($ec_team_website) . '</td>';
        }
    }
endif;


if( ! function_exists( 'education_connect_team_social' ) ):
    // Team Social
    function education_connect_team_social( $post_id = '' ) {
        if ( empty( $post_id ) ) {
            GLOBAL $post;
            $post_id = $post->ID;
        }
        $social_links = array('facebook'=>'Facebook', 'twitter'=>'Twitter', 'linkedin'=>'Linkedin', 'google-plus'=>'Google Plus');
            ?>
            <div class="ec-social-link">
                <ul class="ec-social">
                    <?php foreach ( $social_links as $key => $value ) :
                    $stored_social[$key]  = get_post_meta( $post_id, 'education_connect_team_social_value_' . $key, true );
                    $stored_social[$key]  = ! empty( $stored_social[$key] ) ? $stored_social[$key] : ''; ?>
                        <li>
                            <a href="<?php echo esc_url( $stored_social[$key] ); ?>" target="_blank">
                                <i class="ecicon ecicon-ec-<?php echo esc_attr($key); ?>"></i>
                            </a>
                        </li>
                    <?php endforeach; ?>

                </ul><!--.social-icon-->
            </div><!--.social-link-->
            <?php
    }
endif;
// shortcode for team options
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
// TEAM content

function education_connect_team_content()
{
    ?>
    <div class="col-grid col-three">
        <div class="ec-item team-item">
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
                    <i class="ecicon ecicon-ec-team ec-bgcolor"></i>
                </div>
            </div>

            <figcaption class="ec-contents ec-contents-archieve team-contents">
                <div class="course-header-contents">
                    <h3 class="ec-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>

                    <?php education_connect_team_social(); ?>
                    <div class="ec-excerpt">
                    <?php
                    if ( has_excerpt() ) {
                        the_excerpt();
                    } else {
                        echo esc_html (wp_trim_words( get_the_content(), 30, '' ));
                    } ?>
                    </div>

                    <?php if (has_term('','team-designation')){ ?>
                        <div class="designation">
                            <b><?php esc_html_e('Designation ', 'education-connect'); ?></b>
                            <?php
                            // get all terms
                            education_connect_get_terms('team-designation');
                            ?>
                        </div>
                    <?php } ?>
                    <table class="ec-table">
                        <colgroup>
                            <col width="30%">
                            <col width="70%">
                        </colgroup>
                        <!-- team website-->
                        <tr>
                            <?php education_connect_team_website(); ?>
                        </tr>
                        <!-- team email-->
                        <tr>
                            <?php education_connect_team_email(); ?>
                        </tr>

                    </table>
                </div><!-- .course-header-contents -->


                <a href="<?php the_permalink(); ?>" class="ec-btn ec-bgcolor">
                    <?php _e('Learn More', 'education-connect'); ?> <i class="ecicon ecicon-ec-next"></i>
                </a>

            </figcaption><!-- .team-contents -->
        </div><!-- .team-item -->
    </div><!-- .column-wrapper -->
    <?php
}

add_action('education_connect_team_content_action', 'education_connect_team_content', 10);

function education_connect_team_shortcode_function($atts)
{
    /*
     * Team Shortcode Function
     */

    ob_start();

    $input = shortcode_atts(array(
        'category' => '',
        'no_of_posts' => 2,
        'post_ids' => '',
    ), $atts);
    $args = array(
        'post_type' => 'teams',
        'ec-teams-category' => $input['category'],
        'posts_per_page' => $input['no_of_posts'],
        'post__in' => !empty($input['post_ids']) ? explode(',', $input['post_ids']) : ''
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()):
        ?>
        <section class="page-section ec-customization-properties">
            <div class="ec-teams">
                <div class="ec-row">
                    <?php
                    /* Start the Loop */
                    while ($the_query->have_posts()):$the_query->the_post();
                        /**
                         * Hook - education_connect_team_content_action.
                         */
                        do_action('education_connect_team_content_action');
                    endwhile; ?>
                </div>
            </div><!-- .team-lists -->
        </section>
    <?php endif;
    wp_reset_postdata();
    return ob_get_clean();
}

add_shortcode('EDUCATION_CONNECT_TEAMS', 'education_connect_team_shortcode_function');