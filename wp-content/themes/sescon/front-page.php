
<?php get_header(); ?>

    <section class="box-section box-slide-home">
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <div id="dots-slide-home"></div>
                </div>
                <div class="col-3">
                    <ul class="links-banner">

                        <?php 
                            $array_menu = wp_get_nav_menu_items('menu banner home');
                            foreach ($array_menu as $item) { ?>

                                <li class="<?php if(get_field('menu-destaque', $item)){ echo 'destaque'; } ?>">
                                    <a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>"> 
                                        <?php echo $item->title; ?>
                                    </a>
                                </li>

                                <?php
                            }
                        ?>

                    </ul>
                </div>
            </div>
        </div>

        <?php if( have_rows('slide-principal') ): 
            $playerVideo = false; ?>
            <div class="slide-home" id="slide-home">
                <?php while( have_rows('slide-principal') ) : the_row(); ?>
                
                    <div class="item">
                        <?php if(get_sub_field('video-slide-principal')){
                            $playerVideo = true; ?>
                            <div class="embed-container">
                                <?php
                                    $video = get_sub_field( 'video-slide-principal' );

                                    preg_match('/src="(.+?)"/', $video, $matches_url );
                                    $src = $matches_url[1];	

                                    preg_match('/embed(.*?)?feature/', $src, $matches_id );
                                    $id = $matches_id[1];
                                    $id = str_replace( str_split( '?/' ), '', $id );
                                ?>

                                <video data-yt2html5="https://www.youtube.com/watch?v=<?php echo $id; ?>" autoplay="true" loop="true" muted="true"></video>

                             </div>
                        <?php }else{ ?>
                            <picture>
                                <source media="(max-width:1024px)" srcset="<?php the_sub_field('imagem-mobile-slide-principal'); ?>">
                                <img src="<?php the_sub_field('imagem-desk-slide-principal'); ?>" alt="">
                            </picture>
                        <?php } ?>
                    </div>

                <?php endwhile; ?>
            </div>

            <?php if($playerVideo){ ?>

                <script src="https://cdn.jsdelivr.net/gh/thelevicole/youtube-to-html5-loader@2.0.0/dist/YouTubeToHtml5.js"></script>
                <script>new YouTubeToHtml5();</script>

            <?php } ?>

        <?php endif; ?>
    </section>

    <?php get_template_part( 'content/gatilhos-rapidos' ); ?>

    <?php get_template_part( 'content/banner' ); ?>

    <?php if( have_rows('topico-home') ): ?>
        <section class="box-section box-destaque-sescon">
            <div class="container">
                <div class="row margin-top-30">
                    <?php while( have_rows('topico-home') ) : the_row(); ?>
                        <div class="col-4">
                            <div class="cards cards--style-1">
                                <div class="img-cards">
                                    <img src="<?php the_sub_field('icone'); ?>" alt="<?php the_sub_field('titulo'); ?>">
                                </div>
                                <h3><?php the_sub_field('titulo'); ?></h3>
                                <ul>

                                    <?php if( have_rows('topicos-item') ):
                                        while( have_rows('topicos-item') ) : the_row(); ?>

                                            <li><?php the_sub_field('titulo-item'); ?></li>

                                        <?php endwhile;
                                    endif; ?>
                                    
                                </ul>
                                <a href="<?php the_sub_field('link'); ?>" class="btn btn-cards" title="<?php the_sub_field('titulo-botao'); ?>"><?php the_sub_field('titulo-botao'); ?></a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php get_template_part( 'content/perfis' ); ?>    

    <?php get_template_part( 'content/banner-destaque' ); ?>

    <?php
    	$query = array(
            'posts_per_page' => 4,
			'post_type' => 'post'
		);
	    query_posts( $query );        
        if( have_posts() ){ ?>

            <section class="box-section box-portal-sescon-sp">
                <div class="container">
                    <span class="sub-titulo">Portal do SESCON-SP</span>
                    <h2>Dicas e Tendências</h2>

                    <div class="row list-post-destaque">
                        <?php 
                            while ( have_posts() ) : the_post(); 

                                $ultimos_posts[] = $post;

                            endwhile;
					        wp_reset_query();
                        ?>
                                
                        <div class="col-6">
                            <?php
                                $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($ultimos_posts[0]->ID), '' );
                                $imagem = $imagem_array[0];
                            ?>
                            <a href="<?php echo $ultimos_posts[0]->guid; ?>" class="cards cards--destaque" style="background-image: url('<?php echo $imagem; ?>');">
                                <div class="img-cards">
                                    <img src="<?php echo $imagem; ?>" alt="">
                                </div>
                                <span class="categoria">
                                    <?php
                                        $categorias = get_the_category($ultimos_posts[0]->ID);
                                        $i = 0;
                                        foreach($categorias as $categoria){
                                            if($i > 0){
                                                echo ', ';
                                            }
                                            echo $categoria->cat_name;
                                            $i++;
                                        }
                                    ?>
                                </span>
                                <h3><?php echo $ultimos_posts[0]->post_title; ?></h3>
                            </a>
                        </div>

                        <div class="col-6">
                            <?php
                                $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($ultimos_posts[1]->ID), '' );
                                $imagem = $imagem_array[0];
                            ?>
                            <a href="<?php echo $ultimos_posts[1]->guid; ?>" class="cards cards--destaque margin-bottom-col" style="background-image: url('<?php echo $imagem; ?>');">
                                <div class="img-cards">
                                    <img src="<?php echo $imagem; ?>" alt="">
                                </div>
                                <span class="categoria">
                                    <?php
                                        $categorias = get_the_category($ultimos_posts[1]->ID);
                                        $i = 0;
                                        foreach($categorias as $categoria){
                                            if($i > 0){
                                                echo ', ';
                                            }
                                            echo $categoria->cat_name;
                                            $i++;
                                        }
                                    ?>
                                </span>
                                <h3><?php echo $ultimos_posts[1]->post_title; ?></h3>
                            </a>

                            <div class="row">
                                <div class="col-6">
                                    <?php
                                        $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($ultimos_posts[2]->ID), '' );
                                        $imagem = $imagem_array[0];
                                    ?>
                                    <a href="<?php echo $ultimos_posts[2]->guid; ?>" class="cards cards--destaque" style="background-image: url('<?php echo $imagem; ?>');">
                                        <div class="img-cards">
                                            <img src="<?php echo $imagem; ?>" alt="">
                                        </div>
                                        <span class="categoria">
                                            <?php
                                                $categorias = get_the_category($ultimos_posts[2]->ID);
                                                $i = 0;
                                                foreach($categorias as $categoria){
                                                    if($i > 0){
                                                        echo ', ';
                                                    }
                                                    echo $categoria->cat_name;
                                                    $i++;
                                                }
                                            ?>
                                        </span>
                                        <h3><?php echo $ultimos_posts[2]->post_title; ?></h3>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <?php
                                        $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($ultimos_posts[3]->ID), '' );
                                        $imagem = $imagem_array[0];
                                    ?>
                                    <a href="<?php echo $ultimos_posts[3]->guid; ?>" class="cards cards--destaque" style="background-image: url('<?php echo $imagem; ?>');">
                                        <div class="img-cards">
                                            <img src="<?php echo $imagem; ?>" alt="">
                                        </div>
                                        <span class="categoria">
                                            <?php
                                                $categorias = get_the_category($ultimos_posts[3]->ID);
                                                $i = 0;
                                                foreach($categorias as $categoria){
                                                    if($i > 0){
                                                        echo ', ';
                                                    }
                                                    echo $categoria->cat_name;
                                                    $i++;
                                                }
                                            ?>
                                        </span>
                                        <h3><?php echo $ultimos_posts[3]->post_title; ?></h3>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        <?php }
    ?>

    <?php
    	$query = array(
            'posts_per_page' => 4,
			'post_type' => 'videos'
		);
	    query_posts( $query );        
        if( have_posts() ){ ?>

            <section class="box-section box-post-video">
                <div class="container">
                    <h2 class="traco">Vídeo</h2>

                    <div class="row">
                        <?php while ( have_posts() ) : the_post(); ?>

                            <div class="col-3">
                                <a href="<?php the_permalink(); ?>" class="list-post list-post-video" title="<?php the_title(); ?>">
                                    <div class="item-img">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-video-1.jpg" alt="<?php the_title(); ?>">
                                    </div>
                                    <span><?php echo get_the_date(); ?></span>
                                    <h3><?php the_title(); ?></h3>
                                </a>
                            </div>

                        <?php endwhile;
					    wp_reset_query(); ?>

                    </div>
                </div>
            </section>

        <?php }
    ?>


    <?php
    	$query = array(
            'posts_per_page' => 4,
			'post_type' => 'noticias'
		);
	    query_posts( $query );        
        if( have_posts() ){ ?>

            <section class="box-section box-post-noticias">
                <div class="container">
                    <h2 class="traco">notícias</h2>

                    <div class="row">
                        <?php while ( have_posts() ) : the_post();

                            get_template_part( 'content/noticia' );

                        endwhile;
					    wp_reset_query(); ?>
                    </div>

                </div>
            </section>

        <?php }
    ?>

