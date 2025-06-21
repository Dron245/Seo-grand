<div id="sidebar-form-left">
	<div class="sidebar-form">
	<?php 
		$formTitle = "Оставить заявку";
		$formDesk = "Мы свяжемся с Вами в течение 10 минут";
		$formName = "Ваше имя";
		$formTextarea = "";
		$formBtn = "Отправить";
		include (locate_template('blocks/block-form.php'));
	?>
	</div>
	<div class="sidebar-benefit list-benefit">
		<ul>
			<li>Поставляем по России, а также в <strong>Казахстан, Узбекистан, Таджикистан, Кыргызстан</strong> и др. страны</li>
			<li>Полный пакет таможенных документов</li>
			<li>Труба в наличии - можем нанести покрытие как на ваши, так и на наши трубы</li>
		</ul>
	</div>
	<div class="sidebar-order">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><path d="M39.805 20.594l-19.929 27a1.001 1.001 0 0 1-.805.406.98.98 0 0 1-.384-.077.998.998 0 0 1-.605-1.075L20.834 29H9a1 1 0 0 1-.805-1.594l19.929-27a1 1 0 0 1 1.793.746L27.166 19H39a1 1 0 0 1 .805 1.594z" fill="#ffce33"/></svg>
		<span>Для быстрого расчета вашей заявки отправьте ее на почту <?php echo do_shortcode('[email]'); ?></span>
	</div>
</div>