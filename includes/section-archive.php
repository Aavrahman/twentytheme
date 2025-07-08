<h3>This is the 'section-archive.php' file</h3>
<main>
    <div class="page-wrap">
        <div class="container">

            <?php
            if (have_posts()):
                while (have_posts()):
            ?>

            <article class="mb-3 p-2 border border-3 border-top-0 border-end-0 border-start-0 d-flex align-items-center justify-content-center row">
                <section class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center ">

                    <?php
                    the_post();

                    if (has_post_thumbnail()):
                        the_post_thumbnail("blog-medium");
                    else:
                        echo ("No image available.");
                    endif;
                    ?>
                </section>

                <section class="col-12 col-md-6 col-lg-6">
                    <div>
                        <a href="<?php the_permalink(); ?>">
                            <h2> <?php the_title(); ?> </h2>
                            <?php echo get_the_date('d/m/Y h:i:s'); ?>
                        </a>
                    </div>

                    <div>
                        <?php echo get_the_date('d/m/Y h:i:s'); ?>
                    </div>

                    <div>
                        <?php the_excerpt();  ?>
                        <a class="a-read btn btn-success" href="<?php the_permalink(); ?>"> Ger artikl </a>
                    </div>
                </section>
            </article>

            <?php
                endwhile;
            ?>

            <seciton class="d-flex align-items-center justify-content-center">
            <?php
                global $wp_query;
                $big = 999999999;
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages
                ));
            ?>
            </seciton>


            <article>
            <?php
            else:
                echo ("No posts");
            endif;
                ?>
            </article>
        </div>
    </div>
</main>