<?php while (have_posts()): the_post(); ?>
    <li class="lt-top-stories-item">
        <div class="storie">
            <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <figure>
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail("thumb-360x229");
                    } else {
                        //exibe imagem padrao
                        echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-360x229', false);
                    }
                    ?>
                </figure>
            </a>
            <?php if (get_the_term($post->ID, 'categoria-receita')): ?>
                <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <!-- Alterar propriedade background conforme a cor do programa -->
                    <p class="lt-headline-label" style="background:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;"><?php echo get_the_term($post->ID, 'categoria-receita'); ?></p>
                    <h4 class="title"><?php the_title(); ?></h4>
                </a>
            <?php endif; ?>
        </div>
    </li>
<?php endwhile; ?>