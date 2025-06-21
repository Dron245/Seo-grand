<?php
/*$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];

if($url=='https://zavod-kts.ru/wp-admin/' || $url=='https://zavod-kts.ru/wp-login.php'){

}else{
    if (!is_user_logged_in()) {
        die();
    }
}*/
//	Константы
//	Константы родительской темы без 
//	====================
define('THEME_URI', get_stylesheet_directory_uri());
define('THEME_IMAGES', THEME_URI . '/assets/i');
define('THEME_CSS', THEME_URI . '/assets/css');
define('THEME_JS', THEME_URI . '/assets/js');
define('THEME_FONTS', THEME_URI . '/assets/fonts');


//	Подключение стилевого файла CSS и кастомного JS
//	====================
add_action('wp_enqueue_scripts', 'theme_name_scripts');
function theme_name_scripts()
{
    wp_enqueue_style('style-name', get_stylesheet_uri() . '?v=1');
    wp_enqueue_script('script-name', THEME_JS . '/custom.js?v=1', array(), '', true);
}

if (function_exists('add_image_size')) {
    add_image_size('step', 250, 250, true);
    add_image_size('boss', 680, 600, false);
    add_image_size('case', 450, 600, true);
}

//	Тип записи - Каталог
//	====================
add_action('init', 'post_type_truby');

