<?php
use Bitrix\Main\Page\Asset;

// Handle Last-Modified header for caching
$lastModified = isset($_SERVER['SCRIPT_FILENAME']) && file_exists($_SERVER['SCRIPT_FILENAME']) 
    ? filemtime($_SERVER['SCRIPT_FILENAME']) 
    : time();
$ifModified = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) 
    ? strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5)) 
    : false;

if ($ifModified && $ifModified >= $lastModified) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
    exit;
}
header('Last-Modified: ' . gmdate("D, d M Y H:i:s \G\M\T", $lastModified));

// Add meta tags
Asset::getInstance()->addString('<meta name="viewport" content="width=device-width,initial-scale=1">');

// Add favicon
Asset::getInstance()->addString('<link rel="icon" href="' . SITE_TEMPLATE_PATH . '/favicon.svg">');

// Include Bitrix head
$APPLICATION->ShowHead();

// Add CSS
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/styles/fansybox.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/styles/main.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/styles/re_style.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/styles/owl.carousel.min.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/styles/owl.theme.default.min.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/styles/custom-footer.css');

// Add JS
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/scripts/jquery.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/scripts/owl.carousel.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/scripts/fansybox.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/scripts/custom.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/scripts/re_main.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/scripts/script.min.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/scripts/custom-footer.js');
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/scripts/script.js');

// External scripts
Asset::getInstance()->addString('<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" defer></script>');
Asset::getInstance()->addString('<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>');
Asset::getInstance()->addString('<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js" defer></script>');
Asset::getInstance()->addString('<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js" defer></script>');
Asset::getInstance()->addString('<script src="https://api-maps.yandex.ru/2.1/?apikey=d7f796e6-b982-4f3a-9dae-e214d0513617&lang=ru_RU" type="text/javascript"></script>');

// VK Retargeting
?>
<script type="text/javascript">
!function () {
    var t = document.createElement("script");
    t.type = "text/javascript", t.async = true, t.src = 'https://vk.com/js/api/openapi.js?169';
    t.onload = function () {
        VK.Retargeting.Init("VK-RTRG-1322781-53VVf");
        VK.Retargeting.Hit();
    };
    document.head.appendChild(t);
}();
</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function(m, e, t, r, i, k, a) {
    m[i] = m[i] || function() { (m[i].a = m[i].a || []).push(arguments); };
    m[i].l = 1 * new Date();
    for (var j = 0; j < document.scripts.length; j++) {
        if (document.scripts[j].src === r) return;
    }
    k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a);
})(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

ym(86821068, "init", {
    clickmap: true,
    trackLinks: true,
    accurateTrackBounce: true,
    webvisor: true,
    ecommerce: "dataLayer"
});
</script>
<script type="text/javascript">window.dataLayer = window.dataLayer || [];</script>

<!-- Top.Mail.Ru counter -->
<script type="text/javascript">
var _tmr = window._tmr || (window._tmr = []);
_tmr.push({id: "3516068", type: "pageView", start: (new Date()).getTime()});
(function (d, w, id) {
    if (d.getElementById(id)) return;
    var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
    ts.src = "https://top-fwz1.mail.ru/js/code.js";
    var f = function () { var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s); };
    if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
})(document, window, "tmr-code");
</script>

<?php $APPLICATION->ShowPanel(); ?>

<!-- jQuery and Slick Slider Scripts -->
<script>
jQuery(function($) {
    // Phone number masking
    $('[data-phone]').mask("9 (999) 999-99-99");
    $('[name=client_phone]').mask("+9 (999) 999-99-99");
    $('#soa-property-3').mask("9 (999) 999-99-99");

    $(document).ready(function() {
        // Catalog navigation
        $('.catalog__wrapper__nav__item').on('click', function() {
            let progress = $('.catalog__wrapper__nav-progress');
            let width = $(this).innerWidth();
            progress.css({
                width: width + 'px',
                left: $(this).position().left + 'px'
            });

            $('.catalog__wrapper__list').addClass('--hidden');
            $('.catalog__wrapper__list').each(function() {
                $(this).find('.slick-dots').find('li').eq(1).click();
            });
            setTimeout(() => {
                $('.catalog__wrapper__list').removeClass('--hidden');
            }, 500);
        });

        // Researches slider
        $('.researches__slider').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            variableWidth: false,
            centerMode: true,
            prevArrow: $('.researches-prev'),
            nextArrow: $('.researches-next')
        });

        // Recommends slider
        $('.recommends__slider').slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true,
            dots: true,
            prevArrow: $('.recommends-prev'),
            nextArrow: $('.recommends-next')
        });

        // Recommends video slider
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
                        variableWidth: true
                    }
                },
                {
                    breakpoint: 561,
                    settings: {
                        slidesToShow: 1,
                        variableWidth: false
                    }
                }
            ]
        });

        // News slider for mobile
        if (window.innerWidth <= 950) {
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
                            variableWidth: false
                        }
                    }
                ]
            });
        }

        // Recommends list slider
        if ($('.recommends__item').length > 5) {
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
                    }
                ]
            });
        }

        // Catalog list slider for mobile
        if (window.innerWidth <= 950) {
            $('.catalog__wrapper__list').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true
            });
        }

        // Reviews slider
        if ($('.reviews__slide').length >= 4 || $(window).width() <= 965) {
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
                            dots: true
                        }
                    }
                ]
            });
            $('.reviews__controlls').show();
        }

        // Truncate review text
        $('.reviews__slide__text').each(function() {
            let fullText = $(this).text();
            let text = fullText;
            if (text.length >= 500) {
                text = text.substring(0, 500);
                var lastIndex = text.lastIndexOf(" ");
                text = text.substring(0, lastIndex) + '...';
            }
            $(this).text(text).attr('data-full-text', fullText);
        });

        // Read more for reviews
        $('.reviews__slide__read-more').on('click', function(e) {
            e.preventDefault();
            let parent = $(this).parents('.reviews__slide');
            let fullText = parent.find('.reviews__slide__text').attr('data-full-text');
            let target = parent.find('.reviews__slide__text');
            target.text(fullText);
            $(this).hide();
            parent.css('height', 'max-content');
        });
    });

    // Prevent default for prev button
    $(document).on('click', '.prev', function(event) {
        event.stopPropagation();
        event.preventDefault();
    });
});
</script>

<style>
.recommends__item.slick-slide {
    margin: 0 10px;
}
.slick-prev::before, .slick-next::before {
    color: #DCB7A1;
    opacity: 1;
}
</style>