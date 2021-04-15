
<?php get_header(); ?>

<section class="box-section box-section--image box-section--header-page" style="background-image: url('https://ederton.com.br/preview/sescon/wp-content/uploads/2021/03/bg-page.jpg');">
    <div class="container">
        <span class="subtitulo">Sua Busca:</span>
        <h1><?php echo $_GET['s']; ?></h1>
    </div>
</section>

<section class="box-section">
    <div class="container">
        <div class="row">

            <?php if( have_posts() ){
                while ( have_posts() ) : the_post();

                    get_template_part( 'content/search' );

                endwhile;
            } ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>