<?php
get_header();
?>

<p> This is front-page.php </p>

<h1> <?php the_title(); ?> </h1>

<?php get_template_part('includes/section', 'content'); ?>

<?php
get_footer();
?>