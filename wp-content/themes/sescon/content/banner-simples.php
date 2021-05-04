      
    <?php if( have_rows('banner-simples') ): ?>

        <section class="box-section box-destaque-sescon">
            <div class="container">

                <div class="slide-img-tit" id="slide-img-tit">
                    <?php while( have_rows('banner-simples') ) : the_row(); ?>
                        <a href="<?php the_sub_field('link'); ?>" class="item">
                            <img src="<?php the_sub_field('imagem-desktop'); ?>" class="img-slide">
                        </a>
                    <?php endwhile; ?>
                </div>

            </div>
        </section>

    <?php endif; ?>