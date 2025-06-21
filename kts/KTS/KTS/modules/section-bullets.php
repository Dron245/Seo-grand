<?php
if (in_array('noindex', get_sub_field('section-activity')['section-check'])) {
	echo '<noindex>';
}
?>
<?php
$type = get_sub_field('style')['type'];

//	Тип кнопки
$btn_type = get_sub_field('style')['btn-type'];

//	Цвет фона
$bg_color = get_sub_field('style')['bg_color'];
$bg_color_color = '';
if ($bg_color != 'style-bg-none') {
	$bg_color_color = "bg-color";
}

//	Цвет фона буллитов
$itembg_color = get_sub_field('style')['item-bg-color'];

// Дополнительный класс
$add_class = get_sub_field('style')['class'];

// Проверка и вывод классов оформления секции
$design_arr = get_sub_field('style')['design'];				// массив блока Внешний вид
$design = "";
if ($design_arr) {
	foreach ($design_arr as $design_key) {
		$design .= ' design-' . $design_key;
	}
}

$design_full 	= in_array('full', $design_arr);	// картинка без обрезки
$design_square 	= in_array('square', $design_arr);	// квадратная картинка
$design_circle 	= in_array('circle', $design_arr);	// круглая картинка
$design_text 	= in_array('text', $design_arr);	// текст в картинке

if ($design_full) {
	$design_size_img = "team";
} elseif ($design_square || $design_circle) {
	$design_size_img = "item-circle";
} else {
	$design_size_img = "item";
}

// Расположение буллитов на мобильных
$general_style = get_field('general-style', 'option');
$design_oneCol = in_array('one-col', $design_arr);
$design_oneRow = in_array('one-row', $design_arr);


if ($design_oneCol || in_array('bullet-xs-one', $general_style)) {
	$mobile_row = 'one-col';
	$mobile_col = 'col-12';
} elseif ($design_oneRow || in_array('bullet-xs-slide', $general_style)) {
	$mobile_row = 'row-slide';
	$mobile_col = 'col-slide';
} else {
	$mobile_row = '';
	$mobile_col = 'col-6';
}


// Общее количество буллитов
$count_rep = get_sub_field( 'repeater' ) ;
if (is_countable($count_rep)){
    $count = count( $count_rep);
}else{
    $count = 0;
}

