<?php get_header(); ?>
<!-- Wrapper -->
<section class="wrapper">
   

    <section class="content">
        <section class="lt-top-receitas">
            <div class="lt-top-receitas-title lt-widget-title-wrap">
                <div class="v-align">
                    <div class="v-middle">
                        <h3 class="lt-widget-title">Receitas</h3>
                    </div>
                    <div class="v-middle">
<!--                        <select class="lt-widget-title-wrap-select" name="" data-role="none">
                            <option value="">Mais vistas</option>
                            <option value="">Mais comentadas</option>
                        </select>-->
                    </div>
                </div>
            </div>

            <div class="lt-top-receitas-content">
                <div class="lt-top-receitas-main">
                    <?php while (have_posts()): the_post(); ?>
                    <div class="receita">
                        <a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <figure class="image">
                                  <?php the_post_thumbnail('thumb-375x310'); ?>
                                <!--<img src="http://placehold.it/375x310" alt="">-->
                            </figure>
                        </a>
                        <div class="info" style="border-bottom-color:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;">
                            <a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <p class="lt-headline-label" style="background:<?php echo get_theme_mod('color_setting', '#FFB416'); ?>;"><?php echo get_the_term($post->ID, 'categoria-receita'); ?></p>
                                <h4 class="title"><?php the_title(); ?></h4>
                            </a>
                        </div>
                    </div>
                    <?php break; endwhile;?>
                </div>
                <!--<div id="ajax-load">-->
                    <div class="loop-content ajax-load-more" data-content-selector=".loop-content">
                        <ul class="lt-top-receitas-list">
                            <?php get_template_part('partials/receitas/loop', 'archive'); ?>
                            <!--                    <li class="lt-top-receitas-item">
                                                    <div class="receita">
                                                        <div class="v-align">
                                                            <a class="thumb v-middle" href="" title="">
                                                                <figure class="image">
                                                                    <img src="http://placehold.it/129x220" alt="">
                                                                </figure>
                                                            </a>
                                                            <div class="info v-middle" style="border-bottom-color:#22468a;">
                                                                <a class="link" href="" title="">
                                                                    <span class="v-align">
                                                                        <span class="v-middle">
                                                                            <p class="lt-headline-label" style="background:#22468a;">Comportamento</p>
                                                                            <h4 class="title">Proin gravida nibh velit auctor aliquet aenean</h4>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="lt-top-receitas-item">
                                                    <div class="receita">
                                                        <div class="v-align">
                                                            <a class="thumb v-middle" href="" title="">
                                                                <figure class="image">
                                                                    <img src="http://placehold.it/129x220" alt="">
                                                                </figure>
                                                            </a>
                                                            <div class="info v-middle" style="border-bottom-color:#22468a;">
                                                                <a class="link" href="" title="">
                                                                    <span class="v-align">
                                                                        <span class="v-middle">
                                                                            <p class="lt-headline-label" style="background:#22468a;">Comportamento</p>
                                                                            <h4 class="title">Proin gravida nibh velit auctor aliquet aenean</h4>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>-->
                        </ul>

                    </div>

                    <div class="lt-padding-content">
                        <?php echo get_load_more_posts_link('<i class="icon"></i> Carregar mais receitas', $wp_query->max_num_pages); ?>
<!--                        <a class="lt-load-more-link" href="javascript:;" title="Carregar mais vídeos">
                            <i class="icon">
                                <img src="<?php // echo get_template_directory_uri()?>/public/img/icon-more.svg" alt="Carregar mais receitas">
                            </i> Carregar mais receitas
                        </a>-->
                    </div>
                <!--</div>-->
            </div>
        </section>
    </section>
     <!-- Aside sidebar QUADROS-->
    <?php get_sidebar(); ?>
    <!--Fim Aside .sidebar-->

    <!--Section Programas Widget-->
    <?php get_template_part("../programas-footer", "mobile") ?>
    <!-- FIM Section Programas Widget-->

    <!--Aside Sidebar Contact-->
    <?php get_sidebar('contato') ?>
    <!--FIM Aside Sidebar Contact-->
</section>
<?php get_footer(); ?>