<?php get_header(); ?>
<!-- Section .wrapper -->
<section class="wrapper about">
 

    <section class="content">
        <div class="lt-widget-title-wrap">
            <h3 class="lt-widget-title"><?php the_title(); ?></h3>
        </div>

        <!-- Post -->
        <article class="lt-post">
            <header class="lt-post-head">
                <h1 class="title">Sobre o Programa</h1>
            </header>
            <section class="lt-post-body">
                <?php the_content();?>
            </section>
        </article>
    </section>
       <?php get_sidebar(); ?>

    <?php get_template_part('../programas','footer-mobile'); ?>

    <?php get_sidebar('contato'); ?>
</section>
<?php get_footer(); ?>