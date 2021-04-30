<?php
    $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($posts->ID), '' );
    $imagem = $imagem_array[0];
?>

    <div class="list-post list-post--vertical">
        <a href="<?php the_permalink(); ?>" class="list-post--vertical--img <?php if(get_post_type() == 'videos'){ echo 'list-post-video'; } ?>" title="<?php the_title(); ?>">
            <img src="<?php echo $imagem; ?>" alt="<?php the_title(); ?>">
            <?php if(get_field('icone')){ ?>
                <div class="img-cards">
                    <img src="<?php the_field('icone'); ?>" alt="<?php the_title(); ?>"> 
                </div>
            <?php } ?>
        </a>
        
        <div class="list-post--vertical--conteudo">
            <span class="categoria">
                <?php
                    $categorias = get_the_category($posts->ID);
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
            <h3>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
            <p><?php echo get_the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-list-post" title="<?php the_title(); ?>">
                SAIBA MAIS
            </a>
        </div>
    </div>