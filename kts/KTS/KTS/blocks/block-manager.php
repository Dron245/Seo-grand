<?php
// Определение типа записи
include(locate_template('template-parts/type-page.php'));

// Форма в подвале для текущей страницы
$manager_ID 		= get_field($field_preffix_hero . 'manager', $field_postfix); // ID страницы сотрудника
$manager_header 	= get_field($field_preffix_hero . 'manager-header', $field_postfix);
$manager_form 		= get_field($field_preffix_hero . 'manager-form', $field_postfix);
$manager_off 		= get_field($field_preffix_hero . 'manager-off', $field_postfix);
$manager_bg 		= get_field($field_preffix_hero . 'manager-bg', $field_postfix);

$form_head 			= $manager_form['head'];
$form_desc 			= $manager_form['desc'];
$form_email			= $manager_form['email'];
$form_textarea		= $manager_form['textarea'];
$form_file 			= $manager_form['file'];
$form_btn 			= $manager_form['btn'];

// Форма в подвале общая 
$manager_clone 		= get_field('manager-clone', 'option');
$manager_clone_ID 	= $manager_clone['manager'];
$manager_clone_header = $manager_clone['manager-header'];
$manager_clone_form = $manager_clone['manager-form'];
$manager_clone_off 	= $manager_clone['manager-off'];
$manager_clone_bg 	= $manager_clone['manager-bg'];

$form_clone_head 	= $manager_clone_form['head'];
$form_clone_desc 	= $manager_clone_form['desc'];
$form_clone_email	= $manager_clone_form['email'];
$form_clone_textarea = $manager_clone_form['textarea'];
$form_clone_file 	= $manager_clone_form['file'];
$form_clone_btn 	= $manager_clone_form['btn'];

// Форма в подвале общая (устаревшее)
/*$old_text 			= get_field('form-text', 'option');

$old_form 			= get_field('form', 'option');
$old_form_head 		= $old_form['head'];
$old_form_desc 		= $old_form['desc'];
$old_form_email 	= $old_form['email'];
$old_form_textarea 	= $old_form['textarea'];
$old_form_btn 		= $old_form['btn'];*/


// Итоговые значения 
$m_text 	= current(array_filter(array($manager_header, $manager_clone_header, $old_text)));
$m_off 		= current(array_filter(array($manager_off, $manager_clone_off)));
$m_bg 		= current(array_filter(array($manager_bg, $manager_clone_bg)));

$formTitle 	= current(array_filter(array($form_head, $form_clone_head, $old_form_head, "Заполните форму")));
$formDesk 	= current(array_filter(array($form_desc, $form_clone_desc, $old_form_desc, "и мы перезвоним вам в самое ближайшее время")));

$formName 	= "Ваше имя";
$formEmail 	= current(array_filter(array($form_email, $form_clone_email, $old_form_email)));
$formTextarea = current(array_filter(array($form_textarea, $form_clone_textarea, $old_form_textarea)));
$formFile 	= current(array_filter(array($form_file, $form_clone_file)));
$formBtn 	= current(array_filter(array($form_btn, $form_clone_btn, $old_form_btn, "Отправить")));


// Если заполнена текстом на странице или в общей категории
if ($m_text) {

	// Если выбран сотрудник на текущую страницу
	if ($manager_ID) {
		$manager_avatar = get_field('avatar', $manager_ID);
		$manager_name = get_the_title($manager_ID);
		$manager_position = get_field('position', $manager_ID);

		// Подстановка данных сотрудника из Формы - Менеджер
	} elseif (get_field('form-manager', 'option')) {
		$manager_avatar = get_field('form-manager', 'option')['avatar'];
		$manager_name = get_field('form-manager', 'option')['name'];
		$manager_position = get_field('form-manager', 'option')['position'];
	}

	// Если есть фото менеджера
	if (!empty($manager_avatar)) {
		$avatar_info = new SplFileInfo($manager_avatar['url']);
		$avatar_ext = $avatar_info->getExtension();
	}

	// Если есть фон
	if ($m_bg) {
		$style_wrap = 'style="background-image: url(' . $m_bg['url'] . ');"';
	}

	//	Адаптивное изображение
	$imageSize = '';
	include(locate_template('template-parts/lazy-image-responsive-IE.php'));
?>

	<section id="manager" class="manager-1">
		<div class="container-fluid">

			<div class="wrap" <?php echo $style_wrap; ?>>
				<div class="left-wrap">
					<div class="text-wrap">
						<div class="utp">
							<div class="header subheader">
								<?php echo predlog($m_text); ?>
							</div>
						</div>

						<?php if (!empty($manager_name)) { ?>
							<div class="manager-label">
								<div class="name">
									<?php echo $manager_name; ?>
								</div>
								<?php if (!empty($manager_position)) { ?>
									<div class="position">
										<?php echo $manager_position; ?>
									</div>
								<?php } ?>
							</div>
						<?php } ?>

						<div class="contacts-block">
							<div class="head">Свяжитесь с нами:</div>
							<?php echo do_shortcode('[phone]') ?>
							<div class="head">Либо напишите нам на почту:</div>
							<?php echo do_shortcode('[email]') ?>
						</div>
					</div>

					<?php if (!empty($manager_avatar)) { ?>
						<div class="avatar-wrap avatar-<?php echo $avatar_ext; ?>">
							<div class="avatar">
								<img data-src="<?php echo $manager_avatar['url']; ?>" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" class="lazy" alt="<?php echo $name; ?>" />
							</div>
						</div>
					<?php } ?>

				</div>


				<div class="form-wrap <?php echo $manager_class; ?>">
					<?php include(locate_template('blocks/block-form.php')); ?>
				</div>

			</div>
		</div>
	</section>

<? } elseif (!$m_off) {
	$no_manager 		= get_field('no-manager-form', 'option');
	$no_manager_desc 	= $no_manager['desc'] ?? "<h2>Остались вопросы?</h2><p>Готовы проконсультировать по любым вопросам</p>";
	$no_manager_btn 	= $no_manager['btn'] ?? "Получить консультацию";
?>
	<section id="no-manager">
		<div class="container-fluid">
			<div class="row">
				<div class="col-s">
					<div class="wrap">
						<div class="header">
							<?php echo $no_manager_desc; ?>
						</div>
						<div class="button">
							<div data-src="#popup-mess" data-fancybox class="btn" anim="ripple"><span><?php echo $no_manager_btn; ?></span></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<? } ?>