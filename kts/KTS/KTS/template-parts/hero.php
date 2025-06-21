<?php 
/*
	Первый экран
	====================
*/

$hero_bg_style = "";
$hero_image_class = "";
$hero_white_text_class = "";
$hero_group = get_field($field_preffix_hero.'group',$field_postfix);
$hero_setting = get_field($field_preffix_hero.'hero-setting',$field_postfix);

// Настройки первого экрана
$disable_section = $hero_setting['disable-section'];
$disable_text = $hero_setting['disable-text'];

// Позиционирование текста
$hero_align = 'align-text-'.get_field('hero-align', 'option');

// Высота экрана
$hero_height = '';
if(get_field('hero-height', 'option')){
$hero_height = 'min-height: '.get_field('hero-height', 'option').'; ';
}
	
// Фоновая картинка
$hero_bg = $hero_group['hero-bg']['url'];
$hero_bg_style = '';
if($hero_bg){
	$hero_bg_style = 'background-image: url('.$hero_bg.'); ';
	$hero_bg_class = 'bg';
}else{
	$hero_bg_class = 'no-bg';
}

//
$hero_style = 'style="'.$hero_height.$hero_bg_style.'"';

// Фоновая картинка для мобильников
$hero_bg_sm = $hero_group['hero-bg-sm'];

// Персонаж
$hero_image = $hero_group['hero-image'];
if(!empty($hero_image)){
	$hero_image_class = "hero-image";
}

// Белый текст
$hero_white_text = $hero_group['hero-white_text'];
if($hero_white_text){
	$hero_white_text_class = "hero-white";
}

// Заголовок и описание
$hero_header = get_field($field_preffix_hero.'hero-header',$field_postfix);

// Преимущества
$hero_benefits = get_field($field_preffix_hero.'benefits',$field_postfix);
if($hero_benefits){
$hero_benefits_count = count($hero_benefits);
}

// Кнопка
$hero_btn = $hero_group['hero-btn'];
$hero_btn_desc = $hero_group['hero-btn-desc'];
$hero_id_marquiz = $hero_group['id_marquiz'];
$hero_id_unic_popup = $hero_group['id_unic_popup'];
$hero_btn_link = $hero_group['uni-link'];

$hero_class = $hero_white_text_class.' '.$hero_align;

// Если есть текст в поле "hero-header", то будет выводиться большое окно с текстом, картинкой и кнопкой, в противном случае - заглушка с хлебными крошками и названием
if(!$disable_section) {
if($hero_header) {

?>

	<section id="hero" class=" <?php echo !empty($hero_bg_sm) ? 'hero_bg_sm' : '' ; ?> <?php echo $hero_image_class.' '.$hero_white_text_class.' '.$hero_bg_class.' '.$hero_align; ?>" <?php echo $hero_style; ?>>

		<?php // Картинка персонажа ?>
		<?php if($hero_image && empty($hero_bg_sm)){ ?>
		<div class="hero-image-sm" style="background-image: url(<?php echo $hero_bg; ?>)">
			<div class="image">
				<img src="<?php echo $hero_image; ?>">
			</div>
			
			<?php if($hero_group['hero-name']){ ?>
			<div class="name-block">
				<div class="name"><?php echo get_field($field_preffix_hero.'group')['hero-name']; ?></div>
				<div class="position"><?php echo get_field($field_preffix_hero.'group')['hero-position']; ?></div>
			</div>
			<?php } ?>
			
		</div>
		<?php } ?>
		
		<?php if(!$disable_text) { ?>		
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-7 col-lg-8 col-ml-7 col-md-7 col-12">
					<div class="main">
						<div class="wrap">
						
							<?php // если есть меню и если это страница и у неё есть родитель, то включаем крошки ?>
							<?php if ( has_nav_menu( 'main_menu' ) && ((is_page()&&($post->post_parent !== 0)) || is_tax()) ){?>
							<div id="breadcrumbs">
								<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
							</div>
							<?php } ?>
							
							<?php // Картинка для мобильников ?>
							<?php if( wp_is_mobile() ){ ?>
							<?php if(!empty($hero_bg_sm)){ ?>
							<div class="image-mobile">
								<img src="<?php echo $hero_bg_sm; ?>">
							</div>
							<?php } ?>
							<?php } ?>
						
							<? // Заголовок и описание ?>
							<div class="header list">
								<?php echo predlog($hero_header); ?>
							</div>
							
							<? // Преимущества ?>
							<?php if($hero_benefits){ ?>
							<ul class="benefits benefits-<?php echo $hero_benefits_count; ?> ">
							<?php 					
							while( have_rows($field_preffix_hero.'benefits',$field_postfix) ): the_row(); 
								$icon = get_sub_field('icon');
								$text = get_preg_field('text', 1);
								?>	
								<li>
									<?php if($icon){ ?>
									<span class="icon"><img src="<?php echo $icon; ?>" alt="<?php echo $text; ?>"></span>
									<?php } ?>
									<span class="text"><?php echo $text; ?></span>
								</li>
							<?php 
							endwhile;
							wp_reset_query();
							?>
							</ul>
							<?php } ?>
							
							
							<? // Кнопка ?>
							<?php if($hero_btn){ ?>
							<div class="button">
							
								<?php if($hero_id_marquiz){ // Если указан ID marquiz ?>
									<a data-marquiz="<?php echo $hero_id_marquiz; ?>" href="#popup:marquiz_<?php echo $hero_id_marquiz; ?>" class="btn" anim="ripple"><span><?php echo $hero_btn; ?></span></a>
								<?php }elseif($hero_btn_link){ // Если указана ссылка ?>
									<a href="<?php echo $hero_btn_link; ?>" class="btn" anim="ripple"><span><?php echo $hero_btn; ?></span></a>
								<?php }elseif($hero_id_unic_popup){ // Если указан ID уникальной формы ?>
									<button data-src="#popup-<?php echo $hero_id_unic_popup; ?>" data-fancybox class="btn" anim="ripple"><span><?php echo $hero_btn; ?></span></button>
								<?php }else{ // Обычная форма ?>
									<button data-src="#popup-order" data-fancybox class="btn" anim="ripple"><span><?php echo $hero_btn; ?></span></button>
								<?php } ?>
								
								<?php if($hero_btn_desc){ ?>
									<div class="hero-btn-desc"><?php echo predlog($hero_btn_desc); ?></div>
								<?php } ?>
							</div>
							<?php } ?>
							
						</div>
					</div>
				</div>
				<?php if($hero_group['hero-image']){ ?>
				<div class="col-xl-5 col-lg-4 col-ml-5 col-md-5 hidden-sm hidden-xs">
					<div class="hero-image">
						<div class="image">
							<img src="<?php echo $hero_image; ?>">
						</div>
						<?php if($hero_group['hero-name']){ ?>
						<div class="name-block">
							<div class="name"><?php echo $hero_group['hero-name']; ?></div>
							<div class="position"><?php echo $hero_group['hero-position']; ?></div>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
	</section>

<?php }else{ ?>

	<section id="hero" class="no-content <?php echo $hero_group['hero-image'] ? "hero-image" : ""; ?> <?php echo $hero_group['hero-white_text'] ? "hero-white" : ""; ?>">	

		<?php if(!$disable_text) { ?>		
		<div class="container-fluid">
			<div class="main">
				<div class="hero-wrap">
					<div id="breadcrumbs">
						<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
					</div>
					<div class="header list ct">
						<h1><?php echo $post_name; ?></h1>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		
	</section>
	
<?php } ?>
<?php } ?>