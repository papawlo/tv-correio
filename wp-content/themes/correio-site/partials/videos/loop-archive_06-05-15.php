<?php // Global $the_query;         ?>
<?php // while ($the_query->have_posts()): $the_query->the_post();         ?>
<!-- Incluir a classe .no-thumb quando não houver thumbnail para a notícia -->
<li class="lt-top-stories-item">
    <div class="storie">
        <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <figure>
                <?php
                $thumbID = get_post_meta(get_the_ID(), '_thumbnail_id', true);
                var_dump(get_post_meta(get_the_ID(), 'wpb_post_views_count', true));
//                exit();
                ?>

                <?php
                if ($thumbID) {
                    switch_to_blog(get_post_meta(get_the_ID(), 'blogid', true));
                    echo wp_get_attachment_image($thumbID, 'thumb-360x229');
                    restore_current_blog();
                } else {
                    echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-360x229', false);
                }
                ?>
                <?php // echo wp_get_attachment_image($thumbID, 'thumb-165x132');  ?>

            </figure>
        </a>
        <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <!-- Alterar a prorpriedade border-bottom-color conforme a cor do programa -->
            <div class="archive-info" style="border-bottom-color: <?php echo get_ms_theme_mod('color_setting', '#000', get_post_meta(get_the_ID(), 'blogid', true)); ?>;">
                <?php
                $blog_id = get_post_meta(get_the_ID(), 'blogid', true);

                $blog = get_blog_details($blog_id);
                ?>
                <p class="lt-headline-label" style="background:<?php echo get_ms_theme_mod('color_setting', '#000', $blog_id); ?>;"><?php echo $blog->blogname; ?></p>
                <h4 class="title"><?php the_title(); ?></h4>
        </a>
    </div>
</li>
<?php
// endWhile; ?>