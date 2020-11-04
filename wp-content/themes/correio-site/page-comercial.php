<?php get_header(); ?>
<!-- Wrapper -->
<div class="wrapper comercial">
   <!-- <?php //if (get_field('comercial_galeria')): ?>
        <section class="comercial-slides">
            <button class="comercial-slides-nav comercial-slides-nav-prev prev">
                <i class="icon"></i>
            </button>
            <button class="comercial-slides-nav comercial-slides-nav-next next">
                <i class="icon"></i>
            </button>
            <div class="comercial-slides-wrap">
                <?php
                //foreach (get_field('comercial_galeria') as $image):
                    //echo wp_get_attachment_image($image['ID'], 'thumb-1920x499', false, array('class' => 'slide'));
                //endForeach;
                ?>
            </div>
        </section>
        <?php //endIf; ?>
    <?php //if (!is_user_logged_in()): ?> -->

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
                    <h1 class="title v-middle">Investimento garantido. Retorno de verdade.</h1>
                </div>
            </div>
        </div>
        <!--<section class="comercial-signin">
                <form class="signin-form col-10 center" method="" action="">
                        <div class="signin-col">
                                <div class="signin-row">
                                        <h2 class="open-signin-alert signin-title"><i class="icon"></i> Área restrita</h2>
                                </div>
                        </div>
                        <div class="signin-col">
                                <div class="signin-row">
                                        <input class="signin-input" type="text" name="" placeholder="Login">
                                </div>
                                <div class="signin-row link">
                                        <a class="open-signup-form signin-link" href="javascript:;" title="Cadastre-se">Cadastre-se</a>
                                </div>
                        </div>
                        <div class="signin-col">
                                <div class="signin-row">
                                        <input class="signin-input" type="password" name="" placeholder="Senha">
                                </div>
                                <div class="signin-row link">
                                        <a class="signin-link" href="" title="Esqueci minha senha">Esqueci minha senha</a>
                                </div>
                        </div>
                        <div class="signin-col">
                                <div class="signin-row">
                                        <button class="signin-submit" type="submit">
                                                <i class="icon"></i>
                                        </button>
                                </div>
                        </div>
                </form>
                
                <div class="signin-alert">
                        <div class="col-10 center v-align">
                                <div class="alert-icon v-middle">
                                        <div class="icon-wrap">
                                                <i class="icon"></i>
                                        </div>
                                </div>
                                <p class="alert-label v-middle">Área destinada a empresas e representantes comerciais que desejem obter informações sobre valores e realizar contato profissional conosco.</p>
                                <div class="close-signin-alert alert-close v-middle">
                                        <button class="close-button">
                                                <i class="close-signin-alert close-icon"></i>
                                        </button>
                                </div>
                        </div>
                </div>
                <form class="signup-form" method="" action="">
                        <div class="col-7 center">
                                <div class="signup-head">
                                        <button class="close-signup-form signup-close">
                                                <i class="icon"></i>
                                        </button>
                                        <h2 class="signup-title">Preencha o formulário</h2>
                                        <h3 class="signup-subtitle">Informe seus dados</h3>
                                </div>
                                <div class="signup-body">
                                        <div class="signup-col">
                                                <div class="signup-row">
                                                        <label class="signup-label" for="#sgnup_nome">Nome da empresa (agência)</label>
                                                        <input id="sgnup_nome" class="signup-input" type="text" name="sgnup_nome">
                                                </div>
                                                <div class="signup-row">
                                                        <label class="signup-label" for="#sgnup_email">E-mail</label>
        <?php //echo do_shortcode('[wpmem_field field=user_email]'); ?>
                                                        <input id="sgnup_email" class="signup-input" type="email" name="email">
                                                </div>
                                                <div class="signup-row">
                                                        <label class="signup-label" for="#sgnup_senha">Senha</label>
                                                        <input id="sgnup_senha" class="signup-input" type="password" name="sgnup_senha">
                                                </div>
                                        </div>
                                        <div class="signup-col">
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
                                </div>
                                <div class="signup-body">
                                        <h3 class="signup-subtitle">Informe seu endereço</h3>
                                        <div class="signup-col">
                                                <div class="signup-row">
                                                        <label class="signup-label" for="#sgnup_rua">Rua</label>
                                                        <input id="sgnup_rua" class="signup-input" type="text" name="sgnup_rua">
                                                </div>
                                                <div class="signup-row">
                                                        <label class="signup-label" for="#sgnup_estado">Estado</label>
                                                        <input id="sgnup_estado" class="signup-input" type="text" name="sgnup_estado">
                                                </div>
                                        </div>
                                        <div class="signup-col">
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
                                                                Enviar dados <i class="icon"></i>
                                                        </button>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </form>

                <div class="signin-border"></div>
        </section>
        <?php //endIf; ?>-->

    <section class="comercial-advantages col-10 center">
        <p class="comercial-advantages-description">Afiliada da Rede Record na Paraíba, a Tv Correio leva ao telespectador uma programação versátil que tem garantido altos níveis de audiência.</p>

        <ul class="comercial-advantages-list">
            <li class="comercial-advantages-item">
                <a href="<?php the_field("comercial_apresentacao"); ?>" target="_blank" title="Aprsentação Comercial">
                    <div class="card v-align">
                        <div class="v-middle">
                            <img class="card-icon" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-briefcase.svg" alt="">
                            <p class="card-description">Apresentação<br>Comercial</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="comercial-advantages-item">
                <a href="<?php the_field("comercial_calendario"); ?>" target="_blank" title="Calendário Anual de Projetos">
                    <div class="card v-align">
                        <div class="v-middle">
                            <img class="card-icon" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-graph.svg" alt="">
                            <p class="card-description">Calendário Anual<br>de Projetos</p>
                        </div>
                    </div>
                </a>
            </li>
		<li class="comercial-advantages-item">
              <a href="<?php the_field("comercial_projetos_especiais"); ?>" target="_blank" title="Projetos de Oportunidade">
              <div class="card v-align">
              <div class="v-middle">
              <div class="card-icon"><img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-heart.svg" alt="coração"></div>
              <p class="card-description">Projetos de<br>Oportunidade</p>
              </div>
              </div>
              </a>
              </li>
            <?php /*
              <li class="comercial-advantages-item">
              <a href="<?php the_field("comercial_projetos_especiais"); ?>" target="_blank" title="Projetos Especials">
              <div class="card v-align">
              <div class="v-middle">
              <div class="card-icon"><img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-heart.svg" alt=""></div>
              <p class="card-description">Projetos<br>Especiais</p>
              </div>
              </div>
              </a>
              </li>
              <li class="comercial-advantages-item">
              <?php if(is_user_logged_in()): ?>
              <a href="<?php the_field("comercial_precos"); ?>" target="_blank" title="">
              <div class="card v-align">
              <div class="v-middle">
              <img class="card-icon" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-stats.svg" alt="">
              <p class="card-description">Tabela<br>de Preços</p>
              </div>
              </div>
              </a>
              <?php else: ?>
              <div class="card v-align">
              <div class="v-middle" style="opacity: 0.3;">
              <img class="card-icon" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-stats.svg" alt="">
              <p class="card-description">Tabela<br>de Preços</p>
              </div>
              </div>
              <?php endIf; ?>
              </li> */ ?>
        </ul>
    </section>

    <div class="comercial-map col-10 center">
        <h4 class="lt-widget-title"><?php the_field('comercial_mapa_titulo_do_mapa') ?></h4>
        <script type="text/javascript">
            var cidades_com_sinal = [];
