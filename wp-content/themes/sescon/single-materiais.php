<?php get_header(); ?>

<?php if( have_posts() ){
    while ( have_posts() ) : the_post(); ?>

        <?php
            $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
            $imagem = $imagem_array[0];

            $category = wp_get_post_terms( $post->ID, 'category' )[0];
        ?>

        <section class="box-section box-section--image box-section--header-page" style="background-image: url('<?php echo $imagem; ?>');">
            <div class="container">
                <span class="subtitulo"><?php the_field('subtitulo');?></span>
                <h1><?php the_title(); ?></h1>
            </div>
        </section>

        <section class="box-section no-padding-top">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
                    <li><a href="<?php echo get_home_url(); ?>/materiais" title="Materiais">Materiais</a></li>
                    <li><span><?php the_title(); ?></span></li>
                </ul>

                <div class="row">
                    <div class="col-8">
                        <div class="content-txt">
                            <?php the_content(); ?>
                        </div>
                        <a href="<?php the_field('materiais'); ?>" title="Fazer Download" class="btn btn-materiais" download>Fazer Download</a>
                    </div>
                    <div class="col-3">
                        <?php get_template_part( 'content/sidebar-category' ); ?>
                    </div>
                </div>
            </div>
        </section>

        <?php get_template_part( 'content/banner-destaque' ); ?>

    <?php endwhile;
} ?>

<?php get_footer(); ?>