switch (0) {
	case ($count - 4):
    case ($count) :
		$bullets_col = '4';
		break;
	case ($count - 3):
		$bullets_col = '3';
		break;
	case ($count - 2):
		$bullets_col = '2';
		break;
	case ($count - 1):
		$bullets_col = '1';
		break;
	case ($count % 5):
	case (($count + 1) % 5):
		$bullets_col = '5';
		break;
	case ($count % 4):
	case (($count + 1) % 4):
		$bullets_col = '4';
		break;
	case ($count % 3):
	case (($count + 1) % 3):
		$bullets_col = '3';
		break;
	case ($count % 2):
	case (($count + 1) % 2):
		$bullets_col = '2';
		break;
}
?>
<section id="<?php echo $building_row; ?>" class="bullets bullets-<?php echo $type; ?> <?php echo $bg_color_color . ' ' . $bg_color; ?> <?php echo $design; ?> <?php echo $itembg_color; ?> <?php echo $add_class; ?> ">
	<div class="container-fluid">
		<div class="header-wrap">
			<?php if (get_sub_field('header')) { ?>
				<div class="header list">
					<?php the_sub_field('header'); ?>
				</div>

				<?php if ($type == 'history') { ?>
					<div class="bullets-history-arrow"></div>
				<?php } ?>

			<?php } ?>
		</div>

		<div class="<?php echo ($type == 'history') ? "slider js-slider" : "row"; ?> <?php echo $mobile_row; ?> <?php echo 'bullets_col-' . $bullets_col; ?> bullets-row">
			<?php
			$item_num = 0;

			while (have_rows('repeater')) : the_row();
				$item_num++;
				$image = get_sub_field('icon');
				$gallery_arr = get_sub_field('gallery');
				$num = get_sub_field('num');
				$head = get_preg_field('head', 1);
				$desc = get_sub_field('desk');

				if ($image) {
					if ($image['alt']) {
						$alt = strip_tags($head);
					} else {
						$alt = $image['alt'];
					}
				}

				// Ссылки и кнопки
				$links = get_sub_field('link-block');
				//print("<pre>".print_r(array_filter($links),true)."</pre>");

				$link_catalog = $links['catalog'];
				$link_product = $links['product'];
				$link_tax = $links['tax'];
				$link_tax_detali = $links['tax_detali'];
				$link_page = $links['page'];
				$link_link = $links['link']; // произвольная ссылка
				$link_btn = $links['btn'];
				$link_name = $links['name'];

				// Если массив ссылок пуст, выводим просто div
				if (!empty(array_filter($links)) && (empty($btn_type) || $btn_type != 'none')) {
					// Если это всплывающее окно
					if ($link_btn) {
						$content_item = 'data-fancybox data-src="#popup-' . $link_btn . '"';
						$tag_item = 'div';
						// Если ссылка
					} else {
						if ($link_link) {
							$link_item = $link_link;
							$target_item = 'target="_blank"';
							// Ссылка на страницу
						} elseif ($link_page) {
							$link_item = get_permalink($link_page);
							// Ссылка на категорию каталога
						} elseif ($link_catalog) {
							$link_item = get_term_link($link_catalog);
							// Ссылка на таксономию изоляции
						} elseif ($link_tax) {
							$link_item = get_term_link($link_tax);
							// Ссылка на таксономию деталей
						} elseif ($link_tax_detali) {
							$link_item = get_term_link($link_tax_detali);
							// Ссылка на товар
						} elseif ($link_product) {
							$link_item = get_permalink($link_product);
						}
						$content_item = 'href="' . $link_item . '" ' . $target_item;

						if ($btn_type == 'hidden') {
							$tag_item = 'div';
						} else {
							$tag_item = 'a';
						}
					}
				} else {
					$link_item = '';
					$target_item = '';
					$content_item = '';
					$tag_item = 'div';
				}

				if ($link_name) {
					$link_name = $link_name;
				} else {
					// Название кнопки, если она есть
					if ($link_btn) {
						switch ($link_btn) {
							case 'call':
								$link_name = "Заказать звонок";
								break;
							case 'consultation':
								$link_name = "Получить консультацию";
								break;
							case 'order':
								$link_name = "Оставить заявку";
								break;
							case 'price':
								$link_name = "Уточнить стоимость";
								break;
							case 'question':
								$link_name = "Задать вопрос";
								break;
							case 'lead':
								$link_name = "Записаться";
								break;
							case 'action':
								$link_name = "Участвовать";
								break;
						}
					} else {
						$link_name = 'Подробнее';
					}
				}

				//	Проверим, крупные ли блоки
				if ($type == 'history') {
					$count_class = "col-item";
				} else {

					if (in_array('big', $design_arr)) {
						if ($count == 2) {
							$count_class = "col-sm-6 col-12";
						} elseif ($count % 6 == 0) {
							$count_class = "col-md-6 col-sm-12 col-12";
						} elseif ($count % 5 == 0) {
							$count_class = "col-lg-4 col-md-6 col-sm-12 col-12";
						} elseif ($count % 4 == 0) {
							$count_class = "col-ml-6 col-md-6 col-sm-12 col-12";
						} else {
							$count_class = "col-ml-4 col-md-6 col-sm-12 col-12";
						}
						//	Проверим, мелкие ли блоки
					} elseif (in_array('small', $design_arr)) {
						if ($count == 2) {
							$count_class = "col-md-4 $mobile_col";
						} elseif ($count % 6 == 0) {
							$count_class = "col-ml-2 col-md-3 col-sm-4 $mobile_col";
						} elseif ($count == 5 || $count == 10) {
							$count_class = "col-ml-25 col-md-4 col-sm-4 $mobile_col";
						} else {
							$count_class = "col-ml-3 col-sm-4 col-6 $mobile_col";
						}
					} else {
						if ($count == 2) {
							$count_class = "col-sm-6 $mobile_col";
						} elseif ($count % 5 == 0) {
							$count_class = "col-ml-25 col-md-4 col-sm-6 $mobile_col";
						} elseif ($count % 4 == 0) {
							$count_class = "col-ml-3 col-md-6 col-sm-6 $mobile_col";
						} elseif ($count == 1) {
							$count_class = "col-md-6 $mobile_col";
						} else {
							$count_class = "col-ml-4 col-md-4 col-sm-6 $mobile_col";
						}
					}
				}

				//	Адаптивное изображение
				$imageSize = $design_size_img;
				include(locate_template('template-parts/lazy-image-responsive-IE.php'));

			?>
				<div class="<?php echo $count_class; ?> col bul <?php echo (empty($head) && empty($desc)) ? "not_body" : ""; ?> <?php echo 'btn-type-' . $btn_type; ?>">

				<?php if (($btn_type == 'hidden') && !empty(array_filter($links)) && (empty($btn_type) || $btn_type != 'none')) { ?>
					<a href="<?php echo $link_item; ?>" class="item autoheight">
				<?php } else { ?>
					<div class="item autoheight">
				<?php } ?>

						<div class="item-content">
							<?php // Картинка
							?>
							<?php if (($type == 'image') && ($image)) { ?>
								<<?php echo $tag_item; ?> <?php echo $content_item; ?> class="image">
									<div class="lazy-image" <?php echo $imageStyle; ?>>
										<div class=" progressive replace" data-href="<?php echo $image['sizes'][$design_size_img]; ?>">
											<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" class="preview" alt="<?php echo $alt; ?>" />
										</div>
									</div>
								</<?php echo $tag_item; ?>>
							<?php } ?>

							<?php // Слайдер
							?>
							<?php if (($type == 'slider')) { ?>
								<div data-src="<?php echo $gallery_arr[0]['url']; ?>" class="bul-gallery <?php echo $gallery_arr ? "bul-gallery-slider" : ""; ?>" data-fancybox='images-<?php echo $building_row . '-' . $item_num; ?>'>
									<?php
									$item_image = 0;
									foreach ($gallery_arr as $image) :
										$item_image++;
										if ($item_image == 1) {
									?>
											<img src="<? echo $image["sizes"][$design_size_img]; ?>" alt="<?php echo $alt; ?>" />
										<?php
										} else {
										?>
											<a href="<?php echo $image['url']; ?>" class="image" data-fancybox='images-<?php echo $building_row . '-' . $item_num; ?>'>
												<img src="<? echo $image["sizes"][$design_size_img]; ?>" alt="<?php echo strip_tags($head); ?>" />
											</a>
									<?php
										}
									endforeach;
									?>
								</div>
							<?php } ?>

							<?php // Иконка
							?>
							<?php if (($type == 'icon') && ($image)) { ?>
								<div class="icon">
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $alt; ?>">
								</div>
							<?php } ?>

							<?php // Клиенты
							?>
							<?php if (($type == 'clients') && ($image)) { ?>
								<div class="icon">
									<img src="<?php echo $image['url']; ?>" alt="<?php echo $alt; ?>">
								</div>
							<?php } ?>

							<?php // Цифры
							?>
							<?php if ($type == 'nums' && ($num)) { ?>
								<div class="num">
									<?php echo $num; ?>
								</div>
							<?php } ?>

							<?php // История
							?>
							<?php if ($type == 'history' && ($num)) { ?>
								<div class="num">
									<?php echo $num; ?>
								</div>
							<?php } ?>

							<?php // Этапы
							?>
							<?php if ($type == 'steps') { ?>
								<div class="step-num">
									<?php echo sprintf("%02d", $item_num); ?>
									<?php if (in_array('wave', $design_arr)) { ?>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 430.41 24.98">
											<path class="cls-1" d="M.2 24l5.88-1.19" />
											<path d="M17.89 20.49C84.52 7.76 148.76 1 215.2 1c67.16 0 135.16 7.15 203.22 20.61" stroke-dasharray="12.03 12.03" fill="none" stroke-miterlimit="10" stroke-width="2" />
											<path class="cls-1" d="M424.32 22.79L430.2 24" />
										</svg>
									<?php } ?>
								</div>
							<?php } ?>

							<?php // Плюс
							?>
							<?php if ($type == 'plus') { ?>
								<div class="plus">
									<svg viewBox="0 0 24 24">
										<path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z"></path>
									</svg>
								</div>
							<?php } ?>

							<?php if ($head || $desc) { ?>
								<div class="body">
									<?php if ($head) { ?>
										<<?php echo $tag_item; ?> <?php echo $content_item; ?> class="head <?php echo $desc ? "" : "not-margin"; ?>">
											<?php echo predlog($head); ?>
										</<?php echo $tag_item; ?>>
									<?php } ?>

									<?php if ($desc) { ?>
										<div class="desc list">
											<?php echo $desc; ?>
										</div>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
						
					<?php if (($btn_type != 'none') && ($btn_type != 'hidden') && (!empty(array_filter($links)))) { ?>
						<div class="button">
							<<?php echo $tag_item; ?> <?php echo $content_item; ?> class="<?php echo $btn_type; ?>">
								<span><?php echo $link_name; ?></span>
							</<?php echo $tag_item; ?>>
						</div>
					<?php } ?>

				<?php if (($btn_type == 'hidden') && !empty(array_filter($links)) && (empty($btn_type) || $btn_type != 'none')) { ?>
					</a>
				<?php } else { ?>
					</div>
				<?php } ?>

			<?php //Если выбраны "Шаги"
			?>
			<?php if (($type == 'steps') && ($item_num == $count) && in_array('wave', $design_arr)) { ?>
				<div id="check">
					<svg viewBox="0 0 24 24">
						<path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z"></path>
					</svg>
				</div>
			<?php } ?>

		</div>
	<?php
			endwhile;
			wp_reset_query();
	?>
	</div>

	<?php if (get_sub_field('footer')) { ?>
		<div class="footer list">
			<?php the_sub_field('footer'); ?>
		</div>
	<?php } ?>

	</div>
</section>
<?php
if (in_array('noindex', get_sub_field('section-activity')['section-check'])) {
	echo '</noindex>';
}
?>