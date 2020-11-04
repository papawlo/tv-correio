<?php
	Global $network_post;
	$posts_per_page = 6;
	$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
	$network_query = network_query_posts( array( 'post_type' => 'post', 'paged'=>$paged, 'posts_per_page' => $posts_per_page ));
?>
<?php while( network_have_posts() ): network_the_post(); ?>
	<span style="padding: 2px 10px; border-radius: 10px; background-color: <?php echo get_ms_theme_mod('color_setting','#F3F3F3',$network_post->BLOG_ID); ?>"><?php echo get_ms_option('blogname','',$network_post->BLOG_ID); ?></span></br>
	<a href="<?php echo network_get_permalink(); ?>"><span style="color: <?php echo get_ms_theme_mod('color_setting','#000',$network_post->BLOG_ID); ?>"><?php network_the_title(); ?></span></a>
	<hr/>
<?php endWhile; ?>
