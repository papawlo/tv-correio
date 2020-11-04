<li class="lt-top-stories-item">
    <div class="storie">
        <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <figure>
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail("thumb-360x229");
                } elseif (get_field('video_url')) {
                    // Obtendo o thumbnail do video, a partir do próprio youtube

                    $videoThumb = get_field('video_url');
                    $videoThumb = strstr($videoThumb, 'https://www.youtube.com/embed/');
                    $videoThumb = substr($videoThumb, 0, strpos($videoThumb, '?'));
                    $videoThumb = str_replace('https://www.youtube.com/embed/', '', $videoThumb);
                    $videoThumb = 'http://img.youtube.com/vi/' . $videoThumb . '/0.jpg';
                    $videoThumb = '<img width="360" height="229" src="' . $videoThumb . '" class="attachment-thumb-360x229 wp-post-image" alt="tv_correio">';

                    echo $videoThumb;
                } else {
                    //exibe imagem padrao
                    echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-360x229', false);
                }
                ?>
            </figure>
        </a>
        <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <h4 class="title"><?php the_title(); ?></h4>
        </a>
    </div>
</li>