function post_type_truby()
{
    $labels = array(
        'name'               => 'Трубы стальные',
        'singular_name'      => 'Стальная труба',
        'menu_name'            => 'Трубы',
        'all_items'          => 'Номенклатура',
        'add_new'            => 'Добавить товар',
        'add_new_item'       => 'Добавить новый товар',
        'edit_item'          => 'Редактировать товар',
        'new_item'           => 'Новый товар',
        'view_item'          => 'Посмотреть на сайте',
        'search_items'       => 'Искать',
        'not_found'          => 'Не найдено',
        'not_found_in_trash' => 'Корзина пуста',
    );
    $args   = array(
        'rewrite'       => array('slug' => 'truby'),
        'labels'        => $labels,
        'public'        => true,
        'show_ui'       => true, // показывать интерфейс в админке
        'has_archive'   => 'truby',
        'menu_icon'     => 'dashicons-marker', // иконка в меню
        'menu_position' => 35, // порядок в меню
        'supports'      => array('title', 'editor', 'author'),
        'show_in_rest'  => true,
        'taxonomies'    => array('truby_category', 'truby_tags', 'truby_diameter', 'truby_standart', 'truby_endurance', 'truby_steel', 'truby_factory'),
    );
    register_taxonomy('truby_category', ['truby'], [
        'label'        => '', // определяется параметром $labels->name
        'labels'       => [
            'name'              => 'Категории',
            'singular_name'     => 'Категории',
            'search_items'      => 'Искать',
            'all_items'         => 'Материалы',
            'view_item'         => 'Смотреть категорию',
            'parent_item'       => 'Родительская категория',
            'parent_item_colon' => 'Родительская категория',
            'edit_item'         => 'Редактировать',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить',
            'new_item_name'     => 'Имя новой категории',
            'menu_name'         => 'Категории',
            'not_found'         => 'Пусто',
        ],
        'description'  => '', // описание таксономии
        'public'       => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite'      => [
            'slug'         => 'truby',
            'hierarchical' => true,
        ],
        'capabilities' => array(),
        'meta_box_cb'  => 'post_categories_meta_box',
    ]);
    register_taxonomy('truby_diameter', ['truby'], [
        'label'             => '', // определяется параметром $labels->name
        'labels'            => [
            'name'              => 'Диаметр',
            'singular_name'     => 'Диаметр',
            'search_items'      => 'Искать',
            'all_items'         => 'Диаметр',
            'view_item'         => 'Смотреть диаметры',
            'edit_item'         => 'Редактировать',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить',
            'new_item_name'     => 'Название диаметра',
            'menu_name'         => 'Диаметр',
            'not_found'         => 'Пусто',
        ],
        'description'       => '', // описание таксономии
        'public'            => true,
        'hierarchical'      => true,
        'show_admin_column' => true,
        //'rewrite'               => false,
        'rewrite'           => [
            'slug'         => 'truby',
            'hierarchical' => false,
        ],
        'capabilities'      => array(),
        'meta_box_cb'       => 'post_categories_meta_box',
    ]);
    register_taxonomy('truby_standart', ['truby'], [
        'label'             => '', // определяется параметром $labels->name
        'labels'            => [
            'name'              => 'Стандарт',
            'singular_name'     => 'Стандарт',
            'search_items'      => 'Искать',
            'all_items'         => 'Стандарт',
            'view_item'         => 'Смотреть стандарт',
            'edit_item'         => 'Редактировать',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить',
            'new_item_name'     => 'Название стандарта',
            'menu_name'         => 'Стандарт',
            'not_found'         => 'Пусто',
        ],
        'description'       => '', // описание таксономии
        'public'            => true,
        'hierarchical'      => true,
        'show_admin_column' => true,
        //'rewrite'               => false,
        'rewrite'           => [
            'slug'         => 'truby',
            'hierarchical' => false,
        ],
        'capabilities'      => array(),
        'meta_box_cb'       => 'post_categories_meta_box',
    ]);
    register_taxonomy('truby_endurance', ['truby'], [
        'label'             => '', // определяется параметром $labels->name
        'labels'            => [
            'name'              => 'Кл. прочности',
            'singular_name'     => 'Кл. прочности',
            'search_items'      => 'Искать',
            'all_items'         => 'Кл. прочности',
            'view_item'         => 'Смотреть кл. прочности',
            'edit_item'         => 'Редактировать',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить',
            'new_item_name'     => 'Название нового класса',
            'menu_name'         => 'Кл. прочности',
            'not_found'         => 'Пусто',
        ],
        'description'       => '', // описание таксономии
        'public'            => true,
        'hierarchical'      => false,
        'show_admin_column' => true,
        //'rewrite'               => false,
        'rewrite'           => [
            'slug'         => 'truby',
            'hierarchical' => false,
        ],
        'capabilities'      => array(),
        'meta_box_cb'       => 'post_tags_meta_box',
    ]);
    register_taxonomy('truby_steel', ['truby'], [
        'label'             => '', // определяется параметром $labels->name
        'labels'            => [
            'name'          => 'Сталь',
            'singular_name' => 'Сталь',
            'search_items'  => 'Искать',
            'all_items'     => 'Стаvmk',
            'view_item'     => 'Смотреть сталь',
            'edit_item'     => 'Редактировать',
            'update_item'   => 'Обновить',
            'add_new_item'  => 'Добавить',
            'new_item_name' => 'Название новой стали',
            'menu_name'     => 'Сталь',
            'not_found'     => 'Пусто',
        ],
        'description'       => '', // описание таксономии
        'public'            => true,
        'hierarchical'      => true,
        'show_admin_column' => true,
        //'rewrite'               => false,
        'rewrite'           => [
            'slug'         => 'truby',
            'hierarchical' => false,
        ],
        'capabilities'      => array(),
        'meta_box_cb'       => 'post_categories_meta_box',
    ]);
    register_taxonomy('truby_factory', ['truby'], [
        'label'             => '', // определяется параметром $labels->name
        'labels'            => [
            'name'          => 'Завод',
            'singular_name' => 'Завод',
            'search_items'  => 'Искать',
            'all_items'     => 'Завод',
            'view_item'     => 'Смотреть завод',
            'edit_item'     => 'Редактировать',
            'update_item'   => 'Обновить',
            'add_new_item'  => 'Добавить',
            'new_item_name' => 'Название нового завода',
            'menu_name'     => 'Завод',
            'not_found'     => 'Пусто',
        ],
        'description'       => '', // описание таксономии
        'public'            => true,
        'hierarchical'      => false,
        'show_admin_column' => true,
        //'rewrite'               => false,
        'rewrite'           => [
            'slug'         => 'truby',
            'hierarchical' => false,
        ],
        'capabilities'      => array(),
        'meta_box_cb'       => 'post_tags_meta_box',
    ]);
    register_post_type('truby', $args);
}


