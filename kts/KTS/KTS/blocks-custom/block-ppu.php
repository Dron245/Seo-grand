<?php
// Определение типа записи
    include(locate_template('template-parts/type-page.php'));
    
$about_ID = 2233;
$about_text = get_field('about-text',$field_postfix) ?: get_field('about-text',$about_ID);
$about_images = get_field('about-images',$field_postfix) ?: get_field('about-images',$about_ID);

?>
<section id="kts-us2-3" class="ppu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col">
                <!--a href="" class="us-item ct"-->
				<div class="us-item ct">
                    <div class="us-name">
                        <h3>ИЗОЛЯЦИЯ ППУ-ПЭ</h3>
                    </div>
                    <div class="us-img">
                        <img src="<?php echo THEME_IMAGES; ?>/ppu-pe.png" alt="Изоляция ППУ-ПЭ" loading="lazy" />
                    </div>
                    <div class="us-text">
                        ППУ-ПЭ — это изоливаронная пенополиуретаном стальная труба в прочной полиэтиленовой оболочке. Может сопровождаться оперативного дистанционного контроля (ОДК)
                    </div>
                <!--/a-->
				</div>
            </div>
            <div class="col-sm-6 col">
                <!--a href="" class="us-item ct"-->
				<div class="us-item ct">
                    <div class="us-name">
                        <h3>ИЗОЛЯЦИЯ ППУ-ОЦ</h3>
                    </div>
                    <div class="us-img">
                        <img src="<?php echo THEME_IMAGES; ?>/ppu-oc.png" alt="Изоляция ППУ-ОЦ" loading="lazy" />
                    </div>
                    <div class="us-text">
                        ППУ-ОЦ — это стальные трубы с изоливаронной пенополиуретановой оболочкой и защитным кожухом из оцинкованного листа с системой  оперативного дистанционного контроля (ОДК)
                    </div>
				</div>
                <!--/a-->
            </div>
        </div>
    </div>
</section>