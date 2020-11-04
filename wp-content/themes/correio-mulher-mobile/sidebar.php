<!-- Sidebar Quadros-->
<aside class="sidebar">
    <section class="program-blocks sidebar-widget">
        <div class="program-blocks-head">
            <div class="v-align">
                <div class="v-middle">
                    <h3 class="title">Quadros</h3>
                </div>
            </div>
        </div>
        <!-- Alterar propriedade background conforme a cor do programa -->
        <div class="program-blocks-body" style="background-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;">
            <div class="program-blocks-slides">
                <button class="program-blocks-slides-nav program-blocks-slides-nav-prev prev">
                    <i class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-left-o.svg" alt="Recuar">
                    </i>
                </button>
                <button class="program-blocks-slides-nav program-blocks-slides-nav-next next">
                    <i class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-right-oo.svg" alt="Avançar">
                    </i>
                </button>
                <div class="program-blocks-slides-wrap">
                    <?php $page = get_page_by_path('o-programa');?>
                    <?php while (have_rows('programa_quadros', $page->ID)): the_row();?>
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
    </section>
</aside>
<!--fim sidebar quadros-->

