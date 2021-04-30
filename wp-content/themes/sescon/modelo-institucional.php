<?php
/**
 * Template Name: Modelo Institucional
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

        <section class="box-section no-padding-top">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
                    <li><span><?php the_title(); ?></span></li>
                </ul>

                <div class="row">
                    <div class="col-8">
                        <div class="content-txt">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="sidebar">
                            <h3>navegação | <strong>Institucional</strong></h3>
                            <ul>
                                <?php
                                    $pages = get_pages(array(
                                        'meta_key' => '_wp_page_template',
                                        'meta_value' => 'modelo-institucional.php'
                                    ));

                                    foreach($pages as $page){ ?>
                                        <li>
                                            <a class="<?php if($post->ID == $page->ID){ echo 'active'; } ?>" href="<?php echo get_permalink($page->ID); ?>" title="<?php echo $page->post_title; ?>">
                                                <?php echo $page->post_title; ?>
                                            </a>
                                        </li>
                                    <?php }
                                ?>
                            </ul>

                            <?php
                                $query = array(
                                    'posts_per_page' => 1,
                                    'post_type' => 'voce-sabia',
                                    'orderby' => 'rand',
                                    'order' => 'ASC'
                                );
                                query_posts( $query );        
                                if( have_posts() ){ ?>
                                    <div class="voce-sabia">
                                        <h3>Você Sabia?</h3>
                                        <span>
                                            <?php 
                                                while ( have_posts() ) : the_post(); 

                                                    the_title();

                                                endwhile;
                                                wp_reset_query();
                                            ?>    
                                        </span>
                                    </div>
                                <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php get_template_part( 'content/banner-destaque' ); ?>

    <?php endwhile;
} ?>

<?php get_footer(); ?>