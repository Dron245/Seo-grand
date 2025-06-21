<?php
get_header();

// Определение типа записи
include(locate_template('template-parts/type-page.php'));

// первый экран
include_once(locate_template('template-parts/hero.php'));


if (get_field('company', 'option')['brand']) {
	$brand = get_field('company', 'option')['brand'];
} else {
	$brand = get_bloginfo('name');
}

$args_images = array(
	'post_type' => array('reviews'),
	'showposts' => -1,
	'meta_query'     => [
		[ // Проверяет существование поля у записи
			'key' => 'image',
			'compare' => 'EXISTS'
		],
		[ // Проверяет заполненность поля
			'key' => 'image',
			'compare' => '!=',
			'value' => ''
		]
	]
);
$query_image = new WP_Query($args_images);

$args_video = array(
	'post_type' => array('reviews'),
	'showposts' => -1,
	'meta_query'     => [
		[ // Проверяет существование поля у записи
			'key' => 'video-id',
			'compare' => 'EXISTS'
		],
		[ // Проверяет заполненность поля
			'key' => 'video-id',
			'compare' => '!=',
			'value' => ''
		]
	]
);
$query_video = new WP_Query($args_video);

$args_text = array(
	'post_type' => array('reviews'),
	'showposts' => -1,
	'meta_query'     => [
		[ // Проверяет существование поля у записи
			'key' => 'review',
			'compare' => 'EXISTS'
		],
		[ // Проверяет заполненность поля
			'key' => 'review',
			'compare' => '!=',
			'value' => ''
		]
	]
);
$query_text = new WP_Query($args_text);

$args_audio = array(
	'post_type' => array('reviews'),
	'showposts' => -1,
	'meta_query'     => [
		[ // Проверяет существование поля у записи
			'key' => 'audio-mp3',
			'compare' => 'EXISTS'
		],
		[ // Проверяет заполненность поля
			'key' => 'audio-mp3',
			'compare' => '!=',
			'value' => ''
		]
	]
);
$query_audio = new WP_Query($args_audio);

//print("<pre>".print_r($query_text->posts,true)."</pre>");

$count_video = wp_count_posts('cases')->publish;
?>

<div id="reviews">

	<?php if (!empty($query_image->posts)) { ?>
		<section class="image-section">
			<div class="container-fluid">
				<div class="row reviews__slider">
					<?php
					while ($query_image->have_posts()) : $query_image->the_post();
						$name = get_the_title();
						$image = get_field('image');
						$image_url = $image['url'];
						$image_size = $image['sizes']['team'];
					?>
						<div class="col-lg-25 ">
							<div class="image">
								<a href="<?php echo $image_url; ?>" data-fancybox='images-<?php echo $building_row; ?>' class="">
									<img data-src="<?php echo $image_size; ?>" src="<?php echo $image_micro; ?>" class="lazy" alt="<?php echo $name; ?>" />
								</a>
							</div>
							<div class="name">
								<?php echo $name; ?>
							</div>
						</div>
					<?php
					endwhile;
					wp_reset_query();
					?>
				</div>
			</div>
		</section>
	<?php }	?>

	<?php if (!empty($query_video->posts)) { ?>
		<section class="video-section">
			<div class="container-fluid">
				<div class="header list">
					<?php echo $header; ?>
				</div>
				<div class="review-video">
					<div class="review-video-slider">
						<?php
						$video_num = 0;
						while ($query_video->have_posts()) : $query_video->the_post();
							$video_num++;
							$name = get_the_title();
							$video = get_field('video-id');
							$YouTube_ID = YouTubeID($video); // ID видео с YouTube
						?>
							<div class="slide">
								<div class="video">
									<a class="video__link" href="https://youtu.be/<? echo $YouTube_ID; ?>" id="<? echo $YouTube_ID; ?>">
										<picture>
											<source srcset="https://i.ytimg.com/vi_webp/<? echo $YouTube_ID; ?>/<?php echo YouTubeRes($YouTube_ID); ?>.webp" type="image/webp">
											<img class="video__media" src="https://i.ytimg.com/vi/<? echo $YouTube_ID; ?>/<?php echo YouTubeRes($YouTube_ID); ?>.jpg" alt="<? echo $alt . ' — ' . $video_num . ' / ' . get_field('company', 'option')['brand']; ?>">
										</picture>
									</a>
									<button class="video__button" aria-label="Запустить видео">
										<svg width="68" height="48" viewBox="0 0 68 48">
											<path class="video__button-shape" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
											<path class="video__button-icon" d="M 45,24 27,14 27,34"></path>
										</svg>
									</button>
								</div>
								<div class="name">
									<?php echo $name; ?>
								</div>
							</div>
						<?php
						endwhile;
						wp_reset_query();
						?>
					</div>
					<div class="review-video-slider-arrow"></div>
				</div>
			</div>
		</section>
	<?php }	?>

	<?php if (!empty($query_audio->posts)) { 	?>
		<section class="reviews-audio">
			<div class="container-fluid">
				<div class="header list">
					<?php echo $header; ?>
				</div>
				<div class="audios">
					<?php
					while ($query_audio->have_posts()) : $query_audio->the_post();
						$audio_mp3 = get_field('audio-mp3');
						$audio_aac = get_field('audio-aac');
						$audio_ogg = get_field('audio-ogg');
						$blockquote = get_field('blockquote');
					?>
						<div class="item">
							<audio controls="" controlslist="nodownload novolume nomute">
								<source src="<?php echo $audio_mp3; ?>" type="audio/mp4">
								<source src="<?php echo $audio_ogg; ?>" type="audio/ogg">
								<source src="<?php echo $audio_aac; ?>" type="audio/aac">
							</audio>
							<div class="quote">
								<?php echo $blockquote; ?>
							</div>
						</div>
					<?php
					endwhile;
					wp_reset_query();
					?>
				</div>
			</div>
		</section>
	<?php } ?>

	<?php if (!empty($query_text->posts)) { ?>
		<section class="reviews">
			<div class="container-fluid">
				<?php
				$reviews = [];
				while ($query_text->have_posts()) : $query_text->the_post();
					$reviews[] = [
						'name'       => get_the_title(),
						'review'     => get_field('review'),
						'avatar'     => get_field('avatar'),
						'image'      => get_field('image'),
						'city'       => get_field('city'),
						'position'   => get_field('position'),
						'blockquote' => get_field('blockquote'),
					];

				endwhile;
				wp_reset_query();

				get_template_part('template-parts/review-slider', null, ['reviews' => $reviews]);
				?>
			</div>
		</section>
	<?php } ?>

</div>


<?php
// Модули
include_once(locate_template('template-parts/modules.php'));

//	Менеджер
include_once(locate_template('blocks/block-manager.php'));


get_footer();
?>