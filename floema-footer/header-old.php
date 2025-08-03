<?php
$lastModified = isset($_SERVER['SCRIPT_FILENAME']) && file_exists($_SERVER['SCRIPT_FILENAME']) ? filemtime($_SERVER['SCRIPT_FILENAME']) : time();
$ifModified = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'] ?? '', 5));
if ($ifModified && $ifModified >= $lastModified) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
    exit;
}
header('Last-Modified: ' . gmdate("D, d M Y H:i:s \G\M\T", $lastModified));
?> <?= LANGUAGE_ID ?><span class="bxhtmled-surrogate-inner"><span class="bxhtmled-right-side-item-icon"></span><span class="bxhtmled-comp-lable" unselectable="on" spellcheck="false">Код PHP</span></span>"&gt; <?

    use Bitrix\Main\Page\Asset;

    Asset::getInstance()->addString('<meta name="viewport" content="width=device-width,initial-scale=1">');
    ?> <?=SITE_TEMPLATE_PATH?><span class="bxhtmled-surrogate-inner"><span class="bxhtmled-right-side-item-icon"></span><span class="bxhtmled-comp-lable" unselectable="on" spellcheck="false">Код PHP</span></span>/favicon.svg"&gt; <?=SITE_TEMPLATE_PATH?><span class="bxhtmled-surrogate-inner"><span class="bxhtmled-right-side-item-icon"></span><span class="bxhtmled-comp-lable" unselectable="on" spellcheck="false">Код PHP</span></span>/favicon.svg"&gt; <? $APPLICATION->ShowHead() ?> <?

    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/styles/fansybox.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/styles/main.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/styles/re_style.css");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/jquery.js");

    Asset::getInstance()->addString('<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>');
    Asset::getInstance()->addString('<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>');


    //Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/main.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/owl.carousel.min.js");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/styles/owl.carousel.min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/styles/owl.theme.default.min.css");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/fansybox.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/custom.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/re_main.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/fansybox.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/script.min.js");
   Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/styles/custom-footer.css");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/custom-footer.js");
?> <script defer type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> <?
    Asset::getInstance()->addString('<script src="https://api-maps.yandex.ru/2.1/?apikey=d7f796e6-b982-4f3a-9dae-e214d0513617&lang=ru_RU" type="text/javascript"></script>');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/script.js");
    ?> <?=SITE_TEMPLATE_PATH?><span class="bxhtmled-surrogate-inner"><span class="bxhtmled-right-side-item-icon"></span><span class="bxhtmled-comp-lable" unselectable="on" spellcheck="false">Код PHP</span></span>/assets/css/main.css"&gt; <script defer src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script> <script defer src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script> <!--    <script  src="-->#BXPHP_10#<!--/assets/js/main.js"></script>--> <script type="text/javascript">!function () {
            var t = document.createElement("script");
            t.type = "text/javascript", t.async = !0, t.src = 'https://vk.com/js/api/openapi.js?169', t.onload = function () {
                VK.Retargeting.Init("VK-RTRG-1322781-53VVf"), VK.Retargeting.Hit()
            }, document.head.appendChild(t)
        }();</script> <!-- Yandex.Metrika counter --> <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(86821068, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true,
                ecommerce:"dataLayer"
        });
        </script> <!-- /Yandex.Metrika counter --> <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];
    </script> <!--<script src="//code.jivosite.com/widget/llDv00mD3i" async></script>--> <? $APPLICATION->ShowPanel(); ?> <!-- Yandex.Metrika counter --> <script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(86821068, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });
