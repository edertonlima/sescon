

<?php get_header(); ?>

<main class="bg-default bg-style-1">

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
            </div>
        </section>
        
        <section class="box-section no-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <img class="img-destaque-page-simple" style="margin-bottom: 0px;" src="<?php the_field('imagem-principal'); ?>" alt="<?php the_title(); ?>">
                        <ul class="breadcrumb simple">
                            <li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
                            <li><a href="<?php echo get_home_url(); ?>/iniciativas" title="Soluções">Iniciativas</a></li>
                            <li><span><?php the_title(); ?></span></li>
                        </ul>
                        <div class="content-default">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php get_template_part( 'content/banner-destaque' ); ?>

        <?php if( have_rows('tab') ): ?>
            <section class="box-section box-section-tab">
                <div class="container">
                    <?php if(get_field('titulo-principal-tab')){ ?>
                        <h2 class="margin-min"><?php the_field('titulo-principal-tab'); ?></h2>
                    <?php } ?>
                    <div class="row">
                        <div class="col-3">
                            <ul class="btn-tab links-banner">
                                <?php 
                                    $tab = 1;
                                    while( have_rows('tab') ) : the_row(); ?>
                                        <li var-tab="tab-<?php echo $tab; ?>" class="<?php if($tab == 1){ echo 'destaque'; } ?>"><a><?php the_sub_field('titulo'); ?></a></li>
                                        <?php 
                                        $tab++;
                                    endwhile;
                                ?>
                            </ul>
                        </div>
                        <div class="col-9">
                            <?php
                                $tab = 1; 
                                while( have_rows('tab') ) : the_row(); ?>
                                    <div class="content-tab <?php if($tab == 1){ echo 'active'; } ?>" id="tab-<?php echo $tab; ?>">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="content-txt">
                                                    <h3><?php the_sub_field('titulo'); ?></h3>
                                                    <?php the_sub_field('texto'); ?>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('titulo'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                $tab++;
                                endwhile;
                            ?>
                        </div>
    
                    </div>
                </div>
            </section>
        <?php endif; ?> 

        <?php get_template_part( 'content/faq' ); ?>

    <?php endwhile;
} ?>

</main>

<?php get_footer(); ?>