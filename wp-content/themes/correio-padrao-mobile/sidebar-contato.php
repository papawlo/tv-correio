<aside class="sidebar">
    <section class="program-contact sidebar-widget">
        <div class="card">
            <a href='<?php echo network_site_url('/contato/'); ?>'>
                <div class="icon-wrap" style="border-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;stroke:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;" >
                    <i class="icon message">
                        <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-message.svg" alt="Fale conosco">
                    </i>
                </div>
                <p class="label">Envie uma mensagem<br>para o nosso programa</p>
            </a>
        </div>
        <div class="card">
            <a href='<?php echo network_site_url('/comercial/'); ?>'>
                <div class="icon-wrap" style="border-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;stroke:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;">
                    <i class="icon ad">
                        <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-ad.svg" alt="Anuncie conosco">
                    </i>
                </div>
                <p class="label">Anuncie no nosso<br>programa</p>
            </a>
        </div>
    </section>
</aside>