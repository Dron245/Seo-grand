
<section id="kts-delivery" class="">
    <div class="container-fluid">
        <div class="header list">
            <h1>Доставка по России и СНГ <em>(Казахстан, Узбекистан, Таджикистан, Кыргызстан)</em></h1>
        </div>
        <div class="row">
            <div class="col-ml-8">
                <div class="header list">
                    <p>ООО "КТС-Строй" доставляет трубы и детали трубопровода во все города России и СНГ. <br />На любые строительные объекты и площадки.</p>
                    <p>Наши машины отвезли трубы стальные в изоляции и детали трубопровода <br />в самые дальние города</p>
                </div>
                <div class="image">
                    <img src="<?php echo THEME_IMAGES; ?>/map.webp">
                </div>
            </div>
            <div class="col-ml-4">
                <div class="cites list">
                    <p><strong>Россия<br />
                    </strong>г.Москва, г.Санкт-Петербург, г.Уфа, г.Пермь, г.Владивосток, г.Петропавловск-Камчатский, г.Свободный, г.Барнаул, г.Омcк, г.Новосибирск, г.Пурпе, г.Новый г.Уренгой, г.Тобольск, г.Тюмень, г.Сургут, г.Курган, г.Екатеринбург, г.Саратов, г.Самара, г.Нижний Новгород. г.Ростов на Дону и др.</p>
                    <p><strong>Казахстан<br />
                    </strong>г.НурСултан, г.Актобе, г.Уральск, г.Караозек, г. Экибастуз, г.Кокшетау, г.Жанаозен, г.Костанай, г.Кульсары, г.Балхаш, г.Жезказган</p>
                    <p><strong>Узбекистан</strong><br />
                    г.Ташкент, г.Самарканд, г.Андижан,<br />
                    г.Навои</p>
                    <p><strong>Кыргызстан</strong><br />
                    г.Бишкек, г.Ош</p>
                    <p><strong>Таджикистан</strong><br />
                    г.Душанбе</p>
                </div>
            </div>
        </div>
        
        <div class="projects-gallery">
            <?php 
            $projects_index = 0;
            foreach( $about_images as $projects_item ){
                $projects_index ++;
                if($custom_class == "short" && $projects_index>8) break;
                $projects_item_url = $projects_item['url'];
                $projects_item_size = $projects_item['sizes']['item-circle'];
                $projects_item_name = $projects_item['title'];
            ?>
            <div class="projects-item">
                <div class="projects-img">
                    <a href="<?php echo $projects_item_url; ?>" data-fancybox="<?php echo $manufacture_name; ?>">
                        <img data-src="<?php echo $projects_item_size; ?>" alt="<?php echo $projects_item_name; ?>" class="lazy">
                    </a>
                </div>
                <div class="projects-name">
                    <?php echo $projects_item_name; ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>