//	Тип записи - Изоляция
//	====================
add_action('init', 'post_type_izolyaciya');

function post_type_izolyaciya()
{
    $labels = array(
        'name'               => 'Изоляция стальных труб',
        'menu_name'            => 'Изоляция',
        'all_items'          => 'Вся продукция',
        'add_new'            => 'Добавить товар',
        'add_new_item'       => 'Добавить новый товар',
        'edit_item'          => 'Редактировать товар',
        'new_item'           => 'Новый товар',
        'view_item'          => 'Посмотреть на сайте',
        'search_items'       => 'Искать',
        'not_found'          => 'Не найдено',
        'not_found_in_trash' => 'Корзина пуста',
    );
    $args   = array(
        'rewrite'       => array('slug' => 'izolyaciya'),
        'labels'        => $labels,
        'public'        => true,
        'show_ui'       => true, // показывать интерфейс в админке
        'has_archive'   => 'izolyaciya',
        'menu_icon'     => 'dashicons-admin-customizer', // иконка в меню
        'menu_position' => 36, // порядок в меню
        'supports'      => array('title', 'editor', 'author'),
        'show_in_rest'  => true,
        'taxonomies'    => array('izolyaciya_category', 'izolyaciya_tags', 'izolyaciya_endurance', 'izolyaciya_steel', 'izolyaciya_factory', 'izolyaciya_diameter', 'izolyaciya_standart'),
    );
    register_taxonomy('izolyaciya_category', ['izolyaciya'], [
        'label'        => '', // определяется параметром $labels->name
        'labels'       => [
            'name'              => 'Категории',
            'singular_name'     => 'Категории',
            'search_items'      => 'Искать',
            'all_items'         => 'Материалы',
            'view_item'         => 'Смотреть категорию',
            'parent_item'       => 'Родительская категория',
            'parent_item_colon' => 'Родительская категория',
            'edit_item'         => 'Редактировать',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить',
            'new_item_name'     => 'Имя новой категории',
            'menu_name'         => 'Категории',
            'not_found'         => 'Пусто',
        ],
        'description'  => '', // описание таксономии
        'public'       => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite'      => [
            'slug'         => 'izolyaciya',
            'hierarchical' => true,
        ],
        'capabilities' => array(),
        'meta_box_cb'  => 'post_categories_meta_box',
    ]);
    register_taxonomy('izolyaciya_standart', ['izolyaciya'], [
        'label'             => '', // определяется параметром $labels->name
        'labels'            => [
            'name'              => 'Стандарт',
            'singular_name'     => 'Стандарт',
            'search_items'      => 'Искать',
            'all_items'         => 'Стандарт',
            'view_item'         => 'Смотреть стандарт',
            'edit_item'         => 'Редактировать',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить',
            'new_item_name'     => 'Название стандарта',
            'menu_name'         => 'Стандарт',
            'not_found'         => 'Пусто',
        ],
        'description'       => '', // описание таксономии
        'public'            => true,
        'hierarchical'      => true,
        'show_admin_column' => true,
        //'rewrite'               => false,
        'rewrite'           => [
            'slug'         => 'truby',
            'hierarchical' => false,
        ],
        'capabilities'      => array(),
        'meta_box_cb'       => 'post_categories_meta_box',
    ]);
    register_post_type('izolyaciya', $args);
}


//	Тип записи - Детали
//	====================
add_action('init', 'post_type_detaly');

