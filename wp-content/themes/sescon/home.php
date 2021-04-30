
<?php get_header(); ?>

<?php
    $category = get_queried_object();
?>

<section class="box-section box-section--home"></section>

<section class="box-section no-padding-top">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="<?php echo get_home_url(); ?>" title="Home">Home</a></li>
            <li><span><?php the_title(); ?></span></li>
        </ul>

        <div class="row row-content-portal row-content-portal--destaque">
            <div class="col-6">
                <div class="slide-blog">
                    <?php
                        $query = array(
                            'posts_per_page' => 4,
                            'post_type' => 'post'
                        );
                        query_posts( $query );        
                        if( have_posts() ){ ?>

                            <?php while ( have_posts() ) : the_post(); ?>
                                <div class="item">
                                    <?php get_template_part( 'content/post' ); ?>
                                </div>
                            <?php endwhile;
                            wp_reset_query(); ?>

                        <?php }
                    ?>
                </div>
            </div>

            <?php
                $query = array(
                    'posts_per_page' => 2,
                    'post_type' => 'videos'
                );
                query_posts( $query );        
                if( have_posts() ){ ?>

                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content/video' ); ?>
                    <?php endwhile;
                    wp_reset_query(); ?>

                <?php }
            ?>
        </div>
        <div class="row row-content-portal">
            <?php
                $query = array(
                    'posts_per_page' => 4,
                    'post_type' => 'post',
                    'offset' => '4'
                );
                query_posts( $query );        
                if( have_posts() ){ ?>

                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content/post' ); ?>
                    <?php endwhile;
                    wp_reset_query(); ?>

                <?php }
            ?>
        </div>

        <?php
            $query = array(
                'posts_per_page' => 4,
                'post_type' => 'post',
                'offset' => '8'
            );
            query_posts( $query );        
            if( have_posts() ){ ?>

                <div class="row row-content-portal">
                    <div class="col-3">
                        <?php get_template_part( 'content/anuncio-vertical' ); ?>
                    </div>
                    <div class="col-6">                
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'content/post-list' ); ?>
                        <?php endwhile;
                        wp_reset_query(); ?>
                    </div>
                    <div class="col-3">
                        <?php get_template_part( 'content/sidebar-category' ); ?>
                    </div>
                </div>

            <?php }
        ?>
    </div>
</section>

<?php get_template_part( 'content/section-videos' ); ?>
<?php get_template_part( 'content/section-noticias' ); ?>    
<?php get_template_part( 'content/section-materiais' ); ?>

<?php get_template_part( 'content/section-mais-vistos' ); ?>

<?php get_footer(); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $('.slide-blog').slick({
            dots: false,
            arrows: true,
            prevArrow: '<div class="slick-prev"><div class="arrow-ico"><span class="material-icons-outlined">west</span></div></div>',
            nextArrow: '<div class="slick-next"><div class="arrow-ico"><span class="material-icons-outlined">east</span></div></div>',
            infinite: false,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1
        }); 
    });
</script>  