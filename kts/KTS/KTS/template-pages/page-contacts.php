<?php
/* Template Name: Страница "Контакты" */

get_header();
$map_i = 1;
include(locate_template('template-parts/contacts.php'));
$map_i++;
get_template_part('blocks/block', 'manager');
get_footer();
