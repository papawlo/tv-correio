<?php get_header(); ?>
<!-- Wrapper -->
<section class="wrapper comercial">
    <?php if (get_field('comercial_galeria')): ?>
        <section class="comercial-pannel">
            <button class="comercial-pannel-nav prev">
                <i class="icon">
                    <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-left-o.svg" alt="Recuar">
                </i>
            </button>
            <button class="comercial-pannel-nav next">
                <i class="icon">
                    <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-right-o.svg" alt="Avançar">
                </i>
            </button>
            <div class="comercial-pannel-slides">
                <div class="comercial-pannel-slides-wrap">
                    <?php
                    foreach (get_field('comercial_galeria') as $image):
                        echo wp_get_attachment_image($image['ID'], 'thumb-375x270', false, array('class' => 'slide'));
                    endForeach;
                    ?>                  
                </div>
            </div>
        </section>
        <?php endIf; ?>

<!--    <section class="comercial-signin">
    <form class="signin-form" method="" action="">
        <div class="signin-row">
            <h2 class="open-signin-alert signin-title">
                <i class="icon">
                    <img src="public/img/icon-alert.svg" alt="Alerta">
                </i> Área restrita
            </h2>
        </div>
        <div class="signin-row has-link">
            <input class="signin-input" type="text" name="" placeholder="Login">
        </div>
        <div class="signin-row link">
            <a class="open-signup-form signin-link" href="javascript:;" title="Cadatre-se">Cadatre-se</a>
        </div>
        <div class="signin-row has-link">
            <input class="signin-input" type="password" name="" placeholder="Senha">
        </div>
        <div class="signin-row link">
            <a class="signin-link" href="" title="Esqueci minha senha">Esqueci minha senha</a>
        </div>
        <div class="signin-row has-submit">
            <button class="signin-submit" type="submit">
                <i class="icon">
                    <img src="public/img/icon-right-s.svg" alt="Enviar">
                </i>
            </button>
        </div>
    </form>

    <div class="signin-alert">
        <div class="v-align">
            <p class="alert-label v-middle">Área destinada a empresas e representantes comerciais.</p>
            <div class="alert-close v-middle">
                <button class="close-button">
                    <i class="close-signin-alert close-icon">
                        <img src="public/img/icon-close.svg" alt="Fechar">
                    </i>
                </button>
            </div>
        </div>
    </div>

    <form class="signup-form" method="" action="">
        <div class="signup-head">
            <button class="close-signup-form signup-close">
                <i class="icon">
                    <img src="public/img/icon-close.svg" alt="Fechar">
                </i>
            </button>
            <h2 class="signup-title">Preencha o formulário</h2>
            <h3 class="signup-subtitle">Informe seus dados</h3>
        </div>
        <div class="signup-body">
            <div class="signup-row">
                <label class="signup-label" for="#sgnup_nome">Nome da empresa (agência)</label>
                <input id="sgnup_nome" class="signup-input" type="text" name="sgnup_nome">
            </div>
            <div class="signup-row">
                <label class="signup-label" for="#sgnup_email">E-mail</label>
                <input id="sgnup_email" class="signup-input" type="email" name="email">
            </div>
            <div class="signup-row">
                <label class="signup-label" for="#sgnup_senha">Senha</label>
                <input id="sgnup_senha" class="signup-input" type="password" name="sgnup_senha">
            </div>
            <div class="signup-row">
                <label class="signup-label" for="#sgnup_responsavel">Nome do responsável comercial</label>
                <input id="sgnup_responsavel" class="signup-input" type="text" name="sgnup_responsavel">
            </div>
            <div class="signup-row">
                <label class="signup-label" for="#sgnup_telefone">Telefone</label>
                <input id="sgnup_telefone" class="signup-input" type="text" name="sgnup_telefone">
            </div>
            <div class="signup-row">
                <label class="signup-label" for="#sgnup_senha_o">Confirmar senha</label>
                <input id="sgnup_senha_o" class="signup-input" type="password" name="sgnup_senha_o">
            </div>
        </div>
        <div class="signup-body">
            <h3 class="signup-subtitle">Informe seu endereço</h3>
            <div class="signup-row">
                <label class="signup-label" for="#sgnup_rua">Rua</label>
                <input id="sgnup_rua" class="signup-input" type="text" name="sgnup_rua">
            </div>
            <div class="signup-row">
                <label class="signup-label" for="#sgnup_estado">Estado</label>
                <input id="sgnup_estado" class="signup-input" type="text" name="sgnup_estado">
            </div>
            <div class="signup-row">
                <label class="signup-label" for="#sgnup_cep">CEP</label>
                <input id="sgnup_cep" class="signup-input" type="text" name="sgnup_cep">
            </div>
            <div class="signup-row">
                <label class="signup-label" for="#sgnup_site">Site</label>
                <input id="sgnup_site" class="signup-input" type="text" name="sgnup_site">
            </div>
            <div class="signup-row">
                <button class="lt-send signup-submit" type="submit">
                    Enviar dados <i class="icon">
                        <img src="public/img/icon-send.svg" alt="Enviar">
                    </i>
                </button>
            </div>
        </div>
    </form>

    <div class="signin-border"></div>
