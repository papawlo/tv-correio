<!-- Sidebar -->
<aside class="sidebar">
    <!-- Programming widget -->
    <section class="programming-widget sidebar-widget">
        <h3 class="programming-title lt-widget-title">Programação</h3>
        <div class="programming-body">
            <ul class="programming-list">
                <?php
                $count = 1;
                while (have_rows('programacao_' . date('w'), get_page_by_path('programacao')) && $count <= 4): the_row();
                    ?>
                    <?php
                    $timeInicio = strtotime(date('Y-m-d ' . get_sub_field('programacao_horario_inicio')));
                    $timeFim = strtotime(date('Y-m-d ' . get_sub_field('programacao_horario_termino')));
                    $time = time() + get_option('gmt_offset') * 3600;
                    if ($timeFim <= $time)
                        continue;
                    ?>
                    <?php
                    if (get_sub_field('programacao_tipo') == 'Convencional') {
                        switch_to_blog(get_sub_field('programacao_programa'));
                        $color = get_theme_mod('color_setting', '#FFB416');
                        $logo = get_theme_mod('logo_setting');
                        $imagem = wp_get_attachment_image(get_custom_header()->attachment_id, 'thumb-170', false, array('class' => 'thumb', 'style' => 'border-color:' . get_theme_mod('color_setting', '#FFB416') . ';'));
                        $programa = get_bloginfo('name');
                        restore_current_blog();
                    } else {
                        $color = '#FFB416';
                        $logo = get_sub_field('programacao_logo');
                        $imagem = wp_get_attachment_image(get_sub_field('programacao_imagem'), 'thumb-170', false, array('class' => 'thumb', 'style' => 'border-color:#FFB416;'));
                        $programa = get_sub_field('programacao_nome');
                    }
                    ?>
                    <?php if ($timeInicio <= $time && $time < $timeFim): ?>
                        <li class="programming-item">
                            <div class="program on-air">
                                <div class="v-align">
                                    <div class="v-middle">
                                        <div class="hour">
                                            <div class="label">
                                                <div class="v-align">
                                                    <div class="v-middle">
                                                        <div class="text">No ar</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="value">
                                                <div class="v-align">
                                                    <div class="v-middle">
                                                        <i class="icon"></i>
                                                        <span style="display: block"><?php echo strftime("%Hh", $timeInicio); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="v-middle">
                                        <a class="link" href="" title="">
                                            <img class="logo" src="<?php echo $logo; ?>" width="78" height="78" alt="" />
                                            <!-- Alterar propriedade border-color conforme a cor do programa -->
                                            <?php echo $imagem; ?>                                    
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="programming-item">
                            <!-- Alterar a propriedade border-left-color conforme a cor do programa -->
                            <div class="program next v-align" style="border-left-color:<?php echo $color; ?>;">                    
                                <div class="hour v-middle">
                                    <?php echo strftime("%Hh%M", $timeInicio); ?>
                                </div>
                                <div class="title v-middle">
                                    <?php echo $programa; ?>
                                </div>
                            </div>
                        </li>
                    <?php endIf; ?>
                    <?php
                    $count++;
                endWhile;
                ?>                
            </ul>
            <a class="programming-more" href="<?php echo get_permalink(get_page_by_path('programacao')); ?>" title="Ver programação completa">Ver programação completa</a>            
        </div>
    </section>
</aside>