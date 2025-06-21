	<header id="header" class="">
		<div class="container-fluid">
			<div class="row mainrow">
				<div class="logo">
					<a href="<?php echo HOME_URI; ?>" class="img_link">
						<img src="<?php echo get_field('logos', 'option')['header']; ?>" alt="Логотип <?php echo get_field('company', 'option')['brand']; ?>" />
					</a>
				</div>
				<div class="content">
					<div class="row">
						<div class="col descriptor">
							<div class="text">
								<?php the_field('descriptor', 'option'); ?>
							</div>
						</div>

						<div class="col pdf-col">
							<?php 
							$queried_object = get_queried_object();
							
							if(is_post_type_archive()){
								$post_type = $queried_object->rewrite['slug'];
								if($post_type=='izolyaciya'){
									$doc = get_field('doc_izol', 'option');
								}else{
									if($post_type=='detaly'){
										$doc = "/wp-content/uploads/2024/Prajs-detali-truboprovoda.pdf";
									}else{
										$doc = get_field('doc_'.$post_type, 'option' );
									}
								}
							}elseif(is_tax()){
								$doc = get_field('doc_price', $queried_object);
							}elseif(is_single()){
								$post_type = $queried_object->post_type;
								$terms = get_the_terms(get_the_ID(), $post_type.'_category')[0];
								$doc = get_field('doc_price', $terms);
								$doc = $doc ?: get_field('doc_'.$post_type, 'option' );
							}else{
								$doc = get_field('doc_price_all', get_option('page_on_front'));
							}
							
							$doc = $doc ?: get_field('doc_price_all', get_option('page_on_front'));
							
							?>
							<a href="<?php echo $doc; ?>" download>
								<img src="<?php echo THEME_IMAGES; ?>/pdf.webp" alt="">
								<span class="pdf__text">Скачать прайс<br>от&nbsp;<span class="date"><?php echo date('d.m.Y'); ?></span></span>
							</a>
						</div>
						<div class="col contact-col">

							<div class="contact-flex phone">
								<div class="full__col col_end">
									<div class="working__now working__now_mb">
										<div class="working__icon"></div>
										<div class="working__text">
											Сейчас работаем
										</div>
									</div>

								</div>
								<div class="phone__icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xmlns:v="https://vecta.io/nano">
										<path d="M20 15.4a10.3 10.3 0 0 1-3.5-.6c-.4-.1-.7 0-1 .2l-1.6 2c-2.8-1.4-5.5-3.9-6.9-6.8l2-1.7c.3-.3.4-.7.2-1A10.3 10.3 0 0 1 8.6 4c0-.5-.4-1-1-1H4.2C3.7 3 3 3.2 3 4c0 9.3 7.7 17 17 17 .7 0 1-.6 1-1.2v-3.5c0-.5-.5-.9-1-.9z" fill="#147ac3" />
									</svg>
									<?php echo do_shortcode('[phone]') ?>
								</div>

							</div>
							<div class="contact-flex email">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xmlns:v="https://vecta.io/nano">
									<path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" fill="#147ac3" />
								</svg>
								<?php echo do_shortcode('[email]') ?>
							</div>
						</div>
						<div id="header_call_back" data-src="#popup-call" data-fancybox>
							<a class="btn" href="#"><span> Заказать звонок</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<nav id="menu">
		<div class="container-fluid">
			<div class="menu__inner">
				<? if (has_nav_menu('main_menu')) { ?>
					<div class="menu_block">
						<?php wp_nav_menu(array(
							'theme_location' => 'main_menu',
							'fallback_cb' => ''
						)); ?>
					</div>
				<? } ?>
				<div id="header_call_back" data-src="#popup-call" data-fancybox>
					<a class="btn" href="#"><span> Заказать звонок</span></a>
				</div>
			</div>
		</div>
	</nav>
	
	<script>
		// Получаем ссылки на элементы с id "header" и "menu"
		var header = document.getElementById("header");
		var menu = document.getElementById("menu");
		
		// Вычисляем высоту элемента "header" с учетом паддингов
		var headerHeight = header.clientHeight + parseInt(getComputedStyle(header).paddingTop) + parseInt(getComputedStyle(header).paddingBottom);
		
		// Функция, которая будет вызываться при скролле страницы
		function handleScroll() {
		  // Получаем текущую позицию скролла
		  var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
		
		  // Если позиция скролла больше или равна высоте элемента "header", то добавляем стиль "fixed" к элементу "menu"
		  if (scrollPosition >= headerHeight) {
			menu.style.position = "fixed";
		  } else {
			// В противном случае снимаем стиль "fixed"
			menu.style.position = "static";
		  }
		}
		
		// Добавляем обработчик события "scroll" к окну
		window.addEventListener("scroll", handleScroll);
		
		// Вызываем функцию handleScroll() при загрузке страницы (чтобы установить начальное состояние)
		handleScroll();

	</script>