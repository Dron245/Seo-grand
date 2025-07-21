'use strict';

// (function () {
// 	const menu = document.querySelector(".main-nav");
// 	const menuMain = document.querySelector(".main-nav__wrap-list");
// 	const menuLeft = document.querySelector(".main-nav__wrap-left");
// 	const navToggle = document.querySelector(".main-nav__toggle");
// 	const navToggleLeft = document.querySelector(".main-nav__toggle-left");
// 	const header = document.querySelector(`.header`);
// 	const body = document.querySelector("body");
// 	const socialBtns = document.querySelector(".main-nav__left").querySelectorAll("svg");

// 	navToggle.addEventListener("click", function () {
// 		navToggle.classList.toggle("main-nav__toggle--active");
// 		menuMain.classList.toggle("main-nav__wrap-list--open");
// 		menu.classList.toggle("main-nav--open");
// 		body.classList.toggle("no-scroll");
// 	});

// 	navToggleLeft.addEventListener("click", function () {
// 		menuLeft.classList.toggle("main-nav__wrap-left--open");
// 		navToggleLeft.classList.toggle("main-nav__toggle-left--active");
// 		menu.classList.toggle("main-nav--open");
// 		body.classList.toggle("no-scroll");
// 	});

// 	const mainBanner = document.querySelector(".notice");
// 	let pxAmount = 0;
// 	let pxAmount2 = 0;

// 	function isScrolled() {
// 		const scrollTop = document.documentElement.scrollTop;

// 		if (mainBanner) {
// 			return scrollTop > pxAmount;
// 		}
// 	}

// 	function isScrolled2() {
// 		const scrollTop = document.documentElement.scrollTop;

// 		if (mainBanner) {
// 			pxAmount2 = mainBanner.offsetHeight;
// 			return scrollTop > pxAmount2;
// 		} else {
// 			pxAmount2 = menu.offsetHeight;
// 			return scrollTop > pxAmount2;
// 		}
// 	}

// 	function offset(el) {
// 		var rect = el.getBoundingClientRect(),
// 			scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
// 			scrollTop = window.pageYOffset || document.documentElement.scrollTop;
// 		return { top: rect.top + scrollTop, left: rect.left + scrollLeft };
// 	}

// 	function colorScroll() {
// 		let windowWidth = document.body.clientWidth;

// 		if (isScrolled() & !isScrolled2()) {
// 			header.classList.add(`header_colored1`);
// 			//header.classList.remove(`header_menu-colored`);
// 			header.classList.remove(`header_colored`);
// 		} else if (isScrolled2()) {
// 			//header.classList.add(`header_menu-colored`);
// 			header.classList.add(`header_colored`);
// 		} else {
// 			header.classList.remove(`header_colored1`);
// 			header.classList.remove(`header_colored`);
// 		}

// 		socialBtns.forEach((item) => {
// 			if (mainBanner && offset(item).top > mainBanner.offsetHeight) {
// 				item.classList.add(`green`);
// 			} else {
// 				item.classList.remove(`green`);
// 			}
// 		});
// 	}

// 	if (menu) {
// 		window.addEventListener(`scroll`, colorScroll);
// 	}

// 	window.onload = colorScroll();

// 	let tariffsSlider = null;
// 	const mediaQuerySize = 576;
// 	const mediaQuerySize2 = 1360;

// 	function tariffsSliderInit() {
// 		if (!tariffsSlider) {
// 			tariffsSlider = new Swiper(".tariffs__slider", {
// 				spaceBetween: 20,
// 				slidesPerView: "auto",
// 				direction: "horizontal",
// 			});
// 		}
// 	}

// 	function tariffsSliderDestroy() {
// 		if (tariffsSlider) {
// 			tariffsSlider.destroy();
// 			tariffsSlider = null;
// 		}
// 	}

// 	let tariffsSlider2 = null;

// 	function tariffsSlider2Init() {
// 		if (!tariffsSlider2) {
// 			tariffsSlider2 = new Swiper(".tariffs__slider2", {
// 				spaceBetween: 20,
// 				slidesPerView: "auto",
// 				direction: "horizontal",
// 			});
// 		}
// 	}

// 	function tariffsSlider2Destroy() {
// 		if (tariffsSlider2) {
// 			tariffsSlider2.destroy();
// 			tariffsSlider2 = null;
// 		}
// 	}

// 	let callbackSlider = null;

// 	function callbackSliderInit() {
// 		if (!callbackSlider) {
// 			callbackSlider = new Swiper(".callback-help__slider", {
// 				spaceBetween: 20,
// 				slidesPerView: "auto",
// 				direction: "horizontal",
// 				breakpoints: {
// 					768: {
// 						spaceBetween: 30,
// 						slidesPerView: 2,
// 					},
// 					992: {
// 						spaceBetween: 30,
// 						slidesPerView: 3,
// 					},
// 				},
// 			});
// 		}
// 	}

// 	function callbackSliderDestroy() {
// 		if (callbackSlider) {
// 			callbackSlider.destroy();
// 			callbackSlider = null;
// 		}
// 	}

// 	let slidersTariff = document.querySelectorAll(".tariffs__sliders");
// 	let sliderHelp = document.querySelector(".callback-help__slider");

// 	function resizeHandlerSlider() {
// 		// Берём текущую ширину экрана
// 		let windowWidth = document.body.clientWidth;

// 		// Если ширина экрана меньше или равна mediaQuerySize

// 		if (slidersTariff.length > 0) {
// 			if (windowWidth <= mediaQuerySize) {
// 				// Инициализировать слайдер если он ещё не был инициализирован
// 				tariffsSliderInit();
// 				tariffsSlider2Init();
// 			} else {
// 				// Уничтожить слайдер если он был инициализирован
// 				tariffsSliderDestroy();
// 				tariffsSlider2Destroy();
// 			}
// 		}

