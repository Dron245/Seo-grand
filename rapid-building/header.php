<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

include dirname(dirname(dirname(__FILE__))).'/components/calc/calculator/templates/.default/model/model.sender.php';
?>
<!DOCTYPE html>
<?$APPLICATION->IncludeFile(SITE_DIR."include/sis/redirect.php");?>
<?if(CModule::IncludeModule("aspro.allcorp2"))
	$arThemeValues = CAllcorp2::GetFrontParametrsValues(SITE_ID);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>" class="<?=($_SESSION['SESS_INCLUDE_AREAS'] ? 'bx_editmode ' : '')?><?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0' ) ? 'ie ie7' : ''?> <?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0' ) ? 'ie ie8' : ''?> <?=strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0' ) ? 'ie ie9' : ''?>">
	<head>
<script src="https://www.googleoptimize.com/optimize.js?id=OPT-5LK2G6D"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-09QXL7XPP3"></script>
<script async>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-129122290-23', {'custom_map': {'metric1': 'Active_time','dimension1': 'ClientId','dimension4': 'clientId'}});
  gtag('config', 'G-09QXL7XPP3');
  setTimeout(function(){    gtag('event','Over 15 seconds', {event_category : "NoBounce"});  },15000);
</script>

<!-- Google Tag Manager -->
<script async>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TK5RWGX');</script>
<!-- End Google Tag Manager -->

		<?global $APPLICATION;?>
		<?IncludeTemplateLangFile(__FILE__);?>
		<title><?$APPLICATION->ShowTitle()?></title>
		<?\CJSCore::Init(array("fx"));?>
		<meta name="yandex-verification" content="beece96ebac42f4d">
		<meta name="yandex-verification" content="9bdc036f570834ff">
		<meta name="yandex-verification" content="f0a7a52cfaf6e045">

<meta name="yandex-verification" content="fb97286f746f0142">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

		<?//$APPLICATION->ShowMeta("viewport");?>
		<?$APPLICATION->ShowMeta("HandheldFriendly");?>
		<?//?$APPLICATION->ShowMeta("apple-mobile-web-app-capable", "yes");?>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<?$APPLICATION->ShowMeta("apple-mobile-web-app-status-bar-style");?>
		<?$APPLICATION->ShowMeta("SKYPE_TOOLBAR");?>
		<?$APPLICATION->AddHeadScript($APPLICATION->GetTemplatePath("js/lazy-load.js"), true);?>
		<?$APPLICATION->ShowHead();?>
		

		<?$APPLICATION->AddHeadString('<script>BX.message('.CUtil::PhpToJSObject($MESS, false).')</script>', true);?>
		
		<?if(CModule::IncludeModule("aspro.allcorp2")) {CAllcorp2::Start(SITE_ID);}?>


<script type="text/javascript">
$( document ).ready(function() {
	function ChatCss(){
		var element = document.getElementById('productview');

		if(element)
		{ 
			style.cssText= "position: fixed !important;";
		}
	}
	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
	setInterval(ChatCss, 1);
	}
});
</script>

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
		<script src="/bitrix/templates/aspro-allcorp2/js/google-translate.js"></script>

		<script src="https://www.google.com/recaptcha/api.js?render=6LfdxtInAAAAAA8MyLP8LxqsBiqVPR00IOHPJug3" async defer></script>
		<script src="/bitrix/templates/aspro-allcorp2/js/captcha_code.js" async defer></script>


<!-- Yandex.Metrika counter -->
<script defer type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(32233269, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        trackHash:true
   });
</script>


	</head>
	<?$bIndexBot = (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && strpos($_SERVER['HTTP_USER_AGENT'], 'Lighthouse') !== false);?>
