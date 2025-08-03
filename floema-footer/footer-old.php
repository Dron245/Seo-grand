<footer class="footer" id="footer">
<div class="container">
	<div class="footer__wrapper">
 <a href="" class="nav__logo-link">
		<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/footer/logo.php"
	)
);?> </a>
		<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"bottom",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"COMPONENT_TEMPLATE" => "bottom",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(),
		"MENU_CACHE_TIME" => "360000",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "N",
		"ROOT_MENU_TYPE" => "bottom",
		"USE_EXT" => "N"
	)
);?>
		<div class="footer__wrapper__contacts">
			<p class="footer__wrapper__contacts__item">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/footer/adress.php"
	)
);?>
			</p>
			<div class="footer__wrapper__contacts__container">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/footer/phone.php"
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/footer/mail.php"
	)
);?>
			</div>
			<div class="socials">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"template1",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/footer/vk.php"
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"template1",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/footer/whatsapp.php"
	)
);?> <?/* $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/include/footer/inst.php"
                        )
); */ ?> <? /* $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/include/footer/facebook.php"
                        )
); */ ?>
			</div>
		</div>
 <a href="#top" class="to-top"><img src="/local/templates/floema_new/assets/img/button-arrow-top..svg" alt=""></a>
	</div>
	<div class="footer__wrapper">
 <span class="footer__wrapper__span">© 2025 «Floema»</span>
		<div>
 <a href="/politika-konfidentsialnosti/" target="_blank" class="footer__wrapper__link">Политика конфиденциальности</a><br>
			 <!-- <a href="/upload/politika-k.docx" target="_blank" class="footer__wrapper__link">Политика в области качества</a> -->
		</div>
	</div>
</div>
 </footer>