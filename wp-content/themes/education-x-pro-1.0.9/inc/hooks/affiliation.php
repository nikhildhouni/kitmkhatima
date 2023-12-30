<?php
if (!function_exists('education_x_affiliation')) :
    /**
     * client
     *
     * @since education-x 1.0.0
     *
     */
    function education_x_affiliation()
    {
        if (1 != education_x_get_option('show_client_section')) {
            return null;
        }
        $education_x_client_number = absint(education_x_get_option('client_numbers'));
        $education_x_client_section_title = esc_html(education_x_get_option('client_section_title'));
        ?>
        <!--clients Section starts-->
        <section class="section-block section-block-1 affiliation-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if (!empty($education_x_client_section_title)) { ?>
                            <div class="block-heading">
                                <div class="section-header">
                                    <h2 class="section-title section-title2">
                                        <span><?php echo esc_html($education_x_client_section_title); ?></span>
                                    </h2>
                                </div>
                                <div class="section-content">
                                </div>
                            </div>
                        <?php } ?>
                        <?php $rtl_class = 'false';
                        if(is_rtl()){ 
                            $rtl_class = 'true';
                        }?>
                        <div class="tm-affiliation" data-slick='{"rtl": <?php echo($rtl_class); ?>}'>
                            <?php for ($i=1; $i <= $education_x_client_number; $i++) {
                                ?>
                                <div class="affiliation-item">
                                    <div class="affiliation-logo">
                                        <a href="<?php echo esc_url(education_x_get_option('url_for_client_'.$i)); ?>" target="_blank">
                                            <span>
                                                <img src="<?php echo esc_url(education_x_get_option('upload_image_for_client_'.$i)); ?>">
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--clients Section ends-->
        <?php
    }
endif;
add_action('education_x_action_front_page', 'education_x_affiliation', 95);