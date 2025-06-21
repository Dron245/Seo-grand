<?php
// Текущая категория
$current_cat = get_queried_object();
$current_cat_name = $current_cat->name;


global $wp;
$post_args = array(
	'fields' => 'ids',
	'post_type'=> 'detaly',
	'posts_per_page' => -1,
);
if ( false !== strpos($wp->matched_query, 'detaly_category' ) ) {
	$is_detaly_category = true;
	$post_args['tax_query'] = array(
		array(
			'taxonomy'=>'detaly_category',
			'terms'=>get_query_var('detaly_category'),
			'field'=>'slug',
		)
	);
	$post_ids = get_posts( $post_args );
} elseif ( false !== strpos($wp->matched_query, 'detaly_standart') ) {
	$is_detaly_standart = true;
	$post_args['tax_query'] = array(
		array(
			'taxonomy'=>'detaly_standart',
			'terms'=>get_query_var('detaly_standart'),
			'field'=>'slug',
		)
	);
	$post_ids = get_posts( $post_args );
}


if (!$is_detaly_category) {
	goodini_filter_field([
		'empty' => 'Тип', // Лэйбл пустого значения
		'type' => 'select', // Тип поля : checkbox, select, radio, toggle, range
		'tax' => 'detaly_category', // Имя таксономии
		'orderby' => 'term_id',
		'parent' => 0,
		'object_ids' => $post_ids,
	]);
} else {
	goodini_filter_field([
		'type' => 'select', // Тип поля : checkbox, select, radio, toggle, range
		'tax' => 'detaly_category', // Имя таксономии
		'include' => get_term_by('slug', get_query_var('detaly_category'), 'detaly_category', ARRAY_A )['term_id'] ?? null,
	]);
}
if (!$is_detaly_standart) {
	goodini_filter_field([
		'empty' => 'Стандарт', // Лэйбл пустого значения
		'type' => 'select', // Тип поля : checkbox, select, radio, toggle, range
		'tax' => 'detaly_standart', // Имя таксономии
		'orderby' => 'term_id',
		'object_ids' => $post_ids,
	]);
} else {
	goodini_filter_field([
		'type' => 'select', // Тип поля : checkbox, select, radio, toggle, range
		'tax' => 'detaly_standart', // Имя таксономии
		'include' => get_term_by('slug', get_query_var('detaly_standart'), 'detaly_standart', ARRAY_A )['term_id'] ?? null,
	]);
}
if (!$is_detaly_steel) {
	goodini_filter_field([
		'empty' => 'Сталь', // Лэйбл пустого значения
		'type' => 'select', // Тип поля : checkbox, select, radio, toggle, range
		'tax' => 'detaly_steel', // Имя таксономии
		'orderby' => 'term_id',
		'object_ids' => $post_ids,
	]);
} else {
	goodini_filter_field([
		'type' => 'select', // Тип поля : checkbox, select, radio, toggle, range
		'tax' => 'detaly_standart', // Имя таксономии
		'include' => get_term_by('slug', get_query_var('detaly_standart'), 'detaly_standart', ARRAY_A )['term_id'] ?? null,
	]);
}
