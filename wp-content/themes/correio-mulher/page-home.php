<?php $paged = ( get_query_var('page') ) ? get_query_var('page') : 1; ?>
<?php get_header(); ?>

<!-- Wrapper -->
<div class="wrapper col-10">

    <!-- Section -->
    <div class="section">
        <!-- Content -->
        <section class="content col-7">
            <?php $the_query = new WP_Query('post_type=post&posts_per_page=4&paged=' . $paged); ?>
            <?php if ($the_query->have_posts()): ?>
            <!-- Top stories -->
            <section class="lt-top-stories ajax-load-more section" data-content-selector=".lt-top-stories .loop-content">
                <h3 class="lt-widget-title">Notícias</h3>
                <div class="loop-content">
                    <div class="lt-top-stories-content">
                        <ul class="lt-top-stories-list">
                            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                                <?php get_template_part('partials/noticias/loop', 'index'); ?>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <div class="next-page"><?php echo get_load_more_posts_link('<i class="icon"></i> Carregar mais notícias', $the_query->max_num_pages); ?></div>
                </div>
            </section>
            <?php endif; ?>
            <!-- Top videos -->

            <section class="lt-top-stories ajax-load-more section" data-content-selector=".lt-top-stories .loop-content">
                <h3 class="lt-widget-title">Vídeos</h3>

                <?php
                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                ?>
                <?php $the_video_query = new WP_Query('post_type=video&posts_per_page=4&paged=' . $paged); ?>
                <div class="loop-content">
                    <div class="lt-top-stories-content">
                        <?php if ($the_video_query->have_posts()): ?>
                            <ul class="lt-top-stories-list">
                                <?php while ($the_video_query->have_posts()): $the_video_query->the_post(); ?>
                                    <?php get_template_part('partials/videos/loop', 'index'); ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php else: ?>
                            <p>Sem vídeos</p>
                        <?php endif; ?>                                
                    </div>
                     <?php wp_reset_postdata(); ?>
                    <a href="<?php echo get_permalink(get_page_by_path('videos')); ?>" class="lt-load-more-link"><i class="icon"></i> Ver mais vídeos</a>
                    <!--<div class="next-page"><?php // echo get_load_more_posts_link('<i class="icon"></i> Ver mais vídeos', $the_video_query->max_num_pages, 'videos');  ?></div>-->
                </div>
            </section>
            <!-- End Videos-->
              <?php wp_reset_postdata(); ?>
            <!-- Top receitas -->
            <section class="lt-top-receitas ajax-load-more section" data-content-selector=".lt-top-receitas .loop-content">
                <h3 class="lt-widget-title">Receitas</h3>

                <?php $the_query = new WP_Query('post_type=receita&posts_per_page=3&paged=' . $paged); ?>
                <div class="loop-content">
                    <div class="lt-top-receitas-content section">
                        <?php get_template_part('partials/receitas/loop', 'index'); ?>
                    </div>
                     <?php wp_reset_postdata(); ?>
                    <a href="<?php echo site_url('receitas'); ?>" class="lt-load-more-link"><i class="icon"></i> Ver mais receitas</a>
                    <!--<div class="next-page"><?php // echo get_load_more_posts_link('<i class="icon"></i> Carregar mais receitas', $the_query->max_num_pages);  ?></div>-->
                    <!--<div class="next-page"><?php // echo get_permalink(get_page_by_path('receitas')); ?></div>-->
                </div>
               
            </section>



            <!-- Top videos -->
            <?php /*
              <section class="lt-top-videos section">
              <h3 class="lt-widget-title">Vídeos</h3>

              <div class="lt-top-videos-content section">
              <div class="lt-top-videos-main">
              <div class="video">
              <a class="thumb" href="" title="">
              <i class="icon">
              <img src="<?php echo get_template_directory_uri(); ?>/public//img/icon-video.svg" alt="Play">
              </i>
              <figure class="image">
              <img src="http://placehold.it/360x310" alt="">
              </figure>
              </a>
              <!-- Alterar a propriedade border-bottom-color conforme a cor do programa -->
              <div class="info" style="border-bottom-color:#22468a;">
              <a class="link" href="" title="">
              <!-- Alterar a propriedade background conforme a cor do programa -->
              <p class="lt-headline-label" style="background:#22468a;">Comportamento</p>
              <h4 class="title">Proin gravida nibh velit auctor aliquet aenean</h4>
              </a>
              </div>
              </div>
              </div>
              <ul class="lt-top-videos-list">
              <li class="lt-top-videos-item">
              <div class="video">
              <a class="thumb" href="" title="">
              <i class="icon">
              <img src="<?php echo get_template_directory_uri(); ?>/public//img/icon-video.svg" alt="Play">
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
              <li class="lt-top-videos-item">
              <div class="video">
              <a class="thumb" href="" title="">
              <i class="icon">
              <img src="<?php echo get_template_directory_uri(); ?>/public//img/icon-video.svg" alt="Play">
              </i>
              <figure class="image">
              <img src="<?php echo get_template_directory_uri(); ?>/public//img/samples/videos.jpg" alt="">
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
              <img src="<?php echo get_template_directory_uri(); ?>/public//img/icon-video.svg" alt="Play">
              </i>
              <figure class="image">
              <img src="<?php echo get_template_directory_uri(); ?>/public//img/samples/videos.jpg" alt="">
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

              <a class="lt-load-more-link" href="javascript:;" title="Carregar mais vídeos">
              <i class="icon"></i> Carregar mais vídeos
              </a>
              </section>

              <!-- Top receitas -->
              <section class="lt-top-receitas section">
              <h3 class="lt-widget-title">Receitas</h3>

              <div class="lt-top-receitas-content section">
              <div class="lt-top-receitas-main">
              <div class="receita">
              <a class="thumb" href="" title="">
              <figure class="image">
              <img src="http://placehold.it/360x310" alt="">
              </figure>
              </a>
              <!-- Alterar a propriedade border-bottom-color conforme a cor do programa -->
              <div class="info" style="border-bottom-color:#22468a;">
              <a class="link" href="" title="">
              <!-- Alterar a propriedade background conforme a cor do programa -->
              <p class="lt-headline-label" style="background:#22468a;">Comportamento</p>
              <h4 class="title">Proin gravida nibh velit auctor aliquet aenean</h4>
              </a>
              </div>
              </div>
              </div>
              <ul class="lt-top-receitas-list">
              <li class="lt-top-receitas-item">
              <div class="receita">
              <a class="thumb" href="" title="">
              <figure class="image">
              <img src="http://placehold.it/165x216" alt="">
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
              <li class="lt-top-receitas-item">
              <div class="receita">
              <a class="thumb" href="" title="">
              <figure class="image">
              <img src="http://placehold.it/165x216" alt="">
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

              <a class="lt-load-more-link" href="javascript:;" title="Carregar mais vídeos">
              <i class="icon"></i> Carregar mais receitas
              </a>
              </section> */ ?>	
        </section>

        <?php get_sidebar(); ?>
    </div>

    <?php get_template_part('programas', 'footer'); ?>
</div>

<?php get_footer(); ?>
