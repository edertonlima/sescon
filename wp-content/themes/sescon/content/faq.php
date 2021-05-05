<?php if( have_rows('faq') ): ?>
    <section class="box-section box-section-faq">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="margin-min"><?php the_field('titulo-faq'); ?></h2>

                    <ul class="faq">
                        <?php 
                            $faq = 1;
                            while( have_rows('faq') ) : the_row(); ?>
                                <li>
                                    <h3 class="<?php if($faq == 1){ echo 'active'; } ?>"><?php the_sub_field('titulo'); ?></h3>
                                    <p style="<?php if($faq == 1){ echo 'display: block;'; } ?>"><?php the_sub_field('texto'); ?></p>
                                </li>
                            <?php $faq++;
                            endwhile;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>