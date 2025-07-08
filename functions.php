<?php

// BOOTSTRAP AND STYLE
// Load Bootstrap and style.css
function load_style()
{
    wp_register_style('bootstap_style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstap_style');

    wp_enqueue_style('main_style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'load_style');

// Load Bootstrap JS
function load_js()
{
    wp_enqueue_script('jquery');
    wp_register_script('the_script_name', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('the_script_name');
}
add_action('wp_enqueue_scripts', 'load_js');


// THEME OPTIONS
// Menus
add_theme_support('menus');
register_nav_menus(
    array(
        'top-menu' => "Main Menu",
        'bottom-menu' => "Footer Menu",
        'mobile-menu' => 'Mobile Menu',
        'error' => '404 Error',
    )
);

// Thumbnails
add_theme_support('post-thumbnails');
add_image_size('blog-small', 300, 200, false);
add_image_size('blog-medium', 500, 300, false);  // see the plugin 'Force regenerate thumbnails'
add_image_size('blog-large', 800, 500, false);

// Widgets
add_theme_support('widgets');

function the_sidebars() {
    register_sidebar(
        array(
            'name' => 'Page widget',
            'id' => 'page_widget',
            'before_title' => '<h4 class="widget-title"',
            'after_title' => '</h4>',
            'description' => 'Side widget for articles and pages',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
        )
    );

    register_sidebar(
        array(
            'name' => 'Post widget',
            'id' => 'post_widget',
            'before_title' => '<h4 class="widget-title"',
            'after_title' => '</h4>',
            'description' => 'Side widget for articles and pages',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
        )
    );

    register_sidebar(
        array(
            'name' => 'Blog widget',
            'id' => 'blog_widget',
            'before_title' => '<h4 class="widget-title"',
            'after_title' => '</h4>',
            'description' => 'Side widget for articles and pages',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
        )
    );

    register_sidebar(
        array(
            'name' => 'Archive widget',
            'id' => 'archive_widget',
            'before_title' => '<h4 class="widget-title"',
            'after_title' => '</h4>',
            'description' => 'Side widget for articles and pages',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
        )
    );

    register_sidebar(
        array(
            'name' => 'Footer widget',
            'id' => 'footer_widget',
            'before_title' => '<h4 class="widget-title"',
            'after_title' => '</h4>',
            'description' => 'Footer widget for articles\' and pages\' bottom',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
        )
    );
}
add_action('init', 'the_sidebars');