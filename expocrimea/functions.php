<?php
/**
 * burlak-studio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package burlak-studio
 */

    

    
    
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Модули',
		'menu_title'	=> 'Модули', 
		'menu_slug' 	=> 'modules',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'position' => 2,
	));
}  

    
// show_admin_bar(false);

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'burlak_studio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function burlak_studio_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on burlak-studio, use a find and replace
		 * to change 'burlak-studio' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'burlak-studio', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'nav_menu' => esc_html__( 'header', 'header-menu' ),
			)
		);

		register_nav_menus(
			array(
				'footer-info' => esc_html__( 'footer-info', 'footer-info' ),
			)
		);

		register_nav_menus(
			array(
				'footer-official' => esc_html__( 'footer-official', 'footer-official' ),
			)
		);


		//get attachment meta
		// if ( !function_exists('wp_get_attachment') ) {
		// 	function wp_get_attachment( $attachment_id )
		// 	{
		// 		$attachment = get_post( $attachment_id );
		// 		return array(
		// 			'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		// 			'caption' => $attachment->post_excerpt,
		// 			'description' => $attachment->post_content,
		// 			'href' => get_permalink( $attachment->ID ),
		// 			'src' => $attachment->guid,
		// 			'title' => $attachment->post_title
		// 		);
		// 	}
		// }

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'burlak_studio_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'burlak_studio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function burlak_studio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'burlak-studio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'burlak-studio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'burlak_studio_widgets_init' );

/**
 * Enqueue scripts and styles. 
 */
