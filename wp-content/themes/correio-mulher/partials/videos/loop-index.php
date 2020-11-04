<li class="lt-top-stories-item">
    <div class="storie">
        <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <i class="icon">
                <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
            </i>
            <figure>
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail("thumb-360x229");
                } elseif (get_field('video_url')) {
                    $video_url = get_field('video_url', FALSE, FALSE); //URL

                    $video_thumb_url = get_video_thumbnail_uri($video_url); //get thumbnail via our functions in functions.php 

                    $videoThumb = '<img width="360" height="229" src="' . $video_thumb_url . '" class="thumb-360x229 wp-post-image" alt="' . the_title_attribute(array('before' => 'Imagem do vídeo:', "echo" => 0)) . '">';
                    echo $videoThumb;
                } else {
                    //exibe imagem padrao
                    echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-360x229', false);
                }
                ?>
            </figure>
        </a>
        <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <!-- Alterar propriedade background conforme a cor do programa -->
            <!--<p class="lt-headline-label" style="background:#d8248f;">Moda</p>-->
            <h4 class="title"><?php echo wp_trim_words(get_the_title(), 7); ?></h4>
        </a>
    </div>
</li>
