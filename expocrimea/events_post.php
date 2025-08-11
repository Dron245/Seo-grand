<?
	/*
	Template Name: Мероприятия
	Template Post Type: events
	*/

	$images = get_field('images');
	$dop_images = get_field('dop-images');
	$location = get_field('page_location');
	$location_link = get_field('location-link');
	$start_date = get_field('start_date');
	$end_date = get_field('end_date');
	$equipments = get_field('equipment');
	$softwares = get_field('software');
	$text_before_buttons = get_field('text_before_buttons');
	$full_title = get_field('full_title');
	$banner_content = get_field('banner_content');
	$additions = get_field('additions');
	$content_text = get_field('content_text');

	get_header();
?>

<section class="event-promo" style="background-image: url(<?= $images['url']; ?>);">
		<div class="container">
				<h1 style="opacity: 0; visibility: hidden;" class="event-promo__title"><?= get_the_title();?></h1>
				<div class="event-promo-content">
						<? if($banner_content['title'] || $banner_content['text']): ?>
						<div class="event-promo-content-side"
								<? if($banner_content['color']): ?>
										style="color: <?= $banner_content['color'] ?>;"
								<? endif;?>
						>
								<? if($banner_content['title']): ?>
										<div class="event-promo-content-title">
												<h2><?= $banner_content['title'] ?></h2>
										</div>
								<? endif; ?>
								<? if($banner_content['text']): ?>
										<div class="event-promo-content-text">
												<?= $banner_content['text'] ?>
										</div>
								<? endif; ?>
						</div>
						<? endif; ?>
						<? if($banner_content['logo']): ?>
								<div class="event-promo-content-side">
										<div class="event-promo-content-logo">
												<img
														src="<?= $banner_content['logo']['sizes']['medium'] ?>"
														alt="<?= $banner_content['title'] ? $banner_content['title'] : get_the_title() ?>"
												/>
										</div>
								</div>
						<? endif; ?>
				</div>
		</div>
</section>

