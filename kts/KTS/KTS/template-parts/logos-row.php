<?
	$items = $logos.'-repeater';
	if ($type == 'section'){
		$header = get_sub_field('header');
		$footer = get_sub_field('footer');
	}else{
		$header = get_field($logos.'-header','option');
		$footer = get_field($logos.'-footer','option');
	}
?>
	
	<section class="logos-row hor-scroll">
		<div class="container-fluid">
			<? if( $header) { ?>
			<div class="header">
				<? echo $header; ?>
			</div>
			<? } ?>
			<?php 
				$logo_count = count(get_field($items,'option')); 
				
				if($logo_count > 4){
				switch (0) {
					case ($logo_count % 5) :
					case (($logo_count + 1) % 5) :
						$logo_col = '5';
						break;
					case ($logo_count % 4) :
					case (($logo_count + 1) % 4) :
						$logo_col = '4';
						break;
					case ($logo_count % 3) :
					case (($logo_count + 1) % 3) :
						$logo_col = '3';
						break;
					case ($logo_count % 2) :
					case (($logo_count + 1) % 2)  :
						$logo_col = '2';
						break;
					default:
						$logo_col = '1';
						break;
				}
				}else {
					$logo_col = '4';
				}
			?>
			<style>
			.logos-row {
				--logo_count : <?php echo $logo_col; ?>;
			}
			</style>
			<div class="items count-<?php echo $logo_count; ?> logo-col-<?php echo $logo_col; ?>">
			<?php
			while( have_rows($items,'option') ): the_row(); 
				$logo = get_sub_field('logo');
				$desc = get_sub_field('desc');
				$link = get_sub_field('link');
			?>
				<<? echo $link ? 'a href="'.$link.'"' : 'div'; ?> class="item">
					<?php if($logo){ ?>
					<div class="logo">
						<img src="<?php echo $logo; ?>" alt='<?php echo strip_tags($desc); ?>' >
					</div>
					<?php } ?>
					<?php if($desc){ ?>
					<div class="desc">
						<?php echo $desc; ?>
					</div>
					<?php } ?>
				</<? echo $link ? 'a' : 'div'; ?>>
			<?php 
			endwhile; 
			?>
			</div> 
			<? if( $footer) { ?>
			<div class="footer list">
				<? echo $footer; ?>
			</div>
			<? } ?>
		</div> 
	</section>