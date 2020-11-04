<?php
get_header();
the_post();
?>
<!-- Wrapper -->
<div class="wrapper institutional">

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
                <h1 class="title v-middle">Líder de audiência</h1>
            </div>
        </div>
    </div>

    <div class="institutional-content">
        <div class="institutional-content-wrap col-10 center">
            <h2 class="title"><?php the_field('institucional_titulo'); ?></h2>
            <p class="phar"><?php echo get_the_content(); ?></p>
        </div>
    </div>

    <!-- <section class="institutional-pannel">
        <div class="pannel-border top"></div>
        <div class="v-align">
            <div class="v-middle">
                <div class="pannel-wrap col-10 center">
                    <?php
                    $iamgem_lideranca = get_field('institucional_imagem_lideranca');
                    print_r($iamgem_lideranca);

                    echo wp_get_attachment_image($iamgem_lideranca["ID"], "large");
                    ?>

                    <h2 class="title">Liderança absoluta na<br>programação local</h2>
                    <div class="content">
                        <div class="v-align">
                            <p class="hour increase v-middle">
                                <i class="icon"></i>
                                <span class="v-align">
                                    <span class="label v-middle">
                                        <span class="h">63</span>
                                        <span class="l">horas</span>
                                    </span>
                                    <span class="value v-middle">
                                        Quantidade de horas mensais em que a programação local fica em <b>primeiro lugar</b>.
                                    </span>
                                </span>
                            </p>
                            <div class="icon v-middle">
                                <div class="icon-wrap">
                                    <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-time.svg" alt="Hora">
                                </div>
                            </div>
                            <p class="hour decrease v-middle">
                                <i class="icon"></i>
                                <span class="v-align">
                                    <span class="label v-middle">
                                        <span class="h">25</span>
                                        <span class="l">horas</span>
                                    </span>
                                    <span class="value v-middle">
                                        Quantidade de horas mensais em que outra emissora fica no ar.
                                    </span>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pannel-border bottom"></div>
    </section> -->

    <!-- Map -->
    <div class="instituional-map col-10 center">
        <h2 class="title"><?php the_field('institucional_titulo_do_mapa') ?></h2>
        <script type="text/javascript">
     
        <?php
        //gera o array de cidade com sinais;
        //as cidades serao marcardas no mapa com a funcao map() no main.js
        $regioes = get_field('institucional_regioes');
        echo "var cidades_com_sinal =[";
        foreach ($regioes as $regiao):
            foreach ($regiao["instituicao_regioes_cidades"] as $cidade):
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
                        <p class="description"><?php the_field("institucional_cobertura_texto"); ?></p>
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
                            $cobertura_dados = get_field("institucional_cobertura_dados");
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
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Programs widget -->
    <div class="instituional-programs">
        <div class="col-10 center">
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

</div>
<?php get_footer(); ?>
<?php /* ?>
  <script type="text/javascript">

  (function($) {
  $(document).ready(function() {
  var cidades_com_sinal = [];
  <?php
  $regioes = get_field('institucional_regioes');
  echo "cidades_com_sinal =[";
  foreach ($regioes as $regiao):
  foreach ($regiao["instituicao_regioes_cidades"] as $cidade):
  $cidades[] = "'$cidade'";
  endforeach;
  endforeach;
  echo implode(",", $cidades);
  echo "];";
  ?>
  var url = "<?php echo get_template_directory_uri(); ?>/public/img/map.svg";

  $('.lt-map .lt-map-content').load(url, null, function() {
  $('.lt-map .lt-map-content').find('g.city').each(function() {

  if (cidades_com_sinal.indexOf($(this).attr("id")) > -1) {
  $(this).find('path').css('fill', '#e8e8e8');
  }

  });
  });
  });
  })(jQuery);
  </script>
 */ ?>
 