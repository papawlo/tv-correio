<?php $paged = ( get_query_var('page') ) ? get_query_var('page') : 1; ?>
<?php get_header(); ?>
<!-- Section home-->
<section class="wrapper home">
    <section class="home-pannel">
        <a href="javascript:void(0)" class="prev"></a>
        <a href="javascript:void(0)" class="next"></a>
        <div class="home-pannel-slides">
            <?php $homeID = get_page_by_path('home'); ?>
            <?php while (have_rows('home_slider', $homeID)): the_row(); ?>
                <a class="slide" style="background-image: url(<?php echo wp_get_attachment_url(get_sub_field('home_slider_foto')); ?>)" href="<?php the_sub_field('home_slider_link'); ?>" title="<?php echo esc_attr(get_sub_field('home_slider_chamada')); ?>">
                    <!--<img src="http://placehold.it/375x270&text=texto1" alt="">-->
                    <?php
                    //echo wp_get_attachment_image(get_sub_field('home_slider_foto'), 'thumb-375x270'); 
                    // echo wp_get_attachment_url(get_sub_field('home_slider_foto'))http://placehold.it/1024x270.gif;
                    ?>
                </a>
            <?php endwhile; ?>
            <!--            <a class="slide" href="" title="">
                            <img src="http://placehold.it/375x270&text=texto2" alt="">
                        </a>
                        <a class="slide" href="" title="">
                            <img src="http://placehold.it/375x270&text=texto3" alt="">
                        </a>
                        <a class="slide" href="" title="">
                            <img src="http://placehold.it/375x270&text=texto4" alt="">
                        </a>-->
        </div>
        <?php /* <div class="home-pannel-thumbs">
          <ul class="home-pannel-thumbs-list">
          <?php
          $i = 1;
          while (have_rows('home_slider', $homeID)): the_row();
          ?>
          <li class="home-pannel-thumbs-item" data-rel="<?php echo $i; ?>">
          <!-- Incrementar o atributo data-rel a partir de 1 -->
          <a class="thumb" href="javascript:;" title="">
          <span class="border" style="border-color:#d8248f;"></span>
          <?php echo wp_get_attachment_image(get_sub_field('home_slider_foto'), 'thumb-120'); ?>
          <!--<img src="http://placehold.it/120x120&text=texto1" alt="">-->
          </a>
          </li>
          <?php
          $i++;
          endwhile;
          ?>
          <!--                <li class="home-pannel-thumbs-item" data-rel="2">
          <a class="thumb" href="javascript:;" title="">
          <span class="border" style="border-color:#d8248f;"></span>
          <img src="http://placehold.it/120x120&text=texto2" alt="">
          </a>
          </li>
          <li class="home-pannel-thumbs-item" data-rel="3">
          <a class="thumb" href="javascript:;" title="">
          <span class="border" style="border-color:#d8248f;"></span>
          <img src="http://placehold.it/120x120&text=texto3" alt="">
          </a>
          </li>
          <li class="home-pannel-thumbs-item" data-rel="4">
          <a class="thumb" href="javascript:;" title="">
          <span class="border" style="border-color:#d8248f;"></span>
          <img src="http://placehold.it/120x120&text=texto4" alt="">
          </a>
          </li>-->
          </ul>
          </div> */ ?>
    </section>
    <?php get_sidebar(); ?>

    <!-- Top stories -->
    <section class="content">
        <section class="lt-top-stories section">
            <div class="lt-top-stories-title lt-widget-title-wrap">
                <div class="v-align">
                    <div class="v-middle">
                        <h3 class="lt-widget-title">Notícias</h3>
                    </div>
                    <div class="v-middle">
                        <!--<select class="lt-widget-title-wrap-select" name="" data-role="none">
                            <option value="">Mais vistas</option>
                            <option value="">Mais comentadas</option>
                        </select>-->
                    </div>
                </div>
            </div>

            <div class="lt-top-stories-content">
                <?php
                $posts = get_field('home_noticias');
                if ($posts):
                    ?>
                    <ul class="lt-top-stories-list">
                        <?php foreach ($posts as $post): setup_postdata($post); ?>
                            <li class="lt-top-stories-item">
                                <div class="storie">
                                    <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <figure>
                                            <?php $thumbID = get_post_meta(get_the_ID(), '_thumbnail_id', true); ?>
                                            <?php switch_to_blog(get_post_meta(get_the_ID(), 'blogid', true)); ?>
                                            <?php echo wp_get_attachment_image($thumbID, 'thumb-360x229'); ?>
                                            <?php restore_current_blog(); ?>
                                        </figure>
                                    </a>
                                    <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <!-- Alterar propriedade background conforme a cor do programa -->
                                        <?php $categories = get_the_category(); ?>
                                        <?php $category = array_shift($categories); ?>
                                        <p class="lt-headline-label" style="background:<?php echo get_ms_theme_mod('color_setting', '#000', get_post_meta(get_the_ID(), 'blogid', true)); ?>;"><?php echo $category->name; ?></p>
                                        <h4 class="title"><?php echo wp_trim_words(get_the_title(), 8); ?></h4>
                                    </a>
                                </div>
                            </li>
                            <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </ul>
                <?php endif; ?>
            </div>
            <!--<a href="<?php // echo get_permalink(get_page_by_path('noticias'));                                ?>" class="lt-load-more-link"><i class="icon"></i> Ver mais notícias</a>-->
            <a class="lt-load-more-link" href="<?php echo get_permalink(get_page_by_path('noticias')); ?>" title="Carregar mais notícias">
                <i class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-more.svg" alt="Carregar mais notícias">
                </i> Ver mais notícias
            </a>
        </section>
        <section class="lt-top-stories section">
            <div class="lt-top-stories-title lt-widget-title-wrap">
                <div class="v-align">
                    <div class="v-middle">
                        <h3 class="lt-widget-title">Vídeos</h3>
                    </div>
                    <div class="v-middle">
