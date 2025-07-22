<?php
get_header();
?>

    <main class="container">
        <div class="page-wrap">

                <p> This is the page.php page template calling 'section-page.php' </p>


                <?php get_template_part('includes/section', 'page'); ?>

                <?php           // Sidebar
                if (is_active_sidebar('page_sidebar')):
                    dynamic_sidebar('page_sidebar');
                endif;
                ?>

        </div>
    </main>

        <?php
        get_footer();
        ?>