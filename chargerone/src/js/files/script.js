// Подключение функционала "Чертоги Фрилансера"
import { isMobile } from "./functions.js";
// Подключение списка активных модулей
import { flsModules } from "./modules.js";
document.addEventListener("DOMContentLoaded", () => {
	document.addEventListener("click", documentActions);

	function documentActions(e) {
		const targetElement = e.target;
		console.log(targetElement);
		if(targetElement.closest('.subsubmenu__top')) {
			targetElement.closest('.subsubmenu__top').nextElementSibling.classList.toggle('_sub-sub-menu-active');
		}
	}
})