</section>-->

    <section class="comercial-advantages">
        <p class="comercial-advantages-description">Afiliada da Rede Record na Paraíba, a Tv Correio leva ao telespectador uma programação versátil que tem garantido altos níveis de audiência.</p>

        <ul class="comercial-advantages-list">
            <li class="comercial-advantages-item">
               <a href="<?php the_field("comercial_apresentacao"); ?>" target="_blank" title="Aprsentação Comercial">
                <div class="card v-align">
                    <div class="v-middle">
                        <div class="card-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-briefcase.svg" alt="maleta">                                
                        </div>
                        <p class="card-description">Apresentação<br>Comercial</p>
                    </div>
                </div>
                </a>
            </li>
            <li class="comercial-advantages-item">
               <a href="<?php the_field("comercial_calendario"); ?>" target="_blank" title="Calendário Anual de Projetos">
                <div class="card v-align">
                    <div class="v-middle">
                        <div class="card-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-graph.svg" alt="gráfico">                                
                        </div>
                        <p class="card-description">Calendário Anual<br>de Projetos</p>
                    </div>
                </div>
                </a>
            </li>
            <li class="comercial-advantages-item">
                <a href="<?php the_field("comercial_projetos_especiais"); ?>" target="_blank" title="Projetos de Oportunidade">
                <div class="card v-align">
                    <div class="v-middle">
                        <div class="card-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-heart.svg" alt="coração">
                        </div>
                        <p class="card-description">Projetos de<br>Oportunidade</p>
                    </div>
                </div>
                </a>
            </li>
<!--
            <li class="comercial-advantages-item">
                <div class="card v-align">
                    <div class="v-middle">
                        <div class="card-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-stats.svg" alt="status">
                        </div>
                        <p class="card-description">Tabela<br>de Preços</p>
                    </div>
                </div>
            </li>
-->
        </ul>
        <div class="comercial-advantages-content">
            <h2>Tv Correio. Do jeito que a Paraíba gosta.</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam laoreet condimentum aliquet. Suspendisse potenti. Pellentesque interdum nisi vitae arcu maximus, id malesuada nisi aliquet. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce sed dictum ex. Proin feugiat lacinia tempor. Duis dictum leo vel enim malesuada, et maximus turpis dictum. Ut sed tempor nisi. Proin hendrerit id sem vel eleifend. Etiam lectus urna, scelerisque vitae eleifend sed, vehicula quis velit. Sed sed aliquam odio. Nullam condimentum venenatis eleifend. Etiam iaculis hendrerit odio, nec fringilla risus rutrum non. Cras vitae lorem felis. Cras vitae diam vitae enim consequat auctor. Proin luctus eros in elit feugiat lobortis.</p>
        </div>
    </section>



    <!-- Programs slides widget -->
    <?php get_template_part('../programas', 'footer-mobile'); ?>   

</section>

<?php get_footer(); ?>