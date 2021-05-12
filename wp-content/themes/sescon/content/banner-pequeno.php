<?php if( have_rows('banner-pequeno') ): ?>

    <section class="box-section box-destaque-sescon no-padding-bottom">
        <div class="container">
            <?php if(get_field('titulo-banner-pequeno')){ ?>
                <span class="sub-titulo"><?php the_field('titulo-banner-pequeno'); ?></span>
            <?php } ?>

            <?php if(get_field('subtitulo-banner-pequeno')){ ?>
                <h2><?php the_field('subtitulo-banner-pequeno'); ?></h2>
            <?php } ?>

            <div class="slide-img-tit" id="slide-curso">
                <?php while( have_rows('banner-pequeno') ) : the_row(); ?>

                    <a href="<?php the_sub_field('link'); ?>" class="item">
                        <img src="<?php the_sub_field('imagem-desktop'); ?>" class="img-slide">
                    </a>

                <?php endwhile; ?>
            </div>
        </div>
    </section>

<?php endif; ?>