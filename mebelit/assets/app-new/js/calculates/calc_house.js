let area = document.getElementById('area');
let total_price = document.getElementById('total_price');

calc_price = () => {
    result = area.value * 180;
    if (result >= 10000) {
        result *=0.9
    }
    total_price.innerText = result;
}

area.onkeyup = () => { calc_price(); }
