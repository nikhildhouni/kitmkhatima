<?php
/**
 * Mailchimp For Footer
 *
 * @package Education x
**/

if( !function_exists('education_x_footer_mailchimp') ):

    // Footer Mailchimp
    function education_x_footer_mailchimp(){

       if ( education_x_get_option('enable_mailchimp') == 1 ) { ?>
            <section class="section-mailchimp mailchimp-bgcolor">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="widget-title text-center">
                                <?php echo esc_html(education_x_get_option('mailchimp_title')); ?>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <?php
                            $education_x_mailchimp_code = wp_kses_post(education_x_get_option('mailchimp_shortcode'));
                            if (!empty($education_x_mailchimp_code)) {
                                echo do_shortcode($education_x_mailchimp_code);
                            } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php 
        }
    }

endif;