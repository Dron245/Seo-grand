// Подключение функционала "Чертоги Фрилансера"
import { isMobile } from "./functions.js";
// Подключение списка активных модулей
import { flsModules } from "./modules.js";
document.addEventListener("DOMContentLoaded", () => {
	document.addEventListener("click", documentActions);

	function documentActions(e) {
		const targetElement = e.target;
		console.log(targetElement);
		if (targetElement.closest(".subsubmenu__top")) {
			const clickedTop = targetElement.closest(".subsubmenu__top");
			const submenu = clickedTop.nextElementSibling;
			const isActive = submenu.classList.contains("_sub-sub-menu-active");
			document.querySelectorAll(".subsubmenu__top").forEach((el) => {
				// el.classList.remove('_sub-sub-menu-active');
				el.nextElementSibling.classList.remove("_sub-sub-menu-active");
			});
			if (!isActive) {
				submenu.classList.add("_sub-sub-menu-active");
			}
		}
	}
});
