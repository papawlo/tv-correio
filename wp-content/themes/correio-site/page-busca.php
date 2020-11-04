<?php get_header(); ?>
<?php switch_to_blog( get_sitewide_tags_option( 'tags_blog_id' ) ); ?>
<?php
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => '8',
		'paged' => $paged,
		's' => get_query_var( 'q' )
	);
	$the_query = new WP_Query($args);
?>
<?php restore_current_blog(); ?>
		<!-- Wrapper -->
		<div class="wrapper search col-10">
			<div class="search-content">
				<form class="search-form lt-form" method="GET" action="http://localhost/correio/busca/">
					<div class="search-row lt-form-row">
						<input class="search-form-input lt-form-input" type="text" name="q" value="<?php echo esc_attr(get_query_var( 'q' )); ?>" placeholder="O que você procura?">
						<button class="search-form-submit" type="submit">
							Buscar
						</button>
					</div>
				</form>
				<?php switch_to_blog( get_sitewide_tags_option( 'tags_blog_id' ) ); ?>
				<?php if(!$the_query->have_posts()): ?>
				<div class="no-results">
					<img src="<?php echo get_template_directory_uri(); ?>/public/img/search-no-results.png" alt="Busca sem resultados">
					<h2>Nenhum resultado encontrado</h2>
					<p>Continue pesquisando</p>
				</div>
				<?php endIf; ?>
				<?php restore_current_blog(); ?>
			</div>

			<?php switch_to_blog( get_sitewide_tags_option( 'tags_blog_id' ) ); ?>
			<?php if($the_query->have_posts()): ?>
			<?php restore_current_blog(); ?>
			<div class="section">
				<section class="col-7 content search-results ajax-load-more" data-content-selector=".search-results .loop-content">
					<div class="loop-content">
						<?php switch_to_blog( get_sitewide_tags_option( 'tags_blog_id' ) ); ?>
						<?php while($the_query->have_posts()): $the_query->the_post(); ?>
							<article class="search-result">
								<div class="search-result-head">
									<h2 class="search-result-title">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( $args = '' ); ?>"><?php the_title(); ?></a>
									</h2>
									<div class="search-result-info">
										<?php switch_to_blog( get_post_meta( get_the_ID(), 'blogid', true ) ); ?>
										<a class="search-result-category" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo( 'name' )); ?>"><?php bloginfo( 'name' ); ?></a>
										<?php restore_current_blog(); ?>
										<time class="search-result-time"><?php the_time( 'd/m/Y' ); ?></time>
									</div>
								</div>
								<div class="search-result-body">
									<a class="search-result-thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute( $args = '' ); ?>">
										<?php the_post_thumbnail( 'thumb-165x120' ); ?>
									</a>
									<p class="search-result-description"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( $args = '' ); ?>"><?php echo wp_trim_words( get_the_excerpt(), '55', ' ...'); ?></a></p>
								</div>
							</article>
						<?php endWhile; ?>
						<?php restore_current_blog(); ?>

						<div class="next-page"><?php echo get_load_more_posts_link('<i class="icon"></i> Carregar mais resultados',$the_query->max_num_pages); ?></div>
					</div>
				</section>
				<?php get_sidebar(); ?>
			</div>
			<?php endIf; ?>
			<div class="section">
				<?php get_template_part('../programas','footer'); ?>
			</div>
		</div>
<?php get_footer(); ?>