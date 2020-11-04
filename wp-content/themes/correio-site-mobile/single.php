<?php
get_header();
the_post();
?>
<!-- Wrapper -->
<section class="wrapper single">
    <!--Programacao-->
    <?php get_sidebar(); ?>
    <!--FIM Programacao-->


    <!--conteudo-->
    <section class="content">
        <article class="lt-post">
            <header class="lt-post-head">
                <time class="time" pubdate="">
                    <div class="v-align">
                        <i class="icon v-middle">
                            <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-time.svg" alt="Time">
                        </i>
                        <div class="v-middle">
                            <?php the_time('d/m/Y'); ?>
                        </div>
                    </div>
                </time>
                <h1 class="title"><?php the_title(); ?></h1>
                <?php if (has_excerpt()): ?><h2 class="subtitle"><?php echo get_the_excerpt(); ?></h2><?php endif; ?>

                <div class="share">
                    <div class="v-align">
                        <ul class="list v-middle">
                            <li id="facebook-sharrre" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" class="item"><a title="Compartilhe no Facebook" href="javascript:;" class="link"><i class="icon facebook"><img alt="Facebook" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-facebook.svg"></i></a></li>
                            <li id="twitter-sharrre" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" class="item"><a title="Compartilhe no Twitter" href="javascript:;" class="link"><i class="icon twitter"><img alt="Twitter" src="<?php echo get_template_directory_uri(); ?>/public/img/icon-twitter.svg"></i></a></li>
                        </ul>
                        <p class="author v-middle"><?php echo get_the_author(); ?></p>
                    </div>
                </div>
            </header>
            <section class="lt-post-body">
                <?php the_content(); ?>
            </section>
        </article>

        <div class="lt-padding-content">
            <a class="lt-go-back-link" href="<?php echo get_permalink( get_page_by_path( 'noticias' ) ) ?>" title="Voltar para notíticas">
                <i class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-left.svg" alt="Voltar para notícias">
                </i> Voltar para notícicas
            </a>
        </div>
    </section>

    <!-- Programs widget -->
    <?php get_template_part('../programas', 'footer-mobile'); ?>
</section>
<?php get_footer(); ?>