        <?php if( have_rows('tab') ): ?>
            <section class="box-section box-section-tab">
                <div class="container">
                    <div class="row">

                        <?php if(get_field('titulo-principal-tab')){ ?>
                            <div class="col-12">
                                <h2 class="margin-min"><?php the_field('titulo-principal-tab'); ?></h2>
                            </div>
                        <?php } ?>
                        <div class="col-3">
                            <ul class="btn-tab links-banner">
                                <?php 
                                    $tab = 1;
                                    while( have_rows('tab') ) : the_row(); ?>
                                        <li var-tab="tab-<?php echo $tab; ?>" class="<?php if($tab == 1){ echo 'destaque'; } ?>"><a><?php the_sub_field('titulo'); ?></a></li>
                                        <?php 
                                        $tab++;
                                    endwhile;
                                ?>
                            </ul>
                        </div>
                        <div class="col-9">
                            <?php
                                $tab = 1; 
                                while( have_rows('tab') ) : the_row(); ?>
                                    <div class="content-tab" id="tab-<?php echo $tab; ?>">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="content-txt">
                                                    <p><?php the_sub_field('texto'); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('titulo'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                $tab++;
                                endwhile;
                            ?>
                        </div>

                    </div>
                </div>
            </section>
        <?php endif; ?>