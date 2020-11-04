<?php get_header(); ?>
		<!-- Wrapper -->
		<div class="wrapper programation col-10">
			
			<div class="section">
				<!-- Content -->
				<?php
					$timeSemanal = array(
						strtotime("Sunday this week"),
						strtotime("Monday this week"),
						strtotime("Tuesday this week"),
						strtotime("Wednesday this week"),
						strtotime("Thursday this week"),
						strtotime("Friday this week"),
						strtotime("Saturday this week")
					)
				?>
				<section class="content programation-content col-7">
					<div class="cycle-slideshow" data-cycle-fx="fade" data-cycle-slides="> div" data-starting-slide="<?php echo date("w"); ?>" data-cycle-timeout="0" data-cycle-prev=".programation-nav-link.prev" data-allow-wrap="false" data-cycle-next=".programation-nav-link.next">
						<?php foreach($timeSemanal as $k => $time): ?>
						<div>
							<div class="programation-head">
								<div class="v-align">
									<div class="v-middle">
										<h2 class="programation-title">Programação semanal</h2>
									</div>
									<div class="v-middle">
										<p class="programation-time"><?php echo date_i18n( "D", $time ); ?> <b><?php echo date_i18n( "d M", $time ); ?></b></p>
									</div>
									<div class="v-nav v-middle">
										<div class="programation-nav">
											<a class="programation-nav-link prev" href="javascript:;" title="">
												<i class="icon"></i>
											</a>
											<a class="programation-nav-link next" href="javascript:;" title="">
												<i class="icon"></i>
											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="programation-body">
								<?php while(have_rows('programacao_'.$k)): the_row(); ?>
								<?php
									$timeInicio = strtotime(date('Y-m-d '.get_sub_field('programacao_horario_inicio')));
									$timeFim = strtotime(date('Y-m-d '.get_sub_field('programacao_horario_termino')));
									$time = time()+get_option( 'gmt_offset' )*3600;
								?>
								<div class="program">
									<?php
										if(get_sub_field('programacao_tipo') == 'Convencional') {
											switch_to_blog(get_sub_field('programacao_programa'));
											$color = get_theme_mod( 'color_setting', '#FFB416' );
											$logo = get_theme_mod('logo_setting');
											$imagem = wp_get_attachment_image( get_custom_header()->attachment_id, 'thumb-245x154' );
											$programa = get_bloginfo('name');
											restore_current_blog();
										} else {
											$color = '#FFB416';
											$logo = get_sub_field('programacao_logo');
											$imagem = wp_get_attachment_image( get_sub_field('programacao_imagem'), 'thumb-245x154' );
											$programa = get_sub_field('programacao_nome');
										}
									?>
									<div class="v-align">
										<div class="v-logo v-middle">
											<a class="program-logo" title="">
												<!-- Alterar propriedade border-color conforme a cor do programa -->
												<span class="border" style="border-color:<?php echo $color ?>;"></span>
												<img src="<?php echo $logo; ?>" width="87" height="87" alt="Logo">
											</a>
										</div>
										<div class="v-thumb v-middle">
											<a class="program-thumb" title="">
												<?php echo $imagem; ?>
											</a>
										</div>
										<div class="v-link v-middle">
											<a class="program-link" title="">
												<!-- Alterar a propriedade background conforme a cor do programa -->
												<div class="program-label lt-headline-label" style="background:<?php echo $color; ?>;"><?php echo strftime('%Hh%M',$timeInicio); ?></div>
												<h3 class="program-title"><?php echo $programa; ?></h3>
											</a>
										</div>
									</div>
								</div>
								<?php endWhile; ?>
							</div>
						</div>
						<?php endForeach; ?>
					</div>
				</section>

				<?php get_sidebar(); ?>
			</div>

		</div>
<?php get_footer(); ?>