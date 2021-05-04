<?php if( have_rows('banner-destaque') ): ?>
    <section class="box-section">
        <div class="container">
            <div class="slide-destaque" id="slide-destaque">

                <?php while( have_rows('banner-destaque') ) : the_row(); ?>
                    <a href="<?php the_sub_field('link'); ?>" class="item">
                        <picture>
                            <source media="(max-width: 1024px)" srcset="<?php the_sub_field('imagem-mobile'); ?>">
                            <img src="<?php the_sub_field('imagem-desktop'); ?>" alt="">
                        </picture>
                    </a>
                <?php endwhile; ?>

            </div>
        </div>
    </section>
<?php endif; ?>