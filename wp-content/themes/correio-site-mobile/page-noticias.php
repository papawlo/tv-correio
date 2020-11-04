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
                    <h3 class="lt-widget-title">Notícias</h3>
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
        switch_to_blog(get_sitewide_tags_option('tags_blog_id'));

        $args += array(
            'post_type' => 'post',
            'posts_per_page' => 8,
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
        );
        $the_query = new WP_Query($args);
        ?>
        <div class="loop-content">
            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                <?php if (has_post_thumbnail()) { ?>
                    <article class="archive-article v-align">
                        <?php $thumbID = get_post_meta(get_the_ID(), '_thumbnail_id', true); ?>
                        <?php switch_to_blog(get_post_meta(get_the_ID(), 'blogid', true)); ?>
                        <a class="archive-thumb v-middle" href="<?php the_permalink(); ?>" title="">
                            <!--<img src="http://placehold.it/106x132" alt="Imagem">-->                   
                            <?php echo wp_get_attachment_image($thumbID, 'thumb-106x132'); ?>                  
                        </a>
                        <?php restore_current_blog(); ?>
                    <?php } else { ?>
                        <!-- Incluir a classe .no-thumb quando não houver thumbnail para a notícia -->
                        <article class="archive-article no-thumb">
                        <?php } ?>
                        <!-- Alterar a prorpriedade border-bottom-color conforme a cor do programa -->
                        <div class="archive-info v-middle" style="border-bottom-color: <?php echo get_ms_theme_mod('color_setting', '#000', get_post_meta(get_the_ID(), 'blogid', true)); ?>;">
                            <?php
                            $categories = get_the_category();
                            $category = array_shift($categories);
                            ?>
                            <a class="lt-headline-label" href="<?php the_permalink(); ?>" title="<?php echo $category->name; ?>" style="background:<?php echo get_ms_theme_mod('color_setting', '#000', get_post_meta(get_the_ID(), 'blogid', true)); ?>;"><?php echo wp_trim_words($category->name, '3', ' ...'); ?></a>
                            <h3 class="archive-title">
                                <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo wp_trim_words(get_the_title(), 8); ?></a>
                            </h3>
                        </div>
                    </article>
                <?php endwhile; ?>
        </div>
        <div class="next-page"><?php echo get_load_more_posts_link('<i class="icon"></i> Carregar mais notícias', $the_query->max_num_pages); ?></div>
        <!--            <a class="lt-load-more-link" href="javascript:;" title="Carregar mais notícias">
                        <i class="icon">
                            <img src="<?php // echo get_template_directory_uri()         ?>/public/img/icon-more.svg" alt="Carregar mais notícias">
                        </i> Carregar mais notícias
                    </a>-->
    </section>

    <?php get_template_part('../programas', 'footer-mobile'); ?>
</section>
<?php get_footer(); ?>