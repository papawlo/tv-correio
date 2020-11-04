<?php get_header(); ?>
		<!-- Wrapper -->
		<div class="wrapper col-10">
			
			<!-- Section -->
			<div class="section">
				<!-- Content -->
				<section class="content col-7">
					<!-- Top stories -->
					<section class="lt-top-stories receitas section">
						<div class="title-wrap">
							<h3 class="title lt-widget-title">Receitas</h3>
							<form class="form lt-form" method="" action="">
								<input type="hidden" name="receita_tipo">
								<div class="lt-form-row">
									<div class="lt-form-select">
										<input class="lt-form-select-input" type="hidden" name="recipe_category" value="nenhuma_categoria">
										<div class="current">
											<span class="label">Selecione uma categoria</span>
											<div class="icon-wrap">
												<div class="v-align">
													<div class="v-middle">
														<i class="icon"></i>
													</div>
												</div>
											</div>
										</div>
										<?php $terms = get_terms('categoria-receita'); ?>
										<ul class="list">
											<li class="item" data-value="<?php echo get_post_type_archive_link( 'receita' ); ?>">Todas as receitas<li>
											<?php foreach($terms as $cat): ?>
											<li class="item" data-value="<?php echo get_term_link( $cat, 'categoria-receita' ); ?>"><?php echo $cat->name; ?></li>
											<?php endForeach; ?>
										</ul>
									</div>
								</div>
							</form>
						</div>

						<div id="ajax-load">
							<div class="loop-content ajax-load-more" data-content-selector="#ajax-load .loop-content">
								<div class="lt-top-stories-content">
									<ul class="lt-top-stories-list">
										<?php get_template_part( 'partials/receitas/loop','archive' ); ?>
									</ul>
								</div>							
								<div class="next-page"><?php echo get_load_more_posts_link('<i class="icon"></i> Carregar mais receitas'); ?></div>
							</div>
						</div>
					</section>
				</section>

				<?php get_sidebar(); ?>
			</div>
			<?php get_template_part('programas','footer'); ?>
		</div>
<?php get_footer(); ?>