(function($) {
    $(function() {
    'use strict';

        function sidebar() {
            function slide() {
              $('.program-blocks-slides-wrap').cycle({
                speed: 500,
                timeout: 7000,
                slides: '.program-block',
                prev: '.program-blocks-slides-nav-prev',
                next: '.program-blocks-slides-nav-next'
              });
            }

            function icons() {
              var mUrl = $('.program-contact .icon-wrap .icon.message img').attr('src');
              var aUrl = $('.program-contact .icon-wrap .icon.ad img').attr('src');

              $('.program-contact .icon-wrap .icon.message img').remove();
              $('.program-contact .icon-wrap .icon.ad img').remove();
              
              $('.program-contact .icon-wrap .icon.message').svg({
                loadURL: mUrl
              });

              $('.program-contact .icon-wrap .icon.ad').svg({
                loadURL: aUrl
              });
            }

            slide();
            icons();
        }

        function receita() {
            function slide() {
                $('.recipe-slides-wrap').cycle({
                    speed: 500,
                    timeout: 5000,
                    slides: '.slide',
                    prev: '.recipe-slides-nav-prev',
                    next: '.recipe-slides-nav-next',
                    pager: '.recipe-slides-thumbs-pager'
                });
            }

            if($('.recipe-slides').length > 0) {
                slide();
            }
        }

        function header() {
            var image_width = $('.header-program-presentation').find('img').width();
            var document_width = $(document).width();
            var left = 0;

            if(image_width > document_width) {
                left = (image_width - document_width) / 2;
            }

            if(left > 0) {
                $('.header-program-presentation').find('.image').css({
                    'left': -left
                });
            }
        }

        function menu() {
            function search() {
                $('.search-button-open').on('click', function(e) {
                    e.preventDefault();

                    if($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        $('.header-search').fadeOut();
                        $('.header-search').removeClass('active');
                    } else {
                        $(this).addClass('active');
                        $("#q").val('');
                        $('.header-search').fadeIn();
                        $('.header-search').addClass('active');
                        $('#q').focus();
                    }

                    if($('.submenu-open').hasClass('active')) {
                        $('.submenu-open').removeClass('active');
                        $('.header-programs').fadeOut();
                        $('.header-programs').removeClass('active');
                    }
                });

                $('.search-button-close').on('click', function(e) {
                    e.preventDefault();

                    $('.search-button-open').removeClass('active');
                    $('.header-search').fadeOut();
                    $('.header-search').removeClass('active');
                });
            }

            function submenu() {
                $('.submenu-open').on('click', function(e) {
                    e.preventDefault();

                    if($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        $('.header-programs').fadeOut();
                        $('.header-programs').removeClass('active');
                    } else {
                        $(this).addClass('active');
                        $('.header-programs').fadeIn();
                        $('.header-programs').addClass('active');
                    }

                    if($('.search-button-open').hasClass('active')) {
                        $('.search-button-open').removeClass('active');
                        $('.header-search').fadeOut();
                        $('.header-search').removeClass('active');
                    }
                });
            }

            search();
            submenu();
        }

        function home() {
            function slide() {
                $('.home-panel-slides-list').cycle({
                    speed: 500,
                    timeout: 7000,
                    slides: 'li',
                    prev: '.home-panel-nav-prev',
                    next: '.home-panel-nav-next',
                    pager: '.home-panel-thumbs-pager'
                });
            }

            if($('.home-panel-slides-list').length > 0) {
                slide();
            }
        }
        
        //noticias, videos filter

        $("#programs-filter").selectmenu();

        $("#calendario").datepicker({
            dateFormat: 'dd-mm-yy',
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'
            ],
            dayNamesMin: [
                'D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'
            ],
            dayNamesShort: [
                'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'
            ],
            monthNames: ['Janeiro', 'Fevereiro', 'MarÃ§o', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
                'Outubro', 'Novembro', 'Dezembro'
            ],
            monthNamesShort: [
                'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set',
                'Out', 'Nov', 'Dez'
            ],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });

        function comercial() {
            function slide() {
                var wrap_width = $('.comercial-slides-wrap').width();
                var document_width = $(document).width();
                var left = 0;

                if(wrap_width > document_width) {
                    left = (wrap_width - document_width) / 2;
                }

                if(left > 0) {
                    $('.comercial-slides-wrap').css('left', -left);
                }

                $('.comercial-slides-wrap').cycle({
                    speed: 1000,
                    timeout: 7000,
                    prev: '.comercial-slides-nav-prev',
                    next: '.comercial-slides-nav-next'
                });
            }

            function signin() {
                $('.open-signin-alert').on('click', function(e) {
                    e.preventDefault();

                    if($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        $('.signin-alert').fadeOut();
                        $('.signin-alert').removeClass('active');
                    } else {
                        $(this).addClass('active');
                        $('.signin-alert').fadeIn();
                        $('.signin-alert').addClass('active');
                    }

                    if($('.open-signup-form').hasClass('active')) {
                        $('.open-signup-form').removeClass('active');
                        $('.signup-form').fadeOut();
                        $('.signup-form').removeClass('active');
                    }
                });

                $('.close-signin-alert').on('click', function(e) {
                    e.preventDefault();

                    $('.open-signin-alert').removeClass('active');
                    $('.signin-alert').fadeOut();
                    $('.signin-alert').removeClass('active');
                });
            }

            function signup() {
                $('.open-signup-form').on('click', function(e) {
                    e.preventDefault();

                    if($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        $('.signup-form').fadeOut();
                        $('.signup-form').removeClass('active');
                    } else {
                        $(this).addClass('active');
                        $('.signup-form').fadeIn();
                        $('.signup-form').addClass('active');
                    }

                    if($('.open-signin-alert').hasClass('active')) {
                        $('.open-signin-alert').removeClass('active');
                        $('.signin-alert').fadeOut();
                        $('.signin-alert').removeClass('active');
                    }
                });

                $('.close-signup-form').on('click', function(e) {
                    e.preventDefault();

                    $('.open-signup-form').removeClass('active');
                    $('.signup-form').fadeOut();
                    $('.signup-form').removeClass('active');
                });
            }

            if($('.comercial-slides-wrap').length > 0) {
                slide();
                signin();
                signup();
            }
        }

        function form() {
            $('.lt-form-select').each(function() {
                var select = $(this);
                var button = select.find('.icon-wrap');
                var input = select.find('.lt-form-select-input');
                var curr = select.find('.current');
                var label = curr.find('.label');
                var list = select.find('.list');
                var item = list.find('.item');

                button.on('click', function(e) {
                    e.preventDefault();

                    if(select.hasClass('active')) {
                        select.removeClass('active');
                    } else {
                        select.addClass('active');
                    }
                });

                item.on('click', function(e) {
                    e.preventDefault();

                    var value = $(this).data('value');
                    var html = $(this).html();

                    input.val(value).trigger('change');
                    label.html(html);

                    select.removeClass('active');
                });
            });
        }

        function programsWidget() {
            $('.lt-programs-widget').each(function() {
                var widget = $(this);
                var slideList = widget.find('.lt-programs-slides-list');
                var slideItem = widget.find('.lt-programs-slides-item');
                var slideNext = widget.find('.lt-programs-slides-next');
                var slidePrev = widget.find('.lt-programs-slides-prev');

                var itemWidth = 0;
                var itemMargin = 0;
                var totalWrap = 0;
                var currLeft = 0;
                var totalLeft = 0;

                function bootstrap() {
                    slideItem.each(function() {
                        totalWrap += $(this).width() + parseInt($(this).css('marginRight'), 10);

                        itemWidth = $(this).width();

                        if(itemMargin === 0) {
                            itemMargin = parseInt($(this).css('marginRight'), 10);
                        }
                    });

                    totalLeft = totalWrap - ((4 * itemWidth) + (4 * itemMargin));
                    totalLeft = totalLeft - (itemWidth);

                    slideList.css('width', totalWrap);

                    swipePrev();
                    swipeNext();
                }

                function swipePrev() {
                    slidePrev.on('click', function(e) {
                        e.preventDefault();

                        if(currLeft > 0) {
                            currLeft -= itemWidth + itemMargin;

                            slideList.animate({
                                left: -currLeft
                            });
                        }
                    });
                }

                function swipeNext() {
                    slideNext.on('click', function(e) {
                        e.preventDefault();

                        if(currLeft < totalLeft) {
                            currLeft += itemWidth + itemMargin;

                            slideList.animate({
                                left: -currLeft
                            });
                        }
                    });
                }

                bootstrap();
            });
        }

        header();
        menu();
        receita();
        sidebar();
        home();
        form();
        comercial();
        programsWidget();
    });
})(jQuery);