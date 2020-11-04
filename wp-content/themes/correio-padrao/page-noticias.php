<?php get_header(); ?>
<!-- Wrapper -->
<div class="wrapper archive col-10">

    <!-- Section -->
    <div class="section">
        <!-- Content -->
        <section class="content lt-top-stories col-7 ajax-load-more" data-content-selector=".lt-top-stories .loop-content">
            <section class="archive-content">
                <h2 class="title">Notícias</h2>
            </section>
            <section class="filters">
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
            $args += array(
                'post_type' => 'post',
                'posts_per_page' => 8,
                'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
            );

            $the_query = new WP_Query($args);
            ?>
            <div class="loop-content">
                <div class="lt-top-stories-content">
                    <?php if ($the_query->have_posts()): ?>
                        <ul class="lt-top-stories-list">
                            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                                <?php get_template_part('partials/noticias/loop', 'index'); ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                        <p>Sem notícias</p>
                    <?php endif; ?>			
                </div>
                <div class="next-page"><?php echo get_load_more_posts_link('<i class="icon"></i> Carregar mais notícias', $the_query->max_num_pages); ?></div>
            </div>
        </section>

        <?php get_sidebar(); ?>
    </div>

    <?php get_template_part('../programas', 'footer'); ?>
</div>
<?php get_footer(); ?>