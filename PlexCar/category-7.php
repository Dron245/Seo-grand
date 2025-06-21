<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plexcar
 */

get_header();
?>
<?php
if (strpos($_SERVER['REQUEST_URI'], "category/tovary")) {
    ?>
    <style>.article {
            display: none;
        }</style>
    <link rel="stylesheet" href="/wp-content/themes/plexcar/filter/app.min.css"/>
    <div class="container-blue">
        <div class="container">
            <div class="auto-glass">
                <h3 class="auto-glass__title">Автостёкла</h3>
                <div class="filter">
                    <form class="filter__form" onsubmit="return false;">
                        <div class="filter__row-block">
                            <div class="filter__wrapper">
                                <p class="filter__text">Бренд</p>
                                <select name="brand" class="filter__select form-select replace-glass__select"></select>
                            </div>
                            <div class="filter__wrapper">
                                <p class="filter__text">Модель</p>
                                <select name="model" class="filter__select-model form-select replace-glass__select">
                                    <option>Выберите бренд</option>
                                </select>
                            </div>
                            <div class="filter__wrapper">
                                <p class="filter__text">Еврокод</p>
                                <div class="filter__row">
                                    <input class="filter__input" type="text" placeholder="Evrocode"/>
                                    <button class="filter__button">Найти</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="auto-glass__filtered"></div>
                <main class="auto-glass__main"></main>
            </div>
        </div>
    </div>


    <?

}

?>


    <div class="container-blue">
        <div class="container">
            <div class="articles soc">
                <h5 class="articles__title"></h5>
                <main class="articles__main coscont">
                    <div class="socraztit">Раздел находится в разработке</div>
                    <div class="socrazopis">Все наши работы и отзывы можете посмотреть:</div>
                    <div class="container">
                        <div class="row">
                            <div class="cal">
                                <a href="https://yandex.ru/maps/org/plekskar/69383664512/?ll=30.328400%2C60.062319&z=16.59">
                                    <div class="coscont sque">
                                        <img src="/wp-content/themes/plexcar/i/src/ya.svg" alt="">
                                        <div class="soctitle">
                                            Яндекс карты
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cal">
                                <a href="https://2gis.ru/spb/firm/70000001032612545?m=30.329905%2C60.062719%2F16">
                                    <div class="coscont gis">
                                        <img src="/wp-content/themes/plexcar/i/src/2gis.svg" alt="">
                                        <div class="soctitle">
                                            2ГИС
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cal">
                                <a href="https://vk.com/zamena_avtostekla">
                                    <div class="coscont sque">
                                        <img src="/wp-content/themes/plexcar/i/src/vk.svg" alt="">
                                        <div class="soctitle">
                                            Вконтакте
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="cal">
                                <a href="https://dzen.ru/profile/editor/id/619bc3c69c4db12bc95e4bea/publications?state=published">
                                    <div class="coscont">
                                        <img src="/wp-content/themes/plexcar/i/src/zen.svg" alt="">
                                        <div class="soctitle">
                                            Яндекс Дзен
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cal">
                                <a href="https://business.zoon.ru/lk/info/photo/?org=5c0189e8a24fd9120f4eb9a4">
                                    <div class="coscont">
                                        <img src="/wp-content/themes/plexcar/i/src/zoon.svg" alt="">
                                        <div class="soctitle">
                                            ZOON
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cal">
                                <a href="https://uslugi.yandex.ru/profile/Plekskar-1811750?isPromotion=1&occupationId=%2Fremont-avto&specId=4820">
                                    <div class="coscont">
                                        <img src="/wp-content/themes/plexcar/i/src/usl.svg" alt="">
                                        <div class="soctitle">
                                            Яндекс
                                            услуги
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </main>
            </div>

            <!--            <div class="button-center">-->
            <!--                <button type="button" class="btn btn-outline-primary button-outline replace-glass__button"-->
            <!--                        data-bs-toggle="modal" data-bs-target="#popup">-->
            <!--                    Записаться-->
            <!--                </button>-->
            <!--            </div>-->
<?php
get_footer();