<div class="wrapper-circle">
	<?
		if(get_field('ispolzovat_moduli')) {
			if(get_field('модуль')){
				foreach (get_field('модуль') as $item) {
                    if(explode('/', $item['acf_fc_layout'])[0] == 'greetings' || explode('/', $item['acf_fc_layout'])[0] == 'speakers') {
                        my_get_template_part($item['acf_fc_layout'], array(
							'title' => 'Спикеры',
							'items' => get_field('speaker')
						));
						my_get_template_part($item['acf_fc_layout'], array(
							'title' => get_field('greetings')['title'],
							'items' => get_field('greetings')['list']
						));
                    } else {
                    	get_template_part('blocks/' . $item['acf_fc_layout']);
                    }
					
				}
			}
		} else {
			?>
				<section class="event-main">
					<div class="wrapper">
							<div class="event-main__container">
									<div class="main__images">
											<img src="<?= $dop_images['url'] ?>" alt="<?php the_title() ?>">
									</div>
									<div class="main">
											<h4 class="main__title"><?= $full_title ? $full_title : get_the_title() ?></h4>
											<div class="main__items">
													<div class="column">
															<div class="item">
																	<div class="title">Дата проведения</div>
																	<div class="content content__flex">
																			<?php get_template_part('icons/date') ?> 
																			<span class="text"><?php echo $start_date && $start_date != $end_date ? date('j -', strtotime($start_date) ) : "" ;?> <?php echo $end_date ? date('j ' . getMonth(date( 'n', strtotime($end_date)) - 1) . ' Y года', strtotime($end_date) ) : ""; ?></span>
																	</div>
															</div>
															<div class="item">
																	<div class="title">Место проведения</div>
																	<div class="content content__flex">
																			<?php get_template_part('icons/pin') ?> 
																			<span class="text"><?= get_field('location', $post->ID); ?></span>
																	</div>
															</div>
													</div>
											</div>

											<div class="main__content">
													<?php the_content(); ?>
											</div>

											<div class="main__button-block">
												<?
													if(have_rows('knopki')) {
														if($text_before_buttons): 
															?>
																<div class="main__button-block__title"><?= $text_before_buttons ?></div>
															<? 
														endif; 
														
														?>
															<div class="form-items">
																<div class="form-row">
																<?
																	while (have_rows('knopki')): the_row();
																		?>
																			<a data-modal="<? the_sub_field('ssylka')?>" class="form-item" style="background: <? the_sub_field('czvet_fona')?>; color: <? the_sub_field('czvet_teksta')?>">
																				<? the_sub_field('tekst')?>
																			</a>
																		<?	


																		if(1 == 2) {
																			if(get_sub_field('ssylka') == '#visitor') {
																				?>
																					<a href="https://expocrimea.bitrix24site.ru/AGRO_znwj/" target="_blank" class="form-item" style="background: <? the_sub_field('czvet_fona')?>; color: <?the_sub_field('czvet_teksta')?>"><? the_sub_field('tekst')?></a>
																				<?
																			} else {
																				?>
																					<a data-modal="<? the_sub_field('ssylka')?>" class="form-item" style="background: <? the_sub_field('czvet_fona')?>; color: <? the_sub_field('czvet_teksta')?>">
																						<? the_sub_field('tekst')?>
																					</a>
																				<?
																			}
																		}
																		
																	endwhile;
																?>
																</div>
															</div>
														<?
													}
												?>
													
											</div>

									</div>
							</div>
					</div>
					<div class="circle"></div>
				</section>

<?php 
 $rows = get_field('thematic-bloks', $post->ID);
 if($rows):
?>
<section class="event-thematic">
		<div class="wrapper">
				<div class="event-thematic__items">

						<?php
								if($rows) {
										foreach($rows as $row) {
						?>
								<div class="item">
										<div class="item__content">
												<div class="title"><?= $row['title'];?></div>
												<ul class="list">
														<?php 
																if(row) {
																		foreach($row['points'] as $point) {
														?>
																<li><?= $point['point'];?></li>
														<?php }}; ?>
												</ul>
										</div>
								</div>

						<?php }}; ?>
				</div>
		</div>
</section>
<?php endif; ?>
    
				<? 
					$rows = get_field('schedule-blocks', $post->ID);
					
					if($rows):
						?>
							<section class="event-schedule">
									<div class="wrapper">
											<h4 class="event-schedule__title">Распорядок работы выставки</h4> 
											<div class="event-schedule__items">
													<?
															if($rows) {
																	foreach($rows as $row) {
													?>
															<div class="item">
																	<div class="item__container">
																			<div class="name"><?= $row['stages'];?></div>
																			<div class="day"><?= $row['day'];?></div>
																			<div class="schedule"><?= $row['time'];?></div>
																	</div>
															</div>
													<? }}; ?>
											</div>
									</div>
								<div class="circle"></div>
							</section>
						<? 
					endif;
				?>

				<? 
					$rows = get_field('participants-blocks', $post->ID);

					if($rows):
						?>
							<section class="event-participants" >
									<div class="event-participants__images"></div>
									<div class="wrapper">
											<h4 class="event-participants__title">Участникам и Партнерам</h4>
											<div class="event-participants__items">
													<?
															$numberIncrease = 01;
															if($rows) {
																	foreach($rows as $row) {
													?>
															<div class="item">
																	<div class="item__container">
																			<div class="count"><? echo sprintf("%02d", $numberIncrease++);?></div>
																			<a class="text ajax" href="<?= $row['link'];?>"><?= $row['punkt'];?>
																					<? get_template_part('icons/arrow-right') ?> 
																			</a>
																	</div>
															</div>
													<? }}; ?>
											</div>
									</div>
							</section>
						<? 
					endif;
				?>

				<? 
					$rows = get_field('few-facts-blocks', $post->ID);
					
					if($rows):
						?>
							<section class="event-few-facts" >
									<div class="wrapper">
											<h4 class="event-few-facts__title"><?= get_field('fact-title', $post->ID);?></h4>
											<div class="event-few-facts__items">
													<? 
															if($rows) {
																	foreach($rows as $row) {
													?>
															<div class="item">
																	<div class="block__count">
																			<div class="count countdown" data-from="0" data-to="<?= $row['count'];?>" data-seconds="2"><?= $row['count'];?></div>
																			<span class="prefix-to-count"><?= $row['addition'];?></span>
																	</div>
																	<div class="text"><?= $row['text'];?></div>
															</div>
													<? }}; ?>
											</div>
									</div>
							</section>
						<? 
					endif;
				?>

				<?
					get_template_part('blocks/event/grid');
					my_get_template_part('speakers/list', array(
							'title' => 'Спикеры',
							'items' => get_field('speaker')
					));
					my_get_template_part('greetings/list', array(
							'title' => get_field('greetings')['title'],
							'items' => get_field('greetings')['list']
					));
				?>

				<?
					$rows = get_field('slider', $post->ID);
					
					if($rows):
						?>
							<section class="event-slider">
								<div class="container">
										<div class="event-main-slider">
												<div class="swiper-wrapper">
														<? 
																if($rows) {
																		foreach($rows as $row) {
														?>
																<div class="swiper-slide slide">
																		<a data-view data-fancybox="event-gall" href="<?= $row['images']['url'];?>" style="background-image: url(<?= $row['images']['url'];?>);"></a>
																</div>
														<? }}; ?>
												</div>
										</div>
								</div>
								<div class="swiper__control">
										<div class="wrapper wrapper__control">
												<div class="control__btn">
														<div class="swiper-btn-prev">
																<? get_template_part('icons/arrow-right-b'); ?>  
														</div>
														<div class="swiper-btn-next">
																<? get_template_part('icons/arrow-right-b'); ?>
														</div>
												</div>

												<div class="event-scrollbar"></div>
										</div>
								</div>
								<div class="circle"></div>
							</section>
						<? 
					endif;
				?>

				<?
					get_template_part('blocks/event/video');
				?>

				<?
					$rows = get_field('slider-location', $post->ID);
					
					if(get_field('location', $post->ID) && $rows):
						?>
							<section class="event-location">
								<div class="wrapper">
										<div class="event-location__container">
												<div class="container__background"></div>
												<div class="container__main">
														<div class="main">
																<h4 class="main__title">Место проведения</h4>
																<div class="main__location">
																		<? get_template_part('icons/pin') ?>
																	 <span><?= get_field('location', $post->ID); ?></span> 
																</div>
																<a href="<?= $location_link['url']; ?>" class="button button_red_transparent" target="_blank"><?= $location_link['title']; ?></a>
														</div>
												</div>
												<div class="container__slider">
														<div class="location-slider">
																<div class="swiper-wrapper">
																		<? 
																				if($rows) {
																						foreach($rows as $row) {
																		?>
																				<div class="swiper-slide slide" style="background-image: url(<?= $row['images']['url'];?>);">
																				</div>
																		<? }}; ?>
																</div>
																<div class="navigations">
																		<div class="navigations__button">
																				<div class="location-btn-prev">
																						<? get_template_part('icons/arrow-right-b'); ?>
																				</div>
																				<div class="location-btn-next">
																						<? get_template_part('icons/arrow-right-b'); ?>   
																				</div>
																		</div>
																		<div class="location-pagination"></div>
																</div>
														</div>
												</div>
										</div>
								</div>
							</section>
	

						<? 
					endif;
				?>

				<? 
					get_template_part('blocks/event/event-suport'); 
				?>
						
				<? // get_template_part('blocks/event/forms'); ?>
				

	
				<section class="event-promo__danger">
						<div class="wrapper">
								<!-- <div class="event-promo__info">
										<? if($start_date):?>
												<div class="item">
														<div class="item__text"><? echo $start_date && $start_date != $end_date ? date('j -', strtotime($start_date) ) : "" ;?> <? echo $end_date ? date('j ' . getMonth(date( 'n', strtotime($end_date)) - 1), strtotime($end_date) ) : ""; ?></div>
														<div class="item__subtext">когда?</div>
												</div>
										<? endif; ?>
										<? if($location):?>
										<div class="item">
												<div class="item__text"><?= $location; ?></div>
												<div class="item__subtext">где?</div>
										</div>
										<? endif; ?>
								</div> -->
								<div class="event-promo__danger__text"><?= get_field('blok-danger') ? get_field('blok-danger') : "";?></div>
						</div>
				</section>

				<? 
					get_template_part('blocks/event/news'); 
				?>
					
				<?
					if(get_field('pokazyvat_drugie_meropriyatiya', 16)) {
						get_template_part('blocks/event/other-events');
					}
				?>
			<?
		}
	 ?>  
	
					<section class="event_content">
					<div class="wrapper">
						<div class="greetings__title"><?= $content_text ?></div>
					</div>
				</section>

