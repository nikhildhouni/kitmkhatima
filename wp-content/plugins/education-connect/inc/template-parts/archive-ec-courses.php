<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education Connect
 * @since 1.0
 */
get_header(); ?>
    <section id="ec-archive-courses" class="page-section ec-customization-properties page-archive-courses">
        <main id="main" class="site-main" role="main">
            <?php
            if (have_posts()) : ?>
                <div class="entry-content">
                    <div class="ec-wrapper">
                        <div class="ec-row">
                            <?php
                            /* Start the Loop */
                            while (have_posts()) : the_post();
                                /**
                                 * Hook - education_connect_subject_content_action.
                                 */
                                do_action('education_connect_subject_content_action');
                            endwhile; ?>
                        </div>
                    </div><!-- .ec-wrapper -->
                </div><!-- .entry-content -->
            <?php
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </main><!-- #main -->
    </section><!-- .course-section -->

<?php
get_footer();