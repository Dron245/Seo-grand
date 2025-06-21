<?php
function generate_category_links($post_type) {
    // Определяем имя таксономии
    $taxonomy = $post_type . '_category';

    // Получаем все термины этой таксономии
    $terms = get_terms(array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
    ));

    // Проверяем, есть ли термины
    if (empty($terms) || is_wp_error($terms)) {
        echo 'Термины не найдены.';
        return;
    }

    // Проходимся по каждому термину и выводим HTML
    foreach ($terms as $term) {
        // Получаем ссылку на документ (поле ACF)
        $doc_link = get_field('doc_price', $taxonomy . '_' . $term->term_id);

        // Проверяем наличие ссылки
        if (!$doc_link) {
            continue; // Пропускаем термин, если ссылка отсутствует
        }

        // Выводим HTML-код
        echo '<a href="' . esc_url($doc_link) . '" download class="kts-price-item">';
        echo '<span class="kts-price-text">Скачать прайс "' . esc_html($term->name) . '"</span>';
        echo '</a>';
    }
    //print("<pre>".strip_tags(print_r($terms,true))."</pre>");
}

//echo $doc_link = get_field('doc_price', 'izolyaciya_category_294');


?>
<!--section id="kts-price">
    <div class="container-fluid">
        <div class="kts-price-row">
            <h3>Общие прайсы</h3>
            <a href="<!?php echo get_field('doc_price', get_option('page_on_front')); ?>" download class="kts-price-item">
                <span class="kts-price-text">Скачать прайс на всю продукцию</span>
            </a>
            <a href="<!?php echo get_field('doc_truby', 'option' ); ?>" download class="kts-price-item">
                <span class="kts-price-text">Скачать прайс "Стальные трубы"</span>
            </a>
            <a href="<!?php echo get_field('doc_izolyaciya', 'option' ); ?>" download class="kts-price-item">
                <span class="kts-price-text">Скачать прайс "Изоляция"</span>
            </a>
            <a href="<!?php echo get_field('doc_detaly', 'option' ); ?>" download class="kts-price-item">
                <span class="kts-price-text">Скачать прайс "Детали трубопроводов"</span>
            </a>
            <h3>Прайсы на изоляцию трубопроводов</h3>
           <!?= generate_category_links('izolyaciya'); ?>
            <h3>Прайсы на детали трубопроводов</h3>
           <!?= generate_category_links('detaly'); ?>
        </div>
    </div>
</section-->

<section id="kts-price">
    <div class="container-fluid">
        <div class="kts-price-row">
		
			<a href="/wp-content/uploads/price/price_vus_isolation.pdf" download="" class="kts-price-item">
			<span class="kts-price-text">Скачать прайс "ВУС Изоляция"</span></a>
			
			<a href="/wp-content/uploads/price/price_ppu_isolation.pdf" download="" class="kts-price-item">
			<span class="kts-price-text">Скачать прайс "ППУ Изоляция"</span></a>
			
			<a href="/wp-content/uploads/price/price_epoxy_isolation.pdf" download="" class="kts-price-item">
			<span class="kts-price-text">Скачать прайс "Эпоксидная Изоляция"</span></a>            
            
			<a href="/wp-content/uploads/price/price_cpp_isolation.pdf" download="" class="kts-price-item">
            <span class="kts-price-text">Скачать прайс "ЦПП Изоляция"</span></a>
			
			<a href="#" download="" class="kts-price-item">
            <span class="kts-price-text">Скачать прайс "Битумная Изоляция"</span></a>
			
			<a href="/wp-content/uploads/price/price_ppm.pdf" download="" class="kts-price-item">
            <span class="kts-price-text">Скачать прайс "ППМи Изоляция"</span></a>
			
			<a href="#" download="" class="kts-price-item">
            <span class="kts-price-text">Скачать прайс "Полиуретановая Изоляция"</span></a>
			
		    <a href="/wp-content/uploads/price/price_steel_pipe.pdf" download="" class="kts-price-item">
            <span class="kts-price-text">Скачать прайс "Труба стальная"</span></a>
			
		</div>
    </div>
</section>