<!-- Footer -->
<footer class="footer">
    <div class="border"></div>

    <!-- Content -->
    <aside class="col-10 center">
        <!-- Main menu -->
        <section class="footer-widget">
            <nav class="footer-menu">
                <ul class="footer-list">
                    <li class="footer-item">
                        <a class="link" href="<?php echo network_site_url('/institucional/'); ?>" title="Institucional">Institucional</a>
                    </li>
                    <li class="footer-item">
                        <a class="link" href="<?php echo network_site_url('/comercial/'); ?>" title="Comercial">Comercial</a>
                    </li>
                    <li class="footer-item">
                        <a class="link" href="<?php echo network_site_url('/programacao/'); ?>" title="Programação">Programação</a>
                    </li>
                    <li class="footer-item">
                        <a class="link" href="<?php echo network_site_url('/noticias/'); ?>" title="Notícias">Notícias</a>
                    </li>
                    <li class="footer-item">
                        <a class="link" href="<?php echo network_site_url('/contato/'); ?>" title="Contato">Contato</a>
                    </li>
                </ul>
            </nav>
        </section>

        <!-- Programs menu -->
        <section class="footer-widget">
            <nav class="footer-menu">
                <ul class="footer-list">
                    <li class="footer-item">
                        <a class="link" href="" title="Programas">Programas</a>
                        <ul class="footer-sublist">
                            <?php $list = _wp_get_sites(array('public' => '1', 'orderby' => 'domain ASC, path ASC')); ?>                            
                            <?php foreach ($list as $site): switch_to_blog($site['blog_id']); ?>
                                <li class="footer-subitem">
                                    <a class="sublink" href="<?php echo home_url(); ?>" title="<?php echo esc_attr(bloginfo('name')); ?>"><?php echo bloginfo('name'); ?></a>
                                </li>
                                <?php
                                restore_current_blog();
                            endForeach;
                            ?>
                        </ul>
                    </li>
                </ul>
                <!--<?php $list = _wp_get_sites(array('public' => '1', 'orderby' => 'domain ASC, path ASC', 'offset' => '1')); ?>
                <?php foreach ($list as $site): switch_to_blog($site['blog_id']); ?>
                                            <li class="item" data-value="<?php echo esc_attr(bloginfo('name')); ?>"><?php bloginfo('name'); ?></li>
                    <?php
                    restore_current_blog();
                endForeach;
                ?>-->
            </nav>
        </section>

        <!-- Facebook like box -->
        <section class="footer-widget">
            <div class="fb-like-box" data-href="https://www.facebook.com/TVCorreio" data-width="300" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
        </section>

        <!-- Logos -->
        <section class="footer-widget footer-logo">
            <ul class="footer-logo-list">
                <li class="footer-logo-item">
                    <a class="link correio" href="<?php echo network_home_url(); ?>" title="TV Correio">TV Correio</a>
                </li>
                <li class="footer-logo-item">
                    <a class="link record" target="_blank" href="http://rederecord.r7.com/" title="Record">Record</a>
                </li>
            </ul>
        </section>

        <p class="info-site"><a class="icon-site" href="http://www.qualitare.com/" target="_blank" title="Feito com Qualitare"></a></p>
    </aside>
</footer>

<?php wp_footer(); ?>
<div id="fb-root"></div>
<script type="text/javascript">(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=603571266385074&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>