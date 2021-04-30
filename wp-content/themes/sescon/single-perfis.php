
<?php get_header(); ?>

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
                    <li><a href="<?php echo get_home_url(); ?>/perfis" title="Perfis">Perfis</a></li>
                    <li><span><?php the_title(); ?></span></li>
                </ul>
            </div>
        </section>

        <section class="box-section box-section-content-txt">
            <div class="container">
                <div class="row">

                    <div class="col-6">
                        <div class="content-txt page-padrao">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <img src="<?php the_field('imagem_principal'); ?>" alt="<?php the_title(); ?>" class="img-principal">
                    </div>

                </div>
            </div>
        </section>

        <?php if( have_rows('acordeao') ): ?>
            <section class="box-section box-section-acordeon">
                <div class="container">
                    <div class="row">

                        <?php if(get_field('titulo-principal-acordeao')){ ?>
                            <div class="col-12">
                                <h2 class="margin-min"><?php the_field('titulo-principal-acordeao'); ?></h2>
                            </div>
                        <?php } ?>
                        <div class="col-3">
                            <ul class="btn-acordeon links-banner">
                                <?php 
                                    $acordion = 1;
                                    while( have_rows('acordeao') ) : the_row(); ?>
                                        <li var-acordion="acordion-<?php echo $acordion; ?>" class="<?php if($acordion == 1){ echo 'destaque'; } ?>"><a><?php the_sub_field('titulo'); ?></a></li>
                                        <?php 
                                        $acordion++;
                                    endwhile;
                                ?>
                            </ul>
                        </div>
                        <div class="col-9">
                            <?php
                                $acordion = 1; 
                                while( have_rows('acordeao') ) : the_row(); ?>
                                    <div class="content-acordeon" id="acordion-<?php echo $acordion; ?>">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="content-txt">
                                                    <p><?php the_sub_field('texto'); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('titulo'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                $acordion++;
                                endwhile;
                            ?>
                        </div>

                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if( have_rows('faq') ): ?>
            <section class="box-section box-section-faq">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="margin-min"><?php the_field('titulo-faq'); ?></h2>

                            <ul class="faq">
                                <?php 
                                    $faq = 1;
                                    while( have_rows('faq') ) : the_row(); ?>
                                        <li>
                                            <h3 class="<?php if($faq == 1){ echo 'active'; } ?>"><?php the_sub_field('titulo'); ?></h3>
                                            <p style="<?php if($faq == 1){ echo 'display: block;'; } ?>"><?php the_sub_field('texto'); ?></p>
                                        </li>
                                    <?php $faq++;
                                    endwhile;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php get_template_part( 'content/perfis' ); ?>    

        <?php get_template_part( 'content/banner-destaque' ); ?>

    <?php endwhile;
} ?>

<?php get_footer(); ?>