<body class="<?=($bIndexBot ? "wbot" : "");?> <?=(CModule::IncludeModule("aspro.allcorp2") ? CAllcorp2::getConditionClass() : '');?> mheader-v<?=$arThemeValues["HEADER_MOBILE"];?> footer-v<?=strtolower($arThemeValues['FOOTER_TYPE']);?> fill_bg_<?=strtolower($arThemeValues['SHOW_BG_BLOCK']);?> header-v<?=$arThemeValues["HEADER_TYPE"];?> title-v<?=$arThemeValues["PAGE_TITLE"];?><?=($arThemeValues['ORDER_VIEW'] == 'Y' && $arThemeValues['ORDER_BASKET_VIEW']=='HEADER'? ' with_order' : '')?><?=($arThemeValues['CABINET'] == 'Y' ? ' with_cabinet' : '')?><?=(intval($arThemeValues['HEADER_PHONES']) > 0 ? ' with_phones' : '')?>">
	<?if (file_exists($_SERVER['DOCUMENT_ROOT'].'/include/traffic.php')) include_once($_SERVER['DOCUMENT_ROOT'].'/include/traffic.php');?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TK5RWGX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<noscript><div><img src="https://mc.yandex.ru/watch/32233269" style="position:absolute; left:-9999px;" alt=""></div></noscript>
