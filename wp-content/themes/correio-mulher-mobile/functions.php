<?php 
include(get_theme_root() . '/functions.php');


function theme_setup_mobile() {

    // Add Support for Custom Header - Uncomment below if you're going to use
    add_theme_support('custom-header', array(
        'default-image' => get_template_directory_uri() . '/img/headers/default.jpg',
        'header-text' => false,
        'default-text-color' => '000',
        'width' => 1920,
        'height' => 380,
        'random-default' => false,
    ));
    require_once 'includes/post-types.php';
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
