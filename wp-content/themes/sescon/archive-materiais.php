
<?php get_header(); ?>

<?php
    $category = get_queried_object();
?>

<section class="box-section box-section--header-page box-section--header-category">
    <div class="container">
        <h1>Materiais</h1>
        <p><?php the_field('descricao-materiais','option'); ?></p>
    </div>
</section>

<section class="box-section box-newsletter no-padding-top">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
            <li><span>Materiais</span></li>
        </ul>

        <div class="row">
            <div class="col-9">
                <div class="row" id="carregar-mais">
                    <?php if(have_posts()){
                        while ( have_posts() ) : the_post(); ?>

                            <div class="col-4">
                                <?php get_template_part( 'content/materiais' ); ?>
                            </div>

                        <?php endwhile;
                    } ?>
                </div>
                <?php get_template_part( 'content/carregar-mais' ); ?>
            </div>
            <div class="col-3">
                <?php get_template_part( 'content/sidebar-category' ); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'content/perfis' ); ?>    

<?php get_footer(); ?>