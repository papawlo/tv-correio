<?php

function setup_correio_mulher() {
    require_once 'includes/post-types.php';

}
add_action( 'after_setup_theme', 'setup_correio_mulher' );

function load_child_scripts() {
    wp_register_script( 'child', get_stylesheet_directory_uri().'/public/js/child.js', array('theme'), null, true );
    wp_enqueue_script( 'child' );
    
}
add_action( 'wp_enqueue_scripts', 'load_child_scripts' );

?>
