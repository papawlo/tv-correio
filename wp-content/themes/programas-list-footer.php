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
        <?php restore_current_blog();
    endForeach;
    ?>
</ul>