<?php $paged = ( get_query_var('page') ) ? get_query_var('page') : 1; ?>
<?php get_header(); ?>
<!-- Wrapper -->
<section class="wrapper home">

    <!-- Section Content -->
    <section class="content">
        <?php
        $the_query = new WP_Query('post_type=post&posts_per_page=4&paged=' . $paged);
        if ($the_query->have_posts()):
            ?>
            <!--Section Top  Stories-->
            <section class="lt-top-stories ajax-load-more section" data-content-selector=".lt-top-stories .loop-content">
                <div class="lt-top-stories-title lt-widget-title-wrap">
                    <div class="v-align">
                        <div class="v-middle">
                            <h3 class="lt-widget-title">Notícias</h3>
                        </div>
                        <div class="v-middle">
    <!--                        <select class="lt-widget-title-wrap-select" name="" data-role="none">
                                <option value="">Mais vistas</option>
                                <option value="">Mais comentadas</option>
                            </select>-->
                        </div>
                    </div>
                </div>
                <div class="loop-content">
                    <div class="lt-top-stories-content">
                        <ul class="lt-top-stories-list">
                            <?php
//                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
//                        $query = new WP_Query('post_type=receita&posts_per_page=1&paged=' . $paged);
                            ?>                      
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <?php get_template_part('partials/noticias/loop', 'index'); ?>     
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <!--<a href="<?php // echo get_permalink(get_page_by_path('noticias'));            ?>" class="lt-load-more-link"><i class="icon"></i> Ver mais notícias</a>-->
                    <div class="next-page"><?php echo get_load_more_posts_link('<i class="icon"></i> Carregar mais notícias', $the_query->max_num_pages); ?></div>
                </div>
                <!--            <a class="lt-load-more-link next-page" href="javascript:;" title="Carregar mais notícias">
                                <i class="icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-more.svg" alt="Carregar mais notícias">
                                </i> Carregar mais notícias
                            </a>-->
            </section>
            <!--FIm Section Top Stories-->
        <?php endif; ?>

        <?php $the_video_query = new WP_Query('post_type=video&posts_per_page=4&paged=' . $paged); ?>
        <?php if ($the_video_query->have_posts()): ?>
            <!--Section Videos-->
            <section class="lt-top-stories section">
                <div class="lt-top-stories-title lt-widget-title-wrap">
                    <div class="v-align">
                        <div class="v-middle">
                            <h3 class="lt-widget-title">Vídeos</h3>
                        </div>
                        <div class="v-middle">
    <!--                        <select class="lt-widget-title-wrap-select" name="" data-role="none">
                                <option value="">Mais vistas</option>
                                <option value="">Mais comentadas</option>
                            </select>-->
                        </div>
                    </div>
                </div>

                <div class="lt-top-stories-content">

                    <?php $i = 0; ?>
                    <ul class="lt-top-stories-list">
                        <?php while ($the_video_query->have_posts()) : $the_video_query->the_post(); ?>
                            <li class="lt-top-stories-item">
                                <div class="storie">
                                    <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <i class="icon">
                                            <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
                                        </i>
                                        <figure>
                                            <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail("thumb-360x229");
                                            } elseif (get_field('video_url')) {

                                                $video_url = get_field('video_url', FALSE, FALSE); //URL

                                                $video_thumb_url = get_video_thumbnail_uri($video_url, 'large', true); //get thumbnail via our functions in functions.php 

                                                $videoThumb = '<img width="360" height="229" src="http://i' . ($i % 3) . '.wp.com/' . $video_thumb_url . '?fit=360,229" class="thumb-360x229 wp-post-image" alt="' . the_title_attribute(array("echo" => 0)) . '">';
                                                echo $videoThumb;
                                            } else {
                                                echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-360x229', false);
                                            }
                                            ?>                                                                                                                   
                                        </figure>
                                    </a>
                                    <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <!-- Alterar propriedade background conforme a cor do programa -->
                                        <?php // $categories = get_the_category();  ?>
                                        <?php // $category = array_shift($categories);  ?>
                                        <!--<p class="lt-headline-label" style="background:<?php // echo get_ms_theme_mod('color_setting', '#000', get_post_meta(get_the_ID(), 'blogid', true));       ?>;"><?php // echo $category->name;       ?></p>-->
                                        <h4 class="title"><?php echo wp_trim_words(get_the_title(), 8); ?></h4>
                                    </a>
                                </div>
                            </li>
                            <?php
                        endwhile;
                        ?>
                    </ul>

                </div>
                <!--<a href="<?php // echo get_permalink(get_page_by_path('noticias'));                                ?>" class="lt-load-more-link"><i class="icon"></i> Ver mais notícias</a>-->
                <a class="lt-load-more-link" href="<?php echo get_permalink(get_page_by_path('videos')); ?>" title="Carregar mais vídeos">
                    <i class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-more.svg" alt="Carregar mais vídeos">
                    </i> Ver mais vídeos
                </a>
            </section>
        <?php endif; ?>
    </section>  
    <!-- FIM Section .content -->
    <!-- Aside sidebar QUADROS-->
    <?php get_sidebar(); ?>
    <!--Fim Aside .sidebar-->
    <!--Aside Sidebar Contact-->
    <?php get_sidebar('contato') ?>
    <!--FIM Aside Sidebar Contact-->

    <!--Section Programas Widget-->
    <?php get_template_part("../programas-footer", "mobile") ?>
    <!-- FIM Section Programas Widget-->



</section>
<!--FIM Section .wrapper.Home-->
<?php get_footer(); ?>