<?php
//gera o array de cidade com sinais;
//as cidades serao marcardas no mapa com a funcao map() no main.js
$regioes = get_field('comercial_mapa_regioes');

echo "var cidades_com_sinal =[";
foreach ($regioes as $regiao):
    foreach ($regiao["comercial_mapa_regioes_cidades"] as $cidade):
        $cidades[] = "'$cidade'";
    endforeach;
endforeach;
echo implode(",", $cidades);
echo "];";
?>
        </script>
        <section class="lt-map">
            <div class="lt-map-widget">
                <div class="lt-map-widget-wrap">
                    <p class="g-city-name"></p>
                    <p class="g-city-population">População: <b></b></p>
                </div>
                <i class="close-lt-map-widget close-icon"></i>
            </div>
            <div class="lt-map-content" data-cidades="<?php echo get_template_directory_uri(); ?>/public/js/cidades.json">
                <img class="map-image" src="<?php echo get_template_directory_uri(); ?>/public/img/map.svg" alt="Mapa da Paraíba">
            </div>
            <div class="lt-map-info">
                <div class="lt-map-info-row">
                    <i class="icon"></i>
                    <div class="info-wrapper">
                        <p class="description"><?php the_field("comercial_mapa_cobertura"); ?></p>
                    </div>
                </div>
                <div class="lt-map-info-row">
                    <i class="icon"></i>
                    <div class="info-wrapper">
                        <table class="table">
                            <thead class="table-head">
                                <tr class="table-head-line">
                                    <th class="table-head-column a">Informações</th>
                                    <th class="table-head-column b">Quantidade de municípios</th>
                                    <th class="table-head-column">População</th>
                                    <th class="table-head-column">População com TV</th>
                                    <th class="table-head-column">Domicílios</th>
                                    <th class="table-head-column">Domicílios com TV</th>
                                    <th class="table-head-column">IPC</th>
                                </tr>
                            </thead>
                            <?php
                            $cobertura_dados = get_field("comercial_mapa_dados");
                            ?>
                            <tbody class="table-body">
                                <?php foreach ($cobertura_dados as $dados) : ?>
                                    <tr class="table-body-line">
                                        <?php foreach ($dados as $dado) : ?>
                                            <td class="table-body-column"><?php echo $dado; ?></td>
                                        <?php endforeach; ?>                               
                                    </tr>
                                <?php endforeach; ?>                               
                            </tbody>
