<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
        <meta name="viewport" content="width=320, initial-scale=1, maximum-scale=1">

        <title><?php wp_title(' - ', true, 'right'); ?></title>

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/public/css/main.css">
        <script src="<?php echo get_template_directory_uri(); ?>/public/vendor/modernizr/modernizr.js" type="text/javascript"></script>

        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/public/img/favicon.png">

        <?php wp_head(); ?>
        <script type="text/javascript">
            var theme_base = "<?php echo get_template_directory_uri(); ?>";
        </script>

    </head>
    <body>

        <header class="header">

            <!-- Content -->
            <section class="header-content">
                <div class="v-align">

                    <!-- Logo -->
                    <h1 class="header-logo v-middle">
                        <a class="link" href="<?php echo network_home_url(); ?>" title="TV Correio">
                            <img src="<?php echo get_template_directory_uri()?>/public/img/correio-logo.png" alt="TV Correio">
                        </a>
                    </h1>

                    <!-- Menu -->
                    <nav class="header-menu v-middle">
                        <button class="header-menu-button">
                            <i class="icon">
                                <img class="menu" src="<?php echo get_template_directory_uri()?>/public/img/icon-menu.svg" alt="Menu">
                                <img class="close" src="<?php echo get_template_directory_uri()?>/public/img/icon-menu-close.svg" alt="Menu">
                            </i>
                            <span class="label">Menu</span>
                        </button>

                        <ul class="header-menu-list">
                            <li class="header-menu-item">
                                <form class="header-search lt-form center" method="" action="">
                                    <div class="header-search-row lt-form-row">
                                        <input class="header-search-input lt-form-input" type="text" name="search" placeholder="Digite sua busca">
                                        <button class="header-search-submit" type="submit">
                                            <i class="icon">
                                                <img src="<?php echo get_template_directory_uri()?>/public/img/icon-search.svg" alt="Buscar">
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
                                <a class="submenu-open link scroll-link" data-id="programs-menu" href="javascript:;" title="Programas">Programas</a>
                            
                            </li>
                            <li class="header-menu-item">
                                <a class="link" href="<?php echo network_site_url('/noticias/'); ?>" title="Notícias">Notícias</a>
                            </li>
                            <li class="header-menu-item">
                                <a class="link" href="<?php echo network_site_url('/videos/'); ?>" title="Vídeos">Vídeos</a>
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

            <section class="header-program">
                <div class="header-program-content" style="border-bottom-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;">
                    <div class="header-program-logo">
                        <a class="header-program-logo-link" href="<?php echo home_url(); ?>">
                            <span class="border" style="border-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;"></span>
                            <img class="header-program-logo-image" src="<?php echo get_theme_mod('logo_setting'); ?>" width="170" height="170" alt="<?php echo esc_attr(bloginfo('name' )); ?>">
                            
                        </a>
                    </div>
                    <div class="header-program-presentation">                        
                        <!--<img class="image" src="http://placehold.it/375x310" alt="Correio verdade">-->
                        <!-- <img class="image" src="<?php //header_image(); ?>" width="375" height="310" alt="<?php //echo esc_attr(bloginfo('name' )); ?>"> -->
                       <?php echo wp_get_attachment_image(get_custom_header()->attachment_id, 'thumb-375x310', false, array("class" => "image")); ?>
                    </div>
                </div>
                <!--menu-program-mobile-->
                <?php echo get_template_part('partials/layout/header', 'programs'); ?>                
                <!-- FIM menu-program-mobile-->
            </section>
        </header>