<!-- /Yandex.Metrika counter -->
		<div id="panel"><?$APPLICATION->ShowPanel();?></div>
		<?/* if(!(isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && strpos($_SERVER['HTTP_USER_AGENT'], 'Lighthouse') !== false)):?>
			<script async type="text/javascript">
			$(document).ready(function(){
				$.ajax({
					url: '<?=SITE_TEMPLATE_PATH?>/asprobanner.php' + location.search,
					type: 'post',
					success: function(html){
						if(!$('.form_demo-switcher').length){
							$('body').append(html);
						}
					}
				});
			});
			</script>
		<?endif; */?>
		<?//include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/asprobanner.php");?>
		<?if(!CModule::IncludeModule("aspro.allcorp2")):?>
			<?$APPLICATION->SetTitle(GetMessage("ERROR_INCLUDE_MODULE_ALLCORP2_TITLE"));?>
			<?$APPLICATION->IncludeFile(SITE_DIR."include/error_include_module.php");?>
			<?die();?>
		<?endif;?>

		<?CAllcorp2::SetJSOptions();?>
		<?global $arTheme;?>
		<?$arTheme = $APPLICATION->IncludeComponent("aspro:theme.allcorp2", "", array(), false);?>
		<?include_once('defines.php');?>
		<?if(!$isEducation):?>
			<?include_once('notification.php');?>
		<?endif;?>

		<?CAllcorp2::get_banners_position('TOP_HEADER');?>
		<div class="visible-lg visible-md title-v<?=$arTheme["PAGE_TITLE"]["VALUE"];?><?=($isIndex ? ' index' : '')?>">
			<?if($isEducation):?>
				<?$arTheme['HEADER_TYPE']['VALUE'] = 'education';?>
			<?endif;?>
			<?CAllcorp2::ShowPageType('header');?>
	</div><div></div>

		<?CAllcorp2::get_banners_position('TOP_UNDERHEADER');?>

		<?if($arTheme["TOP_MENU_FIXED"]["VALUE"] == 'Y' && !$isEducation):?>
			<div id="headerfixed">
				<?CAllcorp2::ShowPageType('header_fixed');?>
			</div>
		<?endif;?>

		<div id="mobileheader" class="visible-xs visible-sm">
			<?if($isEducation):?>
				<?$arTheme['HEADER_MOBILE']['VALUE'] = 'education';?>
			<?endif;?>
			<?CAllcorp2::ShowPageType('header_mobile');?>
			<div id="mobilemenu" class="<?=($arTheme["HEADER_MOBILE_MENU_OPEN"]["VALUE"] == '1' ? 'leftside':'dropdown')?> <?if(EXP_TEST4):?>mobilemenu-new<?endif;?>">
				<?if($isEducation):?>
					<?$arTheme['HEADER_MOBILE_MENU']['VALUE'] = 'education';?>
				<?endif;?>
				<?CAllcorp2::ShowPageType('header_mobile_menu');?>
			</div>
		</div>
		

		<div class="body <?=($isIndex || strtok($_SERVER["REQUEST_URI"], '?') == '/krsk/' ? 'index' : '')?> hover_<?=$arTheme["HOVER_TYPE_IMG"]["VALUE"];?>">

		<div class="mobilemenu-descr <?if(EXP_TEST4):?>mobilemenu-descr-new<?endif;?> container visible-xs visible-sm">
			<div class="row">
				<div class="col-md-6 pull-left mobilemenu-descr_mail">
					<?CAllcorp2::showEmail('email blocks');?>
				</div>
				<div class="col-md-6 pull-right mobilemenu-descr_phone 111">
					<?if($isEducation):?>
						<a href="tel:89631840806">8 (963) 184-08-06</a>
					<?else:?>
						<a href="tel:88005558920">8 800 555-89-20</a>
					<?endif;?>
				</div>
			</div>
		</div>
		
			<div class="body_media"></div>
			<div role="main" class="main banner-auto<?$APPLICATION->ShowViewContent('proekt_detail');?>">
				<?if(!$isIndex && !$is404 && !$isForm && (strtok($_SERVER["REQUEST_URI"], '?') != '/krsk/')):?>
                    <? if (EXP_TEST3 && $isBuilding && !$isBuildingHome): ?>						
                        <div class="building-breadcrumb">
                            <div class="maxwidth-theme">
                                <h1><?$APPLICATION->ShowTitle(false)?></h1>
                                <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "building", array(
                                    "START_FROM" => "0",
                                    "PATH" => "",
                                    "SITE_ID" => SITE_ID
                                ),false);?>
                            </div>
                        </div>
					<?elseif($APPLICATION->GetProperty("HIDETITLE")!=='Y'):?>
						<!--title_content-->
						<? CAllcorp2::ShowPageType('page_title');?>
						<!--end-title_content-->
					<?endif;?>
					<?$APPLICATION->ShowViewContent('section_bnr_content_custom');?>
					<?$APPLICATION->ShowViewContent('top_section_filter_content');?>
				<?endif; // if !$isIndex && !$is404 && !$isForm?>

				<div class="container <?=($isCabinet ? 'cabinte-page' : '');?><?=($isBlog ? ' blog-page' : '');?><?=($isLanding ? 'landing-page' : '');?> <?=CAllcorp2::ShowPageProps("ERROR_404");?>">
					<?if(!$isIndex && !$isLanding && (strtok($_SERVER["REQUEST_URI"], '?') != '/krsk/')):?>
					<? if ($_SERVER['REQUEST_URI'] != '/uchebniy-tsentr/'): ?>
						<div class="row">
							<?if($APPLICATION->GetProperty("FULLWIDTH")!=='Y'):?>
								<div class="maxwidth-theme stroit_bg">
							<?endif;?>
							<?if($is404):?>
								<div class="col-md-12 col-sm-12 col-xs-12 content-md">
							<?else:?>
								<div class="col-md-12 col-sm-12 col-xs-12 content-md">
									<div class="right_block narrow_<?=CAllcorp2::ShowPageProps("MENU");?> <?=$APPLICATION->ShowViewContent('right_block_class')?> <?=$isCatalog ? "catalog_page" : ""?>">
									<?CAllcorp2::get_banners_position('CONTENT_TOP');?>

									<?ob_start();?>
										<?$APPLICATION->IncludeComponent(
											"bitrix:menu",
											"left",
											array(
												"ROOT_MENU_TYPE" => "left",
												"MENU_CACHE_TYPE" => "A",
												"MENU_CACHE_TIME" => "3600000",
												"MENU_CACHE_USE_GROUPS" => "N",
												"MENU_CACHE_GET_VARS" => array(
												),
												"MAX_LEVEL" => "4",
												"CHILD_MENU_TYPE" => "left",
												"USE_EXT" => "Y",
												"DELAY" => "N",
												"ALLOW_MULTI_SELECT" => "Y",
												"COMPONENT_TEMPLATE" => "left"
											),
											false
										);?>
									<?$sMenuContent = ob_get_contents();
									ob_end_clean();?>
							<?endif;?>
					<?endif;?>
					<?CAllcorp2::checkRestartBuffer();?>
<? endif; ?>
