<?php

include(get_theme_root() . '/functions.php');

function theme_setup() {
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('thumb-750x400', 750, 400, true);              // Home - Slider
    add_image_size('thumb-186x114', 186, 114, true);              // Home - Slider Thumb
    add_image_size('thumb-360x310', 360, 310, true);              // Home Videos - Imagem maior
    add_image_size('thumb-165x132', 165, 132, true);              // Home Videos - Imagem menor
    add_image_size('thumb-360x229', 360, 229, true);              // Noticias, Videos - Imagem do video e da noticia
    add_image_size('thumb-660x410', 660, 410, true);              // Sinlge Videos - Imagem do pagina iterna do video


    /* acf_add_options_page(array(
      'page_title' 	=> 'Configurações do Tema',
      'menu_title' 	=> 'Configurações do Temas',
      'menu_slug' 	=> 'configuracoes-do-tema',
      'capability' 	=> 'edit_theme_options',
      ));

      acf_add_options_sub_page(array(
      'page_title' 	=> 'Configurações de Destaques da Home',
      'menu_title'	=> 'Destaques',
      'parent_slug'	=> 'configuracoes-do-tema',
      )); */
}

add_action('after_setup_theme', 'theme_setup');



function main_load_scripts() {
    wp_register_script('html5lightbox', get_template_directory_uri() . '/public/vendor/html5lightbox/html5lightbox.js', array('jquery'), null, true);

    wp_enqueue_script('html5lightbox');

    wp_register_script('correio-main-js', get_template_directory_uri() . '/public/js/main.js', array('sharrre', 'cycle2', 'jscroll', 'jquery.svg'), null, true);
    wp_register_script('correio-theme-js', get_template_directory_uri() . '/public/js/theme.js', array('correio-main-js'), null, true);
    wp_enqueue_script('correio-theme-js');
}

add_action('wp_enqueue_scripts', 'main_load_scripts');

function wpcf7_special_mail_tag_for_member_data($output, $name) {

    // For backwards compat.
    $name = preg_replace('/^wpcf7\./', '_', $name);

    switch ($name) {
        case '_agencia':
            $output = do_shortcode('[wp-members field="agencia"]');
            break;
        case '_responsavel':
            $output = do_shortcode('[wp-members field="responsavel"]');
            break;
    }

    return $output;
}

add_filter('wpcf7_special_mail_tags', 'wpcf7_special_mail_tag_for_member_data', 10, 2);
?>
