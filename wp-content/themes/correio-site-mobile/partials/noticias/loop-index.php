<?php Global $the_query; ?>
<?php while( $the_query->have_posts() ): $the_query->the_post(); ?>

<li class="lt-top-stories-item">
	<div class="storie">
		<a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<figure>
				<?php $thumbID = get_post_meta(get_the_ID(),'_thumbnail_id',true); ?>
				<?php switch_to_blog( get_post_meta(get_the_ID(),'blogid',true) ); ?>
				<?php echo wp_get_attachment_image( $thumbID, 'thumb-360x229' ); ?>
				<?php restore_current_blog(); ?>
			</figure>
		</a>
		<a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<!-- Alterar propriedade background conforme a cor do programa -->
			<?php $category = array_shift(get_the_category()); ?>
			<p class="lt-headline-label" style="background:<?php echo get_ms_theme_mod('color_setting','#000',get_post_meta(get_the_ID(),'blogid',true)); ?>;"><?php echo $category->name; ?></p>
			<h4 class="title"><?php echo wp_trim_words(get_the_title(), 8); ?></h4>
		</a>
	</div>
</li>
<?php endWhile; ?>