function post_type_detaly()
{
    $labels = array(
        'name'               => 'Детали трубопровода',
        'menu_name'            => 'Детали',
        'all_items'          => 'Вся продукция',
        'add_new'            => 'Добавить товар',
        'add_new_item'       => 'Добавить новый товар',
        'edit_item'          => 'Редактировать товар',
        'new_item'           => 'Новый товар',
        'view_item'          => 'Посмотреть на сайте',
        'search_items'       => 'Искать',
        'not_found'          => 'Не найдено',
        'not_found_in_trash' => 'Корзина пуста',
    );
    $args   = array(
        'rewrite'       => array('slug' => 'detaly'),
        'labels'        => $labels,
        'public'        => true,
        'show_ui'       => true, // показывать интерфейс в админке
        'has_archive'   => 'detaly',
        'menu_icon'     => 'dashicons-image-filter', // иконка в меню
        'menu_position' => 37, // порядок в меню
        'supports'      => array('title', 'editor', 'author'),
        'show_in_rest'  => true,
        'taxonomies'    => array('detaly_category', 'detaly_tags', 'detaly_endurance', 'detaly_steel', 'detaly_factory', 'detaly_diameter', 'detaly_standart'),
    );
    register_taxonomy('detaly_category', ['detaly'], [
        'label'        => '', // определяется параметром $labels->name
        'labels'       => [
            'name'              => 'Категории',
            'singular_name'     => 'Категории',
            'search_items'      => 'Искать',
            'all_items'         => 'Материалы',
            'view_item'         => 'Смотреть категорию',
            'parent_item'       => 'Родительская категория',
            'parent_item_colon' => 'Родительская категория',
            'edit_item'         => 'Редактировать',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить',
            'new_item_name'     => 'Имя новой категории',
            'menu_name'         => 'Категории',
            'not_found'         => 'Пусто',
        ],
        'description'  => '', // описание таксономии
        'public'       => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite'      => [
            'slug'         => 'detaly',
            'hierarchical' => true,
        ],
        'capabilities' => array(),
        'meta_box_cb'  => 'post_categories_meta_box',
    ]);
    register_taxonomy('detaly_standart', ['detaly'], [
        'label'             => '', // определяется параметром $labels->name
        'labels'            => [
            'name'              => 'ГОСТ',
            'singular_name'     => 'ГОСТ',
            'search_items'      => 'Искать',
            'all_items'         => 'ГОСТ',
            'view_item'         => 'Смотреть ГОСТ',
            'edit_item'         => 'Редактировать',
            'update_item'       => 'Обновить',
            'add_new_item'      => 'Добавить',
            'new_item_name'     => 'Название ГОСТа',
            'menu_name'         => 'ГОСТ',
            'not_found'         => 'Пусто',
        ],
        'description'       => '', // описание таксономии
        'public'            => true,
        'hierarchical'      => false,
        'show_admin_column' => true,
        //'rewrite'               => false,
        'rewrite'           => [
            'slug'         => 'detaly',
            'hierarchical' => false,
        ],
        'capabilities'      => array(),
        'meta_box_cb'       => 'post_tags_meta_box',
    ]);
    register_taxonomy('detaly_steel', ['detaly'], [
        'label'             => '', // определяется параметром $labels->name
        'labels'            => [
            'name'          => 'Сталь',
            'singular_name' => 'Сталь',
            'search_items'  => 'Искать',
            'all_items'     => 'Стаvmk',
            'view_item'     => 'Смотреть сталь',
            'edit_item'     => 'Редактировать',
            'update_item'   => 'Обновить',
            'add_new_item'  => 'Добавить',
            'new_item_name' => 'Название новой стали',
            'menu_name'     => 'Сталь',
            'not_found'     => 'Пусто',
        ],
        'description'       => '', // описание таксономии
        'public'            => true,
        'hierarchical'      => true,
        'show_admin_column' => true,
        //'rewrite'               => false,
        'rewrite'           => [
            'slug'         => 'detaly',
            'hierarchical' => false,
        ],
        'capabilities'      => array(),
        'meta_box_cb'       => 'post_categories_meta_box',
    ]);
    register_post_type('detaly', $args);
}


