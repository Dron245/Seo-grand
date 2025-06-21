$(document).ready(function(){
    
//Калькулятор для страницы https://www.brilliantgroup.ru/na-postoyannoj-osnove/
    
    const npo_total = [ [['12000 - 16000 р.', '1 час'], ['16000 - 21000 р.', '1,5 - 2 часа'], ['21000 - 27000 р.','3 - 4 часа'], ['27000 - 32000 р.','4 - 5 часов'], ['32000 - 37000 р.','5 - 6 часов']],
    [['17000 - 21000 р.', '1 час'], ['21000 - 26000 р.', '1,5 - 2 часа'], ['26000 - 31000 р.','3 - 4 часа'], ['31000 - 36000 р.','4 - 5 часов'], ['36000 - 42000 р.','5 - 6 часов']],
    [['21000 - 26000 р.', '1 час'], ['26000 - 31000 р.', '1,5 - 2 часа'], ['31000 - 36000 р.','3 - 4 часа'], ['36000 - 41000 р.','4 - 5 часов'], ['41000 - 46000 р.','5 - 6 часов']],
    [['26000 - 31000 р.', '1 час'], ['31000 - 36000 р.', '1,5 - 2 часа'], ['36000 - 42000 р.','3 - 4 часа'], ['42000 - 47000 р.','4 - 5 часов'], ['47000 - 52000 р.','5 - 6 часов']],
    [['31000 - 36000 р.', '1 час'], ['36000 - 41000 р.', '1,5 - 2 часа'], ['41000 - 46000 р.','3 - 4 часа'], ['46000 - 62000 р.','4 - 5 часов'], ['62000 - 68000 р.','5 - 6 часов']] ];
    
    var npo_select_week, npo_select_area, npo_week, npo_area, npo_price, npo_time, npo_week_ul;
    
    npo_week = document.getElementById("npo-calculate-week");
    npo_area = document.getElementById("npo-calculate-area");
    npo_price = document.getElementById("npo-price");
    npo_time = document.getElementById("npo-time");
    npo_week_ul = document.getElementsByClassName("npo_week-tabs");
    npo_select_week = 0;
    npo_select_area = 0;
    
    npo_week.addEventListener('change', function(){
        npo_select_week = npo_week.selectedIndex;
        npo_calculate();
    });
    
     npo_area.addEventListener('change', function(){
        npo_select_area = npo_area.selectedIndex;
        npo_calculate();
    });
    
    function npo_calculate() {
        var price, time;
        price = npo_total[npo_select_week][npo_select_area][0];
        time = npo_total[npo_select_week][npo_select_area][1];
    
        npo_set_calculate(price, time)
    }
    
    function npo_set_calculate(price, time){
        npo_price.innerText = price;
        npo_time.innerText = time;
    }
    
    if (document.body.clientWidth >= 509){
        npo_week_ul[0].children[0].children[0].innerText="1 - раз в неделю"
        npo_week_ul[0].children[1].children[0].innerText="2 - раза в неделю"
        npo_week_ul[0].children[2].children[0].innerText="3 - раза в неделю"
        npo_week_ul[0].children[3].children[0].innerText="5 - раз в неделю"
        npo_week_ul[0].children[4].children[0].innerText="7 - раз в неделю"
    }
    
});