<?php
if (in_array('noindex', get_sub_field('section-activity')['section-check'])) {
	echo '<noindex>';
}
?>
<section class="cases">
	<div class="container-fluid">
		<?php if (the_sub_field('header')) { ?>
			<div class="header-block">
				<div class="header list">
					<?php the_sub_field('header'); ?>
				</div>
				<div class="cases-arrow"></div>
			</div>
		<?php } ?>
		<?php if (get_sub_field('type') == 'slider') { ?>
			<div class="slider">
				<?php
				// Выборка кейсов по категории
				if (get_sub_field('items-cat')) {
					$args = array(
						'post_type' => array('cases'),
						'showposts' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'cases_category',
								'field'    => 'id',
								'terms'  => get_sub_field('items-cat'),
							)
						),
						'order' => 'ASC',
					);
					// Выборка кейсов по тегу
				} elseif (get_sub_field('items-tag')) {
					$args = array(
						'post_type' => array('cases'),
						'showposts' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'cases_tags',
								'field'    => 'id',
								'terms'  => get_sub_field('items-tag'),
							)
						),
						'order' => 'ASC',
					);
					// Выборка по кейсам
				} elseif (get_sub_field('items')) {
					$args = array(
						'post_type' => array('cases'),
						'showposts' => -1,
						'post__in' => get_sub_field('items'),
						'order' => 'ASC',
					);
					// Все кейсы
				} else {
					$args = array(
						'post_type' => array('cases'),
						'showposts' => -1,
						'order' => 'ASC',
					);
				}
				$the_query = new WP_Query($args);
				$case_num = "";
				while ($the_query->have_posts()) : $the_query->the_post();
					$case_num++;
					$gallery_arr = get_field('gallery');
					$customer = get_field('detail')['customer'];
					$year = get_field('detail')['year'];
					$town = get_field('detail')['town'];
					$intro = get_field('detail')['intro'];
					$budget = get_field('detail')['budget'];
					$worklist = get_field('work-list');
					$workequipment = get_field('work-equipment');
				?>
					<div class="item">
						<div class="case">
							<div class="row">
								<div class="col-ml-5 col-12">
									<div class="case-gallery">
										<div class="case-gallery-slider">
											<?php
											foreach ($gallery_arr as $image) :
											?>
												<a href="<?php echo $image['url']; ?>" data-fancybox='case-<?php echo $case_num; ?>' class="image" style="background-image: url(<?php echo $image['sizes']['item']; ?>);">
												</a>
											<?php
											endforeach;
											?>
										</div>
									</div>
								</div>
								<div class="col-ml-7 col-12">
									<div class="content">

										<div class="title">
											<h3><?php the_title(); ?></h3>
										</div>

										<?php if ($customer || $town || $year || $intro) { ?>
											<div class="info-block">

												<?php if ($intro) { ?>
													<div class="intro list">
														<?php echo $intro; ?>
													</div>
												<?php } ?>

												<?php if ($customer || $town || $year) { ?>
													<div class="info">
														<?php if ($customer) { ?>
															<div class="detail">
																<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:v="https://vecta.io/nano">
																	<path d="M405.3 0H106.7C47.8.1.1 47.8 0 106.7v298.7C.1 464.2 47.8 511.9 106.7 512h298.7c58.9-.1 106.6-47.8 106.7-106.7V106.7C511.9 47.8 464.2.1 405.3 0zm-256 469.3V448c0-58.9 47.8-106.7 106.7-106.7S362.7 389.1 362.7 448v21.3H149.3zm320-64c0 35.3-28.7 64-64 64V448c0-82.5-66.9-149.3-149.3-149.3S106.7 365.5 106.7 448v21.3c-35.3 0-64-28.7-64-64V106.7c0-35.3 28.7-64 64-64h298.7c35.3 0 64 28.7 64 64v298.6zM256 85.3c-47.1 0-85.3 38.2-85.3 85.3S208.9 256 256 256s85.3-38.2 85.3-85.3-38.2-85.4-85.3-85.4zm0 128c-23.6 0-42.7-19.1-42.7-42.7S232.4 128 256 128s42.7 19.1 42.7 42.7-19.1 42.6-42.7 42.6z" />
																</svg>
																<?php echo $customer; ?>
															</div>
														<?php } ?>
														<?php if ($town) { ?>
															<div class="detail">
																<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:v="https://vecta.io/nano">
																	<path d="M256 0C161.896 0 85.333 76.563 85.333 170.667c0 28.25 7.063 56.26 20.5 81.104L246.667 506.5c1.875 3.396 5.448 5.5 9.333 5.5s7.458-2.104 9.333-5.5L406.23 251.687c13.375-24.76 20.438-52.77 20.438-81.02C426.667 76.563 350.104 0 256 0zm0 256c-47.052 0-85.333-38.28-85.333-85.333S208.948 85.334 256 85.334s85.333 38.28 85.333 85.333S303.052 256 256 256z" />
																</svg>
																<?php echo $town; ?>
															</div>
														<?php } ?>
														<?php if ($year) { ?>
															<div class="detail">
																<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:v="https://vecta.io/nano">
																	<path d="M405.3 42.7H384V21.3C384 9.6 374.4 0 362.7 0c-11.8 0-21.3 9.6-21.3 21.3v21.3H170.7V21.3c0-11.8-9.6-21.3-21.3-21.3S128 9.6 128 21.3v21.3h-21.3C47.8 42.7.1 90.5 0 149.3v256C.1 464.2 47.8 511.9 106.7 512h298.7c58.9-.1 106.6-47.8 106.7-106.7v-256c-.2-58.8-47.9-106.6-106.8-106.6zM42.7 149.3c0-35.3 28.7-64 64-64h298.7c35.3 0 64 28.7 64 64v21.3H42.7v-21.3zm362.6 320H106.7c-35.3 0-64-28.7-64-64v-192h426.7v192c-.1 35.4-28.7 64-64.1 64z" />
																	<circle cx="256" cy="320" r="32" />
																	<circle cx="149.3" cy="320" r="32" />
																	<circle cx="362.7" cy="320" r="32" />
																</svg>
																<?php echo is_numeric($year) ? $year . " г." : $year; ?>
															</div>
														<?php } ?>
														<?php if ($budget) { ?>
															<div class="detail">
																<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:v="https://vecta.io/nano">
																	<circle cx="117.3" cy="330.7" r="32" />
																	<path d="M405.3 64H106.7C47.8 64.1.1 111.8 0 170.7v170.7C.1 400.2 47.8 447.9 106.7 448h298.7c58.9-.1 106.6-47.8 106.7-106.7V170.7c-.2-58.9-47.9-106.6-106.8-106.7zm-298.6 42.7h298.7c35.3 0 64 28.7 64 64H42.7c0-35.4 28.6-64 64-64zm298.6 298.6H106.7c-35.3 0-64-28.7-64-64v-128h426.7v128c-.1 35.4-28.7 64-64.1 64z" />
																</svg><?php echo $budget; ?>
															</div>
														<?php } ?>
													</div>
												<?php } ?>
											</div>
										<?php } ?>

										<div class="work">
											<?php if ($worklist) { ?>
												<div class="worklist list">
													<div class="head">
														Задача:
													</div>
													<?php echo $worklist; ?>
												</div>
											<?php } ?>

											<?php if ($workequipment) { ?>
												<div class="workequipment list">
													<div class="head">
														Решение:
													</div>
													<?php echo $workequipment; ?>
												</div>
											<?php } ?>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				<?php
				endwhile;
				wp_reset_query();
				?>
			</div>
		<?php } elseif (get_sub_field('type') == 'grid') { ?>
			<div class="grid">
				<?php
				if (get_sub_field('items')) {
					$args = array(
						'post_type' => array('cases'),
						'showposts' => -1,
						'post__in' => get_sub_field('items'),
						//'order' => 'ASC',
						'orderby' => 'post__in',
					);
				} else {
					$args = array(
						'post_type' => array('cases'),
						'showposts' => -1,
						'order' => 'ASC',
					);
				}
				$the_query = new WP_Query($args);
				$case_num = "";
				while ($the_query->have_posts()) : $the_query->the_post();
					$case_num++;
					$gallery_arr = get_field('gallery');
					$logo = get_field('detail')['logo'];
					$year = get_field('detail')['year'];
					$intro = get_field('detail')['intro'];
					$doc = get_field('detail')['doc'];
					if ($case_num <= 12) {
				?>
						<div class="item ">
							<div class="case">
								<div class="images">
									<?php
									$image_item = "";
									foreach ($gallery_arr as $image) :
										$image_item++;
										$image_style = "";
										if ($image_item == 1) {
									?>
											<a href="<?php echo $image['url']; ?>" data-fancybox='case-<?php echo $case_num; ?>' class="image" <? echo $image_style; ?>>
												<div class=" progressive replace" data-href="<?php echo $image['case']; ?>">
													<img src="<? echo $gallery_arr[0]["sizes"]['case']; ?>" class="preview" alt="<?php the_title(); ?>" />
												</div>
											</a>
										<?php
										} else {
										?>
											<a href="<?php echo $image['url']; ?>" data-fancybox='case-<?php echo $case_num; ?>'></a>
									<?php
										}
									endforeach;
									?>
								</div>
								<div class="wrap">
									<div class="title">
										<?php the_title(); ?>
									</div>
								</div>
							</div>
						</div>
				<?php
					}
				endwhile;
				wp_reset_query();
				?>
			</div>
		<?php } ?>

		<?php if (get_sub_field('footer')) { ?>
			<div class="footer list">
				<?php the_sub_field('footer'); ?>
			</div>
		<?php } ?>
	</div>
</section>
<?php
if (in_array('noindex', get_sub_field('section-activity')['section-check'])) {
	echo '</noindex>';
}
?>