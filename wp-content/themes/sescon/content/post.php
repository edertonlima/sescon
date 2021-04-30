<?php
    $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($posts->ID), '' );
    $imagem = $imagem_array[0];
?>

<div class="col-3">
    <a href="<?php the_permalink(); ?>" class="cards cards--destaque" style="background-image: url('<?php echo $imagem; ?>');">
        <?php if(get_field('icone')){ ?>
            <div class="img-cards">
                <img src="<?php the_field('icone'); ?>" alt="<?php the_title(); ?>">
            </div>
        <?php } ?>
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
        <h3><?php the_title(); ?></h3>
    </a>
</div>