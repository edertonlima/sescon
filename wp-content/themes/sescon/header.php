<!DOCTYPE html>
<html lang="pt-br">
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="" type="image/x-icon" />
	<link rel="icon" href="" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="pt" />
	<meta name="rating" content="General" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index,follow" />
	<meta name="author" content="" />
	<meta name="language" content="pt-br" />
	<meta name="title" content="" />

	<title></title>

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="screen" />

    <?php wp_head(); ?> 

</head>
<body <?php body_class(); ?>>

	<header class="header">
        <div class="header-top">
            <div class="container">
                <nav class="nav nav-top">
                    <ul>

                        <?php 
                            $array_menu = wp_get_nav_menu_items('header top left');
                            $submenu = false;

                            foreach ($array_menu as $item) { ?>

                                <?php if($item->menu_item_parent): 
                                    if(!$submenu):
                                        $submenu = true;
                                        echo '<ul>';
                                    endif;
                                elseif ($submenu):
                                    $submenu = false;
                                    echo '</li></ul>';

                                    else:
                                        echo '</li>';
                                endif; ?>

                                    <li>
                                        <a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>"> 
                                            <?php echo $item->title; ?>
                                        </a>
                                    
                                    <?php if($submenu):
                                        echo '</li>';
                                    endif; ?>

                                <?php
                            }
                        ?>

                    </ul>

                    <ul>
                        <li>
                            <a href="tel:<?php the_field('telefone-principal','option'); ?>" title="<?php the_field('telefone-principal','option'); ?>" class="tel-header">
                                <img class="ico-menu" src="<?php echo get_template_directory_uri(); ?>/assets/img/ico-telefone.png" alt="<?php the_field('telefone-principal','option'); ?>" /> <span><?php the_field('telefone-principal','option'); ?></span>
                            </a>
                        </li>

                        <?php 
                            $array_menu = wp_get_nav_menu_items('header top right');
                            $i = 1;
                            foreach ($array_menu as $item) {
                                if (empty($m->menu_item_parent)) { ?>

                                    <li>
                                        <a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>" class="btn <?php if($i == 1){ echo 'btn-transparent btn-seja-associado'; }else{ echo 'btn-acesse-conta'; } ?>"> 
                                            <?php echo $item->title; ?>
                                        </a>
                                    </li>

                                    <?php 
                                    $i++;

                                }
                            }
                        ?>

                    </ul>
                </nav>
            </div>
        </div>

        <div class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-9 content-nav">
                        <div class="logo">
                            <a href="<?php echo get_home_url(); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-sescon-sp.png" alt="">
                                <img class="logo-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-sescon-sp-azul.png" alt="">
                            </a>
                        </div>
                        <nav class="nav nav-principal">
                            <ul>
                                <li>
                                    <a href="<?php echo get_home_url(); ?>" title="INICIO">INICIO</a>
                                </li>
                                <li>
                                    <a href="<?php echo get_home_url(); ?>/solucoes" title="PRODUTOS E SERVIÇOS"> 
                                        <span>PRODUTOS E </span>SERVIÇOS
                                    </a>

                                    <?php
                                        $query = array(
                                            'post_type' => 'solucoes'
                                        );
                                        query_posts( $query );        
                                        if( have_posts() ){ ?>
                                            <ul>

                                                <?php while ( have_posts() ) : the_post(); ?>
                                                    <li>
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                                    </li>
                                                <?php endwhile;
                                                wp_reset_query(); ?>
                                            
                                            </ul>
                                        <?php }
                                    ?>
                                </li>

                                <li>
                                    <a href="<?php echo get_home_url(); ?>/iniciativas" title="ATUAÇÕES E INICIATIVAS"> 
                                        <span>ATUAÇÕES E </span>INICIATIVAS
                                    </a>

                                    <?php
                                        $query = array(
                                            'post_type' => 'iniciativas'
                                        );
                                        query_posts( $query );        
                                        if( have_posts() ){ ?>
                                            <ul>

                                                <?php while ( have_posts() ) : the_post(); ?>
                                                    <li>
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                                    </li>
                                                <?php endwhile;
                                                wp_reset_query(); ?>
                                            
                                            </ul>
                                        <?php }
                                    ?>
                                </li>

                                <?php 
                                    $array_menu = wp_get_nav_menu_items('header');
                                    $submenu = false;

                                    foreach ($array_menu as $item) { ?>

                                        <?php if($item->menu_item_parent): 
                                            if(!$submenu):
                                                $submenu = true;
                                                echo '<ul>';
                                            endif;
                                        elseif ($submenu):
                                            $submenu = false;
                                            echo '</li></ul>';

                                            else:
                                                echo '</li>';
                                        endif; ?>

                                            <li>
                                                <a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>"> 
                                                    <?php 
                                                        if($item->menu_item_parent):
                                                            echo $item->title;
                                                        else:
                                                            
                                                            $a_nav = explode(' ', $item->title);
                                                            $a_count = count($a_nav)-1;
                                                            if(count($a_nav) > 1){
                                                                echo '<span>';
                                                                    for($i=0; $i < $a_count; $i++){
                                                                        echo $a_nav[$i] . ' ';
                                                                    }
                                                                echo '</span>';
                                                                echo $a_nav[$a_count];
                                                            }else{
                                                                echo $item->title;
                                                            }

                                                        endif;
                                                    ?>
                                                </a>
                                            
                                            <?php if($submenu):
                                                echo '</li>';
                                            endif; ?>

                                        <?php
                                    }
                                ?>

                                <li>
                                    <a title="EVENTOS"> 
                                        EVENTOS
                                    </a>

                                    <?php
                                        $query = array(
                                            'post_type' => 'evento'
                                        );
                                        query_posts( $query );        
                                        if( have_posts() ){ ?>
                                            <ul>

                                                <?php while ( have_posts() ) : the_post(); ?>
                                                    <li>
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                                    </li>
                                                <?php endwhile;
                                                wp_reset_query(); ?>
                                            
                                            </ul>
                                        <?php }
                                    ?>
                                </li>

                                <li>
                                    <a title="CURSOS"> 
                                        CURSOS
                                    </a>

                                    <?php
                                        $query = array(
                                            'post_type' => 'curso'
                                        );
                                        query_posts( $query );        
                                        if( have_posts() ){ ?>
                                            <ul>

                                                <?php while ( have_posts() ) : the_post(); ?>
                                                    <li>
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                                    </li>
                                                <?php endwhile;
                                                wp_reset_query(); ?>
                                            
                                            </ul>
                                        <?php }
                                    ?>
                                </li>
                                
                                <?php
                                    if( is_home() || is_category() || is_singular('post') || is_singular('videos') || is_singular('noticias') || is_singular('materiais') ){
                                        $class_aprendizagem = 'active';
                                    }
                                ?>

                                <li class="<?php echo $class_aprendizagem; ?>">
                                    <a title="PORTAL"> 
                                        PORTAL
                                    </a>

                                    <ul>
                                        <li><a class="<?php if( is_post_type_archive('noticias') || is_singular('noticias') ){ echo 'active'; } ?>" href="<?php echo get_home_url(); ?>/noticias" title="Notícias">Notícias</a></li>
                                        <li><a class="<?php if( is_post_type_archive('videos') || is_singular('videos') ){ echo 'active'; } ?>" href="<?php echo get_home_url(); ?>/videos" title="Vídeos">Vídeos</a></li>
                                        <li><a class="<?php if( is_post_type_archive('materiais') || is_singular('materiais') ){ echo 'active'; } ?>" href="<?php echo get_home_url(); ?>/materiais" title="Materiais">Materiais</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-3">
                        <form action="<?php echo get_home_url(); ?>" class="mini-search">
                            <input type="text" name="s" placeholder="BUSCA RÁPIDA">
                            <button type="submit">
                                <span class="material-icons-outlined">search</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-mobile">
            <div class="container">
                <span class="btn-menu-mobile btn-mobile"></span>
                <a>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico-mensagem.png" alt="">
                </a>
                <a href="<?php echo get_home_url(); ?>" class="logo-mobile">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-mobile-sescon-sp.png" alt="">
                </a>
                <span class="search-mobile">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico-search.png" alt="">
                </span>
                <a>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico-login.png" alt="">
                </a>
            </div>

            <nav class="nav nav-mobile">
                <span class="btn-close-nav btn-mobile">X</span>
                <ul>

                    <?php 
                        $array_menu = wp_get_nav_menu_items('header');
                        foreach ($array_menu as $item) {
                            if (empty($m->menu_item_parent)) { ?>

                                <li>
                                    <a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>" data-text="<?php echo substr($item->title, strrpos($item->title, ' ') + 1); ?>"> 
                                        <?php 
                                            $a_nav = explode(' ', $item->title);
                                            $a_count = count($a_nav)-1;
                                            if(count($a_nav) > 1){
                                                echo '<span>';
                                                    for($i=0; $i < $a_count; $i++){
                                                        echo $a_nav[$i] . ' ';
                                                    }
                                                echo '</span>';
                                                echo $a_nav[$a_count];
                                            }else{
                                                echo $item->title;
                                            }
                                        ?>
                                    </a>
                                </li>

                            <?php }
                        }
                    ?>

                </ul>
            </nav>
        </div>
	</header>