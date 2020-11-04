<?php get_header(); ?>
<!-- Wrapper -->
<div class="wrapper contact">

    <div class="lt-default-banner">
        <div class="v-align">
            <div class="v-middle">
                <i class="icon">
                    <span class="v-align">
                        <span class="v-middle">
                            <img src="<?php echo get_template_directory_uri() ?>/public/img/correio-logo.png" alt="TV Correio">
                        </span>
                    </span>
                </i>
                <h1 class="title">Fale com a<br><strong>Líder de audiência</strong></h1>
            </div>
        </div>
    </div>

    <section class="contact-content">

        <h1 class="title">Mande sua mensagem para a gente</h1>

<?php echo do_shortcode('[contact-form-7 id="465" title="Contato" html_class="password"]'); ?>
        
        <!--<form class="contact-form lt-form" method="" action="">
                <div class="lt-form-row">
                        <label class="lt-form-label" for="ctn_programa">Escolha um programa</label>
                        <div class="lt-form-select">
                                <input id="ctn_programa" class="lt-form-select-input" type="hidden" name="ctn_programa" value="nenhum_programa">
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

            <div class="info">
                <div class="v-align">
                    <i class="icon v-middle">
                        <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-place.svg" alt="Localização">
                    </i>
                    <p class="description v-middle"><?php echo $endereco['address']; ?></p>
                </div>
            </div>
            <div class="info">
                <div class="v-align">
                    <i class="icon v-middle">
                        <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-phone.svg" alt="Telefone">
                    </i>
                    <p class="description v-middle">
                        <?php while (have_rows('contato_telefones')): the_row(); ?>
                            <?php the_sub_field('contato_telefones_telefone'); ?><br />
                            <?php endWhile; ?>
                    </p>
                </div>
            </div>
        </div>        

    </section>

    <!-- Programs widget -->
    <?php get_template_part('../programas', 'footer-mobile'); ?>

</div>
<?php get_footer(); ?>