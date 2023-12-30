<?php
/**
 * The template for displaying single pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education Connect
 * @since 1.0
 */
get_header(); ?>
    <section id="ec-single-teams" class="page-section ec-customization-properties page-single-teams">
        <main id="main" class="site-main" role="main">
            <?php
            if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="ec-wrapper">
                        <div class="entry-content">
                            <div class="team-item">
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
                                </figure>
                                <!-- .image-wrapper -->
                                <div class="ec-cpt-format">
                                    <div class="cpt-format">
                                        <i class="ecicon ecicon-ec-team ec-bgcolor"></i>
                                    </div>
                                </div>
                                <figcaption class="ec-contents team-contents">
                                    <h3 class="ec-title">
                                        <?php the_title(); ?>
                                    </h3>
                                    <!--    social link single-->
                                    <?php education_connect_team_social(); ?>

                                    <div class="ec-details">
                                        <?php the_content(); ?>
                                    </div>
                                    <?php if (has_term('', 'team-department')) { ?>
                                        <div class="department">
                                            <b><?php esc_html_e('Department ', 'education-connect'); ?></b>
                                            <?php
                                            // get all terms
                                            education_connect_get_terms('team-department');
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (has_term('', 'team-designation')) { ?>
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

                                </figcaption><!-- .team-contents -->
                            </div><!-- .team-item -->
                        </div>
                    </div><!-- .ec-wrapper -->
                <?php endwhile;
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </main><!-- #main -->
    </section><!-- .course-section -->
<?php
get_footer();