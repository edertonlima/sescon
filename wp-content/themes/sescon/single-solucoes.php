
<?php get_header(); ?>

<main class="bg-default bg-style-1">

<?php if( have_posts() ){
    while ( have_posts() ) : the_post(); ?>

        <?php
            $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
            $imagem = $imagem_array[0];
        ?>

        <section class="box-section box-section--image box-section--header-page box-section--header-single-solucoes" style="background-image: url('<?php echo $imagem; ?>');">
            <div class="container">
                <div class="titulos">
                    <span class="subtitulo"><?php the_field('subtitulo');?></span>
                    <h1><?php the_title(); ?></h1>
                </div>

                <ul class="breadcrumb">
                    <li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
                    <li><a href="<?php echo get_home_url(); ?>/solucoes" title="Soluções">Soluções</a></li>
                    <li><span><?php the_title(); ?></span></li>
                </ul>
            </div>
        </section>

        <section class="box-section box-section-content-txt">
            <div class="container">
                <div class="row">

                    <div class="col-6">
                        <div class="content-txt page-padrao content-center">
                            <p><?php the_field('conteudo'); ?></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <img src="<?php the_field('imagem-principal'); ?>" alt="<?php the_title(); ?>" class="img-principal">
                    </div>

                </div>
            </div>
        </section>

        <?php get_template_part( 'content/tab' ); ?>  

        <?php get_template_part( 'content/faq' ); ?>

        <?php get_template_part( 'content/perfis' ); ?>    

        <?php get_template_part( 'content/banner-destaque' ); ?>

    <?php endwhile;
} ?>

</main>

<?php get_footer(); ?>