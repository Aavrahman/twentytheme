<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name') ?> - <?php bloginfo('description') ?></title> <!--
    <link rel="stylesheet" href="<?php // get_stylesheet_uri(); ?>">  -->
    <?php wp_head(); ?>
</head>

<body>
    <?php
        wp_nav_menu(array(
                          'theme_location' => 'main-menu',
                          'menu_id' => 'main-menu-id',
                          'menu_class' => 'top-menu-class'
        ));
    ?>
    <h1>Azuul !</h1>