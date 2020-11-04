<?php get_header(); ?>
<?php switch_to_blog(get_sitewide_tags_option('tags_blog_id')); ?>
<?php
//var_dump(get_query_var('q'));
//var_dump(get_query_var('type'));
//exit;
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$type = (get_query_var('type')) ? get_query_var('type') : 'any';
$args = array(
    'post_type' => $type,
    'posts_per_page' => '8',
    'paged' => $paged,
    's' => get_query_var('q')
);
$the_query = new WP_Query($args);
?>
<?php restore_current_blog(); ?>
<!-- Wrapper -->
<div class="wrapper search">
    <div class="search-divider">
        <div class="search-content">
            <form class="search-form lt-form" method="GET" action="./busca/">
                <div class="search-row lt-form-row">
                    <input class="search-form-input lt-form-input" type="text" name="q" value="<?php echo esc_attr(get_query_var('q')); ?>" placeholder="O que você procura?">                    
                    <button class="search-form-submit" type="submit">
                        <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-search.svg" alt="Buscar">
                    </button>
                </div>
            </form>
        </div>
    </div>
    <nav class="search-filters">
        <ul class="search-filters-list">
            <li class="search-filters-item">
                <a class="<?php echo get_query_var('type') == "" ? "active" : ""; ?>" href="./busca/?q=<?php echo esc_attr(get_query_var('q')); ?>" title="Todos">Todos</a>
            </li>
            <li class="search-filters-item">
                <a class="<?php echo get_query_var('type') == "post" ? "active" : ""; ?>" href="./busca/?q=<?php echo esc_attr(get_query_var('q')); ?>&type=post" title="Notícias">Notícias</a>
            </li>
            <li class="search-filters-item">
                <a class="<?php echo get_query_var('type') == "receita" ? "active" : ""; ?>" href="./busca/?q=<?php echo esc_attr(get_query_var('q')); ?>&type=receita" title="Receitas">Receitas</a>
            </li>
            <li class="search-filters-item">
                <a class="<?php echo get_query_var('type') == "video" ? "active" : ""; ?>" href="./busca/?q=<?php echo esc_attr(get_query_var('q')); ?>&type=video" title="Vídeos">Vídeos</a>
            </li>
        </ul>
    </nav>
    <div class="search-results">
        <?php switch_to_blog(get_sitewide_tags_option('tags_blog_id')); ?>
        <?php if ($the_query->have_posts()): ?>
            <?php restore_current_blog(); ?>
            <div class="search-widget">
                <div class="v-align">
                    <div class="v-middle">
                        <div class="logo-wrap">
                            <div class="border" style="border-color:#d8248f;"></div>
                            <img class="logo" src="http://placehold.it/81x81" alt="Mulher de mais">
                        </div>
                        <h4 class="title">Receitas de bolo</h4>
                        <p class="description">Ver mais no: <a href="" title="Mulher demais">Mulher demais</a></p>
                    </div>
                </div>
            </div>
            <?php switch_to_blog(get_sitewide_tags_option('tags_blog_id')); ?>
            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                <article class="search-result">
                    <div class="search-result-head">
                        <h2 class="search-result-title">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute($args = ''); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="search-result-info">
                            <?php switch_to_blog(get_post_meta(get_the_ID(), 'blogid', true)); ?>
                            <a class="search-result-category" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>"><?php bloginfo('name'); ?></a>
                            <?php restore_current_blog(); ?>
                            <time class="search-result-time"><?php the_time('d/m/Y'); ?></time>
                        </div>
                    </div>
                    <div class="search-result-body">
                        <a class="search-result-thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute($args = ''); ?>">
                            <?php the_post_thumbnail('thumb-90x64'); ?>
                        </a>
                        <p class="search-result-description"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute($args = ''); ?>"><?php echo wp_trim_words(get_the_excerpt(), '15', ' ...'); ?></a></p>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php restore_current_blog(); ?>
        <?php else: ?>
            <div class="search-content">
                <div class="no-results">
                    <img src="<?php echo get_template_directory_uri(); ?>/public/img/icon-sad.svg" alt="Busca sem resultados">
                    <h2>Nenhum resultado encontrado</h2>
                    <p>Continue pesquisando</p>
                </div>
            </div>
        <?php endif; ?>
        <div class="next-page"><?php echo get_load_more_posts_link('<i class="icon"></i> Carregar mais resultados', $the_query->max_num_pages); ?></div>

        <!--        <a class="lt-load-more-link" href="javascript:;" title="Carregar mais notícias">
                    <i class="icon">
                        <img src="public/img/icon-more.svg" alt="Carregar mais resultados">
                    </i> Carregar mais resultados
                </a>-->
    </div>
    <?php get_template_part('../programas', 'footer-mobile'); ?>

    <?php get_footer(); ?>
    