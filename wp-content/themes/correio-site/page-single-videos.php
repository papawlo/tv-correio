<?php get_header(); ?>
<!-- Wrapper -->
<div class="wrapper archive col-10">
	
	<!-- Section -->
	<div class="section">
		<!-- Content -->
		<section class="content lt-top-stories col-7 ajax-load-more" data-content-selector=".lt-top-stories .loop-content">
			<section class="archive-content">
				<h1 class="title">Título do Vídeo Cadastrado </h2>
			</section>
		<div class="single-video">
			<div class="lt-top-videos-main">
				<div class="video">
					<a class="thumb" href="" title="">
						<i class="icon">
							<img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
						</i>
						<figure class="image">
							<img src="http://placehold.it/660x410" alt="">
						</figure>
					</a>
					<!-- Alterar a propriedade border-bottom-color conforme a cor do programa -->
					<div class="info">
							<h4 class="title">Descrição do vídeo Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nibh erat, aliquam quis
							fringilla vel, maximus id quam. Fusce tellus lorem, pellentesque et volutpat eget, dictum at magna. Donec volutpat felis ac lorem 
							sodales, eu tempus tortor finibus.</h4>
				
					</div>
				</div>
			</div>
			
			<ul class="lt-top-videos-list">
				<li class="lt-top-videos-item">
					<div class="video">
						<a class="thumb" href="" title="">
							<i class="icon">
								<img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
							</i>
							<figure class="image">
								<img src="http://placehold.it/165x132" alt="">
							</figure>
						</a>
						<!-- Alterar a propriedade border-bottom-color conforme a cor do programa -->
						<div class="info" style="border-bottom-color:#22468a;">
							<a class="link" href="" title="">
								<span class="v-align">
									<span class="v-middle">
										<!-- Alterar a propriedade background conforme a cor do programa -->
										<p class="lt-headline-label" style="background:#22468a;">Comportamento</p>
										<h4 class="title">Proin gravida nibh velit auctor aliquet aenean</h4>
									</span>
								</span>
							</a>
						</div>
					</div>
				</li>
				<li class="lt-top-videos-item middle">
					<div class="video">
						<a class="thumb" href="" title="">
							<i class="icon">
								<img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
							</i>
							<figure class="image">
								<img src="<?php echo get_template_directory_uri(); ?>/public/img/samples/videos.jpg" alt="">
							</figure>
						</a>
						<!-- Alterar a propriedade border-bottom-color conforme a cor do programa -->
						<div class="info" style="border-bottom-color:#22468a;">
							<a class="link" href="" title="">
								<span class="v-align">
									<span class="v-middle">
										<!-- Alterar a propriedade background conforme a cor do programa -->
										<p class="lt-headline-label" style="background:#22468a;">Comportamento</p>
										<h4 class="title">Proin gravida nibh velit auctor aliquet aenean</h4>
									</span>
								</span>
							</a>
						</div>
					</div>
				</li>
				<li class="lt-top-videos-item">
					<div class="video">
						<a class="thumb" href="" title="">
							<i class="icon">
								<img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
							</i>
							<figure class="image">
								<img src="<?php echo get_template_directory_uri(); ?>/public/img/samples/videos.jpg" alt="">
							</figure>
						</a>
						<!-- Alterar a propriedade border-bottom-color conforme a cor do programa -->
						<div class="info" style="border-bottom-color:#22468a;">
							<a class="link" href="" title="">
								<span class="v-align">
									<span class="v-middle">
										<!-- Alterar a propriedade background conforme a cor do programa -->
										<p class="lt-headline-label" style="background:#22468a;">Comportamento</p>
										<h4 class="title">Proin gravida nibh velit auctor aliquet aenean</h4>
									</span>
								</span>
							</a>
						</div>
					</div>
				</li>
			
				</ul>
		</div>
		
		
			
					
			<a class="lt-go-back-link" href="<?php echo get_post_type_archive_link( 'page' ); ?> " title="Voltar para notíticas">
				<i class="icon"></i> Voltar para vídeos
			</a>
		</section>

		<?php get_sidebar(); ?>
	</div>

	<?php get_template_part('../programas','footer'); ?>
</div>
<?php get_footer(); ?>