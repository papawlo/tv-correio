<?php

include(get_theme_root() . '/functions.php');

function setup_correio_mulher() {

//    add_image_size('thumb-750x400', 750, 400, true);              // Galeria de Receita - grande /*ja tem no function mestre*/
    add_image_size('thumb-248x115', 248, 115, true);              // Galeria de Receita - thumb
//    add_image_size('thumb-360x229', 360, 229, true);              // Receita - Archive /*ja tem no function mestre*/

    require_once 'includes/post-types.php';
}

add_action('after_setup_theme', 'setup_correio_mulher');

function load_child_scripts() {
    wp_register_script('child', get_stylesheet_directory_uri() . '/public/js/child.js', array('theme'), null, true);

    wp_enqueue_script('child');
}

add_action('wp_enqueue_scripts', 'load_child_scripts');
?>
