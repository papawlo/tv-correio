<?php get_header(); ?>
<!-- Wrapper -->
<section class="wrapper search">
    <div class="search-divider">
        <div class="search-content">
            <form class="search-form lt-form" method="" action="">
                <div class="search-row lt-form-row">
                    <input class="search-form-input lt-form-input" type="text" name="search" placeholder="O que você procura?">
                    <button class="search-form-submit" type="submit">
                        <img src="public/img/icon-search.svg" alt="Buscar">
                    </button>
                </div>
            </form>
        </div>
    </div>

    <nav class="search-filters">
        <ul class="search-filters-list">
            <li class="search-filters-item">
                <a href="" title="Todos">Todos</a>
            </li>
            <li class="search-filters-item">
                <a href="" title="Notícias">Notícias</a>
            </li>
            <li class="search-filters-item">
                <a class="active" href="" title="Receitas">Receitas</a>
            </li>
            <li class="search-filters-item">
                <a href="" title="Vídeos">Vídeos</a>
            </li>
        </ul>
    </nav>
    <div class="search-results">
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

        <article class="search-result">
            <div class="search-result-head">
                <h2 class="search-result-title">
                    <a href="" title="RECEITA DE BOLO DE MACAxEIRA">RECEITA DE BOLO DE MACAxEIRA</a>
                </h2>
                <div class="search-result-info">
                    <a class="search-result-category" href="" title="Mulher Demais">Mulher Demais</a>
                    <time class="search-result-time">24/12/2014</time>
                </div>
            </div>
            <div class="search-result-body">
                <a class="search-result-thumb" href="" title="">
                    <img src="http://placehold.it/90x64" alt="Imagem">
                </a>
                <p class="search-result-description"><a href="" title="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa aperiam vel rerum quia.</a></p>
        </article>

        <a class="lt-load-more-link" href="javascript:;" title="Carregar mais notícias">
            <i class="icon">
                <img src="public/img/icon-more.svg" alt="Carregar mais resultados">
            </i> Carregar mais resultados
        </a>
    </div>

    <?php get_template_part('../programas', 'footer-mobile'); ?>
</section>

<?php get_footer(); ?>
