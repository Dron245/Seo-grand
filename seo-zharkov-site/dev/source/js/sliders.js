'use strict';
//Слайдеры - мой код Пядышев
document.addEventListener('DOMContentLoaded', function () {
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
});