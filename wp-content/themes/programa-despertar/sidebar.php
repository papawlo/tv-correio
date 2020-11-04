<!-- Sidebar -->
<aside class="sidebar col-3">
    <!--<section class="program-blocks sidebar-widget">
        <div class="program-blocks-head">
            <div class="v-align">
                <div class="v-middle">
                    <h3 class="title">Quadros</h3>
                </div>
            </div>
        </div>
         Alterar propriedade background conforme a cor do programa
        <div class="program-blocks-body" style="background-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;">
            <div class="program-blocks-slides">
                <button class="program-blocks-slides-nav prev program-blocks-slides-nav-prev">
                    <i class="icon"></i>
                </button>
                <button class="program-blocks-slides-nav next program-blocks-slides-nav-next">
                    <i class="icon"></i>
                </button>
                <div class="program-blocks-slides-wrap">
                    <?php $page = get_page_by_path('o-programa'); ?>
                    <?php while (have_rows('programa_quadros', $page->ID)): the_row(); ?>
                        <div class="program-block">
                            <div class="block-thumb-wrap">
                                <?php if (get_sub_field('programa_quadros_pagina')): ?>
                                    <a class="block-thumb" href="<?php the_sub_field('programa_quadros_pagina'); ?>">
                                        <?php echo wp_get_attachment_image(get_sub_field('programa_quadros_logo'), 'thumb-192', false, array('class' => 'block-thumb')); ?>
                                    </a>
                                <?php else: ?>
                                    <?php echo wp_get_attachment_image(get_sub_field('programa_quadros_logo'), 'thumb-192', false, array('class' => 'block-thumb')); ?>
                                <?php endIf; ?>
                            </div>
                            <p class="block-description"><?php the_sub_field('programa_quadros_descricao'); ?></p>
                            <div class="block-hour-icon"></div>
                            <p class="block-hour"><?php the_sub_field('programa_quadros_exibicao'); ?></p>
                        </div>
                        <?php endWhile; ?>
                </div>
            </div>
        </div>
    </section> -->
    <section class="program-contact sidebar-widget">
        <div class="v-align">
            <div class="card v-middle">
                <a href="<?php echo network_site_url('/contato/'); ?>" title="Envie uma mensagem para o nosso programa">
                    <!-- Alterar a propriedade border-color e stroke conforme a cor do programa -->
                    <div class="icon-wrap" style="border-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;stroke:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;">
                        <i class="icon message">
                            <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-message.svg" alt="Fale conosco">
                        </i>
                    </div>
                    <p class="label">Envie uma mensagem para o nosso programa</p>
                </a>
            </div>
            <div class="divider v-middle"></div>
            <div class="card v-middle">
                <a href="<?php echo network_site_url('/comercial/'); ?>" title="Anuncie no nosso programa">
                    <!-- Alterar a propriedade border-color conforme a cor do programa -->
                    <div class="icon-wrap" style="border-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;stroke:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;">
                        <i class="icon ad">
                            <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-ad.svg" alt="Anuncie conosco">
                        </i>
                    </div>
                    <p class="label">Anuncie no nosso programa</p>
                </a>
            </div>
        </div>
    </section>
    <section class="most-read-widget sidebar-widget">
        <?php if (is_page("videos") || is_singular("video")) { ?>
            <?php
            $videos = get_all_most_popular_videos_by_program();
            if ($videos) {
                ?>
                <!-- Most read widget -->

                <h3 class="most-read-title lt-widget-title">Mais <b>Vistos</b></h3>

                <ul class="most-read-list">
                    <?php foreach ($videos as $k => $v): ?>  
                        <?php
                        $post = get_post($v->id);
                        setup_postdata($post);
                        ?>
                        <li class="most-read-item">
                            <a class="link v-align" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">                            
                                <div class="number v-middle" style="border-bottom-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;"><?php echo $k + 1; ?></div>
                                <h4 class="title v-middle"><?php the_title(); ?></h4>
                            </a>
                        </li>
                        <?php
                        wp_reset_postdata();
                    endForeach;
                    ?>
                </ul>

            <?php } ?>
        <?php } else {
            ?>
            <h3 class="most-read-title lt-widget-title">Mais <b>Lidas</b></h3>
            <?php
            $posts = get_all_most_popular_posts_by_program();
            if ($posts) {
                ?>
                <ul class="most-read-list">
                    <?php foreach ($posts as $k => $p): ?>
                        <?php
                        $post = get_post($p->id);
                        setup_postdata($post);
                        ?>
                        <li class="most-read-item">
                            <a class="link v-align" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <!-- A propriedade border-bottom-color deve ser alterada conforme a cor do programa -->
                                <div class="number v-middle" style="border-bottom-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;"><?php echo $k + 1; ?></div>
                                <h4 class="title v-middle"><?php the_title(); ?></h4>
                            </a>
                        </li>
                        <?php
                        wp_reset_postdata();
                    endforeach;
                    ?>
                </ul>
            <?php } ?>
        <?php } ?>

    </section>
    <!-- Ad -->
    <section class="ad-widget sidebar-widget">
        <div class="ad-300-600">
            <img src="http://placehold.it/300x600" alt="">
        </div>
    </section>
</aside>