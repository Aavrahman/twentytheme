<?php
/*
Template Name: Amezruy template
*/
?>

<?php
get_header();
?>

<main>
    <div class="page-wrap">
        <div class="container">


            <h1> <?php echo single_cat_title(); ?> </h1>

            <h3> 'category-amezruy.php' template calling 'section-amezruy.php' section</h3>

            <?php get_template_part("includes/section", "amezruy"); ?>

            <?php previous_post_link("prev"); ?>
            <?php next_post_link(); ?>

        </div>
    </div>
</main>

<?php
get_footer();
?>