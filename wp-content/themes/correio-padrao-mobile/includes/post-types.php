<?php
function register_cpt() {

	/*register_post_type(
		'quadro',
		array(
			'labels' => array(
				'name'               => 'Quadros',
				'singular_name'      => 'Quadro',
				'add_new'            => 'Adicionar Novo',
				'add_new_item'       => 'Adicionar novo Quadro',
				'edit_item'          => 'Editar Quadro',
				'new_item'           => 'Novo Quadro',
				'view_item'          => 'Ver Quadro',
				'search_items'       => 'Buscar Quadro',
				'not_found'          => 'Nenhum Quadro encontrado',
				'not_found_in_trash' => 'Nenhum Quadro encontrado na lixeira'
			),
			'hierarchical' => false,
            'rewrite' => array('slug' => 'quadros'),
            'supports' => array('title','thumbnail','excerpt'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_nav_menus' => false,
            'publicly_queryable' => false,
            'exclude_from_search' => true,
            'has_archive' => false,
            'query_var' => false,
            'can_export' => true,
            'menu_icon'	=>	get_template_directory_uri().'/imagens/admin/tv.png',
            'capability_type' => 'post'
		)
	);*/
}
add_action('init','register_cpt');