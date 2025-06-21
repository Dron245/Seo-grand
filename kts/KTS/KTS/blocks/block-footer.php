<?
function display_categories_hierarchy($post_type, $taxonomy) {
	$args = [
		'post_type' => $post_type,
		'taxonomy' => $taxonomy,
		'hide_empty' => 0,
		'parent' => 0,
		'order' => "ASC",
		'orderby' => "term_id",
	];
	$categories = get_categories($args);
	foreach ($categories as $sub_category) {
		$sub_category_tax = $sub_category->taxonomy;
		$sub_category_ID = $sub_category->term_id;
		$sub_category_name = $sub_category->name;
		$sub_category_slug = $sub_category->slug;
		$sub_category_link = get_term_link($sub_category_ID, $sub_category_tax);

		$current_cat = get_queried_object();
		$current_cat_id = $current_cat->term_id;
		$current_cat_class = "";
		if ($sub_category_ID == $current_cat_id) {
			$current_cat_class = "current-menu-item";
		}
		?>
		<li id="menu-item-<?php echo $sub_category_ID; ?>"
			class="menu-item menu-item-<?php echo $sub_category_ID; ?> <?php echo $current_cat_class; ?>">
			<a href="<?php echo $sub_category_link; ?>"><?php echo $sub_category_name; ?></a>
			<?php
			// Теперь добавляем дочерние термины в том же уровне списка
			$args_child = [
				'taxonomy' => $sub_category_tax,
				'parent' => $sub_category_ID,
				'hide_empty' => 0,
			];
			$child_categories = get_categories($args_child);
			if (!empty($child_categories)) {
				echo '<ul>';
				foreach ($child_categories as $child_category) {
					$child_category_ID = $child_category->term_id;
					$child_category_name = $child_category->name;
					$child_category_link = get_term_link($child_category_ID, $sub_category_tax);
					?>
					<li id="menu-item-<?php echo $child_category_ID; ?>"
						class="menu-item menu-item-<?php echo $child_category_ID; ?>">
						<a href="<?php echo $child_category_link; ?>"><?php echo $child_category_name; ?></a>
					</li>
					<?php
				}
				echo '</ul>';
			}
			?>
		</li>
		<?php
	}
}

