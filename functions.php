<?php
add_theme_support('menus');
register_nav_menus(
    array(
        'top-menu' => "Menu Entete",
        'lower-menu' => "Menu Pied",
        'mobile-menu' => 'Menu Mobile'
    )
);

function ajouter_style()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'ajouter_style');