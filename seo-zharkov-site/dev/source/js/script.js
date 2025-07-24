'use strict';

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

	// Функция расчёта высоты блока текста для страницы "Карьера"
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
		// console.log(targetElement);

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

	// Создание точек
	document.querySelectorAll('.cases__item').forEach((caseItem) => {
		const tabs = caseItem.querySelectorAll('.tabs__element.tab2');
		const dotsContainer = caseItem.querySelector('.tabs__dots');
		const nextBtn = caseItem.querySelector('.tabs__next');
		const prevBtn = caseItem.querySelector('.tabs__prev');

		if (!tabs.length || !dotsContainer) return;
		
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

	// Страница "Партнёры"

	//Плавное возвращение границ
	const itemsPartners = document.querySelectorAll('.partners__item');

	itemsPartners.forEach((item) => {
		let timeout;

		item.addEventListener('mouseenter', () => {
			clearTimeout(timeout); // отменяем отложенное снятие, если мышь вернулась
			item.classList.add('_hover');
		});

		item.addEventListener('mouseleave', () => {
			timeout = setTimeout(() => {
				item.classList.remove('_hover');
			}, 300); // 0.3 секунды
		});
	});

	// Минимальная ширина для выполнения всех функций
	const MIN_WIDTH = 1230.02;

	let resizeTimeout;

	// Обновление всех функций при загрузке и ресайзе
	function updateGridState() {
		if (window.innerWidth < MIN_WIDTH) return;

		markLastInRow();
		applyBottomRightRadius();
		updateTransformExceptions();
	}

	// Отметка последнего элемента в каждой строке
	function markLastInRow() {
		const grid = document.querySelector('.partners__list');
		if (!grid) return;

		const items = [...grid.children];

		const columnCount = getComputedStyle(grid)
			.gridTemplateColumns.split(' ')
			.filter((col) => col.trim() !== '').length;

		items.forEach((item) => item.classList.remove('last-in-row'));

		items.forEach((item, i) => {
			if ((i + 1) % columnCount === 0 || i === items.length - 1) {
				item.classList.add('last-in-row');
			}
		});
	}

	// Добавляет скругление правого нижнего угла у последнего элемента предпоследней строки,
	// если в последней строке меньше колонок, чем доступно (для визуального выравнивания).
	function applyBottomRightRadius() {
		const items = Array.from(document.querySelectorAll('.partners__list .partners__item'));
		const grid = document.querySelector('.partners__list');
		if (!grid || items.length === 0) return;
	
		const screenWidth = window.innerWidth;
		const columns = screenWidth <= 1650 ? 4 : 5;
	
		// Удаляем предыдущие классы
		items.forEach(item => {
			item.classList.remove('rounded-bottom-right', 'before-rounded-hover');
		});
	
		const totalItems = items.length;
		const lastRowCount = totalItems % columns || columns;
	
		if (lastRowCount < columns) {
			const secondLastRowLastIndex = totalItems - lastRowCount - 1;
	
			if (secondLastRowLastIndex >= 0) {
				items[secondLastRowLastIndex].classList.add('rounded-bottom-right');
	
				// Назначаем предыдущему элементу класс
				if (secondLastRowLastIndex > 0) {
					items[secondLastRowLastIndex - 1].classList.add('before-rounded-hover');
				}
			}
		}
	}
	

	// Если в последней строке всего один элемент — добавляем класс исключения,
	// чтобы отключить transform-эффекты (например, сдвиг)
	function updateTransformExceptions() {
		const list = document.querySelector('.partners__list');
		if (!list) return;

		const items = Array.from(list.querySelectorAll('.partners__item'));
		if (!items.length) return;

		const columnCount = getComputedStyle(list)
			.gridTemplateColumns.split(' ')
			.filter((x) => x.trim() !== '').length;

		const lastRowCount = items.length % columnCount || columnCount;

		items.forEach((item) => item.classList.remove('single-in-row'));

		if (lastRowCount === 1) {
			items[items.length - 1].classList.add('single-in-row');
		}
	}

	// События загрузки и изменения размера окна
	window.addEventListener('load', updateGridState);
	window.addEventListener('resize', () => {
		clearTimeout(resizeTimeout);
		resizeTimeout = setTimeout(updateGridState, 200);
	});

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
										el.style.transition =
											'opacity 0.6s ease, transform 0.6s ease';
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