// 		if (sliderHelp) {
// 			if (windowWidth < mediaQuerySize2) {
// 				// Инициализировать слайдер если он ещё не был инициализирован
// 				callbackSliderInit();
// 			} else {
// 				// Уничтожить слайдер если он был инициализирован
// 				callbackSliderDestroy();
// 			}
// 		}
// 	}

// 	window.addEventListener("DOMContentLoaded", resizeHandlerSlider);

// 	window.addEventListener("resize", resizeHandlerSlider);

// 	/*if(screenWidth <= 556) {
//   new Swiper('.tariffs__slider', {
//     spaceBetween: 40,
//       slidesPerView: 4,
//       direction: "horizontal",
//       breakpoints: {
//         1250: {
//           slidesPerView: 4,
//           spaceBetween: 40
//         },
//         991: {
//           slidesPerView: 3,
//           spaceBetween: 30
//         },
//         576: {
//           slidesPerView: 2,
//           spaceBetween: 30
//         },
//         300: {
//           slidesPerView: "auto",
//           spaceBetween: 20
//         }
//       }
//   });
// }*/

// 	new Swiper(".cases__slider", {
// 		spaceBetween: 20,
// 		slidesPerView: "auto",

// 		// Responsive breakpoints
// 		breakpoints: {
// 			576: {
// 				spaceBetween: 30,
// 				slidesPerView: "auto",
// 			},
// 			992: {
// 				spaceBetween: 30,
// 				slidesPerView: 3,
// 			},
// 			1360: {
// 				spaceBetween: 30,
// 				slidesPerView: 3,
// 			},
// 			1650: {
// 				spaceBetween: 40,
// 				slidesPerView: 4,
// 			},
// 		},
// 	});

// 	new Swiper(".clients__slider", {
// 		spaceBetween: 20,
// 		slidesPerView: "auto",

// 		// Responsive breakpoints
// 		breakpoints: {
// 			992: {
// 				spaceBetween: 30,
// 				slidesPerView: 5,
// 			},
// 			1360: {
// 				spaceBetween: 30,
// 				slidesPerView: 6,
// 			},
// 		},
// 	});

// 	new Swiper(".leaders__slider", {
// 		spaceBetween: 20,
// 		slidesPerView: "auto",
// 		navigation: {
// 			nextEl: `.swiper-button-next`,
// 			prevEl: `.swiper-button-prev`,
// 		},

// 		// Responsive breakpoints
// 		breakpoints: {
// 			1360: {
// 				spaceBetween: 30,
// 				slidesPerView: 5,
// 				showSwitchArrows: true,
// 			},
// 		},
// 	});

// 	new Swiper(".reviews__slider", {
// 		spaceBetween: 15,
// 		slidesPerView: "auto",
// 		loop: false,

// 		// Responsive breakpoints
// 		breakpoints: {
// 			576: {
// 				spaceBetween: 30,
// 				slidesPerView: "auto",
// 			},
// 			992: {
// 				spaceBetween: 30,
// 				slidesPerView: 3,
// 			},
// 			1650: {
// 				spaceBetween: 40,
// 				slidesPerView: 4,
// 			},
// 		},
// 	});

// 	/*new Swiper('.company-case__slider', {
//   spaceBetween: 0,
//   slidesPerView: 1,

//   navigation: {
//     nextEl: '.swiper-button-next',
//     prevEl: '.swiper-button-prev',
//   },
// });

// new Swiper('.company-case__slider2', {
//   spaceBetween: 0,
//   slidesPerView: 1,
//   navigation: {
//     nextEl: `.swiper-button-next`,
//     prevEl: `.swiper-button-prev`,
//   },
// });*/

// 	document.querySelectorAll(".swiper-container").forEach(function (elem) {
// 		new Swiper(elem, {
// 			slidesPerView: 1,
// 			spaceBetween: 0,
// 			navigation: {
// 				nextEl: elem.nextElementSibling.nextElementSibling,
// 				prevEl: elem.nextElementSibling,
// 			},
// 		});
// 	});

// 	/*var thisSwiper = [];
// document.querySelectorAll('.swiper-container').forEach(function(i) {
//    var this_ID = i.getAttribute('id');

//    thisSwiper[i] = new Swiper('#'+this_ID, {
//       slidesPerView: 1,
//       spaceBetween: 0,
//       navigation: {
//         nextEl: i.nextElementSibling.nextElementSibling,
//         prevEl: i.nextElementSibling,
//       }
//    });

//    thisSwiper[i].on('slideChange', function () {
//      console.log('slide '+i+' changed');
//    });
//  });*/

// 	const screenWidth = window.screen.width;
// 	const screenHeigth = window.screen.height;
// 	let placeholderLinks = document.getElementById("links_field");
// 	let placeholderPages = document.getElementById("pages_field");

// 	let menuDesktopLeft = document.querySelector(".main-nav__list-left");
// 	let menuLeftItems = menuDesktopLeft.querySelectorAll("li");

// 	if (screenWidth > 1359 && menuLeftItems.length > 6) {
// 		menuDesktopLeft.style.width = "400px";
// 	}

// 	if (screenWidth < 575 && placeholderPages && placeholderLinks) {
// 		placeholderLinks.placeholder = "0 ссылок в месяц";
// 		placeholderPages.placeholder = "0 cтраниц в месяц";
// 	}

// 	function changedMenuWidth() {
// 		// Берём текущую ширину экрана
// 		let windowWidth = document.body.clientWidth;
// 		//
// 		if (windowWidth > 1359 && menuLeftItems.length > 6) {
// 			menuDesktopLeft.style.width = "400px";
// 		} else {
// 			menuDesktopLeft.style.width = "auto";
// 		}
// 	}

