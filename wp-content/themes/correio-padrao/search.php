<?php get_header(); ?>

<h1><?php echo sprintf( '%s Resultados para ', $wp_query->found_posts ); echo get_search_query(); ?></h1>

<?php get_template_part('loop'); ?>

<?php get_template_part('pagination'); ?>

<?php get_footer(); ?>
