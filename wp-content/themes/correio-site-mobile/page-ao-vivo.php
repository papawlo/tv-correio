<?php
get_header();
the_post();
?>
<!-- Wrapper -->
<section class="wrapper single">
    <!--Programacao-->
    <?php get_sidebar(); ?>
    <!--FIM Programacao-->


    <!--conteudo-->
    <section class="content">
        <article class="lt-post">
            <header class="lt-post-head">
                <time class="time" pubdate="">
                    <div class="v-align">
                        <i class="icon v-middle">
                            <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-time.svg" alt="Time">
                        </i>
                        <div class="v-middle">
                            <?php the_time('d/m/Y'); ?>
                        </div>
                    </div>
                </time>
                <h1 class="title"><?php the_title(); ?></h1>
                <?php if (has_excerpt()): ?><h2 class="subtitle"><?php echo get_the_excerpt(); ?></h2><?php endif; ?>

                <div class="share">
                    <div class="v-align">
                        <ul class="list v-middle">
                            <li id="facebook-sharrre" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" class="item"><a title="Compartilhe no Facebook" href="javascript:;" class="link"><i class="icon facebook"><img alt="Facebook" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-facebook.svg"></i></a></li>
                            <li id="twitter-sharrre" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" class="item"><a title="Compartilhe no Twitter" href="javascript:;" class="link"><i class="icon twitter"><img alt="Twitter" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-twitter.svg"></i></a></li>
                        </ul>
                        <p class="author v-middle"><?php echo get_the_author(); ?></p>
                    </div>
                </div>
            </header>
            <section class="lt-post-body">
                <script type="text/javascript" src="http://www.crosshost.com.br/dvr/lib/swfobject.js"></script>
                <script type="text/javascript" src="http://www.crosshost.com.br/dvr/lib/ParsedQueryString.js"></script>
                <div id="player">
                    <div id="tvcorreio">

                        <h1>instale o flash player</h1>
                        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
                    </div>
                </div>
                <script type="text/javascript">
                    var pqs = new ParsedQueryString();
                    var parameterNames = pqs.params(false);
                    var parameters = {
                        src: "http://174.37.99.198:1935/dvrid1816/1816/manifest.f4m?DVR",
                        expandedBufferTime: 5,
                        liveBufferTime: 12,
                        liveDynamicStreamingBufferTime: 14,
                        dvrBufferTime: 12,
                        dvrDynamicStreamingBufferTime: 14,
                        dynamicStreamBufferTime: 14,
                        autoPlay: "False",
                        verbose: "false",
                        controlBarAutoHide: "false",
                        controlBarPosition: "bottom"
                    };

                    for (var i = 0; i < parameterNames.length; i++) {
                        var parameterName = parameterNames[i];
                        parameters[parameterName] = pqs.param(parameterName) || parameters[parameterName];
                    }

                    var wmodeValue = "direct";
                    var wmodeOptions = ["direct", "opaque", "transparent", "window"];

                    if (parameters.hasOwnProperty("wmode")) {
                        if (wmodeOptions.indexOf(parameters.wmode) >= 0) {
                            wmodeValue = parameters.wmode;
                        }
                        delete parameters.wmode;
                    }

                    swfobject.embedSWF(
                            "http://sitescorreio.com.br/dominios/tvcorreio/StrobeMediaPlayback.swf", "tvcorreio", 290, 251, "10.3.0", "ExpressInstall.swf", parameters, {allowFullScreen: "true", wmode: wmodeValue}, {name: "StrobeMediaPlayback"}
                    );
                </script>
                <style type="text/css">
                    #player {
                        margin: 60px auto 0;
                        width: 100%;
                        height: 100%;	
                    }
                </style>
            </section>
        </article>

        <div class="lt-padding-content">
            <a class="lt-go-back-link" href="<?php echo get_permalink(get_page_by_path('noticias')) ?>" title="Voltar para notíticas">
                <i class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-left.svg" alt="Voltar para notícias">
                </i> Voltar para notícicas
            </a>
        </div>
    </section>

    <!-- Programs widget -->
    <?php get_template_part('../programas', 'footer-mobile'); ?>
</section>
<?php get_footer(); ?>