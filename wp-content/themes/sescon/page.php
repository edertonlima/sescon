<?php get_header(); ?>

<?php if( have_posts() ){
    while ( have_posts() ) : the_post(); ?>

        <?php
            $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
            $imagem = $imagem_array[0];
        ?>

        <section class="box-section box-section--image box-section--header-page box-section--header-page-padrao" style="background-image: url('<?php echo $imagem; ?>');">
            <div class="container">
                <div class="titulos">
                    <span class="subtitulo"><?php the_field('subtitulo');?></span>
                    <h1><?php the_title(); ?></h1>
                </div>

                <ul class="breadcrumb">
                    <li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
                    <li><span><?php the_title(); ?></span></li>
                </ul>
            </div>
        </section>

        <section class="box-section no-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <img class="img-destaque-page-simple" src="<?php the_field('imagem_principal'); ?>" alt="">
                        <div class="content-txt">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php //get_template_part( 'content/banner' ); ?>
        
        <?php get_template_part( 'content/banner-destaque' ); ?>

    <?php endwhile;
} ?>

<?php get_footer(); ?>