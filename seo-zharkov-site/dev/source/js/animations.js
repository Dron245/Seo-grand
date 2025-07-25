'use strict';
document.addEventListener('DOMContentLoaded', function () {
	//Анимации - мой код Пядышев
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

	// Конфигурация для анимаций заголовков
	const animationsConfig = [
		// {
		// 	selector: 'h1',
		// 	keyframes: [
		// 		{ opacity: 0, transform: 'translateY(50px)' },
		// 		{ opacity: 1, transform: 'translateY(0)' },
		// 	],
		// 	options: { duration: 600, easing: 'ease', fill: 'forwards' },
		// 	nextDelay: 200,
		// },
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

							// Анимация плашки цены на главной в тарифах
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

	// Универсальная функция для запуска анимации с заранее заданными параметрами
	function runCascade(wrapperSelector, itemSelector) {
		animateCardsCascade(
			wrapperSelector, // обёртка
			itemSelector, // карточки
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
	}

	// Вызов анимации карточек тарифов
	runCascade('.tariffs__wrapper', '.tariffs__card');

	// Вызов анимации карточек кейсов
	runCascade('.cases__wrapper', '.cases__slide');

	// Анимация кейсов (второй блок)
	runCascade('.cases__slider2', '.cases__slide2');

	// Анимация табов
	runCascade('.options--seo', '.options__item');

	// Анимация блока "Команда"
	runCascade('.team__list', '.team__item');

	function splitHeadingByLines(headingSelector) {
		const headings = document.querySelectorAll(headingSelector);

		headings.forEach((originalHeading) => {
			// Сохраняем оригинальный текст
			const text = originalHeading.textContent;
			originalHeading.innerHTML = '';

			// Временный span для замеров
			const tempSpan = document.createElement('span');
			console.log(tempSpan);
			tempSpan.style.visibility = 'hidden';
			// tempSpan.style.whiteSpace = 'nowrap';
			tempSpan.style.whiteSpace = 'normal';
			tempSpan.style.position = 'absolute';
			tempSpan.style.left = '-9999px'; // чтобы не влиял на layout
			originalHeading.appendChild(tempSpan);

			const words = text.trim().split(/\s+/);

			let lines = [];
			let currentLine = '';
			let lastOffsetTop = null;

			words.forEach((word, index) => {
				tempSpan.textContent = currentLine + (currentLine ? ' ' : '') + word;
				const currentOffsetTop = tempSpan.offsetTop;

				if (lastOffsetTop === null) {
					lastOffsetTop = currentOffsetTop;
				}

				if (currentOffsetTop !== lastOffsetTop) {
					lines.push(currentLine);
					currentLine = word;
					lastOffsetTop = currentOffsetTop;
				} else {
					currentLine += (currentLine ? ' ' : '') + word;
				}

				if (index === words.length - 1) {
					lines.push(currentLine);
				}
			});

			originalHeading.innerHTML = '';

			lines.forEach((line, i) => {
				const lineSpan = document.createElement('span');
				lineSpan.textContent = line;
				lineSpan.style.display = 'inline-block';

				// Начальные стили для анимации чётных строк
				if ((i + 1) % 2 === 0) {
					lineSpan.style.opacity = '0';
					lineSpan.style.transform = 'translateY(50%)';
				}

				originalHeading.appendChild(lineSpan);
				if (i !== lines.length - 1) {
					originalHeading.appendChild(document.createElement('br'));
				}
			});

			// Запускаем анимацию для чётных строк с задержкой каскадом
			const evenSpans = originalHeading.querySelectorAll(
				'span:nth-child(even)'
			);
			evenSpans.forEach((span, idx) => {
				span.animate(
					[
						{ opacity: 0, transform: 'translateY(50%)' },
						{ opacity: 1, transform: 'translateY(0)' },
					],
					{
						duration: 600,
						easing: 'ease',
						fill: 'forwards',
						delay: idx * 200, // каскадная задержка
					}
				);
			});
		});
	}

	function applyHeadingSplitting(selector) {
		splitHeadingByLines(selector);
		window.addEventListener('resize', () => {
			document.querySelectorAll(selector).forEach((h) => {
				h.innerHTML = h.textContent;
			});
			splitHeadingByLines(selector);
		});
	}

	applyHeadingSplitting('h1');
});
