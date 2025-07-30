<?php
get_header();
?>

    <main class="container">

        <p> This is the 'single-tutlayt.php' template calling the "sectiont-singletutlayt.php" section </p>


        <div class="row">


            <div class="col-8 bg-success bg-opacity-10 p-3">
                <?php
                get_template_part("includes/section", "singletutlayt");
                ?>
                <?php wp_link_pages(); ?>
            </div>


            <div class="col-3 d-flex align-items-center bg-warning bg-opacity-10 ">
                <div class="side_bar">
                <?php           // Sidebar
                if (is_active_sidebar('post_sidebar')):
                    dynamic_sidebar('post_sidebar');
                endif;
                ?>
                </div>

                <div class="lateral_thumbnail">
                <?php
                if (has_post_thumbnail()):
                ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid m-1 img-thumbnail" />
                <?php
                else:
                echo ("No images for thos post !");
                endif;
                ?>
                </div>
            </div>

            <div class="col-11 bg-success bg-opacity-10 rounded mt-4 p-3">
                <?php // get_template_part('includes/tutlayin', 'ugafa'); ?>
            </div>


        </div>


    </main>

<?php
get_footer();
?>