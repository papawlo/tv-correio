<!-- Incluir a classe .no-thumb quando não houver thumbnail para a notícia -->
<li class="lt-top-stories-item">
    <div class="storie">
        <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <i class="icon">
                <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
            </i>
            <figure>
                <?php
                $thumbID = get_post_meta(get_the_ID(), '_thumbnail_id', true);
                
                if ($thumbID) {
                    switch_to_blog(get_post_meta(get_the_ID(), 'blogid', true));
                    echo wp_get_attachment_image($thumbID, 'thumb-360x229');
                    restore_current_blog();
                } elseif (get_field('video_url')) {
                    $video_url = get_field('video_url', FALSE, FALSE); //URL

                    $video_thumb_url = get_video_thumbnail_uri($video_url); //get thumbnail via our functions in functions.php 

                    $videoThumb = '<img width="360" height="229" src="' . $video_thumb_url . '" class="thumb-360x229 wp-post-image" alt="' . the_title_attribute(array('before' => 'Imagem do vídeo:', "echo" => 0)) . '">';
                    echo $videoThumb;
                } else {
                    echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-360x229', false);
                }
                ?>
                <?php // echo wp_get_attachment_image($thumbID, 'thumb-165x132');  ?>
            </figure>
        </a>
        <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <!-- Alterar a prorpriedade border-bottom-color conforme a cor do programa -->
            <!--<div class="archive-info" style="border-bottom-color: <?php // echo get_ms_theme_mod('color_setting', '#000', get_post_meta(get_the_ID(), 'blogid', true)); ?>;">-->
            <?php
            $blog_id = get_post_meta(get_the_ID(), 'blogid', true);
            $blog = get_blog_details($blog_id);
            ?>

            <p class="lt-headline-label" style="background:<?php echo get_ms_theme_mod('color_setting', '#000', $blog_id); ?>;"><?php echo $blog->blogname; ?></p>
   
                <div class="data-videos">
                    <div class="data-index">
                        <?php the_time('d/m/Y'); ?>
                    </div>
                </div>

            <h4 class="title"><?php echo wp_trim_words(get_the_title(), 8); ?></h4>
        </a>
    </div>
</li>
<?php
// endWhile; ?>