// Универсальные табы
class Tabs {
  constructor(node) {
    this.container = node;

    const navContainer = node.querySelector("[data-tabs-nav]");
    const listContainer = node.querySelector("[data-tabs-list]");

    this.navItems = navContainer.querySelectorAll(":scope > *");
    this.listItems = listContainer.querySelectorAll(":scope > *");
  }

  init() {
    for (let index = 0; index < this.navItems.length; index++) {
      const element = this.navItems[index];

      if (this.active && element.classList.contains("active")) {
        this.isActive = index;
      }

      element.classList.remove("active");
      element.dataset.index = index;
    }

    this.listItems.forEach((item) => item.classList.remove("active"));

    if (!this.active) {
      this.isActive = 0;
    }

    this.toggle(this.isActive);

    this.navItems.forEach((item) => {
      item.addEventListener("click", () => {
        this.toggle(item.dataset.index);
      });
    });
  }

  toggle(index) {
    if (window.innerWidth >= 991) {
      this.navItems[this.isActive].classList.remove("active");
      this.listItems[this.isActive].classList.remove("active");

      this.isActive = index;

      this.navItems[this.isActive].classList.add("active");
      this.listItems[this.isActive].classList.add("active");
    } else if (window.innerWidth < 991 && index == 0 && this.isActive == 0) {
      this.navItems[this.isActive].classList.remove("active");
      this.listItems[this.isActive].classList.remove("active");

      this.isActive = 'clear';
    } else if (window.innerWidth < 991 && this.isActive == 'clear') {
      this.isActive = index;

      this.navItems[this.isActive].classList.add("active");
      this.listItems[this.isActive].classList.add("active");
    } else if (window.innerWidth < 991 && index != 0) {
      this.navItems[this.isActive].classList.remove("active");
      this.listItems[this.isActive].classList.remove("active");

      this.isActive = index;

      this.navItems[this.isActive].classList.add("active");
      this.listItems[this.isActive].classList.add("active");
    } else if (window.innerWidth < 991 && index == 0 && this.isActive != 0) {
      this.navItems[this.isActive].classList.remove("active");
      this.listItems[this.isActive].classList.remove("active");

      this.isActive = index;

      this.navItems[this.isActive].classList.add("active");
      this.listItems[this.isActive].classList.add("active");
    }
    }
}

const tabItems = document.querySelectorAll("[data-tabs]");

tabItems.forEach((tab) => {
  new Tabs(tab).init();
});

// кнопка меню
const btnMenu = document.querySelector(".mobile-btn");
const menu = document.querySelector(".menu-block");

btnMenu.addEventListener("click", () => {
  btnMenu.classList.toggle("active");
  menu.classList.toggle("active");
});

const calcWindows = document.querySelector("#calcW");
const calcBtn = document.querySelector("#calcBtn");
const calcBtnSend = document.querySelector("#calcBtnSend");

calcBtn.addEventListener("click", (event) => {
  event.preventDefault();
  calcWindows.classList.toggle('calc-w');
});

calcBtnSend.addEventListener("click", (event) => {
  event.preventDefault();
  const sendData = []
  const calcFormInputModel = calcWindows.querySelector("#model");
  sendData['type0'] = calcFormInputModel.value
  // console.log(calcFormInputModel.value);
  const calcFormInput = calcWindows.querySelectorAll("input");
  // console.log(calcFormInput)
  calcFormInput.forEach((el) => {
    if (el.type == 'radio' && el.checked) {
      sendData[el.name] = el.value;
      // console.log(el)
    } else {
      // console.log(el)
      switch (el.name) {
        case 'type8':
          el.value = (el.value == '')? 'Не указано' : el.value
          sendData[el.name] = el.value;
          break;
        case 'type4':
          if (el.value.length < 1){
            el.style.border = '2px dashed #c00b1e';
            sendData.slice(el.value);
          } else {
            el.style.border = '';
            sendData[el.name] = el.value;
          }

          break;
        case 'type5':

          if (el.value.length != 17){
            el.style.border = '2px dashed #c00b1e';
            sendData.slice(el.value);
          } else {
            el.style.border = '';
            sendData[el.name] = el.value;
          }
          break;
        case 'type6':
          if (!el.checked){
            el.parentElement.style.borderBottom = '2px dashed #c00b1e';
            sendData.slice(el.value);
          } else {
            el.parentElement.style.borderBottom = 'none';
            sendData[el.name] = el.value;
          }
          break;
        case 'type7':
          if (el.checked){
            sendData[el.name] = 'Подписка на рекламу';
          } else {
            sendData[el.name] = 'Без подписки';
          }
          break;
      }
    }
    if (el.type == 'text'){

    }
  });
  if (Object.keys(sendData).length == 9) {
    console.log(sendData);
    const url = '/wp-content/themes/hello-elementor/includes/calc_sender.php';
    jQuery( function( $ ){
    $.ajax({
      type: "POST",
      url: url,
      dataType: 'html',
      data: {
        type0: sendData['type0'],
        type1: sendData['type1'],
        type2: sendData['type2'],
        type3: sendData['type3'],
        type4: sendData['type4'],
        type5: sendData['type5'],
        type6: sendData['type6'],
        type7: sendData['type7'],
        type8: sendData['type8'],
      },
      success: function (data) {
        data = JSON.parse(data);
        
        jQuery('#calcW .swap-calc .cont').addClass('sended');
        jQuery('#calcW .swap-calc .cont [name=type4]').val('');
        jQuery('#calcW .swap-calc .cont [name=type5]').val('');
        jQuery('#calcW .swap-calc .cont [name=type6]').prop('checked', false);
        setTimeout(() => { 
          jQuery('#calcW .swap-calc .cont').removeClass('sended');
        }, 4000);

        console.log(data)

        if (data.redirect) {
          window.location.href = 'https://mebelit-spb.ru/stranica-blagodarnosti';
        }

        
      },
    });
    });
  }
  // console.log(Object.keys(sendData).length)
});

const list = document.querySelectorAll(".menu-block .sub-list");
list.forEach((block) => {
  const btnList = block.querySelector(".li-ar");
  const subMenu = block.querySelector(".tabs");
  const link = block.querySelector("a.sub-link");
  const back = block.querySelector(".back");
  const backTwo = block.querySelectorAll(".back-two");
  const listTwo = block.querySelectorAll(".tab__element");

  btnList.addEventListener("click", () => {
    link.classList.toggle("active");
    btnList.classList.toggle("active");
    subMenu.classList.toggle("active");
  });

  back.addEventListener("click", () => {
    subMenu.classList.remove("active");
  });
  backTwo.forEach((click) => {
    click.addEventListener("click", () => {
      listTwo.forEach((active) => {
        active.classList.remove("active");
      } );
    });
  });
});


/*  const listT = document.querySelectorAll(".menu-block .menu ul.menu-list .tabs");
 listT.forEach((blockT) => {
   const btnTwo = blockT.querySelector(".menu-block .tabs__pane li");
   const listTwo = blockT.querySelector(".menu-block .tab__element");
   const backTwo = blockT.querySelector(".tabs .back-two");

   btnTwo.addEventListener("click", () => {
     btnTwo.classList.toggle("slide");
     listTwo.classList.toggle("slide");
   });
   backTwo.addEventListener("click", () => {
     btnTwo.classList.remove("slide");
     listTwo.classList.remove("slide");
   });
 }); */
