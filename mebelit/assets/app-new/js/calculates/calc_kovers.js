let area = document.getElementById('area');
let area_plant = document.getElementById('area_plant');
let long_hair = document.getElementById('long_hair');
let point = document.getElementById('point');
let smell = document.getElementById('smell');
let total_price = document.getElementById('total_price');

calc_price = () => {
    let check = area.value;
    
    if (check >= 0 && check <= 10) {
        result = check * 250;
    } else if (check >= 11 && check <= 20) {
        result = check * 300;
    } else if (check >= 21 && check <= 40) {
        result = check * 220;
    } else if (check >= 41 && check <= 50) {
        result = check * 250;
    } else if (check >= 51 && check <= 100) {
        result = check * 150;
    } else if (check >= 100 && check <= 200) {
        result = check * 100;
    } else if (check > 200) {
        result = check * 80;
    }
    
    if (long_hair.checked && check < 70) { result *= 1.25}
    if (point.checked && check < 70) { result *= 1.20 }
    if (smell.checked && check < 70) { result += 300 }
    
    total_price.innerText = result;
}

calc_price_plant = () => {
    let check = area_plant.value;
    let result = 0;
    if (check >= 1 && check < 7){
        result = 2000
    }
    else if (check >= 7 && check <= 20) {
        result = check * 380;
    } else if (check > 21 && check <= 40) {
        result = check * 350;
    } else if (check > 41) {
        result = check * 320;
    }

    total_price.innerText = result;
}

area.onkeyup = () => { calc_price(); }
area_plant.onkeyup = () => { calc_price_plant(); }

smell.addEventListener('change', calc_price);
point.addEventListener('change', calc_price);
long_hair.addEventListener('change', calc_price);
