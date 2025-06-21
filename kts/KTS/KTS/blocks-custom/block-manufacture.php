<?php
$custom_class = get_sub_field('custom-class');
$manufacture = get_field('manufacture','option');

if($manufacture){
?>
<section id="kts-manufacture" class="kts-projects">
    <div class="container-fluid">
        <?php 
        while (have_rows('manufacture','option')) : the_row(); 
            $manufacture_name = get_sub_field('name');
            $manufacture_projects = get_sub_field('images');
        ?>
        <div class="projects-manufacture">
            <div class="manufacture-name">
                <h2><?php echo $manufacture_name; ?></h2>
            </div>
            <div class="projects-gallery  projects-gallery-slider">
                <?php 
                $projects_index = 0;
                foreach( $manufacture_projects as $projects_item ){
                    $projects_index ++;
                    if($custom_class == "short" && $projects_index>3) break;
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
            </div>
        </div>
        <?php 
        endwhile; ?>
    </div>
</section>
<?php } ?>