</div>   <!-- Circle  -->

<?
if(get_field('модуль')){
        foreach (get_field('модуль') as $item) {
            $layout = $item['acf_fc_layout'];
            
            // Специальная обработка текстового модуля
            if($layout == 'text') {
                echo '<div class="text-module">';
                if(!empty($item['tekst'])) {
                    $content = $item['tekst'];
                    echo apply_filters('the_content', $content);
                }
                echo '</div>';
                continue;
            }
            
            // Стандартная обработка остальных модулей
            get_template_part('blocks/' . $layout);
        }
    }

							
	if($additions){
			echo $additions;
	}
?>




<!-- битрикс форма -->
<?
	$code = get_field('bitriks_forma'); // Замени 'acf_field_name' на имя поля
	
	if ($code) {
	  eval('?>' . $code);
	}
?>



<? get_footer(); ?>
    
<script>
	jQuery('.bilet').on('click', function () {
		  jQuery(this).toggleClass('active');

            let selectedTexts = jQuery('.bilet.active').map(function () {
                return jQuery(this).find('.bilet__text').text();
            }).get();

            let totalPrice = jQuery('.bilet.active').map(function () {
                return parseFloat(jQuery(this).find('.bilet__price').text()) || 0;
            }).get().reduce((sum, price) => sum + price, 0);

            let finalText = `${selectedTexts.join(', \n')} - ${totalPrice.toFixed(2)} руб.`;

            jQuery('[name="item-bilet"]').val(finalText);

            jQuery('.modal-buy-summa span').text(totalPrice.toFixed(2));
    })

	jQuery('.modal-buy-button').on('click', function () {
		if (jQuery(this).closest('#buy').find('.bilet.active').length) {
			jQuery('.modal-buy-top').hide();
			jQuery('.modal-buy-content').fadeIn();
		}
	})
</script>

 <script>
    // Существующий код для read-more-links
    document.addEventListener('DOMContentLoaded', function() {
        const readMoreLinks = document.querySelectorAll('.read-more-link');
        
        readMoreLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const hiddenBlock = this.closest('.text-module').querySelector('.hidden_block');
                
                if (hiddenBlock.classList.contains('active')) {
                    hiddenBlock.style.maxHeight = '0';
                    hiddenBlock.style.opacity = '0';
                    setTimeout(() => {
                        hiddenBlock.classList.remove('active');
                    }, 500);
                    this.textContent = 'Читать далее...';
                } else {
                    hiddenBlock.classList.add('active');
                    hiddenBlock.style.maxHeight = hiddenBlock.scrollHeight + 'px';
                    hiddenBlock.style.opacity = '1';
                    this.textContent = 'Скрыть текст';
                }
            });
        });
    });
    </script>
