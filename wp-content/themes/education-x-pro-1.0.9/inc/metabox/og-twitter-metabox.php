<?php
/**
 * Education X
 *
 * @package Open Graph & Twitter Summary Card
 */

$tmt_ed_twitter_summary = get_theme_mod('tmt_ed_twitter_summary');
$tmt_ed_open_graph = get_theme_mod('tmt_ed_open_graph');
if( $tmt_ed_twitter_summary || $tmt_ed_open_graph ){

    add_action('add_meta_boxes', 'education_x_open_graph_metabox');

}
if (!function_exists('education_x_open_graph_metabox')):
    function education_x_open_graph_metabox(){

       
        add_meta_box(
            'education_x_post_open_graph_metabox',
            esc_html__('Open Graph & Twitter Summary Card', 'education-x-pro'),
            'education_x_post_og_callback',
            'post',
            'normal',
            'high'
        );

        add_meta_box(
            'education_x_post_open_graph_metabox',
            esc_html__('Open Graph & Twitter Summary Card', 'education-x-pro'),
            'education_x_post_og_callback',
            'page',
            'normal',
            'high'
        );

    }
endif;
/**
 * Callback function OG Metabox.
 */
if (!function_exists('education_x_post_og_callback')):
    function education_x_post_og_callback()
    {
        global $post;
        wp_nonce_field(basename(__FILE__), 'education_x_post_og_meta');
        
        $tmt_ed_twitter_summary = get_theme_mod('tmt_ed_twitter_summary');
        $tmt_ed_open_graph = get_theme_mod('tmt_ed_open_graph');
        if( $tmt_ed_twitter_summary || $tmt_ed_open_graph ){ ?>

            <div class="tmt-tab-main">

                <div class="tmt-metabox-tab">
                    <ul>
                        <?php if( $tmt_ed_open_graph ){ ?>
                            <li>
                                <a id="tmt-tab-og" class="tmt-tab-active" href="javascript:void(0)"><?php esc_html_e('Open Graph', 'education-x-pro'); ?></a>
                            </li>
                        <?php } ?>

                        <?php if( $tmt_ed_twitter_summary ){ ?>
                            <li>
                                <a id="tmt-tab-ts" <?php if( !$tmt_ed_open_graph ){ ?> class="tmt-tab-active" <?php } ?> href="javascript:void(0)"><?php esc_html_e('Twitter Summary', 'education-x-pro'); ?></a>
                            </li>
                        <?php } ?>

                    </ul>
                </div>

                <div class="tmt-tab-content">
                    
                    <?php if( $tmt_ed_open_graph ){ ?>

                        <div id="tmt-tab-og-content" class="tmt-content-wrap tmt-tab-content-active">
                            <h3 class="tmt-meta-title"><?php esc_html_e('Open Graph Option', 'education-x-pro'); ?></h3>
                            <div class="tmt-meta-panels tmt-twitter-panels">
                                <?php $tmt_og_ed = esc_attr(get_post_meta($post->ID, 'tmt_og_ed', true)); ?>
                                <div class="tmt-opt-wrap tmt-checkbox-wrap">
                                    <input id="open-graph-checkbox" name="tmt_og_ed" type="checkbox" <?php if ($tmt_og_ed) { ?> checked="checked" <?php } ?> />
                                    <label for="open-graph-checkbox"><?php esc_html_e('Disable Open Graph for this Post', 'education-x-pro'); ?></label>
                                </div>
                                <div class="tmt-opt-wrap tmt-opt-wrap-alt">
                                    <label><?php esc_html_e('Title', 'education-x-pro'); ?></label>
                                    <input name="tmt_og_title" type="text" value="<?php echo esc_attr(get_post_meta($post->ID, 'tmt_og_title', true)); ?>"/>
                                </div>
                                <div class="tmt-opt-wrap tmt-opt-wrap-alt">
                                    <label><?php esc_html_e('Description', 'education-x-pro'); ?></label>
                                    <input name="tmt_og_desc" type="text" value="<?php echo esc_attr(get_post_meta($post->ID, 'tmt_og_desc', true)); ?>"/>
                                </div>
                                <div class="tmt-opt-wrap tmt-opt-wrap-alt">
                                    <label><?php esc_html_e('URL', 'education-x-pro'); ?></label>
                                    <input name="tmt_og_url" type="text" value="<?php echo esc_attr(get_post_meta($post->ID, 'tmt_og_url', true)); ?>"/>
                                </div>
                                <div class="tmt-opt-wrap tmt-opt-wrap-alt">
                                    <label><?php esc_html_e('Type', 'education-x-pro'); ?></label>
                                    <?php $tmt_og_type = get_post_meta($post->ID, 'tmt_og_type', true); ?>
                                    <select name="tmt_og_type">
                                        <option value=""><?php esc_html_e('--Select--', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_og_type == 'website') {
                                            echo 'selected';
                                        } ?> value="website"><?php esc_html_e('Website', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_og_type == 'video.episode') {
                                            echo 'selected';
                                        } ?> value="video.episode"><?php esc_html_e('video.episode', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_og_type == 'music.radio_station') {
                                            echo 'selected';
                                        } ?> value="music.radio_station"><?php esc_html_e('music.radio_station', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_og_type == 'music.song') {
                                            echo 'selected';
                                        } ?> value="music.song"><?php esc_html_e('music.song', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_og_type == 'music.playlist') {
                                            echo 'selected';
                                        } ?> value="music.playlist"><?php esc_html_e('music.playlist', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_og_type == 'video.movie') {
                                            echo 'selected';
                                        } ?> value="video.movie"><?php esc_html_e('video.movie', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_og_type == 'music.album') {
                                            echo 'selected';
                                        } ?> value="music.album"><?php esc_html_e('music.album', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_og_type == 'video.tv_show') {
                                            echo 'selected';
                                        } ?> value="video.tv_show"><?php esc_html_e('video.tv_show', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_og_type == 'article') {
                                            echo 'selected';
                                        } ?> value="article"><?php esc_html_e('Article', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_og_type == 'video.other') {
                                            echo 'selected';
                                        } ?> value="video.other"><?php esc_html_e('video.other', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_og_type == 'profile') {
                                            echo 'selected';
                                        } ?> value="profile"><?php esc_html_e('Profile', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_og_type == 'book') {
                                            echo 'selected';
                                        } ?> value="book"><?php esc_html_e('Book', 'education-x-pro'); ?></option>
                                    </select>
                                </div>
                                <div class="tmt-opt-wrap tmt-opt-wrap-alt">
                                    <label><?php esc_html_e('Custom Tags', 'education-x-pro'); ?></label>
                                    <textarea name="tmt_og_custom_meta"><?php echo education_x_meta_sanitize_metabox(get_post_meta($post->ID, 'tmt_og_custom_meta', true)); ?></textarea>
                                </div>
                                <div class="tmt-opt-wrap tmt-opt-wrap-alt">
                                    <label><?php esc_html_e('Image', 'education-x-pro'); ?></label>
                                    <?php
                                    $tmt_og_image = esc_url(get_post_meta($post->ID, 'tmt_og_image', true));
                                    $image = "";
                                    if ($tmt_og_image) {
                                        $image = '<img src="' . esc_url($tmt_og_image) . '"/>';
                                    } ?>
                                    <div class="tmt-img-fields-wrap">
                                        <div class="attachment-media-view">
                                            <div class="tmt-img-fields-wrap">
                                                <div class="tmt-attachment-media-view">
                                                    <div class="tmt-attachment-child tmt-uploader">
                                                        <button type="button" class="tmt-img-upload-button">
                                                            <span class="dashicons dashicons-upload tmt-icon tmt-icon-large"></span>
                                                        </button>
                                                        <input class="upload-id" name="tmt_og_image" type="hidden"
                                                               value="<?php echo esc_url($tmt_og_image); ?>"/>
                                                    </div>
                                                    <div class="tmt-attachment-child tmt-thumbnail-image">
                                                        <button type="button"
                                                                class="tmt-img-delete-button <?php if ($tmt_og_image) {
                                                                    echo 'tmt-img-show';
                                                                } ?>">
                                                            <span class="dashicons dashicons-no-alt tmt-icon"></span>
                                                        </button>
                                                        <div class="tmt-img-container">
                                                            <?php echo $image; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                    <?php if( $tmt_ed_twitter_summary ){ ?>

                        <div id="tmt-tab-ts-content" class="tmt-content-wrap <?php if( !$tmt_ed_open_graph ){ ?> tmt-tab-content-active <?php } ?>">
                            <h3 class="tmt-meta-title"><?php esc_html_e('Twitter Summary Option', 'education-x-pro'); ?></h3>
                            <div class="tmt-meta-panels tmt-twitter-panels">
                                <?php $tmt_ts_ed = esc_attr(get_post_meta($post->ID, 'tmt_ts_ed', true)); ?>
                                <div class="tmt-opt-wrap tmt-checkbox-wrap">
                                    <input id="twitter-summery-checkbox" name="tmt_ts_ed" type="checkbox" <?php if ($tmt_ts_ed) { ?> checked="checked" <?php } ?> />
                                    <label for="twitter-summery-checkbox"><?php esc_html_e('Disable Twitter Summary for this Post', 'education-x-pro'); ?></label>
                                </div>
                                <div class="tmt-opt-wrap tmt-opt-wrap-alt">
                                    <label><?php esc_html_e('Title', 'education-x-pro'); ?></label>
                                    <input name="tmt_twitter_summary_title" type="text" value="<?php echo esc_attr(get_post_meta($post->ID, 'tmt_twitter_summary_title', true)); ?>"/>
                                </div>
                                <div class="tmt-opt-wrap tmt-opt-wrap-alt">
                                    <label><?php esc_html_e('Description', 'education-x-pro'); ?></label>
                                    <input name="tmt_twitter_summary_desc" type="text" value="<?php echo esc_attr(get_post_meta($post->ID, 'tmt_twitter_summary_desc', true)); ?>"/>
                                </div>
                                <div class="tmt-opt-wrap tmt-opt-wrap-alt">
                                    <label><?php esc_html_e('Twitter Username', 'education-x-pro'); ?></label>
                                    <input name="tmt_twitter_summary_username" type="text" value="<?php echo esc_attr(get_post_meta($post->ID, 'tmt_twitter_summary_username', true)); ?>"/>
                                </div>
                                <div class="tmt-opt-wrap tmt-opt-wrap-alt">
                                    <label><?php esc_html_e('Twitter Card', 'education-x-pro'); ?></label>
                                    <?php $tmt_twitter_summary_type = get_post_meta($post->ID, 'tmt_twitter_summary_type', true); ?>
                                    <select name="tmt_twitter_summary_type">
                                        <option value=""><?php esc_html_e('--Select--', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_twitter_summary_type == 'summary') {
                                            echo 'selected';
                                        } ?> value="summary"><?php esc_html_e('Summary', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_twitter_summary_type == 'summary_large_image') {
                                            echo 'selected';
                                        } ?> value="summary_large_image"><?php esc_html_e('Summary Large Image', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_twitter_summary_type == 'music.radio_station') {
                                            echo 'selected';
                                        } ?> value="music.radio_station"><?php esc_html_e('music.radio_station', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_twitter_summary_type == 'app') {
                                            echo 'selected';
                                        } ?> value="app"><?php esc_html_e('APP', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_twitter_summary_type == 'player') {
                                            echo 'selected';
                                        } ?> value="player"><?php esc_html_e('Player', 'education-x-pro'); ?></option>
                                        <option <?php if ($tmt_twitter_summary_type == 'lead_generation') {
                                            echo 'selected';
                                        } ?> value="lead_generation"><?php esc_html_e('Lead Generation', 'education-x-pro'); ?></option>
                                    </select>
                                </div>
                                <div class="tmt-opt-wrap tmt-opt-wrap-alt">
                                    <label><?php esc_html_e('Custom Tags', 'education-x-pro'); ?></label>
                                    <textarea name="tmt_twitter_summary_custom_meta"><?php echo education_x_meta_sanitize_metabox(get_post_meta($post->ID, 'tmt_twitter_summary_custom_meta', true)); ?></textarea>
                                </div>
                                <div class="tmt-opt-wrap tmt-opt-wrap-alt">
                                    <label><?php esc_html_e('Image', 'education-x-pro'); ?></label>
                                    <?php
                                    $tmt_twitter_summary_image = esc_url(get_post_meta($post->ID, 'tmt_twitter_summary_image', true));
                                    $image = "";
                                    if ($tmt_twitter_summary_image) {
                                        $image = '<img src="' . esc_url($tmt_twitter_summary_image) . '"/>';
                                    } ?>
                                    <div class="tmt-img-fields-wrap">
                                        <div class="attachment-media-view">
                                            <div class="tmt-img-fields-wrap">
                                                <div class="tmt-attachment-media-view">
                                                    <div class="tmt-attachment-child tmt-uploader">
                                                        <button type="button" class="tmt-img-upload-button">
                                                            <span class="dashicons dashicons-upload tmt-icon tmt-icon-large"></span>
                                                        </button>
                                                        <input class="upload-id" name="tmt_twitter_summary_image"
                                                               type="hidden"
                                                               value="<?php echo esc_url($tmt_twitter_summary_image); ?>"/>
                                                    </div>
                                                    <div class="tmt-attachment-child tmt-thumbnail-image">
                                                        <button type="button"
                                                                class="tmt-img-delete-button <?php if ($tmt_twitter_summary_image) {
                                                                    echo 'tmt-img-show';
                                                                } ?>">
                                                            <span class="dashicons dashicons-no-alt tmt-icon"></span>
                                                        </button>
                                                        <div class="tmt-img-container">
                                                            <?php echo $image; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>
        <?php
        }
    }