// 	window.addEventListener("resize", changedMenuWidth);

// 	/*if(screenHeigth > 970 && screenWidth > 1359) {
//   body.classList.add('highMenu');
// }  */

// 	// Tabs
// 	class Tabs {
// 		constructor(node) {
// 			this.container = node;

// 			const navContainer = node.querySelector("[data-tabs-nav]");
// 			const listContainer = node.querySelector("[data-tabs-list]");

// 			this.navItems = navContainer.querySelectorAll(":scope > *");
// 			this.listItems = listContainer.querySelectorAll(":scope > *");
// 		}

// 		init() {
// 			for (let index = 0; index < this.navItems.length; index++) {
// 				const element = this.navItems[index];

// 				if (this.active && element.classList.contains("active")) {
// 					this.isActive = index;
// 				}

// 				element.classList.remove("active");
// 				element.dataset.index = index;
// 			}

// 			this.listItems.forEach((item) => item.classList.remove("active"));

// 			if (!this.active) {
// 				this.isActive = 0;
// 			}

// 			this.toggle(this.isActive);

// 			this.navItems.forEach((item) => {
// 				item.addEventListener("click", () => {
// 					this.toggle(item.dataset.index);
// 				});
// 			});
// 		}

// 		toggle(index) {
// 			this.navItems[this.isActive].classList.remove("active");
// 			this.listItems[this.isActive].classList.remove("active");

// 			this.isActive = index;

// 			this.navItems[this.isActive].classList.add("active");
// 			this.listItems[this.isActive].classList.add("active");
// 		}
// 	}

// 	const tabItems = document.querySelectorAll("[data-tabs]");

// 	tabItems.forEach((tab) => {
// 		new Tabs(tab).init();
// 	});

// 	// SELECT for mobile

// 	let select = function () {
// 		let selectHeader = document.querySelectorAll(".options__header");
// 		let selectItem = document.querySelectorAll(".options__item");

// 		selectHeader.forEach((item) => {
// 			item.addEventListener("click", selectToggle);
// 		});

// 		selectItem.forEach((item) => {
// 			item.addEventListener("click", selectChoose);
// 		});

// 		function selectToggle() {
// 			this.parentElement.classList.toggle("is-active");
// 		}

// 		function selectChoose() {
// 			let text = this.innerText,
// 				select = this.closest(".select");
// 			if (select) {
// 				currentText = select.querySelector(".options__current");
// 				currentText.innerText = text;
// 				select.classList.remove("is-active");
// 			}
// 		}
// 	};

// 	select();

// 	const answersToggles = document.querySelectorAll(".answers__accordeon-container button");
// 	const answersSections = document.querySelectorAll(".answers__section div");

// 	answersToggles.forEach(function (toggle) {
// 		toggle.addEventListener("click", onToggleAnswersClicked);
// 	});

// 	function onToggleAnswersClicked(e) {
// 		const section = e.target.closest(".answers__accordeon-container").parentElement;
// 		const sectionText = section.querySelector(".answers__text");
// 		if (section.classList.contains("answers__accordeon-container--opened")) {
// 			section.classList.remove("answers__accordeon-container--opened");
// 			sectionText.style.maxHeight = null;
// 		} else {
// 			answersSections.forEach(function (section) {
// 				section.classList.remove("answers__accordeon-container--opened");
// 				if (section.querySelector(".answers__text")) {
// 					section.querySelector(".answers__text").style.maxHeight = null;
// 				}
// 			});

// 			section.classList.add("answers__accordeon-container--opened");

// 			sectionText.style.maxHeight = sectionText.scrollHeight + 60 + "px";
// 		}
// 	}

// 	setInterval(function () {
// 		if (
// 			document.activeElement instanceof HTMLIFrameElement &&
// 			document.activeElement.classList.contains("notice__video")
// 		) {
// 			document.querySelector(".notice__header").style.opacity = 0;
// 		}
// 	}, 50);

// 	//Форма обратной связи

// 	const formBtns = document.querySelectorAll(".form-add__send");
// 	const formMainBtns = document.querySelectorAll(".form__send");
// 	const textArea = document.querySelector(".form-add__comment");

// 	formBtns.forEach(function (toggle) {
// 		toggle.addEventListener("click", onCallbackBtnClicked);
// 	});

// 	formMainBtns.forEach(function (toggle) {
// 		toggle.addEventListener("click", onCallbackMainBtnClicked);
// 	});

// 	/*function onCallbackBtnClicked(evt) {
//   evt.preventDefault();
//   const formSection = evt.target.closest('.form-callback');
//   formSection.classList.add('callback-opened');

//   const formBtnAnswer = formSection.querySelector('.callback-form__close-btn');
//   if (formBtnAnswer) {
//     formBtnAnswer.addEventListener('click', function () {
//       formSection.classList.remove('callback-opened');
//     });
//   }
// } */

// 	const onInput = function (evt) {
// 		const activeInput = evt.target;
// 		activeInput.classList.toggle("form-add__input--error");
// 		activeInput.removeEventListener("input", onInput);
// 	};

// 	const onInput2 = function (evt) {
// 		const activeInput = evt.target;
// 		activeInput.classList.toggle("form__input--error");
// 		activeInput.removeEventListener("input", onInput);
// 	};

// 	if (textArea) {
// 		textArea.addEventListener("keydown", function (evt) {
// 			const activeInput = evt.target;
// 			activeInput.parentElement.classList.add("form__input--textarea-active");
// 		});
// 	}

