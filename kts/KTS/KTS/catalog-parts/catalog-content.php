<?php
// Определение типа записи
include(locate_template('template-parts/type-page.php'));

// первый экран
$catalog_design = get_field('catalog-design', 'option');
$catalog_disable = $catalog_design['disable'];

// Количество постов текущего термина
$count_parent_posts = get_term($term_cat_ID)->count;

// Определение наличия дочерних терминов и суммирование количества постов
$terms = get_term_children($term_cat_ID, $taxonomy);
$count_child_posts = 0;
foreach ($terms as $key => $value) {
	$count_child_posts += get_term($value)->count;
}

// Общее количество постов таксономии
$count_posts = $count_parent_posts + $count_child_posts;
$post_type = get_post_type(2362);
$post_types = get_post_types();
//if($count_posts > 0 || is_post_type_archive('catalog')){
$url = $_SERVER['REQUEST_URI'];

// оставим только термины с parent=0
$terms = wp_list_filter($terms, array('parent' => 0));

// Первый экран не отключен
if(!in_array('catalog-hero', $catalog_disable) && $object_name != 'truby' &&  !is_tax(array('truby_category','truby_diameter','truby_standart','truby_steel','truby_endurance', 'truby_factory'))){

	// первый экран
	if(get_field($field_preffix_hero.'hero3',$field_postfix) && get_field($field_preffix_hero.'hero3',$field_postfix)[0]['group__text']['text']){
		include_once(locate_template('template-parts/hero3.php'));
	}else{
		include_once(locate_template('template-parts/hero.php'));
	}

}

