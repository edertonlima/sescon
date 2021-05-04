
<?php get_header(); ?>

<?php
    $category = get_queried_object();
?>

<section class="box-section box-section--header-page box-section--header-category">
    <div class="container">
        <h1>Perfis</h1>
        <?php /* <p><?php the_field('descricao-materiais','option'); ?></p> */ ?>
    </div>
</section>

<section class="box-section box-qual-seu-perfil no-padding-top">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
            <li><span>Perfis</span></li>
        </ul>

        <div class="row">
            <div class="col-12">
                <div class="row" id="carregar-mais">
                    <?php if(have_posts()){
                        while ( have_posts() ) : the_post(); ?>

                            <div class="col-3">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item-perfil" style="background-image: url('<?php the_field('imagem-list'); ?>');">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                            </div>

                        <?php endwhile;
                    } ?>
                </div>
                <?php get_template_part( 'content/carregar-mais' ); ?>
            </div>
            <?php /* <div class="col-3">
                <?php get_template_part( 'content/sidebar-category' ); ?>
            </div> */ ?>
        </div>
    </div>
</section>

<?php //get_template_part( 'content/perfis' ); ?>    

<?php get_footer(); ?>