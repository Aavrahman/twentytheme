<?php
get_header();
?>

    <main>
        <section class="page-wrap">
            <div class="container">


                <h1> Tahawact n unadi ghef awal <span style="color:white; background-color:black;";>'<?php echo get_search_query(); ?>'</span> </h1>

                <h2>Ata wayen id yufa </h2>

                <p> 'search.php' template' calling 'section-archive.php' section </p>

                <?php
                get_template_part("includes/section", "searchresult");
                ?>

                <?php previous_post_link(); ?>
                <?php next_post_link(); ?>



            </div>
        </section>
    </main>

<?php
get_footer();
?>