<?php
    	$query = array(
            'posts_per_page' => 3,
			'post_type' => 'materiais'
		);
	    query_posts( $query );        
        if( have_posts() ){ ?>

            <section class="box-section box-newsletter" style="background-image: url('<?php the_field('bg-materiais','option'); ?>');">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-9">
                            <div class="row">

                                <?php while ( have_posts() ) : the_post(); ?>

                                    <div class="col-4">
                                        <div class="cards cards--img">
                                            <div class="img-cards">
                                                <img src="<?php the_field('imagem-list'); ?>" alt="<?php the_title(); ?>">
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="btn btn-default" title="Saiba Mais">Saiba Mais</a>
                                        </div>
                                    </div>

                                <?php endwhile;
                                wp_reset_query(); ?>

                            </div>
                        </div>
                        <div class="col-3">
                            <form action="" class="newsletter">
                                <span class="sub-titulo cor-branco">Assine e receba nossa</span>
                                <h2 class="cor-branco">Newsletter</h2>
                            
                                <fieldset>
                                    <input type="text" placeholder="Nome">
                                </fieldset>
                                <fieldset>
                                    <input type="text" placeholder="E-mail">
                                </fieldset>
                                <fieldset>
                                    <input type="text" placeholder="Cidade">
                                </fieldset>
                                <fieldset>
                                    <input type="text" placeholder="Assunto">
                                </fieldset>
                                <fieldset>
                                    <button type="submit" class="btn btn-full btn-enviar">CADASTRAR AGORA</button>
                                </fieldset>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
                            </form>
                        </div>

                    </div>
                </div>
            </section>

        <?php }
    ?>

    <section class="box-section no-padding box-canais-principais">
        <div class="container">
            <div class="row">
                <div class="col-8 padding-col-top flex-col-stretch">
                    <div class="bock-content">
                        <h2><?php the_field('titulo-bloco-home'); ?></h2>
                        <p><?php the_field('subtitulo-bloco-home'); ?></p>
                        <a href="<?php the_field('link-bloco-home'); ?>" class="btn btn-default-2" title="<?php the_field('titulo-botao-bloco-home'); ?>"><?php the_field('titulo-botao-bloco-home'); ?></a>
                    </div>
                    <div class="item-destaque">
                        <?php if(get_field('imagem-bloco-home')){ ?>
                            <img src="<?php the_field('imagem-bloco-home'); ?>" alt="">
                        <?php }else{
                            if(get_field('video-bloco-home')){
                                the_field('video-bloco-home');
                            }
                        } ?>
                    </div>
                </div>
                <div class="col-4 padding-col-top padding-col-bottom" style="background-color: #dfebf6">

                    <?php if( have_rows('cards-bloco-home') ):
                        while( have_rows('cards-bloco-home') ) : the_row(); ?>

                            <div class="cards cards--txt">
                                <div class="img-cards">
                                    <img src="<?php the_sub_field('icone'); ?>" alt="<?php the_sub_field('titulo'); ?>">
                                </div>
                                <h3><?php the_sub_field('titulo'); ?></h3>
                                <p><?php the_sub_field('texto'); ?></p>
                            </div>

                        <?php endwhile;
                    endif; ?>

                </div>
            </div>
        </div>
    </section>

    <section class="box-section no-padding box-canais-principais box-mobile">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <span class="sub-titulo"><?php the_field('titulo-canais-principais'); ?></span>
                    <h2 class="item-mobile"><?php the_field('subtitulo-canais-principais'); ?></h2>
                    <?php if(get_field('texto-canais-principais')){ ?>   
                        <p class="legenda-secundario"><?php the_field('texto-canais-principais'); ?></p>
                    <?php } ?>

                    <?php if( have_rows('item-canais-principais') ):
                        while( have_rows('item-canais-principais') ) : the_row(); ?>

                            <div class="cards cards--txt style-1" style="border-color: <?php the_sub_field('cor'); ?>">
                                <div class="img-cards">
                                    <img src="<?php the_sub_field('icone'); ?>" alt="">
                                </div>
                                <h3 style="color: <?php the_sub_field('cor'); ?>"><?php the_sub_field('titulo'); ?></h3>
                                <p><?php the_sub_field('texto'); ?></p>
                                <a href="<?php the_sub_field('url'); ?>" class="btn-link btn-institucional" title="Saiba mais" style="color: <?php the_sub_field('cor'); ?>">Saiba mais</a>
                            </div>

                        <?php endwhile;
                    endif; ?>
                    
                </div>
            </div>
        </div>
    </section>
    
    <?php 
        $images = get_field('slide-mobile-boco-home');
        if( $images ): ?>
            <section class="box-section slide-home-mobile">
                <div class="container">
                    <div class="slide-destaque" id="slide-home-mobile">
                        <?php foreach( $images as $image ): ?>
                            <div class="item" style="background-image: url('<?php echo $image; ?>"></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif;
    ?>

    <section class="box-section box-sescon-sp" style="background-color: #f8f6f6;">
        <div class="container">
            <div class="row">
                <div class="col-6 flex-col-center">
                    <span class="sub-titulo"><?php the_field('titulo-bloco-final'); ?></span>
                    <h2><?php the_field('subtitulo-bloco-final'); ?></h2>
                    <p><?php the_field('texto-bloco-final'); ?></p>
                    <?php if( have_rows('links-bloco-final') ):
                        while( have_rows('links-bloco-final') ) : the_row(); ?>
                            <a href="<?php the_sub_field('url'); ?>" class="btn-link btn-institucional btn-style-1" title="<?php the_sub_field('titulo'); ?>"><?php the_sub_field('titulo'); ?></a>
                        <?php endwhile;
                    endif; ?>
                </div>
                <div class="col-6">
                    <img src="<?php the_field('imagem-bloco-final'); ?>" class="img-block" alt="<?php the_field('titulo-bloco-final'); ?>">
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>