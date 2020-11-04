

<!--menu-program-mobile-->

<nav class="header-program-menu">
    <div class="v-align">
        <div class="v-middle">
            <form class="lt-form" method="" action="">
                <div class="lt-form-row">
                    <div class="lt-form-select">
                        <input id="ctn_programa" class="lt-form-select-input" type="hidden" name="ctn_programa" value="nenhum_programa">
                        <div class="current">
                            <span class="label"><?php echo my_get_menu_item_name("menu-programa")?></span>
                            <div class="icon-wrap">
                                <div class="v-align">
                                    <div class="v-middle">
                                        <i class="icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php

//                        function wp_multisite_nav_menu($args = array(), $origin_id = 1) {
//
//                            global $blog_id;
//                            $origin_id = absint($origin_id);
//
//                            if (!is_multisite() || $origin_id == $blog_id) {
//                                wp_nav_menu($args);
//                                return;
//                            }
//
//                            switch_to_blog($origin_id);
//                            wp_nav_menu($args);
//                            restore_current_blog();
//                        }
                       

                        
                        wp_nav_menu(array(
                            'theme_location' => 'menu-programa',
                            'menu' => '',
                            'container' => false,
                            'container_class' => false,
                            'container_id' => false,
                            'menu_class' => 'list',
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
//                            'walker' => new padrao_mobile_walker_nav_menu()
                        ));
                        ?>
                        <!--                        <ul class="list">
                                                    <li class="item" data-value="mulher_demais">O Programa</li>
                                                    <li class="item" data-value="manha_correio">Sobre</li>
                                                    <li class="item" data-value="correio_esporte">Receitas</li>
                                                </ul>-->
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>