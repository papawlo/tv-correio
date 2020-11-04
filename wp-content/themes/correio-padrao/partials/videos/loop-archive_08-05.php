<li class="lt-top-stories-item">
    <div class="storie">
        <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <figure>
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail("thumb-360x229");
                } else {
                    echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-360x229', false);
                }
                ?>
            </figure>
        </a>
        <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <!-- Alterar propriedade background conforme a cor do programa -->
            <!--<p class="lt-headline-label" style="background:#d8248f;">Moda</p>-->
            <h4 class="title"><?php the_title(); ?></h4>
        </a>
    </div>
</li>