//	Cтраница настроек с произвольными полями
//	====================
add_action('acf/init', 'acf_op_init');
function acf_op_init()
{
    if (function_exists('acf_add_options_page')) {

        acf_add_options_page(array(
            'page_title'        => 'Страница Трубы',
            'menu_title'        => 'Страница Трубы',
            'update_button'     => __('Обновить', 'acf'),
            'updated_message'   => __("Обновления сохранены", 'acf'),
            'parent_slug'       => 'edit.php?post_type=truby',
            'position'          => 1,
            'redirect'          => false,
        ));

        acf_add_options_page(array(
            'page_title'        => 'Страница Изоляция',
            'menu_title'        => 'Страница Изоляция',
            'update_button'     => __('Обновить', 'acf'),
            'updated_message'   => __("Обновления сохранены", 'acf'),
            'parent_slug'       => 'edit.php?post_type=izolyaciya',
            'position'          => 1,
            'redirect'          => false,
        ));

        acf_add_options_page(array(
            'page_title'        => 'Страница Детали',
            'menu_title'        => 'Страница Детали',
            'update_button'     => __('Обновить', 'acf'),
            'updated_message'   => __("Обновления сохранены", 'acf'),
            'parent_slug'       => 'edit.php?post_type=detaly',
            'position'          => 1,
            'redirect'          => false,
        ));
        
        acf_add_options_page(array(
            'page_title' => 		'Проекты',
            'icon_url' => 			'dashicons-screenoptions',
            'update_button' => 		__('Обновить', 'acf'),
            'updated_message' => 	__("Обновления сохранены", 'acf'),
            'position' => 			34,
            'redirect' 	=> 			false,
            //'parent_slug' => 		$parent['menu_slug'],
        ));
                
        acf_add_options_page(array(
            'page_title' => 		'Производство',
            'icon_url' => 			'dashicons-hammer',
            'update_button' => 		__('Обновить', 'acf'),
            'updated_message' => 	__("Обновления сохранены", 'acf'),
            'position' => 			33,
            'redirect' 	=> 			false,
            //'parent_slug' => 		$parent['menu_slug'],
        ));
                
        acf_add_options_page(array(
            'page_title' => 		'Узбекистан',
            'icon_url' => 			'dashicons-admin-site',
            'update_button' => 		__('Обновить', 'acf'),
            'updated_message' => 	__("Обновления сохранены", 'acf'),
            'position' => 			34,
            'redirect' 	=> 			false,
            //'parent_slug' => 		$parent['menu_slug'],
        ));
                
        acf_add_options_page(array(
            'page_title' => 		'Отзывы',
            'icon_url' => 			'dashicons-format-quote',
            'update_button' => 		__('Обновить', 'acf'),
            'updated_message' => 	__("Обновления сохранены", 'acf'),
            'position' => 			34,
            'redirect' 	=> 			false,
            //'parent_slug' => 		$parent['menu_slug'],
        ));
    }
}

function goodini_buttons_filter()
{
    echo '<div class="filter_buttons">
        <button class="btn btn-gray"><span>Подобрать</span></button>
    </div>';
}

//	Регистрация областей меню
//	====================
add_action('after_setup_theme', function () {
    register_nav_menus(array(
        'menu_truby-cat' => 'Сайдбар. Тр. Категории',
        'menu_truby-du' => 'Сайдбар. Тр. Диаметр',
        'menu_truby-gost' => 'Сайдбар. Тр. ГОСТы',
        'menu_truby-zavod' => 'Сайдбар. Тр. Заводы',
        'menu_truby-stal' => 'Сайдбар. Тр. Марки',
        'menu_truby-proch' => 'Сайдбар. Тр. Классы',
        //'menu_truby-cat' => 'Сайдбар. Тр. категории',
    ));
});


