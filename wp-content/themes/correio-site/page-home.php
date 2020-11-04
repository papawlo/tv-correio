<?php $paged = ( get_query_var('page') ) ? get_query_var('page') : 1; ?>
<?php get_header(); ?>

<!-- Wrapper -->
<div class="wrapper home col-10">
    <!-- Section -->
    <div class="section">
        <!-- Content -->
        <section class="content col-7">
            <!-- Home panel -->
            <section class="home-panel section">
                <div class="home-panel-slides">
                    <button class="home-panel-nav home-panel-nav-prev">
                        <i class="icon prev"></i>
                    </button>

                    <button class="home-panel-nav home-panel-nav-next">
                        <i class="icon next"></i>
                    </button>
                    <div class="home-panel-slides-wrap">
                        <ul class="home-panel-slides-list">
                            <?php $homeID = get_page_by_path('home'); ?>
                            <?php while (have_rows('home_slider', $homeID)): the_row(); ?>
                                <li class="home-panel-slides-item">
                                    <a class="link" href="<?php the_sub_field('home_slider_link'); ?>" title="<?php echo esc_attr(get_sub_field('home_slider_chamada')); ?>">
                                        <span class="info">
                                            <span class="info-wrap">
                                                <h2 class="title"><?php the_sub_field('home_slider_chamada'); ?></h2>
                                                <p class="description"><?php the_sub_field('home_slider_descricao'); ?></p>
                                            </span>
                                        </span>
                                        <?php echo wp_get_attachment_image(get_sub_field('home_slider_foto'), 'thumb-750x400'); ?>
                                    </a>
                                </li>
                                <?php endWhile; ?>
                        </ul>
                    </div>
                </div>
                <div class="home-panel-thumbs">
                    <div class="home-panel-thumbs-wrap">
                        <div class="home-panel-thumbs-pager"></div>
                        <ul class="home-panel-thumbs-list">
                            <?php while (have_rows('home_slider', $homeID)): the_row(); ?>
                                <!-- Alterar a propriedade border-top-color conforme a cor do programa -->
                                <li class="home-panel-thumbs-item" style="border-top-color:#FFB416;">
                                    <?php echo wp_get_attachment_image(get_sub_field('home_slider_foto'), 'thumb-186x114'); ?>
                                </li>
                                <?php endWhile; ?>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Top stories -->
            <section class="lt-top-stories section">
                <h3 class="lt-widget-title">Notícias</h3>

                <div class="loop-content">
                    <div class="lt-top-stories-content">
                        <ul class="lt-top-stories-list">
                            <?php
                            $posts_noticia = get_field('home_noticias');
                            echo "\n<!-- debug \n";
                            print_r($posts);
                            echo "\n-->\n";
//                            print_r($posts);
//exit();
//                            switch_to_blog($posts['site_id']);
                            $i = 0;
                            ?>
                            <?php foreach ($posts_noticia as $post): setup_postdata($post); 
     echo "\n<!-- debug \n";
     print_r($post);
     echo "\n-->\n";
       $myvals = get_post_meta(get_the_ID());
                                    echo "\n<!-- debug Vars\n";                                    
                                    foreach ($myvals as $key => $val) {
                                        echo $key . ' : ' . $val[0] . "\n";
                                    }
                                    echo "\n-->\n";
     ?>
                                <li class="lt-top-stories-item">
                                    <div class="storie">
                                        <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <figure>
                                                <?php
                                                $thumbID = get_post_meta(get_the_ID(), '_thumbnail_id', true);
                                                echo "\n<!-- debug thumbID\n";
                                                print_r($thumbID);
                                                echo "\n-->\n";

                                                $org_blog_id = get_post_meta(get_the_ID(), 'blogid', true);
                                                echo "\n<!-- debug \n";
                                                print_r($org_blog_id);
                                                echo "\n-->\n";


//                                                switch_to_blog($org_blog_id);
                                                if ($thumbID) {
                                                    echo wp_get_attachment_image($thumbID, 'thumb-360x229');
                                                } elseif (( $video_thumbnail = get_video_thumbnail() ) != null) {
                                                    echo "\n<!-- debug video_thumb \n";
                                                    print_r($video_thumbnail);
                                                    echo "\n-->\n";

                                                    echo '<img width="360" height="229" alt="' . get_the_title() . '" class="attachment-thumb-360x229" src="  ' . $video_thumbnail . '">';
                                                } else {
                                                    echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-360x229', false);
                                                }
