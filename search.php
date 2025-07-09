<?php
get_header();
?>

    <section class="page-wrap">
        <div class="container">
            <p> This is search.php </p>

            <?php           // Sidebar
                if(is_active_sidebar('page_sidebar')):
                    dynamic_sidebar('page_sidebar');
                elseif(is_active_sidebar('post_sidebar'):
                    dynamic_sidebar('post_sidebar');
                endif;
            ?>
        </div>
    </section>

<?php
get_footer();
?>