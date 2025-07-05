<?php
get_header();
?>

<main>
    <section class="page-wrap">
        <div class="container">


            <h1> <?php echo single_cat_title(); ?> </h1>

            <p> 'archive.php' template' calling 'section-archive.php' section </p>

            <?php
            get_template_part("includes/section", "archive");
            ?>

            <?php previous_post_link(); ?>
            <?php next_post_link(); ?>

        </div>
    </section>
</main>

<?php
get_footer();
?>