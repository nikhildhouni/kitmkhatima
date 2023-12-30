<?php
if (!function_exists('education_x_search_section')) :
    /**
     * Tab search Details
     *
     * @since Education X 1.0.0
     *
     */
    function education_x_search_section()
    {
        $education_x_search_button_text = education_x_get_option('button_text_on_search');
        $education_x_search_button_url = education_x_get_option('button_button_link');
        $education_x_search_title = education_x_get_option('search_section_title');
        $education_x_search_cat_no = absint(education_x_get_option('number_of_content_home_search'));
        if (1 != education_x_get_option('show_search_section')) {
            return null;
        }   ?>
                <section class="section-block course-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="section-header text-center">
                                    <h2 class="section-title section-title2"><?php echo esc_html($education_x_search_title); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                        <?php $education_x_category_list_array = array();
                        $education_x_category='';
                        for ($i = 1; $i <= $education_x_search_cat_no; $i++) {
                            $education_x_category_list = education_x_get_option('select_cat_for_search_' . $i);
                            if (!empty($education_x_category_list)) {
                                $education_x_category_list_array[] = absint($education_x_category_list);
                            }
                        }

                        for ($j=0; $j < $education_x_search_cat_no ; $j++) {
                            if (!empty($education_x_category_list_array[$j])) {
                                $education_x_category = get_cat_name($education_x_category_list_array[$j]);
                                $education_x_category_url = get_category_link($education_x_category_list_array[$j]);
                                if (class_exists('Education_Connect') && post_type_exists('courses' )) {
                                    $education_x_cat_term = get_term( $education_x_category_list_array[$j], 'course-category' );
                                    $education_x_category = $education_x_cat_term->name;
                                    $education_x_category_url = get_term_link( $education_x_category_list_array[$j], 'course-category' );
                                }
                            ?>
                            <div class="col-md-4 col-sm-6" data-mh="course-browse">
                                <div class="course-browser table-align">
                                    <a href="<?php echo esc_url($education_x_category_url); ?>" class="table-align-cell v-align-middle">
                                        <span><?php echo esc_html($education_x_category); ?></span>
                                    </a>
                                </div>
                            </div>

                        <?php } }?>
                            <?php if (!empty($education_x_search_button_text)) { ?>
							 <div class="col-md-4 col-sm-6 p-0" >
                                <a href="<?php echo esc_url($education_x_search_button_url); ?>"
                                   class="btn btn-sm btn-border"><?php echo esc_html($education_x_search_button_text); ?></a>
								  </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
                <!--CTA Ends-->
            <?php
    }
endif;
add_action('education_x_action_front_page', 'education_x_search_section', 10);