//Меняем основные запросы записей, поэтому для админки и для не главных запросов - не меняем ничего
add_action( 'pre_get_posts', function ( $query ) {

    if ( is_admin() ) {
        return;
    }

    $is_truby = $query->is_post_type_archive( 'truby' ) || $query->is_tax( get_object_taxonomies( 'truby' ) ) || $query->get('post_type') === 'truby';
    $is_izolyaciya = $query->is_post_type_archive( 'izolyaciya' ) || $query->is_tax( get_object_taxonomies( 'izolyaciya' ) ) || $query->get('post_type') === 'izolyaciya';
    $is_detaly = $query->is_post_type_archive( 'detaly' ) || $query->is_tax( get_object_taxonomies( 'detaly' ) ) || $query->get('post_type') === 'detaly';

    if ( $is_truby || $is_izolyaciya || $is_detaly ) {
        $q = &$query->query_vars;
        
        if (! isset($q['orderby'])) {
            $q['orderby'] = 'menu_order';
            $q['order'] = 'asc';
        }
        // print_r($q);
    }


} );

/**
 * Получение размеров трубы из заголовка
 *
 * @param string $post_title
 * @return int
 */
function order_from_title($post_title) {
    foreach (array_reverse(explode(' ', $post_title)) as $part) {
        $number = preg_replace('/[^\d]/', '', $part);
        if (! strlen($number)) {
            continue;
        }

        $sanitized = strtolower($part);
        $sanitized = str_replace(',', '.', $sanitized);
        $sanitized = str_replace('x', '___', $sanitized);
        // russian
        $sanitized = str_replace('х', '___', $sanitized);
        $sanitized = str_replace('/', '___', $sanitized);
        $sanitized = trim($sanitized, '.');

        $numbers = explode('___', $sanitized);
        return intval( $numbers[0] * 100000 ) + intval( $numbers[1] * 10 );
    }

    return 0;
}

/**
 * Обновление размеров при сохранении
 *
 * @param array $data
 * @return void
 */
function adapt_sizes($data)
{
    if ( in_array( $data['post_type'], array('truby', 'izolyaciya', 'detaly' ), true ) ) {
        $post_title = trim( $data['post_title']);
        if (!$post_title) {
            return $data;
        }
    
		$data['menu_order'] = order_from_title($post_title);
	}
    return $data;

}
add_filter('wp_insert_post_data', 'adapt_sizes');

add_action( 'init',function () {
    if (isset($_GET['adapt_sizes'])) {
        $paged = intval($_GET['paged'] ?? 1);
           
        $query = new \WP_Query([
            'post_type' => ['truby', 'izolyaciya', 'detaly'],
            'fields' => 'ids',
            'posts_per_page' => 200,
            'paged' => $paged,
            'orderby' => 'date',
            'order' => 'asc',
            'suppress_filters' => true,
        ]);

        if ($query->max_num_pages > $paged) {
            $url = esc_url(add_query_arg( ['adapt_sizes' => 1, 'paged' => $paged + 1], home_url() ));
            echo "<a href='{$url}'>Следующая страница</a>";
        }
        
        echo '<pre>';
        foreach ($query->posts as $post_id) {
            $title = get_the_title($post_id);
            echo $title;
            wp_update_post( wp_slash( [
                'ID' => $post_id,
            ] ) );
            echo ' - ' . order_from_title($title);
            echo "\n";
        }
        echo '</pre>';


        wp_die();
    }
   
}, 20 );


function mailru_domain_insert_header() {
    ?>
    
    <meta name="mailru-domain" content="9VpY4tXBnmKQ0m1B" />
    
    <?php
}
add_action( 'wp_head', 'mailru_domain_insert_header' );


