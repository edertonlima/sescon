<div class="col-4">   
    <a href="<?php the_permalink(); ?>" class="list-post list-post--search" title="<?php the_title(); ?>">
        <?php 
            $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
            $imagem = $imagem_array[0];

            if($imagem){ ?>
                <div class="item-img">
                    <img src="<?php echo $imagem; ?>" alt="<?php the_title(); ?>">
                </div>
            <?php }
        ?>
        <h3><?php the_title(); ?></h3>
    </a>
</div>