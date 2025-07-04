<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_VERSION', '2.4.2' );

if ( ! isset( $content_width ) ) {
	$content_width = 800; // Pixels.
}

if ( ! function_exists( 'hello_elementor_setup' ) ) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function hello_elementor_setup() {
		if ( is_admin() ) {
			hello_maybe_update_theme_version_in_db();
		}

		$hook_result = apply_filters_deprecated( 'elementor_hello_theme_load_textdomain', [ true ], '2.0', 'hello_elementor_load_textdomain' );
		if ( apply_filters( 'hello_elementor_load_textdomain', $hook_result ) ) {
			load_theme_textdomain( 'hello-elementor', get_template_directory() . '/languages' );
		}

		$hook_result = apply_filters_deprecated( 'elementor_hello_theme_register_menus', [ true ], '2.0', 'hello_elementor_register_menus' );
		if ( apply_filters( 'hello_elementor_register_menus', $hook_result ) ) {
			register_nav_menus( [ 'menu-1' => __( 'Header', 'hello-elementor' ) ] );
			register_nav_menus( [ 'menu-2' => __( 'Footer', 'hello-elementor' ) ] );
		}

		$hook_result = apply_filters_deprecated( 'elementor_hello_theme_add_theme_support', [ true ], '2.0', 'hello_elementor_add_theme_support' );
		if ( apply_filters( 'hello_elementor_add_theme_support', $hook_result ) ) {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support(
				'html5',
				[
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
				]
			);
			add_theme_support(
				'custom-logo',
				[
					'height'      => 100,
					'width'       => 350,
					'flex-height' => true,
					'flex-width'  => true,
				]
			);

			/*
			 * Editor Style.
			 */
			add_editor_style( 'classic-editor.css' );

			/*
			 * Gutenberg wide images.
			 */
			add_theme_support( 'align-wide' );

			/*
			 * WooCommerce.
			 */
			$hook_result = apply_filters_deprecated( 'elementor_hello_theme_add_woocommerce_support', [ true ], '2.0', 'hello_elementor_add_woocommerce_support' );
			if ( apply_filters( 'hello_elementor_add_woocommerce_support', $hook_result ) ) {
				// WooCommerce in general.
				add_theme_support( 'woocommerce' );
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support( 'wc-product-gallery-zoom' );
				// lightbox.
				add_theme_support( 'wc-product-gallery-lightbox' );
				// swipe.
				add_theme_support( 'wc-product-gallery-slider' );
			}
		}
	}
}
add_action( 'after_setup_theme', 'hello_elementor_setup' );

function hello_maybe_update_theme_version_in_db() {
	$theme_version_option_name = 'hello_theme_version';
	// The theme version saved in the database.
	$hello_theme_db_version = get_option( $theme_version_option_name );

	// If the 'hello_theme_version' option does not exist in the DB, or the version needs to be updated, do the update.
	if ( ! $hello_theme_db_version || version_compare( $hello_theme_db_version, HELLO_ELEMENTOR_VERSION, '<' ) ) {
		update_option( $theme_version_option_name, HELLO_ELEMENTOR_VERSION );
	}
}

