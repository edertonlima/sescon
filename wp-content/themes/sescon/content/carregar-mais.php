<?php
    global $category;

    $load_category = $category->term_id;
    $load_taxonomy = $category->taxonomy;
    $load_post_type = get_post_type();
?>

<?php if($load_post_type != 'materiais'){ ?>
    <div id="carregar-mais"></div>
<?php } ?>

<?php
    if($wp_query->max_num_pages > 1){ ?>
        <section class="box-content no-padding-top">
            <div class="container">

                <div class="center">
                    <button class="btn load-more btn-carregar-mais" var-url="<?php echo admin_url( 'admin-ajax.php' ); ?>" var-taxonomy="<?php echo $load_taxonomy; ?>" var-category="<?php echo $load_category; ?>" var-post-type="<?php echo $load_post_type; ?>" var-paged="2" var-max-paged="<?php echo $wp_query->max_num_pages; ?>">
                        Carregar Mais
                    </button>
                </div>			

            </div>
        </section>
    <?php }
    wp_reset_query();
?>