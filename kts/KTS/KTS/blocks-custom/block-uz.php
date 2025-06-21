<?php
$custom_class = get_sub_field('custom-class');
$uz = get_field('uz','option');
if($uz){
?>
<section id="kts-uz" class="kts-projects">
    <div class="container-fluid">
        <?php if($custom_class == "short"){ ?>
        <div class="header list ct">
            <h2>Узбекистан</h2>
        </div>
        <?php } ?>
        <div class="projects-gallery projects-gallery-slider">
            <?php 
            $projects_index = 0;
            foreach( $uz as $projects_item ){
                $projects_index ++;
                if($custom_class == "short" && $projects_index>8) break;
                $projects_item_url = $projects_item['url'];
                $projects_item_size = $projects_item['sizes']['item-circle'];
                $projects_item_name = $projects_item['title'];
            ?>
            <div class="projects-item">
                <div class="projects-img">
                    <a href="<?php echo $projects_item_url; ?>" data-fancybox="Выставка в Узбекистане ООО КТС-Строй">
                        <img src="<?php echo $projects_item_size; ?>" alt="<?php echo $projects_item_name; ?>" class="" loading="lazy" />
                    </a>
                </div>
                <!-- <div class="projects-name">
                    <?php echo $projects_item_name; ?>
                </div> -->
            </div>
            <?php } ?>
        </div>
        <div class="footer ct">
            <p>Фото с выставки в Узбекистане. <br/><a href="<?php echo get_permalink(2235); ?>" class="link">Узнайте о Доставке в Узбекистан</a></p>
        </div>
    </div>
</section>
<?php } ?>