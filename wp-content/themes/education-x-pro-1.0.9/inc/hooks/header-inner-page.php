<?php
global $post;
if (!function_exists('education_x_single_page_title')) :
    function education_x_single_page_title()
    { 
        if (is_home()) {
            return;
        }
        global $post;
        $global_banner_image = get_header_image();
        // Check if single.
            if (is_singular()) {
                if ( has_post_thumbnail( $post->ID ) ) {
                    $banner_image_single_post = get_post_meta( $post->ID, 'education-x-meta-checkbox', true );
                    if ( 'yes' == $banner_image_single_post ) {
                        $banner_image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'education-x-header-image' );
                        $global_banner_image = $banner_image_array[0];
                    }
                }
            }
            ?>
        <div class="inner-banner primary-bgcolor data-bg " data-background="<?php echo esc_url($global_banner_image); ?>">
            <header class="entry-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (is_singular()) { ?>
                                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                                <?php if (!is_page()) { ?>
                                    <?php if (education_x_get_option('single_post_meta_data') == 1) { ?>
                                        <header class="entry-header">
                                            <div class="entry-meta entry-inner">
                                                <?php
                                                    education_x_posted_on();
                                                ?>
                                            </div><!-- .entry-meta -->
                                        </header><!-- .entry-header -->
                                    <?php }?>
                                <?php }
                            } elseif (is_404()) { ?>
                                <h1 class="entry-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'education-x-pro'); ?></h1>
                            <?php } elseif (is_archive()) {
                                the_archive_title('<h1 class="entry-title">', '</h1>');
                                the_archive_description('<div class="taxonomy-description">', '</div>');
                            } elseif (is_search()) { ?>
                                <h1 class="entry-title"><?php printf(esc_html__('Search Results for: %s', 'education-x-pro'), '<span>' . get_search_query() . '</span>'); ?></h1>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </header><!-- .entry-header -->
            <div class="bg-overlay"></div>
        </div>

        <?php if( !is_404() ){ ?>

            <div class="breadcrumb-wrapper secondary-bgcolor">
                <div class="container">
                    <div class="row">
                        <?php
                        /**
                         * Hook - education_x_add_breadcrumb.
                         */
                        do_action( 'education_x_action_breadcrumb' );
                        ?>
                    </div>
                </div>
            </div>

        <?php }
        
    }
endif;
add_action('education-x-page-inner-title', 'education_x_single_page_title', 15);
