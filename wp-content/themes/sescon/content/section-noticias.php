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