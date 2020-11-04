<?php global $the_query; ?>
<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
    <li class="lt-top-videos-item">
        <div class="video v-align">
            <a class="thumb v-middle" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <i class="icon">
                    <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-video.svg" alt="Play">
                </i>    
                <figure>
                    <?php
                    $thumbID = get_post_meta(get_the_ID(), '_thumbnail_id', true);
                    if ($thumbID) {
                        switch_to_blog(get_post_meta(get_the_ID(), 'blogid', true));
                        echo wp_get_attachment_image($thumbID, 'thumb-129x132');
                        restore_current_blog();
                    } else {
                        echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-129x132', false);
                    }
                    ?>

                </figure>
            </a>
            <!-- Alterar propriedade background conforme a cor do programa -->
            <?php
            $blog_id = get_post_meta(get_the_ID(), 'blogid', true);

            $blog = get_blog_details($blog_id);
            ?>
            <div class="info v-middle" style="border-bottom-color:<?php echo get_ms_theme_mod('color_setting', '#000', $blog_id); ?>;">
                <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <span class="v-align">
                        <span class="v-middle">
                            <p class="lt-headline-label" style="background:<?php echo get_ms_theme_mod('color_setting', '#000', $blog_id); ?>;"><?php echo $blog->blogname; ?></p>
                            <h4 class="title"><?php echo wp_trim_words(get_the_title(), 8); ?></h4>
                        </span>
                    </span>
                </a>
            </div>           
        </div>
    </li>
<?php endwhile; ?>