if( is_object_in_taxonomy('truby', $taxonomy) || is_post_type_archive('truby')){
	switch ($taxonomy) {
		case 'truby_category' :
			$prefix_cat = 'Трубы стальные ';
			break;
		case 'truby_diameter' :
			$prefix_cat = 'Трубы стальные ';
			break;
		case 'truby_standart' :
			$prefix_cat = 'Трубы стальные ';
			break;
		case 'truby_steel' :
			$prefix_cat = 'Трубы стальные ';
			break;
		case 'truby_endurance' :
			$prefix_cat = 'Труба стальные ';
			break;
	}

?>
<section id="balls-cart" class="">
	<div class="container-fluid">

		<div class="carts-wrap">

			<?php if (is_post_type_archive('truby')) { $classTable='truby-filter';?>
				<div>
					<div class="filter__inner">
						<div id="filterbar">
							<?php get_template_part('catalog-parts/left-aside-navigation'); ?>
						</div>
						<a href="" class="filter__inner--btn">Показать всё</a>
						
					</div>

					<?php get_template_part('template-parts/sidebar'); ?>
				</div>
			<?php } ?>

			<div id="products" <?=($classTable?"class='".$classTable."'":"")?>>

			
			<div class="hero-wrap">
				<div id="breadcrumbs">
					<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
				</div>
				<div class="header list ct">
					<h1><?php echo $prefix_cat.$post_name; ?></h1>
				</div>
			</div>
			
			<?php get_template_part('catalog-parts/filter', null, ['container' => '#products .carts', 'update_url' => false]); ?>
				<div class="products-row carts <?=(!is_post_type_archive('truby')?"carts-table-n":"")?>">
					<table class="table truby-table">
						
						<?php
						function card_terms($card_tax)
						{
							$cur_terms = get_the_terms(get_the_ID(), $card_tax);
							if (is_array($cur_terms)) {
								foreach ($cur_terms as $cur_term) {
									$tags_post[] = $cur_term->name;
								}
							}
							echo implode('; ', $tags_post);
						}

						while (have_posts()) : the_post();
							include(locate_template('catalog-parts/product-item.php'));
						endwhile;
						?>
					</table>
				</div>

				<?php get_template_part('template-parts/pagination-next', null, ['container' => '#products .carts']);
				?>
				<?php get_template_part('template-parts/pagination'); ?> 
				
				<?php if (!is_post_type_archive('truby')) { ?>
					
						<?php get_template_part('template-parts/sidebar-bottom'); ?> 
					
				<?php } ?>	

			</div>
			<?php get_template_part('template-parts/form-down'); ?> 
			

		</div>

	</div>
</section>


<?php
}elseif(is_object_in_taxonomy('izolyaciya', $taxonomy)){
	
	$object = get_queried_object();
	$term_cat_ID = $object->term_id;
	
	$postfix_good = "";
	switch ($term_cat_ID) {
	case '288' :
		$postfix_good = ' в битумной изоляции';
		break;
	case '291' :
		$postfix_good = ' в полиуретановой изоляции';
		break;
	case '290' :
		$postfix_good = ' в эпоксидной изоляции';
		break;
	case '287' :
		$postfix_good = ' в изоляции экструдированным полиэтиленом';
		break;
	}
	?>

	<section id="balls-cart" class="no_top">
		<div class="container-fluid">
	
			<div class="carts-wrap small-cards-list">
				
				<?php get_template_part('template-parts/sidebar'); ?> 
				<div id="products">
					<div class="products-row carts">
						<table class="table">
							<?php
							function card_terms($card_tax)
							{
								$cur_terms = get_the_terms(get_the_ID(), $card_tax);
								
								if (is_array($cur_terms)) {
									foreach ($cur_terms as $cur_term) {
										$tags_post[] = $cur_term->name;
									}
								}
								echo implode('; ', $tags_post);
							}
	
							$hero3 = get_field($field_preffix_hero.'hero3',$field_postfix);
							if($hero3){
								$cat_image = $hero3[0]['group__style']['person']['url'];
							} else {
								$cat_image =  THEME_IMAGES .'/popup-img.webp';
							}
							//global $wp_query; print_r($wp_query->request); 
							while (have_posts()) : the_post();
								// 	КАРТОЧКА ТОВАРА 
								
								?>
<? /*if($_GET['test']==1){
$a1= array(
		'<h2>Характеристики</h2>
<p>%Name% это труба с изоляцией в виде пенополиуретановой скорлупы. Пенополиуретан является лучшим теплоизолятором. Снаружи ППУ скорлупа покрыта фольгированным слоем или слоем стеклопластика, что значительно увеличивает срок службы покрытия.</p>',
		'<h2>Характеристики</h2>
<p>%Name% представляет собой трубу, изолированную пенополиуретановой скорлупой. Пенополиуретан считается одним из лучших теплоизоляторов, обеспечивая эффективное сохранение тепла. Внешняя поверхность ППУ скорлупы может быть покрыта фольгированным слоем или слоем стеклопластика, что значительно увеличивает срок службы изоляции и защищает её от внешних воздействий.</p>',
		'<h2>Характеристики</h2>
<p>%Name% это изоляция для труб, выполненная из пенополиуретана, который является превосходным теплоизолятором. Для увеличения срока службы и защиты изоляции, снаружи скорлупа покрывается фольгированным слоем или стеклопластиком.</p>',
		'<h2>Характеристики</h2>
<p>%Name% используется для изоляции труб, обеспечивая отличные теплоизоляционные свойства. Внешнее покрытие из фольги или стеклопластика на ППУ скорлупе значительно продлевает срок её эксплуатации и защищает от внешних факторов.</p>'
				
	);


	$a2= array(
		'<h2>Сфера применения</h2>
<p>Подобные изделия применяются при строительстве трубопроводов (водопровод, воздухопровод и прочее), теплотрассы, ЖКХ коммуникаций. Все изделия с пенополиуретановой изоляцией от завода «КТС» имеют сертификат соответствия ГАЗСЕРТ.</p>',
		'<h2>Сфера применения</h2>
<p>Подобные изделия используются при строительстве различных трубопроводов, включая водопроводы и воздухопроводы, а также теплотрасс и коммунальных коммуникаций. Все изделия с пенополиуретановой изоляцией, производимые заводом «КТС», сертифицированы и имеют сертификат соответствия ГАЗСЕРТ.</p>',
		'<h2>Сфера применения</h2>
<p>Продукция используется для строительства различных трубопроводов, включая водопроводные и воздухопроводные системы, а также для теплотрасс и коммунальных коммуникаций. Изделия с пенополиуретановой изоляцией, производимые заводом «КТС», имеют сертификат соответствия ГАЗСЕРТ.</p>',
		'<h2>Сфера применения</h2>
<p>Эти изделия применяются в строительстве трубопроводов, таких как водопроводы и воздухопроводы, а также в теплотрассах и системах ЖКХ. Все изделия с пенополиуретановой изоляцией от завода «КТС» обладают сертификатом соответствия ГАЗСЕРТ.</p>'
				
	);


	$a3= array(
		'<h2>Гарантии</h2>
<p>ООО «КТС» работает уже более 10 лет на рынке поставок трубы стальной. Все поставляемые нами стальные трубы проходят строгий контроль качества на протяжении всего цикла производства и соответствуют всем государственным стандартам. Они изготовлены из высококачественной стали, устойчивой к коррозии и износу.</p>',
		'<h2>Гарантии</h2>
<p>Мы имеем многолетний опыт работы на рынке трубопроката. Мы готовы предоставить гарантию на все наши изделия, т.к. в производстве используются  материалы исключительно высокого качества. Также наша компания гарантирует высокую скорость и доставку до вашего производства либо строительной площадки.</p>',
		'<h2>Гарантии</h2>
<p>ООО «КТС» является одним из ведущих предприятий на рынке металлопроката. Мы осуществляем проверку качества на каждом этапе производства. Наши изделия изготовлены только из высококачественных материалов, соответствующих всем стандартам производства.</p>
<p>Мы гарантируем высокое качество изделий и оперативную доставку до производства или площадки проведения строительных работ.</p>',
		'<h2>Гарантии</h2>
<p>Наша компания имеет многолетний опыт работы в поставке трубы стальных электросварных. Организовано качественное полноцикловое производство изделий с проверкой продукта на каждом этапе. Мы гарантируем соответствие изготовленных труб всем стандартам ГОСТ и готовы осуществить безопасную и быструю отгрузку, а также транспортировку ваших изделий прямо до строительной площадки или производства.</p>'
	);


	$a4= array(
		'<h2>Контактные данные</h2>
<p>Мы доставим приобретенные вами трубы в любой город России или стран СНГ. Если вы хотите что-то уточнить, об интересующих вас диаметрах, ГОСТах, марках стали, то вы можете связаться с нами:</p>
<ul>
<li>%Tel1%</li>
<li>%Tel2%</li>
<li>%Mail%</li>
</ul>',
		'<h2>Контактные данные</h2>
<p>ООО «КТС» осуществляет доставку продукции по всем городам в РФ и странах СНГ. По любым возникающим у вас вопросам вы можете обратиться к нам по указанным контактным данным:</p>
<ul>
<li>%Tel1%</li>
<li>%Tel2%</li>
<li>%Mail%</li>
</ul>',
		'<h2>Контактные данные</h2>
<p>Если вы захотите уточнить характеристики интересующих вас изделий, вы можете связаться с нашим отделом продаж по контактным данным:</p>
<ul>
<li>%Tel1%</li>
<li>%Tel2%</li>
<li>%Mail%</li>
</ul>
<p>Мы осуществляем доставку в любой город России и стран СНГ.</p>',
		'<h2>Контактные данные</h2>
<p>Если у вас появились вопросы, вы можете связаться с нашими менеджерами по следующим контактным данным:</p>
<ul>
<li>%Tel1%</li>
<li>%Tel2%</li>
<li>%Mail%</li>
</ul>
<p>Мы также осуществляем доставку продукции по всей территории РФ и стран ближнего зарубежья, подробный список можно увидеть на нашем сайте в разделе доставка.</p>'
	);

$b = array($a1[rand(0,3)],$a2[rand(0,3)],$a3[rand(0,3)],$a4[rand(0,3)]);


$text= Implode($b);

global $wpdb;
$wpdb->get_results( "UPDATE milk_posts SET post_content='".$text."'  WHERE ID=".$id."" );


}*/?>
								<tr class="card-tr">
							
									<td class="card-td card-td--title card-td--title--one">
										<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title().$postfix_good; ?></a>
										<div class="gear"></div>
									</td>
									<td class="card-td card-standart">
										<span class="card-td--name">Стандарт</span> <?php card_terms('izolyaciya_standart'); ?>
									</td>
									<td class="card-td card-td--btn"
									data-fancybox="" 
									data-src="#popup-product" 
									data-header="<?php echo get_the_title().$postfix_good; ?>"
									data-image="<?php echo $cat_image; ?>">
								
										<div class="card-td--presence">
											<div class="stock">
												<div class="stock_icon">
													<div class="stock__icon-inner">
														<svg xmlns="http://www.w3.org/2000/svg" width="9" height="6" viewBox="0 0 9 6" fill="none">
															<path d="M3.62482 5.99995C3.4809 5.99995 3.33684 5.9453 3.22739 5.83502L0.789795 3.39757C0.570068 3.1777 0.570068 2.82147 0.789795 2.60175C1.00966 2.38202 1.36589 2.38202 1.58562 2.60175L3.62564 4.64177L7.35316 0.914246C7.57289 0.694519 7.92912 0.694519 8.14885 0.914246C8.36858 1.13397 8.36858 1.4902 8.14885 1.71007L4.0239 5.83502C3.9128 5.9453 3.76888 5.99995 3.62482 5.99995Z" fill="#6FCF97"></path>
														</svg>
													</div>
													в наличии
												</div>
								
											</div>
											<button class="card-btn btn">
												<span>Заказать</span>
											</button>
										</div>
									</td>
								</tr>
							<?php endwhile; ?>
						</table>
					</div>
					
					<?php get_template_part('template-parts/pagination-next', null, ['container' => '#products .carts']);
					?>
					<?php get_template_part('template-parts/pagination'); ?> 
				</div>
				<?php get_template_part('template-parts/form-down'); ?> 
			</div>
		</div>
	</section>
<?php
}elseif(is_object_in_taxonomy('detaly', $taxonomy)){
	if($term_cat_ID==662){
		include(locate_template('template-parts/detaly-catalog.php'));
	}else{
	$object = get_queried_object();
	$term_cat_ID = $object->term_id;
	
	$postfix_good = "";
	switch ($term_cat_ID) {
	case '294' :
		$postfix_good = ' в ВУС изоляции';
		break;
	case '288' :
		$postfix_good = ' в битумной изоляции';
		break;
	case '292' :
		$postfix_good = ' в ППМ изоляции';
		break;
	case '289' :
		$postfix_good = ' в ППУ изоляции';
		break;
	case '291' :
		$postfix_good = ' в полиуретановой изоляции';
		break;
	case '293' :
		$postfix_good = ' в ЦПП изоляции';
		break;
	case '290' :
		$postfix_good = ' в эпоксидной изоляции';
		break;
	case '287' :
		$postfix_good = ' в изоляции экструдированным полиэтиленом';
		break;
	}
	?>
	<section id="balls-cart" class="no_top">
		<div class="container-fluid">
	
			<div class="carts-wrap small-cards-list">
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
				<div id="products" class="nlk-cat">
					<div class="products-row carts">
						<table class="table">
							<?php
							function card_terms($card_tax)
							{
								$cur_terms = get_the_terms(get_the_ID(), $card_tax);
								if (is_array($cur_terms)) {
									foreach ($cur_terms as $cur_term) {
										$tags_post[] = $cur_term->name;
									}
								}
								echo implode('; ', $tags_post);
							}
	
							$hero3 = get_field($field_preffix_hero.'hero3',$field_postfix);
							if($hero3){
								$cat_image = $hero3[0]['group__style']['person']['url'];
							// } else {
							// 	$cat_image =  THEME_IMAGES .'/popup-img.webp';
							}
							
							while (have_posts()) : the_post();
								// 	КАРТОЧКА ТОВАРА 
								
								?>
								
								<tr class="card-tr" 
									data-fancybox="" 
									data-src="#popup-product" 
									data-header="<?php echo get_the_title().$postfix_good; ?>"
									data-image="<?php echo $cat_image; ?>"
									>
									<td class="card-td card-td--title card-td--title--one" data-header="<?php echo get_the_title().$postfix_good; ?>"
									data-image="<?php echo $cat_image; ?>">
										<?php echo get_the_title().$postfix_good; ?>
									</td>
									<td class="card-td" data-header="<?php echo get_the_title().$postfix_good; ?>"
									data-image="<?php echo $cat_image; ?>">
										<span class="card-td--name">Сталь</span> <?php card_terms('detaly_steel'); ?>
									</td>
									<td class="card-td" data-header="<?php echo get_the_title().$postfix_good; ?>"
									data-image="<?php echo $cat_image; ?>">
										<span class="card-td--name">Стандарт</span> <?php card_terms('detaly_standart'); ?>
									</td>
									<td class="card-td card-td--btn" data-header="<?php echo get_the_title().$postfix_good; ?>"
									data-image="<?php echo $cat_image; ?>">
								
										<div class="card-td--presence">
											<div class="stock">
												<div class="stock_icon">
													<div class="stock__icon-inner">
														<svg xmlns="http://www.w3.org/2000/svg" width="9" height="6" viewBox="0 0 9 6" fill="none">
															<path d="M3.62482 5.99995C3.4809 5.99995 3.33684 5.9453 3.22739 5.83502L0.789795 3.39757C0.570068 3.1777 0.570068 2.82147 0.789795 2.60175C1.00966 2.38202 1.36589 2.38202 1.58562 2.60175L3.62564 4.64177L7.35316 0.914246C7.57289 0.694519 7.92912 0.694519 8.14885 0.914246C8.36858 1.13397 8.36858 1.4902 8.14885 1.71007L4.0239 5.83502C3.9128 5.9453 3.76888 5.99995 3.62482 5.99995Z" fill="#6FCF97"></path>
														</svg>
													</div>
													в наличии 
												</div>
								
											</div>
											<button class="card-btn btn" data-header="<?php echo get_the_title().$postfix_good; ?>"
									data-image="<?php echo $cat_image; ?>">
												<span>Заказать</span>
											</button>
										</div>
									</td>
								</tr>
							<?php endwhile; ?>
						</table>
					</div>
					
					<?php get_template_part('template-parts/pagination-next', null, ['container' => '#products .carts']);
					?>
					<?php get_template_part('template-parts/pagination'); ?> 

				</div>
					<?php get_template_part('template-parts/form-down'); ?> 
			</div>
		</div>
	</section>



<?php
}
}

// Модули
include_once(locate_template('template-parts/modules.php'));
get_template_part('modules/section', 'team');
get_template_part('blocks-custom/block-about'); 
get_template_part('blocks-custom/block-reviews'); 
get_template_part('blocks/block', 'clients');
include_once(locate_template('blocks/block-manager.php'));
?>