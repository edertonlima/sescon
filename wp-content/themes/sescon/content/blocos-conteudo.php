<?php if( have_rows('blocos-conteudo') ):
    while( have_rows('blocos-conteudo') ) : the_row(); ?>

        <section class="box-section box-section--blocos-conteudo">
            <img src="<?php the_sub_field('imagem'); ?>" class="img-blocos-conteudo <?php if(get_sub_field('posicao') == 'false'){ echo 'imagem-esquerda'; } ?>">
            <div class="container">
                <div class="row">
                    <?php if(get_sub_field('posicao') == 'false'){ ?>
                        <div class="col-6"></div>
                    <?php } ?>
                    <div class="col-6 <?php if(get_sub_field('posicao') == 'false'){ echo 'txt-esquerda'; } ?>">
                        <?php if(get_sub_field('subtitulo')){ ?>
                            <span class="sub-titulo"><?php the_sub_field('subtitulo'); ?></span>
                        <?php } ?>

                        <?php if(get_sub_field('titulo')){ ?>
                            <h2><?php the_sub_field('titulo'); ?></h2>
                        <?php } ?>

                        <?php if(get_sub_field('texto')){ ?>
                            <div class="content-txt">
                                <p><?php the_sub_field('texto'); ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>

    <?php endwhile;
endif; ?>