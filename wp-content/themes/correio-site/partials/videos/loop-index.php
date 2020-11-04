<?php // Global $the_query;   ?>
<?php // while ($the_query->have_posts()): $the_query->the_post();   ?>

<li class="lt-top-stories-item">
    <div class="storie">
        <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <figure>
                <?php
                // Obtendo o thumbnail do video, a partir do próprio youtube

                $videoThumb = get_field('video_url');
                $videoThumb = strstr($videoThumb, 'https://www.youtube.com/embed/');
                $videoThumb = substr($videoThumb, 0, strpos($videoThumb, '?'));
                $videoThumb = str_replace('https://www.youtube.com/embed/', '', $videoThumb);
                $videoThumb = 'http://img.youtube.com/vi/' . $videoThumb . '/0.jpg';
                $videoThumb = '<img width="360" height="229" src="' . $videoThumb . '" class="attachment-thumb-360x229 wp-post-image" alt="tv_correio">';

                echo ($videoThumb);

                /*
                  if (has_post_thumbnail()) {
                  the_post_thumbnail("thumb-360x229");
                  } else {
                  echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-360x229', false);
                  }
                 */
                ?>
            </figure>
        </a>
        <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <!-- Alterar propriedade background conforme a cor do programa -->
            <?php
            $blog_id = get_post_meta(get_the_ID(), 'blogid', true);
            $blog = get_blog_details($blog_id);
            ?>
            <p class="lt-headline-label" style="background:<?php echo get_ms_theme_mod('color_setting', '#000', $blog_id); ?>;"><?php echo $blog->blogname; ?></p>
            <h4 class="title"><?php echo wp_trim_words(get_the_title(), 10); ?></h4>
        </a>
    </div>
</li>
<?php
// endWhile; ?>