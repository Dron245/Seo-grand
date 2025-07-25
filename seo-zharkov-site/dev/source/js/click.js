'use strict';
//Обработчик клоиков - мой код Пядышев
document.addEventListener('DOMContentLoaded', function () {
	document.addEventListener('click', documentActions);

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
});