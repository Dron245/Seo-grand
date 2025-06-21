<?php
	get_header();
	
	// Переменные 
	include_once(locate_template('catalog-parts/product-fields.php'));
	
	// Первый экран
	include_once(locate_template('catalog-parts/product-hero.php'));
	
	// Описание, характеристики, область применения, документы, менеджер
	//include_once(locate_template('catalog-parts/product-content.php'));
	
	// Похожие товары
	//include_once(locate_template('catalog-parts/product-semilar.php'));
	
	// Модули
	include_once(locate_template('template-parts/modules.php'));
	get_template_part('modules/section', 'team');
	get_template_part('blocks-custom/block-about'); 
	get_template_part('blocks-custom/block-reviews'); 
	get_template_part('blocks/block', 'clients');
	include_once(locate_template('blocks/block-manager.php'));

	get_footer();
?>