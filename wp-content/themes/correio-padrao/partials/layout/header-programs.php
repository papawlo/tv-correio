<section class="header-program">
    <!-- Alterar a propriedade border-bottom-color conforme a cor do programa -->
    <div class="header-program-content" style="border-bottom-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>">
        <div class="header-program-logo">
            <div class="col-10 center">
                <a class="header-program-logo-link" href="<?php echo home_url(); ?>">
                    <!-- Alterar a propriedade border-color conforme a cor do programa -->
                    <span class="border" style="border-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;"></span>
                    <img class="header-program-logo-image" src="<?php echo get_theme_mod('logo_setting'); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                </a>
            </div>
        </div>
        <div class="header-program-presentation">
            <img class="image" src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>">
        </div>
    </div>
    <nav class="header-program-menu">
        <!-- Alterar a propriedade color conforme a cor do programa -->
        <ul class="header-program-menu-list col-10 center" style="color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;">
            <div class="v-align">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-programa',
                    'container_class' => 'v-middle',
                    'items_wrap' => '<ul>%3$s</ul>',
                ));
                ?>
            </div>
        </ul>
    </nav>
</section>
</header>