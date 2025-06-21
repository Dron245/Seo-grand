<?php
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$container = $args['container'];
$update_url = $args['update_url'] ?? true;
$refresh_strategy = 'refresh_on_submit';
$refresh_strategy = 'refresh_on_update';//тут надо изменить и поставить get_field('название опции','option')
?>

<form id="catalog_filter" method="POST">

	<?php 
    
    if(is_post_type_archive('truby') || is_tax(get_post_type_object('truby')->taxonomies)){
        get_template_part('catalog-parts/filter-fields');
    }elseif(is_post_type_archive('detaly')){
        get_template_part('catalog-parts/filter-fields-detaly');
    }
     ?>

	<?php goodini_buttons_filter(); ?>

</form>

<script>
	$(function(){
        // Строка прошлого запроса, что бы не было дублирования
        let refreshStrategy = "<?php echo $refresh_strategy?>";
        let prevRequest = false;
		let sortForm = $('#sorting_form');
		let filterForm = $('#catalog_filter');
		const outsideElements = $('[form=catalog_filter]');
		let filterButtons = $('.filter_buttons');
        const loader = '<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>';
        
        filterForm.find('.filter_range .filter_element__content').each(function () {
            if (!this.formField) {
                let formSlider = this.formField = new RangeSlider(this);
                formSlider.slider.on('change', function () {
                    $(formSlider.sliderTo).change();
                });
            }
        });

		// Cброс фильтра по кнопке
        filterButtons.on('click', 'button.filter_reset', function(e) {
			e.preventDefault();
			let allRadio = filterForm.find('input[type=radio]');
			let allCheckbox = filterForm.find('input[type=checkbox]');
			let allPrice = filterForm.find('input[type=number]');
			$.each(allRadio, function(index){
				$(allRadio[index]).prop('checked', false);
			});
			$.each(allCheckbox, function(index){
				$(allCheckbox[index]).prop('checked', false);
			});
			$.each(allPrice, function(index){
				$(allPrice[index]).val(null);
				$(allPrice[index]).attr('value', "");
			});
            filterForm.find('select').val('')
			startFilter();
		});

		// Старт фильтра по кнопке
        let buttonSearch;
        filterForm.on('submit', function() {
            if (buttonSearch && buttonSearch.parentNode) {
                buttonSearch.parentNode.removeChild(buttonSearch);
            }
            startFilter();
            return false;
        })

		// При нажатии на input с типом number
		$('.filter_element input[type=number]').on("change paste keyup", function(){
			let $this = $(this);
			$this.attr('value', $this.val());
		});

		// Фильтр в каталоге
		filterForm.on('keyup change paste', 'input, select', function(e){
            if ('refresh_on_update' === refreshStrategy) {
                debouncedFilter();
                return;
            }
			// Переменные
			let elementCurrent = e.currentTarget; // Получаем DOM элемент

            if (!buttonSearch) {
                createButtonSearch();
            }
            if (elementCurrent.parentElement !== buttonSearch.parentNode) {
                elementCurrent.parentElement.appendChild(buttonSearch);
            }

		});
        outsideElements.on('input change', function(e){
            if ('refresh_on_update' === refreshStrategy) {
                debouncedFilter();
                return;
            }
		});

		// Сортировка
		sortForm.on('change', 'select, input', function(){
			startFilter();
		});

        // Функция AJAX запроса
        let timer;
        const debouncedFilter = function (){
            if (timer) {
                clearTimeout(timer);
            }
            timer = setTimeout(startFilter, 1000);
        }

        function startFilter() {

            let urlAjax = location.pathname.replace(/\/page\/\d+(\/)?$/i, '$1'),
                methodAjax = 'GET';
            // dataAjax = 'action=catalog_filter';
            let parameters = {};

            for (let [name, value] of new FormData(filterForm[0])) {
                if ('' === value) {
                    continue;
                }
                if (name.endsWith('[]')) {
                    name = name.slice(0, -2);
                    if (parameters[name]) {
                        parameters[name] += ',' + value;
                        continue;
                    }
                }
                parameters[name] = value;
            }
            if (sortForm.length) {
                for (let [name, value] of new FormData(sortForm[0])) {
                    if ('' === value) {
                        continue;
                    }
                    parameters[name] = value;
                }
            }
            // Превращаем в строку
            const req = new URLSearchParams(parameters).toString();

            // Проверяем на дублированный запрос
            if (prevRequest !== req) {
                prevRequest = req;
                // Отправляем AJAX запрос на ту же страницу
                $.ajax({
                    url: urlAjax,
                    type: methodAjax,
                    data: req,
                    beforeSend: function() {
                        $('<?php echo $container?>').css('opacity', '0.5');
                        $('<?php echo $container?>').css('position', 'relative');
                        $('<?php echo $container?>').append(loader);
                        //console.log(dataAjax);
                    },
                    success: function(data) {
                        // console.log(data);
                        let newPage = $(data);
                        $('<?php echo $container?>').css('opacity', '');
                        $('<?php echo $container?>').css('position', '');
                        $('<?php echo $container?>').html(newPage.find('<?php echo $container?>').html());
                        $('<?php echo $container?>').find('.autoheight').matchHeight();
                        lazyLoadInstance.update();
                        $('<?php echo $container?>').trigger('domUpdate');
                        $('#pagination').html(newPage.find('#pagination').length ? newPage.find('#pagination').html() : '');
                        $('#pagination-next').html(newPage.find('#pagination-next').length ? newPage.find('#pagination-next').html() : '');
                        $("html, body").animate({scrollTop: $('<?php echo $container?>').closest('section').offset().top - 50}, 300);
                        <?php if ($update_url) { ?>
                        window.history.pushState({}, '', urlAjax + '?' + req);
                        <?php } ?>
                    },
                    error: function(data) {
                        $('<?php echo $container?>').css('opacity', '');
                        $('<?php echo $container?>').css('position', '');
                        $('<?php echo $container?>').find('.lds-spinner').remove();
                        console.log('error: ', data);
                    }
                });
            } else {
                console.log('Запрос продублировался!');
            }

        }

        // Формируем кнопку, добавляем
        function createButtonSearch() {
            buttonSearch = document.createElement('button');
            let buttonSearchText = document.createTextNode('Применить');
            buttonSearch.appendChild(buttonSearchText);
            buttonSearch.classList.add('catalog_filter_button_search');
            document.addEventListener('click', clickOnButtonSearch);

        }

        // Функция для обработчика
        function clickOnButtonSearch(event) {
            if (event.target === buttonSearch) {
                return;
            }
            if (filterForm[0].contains(event.target)) {
                return;
            }
            if (buttonSearch && buttonSearch.parentNode) {
                buttonSearch.parentNode.removeChild(buttonSearch);
            }
        }

	});


