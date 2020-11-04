<?php global $the_query; ?>
<div class="lt-top-receitas-main">
    <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
        <div class="receita">
            <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <figure class="image">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail("thumb-360x310");
                    } else {
                        //exibe imagem padrao
                        echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-360x310', false);
                    }
                    ?>
                    <?php // the_post_thumbnail('thumb-360x310'); ?>
                </figure>
            </a>
            <!-- Alterar a propriedade border-bottom-color conforme a cor do programa -->
            <div class="info" style="border-bottom-color:<?php echo get_theme_mod('color_setting', '#000'); ?>;">
                <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <!-- Alterar a propriedade background conforme a cor do programa -->
                    <p class="lt-headline-label" style="background:<?php echo get_theme_mod('color_setting', '#000'); ?>;"><?php echo get_the_term($post->ID, 'categoria-receita'); ?></p>
                    <h4 class="title"><?php the_title(); ?></h4>
                </a>
            </div>
        </div>
        <?php
        break;
    endWhile;
    ?>
</div>
<ul class="lt-top-receitas-list">
    <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
        <li class="lt-top-receitas-item">
            <div class="receita">
                <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <figure class="image">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail("thumb-165x216");
                        } else {
                            //exibe imagem padrao
                            echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-165x216', false);
                        }
                        ?>
                    </figure>
                </a>
                <!-- Alterar a propriedade border-bottom-color conforme a cor do programa -->
                <div class="info" style="border-bottom-color:<?php echo get_theme_mod('color_setting', '#000'); ?>;">
                    <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <span class="v-align">
                            <span class="v-middle">
                                <!-- Alterar a propriedade background conforme a cor do programa -->
                                <p class="lt-headline-label" style="background:<?php echo get_theme_mod('color_setting', '#000'); ?>;"><?php echo get_the_term($post->ID, 'categoria-receita'); ?></p>
                                <h4 class="title"><?php the_title(); ?></h4>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </li>
    <?php endwhile; ?>
</ul>