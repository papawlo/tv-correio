<?php
include(get_theme_root() . '/functions.php');


/*







  add_filter('acf/settings/save_json', 'my_acf_json_save_point');

  function my_acf_json_save_point($path) {

  // update path
  $path = get_template_directory() . '/acf-json';


  // return
  return $path;
  }

  add_filter('acf/settings/load_json', 'my_acf_json_load_point');

  function my_acf_json_load_point($paths) {

  // remove original path (optional)
  unset($paths[0]);


  // append path
  $paths[] = get_template_directory() . '/acf-json';


  // return
  return $paths;
  }
 */

function mytheme_customize_css() {
    ?>
    <style type="text/css">
        h1 { color:<?php echo get_theme_mod('color_setting'); ?>; }
    </style>
    <?php
}

add_action('wp_head', 'mytheme_customize_css');

function theme_setup_mobile() {
    // Add Menu Support
//    add_theme_support('menus');
//    // Add Thumbnail Theme Support
//    add_theme_support('post-thumbnails');
//    //add_image_size('large', 700, '', true);
//    add_image_size('thumb-268',         268,    268,       true);              // Logo do programa
//    add_image_size('thumb-192',         192,    192,       true);              // Logo do Quadro
//    add_image_size('thumb-95',          95,     95,        true);              // Logo do programa (listagem)
//    add_image_size('thumb-163',         163,    163,       true);              // Imagem de cabeçalho (listagem)
//    add_image_size('thumb-360x229',     360,    229,       true);              // Notícias da Home
//    add_image_size('thumb-360x310',     360,    310,       true);              // Vídeos/Receitas principal
//    add_image_size('thumb-165-132',     165,    132,       true);              // Vídeos - secundário
//    add_image_size('thumb-375x310', 375, 310, true);              // Archive Receitas - main
//    add_image_size('thumb-129x220', 129, 220, true);              // Archive Receitas - mini
//    add_image_size('thumb-375x400', 375, 400, true);              // Single  Receitas slides Big
//    add_image_size('thumb-106x115', 106, 115, true);              // Single Receitas slides mini
    // Add Support for Custom Header - Uncomment below if you're going to use
    add_theme_support('custom-header', array(
        'default-image' => get_template_directory_uri() . '/img/headers/default.jpg',
        'header-text' => false,
        'default-text-color' => '000',
        'width' => 1920,
        'height' => 380,
        'random-default' => false,
//        'wp-head-callback' => $wphead_cb,
//        'admin-head-callback' => $adminhead_cb,
//        'admin-preview-callback' => $adminpreview_cb
    ));
//    require_once 'includes/post-types.php';
}

add_action('after_setup_theme', 'theme_setup_mobile');

function main_load_scripts() {

    // Load jQuery Mobile
    if (!is_admin()) {

        wp_register_script('jquery.mobile', get_template_directory_uri() . '/public/js/jquery.mobile-1.4.5/jquery.mobile-1.4.5.js', array('jquery'), null, true);
//        wp_enqueue_script('jquery.mobile');

        wp_deregister_script("cycle2"); //dando pau com os quadros da home
        wp_register_script('sharrre', get_template_directory_uri() . '/public/vendor/Sharrre/jquery.sharrre.min.js', array('jquery'), null, true);
        wp_register_script('jquery.svg', get_template_directory_uri() . '/public/js/jquery.svg.min.js', array('jquery'), null, true);
        wp_register_script('jscroll', get_template_directory_uri() . '/public/vendor/jscroll/jquery.jscroll.js', array('jquery'), null, true);

        wp_register_script('main-mobile', get_template_directory_uri() . '/public/js/main.js', array('jquery.svg', 'sharrre'), null, true);
        wp_enqueue_script('main-mobile');

        wp_register_script('theme-mobile', get_template_directory_uri() . '/public/js/theme.js', array('main-mobile', 'jscroll'), null, true);
        wp_enqueue_script('theme-mobile');
    }
}

add_action('wp_enqueue_scripts', 'main_load_scripts');

