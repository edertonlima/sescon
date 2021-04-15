<?php

// configurações

// remove pagina pai
function remove_post_custom_fields() {
	remove_meta_box( 'pageparentdiv' , 'page' , 'side' ); 
}

// remove admin bar
add_filter('show_admin_bar', '__return_false');

// menu
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
	register_nav_menu( 'primary', __( 'header', 'header' ) );
}

// notícias
add_action( 'init', 'post_type_noticias' );
function post_type_noticias() {

	$labels = array(
	    'name' => _x('Notícias', 'post type general name'),
	    'singular_name' => _x('Notícias', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'notícias'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Notícias'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'noticias',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-rss',
	    'menu_position' => 5,
	    'supports' => array('title','thumbnail','excerpt')
	  );

    register_post_type( 'noticias', $args );
}

// videos
add_action( 'init', 'post_type_videos' );
function post_type_videos() {

	$labels = array(
	    'name' => _x('Vídeos', 'post type general name'),
	    'singular_name' => _x('Vídeos', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'vídeos'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Vídeos'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'videos',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-video-alt3',
	    'menu_position' => 5,
	    'supports' => array('title','thumbnail','excerpt')
	  );

    register_post_type( 'videos', $args );
}

// perfil perfis de navegação
add_action( 'init', 'post_type_perfis' );
function post_type_perfis() {

	$labels = array(
	    'name' => _x('Perfis', 'post type general name'),
	    'singular_name' => _x('Perfis', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'perfis'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Perfis'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'perfis',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-businessperson',
	    'menu_position' => 5,
	    'supports' => array('title','thumbnail','excerpt')
	  );

    register_post_type( 'perfis', $args );
}

// paginas de opções
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
        'page_title'  => 'Gatilhos Rápidos',
        'menu_title'  => 'Gatilhos Rápidos',
        'menu_slug'   => 'gatilhos-rapidos',
        'capability'  => 'edit_posts',
        'redirect'    => true,
        'icon_url' => 'dashicons-excerpt-view',
        'position' => 8
    ));

    acf_add_options_page(array(
        'page_title'  => 'Blocos de menu posicionados no rodapé',
        'menu_title'  => 'Menu Footer',
        'menu_slug'   => 'menu-footer',
        'capability'  => 'edit_posts',
        'redirect'    => true,
        'icon_url' => 'dashicons-menu',
        'position' => 9
    ));

    acf_add_options_page(array(
        'page_title'  => 'Minhas redes sociais',
        'menu_title'  => 'Redes Sociais',
        'menu_slug'   => 'redes-sociais',
        'capability'  => 'edit_posts',
        'redirect'    => true,
        'icon_url' => 'dashicons-share',
        'position' => 9
    ));

    acf_add_options_page(array(
	  'page_title'  => 'Informações gerais do meu site',
	  'menu_title'  => 'Configurações Gerais',
	  'menu_slug'   => 'configuracoes-gerais',
	  'capability'  => 'edit_posts',
	  'redirect'    => false,
      'icon_url' => 'dashicons-admin-settings',
      'position' => 9
	));

	acf_add_options_sub_page(array(
	  'page_title'  => 'Bloco perfis',
	  'menu_title'  => 'Bloco perfis',
	  'parent_slug' => 'configuracoes-gerais',
	));
}

?>