<?php
get_header();
?>

<section class="page-wrap">
    <div class="container">
        <p> This is single.php, including section-blogcontent.php </p>
        <?php
        get_template_part("includes/section", "blogcontent");
        ?>
    </div>
</section>

<?php
get_footer();
?>