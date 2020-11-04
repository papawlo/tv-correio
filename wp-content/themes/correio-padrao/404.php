<?php get_header(); ?>

		<!-- Wrapper -->
		<div class="wrapper p404">
			<section class="content-404">
				<div class="v-align">
					<div class="v-middle">
						<a href="<?php echo get_option('home'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/public/img/404.png" alt="Página não encontrada"></a>
					</div>
				</div>
				<div class="divider"></div>
			</section>

			<div class="section col-10 center">
				<?php get_template_part('../programas','footer'); ?>
			</div>
			
		</div>

<?php get_footer(); ?>
