<?php get_header(); ?>
<!-- Section -->
<section class="wrapper home">
    <section class="home-pannel">
        <div class="home-pannel-slides">
            <a class="slide" href="" title="">
                <img src="http://placehold.it/375x270" alt="">
            </a>
            <a class="slide" href="" title="">
                <img src="http://placehold.it/375x270" alt="">
            </a>
            <a class="slide" href="" title="">
                <img src="http://placehold.it/375x270" alt="">
            </a>
            <a class="slide" href="" title="">
                <img src="http://placehold.it/375x270" alt="">
            </a>
        </div>
        <div class="home-pannel-thumbs">
            <ul class="home-pannel-thumbs-list">
                <li class="home-pannel-thumbs-item" data-rel="1">
                    <!-- Incrementar o atributo data-rel a partir de 1 -->
                    <a class="thumb" href="javascript:;" title="">
                        <span class="border" style="border-color:#d8248f;"></span>
                        <img src="http://placehold.it/120x120" alt="">
                    </a>
                </li>
                <li class="home-pannel-thumbs-item" data-rel="2">
                    <a class="thumb" href="javascript:;" title="">
                        <span class="border" style="border-color:#d8248f;"></span>
                        <img src="http://placehold.it/120x120" alt="">
                    </a>
                </li>
                <li class="home-pannel-thumbs-item" data-rel="3">
                    <a class="thumb" href="javascript:;" title="">
                        <span class="border" style="border-color:#d8248f;"></span>
                        <img src="http://placehold.it/120x120" alt="">
                    </a>
                </li>
                <li class="home-pannel-thumbs-item" data-rel="4">
                    <a class="thumb" href="javascript:;" title="">
                        <span class="border" style="border-color:#d8248f;"></span>
                        <img src="http://placehold.it/120x120" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </section>

    

    <section class="content">
        <section class="lt-top-stories section">
            <div class="lt-top-stories-title lt-widget-title-wrap">
                <div class="v-align">
                    <div class="v-middle">
                        <h3 class="lt-widget-title">Notícias</h3>
                    </div>
                    <div class="v-middle">
                        <select class="lt-widget-title-wrap-select" name="" data-role="none">
                            <option value="">Mais vistas</option>
                            <option value="">Mais comentadas</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="lt-top-stories-content">
                <?php
                switch_to_blog(get_sitewide_tags_option('tags_blog_id'));
                $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
                $the_query = new WP_Query('post_type=post&posts_per_page=10&paged=' . $paged);
                ?>                
                <ul class="lt-top-stories-list">
                    <?php get_template_part('partials/noticias/loop', 'archive'); ?>
                    <?php restore_current_blog(); ?>			


                </ul>
            </div>
            <?php // echo get_load_more_posts_link('<i class="icon"></i> Carregar mais notícias', $the_query->max_num_pages); ?>                  
            <a class="lt-load-more-link" href="javascript:;" title="Carregar mais notícias">
                <i class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-more.svg" alt="Carregar mais notícias">
                </i> Carregar mais notícias
            </a>
        </section>
    </section>

    <section class="lt-top-videos">
        <div class="lt-top-videos-title lt-widget-title-wrap">
            <div class="v-align">
                <div class="v-middle">
                    <h3 class="lt-widget-title">Vídeos</h3>
                </div>
                <div class="v-middle">
                    <select class="lt-widget-title-wrap-select" name="" data-role="none">
                        <option value="">Mais vistas</option>
                        <option value="">Mais comentadas</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="lt-top-videos-content">
            <div class="lt-top-videos-main">
                <div class="video">
                    <a class="thumb" href="" title="">
                        <i class="icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
                        </i>
                        <figure class="image">
                            <img src="http://placehold.it/375x310" alt="">
                        </figure>
                    </a>
                    <div class="info" style="border-bottom-color:#22468a;">
                        <a class="link" href="" title="">
                            <p class="lt-headline-label" style="background:#22468a;">Comportamento</p>
                            <h4 class="title">Proin gravida nibh velit auctor aliquet aenean</h4>
                        </a>
                    </div>
                </div>
            </div>
            <ul class="lt-top-videos-list">
                <li class="lt-top-videos-item">
                    <div class="video v-align">
                        <a class="thumb v-middle" href="" title="">
                            <i class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
                            </i>
                            <figure class="image">
                                <img src="http://placehold.it/129x132" alt="">
                            </figure>
                        </a>
                        <div class="info v-middle" style="border-bottom-color:#22468a;">
                            <a class="link" href="" title="">
                                <span class="v-align">
                                    <span class="v-middle">
                                        <p class="lt-headline-label" style="background:#22468a;">Comportamento</p>
                                        <h4 class="title">Proin gravida nibh velit auctor aliquet aenean</h4>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="lt-top-videos-item">
                    <div class="video v-align">
                        <a class="thumb v-middle" href="" title="">
                            <i class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
                            </i>
                            <figure class="image">
                                <img src="http://placehold.it/129x132" alt="">
                            </figure>
                        </a>
                        <div class="info v-middle" style="border-bottom-color:#22468a;">
                            <a class="link" href="" title="">
                                <span class="v-align">
                                    <span class="v-middle">
                                        <p class="lt-headline-label" style="background:#22468a;">Comportamento</p>
                                        <h4 class="title">Proin gravida nibh velit auctor aliquet aenean</h4>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="lt-top-videos-item">
                    <div class="video v-align">
                        <a class="thumb v-middle" href="" title="">
                            <i class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
                            </i>
                            <figure class="image">
                                <img src="http://placehold.it/129x132" alt="">
                            </figure>
                        </a>
                        <div class="info v-middle" style="border-bottom-color:#22468a;">
                            <a class="link" href="" title="">
                                <span class="v-align">
                                    <span class="v-middle">
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
            <i class="icon">
                <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-more.svg" alt="Carregar mais vídeos">
            </i> Carregar mais vídeos
        </a>
    </section>
    
    <aside class="sidebar">
        <section class="programming-widget sidebar-widget">
            <h3 class="programming-title lt-widget-title">Programação</h3>
            <div class="programming-body">
                <ul class="programming-list">
                    <li class="programming-item">
                        <div class="program on-air">
                            <div class="v-align">
                                <div class="v-middle">
                                    <div class="hour">
                                        <div class="label">
                                            <div class="v-align">
                                                <div class="v-middle">
                                                    <div class="text">No ar</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="value">
                                            <div class="v-align">
                                                <div class="v-middle">
                                                    <i class="icon"></i>
                                                    06h
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="v-middle">
                                    <a class="link" href="" title="">
                                        <img class="logo" src="http://placehold.it/78x78" alt="">
                                        <img class="thumb" src="http://placehold.it/170x170" alt="" style="border-color:#e3532f;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="programming-item">
                        <div class="program next v-align" style="border-left-color:#d8248f;">
                            <div class="hour v-middle">
                                09h
                            </div>
                            <div class="title v-middle">
                                Mulher demais
                            </div>
                        </div>
                    </li>
                    <li class="programming-item">
                        <div class="program next v-align">
                            <div class="hour v-middle">
                                09h
                            </div>
                            <div class="title v-middle">
                                Mulher demais
                            </div>
                        </div>
                    </li>
                </ul>
                <a class="programming-more" href="" title="Ver programação completa">Ver programação completa</a>
            </div>
        </section>
    </aside> 
<?php get_template_part('../programas','footer-mobile'); ?>
    
</section>
<?php get_footer(); ?>