<!--Section Programas Widget-->
<section class="lt-programs-widget">
    <div class="lt-top-videos-title lt-widget-title-wrap">
        <h3 class="lt-widget-title">Programas</h3>
    </div>

    <div class="lt-programs-slides">
        <button class="lt-programs-slides-nav lt-programs-slides-prev">
            <span class="v-align">
                <span class="v-middle">
                    <i class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-left.svg" alt="Recuar">
                    </i>
                </span>
            </span>
        </button>
        <div class="lt-programs-slides-wrap">
            <ul class="lt-programs-slides-list">
                <?php $list = _wp_get_sites(array('public' => '1', 'orderby' => 'domain ASC, path ASC', 'offset' => '1')); ?>
                <?php foreach ($list as $site): switch_to_blog($site['blog_id']); ?>

                <?php 
                    $test = esc_attr(get_bloginfo('name'));
                    if($test != 'TV Correio'):
                 ?>
                    <li class="lt-programs-slides-item">
                        <a class="lt-programs-slides-link" href="<?php echo home_url(); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            <div class="program">
                                <!-- Alterar a propriedade border-color conforme a cor do programa -->
                                <div class="border" style="border-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;"></div>
                                <img class="logo" src="<?php echo get_theme_mod('logo_setting'); ?>" width="90" height="90" alt="">
                                <?php echo wp_get_attachment_image(get_custom_header()->attachment_id, 'thumb-170', false, array('class' => 'thumb')); ?>
                            </div>
                        </a>
                    </li>
                <?php endif; ?>
                    <?php restore_current_blog();
                endForeach;
                ?>
            </ul>
        </div>
        <button class="lt-programs-slides-nav lt-programs-slides-next">
            <span class="v-align">
                <span class="v-middle">
                    <i class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-right.svg" alt="Avançar">
                    </i>
                </span>
            </span>
        </button>
    </div>
</section>
<!-- FIM Section Programas Widget-->