if ( ! function_exists( 'hello_elementor_scripts_styles' ) ) {
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function hello_elementor_scripts_styles() {
		$enqueue_basic_style = apply_filters_deprecated( 'elementor_hello_theme_enqueue_style', [ true ], '2.0', 'hello_elementor_enqueue_style' );
		$min_suffix          = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		if ( apply_filters( 'hello_elementor_enqueue_style', $enqueue_basic_style ) ) {
			wp_enqueue_style(
				'hello-elementor',
				get_template_directory_uri() . '/style' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}

		if ( apply_filters( 'hello_elementor_enqueue_theme_style', true ) ) {
			wp_enqueue_style(
				'hello-elementor-theme-style',
				get_template_directory_uri() . '/theme' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}
        
        wp_enqueue_script('custom_script', get_template_directory_uri() . '/assets/js/script.js');
	}
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_scripts_styles' );

if ( ! function_exists( 'hello_elementor_register_elementor_locations' ) ) {
	/**
	 * Register Elementor Locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
	 *
	 * @return void
	 */
	function hello_elementor_register_elementor_locations( $elementor_theme_manager ) {
		$hook_result = apply_filters_deprecated( 'elementor_hello_theme_register_elementor_locations', [ true ], '2.0', 'hello_elementor_register_elementor_locations' );
		if ( apply_filters( 'hello_elementor_register_elementor_locations', $hook_result ) ) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action( 'elementor/theme/register_locations', 'hello_elementor_register_elementor_locations' );

if ( ! function_exists( 'hello_elementor_content_width' ) ) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function hello_elementor_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'hello_elementor_content_width', 800 );
	}
}
add_action( 'after_setup_theme', 'hello_elementor_content_width', 0 );

if ( is_admin() ) {
	require get_template_directory() . '/includes/admin-functions.php';
}

/**
 * If Elementor is installed and active, we can load the Elementor-specific Settings & Features
*/

// Allow active/inactive via the Experiments
require get_template_directory() . '/includes/elementor-functions.php';

/**
 * Include customizer registration functions
*/
function hello_register_customizer_functions() {
	if ( hello_header_footer_experiment_active() && is_customize_preview() ) {
		require get_template_directory() . '/includes/customizer-functions.php';
	}
}
add_action( 'init', 'hello_register_customizer_functions' );

if ( ! function_exists( 'hello_elementor_check_hide_title' ) ) {
	/**
	 * Check hide title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function hello_elementor_check_hide_title( $val ) {
		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			$current_doc = Elementor\Plugin::instance()->documents->get( get_the_ID() );
			if ( $current_doc && 'yes' === $current_doc->get_settings( 'hide_title' ) ) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter( 'hello_elementor_page_title', 'hello_elementor_check_hide_title' );

/**
 * Wrapper function to deal with backwards compatibility.
 */
if ( ! function_exists( 'hello_elementor_body_open' ) ) {
	function hello_elementor_body_open() {
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open();
		} else {
			do_action( 'wp_body_open' );
		}
	}
}

function extBuffer($buffer){
	$buffer = str_replace(',"potentialAction":[{"@type":"SearchAction","target":{"@type":"EntryPoint","urlTemplate":"https://mebelit-spb.ru/?s={search_term_string}"},"query-input":"required name=search_term_string"}]', '', $buffer);
	$buffer = str_replace('Наши преимущества', 'Наши преимущества', $buffer);
    
    return $buffer;
}


ob_start('extBuffer');

function calltouch_javascript() {
	return;
?>
<!-- calltouch -->
<script type="text/javascript">
(function(w,d,n,c){w.CalltouchDataObject=n;w[n]=function(){w[n]["callbacks"].push(arguments)};if(!w[n]["callbacks"]){w[n]["callbacks"]=[]}w[n]["loaded"]=false;if(typeof c!=="object"){c=[c]}w[n]["counters"]=c;for(var i=0;i<c.length;i+=1){p(c[i])}function p(cId){var a=d.getElementsByTagName("script")[0],s=d.createElement("script"),i=function(){a.parentNode.insertBefore(s,a)},m=typeof Array.prototype.find === 'function',n=m?"init-min.js":"init.js";s.type="text/javascript";s.async=true;s.src="https://mod.calltouch.ru/"+n+"?id="+cId;if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",i,false)}else{i()}}})(window,document,"ct","dpt8m732");
</script>
<script type="text/javascript">
		jQuery(document).on('click', '[type="submit"]', function() {
			var m = jQuery(this).closest('form');
			var fio = m.find('input[placeholder="Имя"], input[placeholder*="имя"]').val();
			var phone = m.find('input[placeholder="Телефон"], input[placeholder*="номер"]').val();
			var ct_site_id = '54279'; 
			var sub = 'Заявка с ' + location.hostname;
			var ct_data = {
				fio: fio,
				phoneNumber: phone,
				subject: sub,
				requestUrl: location.href,
				sessionId: window.call_value
			};
            console.log(ct_data);
			if (!!fio && !!phone && window.ct_snd_flag != 1){
			window.ct_snd_flag = 1; setTimeout(function(){ window.ct_snd_flag = 0; }, 20000);
				jQuery.ajax({
					url: 'https://api.calltouch.ru/calls-service/RestAPI/requests/'+ct_site_id+'/register/',  
					dataType: 'json', type: 'POST', data: ct_data, async: false
				});
			}
		});
</script>
<!-- calltouch -->
<?php
}
// add_action( 'wp_footer', 'calltouch_javascript' );

add_filter('wpcf7_autop_or_not', '__return_false');

function header_zakaz_zvonka() {
	$redirectFlag = 0;

	$name = $_POST['name'];
	$phone = $_POST['phone'];
//Модификация отправки форм
	$queryUrl = 'https://b24.mebelit-spb.ru/rest/78/u2su1mi5macw7433/crm.lead.add.json';
	$queryData = http_build_query( array(
		'fields' => array(
        'TITLE' => 'Обратный звонок',
		'NAME' => $name,
        'PHONE' => Array(
			"n0" => Array(
			"VALUE" => "$phone",
			"VALUE_TYPE" => "WORK",
			),
    	),
	),
		'params' => array("REGISTER_SONET_EVENT" => "Y")
));
	
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_POST => 1,
    CURLOPT_HEADER => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $queryUrl,
    CURLOPT_POSTFIELDS => $queryData,
));

$result = curl_exec($curl);
curl_close($curl);
$result = json_decode($result, 1);

if (array_key_exists('error, $result')) {
	echo "Ошибка при сохранении лида:".$result['error_descripton']."<br/>";
} 

//Конец модификации
	$to = 'mebelit-spb@mail.ru';
	$subject = 'Заявка с сайта "Мебелит Санкт-Петербург"';
	$message = 'Имя: '.$name.'<br>Телефон: '.$phone;
	$headers = array('Content-Type: text/html; charset=UTF-8');
	$return = wp_mail( $to, $subject, $message, $headers );
	$redirectFlag = true;

	return wp_send_json( ['send' => true, 'redirect' => $redirectFlag] );
};
add_action('wp_ajax_nopriv_header_zakaz_zvonka', 'header_zakaz_zvonka');
add_action('wp_ajax_header_zakaz_zvonka', 'header_zakaz_zvonka');
// Переадресация на страницу благодарности после отправки формы обратной связи



//Конец  Переадресация на страницу благодарности после отправки формы обратной связи
//

function my_shortcode() {
	$html = '<div class="itap-job">
    <div class="block">
        <div class="circle">
            <span class="sp-r">от</span>
            <p>40</p>
            <span class="sp-c">дней</span>
        </div>
        <p class="txt">Срок <br> изготовления</p>
    </div>
    <div class="block">
        <div class="circle">
            <p>24 <span>месяца</span></p>
        </div>
        <p class="txt">Гарантия на <br> нашу мебель</p>
    </div>
    <div class="block">
        <div class="circle">
            <p>12 <span>месяца</span></p>
        </div>
        <p class="txt">Предоставляем бесплатную <br> рассрочку без банка</p>
    </div>
</div>';
	return $html;
	}
	add_shortcode('jobshortcode', 'my_shortcode');