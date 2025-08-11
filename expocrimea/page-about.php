<?php
get_header();
?>

<div class="wrapper-circle">
    <?
    if(get_field('модуль')){
        foreach (get_field('модуль') as $item) {
            $layout = $item['acf_fc_layout'];
            
            // Специальная обработка текстового модуля
            if($layout == 'text') {
                echo '<div class="text-module">';
                if(!empty($item['tekst'])) {
                    $content = $item['tekst'];
                    echo apply_filters('the_content', $content);
                }
                echo '</div>';
                continue;
            }
            
            // Стандартная обработка остальных модулей
            get_template_part('blocks/' . $layout);
        }
    }
	
	
    ?>
</div>

 <script>
    // Существующий код для read-more-links
    document.addEventListener('DOMContentLoaded', function() {
        const readMoreLinks = document.querySelectorAll('.read-more-link');
        
        readMoreLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const hiddenBlock = this.closest('.text-module').querySelector('.hidden_block');
                
                if (hiddenBlock.classList.contains('active')) {
                    hiddenBlock.style.maxHeight = '0';
                    hiddenBlock.style.opacity = '0';
                    setTimeout(() => {
                        hiddenBlock.classList.remove('active');
                    }, 500);
                    this.textContent = 'Читать далее...';
                } else {
                    hiddenBlock.classList.add('active');
                    hiddenBlock.style.maxHeight = hiddenBlock.scrollHeight + 'px';
                    hiddenBlock.style.opacity = '1';
                    this.textContent = 'Скрыть текст';
                }
            });
        });
    });
 </script>

<?php
get_footer();