// 	/*function onCallbackBtnClicked(evt) {
//       const formSection = evt.target.closest('.form-add');
//       const formBtnAnswer = formSection.querySelector('.callback-form__close-btn');
//       const inputName = formSection.querySelector('.form-add__text--name');
//       const inputPhone = formSection.querySelector('.form-add__text--tel');
//       const inputAgree = formSection.querySelector('.form-add__checkbox');

//       if (!inputName.value || !inputPhone.value || !inputAgree.checked) {
//         evt.preventDefault();
//         if (!inputName.value) {
//           inputName.classList.add('form-add__input--error');
//           inputName.addEventListener('input', onInput);
//         }
//         if (!inputPhone.value) {
//           inputPhone.classList.add('form-add__input--error');
//           inputPhone.addEventListener('input', onInput);
//         }
//         if(!inputAgree.checked) {
//           inputAgree.classList.add('form-add__input--error');
//           inputAgree.addEventListener('input', onInput);
//         }
//       }
//         else {
//           evt.preventDefault();
//           formSection.classList.add('callback-opened');
//           formBtnAnswer.addEventListener('click', function () {
//             formSection.classList.remove('callback-opened');
//           });
//     }

//   } */

// 	function onCallbackBtnClicked(evt) {
// 		const formSection = evt.target.closest(".form-add");
// 		const formBtnAnswer = formSection.querySelector(".callback-form__close-btn");
// 		const inputName = formSection.querySelector(".form-add__text--name");
// 		const inputPhone = formSection.querySelector(".form-add__text--tel");
// 		const inputAgree = formSection.querySelector(".form-add__checkbox");

// 		if (formSection && (!inputName.value || !inputPhone.value || !inputAgree.checked)) {
// 			evt.preventDefault();
// 			if (!inputName.value) {
// 				inputName.classList.add("form-add__input--error");
// 				inputName.addEventListener("input", onInput);
// 			}
// 			if (!inputPhone.value) {
// 				inputPhone.classList.add("form-add__input--error");
// 				inputPhone.addEventListener("input", onInput);
// 			}
// 			if (!inputAgree.checked) {
// 				inputAgree.classList.add("form-add__input--error");
// 				inputAgree.addEventListener("input", onInput);
// 			}
// 		} else {
// 			evt.preventDefault();
// 			// if (formSection) {
// 			$.ajax({
// 				url: "/ajax/send.php",
// 				method: "post",
// 				dataType: "html",
// 				data: $(formSection).find("form").serialize(),
// 				success: function (data) {
// 					let response = data;
// 				},
// 			});
// 			// }

// 			formSection.classList.add("callback-opened");
// 			formBtnAnswer.addEventListener("click", function () {
// 				formSection.classList.remove("callback-opened");
// 			});
// 		}
// 	}

// 	function onCallbackMainBtnClicked(evt) {
// 		const formSection = evt.target.closest(".form-callback");
// 		const formBtnAnswer = formSection.querySelector(".callback-form__close-btn");
// 		const inputName = formSection.querySelector(".form__text--name");
// 		const inputPhone = formSection.querySelector(".form__text--tel");
// 		const inputAgree = formSection.querySelector(".form__checkbox");

// 		if (!inputName.value || !inputPhone.value || !inputAgree.checked) {
// 			evt.preventDefault();
// 			if (!inputName.value) {
// 				inputName.classList.add("form__input--error");
// 				inputName.addEventListener("input", onInput2);
// 			}
// 			if (!inputPhone.value) {
// 				inputPhone.classList.add("form__input--error");
// 				inputPhone.addEventListener("input", onInput2);
// 			}
// 			if (!inputAgree.checked) {
// 				inputAgree.classList.add("form__input--error");
// 				inputAgree.addEventListener("input", onInput2);
// 			}
// 		} else {
// 			evt.preventDefault();
// 			formSection.classList.add("callback-opened");
// 			formBtnAnswer.addEventListener("click", function () {
// 				formSection.classList.remove("callback-opened");
// 			});
// 		}
// 	}

// 	//MODAL

// 	document.addEventListener("DOMContentLoaded", function () {
// 		const modals = document.querySelectorAll(".js-open-modal");
// 		const overlayModals = document.querySelectorAll(".js-overlay-modal");
// 		const closeModal = document.querySelectorAll(".js-modal-close");

// 		function popapShow(srs, header, title, listText, listExpirence, sloganText) {
// 			let out = document.getElementById("modal-team").querySelector(".team-member");
// 			let popap = `
//       <div class="team-member__wrapper">
//         <div class="team-member__card">
//           <figure>
//             <img src="${srs}" alt="${header}" width="64" height="64">
//           </figure>
//           <div class="team-member__info">
//             <h3>${header}</h3>
//             <p class="title">${title}</p>
//           </div>
//         </div>
//         <ul class="team-member__work">
//         ${listExpirence}
//         </ul>
//         <p class="team-member__sphere">Специалист в области</p>
//         <ul class="team-member__skills">
//         ${listText}
//         </ul>
//         <div class="team-member__slogan">
//         <p class="team-member__slogan-title">Девиз</p>
//         <p>${sloganText}<p>
//         </div>

//       </div>
//       `;
// 			out.insertAdjacentHTML("afterBegin", popap);
// 		}

// 		function popapShowCaseGoogle(src, srcLogo, link, positions) {
// 			let googleBlock = document
// 				.getElementById("modal-case")
// 				.querySelector(".tabs__element--google");
// 			let out = googleBlock.querySelector(".company-case__slide");
// 			let outText = document.getElementById("modal-case").querySelector(".company-case__text");
// 			let popap = `
//       <img src="${src}" alt="позиции в Google">

