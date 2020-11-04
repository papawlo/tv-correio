<?php get_header(); the_post(); ?>
		<!-- Wrapper -->
		<div class="wrapper col-10">
			
			<!-- Section -->
			<div class="section">
				<!-- Content -->
				<section class="content col-7">
					<!-- Post -->
					<article class="lt-post recipe section">
						<header class="lt-post-head">
							<time class="time" pubdate="">
								<div class="v-align">
									<i class="icon v-middle">
										<img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-time.svg" alt="Time">
									</i>
									<div class="v-middle">
										<?php the_time( 'd/m/Y' ); ?>
									</div>
								</div>
							</time>
							<h1 class="title"><?php the_title(); ?></h1>
							<?php if(has_excerpt()): ?><h2 class="subtitle"><?php echo get_the_excerpt(); ?></h2><?php endIf; ?>
							<div class="share v-align">
								<ul class="list v-middle">
									<li id="facebook-sharrre" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" class="item"><a title="Compartilhe no Facebook" href="javascript:;" class="link"><i class="icon facebook"><img alt="Facebook" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-facebook.svg"></i></a></li>
									<li id="twitter-sharrre" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" class="item"><a title="Compartilhe no Twitter" href="javascript:;" class="link"><i class="icon twitter"><img alt="Twitter" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-twitter.svg"></i></a></li>
								</ul>
								<p class="author v-middle"><?php echo get_the_author(); ?></p>
							</div>
						</header>
						<section class="lt-post-body">
							<?php if($images = get_field('receitas_fotos')): ?>
							<div class="recipe-slides">
								<button class="recipe-slides-nav prev recipe-slides-nav-prev">
									<i class="icon"></i>
								</button>
								<button class="recipe-slides-nav next recipe-slides-nav-next">
									<i class="icon"></i>
								</button>
								<div class="recipe-slides-wrap">
									<?php foreach($images as $image): ?>
										<?php echo wp_get_attachment_image( $image['ID'], 'thumb-750x400', false, array('class'=>'slide') ); ?>
									<?php endForeach; ?>
								</div>
							</div>
							<?php endIf; ?>

							<div class="recipe-time">
								<div class="v-center v-align">
									<div class="v-middle">
										<div class="card v-align">
											<div class="v-middle">
												<i class="icon time"></i>
											</div>
											<div class="v-middle">
												<div class="info">
													<p>Tempo de preparo</p>
													<p><b><?php the_field('receitas_tempo'); ?></b></p>
												</div>
											</div>
										</div>
									</div>
									<div class="v-middle">
										<div class="card v-align">
											<div class="v-middle">
												<i class="icon income"></i>
											</div>
											<div class="v-middle">
												<div class="info">
													<p>Rendimento</p>
													<p><b><?php the_field('receitas_rendimento'); ?></b></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="recipe-step">
								<h2 class="recipe-step-title">Igredientes</h2>
								<ul class="recipe-step-list">
									<?php while(have_rows('receitas_ingredientes')): the_row(); ?>
									<li class="recipe-step-item"><?php the_sub_field('receitas_ingredientes_ingrediente'); ?></li>
									<?php endWhile; ?>
								</ul>
								<h2 class="recipe-step-title">Modo de preparo</h2>
								<?php the_content(); ?>
							</div>
						</section>
					</article>

					<a class="lt-go-back-link" href="<?php echo get_post_type_archive_link( 'receita' ); ?>" title="Voltar para receitas">
						<i class="icon"></i> Voltar para receitas
					</a>
				</section>

				<?php get_sidebar(); ?>
			</div>
			<?php get_template_part('programas','footer'); ?>
		</div>
<?php get_footer(); ?>