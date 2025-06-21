<div class="product-body">
	<div class="product-flex">
		<?php
			// Картинки
			include_once(locate_template('catalog-parts/product-hero/body-image-block.php'));
			
			// Краткое описание и детали
			include_once(locate_template('catalog-parts/product-hero/body-text-block.php'));
			
			// Цены, доставка и оплата
			//include_once(locate_template('catalog-parts/product-hero/body-order-block.php'));
		?>
	</div>
	<div class="text-content">
		<?/*=the_content()*/?>
		<?
			$content = get_the_content();
			$cont = str_replace('%Name%', get_the_title(), $content);
			$cont = str_replace('%Tel1%', '<a href="tel:+73512203081">+7 (351) 220-30-81</a>', $cont);
			$cont = str_replace('%Tel2%', '<a href="tel:+73517770577">+7 (351) 777-05-77</a>', $cont);
			$cont = str_replace('%Mail%', '<a href="mailto:trs@zavod-kts.ru">trs@zavod-kts.ru</a>', $cont);
			
			echo $cont;
		?>
	</div>
</div>