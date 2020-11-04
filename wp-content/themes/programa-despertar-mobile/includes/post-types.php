<?php

function register_cpt_despertar() {

	register_post_type(
		'mensagem',
		array(
			'labels' => array(
				'name'               => 'Mensagens',
				'singular_name'      => 'Mensagem',
				'add_new'            => 'Adicionar Nova',
				'add_new_item'       => 'Adicionar nova Mensagem',
				'edit_item'          => 'Editar Mensagem',
				'new_item'           => 'Nova Mensagem',
				'view_item'          => 'Ver Mensagem',
				'search_items'       => 'Buscar Mensagem',
				'not_found'          => 'Nenhuma Mensagem encontrada',
				'not_found_in_trash' => 'Nenhuma Mensagem encontrada na lixeira'
			),
			'hierarchical' => false,
            'rewrite' => array('slug' => 'mensagens'),
            'supports' => array('title','editor'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'has_archive' => true,
            'can_export' => true,
            'menu_icon'	=>	get_stylesheet_directory_uri().'/imagens/admin/smiley2.png',
            'capability_type' => 'post'
		)
	);

	register_taxonomy('categoria-mensagem', 
		array ('mensagem'),
  		array(
  			'hierarchical' => true,
  			'query_var' => true,
  			'show_admin_column' => true,
  			'rewrite' => array('slug' => 'mensagem/categoria'),
  			'show_in_menu' => true,
  			'show_ui' => true,
  			'labels' => array (
			    'name' => 'Categorias',
			    'singular_name' => 'Categoria',
			    'search_items' => 'Busca',
			    'popular_items' => 'Popular',
			    'all_items' => 'Todas',
			    'parent_item' => '',
			    'parent_item_colon' => '',
			    'edit_item' => 'Editar',
			    'update_item' => 'Atualizar',
			    'add_new_item' => 'Adicionar nova',
			    'new_item_name' => 'Nova Categoria',
			    'separate_items_with_commas' => 'Separado por vírgulas',
			    'add_or_remove_items' => 'Adicionar ou remover',
			    'choose_from_most_used' => 'Escolha entre os mais utilizados',
			)
  		) 
  	);
  	flush_rewrite_rules( false );
}
add_action('init','register_cpt_despertar');