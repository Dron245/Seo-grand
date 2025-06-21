<?php
// Определение типа записи
    include(locate_template('template-parts/type-page.php'));
    
$about_ID = 2233;
$about_text = get_field('about-text',$field_postfix) ?: get_field('about-text',$about_ID);
$about_images = get_field('about-images',$field_postfix) ?: get_field('about-images',$about_ID);

?>
<section id="kts-us2-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col">
                <a href="" class="us-item ct">
                    <div class="us-name">
                        <a href='/izolyaciya/us/2-h-slojnaya/'><h3>Двухслойная УС изоляция труб</h3></a>
                    </div>
                    <div class="us-img">
                        <a href='/izolyaciya/us/2-h-slojnaya/'><img src="<?php echo THEME_IMAGES; ?>/2sloynoe-blue.webp" alt="Двухслойная изоляция" loading="lazy" /></a>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col">
                <a href="" class="us-item ct">
                    <div class="us-name">
                        <a href='/izolyaciya/us/3-h-slojnaya/'><h3>Трехслойная УС изоляция труб</h3></a>
                    </div>
                    <div class="us-img">
                        <a href='/izolyaciya/us/3-h-slojnaya/'><img src="<?php echo THEME_IMAGES; ?>/3sloynoe-blue.webp" alt="Трехслойная изоляция" loading="lazy" /></a>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>