//       `;
// 			let popapText = `
//     <div class="company-case__wrap">
//       <div class="company-case__img-wrap">
//         <div>
//           <img src="${srcLogo}" alt="" width='240' height='90'>
//         </div>
//       </div>
//       <div class="company-case__text-wrap">
//           <div class="company-case__item case__item">
//               ${positions}
//           </div>
//           <a class="company-case__link case__link" href="${link}" target="_blank"><span>${link}<span></a>
//       </div>
//     </div>
//     `;
// 			out.insertAdjacentHTML("afterBegin", popap);
// 			outText.insertAdjacentHTML("afterBegin", popapText);
// 		}

// 		function popapShowCaseYandex(src) {
// 			let outYandex = document
// 				.getElementById("modal-case")
// 				.querySelector(".tabs__element--yandex")
// 				.querySelector(".company-case__slide");

// 			let popapYandex = `
//       <img src="${src}" alt="позиции в Яндекс">

//       `;

// 			outYandex.insertAdjacentHTML("afterBegin", popapYandex);
// 		}

// 		modals.forEach(function (e) {
// 			e.addEventListener("click", function (e) {
// 				e.preventDefault();
// 				const closeModal = this.getAttribute("data-modal");
// 				const modal = document.querySelector('.modal[data-modal="' + closeModal + '"]');
// 				//const modalWrap = e.target.closest('.case__overlay-wrap');
// 				//const modalHeight = modal.offsetHeight;

// 				/*if (modalWrap.classList.contains("case__overlay-wrap--yandex"))  {
//         modal.querySelector(".tabs__element--google").classList.remove('active');
//         modal.querySelector(".tabs__element--yandex").classList.add('active');
//       }*/

// 				if (modal.classList.contains("modal--case2")) {
// 					let divHide = e.target.closest(".case__overlay-wrap");
// 					let article = divHide.closest(".case");
// 					let img = divHide.querySelector("img");
// 					let imgLogo = article.querySelector(".case__img-wrap").querySelector("img");
// 					let clientLink = article.querySelector(".case__client-info").querySelector("a");
// 					let positions = article.querySelector(".case__item--yandex").innerHTML;

// 					if (divHide.classList.contains("case__overlay-wrap--goggle")) {
// 						popapShowCaseGoogle(img.src, imgLogo.src, clientLink.href, positions);
// 						const caseYandex = divHide.parentElement.querySelector(".case__overlay-wrap--yandex");
// 						if (caseYandex) {
// 							let yandexImg = caseYandex.querySelector("img");
// 							popapShowCaseYandex(yandexImg.src);
// 						}
// 					} else {
// 						popapShowCaseYandex(img.src);

// 						const caseGoogle = divHide.parentElement.querySelector(".case__overlay-wrap--google");
// 						if (caseGoogle) {
// 							let googleImg = caseGoogle.querySelector("img");
// 							popapShowCaseGoogle(googleImg.src, imgLogo.src, clientLink.href, positions);
// 						}
// 					}
// 				}

// 				if (modal.classList.contains("modal--team")) {
// 					let divHide = e.target.closest(".leaders__slide");
// 					let divImg = divHide.querySelector("img").src;
// 					let divHeader = divHide.querySelector("h3").textContent;
// 					let divText = divHide.querySelector("p").textContent;
// 					let listText = divHide.querySelector(".leaders__skills").innerHTML;
// 					let listExpirence = divHide.querySelector(".leaders__work").innerHTML;
// 					let sloganText = divHide.querySelector(".leaders__slogan").textContent;

// 					popapShow(divImg, divHeader, divText, listText, listExpirence, sloganText);
// 				}

// 				modal.classList.add("active");
// 				//modal.style.marginTop = '-'+modalHeight/2+'px';
// 				modal.closest(".overlay").classList.add("active");
// 				//overlayModal.classList.add("active");
// 				body.classList.add("no-scroll");
// 				e.stopPropagation();
// 			});
// 		});

// 		closeModal.forEach(function (e) {
// 			e.addEventListener("click", function (e) {
// 				if (this.closest(".modal").classList.contains("modal--team")) {
// 					let wrapper = this.closest(".modal").querySelector(".team-member__wrapper");
// 					wrapper.remove();
// 				}

// 				if (this.closest(".modal").classList.contains("modal--case2")) {
// 					let wrappers = this.closest(".modal").querySelectorAll(".swiper");
// 					let clientInfo = this.closest(".modal").querySelector(".company-case__text");
// 					clientInfo.querySelector(".company-case__wrap").remove();
// 					wrappers.forEach(function (e) {
// 						let img = e.querySelector("img");
// 						img.remove();
// 					});
// 				}

// 				this.closest(".modal").classList.remove("active");
// 				this.closest(".overlay").classList.remove("active");
// 				body.classList.remove("no-scroll");
// 			});
// 		});

// 		/*document.body.addEventListener("keyup", function (e) {
//     27 == e.keyCode && (document.querySelector(".modal.active").classList.remove("active"));
//     document.querySelector(".overlay.active").classList.remove("active")
//     body.classList.remove('no-scroll');
//   }, !1);*/

// 		window.addEventListener(
// 			"keydown",
// 			function (e) {
// 				if (e.keyCode == 27 && document.querySelector(".modal.active")) {
// 					let modalActive = document.querySelector(".modal.active");
// 					modalActive.classList.remove("active");
// 					document.querySelector(".overlay.active").classList.remove("active");
// 					body.classList.remove("no-scroll");

// 					if (modalActive.classList.contains("modal--team")) {
// 						modalActive.querySelector(".team-member__wrapper").remove();
// 					}

// 					if (modalActive.classList.contains("modal--case")) {
// 						let wrappers = modalActive.querySelectorAll(".swiper");
// 						let clientInfo = modalActive.querySelector(".company-case__text");
// 						clientInfo.querySelector(".company-case__wrap").remove();
// 						wrappers.forEach(function (e) {
// 							let img = e.querySelector("img");
// 							img.remove();
// 						});
// 					}
// 				}
// 			},
// 			true
// 		);

