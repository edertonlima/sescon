<?php if(get_field('formulario-solicitar-apresentacao')){ ?>
    <section class="box-section box-section--solicitar-apresentacao">
        <img src="<?php the_field('imagem-solicitar-apresentacao'); ?>" class="img-solicitar-apresentacao">
        <img src="<?php the_field('bg-solicitar-apresentacao'); ?>" class="bg-solicitar-apresentacao">
        <div class="container">
            <div class="row">

                <div class="col-6">&nbsp;</div>
                <div class="col-6">                    
                    <?php echo do_shortcode(get_field('formulario-solicitar-apresentacao')); ?>
                </div>

            </div>
        </div>
    </section>
<?php } ?>