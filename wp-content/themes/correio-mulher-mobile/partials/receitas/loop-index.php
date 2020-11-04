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
        <?php
        $terms = wp_get_post_terms($post->ID, 'categoria-receita', array("fields" => "names"));

        $category = is_array($terms) ? array_shift($terms) : "";

        if ($category):
            ?>
            <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <!-- Alterar propriedade background conforme a cor do programa RECEITAS-->
                <p class="lt-headline-label" style="background:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;"><?php echo wp_trim_words($category, 5); ?></p>
                <h4 class="title"><?php echo wp_trim_words(get_the_title(), 8); ?></h4>
            </a>
        <?php endif; ?>
    </div>
</li>