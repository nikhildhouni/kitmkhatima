<?php
/**
* Popup Model Box Settings.
*
* @package Education X
*/

if( !function_exists('education_x_popup_model_box') ):

    function education_x_popup_model_box(){

        $default = education_x_get_default_theme_options();
        $ed_popup_model_box = get_theme_mod( 'ed_popup_model_box',$default['ed_popup_model_box'] );
        $ed_popup_model_box_first_loading_only = get_theme_mod( 'ed_popup_model_box_first_loading_only',$default['ed_popup_model_box_first_loading_only'] );

        if( $ed_popup_model_box_first_loading_only && isset( $_COOKIE['visited'] ) ){
            $visited = false;
        }else{
            $visited = true;
        }
        if( $visited && $ed_popup_model_box ){

            $ed_popup_model_box_home_only = get_theme_mod( 'ed_popup_model_box_home_only',$default['ed_popup_model_box_home_only'] );
            $tmt_form_shortcode = get_theme_mod( 'tmt_form_shortcode' );
            $tmt_popup_title = get_theme_mod( 'tmt_popup_title',$default['tmt_popup_title'] );
            $tmt_popup_desc = get_theme_mod( 'tmt_popup_desc',$default['tmt_popup_desc'] );
            $tmt_popup_bg_image_image = get_theme_mod( 'tmt_popup_bg_image_image' );

            if( $ed_popup_model_box_home_only){
                if( is_home() || is_front_page() ){

                    $load_pages = true;

                }else{
                    $load_pages = false;
                }
            }else{
                $load_pages = true;
            }

            if( $load_pages ){ ?>

            <div class="tmt-modal <?php if( $visited ){ echo 'is-visible '; } if( $ed_popup_model_box_first_loading_only ){ echo 'single-load'; }else{ echo 'always-load'; } ?>">

                <div class="tmt-modal-overlay tmt-modal-toggle"></div>

                <div class="tmt-modal-wrapper tmt-modal-transition">
                    <div class="tmt-modal-body">
                        <div class="tmt-popup-wrapper">
                            <div class="tmt-popup-image">
                                <div class="data-bg data-bg-modelbox" data-background="<?php echo esc_url( $tmt_popup_bg_image_image ); ?>">
                                </div>
                            </div>
                            <div class="tmt-popup-content">
                                <button class="tmt-modal-close tmt-modal-toggle">
                                    <i class="fa fa-close"></i>
                                </button>
                                <div class="tmt-popup-content-details">

                                    <?php if( $tmt_popup_title ){ ?>
                                        <h3 class="tmt-popup-title"><?php echo esc_html( $tmt_popup_title ); ?></h3>
                                    <?php } ?>

                                    <?php if( $tmt_popup_desc ){ ?>
                                        <p class="tmt-popup-content-excerpt"><?php echo esc_html( $tmt_popup_desc ); ?></p>
                                    <?php } ?>

                                    <?php if( $tmt_form_shortcode ){ ?>
                                        <div class="tmt-form-wrapper">
                                            <?php echo do_shortcode($tmt_form_shortcode); ?>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php }

        }

    }

endif;