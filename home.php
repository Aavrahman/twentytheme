<?php
get_header();
?>
    
    <section class="page-wrap">
        <div class="container">
            <p> This is the home - home.php - page ! </p>

            <h1> <?php the_title(); ?> </h1>

            <?php get_template_part('includes/section', 'content'); ?>
        </div>
    </section>

<?php
get_footer();
?>