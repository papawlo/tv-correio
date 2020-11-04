<?php
get_header();
the_post();
?>
<!-- Wrapper -->
<div class="wrapper">
    
    <section class="content">
        <div class="lt-widget-title-wrap">
            <h3 class="lt-widget-title">Receita</h3>
        </div>

        <!-- Post -->
        <article class="lt-post recipe">
            <header class="lt-post-head">
                <h1 class="title"><?php the_title(); ?></h1>
                <div class="share">
                    <div class="v-align">
                        <ul class="list v-middle">
                            <li id="facebook-sharrre" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" class="item">
                                <a title="Compartilhe no Facebook" href="javascript:;" class="link">
                                    <i class="icon facebook">
                                        <img alt="Facebook" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-facebook.svg">
                                    </i>
                                </a>
                            </li>
                            <li id="twitter-sharrre" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" class="item">
                                <a title="Compartilhe no Twitter" href="javascript:;" class="link">
                                    <i class="icon twitter">
                                        <img alt="Twitter" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-twitter.svg">
                                    </i>
                                </a>
                            </li>
                            <!--                            <li class="item">
                                                            <a class="link" href="javascript:;" title="Compartilhe no Facebook">
                                                                <i class="icon facebook">
                                                                    <img src="public/img/icon-facebook.svg" alt="Facebook">
                                                                </i>
                                                            </a>
                                                        </li>
                                                        <li class="item">
                                                            <a class="link" href="javascript:;" title="Compartilhe no Twitter">
                                                                <i class="icon twitter">
                                                                    <img src="public/img/icon-twitter.svg" alt="Twitter">
                                                                </i>
                                                            </a>
                                                        </li>-->
                            <li id="whastapp-sharrre" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" class="item">
                                <a class="link" href="whatsapp://send?text=<?php the_title(); ?>: <?php the_permalink(); ?>" title="Compartilhe no Whastapp">
                                    <i class="icon whatsapp">
                                        <img src="http://jobs.qualitare.com/correio/jornal-da-correio/wp-content/themes/correio-mulher-mobile/public/img/icon-whatsapp.svg" alt="whastapp">
                                    </i>
                                </a>
                            </li>
                        </ul>
                        <p class="author v-middle"><?php echo get_the_author(); ?></p>
                    </div>
                </div>
            </header>
            <section class="lt-post-body">
                <?php if ($images = get_field('receitas_fotos')): ?>
                    <div class="recipe-slides">
                        <div class="recipe-slides-wrap">
    <?php foreach ($images as $image): ?>
        <?php echo wp_get_attachment_image($image['ID'], 'thumb-375x400', false, array('class' => 'slide'))."\n"; ?>
    <?php endforeach; ?>
    <!--                        <img class="slide" src="http://placehold.it/375x400" alt="Imagem">
                            <img class="slide" src="http://placehold.it/375x400" alt="Imagem">
                            <img class="slide" src="http://placehold.it/375x400" alt="Imagem">-->
                        </div>
                        <div class="recipe-slides-thumbs">
    <?php foreach ($images as $image): ?>
        <?php echo wp_get_attachment_image($image['ID'], 'thumb-106x115', false, array('class' => 'thumb'))."\n"; ?>
    <?php endforeach; ?>
    <!--                        <img class="thumb" src="http://placehold.it/106x115" alt="Imagem">
                            <img class="thumb" src="http://placehold.it/106x115" alt="Imagem">
                            <img class="thumb" src="http://placehold.it/106x115" alt="Imagem">-->
                        </div>
                    </div>
                <?php endif; ?>
                <div class="recipe-time">
                    <div class="v-center v-align">
                        <div class="v-middle">
                            <div class="card v-align">
                                <div class="v-middle">
                                    <i class="icon time">
                                        <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-time-o.svg" alt="Tempo de preparo">
                                    </i>
                                </div>
                                <div class="v-middle">
                                    <div class="info">
                                        <p>Tempo de preparo</p>
                                        <p><b><?php the_field('receitas_tempo'); ?></b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="v-middle">
                            <div class="card v-align">
                                <div class="v-middle">
                                    <i class="icon income">
                                        <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-income.svg" alt="Rendimento em porções">
                                    </i>
                                </div>
                                <div class="v-middle">
                                    <div class="info">
                                        <p>Rendimento</p>
                                        <p><b><?php the_field('receitas_rendimento'); ?></b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="recipe-step">
                    <h2 class="recipe-step-title">Igredientes</h2>
                    <ul class="recipe-step-list">
                        <?php while (have_rows('receitas_ingredientes')): the_row(); ?>
                            <li class="recipe-step-item"><?php the_sub_field('receitas_ingredientes_ingrediente'); ?></li>
                        <?php endwhile; ?>
                        <!--                        <li class="recipe-step-item">2 latas de cheiro-verde</li>
                                                <li class="recipe-step-item">2 latas de cheiro-verde</li>
                                                <li class="recipe-step-item">2 latas de cheiro-verde</li>
                                                <li class="recipe-step-item">2 latas de cheiro-verde</li>
                                                <li class="recipe-step-item">2 latas de cheiro-verde</li>-->
                    </ul>
                </div>

                <div class="recipe-step">
                    <h2 class="recipe-step-title">Modo de preparo</h2>
                    <?php the_content(); ?>
                </div>
            </section>
        </article>

        <div class="lt-padding-content">
            <a class="lt-go-back-link" href="<?php echo get_post_type_archive_link('receitas'); ?>" title="Voltar para receitas">
                <i class="icon"></i> Voltar para receitas
            </a>
<!--            <a class="lt-go-back-link" href="javascript:;" title="Voltar para receitas">
                <i class="icon">
                    <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-left.svg" alt="Voltar para receitas">
                </i> Voltar para receitas
            </a>-->
        </div>
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