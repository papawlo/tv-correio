<?php get_header(); ?>
<!-- Wrapper -->
<div class="wrapper programation col-10">

    <div class="section">
        <!-- Content -->
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                <!-- article -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php the_content(); ?>


                </article>
                <!-- /article -->

            <?php endwhile; ?>

        <?php else: ?>

            <!-- article -->
            <article>

                <h2><?php _e('Sorry, nothing to display.', 'html5blank'); ?></h2>

            </article>
            <!-- /article -->

        <?php endif; ?>

        <?php get_sidebar(); ?>
    </div>

</div>
<?php get_footer(); ?>