// 		overlayModals.forEach(function (e) {
// 			e.addEventListener("click", function (e) {
// 				if (!e.target.closest(".modal")) {
// 					let modalActive = document.querySelector(".modal.active");
// 					console.log(modalActive);

// 					if (modalActive.classList.contains("modal--team")) {
// 						modalActive.querySelector(".team-member__wrapper").remove();
// 					}

// 						modalActive.classList.remove("active");
// 						this.classList.remove("active");
// 						body.classList.remove("no-scroll");

// 				}
// 			});
// 		});

/*overlayModal.addEventListener("click", function () {
    document.querySelector(".modal.active").classList.remove("active"); 
    this.classList.remove("active");
    body.classList.remove('no-scroll');

    if(modalActive.classList.contains("modal--team")) {
          modalActive.querySelector('.wrapper1').remove();
    }
  })*/
// });
// })();

// Мой код

document.addEventListener('DOMContentLoaded', function () {
	//Маска телефона
	if (document.getElementById('phone_field4')) {
		const element = document.getElementById('phone_field4');
		const maskOptions = {
			mask: '+{7} (000) 000-00-00',
		};

		IMask(element, maskOptions);
	}

	//маска телефона в резюме
	if (document.getElementById('resume-field-2')) {
		const element = document.getElementById('resume-field-2');
		const maskOptions = {
			mask: '+{7} (000) 000-00-00',
		};

		IMask(element, maskOptions);
	}

	let asideblogSwiper = null;
	let careerAsideSwiper = null;

	//Слайдер на странице "Блоги"

	if (document.querySelector('.posts__slider')) {
		//Указываем класс нужного слайдера
		//Создаем слайдер
		new Swiper('.posts__slider', {
			observer: true,
			observeParents: true,
			spaceBetween: 0,
			speed: 800,
			navigation: {
				prevEl: '.posts__pagination-item--left',
				nextEl: '.posts__pagination-item--right',
			},

			// Брейкпоинты
			breakpoints: {
				250: {
					slidesPerView: 1.05,
					spaceBetween: 10,
					autoHeight: true,
				},
				381: {
					slidesPerView: 1.3,
					spaceBetween: 20,
					autoHeight: true,
				},
				576: {
					slidesPerView: 2,
					spaceBetween: 20,
				},
				1360: {
					slidesPerView: 3,
					spaceBetween: 30,
				},
			},

			// События
			on: {},
		});
	}

	// Слайдер на странице "Блог"

	function initAsideblogSwiper() {
		const slider = document.querySelector('.asideblog__slider');

		if (window.innerWidth <= 1360 && slider && !asideblogSwiper) {
			asideblogSwiper = new Swiper('.asideblog__slider', {
				observer: true,
				observeParents: true,
				spaceBetween: 0,
				speed: 800,

				navigation: {
					prevEl: '.posts__pagination-item--left',
					nextEl: '.posts__pagination-item--right',
				},

				breakpoints: {
					250: {
						slidesPerView: 1.1,
						spaceBetween: 10,
						autoHeight: true,
					},
					575: {
						slidesPerView: 1.6,
						spaceBetween: 20,
						autoHeight: true,
					},

					768: {
						slidesPerView: 2.1,
						spaceBetween: 20,
						autoHeight: true,
					},
					800: {
						slidesPerView: 2.5,
						spaceBetween: 20,
						autoHeight: true,
					},
					993: {
						slidesPerView: 3,
						spaceBetween: 20,
					},
				},
			});
		}

		if (window.innerWidth > 1360 && asideblogSwiper) {
			asideblogSwiper.destroy(true, true);
			asideblogSwiper = null;
		}
	}

	// Слайдер на странице "Карьера"
	function initCareerAsideSwiper() {
		const slider = document.querySelector('.career-aside__slider');

		if (window.innerWidth <= 1200 && slider && !careerAsideSwiper) {
			careerAsideSwiper = new Swiper('.career-aside__slider', {
				observer: true,
				observeParents: true,
				// spaceBetween: 20,
				speed: 800,
				breakpoints: {
					0: {
						slidesPerView: 1.2,
						spaceBetween: 20,
					},

					576: {
						slidesPerView: 1.6,
						spaceBetween: 20,
					},
					768: {
						slidesPerView: 2,
						spaceBetween: 20,
					},

					992: {
						slidesPerView: 3,
						spaceBetween: 30,
					},
				},
			});
		}

		if (window.innerWidth > 1200 && careerAsideSwiper) {
			careerAsideSwiper.destroy(true, true);
			careerAsideSwiper = null;
		}
	}

	// Слайдер на странице "Кейсы"
	function initReviewsSwiper() {
		const slider = document.querySelector('.reviews-cases__content');
		if (slider) {
			// if (window.innerWidth <= 1200 && slider && !reviewsSwiper) {
			new Swiper('.reviews-cases__content', {
				observer: true,
				observeParents: true,
				// spaceBetween: 20,
				speed: 800,
				navigation: {
					prevEl: '.posts__pagination-item--left',
					nextEl: '.posts__pagination-item--right',
				},
				breakpoints: {
					0: {
						slidesPerView: 1.2,
						spaceBetween: 15,
					},

					576: {
						slidesPerView: 1.95,
						spaceBetween: 20,
					},
					768: {
						slidesPerView: 2.55,
						spaceBetween: 20,
					},

					992: {
						slidesPerView: 3,
						spaceBetween: 30,
					},
					1360: {
						slidesPerView: 4,
						spaceBetween: 37,
					},
				},
			});
		}
	}

	// Слайдер на странице "Кейс"
	function initCaseSwiper() {
		const slider = document.querySelector('.example__slider');
		if (slider) {
			// if (window.innerWidth <= 1200 && slider && !reviewsSwiper) {
			new Swiper('.example__slider', {
				observer: true,
				observeParents: true,
				// spaceBetween: 20,
				speed: 800,
				navigation: {
					prevEl: '.posts__pagination-item--left',
					nextEl: '.posts__pagination-item--right',
				},
				breakpoints: {
					0: {
						slidesPerView: 1.2,
						spaceBetween: 10,
					},

					480: {
						slidesPerView: 1.9,
						spaceBetween: 10,
					},
					676: {
						slidesPerView: 2.5,
						spaceBetween: 20,
					},
					868: {
						slidesPerView: 3,
						spaceBetween: 20,
					},
					1092: {
						slidesPerView: 2,
						spaceBetween: 30,
					},
				},
			});
		}
	}

	// 👇 Инициализация при загрузке
	initAsideblogSwiper();
	initCareerAsideSwiper();
	initReviewsSwiper();
	initCaseSwiper();
	// 👇 И обработка изменения ширины
	window.addEventListener('resize', () => {
		setTimeout(() => {
			initAsideblogSwiper();
			initCareerAsideSwiper();
		}, 200);
	});

	document.addEventListener('click', documentActions);

	// Функция расчёта высоты блока текста
	function toggleText(block, isOpen) {
		if (isOpen) {
			// Сначала явно задаём текущую высоту, чтобы анимация сработала
			block.style.maxHeight = block.scrollHeight + 'px';

			// сбрасываем max-height
			requestAnimationFrame(() => {
				block.style.maxHeight = null;
			});
		} else {
			block.style.maxHeight = block.scrollHeight + 'px';

			// Принудительно обновляем layout, чтобы transition сработал
			block.offsetHeight;

			block.style.maxHeight = block.scrollHeight + 'px';
		}
	}

	// Обработчик событий клика
	function documentActions(e) {
		const targetElement = e.target;
		console.log(targetElement);

		//страница "Карьера" открыть/закрыть текст вакансии
		if (targetElement.closest('.vacancy__footer .posts__pagination-item')) {
			const descriptionBlock = targetElement
				.closest('.vacancy')
				.querySelector('.vacancy__description');
			const openBtn = targetElement
				.closest('.vacancy')
				.querySelector('.posts__pagination-link_open');
			const closeBtn = targetElement
				.closest('.vacancy')
				.querySelector('.posts__pagination-link_close');

			const isOpen = descriptionBlock.classList.contains('_description-active');

			toggleText(descriptionBlock, isOpen);
			descriptionBlock.classList.toggle('_description-active');

			openBtn.style.display = isOpen ? 'inline-block' : 'none';
			closeBtn.style.display = isOpen ? 'none' : 'inline-block';
		}

		// Открытие модального окна "Заполните резюме"
		if (targetElement.closest('.vacancy__popup')) {
			const modal = document.querySelector('.resume-modal__wrap');
			if (modal) {
				modal.style.scale = '1';
				document.body.classList.add('modal-open'); // 🔒 блокируем прокрутку
			}
		}

		// Закрытие модального окна по кнопке "×"
		if (
			targetElement.closest('.resume-modal__close') ||
			targetElement.closest('.resume-modal__overlay')
		) {
			const modal = document.querySelector('.resume-modal__wrap');
			if (modal) {
				modal.style.scale = '0';
				document.body.classList.remove('modal-open'); // 🔓 возвращаем прокрутку
			}
		}

		if (targetElement.closest('.options__header')) {
			targetElement.closest('.select').classList.toggle('is-active');
		}
		// Плавный скролл по якорным ссылкам
		if (
			targetElement.closest('.blogs__category-item') &&
			document.querySelector('.example')
		) {
			const categoryItem = targetElement.closest('.blogs__category-item');
			const link = categoryItem.querySelector('.blogs__category-link');

			if (link && link.getAttribute('href')?.startsWith('#')) {
				e.preventDefault();

				const targetId = link.getAttribute('href');
				const scrollTarget = document.querySelector(targetId);

				if (scrollTarget) {
					// Вычисляем высоту фиксированной шапки
					const blogsFixed = document.querySelector('.blogs__category');
					const header = document.querySelector('.header');
					const headerOffset = header
						? header.offsetHeight + blogsFixed.offsetHeight
						: 0;

					const elementPosition = scrollTarget.getBoundingClientRect().top;
					const offsetPosition =
						elementPosition - 55 + window.scrollY - headerOffset;

					window.scrollTo({
						top: offsetPosition,
						behavior: 'smooth',
					});
				}
			}
		}

		// активность точек на страницы "Кейсы" при нажатии на соответствующую кноаку гугл яндкес трафик
		if (targetElement.closest('.options__item.tab')) {
			const clickedTab = targetElement.closest('.options__item.tab');
			const tabContainer = clickedTab.closest('.tabs');

			if (tabContainer) {
				const allTabs = tabContainer.querySelectorAll('.options__item.tab');
				const allPanels = tabContainer.querySelectorAll('.tabs__dot');

				const index = clickedTab.getAttribute('data-index');

				// Переключаем классы .active у табов
				allTabs.forEach((tab) => tab.classList.remove('active'));
				clickedTab.classList.add('active');

				// Переключаем .active у панелей
				allPanels.forEach((panel) => panel.classList.remove('active'));
				if (allPanels[index]) {
					allPanels[index].classList.add('active');
				}
			}
		}
	}

	document.querySelectorAll('.cases__item').forEach((caseItem) => {
		const tabs = caseItem.querySelectorAll('.tabs__element.tab2');
		const dotsContainer = caseItem.querySelector('.tabs__dots');
		const nextBtn = caseItem.querySelector('.tabs__next');
		const prevBtn = caseItem.querySelector('.tabs__prev');

		if (!tabs.length || !dotsContainer) return;

		// Создание точек
		dotsContainer.innerHTML = '';
		tabs.forEach((tab, i) => {
			const dot = document.createElement('div');
			dot.classList.add('tabs__dot');
			if (tab.classList.contains('active')) dot.classList.add('active');
			dotsContainer.appendChild(dot);
		});

		const dots = dotsContainer.querySelectorAll('.tabs__dot');

		let currentIndex = Array.from(tabs).findIndex((tab) =>
			tab.classList.contains('active')
		);

		function updateTabs(index) {
			tabs.forEach((tab, i) => {
				tab.classList.toggle('active', i === index);
			});
			dots.forEach((dot, i) => {
				dot.classList.toggle('active', i === index);
			});
			currentIndex = index;
		}

		// Кнопки
		nextBtn?.addEventListener('click', () => {
			let nextIndex = (currentIndex + 1) % tabs.length;
			updateTabs(nextIndex);
		});

		prevBtn?.addEventListener('click', () => {
			let prevIndex = (currentIndex - 1 + tabs.length) % tabs.length;
			updateTabs(prevIndex);
		});

		// Клики по точкам
		dots.forEach((dot, index) => {
			dot.addEventListener('click', () => {
				updateTabs(index);
			});
		});
	});
	if (document.querySelector('.example')) {
		document.documentElement.classList.add('example-header');
	}

	//Анимации
	// Универсальный обработчик анимаций
	const animateOnScroll = (element, keyframes, options, nextDelay = 0) => {
		if (!element) return;

		let isAnimating = false;

		const observer = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting && !isAnimating) {
						isAnimating = true;

						const animation = element.animate(keyframes, options);

						// Анимация следующего элемента (если есть)
						if (nextDelay > 0 && element.nextElementSibling) {
							setTimeout(() => {
								element.nextElementSibling.animate(keyframes, {
									...options,
									delay: 0,
								});
							}, nextDelay);
						}

						animation.onfinish = () => {
							observer.unobserve(element);
						};
					}
				});
			},
			{ threshold: 0.1 }
		);

		observer.observe(element);
	};

	// Конфигурация для анимаций
	const animationsConfig = [
		{
			selector: 'h1',
			keyframes: [
				{ opacity: 0, transform: 'translateY(50px)' },
				{ opacity: 1, transform: 'translateY(0)' },
			],
			options: { duration: 600, easing: 'ease', fill: 'forwards' },
			nextDelay: 200,
		},
		{
			selector: 'h2',
			keyframes: [
				{ opacity: 0, transform: 'translateY(50px)' },
				{ opacity: 1, transform: 'translateY(0)' },
			],
			options: { duration: 600, easing: 'ease', fill: 'forwards' },
			nextDelay: 200,
		},
		{
			selector: '.form-add',
			keyframes: [
				{ opacity: 0, transform: 'translateY(100px)' },
				{ opacity: 1, transform: 'translateY(0)' },
			],
			options: { duration: 600, easing: 'ease', fill: 'forwards' },
		},
		{
			selector: '.blog__aside',
			keyframes: [
				{ opacity: 0, transform: 'translateX(50px)' },
				{ opacity: 1, transform: 'translateX(0)' },
			],
			options: { duration: 600, easing: 'ease-out', fill: 'forwards' },
		},
	];

	// Запуск анимаций по конфигу
	animationsConfig.forEach(({ selector, keyframes, options, nextDelay }) => {
		document
			.querySelectorAll(selector)
			.forEach((el) => animateOnScroll(el, keyframes, options, nextDelay));
	});

	// Анимация карточек тарифов по каскаду
	const animateCardsCascade = (
		wrapperSelector,
		cardSelector,
		keyframes,
		options,
		delayStep = 200
	) => {
		const wrapper = document.querySelector(wrapperSelector);
		if (!wrapper) return;
	
		const observer = new IntersectionObserver(
			(entries, observer) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						const cards = wrapper.querySelectorAll(cardSelector);
						cards.forEach((card, index) => {
							// Анимация самой карточки
							card.animate(keyframes, {
								...options,
								delay: index * delayStep,
							});
							
							// Анимация плашки цены
							const price = card.querySelector('.card__price');
							if (price) {
								price.classList.remove('revial-price');
						
								setTimeout(() => {
									price.classList.add('revial-price');
						
									// Появление следующих блоков по каскаду
									const note = card.querySelector('.card__note');
									const list = card.querySelector('.card__list');
									const seo = card.querySelector('.card__seo');
									const order = card.querySelector('.card__order');
						
									const showElement = (el, delay) => {
										if (!el) return;
										el.style.opacity = 0;
										el.style.transform = 'translateY(20px)';
										el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
										setTimeout(() => {
											el.style.opacity = 1;
											el.style.transform = 'translateY(0)';
										}, delay);
									};
						
									showElement(note, 0);
									showElement(list, 100);
									showElement(seo, 200);
									showElement(order, 300);
						
								}, index * delayStep + 300); // +600 мс — окончание анимации ::after
							}
						});
	
						observer.unobserve(wrapper);
					}
				});
			},
			{ threshold: 0.2 }
		);
	
		observer.observe(wrapper);
	};
	

	// Вызов анимации карточек тарифов
	animateCardsCascade(
		'.tariffs__wrapper', // обёртка
		'.tariffs__card', // карточки
		[
			{ opacity: 0, transform: 'translateY(50px)' },
			{ opacity: 0.5, transform: 'translateY(-20px)' },
			{ opacity: 1, transform: 'translateY(0px)' },
		],
		{
			duration: 1000,
			easing: 'ease-out',
			fill: 'forwards',
		},
		150 // задержка между карточками
	);
});