(function($) {
    $(function() {
        'use strict';

        function menu() {
            function search() {
                $('.search-button-open').on('click', function(e) {
                    e.preventDefault();

                    if ($(this).hasClass('active')) {
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

                    if ($('.submenu-open').hasClass('active')) {
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

                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        $('.header-programs').fadeOut();
                        $('.header-programs').removeClass('active');
                    } else {
                        $(this).addClass('active');
                        $('.header-programs').fadeIn();
                        $('.header-programs').addClass('active');
                    }

                    if ($('.search-button-open').hasClass('active')) {
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

            if ($('.home-panel-slides-list').length > 0) {
                slide();
            }

        }

        $('.home-panel-slides').hover(
                function() {
                    $('.home-panel-nav').fadeIn();
                },
                function() {
                    $('.home-panel-nav').fadeOut();
                }
        );

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

                if (wrap_width > document_width) {
                    left = (wrap_width - document_width) / 2;
                }

                if (left > 0) {
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

                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        $('.signin-alert').fadeOut();
                        $('.signin-alert').removeClass('active');
                    } else {
                        $(this).addClass('active');
                        $('.signin-alert').fadeIn();
                        $('.signin-alert').addClass('active');
                    }

                    if ($('.open-signup-form').hasClass('active')) {
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

                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        $('.signup-form').fadeOut();
                        $('.signup-form').removeClass('active');
                    } else {
                        $(this).addClass('active');
                        $('.signup-form').fadeIn();
                        $('.signup-form').addClass('active');
                    }

                    if ($('.open-signin-alert').hasClass('active')) {
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

            if ($('.comercial-slides-wrap').length > 0) {
                slide();
                signin();
                signup();
            }
        }

        function modal() {
            $(document).on('click', '.modal-box', function() {
                $(this).toggleClass('active')
            });
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

                    if (select.hasClass('active')) {
                        select.removeClass('active');
                    } else {
                        select.addClass('active');
                    }
                });

                item.on('click', function(e) {
                    e.preventDefault();

                    var value = $(this).data('value');
                    var html = $(this).html();

                    input.val(value);
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

                        if (itemMargin === 0) {
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

                        if (currLeft > 0) {
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

                        if (currLeft < totalLeft) {
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

        function map() {
            var url = $('.lt-map .lt-map-content .map-image').attr('src');

            $('.lt-map .lt-map-content .map-image').remove();

            $('.close-lt-map-widget').on('click', function() {
                $('g.city').each(function() {
                    if (cidades_com_sinal.indexOf($(this).attr("id")) > -1) {
                        $(this).find('path').css('fill', '#e8e8e8');
                    } else {
                        $(this).find('path').css('fill', '');
                    }
                });
                $('.lt-map-widget').fadeOut();
            })

            $('.lt-map .lt-map-content').load(url, null, function() {
                $(this).find('g.city').each(function() {

                    if (cidades_com_sinal.indexOf($(this).attr("id")) > -1) {
                        $(this).find('path').css('fill', '#e8e8e8');
                    }


                    $(this).on('click', function() {
                        var id = $(this).attr('id');

                        var top = $(this).offset().top - 100;
                        var left = $(this).offset().left;

                        $('g.city').each(function() {
                            $(this).find('path').css('fill', '');
                        });

                        $(this).find('path').css('fill', '#FFB416');

                        $.get($('.lt-map .lt-map-content').data('cidades'), function(data) {
                            for (var i in data) {
                                if (id === i) {
                                    if (left > 600) {
                                        $('.lt-map-widget').css({
                                            top: top - 20,
                                            left: left - 200
                                        });

                                        $('.lt-map-widget').addClass('right');
                                    } else {
                                        $('.lt-map-widget').css({
                                            top: top,
                                            left: left
                                        });

                                        $('.lt-map-widget').removeClass('right');
                                    }

                                    $('.lt-map-widget').fadeIn();
                                    $('.g-city-name').html(data[i].name);
                                    $('.g-city-population b').html(data[i].population);
                                }
                            }
                        });
                    });
                });
            });

        }

        menu();
        home();
        modal();
        form();
        comercial();
        programsWidget();

        if ($('.lt-map').length > 0) {
            map();
        }

    });
})(jQuery);