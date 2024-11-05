<?php
/*
Подключение стилей и скриптов
*/
function my_theme_setup()
{
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'my_theme_setup');

// Функция для подключения стилей и скриптов
function my_website_scripts()
{
    // Подключение основного style.css (пустой файл, созданный вами)
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    // Подключение основного стиля из assets/css/main.css
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css');
    // Подключение Font Awesome
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.min.css');
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/example.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_website_scripts');
