<?php 
        $query = array(
            'posts_per_page' => 16,
			'post_type' => 'perfis'
		);
	    query_posts( $query );        
        if( have_posts() ){ ?>

            <section class="box-section box-qual-seu-perfil">
                <div class="container">
                    <div class="row">
                        <div class="col-5">
                            <h2 class="margin-min"><?php the_field('titulo-perfis','option'); ?></h2>
                            <p class="resumo"><?php the_field('subtitulo-perfis','option'); ?></p>
                            <?php if(get_field('texto-perfis','option')){ ?>
                                <p><?php the_field('texto-perfis','option'); ?></p>
                            <?php } ?>
                            <a href="<?php the_field('link-perfis','option'); ?>" class="btn btn-saba-mais btn-desktop">Saiba Mais</a>
                        </div>
                        <div class="col-7">
                            <div class="slide-ico-tit slide-ico-tit-2" id="slide-ico-tit-2">

                                <?php while ( have_posts() ) : the_post(); ?>

                                    <div>
                                        <div class="item" style="background-image: url('<?php the_field('imagem-list'); ?>');">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <h3><?php the_title(); ?></h3>
                                            </a>
                                        </div>
                                    </div>

                                <?php endwhile;
                                wp_reset_query(); ?>

                            </div>
                            <a href="<?php the_field('link-perfis','option'); ?>" class="btn btn-saba-mais btn-mobile">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </section>

        <?php }
    ?>