<?php
if (!function_exists('education_x_contact_map')) :
    /**
     * Tab contact Details
     *
     * @since education x 1.0.0
     *
     */
    function education_x_contact_map()
    {
        if (1 != education_x_get_option('show_contact_map_section')) {
            return null;
        }
        ?>

        <!-- Google Map -->
        <section class="map-section section-block">
            <div class="google-map elements-bg">
                <div id="map" class="map">
                    <?php
                    $education_x_google_map_code = wp_kses_post(education_x_get_option('google_map_shortcode'));
                    if (!empty($education_x_google_map_code)) {
                        echo do_shortcode($education_x_google_map_code);
                    }
                    ?>
                </div>
                <div class="map-container">
                    <div class="map-toggle">
                        <div class="map-toggle-icon">
                            <i class="icon fa fa-map-marker"></i>
                        </div>
                        <div class="map-toggle-info">
                            <div class="map-toggle-open"> <?php _e('Open the map', 'education-x-pro'); ?> <i class="icon fa fa-angle-down"></i></div>
                            <div class="map-toggle-close"><?php _e('Close the map', 'education-x-pro'); ?> <i class="icon fa fa-angle-up"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Google Map -->
        <?php
    }
endif;
add_action('education_x_action_front_page', 'education_x_contact_map', 100);