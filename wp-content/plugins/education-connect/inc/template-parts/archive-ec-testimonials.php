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
    <section id="ec-archive-testimonials" class="page-section ec-customization-properties page-archive-testimonials">
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
                                 * Hook - ec_action_testimonial_content_action.
                                 */
                                do_action('ec_action_testimonial_content_action');
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