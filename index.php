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
                if(is_active_sidebar('blog_sidebar')):
                    dynamic_sidebar('blog_sidebar');
                elseif(is_active_sidebar('page_sidebar'):
                    dynamic_sidebar('page_sidebar');
                elseif(is_active_sidebar('post_sidebar'):
                    dynamic_sidebar('post_sidebar');
                elseif(is_active_sidebar('archive_sidebar'):
                    dynamic_sidebar('archive_sidebar');
                endif;
            ?>
        </div>
    </section>

<?php
get_footer();
?>