<?php
/**
 * Video Post Type
 */
function register_video_cpt() {
    register_post_type(
            'video', array(
        'labels' => array(
            'name' => 'Vídeos',
            'singular_name' => 'Vídeo',
            'add_new' => 'Adicionar Novo',
            'add_new_item' => 'Adicionar novo Vídeo',
            'edit_item' => 'Editar Vídeo',
            'new_item' => 'Novo Vídeo',
            'view_item' => 'Ver Vídeo',
            'search_items' => 'Buscar Vídeo',
            'not_found' => 'Nenhum Vídeo encontrado',
            'not_found_in_trash' => 'Nenhum Vídeo encontrado na lixeira'
        ),
        'hierarchical' => true,
//        'rewrite' => array('slug' => 'videos', 'with_front' => true),
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'author'),
        'public' => true,
        'show_ui' => true,
//        'show_in_menu' => true,
        'menu_position' => 5,
//        'show_in_nav_menus' => false,
//        'publicly_queryable' => true,
//        'exclude_from_search' => false,
        'has_archive' => false,      
//        'query_var' => true,
//        'can_export' => true,
        'menu_icon' => 'dashicons-video-alt',
//        'capability_type' => 'post'
            )
    );
//    flush_rewrite_rules();
    
}

add_action('init', 'register_video_cpt');
