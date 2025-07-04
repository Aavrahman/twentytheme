<?php
get_header();
?>

    <section class="page-wrap">
        <div class="container">
            <p> This is 'front-page.php' template calling the 'section-content.php' section</p>

            <h1> <?php the_title(); ?> </h1> <!-- Set to display the last post's title in the front page -->

            <?php get_template_part('includes/section', 'content'); ?>
        </div>
    </section>

<?php
get_footer();
?>