<?php get_header(); ?>
<!-- Wrapper -->
<section class="wrapper archive">
    <?php get_sidebar(); ?>
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
        $programa = 0;
        if (get_query_var("programa")) {
            $programa = get_query_var("programa");
            switch_to_blog($programa);
        }


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

                <div class="filter-2">
                    <?php
                    $sites_args = array(
                        'network_id' => $wpdb->siteid,
                        'public' => true,
                        'archived' => false,
                        'mature' => null,
                        'spam' => null,
                        'deleted' => false,
                        'limit' => 100,
                        'offset' => 0,
                    );
                    $sites = wp_get_sites($sites_args);
                    ?>

                    <select name="programa" id="programs-filter">

                        <option value="">Todos os programas</option>
                        <?php
                        $programa = false;
                        if (get_query_var("programa")) {
                            $programa = get_query_var("programa");
                        }
                        ?>
                        <?php foreach ($sites as $site) { ?>
                            <option value="<?php echo $site["blog_id"] ?>" <?php echo $programa === $site["blog_id"] ? 'selected="selected"' : "" ?>><?php echo get_blog_option($site["blog_id"], 'blogname'); ?></option>  
                        <?php } ?>                           
                    </select>
                </div>

                <div class="filter-3">
                    <input id="calendario" class="input-filter" type="text" name="data" placeholder="Por Data" value="<?php echo $data; ?>"/>
                </div>

                <button class="btn-go-filter">filtrar</button>

            </form>


        </section>

        <?php
//        switch_to_blog(get_sitewide_tags_option('tags_blog_id'));
        $args += array(
            'post_type' => 'video',
            'posts_per_page' => 8,
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
        );

        $the_query = new WP_Query($args);
        ?>
        <div class="loop-content">
            <?php
            if ($the_query->have_posts()) {
                $i = 0;
                while ($the_query->have_posts()): $the_query->the_post();
                    ?>
                    <article class="archive-article v-align">

                        <a class="archive-thumb v-middle" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">                                
        <!--                                <i class="icon">
                                <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-video.svg" alt="Play">
                            </i>-->
                            <?php $thumbID = get_post_meta(get_the_ID(), '_thumbnail_id', true); ?>
                            <?php
                            if ($thumbID) {
                                switch_to_blog($blog_id);
                                echo wp_get_attachment_image($thumbID, 'thumb-106x132');
                                restore_current_blog();
                            } elseif (get_field('video_url')) {

                                $video_url = get_field('video_url', FALSE, FALSE); //URL

                                $video_thumb_url = get_video_thumbnail_uri($video_url, 'large', true); //get thumbnail via our functions in functions.php 
                                // esse (i%3) server para aumentar o paralelismo de downloads dos crops feito pelo photon [i0.wp.com, i1.wp.com, and i2.wp.com.]
                                // https://developer.wordpress.com/docs/photon/
                                $videoThumb = '<img width="106" height="132" src="http://i' . ($i % 3) . '.wp.com/' . $video_thumb_url . '?crop=50,50,106px,132px" class="thumb-106x132 wp-post-image" alt="' . the_title_attribute(array("echo" => 0)) . '">';
                                echo $videoThumb;
                            } else {
//                                switch_to_blog($blog_id);
                                echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-106x132', false);
//                                restore_current_blog();
                            }
                            ?>
                        </a>
                        <!-- Alterar a prorpriedade border-bottom-color conforme a cor do programa -->
                        <?php
                        $blog_id = get_post_meta(get_the_ID(), 'blogid', true);
                        $blog = get_blog_details($blog_id);

                    echo "\n<!-- debug \n";
                    print_r($blog_id);
                    echo "\n";
                    print_r($blog);
                    echo "\n-->\n";
                        ?>
                        <div class="archive-info v-middle" style="border-bottom-color: <?php echo get_ms_theme_mod('color_setting', '#000', get_post_meta($blog_id)); ?>;">                           
                            <p class="lt-headline-label" style="background:<?php echo get_ms_theme_mod('color_setting', '#000', $blog_id); ?>;"><?php echo $blog->blogname; ?></p>
                            <h3 class="archive-title">
                                <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 8); ?></a>
                            </h3>
                        </div>
                    </article>

                    <?php
                    $i++;
                endwhile;
            }
            ?>

            <?php
            if (get_query_var("programa")) {
                restore_current_blog();
            }
            ?>
        </div>
        <div class="next-page"><?php echo get_load_more_posts_link('<i class="icon"></i> Carregar mais vídeos', $the_query->max_num_pages); ?></div>
        <!--            <a class="lt-load-more-link" href="javascript:;" title="Carregar mais notícias">
                        <i class="icon">
                            <img src="<?php // echo get_template_directory_uri()                             ?>/public/img/icon-more.svg" alt="Carregar mais notícias">
                        </i> Carregar mais notícias
                    </a>-->
    </section>

<?php get_template_part('../programas', 'footer-mobile'); ?>
</section>
<?php get_footer(); ?>