</script>
<style>
    .lds-spinner {
        display: inline-block;
        position: absolute;
        left: calc(50% - 40px);
        top: calc(50% - 40px);
        width: 80px;
        height: 80px;
    }
    .lds-spinner div {
        transform-origin: 40px 40px;
        animation: lds-spinner 1.2s linear infinite;
    }
    .lds-spinner div:after {
        content: " ";
        display: block;
        position: absolute;
        top: 3px;
        left: 37px;
        width: 6px;
        height: 18px;
        border-radius: 20%;
        background: var(--btn_color_text);
    }
    .lds-spinner div:nth-child(1) {
        transform: rotate(0deg);
        animation-delay: -1.1s;
    }
    .lds-spinner div:nth-child(2) {
        transform: rotate(30deg);
        animation-delay: -1s;
    }
    .lds-spinner div:nth-child(3) {
        transform: rotate(60deg);
        animation-delay: -0.9s;
    }
    .lds-spinner div:nth-child(4) {
        transform: rotate(90deg);
        animation-delay: -0.8s;
    }
    .lds-spinner div:nth-child(5) {
        transform: rotate(120deg);
        animation-delay: -0.7s;
    }
    .lds-spinner div:nth-child(6) {
        transform: rotate(150deg);
        animation-delay: -0.6s;
    }
    .lds-spinner div:nth-child(7) {
        transform: rotate(180deg);
        animation-delay: -0.5s;
    }
    .lds-spinner div:nth-child(8) {
        transform: rotate(210deg);
        animation-delay: -0.4s;
    }
    .lds-spinner div:nth-child(9) {
        transform: rotate(240deg);
        animation-delay: -0.3s;
    }
    .lds-spinner div:nth-child(10) {
        transform: rotate(270deg);
        animation-delay: -0.2s;
    }
    .lds-spinner div:nth-child(11) {
        transform: rotate(300deg);
        animation-delay: -0.1s;
    }
    .lds-spinner div:nth-child(12) {
        transform: rotate(330deg);
        animation-delay: 0s;
    }
    @keyframes lds-spinner {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }

</style>