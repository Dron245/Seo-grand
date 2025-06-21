<?php
$page_ID_contacts = get_page_by_title('Контакты')->ID; // ID страницы контактов
$page_ID_current = get_the_ID(); // ID текущей страницы

if ($page_ID_contacts == $page_ID_current) {
?>

	<section id="contacts" class="contacts-page">
		<div class="container-fluid">
			<div class="header">
				<h1><?php the_title(); ?> <?php if (is_plugin_active('multycity/multycity.php')) {
												echo do_shortcode('[city_gde]');
											} ?></h1>
			</div>
		</div>

	<?php } else { ?>

		<section id="contacts">

		<?php } ?>

		<div class="container-fluid">
			<div class="contact-row">
				<div class="left left-wrap">

					<?php if ($page_ID_contacts != $page_ID_current) { ?>
						<div class="header">
							Контакты <?php if (is_plugin_active('multycity/multycity.php')) {
											echo do_shortcode('[city_gde]');
										} ?>
						</div>
					<?php } ?>

					<?php if (get_field('image_company', 'option')) { ?>
						<div class="image">
							<img src="<?php echo get_field('image_company', 'option'); ?>" alt="Офис <?php echo get_bloginfo("name"); ?>" title="Офис <?php echo get_bloginfo("name"); ?>">
						</div>
					<?php } ?>

					<ul class="main-list">
						<li>
							<span class="head">Телефоны</span>
							<?php echo do_shortcode('[phone]') ?>
							<?if(do_shortcode('[phone_second]')){?>
								<br><?php echo do_shortcode('[phone_second]') ?>
							<?}?>
						</li>
						<?php if ((is_plugin_active('multycity/multycity.php') && do_shortcode('[city_email]')) || get_field('email', 'option')) { ?>
							<li>
								<span class="head">Email</span>
								<?php echo do_shortcode('[email]'); ?>
							</li>
						<?php } ?>


						<li>
							<span class="head">Адрес</span>
							<?php if (is_plugin_active('multycity/multycity.php')) { ?>
								<span class="city">
									<span class="city_span" title="Изменить город">
										<?php echo do_shortcode('[city_i]') ?>
									</span>,
								</span>
							<?php } ?>
							<?php echo do_shortcode('[adress]'); ?>
						</li>
						<li>
							<span class="head">Координаты</span>
							<div id="contact_coordinate">
								<span><?php echo do_shortcode('[coordinate]'); ?></span>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
									<path d="M0 0h24v24H0z" fill="none" />
									<path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z" />
								</svg>
								<div class="message" id="coordinate-hover">Скопировать координаты</div>
								<div class="message" id="coordinate-copy">Скопировано</div>
							</div>
						</li>
						<li>
							<div class="contacts__name">Реквизиты компании:</div>
							<div class="contacts__requisites">
								<div class="">Наименование: <span class="contact__info"><?php echo get_field('company', 'option')['name'] ? get_field('company', 'option')['name'] . '<span class="sepa"></span>' : ""; ?></span></div>
								<div class="">ИНН: <span class="contact__info"><?php echo get_field('company', 'option')['inn'] ?   get_field('company', 'option')['inn'] . '<span class="sepa"></span>' : ""; ?></span></div>
								<div class="">КПП: <span class="contact__info"><?php echo get_field('company', 'option')['kpp'] ?   get_field('company', 'option')['kpp'] . '<span class="sepa"></span>' : ""; ?></span></div>
								<div class="">ОГРН: <span class="contact__info"><?php echo get_field('company', 'option')['ogrn'] ?   get_field('company', 'option')['ogrn'] . '<span class="sepa"></span>' : ""; ?></span></div>
								<div class="">Банк: <span class="contact__info"><?php echo get_field('company', 'option')['bank'] ?  get_field('company', 'option')['bank'] . '<span class="sepa"></span>' : ""; ?></span></div>
								<div class="">БИК: <span class="contact__info"><?php echo get_field('company', 'option')['bik'] ?  get_field('company', 'option')['bik'] . '<span class="sepa"></span>' : ""; ?></span></div>
								<div class="">Корреспондентский счет: <span class="contact__info"><?php echo get_field('company', 'option')['ks'] ?  get_field('company', 'option')['ks'] . '<span class="sepa"></span>' : ""; ?></span></div>
								<div class="">Расчетный счет: <span class="contact__info"><?php echo get_field('company', 'option')['rs'] ?  get_field('company', 'option')['rs'] . '<span class="sepa"></span>' : ""; ?></span></div>
							</div>
						</li>

						<?php if (get_field('mode', 'option')) { ?>
							<li>
								<span class="head">Режим работы</span>
								<?php the_field('mode', 'option') ?>
							</li>
						<?php } ?>
						<?php if (get_field('in', 'option') || get_field('yt', 'option') || get_field('vk', 'option') || get_field('fb', 'option')) { ?>
							<li class="soc-block">
								<span class="head">Мы в соц.сетях</span>
								<?php get_template_part('template-parts/social-icons'); ?>
							</li>
						<?php } ?>
						
						<?/*php if (do_shortcode('[phone_second]')) { ?>
							<li>
								<span class="head">Телефон (доп.)</span>
								<?php echo do_shortcode('[phone_second]') ?>
							</li>
						<?php } */?>

					</ul>

					<div class="button">
						<button data-src="#popup-mess" class="btn" data-fancybox="">
							<span>Оставить сообщение</span>
						</button>
					</div>

					<?php if (get_field('note', 'option')) { ?>
						<div class="note">
							<?php the_field('note', 'option') ?>
						</div>
					<?php } ?>


				</div>
			<div class="right-wrap">
				<div id="map-<?php echo $map_i; ?>" class="map-wrapper">

					<?php
					if (is_user_logged_in()) {
						if (get_field('offices', 'option') && !get_field('offices-center', 'option')) { ?>
							Внесите координаты в пункте "Центр карты филиалов" в разделе <a href="<?php echo home_url() ?>/wp-admin/admin.php?page=acf-options-kontakty" target="_blank">Контакты</a>
					<?php }
					} ?>

					<?php if (get_field('map-custom', 'option')) {
						the_field('map-custom', 'option');
					} ?>

				</div>
			</div>
		</div>
		</div>

		<?php
		$offices = get_field('offices', 'option');

		if ($offices) {
			while (have_rows('offices', 'option')) : the_row();

				$detail = get_sub_field('detail');
				//плагин активен(считаем, что больше таких функций нет, на самом деле нам без разницы откуда берется
				// функция city_lat) и задано поле $detail['city'].
				if (function_exists('city_lat') && !empty($detail['city'])) {
					// не наш город
					if ($detail['city'] !== city_lat()) {
						continue;
					}
				}
		?>
				<div class="container-fluid">
					<div class="offices">
						<div class="header-offices">
							Филиалы
						</div>
						<?php
						$repeater = get_sub_field('repeater');
						$repeater_count = count($repeater);

						switch (0) {
							case ($repeater_count == 1):
							case ($repeater_count == 2):
								$repeater_col = '2';
								break;
							case ($repeater_count == 3):
								$repeater_col = '3';
								break;
							case ($repeater_count == 4):
								$repeater_col = '4';
								break;
							case ($repeater_count % 5):
							case (($repeater_count + 1) % 5):
								$repeater_col = '5';
								break;
							case ($repeater_count % 4):
							case (($repeater_count + 1) % 4):
								$repeater_col = '4';
								break;
							case ($repeater_count % 3):
							case (($repeater_count + 1) % 3):
								$repeater_col = '3';
								break;
							case ($repeater_count % 2):
							case (($repeater_count + 1) % 2):
								$repeater_col = '2';
								break;
						}
						?>
						<div class="offices-wrap count-<?php echo $repeater_count; ?> office-col-<?php echo $repeater_col; ?>">
							<style>
								#contacts .offices-wrap {
									--count-office: <?php echo $repeater_col; ?>;
								}
							</style>
							<?php
							//print("<pre>".print_r($detail,true)."</pre>");
							while (have_rows('repeater')) : the_row();
								$department = get_sub_field('department');
								$adress = get_sub_field('adress');
								$phone = get_sub_field('phone');
								$email = get_sub_field('email');
								$mode = get_sub_field('mode');
								//$coordinate = get_sub_field('coordinate');
								$find = get_sub_field('find');
								$image = get_sub_field('images');

							?>
								<div class="office-item">
									<div class="office-item-wrap autoheight">
										<?php if ($department) { ?>
											<div class="department">
												<?php echo $department; ?>
											</div>
										<?php } ?>

										<?php if ($adress) { ?>
											<div class="adress">
												<?php echo $adress; ?>
											</div>
										<?php } ?>

										<?php if ($find) { ?>
											<div class="find">
												<?php echo $find; ?>
											</div>
										<?php } ?>

										<?php if ($phone) { ?>
											<div class="phone">
												<?php echo $phone ? '<a href="tel:+7' . substr(preg_replace('#[^\d]#', '', $phone), 1) . '" class="phone-content">' . get_sub_field('phone') . '</a>' : ''; ?>
											</div>
										<?php } ?>

										<?php if ($mode) { ?>
											<div class="mode">
												<?php echo $mode; ?>
											</div>
										<?php } ?>

										<?php if ($email) { ?>
											<div class="email">
												<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
											</div>
										<?php } ?>

										<?php if ($coordinate) { ?>
											<div class="coordinate">
												<?php echo $coordinate; ?>
											</div>
										<?php } ?>

										<?php if ($image) { ?>
											<div class="image">
												<a href="<?php echo $image; ?>" data-fancybox>Офис на фото</a>
											</div>
										<?php } ?>
									</div>
								</div>
							<?php
							endwhile;
							?>
						</div>
					</div>
				</div>
			<?php
			endwhile;
			?>
		<?php } ?>

		</section>

		<?php if (empty($map_off)) { ?>

			<script type="text/javascript" src="//api-maps.yandex.ru/2.1/?load=package.standard&lang=ru-RU"></script>

			<?php if ($offices) {

				// по умолчанию центр на главном офисе из опций или из таблицы городов
				$center = city_coordinate();
				$zoom = 10;
				$placemarks = [];

				//формируем массив меток, кроме главной метки
				while (have_rows('offices', 'option')) : the_row();
					$detail = get_sub_field('detail');

					if (function_exists('city_lat') && !empty($detail['city'])) {
						// не наш город
						if ($detail['city'] !== city_lat()) {
							continue;
						}
					}

					$center = $detail['center'];
					$zoom = $detail['zoom'];

					while (have_rows('repeater')) : the_row();
						$department = get_sub_field('department');
						$adress = get_sub_field('adress');
						$phone = get_sub_field('phone');
						$email = get_sub_field('email');
						$mode = get_sub_field('mode');
						$coordinate = get_sub_field('coordinate');
						$find = get_sub_field('find');
						$image = get_sub_field('images');

						if ($department) {
							$department = $department . '</br>';
						}
						if ($phone) {
							$phone = $phone . '</br>';
						}
						$placemarks[] = [
							'coordinate' => $coordinate,
							'balloonContent' => $department . $adress . $phone . $mode
						];
					endwhile;
				endwhile;
			?>
				<script type="text/javascript">
					ymaps.ready(init);
					var myMap;

					function init() {

						myMap = new ymaps.Map(<?php echo '"map-' . $map_i . '"'; ?>, {
								center: [<?php echo $center; ?>],
								zoom: <?php echo $zoom ? $zoom : "10"; ?>
							}),
							myMap.behaviors.disable('scrollZoom')

						myMap.geoObjects
							.add(new ymaps.Placemark([<?php echo do_shortcode('[coordinate]'); ?>], {
								balloonContent: 'Головной офис'
							}))
						<?php foreach ($placemarks as $placemark) : ?>
								.add(new ymaps.Placemark([<?php echo $placemark['coordinate']; ?>], {
									balloonContent: '<?php echo $placemark['balloonContent']; ?>'
								}))
						<?php endforeach; ?>

					}
				</script>


			<?php } elseif (!get_field('map-custom', 'option')) {  ?>
				<script type="text/javascript">
					ymaps.ready(init);
					var myMap;

					function init() {

						myMap = new ymaps.Map(<?php echo '"map-' . $map_i . '"'; ?>, {
								center: [<?php echo do_shortcode('[coordinate]'); ?>],
								zoom: 16,
							}),
							myPlacemark = new ymaps.Placemark([<?php echo do_shortcode('[coordinate]'); ?>]);
						myMap.behaviors.disable('scrollZoom')
						myMap.geoObjects.add(myPlacemark);
					}
				</script>
			<?php } ?>


		<?php } ?>