<?php
require_once(get_theme_root() . '/functions.php');

function theme_setup() {
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    //add_image_size('large', 700, '', true);
    add_image_size('thumb-268', 268, 268, true);              // Logo do programa
    add_image_size('thumb-192', 192, 192, true);              // Logo do Quadro
    add_image_size('thumb-95', 95, 95, true);              // Logo do programa (listagem)
    add_image_size('thumb-163', 163, 163, true);              // Imagem de cabeçalho (listagem)
    add_image_size('thumb-360x229', 360, 229, true);              // Notícias da Home
    add_image_size('thumb-360x310', 360, 310, true);              // Vídeos/Receitas principal
    add_image_size('thumb-165x132', 165, 132, true);              // Vídeos - secundário
    add_image_size('thumb-165x216', 165, 216, true);              // Receitas - secundário
    // Add Support for Custom Header - Uncomment below if you're going to use
    add_theme_support('custom-header', array(
        'default-image' => get_template_directory_uri() . '/img/headers/default.jpg',
        'header-text' => false,
        'default-text-color' => '000',
        'width' => 1920,
        'height' => 380,
        'random-default' => false,
//    	'wp-head-callback'             => $wphead_cb,
//    	'admin-head-callback'          => $adminhead_cb,
//    	'admin-preview-callback'       => $adminpreview_cb
    ));
//    require_once get_theme_root().'/includes/post-types.php';
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

function mytheme_customize_css() {
    ?>
    <style type="text/css">
        h1 { color:<?php echo get_theme_mod('color_setting'); ?>; }
    </style>
    <?php
}

add_action('wp_head', 'mytheme_customize_css');

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
