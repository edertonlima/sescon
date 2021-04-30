<?php

    //$current_post = get_post_type( get_the_ID() );

    $query = array(
        'posts_per_page' => 4,
        'post_type' => 'post',
		'meta_key' => 'post_views_count',
		'orderby' => 'meta_value_num',
		'order' => 'DESC',
		/*'tax_query' => [
            [
                'taxonomy' => 'category',
                'terms'    => $postcat[0]->slug,
                'field'    => 'slug'
            ]
        ]*/
    );
    query_posts( $query );        
    if( have_posts() ){ ?>

        <section class="box-section">
            <div class="container">
                <h2 class="traco">Mais Vistos</h2>
                
                <div class="row">
                    
                    <?php while ( have_posts() ) : the_post();
                        get_template_part( 'content/post' );
                    endwhile;
                    wp_reset_query(); ?>

                </div>
            </div>
        </section>

    <?php }
?>