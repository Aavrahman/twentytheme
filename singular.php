<?php
get_header();
?>

    <section class="page-wrap">
        <div class="container">
            <p> This is singular.php </p>

            <?php
                get_template_part('includes/section', 'single');
            ?>

            <?php           // Sidebar
                if(is_active_sidebar('post_sidebar')):
                    dynamic_sidebar('post_sidebar');

                else:
                    echo("No widget !")
                endif;
            ?>
        </div>
    </section>

<?php
get_footer();
?>