<!--                        <select class="lt-widget-title-wrap-select" name="" data-role="none">
                            <option value="">Mais vistas</option>
                            <option value="">Mais comentadas</option>
                        </select>-->
                    </div>
                </div>
            </div>

            <div class="lt-top-stories-content">
                <?php
                $videos = get_field('home_videos');
                if ($videos):
                    ?>
                    <ul class="lt-top-stories-list">
                        <?php
                        foreach ($videos as $post): setup_postdata($post);
                            $blog_details = '';
                            $org_blog_id = get_post_meta(get_the_ID(), 'blogid', true);
                            ?>
                            <li class="lt-top-stories-item">
                                <div class="storie">
                                    <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <!--                                        <i class="icon">
                                            <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
                                        </i>-->
                                        <figure>
                                            <?php
                                            $thumbID = get_post_meta(get_the_ID(), '_thumbnail_id', true);
                                            switch_to_blog(get_post_meta(get_the_ID(), 'blogid', true));
                                            if ($thumbID) {
                                                echo wp_get_attachment_image($thumbID, 'thumb-360x229');
                                            } elseif (get_field('video_url')) {

                                                $video_url = get_field('video_url', FALSE, FALSE); //URL

                                                $video_thumb_url = get_video_thumbnail_uri($video_url, 'large', true); //get thumbnail via our functions in functions.php 

                                                $videoThumb = '<img width="360" height="229" src="http://i' . ($i % 3) . '.wp.com/' . $video_thumb_url . '?fit=360,229" class="thumb-360x229 wp-post-image" alt="' . the_title_attribute(array("echo" => 0)) . '">';
                                                echo $videoThumb;
                                            } else {
                                                echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-360x229', false);
                                            }

                                            restore_current_blog();
                                            ?>       

                                            <?php // switch_to_blog(get_post_meta(get_the_ID(), 'blogid', true));  ?>
                                            <?php // echo wp_get_attachment_image($thumbID, 'thumb-360x229'); ?>
                                            <?php // restore_current_blog();  ?>
                                        </figure>
                                    </a>
                                    <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <!-- Alterar propriedade background conforme a cor do programa -->
                                        <?php
                                        if ($org_blog_id) {
                                            $blog_details = get_blog_details($org_blog_id);
                                        }
                                        ?>
                                        <p class="lt-headline-label" style="background:<?php echo get_ms_theme_mod('color_setting', '#000', $blog_details->blog_id); ?>;"><?php echo $blog_details->blogname; ?></p>                                        
                                        <h4 class="title"><?php echo wp_trim_words(get_the_title(), 8); ?></h4>
                                    </a>
                                </div>
                            </li>
                            <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </ul>
                <?php endif; ?>
            </div>
            <!--<a href="<?php // echo get_permalink(get_page_by_path('noticias'));                                ?>" class="lt-load-more-link"><i class="icon"></i> Ver mais notícias</a>-->
            <a class="lt-load-more-link" href="<?php echo get_permalink(get_page_by_path('noticias')); ?>" title="Carregar mais notícias">
                <i class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-more.svg" alt="Carregar mais notícias">
                </i> Ver mais notícias
            </a>
        </section>
    </section>

    <!-- Top videos -->

    <!--Section Programas-->
    <?php get_template_part('../programas-footer', 'mobile'); ?>
    <!--FIM Section Programas-->
</section><!--FIM Section .wrapper.Home-->
<?php get_footer(); ?>