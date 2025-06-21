<?php
get_header();

if (get_field('cases-hero', 'option')['name']) {
	switch (get_field('cases-hero', 'option')['name']) {
		case 'name-1':
			$projects_name = array('проект', 'проекта', 'проектов', 'проекты');
			break;
		case 'name-2':
			$projects_name = array('работа', 'работы', 'работ', 'работы');
			break;
		case 'name-3':
			$projects_name = array('кейс', 'кейса', 'кейсов', 'кейсы');
			break;
		case 'name-3':
			$projects_name = array('услуга', 'услуги', 'услуг', 'услуги');
			break;
		case 'name-3':
			$projects_name = array('реализация', 'реализации', 'реализаций', 'реализации');
			break;
	}
} else {
	$projects_name = array('проект', 'проекта', 'проектов', 'проекты');
}

$file = get_field('cases-hero', 'option')['file'];
$fileurl = $file['url'];
$filesize = $file['filesize'] / 1024;
$info = new SplFileInfo($fileurl);
$fileextension = $info->getExtension();


if (get_field('company', 'option')['brand']) {
	$company_name = '«' . get_field('company', 'option')['brand'] . '»';
} elseif (get_field('company', 'option')['name']) {
	$company_name = get_field('company', 'option')['name'];
} else {
	$company_name = get_bloginfo('name');
}

?>
<?php if (get_field('cases-hero', 'option')['text']) { ?>
	<section id="cases-hero" style="<?php echo get_field('cases-style', 'option')['image'] ? 'background-image: url(' . get_field('cases-style', 'option')['image']['url'] . ');' : ''; ?>" class="<?php echo get_field('cases-style', 'option')['image'] ? '' : 'no-bg'; ?>">
		<?php if (get_field('cases-style', 'option')['mp4'] || get_field('cases-style', 'option')['webm']) { ?>
			<div class="hero__video">
				<video id="video-background" preload="auto" loop autoplay muted playsinline>
					<?php if (get_field('cases-style', 'option')['mp4']) { ?>
						<source src="<?php echo get_field('cases-style', 'option')['mp4']; ?>" type="video/mp4">
					<?php } ?>
					<?php if (get_field('cases-style', 'option')['webm']) { ?>
						<source src="<?php echo get_field('cases-style', 'option')['webm']; ?>" type="video/webm">
					<?php } ?>
				</video>
			</div>
		<?php } ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-s">
					<div class="header list">
						<?php echo get_field('cases-hero', 'option')['text']; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } else { ?>
	<section id="cases-hero-single">
		<div class="container-fluid">
			<div class="row">
				<div class="col-s">
					<div class="header list">
						<h1><?php echo $projects_name[3] . ' ' . $company_name; ?></h1>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>

<section id="cases">
	<div class="container-fluid">
		<div class="row">
			<div class="col-m">
				<?php
				while (have_posts()) : the_post();
					$customer = get_field('detail')['customer'];
					$town = get_field('detail')['town'];
					$year = get_field('detail')['year'];
					$budget = get_field('detail')['budget'];
					$intro = get_preg_field('detail')['intro'];
				?>
					<a href="<?php the_permalink(); ?>" class="item autoheight" title="<?php echo get_the_title(); ?>">
						<div class="image" style="background-image: url(<?php echo get_field('gallery')[0]['sizes']['item']; ?>)"></div>
						<div class="body">
							<div class="wrap">
								<div class="tags">
									<?php
									$tags_post = [];
									$cur_terms = get_the_terms(get_the_ID(), 'cases_tags');
									if (is_array($cur_terms)) {
										foreach ($cur_terms as $cur_term) {
											$tags_post[] = '#' . $cur_term->name;
										}
									}
									echo implode(', ', $tags_post);
									?>
								</div>
								<div class="title">
									<?php the_title(); ?>
								</div>
								<div class="work-list list">
									<?php echo $intro; ?>
								</div>
							</div>
							<?php if ($customer || $town || $year) { ?>
								<ul class="detail">
									<?php if ($customer) { ?>
										<li class="customer">
											<svg viewBox="0 0 24 24">
												<path d="M20,6H16V4A2,2 0 0,0 14,2H10C8.89,2 8,2.89 8,4V6H4C2.89,6 2,6.89 2,8V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V8A2,2 0 0,0 20,6M10,4H14V6H10V4M12,9A2.5,2.5 0 0,1 14.5,11.5A2.5,2.5 0 0,1 12,14A2.5,2.5 0 0,1 9.5,11.5A2.5,2.5 0 0,1 12,9M17,19H7V17.75C7,16.37 9.24,15.25 12,15.25C14.76,15.25 17,16.37 17,17.75V19Z" />
											</svg>
											<?php echo $customer; ?>
										</li>
									<?php } ?>
									<?php if ($town) { ?>
										<li class="town">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:v="https://vecta.io/nano">
												<path d="M256 0C161.896 0 85.333 76.563 85.333 170.667c0 28.25 7.063 56.26 20.5 81.104L246.667 506.5c1.875 3.396 5.448 5.5 9.333 5.5s7.458-2.104 9.333-5.5L406.23 251.687c13.375-24.76 20.438-52.77 20.438-81.02C426.667 76.563 350.104 0 256 0zm0 256c-47.052 0-85.333-38.28-85.333-85.333S208.948 85.334 256 85.334s85.333 38.28 85.333 85.333S303.052 256 256 256z" />
											</svg>
											<?php echo $town; ?>
										</li>
									<?php } ?>
									<?php if ($year) { ?>
										<li class="year">
											<svg viewBox="0 0 24 24">
												<path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12S17.5 2 12 2M17 13H11V7H12.5V11.5H17V13Z" />
											</svg>
											<?php echo $year; ?>
										</li>
									<?php } ?>
									<?php if ($budget) { ?>
										<li class="budget">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" xmlns:v="https://vecta.io/nano">
												<path d="M2 5h20v15H2V5m18 13V7H4v11h16M17 8a2 2 0 0 0 2 2v5a2 2 0 0 0-2 2H7a2 2 0 0 0-2-2v-5a2 2 0 0 0 2-2h10m0 5v-1c0-1.1-.67-2-1.5-2s-1.5.9-1.5 2v1c0 1.1.67 2 1.5 2s1.5-.9 1.5-2m-1.5-2a.5.5 0 0 1 .5.5v2a.5.5 0 1 1-1 0v-2a.5.5 0 0 1 .5-.5M13 13v-1c0-1.1-.67-2-1.5-2s-1.5.9-1.5 2v1c0 1.1.67 2 1.5 2s1.5-.9 1.5-2m-1.5-2a.5.5 0 0 1 .5.5v2a.5.5 0 1 1-1 0v-2a.5.5 0 0 1 .5-.5M8 15h1v-5H8l-1 .5v1l1-.5v4z" />
											</svg>
											<?php echo $budget; ?>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>
						</div>
					</a>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('template-parts/pagination'); ?>
<?php
//	Смежные статьи
if (in_array("similar", get_field('sections', 'option')) && !in_array(get_the_ID(), get_field('similar-setting', 'option')['disable'])) {
	get_template_part('blocks/block', 'similar');
}
?>
<?php get_template_part('blocks/block', 'manager'); ?>

<?php
get_footer();
?>