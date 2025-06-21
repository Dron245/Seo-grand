<?php
/*
Template Name: новая шапка
*/
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <?php $viewport_content = apply_filters('hello_elementor_viewport_content', 'width=device-width, initial-scale=1'); ?>
        <meta name="viewport" content="<?php echo esc_attr($viewport_content); ?>">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="stylesheet" href="/wp-content/themes/hello-elementor/new-header.css">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
    <header>
        <div class="max">
            <div class="header-block">
                <a href="/" class="logo">
                    <img src="/wp-content/uploads/2023/07/vyveska_1500h500mm-2.png" alt="">
                </a>
                <div class="adres">
                    <p>г. Санкт-Петербург</p>
                    <p>Красногвардейская пл., 3Е, Design District DAA, 3 этаж, секция Е3-137</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                        <path fill="#D6373E" d="M16 2H8a3 3 0 0 0-3 3v16a1 1 0 0 0 1.5.87l5.5-3.18 5.5 3.18a1 1 0 0 0 .5.13 1 1 0 0 0 .5-.13A1 1 0 0 0 19 21V5a3 3 0 0 0-3-3Zm1 17.27-4.5-2.6a1 1 0 0 0-1 0L7 19.27V5a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v14.27Z" />
                    </svg>
                </div>
                <div class="time-work">
                    <p>Пн-Вс: 11:00-19:00</p>
                    <p>по предварительному звонку</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                        <path fill="#D6373E" d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm0 18a8 8 0 1 1 0-16.001A8 8 0 0 1 12 20Zm3.1-7.37L13 11.42V7a1 1 0 0 0-2 0v5.12a.65.65 0 0 0 .05.2c.02.06.047.116.08.17.027.057.06.11.1.16l.16.13.09.09 2.6 1.5a1 1 0 0 0 .5.13 1 1 0 0 0 .5-1.87h.02Z" />
                    </svg>
                </div>
                <div class="info-block">
                    <div class="cont">
                        <a class="phone" href="tel:+78129555585">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                <path stroke="#C00B1E" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.488 19.31-1.49 1.491a1.402 1.402 0 0 1-1.622.269 1.412 1.412 0 0 1-.457-.36 13.95 13.95 0 0 1-2.77-5.821 13.713 13.713 0 0 1-.007-5.967 13.885 13.885 0 0 1 2.78-5.835 1.402 1.402 0 0 1 1.586-.409c.183.07.348.179.487.317l1.493 1.493a1.409 1.409 0 0 1 .14 1.85 9.007 9.007 0 0 0-1.047 1.744 1.402 1.402 0 0 1-1.272.824l-1.263-.001a11.251 11.251 0 0 0 .006 5.967l1.263.001a1.41 1.41 0 0 1 1.274.827c.283.62.636 1.206 1.05 1.746a1.408 1.408 0 0 1-.151 1.865Z" />
                            </svg>
                            <span>+7 (812) 955-55-85</span>
                        </a>
                        <a class="wp" href="https://wa.me/79956004545">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                <path stroke="#C00B1E" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.488 19.31-1.49 1.491a1.402 1.402 0 0 1-1.622.269 1.412 1.412 0 0 1-.457-.36 13.95 13.95 0 0 1-2.77-5.821 13.713 13.713 0 0 1-.007-5.967 13.885 13.885 0 0 1 2.78-5.835 1.402 1.402 0 0 1 1.586-.409c.183.07.348.179.487.317l1.493 1.493a1.409 1.409 0 0 1 .14 1.85 9.007 9.007 0 0 0-1.047 1.744 1.402 1.402 0 0 1-1.272.824l-1.263-.001a11.251 11.251 0 0 0 .006 5.967l1.263.001a1.41 1.41 0 0 1 1.274.827c.283.62.636 1.206 1.05 1.746a1.408 1.408 0 0 1-.151 1.865Z" />
                            </svg>
                            <span>+7 (995) 600-45-45</span>
                        </a>
                        <a href="#" class="btn-zvnk">Заказать звонок</a>
                    </div>
                    <a href="/kalkuljator/" class="btn-red">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                            <path fill="#fff" fill-rule="evenodd" d="M6 2h12a3 3 0 0 1 3 3v14a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3Zm0 2a1 1 0 0 0-1 1v3h14V5a1 1 0 0 0-1-1H6Zm13 6H5v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-9ZM6 13a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6-1.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Zm3 1.5a1.5 1.5 0 0 1 3 0v4a1.5 1.5 0 0 1-3 0v-4Zm-7.5 2.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Zm3 1.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
                        </svg>
                        <span>Расчет стоимости</span>
                    </a>
                </div>

                <div class="mobile-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

        <div class="menu-block">
            <div class="max">
                <nav class="menu">
                    <ul class="menu-list">
                        <li class="sub-list">
                            <a class="sub-link" href="/kuhni/">
                                <span>Кухни</span>
                                <svg class="arr" xmlns="http://www.w3.org/2000/svg" width="17" height="16" fill="none">
                                    <path fill="#fff" fill-rule="evenodd" d="M4.46 6.293a1 1 0 0 0 0 1.414l3 3a1 1 0 0 0 1.414 0l3-3a1 1 0 0 0-1.414-1.414L8.167 8.586 5.874 6.293a1 1 0 0 0-1.414 0Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <div class="tabs" data-tabs>
                                <a href="#" class="back">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" fill="none">
                                        <path fill="#909CAC" fill-rule="evenodd" d="M7.804 6.3a1 1 0 0 0-1.414-.013l-6.09 6a1 1 0 0 0 0 1.426l6.09 6a1 1 0 0 0 1.402-1.426L3.445 14H20a1 1 0 1 0 0-2H3.445l4.347-4.287A1 1 0 0 0 7.804 6.3Z" clip-rule="evenodd" />
                                    </svg>
                                    Назад
                                </a>
                                <ul class="tabs__pane" data-tabs-nav>
                                    <li class="active">Форма
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                            <path fill="#C00B1E" fill-rule="evenodd" d="M7.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L12.586 12 7.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
                                        </svg>
                                    </li>
                                    <li>Стиль
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                            <path fill="#C00B1E" fill-rule="evenodd" d="M7.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L12.586 12 7.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
                                        </svg>
                                    </li>
                                    <li>Варианты фасада
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                            <path fill="#C00B1E" fill-rule="evenodd" d="M7.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L12.586 12 7.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
                                        </svg>
                                    </li>
                                </ul>

                                <div class="tab__panels" data-tabs-list>
                                    <div class="tab__element active">
                                        <a href="#" class="back-two">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" fill="none">
                                                <path fill="#909CAC" fill-rule="evenodd" d="M7.804 6.3a1 1 0 0 0-1.414-.013l-6.09 6a1 1 0 0 0 0 1.426l6.09 6a1 1 0 0 0 1.402-1.426L3.445 14H20a1 1 0 1 0 0-2H3.445l4.347-4.287A1 1 0 0 0 7.804 6.3Z" clip-rule="evenodd" />
                                            </svg>
                                            Назад
                                        </a>
                                        <div class="block">
                                            <!-- <p class="zag">Тип конструкции</p> -->
                                            <a href="/kuhni/prjamaja-kuhnja/">Прямые</a>
                                            <a href="/kuhni/p-obraznye-kukhni/">П-образные</a>
                                            <a href="/kuhni/uglovye-kuhni/">Угловые</a>
                                            <a href="/kuhnja-s-ostrovkom/">С островом</a>
                                            <a href="/kuhni/radiusnye-kukhni/">Радиусные</a>
                                            <a href="/kuhni/vstroennaja-kuhnja/">Встроенные</a>
                                            <!-- <a href="#">Кухня-гостиная</a> -->
                                            <a href="/kuhni/kuhni-nestandartnyh-razmerov/">Нестандартные </a>
                                        </div>

                                    </div>

                                    <div class="tab__element">
                                        <a href="#" class="back-two">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" fill="none">
                                                <path fill="#909CAC" fill-rule="evenodd" d="M7.804 6.3a1 1 0 0 0-1.414-.013l-6.09 6a1 1 0 0 0 0 1.426l6.09 6a1 1 0 0 0 1.402-1.426L3.445 14H20a1 1 0 1 0 0-2H3.445l4.347-4.287A1 1 0 0 0 7.804 6.3Z" clip-rule="evenodd" />
                                            </svg>
                                            Назад
                                        </a>
                                        <div class="block">
                                            <!-- <p class="zag">Тип конструкции </p> -->
                                            <a href="/kuhni/kuhni-v-klassicheskom-stile/">Классический</a>
                                            <a href="/kuhni/kukhni-v-sovremennom-stile/">Современный</a>
                                            <a href="/kuhni/kukhni-v-stile-minimalizm/">Минимализм</a>
                                            <a href="/kuhni/kuhni-v-stile-provans/">Прованс</a>
                                            <a href="/kuhni/kukhni-v-stile-neoklassika/">Неоклассика</a>
                                            <a href="/kuhni/kukhni-v-stile-loft/">Лофт</a>
                                        </div>
                                    </div>

                                    <div class="tab__element">
                                        <a href="#" class="back-two">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" fill="none">
                                                <path fill="#909CAC" fill-rule="evenodd" d="M7.804 6.3a1 1 0 0 0-1.414-.013l-6.09 6a1 1 0 0 0 0 1.426l6.09 6a1 1 0 0 0 1.402-1.426L3.445 14H20a1 1 0 1 0 0-2H3.445l4.347-4.287A1 1 0 0 0 7.804 6.3Z" clip-rule="evenodd" />
                                            </svg>
                                            Назад
                                        </a>
                                        <div class="block">
                                            <!-- <p class="zag">Тип конструкции</p> -->
                                            <a href="/kuhni/kuhnja-s-fasadom-iz-dsp/">ЛДСП</a>
                                            <a href="/kuhni/kuhnja-s-fasadom-iz-mdf/">МДФ</a>
                                            <a href="/kuhni/kuhni-mdf-plenka-pvh/">МДФ пленка ПВХ</a>
                                            <!-- <a href="#">Стекло</a> -->
                                            <a href="/kuhni/kuhnja-s-plastikovym-fasadom/">Пластик</a>
                                            <a href="/kuhni/kuhnja-s-jemalevym-fasadom/">Эмаль</a>
                                            <a href="/kuhni/kukhni-s-fasadami-iz-shpona/">Шпон</a>
                                            <a href="/kuhni/kuhnja-iz-massiva-dereva/">Массив</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <svg class="li-ar" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                <path fill="#C00B1E" fill-rule="evenodd" d="M7.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L12.586 12 7.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
                            </svg>
                        </li>


                        <li class="sub-list">
                            <a class="sub-link" href="/mebel/">
                                <span>Мебель</span>
                                <svg class="arr" xmlns="http://www.w3.org/2000/svg" width="17" height="16" fill="none">
                                    <path fill="#fff" fill-rule="evenodd" d="M4.46 6.293a1 1 0 0 0 0 1.414l3 3a1 1 0 0 0 1.414 0l3-3a1 1 0 0 0-1.414-1.414L8.167 8.586 5.874 6.293a1 1 0 0 0-1.414 0Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <div class="tabs" data-tabs>
                                <a href="#" class="back">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" fill="none">
                                        <path fill="#909CAC" fill-rule="evenodd" d="M7.804 6.3a1 1 0 0 0-1.414-.013l-6.09 6a1 1 0 0 0 0 1.426l6.09 6a1 1 0 0 0 1.402-1.426L3.445 14H20a1 1 0 1 0 0-2H3.445l4.347-4.287A1 1 0 0 0 7.804 6.3Z" clip-rule="evenodd" />
                                    </svg>
                                    Назад
                                </a>
                                <ul class="tabs__pane" data-tabs-nav>
                                    <li class="active">В гостиную
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                            <path fill="#C00B1E" fill-rule="evenodd" d="M7.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L12.586 12 7.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
                                        </svg>
                                    </li>
                                    <li>В спальню
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                            <path fill="#C00B1E" fill-rule="evenodd" d="M7.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L12.586 12 7.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
                                        </svg>
                                    </li>
                                    <li>В прихожую
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                            <path fill="#C00B1E" fill-rule="evenodd" d="M7.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L12.586 12 7.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
                                        </svg>
                                    </li>
                                    <li><a href="/mebel/mebel-dlya-vannoj/" class="fix-link">В ванную комнату</a></li>
                                    <li><a href="/mebel/dizajnerskaya-mebel/" class="fix-link">Дизайнерская</a></li>

                                </ul>

                                <div class="tab__panels" data-tabs-list>
                                    <div class="tab__element active">
                                        <a href="#" class="back-two">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" fill="none">
                                                <path fill="#909CAC" fill-rule="evenodd" d="M7.804 6.3a1 1 0 0 0-1.414-.013l-6.09 6a1 1 0 0 0 0 1.426l6.09 6a1 1 0 0 0 1.402-1.426L3.445 14H20a1 1 0 1 0 0-2H3.445l4.347-4.287A1 1 0 0 0 7.804 6.3Z" clip-rule="evenodd" />
                                            </svg>
                                            Назад
                                        </a>
                                        <div class="block">
                                            <p class="zag">Тип мебели</p>
                                            <a href="/mebel/mebel-v-gostinnuyu/">Стильная мебель в гостиную</a>
                                            <!-- <a href="#">Комоды</a>
                                        <a href="#">Тумбы</a> -->
                                            <a href="/mebel/shkafy-v-gostinnuyu/">Шкафы</a>
                                        </div>
                                        <div class="block">
                                            <p class="zag">Материал</p>
                                            <!-- <a href="#">Ламинированная ДСП</a>
                                        <a href="#">МДФ</a>
                                        <a href="#">Стекло</a> -->
                                        </div>
                                        <div class="block">
                                            <p class="zag">Стиль</p>
                                            <a href="/mebel/mebel-v-gostinuyu-v-klassicheskom-stile/">Классический</a>
                                            <a href="/mebel/mebel-v-gostinuyu-v-sovremennom-stile/">Современный</a>
                                        </div>
                                    </div>
                                    <div class="tab__element">
                                        <a href="#" class="back-two">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" fill="none">
                                                <path fill="#909CAC" fill-rule="evenodd" d="M7.804 6.3a1 1 0 0 0-1.414-.013l-6.09 6a1 1 0 0 0 0 1.426l6.09 6a1 1 0 0 0 1.402-1.426L3.445 14H20a1 1 0 1 0 0-2H3.445l4.347-4.287A1 1 0 0 0 7.804 6.3Z" clip-rule="evenodd" />
                                            </svg>
                                            Назад
                                        </a>
                                        <div class="block">
                                            <p class="zag">Тип мебели</p>
                                            <a href="/mebel/mebel-v-prihozhuyu/">Стильная мебель в спальню</a>
                                            <a href="/mebel/shkafy-dlya-spalni/">Шкафы</a>
                                            <!-- <a href="#">Туалетный столик</a> -->

                                        </div>
                                        <div class="block">
                                            <p class="zag">Материал</p>
                                            <!-- <a href="#">Ламинированная ДСП</a> -->
                                            <a href="/mebel/mebel-dlya-spalni-iz-mdf/">МДФ</a>
                                            <a href="/mebel/mebel-dlja-spalni-iz-massiva/">Массив</a>
                                        </div>
                                        <div class="block">
                                            <p class="zag">Стиль</p>
                                            <a href="/mebel/mebel-dlya-spalni-v-sovremennom-stile/">Современный</a>
                                            <a href="/mebel/mebel-dlja-spalni-v-klassicheskom-stile/">Классический</a>
                                            <a href="/mebel/mebel-dlya-spalni-v-stile-loft/">Лофт</a>
                                        </div>
                                    </div>

                                    <div class="tab__element">
                                        <a href="#" class="back-two">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" fill="none">
                                                <path fill="#909CAC" fill-rule="evenodd" d="M7.804 6.3a1 1 0 0 0-1.414-.013l-6.09 6a1 1 0 0 0 0 1.426l6.09 6a1 1 0 0 0 1.402-1.426L3.445 14H20a1 1 0 1 0 0-2H3.445l4.347-4.287A1 1 0 0 0 7.804 6.3Z" clip-rule="evenodd" />
                                            </svg>
                                            Назад
                                        </a>
                                        <div class="block">
                                            <p class="zag">Тип мебели</p>
                                            <a href="/mebel/mebel-v-prihozhuyu/">Стильная мебель в прихожую</a>
                                            <a href="/mebel/shkafy-v-prikhozhuyu/">Шкафы</a>
                                            <!-- <a href="/mebel/shkafy-dlya-spalni/">Прихожие</a>
                                        <a href="/mebel/shkafy-dlya-spalni/">Туалетный столик</a> -->
                                            <a href="/mebel/vstroennaya-mebel-v-prihozhuyu/">Встроенная</a>

                                        </div>
                                        <div class="block">
                                            <p class="zag">Материал</p>
                                            <!-- <a href="#">Ламинированная ДСП</a>
                                        <a href="/mebel/mebel-dlya-spalni-iz-mdf/">МДФ</a>
                                        <a href="/mebel/mebel-dlja-spalni-iz-massiva/">С зеркалом</a> -->
                                        </div>
                                        <div class="block">
                                            <p class="zag">Стиль</p>
                                            <a href="/mebel/mebel-v-prihozhuyu-v-sovremennom-stile/">Современный</a>
                                            <a href="/mebel/mebel-v-prihozhuyu-v-klassicheskom-stile/">Классический</a>
                                            <a href="/mebel/mebel-v-prihozhuyu-v-stile-minimalizm/">Минимализм</a>
                                            <a href="/mebel/mebel-v-prihozhuyu-v-stile-loft/">Лофт</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <svg class="li-ar" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                <path fill="#C00B1E" fill-rule="evenodd" d="M7.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L12.586 12 7.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
                            </svg>
                        </li>



                        <li class="sub-list">
                            <a class="sub-link" href="#">
                                <span>Шкафы</span>
                                <svg class="arr" xmlns="http://www.w3.org/2000/svg" width="17" height="16" fill="none">
                                    <path fill="#fff" fill-rule="evenodd" d="M4.46 6.293a1 1 0 0 0 0 1.414l3 3a1 1 0 0 0 1.414 0l3-3a1 1 0 0 0-1.414-1.414L8.167 8.586 5.874 6.293a1 1 0 0 0-1.414 0Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <div class="tabs" data-tabs>
                                <a href="#" class="back">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" fill="none">
                                        <path fill="#909CAC" fill-rule="evenodd" d="M7.804 6.3a1 1 0 0 0-1.414-.013l-6.09 6a1 1 0 0 0 0 1.426l6.09 6a1 1 0 0 0 1.402-1.426L3.445 14H20a1 1 0 1 0 0-2H3.445l4.347-4.287A1 1 0 0 0 7.804 6.3Z" clip-rule="evenodd" />
                                    </svg>
                                    Назад
                                </a>
                                <ul class="tabs__pane" data-tabs-nav>
                                    <li class="active">Тип конструкции
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                            <path fill="#C00B1E" fill-rule="evenodd" d="M7.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L12.586 12 7.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
                                        </svg>
                                    </li>
                                    <li>Место установки
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                            <path fill="#C00B1E" fill-rule="evenodd" d="M7.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L12.586 12 7.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
                                        </svg>
                                    </li>
                                    <li>Варианты фасада
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                            <path fill="#C00B1E" fill-rule="evenodd" d="M7.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L12.586 12 7.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
                                        </svg>
                                    </li>
                                    <li>Количество дверей
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                            <path fill="#C00B1E" fill-rule="evenodd" d="M7.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L12.586 12 7.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
                                        </svg>
                                    </li>
                                    <li>Стиль
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                            <path fill="#C00B1E" fill-rule="evenodd" d="M7.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L12.586 12 7.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
                                        </svg>
                                    </li>

                                </ul>

                                <div class="tab__panels" data-tabs-list>
                                    <div class="tab__element active">
                                        <a href="#" class="back-two">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" fill="none">
                                                <path fill="#909CAC" fill-rule="evenodd" d="M7.804 6.3a1 1 0 0 0-1.414-.013l-6.09 6a1 1 0 0 0 0 1.426l6.09 6a1 1 0 0 0 1.402-1.426L3.445 14H20a1 1 0 1 0 0-2H3.445l4.347-4.287A1 1 0 0 0 7.804 6.3Z" clip-rule="evenodd" />
                                            </svg>
                                            Назад
                                        </a>
                                        <div class="block">
                                            <a href="/mebel/tumbi/">Тумбы</a>
                                            <!-- <a href="123">Комоды</a>
                                        <a href="123">Туалетный столик</a> -->
                                            <a href="/mebel/vstroennye-shkafy/">Встроенные</a>

                                            <a href="/mebel/garderobnye-sistemy/">Гардеробные</a>
                                            <!-- <a href="#">Угловые</a>
                                        <a href="#">Корпусные</a>
                                        <a href="#">Стеллажи и полки</a> -->
                                            <a href="/mebel/shkaf-po-individualnym-razmerami/">Индивидуальные</a>
                                        </div>
                                        <div class="block">
                                            <p class="zag"><a href="/mebel/shkafy-kupe/">Шкафы купе</a></p>
                                            <a href="/mebel/vstraivaemye-shkafy-kupe/">Встраиваемые</a>
                                            <a href="/mebel/korpusnye-shkafy-kupe/">Корпусные</a>
                                            <a href="/mebel/shkafy-kupe-iz-mdf/">МДФ</a>
                                            <a href="/mebel/shkafy-kupe-iz-ldsp/">ЛДСП</a>
                                            <a href="/mebel/trehdvernye-shkafy-kupe/">Трехдверные</a>
                                            <a href="/mebel/chetyrekhdvernye-shkafy-kupe/">Четырехдверные</a>
                                        </div>

                                    </div>
                                    <div class="tab__element">
                                        <a href="#" class="back-two">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" fill="none">
                                                <path fill="#909CAC" fill-rule="evenodd" d="M7.804 6.3a1 1 0 0 0-1.414-.013l-6.09 6a1 1 0 0 0 0 1.426l6.09 6a1 1 0 0 0 1.402-1.426L3.445 14H20a1 1 0 1 0 0-2H3.445l4.347-4.287A1 1 0 0 0 7.804 6.3Z" clip-rule="evenodd" />
                                            </svg>
                                            Назад
                                        </a>
                                        <div class="block">
                                            <a href="/mebel/kuhonnyj-shkaf/">Кухня</a>
                                            <a href="/mebel/shkafy-dlya-spalni/">Спальня</a>
                                            <a href="/mebel/shkafy-v-prikhozhuyu/">Прихожая</a>
                                            <a href="/mebel/shkaf-v-koridor/">Коридор</a>
                                            <a href="/mebel/detskie-shkafy/">Детская комната</a>
                                            <a href="/mebel/shkaf-na-balkon/">Балкон</a>
                                            <a href="/mebel/shkafy-na-lodzhiyu/">Лоджия</a>
                                            <!-- <a href="123">Рабочий кабинет</a> -->
                                            <a href="/mebel/knizhnye-shkafy/">Библиотека</a>
                                        </div>
                                        <div class="block">
                                            <p class="zag"><a href="/mebel/shkafy-v-gostinnuyu/">Гостиная</a></p>
                                            <a href="/mebel/shkafy-v-gostinuju-v-sovremennom-stile/">Современный</a>
                                            <a href="/mebel/vstroennye-shkafy-v-gostinuyu/">Встроенный</a>
                                        </div>
                                    </div>
                                    <div class="tab__element">
                                        <a href="#" class="back-two">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" fill="none">
                                                <path fill="#909CAC" fill-rule="evenodd" d="M7.804 6.3a1 1 0 0 0-1.414-.013l-6.09 6a1 1 0 0 0 0 1.426l6.09 6a1 1 0 0 0 1.402-1.426L3.445 14H20a1 1 0 1 0 0-2H3.445l4.347-4.287A1 1 0 0 0 7.804 6.3Z" clip-rule="evenodd" />
                                            </svg>
                                            Назад
                                        </a>
                                        <div class="block">
                                            <!-- <a href="123">Зеркальные</a> -->
                                            <a href="/mebel/shkaf-so-stekljannym-dvercami/">Стеклянные</a>
                                            <!-- <a href="123">Пескоструйные</a>
                                        <a href="123">С фотопечатью</a> -->
                                            <a href="/mebel/shkaf-iz-dsp/">Ламинированное ДСП</a>
                                            <a href="/mebel/shkafy-iz-mdf/">Панели МДФ</a>
                                            <a href="/mebel/shkaf-iz-massiva/">Массив</a>
                                            <a href="/mebel/shkafy-v-jemali/">Эмаль</a>
                                            <a href="/mebel/shkafy-iz-shpona/">Шпон</a>
                                        </div>
                                    </div>
                                    <div class="tab__element">
                                        <a href="#" class="back-two">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" fill="none">
                                                <path fill="#909CAC" fill-rule="evenodd" d="M7.804 6.3a1 1 0 0 0-1.414-.013l-6.09 6a1 1 0 0 0 0 1.426l6.09 6a1 1 0 0 0 1.402-1.426L3.445 14H20a1 1 0 1 0 0-2H3.445l4.347-4.287A1 1 0 0 0 7.804 6.3Z" clip-rule="evenodd" />
                                            </svg>
                                            Назад
                                        </a>
                                        <div class="block">
                                            <a href="/mebel/odnodvernye-shkaf/">Однодверные</a>
                                            <a href="/mebel/dvuhdvernye-shkafy/">Двухдверные</a>
                                            <a href="/mebel/trekhdvernye-shkafy/">Трехдверные</a>
                                            <a href="/mebel/chetyrekhdvernye-shkafy/">Четырехдверные</a>
                                        </div>
                                    </div>
                                    <div class="tab__element">
                                        <a href="#" class="back-two">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" fill="none">
                                                <path fill="#909CAC" fill-rule="evenodd" d="M7.804 6.3a1 1 0 0 0-1.414-.013l-6.09 6a1 1 0 0 0 0 1.426l6.09 6a1 1 0 0 0 1.402-1.426L3.445 14H20a1 1 0 1 0 0-2H3.445l4.347-4.287A1 1 0 0 0 7.804 6.3Z" clip-rule="evenodd" />
                                            </svg>
                                            Назад
                                        </a>
                                        <div class="block">
                                            <a href="/mebel/shkafy-v-sovremennom-stile/">Современные</a>
                                            <a href="/mebel/shkaf-v-klassicheskom-stile/">Классические</a>
                                            <a href="/mebel/shkafy-v-stile-loft/">Лофт</a>
                                            <a href="/mebel/shkafy-v-stile-minimalizm/">Минимализм</a>
                                            <a href="/mebel/shkafy-v-stile-neoklassika/">Неоклассика</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <svg class="li-ar" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                <path fill="#C00B1E" fill-rule="evenodd" d="M7.293 5.293a1 1 0 0 1 1.414 0l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 0 1-1.414-1.414L12.586 12 7.293 6.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
                            </svg>
                        </li>



                        <li><a href="/rassrochka/">Рассрочка</a></li>
                        <li><a href="/otzyvy/">Отзывы</a></li>
                        <li><a href="/akcii/">Акции</a></li>
                        <li><a href="/kontakty/">Контакты</a></li>
                        <li><a href="/sotrudnichestvo/">Дизайнерам</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
        <div id="calcW" style="height: 100vh; background-color: #ddd;">

            <div class="calc-otstup">
                <div class="max">
                <h1>Расчет стоимости кухни</h1>
                    <form>
                        <div class="swap-calc">
                            <div class="block">
                                <p class="zag">Модель</p>
                                <div class="pole">
                                    <select name="model" id="model">
                                        <option value="model1">Модель</option>
                                        <option value="model2">Модель 2</option>
                                        <option value="model3">Модель 3</option>
                                        <option value="model4">Модель 4</option>
                                        <option value="model5">Модель 5</option>
                                        <option value="model6">Модель 6</option>
                                        <option value="model7">Модель 7</option>
                                    </select>
                                </div>
                                <p class="zag">Выберите тип кухни</p>
                                <div class="pole">
                                    <p><input type="radio" name="type" value="1417" checked> Прямая</p>
                                    <p><input type="radio" name="type" value="1417"> Угловая (левая)</p>
                                    <p><input type="radio" name="type" value="1417"> Угловая (правая)</p>
                                    <p><input type="radio" name="type" value="1417"> П-образная</p>
                                </div>
                                <p class="zag">Введите размеры кухонного гарнитура</p>
                                <div class="pole razmer">
                                    <input placeholder="0 см" type="text">
                                </div>
                                <p class="zag">Нужна ли вам техника для новой кухни?</p>
                                <div class="pole">
                                    <p><input type="radio" name="type" value="1417" checked> Собираемся заказать</p>
                                    <p><input type="radio" name="type" value="1417"> Уже купили</p>
                                    <p><input type="radio" name="type" value="1417"> Оставим от предыдущей кухни</p>
                                </div>
                                <p class="zag">Какую столешницу вы предпочитаете?</p>
                                <div class="pole">
                                    <p><input type="radio" name="type" value="1417" checked> Пластик</p>
                                    <p><input type="radio" name="type" value="1417"> Искусственный камень</p>
                                    <p><input type="radio" name="type" value="1417"> Кварцевый агломерат</p>
                                </div>


                            </div>
                            <div class="block">
                                <div class="img">
                                    <img src="/wp-content/uploads/2023/08/foto.jpg" alt="">
                                </div>
                                <div class="cont">
                                    <p class="zag">Введите ваши данные</p>
                                    <input required type="name" placeholder="Имя">
                                    <input required type="tel" placeholder="Телефон">
                                    <div class="block-check">
                                        <p><input type="checkbox" name="copyrate" value="Y"> <span>Я согласен на <a href="#">обработку персональных данных</a></span></p>
                                        <p><input type="checkbox" name="reklama" value="Y"> <span>Я согласен на получение рекламной информации</span></p>
                                    </div>
                                    <button type="submit">Отправить заявку</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>












        </div>






        <?php get_footer(); ?>

        <script src="/wp-content/themes/hello-elementor/new-header.js"></script>