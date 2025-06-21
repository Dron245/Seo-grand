<?
// Генерация заголовка
if($_SERVER['HTTP_REFERER']){
	$count = substr_count($_SERVER['HTTP_REFERER'], "/epoksidnaya/");
	if ($count > 0) {
		$dopHead = "в эпоксидной изоляции"; 
    	$dop = "Эпоксидная";
	} 
	$count2 = substr_count($_SERVER['HTTP_REFERER'], "/bitumnaya/");
	if ($count2 > 0) {
		$dopHead = "в битумной изоляции";
    	$dop = "Битумная";
	} 
	$count3 = substr_count($_SERVER['HTTP_REFERER'], "/poliuretanovaya/");
	if ($count3 > 0) {
		$dopHead = "в полиуретановой изоляции";
    	$dop = "Полиуретановая";
	} 


}





$queried_object = get_queried_object();
$post_type = $queried_object->post_type;
$post_type_name = get_post_type_object($post_type)->labels->singular_name;

$post_ID = get_the_ID();
$post_title = get_the_title();

$truby_category = wp_get_post_terms($post_ID,'truby_category')[0]->name;
$truby_diameter = wp_get_post_terms($post_ID,'truby_diameter')[0]->name;
$truby_steel = wp_get_post_terms($post_ID,'truby_steel')[0]->name;
$truby_standart = wp_get_post_terms($post_ID,'truby_standart')[0]->name;
$truby_endurance = wp_get_post_terms($post_ID,'truby_endurance')[0]->name;

$izolyaciya_category = wp_get_post_terms($post_ID,'izolyaciya_category')[0]->name;

if(wp_get_post_terms($post_ID,'izolyaciya_standart')[1]->name){
	$izolyaciya_standart = wp_get_post_terms($post_ID,'izolyaciya_standart')[1]->name;
}else{
	$izolyaciya_standart = wp_get_post_terms($post_ID,'izolyaciya_standart')[0]->name;
}


function remove_before_x($string) {
    // Проверяем, есть ли 'х' в строке
    if (strpos($string, 'х') !== false) {
        // Удаляем всё, что находится перед 'х', включая 'х'
        return preg_replace('/.*х/u', '', $string);
    } else {
        // Если 'х' нет в строке, возвращаем пустую строку
        return '';
    }
}


function get_second_word($string) {
	// Используем регулярное выражение для поиска слов
	if (preg_match('/^\S+\s+(\S+)/u', $string, $matches)) {
		// Возвращаем второе слово
		return $matches[1];
	} else {
		// Если второе слово не найдено, возвращаем пустую строку
		return '';
	}
}
function remove_non_numeric($string) {
	return preg_replace('/\D/u', '', $string);
}
//print("<pre>".strip_tags(print_r(remove_before_x($post_title),true))."</pre>");

$stenka = strip_tags(remove_before_x($post_title),true);
if($stenka){
	$truby_diameter = explode(' ', $truby_diameter);
	$truby_diameter = $truby_diameter[0].'х'.$stenka.' мм';
}

if($post_type == 'truby'){
	$title = $post_type_name.' '.$truby_diameter.' '.$truby_steel.' '.$truby_standart;
	$desc = 'Новая <span>'.$post_type_name.'</span> '.$truby_diameter.' '.$truby_standart.' '.$truby_steel.'. Трубы '.$truby_category.' в наличии и под заказ. Цены со склада и с доставкой. Расчет веса.';
}else{
	$title = $post_title.' '.($dopHead?$dopHead:'').' '.$izolyaciya_standart;
	$desc = 'Новая <span>'.$post_title.'</span> '.$izolyaciya_standart;
}



$terms_arr = get_terms(['object_ids'=>$id]);
foreach( $terms_arr as $term_detail ) {
	$item_tax = $term_detail->taxonomy;
	$item_term_ID = $term_detail->term_id;
	$item_term_name = $term_detail->name;
	if($item_tax == "truby_diameter"){
		$cat_image = get_field('cat_image', $item_tax.'_'.$item_term_ID)[0]['sizes']['boss'];
	}
	if(!$cat_image){
		$cat_image = "/wp-content/uploads/2022/Bezymyannyj-1-1.jpg";
	}
};



?>


<div class="text-block">
	<div class="header" itemprop="name">
		<h1><?php echo $title; ?></h1>
	</div>
	
	<?php
	// Формирование звездного рейтинга
	include(locate_template('template-parts/rating-generate.php'));
	?>
	
	<?php if($intro){ ?>
	<div class="intro list" itemprop="description">
		<?php echo $intro; ?>
	</div>
	<?php }else{ ?>
	<div class="intro list" itemprop="description">
		<?php echo $desc; ?>
	</div>
	<?php } ?>
	
	<?php 
	$diam = get_field('diam');
	
	
	 ?>
	<div class="card-parameters">
		<ul>			

		<? if($post_type == 'truby'){ ?>
			<li>Тип трубы: <span class="value"><?php echo get_second_word($post_title); ?></span></li>
			<li>Категория: <span class="value"><?php echo $truby_category; ?></span></li>
			<li>Диаметр x Стенка: <span class="value"><?/*php echo remove_non_numeric($truby_diameter).'х'.remove_before_x($post_title); ?> мм*/?><?=$truby_diameter?></span></li>
			<li>Стандарт: <span class="value"><?php echo $truby_standart; ?></span></li>
			<li>Кл. прочности: <span class="value"><?php echo $truby_endurance; ?></span></li>
			
		<? }elseif($post_type == 'izolyaciya'){ ?>
			<li>Категория: <span class="value"><?=($dop?$dop:$izolyaciya_category);?></span></li>
				
			<?
			$trehslojnaya = substr_count($_SERVER['HTTP_REFERER'], "trehslojnaya-vus-izolyaciya-trub");
			if($trehslojnaya>0){
				$dm = rtrim(remove_non_numeric($post_title), '3');
			}

			$dvuhslojnaya = substr_count($_SERVER['HTTP_REFERER'], "dvuhslojnaya-vus-izolyaciya-trub");
			if($dvuhslojnaya>0){
				$dm = rtrim(remove_non_numeric($post_title), '2');
			}

			?>

			<li>Диаметр: <span class="value"><?php echo ($dm?$dm:remove_non_numeric($post_title)); ?> мм</span></li>
			<li>Стандарт: <span class="value"><?php echo $izolyaciya_standart; ?></span></li>
		<? }elseif($post_type == 'detaly'){ ?>
		<? } ?>
			
			<li>Состояние: <span class="value">Новое</span></li>
			<li>Наличие: <span class="value">В наличии</span></li>
		<ul>
	</div>
	
	<div class="button"><button class="btn item-popup" data-fancybox data-src="#popup-product" data-header="<?=$post_title?>" data-image="<?=$cat_image?>"><span>Заказать</span></button></div>
	
</div>


