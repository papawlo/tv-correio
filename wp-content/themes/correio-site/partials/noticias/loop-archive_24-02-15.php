<?php Global $the_query; ?>
<?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
	<!-- Incluir a classe .no-thumb quando não houver thumbnail para a notícia -->
	<div class="archive-article">
		<a class="archive-thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php $thumbID = get_post_meta(get_the_ID(),'_thumbnail_id',true); ?>
			<?php switch_to_blog( get_post_meta(get_the_ID(),'blogid',true) ); ?>
			<?php echo wp_get_attachment_image( $thumbID, 'thumb-165x132' ); ?>
			<?php restore_current_blog(); ?>
		</a>
		<!-- Alterar a prorpriedade border-bottom-color conforme a cor do programa -->
		<div class="archive-info" style="border-bottom-color: <?php echo get_ms_theme_mod('color_setting','#000',get_post_meta(get_the_ID(),'blogid',true)); ?>;">
			<?php $category = array_shift(get_the_category()); ?>
			<a class="lt-headline-label" href="<?php the_permalink(); ?>" title="<?php echo esc_attr($category->name); ?>" style="background:<?php echo get_ms_theme_mod('color_setting','#000',get_post_meta(get_the_ID(),'blogid',true)); ?>;"><?php echo $category->name; ?></a>
			<h3 class="archive-title">
				<a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></a>
			</h3>
		</div>
	</div>
<?php endWhile; ?>