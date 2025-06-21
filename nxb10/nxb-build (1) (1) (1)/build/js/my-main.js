'use strict';

(function () {

  
  const btn = document.querySelector(".tgl_btn");
    const hiddenTxt = document.querySelector(".togle_txt__hidden");   
    if (btn && hiddenTxt) {
        hiddenTxt.style.display = "none";
        btn.addEventListener("click", function() {
        if (hiddenTxt.style.display == "block") {
            hiddenTxt.style.display = "none";
            btn.innerHTML = "Раскрыть";
        } else {
            hiddenTxt.style.display = "block";
            btn.innerHTML = "Свернуть";
        }
    });
}    
  
})();