function burlak_style() {
	wp_enqueue_style( 'burlak-style', get_stylesheet_uri() );
	wp_enqueue_style('burlak-fonts', get_template_directory_uri() . '/assets/css/gilroy.css');
	wp_enqueue_style('burlak-main', get_template_directory_uri() . '/dist/css/main.css');


	wp_style_add_data( 'burlak-studio-style', 'rtl', 'replace' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function burlak_scripts() {
	wp_enqueue_script('burlak-main', get_template_directory_uri() . '/dist/js/bundle.js');
}

add_action( 'wp_enqueue_scripts', 'burlak_style' );
add_action( 'wp_footer', 'burlak_scripts' );
add_action( 'init', 'register_post_types' );

add_filter('get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

function register_post_types(){
	register_post_type(
		'events',
		array(
		  'label' => 'Каталог мероприятий',
		  'labels' => array(
			'menu_name' => 'Каталог мероприятий'
		  ),
		  'menu_icon' => 'dashicons-calendar-alt', 
		//   'taxonomies' => array('post_tag'),
		  'public' => true,
		  'has_archive' => true,
		  'supports' => array('thumbnail', 'title', 'editor', 'custom-fields')
		)
	);

	register_post_type(
		'partners',
		array(
		  'label' => 'Партнёры мероприятий',
		  'labels' => array(
			'menu_name' => 'Партнёры мероприятий'
		  ),
		  'menu_icon' => 'dashicons-buddicons-buddypress-logo', 
		  'taxonomies' => array('post_tag'),
		  'public' => true,
		  'has_archive' => true,
		  'supports' => array('thumbnail', 'title', 'editor', 'custom-fields')
		)
	);

	register_post_type(
		'equipment_rental',
		array(
		  'label' => 'Aренда оборудования',
		  'labels' => array(
			'menu_name' => 'Aренда оборудования'
		  ),
		  'menu_icon' => 'dashicons-layout', 
		  'taxonomies' => [''],
		  'public' => true,
		  'has_archive' => true,
		  'supports' => array('thumbnail', 'title', 'editor', 'custom-fields')
		)
	);
  
	register_post_type(
		'spikers',
		array(
		  'label' => 'Спикеры',
		  'labels' => array(
			'menu_name' => 'Спикеры'
		  ),
		  'menu_icon' => 'dashicons-businessperson', 
		  'taxonomies' => array('post_tag'),
		  'public' => true,
		  'has_archive' => false,
		  'supports' => array('thumbnail', 'title', 'editor', 'custom-fields')
		)
	);

	register_post_type('news', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Новости', // основное название для типа записи
			'singular_name'      => 'Новости', // название для одной записи этого типа
			'add_new'            => 'Добавить новость', // для добавления новой записи
			'add_new_item'       => 'Добавление новости', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование новости', // для редактирования типа записи
			'new_item'           => 'Новая новость', // текст новой записи
			'view_item'          => 'Смотреть новость', // для просмотра записи этого типа.
			'search_items'       => 'Искать новость', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Наши новости', // название меню
		),
		'description'         => 'Новости',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-megaphone',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail','custom-fields', 'page-attributes', 'excerpt', 'post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies' 		  => ['post_tag'],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}

/**
 * Постраничная навигация
 */
add_action('pre_get_posts', 'devise_number_displayed_posts', 999);

function devise_number_displayed_posts($query)
{
  if (!is_admin() && is_post_type_archive('events') && $query->query['post_type'] == 'events' && $query->query['all'] != 1) {
    $query->set('posts_per_page', 8);
    $meta_query = array();
    $city = $_GET['city'];
    $from = $_GET['from'];
    $to = $_GET['to'];
    $search = $_GET['search'];
    if($city){
    	$meta_query[] = array(
        	'key' => 'town',
            'value' => $city,
            'compare' => '='
        );
    }
    if($from){
		$from = new DateTime($from);
        $from = $from->setTime(0, 0, 0)->format('Ymd');
		$meta_query[] = array(
          'key' => 'start_date',
          'value' => $from,
          'compare' => '>='
        );
    }
    if($to){
		$to = new DateTime($to);
		$to = $to->setTime(23, 59, 59)->format('Ymd');
		$meta_query[] = array(
          'key' => 'end_date',
          'value' => $to,
          'compare' => '<='
        );
    }
    $query->set('meta_query', $meta_query);
    if($search) $query->set('s', $search);
    return;
  }
  if (!is_admin() && is_post_type_archive('news')) {
		$count = 16;
		if($query->query['posts_per_page']) $count = $query->query['posts_per_page'];
		if($query->query['numberposts']) $count = $query->query['numberpostsv'];
    $query->set('posts_per_page', $count);
		$query->set('orderby', 'date');
		$query->set('order', 'DESC');
    return;
  }
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
}

add_action('admin_menu', function () {
    add_options_page('Theme settings page', 'Theme settings', 'manage_options', 'theme-page', 'theme_settings_page');
});

add_image_size('grid_image', 400, 200, true);
add_image_size('grid', 450, 300, true);

add_action('admin_init', function () {
    register_setting('theme-page-settings', 'common_scripts');
    register_setting('theme-page-settings', 'head_additions');
    register_setting('theme-page-settings', 'copyrights');
    register_setting('theme-page-settings', 'work_time');
    register_setting('theme-page-settings', 'address');
    register_setting('theme-page-settings', 'phone');
    register_setting('theme-page-settings', 'email');
    register_setting('theme-page-settings', 'theme-color');
		register_setting('theme-page-settings', 'vkontakte');
    register_setting('theme-page-settings', 'facebook');
		register_setting('theme-page-settings', 'instagram');
    register_setting('theme-page-settings', 'youtube');
		register_setting('theme-page-settings', 'whatsapp');
});

register_setting('theme-page-settings', 'common_scripts');
register_setting('theme-page-settings', 'head_additions');
function theme_settings_page()
{
    ?>
  <div class="wrap theme-settings">
    <h1>Theme settings</h1>
    <form action="options.php" method="post">
      <?php
        settings_fields('theme-page-settings');
    do_settings_sections('theme-page-settings'); ?>
      <label>
        <div>Common scripts</div>
        <textarea name="common_scripts"><?= esc_attr(get_option('common_scripts')); ?></textarea>
      </label>
      <label>
        <div>Head additions</div>
        <textarea name="head_additions"><?= esc_attr(get_option('head_additions')); ?></textarea>
      </label>
      <label>
        <div>Work time</div>
        <textarea name="work_time"><?= esc_attr(get_option('work_time')); ?></textarea>
      </label>
      <label>
        <div>Address</div>
        <input type="text" name="address" value="<?= esc_attr(get_option('address')) ?>" />
      </label>
      <label>
        <div>Phone</div>
        <input type="tel" name="phone" value="<?= esc_attr(get_option('phone')) ?>" />
      </label>
      <label>
        <div>Mail</div>
        <input type="email" name="mail" value="<?= esc_attr(get_option('email')) ?>" />
      </label>
      <label>
        <div>Copyrights</div>
        <input type="text" name="copyrights" value="<?= esc_attr(get_option('copyrights')) ?>" />
      </label>
      <label>
        <div>Theme color</div>
        <input name="theme-color" type="text" value="<?= esc_attr(get_option('theme-color')); ?>">
      </label>
			<label>
        <div>Vkontakte</div>
        <input name="vkontakte" type="text" value="<?= esc_attr(get_option('vkontakte')); ?>">
      </label>
      <label>
        <div>Facebook</div>
        <input name="facebook" type="text" value="<?= esc_attr(get_option('facebook')); ?>">
      </label>
      <label>
        <div>Instagram</div>
        <input name="instagram" type="text" value="<?= esc_attr(get_option('instagram')); ?>">
      </label>
      <label>
        <div>Youtube</div>
        <input name="youtube" type="text" value="<?= esc_attr(get_option('youtube')); ?>">
      </label>
			<label>
        <div>WhatsApp</div>
        <input name="whatsapp" type="text" value="<?= esc_attr(get_option('whatsapp')); ?>">
      </label>
      <?php submit_button(); ?>
    </form>
  </div>
  <style>
    .theme-settings {
      max-width: 600px;
    }

    .theme-settings input {
      width: 100%;
    }

    .theme-settings input[type="checkbox"] {
      width: auto;
    }

    .theme-settings textarea {
      width: 100%;
      resize: none;
      height: 150px;
    }

    .theme-settings label {
      margin-bottom: 10px;
      display: block;
    }

    .theme-settings .submit {
      margin-top: 0;
    }

    .theme-settings input[type='submit'] {
      width: auto;
    }

    .theme-settings h1 {
      margin-bottom: 20px;
    }
  </style>
<?php
}

function getMonth($int){
	$months = array('Января' , 'Февраля' , 'Марта' , 'Апреля' , 'Мая' , 'Июня' , 'Июля' , 'Августа' , 'Сентября' , 'Октября' , 'Ноября' , 'Декабря');
	return $months[$int];
}

function my_get_template_part($template, $data = array()){
    extract($data);
    require locate_template($template . '.php');
}


function get_socials(){
    $socials = array();
    if (get_option('vkontakte')) {
			$socials['vkontakte'] = get_option('vkontakte');
    }
    if (get_option('facebook')) {
			$socials['facebook'] = get_option('facebook');
		}
    if (get_option('instagram')) {
			$socials['instagram'] = get_option('instagram');
		}
		if (get_option('whatsapp')) {
			$socials['whatsapp'] = get_option('whatsapp');
		}
    if (get_option('youtube')) {
        $socials['youtube'] = get_option('youtube');
    }
    return $socials;
}

function add_fancybox($content){
    global $post;
    $pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
    $replacement = '<a$1href=$2$3.$4$5 data-fancybox="%POSTID%"$6>';
    $content = preg_replace($pattern, $replacement, $content);
    $content = str_replace("%POSTID%", $post->ID, $content);
    return $content;
}

add_filter('the_content', 'add_fancybox');

// Добавляем класс шаблона к body
add_filter('body_class', function($classes) {
    if(is_page_template('module-page.php')) {
        $classes[] = 'module-page-template';
    }
    return $classes;
});

// Альтернативная проверка шаблона
function is_module_page() {
    global $post;
    if(!$post) return false;
    
    $template = get_page_template_slug($post->ID);
    return $template === 'module-page.php';
}

// Вывод модуля

$GLOBALS['counter'] = [];

function getModule($name, $variables_array, $repeat = false){

	$variables = []; 
	$return_code = []; 
 
	foreach (get_field('модуль') as $i => $item) {
		if($item['acf_fc_layout'] == $name && in_array($i, $GLOBALS['counter'])){
			continue;
		} 

		if($item['acf_fc_layout'] == $name && !in_array($i, $GLOBALS['counter'])){ 
			foreach ($variables_array as $key => $value) {
				$variables[$key] = $item[$value];
			}   

			array_push($return_code, $variables);

			if($repeat){
				array_push($GLOBALS['counter'], $i);
			}

			return $return_code;
		}
	}
}
