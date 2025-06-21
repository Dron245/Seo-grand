<?php
$custom_class = get_sub_field('custom-class');
$projects = get_field('projects','option');
if($projects){
?>
<section id="kts-projects" class="kts-projects">
    <div class="container-fluid">
        <?php if($custom_class == "short"){ ?>
        <div class="header list ct">
            <h2>Реализованные проекты</h2>
            <!-- <a href="<?php echo get_permalink(4346); ?>" class="link">Все проекты</a> -->
        </div>
        <?php } ?>
        <div class="projects-gallery  <?php if($custom_class == "short"){ ?>projects-gallery-slider<?php } ?>">
            <?php 
            $projects_index = 0;
            foreach( $projects as $projects_item ){
                $projects_index ++;
                if($custom_class == "short" && $projects_index>8) break;
                $projects_item_url = $projects_item['url'];
                $projects_item_size = $projects_item['sizes']['item-circle'];
                $projects_item_name = $projects_item['title'];
            ?>
            <div class="projects-item">
                <div class="projects-img">
                    <a href="<?php echo $projects_item_url; ?>" data-fancybox="<?php echo $manufacture_name; ?>">
                        <img src="<?php echo $projects_item_size; ?>" alt="<?php echo $projects_item_name; ?>" class="" loading="lazy" />
                    </a>
                </div>
                <div class="projects-name">
                    <?php echo $projects_item_name; ?>
                </div>
            </div>
            <?php } ?>
            <?php if($custom_class == "short"){ ?>
            <div class="projects-item">
                <div class="projects-img">
                    <a href="<?php echo get_permalink(4346); ?>" class="projects-end">
                        <span class="projects-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z"></path></svg></span>
                        <div class="projects-link">
                            Посмотреть все
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>