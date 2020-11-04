<?php
get_header();
the_post();
wpb_set_post_views(get_the_ID());
?>
<!-- Wrapper -->
<section class="wrapper single">

    <!--conteudo-->
    <section class="content">
        <article class="lt-post">
            <header class="lt-post-head">
                <time class="time" pubdate="">
                    <div class="v-align">
                        <i class="icon v-middle">
                            <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-time.svg" alt="Time">
                        </i>
                        <div class="v-middle">
                            <?php the_time('d/m/Y'); ?>
                        </div>
                    </div>
                </time>
                <h1 class="title"><?php the_title(); ?></h1>
                <?php if (has_excerpt()): ?><h2 class="subtitle"><?php echo get_the_excerpt(); ?></h2><?php endif; ?>

                <div class="share">
                    <div class="v-align">
                        <ul class="list v-middle">
                            <li id="facebook-sharrre" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" class="item"><a title="Compartilhe no Facebook" href="javascript:;" class="link"><i class="icon facebook"><img alt="Facebook" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-facebook.svg"></i></a></li>
                            <li id="twitter-sharrre" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" class="item"><a title="Compartilhe no Twitter" href="javascript:;" class="link"><i class="icon twitter"><img alt="Twitter" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-twitter.svg"></i></a></li>
                        </ul>
                        <p class="author v-middle"><?php echo get_the_author(); ?></p>
                    </div>
                </div>
            </header>
            
            <section class="lt-post-body">
                <!--<div class="lt-top-videos-main">-->
                    <div class="video">
                       
                        <figure class="image">
                            <?php
// get iframe HTML
                            $iframe = get_field('video_url');


// use preg_match to find iframe src
                            preg_match('/src="(.+?)"/', $iframe, $matches);
                            $src = $matches[1];

// use preg_match to find iframe width
                            preg_match('/width="(.+?)"/', $iframe, $matches);
                            $width = $matches[1];

// use preg_match to find iframe height
                            preg_match('/height="(.+?)"/', $iframe, $matches);
                            $height = $matches[1];


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
                            
//                            $new_widht= "381";
//                            $new_height= "200";
//                            
//                            $iframe = str_replace($width, $new_widht, $iframe);
//                            $iframe = str_replace($height, $new_height, $iframe);
                            
                            


// add extra attributes to iframe html
                            $attributes = 'frameborder="0" class="video-player"';

                            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


// echo $iframe
                            echo $iframe;
                            ?>
                            <!--<img src="http://placehold.it/660x410" alt="">-->
                        </figure>
                    
                        <!-- Alterar a propriedade border-bottom-color conforme a cor do programa -->
                        <div class="info">
                            <h4 class="title"><?php the_content(); ?></h4>
                        </div>
                    </div>
                <!--</div>-->
            </section>
        </article>

        <div class="lt-padding-content">
            <a class="lt-go-back-link" href="<?php echo get_post_type_archive_link('page'); ?>" title="Voltar para os vídeso">
                <i class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-left.svg" alt="Voltar para os vídeos">
                </i> Voltar para vídeos
            </a>
        </div>
    </section>

    <!-- Programs widget -->
    <?php get_template_part('../programas', 'footer-mobile'); ?>
</section>
<?php get_footer(); ?>