<?php
get_header();
?>

<main>
    <section class="page-wrap">
        <div class="container">

            <p> This is the 'single-tutlayt.php' template calling the "single-content.php" section </p>


            <?php
            get_template_part("includes/section", "singletutlayt");
            ?>

            <?php wp_link_pages(); ?>

            <?php           // Sidebar
            if (is_active_sidebar('post_sidebar')):
                dynamic_sidebar('post_sidebar');
            endif;
            ?>


        </div>
    </section>
</main>

<?php
get_footer();
?>