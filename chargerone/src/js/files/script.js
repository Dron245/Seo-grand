// Подключение функционала "Чертоги Фрилансера"
import { isMobile } from './functions.js';
// Подключение списка активных модулей
import { flsModules } from './modules.js';
document.addEventListener('DOMContentLoaded', () => {
	document.addEventListener('click', documentActions);

	function documentActions(e) {
		const targetElement = e.target;
		console.log(targetElement);

		let isMobileView = window.innerWidth <= 768;

		window.addEventListener('resize', () => {
			const currentIsMobile = window.innerWidth <= 768;

			// Если сменился режим (моб/десктоп)
			if (currentIsMobile !== isMobileView) {
				isMobileView = currentIsMobile;

				// Сброс всех раскрытых сабменю
				document.querySelectorAll('.subsubmenu__list').forEach((el) => {
					el.style.height = '';
					el.classList.remove('_sub-sub-menu-active');

					const parentItem = el.closest('.menu__submenu-item');
					if (parentItem) {
						parentItem.classList.remove('_sub-sub-active');
					}
				});
			}
		});
		if (window.innerWidth > 768 && targetElement.closest('.subsubmenu__top')) {
			const clickedTop = targetElement.closest('.subsubmenu__top');
			const submenu = clickedTop.nextElementSibling;
			const isActive = submenu
				? submenu.classList.contains('_sub-sub-menu-active')
				: null;
			document.querySelectorAll('.subsubmenu__top').forEach((el) => {
				// el.classList.remove('_sub-sub-menu-active');
				if (el.nextElementSibling) {
					el.nextElementSibling.classList.remove('_sub-sub-menu-active');
				}
			});
			if (!isActive) {
				submenu ? submenu.classList.add('_sub-sub-menu-active') : null;
			}
		}

		if (window.innerWidth <= 768 && targetElement.closest('.subsubmenu__top')) {
			const clickedTop = targetElement.closest('.subsubmenu__top');
			const submenu = clickedTop.nextElementSibling;

			// Закрытие всех активных
			document
				.querySelectorAll('.subsubmenu__list._sub-sub-menu-active')
				.forEach((openList) => {
					if (openList !== submenu) {
						openList.classList.remove('_sub-sub-menu-active');
						openList.style.height = 0;
					}
					const parentItem = openList.closest('.menu__submenu-item');
					if (parentItem) {
						parentItem.classList.remove('_sub-sub-active');
					}
				});

			// Переключение текущего
			const isActive = submenu
				? submenu.classList.contains('_sub-sub-menu-active')
				: null;
			if (isActive) {
				submenu.classList.remove('_sub-sub-menu-active');
				clickedTop
					.closest('.menu__submenu-item')
					.classList.remove('_sub-sub-active');

				submenu.style.height = 0;
			} else {
				submenu ? submenu.classList.add('_sub-sub-menu-active') : null;
				clickedTop
					.closest('.menu__submenu-item')
					.classList.add('_sub-sub-active');
				// Плавное открытие: измерим scrollHeight
				const fullHeight = submenu.scrollHeight;
				submenu.style.height = fullHeight + 'px';
			}
		}

		// Только для ширины до 768px и при клике на .menu__submenu-top
		if (
			window.innerWidth <= 768 &&
			targetElement.closest('.menu__submenu-top')
		) {
			const clickedTop = targetElement.closest('.menu__submenu-top');
			const submenu = clickedTop.nextElementSibling; // .menu__submenu-list
			const parentItem = clickedTop.closest('.menu__item');

			const isOpen = submenu.classList.contains('_submenu-open');

			// Закрыть все открытые
			document
				.querySelectorAll('.menu__submenu-list._submenu-open')
				.forEach((el) => {
					if (el !== submenu) {
						el.classList.remove('_submenu-open');
						el.style.height = 0;

						const wrap = el.closest('.menu__item');
						if (wrap) wrap.classList.remove('_submenu-active');
					}
				});

			if (isOpen) {
				// Закрытие текущего
				submenu.classList.remove('_submenu-open');
				submenu.style.height = 0;
				parentItem.classList.remove('_submenu-active');
			} else {
				// Открытие текущего
				submenu.classList.add('_submenu-open');
				const fullHeight = submenu.scrollHeight;
				submenu.style.height = fullHeight + 'px';
				parentItem.classList.add('_submenu-active');
			}
		}
	}
});
