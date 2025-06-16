<?php
add_theme_support('menus');
register_nav_menus(
    array(
        'top-menu' => "Menu Entete",
        'lower-menu' => "Menu Pied",
        'mobile-menu' => 'Menu Mobile'
    )
);