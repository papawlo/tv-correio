<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=320, initial-scale=1, maximum-scale=1">    		
        <title><?php wp_title(' - ', true, 'right'); ?></title>        

        <?php wp_head(); ?>    
        <script type="text/javascript">
            var theme_base = "<?php echo get_template_directory_uri(); ?>";
        </script>
    </head>
    <body>
        <!--[if (lt IE 10) & (!IEMobile)]> <p class="browsehappy">Você está usando um browser <strong>desatualizado</strong>. Por favor <a href="http://browsehappy.com/">atualize seu browser</a> para uma experiência melhor.</p> <![endif]-->

        <!-- Header -->
        <header class="header">		

            <!-- Content -->
            <section class="header-content">
                <div class="v-align">

                    <!-- Logo -->
                    <h1 class="header-logo v-middle">
                        <a class="link" href="<?php echo network_home_url(); ?>" title="TV Correio">
                            <img src="<?php echo get_template_directory_uri(); ?>/public/img/correio-logo.png" alt="TV Correio">
                        </a>
                    </h1>

                    <!-- Menu -->
                    <nav class="header-menu v-middle">
                        <button class="header-menu-button">
                            <i class="icon">
                                <img class="menu" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-menu.svg" alt="Menu">
                                <img class="close" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-menu-close.svg" alt="Menu">
                            </i>
                            <span class="label">Menu</span>
                        </button>
                        <ul class="header-menu-list">
                            <li class="header-menu-item">
                                <form class="header-search lt-form center" method="get" action="<?php echo network_home_url('busca'); ?>">
                                    <div class="header-search-row lt-form-row">

                                        <input class="header-search-input lt-form-input" type="text" name="q" id="q" placeholder="Digite sua busca">
                                        <button class="header-search-submit" type="submit">
                                            <i class="icon">
                                                <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-search.svg" alt="Buscar">
                                            </i>
                                        </button>
                                    </div>
                                </form>
                            </li>
                            <li class="header-menu-item">
                                <a class="link" href="<?php echo network_site_url('/institucional/'); ?>" title="Institucional">Institucional</a>
                            </li>
                            <li class="header-menu-item">
                                <a class="link" href="<?php echo network_site_url('/programacao/'); ?>" title="Programação">Programação</a>
                            </li>
                            <li class="header-menu-item">
                                <a class="submenu-open link scroll-link" data-id="programs-menu" href="javascript:void(0)" title="Programas">Programas</a>
                            </li>
                            <li class="header-menu-item">
                                <a class="link" href="<?php echo network_site_url('/noticias/'); ?>" title="Notícias">Notícias</a>
                            </li>
                            <li class="header-menu-item">
                                <a class="link" href="<?php echo network_site_url('/videos/'); ?>" title="Vídeos">Vídeos</a>
                            </li>
                            <li class="header-menu-item">
                                <a class="link" href="<?php echo network_site_url('/ao-vivo/'); ?>" title="Ao Vivo">Ao Vivo</a>
                            </li>
                            <li class="header-menu-item">
                                <a class="link" href="<?php echo network_site_url('/comercial/'); ?>" title="Comercial">Comercial</a>
                            </li>
                            <li class="header-menu-item">
                                <a class="link" href="<?php echo network_site_url('/contato/'); ?>" title="Contato">Contato</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </section>
          
        </header>