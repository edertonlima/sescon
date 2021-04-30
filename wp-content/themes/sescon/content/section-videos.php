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

                            <?php get_template_part( 'content/video' ); ?>

                        <?php endwhile;
					    wp_reset_query(); ?>

                    </div>
                </div>
            </section>

        <?php }
    ?>