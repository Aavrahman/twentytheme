<?php
get_header();
?>

    <main>
        <section class="page-wrap">
            <div class="container">

                <p> This is the 'single.php' template calling the "single-content.php" sectio n </p>

                <?php
                get_template_part("includes/section", "single");
                ?>

            </div>
        </section>
    </main>

<?php
get_footer();
?>