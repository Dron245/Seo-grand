<?
// Вывод текстового модуля ACF
if(get_field('модуль')){
    foreach (get_field('модуль') as $item) {
        $layout = $item['acf_fc_layout'];
        
        if($layout == 'text') {
            echo '<div class="text-module">';
            if(!empty($item['tekst'])) {
                echo apply_filters('the_content', $item['tekst']);
            }
            echo '</div>';
            continue;
        }
        
        // Другие типы модулей
        get_template_part('blocks/' . $layout);
    }
}

  if(have_rows('o_kompanii', 'option')){
      ?>
     	<div class="about">
        	<div class="wrapper">
            	<h4 class="advantages__title">О компании</h4>
            	<div class="about-wrapper">
                	<?
                    	while (have_rows('o_kompanii', 'option')): the_row();
                        	?>
                            	<div class="about__item">
                                	<img src="<? the_sub_field('image');?>" class="about__item-img" alt="img">
                                	<div class="about__item-content">
									<?
	    								if(get_sub_field('title')) {
											?>
										       <div class="about__item-title"><? the_sub_field('title');?></div>
											<?
										}
										if(get_sub_field('description')) {
											?>
										       <div class="about__item-text"><? the_sub_field('description');?></div>
											<?
										}
									?>
                                   	
                                	</div>
                            	</div>
                        	<?
                    	endwhile;
                	?>
            	</div>
        	</div>
		</div>    
      <?
  }
?>
    
    
<style>
    .about-wrapper {
		display: grid;
		grid-template: repeat(2, auto) / 1.5fr 1fr 1.5fr;
		gap: min(calc(12px + 8px), calc(12px + 8 * ((100vw - 320px) / 1600)));;
		grid-auto-flow: dense;
	}

	.about__item {
		position: relative;
		z-index: 1;
		min-height: min(calc(220px + 120px), calc(220px + 120 * ((100vw - 320px) / 1600)));

		border-radius: 10px;
		overflow: hidden;
	}

	.about__item:has(.about__item-text):after {
		content: '';
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		z-index: -1;
		background: rgba(0, 0, 0, .5);
		padding-inline-start: none;
	}
	
	@media (min-width: 1200px){
    	.about__item:nth-child(2) {
			grid-row: span 2;
		}
    }


	.about__item-img {
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		z-index: -1;
        object-fit: cover
	}

	.about__item-content {
		display: grid;
		justify-items: start;
		align-items: end;
        align-content: end;
		gap: 10px;
        height: 100%;	
		padding: min(calc(16px + 8px), calc(16px + 8 * ((100vw - 320px) / 1600)));
        
        color: #fff;
	}

	.about__item-title {
      font-size: min(calc(16px + 8px), calc(16px + 8 * ((100vw - 320px) / 1600)));
      font-family: "Gilroy-Bold";
    }

	@media (max-width: 1199px) {
    	.about-wrapper {
        	grid-template-columns: repeat(auto-fill, minmax(385px, 1fr));
        }
        
        .about__item:last-child:nth-child(odd){
        	grid-column: 1/-1
        }
        
        .about__item {
        	aspect-ratio: 2/1;
            min-height: auto
        }
    }

	@media (max-width: 575px) {
        .about-wrapper {
        	grid-template-columns: 100%;
        }
    }

</style>