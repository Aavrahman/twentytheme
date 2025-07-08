<?php
get_header();
?>

    <section class="page-wrap">
        <div class="container">
            <p> This is search.php </p>

            <?php           // Sidebar
                if(is_active_sidebar('page_widget')):
                    dynamic_sidebar('page_widget');
                elseif(is_active_sidebar('post_widget'):
                    dynamic_sidebar('post_widget');
                endif;
            ?>
        </div>
    </section>

<?php
get_footer();
?>