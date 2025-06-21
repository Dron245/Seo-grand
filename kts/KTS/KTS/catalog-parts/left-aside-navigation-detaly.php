<?php
// Текущая категория
$current_cat = get_queried_object();
$current_cat_name = $current_cat->name;
$current_cat_id = $current_cat->term_id;
$current_cat_taxonomy = $current_cat->taxonomy;

// Определение родительской категории
$parent_arr = get_ancestors($current_cat_id, $current_cat_taxonomy);
if ($parent_arr) {
	$parent_id = $parent_arr[array_key_last($parent_arr)];
} else {
	$parent_id = $current_cat_id;
}

//$term_arr = get_term($parent_id);

?>

<?php
$terms_args = [
	'taxonomy' => $current_cat_taxonomy,
	'parent' => 0,
	'hide_empty'   => 0,
	'order'   => "ASC",
	'orderby'   => "term_id",
];
$terms = get_categories($terms_args);

?>

<?php function filter_cat($cat_name, $cat_ID, $cat_tax, $cat_class = "")
{ ?>

	<?php
	$args = [
		'taxonomy' => $cat_tax,
		'parent' => $cat_ID,
		'hide_empty'   => 0,
		'order'   => "ASC",
		'orderby'   => "term_id",
	];


	$categories = get_categories($args);

	$count = count($categories);
	if ($count < 10) {
		switch (0) {
			case (($count % 3)):
				$bullets_col = 'filcol-1';
				break;
		}
	} else if ($count > 10) {
		// switch (0) {
		// 	case ($count % 3):
		// 	case ($count % 2):
		// 	case ((($count + 1) % 3)):
		// 		$bullets_col = 'filcol-2';
		// 		break;
		// }
	}
	?>
	<div class="filter_element filter_navigation click_off <?php echo $cat_class; ?> <?php echo  $bullets_col; ?>">
		<div class="filter_element__heading">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
				<path d="M2.7 6.9h0c-.5.5-.5 1.3 0 1.8l8.4 8.4c.4.4 1 .4 1.4 0l8.4-8.4c.5-.5.5-1.3 0-1.8h0c-.5-.5-1.3-.5-1.8 0l-7.3 7.3-7.3-7.3c-.5-.4-1.3-.4-1.8 0z" />
			</svg>
			<?php echo $cat_name; ?>
		</div>
		<div class="filter_element__content">
			<ul>
				<?php
				foreach ($categories as $category) {
					$category_ID = $category->term_id;
					$category_name = $category->name;
					$category_link = get_term_link($category_ID, $cat_tax);
					// var_dump(count($categories));
					$sub_categories = get_categories(array(
						'taxonomy' => 'catalog_category',
						'hide_empty'   => 0,
						'parent'  => $category_ID
					));
					$category_count = count($sub_categories);
					$has_children = '';
					if ($category_count > 0) {
						$has_children = 'has_children';
					}

					$current_cat = '';
					if ($category_ID == $current_cat_id) {
						$current_cat = 'current-cat';
					}
				?>
						<li class="cat-item cat-item-<?php echo $category_ID; ?> <?php echo $current_cat; ?> <?php echo $has_children; ?>">
							<a href="<?php echo $category_link; ?>"><?php echo $category_name;	?></a>
						</li>
				<?php } ?>
			</ul>
		</div>
	</div>
<?php } ?>


<?php

switch ($current_cat_name) {
	case ('truby'):
		filter_cat('Каталог труб', 0, 'truby_category', 'active');
		filter_cat('Трубы по ', '', 'truby_standart', 'active');
		filter_cat('Трубы по ДУ', '', 'truby_diameter', 'active');
		filter_cat('Трубы по заводам', '', 'truby_factory', '');
		filter_cat('По маркам стали', '', 'truby_steel', '');
		filter_cat('По классу прочности', '', 'truby_endurance', 'filcol-1');
		break;

	case ('izolyaciya'):
		filter_cat('Каталог изоляции', 0, 'izolyaciya_category', 'active');
		filter_cat('ВУС изоляция', 294, 'izolyaciya_category', 'active');
		filter_cat('УС изоляция', 295, 'izolyaciya_category', 'active');
		break;
	case ('detaly'):
		filter_cat('Каталог деталей', 0, 'detaly_category', 'active');
		filter_cat('Стандарт', "", 'detaly_standart', 'active');
		filter_cat('Сталь', "", 'detaly_steel', 'active');
		break;
}



?>