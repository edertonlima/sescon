<?php /*
    $query = array(
        'post_type' => 'banner-destaque'
    );
    query_posts( $query );        
    if( have_posts() ){ ?>

        <section class="box-section">
            <div class="container">
                <div class="slide-destaque" id="slide-destaque">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php
                            $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
                            $imagem = $imagem_array[0];
                        ?>
                        <a href="<?php the_field('link-banner'); ?>" class="item" style="background-image: url('<?php echo $imagem; ?>');"></a>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </div>
            </div>
        </section>

    <?php }*/
?>


<?php if( have_rows('banner-destaque') ): ?>
    <section class="box-section">
        <div class="container">
            <div class="slide-destaque" id="slide-destaque">

                <?php while( have_rows('banner-destaque') ) : the_row(); ?>
                    <a href="<?php the_sub_field('link'); ?>" class="item">
                        <picture>
                            <source media="(max-width: 1024px)" srcset="<?php the_sub_field('imagem-mobile'); ?>">
                            <img src="<?php the_sub_field('imagem-desktop'); ?>" alt="">
                        </picture>
                    </a>
                <?php endwhile; ?>

            </div>
        </div>
    </section>
<?php endif; ?>