<?php while (have_posts()): the_post(); ?>
    <li class="lt-top-receitas-item">
        <div class="receita">
            <div class="v-align">
                <a class="thumb v-middle" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <figure class="image">
                        <?php the_post_thumbnail('thumb-129x220'); ?>
                    </figure>
                </a>
                <div class="info v-middle" style="border-bottom-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;">
                    <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <span class="v-align">
                            <span class="v-middle">
                                <!-- Alterar propriedade background conforme a cor do programa -->
                                <p class="lt-headline-label" style="background:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;"><?php echo get_the_term($post->ID, 'categoria-receita'); ?></p>
                                <h4 class="title"><?php echo wp_trim_words(get_the_title(), 8); ?></h4>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </li>
<?php endwhile; ?>