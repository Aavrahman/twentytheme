<?php
get_header();
?>
<body>
    <section class="page-wrap">
        <div class="container">
            <p> This is front-page.php </p>

            <h1> <?php the_title(); ?> </h1>

            <?php get_template_part('includes/section', 'content'); ?>
        </div>
    </section>
</body>

<?php
get_footer();
?>