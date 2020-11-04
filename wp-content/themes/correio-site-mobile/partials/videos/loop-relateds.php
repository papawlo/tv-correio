<?php Global $the_query;
$i = 1; ?>
<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
    <li class="lt-top-videos-item <?php echo $i % 2 == 0 ? "middle" : "" ?>">
        <div class="video">
            <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <i class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
                </i>
                <figure class="image">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail("thumb-165x132");
                    } else {
                        echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-165x132', false);
                    }
                    ?>
                    <!--<img src="http://placehold.it/165x132" alt="">-->
                </figure>
            </a>
            <!-- Alterar a propriedade border-bottom-color conforme a cor do programa -->
            <div class="info" style="border-bottom-color:<?php echo get_ms_theme_mod('color_setting', '#000', get_post_meta(get_the_ID(), 'blogid', true)); ?>;">
                <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <span class="v-align">
                        <span class="v-middle">
                            <?php
                            $blog_id = get_field("video_blog");
                            $blog = get_blog_details($blog_id);
                            ?>
                            <!-- Alterar a propriedade background conforme a cor do programa -->
                            <p class="lt-headline-label" style="background:#22468a;"><?php echo esc_attr($blog->blogname); ?></p>
                            <h4 class="title"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></h4>
                        </span>
                    </span>
                </a>
            </div>
        </div>
    </li>

    <?php $i++;
endWhile; ?>