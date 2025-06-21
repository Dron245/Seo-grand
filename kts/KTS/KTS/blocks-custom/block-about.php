<?php
// Определение типа записи
    include(locate_template('template-parts/type-page.php'));
    
   if( is_post_type_archive() ){
        $field_preffix_about = 'about-'.$object_name.'_';
    } else { 
        $field_preffix_about = '';
    }
    


    
$about_ID = 2233;
$about_text = get_field($field_preffix_about.'about-text',$field_postfix) ?: get_field('about-text',$about_ID);

switch ($field_postfix) {
    case 'izolyaciya_category_722':
        $field_postfix = 'izolyaciya_category_294';
        break;
    case 'izolyaciya_category_723':
        $field_postfix = 'izolyaciya_category_294';
        break;
    
    default:
        break;
}

$about_images = get_field($field_preffix_about.'about-images',$field_postfix) ?: get_field('about-images',$about_ID);

?>
<section id="kts-about" class="kts-projects">
    <div class="container-fluid">
        <div class="header list">
            <?php echo $about_text; ?>
        </div>
        <div class="projects-gallery projects-gallery-slider">
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
</section>