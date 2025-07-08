<?php
get_header();
?>

    <section class="page-wrap">
        <div class="container">
            <p> This is index.php </p>

            <?php
                get_template_part('includes/section', 'content');
            ?>


            <?php           // Sidebar
                if(is_active_sidebar('blog_widget')):
                    dynamic_sidebar('blog_widget');
                elseif(is_active_sidebar('page_widget'):
                    dynamic_sidebar('page_widget');
                elseif(is_active_sidebar('post_widget'):
                    dynamic_sidebar('post_widget');
                elseif(is_active_sidebar('archive_widget'):
                    dynamic_sidebar('archive_widget');
                endif;
            ?>
        </div>
    </section>

<?php
get_footer();
?>