<?php
/*
Template Name: Contact Us
*/
?>

<?php
get_header();
?>

    <section class="page-wrap">
        <div class="container">
            <p> This is the 'kontakt-aghed.php' page </p>

            <h1> <?php the_title(); ?> </h1>

            <div class="row">
                <div class="col-lg-6">
                    <p> This is where the contact form goes.</p>
                </div>
                <div class="col-lg-6">
                    <?php get_template_part('includes/section', 'content'); ?>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
?>