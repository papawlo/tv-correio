<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="No ar, Correio Verdade, com Samuka Duarte">
        <meta name="keywords" content="Tv Correio, João Pessoa">
    

        <title><?php wp_title(' - ', true, 'right'); ?></title>

        <?php wp_head(); ?>

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/public/css/main.css">
        <!--<script src="<?php echo get_template_directory_uri(); ?>/public/vendor/modernizr/modernizr.js" type="text/javascript"></script>-->
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/public/img/favicon.png">

        <script type="text/javascript">
            var theme_base = "<?php echo get_template_directory_uri(); ?>";
        </script>

    </head>

    <body <?php body_class(); ?>>
         <!--[if (lt IE 10) & (!IEMobile)]>
      <p class="browsehappy">You are using a browser<strong> out of date</strong>. Please <a href="http://browsehappy.com/">update your browser to</a> a better experience.</p>
    <![endif]-->
        <!-- Header -->
        <header class="header">

            <!-- Ad -->
            <section class="header-ad">
                <div class="header-ad-970">
                    <div class="label">Publicidade</div>
                    <div class="content">
                        <img src="http://placehold.it/970x90" alt="Publicidade">
                    </div>
                </div>
            </section>

            <!-- Content -->
            <section class="header-content col-10 center">
                <div class="v-align">

                    <!-- Logo -->
                    <h1 class="header-logo v-middle">
                        <a class="link" href="<?php echo network_home_url(); ?>" title="TV Correio">TV Correio</a>
                    </h1>

                    <!-- Menu -->
                    <nav class="header-menu v-middle">
                        <?php
                        $defaults = array(
                            'theme_location' => '',
                            'menu' => 'Menu principal',
                            'container' => '',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => 'header-menu-list',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 0,
                            'walker' => ''
                        );
                        // wp_nav_menu($defaults);
                        // Get the nav menu based on $menu_name (same as 'theme_location' or 'menu' arg to wp_nav_menu)
                        // This code based on wp_nav_menu's code to get Menu ID from menu slug
                        //saqui é pra pegar o menu principal
                        switch_to_blog(1);

                        $menu_name = 'menu-principal';

                        if (( $locations = get_nav_menu_locations() ) && isset($locations[$menu_name])) {
                            $menu = wp_get_nav_menu_object($locations[$menu_name]);

                            $menu_items = wp_get_nav_menu_items($menu->term_id);
                            $thePostID = $post->ID;



                            $menu_list = '<ul id="menu-' . $menu_name . '" class="header-menu-list">' . "\n";

                            foreach ((array) $menu_items as $key => $menu_item) {


                                $title = $menu_item->title;
                                $url = $menu_item->url;
                                $classes = implode(" ", $menu_item->classes);

                                if ($thePostID == $menu_item->object_id) {
                                    $classes .= ' current-menu-item';
                                }
                                $menu_list .= '<li class="header-menu-item"><a href="' . $url . '" class="' . $classes . '">' . $title . '</a></li>' . "\n";
                            }
                            $menu_list .= '</ul>' . "\n";
                        } else {
                            $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>' . "\n";
                        }
                        echo $menu_list;
                        //fim do menu principal
                        restore_current_blog();
                        // $menu_list now ready to output
                        /*
                          ?>
                          <!--                        <ul class="header-menu-list">
                          <li class="header-menu-item">
                          <a class="link" href="<?php echo network_site_url('/institucional/'); ?>" title="Institucional">Institucional</a>
                          </li>
                          <li class="header-menu-item">
                          <a class="link" href="<?php echo network_site_url('/programacao/'); ?>" title="Programação">Programação</a>
                          </li>
                          <li class="header-menu-item">
                          <a class="submenu-open link" href="javascript:;" title="Programas">Programas</a>
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
                          </ul>-->
                         */
                        ?>

                    </nav>

                    <!-- Social links -->
                    <div class="header-social v-middle">
                        <ul class="header-social-list">
                            <li class="header-social-item">
                                <a class="link facebook" href="https://www.facebook.com/TVCorreio" target="_blanc" title="Facebook">Facebook</a>
                            </li>
                            <li class="header-social-item">
                                <a class="link twitter" href="https://twitter.com/tv_correio" target="_blanc" title="Twitter">Twitter</a>
                            </li>
                            <li class="header-social-item">
                                <a class="link youtube" href="http://www.dailymotion.com/tvcorreio" target="_blanc" title="Dailymotion">Dailymotion</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Search button -->
                    <div class="header-search-button v-middle">
                        <button class="search-button-open button">Busca</button>
                    </div>

                    <!-- Partner logo -->
                    <div class="header-partner v-middle">
                        <a class="link" href="http://rederecord.r7.com/" >
                            <div class="label">Afiliada</div>
                            <i class="icon">Record</i>
                        </a>
                    </div>

                </div>
            </section>

            <!-- Search form -->
            <div class="header-search">
                <form class="form col-10 center" method="GET" action="<?php echo network_home_url('busca'); ?>">
                    <div class="v-align">
                        <div class="icon-wrap v-middle">
                            <i class="icon"></i>
                        </div>
                        <div class="input-wrap v-middle">
                            <input class="input" type="text" id="q" name="q" placeholder="O que você procura?"> <input type="submit" style="display: none;" />
                        </div>
                        <div class="close-wrap v-middle">
                            <input class="search-button-close close" />
                        </div>
                    </div>
                </form>
            </div>

            <!-- Programs submenu -->
            <div class="header-programs">
                <section class="lt-programs-widget col-10 center">
                    <div class="lt-programs-slides">
                        <button class="lt-programs-slides-nav lt-programs-slides-prev">
                            <span class="v-align">
                                <span class="v-middle">
                                    <span class="icon">Recuar</span>
                                </span>
                            </span>
                        </button>
                        <div class="lt-programs-slides-wrap lt-programs-slides-wrap-o">
                            <ul class="lt-programs-slides-list lt-programs-slides-list-o">
                                <?php $list = _wp_get_sites(array('public' => '1', 'archived' => '0', 'orderby' => 'domain ASC, path ASC')); ?>
                                <?php
                                //  $sites_args = array(
                                //      'network_id' => $wpdb->siteid,
                                //      'public' => true,
                                //      'archived' => false,
                                //      'mature' => null,
                                //      'spam' => null,
                                //      'deleted' => false,
                                //      'limit' => 100,
                                //      'offset' => 0,
                                //  );
                                // $list = wp_get_sites($sites_args);
                                ?>
                                <?php foreach ($list as $site): switch_to_blog($site['blog_id']); ?>
                                    <li class="lt-programs-slides-item">
                                        <a class="lt-programs-slides-link" href="<?php echo home_url(); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                            <div class="program program-o">
                                                <!-- Alterar a propriedade border-color conforme a cor do programa -->
                                                <div class="border-o" style="border-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>"></div>
                                                <img class="thumb" src="<?php echo get_theme_mod('logo_setting'); ?>" width="170" height="170" alt="">
                                            </div>
                                        </a>
                                    </li>
                                    <?php
                                    restore_current_blog();
                                endForeach;
                                ?>
                            </ul>
                        </div>
                        <button class="lt-programs-slides-nav lt-programs-slides-next">
                            <span class="v-align">
                                <span class="v-middle">
                                    <span class="icon">Avançar</span>
                                </span>
                            </span>
                        </button>
                    </div>
                </section>
            </div>
            <div class="color-bar"></div>
            <?php echo get_template_part('partials/layout/header', 'programs'); ?>

