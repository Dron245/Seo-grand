"use strict";
document.addEventListener("DOMContentLoaded", function () {
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
			selector: "h2",
			keyframes: [
				{ opacity: 0, transform: "translateY(50px)" },
				{ opacity: 1, transform: "translateY(0)" },
			],
			options: { duration: 600, easing: "ease", fill: "forwards" },
			nextDelay: 200,
		},
		{
			selector: ".form-add",
			keyframes: [
				{ opacity: 0, transform: "translateY(100px)" },
				{ opacity: 1, transform: "translateY(0)" },
			],
			options: { duration: 600, easing: "ease", fill: "forwards" },
		},
		{
			selector: ".blog__aside",
			keyframes: [
				{ opacity: 0, transform: "translateX(50px)" },
				{ opacity: 1, transform: "translateX(0)" },
			],
			options: { duration: 600, easing: "ease-out", fill: "forwards" },
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
							const price = card.querySelector(".card__price");
							if (price) {
								price.classList.remove("revial-price");

								setTimeout(
									() => {
										price.classList.add("revial-price");

										// Появление следующих блоков по каскаду
										const note = card.querySelector(".card__note");
										const list = card.querySelector(".card__list");
										const seo = card.querySelector(".card__seo");
										const order = card.querySelector(".card__order");

										const showElement = (el, delay) => {
											if (!el) return;
											el.style.opacity = 0;
											el.style.transform = "translateY(20px)";
											el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
											setTimeout(() => {
												el.style.opacity = 1;
												el.style.transform = "translateY(0)";
											}, delay);
										};

										showElement(note, 0);
										showElement(list, 100);
										showElement(seo, 200);
										showElement(order, 300);
									},
									index * delayStep + 300
								); // +600 мс — окончание анимации ::after
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
				{ opacity: 0, transform: "translateY(50px)" },
				{ opacity: 0.5, transform: "translateY(-20px)" },
				{ opacity: 1, transform: "translateY(0px)" },
			],
			{
				duration: 1000,
				easing: "ease-out",
				fill: "forwards",
			},
			150 // задержка между карточками
		);
	}

	// Вызов анимации карточек тарифов
	runCascade(".tariffs__wrapper", ".tariffs__card");

	// Вызов анимации карточек кейсов
	runCascade(".cases__wrapper", ".cases__slide");

	// Анимация кейсов (второй блок)
	runCascade(".cases__slider2", ".cases__slide2");

	// Анимация табов
	runCascade(".options--seo", ".options__item");

	// Анимация блока "Команда"
	runCascade(".team__list", ".team__item");
});