<!-- Footer -->
<footer class="footer">
    <div class="border"></div>

    <aside class="footer-sidebar">
        <section class="footer-logo">
            <ul class="footer-logo-list">
                <li class="footer-logo-item">
                    <a class="link correio" href="<?php echo network_home_url(); ?>" title="TV Correio">
                        <img src="<?php echo get_template_directory_uri(); ?>/public/img/correio-logo.png" alt="TV Correio">
                    </a>
                </li>
                <li class="footer-logo-item">
                    <a class="link record" target="_blank" href="http://rederecord.r7.com/" title="Record">
                        <img src="<?php echo get_template_directory_uri(); ?>/public/img/record-logo.png" alt="Record">
                    </a>
                </li>
            </ul>
        </section>

        <section class="footer-menu">
            <nav class="footer-nav">
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