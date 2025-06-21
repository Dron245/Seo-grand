<?php
$custom_class = get_sub_field('custom-class');
$reviews = get_field('reviews','option');
if($reviews){
?>

<div id="reviews">
	<section class="image-section ">
		<div class="container-fluid">
			<div class="header ct">
				<h2>Отзывы о компании</h2>
			</div>
			<div class="reviews__slider">
				<?php
				foreach( $reviews as $reviews_item ){
					$reviews_item_url = $reviews_item['url'];
					$reviews_item_size = $reviews_item['sizes']['team'];
					$reviews_item_name = $reviews_item['title'];
				?>
					<div class="item">
						<div class="image">
							<a href="<?php echo $reviews_item_url; ?>" data-fancybox='' class="">
								<img src="<?php echo $reviews_item_size; ?>" class="" alt="<?php echo $reviews_item_name; ?>" loading="lazy" />
							</a>
						</div>
						<div class="name">
							<?php echo $reviews_item_name; ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
</div>
<?php
}
?>