<?php
/*
Template Name: About Us
*/
?>

<?php
get_header();
?>

<section class="page-wrap">
    <div class="container">

        <p> This is the 'about-us.php' page </p>

        <h1> <?php the_title(); ?> </h1>

        <div class="row">
            <div class="col-lg-3">
                <p> Colonne latérale droite: Here will be displayed some widgets, menus. This is where the contact form goes.</p>
            </div>
            <div class="col-lg-9">
                <?php get_template_part('includes/section', 'content'); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>