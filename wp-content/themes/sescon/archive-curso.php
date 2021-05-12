
<?php get_header(); ?>

<?php
    $category = get_queried_object();
?>

<section class="box-section box-section--header-page box-section--header-category">
    <div class="container">
        <h1>Curso</h1>
        <?php /* <p><?php the_field('descricao-curso','option'); ?></p> */ ?>
    </div>
</section>

<section class="box-section no-padding">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
            <li><span>Curso</span></li>
        </ul>
    </div>
</section>

<?php
    $args = array(
        'taxonomy'      	=> 'categoria_curso',
        'parent'        	=> 0,
        'orderby'       	=> 'name',
        'order'         	=> 'ASC',
        'hide_empty'      	=> true
    );
    $categories = get_categories( $args );  

    foreach ( $categories as $category ){ ?>                
        <section class="box-section box-post-noticias">
            <div class="container">

                <h2 class="traco"><?php echo $category->name; ?></h2>

                <?php
                    $query = array(
                        'posts_per_page' => 9999,
                        'post_type' => 'curso',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'categoria_curso',
                                'field' => 'term_id',
                                'terms' => $category->term_id,
                            )
                        )
                    );
                    query_posts( $query );        
                    if( have_posts() ){ ?>

                        <div class="row">
                            <?php while ( have_posts() ) : the_post();

                                get_template_part( 'content/noticia' );

                            endwhile;
                            wp_reset_query(); ?>
                        </div>

                    <?php }
                ?>

            </div>
        </section>  
    <?php }
?>      

<?php //get_template_part( 'content/perfis' ); ?>    

<?php get_footer(); ?>