//                                                restore_current_blog();
                                                ?>
                                            </figure>
                                        </a>
                                        <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <!-- Alterar propriedade background conforme a cor do programa -->
                                            <?php
                                            $categories = get_the_category();
                                            $category = array_shift($categories);
                                            ?>
                                            <p class="lt-headline-label" style="background:<?php echo get_ms_theme_mod('color_setting', '#000', get_post_meta(get_the_ID(), 'blogid', true)); ?>;"><?php echo $category->name; ?></p>
                                            <h4 class="title"><?php the_title(); ?></h4>
                                        </a>
                                    </div>
                                </li>
                                <?php
                                $i++;
                                if ($i >= 4) {
                                    break;
                                }
                            endforeach;
                            wp_reset_postdata();
                            ?>
                        </ul>
                    </div>
                    <a href="<?php echo get_permalink(get_page_by_path('noticias')); ?>" class="lt-load-more-link"><i class="icon"></i> Ver mais notícias</a>
                </div>
                <!--<a class="lt-load-more-link" href="javascript:;" title="Carregar mais notícias">
                        <i class="icon"></i> Carregar mais notícias
                </a>-->
            </section>

            <!-- Top videos -->
            <section class="lt-top-videos lt-top-stories section">
                <h3 class="lt-widget-title">Vídeos</h3>
                <div class="loop-content">
                    <div class="lt-top-stories-content">
                        <ul class="lt-top-stories-list">
                            <?php
                            $videos = get_field('home_videos');
                            echo "\n<!-- debug Videos ids\n";
                            print_r($videos);

                            echo "\n-->\n";


                            if (!empty($videos)):
                                $j = 0;
                                foreach ($videos as $post): setup_postdata($post);
//                                    echo "\n<!-- debug \n";
//                                    print_r($post);
//                                    echo "\n-->\n";



//                                    $myvals = get_post_meta(get_the_ID());
//                                    echo "\n<!-- debug Vars\n";
//                                    echo "vars:";
//                                    foreach ($myvals as $key => $val) {
//                                        echo $key . ' : ' . $val[0] . "\n";
//                                    }
//                                    echo "\n-->\n";
                                    $blog_details = '';
                                    $org_blog_id = get_post_meta(get_the_ID(), 'blogid', true);
//                                    echo "\n<!-- debug org_blog_id 1 \n";
//                                    print_r($org_blog_id);
//                                    echo "\n-->\n";
                                    ?>
                                    <li class="lt-top-stories-item">
                                        <div class="storie">
                                            <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                <i class="icon">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-video.svg" alt="Play">
                                                </i>
                                                <figure>
                                                    <?php
                                                    $thumbID = get_post_meta(get_the_ID(), '_thumbnail_id', true);
                                                    switch_to_blog($org_blog_id);

//                                                    echo "\n<!-- debug thumbID\n";
//                                                    print_r($thumbID);
//                                                    echo "\n-->\n";


                                                    if ($thumbID) {

                                                        echo wp_get_attachment_image($thumbID, 'thumb-360x229');
                                                    } elseif (get_field('video_url')) {
                                                        $video_url = get_field('video_url', FALSE, FALSE); //URL


                                                        $video_thumb_url = get_video_thumbnail_uri($video_url . 'large'); //get thumbnail via our functions in functions.php 

                                                        $videoThumb = '<img width="360" height="229" src="' . $video_thumb_url . '" class="thumb-360x229 wp-post-image" alt="' . the_title_attribute(array('before' => 'Imagem do vídeo:', "echo" => 0)) . '">';
                                                        echo $videoThumb;
                                                    } else {
//                                                        echo "\n<!-- ELSS \n";
//
//                                                        echo "\n-->\n";


                                                        echo wp_get_attachment_image(get_field("imagem_padrao", "option"), 'thumb-360x229', false);
                                                    }
                                                    restore_current_blog();
//                                                    echo "\n<!-- debug org_blog_id 2\n";
//                                                    print_r($org_blog_id);
//                                                    echo "\n-->\n";


                                                    if ($org_blog_id) {
                                                        $blog_details = get_blog_details($org_blog_id);
                                                    }
//                                                    echo "\n<!-- debug blog details\n";
//                                                    print_r($blog_details);
//                                                    echo "\n-->\n";
                                                    ?>
                                                </figure>
                                            </a>
                                            <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                <!-- Alterar propriedade background conforme a cor do programa -->

                                                <p class="lt-headline-label" style="background:<?php echo get_ms_theme_mod('color_setting', '#000', $blog_details->blog_id); ?>;"><?php echo $blog_details->blogname; ?></p>                                                
                                                <h4 class="title"><?php the_title(); ?></h4>
                                            </a>
                                        </div>
                                    </li>
                                    <?php
                                    $j++;
                                    if ($j >= 4) {
                                        break;
                                    }
                                endforeach;
                            endif;
                            wp_reset_postdata();
//                            restore_current_blog();
                            ?>
                        </ul>
                    </div>
                    <?php if (!empty($videos)): ?>
                        <a href="<?php echo get_permalink(get_page_by_path('videos')); ?>" class="lt-load-more-link"><i class="icon"></i> Ver mais vídeos</a>
                    <?php endif; ?>
                </div>

            </section>
        </section>

        <?php get_sidebar(); ?>
    </div>
    <?php get_template_part('../programas', 'footer'); ?>
</div>
<?php get_footer(); ?>
