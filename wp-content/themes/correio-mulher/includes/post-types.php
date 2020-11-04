<?php

function register_cpt_correio_mulher() {

	register_post_type(
		'receita',
		array(
			'labels' => array(
				'name'               => 'Receitas',
				'singular_name'      => 'Receita',
				'add_new'            => 'Adicionar Nova',
				'add_new_item'       => 'Adicionar nova Receita',
				'edit_item'          => 'Editar Receita',
				'new_item'           => 'Nova Receita',
				'view_item'          => 'Ver Receita',
				'search_items'       => 'Buscar Receita',
				'not_found'          => 'Nenhuma Receita encontrada',
				'not_found_in_trash' => 'Nenhuma Receita encontrada na lixeira'
			),
			'hierarchical' => false,
            'rewrite' => array('slug' => 'receitas'),
            'supports' => array('title','thumbnail','editor'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'has_archive' => true,
            'can_export' => true,
            'menu_icon'	=>	get_stylesheet_directory_uri().'/imagens/admin/food.png',
            'capability_type' => 'post'
		)
	);

	register_taxonomy('categoria-receita', 
		array ('receita'),
  		array( 
  			'hierarchical' => true,
  			'query_var' => true,
  			'show_admin_column' => true,
  			'rewrite' => array('slug' => 'receita/tipo'),
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
add_action('init','register_cpt_correio_mulher');