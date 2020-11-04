<?php get_header(); ?>
<!-- Wrapper -->
<div class="color-bar"></div>
<div class="wrapper archive col-10">
mizera index
    <!-- Section -->
    <div class="section">
        <!-- Content -->
        <section class="content archive-content col-7 ajax-load-more" data-content-selector=".content.archive .loop-content">
            <h2 class="title">Notícias</h2>

            <?php
            exit();
//            switch_to_blog(get_sitewide_tags_option('tags_blog_id'));
//				$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
//				$the_query = new WP_Query('post_type=post&posts_per_page=10&paged=' . $paged);

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 8,
                'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
            );

            if (get_query_var("ordena")) {
                $args += array(
                    'meta_key' => 'wpb_post_views_count',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC'
                );
            }

            if (get_query_var("nome")) {
                $args += array(
                    's' => get_query_var("nome"),
                );
            }

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
            if (get_query_var("programa")) {
                $programa = get_query_var("programa");
                $args += array(
                    'meta_key' => 'video_blog',
                    'meta_value' => $programa
                );
            }



            $the_query = new WP_Query($args);
//             print_r($the_query);
//            exit();
            ?>
            <div class="loop-content">
                <?php if ($the_query->have_posts()): ?>
                    <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                        <?php get_template_part('partials/noticias/loop', 'archive'); ?>
                    <?php endwhile; ?>
                    <?php restore_current_blog(); ?>			

                    <div class="next-page"><?php echo get_load_more_posts_link('<i class="icon"></i> Carregar mais notícias', $the_query->max_num_pages); ?></div>
                <?php else: ?>
                    <p>Nenhuma notícia encontrada</p>
                <?php endif; ?>
            </div>
        </section>

        <?php get_sidebar(); ?>
    </div>

    <?php get_template_part('../programas', 'footer'); ?>
</div>
<?php get_footer(); ?>