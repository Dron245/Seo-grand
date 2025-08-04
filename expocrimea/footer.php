<?php
	$mainSettings = get_field('main-settings', 16);
	$fotter = get_field('fotter', 16);
?>

<div class="dialog">
	<div class="dialog-inner">
		<button class="dialog-close">
			<?php get_template_part('icons/close'); ?>
		</button>
		<div class="dialog-inner-content">
			<?
				echo do_shortcode('[contact-form-7 title="Обратный звонок мини"]');
			?>
		</div>
	</div>
	<button class="dialog-call">
		<?php get_template_part('icons/phone'); ?>
	</button>
</div>

<button class="to-top">
		<?php get_template_part('icons/arrow-right-b'); ?>
</button>

	<?php get_template_part('blocks/subscribe'); ?>
	<div class="footer">
		<div class="wrapper">
			<div class="footer__items">
				<div class="footer__items__inner">
					<div class="item item__expo">
						<div class="item__title">
							<?= $fotter['company-name']; ?> <br>
						</div>
						<div class="item__text">
							<?= $fotter['company-text']; ?>
						</div>
					</div>
					<div class="item item__news">
						<div class="item__title">
							Свежие новости
						</div>
						<ul>
							<?php
								$news = new WP_Query( array(
									'posts_per_page' => 3,
									'post_type'   => 'news',
									'orderby' => 'date',
									'order' => 'DESC'
							));
								if($news->have_posts()):
									while($news->have_posts()):
										$news->the_post();
							?>
								<li>
									<a class="link ajax" href="<?php the_permalink(); ?>">
										<div class="date"><?php echo get_the_date('d F'); ?></div>	
										<div class="text"><?php the_title(); ?></div>
									</a>
								</li>
							<?php endwhile; endif;
								wp_reset_postdata(); // сброс
							?> 
						</ul>
					</div>
					<div class="item item__colmn">
						<div class="item">
							<div class="item__title">
								Полезная информация
							</div>
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'footer-info',
										'menu_class'     => 'footer-info',
									)
								);
							?>
						</div>
						<div class="item">
							<div class="item__title">
								Служебное   
							</div>
							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'footer-official',
										'menu_class'     => 'footer-official',
									)
								);
							?>
						</div>
					</div>
					<div class="item item__contact">
						<div class="item__title">
							Контакты
						</div>
						<ul>
							<li>
								<?php echo $mainSettings['address']; ?>
							</li>
							<li>
								Тел: <a href="tel:<?php echo preg_replace('/[^0-9]/','', $mainSettings['telephone']); ?>"><?php echo $mainSettings['telephone']; ?></a> 
							</li>
							<li>
								Email: <a class="link" href="mailto:<?php echo $mainSettings['email']; ?>"><?php echo $mainSettings['email']; ?></a>
							</li>
							<li>
								Web: <a class="link ajax" href="<?php echo get_site_url(); ?>"><?php echo home_url() ; ?></a> 
							</li>
						</ul>
						<?php get_template_part('blocks/socials') ?>
					</div>
				</div>
			</div>
<!-- 			<div class="footer__copyright">
				Copyright © <?php echo date("Y"); ?> <a class="ajax copy-link" href="<?php echo get_site_url(); ?>"> <?php echo $fotter['copy']; ?></a> All rights reserved.
				<div class="footer__developer">
					<a href="https://marketing.rockotov.ru/" target="_blank">
						Разработка сайта
					</a>
				</div>
			</div> -->
		</div>
	</div>
