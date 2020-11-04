(function($) {
    /*$(function() {
     var iasNoticias = $.ias({
     container:  ".lt-top-stories-list",
     item:       ".lt-top-stories-item",
     pagination: "#pagination-news",
     next:       "#pagination-news a.lt-load-more-link"
     });
     
     iasNoticias.extension(new IASSpinnerExtension({
     html: '<div class="ias-spinner" style="text-align: center; clear:both;"><img src="{src}"/></div>'
     }));
     iasNoticias.extension(new IASTriggerExtension({
     offset: 1,
     text: 'Carregar mais notícias',
     html: '<div class="ias-trigger ias-trigger-next" style="clear:both; text-align: center; cursor: pointer; padding-top:2.1875rem"><a href="javascript:;" class="lt-load-more-link"><i class="icon"></i> {text}</a></div>',
     }));
     });*/

    $('#facebook-sharrre').sharrre({
        share: {
            facebook: true
        },
        template: '<a class="link" href="javascript:;" title="Compartilhe no Facebook"> <i class="icon facebook"><img src="' + theme_base + '/public/img/icon-facebook.svg" alt="Facebook"></i></a>',
        enableHover: false,
        click: function(api, options) {
            api.simulateClick();
            api.openPopup('facebook');
        }
    });

    $('#twitter-sharrre').sharrre({
        share: {
            twitter: true
        },
        template: '<a class="link" href="javascript:;" title="Compartilhe no Twitter"><i class="icon twitter"><img src="' + theme_base + '/public/img/icon-twitter.svg" alt="Twitter"></i></a>',
        enableHover: false,
        click: function(api, options) {
            api.simulateClick();
            api.openPopup('twitter');
        }
    });

    $('input[name="recipe_category"]').change(function() {
        $('#ajax-load').addClass('ajax-loading');
        $('#ajax-load').load($(this).val() + " .loop-content", function() {
            $('#ajax-load').removeClass('ajax-loading');
            ajaxLoadMore();
        });
    });

    function ajaxLoadMore() {
        $('.ajax-load-more').each(function(i) {
            console.log($(this));
            var js = $(this).jscroll({
                autoTrigger: false,
                nextSelector: 'span.lt-load-more-link',
                contentSelector: $(this).data('content-selector'),
                loadingHtml: '<div class="ias-spinner" style="text-align: center; clear:both;"><img src="' + theme_base + '/public/img/loading.gif" /></div>'
            });
            console.log(js);
        });
    }
    ;
    ajaxLoadMore();

    $.wpcf7UpdateScreenReaderResponse = function(form, data) {
        return true;
    }

    $.fn.wpcf7NotValidTip = function(message) {
        return true;
    }

    $.fn.wpcf7ClearResponseOutput = function() {
        return this.each(function() {
            $(this).find('div.wpcf7-response-output').hide('fast').empty().removeClass('wpcf7-mail-sent-ok wpcf7-mail-sent-ng wpcf7-validation-errors wpcf7-spam-blocked').removeAttr('role');
            $(this).find('span.wpcf7-not-valid-tip').remove();
            $(this).find('img.ajax-loader').css({visibility: 'hidden'});
        });
    };
    if ($('#map').length > 0) {
        var myLatLng = new google.maps.LatLng($('#map').data('lat'), $('#map').data('lng'));
        var mapOptions = {
            zoom: 17,
            center: myLatLng,
            scrollwheel: false,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        };
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Sistema Correio de Comunicação',
        });
    }

//    jQuery('.btn-play-video').click(function() {
//        jQuery(this).hide();
//        jQuery('.video-player').get(0).playVideo();
//    });
})(jQuery);