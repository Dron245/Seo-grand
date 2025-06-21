<div class="product-head">
	<div class="row">
		<div class="col-lg-9 col-ml-8 col-md-7 col-9">
			<div id="breadcrumbs">
				<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
			</div>
		</div>
		<div class="col-lg-3 col-ml-4 col-md-5 col-3">
			<?php if($code){ ?>
			<div class="code">
				Код товара: <span><?php echo $code; ?></span>
				<meta itemprop="sku" content="<?php echo $code; ?>" />
			</div>
			<?php } ?>
			<?/*<div class="share">
				<script src="https://yastatic.net/share2/share.js"></script><div class="ya-share2" data-curtain data-limit="0" data-more-button-type="short" data-services="vkontakte,facebook,odnoklassniki,telegram,viber,whatsapp"></div>
			</div>*/?>
		</div>
	</div>
</div>