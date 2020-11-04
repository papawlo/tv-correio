<?php
get_header();
the_post();
?>
<!-- Wrapper -->
<section class="wrapper institutional">

    <div class="lt-default-banner">
        <div class="v-align">
            <div class="v-middle">
                <i class="icon">
                    <span class="v-align">
                        <span class="v-middle">
                            <img src="<?php echo get_template_directory_uri() ?>/public/img/correio-logo.png" alt="TV Correio">
                        </span>
                    </span>
                </i>
                <h1 class="title"><strong>Líder de audiência</strong></h1>
            </div>
        </div>
    </div>

    <div class="institutional-content">
        <h2><?php the_field('institucional_titulo'); ?></h2>
        <p><?php echo get_the_content(); ?></p>        
    </div>

    <section class="institutional-pannel">
        <div class="pannel-border top"></div>
        <div class="pannel-wrap">
            <?php
            $imagem_lideranca = get_field('institucional_imagem_lideranca');
            $portimg = wp_get_attachment_image($imagem_lideranca["ID"], "thumb-750x400", false, array("class" => "lt-programs-widget"));
            echo preg_replace('#(width|height)="\d+"#', '', $portimg);//remove largura e altura da tag img
            ?>
        </div>
        <div class="pannel-border bottom"></div>
    </section>



    
    <?php get_template_part('../programas', 'footer-mobile'); ?>

</section>
<?php get_footer(); ?>
