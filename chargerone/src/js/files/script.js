// Подключение функционала "Чертоги Фрилансера"
import { isMobile } from './functions.js';
// Подключение списка активных модулей
import { flsModules } from './modules.js';

document.addEventListener('DOMContentLoaded', () => {
	let isMobileView = window.innerWidth <= 768;

	window.addEventListener('resize', () => {
		const currentIsMobile = window.innerWidth <= 768;

		// Если режим поменялся — сброс всех раскрытых меню
		if (currentIsMobile !== isMobileView) {
			isMobileView = currentIsMobile;

			// Сброс всех submenu
			document.querySelectorAll('.menu__submenu-list').forEach((el) => {
				el.style.height = '';
				el.classList.remove('_submenu-open');
				const wrap = el.closest('.menu__item');
				if (wrap) wrap.classList.remove('_submenu-active');
			});

			// Сброс всех subsubmenu
			document.querySelectorAll('.subsubmenu__list').forEach((el) => {
				el.style.height = '';
				el.classList.remove('_sub-sub-menu-active');
				const wrap = el.closest('.menu__submenu-item');
				if (wrap) wrap.classList.remove('_sub-sub-active');
			});
		}
	});

	document.addEventListener('click', (e) => {
		const targetElement = e.target;
		console.log(targetElement);
		
		// ========== SUBSUBMENU: десктоп (hover по клику, >768) ==========
		if (window.innerWidth > 768 && targetElement.closest('.subsubmenu__top')) {
			const clickedTop = targetElement.closest('.subsubmenu__top');
			const submenu = clickedTop.nextElementSibling;
			const parentItem = clickedTop.closest('.menu__submenu-item');

			const isActive = submenu?.classList.contains('_sub-sub-menu-active');

			document.querySelectorAll('.subsubmenu__list._sub-sub-menu-active').forEach((el) => {
				el.classList.remove('_sub-sub-menu-active');
				const wrap = el.closest('.menu__submenu-item');
				if (wrap) wrap.classList.remove('_sub-sub-active');
			});

			if (!isActive) {
				submenu?.classList.add('_sub-sub-menu-active');
				parentItem?.classList.add('_sub-sub-active');
			}
		}

		// ========== SUBSUBMENU: мобильная версия ==========
		if (window.innerWidth <= 768 && targetElement.closest('.subsubmenu__top')) {
			const clickedTop = targetElement.closest('.subsubmenu__top');
			const submenu = clickedTop.nextElementSibling;
			const parentItem = clickedTop.closest('.menu__submenu-item');

			const isActive = submenu?.classList.contains('_sub-sub-menu-active');

			document.querySelectorAll('.subsubmenu__list._sub-sub-menu-active').forEach((el) => {
				if (el !== submenu) {
					el.classList.remove('_sub-sub-menu-active');
					el.style.height = '0px';
					const wrap = el.closest('.menu__submenu-item');
					if (wrap) wrap.classList.remove('_sub-sub-active');
				}
			});

			if (isActive) {
				submenu.classList.remove('_sub-sub-menu-active');
				submenu.style.height = '0px';
				parentItem?.classList.remove('_sub-sub-active');
			} else {
				submenu?.classList.add('_sub-sub-menu-active');
				submenu? submenu.style.height = submenu.scrollHeight + 'px' : null;
				parentItem?.classList.add('_sub-sub-active');
			}
		}

		// ========== SUBMENU: мобильная версия ==========
		if (window.innerWidth <= 768 && targetElement.closest('.menu__submenu-top')) {
			const clickedTop = targetElement.closest('.menu__submenu-top');
			const submenu = clickedTop.nextElementSibling;
			const parentItem = clickedTop.closest('.menu__item');

			const isOpen = submenu.classList.contains('_submenu-open');

			document.querySelectorAll('.menu__submenu-list._submenu-open').forEach((el) => {
				if (el !== submenu) {
					el.classList.remove('_submenu-open');
					el.style.height = '0px';
					const wrap = el.closest('.menu__item');
					if (wrap) wrap.classList.remove('_submenu-active');
				}
			});

			if (isOpen) {
				submenu.classList.remove('_submenu-open');
				submenu.style.height = '0px';
				parentItem?.classList.remove('_submenu-active');
			} else {
				submenu.classList.add('_submenu-open');
				submenu.style.height = submenu.scrollHeight + 'px';
				parentItem?.classList.add('_submenu-active');
			}
		}
	});
});
