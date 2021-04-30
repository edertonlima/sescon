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
                                        <?php get_template_part( 'content/materiais' ); ?>
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