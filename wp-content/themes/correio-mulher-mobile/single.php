<?php
get_header();
the_post();
?>
<!-- Section .wrapper.single -->
<section class="wrapper single">
 
    <!--Section content-->
    <section class="content">
        <div class="lt-top-videos-title lt-widget-title-wrap">
            <h3 class="lt-widget-title">Notícias</h3>
        </div>

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
                <?php if (has_excerpt()): ?><h2 class="subtitle"><?php echo get_the_excerpt(); ?></h2><?php endIf; ?>
                <div class="share">
                    <div class="v-align">
                        <ul class="list v-middle">
                            <li id="facebook-sharrre" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" class="item"></li>
                            <li id="twitter-sharrre" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>" class="item"></li>
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
                <?php the_content(); ?>
            </section>
        </article>

        <div class="lt-padding-content">
            <a class="lt-go-back-link" href="<?php echo home_url(); ?>" title="Voltar para notíticas">
                <i class="icon">
                    <img src="<?php echo get_template_directory_uri() ?>/public/img/icon-left.svg" alt="Voltar para notícias">
                </i> Voltar para notíticas
            </a>
        </div>
    </section>
    <!-- FIM Section content-->
       <?php get_sidebar(); ?>


    <?php get_template_part('programas', 'footer-mobile'); ?>

    <?php get_sidebar("contato") ?>
</section>
<?php get_footer(); ?>