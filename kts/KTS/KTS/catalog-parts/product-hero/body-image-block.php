<?
// $cur_terms = get_the_terms( get_the_ID(), 'truby_diameter' );
// if(is_array($cur_terms)){
// 	$cur_term_id = $cur_terms[0]->term_id;
// }
// 
// $term_images = get_field('cat_image', 'truby_diameter_'.$cur_term_id);	// Картинки категории
// $post_images = get_field('image');
// 
// $images = $post_images ?: $term_images ;
//print("<pre>".strip_tags(print_r($images,true))."</pre>");

function get_post_or_term_image($post_id, $taxonomies) {
	if (!is_array($taxonomies)) {
		$taxonomies = [$taxonomies];
	}


	// Перебираем каждую таксономию
	foreach ($taxonomies as $taxonomy) {
		// Получаем термины для текущей таксономии
		$cur_terms = get_the_terms($post_id, $taxonomy);
		
		// Проверяем, что термины найдены и являются массивом
		if (is_array($cur_terms) && !empty($cur_terms)) {
			// Перебираем термины
			foreach ($cur_terms as $cur_term) {
				// Получаем изображение для текущего термина
				$term_image = get_field('cat_image', $taxonomy . '_' . $cur_term->term_id);

				// Если найдено изображение, возвращаем его
				if ($term_image) {
					return $term_image;
				}
			}
		}
	}

	// Если изображение термина не найдено, пытаемся получить изображение записи
	$post_image = get_field('image', $post_id);
	if ($post_image) {
		return $post_image;
	}

	// Возвращаем null, если изображение не найдено ни у записи, ни у терминов
	return null;
}

$post_id = get_the_ID(); // ID текущей записи
$taxonomies = ['truby_diameter', 'truby_category', 'detaly_category', 'izolyaciya_category']; // Набор таксономий

$term_images = get_post_or_term_image($post_id, $taxonomies);


$images = $post_images ?: $term_images ;


?>

<div class="image-block">
	<div class="image-block-flex">
		<?php if(count($images) > 1){ ?>
		<div class="images-nav">
			<div class="slider-nav js-slider-nav">
			<?php
			foreach( $images as $image ):
			?>
				<div class="image">
					<img src="<?php echo $image['sizes']['micro']; ?>" >
				</div>
			<?php 
			endforeach;
			?>
			</div>
		</div>
		<?php } ?>
		<div class="images <?php echo (count($images) > 1) ? "images-nav-true" : ""; ?>">
			<div class="slider js-slider">
			<?if($images){?>
			<?php
			foreach( $images as $image ):
			?>
				<a class="image" data-fancybox="goods-<?php echo get_the_ID(); ?>" href="<?php echo $image['url']; ?>">
					<img src="<?php echo $image['sizes']['team']; ?>" >
				</a>
			<?php 
			endforeach;
			}else{?>
				<a class="image" data-fancybox="goods-<?php echo get_the_ID(); ?>" href="/wp-content/uploads/2022/Bezymyannyj-1-1.jpg">
					<img src="/wp-content/uploads/2022/Bezymyannyj-1-1.jpg" >
				</a>
			<?}?>
			</div>
		</div>
	</div>
</div>