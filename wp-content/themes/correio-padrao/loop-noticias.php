<?php while (have_posts()) : the_post(); ?>
<li class="lt-top-stories-item">
	<div class="storie">
		<a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
			<figure>
				<?php the_post_thumbnail( 'thumb-360x229' ); ?>
			</figure>
		</a>
		<a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
			<!-- Alterar propriedade background conforme a cor do programa -->
			<?php $category = array_shift(get_the_category()); ?>
			<p class="lt-headline-label" style="background:<?php echo get_theme_mod( 'color_setting', '#FFB416' ); ?>;"><?php echo $category->name; ?></p>
			<h4 class="title"><?php the_title(); ?></h4>
		</a>
	</div>
</li>
<?php endWhile; ?>