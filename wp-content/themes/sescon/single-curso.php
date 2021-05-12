
<?php get_header(); ?>

<?php if( have_posts() ){
    while ( have_posts() ) : the_post(); ?>

        <?php
            $imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
            $imagem = $imagem_array[0];

            $category = wp_get_post_terms( $post->ID, 'categoria_curso' )[0];
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
                    <div class="col-3"></div>
                    <div class="col-6">
                        <?php if(get_field('imagem-principal')){ ?>
                            <img class="img-destaque-page-simple" src="<?php the_field('imagem-principal'); ?>" alt="<?php the_title(); ?>">
                        <?php } ?>
                        <ul class="breadcrumb simple">
                            <li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
                            <li><a href="<?php echo get_home_url(); ?>/curso" title="Curso">Curso</a></li>
                            <li><a href="<?php echo get_category_link( $category->term_id ); ?>" title="<?php echo $category->name; ?>"><?php echo $category->name; ?></a></li>
                            <li><span><?php the_title(); ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="box-section no-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="content-txt page-padrao content-txt--curso">
                            <?php if(get_field('subtitulo-perfil')){ ?><span class="sub-titulo"><?php the_field('subtitulo-perfil'); ?></span><?php } ?>
                            <?php if(get_field('titulo-perfil')){ ?><h2><?php the_field('titulo-perfil'); ?></h2><?php } ?>
                            <?php if(get_field('texto-perfil')){ ?><p><?php the_field('texto-perfil'); ?></p><?php } ?>
                        </div>
                    </div>

                    <div class="col-4">                    
                        <div class="shortcode form-bg-branco">  
                            <?php echo do_shortcode(get_field('shortcode')); ?>
                        </div>    
                    </div>
                </div>
            </div>
        </section>

        <?php //get_template_part( 'content/banner-simples' ); ?>

        <?php //get_template_part( 'content/blocos-conteudo' ); ?>

        <?php //get_template_part( 'content/solicitar-apresentacao' ); ?>

        <?php get_template_part( 'content/tab' ); ?>

        <?php get_template_part( 'content/faq' ); ?>    

        <?php get_template_part( 'content/banner-destaque' ); ?>

    <?php endwhile;
} ?>

<?php get_footer(); ?>