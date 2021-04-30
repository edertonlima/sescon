<?php 
    $query = array(
        'post_type' => 'banner'
    );
    query_posts( $query );        
    if( have_posts() ){ ?>

        <section class="box-section box-destaque-sescon no-padding-bottom">
            <div class="container">
                <?php if(get_field('titulo-banners','option')){ ?>
                    <span class="sub-titulo"><?php the_field('titulo-banners','option'); ?></span>
                <?php } ?>

                <?php if(get_field('subtitulo-banners','option')){ ?>
                    <h2><?php the_field('subtitulo-banners','option'); ?></h2>
                <?php } ?>

                <div class="slide-img-tit" id="slide-img-tit">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php
                            $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
                            $imagem = $imagem_array[0];
                        ?>
                        <a href="<?php the_field('link-banner'); ?>" class="item" style="background-image: url('<?php //echo $imagem; ?>');" title="<?php the_title(); ?>">
                            <img src="<?php echo $imagem; ?>" alt="<?php the_title(); ?>" class="img-slide">
                        </a>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </div>
            </div>
        </section>

        <?php /*
            <div class="item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/slide-img-2.jpg');">
                <h3>Ferramentas tecnológicas e recursos financeiros para a retomada dos negócios</h3>

                <div class="content-right">
                    <span>Re_tech SESCON-SP</span>
                    <a href="" title="SAIBA MAIS" class="btn btn-saiba-mais-2 style-2">
                        SAIBA MAIS
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico-right-2.png" alt="">
                    </a>
                </div>
            </div>
        */ ?>

    <?php }
?>