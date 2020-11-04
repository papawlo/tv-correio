<?php

include(get_theme_root() . '/functions.php');

//include 'includes/post-types.php';

function theme_setup() {
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
//    add_image_size('thumb-750x400', 750, 400, true);              // Home - Slider
//    add_image_size('thumb-186x114', 186, 114, true);              // Home - Slider Thumb
//    add_image_size('thumb-375x270', 375, 270, true);              // Institucional - Imagem do slide mobile
//    add_image_size('thumb-106x132', 106, 132, true);              // Noticias - Listagem
//    add_image_size('thumb-234x145', 234, 145, true);              // Programas - Listagem
//    add_image_size('thumb-129x132', 129, 132, true);              // Home Videos - Listagem mini
//    add_image_size('thumb-120', 120, 120, true);                  // Home Slider


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

//    require_once 'includes/post-types.php';
}

add_action('after_setup_theme', 'theme_setup');


function main_load_scripts() {

    // Load jQuery Mobile
    if (!is_admin()) {

        wp_register_script('jquery.mobile', get_template_directory_uri() . '/public/js/jquery.mobile-1.4.5/jquery.mobile-1.4.5.js', array('jquery'));
//        wp_enqueue_script('jquery.mobile');
//         wp_enqueue_style('jquery-mobile-css', get_template_directory_uri() . '/public/js/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css', array(), '1.4.5');
//
        wp_register_script('hammer', get_template_directory_uri() . '/public/js/hammer.min.js', array('jquery'), null, true);
//        wp_enqueue_script('hammer');
        wp_register_script('touchSwipe', get_template_directory_uri() . '/public/js/jquery.touchSwipe.min.js', array('jquery'), null, true);
//        wp_enqueue_script('touchSwipe');
        wp_register_script('carouFredSel', get_template_directory_uri() . '/public/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), null, true);
//        wp_enqueue_script('carouFredSel');

        wp_register_script('correio-main-js', get_template_directory_uri() . '/public/js/main.js', array('sharrre', 'cycle2', 'jscroll', 'jquery.svg', 'touchSwipe', 'carouFredSel'), null, true);
        wp_enqueue_script('correio-main-js');
    }
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

function changept() {
    if (is_category() && !is_admin())
        set_query_var('post_type', array('post', 'videos'));
    return;
}

add_action('parse_query', 'changept');


/*
  Arquivo que contém funções para ser reutilizadas
 */

function getYoutubeThumbnail($video_url, $size) {
    $video_url = strstr($video_url, 'https://www.youtube.com/embed/');
    $video_url = substr($video_url, 0, strpos($video_url, '?'));
    $video_url = str_replace('https://www.youtube.com/embed/', '', $video_url);
    $video_url = 'http://img.youtube.com/vi/' . $video_url . '/0.jpg';

    if ($size == 'medium')
        $video_url = '<img width="360" height="310" src="' . $video_url . '" class="attachment-thumb-360x229 wp-post-image" alt="tv_correio">';
    else
        $video_url = '<img width="129" height="125" src="' . $video_url . '" class="attachment-thumb-129x132 wp-post-image" alt="tv_correio">';
    return $video_url;
}

?>
