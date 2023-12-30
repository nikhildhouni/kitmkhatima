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
    <section id="ec-single-courses" class="page-section ec-customization-properties page-single-courses">
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
                                </figure><!-- .image-wrapper -->

                                <div class="ec-cpt-format">
                                    <div class="cpt-format">
                                        <i class="ecicon ecicon-ec-mortarboard ec-bgcolor"></i>
                                    </div>
                                </div>

                                <figcaption class="ec-contents team-contents">
                                    <h3 class="ec-title">
                                        <?php the_title(); ?>
                                    </h3>

                                    <table class="ec-table">
                                        <colgroup>
                                            <col width="30%">
                                            <col width="70%">
                                        </colgroup>
                                        <tr>
                                            <?php education_connect_course_duration(); ?>
                                        </tr>
                                        <tr>
                                            <?php education_connect_course_price(); ?>
                                        </tr>
                                        <tr>
                                            <?php education_connect_course_students(); ?>
                                        </tr>
                                        <tr>
                                            <?php education_connect_course_teacher(); ?>
                                        </tr>
                                    </table>


                                    <div class="ec-details">
                                        <?php the_content(); ?>
                                    </div>
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