<?php
/*
Template Name: Калькулятор
*/

//add_action( 'get_header', 'new' );
get_header('new');
?>



<div class="calc-otstup">
    <div class="max">
        <!--<h2>Расчет стоимости кухни</h2>-->
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
                        <p><input type="radio" name="type" value="1417"> Прямая</p>
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
                        <p><input type="radio" name="type" value="1417"> Собираемся заказать</p>
                        <p><input type="radio" name="type" value="1417"> Уже купили</p>
                        <p><input type="radio" name="type" value="1417"> Оставим от предыдущей кухни</p>
                    </div>
                    <p class="zag">Какую столешницу вы предпочитаете?</p>
                    <div class="pole">
                        <p><input type="radio" name="type" value="1417"> Пластик</p>
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
                            <p><input type="checkbox" name="copyrate" value="1417"> <span>Я согласен на <a href="#">обработку персональных данных</a></span></p>
                            <p><input type="checkbox" name="reklama" value="1417"> <span>Я согласен на получение рекламной информации</span></p>
                        </div>
                        <button type="submit">Отправить заявку</button>
                        <div class="succss">Спасибо за Ваше сообщение. Оно успешно отправлено.</div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>