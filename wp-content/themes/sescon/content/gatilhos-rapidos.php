<?php if( have_rows('item-gatilhos-rapidos','option') ): ?>
    <section class="box-section <?php if(!get_field('mobile-gatilhos-rapidos','option')){ echo 'no-mobile'; } ?>">
        <div class="container">
            <span class="sub-titulo">Gatilhos Rápidos</span>
            <h2><?php the_field('titulo-gatilhos-rapidos','option'); ?></h2>

            <div class="slide-ico-tit slide-pequeno" id="slide-ico-tit">

                <?php while( have_rows('item-gatilhos-rapidos','option') ) : the_row(); ?>

                    <div class="item">
                        <a href="<?php the_sub_field('link-item-gatilhos-rapidos'); ?>" title="<?php the_sub_field('titulo-item-gatilhos-rapidos'); ?>" <?php if(get_sub_field('nova-aba-item-gatilhos-rapidos')){ echo 'target="_blanck"'; } ?> style="<?php if(!get_sub_field('titulo-item-gatilhos-rapidos')){ echo "background-image: url('" . get_sub_field('imagem-item-gatilhos-rapidos') . "')"; } ?>">
                            <?php if(get_sub_field('titulo-item-gatilhos-rapidos')){ ?>
                                <div class="item-img">
                                    <img src="<?php the_sub_field('imagem-item-gatilhos-rapidos'); ?>" alt="<?php the_sub_field('titulo-item-gatilhos-rapidos'); ?>">
                                </div>
                                <h3><?php the_sub_field('titulo-item-gatilhos-rapidos'); ?></h3>
                            <?php } ?>
                        </a>
                    </div>

                <?php endwhile; ?>
                                
            </div>
        </div>
    </section>
<?php endif; ?>