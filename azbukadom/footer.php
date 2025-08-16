	<footer class="footer">
		<div class="container">
			<div class="title">
				<h2 class="title_h2"><?=GetMessage('TITLE_CONTACTS')?></h2>
			</div>
			<div class="row">
				<div class="col-12 col-xl-4">
					<div class="logo"></div>
				</div>
				<div class="col-12 col-xl-8">
					<?php $location = get_current_location();
					$contacts = get_highload_rows(HLBLOCK_CONTACTS, ['*'], null, ['UF_XML_ID' => $location['UF_XML_ID']]);
					if( count($contacts) > 0 ) {?>
						<div class="contacts">
							<div class="row">
								<?php foreach( $contacts as $contact ) {
									if( SITE_ID == 'en' ) {
										$contact['UF_NAME'] = $contact['UF_NAME_' . strtoupper(SITE_ID)];
										$contact['UF_TITLE'] = $contact['UF_TITLE_' . strtoupper(SITE_ID)];
										$contact['UF_ADDRESS'] = $contact['UF_ADDRESS_' . strtoupper(SITE_ID)];
									}?>
									<div class="col-12 col-md-6">
										<p class="contact-title"><?=GetMessage('TITLE_OFFICE')?></p>
										<?php if( $contact['UF_ADDRESS'] <> '' ) {?>
											<p><?=str_replace(PHP_EOL, '<br/>', $contact['UF_ADDRESS'])?></p>
										<?php } ?>
										<?php if( $contact['UF_PHONE'] <> '' ) {?>
											<p><a href="tel:<?=str_replace([' ', '-', '(', ')'], '', $contact['UF_PHONE'])?>"><?=$contact['UF_PHONE']?></a></p>
										<?php } ?>
									</div>
								<?php } ?>
								<?php $emails = get_highload_rows(HLBLOCK_EMAILS, ['*']);
								if( count($emails) > 0 ) {?>
									<div class="col-12 col-md-6">
										<?php foreach( $emails as $email ) {
											if( SITE_ID == 'en' ) {
												$email['UF_TITLE'] = $email['UF_TITLE_' . strtoupper(SITE_ID)];
											}?>
											<?php if( $email['UF_TITLE'] <> '' ) {?>
												<p class="contact-title"><?=$email['UF_TITLE']?>:</p>
											<?php } ?>
											<?php if( $email['UF_EMAIL'] <> '' ) {?>
												<p><a href="mailto:<?=$email['UF_EMAIL']?>"><?=$email['UF_EMAIL']?></a></p>
											<?php } ?>
										<?php } ?>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-xl-8 order-xl-last">
					<p class="h1"><?=GetMessage('TITLE_FOOTER')?></p>
				</div>
				<div class="col-12 col-xl-4 order-xl-first">
					<a href="/upload/files/<?=GetMessage('PRESENTATION_FILE')?>" download="" class="btn btn-primary btn-arrow"><?=GetMessage('PRESENTATION_DOWNLOAD')?></a>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="row justify-content-between">
					<div class="col-12 col-xl-auto">
						<p>© <?=date('Y')?> AZBUKA Dom Studio. <?=GetMessage('RIGHTS_TEXT')?></p>
					</div>
					<div class="col-12 col-xl-auto">
						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"",
							Array(
								"ALLOW_MULTI_SELECT" => "N",
								"CHILD_MENU_TYPE" => "",
								"DELAY" => "N",
								"MAX_LEVEL" => "1",
								"MENU_CACHE_GET_VARS" => array(""),
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_TYPE" => "N",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"ROOT_MENU_TYPE" => "social",
								"USE_EXT" => "N",
								"CLASS_UL" => "social"
							)
						);?>
					</div>
				</div>
				<div class="footer-links">
					<div>
						<p><a href="<?=PAGE_POLICY?>"><?=GetMessage('POLICY_TITLE')?></a></p>
					</div>
					<div>
						<p><a href="#"><?=GetMessage('COOKIES_TITLE')?></a></p>
					</div>
					<!--div class="developer">
						<p><a href="#"></a></p>
					</div-->
				</div>
			</div>
		</div>
	</footer>
	<div class="modal fade" id="modal-feedback" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
				<div class="modal-body">
					<div class="modal-title"><?=GetMessage('FORM_TITLE')?></div>
					<p><?=GetMessage('FORM_TEXT')?></p>
					<hr/>
					<form class="ajax" method="post" action="/ajax/form.php">
						<input type="hidden" name="ACTION" value="DISCUSS">
						<input type="hidden" name="URL" value="<?=SITE_SERVER_PROTOCOL . SITE_SERVER_NAME . $curPage?>">
						<div class="form-group">
							<label><?=GetMessage('FORM_FIELD_NAME')?>*</label>
							<input type="text" class="form-control" placeholder="<?=GetMessage('FORM_FIELD_NAME_PLACEHOLDER')?>" name="NAME">
						</div>
						<div class="form-group">
							<label><?=GetMessage('FORM_FIELD_PHONE')?>*</label>
							<input type="text" class="form-control" placeholder="<?=GetMessage('FORM_FIELD_PHONE_PLACEHOLDER')?>" name="PHONE">
						</div>
						<div class="form-group">
							<label><?=GetMessage('FORM_FIELD_CITY')?>*</label>
							<?$locations = get_locations();
							$location = get_current_location();?>
							<div class="dropdown dropdown-select">
								<input type="hidden" class="dropdown-select-value" name="CITY" value="<?=$location['UF_NAME']?>">
								<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" data-flip="false"><?=$location['UF_NAME']?></button>
								<div class="dropdown-menu">
									<?foreach( $locations as $key => $val ) {?>
										<a class="dropdown-item<?=$key == $location['UF_XML_ID'] ? ' active' : ''?>" href="#"><?=$val['UF_NAME']?></a>
									<?php } ?>
									<a class="dropdown-item" href="#"><?=GetMessage('FORM_FIELD_OTHER_LOCATION')?></a>
								</div>
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-block" type="submit"><?=GetMessage('FORM_SUBMIT')?></button>
						</div>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="form-agreement" name="AGREEMENT" value="1">
							<label class="custom-control-label" for="form-agreement"><?=GetMessage('FORM_AGREEMENT')?> <a href="<?=PAGE_POLICY?>" target="_blank"><?=GetMessage('FORM_AGREEMENT_LINK')?></a></label>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-video" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-centered">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
				<div class="modal-body">
					<div class="video-container">
						<div class="video-player embed-responsive embed-responsive-16by9" data-video="oZilblYHzRA"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>