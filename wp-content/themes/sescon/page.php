<?php
/**
 * Template Name: Padrão
 */
?>
<?php get_header(); ?>

<?php if( have_posts() ){
    while ( have_posts() ) : the_post(); ?>

        <?php
            $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
            $imagem = $imagem_array[0];
        ?>

        <section class="box-section box-section--image box-section--header-page" style="background-image: url('<?php echo $imagem; ?>');">
            <div class="container">
                <span class="subtitulo"><?php the_field('subtitulo');?></span>
                <h1><?php the_title(); ?></h1>
            </div>
        </section>

        <section class="box-section">
            <div class="container">
                <div class="row">



                </div>
            </div>
        </section>

    <?php endwhile;
} ?>

<?php get_footer(); ?>