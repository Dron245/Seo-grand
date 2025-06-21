<?php
$hero3 = get_field($field_preffix_hero.'hero3',$field_postfix);
$hero3_design = get_field($field_preffix_hero.'hero3-design',$field_postfix);

if($hero3[0]['group__text'] && !in_array('disable', $hero3_design)){

// Позиционирование текста
$hero_align = 'align-text-' . get_field('hero-align', 'option') . ' ';
$hero_height = '';
if (get_field('hero-height', 'option')) {
	$hero_height = 'min-height: ' . get_field('hero-height', 'option') . '; ';
}


?>

<section id="hero3">
	<div class="hero3__slider js-slider">

		<?php
		$slide_index = 0;
		while (have_rows($field_preffix_hero.'hero3',$field_postfix)) : the_row();
			$slide_index++;

			$group__text 	= get_sub_field('group__text');
			$group__btn 	= get_sub_field('group__btn');
			$group__style 	= get_sub_field('group__style');

			$text 			= $group__text['text'];

			$btn 			= $group__btn['btn'];
			$btn_name 		= $group__btn['btn-name'];
			$btn_link 		= $group__btn['btn-link'];
			$btn_link_name 	= $group__btn['link-name'];
			$btn_desc 		= $group__btn['btn-desc'];

			$id_marquiz 	= $group__btn['id_marquiz'] ?? "";
			$id_unic_popup 	= $group__btn['id_unic_popup'] ?? "";

			$bg_img 		= $group__style['bg'] ?? " ";
			$bg_person		= $group__style['person'] ?? " ";
			$bg_small		= $group__style['small'] ?? " ";
			$bg_video		= $group__style['video'] ?? " ";

			$hero_style 	= $group__style['style'];
			//print("<pre>".strip_tags(print_r($hero_style,true))."</pre>");

			$hero_bg_style = '';
			if ($bg_img) {
				$hero_bg_style = 'background-image: url(' . $bg_img['url'] . '); ';
				$hero_bg_class = 'bg ' ?? " ";
			} else {
				$hero_bg_class = 'no-bg ' ?? " ";
			}

			if ($bg_person) {
				$hero_person_class = 'bg-person ' ?? " ";
			}

			if ($bg_small) {
				$hero_small_class = 'bg-small ' ?? " ";
			}

			if (in_array('white-text', $hero_style)) {
				$hero_white_class = 'hero-white ' ?? " ";
			}

			$hero_bg_class .= $hero_person_class . $hero_small_class . $bg_video . $hero_align . $hero_white_class;

			if (wp_is_mobile() && !empty($bg_small)) {
				$arrow_style = 'style="top: calc(100vw / ' . $bg_small['width'] / $bg_small['height'] . ' + 2rem);"';
				$small_style = 'style="min-height: calc(100vw / ' . $bg_small['width'] / $bg_small['height'] . ');"';
			}

		?><div>
				<div class="hero3__slide <?php echo $hero_bg_class; ?>" style="<?php echo $hero_bg_style . ' ' . $hero_height; ?> ">


					<?php
					// Предзагрузка изображений
					if ($slide_index == 1) {
						if ($bg_img) {
							echo '<link rel="preload" as="image" href="' . $bg_img['url'] . '">';
						}
						if ($bg_person) {
							echo '<link rel="preload" as="image" href="' . $bg_person['url'] . '">';
						}
						if (wp_is_mobile() && $bg_small) {
							echo '<link rel="preload" as="image" href="' . $bg_small['url'] . '">';
						}
					}
					?>


					<?php
					// Видео фон
					if ($bg_video) {
						if ($slide_index == 1) {
							echo '<link rel="preload" as="video" type="video/mp4" href="' . $bg_video['url'] . '">';
						}
					?>
						<video class="hero3__video" autoplay loop muted="muted">
							<source src="<?php echo $bg_video['url']; ?>" type="video/mp4" />
						</video>
					<?php } ?>

					<?php
					// Картинка и стрелки слайдера для мобильников 
					if (wp_is_mobile() && !empty($bg_small)) { ?>
						<div class="hero3__mobile" <?php echo $small_style; ?>>
							<img src="<?php echo $bg_small['url']; ?>">
						</div>
					<?php } ?>


					<div class="container-fluid">
						<div class="row">
							<div class="col-xl-7 col-lg-7 col-ml-7 col-md-7 col-12">
								<div class="hero3__content">
									
									<div id="breadcrumbs">
										<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
									</div>

									<div class="hero3__title <?php echo (in_array('column', $hero_style)) ? 'col-list' : 'list' ?>">
										<?php echo predlog($text); ?>
									</div>

									<?php if ($btn_name || $btn_link_name) { ?>
										<div class="hero3__buttons">
											<?php
											// Если указан ID marquiz
											if ($id_marquiz) {  ?>
												<a data-marquiz="<?php echo $id_marquiz; ?>" href="#popup:marquiz_<?php echo $id_marquiz; ?>" class="btn">
													<span><?php echo $btn_name; ?></span>
												</a>

											<?php
												// Если указан ID уникальной формы
											} elseif ($id_unic_popup) { ?>
												<button data-src="#popup-<?php echo $id_unic_popup; ?>" data-fancybox class="btn">
													<span><?php echo $btn_name; ?></span>
												</button>
											<?php
												// Если выбрано поле ввода
											} elseif ($btn == 'input') { ?>
												<div class="hideLabels">
													<form class="hero3__form form_block" method="POST" action="<?php echo !empty($formUrl) ? $formUrl : get_page_link(get_page_by_title('Страница благодарности')); ?>" enctype="multipart/form-data">
														<input type="hidden" name="formid" value="<?php echo $formTitle; ?>">
														<input type="hidden" name="title" value="<?php echo $current_page_title; ?>">
														<input type="hidden" name="url" value="<?php echo $current_url; ?>">
														<div class="hidden"><input type="text" name="e-mail" /></div>
														<div class="form-group animate-top">
															<input type="tel" name="phone" class="form-control required inp" placeholder="Ваш телефон" data-validation="invalid" />
														</div>
														<div class="btn__form hero3__btn">
															<button class="btn" anim="ripple" type="submit"><span><?php echo $btn_name; ?></span></button>
														</div>
													</form>
												</div>
											<?php
												// Если выбран любой тип кнопки, кроме поле ввода
											} else {  ?>
												<button class="btn" data-src="#popup-<?php echo $btn; ?>" data-fancybox><span><?php echo $btn_name; ?></span></button>
											<?php } ?>

											<?php
											// Если есть ссылка
											if ($btn_link) {  ?>
												<a class="btn <?php echo ($btn) ? 'btn-second' : ''; ?>" href="<?php echo $btn_link; ?>"><span><?php echo $btn_link_name; ?></span></a>
											<?php } ?>
											
											<?php if($btn_desc){ ?>
												<div class="hero-btn-desc"><?php echo predlog($btn_desc); ?></div>
											<?php } ?>
										</div>
									<?php } ?>

								</div>

							</div>
							
							<?php
							// Персонаж
							if ($bg_person && !in_array('person-abs', $hero_style)) { ?>
							<div class="col-xl-5 col-lg-4 col-ml-5 col-md-5 hidden-sm hidden-xs">
								<div class="hero3__person">
									<div class="hero3__person-img">
										<img src=" <?php echo $bg_person['url']; ?>" alt="<?php echo $bg_person['alt']; ?>">
									</div>
								</div>
							</div>
							<?php } ?>
							
						</div>
					</div>
					
					
					<?php
					// Персонаж в абсолюте 
					if ($bg_person && in_array('person-abs', $hero_style)) { ?>
					<div class="container-fluid container-abs">
						<div class="hero3__person-absolute">
							<div class="hero3__person-img">
								<img src=" <?php echo $bg_person['url']; ?>" alt="<?php echo $bg_person['alt']; ?>">
							</div>
						</div>
					</div>
					<?php } ?>
					
				</div>
			</div>
		<?php
		endwhile;
		wp_reset_query();
		?>
	</div>

	<div class="hero3__arrows" <?php echo $arrow_style; ?>>
		<div class="container-fluid">
			<div class="hero3__arrows-wrap">
				<div class="hero3__dots">
				</div>
			</div>
		</div>
	</div>

</section>


<script>
	$(document).ready(function() {
		
		$("#hero3 .js-slider").slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			touchThreshold: 1000,
			dots: true,
			//dotsClass: 'dots1',
			appendDots: $(".hero3__dots"),
			infinite: true,
			fade: true,
			appendArrows: $(".hero3__arrows-wrap"),
			prevArrow: '<button type="button" class="slick-arrow slick-arr-prev">' + sliderBtnLeft + "</button>",
			nextArrow: '<button type="button" class="slick-arrow slick-arr-next">' + sliderBtnRight + "</button>",
		});

	});
</script>
<?php } ?>