</script> <!-- /Yandex.Metrika counter --> <!-- Top.Mail.Ru counter --> <script type="text/javascript">
var _tmr = window._tmr || (window._tmr = []);
_tmr.push({id: "3516068", type: "pageView", start: (new Date()).getTime()});
(function (d, w, id) {
  if (d.getElementById(id)) return;
  var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
  ts.src = "https://top-fwz1.mail.ru/js/code.js";
  var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
  if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
})(document, window, "tmr-code");
</script> <!-- /Top.Mail.Ru counter --> <main>
<div class="header">
 <nav class="nav">
	<div class="container">
 <a href="/" class="nav__logo-link">
		<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/header/logo.php"
	)
);?> </a>
		<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"top",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "top",
		"COMPONENT_TEMPLATE" => "top",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(),
		"MENU_CACHE_TIME" => "360000",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "N",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N"
	)
);?>
		<div class="nav__wrapper">
			<div class="basket">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.line",
	"floema",
	Array(
		"COMPONENT_TEMPLATE" => "floema",
		"HIDE_ON_BASKET_PAGES" => "N",
		"PATH_TO_AUTHORIZE" => SITE_DIR."/auth/",
		"PATH_TO_BASKET" => SITE_DIR."/cart/",
		"PATH_TO_ORDER" => SITE_DIR."/cart/order_make/",
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",
		"PATH_TO_PROFILE" => SITE_DIR."personal/",
		"PATH_TO_REGISTER" => SITE_DIR."register/",
		"POSITION_FIXED" => "N",
		"SHOW_AUTHOR" => "N",
		"SHOW_EMPTY_VALUES" => "N",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_PERSONAL_LINK" => "Y",
		"SHOW_PRODUCTS" => "N",
		"SHOW_REGISTRATION" => "N",
		"SHOW_TOTAL_PRICE" => "N"
	)
);?> <a href="#contact-form-popup" class="header-contact-button" data-fancybox="">Связаться с нами</a>
			</div>
			 <!-- div class="socails">
                        <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/include/header/vk.php"
                        )
                    ); ?>
						<? /* $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/header/inst.php"
                            )
); */ ?>
						<? /* $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/header/facebook.php"
                            )
);*/ ?>



                    </div -->
			<div class="burger">
				<div class="burger__item">
				</div>
				<div class="burger__item">
				</div>
				<div class="burger__item">
				</div>
			</div>
			<div class="cart-success" id="cart-success">
				<div class="cart-success__wrapper">
					 Товар добавлен в корзину!
				</div>
			</div>
		</div>
	</div>
 </nav>
	<!-- <script>
 jQuery(function($){
   $('[data-phone]').mask("9 (999) 999-99-99");
   $('[name=client_phone]').mask("+9 (999) 999-99-99");
   $('#soa-property-3').mask("9 (999) 999-99-99");

$(document).ready(function(){

    $('.researches__slider').slick({
        infinite: true,
        slidesToShow: 3, 
        slidesToScroll: 1,
        variableWidth: false,
        centerMode: true,
        
        prevArrow: $('.researches-prev'),
        nextArrow: $('.researches-next'),        
    });
});

$(document).ready(function(){
    if($('.reviews__slide').length >= 4 || $(window).width() <= 965){
        $('.reviews__slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: false,
            prevArrow: $('.reviews-prev'),
            nextArrow: $('.reviews-next'),

            responsive: [
                {
                    breakpoint: 966,
                    settings: {
                      slidesToShow: 1,
                      dots: true,
                    }
                }
              ]            
    
        })
        $('.reviews__controlls').show()
    }

    $('.reviews__slide__text').each(function(){
        let fullText = $(this).text();
        let text = fullText;
        if (text.length >= 500) {
            text = text.substring(0, 500);
            var lastIndex = text.lastIndexOf(" ");       // позиция последнего пробела
            text = text.substring(0, lastIndex) + '...';
          }
          
          $(this).text(text).attr('data-full-text', fullText);     
    });
    $('.reviews__slide__read-more').on('click', function(e){
        e.preventDefault();
        let parent = $(this).parents('.reviews__slide');
        let fullText = $(this).parents('.reviews__slide').find('.reviews__slide__text').attr('data-full-text');
        let target = $(this).parents('.reviews__slide').find('.reviews__slide__text');

        target.text(fullText);
        $(this).hide();
        $(this).parents('.reviews__slide').css('height', 'max-content');
        // $('.reviews__slider').find('.slick-track').css('height', $(this).parents('.reviews__slide').innerHeight());
    });

});
});
</script> --> <script>
 
