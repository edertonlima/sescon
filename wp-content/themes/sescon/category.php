
<?php get_header(); ?>

<?php
    $category = get_queried_object();
?>

<section class="box-section box-section--header-page box-section--header-category">
    <div class="container">
        <h1><?php echo $category->name; ?></h1>
        <p><?php echo $category->description; ?></p>
    </div>
</section>

<section class="box-section no-padding-top">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
            <li><span><?php echo $category->name; ?></span></li>
        </ul>

        <div class="row">
            <div class="col-3">
                <?php get_template_part( 'content/anuncio-vertical' ); ?>
            </div>
            <div class="col-6"> 
                <?php if(have_posts()){
                    while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content/post-list' ); ?>
                    <?php endwhile;

                    get_template_part( 'content/carregar-mais' );
                } ?>
            </div>
            <div class="col-3">
                <?php get_template_part( 'content/sidebar-category' ); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'content/perfis' ); ?>    

<?php get_footer(); ?>