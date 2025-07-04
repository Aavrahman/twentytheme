<?php
get_header();
?>

<main>
    <section class="page-wrap">
        <div class="container">
            <p> 'archive.php' template' calling 'section-content.php' section </p>

            <?php
                get_template_part("includes/section", "content");
            ?>

        </div>
    </section>
</main>

<?php
get_footer();
?>