$(document).on('click', '.prev', function(event) {
    event.stopPropagation(); // Останавливаем всплытие события
    event.preventDefault(); // Отменяем стандартное поведение
    // Ваш код для переключения слайда
});


 jQuery(function($){
   $('[data-phone]').mask("9 (999) 999-99-99");
   $('[name=client_phone]').mask("+9 (999) 999-99-99");
   $('#soa-property-3').mask("9 (999) 999-99-99");

$(document).ready(function(){

    $('.catalog__wrapper__nav__item').on('click', function() {
      let progress = $('.catalog__wrapper__nav-progress');
      let width = $(this).innerWidth();

        progress.css({
	  width: width+'px',
	  left: $(this).position().left+'px'
	});

      console.log($(this).position().left);
    });

    $('.researches__slider').slick({
        infinite: true,
        slidesToShow: 3, 
        slidesToScroll: 1,
        variableWidth: false,
        centerMode: true,
        
        prevArrow: $('.researches-prev'),
        nextArrow: $('.researches-next'),        
    });

    $('.recommends__slider').slick({
        infinite: false,
        slidesToShow: 1, 
        slidesToScroll: 1,
        adaptiveHeight: true,
        dots: true,
        
        prevArrow: $('.recommends-prev'),
        nextArrow: $('.recommends-next'),        
    });

    $('.recommends__video-slider').slick({
        infinite: false,
        slidesToShow: 3, 
        slidesToScroll: 1,
        dots: true,
        prevArrow: $('.vids-prev'),
        nextArrow: $('.vids-next'),  

        responsive: [
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    variableWidth: true,
                }
            },
            {
                breakpoint: 561,
                settings: {
                    slidesToShow: 1,
                    variableWidth: false,
                }
            },
        ]
    });

    if(window.innerWidth <= 950) {
        $('.news-new__list._slider').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          variableWidth: true,

          responsive: [
            {
                breakpoint: 561,
                settings: {
                    slidesToShow: 1,
                    variableWidth: false,
                }
            },
          ]
        });
    }
});




$(document).ready(function(){
	$('.catalog__wrapper__nav__item').on('click', function(){
		$('.catalog__wrapper__list').each(function(){
			$(this).addClass('--hidden');
		});
		$('.catalog__wrapper__list').each(function() {
			$(this).find('.slick-dots').find('li').eq(1).click();
		});
		setTimeout(() => {
		  $('.catalog__wrapper__list').each(function(){
		   $(this).removeClass('--hidden');
		  });
		
		}, 500);


	});

   

    if($('.recommends__item').length > 5) {
		$('.recommends__list').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			infinite: true,
			arrows: true,
			responsive: [
				{
					breakpoint: 766,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						arrows: false,
						dots: true
					}
				},
			]
		});
	}
    if(window.innerWidth <= 950) {
      $('.catalog__wrapper__list').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,

          dots: true,
      })
    }
    if($('.reviews__slide').length >= 4 || $(window).width() <= 965){
        $('.reviews__slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: false,
            prevArrow: $('.reviews-prev'),
            nextArrow: $('.reviews-next'),

            responsive: [
                {
                    breakpoint: 966,
                    settings: {
                      slidesToShow: 1,
                      dots: true,
                    }
                }
              ]            
    
        })
        $('.reviews__controlls').show()
    }

    $('.reviews__slide__text').each(function(){
        let fullText = $(this).text();
        let text = fullText;
        if (text.length >= 500) {
            text = text.substring(0, 500);
            var lastIndex = text.lastIndexOf(" ");       // позиция последнего пробела
            text = text.substring(0, lastIndex) + '...';
          }
          
          $(this).text(text).attr('data-full-text', fullText);     
    });
    $('.reviews__slide__read-more').on('click', function(e){
        e.preventDefault();
        let parent = $(this).parents('.reviews__slide');
        let fullText = $(this).parents('.reviews__slide').find('.reviews__slide__text').attr('data-full-text');
        let target = $(this).parents('.reviews__slide').find('.reviews__slide__text');

        target.text(fullText);
        $(this).hide();
        $(this).parents('.reviews__slide').css('height', 'max-content');
        // $('.reviews__slider').find('.slick-track').css('height', $(this).parents('.reviews__slide').innerHeight());
    });

});
});

</script> <style>
    .recommends__item.slick-slide {
        margin: 0 10px;
    }
    .slick-prev::before, .slick-next::before  {
        color: #DCB7A1;
        opacity: 1;
    }
</style>
</div>
 </main>