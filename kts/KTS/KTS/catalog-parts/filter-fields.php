<?php
// Текущая категория
$current_cat = get_queried_object();
$current_cat_name = $current_cat->name;

global $wp;
$post_args = array(
	'fields' => 'ids',
	'post_type'=> 'truby',
	'posts_per_page' => -1,
);
if ( false !== strpos($wp->matched_query, 'truby_diameter' ) ) {
	$is_truby_diameter = true;
	$post_args['tax_query'] = array(
		array(
			'taxonomy'=>'truby_diameter',
			'terms'=>get_query_var('truby_diameter'),
			'field'=>'slug',
		)
	);
	$post_ids = get_posts( $post_args );
} elseif ( false !== strpos($wp->matched_query, 'truby_category' ) ) {
	$is_truby_category = true;
	$post_args['tax_query'] = array(
		array(
			'taxonomy'=>'truby_category',
			'terms'=>get_query_var('truby_category'),
			'field'=>'slug',
		)
	);
	$post_ids = get_posts( $post_args );
} elseif ( false !== strpos($wp->matched_query, 'truby_standart') ) {
	$is_truby_standart = true;
	$post_args['tax_query'] = array(
		array(
			'taxonomy'=>'truby_standart',
			'terms'=>get_query_var('truby_standart'),
			'field'=>'slug',
		)
	);
	$post_ids = get_posts( $post_args );
}

if (!$is_truby_diameter) {
	goodini_filter_field([
		'empty' => 'Диаметр', // Лэйбл пустого значения
		'type' => 'select', // Тип поля : checkbox, select, radio, toggle, range
		'tax' => 'truby_diameter', // Имя таксономии
		'orderby' => 'term_id',
		'object_ids' => $post_ids,
	]);
} else {
	goodini_filter_field([
		'type' => 'select', // Тип поля : checkbox, select, radio, toggle, range
		'tax' => 'truby_diameter', // Имя таксономии
		'include' => get_term_by('slug', get_query_var('truby_diameter'), 'truby_diameter', ARRAY_A )['term_id'] ?? null,
	]);
}
if (!$is_truby_category) {
	goodini_filter_field([
		'empty' => 'Тип', // Лэйбл пустого значения
		'type' => 'select', // Тип поля : checkbox, select, radio, toggle, range
		'tax' => 'truby_category', // Имя таксономии
		'orderby' => 'term_id',
		/*'parent' => 0,*/
		'object_ids' => $post_ids,
	]);
} else {
	goodini_filter_field([
		'type' => 'select', // Тип поля : checkbox, select, radio, toggle, range
		'tax' => 'truby_category', // Имя таксономии
		'include' => get_term_by('slug', get_query_var('truby_category'), 'truby_category', ARRAY_A )['term_id'] ?? null,
	]);
}
if (!$is_truby_standart) {
	goodini_filter_field([
		'empty' => 'Стандарт', // Лэйбл пустого значения
		'type' => 'select', // Тип поля : checkbox, select, radio, toggle, range
		'tax' => 'truby_standart', // Имя таксономии
		'orderby' => 'term_id',
		'object_ids' => $post_ids,
	]);
} else {
	goodini_filter_field([
		'type' => 'select', // Тип поля : checkbox, select, radio, toggle, range
		'tax' => 'truby_standart', // Имя таксономии
		'include' => get_term_by('slug', get_query_var('truby_standart'), 'truby_standart', ARRAY_A )['term_id'] ?? null,
	]);
}
goodini_filter_field([
	'empty' => 'Кл. прочности', // Лэйбл пустого значения
	'type' => 'select', // Тип поля : checkbox, select, radio, toggle, range
	'tax' => 'truby_endurance', // Имя таксономии
	'orderby' => 'term_id',
	'object_ids' => $post_ids,
]);
