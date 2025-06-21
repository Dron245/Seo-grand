// Подключение функционала "Чертоги Фрилансера"
import { isMobile } from "./functions.js";
// Подключение списка активных модулей
import { flsModules } from "./modules.js";

window.addEventListener("DOMContentLoaded", () => {

	document.addEventListener("click", documentActions);

	function documentActions(e) {
		const targetElement = e.target;
		
		// Связывание пунктов меню и саб-меню в фильрах в каталоге в мобильной версии
		if (targetElement.closest("[data-parent]")) {
			const subMenuId = targetElement.closest("[data-parent]").dataset.parent;
			const subMenu = document.querySelector(`[data-submenu="${subMenuId}"]`);

			if (subMenu) {
				document.documentElement.classList.add("sub-menu-open");
				// Удаляем класс _sub-menu-open у всех подменю

				document.querySelectorAll(".menu-item-active").forEach(el => {
					el.classList.remove("menu-item-active");
				});
				document.querySelectorAll("[data-submenu]._sub-menu-open").forEach(el => {
					el.classList.remove("_sub-menu-open");
				});

				// Добавляем нужный класс только к текущему подменю
				// document.documentElement.classList.add("sub-menu-open");
				subMenu.classList.add("_sub-menu-open");
				targetElement.closest(".menu__item").classList.add("menu-item-active");
			}
			if (targetElement.closest(".submenu__back")) {
				document.documentElement.classList.remove("sub-menu-open");
				// Удаляем класс _sub-menu-open у всех подменю
				document.querySelectorAll(".menu-item-active").forEach(el => {
					el.classList.remove("menu-item-active");
				});
				document.querySelectorAll("[data-submenu]._sub-menu-open").forEach(el => {
					el.classList.remove("_sub-menu-open");
				});
				
			}
		}
		// Открытие меню в мобильном
		if (targetElement.closest(".header__button") && window.innerWidth <= 768) {
			document.documentElement.classList.toggle("menu-open");
		}

		//Работа кнопки "Назад"
		if (targetElement.closest(".submenu__back")) {
			document.documentElement.classList.remove("sub-menu-open");
			// Удаляем класс _sub-menu-open у всех подменю
			document.querySelectorAll(".menu-item-active").forEach(el => {
				el.classList.remove("menu-item-active");
			});
			document.querySelectorAll("[data-submenu]._sub-menu-open").forEach(el => {
				el.classList.remove("_sub-menu-open");
			});
		}
	}
});
