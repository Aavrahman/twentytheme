<?php

//////////////////////////////////////////////// BOOTSTRAP AND STYLE ////////////////////////////////////////////////
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



//////////////////////////////////////////////// THEME OPTIONS ////////////////////////////////////////////////
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

// Register Custom Navigation Walker
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

// Thumbnails
add_theme_support('post-thumbnails');
add_image_size('blog-small', 300, 200, false);
add_image_size('blog-medium', 500, 300, false);  // see the plugin 'Force regenerate thumbnails'
add_image_size('blog-large', 800, 500, false);

// Widgets
add_theme_support('widgets');

function the_sidebars()
{
    register_sidebar(
        array(
            'name' => 'Page sidebar',
            'id' => 'page_sidebar',
            'before_title' => '<h4 class="widget-title"',
            'after_title' => '</h4>',
            'description' => 'Side widget for articles and pages',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
        )
    );

    register_sidebar(
        array(
            'name' => 'Post sidebar',
            'id' => 'post_sidebar',
            'before_title' => '<h4 class="widget-title"',
            'after_title' => '</h4>',
            'description' => 'Side widget for articles and pages',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
        )
    );

    register_sidebar(
        array(
            'name' => 'Blog sidebar',
            'id' => 'blog_sidebar',
            'before_title' => '<h4 class="widget-title"',
            'after_title' => '</h4>',
            'description' => 'Side widget for articles and pages',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
        )
    );

    register_sidebar(
        array(
            'name' => 'Archive sidebar',
            'id' => 'archive_sidebar',
            'before_title' => '<h4 class="widget-title"',
            'after_title' => '</h4>',
            'description' => 'Side widget for articles and pages',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
        )
    );

    register_sidebar(
        array(
            'name' => 'Footer sidebar',
            'id' => 'footer_sidebar',
            'before_title' => '<h4 class="widget-title"',
            'after_title' => '</h4>',
            'description' => 'Footer widget for articles\' and pages\' bottom',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
        )
    );
}
add_action('widgets_init', 'the_sidebars');



//////////////////////////////////////////////// CUSTOM POST TYPES ////////////////////////////////////////////////
//Taqvaylit: Posts / Pages
function tutlayt_post_type()
{
    $args = array(
        'labels' => array(
            'name' => 'Tutlayt PostType',
            'singular_name' => 'Tutlayt',
            'view_items' => "Wali tutlayin",
            'view_item' => "Wali tutlayt",
        //  'add_new_item' => "Rnud tutlayt page",
            'add_new' => "Rnud",
        ),
        'hierarchical' => true,  // true stands for pages; false for Posts
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-universal-access',
        'supports' => array('title', 'editor', 'thumbnail', 'auhtor', 'custom-fields'),
        // 'rewrite' => array('slug' => 'cars'),
    );
    register_post_type('tutlayt', $args);
}
add_action('init', 'tutlayt_post_type');

//Taqvaylit Taxonomy: Catgories / Ttags
function tutlayt_taxonomy()
{
    $args = array(
        'labels' => array(
            'name' => 'Timazighin Taxo',
            'singular_name' => 'Tamazight',
        ),
        'public' => true,
        'hierarchical' => true, // true stands for Category; false for Tag
    );

    register_taxonomy('timazighin', array('tutlayt'), $args);
}
add_action('init', 'tutlayt_taxonomy');



//////////////////////////////////////////////// SHORT CODES ////////////////////////////////////////////////
// Premier shortcode
function display_image($atts, $content = null)
{
    $a = shortcode_atts(
        array(
            'src' => '',
            'content' => $content,
            'txt' => "tekst"
        ),
        $atts
    );
    ob_start();
    if ($a['src'] != ""):
?>
        <div style="padding: 1rem; background-color: lightblue; background-image: url(<?= $a['src'] ?>)">
            <h3>Image</h3>
            <p> Source : <?= $a['src'] ?> </p>
            <p style="padding: 1rem; background-color:lightyellow"> contenu : <?= $a['content'] ?> </p>
            <p> Texte: <?= $a['txt'] ?> </p>
        </div>
    <?php
    else:
    ?>
        <div style="padding: 2rem; background-color: lightblue">
            <h3>Image</h3>
            <p style="padding: 1rem; background-color:lightyellow"> contenu : <?= $a['content'] ?> </p>
            <p> Texte: <?= $a['txt'] ?> </p>
        </div>
<?php
    endif;
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}
add_shortcode('say_azul', 'display_image');

// Second shortcode: SHortcode importé
function tutlayt_shortkode($atts, $content=null) {
    ob_start();
    set_query_var('attributes', $atts);
    get_template_part('includes/tutlayin', 'ugafa');
    return ob_get_clean();
}
add_shortcode("tutlayt_shortcode", "tutlayt_shortkode");