<div id="modules" class="g-modules bg_modules">

	<?php //include(locate_template('template-parts/bg-modules.php')); // Фон 
	?>

	<?php


	// Конструктор страниц
	if (have_rows($field_preffix_modules . 'building', $field_postfix)) :
		$rows = 1;
		// Циклы конструктора
		while (have_rows($field_preffix_modules . 'building', $field_postfix)) : the_row();
			$building_row = 'sec-' . $rows++;
			set_query_var('building_row', $building_row);

			// Баннеры-карточки
			if (get_row_layout() == 'banner-cart' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'banner-cart');
			}

			// Содержимое
			if (get_row_layout() == 'columns' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'columns');
			}

			// Крупное содержимое
			if (get_row_layout() == 'columns-big' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'columns-big');
			}

			// Буллиты
			if (get_row_layout() == 'bullets' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'bullets');
			}	// Буллиты-категории
			if (get_row_layout() == 'izol' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'izol');
			}

			// Ступени
			if (get_row_layout() == 'steps' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'steps');
			}

			// Списки
			if (get_row_layout() == 'lists' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'lists');
			}

			// Тарифы
			if (get_row_layout() == 'tariff' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'tariff');
			}

			// Карточки
			if (get_row_layout() == 'cards' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'cards');
			}

			// Спойлеры
			if (get_row_layout() == 'faq' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'spoiler');
			}

			// Файлы
			if (get_row_layout() == 'files' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'files');
			}

			// Директор
			if (get_row_layout() == 'boss' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'boss');
			}

			// Фото
			if (get_row_layout() == 'gallery' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'gallery');
			}

			// Видео
			if (get_row_layout() == 'videos' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'videos');
			}

			// Каталог
			if (get_row_layout() == 'catalog' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'catalog');
			}

			// Отзывы
			if (get_row_layout() == 'reviews' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'reviews');
			}

			// Партнёры
			if (get_row_layout() == 'partners' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'partners');
			}

			// Клиенты
			if (get_row_layout() == 'clients' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'clients');
			}

			// Кейсы
			if (get_row_layout() == 'cases' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'cases');
			}

			// Сотрудники
			if (get_row_layout() == 'team' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'team');
			}

			// FAQ
			if (get_row_layout() == 'faq-list' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'faq');
			}

			// Контакты
			if (get_row_layout() == 'contacts' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'contacts');
			}

			// Диалоги
			if (get_row_layout() == 'dialogs' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'dialogs');
			}

			// Произвольные блоки
			if (get_row_layout() == 'custom' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'custom');
			}

			// Произвольные секции
			if (get_row_layout() == 'custom-section' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'custom-section');
			}

			// Акции
			/*if( get_row_layout() == 'actions' ) {
				get_template_part('modules/section', 'actions');
			}*/

			// Акции
			if (get_row_layout() == 'promotion' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'promotion');
			}

			// Вакансии
			if (get_row_layout() == 'vacancy' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'vacancy');
			}

			// Форма
			if (get_row_layout() == 'form' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'form');
			}

			// Записи
			if (get_row_layout() == 'posts' && !in_array('hidden', get_sub_field('section-activity')['section-check'])) {
				get_template_part('modules/section', 'posts');
			}

		endwhile;
	endif;
	?>

</div>