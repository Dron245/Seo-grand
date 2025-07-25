'use strict';

// Различные скрипты - мой код Пядышев
document.addEventListener('DOMContentLoaded', function () {
	// Создание точек для кейсов
	document.querySelectorAll('.cases__item').forEach((caseItem) => {
		const tabs = caseItem.querySelectorAll('.tabs__element.tab2');
		const dotsContainer = caseItem.querySelector('.tabs__dots');
		const nextBtn = caseItem.querySelector('.tabs__next');
		const prevBtn = caseItem.querySelector('.tabs__prev');

		if (!tabs.length || !dotsContainer) return;

		dotsContainer.innerHTML = '';
		tabs.forEach((tab, i) => {
			const dot = document.createElement('div');
			dot.classList.add('tabs__dot');
			if (tab.classList.contains('active')) dot.classList.add('active');
			dotsContainer.appendChild(dot);
		});

		const dots = dotsContainer.querySelectorAll('.tabs__dot');

		let currentIndex = Array.from(tabs).findIndex((tab) =>
			tab.classList.contains('active')
		);

		function updateTabs(index) {
			tabs.forEach((tab, i) => {
				tab.classList.toggle('active', i === index);
			});
			dots.forEach((dot, i) => {
				dot.classList.toggle('active', i === index);
			});
			currentIndex = index;
		}

		// Кнопки
		nextBtn?.addEventListener('click', () => {
			let nextIndex = (currentIndex + 1) % tabs.length;
			updateTabs(nextIndex);
		});

		prevBtn?.addEventListener('click', () => {
			let prevIndex = (currentIndex - 1 + tabs.length) % tabs.length;
			updateTabs(prevIndex);
		});

		// Клики по точкам
		dots.forEach((dot, index) => {
			dot.addEventListener('click', () => {
				updateTabs(index);
			});
		});
	});
	if (document.querySelector('.example')) {
		document.documentElement.classList.add('example-header');
	}

	// Страница "Партнёры"

	//Плавное возвращение границ
	const itemsPartners = document.querySelectorAll('.partners__item');

	itemsPartners.forEach((item) => {
		let timeout;

		item.addEventListener('mouseenter', () => {
			clearTimeout(timeout); // отменяем отложенное снятие, если мышь вернулась
			item.classList.add('_hover');
		});

		item.addEventListener('mouseleave', () => {
			timeout = setTimeout(() => {
				item.classList.remove('_hover');
			}, 300); // 0.3 секунды
		});
	});

	// Минимальная ширина для выполнения всех функций
	const MIN_WIDTH = 1230.02;

	let resizeTimeout;

	// Обновление всех функций при загрузке и ресайзе
	function updateGridState() {
		if (window.innerWidth < MIN_WIDTH) return;

		markLastInRow();
		applyBottomRightRadius();
		updateTransformExceptions();
	}

	// Отметка последнего элемента в каждой строке
	function markLastInRow() {
		const grid = document.querySelector('.partners__list');
		if (!grid) return;

		const items = [...grid.children];

		const columnCount = getComputedStyle(grid)
			.gridTemplateColumns.split(' ')
			.filter((col) => col.trim() !== '').length;

		items.forEach((item) => item.classList.remove('last-in-row'));

		items.forEach((item, i) => {
			if ((i + 1) % columnCount === 0 || i === items.length - 1) {
				item.classList.add('last-in-row');
			}
		});
	}

	// Добавляет скругление правого нижнего угла у последнего элемента предпоследней строки,
	// если в последней строке меньше колонок, чем доступно (для визуального выравнивания).
	function applyBottomRightRadius() {
		const items = Array.from(
			document.querySelectorAll('.partners__list .partners__item')
		);
		const grid = document.querySelector('.partners__list');
		if (!grid || items.length === 0) return;

		const screenWidth = window.innerWidth;
		const columns = screenWidth <= 1650 ? 4 : 5;

		// Удаляем предыдущие классы
		items.forEach((item) => {
			item.classList.remove('rounded-bottom-right', 'before-rounded-hover');
		});

		const totalItems = items.length;
		const lastRowCount = totalItems % columns || columns;

		if (lastRowCount < columns) {
			const secondLastRowLastIndex = totalItems - lastRowCount - 1;

			if (secondLastRowLastIndex >= 0) {
				items[secondLastRowLastIndex].classList.add('rounded-bottom-right');

				// Назначаем предыдущему элементу класс
				if (secondLastRowLastIndex > 0) {
					items[secondLastRowLastIndex - 1].classList.add(
						'before-rounded-hover'
					);
				}
			}
		}
	}

	// Если в последней строке всего один элемент — добавляем класс исключения,
	// чтобы отключить transform-эффекты (например, сдвиг)
	function updateTransformExceptions() {
		const list = document.querySelector('.partners__list');
		if (!list) return;

		const items = Array.from(list.querySelectorAll('.partners__item'));
		if (!items.length) return;

		const columnCount = getComputedStyle(list)
			.gridTemplateColumns.split(' ')
			.filter((x) => x.trim() !== '').length;

		const lastRowCount = items.length % columnCount || columnCount;

		items.forEach((item) => item.classList.remove('single-in-row'));

		if (lastRowCount === 1) {
			items[items.length - 1].classList.add('single-in-row');
		}
	}

	// События загрузки и изменения размера окна
	window.addEventListener('load', updateGridState);
	window.addEventListener('resize', () => {
		clearTimeout(resizeTimeout);
		resizeTimeout = setTimeout(updateGridState, 200);
	});
});
