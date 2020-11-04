<?php get_header(); the_post(); ?>
		<!-- Wrapper -->
		<div class="wrapper col-10">
			
			<!-- Section -->
			<div class="section">
				<!-- Content -->
				<section class="content col-7">
					<!-- Post -->
					<article class="lt-post about section">
						<header class="lt-post-head">
							<h1 class="title"><?php the_title(); ?></h1>
						</header>
						<section class="lt-post-body">
							<?php the_content(); ?>
						</section>
					</article>
				</section>

				<?php get_sidebar(); ?>
			</div>

			<?php get_template_part('programas','footer'); ?>
		</div>
<?php get_footer(); ?>