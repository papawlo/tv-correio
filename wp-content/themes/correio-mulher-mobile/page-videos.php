<?php get_header(); ?>
<!-- Wrapper -->
<section class="wrapper archive">

    <!-- Section -->
    <section class="content archive-content">
        <!-- Content -->
        <div class="archive-content-title lt-widget-title-wrap ajax-load-more" data-content-selector=".lt-top-stories .loop-content">
            <div class="v-align">
                <div class="v-middle">
                    <h3 class="lt-widget-title">Vídeos</h3>
                </div>              
            </div>
        </div>
        <?php
        $args = array();


        $nome = '';
        if (get_query_var("nome")) {
            $nome = get_query_var("nome");
            $args += array(
                's' => $nome,
            );
        }
        $data = "";
        if (get_query_var("data")) {
            $data = get_query_var("data");
            list($dia, $mes, $ano) = explode("-", $data);

            $dia = (int) $dia;
            if ($dia) {
                $args += array(
                    'day' => (int) $dia,
                );
            }

            $mes = (int) $mes;
            if ($mes) {
                $args += array(
                    'monthnum' => (int) $mes, //(int) - Month number (from 1 to 12).                      
                );
            }
            $ano = (int) $ano;
            if ($ano) {
                $args += array(
                    'year' => (int) $ano, //(int) - 4 digit year (e.g. 2011).                 
                );
            }
        }
        ?>
        <section class="filters">
            <h3 class="lt-widget-title">Filtre:</h3>
            <form class="filter-search">
                <div class="filter-1">
                    <input type="text" name="nome" class="input-filter" placeholder="Palavra Chave" value="<?php echo $nome; ?>">
                </div>

                <div class="filter-3">
                    <input id="calendario" class="input-filter" type="text" name="data" placeholder="Por Data" value="<?php echo $data; ?>"/>
                </div>

                <button class="btn-go-filter">filtrar</button>

            </form>


        </section>


        <?php
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $the_query = new WP_Query('post_type=video&posts_per_page=8&paged=' . $paged);
        ?>
        <div class="loop-content">
            <?php
            if ($the_query->have_posts()) {
                $i = 0;
                ?>
                <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                    <?php if (has_post_thumbnail()) { ?>
                        <article class="archive-article v-align">

                            <a class="archive-thumb v-middle" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <!--<img src="http://placehold.it/106x132" alt="Imagem">-->                    
                                <i class="icon">
                                    <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-video.svg" alt="Play">
                                </i>
                                <?php the_post_thumbnail("thumb-106x132"); ?>                  
                                <?php // echo wp_get_attachment_image($thumbID, 'thumb-106x132');    ?>                  
                            </a>
                        <?php } elseif (get_field('video_url')) { ?>
                            <article class="archive-article v-align">
                                <a class="archive-thumb v-middle" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <i class="icon">
                                        <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-video.svg" alt="Play">
                                    </i>
                                    <!--<img src="http://placehold.it/106x132" alt="Imagem">-->                                               
                                    <?php
                                    $video_url = get_field('video_url', FALSE, FALSE); //URL

                                    $video_thumb_url = get_video_thumbnail_uri($video_url, 'large', true); //get thumbnail via our functions in functions.php 

                                    $videoThumb = '<img width="106" height="132" src="http://i' . ($i % 3) . '.wp.com/' . $video_thumb_url . '?crop=50,50,106px,132px" class="thumb-106x132 wp-post-image" alt="' . the_title_attribute(array("echo" => 0)) . '">';
                                    echo $videoThumb;
                                    ?>                  
                                </a>
                            <?php } else { ?>
                                <!-- Incluir a classe .no-thumb quando não houver thumbnail para a notícia -->
                                <article class="archive-article no-thumb">
                                <?php } ?>
                                <!-- Alterar a prorpriedade border-bottom-color conforme a cor do programa -->
                                <div class="archive-info v-middle" style="border-bottom-color: <?php echo get_theme_mod('color_setting', '#FFB416'); ?>;">
                                    <!--<a class="lt-headline-label" href="<?php // the_permalink();                ?>" title="<?php // the_title_attribute();                ?>" style="background:<?php // echo get_theme_mod('color_setting', '#FFB416');                ?>;"><?php echo bloginfo("name"); ?></a>-->
                                    <!--<p class="lt-headline-label" style="background:<?php // echo get_theme_mod('color_setting', '#FFB416');                ?>;"><?php // echo wp_trim_words($category, 5);                ?></p>-->
                                    <h3 class="archive-title">
                                        <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo wp_trim_words(get_the_title(), 8); ?></a>
                                    </h3>
                                </div>
                            </article>
                            <?php
                            $i++;
                        endwhile;
                        ?>
                    <?php } ?>
                    </div>
                    <div class="next-page"><?php echo get_load_more_posts_link('<i class="icon"></i> Carregar mais vídeos', $the_query->max_num_pages); ?></div>
                    <!--            <a class="lt-load-more-link" href="javascript:;" title="Carregar mais notícias">
                                    <i class="icon">
                                        <img src="<?php // echo get_template_directory_uri();               ?>/public/img/icon-more.svg" alt="Carregar mais notícias">
                                    </i> Carregar mais notícias
                                </a>-->
                    </section>
                    <?php get_sidebar(); ?>

                    <?php get_template_part('../programas', 'footer-mobile'); ?>
                    </section>
                    <?php get_footer(); ?>