?>

	<footer id="footer">
		<div class="container-fluid">
			<!--noindex-->
			<?/* if (has_nav_menu('footer_menu-1')) { ?>
				<div class="footer-menu footer-hor">
					<?php wp_nav_menu(array(
						'theme_location' => 'footer_menu-1',
						'fallback_cb' => ''
					)); ?>
				</div>
			<? } */?>
			<!--/noindex-->

			<div class="row">

				<div class="col-lg-25 col-ml-3 col-sm-6 col-12 col">
					<!--noindex-->
					<div class="footer-head">
						Трубы стальные
					</div>
					<div class="footer-menu">
						<div class="menu-truby-container">
							<ul id="menu-truby" class="menu">
								<?php wp_nav_menu(array(
									'theme_location' => 'footer_menu-3',
									'fallback_cb' => ''
								)); ?>
								<?//php display_categories_hierarchy('truby', 'truby_category'); ?>
							</ul>
						</div>
					</div>
					<!--/noindex-->
				</div>

				<div class="col-lg-25 col-ml-3 col-sm-6 col-12 col">
					<!--noindex-->
					<div class="footer-head">
						Изоляция труб
					</div>
					<div class="footer-menu">
						<div class="menu-truby-container">
							<ul id="menu-truby" class="menu">
								<?php wp_nav_menu(array(
									'theme_location' => 'footer_menu-5',
									'fallback_cb' => ''
								)); ?>
							</ul>
						</div>
					</div>
					<?/*<div class="footer-menu">
						<div class="menu-izolyaciya-container">
							<ul id="menu-izolyaciya" class="menu">
								<?php display_categories_hierarchy('izolyaciya', 'izolyaciya_category'); ?>
							</ul>
						</div>
					</div>*/?>
					<!--/noindex-->
				</div>

				<div class="col-lg-25 col-ml-3 col-sm-6 col-12 col">
					<!--noindex-->
					<div class="footer-head">
						Детали трубопроводов
					</div>
					<?/*<div class="footer-menu">
						<div class="menu-detaly-container">
							<ul id="menu-detaly" class="menu">
								<?php display_categories_hierarchy('detaly', 'detaly_category'); ?>
							</ul>
						</div>
					</div>*/?>
					<div class="footer-menu">
						<div class="menu-truby-container">
							<ul id="menu-truby" class="menu">
								<?php wp_nav_menu(array(
									'theme_location' => 'footer_menu-4',
									'fallback_cb' => ''
								)); ?>
								<?//php display_categories_hierarchy('truby', 'truby_category'); ?>
							</ul>
						</div>
					</div>
					<!--/noindex-->
				</div>

				<div class="col-lg-25 col-ml-3 col-sm-6 col-12 col">
					<!--noindex-->
					<? if (has_nav_menu('footer_menu-2')) { ?>
						<div class="footer-head">
							<?php echo wp_get_nav_menu_name('footer_menu-2'); ?>
						</div>
						<div class="footer-menu">
							<?php wp_nav_menu(array(
								'theme_location' => 'footer_menu-2',
								'fallback_cb' => ''
							)); ?>
						</div>
					<? } ?>
					<!--/noindex-->
				</div>

				<div class="col-lg-25 col-ml-3 col-sm-6 col-12 col" itemscope itemtype="http://schema.org/Organization">
					<div class="footer-head">
						Контакты
					</div>
					<ul class="footer-contacts">
						<li itemprop="name"><?php echo get_field('company', 'option')['brand']; ?></li>
						<li itemprop="telephone"><?php echo do_shortcode('[phone]') ?> <span data-src="#popup-call" class="link" data-fancybox="">Обратный звонок</span> </li>
						<li itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
							<?php if (is_plugin_active('multycity/multycity.php')) { ?>
								<span itemprop="addressLocality">г. <?php echo do_shortcode('[city_i]'); ?>, </span>
							<?php  } ?>
							<span itemprop="streetAddress"><?php echo do_shortcode('[adress]'); ?></span>
						</li>
						<li><?php echo do_shortcode('[email]'); ?></li>
					</ul>
					<!-- <div class="footer-social">
						<?php get_template_part('template-parts/social-icons'); ?>
						<?php get_template_part('template-parts/messenger-icons'); ?>
					</div> -->
				</div>
			</div>
		</div>
	</footer>

<footer id="footer-2">
	<div class="container-fluid">
		<div class="footer-2__inner">


			<div class="footer-2__content">
				<?php echo get_field('company', 'option')['name'] ? get_field('company', 'option')['name'] . '<span class="sepa">/</span>' : ""; ?>
				<?php echo get_field('company', 'option')['ogrn'] ? 'ОГРН ' . get_field('company', 'option')['ogrn'] . '<span class="sepa">/</span>' : ""; ?>
				<?php echo get_field('company', 'option')['inn'] ? 'ИНН ' . get_field('company', 'option')['inn'] . '<span class="sepa">/</span>' : ""; ?>
				Сайт не является публичной офертой. <nobr><?php echo date('Y'); ?>г.</nobr><span class="sepa">/</span>
				<a href="<?php echo get_privacy_policy_url(); ?>">Политика конфиденциальности</a>
			</div>
			<!--div id="copyright" class="copy-black">
				<!--?
				/*доступные классы: 
							copy-black - черные буквы и белая подложка 
							copy-white - белые буквы и черная подложка 
							copy-inline - display: inline-block
							copy-link - без подложки
							copy-right - позиционирование справа
						*/ ?>
				<!?php get_template_part('template-parts/copyright'); ?>
			</div-->
		</div>
	</div>
</footer>