endif;
// Save metabox value.
add_action('save_post', 'education_x_save_og_meta');
if (!function_exists('education_x_save_og_meta')):
    function education_x_save_og_meta($post_id)
    {
        global $post;
        if ( !isset($_POST['education_x_post_og_meta']) || !wp_verify_nonce( wp_unslash( $_POST['education_x_post_og_meta'] ), basename(__FILE__)) )
            return;
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
            return;
        if ( 'page' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ) )
                return $post_id;
        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
        /**
         * Open Graph
         **/
        $tmt_og_ed_old = esc_html(get_post_meta($post_id, 'tmt_og_ed', true));
        $tmt_og_ed_news = sanitize_text_field(wp_unslash($_POST['tmt_og_ed']));
        $tmt_og_title_old = esc_html(get_post_meta($post_id, 'tmt_og_title', true));
        $tmt_og_title_news = sanitize_text_field(wp_unslash($_POST['tmt_og_title']));
        $tmt_og_desc_old = esc_html(get_post_meta($post_id, 'tmt_og_desc', true));
        $tmt_og_desc_news = sanitize_text_field(wp_unslash($_POST['tmt_og_desc']));
        $tmt_og_url_old = esc_url(get_post_meta($post_id, 'tmt_og_url', true));
        $tmt_og_url_news = esc_url_raw(wp_unslash($_POST['tmt_og_url']));
        $tmt_og_type_old = esc_html(get_post_meta($post_id, 'tmt_og_type', true));
        $tmt_og_type_news = sanitize_text_field(wp_unslash($_POST['tmt_og_type']));
        $tmt_og_custom_meta_old = education_x_meta_sanitize_metabox(get_post_meta($post_id, 'tmt_og_custom_meta', true));
        $tmt_og_custom_meta_news = education_x_meta_sanitize_metabox(wp_unslash($_POST['tmt_og_custom_meta']));
        $tmt_og_image_old = esc_url(get_post_meta($post_id, 'tmt_og_image', true));
        $tmt_og_image_news = esc_url_raw(wp_unslash($_POST['tmt_og_image']));
        if ($tmt_og_ed_news && $tmt_og_ed_news != $tmt_og_ed_old) {
            update_post_meta($post_id, 'tmt_og_ed', $tmt_og_ed_news);
        } elseif ('' == $tmt_og_ed_news && $tmt_og_ed_old) {
            delete_post_meta($post_id, 'tmt_og_ed', $tmt_og_ed_old);
        }
        if ($tmt_og_title_news && $tmt_og_title_news != $tmt_og_title_old) {
            update_post_meta($post_id, 'tmt_og_title', $tmt_og_title_news);
        } elseif ('' == $tmt_og_title_news && $tmt_og_title_old) {
            delete_post_meta($post_id, 'tmt_og_title', $tmt_og_title_old);
        }
        if ($tmt_og_desc_news && $tmt_og_desc_news != $tmt_og_desc_old) {
            update_post_meta($post_id, 'tmt_og_desc', $tmt_og_desc_news);
        } elseif ('' == $tmt_og_desc_news && $tmt_og_desc_old) {
            delete_post_meta($post_id, 'tmt_og_desc', $tmt_og_desc_old);
        }
        if ($tmt_og_url_news && $tmt_og_url_news != $tmt_og_url_old) {
            update_post_meta($post_id, 'tmt_og_url', $tmt_og_url_news);
        } elseif ('' == $tmt_og_url_news && $tmt_og_url_old) {
            delete_post_meta($post_id, 'tmt_og_url', $tmt_og_url_old);
        }
        if ($tmt_og_type_news && $tmt_og_type_news != $tmt_og_type_old) {
            update_post_meta($post_id, 'tmt_og_type', $tmt_og_type_news);
        } elseif ('' == $tmt_og_type_news && $tmt_og_type_old) {
            delete_post_meta($post_id, 'tmt_og_type', $tmt_og_type_old);
        }
        if ($tmt_og_custom_meta_news && $tmt_og_custom_meta_news != $tmt_og_custom_meta_old) {
            update_post_meta($post_id, 'tmt_og_custom_meta', $tmt_og_custom_meta_news);
        } elseif ('' == $tmt_og_custom_meta_news && $tmt_og_custom_meta_old) {
            delete_post_meta($post_id, 'tmt_og_custom_meta', $tmt_og_custom_meta_old);
        }
        if ($tmt_og_image_news && $tmt_og_image_news != $tmt_og_image_old) {
            update_post_meta($post_id, 'tmt_og_image', $tmt_og_image_news);
        } elseif ('' == $tmt_og_image_news && $tmt_og_image_old) {
            delete_post_meta($post_id, 'tmt_og_image', $tmt_og_image_old);
        }
        /**
         * Twitter SUmmary
         **/
        $tmt_ts_ed_old = esc_html(get_post_meta($post_id, 'tmt_ts_ed', true));
        $tmt_ts_ed_news = sanitize_text_field(wp_unslash($_POST['tmt_ts_ed']));
        $tmt_twitter_summary_title_old = esc_html(get_post_meta($post_id, 'tmt_twitter_summary_title', true));
        $tmt_twitter_summary_title_news = sanitize_text_field(wp_unslash($_POST['tmt_twitter_summary_title']));
        $tmt_twitter_summary_desc_old = esc_html(get_post_meta($post_id, 'tmt_twitter_summary_desc', true));
        $tmt_twitter_summary_desc_news = sanitize_text_field(wp_unslash($_POST['tmt_twitter_summary_desc']));
        $tmt_twitter_summary_username_old = esc_html(get_post_meta($post_id, 'tmt_twitter_summary_username', true));
        $tmt_twitter_summary_username_news = sanitize_text_field(wp_unslash($_POST['tmt_twitter_summary_username']));
        $tmt_twitter_summary_type_old = esc_html(get_post_meta($post_id, 'tmt_twitter_summary_type', true));
        $tmt_twitter_summary_type_news = sanitize_text_field(wp_unslash($_POST['tmt_twitter_summary_type']));
        $tmt_twitter_summary_custom_meta_old = education_x_meta_sanitize_metabox(get_post_meta($post_id, 'tmt_twitter_summary_custom_meta', true));
        $tmt_twitter_summary_custom_meta_news = education_x_meta_sanitize_metabox(wp_unslash($_POST['tmt_twitter_summary_custom_meta']));
        $tmt_twitter_summary_image_old = esc_url(get_post_meta($post_id, 'tmt_twitter_summary_image', true));
        $tmt_twitter_summary_image_news = esc_url_raw(wp_unslash($_POST['tmt_twitter_summary_image']));
        if ($tmt_ts_ed_news && $tmt_ts_ed_news != $tmt_ts_ed_old) {
            update_post_meta($post_id, 'tmt_ts_ed', $tmt_ts_ed_news);
        } elseif ('' == $tmt_ts_ed_news && $tmt_ts_ed_old) {
            delete_post_meta($post_id, 'tmt_ts_ed', $tmt_ts_ed_old);
        }
        if ($tmt_twitter_summary_title_news && $tmt_twitter_summary_title_news != $tmt_twitter_summary_title_old) {
            update_post_meta($post_id, 'tmt_twitter_summary_title', $tmt_twitter_summary_title_news);
        } elseif ('' == $tmt_twitter_summary_title_news && $tmt_twitter_summary_title_old) {
            delete_post_meta($post_id, 'tmt_twitter_summary_title', $tmt_twitter_summary_title_old);
        }
        if ($tmt_twitter_summary_desc_news && $tmt_twitter_summary_desc_news != $tmt_twitter_summary_desc_old) {
            update_post_meta($post_id, 'tmt_twitter_summary_desc', $tmt_twitter_summary_desc_news);
        } elseif ('' == $tmt_twitter_summary_desc_news && $tmt_twitter_summary_desc_old) {
            delete_post_meta($post_id, 'tmt_twitter_summary_desc', $tmt_twitter_summary_desc_old);
        }
        if ($tmt_twitter_summary_username_news && $tmt_twitter_summary_username_news != $tmt_twitter_summary_username_old) {
            update_post_meta($post_id, 'tmt_twitter_summary_username', $tmt_twitter_summary_username_news);
        } elseif ('' == $tmt_twitter_summary_username_news && $tmt_twitter_summary_username_old) {
            delete_post_meta($post_id, 'tmt_twitter_summary_username', $tmt_twitter_summary_username_old);
        }
        if ($tmt_twitter_summary_type_news && $tmt_twitter_summary_type_news != $tmt_twitter_summary_type_old) {
            update_post_meta($post_id, 'tmt_twitter_summary_type', $tmt_twitter_summary_type_news);
        } elseif ('' == $tmt_twitter_summary_type_news && $tmt_twitter_summary_type_old) {
            delete_post_meta($post_id, 'tmt_twitter_summary_type', $tmt_twitter_summary_type_old);
        }
        if ($tmt_twitter_summary_custom_meta_news && $tmt_twitter_summary_custom_meta_news != $tmt_twitter_summary_custom_meta_old) {
            update_post_meta($post_id, 'tmt_twitter_summary_custom_meta', $tmt_twitter_summary_custom_meta_news);
        } elseif ('' == $tmt_twitter_summary_custom_meta_news && $tmt_twitter_summary_custom_meta_old) {
            delete_post_meta($post_id, 'tmt_twitter_summary_custom_meta', $tmt_twitter_summary_custom_meta_old);
        }
        if ($tmt_twitter_summary_image_news && $tmt_twitter_summary_image_news != $tmt_twitter_summary_image_old) {
            update_post_meta($post_id, 'tmt_twitter_summary_image', $tmt_twitter_summary_image_news);
        } elseif ('' == $tmt_twitter_summary_image_news && $tmt_twitter_summary_image_old) {
            delete_post_meta($post_id, 'tmt_twitter_summary_image', $tmt_twitter_summary_image_old);
        }
    }
endif;