<?php
get_header();
?>

    <main>
        <div class="page-wrap">
            <div class="container">
                <h3> 'category-amezruy.php' template calling 'section-amezruy.php' section</h3>
                <?php
                    get_template_part("includes/section", "amezruy");
                ?>
            </div>
        </div>
    </main>

<?php
get_footer();
?>