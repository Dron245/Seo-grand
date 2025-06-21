window.addEventListener("DOMContentLoaded", () => {
	document.addEventListener("click", documentActions);
	function documentActions(e) {
		const targetElement = e.target;
		if (targetElement.classList.contains('open_form')) {
			document.body.classList.add('menu-is-opened');
		}
	}
});
