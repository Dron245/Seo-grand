<?php
if(in_array('noindex',get_sub_field('section-activity')['section-check'])){
	echo '<noindex>';
}
?>
<?php 
$image = get_sub_field('image'); 
$quote = get_sub_field('desc')['quote']; 
$text = get_sub_field('desc')['text']; 
$name = get_sub_field('desc')['name']; 
$position = get_sub_field('desc')['position']; 
$link_page = get_sub_field('desc')['link-page']; 
$link_name = get_sub_field('desc')['link-name']; 
?>

	<section id="<?php echo $building_row; ?>" class="kts-boss">
		<div class="container-fluid">
			<div class="item">
				
				<div class="col-boss col-text">
					<div class="text list">
						<?php echo $text; ?>
					</div>
					<div class="link-more">
						<a href="<?php echo $link_page; ?>" class="link"><?php echo $link_name; ?></a>
					</div>
				</div>
					
				<div class="col-boss col-image">
					<div class="image">
						<div>
							<link rel="preload" as="image" href="<?php echo $image['url']; ?>">
							<img src="<?php echo $image['url']; ?>" class="lazy" alt="<?php echo $name; ?>. <?php echo strip_tags($position); ?>" loading="lazy"/>
						</div>
						<?php if($quote){ ?>
						<div class="quote">
							<?php echo $quote; ?>
						</div>
						<?php } ?>
					</div>
					<div class="name-block">
						<div class="position">
							<?php echo $position; ?>
						</div>
						<div class="name">
							<?php echo $name; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php
if(in_array('noindex',get_sub_field('section-activity')['section-check'])){
	echo '</noindex>';
}
?>