<?php
/*
Подключение стилей и скриптов
*/
function my_theme_setup()
{
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('post-thumbnails');
    //добавляем динамический тег title
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'my_theme_setup');
// add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 3);
// function filter_nav_menu_link_attributes($classes){
//     $classes[] = 'class="nav-link"';
//     return $classes;
// }

//готовим почву для перевода сайта
function my_website_menus()
{
    //собираем несколько зон меню
    $locations = array(
        'header' => __('Header Menu', 'my_website'),
        'footer' => __('Footer Menu', 'my_website')
    );
    //регистрируем зоны меню
    register_nav_menus($locations);
}
//хук для инициализации меню
add_action('init', 'my_website_menus');

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
