<?php get_header(); ?>
<!-- Wrapper -->
<div class="wrapper contact">

    <div class="lt-default-banner">
        <div class="lt-default-banner-wrap col-10 center">
            <div class="v-align">
                <div class="icon v-middle">
                    <div class="icon-wrap">
                        <div class="v-align">
                            <div class="v-middle">
                                <i class="icon-image"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="title v-middle">Fale com a<br><b>líder de audiência</b></h1>
            </div>
        </div>
    </div>

    <section class="contact-content">
        <div class="col-10 center">
            <h1 class="title">Mande sua mensagem para a gente</h1>
            <?php echo do_shortcode('[contact-form-7 id="465" title="Contato" html_class="password"]'); ?>
<!--            <form class="contact-form lt-form" method="" action="">
                <div class="lt-form-row escolha-setor">
                    <label class="lt-form-label" for="ctn_opcao">Setor/Programa</label>
                    <div class="lt-form-select">
                                                [hidden ctn_setor id:ctn_setor class:lt-form-select-input "nenhum setor"]
                        <input id="ctn_opcao" class="lt-form-select-input" type="hidden" name="ctn_opcao" value="programas">
                        <div class="current">
                            <span class="label">Programas</span>
                            <div class="icon-wrap">
                                <div class="v-align">
                                    <div class="v-middle">
                                        <i class="icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list">   
                            <li class="item active" data-value="administrativo">Administrativo</li>
                            <li class="item" data-value="programas">Programas</li>
                        </ul>
                    </div>
                </div>
                <div class="lt-form-row escolha-programa">
                    <label class="lt-form-label" for="ctn_programa">Escolha um programa</label>
                    <div class="lt-form-select">
                        [hidden ctn_programa id:ctn_programa class:lt-form-select-input "nenhum_programa"]
                        <input id="ctn_programa" class="lt-form-select-input" type="hidden" name="ctn_programa" value="">
                        <div class="current">
                            <span class="label">Selecione um programa</span>
                            <div class="icon-wrap">
                                <div class="v-align">
                                    <div class="v-middle">
                                        <i class="icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list">   
                            <li class="item" data-value="mulher_demais">Mulher Demais</li>
                            <li class="item" data-value="manha_correio">Manhã Correio</li>
                            <li class="item" data-value="correio_esporte">Correio Esporte</li>
                        </ul>
                    </div>
                </div>
                <div class="lt-form-row escolha-administrativo" style="display: none;">
                    <label class="lt-form-label" for="ctn_administrativo">Escolha um setor</label>
                    <div class="lt-form-select">
                        [hidden ctn_administrativo id:ctn_administrativo class:lt-form-select-input "nenhum_programa"]
                        <input id="ctn_administrativo" class="lt-form-select-input" type="hidden" name="ctn_administrativo" value="">
                        <div class="current">
                            <span class="label">Selecione um setor</span>
                            <div class="icon-wrap">
                                <div class="v-align">
                                    <div class="v-middle">
                                        <i class="icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list">   
                            <li class="item" data-value="financeiro">Financeiro</li>
                            <li class="item" data-value="compra">Setor Compra</li>
                            <li class="item" data-value="ouvidoria">Ouvidoria</li>
                        </ul>
                    </div>
                </div>
                <div class="lt-form-row">
                    <label class="lt-form-label" for="ctn_assunto">Assunto</label>
                    <input id="ctn_assunto" class="lt-form-input" type="text" name="ctn_assunto">
                </div>
                <div class="lt-form-row">
                    <label class="lt-form-label" for="ctn_mensagem">Sua mensagem</label>
                    <textarea id="ctn_mensagem" class="lt-form-textarea" name="ctn_mensagem"></textarea>
                </div>
                <div class="lt-form-row">
                    <label class="lt-form-label" for="ctn_nome">Seu nome</label>
                    <input id="ctn_nome" class="lt-form-input" type="text" name="ctn_nome">
                </div>
                <div class="lt-form-row">
                    <label class="lt-form-label" for="ctn_email">Seu e-mail</label>
                    <input id="ctn_email" class="lt-form-input" type="email" name="ctn_email">
                </div>
                <div class="lt-form-row">
                    <button class="lt-send lt-form-submit" type="submit">Enviar <i class="icon"></i></button>
                </div>
            </form>-->
            <?php $endereco = get_field('contato_endereco'); ?>
            <div class="contact-map">
                <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
                <div class="map" id="map" data-lat="<?php echo esc_attr($endereco['lat']); ?>" data-lng="<?php echo esc_attr($endereco['lng']); ?>">
                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.026900739485!2d-34.87803700000001!3d-7.122880000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ace809ee641883%3A0xdac866d0fd948888!2sSistema+Correio+de+Comunica%C3%A7%C3%A3o!5e0!3m2!1spt-BR!2sbr!4v1418482404803" width="502" height="407" frameborder="0" style="border:0"></iframe>-->
                </div>
                <div class="info v-align">
                    <div class="icon-wrap place v-middle">
                        <i class="icon"></i>
                    </div>
                    <div class="content-wrap v-middle">
                        <?php echo $endereco['address']; ?>
                    </div>
                    <div class="icon-wrap phone v-middle">
                        <i class="icon"></i>
                    </div>
                    <div class="content-wrap v-middle">
                        <?php while (have_rows('contato_telefones')): the_row(); ?>
                            <?php the_sub_field('contato_telefones_telefone'); ?><br />
                            <?php endWhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs widget -->
    <section class="lt-programs-widget section col-10 center">
        <div class="lt-widget-title">Programas</div>
        <div class="lt-programs-slides">
            <button class="lt-programs-slides-nav lt-programs-slides-prev">
                <span class="v-align">
                    <span class="v-middle">
                        <span class="icon">Recuar</span>
                    </span>
                </span>
            </button>
            <div class="lt-programs-slides-wrap">
                <ul class="lt-programs-slides-list">
                    <?php $list = _wp_get_sites(array('public' => '1', 'orderby' => 'domain ASC, path ASC', 'offset' => '1')); ?>
                    <?php foreach ($list as $site): switch_to_blog($site['blog_id']); ?>
                        <li class="lt-programs-slides-item">
                            <a class="lt-programs-slides-link" href="<?php echo home_url(); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <div class="program">
                                    <!-- Alterar a propriedade border-color conforme a cor do programa -->
                                    <div class="border" style="border-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;"></div>
                                    <img class="logo" src="<?php echo get_theme_mod('logo_setting'); ?>" width="95" height="95" alt="">
                                    <?php echo wp_get_attachment_image(get_custom_header()->attachment_id, 'thumb-163', false, array('class' => 'thumb')); ?>
                                </div>
                            </a>
                        </li>
                        <?php
                        restore_current_blog();
                    endForeach;
                    ?>
                </ul>
            </div>
            <button class="lt-programs-slides-nav lt-programs-slides-next">
                <span class="v-align">
                    <span class="v-middle">
                        <span class="icon">Avançar</span>
                    </span>
                </span>
            </button>
        </div>
    </section>
    <style type="text/css">
        /*.escolha-programa {display:none;}*/
        /*.escolha-administrativo{display:none;}*/
    </style>
    <script type="text/javascript">
        (function($) {
            $(function() {
                $(".escolha-setor .list .item").click(function() {

                    if ($(this).attr("data-value") == "administrativo") {
                        $(".escolha-administrativo").show();
                        $(".escolha-programa").hide();
                        console.log("adm");
                    } else if ($(this).attr("data-value") == "programas") {
                        $(".escolha-programa").show();
                        $(".escolha-administrativo").hide();
                        console.log("prog")
                    }
                });
            });
        })(jQuery);
    </script>
</div>
<?php get_footer(); ?>