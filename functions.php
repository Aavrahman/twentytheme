<?php
add_theme_support('menus');
register_nav_menus(
    array(
        'top-menu' => "Menu Entete",
        'lower-menu' => "Menu Pied",
        'mobile-menu' => 'Menu Mobile'
    )
);

function load_style()
{
//  wp_register_style('the_name', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all'); OR
    wp_enqueue_style('the_name', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'load_style');