<?php
$items = $logos . '-repeater';
if ($type == 'section') {
	$header = get_sub_field('header');
	$footer = get_sub_field('footer');
} else {
	$header = get_field($logos . '-header', 'option');
	$footer = get_field($logos . '-footer', 'option');
}
?>

<section class="logos-row">
	<div class="container-fluid">
		<?php if ($header) { ?>
			<div class="header">
				<?php echo $header; ?>
			</div>
		<?php } ?>
		<div class="logos-row-slider" id="logos-row-slider">
			<?php
			while (have_rows($items, 'option')) : the_row();
				$logo = get_sub_field('logo');
				$desc = get_sub_field('desc');
				$link = get_sub_field('link');
			?>
				<div class="slide">
					<<?php echo $link ? 'a href="' . $link . '" target="_blank" rel="nofollow"' : 'div'; ?> class="item">
						<div class="logo">
						<div class="logo-img">
							<img src="<?php echo $logo; ?>" alt='<?php echo strip_tags($desc); ?>'>
						</div>
						</div>
						<?php if ($desc) { ?>
							<div class="desc">
								<?php echo $desc; ?>
							</div>
						<?php } ?>
					</<?php echo $link ? 'a' : 'div'; ?>>
				</div>
			<?php
			endwhile;
			?>
		</div>
		<?php if ($footer) { ?>
			<div class="footer list">
				<? echo $footer; ?>
			</div>
		<?php } ?>
	</div>
</section>