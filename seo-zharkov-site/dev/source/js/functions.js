//Вспомогательные функции - мой код Пядышев
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