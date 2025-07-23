//Неподвижная граница у последнего элемента в строке
	// function updateGridLines() {
	// 	const list = document.querySelector('.partners__list');
	// 	if (!list) return;
	 
	// 	list.querySelectorAll('.grid-line').forEach(el => el.remove());
	 
	// 	const items = Array.from(list.querySelectorAll('.partners__item'));
	// 	if (!items.length) return;
	 
	// 	const computedStyle = window.getComputedStyle(list);
	// 	const columnCount = computedStyle.gridTemplateColumns
	// 	  .split(' ')
	// 	  .filter(x => x.trim() !== '').length;
	 
	// 	const rowCount = Math.ceil(items.length / columnCount);
	// 	const lastRowCount = items.length % columnCount || columnCount;
	 
	// 	const screenWidth = window.innerWidth;
	 
	// 	for (let i = 0; i < rowCount; i++) {
	// 	  const span = document.createElement('span');
	// 	  span.classList.add('partners__grid-line');
	// 	  span.style.position = 'absolute';
	// 	  span.style.right = '1px';
	// 	  span.style.width = '1px';
	// 	  span.style.height = '292px';
	// 	  span.style.backgroundColor = '#e4eeea';
	// 	  span.style.zIndex = '1';
	 
	// 	  // Вычисление top со сдвигами
	// 	  let top = i * 292;
	 
	// 	  if (i === 0) {
	// 		 top = 7; // первая строка
	// 	  } else if (i === rowCount - 1) {
	// 		 top -= 7; // последняя строка
	// 	  } else if (
	// 		 i === rowCount - 2 &&
	// 		 (lastRowCount < 5 || (screenWidth <= 1650 && lastRowCount < 4))
	// 	  ) {
	// 		 top -= 7; // предпоследняя строка (если условия верны)
	// 	  }
	 
	// 	  span.style.top = `${top}px`;
	 
	// 	  // right отступ у последнего span
	// 	  if (i === rowCount - 1) {
	// 		 const rightOffset = lastRowCount * 292 - 292;
	// 		 span.style.right = `${rightOffset}px`;
	// 	  }
	 
	// 	  list.appendChild(span);
	//  }}
	 
	//  window.addEventListener('load', updateGridLines);
	//  window.addEventListener('resize', () => {
	// 	clearTimeout(window._resizeTimeout);
	// 	window._resizeTimeout = setTimeout(updateGridLines, 150);
	//  });
	 
	//  //Поиск последнего partners__item в partners__list
	//  function markLastPartnerItem() {
	// 	const list = document.querySelector('.partners__list');
	// 	const items = list?.querySelectorAll('.partners__item');
	// 	if (!items?.length) return;
	 
	// 	// Удалим старый класс, если был
	// 	items.forEach(item => item.classList.remove('is-last'));
	 
	// 	// Последнему — добавим класс
	// 	items[items.length - 1].classList.add('is-last');
	//  }
	 
	//  window.addEventListener('load', () => {
	// 	markLastPartnerItem();  // назначение скругления
	//  });
	 
	//  window.addEventListener('resize', () => {
	// 	clearTimeout(window._resizeTimeout);
	// 	window._resizeTimeout = setTimeout(() => {
	// 	  markLastPartnerItem();
	// 	}, 150);
	//  });