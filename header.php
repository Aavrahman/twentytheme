<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name') ?> - <?php bloginfo('description') ?></title> <!--
    <link rel="stylesheet" href="<?php // get_stylesheet_uri(); 
                                    ?>">  -->
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <div class="container">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'top-menu',
                'menu_id' => 'top-menu-id',
                'menu_class' => 'top-menu-class'
            ));
            ?>
        </div>
    </header>

    <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'your-theme-slug'); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Navbar</a>
            <?php
            wp_nav_menu(array(
                'theme_location'    => 'top-menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ));
            ?>
        </div>
    </nav>

    <div class="container">
        <?php get_search_form(); ?>
    </div>