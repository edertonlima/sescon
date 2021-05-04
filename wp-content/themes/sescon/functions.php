<?php
    //require get_template_directory() . '/inc/setup.php';
?>

<?php

// configurações

// remove pagina pai
function remove_post_custom_fields() {
	remove_meta_box( 'pageparentdiv' , 'page' , 'side' ); 
}

// remove admin bar
add_filter('show_admin_bar', '__return_false');

//adiciona thumbnails
add_theme_support( 'post-thumbnails' );

// menu
add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
	register_nav_menu( 'primary', __( 'header', 'header' ) );
}

// widget
function wpmu_register_widgets() {
	register_sidebar( array(
		'name' => __( 'Anúncio, Vertical', 'wpmu' ),
		'id' => 'anuncio-vertical',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

	register_sidebar( array(
		'name' => __( 'Sidebar Categorias', 'wpmu' ),
		'id' => 'categorias',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}
add_action( 'widgets_init', 'wpmu_register_widgets' );

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
	    'supports' => array('title','thumbnail','editor','excerpt')
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

// materiais
add_action( 'init', 'post_type_materiais' );
function post_type_materiais() {

	$labels = array(
	    'name' => _x('Materiais', 'post type general name'),
	    'singular_name' => _x('Materiais', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'materiais'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos os post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Materiais'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'materiais',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-cloud-saved',
	    'menu_position' => 5,
	    'supports' => array('title','thumbnail','excerpt','editor')
	  );

    register_post_type( 'materiais', $args );
}
add_action( 'init', 'create_taxonomy_categoria_materiais' );
function create_taxonomy_categoria_materiais() {

	$labels = array(
		'name' => _x( 'Categoria Materiais', 'taxonomy general name' ),
		'singular_name' => _x( 'Categoria Materiais', 'taxonomy singular name' ),
		'search_items' =>  __( 'Procurar categoria' ),
		'all_items' => __( 'Todas as categorias' ),
		'parent_item' => __( 'Categoria pai' ),
		'parent_item_colon' => __( 'Categoria pai:' ),
		'edit_item' => __( 'Editar categoria' ),
		'update_item' => __( 'Atualizar categoria' ),
		'add_new_item' => __( 'Adicionar nova categoria' ),
		'new_item_name' => __( 'Nova categoria' ),
		'menu_name' => __( 'Categoria' ),
	);

	register_taxonomy( 'categoria_materiais', array( 'materiais' ), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_tag_cloud' => true,
		'query_var' => true,
		'rewrite' => array(
			'slug' => 'materiais',
			'with_front' => true,
			)
		)
	);
}

// perfis
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

// soluções
add_action( 'init', 'post_type_solucoes' );
function post_type_solucoes() {

	$labels = array(
	    'name' => _x('Soluções', 'post type general name'),
	    'singular_name' => _x('Soluções', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'solucoes'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Soluções'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'solucoes',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-edit-page',
	    'menu_position' => 5,
	    'supports' => array('title','thumbnail','excerpt')
	  );

    register_post_type( 'solucoes', $args );
}

// Iniciativas
add_action( 'init', 'post_type_iniciativas' );
function post_type_iniciativas() {

	$labels = array(
	    'name' => _x('Iniciativas', 'post type general name'),
	    'singular_name' => _x('Iniciativas', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'iniciativas'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Iniciativas'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'iniciativas',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-thumbs-up',
	    'menu_position' => 5,
	    'supports' => array('title','editor','thumbnail','excerpt')
	  );

    register_post_type( 'iniciativas', $args );
}

// voce-sabia
add_action( 'init', 'post_type_voce_sabia' );
function post_type_voce_sabia() {

	$labels = array(
	    'name' => _x('Você Sabia', 'post type general name'),
	    'singular_name' => _x('Você Sabia', 'post type singular name'),
	    'add_new' => _x('Adicionar novo', 'Você Sabia'),
	    'add_new_item' => __('Adicionar novo'),
	    'edit_item' => __('Editar'),
	    'new_item' => __('Novo post'),
	    'all_items' => __('Todos as post'),
	    'view_item' => __('Visualizar post'),
	    'search_items' => __('Procurar post'),
	    'not_found' =>  __('Nenhum post encontrado.'),
	    'not_found_in_trash' => __('Nenhum post encontrado na lixeira.'),
	    'parent_item_colon' => '',
	    'menu_name' => 'Você Sabia'
	);
	$args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true,
	    'show_in_menu' => true,

		'rewrite'=> [
			'slug' => 'voce-sabia',
			"with_front" => true,
		],

		"cptp_permalink_structure" => "/%postname%/",

	    'capability_type' => 'post',
	    'has_archive' => true,
	    'hierarchical' => true,
	    'menu_position' => null,
	    'menu_icon' => 'dashicons-format-gallery',
	    'menu_position' => 6,
	    'supports' => array('title')
	  );

    register_post_type( 'voce-sabia', $args );
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
        'page_title'  => 'Minhas redes sociais',
        'menu_title'  => 'Redes Sociais',
        'menu_slug'   => 'redes-sociais',
        'capability'  => 'edit_posts',
        'redirect'    => true,
        'icon_url' => 'dashicons-share',
        'position' => 9
    ));

	
	// configurações gerais
	acf_add_options_page(array(
	  'page_title'  => 'Informações gerais do meu site',
	  'menu_title'  => 'Configurações',
	  'menu_slug'   => 'configuracoes-gerais',
	  'capability'  => 'edit_posts',
	  'redirect'    => false,
      'icon_url' => 'dashicons-admin-settings',
      'position' => 9
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Notícias',
		'menu_title'  => 'Notícias',
		'parent_slug' => 'configuracoes-gerais',
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Vídeos',
		'menu_title'  => 'Vídeos',
		'parent_slug' => 'configuracoes-gerais',
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Materiais',
		'menu_title'  => 'Materiais',
		'parent_slug' => 'configuracoes-gerais',
	));

	acf_add_options_sub_page(array(
	  'page_title'  => 'Bloco perfis',
	  'menu_title'  => 'Bloco perfis',
	  'parent_slug' => 'configuracoes-gerais',
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Bloco materiais',
		'menu_title'  => 'Bloco materias',
		'parent_slug' => 'configuracoes-gerais',
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Banners',
		'menu_title'  => 'Banners',
		'parent_slug' => 'configuracoes-gerais',
	));

	acf_add_options_page(array(
        'page_title'  => 'Blocos de menu posicionados no rodapé',
        'menu_title'  => 'Menu Footer',
        'icon_url' => 'dashicons-menu',
		'parent_slug' => 'configuracoes-gerais',
    ));
}


// botão carregar mais
add_action( 'wp_enqueue_scripts', 'meus_scripts', 100 );

function meus_scripts() {
	wp_enqueue_script(
	    'load-more',
	    get_template_directory_uri() . '/assets/js/load-more.js?ver=1.0', //esse é o arquivo .js do seu tema que vai conter todos os scripts (pode ser diferente no seu tema)
	    array( 'jquery' ),
	    null,
	    false
	);
	wp_localize_script(
	    'meus_scripts',
	    'WPaAjax',
	    array(
	        'ajaxurl' => admin_url( 'admin-ajax.php' )
	    )
	);
}
// Ação de callback do Ajax
function load_more() {
	$loop = new WP_Query(
		array(
			'post_type' => $_POST['post-type'],
			'cat' => $_POST['category'],
			'post_status' => 'any',
			's' => $_POST['pesquisa'],
			'posts_per_page' => 10,
			'paged' => $_POST['paged']
		)
	);

	if ( $loop->have_posts() ): 
		$qtd_item = 0;

			while ( $loop->have_posts() ): 

				$load_post_type = $_POST['post-type'];
				$loop->the_post();

				if($load_post_type == 'materiais'){
					echo '<div class="col-4">';
						get_template_part( 'content/materiais' );
					echo '</div>';
				}else{
					get_template_part( 'content/post-list' );
				}
				
			endwhile; ?>

		<?php echo 'max_paged' . $loop->max_num_pages; ?>
	<?php else: ?>    
		<p class="erro-conteudo">Desculpe, não foi possível carregar mais conteúdos.</p>
	<?php endif; ?>

	<?php wp_reset_postdata(); 

	die();
}

add_action( 'wp_ajax_nopriv_load_more', 'load_more' );
add_action( 'wp_ajax_load_more', 'load_more' );



// contagem visualização do post
function count_views($postID) {
	$post_meta = 'post_views_count';
	$count = get_post_meta($postID, $post_meta, true);

	if($count == '') {
		$count = 0;
		delete_post_meta($postID, $post_meta);
		add_post_meta($postID, $post_meta, '0');
	}else {
		$count++;
		update_post_meta($postID, $post_meta, $count);
	}
}
function track_views ($post_id) {
	if ( !is_single() ) { return; }
	if ( empty ( $postId) ) {
		global $post;
		$postId = $post->ID;
	}
	count_views($postId);
}
add_action( 'wp_head', 'track_views');


?>