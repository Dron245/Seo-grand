<?php if(!strpos($_SERVER['HTTP_USER_AGENT'],'Chrome-Lighthouse')){ ?>
<div class="popups">
	
	<?php 
	if(!empty(get_field('forms_popup', 'option'))){ 
	
	while( have_rows('forms_popup', 'option') ): the_row(); 
		if(get_sub_field('image')){
			$popup_image_link = get_sub_field('image');
		}else{
			$popup_image_link = get_field('forms_popup-image', 'option');
		}
		$popup_image_margin = get_field('forms_popup-image_margin', 'option');
		$formTitle = $formDesk = $formEmail = $formTextarea = $formBtn = ""; // Обнуление переменных
	?>

    	<div id="popup-<?php echo get_sub_field('id'); ?>" class="popup <?php echo $popup_image_link ? "popup-img-enable" : "" ; ?> <?php echo $popup_image_margin ? "popup-margin" : "" ; ?>">
			<div class="popup-wrap">
				<?php if($popup_image_link){?>
				<div class="popup-image">
					<img src="<?php echo $popup_image_link; ?>" alt="">
				</div>
				<?php }?>
				<?php 
					$formTitle = get_sub_field('head');
					$formDesk = get_sub_field('text');
					$formName = "Ваше имя";
					if(get_sub_field('textarea')) {
						$formTextarea = "Ваше сообщение";
					}
					if(get_sub_field('email')) {
					$formEmail = "Ваш e-mail";
					}
					$formBtn = get_sub_field('btn');
					include (locate_template('blocks/block-form.php'));
				?>
			</div>
    	</div>
    
    <?php 
	endwhile; 
	} 
	?>
	
	<div id="popup-call" class="popup">
		<?php 
		$formTitle = "Заказать звонок";
		$formDesk = "Оставьте свой номер - наш специалист перезвонит в ближайшее время";
		$formName = "Ваше имя";
		$formTextarea = "";
		$formBtn = "Перезвоните мне";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>

	<div id="popup-consultation" class="popup">
		<?php 
		$formTitle = "Получить консультацию";
		$formDesk = "Заполните форму, мы свяжемся с вами";
		$formName = "Ваше имя";
		$formEmail = "";
		$formTextarea = "";
		$formBtn = "Получить консультацию";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>
	
	<div id="popup-order" class="popup">
		<?php 
		$formTitle = "Оставить заявку";
		$formDesk = "Оставьте свой номер - наш специалист перезвонит в ближайшее время";
		$formName = "Ваше имя";
		$formTextarea = "";
		$formBtn = "Отправить";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>
	
	<div id="popup-buy" class="popup">
		<?php 
		$formTitle = "Заказать продукт";
		$formDesk = "Заполните форму - наш специалист перезвонит в ближайшее время для уточнения деталей заказа";
		$formName = "Ваше имя";
		$formTextarea = "";
		$formBtn = "Оставить заявку";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>
	
	<div id="popup-price" class="popup">
		<?php 
		$formTitle = "Уточнить стоимость";
		$formDesk = "Заполните форму, мы свяжемся с вами и рассчитаем стоимость";
		$formName = "Ваше имя";
		$formTextarea = "";
		$formBtn = "Отправить";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>
	
	<div id="popup-mess" class="popup">
		<?php 
		$formTitle = "Оставить сообщение";
		$formDesk = "У Вас есть вопросы, предложения или пожелания? Напишите их нам";
		$formName = "Ваше имя";
		$formTextarea = "Ваше сообщение";
		$formBtn = "Отправить сообщение";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>
	
	<div id="popup-question" class="popup">
		<?php 
		$formTitle = "Есть вопрос?";
		$formDesk = "Напишите его в форме ниже и мы обязательно на него ответим";
		$formName = "Ваше имя";
		$formTextarea = "Ваш вопрос";
		$formBtn = "Отправить вопрос";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>

	<div id="popup-review" class="popup">
		<?php 
		$formTitle = "Добавить отзыв";
		$formDesk = "Напишите всем о своих впечатлениях";
		$formName = "Ваше имя";
		$formEmail = "";
		$formTextarea = "Ваш отзыв";
		$formBtn = "Отправить на публикацию";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>

	<div id="popup-signin" class="popup">
		<?php 
		$formTitle = "Регистрация";
		$formDesk = "Заполните форму. Логин и пароль будут отправлены на вашу почту.";
		$formName = "Ваше имя";
		$formEmail = "Email";
		$formTextarea = "";
		$formBtn = "Отправить";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>

	<div id="popup-lead" class="popup">
		<?php 
		$formTitle = "Записаться";
		$formDesk = "Заполните форму, мы свяжемся с вами";
		$formName = "Ваше имя";
		$formTextarea = "";
		$formBtn = "Отправить";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>

	<div id="popup-action" class="popup">
		<?php 
		$formTitle = "Участвовать в акции";
		$formDesk = "Заполните форму, мы свяжемся с вами";
		$formName = "Ваше имя";
		$formTextarea = "";
		$formBtn = "Отправить";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>

	<div id="popup-resume" class="popup">
		<?php 
		$formTitle = "Отозваться на вакансию";
		$formDesk = "Заполните форму, мы свяжемся с вами";
		$formName = "Ваше имя";
		$formTextarea = "";
		$formFile = "Прикрепить резюме";
		$formBtn = "Отправить";
		include (locate_template('blocks/block-form.php'));
		?>
	</div>

	<div id="popup-product" class="popup popup-product">
		<div class="popup-product-wrap">
			<div class="popup-product-content">
				<div class="header"></div>
				<div class="desc">
					Доставка по РФ и СНГ от 2 дней
				</div>
				<div class="image">
					<img src="" />
				</div>
				<div class="foot">
					<div class="phone">
						<?php echo do_shortcode('[phone]') ?>
					</div>
					<div class="email">
						<?php echo do_shortcode('[email]') ?>
					</div>
				</div>
			</div>
			<div class="popup-product-form">
				<?php 
				$formTitle = "Заказать расчёт";
				$formDesk = "";
				$formName = "Ваше имя";
				$formTextarea = "";
				$formFile = "";
				$formBtn = "Заказать расчёт";
				include (locate_template('blocks/block-form.php'));
				?>
			</div>
		</div>
	</div>
	
</div>

<?php } ?>