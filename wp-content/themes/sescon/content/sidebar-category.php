<?php 
    global $category;
    $category_ID = $category->term_id;
?>
<aside class="aside">
    <div class="sidebar">
        <h3>Portal | <strong>Categorias</strong></h3>
        <ul>
            <?php
                $args = array(
                    'taxonomy'      	=> 'category',
                    'parent'        	=> 0,
                    'orderby'       	=> 'name',
                    'order'         	=> 'ASC',
                    'hide_empty'      	=> true
                );
                $categories = get_categories( $args );  

                foreach ( $categories as $category ){ ?>                
                    <li>
                        <a class="<?php if($category_ID == $category->term_id){ echo 'active'; } ?>" href="<?php echo get_term_link($category->term_id); ?>" title="<?php echo $category->name; ?>">
                            <?php echo $category->name; ?>
                        </a>
                    </li>
                <?php }
            ?>
            <li><a class="<?php if( is_post_type_archive('noticias') || is_singular('noticias') ){ echo 'active'; } ?>" href="<?php echo get_home_url(); ?>/noticias" title="Notícias">Notícias</a></li>
            <li><a class="<?php if( is_post_type_archive('videos') || is_singular('videos') ){ echo 'active'; } ?>" href="<?php echo get_home_url(); ?>/videos" title="Vídeos">Vídeos</a></li>
            <li><a class="<?php if( is_post_type_archive('materiais') || is_singular('materiais') ){ echo 'active'; } ?>" href="<?php echo get_home_url(); ?>/materiais" title="Materiais">Materiais</a></li>
        </ul>
    </div>

    <?php if( is_active_sidebar( 'categorias' ) ) :        
        dynamic_sidebar( 'categorias' );    
    endif; ?>
</aside>