</div><!-- #page -->


	<div class="modal modal__big" id="member" style="display: none;">
		<? 
				$has_bitriks_form = false;

				while (have_rows('knopki')): the_row();
					if(get_sub_field('bitriks_forma') && get_sub_field('ssylka') == '#member') {
						$has_bitriks_form = true;
						
						$code = get_sub_field('bitriks_forma'); 
						
						if ($code) {
					    eval('?>' . $code);
						}
					}
				endwhile;

				if(!$has_bitriks_form) {
					?>
			 			<div class="modal__wrap"> 
			 				<div class="modal__title">Стать участником</div>
							<div class="modal__subtitle">Наши менеджеры с радостью обсудят с Вами варианты участия
									в выставке и помогут подобрать максимально соответствующий Вашим маркетинговым целям и задачам формат
							</div>
							<div class="container__form">
								<?= do_shortcode('[contact-form-7 id="338" title="Стать участником"]'); ?>
							</div>
			 			</div>
					<?
				}
			?>
	</div>

	<div class="modal modal__big" id="speaker" style="display: none;">
			<div class="modal__wrap">
				<div class="modal__title">Стать спикером</div>
				<div class="modal__subtitle">Наши менеджеры с радостью обсудят с Вами варианты участия
						в выставке и помогут подобрать максимально соответствующий Вашим маркетинговым целям и задачам формат
				</div>
				<div class="container__form">
					<?= do_shortcode('[contact-form-7 id="339" title="Стать спикером"]'); ?>
				</div>
			</div>
	</div>

	<div class="modal modal__big" id="visitor" style="display: none;">
		<div class="modal__wrap">
			<?
				$has_bitriks_form = false;

				while (have_rows('knopki')): the_row();
					if(get_sub_field('bitriks_forma') && get_sub_field('ssylka') == '#visitor') {
						$has_bitriks_form = true;
						
						$code = get_sub_field('bitriks_forma'); 
						
						if ($code) {
					    eval('?>' . $code);
						}
					}
				endwhile;

				if(!$has_bitriks_form) {
					?>
						<div class="modal__wrap">
							<div class="modal__title">Заявка на посещение</div>
							<div class="modal__subtitle">Наши менеджеры с радостью обсудят с Вами варианты участия
									в выставке и помогут подобрать максимально соответствующий Вашим маркетинговым целям и задачам формат
							</div>
							<div class="container__form">
								<?= do_shortcode('[contact-form-7 id="340" title="Стать посетителем"]'); ?>
							</div>
						</div>
					<?
				}
			?>
		</div>

	
	</div>
	
    <div class="modal modal__big" id="buy" style="display: none;">
			<?
				$has_bitriks_form = false;

				while (have_rows('knopki')): the_row();
					if(get_sub_field('bitriks_forma') && get_sub_field('ssylka') == '#buy') {
						$has_bitriks_form = true;
						
						$code = get_sub_field('bitriks_forma'); 
						
						if ($code) {
					    eval('?>' . $code);
						}
					}
				endwhile;

				if(!$has_bitriks_form) {
					?>
						<div class="modal__wrap">
							<div class="modal__title">Купить билет</div>
			                <div class="modal__subtitle">Наши менеджеры с радостью обсудят с Вами варианты участия
									в выставке и помогут подобрать максимально соответствующий Вашим маркетинговым целям и задачам формат
							</div>
							<div class="container__form">
			                	<div class="modal-buy-top">
			                    	<?
			                            if(have_rows('bilety')){
			                                ?>
			                                    <div class="bilety">
			                                        <?
			                                            while (have_rows('bilety')): the_row();
			                                                ?>
			                                                    <button class="bilet" type="button">
			                                                        <div class="bilet__text"><? the_sub_field('opisanie');?></div>
			                                                        <div class="bilet__price"><? the_sub_field('czena');?></div>
			                                                    </button>
			                                                <?
			                                            endwhile;
			                                        ?>
			                                    </div>
			                                            
			                                 <!--  <div class="modal-buy-summa">Сумма: <span>0.00</span> руб.</div>

			                                    <button type="button" class="button button_red modal-buy-button">Купить билет</button>  -->
			                                <?
			                            }
									?>
			                    </div>
			                    <div class="modal-buy-content">
			                        <?= do_shortcode('[contact-form-7 id="28478" title="Купить билет"]'); ?>
			                    </div>
								
							</div>
						</div>
					<?
				}
			?>
	</div>

	<div class="modal modal__middle" id="callback" style="display: none;">
        <div class="modal__wrap">
            <div class="modal__title">Обратный звонок</div>
            <div class="modal__subtitle">Заполните форму для связи.</div>
            <div class="container__form">
							<?= do_shortcode( '[contact-form-7 id="333" title="Контактная форма 1"]' ); ?>
            </div>
        </div>
    </div>
	
<?= get_option('common_scripts'); ?>
<?php wp_footer(); ?>
</div>

<div data-preloader-url="<?= bloginfo('template_directory'); ?>/logo.svg"></div>
<div class="preloader preloader__visible">
	<div class="preloader-spinner">
		<img src="<?= bloginfo('template_directory'); ?>/logo.svg" alt="">
	</div>
</div>


<script>
	
	jQuery('body').on('click', '.form-item', function(){
		setTimeout(() => {
			jQuery('[name="text-event"]').each((i, item) => {
				jQuery(item).val(jQuery('.main__title').text())
			});
		}, 500)
	})
	
</script>

<script>
// Проверка по классу body
if(document.body.classList.contains('module-page-template')) {
    document.querySelector('.header').classList.add('header--white');
}
</script>
</body>
</html>
