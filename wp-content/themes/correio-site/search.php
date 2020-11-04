<?php get_header(); ?>

<h1><?php echo sprintf( '%s Resultados para ', $wp_query->found_posts ); echo get_search_query(); ?></h1>

<?php while(have_posts()): the_post(); ?>
	<?php the_post_thumbnail(); ?>
	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<?php endWhile; ?>

<?php get_template_part('pagination'); ?>

<?php get_footer(); ?>
