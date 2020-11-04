(function($) {
    $(function() {
        'use strict';
        
          var custom_event = $.support.touch ? "tap" : "click";

        function icons() {
            if (navigator.userAgent.search("Android") != -1) {
                // menu button
                $('.header-menu-button .icon .menu').attr('src', theme_base + '/public/img/icon-menu.png');
                $('.header-menu-button .icon .close').attr('src', theme_base + '/public/img/icon-menu-close.png');

                // search button
                $('.header-search-submit .icon img').attr('src', theme_base + '/public/img/icon-search.png');

                $('.lt-load-more-link').each(function() {
                    $(this).find('.icon img').attr('src', theme_base + '/public/img/icon-more.png');
                });
            }
        }

        function menu() {
            $('.header-menu-button').on(custom_event, function(e) {
                e.preventDefault();

                if ($(this).parent().hasClass('close')) {
                    $(this).parent().removeClass('close');

                    $('.header-menu-list').fadeOut();
                    $('.header-menu-list').removeClass('active');
                } else {
                    $(this).parent().addClass('close');

                    $('.header-menu-list').fadeIn();
                    $('.header-menu-list').addClass('active');
                }
            });
        }

        function header() {
            var image_width = $('.header-program-presentation').find('.image').width();
            var pannel_width = $('.header-program-presentation').width();
            var left = 0;

            if (image_width > pannel_width) {
                left = (image_width - pannel_width) / 2;
                $('.header-program-presentation').find('.image').css('left', -left);
            }
        }

        header();

        function sidebar() {
            function blocks() {
                var curr = 0;
                var total = 0;

                function bootstrap() {
                    $('.program-block').first().fadeIn();

                    curr = 0;
                    total = $('.program-block').length;

                    swipeNext();
                    swipePrev();
                    tapNext();
                    tapPrev();
                }

                function swipeNext() {
                    $('.program-blocks-slides-wrap').on('swipeleft', function(e) {
                        e.preventDefault();
                        toNext();
                    });
                }

                function swipePrev() {
                    $('.program-blocks-slides-wrap').on('swiperight', function(e) {
                        e.preventDefault();
                        toPrev();
                    });
                }

                function tapNext() {
                    $('.program-blocks-slides-nav-next').on(custom_event, function(e) {
                        e.preventDefault();
                        toNext();
                    });
                }

                function tapPrev() {
                    $('.program-blocks-slides-nav-prev').on(custom_event, function(e) {
                        e.preventDefault();
                        toPrev();
                    });
                }

                function toNext() {
                    if (curr + 1 < total) {
                        curr++;
                        update(curr);
                    }
                    console.log(curr);
                }

                function toPrev() {
                    if (curr >= 1) {
                        curr--;
                        update(curr);
                    }
                    console.log(curr);
                }

                function update(curr) {
                    $('.program-block').each(function(idx) {

                        if (curr == idx) {
                            $(this).fadeIn();
                        } else {
                            $(this).fadeOut();
                        }
                    });
                }

                bootstrap();
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

            blocks();
            icons();
        }

        function home() {
            function pannel() {
                var pannel_width = $('.home-pannel').width();
                var slides_width = $('.home-pannel-slides').width();

                if (slides_width > pannel_width) {
                    var left = (slides_width - pannel_width) / 2;

                    $('.home-pannel-slides').css('left', -left);
                }
            }

            function slides() {
                function initializeSlide() {
                    var zIndex = 100;
                    $('.home-pannel-slides').find('.slide').each(function(index) {
                        if (index === 0) {
                            $(this).addClass('active');
                        }

                        $(this).css({
                            'zIndex': zIndex
                        });

                        zIndex--;
                    });
                }

                function initializeList() {
                    var totalListWidth = 0;

                    $('.home-pannel-thumbs').find('.home-pannel-thumbs-item').each(function() {
                        totalListWidth += parseInt($(this).css('width'), 10) + parseInt($(this).css('marginRight'));
                    });

                    $('.home-pannel-thumbs-list').css('width', totalListWidth);
                }

                initializeSlide();
                initializeList();
            }

            pannel();
            slides();
        }

        function comercial() {
            function slide() {
                var pannel_width = $('.comercial-pannel').width();
                var slides_width = $('.comercial-pannel-slides').width();
                var slide_width = 0;
                var left = 0;
                var lefti = 0;
                var curr = 1;
                var total = 0;

                function initTotal() {
                    total = $('.comercial-pannel-slides-wrap').find('.slide').length;
                }

                function initSlideWidth() {
                    slide_width = $('.comercial-pannel-slides-wrap').find('.slide').first().width();
                }

                function initLeft() {
                    if (slides_width > pannel_width) {
                        lefti = (slides_width - pannel_width) / 2;

                        $('.comercial-pannel-slides').css('left', -lefti);
                        $('.comercial-pannel-slides-wrap').css('left', -lefti);
                    }
                }

                function initWrap() {
                    var totalWrapWidth = 0;

                    $('.comercial-pannel-slides-wrap').find('.slide').each(function() {
                        totalWrapWidth += $(this).width();
                    });

                    $('.comercial-pannel-slides-wrap').css('width', totalWrapWidth);
                }

                function tapNext() {
                    $('.comercial-pannel-nav.next').on(custom_event, function(e) {
                        e.preventDefault();

                        toNext();
                    });
                }

                function tapPrev() {
                    $('.comercial-pannel-nav.prev').on(custom_event, function(e) {
                        e.preventDefault();

                        toPrev();
                    });
                }

                function swipeNext() {
                    $('.comercial-pannel').on('swipeleft', function(e) {
                        e.preventDefault();

                        toNext();
                    });
                }

                function swipePrev() {
                    $('.comercial-pannel').on('swiperight', function(e) {
                        e.preventDefault();

                        toPrev();
                    });
                }

                function toNext() {
                    if (curr < total) {
                        left = curr * slide_width;
                        left += lefti;

                        $('.comercial-pannel-slides-wrap').animate({
                            'left': -left
                        });

                        curr++;
                    }
                }

                function toPrev() {
                    if (curr > 1) {
                        left -= slide_width;

                        $('.comercial-pannel-slides-wrap').animate({
                            'left': -left
                        });

                        curr--;
                    }
                }

                initTotal();
                initSlideWidth();
                initLeft();
                initWrap();
                swipeNext();
                swipePrev();
                tapNext();
                tapPrev();
            }

            function signin() {
                $('.open-signin-alert').on(custom_event, function(e) {
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

                $('.close-signin-alert').on(custom_event, function(e) {
                    e.preventDefault();

                    $('.open-signin-alert').removeClass('active');
                    $('.signin-alert').fadeOut();
                    $('.signin-alert').removeClass('active');
                });
            }

            function signup() {
                $('.open-signup-form').on(custom_event, function(e) {
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

                $('.close-signup-form').on(custom_event, function(e) {
                    e.preventDefault();

                    $('.open-signup-form').removeClass('active');
                    $('.signup-form').fadeOut();
                    $('.signup-form').removeClass('active');
                });
            }

            slide();
            signin();
            signup();
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
                    if (!$(this).find('a')) {
                        e.preventDefault();
                    }


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
                var slideWrap = widget.find('.lt-programs-slides');
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

                    totalLeft = totalWrap - (1 * itemWidth);
                    totalLeft = totalLeft - (itemWidth);

                    slideList.css('width', totalWrap);

                    tapPrev();
                    tapNext();
                    swipePrev();
                    swipeNext();
                }

                function tapPrev() {
                    slidePrev.on(custom_event, function(e) {
                        e.preventDefault();
                        toPrev();
                    });
                }

                function tapNext() {
                    slideNext.on(custom_event, function(e) {
                        e.preventDefault();
                        toNext();
                    });
                }

                function swipePrev() {
                    slideWrap.on('swiperight', function(e) {
                        e.preventDefault();
                        toPrev();
                    });
                }

                function swipeNext() {
                    slideWrap.on('swipeleft', function(e) {
                        e.preventDefault();
                        toNext();
                    });
                }

                function toPrev() {
                    if (currLeft > 0) {
                        currLeft -= itemWidth + itemMargin;

                        slideList.animate({
                            left: -currLeft
                        });
                    }
                }

                function toNext() {
                    if (currLeft < totalLeft) {
                        currLeft += itemWidth + itemMargin;

                        slideList.animate({
                            left: -currLeft
                        });
                    }
                }

                bootstrap();
            });
        }

        function recipe() {

            function slides() {
                var current = 0;

                function bootstrap() {
                    function centralize() {
                        var wrap_width = $('.recipe-slides-wrap').width();
                        var slide_width = $('.recipe-slides-wrap').find('.slide').first().width();

                        if (slide_width > wrap_width) {
                            var left = (slide_width - wrap_width) / 2;

                            $('.recipe-slides-wrap').find('.slide').each(function() {
                                $(this).css('left', -left);
                            });
                        }
                    }

                    function initialize() {
                        $('.recipe-slides-wrap').find('.slide').each(function(index) {
                            if (index === current) {
                                $(this).addClass('active');
                            }

                            $(this).attr('rel', index);
                        });

                        $('.recipe-slides-thumbs').find('.thumb').each(function(index) {
                            if (index === current) {
                                $(this).addClass('active');
                            }

                            $(this).data('rel', index);
                        });
                    }

                    function thumbs() {

                        $('.recipe-slides-thumbs').find('.thumb').on(custom_event, function(e) {
                            e.preventDefault();

                            var rel = $(this).data('rel');

                            $('.recipe-slides-thumbs').find('.thumb').each(function(index) {
                                if (index === rel) {
                                    $(this).addClass('active');
                                    current = index;
                                } else {
                                    $(this).removeClass('active');
                                }
                            });

                            update();
                        });
                    }

                    function update() {
                        $('.recipe-slides-wrap').find('.slide').each(function(index) {
                            if (index === current) {
                                $(this).addClass('active');
                            } else {
                                $(this).removeClass('active');
                            }
                        });
                    }

                    centralize();
                    initialize();
                    thumbs();
                }

                bootstrap();
            }

            if ($('.recipe-slides').length > 0) {
                slides();
            }

        }


        icons();
        recipe();
        sidebar();
        menu();
        home();
        form();
        if ($('.comercial').length > 0) {
            comercial();
        }
        programsWidget();

    });
})(jQuery);