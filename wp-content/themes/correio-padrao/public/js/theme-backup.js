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
        template: '<a class="link" href="javascript:;" title="Compartilhe no Facebook"> <i class="icon facebook"><img src="'+theme_base+'/public/img/icon-facebook.svg" alt="Facebook"></i></a>',
        enableHover: false,
        click: function(api, options){
            api.simulateClick();
            api.openPopup('facebook');
        }
    });

    $('#twitter-sharrre').sharrre({
        share: {
            twitter: true
        },
        template: '<a class="link" href="javascript:;" title="Compartilhe no Twitter"><i class="icon twitter"><img src="'+theme_base+'/public/img/icon-twitter.svg" alt="Twitter"></i></a>',
        enableHover: false,
        click: function(api, options){
            api.simulateClick();
            api.openPopup('twitter');
        }
    });

    $('input[name="recipe_category"]').change(function() {
    	$('#ajax-load').addClass('ajax-loading');
    	$('#ajax-load').load($(this).val() + " .loop-content",function() {
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
			    loadingHtml: '<div class="ias-spinner" style="text-align: center; clear:both;"><img src="'+theme_base+'/public/img/loading.gif" /></div>'
			});
			console.log(js);
		});
    };ajaxLoadMore();
})(jQuery);