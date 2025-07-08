<?php
get_header();
?>

<main>
    <section class="page-wrap">
        <div class="container">

            <p> This is the 'single.php' template calling the "single-content.php" section </p>

            <?php
            get_template_part("includes/section", "single");
            ?>

            <?php wp_link_pages(); ?>

            <?php           // Sidebar
                if(is_active_sidebar('post_widget')):
                    dynamic_sidebar('post_widget');
                endif;
            ?>


        </div>
    </section>
</main>

<?php
get_footer();
?>