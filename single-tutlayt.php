<?php
get_header();
?>

    <main class="container">
        <div class="card-body row d-flex justify-content-evenly flex-wrap mb-3 mt-2">

            <p> This is the 'single-tutlayt.php' template calling the "single-content.php" section </p>

            <?php
                get_template_part("includes/section", "singletutlayt");
            ?>

            <?php wp_link_pages(); ?>

            <div class="col-4 bg-warning bg-opacity-25 col-3">
                <?php           // Sidebar
                if (is_active_sidebar('post_sidebar')):
                    dynamic_sidebar('post_sidebar');
                endif;
                ?>

                <?php
                if (has_post_thumbnail()):
                ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid m-1 img-thumbnail" />
                <?php
                else:
                // echo ("No images for thos post !");
                endif;
                ?>
            </div>
        </div>
    </main>

<?php
get_footer();
?>