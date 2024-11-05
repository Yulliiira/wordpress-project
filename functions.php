<?php
/*
Подключение стилей и скриптов
*/

add_action('wp_enqueue_scripts', 'my_website_scripts');

function my_website_scripts()
{
    // Подключение основного style.css (пустой файл, созданный вами)
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // Подключение основного стиля из assets/css/main.css
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css');

    // Подключение Font Awesome
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.min.css');

    // Пример подключения скрипта, если нужно (замените 'example.js' на ваш файл)
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/example.js', array(), '1.0.0', true);
}
