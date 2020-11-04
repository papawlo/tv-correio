<?php
get_header();
the_post();
wpb_set_post_views(get_the_ID());
?>
<!-- Wrapper -->
<div class="wrapper archive col-10">

    <!-- Section -->
    <div class="section">
        <!-- Content -->
        <section class="content lt-top-stories col-7 ajax-load-more" data-content-selector=".lt-top-stories .loop-content">
            <section class="archive-content">
                <h1 class="title"><?php the_title(); ?> </h2>
            </section>
            <div class="single-video">
                <div class="lt-top-videos-main">
                    <div class="video">
                        <!--<a class="thumb" href="" title="">-->
                        <i class="icon btn-play-video">
                            <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
                        </i>
                        <figure class="image">
                            <?php
// get iframe HTML
                            $iframe = get_field('video_url');


// use preg_match to find iframe src
                            preg_match('/src="(.+?)"/', $iframe, $matches);
                            $src = $matches[1];


// add extra params to iframe src
                            $params = array(
                                'controls' => 1,
                                'hd' => 1,
                                'autohide' => 1,
                                'showinfo' => 0,
                                'modestbranding' => 1,
                                'wmode' => 'transparent',
                                'enablejsapi' => 1,
                                'playsinline' => 1,
//                                'color' => 'white',
                                'rel' => 0,
                                'egm' => 0,
                                'showsearch' => 0,
                                'version' => 3,
                                'autoplay' => 1
                            );

                            $new_src = add_query_arg($params, $src);

                            $iframe = str_replace($src, $new_src, $iframe);


// add extra attributes to iframe html
                            $attributes = 'frameborder="0" class="video-player"';

                            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


// echo $iframe
                            echo $iframe;
                            ?>
                            <!--<img src="http://placehold.it/660x410" alt="">-->
                        </figure>
                        <!--</a>-->
                        <!-- Alterar a propriedade border-bottom-color conforme a cor do programa -->
                        <div class="info">
                            <h4 class="title"><?php the_content(); ?></h4>
                        </div>
                    </div>
                </div>
                <?php
                $args = array(
                    'post_type' => 'videos',
                    'posts_per_page' => 3,
                    'meta_key' => 'video_blog',
                    'meta_value' => get_field("video_blog"),
                    'post__not_in' => array(get_the_ID())
                );
                $the_query = new WP_Query($args);
//                print_r($the_query);
//                exit;
                ?>
                <ul class="lt-top-videos-list">

                    <?php get_template_part('partials/videos/loop', 'relateds'); ?>
                    <!--                    <li class="lt-top-videos-item">
                                            <div class="video">
                                                <a class="thumb" href="" title="">
                                                    <i class="icon">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
                                                    </i>
                                                    <figure class="image">
                                                        <img src="http://placehold.it/165x132" alt="">
                                                    </figure>
                                                </a>
                                                 Alterar a propriedade border-bottom-color conforme a cor do programa 
                                                <div class="info" style="border-bottom-color:#22468a;">
                                                    <a class="link" href="" title="">
                                                        <span class="v-align">
                                                            <span class="v-middle">
                                                                 Alterar a propriedade background conforme a cor do programa 
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
                                                 Alterar a propriedade border-bottom-color conforme a cor do programa 
                                                <div class="info" style="border-bottom-color:#22468a;">
                                                    <a class="link" href="" title="">
                                                        <span class="v-align">
                                                            <span class="v-middle">
                                                                 Alterar a propriedade background conforme a cor do programa 
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
                                                 Alterar a propriedade border-bottom-color conforme a cor do programa 
                                                <div class="info" style="border-bottom-color:#22468a;">
                                                    <a class="link" href="" title="">
                                                        <span class="v-align">
                                                            <span class="v-middle">
                                                                 Alterar a propriedade background conforme a cor do programa 
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




            <a class="lt-go-back-link" href="<?php echo get_post_type_archive_link('videos'); ?> " title="Voltar para os vídeos">
                <i class="icon"></i> Voltar para vídeos
            </a>
        </section>

        <?php get_sidebar(); ?>
    </div>

    <?php get_template_part('../programas', 'footer'); ?>
</div>
<?php get_footer(); ?>