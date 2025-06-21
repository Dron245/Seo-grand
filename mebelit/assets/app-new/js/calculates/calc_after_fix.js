let area = document.getElementById('area');
let fornitures = document.getElementById('fornitures');
let point = document.getElementById('point');
let npo_price = document.getElementById('npo-price');
area.oninput = (obj) => {
    count_price();
}
fornitures.addEventListener('change', ()=>{
    count_price();
});
point.addEventListener('change', ()=>{
    count_price();
});

count_price = () => {
    if (area.value <= 40){
        total_price = area.value*250;
    } else if(area.value > 40 && area.value <= 65) {
        total_price = area.value*240;
    } else if (area.value > 65 && area.value <= 80) {
        total_price = area.value*220; 
    } else if (area.value > 80 && area.value <= 100) {
        total_price = area.value*200;
    } else if (area.value > 100) {
        total_price = area.value*180;
    }
    if (fornitures.checked == true) {
        total_price = Math.floor(total_price * 1.20)
    }
    if (point.checked == true) {
        total_price = Math.floor(total_price * 1.10)
    }
    npo_price.innerText = total_price;
}