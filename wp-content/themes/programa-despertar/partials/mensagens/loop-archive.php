<?php while(have_posts()): the_post(); ?>
<div class="archive-article no-thumb mensagem">
	<!-- Alterar a prorpriedade border-bottom-color conforme a cor do programa -->
	<div class="archive-info" style="border-bottom-color: <?php echo get_theme_mod( 'color_setting', '#FFB416' ); ?>;">
		<a class="lt-headline-label" href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_term($post->ID,'categoria-mensagem')); ?>" style="background:<?php echo get_theme_mod( 'color_setting', '#FFB416' ); ?>;"><?php echo get_the_term($post->ID,'categoria-mensagem'); ?></a>
		<h3 class="archive-title">
			<a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h3>
		<p class="archive-description">
			<a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_content(), 10,' ...'); ?></a>
		</p>
	</div>
</div>
<?php endWhile; ?>