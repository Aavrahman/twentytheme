<?php
add_theme_support('menus');
register_nav_menus(
    array(
        'top-menu' => "Menu Entete",
        'lower-menu' => "Menu Pied",
        'mobile-menu' => 'Menu Mobile'
    )
);

// Enqueue Bootstrap and style.css
function load_style()
{
    wp_register_style('the_name_1', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('the_name_1');

    wp_enqueue_style('the_name_2', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'load_style');

// Enqueue Bootstrap JS
function load_js()
{
    wp_enqueue_script('jquery');
    wp_register_script('the_script_name', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('the_script_name');
}
add_action('wp_enqueue_scripts', 'load_js');