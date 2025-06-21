<?php
if(get_field('company', 'option')['name']){
	$company_name = get_field('company', 'option')['name'];
}elseif(get_field('company', 'option')['brand']){
	$company_name = '«'.get_field('company', 'option')['brand'].'»';
}else {
	$company_name = get_bloginfo('name');
}

if (function_exists('city_ph')) {
	$phone = '+7'.substr(preg_replace('#[^\d]#','',city_ph()), 1);
} else {
	$phone = '+7'.substr(preg_replace('#[^\d]#','',get_field('phone', 'option')), 1);
}
?>

<div class="price-row">
	<div class="price-left">
		<?php if($price_sale){ ?>
		<div class="price-del">
			<?php echo number_format($price_def, 0, '', '&nbsp;'); ?> <?php echo $price_name; ?>
		</div>
		<?php } ?>
		<div class="price-def">
			<?php echo $price_start; ?>
			<span itemprop="price" content="<?php echo $price; ?>" class="priceNumbers"><?php echo number_format($price, 0, '', '&nbsp;'); ?></span> 
			<span itemprop="priceCurrency" content="RUB"><?php echo $price_name; ?></span>
			
			<meta itemprop="availability" content="http://schema.org/InStock">
			<meta itemprop="itemCondition" content="https://schema.org/NewCondition" />
			<meta itemprop="priceValidUntil" content="<?= date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 3650 day"));?>">
			<div itemprop="seller" itemtype="http://schema.org/Organization" itemscope>
				<meta itemprop="name" content="<?php echo $company_name; ?>" />
				<meta itemprop="address" content="<?php echo do_shortcode('[adress]'); ?>" />
				<meta itemprop="telephone" content="<?php echo $phone; ?>" />
			</div>
		</div>
	</div>
	<?php if($price_sale){ ?>
	<div class="price-right">
		Экономия
		<span><?php echo number_format($price_def-$price_sale, 0, '', '&nbsp;'); ?> <?php echo $price_name; ?></span>
	</div>
	<?php } ?>
</div>

<!-- <div class="button">
     <button data-src="#popup-order" data-fancybox class="btn" anim="ripple"><span>Заказать</span></button>
</div> -->

<div class="button">
     <button class="goodini-addtocart btn" data-id="<?php echo get_the_id(); ?>" anim="ripple"><span>Заказать</span></button>
</div>