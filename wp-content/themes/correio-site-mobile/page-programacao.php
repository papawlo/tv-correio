<?php get_header(); ?>

<style type="text/css">
    .cycle-slideshow { width: 100% ;height: auto}
    .cycle-slideshow .item-dia { width: 100%; height: auto }
    .cycle-slideshow .item-dia .program{ height: 188px;}

</style>
<!-- Wrapper -->
<section class="wrapper programation">

    <!-- Content -->
    <?php
    $timeSemanal = array(
        strtotime("Sunday last week"),
        strtotime("Monday this week"),
        strtotime("Tuesday this week"),
        strtotime("Wednesday this week"),
        strtotime("Thursday this week"),
        strtotime("Friday this week"),
        strtotime("Saturday this week")
    );
    ?>
    <section class="content programation-content cycle-slideshow"  data-cycle-fx="fade" data-cycle-slides=".item-dia" data-starting-slide="0" data-cycle-timeout="0" data-cycle-prev=".programation-nav-link.prev" data-allow-wrap="false" data-cycle-next=".programation-nav-link.next">
        <!--<div class="cycle-slideshow"  data-cycle-fx="fade" data-cycle-slides=".item-dia" data-starting-slide="0" data-cycle-timeout="0" data-cycle-prev=".programation-nav-link.prev" data-allow-wrap="false" data-cycle-next=".programation-nav-link.next">-->
        <?php foreach ($timeSemanal as $k => $time): ?>
            <div class="item-dia">
                <div class="programation-head">
                    <h2 class="programation-title">Programação semanal</h2>

                    <div class="v-time v-align">
                        <div class="v-middle">
                            <p class="programation-time"><?php echo date_i18n("D", $time); ?> <b><?php echo date_i18n("d M", $time); ?></b></p>
                        </div>
                        <div class="v-nav v-middle">
                            <div class="programation-nav">
                                <a class="programation-nav-link prev" href="" title="">
                                    <i class="icon">
                                        <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-left.svg" alt="Recuar">
                                    </i>
                                </a>
                                <a class="programation-nav-link next" href="" title="">
                                    <i class="icon">
                                        <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-right.svg" alt="Avançar">
                                    </i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="programation-body">
                    <?php while (have_rows('programacao_' . $k)): the_row(); ?>
                        <?php
                        $timeInicio = strtotime(date('Y-m-d ' . get_sub_field('programacao_horario_inicio')));
                        $timeFim = strtotime(date('Y-m-d ' . get_sub_field('programacao_horario_termino')));
                        $time = time() + get_option('gmt_offset') * 3600;
                        ?>
                        <div class="program">
                            <?php
                            $site_url;
                            if (get_sub_field('programacao_tipo') == 'Convencional') {
                                switch_to_blog(get_sub_field('programacao_programa'));
                                $color = get_theme_mod('color_setting', '#FFB416');
                                $logo = get_theme_mod('logo_setting');
                                $imagem = wp_get_attachment_image(get_custom_header()->attachment_id, 'thumb-234x145', false, array("class" => "image"));
                                $programa = get_bloginfo('name');
                                $site_url = get_blog_details(get_sub_field('programacao_programa'))->siteurl;
//                                print_r($site_url);
//                                exit;
                                restore_current_blog();
                            } else {
                                $color = '#FFB416';
                                $logo = get_sub_field('programacao_logo');
                                $imagem = wp_get_attachment_image(get_sub_field('programacao_imagem'), 'thumb-234x145', false, array("class" => "image"));
                                $programa = get_sub_field('programacao_nome')->siteurl;
                            }
                            ?>
                            <div class="program-hour lt-headline-label" style="background:<?php echo $color; ?>;"><?php echo strftime('%Hh%M', $timeInicio); ?></div>
                            <div class="program-wrap">
                                <a class="program-logo" href="<?php echo $site_url; ?>" title="<?php echo $programa; ?>">
                                    <span class="program-logo-wrap">
                                        <span class="border" style="border-color:<?php echo $color; ?>;"></span>                                            
                                        <img class="image" src="<?php echo $logo; ?>" width="76" height="76" alt="Logo">
                                        <!--<img class="image" src="http://placehold.it/76x76" alt="">-->
                                    </span>
                                </a>
                                <a class="program-thumb" href="<?php echo $site_url; ?>" title="<?php echo $programa; ?>">
                                    <!--<img class="image" src="http://placehold.it/234x145" alt="">-->
                                    <?php echo $imagem; ?>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <!--fim body-->
            </div>
            <!--fim item-dia-->
            <?php endForeach; ?>
        <!--</div>-->
    </section>
    <!-- Programs widget -->
    <?php get_template_part('../programas', 'footer-mobile'); ?>
</section>
<?php get_footer(); ?>