<!--                            <tbody class="table-body">
                                <tr class="table-body-line">
                                    <td class="table-body-column">Paraíba</td>
                                    <td class="table-body-column">223</td>
                                    <td class="table-body-column">3.802.054</td>
                                    <td class="table-body-column">3.701.494</td>
                                    <td class="table-body-column">1.094.955</td>
                                    <td class="table-body-column">1.051.934</td>
                                    <td class="table-body-column">1,131</td>
                                </tr>
                                <tr class="table-body-line">
                                    <td class="table-body-column">Cobertura TV Correio / Record - PB</td>
                                    <td class="table-body-column">169</td>
                                    <td class="table-body-column">3.470.186</td>
                                    <td class="table-body-column">3.385.087</td>
                                    <td class="table-body-column">1.001.329</td>
                                    <td class="table-body-column">965.317</td>
                                    <td class="table-body-column">1,094</td>
                                </tr>
                                <tr class="table-body-line">
                                    <td class="table-body-column">Cobertura TV Correio / Record - PB (%)</td>
                                    <td class="table-body-column">76</td>
                                    <td class="table-body-column">91</td>
                                    <td class="table-body-column">91</td>
                                    <td class="table-body-column">91</td>
                                    <td class="table-body-column">92</td>
                                    <td class="table-body-column">97</td>
                                </tr>
                            </tbody>-->
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="comercial-video col-10 center">
        <h4 class="lt-widget-title">Vídeo publicidade</h4>
        <?php
        $iframe = get_field('comercial_video_url');
        preg_match('/src="(.+?)"/', $iframe, $matches);
        $src = $matches[1];
        $params = array(
            'controls' => 0,
            'hd' => 1,
            'autohide' => 1
        );

        $new_src = add_query_arg($params, $src);
        ?>

        <a class="video-link html5lightbox" href="<?php echo $new_src; ?>">
            <span class="icon-wrap">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
            </span>
            <?php
            $video_imagem_id = get_field("comercial_video_imagem");
            echo wp_get_attachment_image($video_imagem_id, 'thumb-1140x450', false, array('class' => 'thumb'));
            ?>
            <!--<img class="thumb" src="http://placehold.it/1140x450" alt="Vídeo publicidade">-->
        </a>
    </section>

    <div class="comercial-programs col-10 center">
        <!-- Programs slides widget -->
        <section class="lt-programs-widget">
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
                    <?php get_template_part('../programas-list', 'footer'); ?>
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
    </div>
</div>
<?php get_footer(); ?>