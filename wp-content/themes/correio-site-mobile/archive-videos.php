<?php get_header(); ?>
<?php include 'util/util.php'; ?>
<!-- Wrapper -->
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

    <div class="lt-top-videos-content ajax-load-more"  data-content-selector=".lt-top-videos .lt-top-videos-list">
        <!--        <div class="lt-top-videos-main">
                    <div class="video">
                        <a class="thumb" href="" title="">
                            <i class="icon">
                                <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-video.svg" alt="Play">
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
                </div>-->
        <?php
        $args = array(
            'post_type' => 'videos',
            'posts_per_page' => 3,
            'ignore_sticky_posts' => 'true',
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
        );

        if (get_query_var("ordena")) {
            $args += array(
                'meta_key' => 'wpb_post_views_count',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
            );
        }

        $the_query = new WP_Query($args);
        ?>
        <ul class="lt-top-videos-list">
<?php get_template_part('partials/videos/loop', 'index'); ?>
            <!--            <li class="lt-top-videos-item">
                            <div class="video v-align">
                                <a class="thumb v-middle" href="" title="">
                                    <i class="icon">
                                        <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-video.svg" alt="Play">
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
                                        <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-video.svg" alt="Play">
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
                                        <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-video.svg" alt="Play">
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
                        </li>-->
        </ul>

    </div>
<?php echo get_load_more_posts_link('<i class="icon"><img src="' . get_template_directory_uri() . '/public/img/icon-more.svg" alt="Carregar mais vídeos"></i> Carregar mais vídeos', $the_query->max_num_pages); ?>

<!--    <a class="lt-load-more-link" href="javascript:;" title="Carregar mais vídeos">
        <i class="icon">
            <img src="public/img/icon-more.svg" alt="Carregar mais vídeos">
        </i> Carregar mais vídeos
    </a>-->
</section>

<?php get_footer(); ?>